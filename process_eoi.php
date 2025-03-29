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
        } else {
            $other_skills = "";
        }



        // Makes sure all the required fields are filled; otherwise, display error message
        if (empty($job_reference)) {
            $errMsg .= "<p>You must select Job Reference.</p>";
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
            $dobDateTime = DateTime::createFromFormat('dd/MM/yyyy', $dob);
            if (!$dobDateTime) {
                $errMsg .= "<p>You must enter the date of birth in the correct format: DD-MM-YYYY.</p>";
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
            `other_skills` VARCHAR(255),
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





// Include database connection
if (isset($_POST['apply_submit'])) {
    // Kiểm tra lỗi trước khi thực hiện các thao tác với CSDL
    if (empty($errMsg)) {
        // Kiểm tra xem ứng viên đã đăng ký cho công việc này chưa
        $checkUserQuery = "SELECT * FROM Process_EOI WHERE job_reference = '$job_reference' AND LOWER(first_name) = LOWER('$first_name') AND LOWER(last_name) = LOWER('$last_name')";
        $result = mysqli_query($conn, $checkUserQuery);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            // Nếu đã tồn tại, hiển thị thông báo
            echo "<script>
                window.onload = function() {
                    alert('User already applied for this job!');
                }
            </script>";
        } else {
            // Thực hiện chèn dữ liệu nếu chưa tồn tại
            if (mysqli_query($conn, $insertQuery)) {
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
    } else {
        // Nếu có lỗi, hiển thị các lỗi
        echo "<div class='error'>$errMsg</div>";
    }
}

// Đóng kết nối CSDL ở cuối script
mysqli_close($conn);

    ?>
</body>
</html>
