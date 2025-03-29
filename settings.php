<?php 
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104999380";
    $pwd = "Nam_104999380";
    $sql_db = "s104999380_db";

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    }
?>