<?php
require 'db.php';

try {

    
  
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $student_id = $_POST['student_id'];
    $name       = $_POST['name'];
    $password   = $_POST['Password'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO students (student_id, full_name, password_hash)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$student_id, $name, $hashedPassword]);

    // OPTIONAL: auto-login after register
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $name;

    header("Location: dashboard.php");
    exit;
}



} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>

<form method="POST">
    Student ID:
    <input type="text" name="student_id" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Password:
    <input type="password" name="Password" required><br><br>

    <button type="submit">Register</button>
</form>

</body>
</html>