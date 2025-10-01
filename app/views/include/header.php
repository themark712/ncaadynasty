<?php
$filepath = "";
$uid = "";
$admin = "";
$uname = "";
$profile_img = "blank";

if (isset($_SESSION["userid"])) {
    $uid = $_SESSION["userid"];
    $profile_img = $uid;
}

if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
}

if (isset($_SESSION["username"])) {
    $uname = $_SESSION["username"];
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
    <link href="<?php echo ROOT ?>/assets/images/logo.png" rel="icon">
    <link href="<?php echo ROOT ?>/assets/images/logo.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

    <!-- Vendor CSS Files -->
    <link href="<?php echo ROOT ?>/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?php echo ROOT ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/vendor/summernote/summernote-lite.min.css">

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

<body class="about-page">

    <header id="header" class="header fixed-top">
        <div class="container-fluid">
            <a href="<?php echo ROOT ?>/home" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?php echo ROOT ?>/assets/img/logo-1.png" alt="">
                <!-- <h1 class="sitename">Logis</h1> -->
            </a>


            <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                    <div class="w-25">
                        <a class="navbar-brand ms-3" href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" class="w-75 h-75" style="border-radius:25%;"></a>
                    </div>
                    <div class="text-end pe-4"><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button></div>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link<?php if (strpos($hero_title, "Home") > -1) { ?> active <?php } ?>" href="<?= ROOT ?>/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if (strpos($hero_title, "About") > -1) { ?> active <?php } ?>" href="<?= ROOT ?>/about">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle<?php if (strpos($hero_title, "Dynast") > -1) { ?> active <?php } ?>" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false">Dynasties</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= ROOT ?>/mydynasties">My Dynasties</a>
                                    <a class="dropdown-item" href="<?= ROOT ?>/dynasties">Public Dynasties</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= ROOT ?>/statsimport">Stats Import</a>
                                </div>
                            </li>
                            <?php if ($admin == 1) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle<?php if (strpos($hero_title, "Admin") > -1) { ?> active <?php } ?>" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= ROOT ?>/home">Users<?= $admin ?></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= ROOT ?>/home">Teams</a>
                                        <a class="dropdown-item" href="<?= ROOT ?>/editroster">Rosters</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= ROOT ?>/home" role="button" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle me-2" style="height:20px;width:20px;" src="<?= ROOT ?>/assets/images/users/<?= $profile_img ?>.jpg">Welcome, <?= $uname ?></a>
                                <?php if ($uid == "") { ?>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= ROOT ?>/signin">Sign In</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= ROOT ?>/signup">Sign Up</a>
                                    </div>
                                <?php } else { ?>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= ROOT ?>/home">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </header>

    <main class="main">

        <div class="bg-dark disabled text-secondary px-4 pt-5 pb-1 text-center h-25">
            <div class="pt-5">
                <h1 class="display-5 fw-bold text-white"><?= $hero_title ?></h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-6 mb-4"><?= $hero_text ?></p>
                </div>
            </div>
        </div>