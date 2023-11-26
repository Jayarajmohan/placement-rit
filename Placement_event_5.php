<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <title></title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #b3e0ff; /* Light Blue Background for Header */
        color: #333; /* Black Text Color for Header */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* White Background for Even Rows */
    }
</style>

<body>

<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Placement Records</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
<div class="container">
<?php
include_once("./config/connection.php");

// SQL query to join the two tables
$sql = "SELECT s.firstName, s.lastName, s.department, s.currentSemester, p.company, p.salary, p.level
        FROM student_profile s
        JOIN placement_details p ON s.id = p.student_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1">
            <tr>
                <th>Student Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Company</th>
                <th>Salary</th>
                <th>Level</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>
                <td>' . $row['department'] . '</td>
                <td>' . $row['currentSemester'] . '</td>
                <td>' . $row['company'] . '</td>
                <td>' . $row['salary'] . '</td>
                <td>' . $row['level'] . '</td>
            </tr>';
    }

    echo '</table>';
} else {
    echo "No records found.";
}

$conn->close();
?>

       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>