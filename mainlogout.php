<?php
session_start();
// Hủy tất cả các session
session_unset();
session_destroy();
// Chuyển hướng về trang chính
header("Location: index.php");
exit();
?>