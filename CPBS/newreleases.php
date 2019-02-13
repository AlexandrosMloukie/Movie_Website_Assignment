<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Staffs Movies - New Releases</title>
</head>
<body class="page-background-color">
<header>
    <div class="top-nav-container">
        <nav id="top-nav-bar">
            <ul id="top-left-nav">
                <div class="leftside-nav">
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
<p id="newreleases-text">Trending Releases</p>
<div id="movie-posters-trending-container">
    <div id="movie-posters-trending">
        <a href="events.html"><img src="images/tombraider.png" alt="Poster of the new up and coming movie tomb raider" width="230"></a>
        <a href="events.html"><img src="images/pacificrimuprising.png" alt="Poster of the new up and coming movie pacific rim uprising" width="230"></a>
        <a href="events.html"><img src="images/rampage.png" alt="Poster of the new up and coming movie rampage" width="230"></a>
        <a href="events.html"><img src="images/aquietplace.png" alt="Poster of the new up and coming movie a quiet place" width="230"></a>
        <a href="events.html"><img src="images/hansolo.png" alt="Poster of the new up and coming movie han solo" width="230"></a>
        <a href="events.html"><img src="images/oceans8.png" alt="Poster of the new up and coming movie ocean 8" width="230"></a>
        <a href="events.html"><img src="images/blackpanther.jpg" alt="Poster of the new up and coming movie black panther" width="230" height="350"></a>
    </div>
</div>
<p id="upcomingaction-text">Upcoming Action Movies</p>
<div id="movie-posters-upcoming-container">
    <div id="movie-posters-upcoming">
        <a href="events.html"><img src="images/deathwish.png" alt="Upcoming action movie death wish" width="230"></a>
        <a href="events.html"><img src="images/avengersinfinity.png" alt="Upcoming action movie avengers infinity" width="230"></a>
        <a href="events.html"><img src="images/sicario2.png" alt="Upcoming action movie sicario 2" width="230"></a>
        <a href="events.html"><img src="images/antman.png" alt="Upcoming action movie ant-man" width="230"></a>
        <a href="events.html"><img src="images/skyscraper.jpg" alt="Upcoming action movie skyscraper" width="230" height="350"></a>
        <a href="events.html"><img src="images/mission.png" alt="Upcoming action movie mission impossible" width="230"></a>
        <a href="events.html"><img src="images/gringo.jpg" alt="Upcoming action movie gringo" width="230" height="350"></a>
    </div>
</div>
<form action="search.php" method="POST" class="search-box">
    <input type="text" name="search" placeholder="Search for a movie..." id="search-text">
    <button type="submit" name="submit-search"><i class="material-icons">search</i></button>
</form>
</body>
</html>

