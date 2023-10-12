<?php
include_once("./config/connection.php"); 

$sql = "SELECT image_url, caption FROM gallery";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet/less" href="gallery.less">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Add gallery styles here */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .gallery img {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <title></title>
</head>

<body>
    <div class="top-bar">
        <a href="index.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
        <h5><a href="connect_engage_1.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Connect & Engage</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="container">
        <nav>
            <ul class="list-items">
                <li><a href="connect_engage_1.php" class="nav-links active">
                        <i class="fa-solid fa-images"></i>
                        <span class="nav-item">Gallery</span>
                    </a></li>
                <li><a href="connect_engage_2.php" class="nav-links">
                        <i class="fa-solid fa-clipboard-question"></i>
                        <span class="nav-item">Queries</span>
                    </a></li>
                <li><a href="connect_engage_3.php" class="nav-links">
                        <i class="fa-solid fa-comment"></i>
                        <span class="nav-item">Feedbacks</span>
                    </a></li>
                <li><a href="connect_engage_4.php" class="nav-links">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="nav-item">Contact Us</span>
                    </a></li>
                <li><a href="connect_engage_5.php" class="nav-links">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="nav-item">About Us</span>
                    </a></li>
            </ul>
        </nav>
        <main>
            <div class="gallery">
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageURL = $row["image_url"];
                $caption = $row["caption"];
        ?>
                <figure>
                    <img src="./assets/slider/<?php echo $imageURL; ?>" alt="" />
                    <figcaption><?php echo $caption; ?></figcaption>
                </figure>
        <?php
            }
        } else {
            echo "No images found in the database.";
        }

        // Close the database connection
        $conn->close();
        ?>
            </div>
        </main>
    </div>
</body>

</html>