<?php
include_once("./config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Assuming your form data is boolean (yes/no) - 1 for Yes and 0 for No
    $q1 = $_POST['Q1'];
    $q2 = $_POST['Q2'];
    $q3 = $_POST['Q3'];
    $q4 = $_POST['Q4'];
    $q5 = $_POST['Q5'];
    $q6 = $_POST['Q6'];
    $q7 = $_POST['Q7'];

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO feedback_questions (NAME, EMAIL, Q1, Q2, Q3, Q4, Q5, Q6, Q7, PHONE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiiiiiis", $name, $email, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $phone);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
