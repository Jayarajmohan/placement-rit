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
                    header('Location: admin/admin-dash.php');
                    exit;
                default:
                    echo "<script>alert('Login successful!');</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password1');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password2');</script>";
    }
}
?>
<!-- Rest of your HTML code for the login form -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Login Form</h2>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <button type="submit" name="submit">Login</button>
            </form>  
        </div>
    </div>
</body>
</html>
