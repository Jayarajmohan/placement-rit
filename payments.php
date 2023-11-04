<?php

include_once("./config/connection.php");

// Retrieve form data
$transaction_id = $_POST['transaction_id'];
$email = $_POST['email'];

// Check if the email exists in the 'payments' table
$checkEmailStmt = $conn->prepare("SELECT email FROM payments WHERE email = ?");
$checkEmailStmt->bind_param("s", $email);
$checkEmailStmt->execute();
$checkEmailStmt->store_result();

// Check if the transaction ID exists in the 'payments' table
$checkTransactionStmt = $conn->prepare("SELECT transaction_id FROM payments WHERE transaction_id = ?");
$checkTransactionStmt->bind_param("s", $transaction_id);
$checkTransactionStmt->execute();
$checkTransactionStmt->store_result();

if ($checkEmailStmt->num_rows > 0) {
    // Email or transaction ID already exists in the 'payments' table
    echo "<script> alert('Email already exists.');
    window.location= 'index.php';
    </script>";
}
else if ($checkTransactionStmt->num_rows > 0) {
    // Email or transaction ID already exists in the 'payments' table
    echo "<script> alert('Transaction ID already exists.');
    window.location= 'payments.html';
    </script>";
} else {
    // Create a prepared statement for inserting payment data
    $stmt = $conn->prepare("INSERT INTO payments (transaction_id, email) VALUES (?, ?)");

    // Bind the parameters
    $stmt->bind_param("ss", $transaction_id, $email);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<script> alert('Payment Completed successfully.');
        window.location= 'student-reg.html';
        </script>";
    } else {
        echo "<script> alert('Payment unsuccessful.');
        window.location= 'payments.html';
        </script>";
    }

    // Close the prepared statement for inserting payment data
    $stmt->close();
}

// Close the check statements and the database connection
$checkEmailStmt->close();
$checkTransactionStmt->close();
$conn->close();
?>
