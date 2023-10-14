<?php
include_once("../config/connection.php");

if (isset($_POST['submit'])) {
    // Get form data
    $file_name = $_POST['file_name'];

    // Check if a file was uploaded successfully
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        // Specify the allowed file extensions
        $allowed_extensions = array('pdf', 'doc', 'ppt', 'jpg');
        $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            // Specify the file upload directory
            $upload_directory = "files/";

            // Generate a unique file name to avoid overwriting
            $unique_file_name = time() . '_' . $_FILES['file']['name'];
            $file_location = $upload_directory . $unique_file_name;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file_location)) {
                // Use a prepared statement to insert file data into the database
                $stmt = $conn->prepare("INSERT INTO materials (file_name, file_location) VALUES (?, ?)");
                $stmt->bind_param("ss", $file_name, $file_location);

                if ($stmt->execute()) {
                    echo "<script> alert('file uploaded successfully.');
        window.location= 'admin-dash.php#gallery';
        </script>";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                
                echo "<script> alert('Error while moving the file to the upload directory.');
                window.location= 'admin-dash.php#gallery';
                </script>";
            }
        } else {
            
            echo "<script> alert('Error: Only PDF, DOC, PPT, and JPG files are allowed.');
        window.location= 'admin-dash.php#gallery';
        </script>";
        }
    } else {
       
        echo "<script> alert('Error: Please select a file to upload.');
        window.location= 'admin-dash.php#gallery';
        </script>";
    }
}

// Close the database connection
$conn->close();
?>
