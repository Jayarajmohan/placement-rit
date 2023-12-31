<?php
session_start();
include("./config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Retrieve the plaintext password, user type, and approval status from the database for the given username
    $stmt = $conn->prepare('SELECT password, log_id, type, approved_or_not FROM login_1 WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $plaintext_password = $row['password'];
        $id = $row['log_id'];
        $type = $row['type'];
        $approved_or_not = $row['approved_or_not'];

        if ($approved_or_not == 1) { // Check if the admin is approved
            // Verify the password
            if ($password === $plaintext_password) {
                $_SESSION['log_id'] = $id;

                // Redirect based on user type
                switch ($type) {
                    case 0:
                        header('Location: company/company-dash.php');
                        exit;
                    case 1:
                        header('Location: student/student-dash.php');
                        exit;
                    default:
                        echo "<script>alert('Login successful!');</script>";
                }
            } else {
                echo "<script> alert('Invalid email or password.');
                window.location= 'login.html';
                </script>";
            }
        } else {
           
            echo "<script> alert('Admin is not approved.');
                window.location= 'login.html';
                </script>";
        }
    } else {
        echo "<script> alert('Invalid email or password.');
                window.location= 'login.html';
                </script>";
    }
}
?>
