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


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sql = "INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES ('" . $_POST["comment"] . "', NOW(), " . $_GET['id'] . ", '" . $_SESSION["user_id"] ."');" ;
            
    $result =mysqli_query($con, $sql);
            
    if (!$result)
    {
         echo("Sorry, you comment couldn't be submitted. Please try again later.");
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Staffs Forums - Topic</title>
</head>
<body class = "page-background-color">
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
        <?php
        $sql = "SELECT posts.post_content, posts.post_by, posts.post_date, posts.post_topic, users.user_id, users.Username FROM posts LEFT JOIN users ON posts.post_by = users.user_id WHERE posts.post_topic = " . mysqli_real_escape_string($con, $_GET['id'] . " ;");
    
        $result = mysqli_query($con, $sql);
    
        echo("<table border = '1' id = 'content'><tr><th></th>");
    
        while($row = mysqli_fetch_assoc($result))
            {
                    echo("<tr>");
                    echo("<td class = 'rightpart'>");          
                    echo("<h3>" . $row["Username"] . "</h3>" . $row["post_date"]);
                    echo("</td>");
                    echo("<td class = 'leftpart'>");  
                    echo($row["post_content"]);
                    echo("</td>");
                    echo("</tr>");
            }
            
        echo('<form action="" method="POST">');
                echo('<textarea rows = 4 cols = 10 name = "comment"></textarea>');
                echo('<input type="submit" value="Post">');
        echo('</form>');    
        
        ?>
        
        </div>
    </div>
</body>
</html>

