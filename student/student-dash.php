<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');

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
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Profile</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#register" class="dashboard-nav-dropdown-item">Update Profile</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Mock-Test</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="aptitude-exam.php" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="english-exam.php" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Live-Exam</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="live-exam-intro.php" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="live-exam-intro_1.php" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Study-Metrials</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#aptitude" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#coding" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="#english" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Usefull-links</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#link-aptitude" class="dashboard-nav-dropdown-item">Aptitude</a>
                        <a href="#link-coding" class="dashboard-nav-dropdown-item">Coding</a>
                        <a href="#link-english" class="dashboard-nav-dropdown-item">English</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>My placements</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#add-place" class="dashboard-nav-dropdown-item">Add Placement</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>Mock-Interviews</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#mock-interview" class="dashboard-nav-dropdown-item">Send Request</a>
                        <a href="#response" class="dashboard-nav-dropdown-item">View Response</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-photo-video"></i>No dues</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#nodues" class="dashboard-nav-dropdown-item">Send Request</a>
                        <a href="#view" class="dashboard-nav-dropdown-item">View Response</a>
                    </div>
                </div>
               
                <div class="nav-item-divider"></div>
                <a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content'>
                <div class='container' id="#home">
                <?php include_once("profile-details.php"); ?>
                    
                </div>
                <div class='container' id="#register">
                    <?php include_once("update-profile.php"); ?>
                </div>
                <div class='container' id="#aptitude">
                    <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">Study Materials - Aptitude</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
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
                    </div>
                </div>
                <div class='container' id="#coding">
                    <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">Study Materials - Coding</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
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
                    </div>
                </div>
                <div class='container' id="#english">
                    <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">Study Materials - English</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
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

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-aptitude">
                    <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">UseFull Links - Aptitude</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
                                // Query to retrieve the file_name and file_id from the "materials" table
                                $query = "SELECT link_id, link_name, link FROM links WHERE type='Aptitude'";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $linkId = $row['link_id'];
                                        $linkName = $row['link_name'];
                                        $link = $row['link'];
                                        echo '<li><a href="' . $link . '" download target="_blank">' . $linkName . '</a></li>';
                                    }
                                } else {
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-coding">
                <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">UseFull Links - Coding</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
                                // Query to retrieve the file_name and file_id from the "materials" table
                                $query = "SELECT link_id, link_name, link FROM links WHERE type='Coding'";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $linkId = $row['link_id'];
                                        $linkName = $row['link_name'];
                                        $link = $row['link'];
                                        echo '<li><a href="' . $link . '" download target="_blank">' . $linkName . '</a></li>';
                                    }
                                } else {
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='container' id="#link-english">
                <div class="list-items-1">
                        <div class="one-three">
                            <h6 class="material-head">UseFull Links - English</h6>
                            <ul class="scrollable-list">
                                <?php
                                // Assuming you have a database connection established
                                include_once("../config/connection.php");
                                // Query to retrieve the file_name and file_id from the "materials" table
                                $query = "SELECT link_id, link_name, link FROM links WHERE type='English'";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $linkId = $row['link_id'];
                                        $linkName = $row['link_name'];
                                        $link = $row['link'];
                                        echo '<li><a href="' . $link . '" download target="_blank">' . $linkName . '</a></li>';
                                    }
                                } else {
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class='container' id="#add-place">
                    <?php include_once("add-placments.php");?>
                </div>
                <div class='container' id="#mock-interview">
                    <?php include_once("mock-interview.php");?>
                </div>
                <div class='container' id="#response">
                    <?php include_once("view-response.php");?>
                </div>  
                <div class='container' id="#nodues">
                    <?php include_once("nodues.php");?>
                    
                </div>
                <div class='container' id="#view">
                <?php include_once("nodues-response.php");?>
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
                        // event.preventDefault(); // Prevent default link behavior

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