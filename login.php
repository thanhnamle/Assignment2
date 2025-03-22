<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/142309adca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Open+Sans:wght@600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
    <body class="login_body">

        <div class="intro_login_content">
            <h1 id="intro_login_heading">HR Manager Page <br> Welcome back! </h1>
            <video autoplay muted loop class="intro_login_video">
                <source src="styles/images/12802144_3840_2160_30fps.mp4" type="video/mp4">
            </video>
        </div>
        
        
        <!-- Login form -->
        <div class="login_page">
                <form action = "process_login.php" method = "post">
                    <div class="login_pwd">
                        <p>Username: s104999380<p>
                        <p>Password: Nam_104999380<p></p>
                    </div>
                    
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'] . "Wrong username or password<br>";
                    }
                    
                    ?>
                    <div class="login_interface">
                        <label>Username</label>
                        <input type="text" name="name" placeholder="Username" required></br>
                        <label>Password</label>
                        <input type ="password" name="pwd" placeholder="Password" required></br>
                    </div>
                    
                    <div class="login_manage_btn">
                        <button class="login_btn_manager" type ="submit">Login</button>
                    </div>

                </form>
                <div>
                    <form action="index.php">
                        <button class="login_back_button" type="submit">Back to Home Page</button>
                    </form>
                </div>
            </div>
        
    </body>
</html>