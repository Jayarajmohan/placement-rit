<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title></title>
</head>

<body>
    <div class="top-bar">
        <a href="logout.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
        <h5><a href="logout.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Admin Dashboard</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="container">
        <nav class="sidebar">
            <ul class="list-items">
            <li><a href="#home" class="nav-links active">
                        <i class="fa-solid fa-highlighter"></i>
                        <span class="nav-item">HOME</span>
                    </a></li>
                <li><a href="#gallery" class="nav-links">
                        <i class="fa-solid fa-highlighter"></i>
                        <span class="nav-item">ADD Gallery </span>
                    </a></li>
                <li><a href="#Questions" class="nav-links">
                        <i class="fa-solid fa-video"></i>
                        <span class="nav-item">ADD Questions</span>
                    </a></li>
                <li><a href="#Links" class="nav-links">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="nav-item">ADD Usefull Links</span>
                    </a></li>
                <li><a href="#Meterials" class="nav-links">
                        <i class="fa-solid fa-book-open"></i>
                        <span class="nav-item">ADD Study Meterials</span>
                    </a></li>
                <li><a href="#placementEvents" class="nav-links">
                        <i class="fa-solid fa-link"></i>
                        <span class="nav-item">ADD Placement Events</span>
                    </a></li>
                    <li><a href="#cgpaEvents" class="nav-links">
                        <i class="fa-solid fa-link"></i>
                        <span class="nav-item">ADD CGPA Events</span>
                    </a></li>
                <li><a href="#Queries" class="nav-links">
                        <i class="fa-solid fa-link"></i>
                        <span class="nav-item">View Queries</span>
                    </a></li>
                <li><a href="#Feedbacks" class="nav-links">
                        <i class="fa-solid fa-link"></i>
                        <span class="nav-item">View Feedbacks</span>
                    </a></li>
            </ul>
        </nav>
        <main>
        <div class="gallery" id="#home">
                <?php include('user-info.php'); ?>
            </div>
            <div class="gallery" id="#gallery">
                <form action="image-add.php" method="post" enctype="multipart/form-data">
                    <label for="image">Select image to upload:</label>
                    <div>
                        <img id="img" src="choose.png" alt="" height="200" style="border-radius:10px;">
                    </div>
                    <input type="file" name="image" id="image">
                    <label for="text">About the image :</label>
                    <input type="text" name="about" id="about">
                    <br><br>
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
            <div class="gallery" id="#Questions">
            <form action="add-question.php" method="post" enctype="multipart/form-data">
                    <select name="table-name" id="" class="select">
                        <option value="" selected>Select the question type</option>
                        <option value="aptitude">Aptitude</option>
                        <option value="english">English</option>
                    </select>
                    <label for="text">Questions :</label>
                    <input type="text" name="question" id="about">
                    <label for="text">Option A :</label>
                    <input type="text" name="option_a" id="about">
                    <label for="text">Option B :</label>
                    <input type="text" name="option_b" id="about">
                    <label for="text">Option C :</label>
                    <input type="text" name="option_c" id="about">
                    <label for="text">Option D :</label>
                    <input type="text" name="option_d" id="about">
                    <label for="text">Correct Answer</label>
                    <select name="correct_option" id="" class="select">
                        <option value="" selected>Select the options</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Upload Question" name="submit">
                </form>
            </div>
            <div class="gallery" id="#Links">
            <form action="add-links.php" method="post">
                    <label for="text">About the link :</label>
                    <input type="text" name="link_name" id="image">
                    <label for="text">Link :</label>
                    <input type="text" name="about" id="about">
                    <label for="text">Type :</label>
                    <select name="type" id="" class="select">
                        <option value="" selected>Select the Type</option>
                        <option value="Aptitude">Aptitude</option>
                        <option value="Coding">Coding</option>
                        <option value="English">English</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Upload Link" name="submit">
                </form>
            </div>
            <div class="gallery" id="#Meterials">
            <form action="add-meterials.php" method="post" enctype="multipart/form-data">
                    <label for="files">Select file to upload:</label>
                    <input type="file" name="file" id="file">
                    <label for="text">File name :</label>
                    <input type="text" name="file_name" id="about">
                    <select name="type" id="" class="select">
                        <option value="" selected>Select the Type</option>
                        <option value="Aptitude">Aptitude</option>
                        <option value="Coding">Coding</option>
                        <option value="English">English</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Upload file" name="submit">
                </form>
            </div>
            <div class="gallery" id="#placementEvents">
            <form action="add-events.php" method="post" enctype="multipart/form-data">
                    <label for="text">Add Placement events</label>
                    <label for="name">Company Name:</label>
			        <input type="text" id="name" name="name" required>
			        <label for="description">Description :</label>
			        <textarea type="text" name="description" id="description" required></textarea>
                    <label for="start">Date:</label>
			        <input type="date" id="from" name="date" required>
                    <label for="link">Link:</label>
			        <input type="link" id="from" name="link" required>
                    <br><br>
                    <input type="submit" value="Add Event" name="submit">
                </form>
            </div>
            <div class="gallery" id="#cgpaEvents">
            <form action="add-cgpaevents.php" method="post" enctype="multipart/form-data">
            <label for="text">Add CGPA events</label>
                    <label for="name">Event Name:</label>
			        <input type="text" id="name" name="name" required>
			        <label for="description">Description :</label>
			        <textarea type="text" name="description" id="description" required></textarea>
                    <label for="start">Date:</label>
			        <input type="date" id="from" name="date" required>
                    <label for="link">Link:</label>
			        <input type="link" id="from" name="link" required>
                    <br><br>
                    <input type="submit" value="Add Event" name="submit">
                </form>
            </div>
            <div class="gallery" id="#Queries">
                <?php
                include_once("./view-queries.php");
                ?>
            </div>
            <div class="gallery" id="#Feedbacks">
            <?php
                include_once("./view-feedbacks.php");
                ?>
            </div>
        </main>
    </div>
    <script>
        let img = document.getElementById('img');
        let input = document.getElementById('image');

        input.onchange = (e) => {
            if(input.files[0])
            img.src = URL.createObjectURL(input.files[0]);
        };
        document.addEventListener('DOMContentLoaded', function () {
    // Get all navigation links and corresponding content divs
    const navLinks = document.querySelectorAll('.nav-links');
    const contentDivs = document.querySelectorAll('.gallery');

    // Function to show the gallery section by default
    function showGallerySection() {
        // Remove the 'active' class from all navigation links
        navLinks.forEach((navLink) => {
            navLink.classList.remove('active');
        });

        // Hide all content divs
        contentDivs.forEach((contentDiv) => {
            contentDiv.style.display = 'none';
        });

        // Find the index of the 'gallery' link and set it as active
        const galleryIndex = Array.from(navLinks).findIndex((navLink) => {
            return navLink.getAttribute('href') === '#home';
        });

        // If the 'gallery' link is found, set it as active and show the gallery section
        if (galleryIndex !== -1) {
            navLinks[galleryIndex].classList.add('active');
            contentDivs[galleryIndex].style.display = 'block';
        }
    }

    // Show the gallery section by default on page load
    showGallerySection();

    // Add a click event listener to each navigation link
    navLinks.forEach((link, index) => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Remove the 'active' class from all navigation links
            navLinks.forEach((navLink) => {
                navLink.classList.remove('active');
            });

            // Hide all content divs
            contentDivs.forEach((contentDiv) => {
                contentDiv.style.display = 'none';
            });

            // Add the 'active' class to the clicked navigation link
            link.classList.add('active');

            // Show the corresponding content div based on the index
            contentDivs[index].style.display = 'block';
        });
    });
});

    </script>
</body>

</html>