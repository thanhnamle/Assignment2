<?php
    session_start();

    include ("settings.php");

    if(isset($_POST['login_submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;

                echo "<script>alert('Login successful!');
                window.location.href = 'index.php';</script>"; 
            }

            else {
                echo "<script>alert('Incorrect password!');
                window.location.href = 'user_signup.php';
                </script>";
            }
        } else {
            echo "<script>alert('Username does not exist!');
            window.location.href = 'user_signup.php';
            </script>";
        }
    }
?>