<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/dash-style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <title></title>
</head>
<style>
        .scrollable-list {
                max-height: 500px;
                /* Adjust the height as needed */
                overflow: auto;
        }
</style>

<body>
        <div class="top-bar">
                <a href="index.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
                <h5><a href="career_prep_1.php">
                                <i class="fa fa-th-large" aria-hidden="true"></i>
                                <span class="heading">Career Prep Toolkit</span>
                        </a></h5>
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        <div class="container">
                <nav>
                        <ul class="list-items">
                                <li><a href="career_prep_1.php" class="nav-links">
                                                <i class="fa-solid fa-highlighter"></i>
                                                <span class="nav-item">Mock test</span>
                                        </a></li>
                                <li><a href="career_prep_2.php" class="nav-links">
                                                <i class="fa-solid fa-video"></i>
                                                <span class="nav-item">Mock Interviews</span>
                                        </a></li>
                                <li><a href="career_prep_3.php" class="nav-links">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span class="nav-item">Live exams</span>
                                        </a></li>
                                <li><a href="career_prep_4.php" class="nav-links active">
                                                <i class="fa-solid fa-book-open"></i>
                                                <span class="nav-item">Study Meterials</span>
                                        </a></li>
                                <li><a href="career_prep_5.php" class="nav-links">
                                                <i class="fa-solid fa-link"></i>
                                                <span class="nav-item">Usefull links</span>
                                        </a></li>
                        </ul>
                </nav>
                <main>
                <div class="list-items-1">
  <div class="one-three">
    <h6 class="material-head">Study Materials</h6>
    <ul class="scrollable-list">
      <?php
      // Assuming you have a database connection established
     include_once("./config/connection.php");

      

      // Query to retrieve the file_name and file_id from the "materials" table
      $query = "SELECT file_id, file_name,file_location FROM materials";
      $result = mysqli_query($conn, $query);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $fileId = $row['file_id'];
          $fileName = $row['file_name'];
          $location = $row['file_location'];
          $fileLocation = "admin/" . $location;

          echo '<li><a href="' . $fileLocation . '" download target="_blank">' . $fileName . '</a></li>';
        }
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }

      mysqli_close($conn);
      ?>
    </ul>
  </div>
</div>





                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
                jQuery(".list-items-1 a").append('<span class="list-icon"><i class="fa-solid fa-download"></i></span>');
        </script>
</body>

</html>