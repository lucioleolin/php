<?php
session_start();
if ($_SESSION["check"] !== "admin") {
    echo "Unauthorized access!";
    header("Refresh:2;url=index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <p>Admin dashboard content goes here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
