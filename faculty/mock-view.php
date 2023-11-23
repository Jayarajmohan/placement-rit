<div class="table">
    <h6 style ="text-align:center;">Mock Interview Time table</h6>
    <?php
    $facultyId = $_SESSION['log_id']; // Use a different variable name to avoid conflicts

    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT b.name, a.date, a.link, a.time FROM mock_interview a, login_1 b WHERE a.faculty_id = $facultyId AND a.student_id = b.log_id and a.status='approved'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Student Name</th><th>Date</th><th>link</th><th>time</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td><a href="'. $row['link'] .' " target="_blank">Link</a></td>';
            echo '<td>' . $row['time'] . '</td>';
        }
    }
    ?>
    
</div>