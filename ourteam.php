<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bùi Quang Đoàn - 104993227">
    <title>Group</title>
    <link rel= "stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body class ="body_about">
    <!-- Header section -->
    <?php 
        include './include/header.inc'; 
    ?>

    <!-- Group information -->
    <div class = "about_introduction3">
        <div class ="our_team">
            <!-- Group information -->
            
                <h1 class = "about_header_group">Group Details</h1>
                <div class ="about_introduction2">
                      <div class = "form">
                        <div class ="form_first">
                            <p class = "paragraph1">Group name:</p>
                            <p class = "paragraph2">SBTC Emotion Wave</p>
                        </div>
                
                        <div class ="form_first">
                            <p class = "paragraph1">Group ID:</p>
                            <p class = "paragraph2">COS10026</p>
                        </div>
                
                        <div class ="form_first">
                            <p class = "paragraph1">Group email:</p>
                            <p class = "paragraph2">104993227@student.swin.edu.au</p>
                        </div>
                
                        <div class ="form_first">
                            <p class = "paragraph1">Course:</p>
                            <p class = "paragraph2">Web Technology Project</p>
                        </div>
                
                        <div class ="form_first">
                            <p class = "paragraph1">Tutor:</p>
                            <p class = "paragraph2">Trung Nguyen</p>
                        </div>
                      </div>
                </div>
            


            
                <h1 class = "about_header_group">Our members</h1>
                <div class ="Our_members">
                    <div class ="member_box">
                        <div class="mem_center">
                            <img src="styles/images/logo-doan.jpg" alt="" class = "image_box">
                            <h2 class="mem_name">Bùi Quang Đoàn</h2>
                            <p>Jobs: About and ourteam</p>
                            <P>Contact: <a href="mailto:104993227@student.swin.edu.au">Bui Quang Doan</a></P>
                        </div> 
                    </div>

                    <div class ="member_box">
                        <div class="mem_center">
                            <img src="styles/images/logo-myan.jpg" alt="" class = "image_box">
                            <h2 class="mem_name">Lương Mỹ Ân</h2>
                            <p>Jobs: Jobs Description</p>
                            <P>Contact: <a href="mailto:105195040@student.swin.edu.au">Luong My An</a></P>
                        </div> 
                    </div>

                    <div class ="member_box">
                        <div class="mem_center">
                            <img src="styles/images/logo-viethung.jpg" alt="" class = "image_box">
                            <h2 class="mem_name">Trương Việt Hưng</h2>
                            <p>Jobs: Home</p>
                            <P>Contact: <a href="mailto:104775470@student.swin.edu.au">Truong Viet Hung</a></P>
                        </div> 
                    </div>

                    <div class ="member_box">
                        <div class="mem_center">
                            <img src="styles/images/logo-thanhnam1.jpg" alt="" class = "image_box">
                            <h2 class="mem_name">Lê Thành Nam</h2>
                            <p>Jobs: Apply form</p>
                            <P>Contact: <a href="mailto:104999380@student.swin.edu.au">Le Thanh Nam</a></P>
                        </div> 
                    </div>
                </div>
            

            <!--Timetable-->
            <h1 class="about_header_group">Our timetable</h1>
            <div class="schedule">
                <table class="about_table">
                    <thead>
                        <tr class = "about_tr">
                            <th class="about_th">Day/Time</th>
                            <th class="about_th">Monday</th>
                            <th class="about_th">Tuesday</th>
                            <th class="about_th">Wednesday</th>
                            <th class="about_th">Thusday</th>
                            <th class="about_th">Friday</th>
                            <th class="about_th">Saturday</th>
                            <th class="about_th">Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class = "about_tr">
                            <td class="about_td" style="background-color: yellowgreen;" >Morning</td>
                            <td class ="about_td">TNE10006<br>7AM-11AM</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">STA10003<br>7AM-11AM</td>
                            <td class ="about_td">&nbsp;</td>
                        </tr>
                        <tr class = "about_tr">
                            <td class="about_td" style="background-color: yellowgreen">Afternoon</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">COS10026<br>1PM-5PM</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                        </tr>
                        <tr class = "about_tr">
                            <td class="about_td" style="background-color: yellowgreen">Evening</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                            <td class ="about_td">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Footer section -->
    <?php 
        include './include/footer.inc'; 
    ?>
</body>
</html>