<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="live-exam.css">
    <title>Exam-Intro-page</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h4>Live Exam English</h4>
            <hr>
        </div>
        <div class="content">
            <h5 class="title">Instructions:</h5>
            <ul>
                <li>make the instructions</li>
                <li>make the instructions</li>
                <li>make the instructions</li>
                <li>make the instructions</li>
                <li>make the instructions</li>
            </ul>
        </div>
        <div class="button">
            <button onclick="window.location.href = 'live-exam_2.php'">Start Exam</button>
            <button onclick="window.location.href = 'student-dash.php'">Cancel Exam</button>
        </div>
    </div>
</body>
</html>