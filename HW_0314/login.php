<?php
session_start();
if (isset($_COOKIE["userName"])) {
    echo "Welcome back, " . htmlspecialchars($_COOKIE["userName"]) . "!<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #0072ff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0072ff;
            box-shadow: 0 0 5px rgba(0, 114, 255, 0.6);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #0072ff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ccc;
        }

        .footer a {
            color: #0072ff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .welcome-msg {
            font-size: 18px;
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <?php if (isset($_COOKIE["userName"])): ?>
        <p class="welcome-msg">Welcome back, <?= htmlspecialchars($_COOKIE["userName"]) ?>!</p>
    <?php endif; ?>

    <h1>Please log in</h1>

    <form action="logintest.php" method="post">
        <label for="userName">Username:</label>
        <input type="text" id="userName" name="userName" placeholder="Enter your username" required><br>

        <label for="userPwd">Password:</label>
        <input type="password" id="userPwd" name="userPwd" placeholder="Enter your password" required><br>

        <input type="submit" value="Login">
    </form>

    <div class="footer">
        <p>Don't have an account? <a href="register.php">Sign up</a></p>
        <p><a href="forgot-password.php">Forgot your password?</a></p>
    </div>
</div>

</body>
</html>


