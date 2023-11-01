<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
    <style>

        /* career toopic mocktest */

.card-category-1, .card-category-2, .card-category-3, .card-category-4, .card-category-5, .card-category-6 {
  font-family: sans-serif;
  margin-bottom: 45px;
  text-align: center;
}
  .card-category-1 div, .card-category-2 div {
      display:inline-block;
  }

  .card-category-1 > div, .card-category-2 > div:not(:last-child) {
      margin: 10px 5px;
      text-align: left;
  }

  /* Basic Card */
  .basic-card {
      width:300px;
      position: relative;
      
      -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
      -moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
      -o-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
      box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.3);
  }
  
      .basic-card .card-content {
          padding: 30px;
      }

      .basic-card .card-title {
          font-size: 25px;
          font-family: 'Open Sans', sans-serif;
      }

      .basic-card .card-text {
          line-height: 1.6;
      }

      .basic-card .card-link {
          padding: 25px;
          width: -webkit-fill-available;
      }

          .basic-card .card-link a {
              text-decoration: none;
              position: relative;
              padding: 10px 0px;
          }

          .basic-card .card-link a:after {
              top: 30px;
              content: "";
              display: block;
              height: 2px;
              left: 50%;
              position: absolute;
              width: 0;

              -webkit-transition: width 0.3s ease 0s, left 0.3s ease 0s;
              -moz-transition: width 0.3s ease 0s, left 0.3s ease 0s;
              -o-transition: width 0.3s ease 0s, left 0.3s ease 0s;
              transition: width 0.3s ease 0s, left 0.3s ease 0s;
          }

          .basic-card .card-link a:hover:after { 
              width: 100%; 
              left: 0; 
          }
  
  
  .basic-card-aqua {
      background-image: linear-gradient(to bottom right, #00bfad, #99a3d4);
  }

      .basic-card-aqua .card-content, .basic-card .card-link a {
          color: #fff;
      }
      
      .basic-card-aqua .card-link {
          border-top:1px solid #82c1bb;
      }

          .basic-card-aqua .card-link a:after {
              background:#fff;
          }

  .basic-card-lips {
      background-image: linear-gradient(to bottom right, #ec407b, #ff7d94);
  }

      .basic-card-lips .card-content {
          color: #fff;
      }

      .basic-card-lips .card-link {
          border-top: 1px solid #ff97ba;
      }

          .basic-card-lips .card-link a:after {
              background:#fff;
          }
  
  .basic-card-light {
      border: 1px solid #eee;
  }

      .basic-card-light .card-title, .basic-card-light .card-link a {
          color: #636363;
      }
      
      .basic-card-light .card-text {
          color: #7b7b7b;
      }

      .basic-card-light .card-link {
          border-top: 1px solid #eee;
      }

          .basic-card-light .card-link a:after {
              background:#636363;
          }

  .basic-card-dark {
      background-image: linear-gradient(to bottom right, #252525, #4a4a4a);
  }

      .basic-card-dark .card-title, .basic-card-dark .card-link a {
          color:#eee;
      }

      .basic-card-dark .card-text {
          color: #dcdcdcdd;
      }

      .basic-card-dark .card-link {
          border-top: 1px solid #636363;
      }

      .basic-card-dark .card-link a:after {
          background:#eee;
      }


    </style>
</head>
<body>
    
<?php include_once("header.php") ?>
<!-- <div class="top-bar">
        <a href="index.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
        <h5><a href="career_prep_1.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Career Prep Toolkit</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
<div class="container">
        <!-- <nav>
            <ul class="list-items">
                <li><a href="career_prep_1.php" class="nav-links active">
                <i class="fa-solid fa-highlighter"></i>
                    <span class="nav-item">Mock test</span>
                </a></li>
                <li><a href="career_prep_2.php" class="nav-links">
                <i class="fa-solid fa-video"></i>
                    <span class="nav-item">Mock Interviews</span>
                </a></li>
                <li><a href="career_prep_3.php" class="nav-links">
                <i class="fa-solid fa-pen-to-square"></i>
                    <span class="nav-item">Live exams</span>
                </a></li>
                <li><a href="career_prep_4.php" class="nav-links">
                <i class="fa-solid fa-book-open"></i>
                    <span class="nav-item">Study Meterials</span>
                </a></li>
                <li><a href="career_prep_5.php" class="nav-links">
                <i class="fa-solid fa-link"></i>
                    <span class="nav-item">Usefull links</span>
                </a></li>
            </ul>
        </nav>
        <main>
         -->
     
            
            <div class="card-category-1">
                
                <div class="basic-card basic-card-aqua">
                    <div class="card-content">
                        <span class="card-title">Aptitude</span>
                        <p class="card-text">
                            Aptitude
                        </p>
                    </div>
    
                    <div class="card-link">
                        <a href="aptitude-exam.php" title="Read Full"><span>Read Full</span></a>
                    </div>
                </div>
    
                <div class="basic-card basic-card-lips">
                    <div class="card-content">
                        <span class="card-title">Coding</span>
                        <p class="card-text">
                            Coding
                        </p>
                    </div>
    
                    <div class="card-link">
                        <a href="code-platform.html" title="Read Full"><span>Read Full</span></a>
                    </div>
                </div>
    
                
                <div class="basic-card basic-card-dark">
                    <div class="card-content">
                        <span class="card-title">English</span>
                        <p class="card-text">
                        English
                        </p>
                    </div>
    
                    <div class="card-link">
                        <a href="english-exam.php" title="Read Full"><span>Read Full</span></a>
                    </div>
                </div>
                
            </div>

        <!-- </main> -->
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>