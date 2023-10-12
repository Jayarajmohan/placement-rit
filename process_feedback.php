<?php
if (isset($_POST['submit'])) {
    include_once("./config/connection.php");

    // Define an array to store validation errors
    $errors = [];

    // Retrieve and validate form data
    $first_name = validateInput($_POST['fname'], 'First Name');
    $last_name = validateInput($_POST['lname'], 'Last Name');
    $phone = validateInput($_POST['phone'], 'Phone Number');
    $email = validateInput($_POST['email'], 'Email');
    $feedback = validateInput($_POST['yourfeedback'], 'Feedback');

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if there are any validation errors
    if (count($errors) === 0) {
        // Insert data into the feedbacks table
        $sql = "INSERT INTO feedbacks (first_name, last_name, phone, email, feedback) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $feedback);

        if ($stmt->execute()) {
            $response = "Feedback submitted successfully!";
        } else {
            $response = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        $response = "Validation errors:<br>";
        foreach ($errors as $error) {
            $response .= $error . "<br>";
        }
    }

    // Return a JavaScript response to display a pop-up message and redirect
    echo "<script>alert('$response'); window.location.href = 'connect_engage_3.php';</script>";
}

function validateInput($input, $fieldName) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    // Validate that the input is not empty
    if (empty($input)) {
        $errors[] = $fieldName . " is required.";
    }

    return $input;
}
?>
