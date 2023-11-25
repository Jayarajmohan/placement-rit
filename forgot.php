<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// rest of your code...


session_start();
include_once("./config/connection.php");

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM login_1 WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password = $row['password'];  // Replace 'password' with the actual column name
        // echo $password;
        // Send the password to the user's email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jayarajmotif@gmail.com'; // Replace with your Gmail email
            $mail->Password   = 'nffz rlkb cuqy gnrj'; // Replace with your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('jayarajmotif@gmail.com', 'Jayaraj');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your Forgotten Password';
            $mail->Body    = "Your password is: $password";

            $mail->send();
            // echo 'Password sent successfully.';
            echo "<script> alert('Password sent successfully.');
        window.location= 'login.html';
        </script>";
        } catch (Exception $e) {
            // echo "Error sending password: {$mail->ErrorInfo}";
            echo "<script> alert('Error sending password:');
            window.location= 'login.html';
            </script>";
        }
    } else {
        // echo "Email not found in the database.";
        echo "<script> alert('Email not found in the database.');
            window.location= 'login.html';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Forgot Password</title>
</head>
<body>
<div class="container">
<div id="card-1" class="card">
<a href="login.html" class="back-button">Back</a>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="forgot">Submit</button>
    </form>
</div>
</div>
</body>
</html>
