<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lương Mỹ Ân - 105195040" />
    <title>Jobs Description</title>
    
    <link rel="stylesheet" href="./styles/style.css">
   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Oswald:wght@200..700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="job-description">
     <!-- Header section -->
     <?php include("include/header.inc"); ?>
    <!-- Jobs description section -->
    <?php
    
    require_once("settings.php"); // Gọi file kết nối
    
    // Kiểm tra kết nối
    if (!$conn) {
        die("<p>Unable to connect to the database.</p>");
    }
    
    // Tạo truy vấn SQL
    $query = "SELECT * FROM jobs";
    
    // Thực thi truy vấn
    $result = mysqli_query($conn, $query);
    
    // test the connection
    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<div id='job_list'>";

            while ($row = mysqli_fetch_assoc($result)) {
                $job_id = htmlspecialchars($row["job_reference_num"]);
                echo "<section class='job' id='job_$job_id'>";
                echo "<input type='checkbox' id='show$job_id' class='card_inputtag'>";
                echo "<label for='show$job_id' class='job_card'>";
                echo "<img src='" . htmlspecialchars($row["job_image"]) . "' alt='Job Image' class='card_img'>";
                echo "<span class='card_name'>" . htmlspecialchars($row["card_name"]) . "</span>";
                echo "</label>";
                echo "<div class='content'>";
                echo "<div class='position_col'>";
                echo "<h2 class='position_name'>" . htmlspecialchars($row["job_title"]) . "</h2>";
                echo "<p class='ref_number'>" . htmlspecialchars($row["job_reference_num"]) . "</p>";
                echo "</div>";
                echo "<div class='main'>";
                echo "<div class='description_col'>";
                echo "<div class='def_head'>";
                echo "<h3 class='des_title'>Job Brief</h3>";
                echo "<p class='def_content'>" . nl2br(htmlspecialchars($row["job_brief"])) . "</p>";
                echo "</div>";
                echo "</div>";
                echo "<div class='details'>";
                echo "<div class='details_title'>";
                echo "<h3 class='des_title'>Key Responsibilities</h3>";
                echo "<ul class='def_list'>";
                foreach (preg_split('/\r\n|\r|\n/', $row["key_responsibilities"]) as $res) {
                    echo "<li class='def_content'>" . htmlspecialchars($res) . "</li>";
                }
                
                echo "</ul>";
                echo "</div>";
                echo "<div class='details_title'>";
                echo "<h3 class='des_title'>Skills and Qualifications</h3>";
                echo "<h4 class='def_subtitle'>Essentials</h4>";
                echo "<ul class='def_list'>";
                foreach (explode("\n", $row["essential_skills"]) as $skill) {
                    echo "<li class='def_content'>" . htmlspecialchars($skill) . "</li>";
                }
                echo "</ul>";
                echo "<h4 class='def_subtitle'>Preferable Skills</h4>";
                echo "<ul class='def_list'>";
                foreach (explode("\n", $row["preferable_skills"]) as $skill) {
                    echo "<li class='def_content'>" . htmlspecialchars($skill) . "</li>";
                }
                echo "</ul>";
                echo "</div>";
                echo "<div class='details_title'>";
                echo "<h3 class='des_title'>Salary Range</h3>";
                echo "<ul class='def_list'>";
                foreach (explode("\n", $row["salary_range"]) as $salary) {
                    echo "<li class='def_content'>" . htmlspecialchars($salary) . "</li>";
                }
                echo "</ul>";
                echo "</div>";
                echo "</div>";
                echo "<aside class='benefits'>";
                echo "<h3 class='des_title'>Benefits</h3>";
                echo "<h4 class='def_subtitle'>General Benefits</h4>";
                echo "<ol class='def_list'>";
                foreach (explode("\n", $row["general_benefits"]) as $benefit) {
                    echo "<li class='def_content'>" . htmlspecialchars($benefit) . "</li>";
                }
                echo "</ol>";
                echo "<h4 class='def_subtitle'>Position Benefits</h4>";
                echo "<ol class='def_list'>";
                foreach (explode("\n", $row["position_benefits"]) as $benefit) {
                    echo "<li class='def_content'>" . htmlspecialchars($benefit) . "</li>";
                }
                echo "</ol>";
                echo "</aside>";
                echo "<p class='ply_sence'>Are you ready to become a part of our team? Complete the form and apply now!</p>";
                echo "<label class='apl-btn gr-btn'><a class='apply' href='apply.php'>Apply</a></label>";
                echo "<label for='show$job_id' class='back-btn gr-btn'>Close</label>";
                echo "</div>";
                echo "</section>";
            }
        
            echo "</div>";
        } else {
            echo "<p>No job listings found.</p>";
        }
        
        // Đóng kết nối CSDL
        mysqli_close($conn);
            }
     
   
   
    
    ?>
    
        <!-- Footer section -->
        <?php include("include/footer.inc"); ?>
</body>
</html>