<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $selectedThemes = $_POST['theme']; // This is an array
setcookie("theme", implode(',', $selectedThemes), time() + 86400 * 30);

    header("Location: dashboard.php");
    exit;
}
?>

<form method="POST">
    <input type="checkbox" name="theme[]" value="light"> Light
<input type="checkbox" name="theme[]" value="dark"> Dark
<input type="checkbox" name="theme[]" value="darks"> Darks
    <button>Save</button>
</form>