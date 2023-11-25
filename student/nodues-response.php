<div class="table">
    <h6 style ="text-align:center;">No dues Application Status</h6>
    <?php
    $Id = $_SESSION['log_id']; // Use a different variable name to avoid conflicts

    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT  date,status FROM no_dues Where student_id = $Id and status!='rejected'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Date</th><th>Status</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
        }
    }
    ?>
</div>