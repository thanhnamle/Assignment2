<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <meta name="author" content="Bùi Quang Đoàn - 104993227">
    <title>About</title>
    <link rel="stylesheet" href="styles/style.css">
    <!-- font chu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body class ="body_about">
    <!-- Header section -->
    <?php require_once("header.inc"); ?>

    <!-- About section -->
    <div class="about_page">
        <div class="about_section1">
            <div class="about_container1">
                <h2 class="about_title">Jobslanding Technology Company Information</h2>
                <p>At Jobslanding Technology, we are revolutionizing the way companies and job seekers connect. As a leading innovator in the tech industry, we pride ourselves on creating cutting-edge solutions that drive progress and success. Our mission is to foster an environment where creativity, innovation, and collaboration thrive.<br> We are currently seeking talented professionals to join our dynamic team in the following roles: <strong>Frontend Developers, Backend Developers, Data Engineers, Quality Control Engineers, and Automation Engineers</strong>.</p>
                
            </div>

            <div class="why_choose">
                <h2 class="about_title">Why Jobslanding Technology is the Right Choice</h2>
                <ul>
                    <li><em><strong>Innovative Projects:</strong></em> Work on groundbreaking projects that challenge the status quo and drive technological advancements.</li>
                    <li><em><strong>Collaborative Environment:</strong></em> Join a team of passionate and dedicated professionals who are committed to excellence and continuous improvement.</li>
                    <li><em><strong>Professional Growth:</strong></em> Access opportunities for learning, development, and career advancement as you grow with us.</li>
                    <li><em><strong>Impactful Work:</strong></em> Contribute to meaningful projects that have a real-world impact and make a difference in the industry.</li>
                </ul>
            </div>
        </div>
        <!-- Employment Rate -->
        <div class="about_section1">
          <h2 class="about_title">Professional Development</h2>
        </div>

        <div class = "about_chart-layout">
            <div class ="about_chart-layout_item" style="--percent: 50%">Tim Cook 50%</div>
            <div class ="about_chart-layout_item" style="--percent: 40%">J97 Company 40%</div>
            <div class ="about_chart-layout_item" style="--percent: 70%">BabyOil 70%</div>
            <div class ="about_chart-layout_item" style="--percent: 60%">BeSolll 60%</div>
            <div class ="about_chart-layout_item" style="--percent: 80%">MTP WOW 80%</div>
            <div class ="about_chart-layout_item" style="--percent: 95%">JobsLanding 95%</div>
        </div>


        <!-- OUR PROFILE -->
        <div class="about_section1">
            <h2 class="about_title">More</h2>
        </div>

        <div class="about_section2">
            

            <div  class="about_item">
                <a href="ourteam.html">
                    <img src="styles/images/logo-team.jpg" alt=""  class ="about_image">
                </a>
                <a href="ourteam.html"  class = "about_heading">TEAM PROFILE</a>
                <p class ="about_description">Details about our members</p>
            </div>

            <div class="about_item">
                <a href="achievement.html">
                    <img src="styles/images/logo-achievement3.png" alt="" class ="about_image">
                </a>
                <a href="achievement.html" class = "about_heading">ACHIEVEMENTS</a>
                <p class ="about_description">Details about our achievements</p>
            </div>

            <div class="about_item">
                <a href="jobs.html">
                    <img src="styles/images/logo-hiring1.png" alt="" class ="about_image">
                </a>
                <a href="jobs.html" class = "about_heading">GET A JOB</a>
                <p class ="about_description">Details about jobs</p>
            </div>
        </div>
    </div>

    <!-- Footer section -->
    <?php require_once("footer.inc"); ?>
</body>
</html>