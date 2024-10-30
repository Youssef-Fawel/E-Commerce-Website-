<?php
session_start();
include("php/config.php");


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ministore</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
  </head>
  <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <title>Search</title>
        <path fill="currentColor" d="M19 3C13.488 3 9 7.488 9 13c0 2.395.84 4.59 2.25 6.313L3.281 27.28l1.439 1.44l7.968-7.969A9.922 9.922 0 0 0 19 23c5.512 0 10-4.488 10-10S24.512 3 19 3zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8s-8-3.57-8-8s3.57-8 8-8z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </symbol>
      <svg xmlns="http://www.w3.org/2000/svg" id="chevron-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
      </svg>
      <symbol xmlns="http://www.w3.org/2000/svg" id="chevron-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart-outline" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="quality" viewBox="0 0 16 16">
        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="price-tag" viewBox="0 0 16 16">
        <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
        <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="shield-plus" viewBox="0 0 16 16">
        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
        <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-empty" viewBox="0 0 16 16">
        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-half" viewBox="0 0 16 16">
        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="quote" viewBox="0 0 24 24">
        <path fill="currentColor" d="m15 17l2-4h-4V6h7v7l-2 4h-3Zm-9 0l2-4H4V6h7v7l-2 4H6Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 24 24">
        <path fill="currentColor" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 32 32">
        <path fill="currentColor" d="M29.41 9.26a3.5 3.5 0 0 0-2.47-2.47C24.76 6.2 16 6.2 16 6.2s-8.76 0-10.94.59a3.5 3.5 0 0 0-2.47 2.47A36.13 36.13 0 0 0 2 16a36.13 36.13 0 0 0 .59 6.74a3.5 3.5 0 0 0 2.47 2.47c2.18.59 10.94.59 10.94.59s8.76 0 10.94-.59a3.5 3.5 0 0 0 2.47-2.47A36.13 36.13 0 0 0 30 16a36.13 36.13 0 0 0-.59-6.74ZM13.2 20.2v-8.4l7.27 4.2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 256 256">
        <path fill="currentColor" d="m245.66 77.66l-29.9 29.9C209.72 177.58 150.67 232 80 232c-14.52 0-26.49-2.3-35.58-6.84c-7.33-3.67-10.33-7.6-11.08-8.72a8 8 0 0 1 3.85-11.93c.26-.1 24.24-9.31 39.47-26.84a110.93 110.93 0 0 1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8 8 0 0 1 13.65-4.92c.35.35 33.28 33.1 73.54 43.72V88a47.87 47.87 0 0 1 14.36-34.3A46.87 46.87 0 0 1 168.1 40a48.66 48.66 0 0 1 41.47 24H240a8 8 0 0 1 5.66 13.66Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 256 256">
        <path fill="currentColor" d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="linkedin" viewBox="0 0 24 24">
        <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="nav-icon" viewBox="0 0 16 16">
        <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
        <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
      </symbol>
    </svg>  

   
    
    <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
      <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
        <div class="container-fluid">
         <a class="navbar-brand" href="index.html">
    <img src="images/grassa.jpg" class="logo" > <!-- Ajustez la largeur et la hauteur selon vos besoins -->
</a>

          <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="navbar-icon">
              <use xlink:href="#navbar-icon"></use>
            </svg>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-header px-4 pb-0">
              <a class="navbar-brand" href="index.html">
                <img src="images/main-logo.png" class="logo">
              </a>
              <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>
            <div class="offcanvas-body">
              <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link me-4 active" href="#billboard">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#company-services">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#mobile-products">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#smart-watches">Watches</a>
                </li>
              
               
                <li class="nav-item">
                  <div class="user-items ps-5">
                    <ul class="d-flex justify-content-end list-unstyled">
                   <?php
                   if (isset($_SESSION["valid"])) {
                       echo ' <li class="pe-3">
                        <a href="php/logout.php">
                            <img src="images/logout.png" alt="Logout" id="logout-icon" style="width: 19px; height: 19px;">
                        </a>
                    </li>';
                   }
                   ?>
                   


                     <?php
                     if (!isset($_SESSION["valid"])) {
                         echo '<li class="pe-3">
            <a href="index.php">
              <svg class="user">
                <use xlink:href="#user"></use>
              </svg>
            </a>
          </li>';
                     }
                     ?>

                      <li>
                        <a href="carte.php">
                          <svg id="cart-icon" width="24" height="24" viewBox="0 0 24 24">
                        <!-- Ic�ne du panier -->
                        <use xlink:href="#cart"></use>
                        <text id="cart-item-count" x="9" y="17" fill="white">0</text>
                    </svg>
                        </a>
                      </li>

                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <section id="billboard" class="position-relative overflow-hidden bg-light-blue">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-6">
                  <div class="banner-content">
                    <h1 class="display-2 text-uppercase text-dark pb-5">Best Products Are Here.</h1>
                    <a href="#mobile-products" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="image-holder">
                    <img src="images/banner-image.png" alt="banner">
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
     
     
    </section>
       
    <section id="company-services" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="cart-outline">
                  <use xlink:href="#cart-outline" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Free delivery</h3>
                <p>Consectetur adipi elit lorem ipsum dolor sit amet.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="quality">
                  <use xlink:href="#quality" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>
                <p>Dolor sit amet orem ipsu mcons ectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="price-tag">
                  <use xlink:href="#price-tag" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Daily offers</h3>
                <p>Amet consectetur adipi elit loreme ipsum dolor sit.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">100% secure payment</h3>
                <p>Rem Lopsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Mobile Products</h2>
           
          </div>
          <div class="swiper product-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
               <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item1.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(1)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <input type="hidden" id="product_name_hidden_1" name="product_name" value="Iphone 10">
                                <input type="hidden" id="price_hidden_1" name="price" value="980">
                                <input type="hidden" id="quantity_hidden" name="quantity" >
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Iphone 10</a>
                                    </h3>
                                    <span class="item-price text-primary">$980</span>
                                </div>
                            </div>
                        </form>
                    </div>
            
             <!-- Deuxi�me carte -->
<div class="swiper-slide">
    <form method="post" action="">
        <div class="product-card position-relative">
            <div class="image-holder">
                <img src="images/product-item2.jpg" alt="product-item" class="img-fluid">
            </div>
            <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                    <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(2)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                </div>
            </div>
            <!-- Vos autres �l�ments de contenu ici -->
            <input type="hidden" id="product_name_hidden_2" name="product_name" value="Iphone 11">
            <input type="hidden" id="price_hidden_2" name="price" value="1100">
            <input type="hidden" id="quantity_hidden" name="quantity" >
            <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                    <a href="#">Iphone 11</a>
                </h3>
                <span class="item-price text-primary">$1100</span>
            </div>
        </div>
    </form>
</div>

             <div class="swiper-slide">
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item3.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(3)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <input type="hidden"id="product_name_hidden_3" name="product_name" value="Iphone 8">
                                <input type="hidden" id="price_hidden_3" name="price" value="780">
                                <input type="hidden" id="quantity_hidden" name="quantity" >
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Iphone 8</a>
                                    </h3>
                                    <span class="item-price text-primary">$780</span>
                                </div>
                            </div>
                        </form>
                    </div>
              <div class="swiper-slide">
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item4.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(4)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <input type="hidden" id="product_name_hidden_4" name="product_name" value="Iphone 13">
                                <input type="hidden" id="price_hidden_4" name="price" value="1500">
                                <input type="hidden" id="quantity_hidden" name="quantity" >
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Iphone 13</a>
                                    </h3>
                                    <span class="item-price text-primary">$1500</span>
                                </div>
                            </div>
                        </form>
                    </div>
              <div class="swiper-slide">
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item5.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(5)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <input type="hidden" id="product_name_hidden_5" name="product_name" value="Iphone 12">
                                <input type="hidden" id="price_hidden_5" name="price" value="1300">
                                <input type="hidden" id="quantity_hidden" name="quantity" >
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Iphone 12</a>
                                    </h3>
                                    <span class="item-price text-primary">$1300</span>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
    </section>
   <section id="smart-watches" class="product-store padding-large position-relative">
    <div class="container">
        <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
                <h2 class="display-7 text-dark text-uppercase">Smart Watches</h2>
            </div>
            <div class="swiper product-watch-swiper">
                <div class="swiper-wrapper">
                    <!-- Premi�re carte -->
                    <div class="swiper-slide">
                        <!-- Ins�rez votre formulaire et le contenu de la premi�re carte ici -->
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item6.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(6)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <!-- Vos autres �l�ments de contenu ici -->
                                <input type="hidden" id="product_name_hidden_6" name="product_name" value="Pink watch">
                                <input type="hidden" id="price_hidden_6" name="price" value="870">
                                <input type="hidden" id="quantity_hidden" name="quantity" >
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Pink watch</a>
                                    </h3>
                                    <span class="item-price text-primary">$870</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Deuxi�me carte -->
                    <div class="swiper-slide">
                        <!-- Ins�rez votre formulaire et le contenu de la deuxi�me carte ici -->
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item7.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(7)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <!-- Vos autres �l�ments de contenu ici -->
                                <input type="hidden" id="product_name_hidden_7" name="product_name" value="Heavy watch">
                                <input type="hidden" id="price_hidden_7" name="price" value="680">
                                 <input type="hidden" id="quantity_hidden" name="quantity" >

                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Heavy watch</a>
                                    </h3>
                                    <span class="item-price text-primary">$680</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Troisi�me carte -->
                    <div class="swiper-slide">
                        <!-- Ins�rez votre formulaire et le contenu de la troisi�me carte ici -->
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item8.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(8)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <!-- Vos autres �l�ments de contenu ici -->
                                <input type="hidden" id="product_name_hidden_8"  name="product_name" value="Spotted watch">
                                <input type="hidden" id="price_hidden_8"  name="price" value="750">
                                 <input type="hidden" id="quantity_hidden" name="quantity" >

                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Spotted watch</a>
                                    </h3>
                                    <span class="item-price text-primary">$750</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Quatri�me carte -->
                    <div class="swiper-slide">
                        <!-- Ins�rez votre formulaire et le contenu de la quatri�me carte ici -->
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item9.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(9)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <!-- Vos autres �l�ments de contenu ici -->
                               <input type="hidden" id="product_name_hidden_9" name="product_name" value="white watch">
            <input type="hidden" id="price_hidden_9" name="price" value="650">
                                 <input type="hidden" id="quantity_hidden" name="quantity" >

                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">white watch</a>
                                    </h3>
                                    <span class="item-price text-primary">$650</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Cinqui�me carte -->
                    <div class="swiper-slide">
                        <!-- Ins�rez votre formulaire et le contenu de la cinqui�me carte ici -->
                        <form method="post" action="">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="images/product-item10.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <!-- Lien "Add to Cart" -->
                    <button type="button" class="btn btn-medium btn-black" name="add_to_cart" onclick="openModal(10)">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></button>
                                    </div>
                                </div>
                                <!-- Vos autres �l�ments de contenu ici -->
                               <input type="hidden" id="product_name_hidden_10" name="product_name" value="Black watch">
                                <input type="hidden" id="price_hidden_10" name="price" value="750">
                                <input type="hidden" id="quantity_hidden" name="quantity" >


                                <div class="card-detail d-flex justify-content-between pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">Black watch</a>
                                    </h3>
                                    <span class="item-price text-primary">$750</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
</section>


    
  
   
   <div id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center d-flex justify-content-center align-items-center" style="height: 100px;">
                    <p style="margin-bottom: 50px;">   Copyright &copy; All rights reserved | This template is made with love by Sofien Grassa</p>
                </div>
            </div>
        </div>
    </div>
</div>
      <div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form id="addToCartForm" method="post" action="">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" >
                        

                        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close_modal"data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" id="add-to-cart-button-modal">Add to Cart</button>
            </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- Votre code HTML existant -->
  


<script>

      

    // Fonction pour ajouter un produit au panier
function openModal(productIndex) {
        // Utilisez le suffixe num�rique productIndex pour acc�der aux �l�ments de chaque produit
        var product_name_hidden = document.getElementById('product_name_hidden_' + productIndex).value;
        var price_hidden = document.getElementById('price_hidden_' + productIndex).value;
     console.log("Product Name: " + product_name_hidden);
    console.log("Price: " + price_hidden);
    document.getElementById('add-to-cart-button-modal').addEventListener('click', function (event) {
                var quantity = parseInt(document.getElementById('quantity').value);

                addToCart(product_name_hidden, price_hidden, quantity);
            });

        <?php
        // V�rifie si l'utilisateur est connect�
        if (!isset($_SESSION["valid"])) {
            // Affiche une alerte si l'utilisateur n'est pas connect�
            echo "alert('You need to log in to add items to your cart.');";
        } else {
            // Ouvre le modal si l'utilisateur est connect�
            echo "$('#addToCartModal').modal('show');";


            // Soumet le formulaire apr�s un court d�lai pour laisser le temps au modal de s'ouvrir
         
        }
        ?>
    }
     function addToCart(product_name, price, quantity) {
        // Envoyez les donn�es au serveur via une requ�te AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_panier.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert('Erreur lors de la soumission du formulaire.');
            }
        };
        xhr.send('product_name=' + product_name + '&price=' + price + '&quantity=' + quantity);

        // V�rifiez si la quantit� est valide (sup�rieure � z�ro)
       
    }
 

    


    document.getElementById('close_modal').addEventListener('click', function(event) {
        // Cacher le modal
        $('#addToCartModal').modal('hide');
    });

    document.querySelector('#addToCartModal .close').addEventListener('click', function(event) {
        // Cacher le modal
        $('#addToCartModal').modal('hide');
    });

     <?php
     // Requ�te SQL pour r�cup�rer le nombre total d'articles dans le panier
     $query = $pdo->prepare("SELECT SUM(quantite) AS total_items FROM panier WHERE email = ?");
     $query->execute([$_SESSION['valid']]);
     $total_items = $query->fetch(PDO::FETCH_ASSOC)['total_items'];

     // V�rifiez si la valeur est d�finie et affectez-la � la variable JavaScript
     if (isset($total_items)) {
         echo "var totalItemsInCart = $total_items;";
     } else {
         echo "var totalItemsInCart = 0;"; // Utilisez une valeur par d�faut si aucune valeur n'est renvoy�e
     }
     ?>
    // Mettez � jour le contenu de l'�l�ment span avec le nombre total d'articles dans le panier
    document.getElementById('cart-item-count').textContent = totalItemsInCart;

</script>

  

        
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

  </body>
</html>