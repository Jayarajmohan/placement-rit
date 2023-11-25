<?php
$sql = "SELECT * FROM login WHERE type is true";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// Check if the form has been submitted
if (isset($_POST['no_dues'])) {
    // Validate and sanitize input data
    $selectedDate = $_POST["date"];
    $status = 'pending'; // Initial status 

    // Get student_id from session variable (log_id)
    $studentId = $_SESSION['log_id'];
    $today = date("Y-m-d");

    $sql = "SELECT * FROM no_dues WHERE student_id=$studentId and status!='rejected' and date > $today";
$result = $conn->query($sql);
    // Validate the data further if needed
    if($result->num_rows == 0){
    // Insert data into the mock_interview table
    $insertSql = "INSERT INTO no_dues (student_id, date, status) 
                  VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("iss", $studentId, $selectedDate, $status);

    if ($stmt->execute()) {
        // echo "Data inserted successfully!";
        echo "<script> alert('No dues Applied!');
    window.location= 'student-dash.php';
    </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}else{
    echo "<script> alert('Request Alredy Exsits!');
    window.location= 'student-dash.php';
    </script>";
}
}

?>

<form action="" method="post">
    <h3>Request For No dues</h3>
    <label for="date">Select the date</label>
    <input type="date" name="date" id="date">
    <input type="submit" value="Submit" name="no_dues">
</form>
