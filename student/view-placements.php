<?php
include_once("../config/connection.php");

// Assuming student_id is stored in the session variable
$studentId = $_SESSION['log_id'];

// SQL query to retrieve placement details for a specific student
$sql = "SELECT * FROM placement_details WHERE student_id = ?";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameter
$stmt->bind_param("i", $studentId);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are any records
if ($result->num_rows > 0) {
    echo'<h4 style="text-align:center;padding-top:20px">Placement Details</h4>';
    echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
    echo '<tr style="background-color: #064975; color: #fff;"><th>Company</th><th>Salary</th><th>Date</th><th>Level</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr style="background-color: #fff;">';
        echo '<td>' . $row["company"] . '</td>';
        echo '<td>' . $row["salary"] . '</td>';
        echo '<td>' . $row["date"] . '</td>';
        echo '<td>' . $row["level"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No placement details found for the student.";
}

// Close the statement
$stmt->close();

// Close the database connection if needed
// $conn->close();
?>
