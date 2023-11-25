<?php

include_once("./config/connection.php");

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = 0;  // Assuming 'type' is a constant value
$approved_or_not = 0;  // Assuming 'approved_or_not' is initialized to 0

// Create a prepared statement
$stmt = $conn->prepare("INSERT INTO login_1 (name, email, password, type, approved_or_not) VALUES ( ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("sssii", $name, $email, $password, $type, $approved_or_not);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Record inserted successfully";
    echo "<script> alert('Registration successfull.');
            window.location= 'login.html';
            </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>
