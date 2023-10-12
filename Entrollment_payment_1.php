<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/dash-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title></title>
    <style>
        .fa-solid{
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <a href="index.php"><i class="fa fa-arrow-left back-button" aria-hidden="true"></i></a>
        <h5><a href="Entrollment_payment_1.php">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span class="heading">Enrollment & Payment</span>
            </a></h5>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="container">
        <nav>
            <ul class="list-items">
                <li><a href="Entrollment_payment_1.php" class="nav-links active">
                        <i class="fa fa-user-circle icons" aria-hidden="true"></i>
                        <span class="nav-item">Registration</span>
                    </a></li>
                <li><a href="Entrollment_payment_2.php" class="nav-links">
                        <i class="fa fa-credit-card-alt icons" aria-hidden="true"></i>
                        <span class="nav-item">Payments</span>
                    </a></li>
            </ul>
        </nav>
        <main>
            <div class="container-fluid" style="margin-left:50px; margin-top:25px;">
                <div class="row">
                    <!-- flex-container -->
                    <div class="col-md-12 flex-container">
                        <!-- flex-item -->
                        <div class="flex-item">
                            <div class="flex-item-inner">
                                <!-- card -->
                                <a href="admin_registration.php">
                                    <div class="card-front bg-violet">
                                    <i class="fa-solid fa-user-graduate"></i>
                                        <h4>Student Registration</h4>
                                    </div>
                                </a>
                                <!-- /card -->
                            </div>
                        </div>
                        <!-- /flex-item -->

                        <!-- flex-item -->
                        <div class="flex-item">
                            <div class="flex-item-inner">
                                <!-- card -->
                                <a href="#">
                                    <div class="card-front bg-magenta">
                                    <i class="fa-solid fa-user-gear"></i>
                                        <h4>Admin Registration</h4>

                                    </div>
                                </a>
                                <!-- /card -->
                            </div>
                        </div>
                        <!-- /flex-item -->

                        <!-- flex-item -->
                        <div class="flex-item">
                            <div class="flex-item-inner">
                                <!-- card -->
                                <a href="#">
                                    <div class="card-front bg-blue">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                        <h4>Faculty registration</h4>

                                    </div>
                                </a>
                                <!-- /card -->
                            </div>
                        </div>
                        <!-- /flex-item -->

                        <!-- flex-item -->
                        <div class="flex-item">
                            <div class="flex-item-inner">
                                <!-- card -->
                                <a href="#">
                                    <div class="card-front bg-green">
                                    <i class="fa-solid fa-building-user"></i>
                                        <h4>Company Registration</h4>
                                    </div>
                                </a>
                                <!-- /card -->
                            </div>
                        </div>
                        <!-- flex-item -->
                    </div>
                    <!-- /flex-container -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>