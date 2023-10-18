<?php
// Database connection details
include_once("../config/connection.php");

// SQL query to retrieve data from the table
$sql = "SELECT * FROM feedbacks";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; width: 70%; margin: 0 auto; text-align: center;">';
    echo '<tr style="background-color: #064975; color: #fff;"><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Feedback</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr style="background-color: #fff;">';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['feedback'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No records found in the database.";
}

// Close the database connection
$conn->close();
?>
