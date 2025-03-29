<?php
    session_start();
    // Sau khi xác thực thành công
    if($login_successful) {
        $_SESSION['username'] = $username; // $username là tên người dùng từ database
        header("Location: index.php");
        exit();
    }
?>