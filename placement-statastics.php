<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <title>Placement Statistics</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 20px;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #005b96;
            color: #ddd;
        }
    </style>
</head>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Placement Statistics</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
    <?php
    // Database connection
    include_once("./config/connection.php");
    // Retrieve data from the table
    $selectQuery = "SELECT * FROM placement_statistics";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Company</th>";
        echo "<th>CE</th>";
        echo "<th>CSE</th>";
        echo "<th>ECE</th>";
        echo "<th>EEE</th>";
        echo "<th>ME</th>";
        echo "<th>MTECH</th>";
        echo "<th>MCA</th>";
        echo "<th>BARCH</th>";
        echo "<th>Total</th>";
        echo "</tr>";

        $departmentTotals = array_fill_keys(['CE', 'CSE', 'ECE', 'EEE', 'ME', 'MTECH', 'MCA', 'BARCH'], 0);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['Company']}</td>";
            echo "<td>{$row['CE']}</td>";
            echo "<td>{$row['CSE']}</td>";
            echo "<td>{$row['ECE']}</td>";
            echo "<td>{$row['EEE']}</td>";
            echo "<td>{$row['ME']}</td>";
            echo "<td>{$row['MTECH']}</td>";
            echo "<td>{$row['MCA']}</td>";
            echo "<td>{$row['BARCH']}</td>";
            
            $total = 0;
            foreach ($departmentTotals as $department => &$value) {
                $value += $row[$department];
                $total += $row[$department];
            }
            
            echo "<td>$total</td>";

            echo "</tr>";
        }

        // Display total row
        echo "<tr>";
        echo "<td>TOTAL</td>";
        foreach ($departmentTotals as $total) {
            echo "<td>$total</td>";
        }
        echo array_sum($departmentTotals);
        echo "</tr>";

        echo "</table>";
    } else {
        echo "<p>No data found in the table.</p>";
    }
    ?>
    <div class="container-fluid image-container1">
      <div class="icon"><img src="./assets/images/homeicon.png" alt="" srcset=""></div>
      <div class="text">Career Guidance and Placement Cell serves as a center that facilitates and inspires students for achieving employment, higher education and entrepreneurial aspiration.</div>
  </div>
  <footer>
    <div class="footer-bottom">
      <p>©2021 ALL RIGHTS RESERVED - RIT KOTTYAM</p>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
// $conn->close();
?>
