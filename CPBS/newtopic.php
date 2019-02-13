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

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $sql = "INSERT INTO topics (topic_name, topic_date, topic_by) VALUES ('" . mysqli_real_escape_string($con, $_POST["title"]) ."', NOW(), '" . $_SESSION["user_id"] . "');";
    
    $result = mysqli_query($con, $sql);
    
    if($result)
    {
        $sql = "SELECT MAX(topic_id) FROM topics WHERE topic_by = " . $_SESSION["user_id"] .";";
        
        $result = mysqli_query($con, $sql);
        
        if($result)
        {
            $row = mysqli_fetch_assoc($result);
            
            $sql = "INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES ('" . mysqli_real_escape_string($con, $_POST["comment"]) . "', NOW(), '" . $row["MAX(topic_id)"] . "', '" . $_SESSION["user_id"] . "');";
            
            
            $insresult = mysqli_query($con, $sql);
            
            if($insresult)
            {           
            header("Location: topic.php?id=" . $row["MAX(topic_id)"]);
            }
        }
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Staffs Movies - Create Topic</title>
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
                        echo("<li style = \"float:right\"><a class=\"left-profile\" href=\"profile.php\">" . $_SESSION["username"] . "</a></li>");
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
    
    <div id="wrapper">
        <div id="content">
            <p class="item">Create a topic</p>
        <?php
            
        echo('<form action="" method="POST">');
            echo('<label for="title">Title: </label>');
            echo('<input type="text" name="title">');
            echo('<textarea rows = 4 cols = 10 name = "comment"></textarea>');
            echo('<input type="submit" value="Post">');
        echo('</form>');    
        
        ?>
        
        </div>
    </div>
</body>
</html>

