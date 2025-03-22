<?php
    session_start();

    if (isset($_SESSION["manage_username_login"])) {
        unset($_SESSION["manage_username_login"]); #Xoa cai Session luu tai khoan#
    }

    header("location: manage_login.php")
?>