<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.php');
}
else{
// check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if file was selected for upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // set upload directory
        $upload_dir = "images/";
        // get uploaded file name
        $file_name = basename($_FILES["image"]["name"]);

        $about = $_POST['about'] ?? '';
        // get uploaded file extension
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // set allowed file extensions
        $allowed_extensions = array("jpg", "jpeg", "png");
        
        // check if uploaded file extension is allowed
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            // set file path
            $file_path = $upload_dir . $file_name;
            // move uploaded file to the designated folder
            move_uploaded_file($_FILES["image"]["tmp_name"], $file_path);
            
            // connect to database
            include ("../config/connection.php");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // prepare statement
            $stmt = mysqli_prepare($conn, "INSERT INTO gallery (filename, image_url,caption) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $file_name, $file_path,$about);
            
            // execute statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<script> alert('Image uploaded successfully.');
        window.location= 'admin-dash.php#gallery';
        </script>";
                // echo "Image uploaded successfully.";
                // header("add-image.php");
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            
            // close statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "<script> alert('Only JPG, JPEG, and PNG files are allowed.');
        window.location= 'admin-dash.php#gallery';
        </script>";
            // echo "Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "<script> alert('Please select an image to upload.');
        window.location= 'admin-dash.php#gallery';
        </script>";
        // echo "Please select an image to upload.";
    }
}
}
?>