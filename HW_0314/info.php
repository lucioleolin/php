<?php
session_start();
if (!isset($_SESSION["check"])) {
    echo "Unauthorized access!";
    header("Refresh:2;url=login.php");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$uName = sanitize($_POST['uName'] ?? 'N/A');
$uEmail = filter_var($_POST['uEmail'] ?? 'N/A', FILTER_SANITIZE_EMAIL);
$uAge = sanitize($_POST['uAge'] ?? 'N/A');
$uBday = sanitize($_POST['uBday'] ?? 'N/A');
$uGender = sanitize($_POST['uGender'] ?? 'N/A');
$uComment = sanitize($_POST['uComment'] ?? 'N/A');

$uInterests = isset($_POST['uInterests']) ? $_POST['uInterests'] : [];
$uLocation = sanitize($_POST['uLocation'] ?? 'N/A');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
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

        .info-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0072ff;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        strong {
            color: #0072ff;
        }

        a {
            color: #0072ff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
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

        .interests {
            font-size: 16px;
            font-weight: normal;
        }

        .back-btn {
            display: block;
            margin-top: 20px;
            background-color: #0072ff;
            padding: 12px;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="info-container">
    <h2>Form Submission Details</h2>
    <p><strong>Name:</strong> <?= $uName ?></p>
    <p><strong>Email:</strong> <?= $uEmail ?></p>
    <p><strong>Age:</strong> <?= $uAge ?></p>
    <p><strong>Birthday:</strong> <?= $uBday ?></p>
    <p><strong>Gender:</strong> <?= $uGender ?></p>

    <p><strong>Your Interests:</strong>
        <?= !empty($uInterests) ? implode(", ", $uInterests) : 'No interests selected.' ?>
    </p>

    <p><strong>Location:</strong> <?= $uLocation ?></p>

    <p><strong>Comments:</strong> <?= nl2br($uComment) ?></p>

    <div class="footer">
        <a href="form.php" class="back-btn">Back to Form</a> | 
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>

