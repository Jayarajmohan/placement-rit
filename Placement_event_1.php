<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title></title>
</head>

<body>
    <div class="top-bar">
        <a href="index.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
        <h5><a href="Entrollment_payment_1.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Placement Event Planer</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="container">
        <nav>
            <ul class="list-items">
                <li><a href="Placement_event_1.php" class="nav-links active">
                        <i class="fa-regular fa-calendar-check"></i>
                        <span class="nav-item">Upcomming Recruitment</span>
                    </a></li>
                <li><a href="Placement_event_2.php" class="nav-links">
                        <i class="fa-solid fa-people-group"></i>
                        <span class="nav-item">Recruiters</span>
                    </a></li>
                <li><a href="Placement_event_3.php" class="nav-links">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="nav-item">Upcomming CGPA Sessions</span>
                    </a></li>
                <li><a href="Placement_event_4.php" class="nav-links">
                        <i class="fa-solid fa-suitcase"></i>
                        <span class="nav-item">Internships</span>
                    </a></li>
                <li><a href="Placement_event_5.php" class="nav-links">
                        <i class="fa-regular fa-clipboard"></i>
                        <span class="nav-item">Placement Recoreds</span>
                    </a></li>
            </ul>
        </nav>
        <main>
            <div class="container">
                <div class="section">
                    <div class="blog-post blog-single-post">
                        <div class="single-post-title">
                            <h2>Upcoming Placements</h2>
                        </div>
                        <div class="single-post-content">
                            <table class="events-list">
                                <?php
                               
                                    include_once("./config/connection.php");
                                // Fetch data from the database
                                $query = "SELECT * FROM placement_events";
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
                </div>
            </div>


        </main>
    </div>
</body>

</html>