<div class="table">
    <h4>Students Requests</h4>
    <?php
    $facultyId = $_SESSION['log_id']; // Use a different variable name to avoid conflicts

    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT b.name, a.id, a.date, a.status, a.link, a.time FROM mock_interview a, login_1 b WHERE a.faculty_id = $facultyId AND a.student_id = b.log_id and a.status='pending'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Student Name</th><th>Date</th><th>Action</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            // echo '<td>' . $row['link'] . '</td>';
            // echo '<td>' . $row['time'] . '</td>';

            if ($row['status'] == 'pending') {
                // Display a form with buttons to approve, link, and time
                echo '<td><form method="post">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="text" name="link" placeholder="Link">
                        <input type="time" name="time" placeholder="Time">
                        <button type="submit" name="approve">Approve</button>
                        <button type="submit" name="reject">Reject</button>
                      </form></td>';
            } else if ($row['status'] == 'approved') {
                // Show "Approved"
                echo '<td>Approved</td>';
            } else if ($row['status'] == 'rejected') {
                // Show "Rejected"
                echo '<td>Rejected</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No records found in the database.";
    }

    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
        $link = $_POST['link'];
        $time = $_POST['time'];
    
        // Validate link and time
        if (empty($link) || empty($time)) {
            echo "<script>alert('Please fill both link and time before approving.');</script>";
        } else {
            // Update the value in the database from 'pending' to 'approved', set link and time
            $updateSql = "UPDATE mock_interview SET status = 'approved', link = '$link', time = '$time' WHERE id = $id";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Request Approved!');
                    window.location= 'faculty-dash.php';
                    </script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
     else if (isset($_POST['reject'])) {
        $id = $_POST['id'];
        // Update the value in the database from 'pending' to 'rejected'
        $updateSql = "UPDATE mock_interview SET status = 'rejected' WHERE id = $id";
        if ($conn->query($updateSql) === TRUE) {
            echo "<script> alert('Request Rejected!');
            window.location= 'faculty-dash.php';
            </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</div>
