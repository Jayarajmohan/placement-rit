<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.php');
    
}
else{
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
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"><i
                        class="fa-solid fa-graduation-cap"></i> <span>CGPA-RIT</span></a></header>
            <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                    Home </a><a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i>
                    dashboard
                </a><a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Upload </a>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-photo-video"></i>
                        Media </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                            class="dashboard-nav-dropdown-item">Images</a><a href="#"
                            class="dashboard-nav-dropdown-item">Video</a></div>
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
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome <?php echo $row['name'];?></h1>
                        </div>
                        <div class='card-body'>
                            <p>Your account type is: Student</p>
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
    </script>
</body>

</html>