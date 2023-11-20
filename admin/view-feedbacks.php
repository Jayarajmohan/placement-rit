<?php
// Database connection details
include_once("../config/connection.php");

// SQL query to retrieve data from the table
$sql = "SELECT * FROM feedback_questions";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; width: 70%; margin: 0 auto; text-align: center;">';
    echo '<tr style="background-color: #064975; color: #fff;"><th>Name</th><th>Email</th><th>Phone</th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th><th>Q5</th><th>Q6</th><th>Q7</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr style="background-color: #fff;">';
        
        echo '<td>' . $row['NAME'] . '</td>';
        echo '<td>' . $row['EMAIL'] . '</td>';
        echo '<td>' . $row['PHONE'] . '</td>';
        echo '<td>' . ($row['Q1'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q2'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q3'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q4'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q5'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q6'] == 1 ? "Yes" : "No") . '</td>';
        echo '<td>' . ($row['Q7'] == 1 ? "Yes" : "No") . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No records found in the database.";
}

// Close the database connection
// $conn->close();
?>
