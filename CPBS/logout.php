<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
session_destroy();
$_SESSION = array();
header("Location: index.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Staffs Movies - Log out</title>
</head>