<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./assets/images/cgpa-logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
  <title>Placement cell </title>
</head>

<body>
<?php include("header.php")?>
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
                <p class="card-text">8075723660</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card border-0">
              <img src="./assets/images/Muhamed.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Muhamed Fayyas N</h5>
                <p class="card-text">Training Lead</p>
                <p class="card-text">8078197494</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card border-0">
              <img src="./assets/images/rebeeh.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rebeeh C V</h5>
                <p class="card-text">Student Coordinator</p>
                <p class="card-text">9562015680</p>
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
          <div class="index-buttons"><button><i class="fa-solid fa-envelope"></i>Placement Officer Message</button>
            <button><a href="./assets/brochure.pdf" style="text-decoration: none;color:inherit" target="_blank" ><i class="fa-solid fa-book-open"></i>Placement Brochure</a></button>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid image-container1">
    <div class="icon"><img src="./assets/images/homeicon.png" alt="" srcset=""></div>
    <div class="text">Career Guidance and Placement Cell serves as a center that facilitates and inspires students for
      achieving employment, higher education and entrepreneurial aspiration.</div>
  </div>
  <div class="recruiters-head">
    <h6>Our Major Recruiters</h6>
  </div>
  <div class="container companies-container">
    <div class="companies"><img src="./assets/images/1.png" alt="" srcset=""></div>
    <div class="companies"><img src="./assets/images/2.png" alt="" srcset=""></div>
    <div class="companies"><img src="./assets/images/3.png" alt="" srcset=""></div>
    <div class="companies"><img src="./assets/images/4.png" alt="" srcset=""></div>
    <div class="companies"><img src="./assets/images/5.png" alt="" srcset=""></div>
    <div class="companies"><img src="./assets/images/6.png" alt="" srcset=""></div>
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