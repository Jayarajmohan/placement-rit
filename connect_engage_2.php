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
    <style>
        .container{
            display: flex;
 align-items: center;
 justify-content: center;
        }
        .wrapper{
  max-width: 350px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 5px;
  box-shadow: 1px 1px 1px rgb(189, 207, 228); 
}

.wrapper h2{
  text-align: center;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: #332902;
}

.wrapper .input_field{
  margin-bottom: 10px;
}

.wrapper .input_field input[type="text"],
.wrapper textarea{
  border: 1px solid #66dbff;
  border-radius: 5px;
  width: 100%;
  padding: 10px;
}

.wrapper textarea{
  resize: none;
  height: 80px;
}

.wrapper .btn input[type="submit"]{
  border: 0px;
  margin-top: 15px;
  padding: 10px;
  text-align: center;
  width: 100%;
  background: #00a2ff;
  color: #332902;
  text-transform: uppercase;
  letter-spacing: 5px;
  font-weight: bold;
  border-radius: 5px;
  cursor: pointer;
}

#error_message{
  margin-bottom: 20px;
  background: #fe8b8e;
  padding: 0px;
  text-align: center;
  font-size: 14px;
  transition: all 0.5s ease;
}
    </style>
</head>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Queries</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
<div class="container">

        <div class="wrapper">
                <h2>Your Queries</h2>
                <div id="error_message"></div>
                <form id="myform" action="process_queries.php" method="post">
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
                        <textarea placeholder="Your Queries" id="yourqueries" name="yourqueries"></textarea>
                    </div>
                    <div class="btn">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
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