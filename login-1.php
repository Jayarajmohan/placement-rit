<?php
session_start();
include("./config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Retrieve the plaintext password and user type from the database for the given username
    $stmt = $conn->prepare('SELECT password, id, type FROM login WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $plaintext_password = $row['password'];
        $id = $row['id'];
        $type = $row['type'];
        
        // Verify the password
        if ($password === $plaintext_password) {
            $_SESSION['log_id'] = $id;

            // Redirect based on user type
            switch ($type) {
                case 0:
                    header('Location: admin/dashboard-admin.php');
                    exit;
                case 1:
                    header('Location: faculty/faculty-dash.php');
                    exit;
                default:
                    echo "<script>alert('Login successful!');</script>";
            }
        } else {
            // echo "<script>alert('Invalid username or password1');</script>";
            echo "<script> alert('Invalid username or password1');
        window.location= 'login.html';
        </script>";
        }
    } else {
        // echo "<script>alert('Invalid username or password');</script>";
        echo "<script> alert('Invalid username or password');
        window.location= 'login.html';
        </script>";
    }
}
?>