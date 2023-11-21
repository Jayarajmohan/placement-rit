<?php

include_once("./config/connection.php");

// Retrieve form data
$name = $_POST['firstName'];
$username = $_POST['username'];
$cemail = $_POST['cemail'];
$password = $_POST['password'];
$type = 1;  // Assuming 'type' is a constant value
$approved_or_not = 0;  // Assuming 'approved_or_not' is initialized to 0

$targetDirectory = "profile_pics/";  // Change this to your desired directory
$profilePic = $targetDirectory . basename($_FILES["profilePic"]["name"]);
move_uploaded_file($_FILES["profilePic"]["tmp_name"], $profilePic);
// Gather user inputs
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$dob = $_POST["dob"];
$pemail = $_POST["pemail"];
$mobile = $_POST["mobile"];
$linkedin = $_POST["linkedin"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$city = $_POST["city"];
$pinCode = $_POST["pinCode"];
$state = $_POST["state"];
$country = $_POST["country"];
$admissionNumber = $_POST["admissionNumber"];
$department = $_POST["department"];
$currentSemester = $_POST["currentSemester"];
$classXBoard = $_POST["classXBoard"];
$classXPercentage = $_POST["classXPercentage"];
$classXYear = $_POST["classXYear"];
$classXIIBoard = $_POST["classXIIBoard"];
$classXIIPercentage = $_POST["classXIIPercentage"];
$classXIIYear = $_POST["classXIIYear"];

// Check if the checkbox for showing diploma fields is checked
$showDiplomaFields = isset($_POST["showDiplomaFields"]);

// If the diploma fields are to be stored, gather the data
if ($showDiplomaFields) {
    $diplomaName = $_POST["diplomaName"];
    $diplomaBoard = $_POST["diplomaBoard"];
    $diplomaPercentage = $_POST["diplomaPercentage"];
    $diplomaYear = $_POST["diplomaYear"];
} else {
    // Set these variables to empty if the checkbox is not checked
    $diplomaName = "";
    $diplomaBoard = "";
    $diplomaPercentage = "";
    $diplomaYear = "";
}

// Check if the checkbox for showing graduation fields is checked
$showGraduationFields = isset($_POST["showGraduationFields"]);

// If the graduation fields are to be stored, gather the data
if ($showGraduationFields) {
    $graduationName = $_POST["graduationName"];
    $graduationBoard = $_POST["graduationBoard"];
    $graduationPercentage = $_POST["graduationPercentage"];
    $graduationYear = $_POST["graduationYear"];
} else {
    // Set these variables to empty if the checkbox is not checked
    $graduationName = "";
    $graduationBoard = "";
    $graduationPercentage = "";
    $graduationYear = "";
}

// Check if the email exists in the 'login_1' table
$checkLoginStmt = $conn->prepare("SELECT email FROM login_1 WHERE email = ?");
$checkLoginStmt->bind_param("s", $cemail);
$checkLoginStmt->execute();
$checkLoginStmt->store_result();

if ($checkLoginStmt->num_rows > 0) {
    // Email exists in the 'login_1' table, so show an alert
    echo "<script> alert('Email already exists.');
    window.location= 'index.php';
    </script>";
} else {
    // Check if the email exists in the 'payments' table
    $checkPaymentsStmt = $conn->prepare("SELECT email FROM payments WHERE email = ?");
    $checkPaymentsStmt->bind_param("s", $cemail);
    $checkPaymentsStmt->execute();
    $checkPaymentsStmt->store_result();

    if ($checkPaymentsStmt->num_rows > 0) {
        // Email exists in the 'payments' table, proceed with the registration

        // Create a prepared statement for 'login_1' table
        $stmt = $conn->prepare("INSERT INTO login_1 (name, username, email, password, type, approved_or_not) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssssii", $name, $username, $cemail, $password, $type, $approved_or_not);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // echo "<script> alert('Registration Completed successfully.');
            // window.location= 'index.php';
            // </script>";
            $id1 = $conn->prepare("SELECT log_id FROM login_1 WHERE email = ?");
            $id1->bind_param("s", $cemail);
            $id1->execute();
            $result = $id1->get_result();
            $row = $result->fetch_assoc();
            $id = $row["log_id"];

            $sql = "INSERT INTO student_profile (id,profilePic,firstName, lastName, dob, email, mobile, linkedin, gender, address, city, pinCode, state, country,admissionNumber ,department, currentSemester, classXBoard, classXPercentage, classXYear, classXIIBoard, classXIIPercentage, classXIIYear,diplomaName ,diplomaBoard, diplomaPercentage, diplomaYear,graduationName ,graduationBoard, graduationPercentage, graduationYear) 
            VALUES ('$id','$profilePic','$firstName', '$lastName', '$dob', '$pemail', '$mobile', '$linkedin', '$gender', '$address', '$city', '$pinCode', '$state', '$country','$admissionNumber ','$department', '$currentSemester', '$classXBoard', '$classXPercentage', '$classXYear', '$classXIIBoard', '$classXIIPercentage', '$classXIIYear','$diplomaName' ,'$diplomaBoard', '$diplomaPercentage', '$diplomaYear', '$graduationName','$graduationBoard', '$graduationPercentage', '$graduationYear')";

            if ($conn->query($sql) === TRUE) {
                // echo "Data inserted successfully!";
                echo "<script> alert('Registration Completed successfully.');
                window.location= 'index.php';
                </script>";
            } else {
                $stmt = $conn->prepare("DELETE FROM login_1 WHERE log_id=?");
                $stmt ->bind_param("i", $id);
                echo "<script> alert('Registration Failed.');
            window.location= 'index.php';
            </script>";
            }
        } else {
            echo "<script> alert('Registration Failed.');
            window.location= 'index.php';
            </script>";
        }

        // Close the 'login_1' prepared statement
        $stmt->close();
    } else {
        // Email doesn't exist in the 'payments' table
        echo "<script> alert('Registration failed. Email not found in the payments table.');
        window.location= 'payments.html';
        </script>";
    }
}

// Close the prepared statements and the database connection
$checkLoginStmt->close();
$checkPaymentsStmt->close();
$conn->close();
?>