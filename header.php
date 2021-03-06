<?php




  ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <meta name="robots" content="noindex,follow" />
  <title>Welcome to Travel Experts</title>
  <!-- Favicon -->
  <link href="../img/photo5.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">
  <!-- Hover CSS -->
  <link type="text/css" href="../assets/css/hover.css" rel="stylesheet">
  <!-- Our stylesheet CSS -->
  <link type="text/css" href="../TE pages/css/style.css" rel="stylesheet">
  <!-- jQuery JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="heading mr-lg-5" href="landing.php" style="color:white;">
          <img src=""><b>Travel Experts</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="landing.php">
                  <img src=""><b>Travel Experts</b>
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="landing.php">Home</a>
            </li>

            <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="package.php">Packages</a>
                </li>
            <!--
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Packages</span>
              </a>
              <div class="dropdown-menu dropdown-menu-xl">
                <div class="dropdown-menu-inner">
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/getting-started/overview.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                      <i class="ni ni-spaceship"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Getting started</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon compiling Scss, change brand colors and more.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/foundation/colors.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                      <i class="ni ni-palette"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Foundation</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for Argon.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                      <i class="ni ni-ui-04"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h5 class="heading text-warning mb-md-1">Components</h5>
                      <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                    </div>
                  </a>
                </div>
              </div>
            </li>
          -->
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="register.php">Register</a>
            </li>

          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>


            <?php
            /*
            if (isset($_REQUEST['userid'])) {
              echo "<a href='customeraccount.php?userid=".$_REQUEST["userid"]."'>";
            echo 'hi'.$_REQUEST['userid'];
              }
            if(isset($_REQUEST['userid']) && !empty($_REQUEST['userid'])){
            $id = $_REQUEST['userid'];
            echo  '<li class="nav-item d-none d-lg-block ml-lg-4">
                  <a href="customeraccount.php?userid='.$id.'" target="_blank" class="btn btn-neutral btn-icon" data-toggle="tooltip" title="Log in">
                  <i class="fa fa-user"></i>
                    <span class="nav-link-inner--text">Account</span>
                  </a>
                  </li>';
            } else {

            echo  '<li class="nav-item d-none d-lg-block ml-lg-4">
                  <a href="loginAgent.php" target="_blank" class="btn btn-neutral btn-icon" data-toggle="tooltip" title="Log in">
                    <i class="fa fa-user"></i>
                    <span class="nav-link-inner--text">Login</span>
                  </a>
                  </li>';
            } */
             ?>

            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a class="btn btn-icon btn-2 btn-neutral" href="loginAgent.php" target="_blank" class="btn btn-neutral btn-icon" data-toggle="tooltip" title="Log in">
                <i class="fa fa-user"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="btn btn-icon btn-2 btn-neutral"  href="..\TE pages\shoppingcarts.php" target="_blank" data-toggle="tooltip" title="Your vacation cart" >
                <span class="btn-inner--icon">
                  <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                </span>
                <span class="nav-link-inner--text">

                  <?php

                if (!isset($_SESSION)) {
                  session_start();
                  }
                  $q = 0;
                  $product_count = 0;

                  if ( isset( $_SESSION['cart_item'] ) ) {
                      $product_count = array_sum( array_column( $_SESSION['cart_item'], 'quantity' ) );
                  }
                  echo $product_count;

/*
                  if ( isset($_SESSION["cart_item"])){
                    foreach ($_SESSION["cart_item"] as $item){
                      $q += $item["quantity"];
                    }
                    echo $q;
                  }
*/
                 ?>

                  </span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
