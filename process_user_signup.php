<?php
    session_start();

    include ("settings.php");

    if(isset($_POST['signup_submit'])) {

        // Get form data
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Check if username and email are already in database
        $check_username = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($check_username);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already taken!');
            window.location.href = 'user_signup.php';
            </script>";
        } else {

            // Insert new user into database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn ->query($sql) === TRUE) {
                $_SESSION['username'] = $username;

                echo "<script>alert('Registration successful!');
                window.location.href = 'index.php';</script>";
            } else {
                echo "Error: " . $sql . $conn->error;
            }
        }
    }
?>