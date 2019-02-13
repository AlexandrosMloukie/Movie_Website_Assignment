<?php
session_start();
//connect to phpMyAdmin database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'smsdatabase';

$con = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno())
{
    echo("Failed to connect: " . mysqli_connect_error());
}

//Check if the user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
{
    
}
else
{
    header("Location: index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Staffs Movies - Forums</title>
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
                        echo("<li style = \"float:right\"><a class=\"left-logout\" href=\"logout.php\">LOG OUT</a></li>");
                        echo("<li style = \"float:right\"><a class=\"left-profile\" href=\"profile.php\">" . $_SESSION["username"] . "</a</li>");
                        ?>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <div id="wrapper">
        <div id="menu">
            <a class="item" href="newtopic.php">Create a topic</a>
            <div id="userbar">
            <div id="userbar"></div>
        </div>
        <div id="content"></div>
            <?php
            $sql = "SELECT topic_id, topic_name, topic_date, topic_by FROM topics;";
                
            $result = mysqli_query($con, $sql);
            if(!$result)
            {
                echo("Problem with the database. Please try again later");
            }
            else
            {
                echo("<table border = '1' id = 'content'><tr><th>Topic</th><th>Topic By</th></tr>");
                
                while($row = mysqli_fetch_assoc($result))
                {
                    echo("<tr>");
                    echo("<td class = 'leftpart'>");
                    echo("<h3><a href='topic.php?id=" . $row["topic_id"] . "'>" . $row['topic_name'] . "</a></h3>");
                    echo("</td>");
                    echo("<td class = 'rightpart'>");
                    //Get username of topic creator
                    $sql = "SELECT Username FROM users WHERE user_id = " . $row["topic_by"] . ";";
                    $check = mysqli_query($con, $sql);
                    $query = mysqli_fetch_assoc($check);
                    echo("By " . $query["Username"] . " at " . $row["topic_date"]);
                    echo("</td>");
                    echo("</tr>");
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>

