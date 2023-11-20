<?php

include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $company_name = $_POST['name'];
    $description = $_POST['description'];
    $event_date = $_POST['date'];
    $company_link = $_POST['link'];

    // Use a prepared statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO placement_events (event_date, company_name, details, company_link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $event_date, $company_name, $description, $company_link);

    if ($stmt->execute()) {
        echo "<script> alert('Event information inserted into the database successfully.');
                window.location= 'dashboard-admin.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
// $conn->close();
?>
