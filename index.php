<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./assets/images/cgpa-logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
  <title>Placement cell </title>
</head>

<body>
  <header>
    <div class="top-bar">
      <div class="top-right-content">
        <p>placement@rit.in</p>
      </div>
    </div>
    <div class="title-container container-fluid">
      <div class="logo">
        <img src="./assets/images/cgpa-logo.png" alt="">
      </div>
      <div class="logo-title">
        <h3>Placement Cell And Career Guidance</h3>
        <h5>Rajiv Gandhi Institute of Technology Kottayam</h5>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Placement Cell Rit</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="Entrollment_payment_1.php">Enrollment & Payment</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Placement Statistics</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="Placement_event_1.php">Events Plan</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="career_prep_1.php">Career Prep Toolkit</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="connect_engage_1.php">Connect & Engage</a>
            </li>
          </ul>
          <div class="d-flex justify-content-center flex-lg-row align-items-center gap-3">
            <a href="login.html" class="text-white text-decoration-none px-3 py-1 bg-primary rounded-2">Login</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="slider-container">
    <div class="slider">
      <?php
      // Database connection
      
      include_once("./config/connection.php");

      // Fetch images from the database
      $sql = "SELECT banner_image FROM slider";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $image_path = "./assets/slider/" . $row['banner_image']; // Assuming images are in a folder named 'slider'
          echo "<div class='slide'><img class='image' src='$image_path' alt='Banner Image'></div>";
        }
      } else {
        echo "No images found.";
      }

      $conn->close();
      ?>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="row card-group">
          <div class="col-md-4">
            <div class="card custom-card border-0">
              <img src="./assets/images/Ebin-photo.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Prof.Ebin M Manuel</h5>
                <p class="card-text">Placement Officer</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card border-0">
              <img src="./assets/images/dummy-man.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Muhamed Fayyas N</h5>
                <p class="card-text">Training Lead</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card border-0">
              <img src="./assets/images/rebeeh.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rebeeh C V</h5>
                <p class="card-text">Student Coordinator</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="content">
            <h5>Welcome to CGPC at Rajiv Gandhi Institute of Technology Kottayam</h5>
            <p>Rajiv Gandhi Institute of Technology, established in 1991, has reached an outstanding position in higher
              education sector in Kerala with profound achievements in post graduation and research activities. It is
              affiliated to APJ Abdul Kalam University, Thiruvananthapuram and Mahatma Gandhi University Kottayam,
              Kerala.</p>
            <p>Our alumni occupy top positions in industry, R&D and academia both in India and abroad. You would find
              talented candidates that suits all your requirements, and it will be our pleasure to support your
              recruitment efforts. Career Guidance and Placement Cell serves as an interface between graduating students
              and prospective employers. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="strut-image">
          <img src="./assets/images/CGPC connect.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-bottom">
      <p>©2021 ALL RIGHTS RESERVED - RIT KOTTYAM</p>
    </div>
  </footer>
  <script>
    // JavaScript for image slider functionality (e.g., sliding images)
    const slider = document.querySelector('.slider');
    let slideIndex = 0;

    function nextSlide() {
      slideIndex++;
      if (slideIndex >= slider.children.length) {
        slideIndex = 0;
      }
      updateSlider();
    }

    function updateSlider() {
      const translateX = -slideIndex * 100;
      slider.style.transform = `translateX(${translateX}%)`;
    }

    setInterval(nextSlide, 5000); // Change slide every 5 seconds
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>