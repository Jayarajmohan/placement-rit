<?php
// Database connection details
include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $link_name = $_POST['link_name'];
    $link = $_POST['about'];
    $type = $_POST['type'];

    // Use a prepared statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO links (link_name, link,type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $link_name, $link, $type);

    if ($stmt->execute()) {
        echo "<script> alert('Link information inserted into the database successfully.');
                window.location= 'admin-dash.php#Links';
                </script>";
        echo "Link information inserted into the database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
// $conn->close();
?>
