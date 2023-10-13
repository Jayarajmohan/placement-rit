<?php 
$password = "Jaya@dx7"; // Replace this with the actual user's password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo $hashed_password;
// Store $hashed_password in your database
?>