<?php
// Include database connection
include "settings.php";

$alter = "ALTER TABLE Process_EOI ADD UNIQUE(job_reference, first_name, last_name)";
mysqli_query($conn, $alter);

if (isset($_POST['apply_submit'])) {
    // Get form data and sanitize input
    $job_reference = mysqli_real_escape_string($conn, $_POST['jobnumber']);
    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $dob  = mysqli_real_escape_string($conn, $_POST['bday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $street_address = mysqli_real_escape_string($conn, $_POST['street']);
    $suburb = mysqli_real_escape_string($conn, $_POST['suburb']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    // Handle skills as a comma-separated string
    $skills = isset($_POST['tech']) ? implode(", ", $_POST['tech']) : "";
    $other_skills = mysqli_real_escape_string($conn, $_POST['comments']);
    $status = "New"; // Default status for new applications

    // Check if the user already exists
    $checkUserQuery = "SELECT * FROM Process_EOI WHERE job_reference = '$job_reference' AND LOWER(first_name) = LOWER('$first_name') AND LOWER(last_name) = LOWER('$last_name')";

    $result = mysqli_query($conn, $checkUserQuery);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        // Thay đổi cách hiển thị thông báo
        echo "<script>
            window.onload = function() {
                alert('User already applied for this job!');
            }
        </script>";
    } else {
        // Insert new application
        $sql = "INSERT INTO Process_EOI (job_reference, first_name, last_name, dob, gender, street_address, suburb, state, postcode, email, phone, skills, other_skills, status) 
                VALUES ('$job_reference', '$first_name', '$last_name', '$dob', '$gender', '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills', '$other_skills', '$status')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                window.onload = function() {
                    alert('Application submitted successfully!');
                }
            </script>";
        } else {
            echo "<script>
                window.onload = function() {
                    alert('Error: " . mysqli_error($conn) . "');
                }
            </script>";
        }
    }

    // Close the database connection AFTER all queries
    mysqli_close($conn);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apply Jobs">
    <meta name="keywords" content="HTML, Form, tags">
    <meta name="author" content="Le Thanh Nam - 104999380">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>Apply Jobs</title>
    <script>
        // Mapping of states to their representative postcodes
        const statePostcodeMap = {
            'VIC': '3000',
            'NSW': '2000',
            'QLD': '4000',
            'NT': '0800',
            'WA': '6000',
            'SA': '5000',
            'TAS': '7000',
            'ACT': '2600'
        };

        // Function to automatically fill postcode when state is selected
        function autofillPostcode() {
            // Get the selected state
            const stateSelect = document.getElementById('state');
            const postcodeInput = document.getElementById('postcode');

            // When a state is selected, automatically fill the postcode
            stateSelect.addEventListener('change', function() {
                // Get the selected state value
                const selectedState = this.value;

                // Find the corresponding postcode
                const automaticPostcode = statePostcodeMap[selectedState];

                // Set the postcode input value
                if (postcodeInput && automaticPostcode) {
                    postcodeInput.value = automaticPostcode;
                }
            });
        }

        // Run the autofill function when the page loads
        window.addEventListener('load', autofillPostcode);
    </script>
</head>
<body id="apply-background">
        <!-- Header section -->
        <?php 
            include 'include\header.inc'; 
        ?>

        <!-- Form section -->
        <div id="form-align">
            <form class="form-form" action="process_eoi.php" method="post" novalidate="novalidate">
                <fieldset class="form-all">
                    <div class="form-font" id="header">
                        <h1>Job Application Form</h1>
                        <p>Please fill out all sections</p>
                    </div>
    
                    <fieldset id="apply_fieldset" class="spacing">
                        <legend class="form-infor">Personal Details</legend>
                        <p>
                            <label class = "form-font" for="jobnumber">Job Reference Number</label> <br>
                            <select class="apply_select" name="jobnumber" id="jobnumber" required>
                                <option class= "state_choice" value="" disabled hidden selected>Please select a choice</option>
                                <option class= "state_choice" value="FE001">FE001 - Front-End Developer</option>
                                <option class= "state_choice" value="BE002">BE002 - Back-End Developer</option>
                                <option class= "state_choice" value="DE003">DE003 - Data Engineer</option>
                                <option class= "state_choice" value="QE004">QE004 - Quality Control Engineer</option>
                                <option class= "state_choice" value="AE005">AE005 - Automation Engineer</option>
                            </select>
                        </p>
                        <p>
                            <label class = "form-font" for="firstname">First Name</label> <br>
                            <input class="apply_input" type="text" id="firstname" name="firstname" maxlength="20" required = "required">
                        </p>
                        <p>
                            <label class = "form-font" for="lastName">Last Name</label> <br>
                            <input class="apply_input" type="text" id="lastName" name="lastName" maxlength="20" required = "required">
                        </p>
                        <p>
                            <label class = "form-font" for="dateofbirth">Date of Birth
                            <input class="apply_input" type="date" name="bday" id="dateofbirth" required = "required">
                            </label>
                        </p>
                        
                    </fieldset>
                
                    <fieldset id="apply_fieldset" class="spacing">
                        <legend class="form-infor">Gender</legend>
                            <input type="radio" id="male" name="gender" value="male" class="radio" required="required">
                            <label for="male" class="form-font radio_name choice1">Male</label>
                                
                            <input type="radio" id="female" name="gender" value="female" class="radio">
                            <label for="female" class="form-font radio_name choice2">Female</label>

                            <input type="radio" id="othergender" name="gender" value="othergender" class="radio">
                            <label for="othergender" class="form-font radio_name choice3">Others</label>
                
                    </fieldset>
    
                    <fieldset id="apply_fieldset" class="spacing">
                        <legend class="form-infor">Contact Address</legend>  
                            <p>
                                <label class = "form-font" for="street">Street Address</label> <br>
                                <input class="apply_input" type="text" name="street" id="street" maxlength="40" required>
                            </p>
                            <p>
                                <label class = "form-font" for="suburb">Suburb/Town</label> <br>
                                <input class="apply_input" type="text" name="suburb" id="suburb" maxlength="40" required>
                            </p>
                            <p>
                                <label class = "form-font" for="state">State</label> <br>
                                <select class="apply_select" name="state" id="state" required>
                                    <option class= "state_choice" value="" disabled hidden selected>Please select a choice</option>
                                    <option class= "state_choice" value="VIC">VIC</option>
                                    <option class= "state_choice" value="NSW">NSW</option>
                                    <option class= "state_choice" value="QLD">QLD</option>
                                    <option class= "state_choice" value="NT">NT</option>
                                    <option class= "state_choice" value="WA">WA</option>
                                    <option class= "state_choice" value="SA">SA</option>
                                    <option class= "state_choice" value="TAS">TAS</option>
                                    <option class= "state_choice" value="ACT">ACT</option>
                                </select>
                            </p>
                            <p>
                                <label class = "form-font" for="postcode">Postcode</label> <br>
                                <input class="apply_input" type="text" name="postcode" id="postcode" pattern="\d{4}" required>
                            </p>
                            
                    </fieldset>
                
                    <fieldset id="apply_fieldset" class="spacing">
                        <legend class="form-infor">Contact Information</legend>
                            <p>
                                <label class = "form-font" for="email">Email Address:</label> <br>
                                <input class="apply_input" type="text" id="email" name="email" required> <br>
                            </p>
                            <p>  
                                <label class = "form-font" for="phone">Phone Number:</label> <br>
                                <input class="apply_input" type="text" id="phone" name="phone" pattern="\d{8,12}" required>
                            </p>
                            
                                
                    </fieldset>
                
                    <fieldset id="apply_fieldset" class="spacing">
                        <legend class="form-infor">Skill Lists</legend>
                        <p>
                            <label class="checkbox_name form-font" for="HTML">HTML
                                <input class="apply_input" type="checkbox" name="tech[]" value="html" id="HTML">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="CSS">CSS
                                <input class="apply_input" type="checkbox" name="tech[]" value="css" id="CSS">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="Javascript">Javascript
                                <input class="apply_input" type="checkbox" name="tech[]" value="javascript" id="Javascript">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="PHP">PHP
                                <input class="apply_input" type="checkbox" name="tech[]" value="php" id="PHP">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="MySQL">MySQL
                                <input class="apply_input" type="checkbox" name="tech[]" value="mysql" id="MySQL">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="Other">Other skills
                                <input class="apply_input" type="checkbox" name="tech[]" value="other" id="Other">
                                <span class="tick"></span>
                                <textarea class="apply_textarea" id="form-textarea" name="comments" rows="5" cols="50" placeholder="Write description of your other skills here..."></textarea>
                            </label>
                        </p>
                        
                    </fieldset>
                </fieldset>
                
    
                <div class="apply_button">
                    <input id="apply_submit" type="submit" name = "apply_submit" value="Apply" onclick="return mess();">
                    <input type="reset" value="Reset form">
                </div>
            </form>
        </div>

        <!-- Footer section -->
        <?php 
            include 'include\footer.inc'; 
        ?>
</html>