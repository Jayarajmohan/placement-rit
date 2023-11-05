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
    <link rel="stylesheet" href="dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Company-Dashboard</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"><i
                        class="fas fa-anchor"></i> <span>
                        <?php echo $row['name']; ?>
                    </span></a></header>
            <nav class="dashboard-nav-list">
                <a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>Home </a>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-photo-video"></i>
                        Add Details</a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#add-details" class="dashboard-nav-dropdown-item">Add details</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Update Details</a>
                        <a href="#" class="dashboard-nav-dropdown-item">Video</a>
                    </div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Users </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Subscribed</a><a href="#"
                            class="dashboard-nav-dropdown-item">Non-subscribed</a><a href="#"
                            class="dashboard-nav-dropdown-item">Banned</a><a href="#"
                            class="dashboard-nav-dropdown-item">New</a></div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-money-check-alt"></i>
                        Payments </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                            class="dashboard-nav-dropdown-item"> Projections</a>
                    </div>
                </div>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a href="#"
                    class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
                <div class="nav-item-divider"></div>
                <a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content'>
                <div class='container' id="#add-details">
                <form action="add-details.php" method="post" enctype="multipart/form-data" class="upload-form">
                        <label for="image" class="label">Select image to upload:</label>
                        <div class="image-container">
                            <img id="img" src="choose.png" alt="Preview Image" height="200px"
                                style="border-radius: 10px;">
                            <input type="file" name="image" id="image" class="file-input">Choose image
                        </div>
                        <label for="about" class="label">About the Company</label>
                        <input type="text" name="about" id="about" class="text-input">
                        <label for="link">Link:</label>
                        <input type="url" id="link" name="link" required>
                        <input type="submit" value="Upload Image" name="submit" class="submit-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let img = document.getElementById('img');
        let input = document.getElementById('image');

        input.onchange = (e) => {
            if(input.files[0])
            img.src = URL.createObjectURL(input.files[0]);
        };
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