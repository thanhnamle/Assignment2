<?php
    session_start();

    if (isset($_SESSION['manage_username_login'])) {
        header("location: manage.php");
    }

    $error_message = "";

    if (isset($_POST["manage_login_button"])) { #check xem nut dang nhap da dc click hay chua#
        $manage_username_login = $_POST["manage_username_login"];
        $manage_password_login = $_POST["manage_password_login"];

        if (empty($manage_username_login) && empty($manage_password_login)) {
            $error_message = "Please Enter Username and Password!"; // Both fields empty
            
        } elseif (empty($manage_username_login)) {
            $error_message = "Please Enter Username!"; // Only username missing
            
        } elseif (empty($manage_password_login)) {
            $error_message = "Please Enter Password!"; // Only password missing
            
        } elseif ($manage_username_login == "s104999380" && $manage_password_login == "Nam_104999380") {
            $_SESSION["manage_username_login"] = $manage_username_login;
            header("Location: manage.php");
            exit();
        } else {
            $error_message = "Username Or Password Is Incorrect!"; // Incorrect credentials
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>LOG IN </title>
</head>
<body>
    <div id = "manage_form_body">
        <div class="intro_login_content">
            <h1 id="intro_login_heading">HR Manager Page <br> Welcome back! </h1>
            <video autoplay muted loop class="intro_login_video">
                <source src="styles/images/11738195-hd_1920_1080_24fps.mp4" type="video/mp4">
            </video>
        </div>


        <form action="manage_login.php" method="post" id = "manage_form_login">
            <h1 class = "manage_heading">MANAGEMENT</h1>

            <div class = "display_account">
                <div class = "manage_form_group_user">
                    <p class = "manage_paragraph1">User:</p>
                    <p class = "manage_paragraph2">s104999380</p>
                </div>

                <div class = "manage_form_group_user">
                    <p class = "manage_paragraph1">Password:</p>
                    <p class = "manage_paragraph2">Nam_104999380</p>
                </div>
            </div>

            <div class = "manage_form_group">
                <i id="icon_manager" class="far fa-user"></i>
                <input type="text" name = "manage_username_login" class = "manage_form_input" placeholder="Manager Username">
            </div>

            <div class = "manage_form_group">
                <i id="icon_manager" class="fas fa-key"></i>
                <input type="password" name = "manage_password_login" class = "manage_form_input" placeholder="Manager Password">
            </div>

            <div class = "manage_form_error">
                <?php echo $error_message; ?>
            </div>

            
            <input type="submit" name = "manage_login_button" class = "manage_login_button" value ="Login">

            <a href="index.php" class="login_back_button">Back to Home Page</a>
            
        </form>
            
    </div>
    
</body>
</html>

