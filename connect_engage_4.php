<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/events.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
  <title></title>
</head>
<style>
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: #333;
  }

  .contact-info {
    margin-top: 20px;
  }

  .contact-info p {
    margin: 10px 0;
  }

  @media (max-width: 600px) {
    .container {
      padding: 10px;
    }
  }
</style>

<body>
  <?php include_once("header.php") ?>
  <section class="inner-banner">
    <div class="container-fluid banner">
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <h1>Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="contact-info row">
      <div class="col-md-6">
      <i class="fa-solid fa-user-tie"></i>
        <p><strong>Prof Ebin M Manuel</strong>, Placement Officer<br>Phone: 8075723660</p>
      </div>
      <div class="col-md-6">
      <i class="fa-solid fa-users"></i>
        <p><strong>Fayyas</strong>, Training Lead<br>Phone: 8078197494</p>
      </div>
    </div>
    <div class="contact-info row">
      <div class="col-md-6">
      <i class="fa-solid fa-user-graduate"></i>
        <p><strong>Rabeeh C. V</strong>, Student Coordinator<br>Phone: 9562015680</p>
      </div>
      <div class="col-md-6">
      <i class="fa-solid fa-envelope"></i>
        <p><strong>RIT Placement Cell</strong><br>Email: <a href="mailto:placement@rit.ac.in">placement@rit.ac.in</a>
        </p>
      </div>
    </div>
  </div>
  <div class="container-fluid image-container1">
    <div class="icon"><img src="./assets/images/homeicon.png" alt="" srcset=""></div>
    <div class="text">Career Guidance and Placement Cell serves as a center that facilitates and inspires students for
      achieving employment, higher education and entrepreneurial aspiration.</div>
  </div>
  <footer>
    <div class="footer-bottom">
      <p>©2021 ALL RIGHTS RESERVED - RIT KOTTYAM</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>