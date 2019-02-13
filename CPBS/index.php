<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Staffs Movies - Homepage</title>
</head>
<body>
<div id="movie-background">
    <img src="images/movie_bg.png" alt="Background with different movie titles">
</div>
<div id="staffordshire-logo">
    <img src="images/staffordshirelogo.png" alt="Staffordshire Universtiy Logo">
</div>
<p id="main-text">Enjoy movies with others!</p>
<p id="small-text-first">Come and watch movies with others from Staffordshire University</p>
<p id="small-text-second">Sign Up now and reserve a spot for the events!</p>
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
    <div class="signup-container">
        <a href="signup.html">
            <button class="signup-btn"><span>Sign Up Now!</span></button>
        </a>
    </div>
</body>
</html>
