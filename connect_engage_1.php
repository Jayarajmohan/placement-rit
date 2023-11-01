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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet/less" href="gallery.less">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
<?php include_once("header.php") ?>
            <div class="gallery">
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageURL = $row["image_url"];
                $caption = $row["caption"];
        ?>
                <figure>
                    <img src="./admin/<?php echo $imageURL; ?>" alt="" />
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
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>