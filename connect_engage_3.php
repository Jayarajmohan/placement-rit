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
        <h5><a href="connect_engage_1.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Connect & Engage</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="container">
        <nav>
            <ul class="list-items">
                <li><a href="connect_engage_1.php" class="nav-links">
                        <i class="fa-solid fa-images"></i>
                        <span class="nav-item">Gallary</span>
                    </a></li>
                <li><a href="connect_engage_2.php" class="nav-links">
                        <i class="fa-solid fa-clipboard-question"></i>
                        <span class="nav-item">Queries</span>
                    </a></li>
                <li><a href="connect_engage_3.php" class="nav-links active">
                        <i class="fa-solid fa-comment"></i>
                        <span class="nav-item">Feedbacks</span>
                    </a></li>
                <li><a href="connect_engage_4.php" class="nav-links">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="nav-item">Contact Us</span>
                    </a></li>
                <li><a href="connect_engage_5.php" class="nav-links">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="nav-item">About Us</span>
                    </a></li>
            </ul>
        </nav>
        <main>
            <div class="wrapper">
                <h2>Feedback Form</h2>
                <div id="error_message"></div>
                <form id="myform" action="process_feedback.php" method="post">
                    <div class="input_field">
                        <input type="text" placeholder="First Name" id="fname" name="fname">
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="Last Name" id="lname" name="lname">
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="Phone" id="phone" name="phone">
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="input_field">
                        <textarea placeholder="Your Feedback" id="yourfeedback" name="yourfeedback"></textarea>
                    </div>
                    <div class="btn">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>