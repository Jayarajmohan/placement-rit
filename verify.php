<?php
$user_input_password = "Jaya@dx7"; // Replace this with the user's input
$stored_hashed_password = '$2y$10$IDxnRAo1rLMCQL6VmeDquuArnG6ucIdy6kfVFDy8tm1EntP6v.p9i'; // Retrieve this from your database

if (password_verify($user_input_password, $stored_hashed_password)) {
    // Password is correct
    echo "passwored is good";
    // Allow the user to log in
} else {
    // Password is incorrect
    echo "password is not good";
    // Deny access
}
?>