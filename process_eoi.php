<?php
require_once("settings.php"); // Connection info

// Prevent direct access
if (!isset($_POST["submit"])) {
    // Redirect to apply page
    header("Location: apply.php");
    exit();
}

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    echo "<p>Database connection failure</p>";
    exit();
} 

// Create EOI table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS Process_EOI (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference_number VARCHAR(5) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb_town VARCHAR(40) NOT NULL,
    state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    skill_html VARCHAR(100),
    skill_css VARCHAR(100),
    skill_js VARCHAR(100),
    skill_php VARCHAR(100),
    skill_sql VARCHAR(100),
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
)";

$result = mysqli_query($conn, $create_eoi_table);
if (!$result) {
    echo "<p>Error creating EOI table: " . mysqli_error($conn) . "</p>";
    exit();
}

// Initialize error array
$errors = [];

// Sanitize and validate job reference number
$job_ref = trim($_POST["referenceID"]);
$job_ref = mysqli_real_escape_string($conn, $job_ref);
if (empty($job_ref) || !preg_match("/^[a-zA-Z0-9]{5}$/", $job_ref)) {
    $errors[] = "Job reference number must be exactly 5 alphanumeric characters.";
}

// Sanitize and validate first name
$first_name = trim($_POST["firstname"]);
$first_name = mysqli_real_escape_string($conn, $first_name);
if (empty($first_name) || !preg_match("/^[a-zA-Z ]{1,20}$/", $first_name)) {
    $errors[] = "First name must contain only letters and be less than 20 characters.";
}

// Sanitize and validate last name
$last_name = trim($_POST["surname"]);
$last_name = mysqli_real_escape_string($conn, $last_name);
if (empty($last_name) || !preg_match("/^[a-zA-Z ]{1,20}$/", $last_name)) {
    $errors[] = "Last name must contain only letters and be less than 20 characters.";
}

// Validate date of birth
$dob = trim($_POST["dob"]);
if (empty($dob)) {
    $errors[] = "Date of birth is required.";
} else {
    // Check date format and age range (15-80 years)
    $dob_date = DateTime::createFromFormat('Y-m-d', $dob);
    $current_date = new DateTime();
    $age = $current_date->diff($dob_date)->y;
    
    if (!$dob_date || $dob_date->format('Y-m-d') !== $dob) {
        $errors[] = "Date of birth must be in the format dd/mm/yyyy.";
    } elseif ($age < 15 || $age > 80) {
        $errors[] = "Applicant must be between 15 and 80 years old.";
    }
}

// Validate gender selection
$gender = isset($_POST['category']) ? $_POST['category'][0] : "";
if (empty($gender)) {
    $errors[] = "Gender selection is required.";
}

// Validate address
$street_address = trim($_POST["address"]);
$street_address = mysqli_real_escape_string($conn, $street_address);
if (empty($street_address) || strlen($street_address) > 40) {
    $errors[] = "Street address must not be empty and must be less than 40 characters.";
}

// Validate suburb/town
$suburb = trim($_POST["suburb"]);
$suburb = mysqli_real_escape_string($conn, $suburb);
if (empty($suburb) || strlen($suburb) > 40) {
    $errors[] = "Suburb/town must not be empty and must be less than 40 characters.";
}

// Validate state selection
$state = trim($_POST["state"]);
$valid_states = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
if (empty($state) || !in_array($state, $valid_states)) {
    $errors[] = "Please select a valid state.";
}

// Validate postcode
$postcode = trim($_POST["postcode"]);
if (empty($postcode) || !preg_match("/^\d{4}$/", $postcode)) {
    $errors[] = "Postcode must be exactly 4 digits.";
} else {
    // Check if postcode matches state
    $valid_ranges = array(
        'VIC' => [3000, 3999],
        'NSW' => [1000, 2999],
        'QLD' => [4000, 4999],
        'NT' => [800, 899],
        'WA' => [6000, 6999],
        'SA' => [5000, 5999],
        'TAS' => [7000, 7999],
        'ACT' => [200, 299, 2600, 2618] // ACT can have different postcode ranges
    );
    
    $postcode_valid = false;
    if (isset($valid_ranges[$state])) {
        if (count($valid_ranges[$state]) == 2) {
            // Range check
            if ($postcode >= $valid_ranges[$state][0] && $postcode <= $valid_ranges[$state][1]) {
                $postcode_valid = true;
            }
        } else {
            // Multiple ranges
            for ($i = 0; $i < count($valid_ranges[$state]); $i += 2) {
                if ($postcode >= $valid_ranges[$state][$i] && $postcode <= $valid_ranges[$state][$i+1]) {
                    $postcode_valid = true;
                    break;
                }
            }
        }
    }
    
    if (!$postcode_valid) {
        $errors[] = "Postcode does not match the selected state.";
    }
}

// Validate email
$email = trim($_POST["email"]);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Validate phone number
$phone = trim($_POST["phone"]);
// Remove spaces and non-numeric characters for validation
$phone_clean = preg_replace('/\D/', '', $phone);
if (empty($phone_clean) || strlen($phone_clean) < 8 || strlen($phone_clean) > 12) {
    $errors[] = "Phone number must be between 8 and 12 digits.";
}

// Validate skills
$skill_program = isset($_POST["skillProgram"]) ? 1 : 0;
$skill_web = isset($_POST["skillWeb"]) ? 1 : 0;
$skill_network = isset($_POST["skillNetwork"]) ? 1 : 0;
$skill_db = isset($_POST["skillDB"]) ? 1 : 0;

// Validate other skills if checkbox is checked
$has_additional_skills = isset($_POST["enableAdditionalSkills"]);
$other_skills = trim($_POST["addSkills"]);
$other_skills = mysqli_real_escape_string($conn, $other_skills);

if ($has_additional_skills && empty($other_skills)) {
    $errors[] = "If 'Additional Skills' is selected, please provide details.";
}

// Process data if there are no validation errors
if (count($errors) > 0) {
    // Display errors
    echo "<h2>Please correct the following errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "<p><a href='javascript:history.back()'>Go back</a> and fix these errors.</p>";
} else {
    // Insert into eoi table
    $query = "INSERT INTO eoi (
        job_reference_number,
        first_name,
        last_name,
        date_of_birth,
        gender,
        street_address,
        suburb_town,
        state,
        postcode,
        email,
        phone,
        skill_program,
        skill_web,
        skill_network,
        skill_db,
        other_skills,
        status
    ) VALUES (
        '$job_ref',
        '$first_name',
        '$last_name',
        '$dob',
        '$gender',
        '$street_address',
        '$suburb',
        '$state',
        '$postcode',
        '$email',
        '$phone',
        $skill_program,
        $skill_web,
        $skill_network,
        $skill_db,
        '$other_skills',
        'New'
    )";

    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        echo "<p>Error adding your application: " . mysqli_error($conn) . "</p>";
    } else {
        // Get the auto-generated EOI number
        $eoi_number = mysqli_insert_id($conn);
        
        // Display confirmation message
        echo "<h2>Application Submitted Successfully!</h2>";
        echo "<p>Thank you for your interest in the position.</p>";
        echo "<p>Your Expression of Interest (EOI) number is: <strong>$eoi_number</strong></p>";
        echo "<p>Please keep this number for your reference. You may be contacted soon regarding your application.</p>";
        echo "<p><a href='index.php'>Return to Homepage</a></p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>