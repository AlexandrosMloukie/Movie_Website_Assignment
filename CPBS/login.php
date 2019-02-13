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

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
{
    header("Location: index.html");
}
else
{
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $errors = array();
        
        if (!isset($_POST["username"]))
        {
            $errors[] = "The username field must not be empty.";
        }
        
        if (!isset($_POST["password"]))
        {
            $errors[] = "The password field must not be empty.";
        }
        
        if (!empty($errors))
        {
            echo ("<ul>");
            foreach($errors as $key => $val)
            {
                echo ("<li>" . $val . "</li>");
            }
            echo ("</ul>");
        }
        else
        {            
            $sql = "SELECT user_id, Username FROM users WHERE Username = '" . mysqli_real_escape_string($con, $_POST["username"]) . "' AND Password = '" . sha1($_POST["password"]) . "'";
            
            $result = mysqli_query($con, $sql);
            
            if(!$result)
            {
                echo ("Something went wrong. Please try again later");
            }
            else
            {
                if(mysqli_num_rows($result) == 0)
                {
                    echo ("You have supplied a wrong username/password combination");
                }
                else
                {
                    //Login Successful
                    
                    $_SESSION["loggedin"] = true;
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION["user_id"] = $row["user_id"];
                        $_SESSION["username"] = $row["Username"];
                    }
                    
                    header("Location: index.php");
                }
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
    <title>Staffs Movies - Log in</title>
</head>
<body id="signup-bg">
    <header>
    <nav>
        <ul class="signup-nav">
        <li><a href="index.php">HOME</a></li>
        </ul>
    </nav>
    </header>
    <section>
        <div id="main_container">
            <div id="register">
            <form action="" method="POST">
                <h1>Welcome back!</h1>
                <p>
                <label for="username" class="usernameSign">Username:</label>
                <input id="usernameSignUp" name="username" type="text" placeholder="user242" required>
                </p>
                <p>
                <label for="password" class="passwordSign">Password:</label>
                <input id="passwordSignUp" name="password" type="password" placeholder="eg. Csdf931q90R" required>
                </p>
                <p class="signin_btn">
                <input type="submit" value="Login">
                </p>
                <p class="login-text">
                Don't have an account?
                <a href="signup.php" class="login-link">Sign up here!</a>
                </p>
            </form>
            </div>
        </div>
    </section>
</body>
</html>

