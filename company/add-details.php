<?php
session_start();

if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');
    exit; // Terminate script if the user is not logged in
} else {
    include_once("../config/connection.php");
    $id = $_SESSION['log_id'];

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Fetching and sanitizing user inputs
        $about = $_POST['about'];
        $link = $_POST['link'];
        $Cname = $_POST['cname'];

        // Handling the image upload
        $targetDirectory = "uploads/"; // Change this to your desired directory

        // Check if the target directory exists and is writable
        if (!is_dir($targetDirectory) || !is_writable($targetDirectory)) {
            die('Target directory is not valid or not writable.');
        }

        // Get the file name and path
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        // Check for file upload errors
        if ($_FILES["image"]["error"] > 0) {
            echo "Error: " . $_FILES["image"]["error"];
        } else {
            // Prepare the SQL statement with placeholders
            $sql = "INSERT INTO company_details (company_id, about, link, image_path, cname) VALUES (?, ?, ?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameters and execute the statement
                $stmt->bind_param("issss", $id, $about, $link, $targetFile, $Cname);

                if ($stmt->execute()) {
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        echo "<script> alert('Details added successfully.');
                            window.location= 'company-dash.php';
                        </script>";
                    } else {
                        echo "Error moving uploaded file.";
                    }
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error: Unable to prepare statement";
            }
        }
    }

    // Close the database connection
    $conn->close();
}
?>
