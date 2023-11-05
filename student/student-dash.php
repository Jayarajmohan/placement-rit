<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.php');

} else {
    include_once("../config/connection.php");
    $id = $_SESSION['log_id'];


    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM login_1 WHERE log_id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student-dash.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student-Dashboard</title>
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
                        <a href="#!"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Profile</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#" class="dashboard-nav-dropdown-item">Profile Registration</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Update Profile</a>
                    </div>
                </div>
                    <div class='dashboard-nav-dropdown'>
                        <a href="#!"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Mock-Test</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="aptitude-exam.php" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="english-exam.php" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                        <a href="#!"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Live-Exam</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="#" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                        <a href="#!"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Study-Metrials</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#aptitude" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#coding" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="#english" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                        <a href="#!"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Usefull-links</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#link-aptitude" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#link-coding" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="#link-english" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i>Mock-Interviews</a>
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
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>Ydrgdrydrye is: Student</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#aptitude">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>sgdsgsdgs: Student</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#coding">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>ettwetwetwetew: Student</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#english">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>ewttwetwtew Student</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-aptitude">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>ewtewtwtewtStudent</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-coding">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>ewrewrwrwes: Student</p>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-english">
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome
                                <?php echo $row['name']; ?>
                            </h1>
                        </div>
                        <div class='card-body'>
                            <p>eitueotuewStudent</p>
                        </div>
                    </div>
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
        // Get all anchor tags within dashboard-nav-list
const dashboardNavAnchors = document.querySelectorAll('.dashboard-nav-list a');

// Get all containers within dashboard-content
const dashboardContentContainers = document.querySelectorAll('.dashboard-content .container');

// Loop through all anchor tags
dashboardNavAnchors.forEach(anchor => {
    anchor.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the target container ID from the href attribute
        const targetContainerId = this.getAttribute('href');

        // Loop through containers to show/hide based on clicked anchor
        dashboardContentContainers.forEach(container => {
            if (container.id === targetContainerId) {
                container.style.display = 'block'; // Show the target container
            } else {
                container.style.display = 'none'; // Hide other containers
            }
        });
    });
});

    </script>
</body>

</html>