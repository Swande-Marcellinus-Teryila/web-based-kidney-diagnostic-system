<?php
error_reporting(0);
  include('includes/autoloader.php');
  $crud = new Crud();
  $error = "";
  $msg = "";
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>kidney diagnostic system- Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.0.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php include("includes/header.php");?>


    
<body>
    <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper-container position-relative">

    <div class="swiper-wrapper">

      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">
                      <br> 
                    </p>
                    <h1 class="intro-title slide_caption mb-4 ">
                      <span class="color-b "> KIDNEY</span> 
                      DIAGNOSTIC SYSTEM
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">
                    </p>
                    <h1 class="intro-title slide_caption mb-4 ">
                      <span class="color-b "> KIDNEY</span> 
                      DIAGNOSTIC SYSTEM
                    </h1>
                   <?php include("includes/header3.php");?>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a"></span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->
 
<?php include("includes/footer.php");?>