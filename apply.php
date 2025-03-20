<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apply Jobs">
    <meta name="keywords" content="HTML, Form, tags">
    <meta name="author" content="Le Thanh Nam - 104999380">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>Apply Jobs</title>
</head>
<body id="apply-background">
        <!-- Header section -->
        <?php require_once("header.inc"); ?>

        <!-- Form section -->
        <div id="form-align">
            <form class="form-form" action="process_eoi.php" method="post" novalidate="novalidate">
                <fieldset class="form-all">
                    <div class="form-font" id="header">
                        <h1>Job Application Form</h1>
                        <p>Please fill out all sections</p>
                    </div>
    
                    <fieldset class="spacing">
                        <legend class="form-infor">Personal Details</legend>
                        <p>
                            <label class = "form-font" for="jobnumber">Job Reference Number</label> <br>
                            <input type="text" name="jobnumber" id="jobnumber" pattern="[A-Za-z0-9]{5}"  required = "required">
                        </p>
                        <p>
                            <label class = "form-font" for="firstname">First Name</label> <br>
                            <input type="text" id="firstname" name="firstname" maxlength="20" required = "required">
                        </p>
                        <p>
                            <label class = "form-font" for="lastName">Last Name</label> <br>
                            <input type="text" id="lastName" name="lastName" maxlength="20" required = "required">
                        </p>
                        <p>
                            <label class = "form-font" for="dateofbirth">Date of Birth
                            <input type="date" name="bday" id="dateofbirth" required = "required">
                            </label>
                        </p>
                        
                    </fieldset>
                
                    <fieldset class="spacing">
                        <legend class="form-infor">Gender</legend>
                            <input type="radio" id="male" name="gender" value="male" class="radio" required="required">
                            <label for="male" class="form-font radio_name choice1">Male</label>
                                
                            <input type="radio" id="female" name="gender" value="female" class="radio">
                            <label for="female" class="form-font radio_name choice2">Female</label>

                            <input type="radio" id="othergender" name="gender" value="othergender" class="radio">
                            <label for="othergender" class="form-font radio_name choice3">Others</label>
                
                    </fieldset>
    
                    <fieldset class="spacing">
                        <legend class="form-infor">Contact Address</legend>  
                            <p>
                                <label class = "form-font" for="street">Street Address</label> <br>
                                <input type="text" name="street" id="street" maxlength="40" required>
                            </p>
                            <p>
                                <label class = "form-font" for="suburb">Suburb/Town</label> <br>
                                <input type="text" name="suburb" id="suburb" maxlength="40" required>
                            </p>
                            <p>
                                <label class = "form-font" for="state">State</label> <br>
                                <select name="state" id="state" required>
                                    <option class= "state_choice" value="" disabled hidden selected>Please select a choice</option>
                                    <option class= "state_choice" value="VIC">VIC</option>
                                    <option class= "state_choice" value="NSW">NSW</option>
                                    <option class= "state_choice" value="QLD">QLD</option>
                                    <option class= "state_choice" value="NT">NT</option>
                                    <option class= "state_choice" value="WA">WA</option>
                                    <option class= "state_choice" value="SA">SA</option>
                                    <option class= "state_choice" value="TAS">TAS</option>
                                    <option class= "state_choice" value="ACT">ACT</option>
                                </select>
                            </p>
                            <p>
                                <label class = "form-font" for="postcode">Postcode</label> <br>
                                <input type="text" name="postcode" id="postcode" pattern="\d{4}" required>
                            </p>
                            
                    </fieldset>
                
                    <fieldset class="spacing">
                        <legend class="form-infor">Contact Information</legend>
                            <p>
                                <label class = "form-font" for="email">Email Address:</label> <br>
                                <input type="text" id="email" name="email" required> <br>
                            </p>
                            <p>  
                                <label class = "form-font" for="phone">Phone Number:</label> <br>
                                <input type="text" id="phone" name="phone" pattern="\d{8,12}" required>
                            </p>
                            
                                
                    </fieldset>
                
                    <fieldset class="spacing">
                        <legend class="form-infor">Skill Lists</legend>
                        <p>
                            <label class="checkbox_name form-font" for="HTML">HTML
                                <input type="checkbox" name="tech[]" value="html" id="HTML">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="CSS">CSS
                                <input type="checkbox" name="tech[]" value="css" id="CSS">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="Javascript">Javascript
                                <input type="checkbox" name="tech[]" value="javascript" id="Javascript">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="PHP">PHP
                                <input type="checkbox" name="tech[]" value="php" id="PHP">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="MySQL">MySQL
                                <input type="checkbox" name="tech[]" value="mysql" id="MySQL">
                                <span class="tick"></span>
                            </label>
                        </p>
                        <p>
                            <label class="checkbox_name form-font" for="Other">Other skills
                                <input type="checkbox" name="tech[]" value="other" id="Other">
                                <span class="tick"></span>
                                <textarea id="form-textarea" name="comments" rows="5" cols="50" placeholder="Write description of your other skills here..."></textarea>
                            </label>
                        </p>
                        
                    </fieldset>
                </fieldset>
                
    
                <div class="button">
                    <input type="submit" value="Apply">
                    <input type="reset" value="Reset form">
                </div>
            </form>
        </div>

        <!-- Footer section -->
        <?php require_once("footer.inc"); ?>
</html>