<?php
  session_start();
  $key = "6LeDSuQiAAAAAMjXrXBiHceJnZ2FZzNJ_sK7oiYh"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contactos </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">


  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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

  <!-- Captcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- Ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


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
                  <li><a href="index.php" class="nav-link text-left">Ínicio</a></li>
                  <li><a href="about.php" class="nav-link text-left">Sobre Nós</a></li>
                  <li><a href="WoodFlowers.php" class="nav-link text-left">Wood & Flowers</a></li>
                  <li><a href="shop.php" class="nav-link text-left">Carpintaria</a></li>
                  <li class="active"><a href="contact.php" class="nav-link text-left">Contactos</a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <?php
                  // User logged
                  if (isset($_SESSION['userId'])) { ?>
                    <li><a href="includes/logout.inc.php" name="sair" class="nav-link text-left">Sair</a></li>
                  <?php
                  } else {
                    // Not logged
                  ?>
                    <li><a href="Login.php" class="nav-link text-left">Entrar</a></li>
                    <li><a href="Register.php" class="nav-link text-left">Registar</a></li>
                  <?php
                  }

                  ?>
                </ul>
              </nav>

            </div>

          </div>
        </div>

      </div>

    </div>




    <div class="hero-2" style="background-image: url('images/BancoDuplo.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">

            <h2>Contactos</h2>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="section-title mb-5">
              <h2 style="color:#86b300">Contacte-nos</h2 st>
            </div>
            <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "camposporpreencher") {
                echo '<p style=font-size:16px!important;color:#ff0000>Ficaram campos por preencher</p>';
              }
              if ($_GET['error'] == "emailinválido") {
                echo '<p style=font-size:16px!important;color:#ff0000>E-mail com formato inválido</p>';
              }
              if ($_GET['error'] == "apenasletrasN") {
                echo '<p style=font-size:16px!important;color:#ff0000>O nome só pode conter letras</p>';
              }
              if ($_GET['error'] == "apenasletrasA") {
                echo '<p style=font-size:16px!important;color:#ff0000>O apelido só pode conter letras</p>';
              }
              if ($_GET['error'] == "falhoucaptcha") {
                echo '<p style=font-size:16px!important;color:#ff0000>Tem de Verificar o Captcha</p>';
              }
            }
            else{
              if(isset($_GET['email'])){
                if($_GET['email']=="enviado"){
                  echo '<p style=font-size:16px!important;color:#86b300>Mensagem enviada com sucesso</p>';
                }
              }
            }
            ?>
            <form action="includes/contact.inc.php" method="post">

              <div class="row">
                <?php
                if (isset($_GET['primeironome'])) {
                  $first = $_GET['primeironome'];
                  echo '<div class="col-md-6 form-group">
                                <label for="fname" style="color:#994d00">Primeiro Nome</label>
                                <input type="text" value="' . $first . '" id="fname" name="pNome" class="form-control form-control-lg">
                                </div>';
                } else {
                  echo '<div class="col-md-6 form-group">
                                <label for="fname" style="color:#994d00">Primeiro Nome</label>
                                <input type="text" id="fname" name="pNome" class="form-control form-control-lg">
                                </div>';
                }

                if (isset($_GET['últimonome'])) {
                  $last = $_GET['últimonome'];
                  echo '<div class="col-md-6 form-group">
                                <label for="lname" style="color:#994d00">Último Nome</label>
                                <input type="text" value="' . $last . '" id="lname" name="uNome" class="form-control form-control-lg">
                                </div>';
                } else {
                  echo '<div class="col-md-6 form-group">
                                <label for="lname" style="color:#994d00">Último Nome</label>
                                <input type="text" id="lname" name="uNome" class="form-control form-control-lg">
                                </div>';
                }

                if (isset($_GET['email'])) {
                  $email = $_GET['email'];
                  echo '<div class="col-md-6 form-group">
                                <label for="eaddress" style="color:#994d00">Endereço de email</label>
                                <input type="text" value="' . $email . '" id="eaddress" name="email" class="form-control form-control-lg">
                                </div>';
                } else {
                  echo '<div class="col-md-6 form-group">
                                <label for="eaddress" style="color:#994d00">Endereço de email</label>
                                <input type="text" id="eaddress" name="email" class="form-control form-control-lg">
                                </div>';
                }

                if (isset($_GET['assunto'])) {
                  $assunto = $_GET['assunto'];
                  echo '<div class="col-md-6 form-group">
                                <label for="tel" style="color:#994d00">Assunto</label>
                                <input type="text" value="' . $assunto . '" id="tel" name="assunto" class="form-control form-control-lg">
                                </div>';
                } else {
                  echo '<div class="col-md-6 form-group">
                                <label for="tel" style="color:#994d00">Assunto</label>
                                <input type="text" id="tel" name="assunto" class="form-control form-control-lg">
                                </div>';
                }
                ?>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message" style="color:#994d00">Mensagem</label>
                  <textarea id="message" name="mensagem" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
					      <div class="g-recaptcha" data-sitekey="<?php echo $key ?>"></div>
				      </div>
              <div class="row">
                <div class="col-12">
                  <input type="submit" style="color:#fff" name="enviarMsg" value="Enviar mensagem" class="btn btn-success py-3 px-5">
                </div>
              </div>

            </form>
          </div>

        </div>


      </div>
    </div>





    <div class="footer">
      <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold" style="color:#86b300">Sobre Nós</h6>
            <p>Tentamos proporcionar o melhor produto ao nosso cliente</p>
            <p>Todos os produtos da Carpintaria estão sujeitos a orçamento</p>
          </div>
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold" style="color:#86b300">Horário</h6>
            <p>
              <a> De Terça á Sábado 9:00-19:00</a>
            </p>
            <p>
              <a>Domingo 10:00-19:00</a>
            </p>
            <p>
              <a>Segunda-feira estamos encerrados</a>
            </p>

          </div>

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold" style="color:#86b300">Redes Sociais</h6>
            <p>
              <i class="fas fa-envelope mr-3"></i><a href="geral@woodflowersfactory.com" style="color:#808080">E-mail</a>
            </p>
            <p>
              <i class="fab fa-facebook mr-3"></i> <a href="https://www.facebook.com/w.carpintariacentral.a.serraninha/" style="color:#808080">Facebook</a>
            </p>
          </div>


          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold" style="color:#86b300">Contactos</h6>
            <p>
              <i class="fas fa-home mr-3"></i>Rua do Poço Novo nº3A</p>
            <p>
              <i class="fa fa-map-marker mr-3"></i>Serra D'El Rei</p>
            <p>
              <i class="fas fa-phone mr-3"></i>(+351) 917 806 762</p>
            <p>
              <i class="fas fa-mobile mr-3"></i>(+351) 919 410 202</p>
          </div>

        </div>
        <div class="row">
          <div class="col-12">
            <div class="copyright">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>



            </div>
          </div>
        </div>
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