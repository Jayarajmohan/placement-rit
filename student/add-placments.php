<?php
// Include your database connection code here
// include_once("../config/connection.php");

if (isset($_POST['placement'])) {
    // Get student_id from session variable (log_id)
    $studentId = $_SESSION['log_id'];

    // Validate and sanitize input data
    $company = mysqli_real_escape_string($conn, $_POST["company"]);
    $salary = mysqli_real_escape_string($conn, $_POST["salary"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $level = mysqli_real_escape_string($conn, $_POST["level"]);

    // Check if the student has already added placement details for the selected level
    $checkSql = "SELECT * FROM placement_details WHERE student_id = $studentId AND level = '$level'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script> alert('Placement details for this level already exist for the student.');
    window.location= 'student-dash.php';
    </script>";
    } else {
        // Insert data into the placement_details table
        $insertSql = "INSERT INTO placement_details (student_id, company, salary, date, level) 
                      VALUES ('$studentId', '$company', '$salary', '$date', '$level')";

        if (mysqli_query($conn, $insertSql)) {
            // echo "Placement details submitted successfully!";
            echo "<script> alert('Placement details submitted successfully!');
    window.location= 'student-dash.php';
    </script>";
        } else {
            echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
        }
    }

    // Close the database connection if needed
    // mysqli_close($conn);
}
?>
<h2>Placement Details Form</h2>
    <form action="" method="post">
        <label for="company">Placed Company:</label>
        <input type="text" id="company" name="company" required>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required>

        <label for="date">Placement Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="level">Level of Placement:</label>
        <select id="level" name="level" required>
            <option value="" selected disabled>Select Level</option>
            <option value="Level 1">Level 1</option>
            <option value="Level 2">Level 2</option>
            <option value="Level 3">Level 3</option>
        </select>

        <button type="submit" name= "placement">Submit</button>
    </form>