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

$sql = "SELECT COUNT(*) AS user_count, COUNT(*) AS company_count_2 
        FROM login_1 
        WHERE type = 0 OR approved_or_not = 0";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Get the user count and company count
    $companyCount = $row['user_count'];
    $companyCount_2 = $row['company_count_2'];

    

    
}
 


?>

<style>
    .card-conatiner {
    display:flex;
    justify-content: space-between;
    align-items: center;
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

</style>

<div class="card-conatiner">
<div class="card">
        <i class="fa-solid fa-user-graduate"></i>
        <h2>Students : 123</h2>
        <p>Aprrove : 6</p>
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
