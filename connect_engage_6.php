<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/help.css?v=<?php echo time(); ?>">
    <title></title>
</head>
<body>
<?php include_once("header.php") ?>
    <section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Help</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
<main style="margin-bottom:20px;">
        <section class="tab__container">
            <div class="tab__title">
                <button class="tab__button tab_button-active" onclick="openTab('one')"><img
                        src="https://www.desertfinancial.com/-/media/caf282de9d344eb7a25365fa69ea6fd5.ashx">Payment</button>
                <button class="tab__button" onclick="openTab('two')"><img
                        src="https://www.desertfinancial.com/-/media/cc54f257b5f64e1e97b8f9d4576fae12.ashx">Student
                    Register</button>
                <button class="tab__button" onclick="openTab('three')"><img
                        src="https://www.desertfinancial.com/-/media/37d31d8e202b4fe0876ec00adc142c45.ashx">No
                    Dues</button>
                <button class="tab__button" onclick="openTab('four')"><img
                        src="https://www.desertfinancial.com/-/media/c7cd8a3005104e3abea89f1d1348e157.ashx">Resume
                    Score Checker</button>

            </div>
            <!---- Start tab ---->
            <div id="one" class="tab__inside tab__inside-active">
                <div class="tab__inside-img">
                    <img src="https://www.desertfinancial.com/-/media/caf282de9d344eb7a25365fa69ea6fd5.ashx">
                </div>
                <div class="tab__inside-text">
                    <h3>Payment</h3>
                    <p>For Getting Account to CGPA RIT First complete the payment</p>
                    <ol>
                        <li>Go to payment</li>
                        <li>You have 2 minutes for payment</li>
                        <li>Use the college mail id for payment</li>
                        <li>Complete the transaction</li>
                        <li>Enetr the transaction Id</li>
                        <li>Submit</li>
                    </ol>
                    <!-- <button>button</button> -->
                </div>

            </div>
            <!---- End tab ---->

            <!---- Start tab ---->
            <div id="two" class="tab__inside">
                <div class="tab__inside-img">
                    <img src="https://www.desertfinancial.com/-/media/cc54f257b5f64e1e97b8f9d4576fae12.ashx">
                </div>
                <div class="tab__inside-text">
                    <h3>Student Registration</h3>
                    <p>After completion of payment then fill the details of student.
                    </p>
                    <ol>
                        <li>Enter the details properly</li>
                        <li>Enter the same college mail id for Registration</li>
                        <li>Fill all the mandatory fields correctly</li>
                    </ol>
                    <!-- <button>button</button> -->
                </div>
            </div>
            <!---- End tab ---->

            <!---- Start tab ---->
            <div id="three" class="tab__inside">
                <div class="tab__inside-img">
                    <img src="https://www.desertfinancial.com/-/media/37d31d8e202b4fe0876ec00adc142c45.ashx">
                </div>
                <div class="tab__inside-text">
                    <h3>No dues Application</h3>
                    <p>Students can apply for the no dues with your profile.
                    </p>
                    <ol>
                        <li>Go to your dashboard with email and password</li>
                        <li>There you can see the no dues session</li>
                        <li>Click apply</li>
                    </ol>
                    <!-- <button>button</button> -->
                </div>
            </div>
            <!---- End tab ---->

            <!---- Start tab ---->
            <div id="four" class="tab__inside">
                <div class="tab__inside-img">
                    <img src="https://www.desertfinancial.com/-/media/c7cd8a3005104e3abea89f1d1348e157.ashx">
                </div>
                <div class="tab__inside-text">
                    <h3>Resume Score Checker</h3>
                    <p>Students can check you resume score
                    </p>
                    <ol>
                        <li>Go to Events & Plan</li>
                        <li>Up load your resume</li>
                        <li>Click submit</li>
                    </ol>
                    <!-- <button>button</button> -->
                </div>
            </div>
            <!---- End tab ---->
        </section>
    </main>
    <div class="container-fluid image-container1" style="margin-top:100px;">
      <div class="icon"><img src="./assets/images/homeicon.png" alt="" srcset=""></div>
      <div class="text">Career Guidance and Placement Cell serves as a center that facilitates and inspires students for achieving employment, higher education and entrepreneurial aspiration.</div>
  </div>
<footer>
    <div class="footer-bottom">
      <p>©2021 ALL RIGHTS RESERVED - RIT KOTTYAM</p>
    </div>
  </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function openTab(tabNumber) {
            // Remove the 'tab_button-active' class from all buttons
            $('.tab__button').removeClass('tab_button-active');

            // Add the 'tab_button-active' class to the clicked button
            $('.tab__button[data-tab="' + tabNumber + '"]').addClass('tab_button-active');

            // Show or hide the tab contents
            $('.tab__inside').removeClass('tab__inside-active');
            $('#' + tabNumber).addClass('tab__inside-active');
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>