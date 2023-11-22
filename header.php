<style>
    header {
    max-width: 100%;
    background-color: #f2f2f2;
}

.top-bar {
    background-color: #005b96;
    height: 20px;
}

.top-right-content {
    float: right;
    color: #f2f2f2;
    font-size: 0.7rem;
}

.title-container {
    display: flex;
    align-items: center;
    background-color: #f2f2f2;
}

.logo {
    width: 100px;
    height: 100px;
}

.logo img {
    width: 70px;
    height: 70px;
    margin-right: 12px;
}

.logo-title {
    flex-grow: 1;
}
</style>
<header>
<div>
    <div class="top-bar">
      <div class="top-right-content">
        <p>placement@rit.ac.in</p>
      </div>
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
      <!-- <div class="logo-title">
        <h3>Placement Cell And Career Guidance</h3>
        <h5>Rajiv Gandhi Institute of Technology Kottayam</h5>
      </div> -->
      <div class="logo">
        <img src="./assets/images/rit-logo.png" alt="">
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
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="Entrollment_payment_1.php">Enrollment & Payment</a>
            </li> -->
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Enrollment & Payment
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="student-reg.html">Student Register</a></li>
            <li><a class="dropdown-item" href="company-reg.html">Company Register</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Payments</a></li>
          </ul>
        </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="placement-statastics.php">Placement Statistics</a>
            </li>
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="Placement_event_1.php">Events Plan</a>
            </li> -->
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Events Plan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="Placement_event_1.php">Upcomming Recruitment</a></li>
            <li><a class="dropdown-item" href="Placement_event_2.php">Recruiters</a></li>
            <li><a class="dropdown-item" href="Placement_event_3.php">Upcomming CGPA Sessions</a></li>
            <li><a class="dropdown-item" href="Placement_event_4.php">Internships</a></li>
            <li><a class="dropdown-item" href="Placement_event_5.php">Placement Recoreds</a></li>
            
          </ul>
        </li>
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="career_prep_1.php">Career Prep Toolkit</a>
            </li> -->
            <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Career Prep Toolkit
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="career_prep_1.php">Mock test</a></li>
            <li><a class="dropdown-item" href="career_prep_2.php">Mock Interviews</a></li>
            <li><a class="dropdown-item" href="career_prep_3.php">Live exams</a></li>
            <li><a class="dropdown-item" href="career_prep_4.php">Study Meterials</a></li>
            <li><a class="dropdown-item" href="career_prep_5.php">Usefull links</a></li>
            
          </ul>
        </li> -->
            <!-- <li class="nav-item mx-2">
              <a class="nav-link" href="connect_engage_1.php">Connect & Engage</a>
            </li> -->
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Connect & Engage
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="connect_engage_1.php">Gallery</a></li>
            <li><a class="dropdown-item" href="connect_engage_2.php">Queries</a></li>
            <li><a class="dropdown-item" href="connect_engage_3.php">Feedbacks</a></li>
            <li><a class="dropdown-item" href="connect_engage_4.php">Contact Us</a></li>
            <li><a class="dropdown-item" href="connect_engage_5.php">About Us</a></li>
            <li><a class="dropdown-item" href="connect_engage_5.php">Help</a></li>
          </ul>
        </li>
          </ul>
          <div class="d-flex justify-content-center flex-lg-row align-items-center gap-3">
            <a href="login.html" class="text-white text-decoration-none px-3 py-1 bg-primary rounded-2">Login</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  