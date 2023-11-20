<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <title>Recruiters</title>
</head>
<style>
  .container{
    border: none;
    display: flex;
    margin-top: 10px;
  }
  .card{
    border: none;
    width: 250px;
  /* box-shadow:2px 2px 20px rgba(0,0,0,0.3); border:none; margin-bottom:30px; */
}
.card:hover{
  transform: scale(1.05);
  transition: all 1s ease;
}
.card-img-top{
  width: 100px;
}
.card-text{
  font-size: 12px;
}
.card-group{
  border: none;
}
</style>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Recruiters</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
<div class="container">
<div class="card-group">
<?php
include("./config/connection.php");
$selectQuery = "SELECT * FROM company_details"; // Replace with your actual table name
$result = $conn->query($selectQuery);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // HTML card template
        echo '<div class="card">';
        echo '<img src="./company/' . $row['image_path'] . '" class="card-img-top" alt="Company Image">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $row['cname'] . '</h3>';
        echo '<p class="card-text" style="font-size:12px;">' . $row['about'] . '</p>';
        echo '<a href="' . $row['link'] . '" class="btn btn-primary">More Details</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>No data found in the table.</p>";
}
?>
      
    </div>
</div>
<div class="container-fluid image-container">
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