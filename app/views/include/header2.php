<?php
$filepath = "";
$uid = "";
$admin = "";
$uname = "";
$profile_img = "blank";

if (isset($_SESSION["userid"])) {
    $uid = $_SESSION["userid"];
    $admin = $_SESSION["admin"];
    $uname = $_SESSION["username"];
    $profile_img = $uid;
}

if (strpos($_SERVER['REQUEST_URI'], "admin") > 0) {
    $filepath = "../";
}

if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
}

$file =  $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $hero_title; ?> - NCAA Football Picks</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo ROOT ?>/assets/img/stadium-48.png" rel="icon">
    <link href="<?php echo ROOT ?>/assets/img/stadium-48.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

    <!-- Vendor CSS Files -->
    <link href="<?php echo ROOT ?>/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?php echo ROOT ?>/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Logis
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Updated: Jun 06 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="<?php echo ROOT ?>/home" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?php echo ROOT ?>/assets/img/logo-1.png" alt="">
                <!-- <h1 class="sitename">Logis</h1> -->
            </a>

            <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= ROOT ?>/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT ?>/home">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false">Dynasties</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">My Dynasties</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">Public Dynasties</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">Users</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">Teams</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false">Welcome</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= ROOT ?>/home">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- <a class="btn-getstarted" href="get-a-quote.html">Get a Quote</a> -->

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <img src="<?php echo ROOT ?>/assets/img/bg-1.jpg" alt="" class="hero-bg" data-aos="fade-in">

            <div class="container">
                <div class="row gy-4 d-flex justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2 data-aos="fade-up">Welcome to NCAA Dynasty</h2>
                        <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>

                        <!-- <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
          <input type="text" class="form-control" placeholder="Your ZIP code or City. e.g. New York">
          <button type="submit" class="btn btn-primary">Search</button>
        </form> -->

                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="132" data-purecounter-duration="0" class="purecounter">232</span>
                                    <p>Teams</p>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="43" data-purecounter-duration="0" class="purecounter">863</span>
                                    <p>Games</p>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="0" class="purecounter">1453</span>
                                    <p>Goal</p>
                                </div>
                            </div><!-- End Stats Item -->


                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="<?php echo ROOT ?>/assets/img/map.png" class="img-fluid mb-3 mb-lg-0" alt="">
                    </div>

                </div>
            </div>

        </section><!-- /Hero Section -->