<?php
// Database connection details
include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $table_name = $_POST['table-name'];
    $question_text = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_answer = $_POST['correct_option'];

    // Use prepared statement to insert data into the user-defined table
    $stmt = $conn->prepare("INSERT INTO $table_name (question_text, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssss", $question_text, $option_a, $option_b, $option_c, $option_d, $correct_answer);

    if ($stmt->execute()) {
        echo "<script> alert('Image uploaded successfully.');
        window.location= 'admin-dash.php#Questions';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
