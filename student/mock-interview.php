<?php
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// Check if the form has been submitted
if (isset($_POST['mock_interview'])) {
    // Validate and sanitize input data
    $teacherId = $_POST["teacher"];
    $selectedDate = $_POST["date"];
    $status = 'pending'; // Initial status
    $link = ''; // You may set a link or leave it empty initially

    // Get student_id from session variable (log_id)
    $studentId = $_SESSION['log_id'];

    // Validate the data further if needed

    // Insert data into the mock_interview table
    $insertSql = "INSERT INTO mock_interview (student_id, faculty_id, date, status, link) 
                  VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("iisss", $studentId, $teacherId, $selectedDate, $status, $link);

    if ($stmt->execute()) {
        // echo "Data inserted successfully!";
        echo "<script> alert('Data inserted successfully!');
    window.location= 'student-dash.php';
    </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch faculty data for the dropdown
$sql = "SELECT * FROM login";
$result = $conn->query($sql);

// Close the database connection if needed
// $conn->close();
?>

<form action="" method="post">
    <h3>Request For Mock Interview</h3>
    <select name="teacher" id="">
        <option value="" selected>Select Faculty</option>

        <?php
        // Generate options dynamically
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
        }
        ?>
    </select>
    <label for="date">Select the date</label>
    <input type="date" name="date" id="date">
    <input type="submit" value="Submit" name="mock_interview">
</form>
