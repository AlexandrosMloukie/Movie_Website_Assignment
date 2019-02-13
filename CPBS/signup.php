<?php
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

if (!$_SERVER['REQUEST_METHOD'] != 'POST')
{
    $errors = array();
    
    //Check username for possible errors
    if(isset($_POST["username"]))
    {
        if(!ctype_alnum($_POST["username"]))
        {
            $errors[] = "The username can only contain alphanumeric characters.";
        }
        
        if (strlen($_POST["username"]) > 30)
        {
            $errors[] = "The username cannot be longer than 50 characters.";
        }
    }
    else
    {
        $errors[] = "The username field must not be empty";
    }
    
    //Check password for possible errors
    if(!isset($_POST["password"]))
    {
        $errors[] = "The password field cannot be empty.";
    }
    else
    {
        if($_POST["password"] != $_POST["confirmPass"])
        {
            $errors[] = "The two passwords did not match.";
        }
    }

    //Displaying errors if any:
    if (!empty($errors))
    {
        echo "<ul>";
        foreach($errors as $key => $value)
        {
            echo ("<li>" . $value . "</li>");
        }
    }
    else
    {
        //If not add data to database
        $sql = "INSERT INTO users(Username, Password, Email, Date) VALUES('" . mysqli_real_escape_string($con, $_POST['username']) . "', '" . sha1($_POST['password']) . "', '" . mysqli_real_escape_string($con, $_POST['email']) . "', 
        NOW())";
        
        $result = mysqli_query($con, $sql);
        if(!result)
        {
            echo "Something went wrong while registering. Please try again later.";
        }
        else
        {
            header("Location: login.php");
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
    <title>Staffs Movies - Sign Up</title>
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
          <h1>Sign Up For Free</h1>
          <p>
            <label for="username" class="usernameSign">Username:</label>
            <input id="usernameSignUp" name="username" type="text" placeholder="user242" required>
          </p>
          <p>
            <label for="email" class="emailSign">Email:</label>
            <input id="emailSignUp" name="email" type="email" placeholder="user242@gmail.com" required>
          </p>
          <p>
            <label for="password" class="passwordSign">Password:</label>
            <input id="passwordSignUp" name="password" type="password" placeholder="eg. Csdf931q90R" required>
          </p>
          <p>
            <label for="confirmPass" class="passwordConfirm">Confirm Password:</label>
            <input id="confirmPassword" name="confirmPass" type="password" placeholder="eg. Csdf931q90R" required>
          </p>
          <p class="submit-btn">
            <input type="submit" value="Become a member">
          </p>
          <p class="login-text">
            Already have an account?
            <a href="login.html" class="login-link">Log in here!</a>
          </p>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
