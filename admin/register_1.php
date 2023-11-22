<?php
include_once("./config/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $unique_code = $_POST["unique_code"];



    // Validate Email Format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@rit\.ac\.in$/', $email)) {
        die("Invalid Email Format");
    }

    // Validate Password
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
        die("Invalid Password");
    }

    // Store User Data in Database (assuming you have a MySQL database set up)
    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO login (name,username, email, password, type) VALUES (?, ?, ?, 1)");

    // Bind parameters and execute
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    // Check for success
    if ($stmt->affected_rows === 1) {
        // echo "Registration successful!";
        echo "<script> alert('Registration successful');
        window.location= 'dashboard-admin.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    // $conn->close();
}
?>
