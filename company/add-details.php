<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');
    exit; // Terminate script if the user is not logged in
} else {
    include_once("../config/connection.php");
    $id = $_SESSION['log_id'];

    // Check if form is submitted
    if(isset($_POST['submit'])) {
        // Fetching and sanitizing user inputs
        $about = $_POST['about'];
        $link = $_POST['link'];

        // Handling the image upload
        $targetDirectory = "uploads/"; // Change this to your desired directory
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        // You may want to add further checks and validations for the uploaded file
        
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO company_details (company_id, about, link, image_path) VALUES (?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("isss", $id, $about, $link, $targetFile);
            
            if ($stmt->execute()) {
                echo "<script> alert('Image uploaded successfully.');
                window.location= 'company-dash.php';
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Unable to prepare statement";
        }
        
        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
