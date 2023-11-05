<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Recruiters</title>
</head>
<style>
    :root{
    --primary:hsla(222, 82%, 34%, 0.26);
    --secondary:hsla(222, 82%, 34%, 0.199);
}
    .banner{
    background-color: #a2cce7;
    background: linear-gradient(135deg,var(--primary),var(--secondary)),
                url('./assets/images/banner.jpg') no-repeat center center / cover;
                background-attachment: fixed;
    background-size: cover;
    position: relative;
  }
  
  
  .header{
    margin: 6rem auto;
    text-align: center;
    align-items: stretch;
    display: flex !important;
    background-color: #802b8800;
    font-family: 'Montserrat', sans-serif;
  }
  .inner-banner h1 {
    display: block;
    padding-bottom: 1rem;
    font-family: 'texgyreadventorbold';
    font-size: 2rem;
    color: #004e89;
    text-transform: uppercase;
    margin-bottom: 0px;
    background: #ffffff;
    padding-top: 1rem;
}
.inner-banner .header::before,.inner-banner .header::after{
    content: "";
    flex: 1;
}
.inner-banner .header::before{
    background: linear-gradient(to right, #ffffff00, #ffffff) !important;
}
.inner-banner .header::after{
    background: linear-gradient(to left, #ffffff00, #ffffff) !important;
}
</style>
<body>
<?php include_once("header.php") ?>
<section class="inner-banner">
      <div class="container-fluid banner">
        <div class="row">
          <div class="col-md-12">
            <div class="header">
              <h1>Recruiters</h1>
            </div>
          </div>
        </div>
      </div>
      </section>
<div class="container">

      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>