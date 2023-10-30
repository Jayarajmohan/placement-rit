<?php
include_once("../config/connection.php");

// SQL query to count users with type 1
$sql = "SELECT COUNT(*) AS user_count FROM login WHERE type = 1";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count
    $userCount = $row['user_count'];
} 

$sql = "SELECT COUNT(*) AS user_count 
        FROM login_1 
        WHERE type = 0";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count and company count
    $companyCount = $row['user_count'];

    

    
}

$sql = "SELECT COUNT(*) AS company_count_2 
        FROM login_1 
        WHERE approved_or_not = 0 AND type = 0";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count and company count
    $companyCount_2 = $row['company_count_2'];

    

    
}

$sql = "SELECT COUNT(*) AS user_count 
        FROM login_1 
        WHERE type = 1";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count and company count
    $StudentCount = $row['user_count'];

    

    
}

$sql = "SELECT COUNT(*) AS student_count_2 
        FROM login_1 
        WHERE approved_or_not = 0 AND type = 1";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count and company count
    $StudentCount_2 = $row['student_count_2'];

    

    
}
 


?>

<style>
    .card-conatiner {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-gap:1rem;
}

.card {
    background-color: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    text-align: center;
    box-sizing: border-box;
    flex: 1;
    margin: 5px;
    display: grid;
    grid-row:1/4;
    grid-template-rows: subgrid;
}
form {
  width: 100%;
}
.card i {
    font-size: 48px;
    color: #3498db;
}

.card h2 {
    margin: 10px 0;
    font-size: 20px;
}

.card p {
    font-size: 24px;
    color: #27ae60;
}
.table-container{
    background-color: #ddd;
    display: flex;
    width: 100%;
}
.table{
    width: 100%;
}
</style>

<div class="card-conatiner">
<div class="card">
        <i class="fa-solid fa-user-graduate"></i>
        <h2>Student: <?php echo $StudentCount; ?></h2>
        <p>To Approve : <?php echo $StudentCount_2; ?></p>
    </div>
    <div class="card">
        <i class="fa-solid fa-building-user"></i>
        <h2>Company : <?php echo $companyCount; ?></h2>
        <p>To Approve : <?php echo $companyCount_2; ?></p>
        
    </div>
    <div class="card">
        <i class="fa-solid fa-chalkboard-user"></i>
        <h2>Faculty : <?php echo $userCount; ?></h2>
    </div>
    <div class="card">
        <i class="fa fa-envelope"></i>
        <h2>Title 4</h2>
        <p>987</p>
    </div>
</div>
<div class="table-container">
<div class="table">
    <h4>Companies</h4>
    <?php
    // Database connection details
    include_once("../config/connection.php");

    

    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM login_1 WHERE type='0'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Name</th><th>Email</th><th>Username</th><th>Status</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            if ($row['approved_or_not'] == 0) {
                // Display a button to approve
                echo '<td><form method="post"><button type="submit" name="id" value="' . $row['log_id'] . '">Approve</button></form></td>';
            } else {
                // Show "Approved"
                echo '<td>Approved</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No records found in the database.";
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        // Update the value in the database from 0 to 1
        $updateSql = "UPDATE login_1 SET approved_or_not = 1 WHERE log_id = $id";
        if ($conn->query($updateSql) === TRUE) {
            // Value updated successfully
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    ?>
</div>

<div class="table">
    <h4>Students</h4>
    <?php
    // Database connection details
    include_once("../config/connection.php");

    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM login_1 WHERE type='1'";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo '<table style="border-collapse: collapse; width:98%; margin: 0 auto; text-align: center;">';
        echo '<tr style="background-color: #064975; color: #fff;"><th>Name</th><th>Email</th><th>Username</th><th>Status</th></tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff;">';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            if ($row['approved_or_not'] == 0) {
                // Display a button to approve
                echo '<td><form method="post"><button type="submit" name="id" value="' . $row['log_id'] . '">Approve</button></form></td>';
            } else {
                // Show "Approved"
                echo '<td>Approved</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No records found in the database.";
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        // Update the value in the database from 0 to 1
        $updateSql = "UPDATE login_1 SET approved_or_not = 1 WHERE log_id = $id";
        if ($conn->query($updateSql) === TRUE) {
            // Value updated successfully
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
  
    ?>
</div>

</div>

