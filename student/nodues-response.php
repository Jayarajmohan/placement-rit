<div class="table">
    <h6 style="text-align:center;">No dues Application Status</h6>

    <?php
    $Id = $_SESSION['log_id']; // Use a different variable name to avoid conflicts

    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM no_dues WHERE student_id = $Id AND status != 'rejected'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) :
    ?>
        <table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">
            <tr style="background-color: #064975; color: #fff;">
                <th>Date</th>
                <th>Status</th>
            </tr>

            <?php
            // Output data of each row
            while ($row = $result->fetch_assoc()) :
            ?>
                <tr style="background-color: #fff;">
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['status'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php
    else :
        echo "No records found.";
    endif;
    ?>
</div>
