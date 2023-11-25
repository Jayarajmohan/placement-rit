<?php
include_once("../config/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate Email Format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@rit\.ac\.in$/', $email)) {
        die("Invalid Email Format");
    }

    // Validate Password
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
        die("Invalid Password");
    }

    // Store User Data in Database
    $stmt = $conn->prepare("INSERT INTO login (name, username, email, password, type) VALUES (?, ?, ?, ?, 1)");
    $stmt->bind_param("ssss", $name, $username, $email, $password);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        // Registration successful
        echo "<script> alert('Registration successful. Sending email...');
        window.location= 'dashboard-admin.php';
        </script>";

        // Send Email with Username and Password
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // Specify the SMTP server
            $mail->SMTPAuth   = true;               // Enable SMTP authentication
            $mail->Username   = 'jayarajmotif@gmail.com'; // Replace with your Gmail email
            $mail->Password   = 'nffz rlkb cuqy gnrj'; // Replace with your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('jayarajmotif@gmail.com', 'Jayaraj');
            $mail->addAddress($email);      // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Registration Details';
            $mail->Body    = "Hello $name,<br><br>Your username: $username<br>Your password: $password";

            $mail->send();
            // echo "<script> alert('Email sent successfully.');
            // </script>";
            echo "<script> alert('Registration successful. Email sent successfully.');
        window.location= 'dashboard-admin.php';
        </script>";
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
