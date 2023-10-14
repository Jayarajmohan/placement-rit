<?php
// Database connection details
include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $link_name = $_POST['link_name'];
    $link = $_POST['about'];

    // Use a prepared statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO links (link_name, link) VALUES (?, ?)");
    $stmt->bind_param("ss", $link_name, $link);

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
$conn->close();
?>
