<?php 
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104999380";
    $pwd = "Nam_104999380";
    $sql_db = "s104999380_db";

    // Thiết lập thời gian chờ kết nối
    $conn = mysqli_init();
    mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10);  // Đặt thời gian chờ 10 giây
    
    // Kết nối với xử lý lỗi tốt hơn
    try {
        mysqli_real_connect($conn, $host, $user, $pwd, $sql_db);
        if (mysqli_connect_errno()) {
            echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
        }
    } catch (Exception $e) {
        echo "<p>Database connection failed: " . $e->getMessage() . "</p>";
    }
?>