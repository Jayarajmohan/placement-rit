<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <title></title>
</head>
<style></style>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Internships</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
      <div class="container">
        <div class="section">
            <h2>Upcoming Internships</h2>
        </div>
        <div class="single-post-content">
            <table class="events-list">
                <?php
                include_once("./config/connection.php");

                // Fetch data from the database for events from today onwards
                $query = "SELECT * FROM internships WHERE event_date >= CURDATE() ORDER BY event_date";
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
            <td><a href="' . $companyLink . '" class="btn btn-grey btn-sm event-more">Internship Link</a></td>
        </tr>';
                    }
                }


                ?>

            </table>
        </div>
        <div class="section">
            <h2>Older Internships</h2>
        </div>






        <div class="single-post-content">
            <table class="events-list">
                <?php
                include_once("./config/connection.php");

                // Fetch data from the database for events older than today
                $query = "SELECT * FROM internships WHERE event_date < CURDATE() ORDER BY event_date DESC";
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