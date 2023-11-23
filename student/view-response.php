<div class="table">
    <h6 style ="text-align:center;">Mock Interview Time table</h6>
    <?php
    $Id = $_SESSION['log_id']; // Use a different variable name to avoid conflicts

    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT b.name, a.date, a.link, a.time, a.status FROM mock_interview a, login b WHERE a.student_id = $Id AND a.faculty_id = b.id and a.status!='rejected'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Faculty Name</th><th>Date</th><th>Link</th><th>Time</th><th>Status</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            if($row['link'] !=''){
                echo '<td><a href="'. $row['link'] .' " target="_blank">Link</a></td>';
            }else{
                echo '<td>null</td>';
            }
            if($row['time'] !='00:00:00'){
                echo '<td>' . $row['time'] . '</td>';
            }else{
                echo '<td>null</td>';
            }
            
           
            echo '<td>' . $row['status'] . '</td>';
        }
    }
    ?>
    
</div>