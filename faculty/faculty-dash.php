<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');

} else {
    include_once("../config/connection.php");
    $id = $_SESSION['log_id'];


    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM login WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Faculty-Dashboard</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="#" class="brand-logo"><i class="fa-solid fa-graduation-cap"></i><span>CGPA-RIT</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="#home" class="dashboard-nav-item"><i class="fas fa-home"></i>Home </a>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Questions</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#questions" class="dashboard-nav-dropdown-item">Add questions</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Update questions</a>
                        <a href="" class="dashboard-nav-dropdown-item">Delete questions</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Usefull Links</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#links" class="dashboard-nav-dropdown-item">Add Links</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Update Links</a>
                        <a href="" class="dashboard-nav-dropdown-item">Delete links</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Study-Metrials</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#Meterials" class="dashboard-nav-dropdown-item">Add Metrials</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Update Metrials</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Delete Metrials</a>
                    </div>
                </div>
                <a href="#mock" class="dashboard-nav-item"><i class="fas fa-file-upload"></i>Mock-Interviews</a>
                <div class="nav-item-divider"></div>
                <a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content'>
                <div class='container' id="#home">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome <?php echo  $row['name'];?>

                            </h1>
                        </div>
                        <div class='card-body'>
                        </div>
                        <?php include("mock-view.php");?>
                    </div>
                    
                </div>
                
                <div class='container' id="#questions">
                    <form action="add-question.php" method="post" enctype="multipart/form-data" class="upload-form">
                        <select name="table-name" class="select">
                            <option value="" selected>Select the question type</option>
                            <option value="aptitude">Aptitude</option>
                            <option value="english">English</option>
                        </select>

                        <label for="question">Questions :</label>
                        <input type="text" name="question" id="question">

                        <label for="option_a">Option A :</label>
                        <input type="text" name="option_a" id="option_a">

                        <label for="option_b">Option B :</label>
                        <input type="text" name="option_b" id="option_b">

                        <label for="option_c">Option C :</label>
                        <input type="text" name="option_c" id="option_c">

                        <label for="option_d">Option D :</label>
                        <input type="text" name="option_d" id="option_d">

                        <label for="correct_option">Correct Answer</label>
                        <select name="correct_option" class="select">
                            <option value="" selected>Select the options</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>

                        <br><br>
                        <input type="submit" value="Upload Question" name="submit" class="submit-btn">
                    </form>

                </div>
                <div class='container' id="#links">
                    <form action="add-links.php" method="post" class="upload-form">
                        <label for="link_name">About the link:</label>
                        <input type="text" name="link_name" id="link_name">

                        <label for="about">Link:</label>
                        <input type="text" name="about" id="about">

                        <label for="type">Type:</label>
                        <select name="type" class="select">
                            <option value="" selected>Select the Type</option>
                            <option value="Aptitude">Aptitude</option>
                            <option value="Coding">Coding</option>
                            <option value="English">English</option>
                        </select>

                        <br><br>
                        <input type="submit" value="Upload Link" name="submit" class="submit-btn">
                    </form>

                </div>
                <div class='container' id="#Meterials">
                    <form action="add-meterials.php" method="post" enctype="multipart/form-data" class="upload-form">
                        <label for="file">Select file to upload:</label>
                        <input type="file" name="file" id="file">

                        <label for="file_name">File name :</label>
                        <input type="text" name="file_name" id="file_name">

                        <label for="type">Type:</label>
                        <select name="type" class="select">
                            <option value="" selected>Select the Type</option>
                            <option value="Aptitude">Aptitude</option>
                            <option value="Coding">Coding</option>
                            <option value="English">English</option>
                        </select>

                        <br><br>
                        <input type="submit" value="Upload file" name="submit" class="submit-btn">
                    </form>
                </div>
                <div class='container' id="#mock">
                    <?php include("student-request.php");?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
        $(document).ready(function () {
            $(".dashboard-nav-dropdown-toggle").click(function () {
                $(this).closest(".dashboard-nav-dropdown")
                    .toggleClass("show")
                    .find(".dashboard-nav-dropdown")
                    .removeClass("show");
                $(this).parent()
                    .siblings()
                    .removeClass("show");
            });
            $(".menu-toggle").click(function () {
                if (mobileScreen.matches) {
                    $(".dashboard-nav").toggleClass("mobile-show");
                } else {
                    $(".dashboard").toggleClass("dashboard-compact");
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            // Get all anchor tags within dashboard-nav-list
            const dashboardNavAnchors = document.querySelectorAll('.dashboard-nav-list a');

            // Get all containers within dashboard-content
            const dashboardContentContainers = document.querySelectorAll('.dashboard-content .container');

            // Function to show the 'home' page when the page loads
            function showHomePage() {
                dashboardContentContainers.forEach(container => {
                    if (container.id === '#home') {
                        container.style.display = 'block'; // Show the 'home' container
                    } else {
                        container.style.display = 'none'; // Hide other containers
                    }
                });
            }

            // Show the 'home' page when the page loads
            showHomePage();

            // Loop through all anchor tags
            dashboardNavAnchors.forEach(anchor => {
                anchor.addEventListener('click', function (event) {
                    const href = this.getAttribute('href');

                    // Check if the link belongs to the dashboard navigation
                    if (href.startsWith('#')) {
                        event.preventDefault(); // Prevent default link behavior

                        // Get the target container ID from the href attribute
                        const targetContainerId = href;

                        // Loop through containers to show/hide based on clicked anchor
                        dashboardContentContainers.forEach(container => {
                            if (container.id === targetContainerId) {
                                container.style.display = 'block'; // Show the target container
                            } else {
                                container.style.display = 'none'; // Hide other containers
                            }
                        });
                    }
                });
            });
        });

    </script>
</body>

</html>