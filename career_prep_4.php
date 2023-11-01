<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="./assets/css/dash-style.css?v=<?php echo time(); ?>"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <title></title>
</head>
<style>
        .scrollable-list {
                max-height: 500px;
                /* Adjust the height as needed */
                overflow: auto;
        }
        .list-items-1 {
  width: 90%;
  margin: 10px;
  border-radius: 10px;
  display: flex;
  flex-direction: row;
  overflow: hidden;
}
.list-items-1 .one-three {
  background-color: #fff;
  width: 100%;
  overflow: hidden;
  margin-left: 10px;
}
.list-items-1 ul {
  padding: 5px 0;
  margin: 0;
  list-style: none;
}
.list-items-1 li {
  cursor: pointer;
  padding: 0 10px;
}

.list-items-1 a {
  text-decoration: none;
  line-height: 1.4;
  font-family: Poppins,Helvetica,sans-serif;
  padding: 10px;
  display: block;
  box-sizing: border-box;
  transition: .6s ease-out; 
  font-weight: 500;
  color: #555;
  margin-bottom: 5px;
  border-radius: 3px;
  
}
.list-items-1 .one-three ul li:hover a {
  text-decoration: none;
  background: #005b96;
line-height: 1.4;
  padding: 10px;
  box-sizing: border-box;
  transition: .6s ease-out; 
  font-weight: 500;
  color: #fff;
  margin-bottom: 5px;
  border-radius: 3px;
  box-sizing: border-box;
  transform: scale(1.05);
  transition: all .5s ease-in-out;

}
span.list-icon {
  color: #005b96;
  float: right;
  font-size: 12px;
  font-weight: normal;
  margin-right: 5px;
  margin-top: 3px;
}
.list-items-1 .one-three ul li:hover span.list-icon {
  color: #fff;
  float: right;
  font-size: 15px;
  font-weight: normal;
  margin-right: 4px;
  margin-top: 3px;
}

@media all and (max-width: 912px) {
  .list-items-1 .one-three {
  width: 30%;
  float: left;
  overflow: hidden;
  margin: 0 5px;
}
.list-items-1 a {
  line-height: 1.4;
  font-family: Poppins,Helvetica,sans-serif;
  padding: 10px;
  display: block;
  box-sizing: border-box;
  transition: .6s ease-out; 
  font-weight: 500;
  color: #555;
  margin-bottom: 5px;
  border-radius: 3px;
  }
.list-items-1 .one-three ul li:hover a {
  padding: 10px;
  display: block;
  box-sizing: border-box;
  font-weight: 500;
  color: #fff;
  margin-bottom: 5px;
  border-radius: 3px;
  
  }
  
}
@media all and (max-width: 768px) {
  
.list-items-1 .one-three {
  width: 46%;
  float: left;
  overflow: hidden;
  margin: 5px 10px;
}
  .list-items-1 .one-three ul li:hover a {
  padding: 10px;
  display: block;
  box-sizing: border-box;
  font-weight: 500;
  color: #fff;
  margin-bottom: 5px;
  border-radius: 3px;
  
  }

}
</style>

<body>
<?php include_once("header.php") ?>
        <div class="container">
                

                        <div class="list-items-1">
                                <div class="one-three">
                                        <h6 class="material-head">Study Materials - Aptitude</h6>
                                        <ul class="scrollable-list">
                                                <?php
                                                // Assuming you have a database connection established
                                                include_once("./config/connection.php");



                                                // Query to retrieve the file_name and file_id from the "materials" table
                                                $query = "SELECT file_id, file_name,file_location FROM materials WHERE type='Aptitude'";
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

                                                ?>
                                        </ul>
                                </div>
                                <div class="one-three">
                                        <h6 class="material-head">Study Materials - Coding</h6>
                                        <ul class="scrollable-list">
                                                <?php
                                                // Assuming you have a database connection established
                                                include_once("./config/connection.php");



                                                // Query to retrieve the file_name and file_id from the "materials" table
                                                $query = "SELECT file_id, file_name,file_location FROM materials WHERE type='Coding'";
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

                                                ?>
                                        </ul>
                                </div>
                                <div class="one-three">
                                        <h6 class="material-head">Study Materials - English</h6>
                                        <ul class="scrollable-list">
                                                <?php
                                                // Assuming you have a database connection established
                                                include_once("./config/connection.php");



                                                // Query to retrieve the file_name and file_id from the "materials" table
                                                $query = "SELECT file_id, file_name,file_location FROM materials WHERE type='English'";
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
                
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
                jQuery(".list-items-1 a").append('<span class="list-icon"><i class="fa-solid fa-download"></i></span>');
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>