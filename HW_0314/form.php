<?php
session_start();
if (!isset($_SESSION["check"])) {
    echo "Unauthorized access!";
    header("Refresh:2;url=index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Information Form</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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

        input[type="text"], input[type="email"], input[type="number"], input[type="date"], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus, input[type="date"]:focus, select:focus, textarea:focus {
            border-color: #0072ff;
            box-shadow: 0 0 5px rgba(0, 114, 255, 0.6);
        }

        input[type="radio"], input[type="checkbox"] {
            margin-right: 5px;
            transform: scale(1.2);
        }

        .interest-checkbox {
            margin: 5px 0;
            display: inline-block;
            font-size: 14px;
        }

        .interest-basketball {
            color: #FF5722; 
        }

        .interest-sleep {
            color: #8BC34A; 
        }

        .interest-study {
            color: #2196F3; 
        }

        .interest-swimming {
            color: #FFEB3B; 
        }

        input[type="checkbox"]:checked + label {
            font-weight: bold;
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
    </style>
</head>
<body>

<div class="form-container">
    <h1>Welcome, <?= htmlspecialchars($_COOKIE["userName"] ?? "User") ?>!</h1>
    <h2>Please fill in the following information:</h2>

    <form action="info.php" method="POST">
   
        <label for="uName">Your full name:</label>
        <input type="text" id="uName" name="uName" required><br>

        <label for="uEmail">Your email address:</label>
        <input type="email" id="uEmail" name="uEmail" required><br>

        <label for="uAge">Your age (between 15 and 80 years):</label>
        <input type="number" id="uAge" name="uAge" min="15" max="80" required><br>

        <label for="uBday">Your birthdate:</label>
        <input type="date" id="uBday" name="uBday" required><br>

        <label>Your gender:</label><br>
        <input type="radio" id="male" name="uGender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="uGender" value="female" required>
        <label for="female">Female</label><br>

        <label for="uInterests">Please select your interests:</label><br>
        <div class="interest-checkbox interest-basketball">
            <input type="checkbox" id="basketball" name="uInterests[]" value="basketball">
            <label for="basketball">Basketball</label>
        </div>
        <div class="interest-checkbox interest-sleep">
            <input type="checkbox" id="sleep" name="uInterests[]" value="sleep">
            <label for="sleep">Sleep</label>
        </div>
        <div class="interest-checkbox interest-study">
            <input type="checkbox" id="study" name="uInterests[]" value="study">
            <label for="study">Study</label>
        </div>
        <div class="interest-checkbox interest-swimming">
            <input type="checkbox" id="swimming" name="uInterests[]" value="swimming">
            <label for="swimming">Swimming</label>
        </div>

        <label for="uLocation">Where are you from?</label>
        <select id="uLocation" name="uLocation" required>
            <option value="Taipei">Taipei</option>
            <option value="Kaohsiung">Kaohsiung</option>
            <option value="Chiayi">Chiayi</option>
            <option value="Taichung">Taichung</option>
            <option value="Taitung">Taitung</option>
        </select><br>

        <label for="uComment">Any additional comments or notes:</label><br>
        <textarea id="uComment" name="uComment" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <form action="logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
</div>

</body>
</html>
