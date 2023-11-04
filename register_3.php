<?php

include_once("./config/connection.php");

// Retrieve form data
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = 1;  // Assuming 'type' is a constant value
$approved_or_not = 0;  // Assuming 'approved_or_not' is initialized to 0

// Check if the email exists in the 'login_1' table
$checkLoginStmt = $conn->prepare("SELECT email FROM login_1 WHERE email = ?");
$checkLoginStmt->bind_param("s", $email);
$checkLoginStmt->execute();
$checkLoginStmt->store_result();

if ($checkLoginStmt->num_rows > 0) {
    // Email exists in the 'login_1' table, so show an alert
    echo "<script> alert('Email already exists.');
    window.location= 'index.php';
    </script>";
} else {
    // Check if the email exists in the 'payments' table
    $checkPaymentsStmt = $conn->prepare("SELECT email FROM payments WHERE email = ?");
    $checkPaymentsStmt->bind_param("s", $email);
    $checkPaymentsStmt->execute();
    $checkPaymentsStmt->store_result();

    if ($checkPaymentsStmt->num_rows > 0) {
        // Email exists in the 'payments' table, proceed with the registration

        // Create a prepared statement for 'login_1' table
        $stmt = $conn->prepare("INSERT INTO login_1 (name, username, email, password, type, approved_or_not) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssssii", $name, $username, $email, $password, $type, $approved_or_not);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script> alert('Registration Completed successfully.');
            window.location= 'index.php';
            </script>";
        } else {
            echo "<script> alert('Registration Failed.');
            window.location= 'index.php';
            </script>";
        }

        // Close the 'login_1' prepared statement
        $stmt->close();
    } else {
        // Email doesn't exist in the 'payments' table
        echo "<script> alert('Registration failed. Email not found in the payments table.');
        window.location= 'payments.html';
        </script>";
    }
}

// Close the prepared statements and the database connection
$checkLoginStmt->close();
$checkPaymentsStmt->close();
$conn->close();
?>
