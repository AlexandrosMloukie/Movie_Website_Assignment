<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title></title>
</head>
<body class="page-background-color">
    <header>
    <div class="top-nav-container">
        <nav id="top-nav-bar">
            <ul id="top-left-nav">
                <div>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="newreleases.php">NEW RELEASES</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="events.php">EVENTS</a></li>
                    <li><a href="forums.php">FORUMS</a></li>
                </div>
                <div class="rightside-nav">
                    <?php
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
                    {
                        echo("<li style = \"float:right\"><a class=\"left-logout\" href=\"logout.php\">LOG OUT</a></li>");
                        echo("<li style = \"float:right\"><a class=\"left-profile\" href=\"profile.php\">" . $_SESSION["username"] . "</a</li>");
                    }
                    else
                    {
                        echo("<li style=\"float:right\"><a class=\"left-signup\" href=\"signup.php\">SIGN UP</a></li>");
                        echo("<li style=\"float:right\"><a class=\"left-login\" href=\"login.php\">LOGIN</a></li>");
                    }
                    ?>
                </div>
            </ul>
        </nav>
    </div>
</header>
    <div class="top-heading">
        <p class="main-heading">ABOUT US</p>
        <p class="ourStory"><span>OUR STORY</span></p>
    </div>
    <div class="boxes">
        <img id="BCS-logo" src="images/BCS-logo.png" alt="Picture of the BCS logo">
        <img id="staff-logo" src="images/staffordshire-logo.png" alt="Picture of the Staffordshire University logo">
        <div class="first-box">
            <p>BSC stands for the British Computer Society and its purposes are to make IT helpful to society and help raise awareness of professional practitioners to the public. The BCS also encourage the advanced study of computing technology to students who are interested in IT by offering events and other activities to students. </p>
        </div>
        <div class="second-box">
            <p>Staffordshire University is a University based in Stoke-on-Trent which provides further education to student in various subjects. Staffordshire University has a high percentage of students getting employed after finishing their course.</p>
        </div>
    </div>
    <div class="mission-container">
        <p class="ourMission"><span>Our Mission</span></p>
    </div>
    <p class="mission-para">We want to provide a movie society so students who share a passion for movies can discuss their favourite movies with other movie fanatics this will allow people to meet new people and join a society that they enjoy being part of as well as allowing us to promote the student chapter and to raise awareness and encourage people to get involved.</p>
    <div class="contact-container">
            <p class="contactUs"><span>Contact Us</span></p>
    </div>
    <div class="contact-form">
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea id="message-box" name="message" placeholder="Message for us to see"></textarea>
            <button class="contact-btn" type="submit" value="Submit">Send</button>
        </form>
    </div>
    <img class="telephone" src="images/telephone.png" alt="Telephone icon">
    <p id="tel-number">+443069990580</p>
    <img class="email-icon" src="images/email.png" alt="Email icon">
    <p id="email-txt">a011946g@student.staffs.ac.uk</p>
</body>
</html>

