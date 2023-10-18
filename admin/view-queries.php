<?php
// Database connection details
include_once("../config/connection.php");

// SQL query to retrieve data from the table
$sql = "SELECT * FROM queries";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo '<table border="0" style="margin: 0 auto; text-align: center;">';
    echo '<tr style="background-color: #064975; color: #fff;"><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Queries</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr style="background-color: white;">';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['queries'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No records found in the database.";
}

// Close the database connection

?>
