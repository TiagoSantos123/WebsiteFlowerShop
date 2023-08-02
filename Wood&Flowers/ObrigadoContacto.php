<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Wood&Flowers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center">
            <a href="index.html" class="site-logo">
              <img src="images/logo.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
        </div>
      </div>




      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

        <div class="container">
          <div class="d-flex align-items-center">
            <div class="mx-auto">
              <nav class="site-navigation position-relative text-left" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                  <li class="active">
                    <a href="index.php" class="nav-link text-left">Ínicio</a>
                  </li>
                  <li>
                    <a href="about.php" class="nav-link text-left">Sobre Nós</a>
                  </li>
                  <li>
                    <a href="WoodFlowers.php" class="nav-link text-left">Wood & Flowers</a>
                  </li>
                  <li>
                    <a href="shop.php" class="nav-link text-left">Carpintaria</a>
                  </li>
                  <li>
                    <a href="contact.php" class="nav-link text-left">Contactos</a>
                  </li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <?php
                  // User logged
                  if (isset($_SESSION['userId'])) {  ?>
                    <li>
                      <a href="includes/logout.inc.php" name="sair" class="nav-link text-left">Sair</a>
                    </li>
                  <?php
                  } else {
                    // Not logged
                  ?>
                    <li>
                      <a href="Login.php" class="nav-link text-left">Entrar</a>
                    </li>
                    <li>
                      <a href="Register.php" class="nav-link text-left">Registar</a>
                    </li>
                  <?php
                  }

                  ?>

            </div>

          </div>





          <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <span class="icon-check_circle display-3 text-success"></span>
                  <h2 class="display-3 text-black font-heading-serif">Obrigado!</h2>
                  <p class="lead mb-5">A sua mensagem foi enviada com sucesso</p>
                  <p><a href="index.php" style="color:#ffffff !important" class="btn btn-md height-auto px-4 py-3 btn-success">Voltar ao ínicio</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- .site-wrap -->


        <!-- loader -->
        <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" /></svg></div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.fancybox.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.mb.YTPlayer.min.js"></script>




        <script src="js/main.js"></script>

</body>

</html>