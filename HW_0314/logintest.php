<?php
session_start();


$users = [
    "user" => password_hash("123456", PASSWORD_DEFAULT),
    "admin" => password_hash("admin123", PASSWORD_DEFAULT)
];


$userName = $_POST["userName"] ?? '';
$userPwd = $_POST["userPwd"] ?? '';


if (empty($userName) || empty($userPwd)) {
    echo "Username and password are required!";
    header("Refresh:3;url=index.php");
    exit();
}


if (isset($users[$userName]) && password_verify($userPwd, $users[$userName])) {
    session_regenerate_id(true);
    $_SESSION["check"] = ($userName === "admin") ? "admin" : "user";
    setcookie("userName", $userName, time() + 60 * 60 * 24 * 7, "/");


    if ($userName === "admin") {
        header("Location: admin.php");
    } else {
        header("Location: form.php");
    }
    exit();
} else {
    echo "Login failed! Redirecting...";
    header("Refresh:3;url=index.php");
    exit();
}
?>
