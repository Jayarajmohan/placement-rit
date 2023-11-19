<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <title></title>
</head>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Up Comming CGPA SESSIONS</h1>
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
                $today_placements_query = "SELECT GROUP_CONCAT(event_name SEPARATOR ', ') AS events FROM cgpa_events WHERE event_date = '$today'";
                $today_placements_result = mysqli_query($conn, $today_placements_query);

                if ($today_placements_result) {
                    $today_data = mysqli_fetch_assoc($today_placements_result);
                    if ($today_data['events']) {
                        echo '<div class="card">
    <h5>Today placements: ' . $today_data['events'] . '</h5>
  </div>';
                    } else {
                        echo '<div class="card">
    <h5>Today placements: No events scheduled</h5>
  </div>';
                    }
                }

                // Fetching data for tomorrow's placements including overlapping events
                $tomorrow = date("Y-m-d", strtotime("+1 day"));
                $tomorrow_placements_query = "SELECT GROUP_CONCAT(event_name SEPARATOR ', ') AS events FROM cgpa_events WHERE event_date = '$tomorrow'";
                $tomorrow_placements_result = mysqli_query($conn, $tomorrow_placements_query);

                if ($tomorrow_placements_result) {
                    $tomorrow_data = mysqli_fetch_assoc($tomorrow_placements_result);
                    if ($tomorrow_data['events']) {
                        echo '<div class="card">
    <h5>Tomorrow placements: ' . $tomorrow_data['events'] . '</h5>
  </div>';
                    } else {
                        echo '<div class="card">
    <h5>Tomorrow placements: No events scheduled</h5>
  </div>';
                    }
                }

                // Fetching data for next week's placements including overlapping events
                $next_week = date("Y-m-d", strtotime("+1 week"));
                $next_week_placements_query = "SELECT GROUP_CONCAT(event_name SEPARATOR ', ') AS events FROM cgpa_events WHERE event_date = '$next_week'";
                $next_week_placements_result = mysqli_query($conn, $next_week_placements_query);

                if ($next_week_placements_result) {
                    $next_week_data = mysqli_fetch_assoc($next_week_placements_result);
                    if ($next_week_data['events']) {
                        echo '<div class="card">
    <h5>Placements next Week: ' . $next_week_data['events'] . '</h5>
  </div>';
                    } else {
                        echo '<div class="card">
    <h5>Placements next Week: No events scheduled</h5>
  </div>';
                    }
                }

                // Fetching data for next month's placements including overlapping events
                $next_month = date("Y-m-d", strtotime("+1 month"));
                $next_month_placements_query = "SELECT GROUP_CONCAT(event_name SEPARATOR ', ') AS events FROM cgpa_events WHERE event_date BETWEEN '$next_week' AND '$next_month'";
                $next_month_placements_result = mysqli_query($conn, $next_month_placements_query);

                if ($next_month_placements_result) {
                    $next_month_data = mysqli_fetch_assoc($next_month_placements_result);
                    if ($next_month_data['events']) {
                        echo '<div class="card">
    <h5>Placements next month: ' . $next_month_data['events'] . '</h5>
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
                            <h2>Upcoming CGPA Sessions</h2>
                        </div>
                        <div class="single-post-content">
                            <table class="events-list">
                                <?php
                               
                                    include_once("./config/connection.php");
                                // Fetch data from the database
                                $query = "SELECT * FROM cgpa_events WHERE event_date >= CURDATE() ORDER BY event_date";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $eventDate = date("d M", strtotime($row['event_date']));
                                        $eventName = $row['event_name'];
                                        $eventDetails = $row['event_details'];
                                        $eventLink = $row['event_link'];
            
                                        echo '<tr>
                                                <td>
                                                    <div class="event-date">
                                                        <div class="event-day">' . $eventDate . '</div>
                                                    </div>
                                                </td>
                                                <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>' . $eventName . '</td>
                                                <td class="event-price hidden-xs">' . $eventDetails . '</td>
                                                <td><a href="' . $eventLink . '" class="btn btn-grey btn-sm event-more">Events Link</a></td>
                                            </tr>';
                                    }
                                }
            
                                
                                ?>
                            </table>
                </div>
                <div class="section">
                            <h2>Older CGPA Sessions</h2>
                        </div>
                        <div class="single-post-content">
                            <table class="events-list">
                                <?php
                               
                                    include_once("./config/connection.php");
                                // Fetch data from the database
                                $query = "SELECT * FROM cgpa_events WHERE event_date < CURDATE() ORDER BY event_date";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $eventDate = date("d M", strtotime($row['event_date']));
                                        $eventName = $row['event_name'];
                                        $eventDetails = $row['event_details'];
                                        $eventLink = $row['event_link'];
            
                                        echo '<tr>
                                                <td>
                                                    <div class="event-date">
                                                        <div class="event-day">' . $eventDate . '</div>
                                                    </div>
                                                </td>
                                                <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>' . $eventName . '</td>
                                                <td class="event-price hidden-xs">' . $eventDetails . '</td>
                                                <td><a href="' . $eventLink . '" class="btn btn-grey btn-sm event-more">Events Link</a></td>
                                            </tr>';
                                    }
                                }
            
                                $conn->close();
                                ?>
                            </table>
                        </div>
                    </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>