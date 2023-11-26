<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <title></title>
    <style>

    </style>


</head>

<body>
    <?php include_once("header.php") ?>
    <section class="inner-banner">
        <div class="container-fluid banner">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h1>Up Comming Placements</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="cards-container" style="display: flex;justify-content: center;">
        <?php
        include_once("./config/connection.php");

        // Fetching data for today's placements including overlapping events
        $today = date("Y-m-d");
        $today_placements_query = "SELECT GROUP_CONCAT(company_name SEPARATOR ', ') AS companies FROM placement_events WHERE event_date = '$today'";
        $today_placements_result = mysqli_query($conn, $today_placements_query);

        if ($today_placements_result) {
            $today_data = mysqli_fetch_assoc($today_placements_result);
            if ($today_data['companies']) {
                echo '<div class="card">
    <h5>Today placements: ' . $today_data['companies'] . '</h5>
  </div>';
            } else {
                echo '<div class="card">
    <h5>Today placements: No events scheduled</h5>
  </div>';
            }
        }

        // Fetching data for tomorrow's placements including overlapping events
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        $tomorrow_placements_query = "SELECT GROUP_CONCAT(company_name SEPARATOR ', ') AS companies FROM placement_events WHERE event_date = '$tomorrow'";
        $tomorrow_placements_result = mysqli_query($conn, $tomorrow_placements_query);

        if ($tomorrow_placements_result) {
            $tomorrow_data = mysqli_fetch_assoc($tomorrow_placements_result);
            if ($tomorrow_data['companies']) {
                echo '<div class="card">
    <h5>Tomorrow placements: ' . $tomorrow_data['companies'] . '</h5>
  </div>';
            } else {
                echo '<div class="card">
    <h5>Tomorrow placements: No events scheduled</h5>
  </div>';
            }
        }

        // Fetching data for next week's placements including overlapping events
        $next_week = date("Y-m-d", strtotime("+1 week"));
        $next_week_placements_query = "SELECT GROUP_CONCAT(company_name SEPARATOR ', ') AS companies FROM placement_events WHERE event_date = '$next_week'";
        $next_week_placements_result = mysqli_query($conn, $next_week_placements_query);

        if ($next_week_placements_result) {
            $next_week_data = mysqli_fetch_assoc($next_week_placements_result);
            if ($next_week_data['companies']) {
                echo '<div class="card">
    <h5>Placements next Week: ' . $next_week_data['companies'] . '</h5>
  </div>';
            } else {
                echo '<div class="card">
    <h5>Placements next Week: No events scheduled</h5>
  </div>';
            }
        }

        // Fetching data for next month's placements including overlapping events
        $next_month = date("Y-m-d", strtotime("+1 month"));
        $next_month_placements_query = "SELECT GROUP_CONCAT(company_name SEPARATOR ', ') AS companies FROM placement_events WHERE event_date BETWEEN '$next_week' AND '$next_month'";
        $next_month_placements_result = mysqli_query($conn, $next_month_placements_query);

        if ($next_month_placements_result) {
            $next_month_data = mysqli_fetch_assoc($next_month_placements_result);
            if ($next_month_data['companies']) {
                echo '<div class="card">
    <h5>Placements next month: ' . $next_month_data['companies'] . '</h5>
  </div>';
            } else {
                echo '<div class="card">
    <h5>Placements next month: No events scheduled</h5>
  </div>';
            }
        }
        ?>
    </div>


    <div class="container">
        <div class="section">
            <h2>Upcoming Placements</h2>
        </div>
        <div class="single-post-content">
            <table class="events-list">
                <?php
                include_once("./config/connection.php");

                // Fetch data from the database for events from today onwards
                $query = "SELECT * FROM placement_events WHERE event_date >= CURDATE() ORDER BY event_date";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $eventDate = date("d M", strtotime($row['event_date']));
                        $company_name = $row['company_name'];
                        $Details = $row['details'];
                        $companyLink = $row['company_link'];

                        echo '<tr>
            <td>
                <div class="event-date">
                    <div class="event-day">' . $eventDate . '</div>
                </div>
            </td>
            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>' . $company_name . '</td>
            <td class="event-price hidden-xs">' . $Details . '</td>
            <td><a href="' . $companyLink . '" class="btn btn-grey btn-sm event-more">Company Link</a></td>
        </tr>';
                    }
                }


                ?>

            </table>
        </div>
        <div class="section">
            <h2>Older Placements</h2>
        </div>






        <div class="single-post-content">
            <table class="events-list">
                <?php
                include_once("./config/connection.php");

                // Fetch data from the database for events older than today
                $query = "SELECT * FROM placement_events WHERE event_date < CURDATE() ORDER BY event_date DESC";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $eventDate = date("d M", strtotime($row['event_date']));
                        $company_name = $row['company_name'];
                        $Details = $row['details'];
                        $companyLink = $row['company_link'];

                        echo '<tr>
            <td>
                <div class="event-date">
                    <div class="event-day">' . $eventDate . '</div>
                </div>
            </td>
            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>' . $company_name . '</td>
            <td class="event-price hidden-xs">' . $Details . '</td>
            <td><a href="' . $companyLink . '" class="btn btn-grey btn-sm event-more">Company Link</a></td>
        </tr>';
                    }
                }

                $conn->close();
                ?>


            </table>
        </div>
    </div>
    <div class="container-fluid image-container1">
      <div class="icon"><img src="./assets/images/homeicon.png" alt="" srcset=""></div>
      <div class="text">Career Guidance and Placement Cell serves as a center that facilitates and inspires students for achieving employment, higher education and entrepreneurial aspiration.</div>
  </div>
<footer>
    <div class="footer-bottom">
      <p>©2021 ALL RIGHTS RESERVED - RIT KOTTYAM</p>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>