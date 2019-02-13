<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title></title>
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
    <div class="event-heading-container">
        <p class="heading-text"><span>MOVIE EVENTS IN STAFFORDSHIRE</span></p>
    </div>

    <div>
        <img id="film-image" src="images/avengersinfinity.png" alt="Upcoming action movie avengers infinity" width="230">
        <h2 id="avengers-film-heading">Avengers: Infinity War - Release Date Screening</h2>
        <p id="avengers-film-text">Iron Man, Thor, the Hulk and the rest of the Avengers unite to battle their most powerful enemy yet -- the evil Thanos. On a mission to collect all six Infinity Stones, Thanos plans to use the artifacts to inflict his twisted will on reality. The fate of the planet and existence itself has never been more uncertain as everything the Avengers have fought for has led up to this moment.</p>
        <div class="film-btns">
            <form id="film-reserve" target="user-events" action="" method="POST">
                <input type="submit" value="Reserve Spot">
                <input type="button" value="Watch Trailer" onclick="window.location.href='https://www.youtube.com/watch?v=6ZfuNTqbHE8'">
            </form>
        </div>
    </div>
    <div>
        <img id="film-image" src="images/oceans8.png" alt="Poster of the new up and coming movie ocean 8" width="230">
        <h2 id="ocean-film-heading">Ocean's 8 - Release Date Screening</h2>
        <p id="ocean-film-text">Criminal mastermind Debbie Ocean and seven other female thieves try to pull off the heist of the century at New York's annual Met Gala. Their target -- a necklace that's worth more than $150 million.</p>
        <div class="film-btns">
            <form id="film-reserve" target="hello-events" action="" method="POST">
                <input type="submit" value="Reserve Spot">
                <input type="button" value="Watch Trailer" onclick="window.location.href='https://www.youtube.com/watch?v=MFWF9dU5Zc0'">
            </form>
        </div>
    </div>
    <div>
        <img id="film-image" src="images/pacificrimuprising.png" alt="Poster of the new up and coming movie pacific rim uprising" width="230">
        <h2 id="pacific-film-heading">Pacific Rim Uprising - Screening</h2>
        <p id="pacific-film-text">Jake Pentecost is a once-promising Jaeger pilot whose legendary father gave his life to secure humanity's victory against the monstrous Kaiju. Jake has since abandoned his training only to become caught up in a criminal underworld. Jake is given one last chance by his estranged sister, Mako Mori, to live up to his father's legacy.</p>
        <div class="film-btns">
            <form id="film-reserve" target="hello-events" action="" method="POST">
                <input type="submit" value="Reserve Spot">
                <input type="button" value="Watch Trailer" onclick="window.location.href='https://www.youtube.com/watch?v=_EhiLLOhVis'">
            </form>
        </div>
    </div>
    <div>
        <img id="film-image" src="images/hansolo.png" alt="Poster of the new up and coming movie solo: a star wars story" width="230">
        <h2 id="solo-film-heading">Solo: A Star Wars Story - Release Date Screening</h2>
        <p id="solo-film-text">Through a series of daring escapades, young Han Solo meets his future co-pilot Chewbacca and encounters the notorious gambler Lando Calrissian.</p>
        <div class="film-btns">
            <form id="film-reserve" target="hello-events" action="" method="POST">
                <input type="submit" value="Reserve Spot">
                <input type="button" value="Watch Trailer" onclick="window.location.href='https://www.youtube.com/watch?v=dNW0B0HsvVs'">
            </form>
        </div>
    </div>
    <div>
        <img id="film-image" src="images/mission.png" alt="Poster of the new up and coming movie solo: a star wars story" width="230">
        <h2 id="fallout-film-heading">Mission: Impossible – Fallout - Release Date Screening</h2>
        <p id="fallout-film-text">When an IMF mission ends badly, the world is faced with dire consequences. As Ethan Hunt takes it upon himself to fulfill his original briefing, the CIA begins to question his loyalty and his motives. Hunt finds himself in a race against time, hunted by assassins and former allies while trying to prevent a global catastrophe.</p>
        <div class="film-btns">
            <form id="film-reserve" target="hello-events" action="" method="POST">
                <input type="submit" value="Reserve Spot">
                <input type="button" value="Watch Trailer" onclick="window.location.href='https://www.youtube.com/watch?v=wb49-oV0F78'">
            </form>
        </div>
    </div>
    </body>
</html>

