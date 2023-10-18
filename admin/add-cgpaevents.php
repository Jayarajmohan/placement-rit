<?php
// Database connection details
include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $event_name = $_POST['name'];
    $description = $_POST['description'];
    $event_date = $_POST['date'];
    $event_link = $_POST['link'];

    // Use a prepared statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO cgpa_events (event_date, event_name, event_details, event_link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $event_date, $event_name, $description, $event_link);

    if ($stmt->execute()) {
        echo "<script> alert('Event information inserted into the database successfully.');
                window.location= 'admin-dash.php#cgpaEvents';
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
