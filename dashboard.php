<?php

session_start();

$message ="";

if(!isset($_SESSION['logged_in'])){
    header("Location:login.php");
    exit;
}
$message = "Welcome ".$_SESSION['username'];

/* Cookie check */
$theme = $_COOKIE['theme'] ?? "light";

if ($theme === "dark") {
    $bg = "black";
    $color = "white";
} else {
    $bg = "white";
    $color = "black";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION['username'] ?></h1>

    <a href="preference.php">Change Theme</a><br><br>
    
</body>
</html>