<?php
    session_start();

    include ("settings.php");
    

    $name = sanitizeInput($_POST["name"]);
    $pwd  = sanitizeInput($_POST["pwd"]);
    $sql = "SELECT * FROM $table WHERE name = '$name' AND pwd = '$pwd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row["name"] === $name and $row["pwd"] === $pwd) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            header("Location: manage.php");
            exit();
        }
        else {
            header("Location: login.php?error=Incorrect name or password");
            exit();
        }
    } else {
        header("Location: login.php?error");
        exit();
    }

?>