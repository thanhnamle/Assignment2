<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>processEOI</title>
</head>
<body>
    <?php
    // Server-side validation and processing

        // This function ensures all data should be sanitized to remove leading and trailing spaces, backslashes, and HTML control characters.
        function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        // Connect to the database
        include("settings.php");

        $conn = @mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );
        // Check connection; if failed, display an error message
        if (!$conn) {
            echo "<p>Database connection failure</p>";
        }


        // Validate and sanitize form inputs

        $errMsg = ""; // Added variable to store error messages

        if (isset($_POST["jobnumber"])) {
            $job_reference = sanitise_input($_POST["jobnumber"]);
        } else {
            echo"Invalid Job reference number";
            exit;
        }

        if (isset($_POST["firstname"])) {
            $first_name = sanitise_input($_POST["firstname"]);
        } else {
            echo"Invalid pattern for First Name ";
            exit;
        }

        if (isset($_POST["lastName"])) {
            $last_name = sanitise_input($_POST["lastName"]);
        } else {
            echo"Invalid Last Name";
            exit;
        }

        if (isset($_POST["bday"])) {
            $dob = sanitise_input($_POST["bday"]);
        } else {
            echo"Invalid date 0f birth";
            exit;
        }

        if (isset($_POST["gender"])) {
            $gender = sanitise_input($_POST["gender"]);
        } else {
            echo"Select gender";
            exit;
        }

        if (isset($_POST["street"])) {
            $street_address = sanitise_input($_POST["street"]);
        } else {
            echo"Invalid Street Address";
            exit;
        }
        if (isset($_POST["suburb"])) {
            $suburb = sanitise_input($_POST["suburb"]);
        } else {
            echo"Invalid Suburb_Town";
            exit;
        }

        if (isset($_POST["state"])) {
            $state = sanitise_input($_POST["state"]);
        } else {
            echo"Invalid State";
            exit;
        }

        if (isset($_POST["postcode"])) {
            $postcode = sanitise_input($_POST["postcode"]);
        } else {
            echo"Invalid Postcode";
            exit;
        }
        if (isset($_POST["email"])) {
            $email = sanitise_input($_POST["email"]);
        } else {
            echo"Invalid Email Address";
            exit;
        }

        if (isset($_POST["phone"])) {
            $phone = sanitise_input($_POST["phone"]);
        } else {
            echo"Invalid Phone Number";
            exit;
        }

        if (isset($_POST["tech"])) {
            $skills = implode(", ", $_POST["tech"]);
        
        } else {
            echo"Invalid skills";
            exit;
        }


        if (isset($_POST["other_skills"])) {
            $other_skills = sanitise_input($_POST["other_skills"]);
            if (!preg_match("/^[a-zA-Z0-9\s]+$/", $OtherSkills)) {
                $errMsg .= "<p>Only alphanumeric characters and spaces are allowed in the Other Skills field.</p>";
            }
        } else {
            $OtherSkills = "";
        }



        // Makes sure all the required fields are filled; otherwise, display error message
        if (empty($job_reference)) {
            $errMsg .= "<p>You must enter a job reference number.</p>";
        } elseif (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_reference)) {
            $errMsg .= "<p>Only five alphanumeric characters are allowed in the job reference number.</p>";
        }
        if (empty($first_name)) {
            $errMsg .= "<p>You must enter your first name.</p>";
        } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) {
            $errMsg .= "<p>Only 20 alphabetic letters are allowed in your first name.</p>";
        }


        if (empty($last_name)) {
            $errMsg .= "<p>You must enter your last name.</p>";
        } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) {
            $errMsg .= "<p>Only 20 alphabetic letters are allowed in your last name.</p>";
        }


        if (empty($dob)) {
            $errMsg .= "<p>You must enter your date of birth.</p>";
        } else {
            $dobDateTime = DateTime::createFromFormat('d/m/Y', $dob);
            if (!$dobDateTime) {
                $errMsg .= "<p>You must enter the date of birth in the correct format: YYYY-MM-DD.</p>";
            } else {
                $now = new DateTime();
                $age = $now->diff($dobDateTime)->y;
                if ($age < 15 || $age > 80) {
                    $errMsg .= "<p>Your age must be between 15 and 80 years.</p>";
                }
            }
        }


        if (empty($gender)) {
            $errMsg .= "<p>Gender is required.</p>";
        } else {
            //This ensures Radio input has a value, you can proceed with further processing
            $selectedGender = $_POST['gender'];
        }


        if (empty($street_address)) {
            $errMsg .= "<p>You must enter your street address.</p>";
        } elseif (!preg_match("/^[a-zA-Z]{1,40}$/", $street_address)) {
            $errMsg .= "<p>Only 40 alphabetic letters are allowed in your street address.</p>";
        }
        if (empty($suburb)) {
            $errMsg .= "<p>You must enter your suburb or town.</p>";
        } elseif (!preg_match("/^[a-zA-Z]{1,40}$/", $suburb)) {
            $errMsg .= "<p>Only 40 alphabetic letters are allowed in your suburb or town.</p>";
        }


        if (empty($state)) {
            $errMsg .= "<p>You must select a state.</p>";
        }


        if (empty($postcode)) {
            $errMsg .= "<p>You must enter your postcode.</p>";
        } elseif (!preg_match("/^\d{4}$/", $postcode)) {
            $errMsg .= "<p>Postcode must be exactly 4 digits long.</p>";
        
        }

        // Match postcode with state
        $postcodeState = array(
        "3000" => "VIC",
        "2000" => "NSW",
        "4000" => "QLD",
        "0800" => "NT",
        "6000" => "WA",
        "5000" => "SA",
        "7000" => "TAS",
        "2600" => "ACT",
        
        );
        // Check if the entered postcode matches the selected state
        if (isset($State) && isset($postcode)) {
        $postcode = sanitise_input($postcode);
        $postcode = str_pad($postcode, 4, "0", STR_PAD_LEFT); // this pads the postcode with leading zeros if necessary

        if (!isset($postcodeState[$postcode])) {
            $errMsg .= "<p>Invalid postcode.</p>";
        } elseif ($postcodeState[$postcode] !== $state) {
            $errMsg .= "<p>The selected state does not match the entered postcode.</p>";
        }
        }
        if (empty($email_address)) {
            $errMsg .= "<p>You must enter your email address.</p>";
        } elseif (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $errMsg .= "<p>You must enter a valid email address.</p>";
        }


        if (empty($phone)) {
            $errMsg .= "<p>You must enter your phone number.</p>";
        } elseif (!preg_match("/^(\+?\d{1,4}[\s-]?)?(?!0+\s+,?$)\d{10}\s*,?$/", $phone)) {
            $errMsg .= "<p>You must enter a valid phone number (10 digits, no spaces or special characters).</p>";
        }



        // Create the EOI table if it doesn't exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS Process_EOI (
            EOInumber INT AUTO_INCREMENT PRIMARY KEY,
            `job_reference` VARCHAR(20),
            `first_name` VARCHAR(30),
            `last_name` VARCHAR(30),
            `dob` VARCHAR(30),
            `gender` VARCHAR(10),
            `street_address` VARCHAR(100),
            `suburb` VARCHAR(50),
            `state` VARCHAR(20),
            `postcode` VARCHAR(10),
            `email` VARCHAR(50),
            `phone` VARCHAR(20),
            `skills` VARCHAR(255),
            `other_skills` TEXT,
            Status ENUM('New', 'Current', 'Final') DEFAULT 'New'

        )";

        // Execute the table creation query
        mysqli_query($conn, $createTableQuery);

        $insertQuery = "INSERT INTO Process_EOI (
            job_reference,
            first_name,
            last_name,
            dob,
            gender,
            street_address,
            suburb,
            state,
            postcode,
            email,
            phone,
            skills,
            other_skills
        ) VALUES (
            '$job_reference',
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
            '$skills',
            '$other_skills'
            
            
            )";




        $result = mysqli_query($conn, $insertQuery);	
            if (!$result){		
                echo "<p>Something is wrong with ", $insertQuery, "</p>";
            } else {		
                echo "<p\">Successfully added new Applicant record</p><br>
                    <a href='jobs.php'>Back to Job List</a>";

            }
            mysqli_close($conn);
    ?>
</body>
</html>
