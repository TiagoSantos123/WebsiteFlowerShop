<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sobre Nós</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="fonts/icomoon/style.css" />

  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />

  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />

  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

  <link rel="stylesheet" href="css/aos.css" />
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="css/style.css" />
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
            <a href="index.php" class="site-logo">
              <img src="images/logo.png" alt="Image" class="img-fluid" />
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
                  <li>
                    <a href="index.php" class="nav-link text-left">Ínicio</a>
                  </li>
                  <li class="active">
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


    <div class="hero-2" style="background-image: url('images/Sobrenos2.jpg'); ">
      <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <h2>Sobre Nós</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section py-5 bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="images/IMG_8024.JPG" alt="Image placeholder" class="img-fluid" style="Width:100%;float:left;position: absolute; clear:left" />
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black font-heading-serif" style="color:#86b300 !important">Wood&Flowers</h2>
            </div>
            <p>
              A nossa Loja na Serra Del Rei, vem dar ainda mais cor, mais vida e mais variedade à nossa Localidade
            </p>

            <p>
              Na nossa loja Wood & Flowers Shop, pode encontrar artigos florais, artigos de decoração feitos em madeira e também mobiliário de Madeira.
            </p>
            <p>
              No nosso serviço de floristas, oferecemos uma gama completa de flores de qualidade.
            </p>
            <p>
              A nossa variedade básica de flores inclui rosas, túlipas, orquídeas e lírios, mas o nosso leque é muito mais vasto e contempla todas as ocasiões.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section py-5  custom-border-bottom" data-aos="fade" style="padding-bottom:105px !important">
      <div class="container">
        <div class="row">
          <div class="col-md-6 order-md-2">
            <div class="block-16">
              <figure>
                <img src="images/img_7869.jpg" alt="Image placeholder" class="img-fluid " style="Width:100%;float:left;position: absolute; clear:left" />

              </figure>
            </div>
          </div>
          <div class="col-md-5 mr-auto">
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black font-heading-serif" style="color:#994d00 !important">
                Carpintaria Central a Serraninha
              </h2>
            </div>
            <p>
              No nosso serviço de Carpintaria, temos uma atenção constante para com a qualidade superior das nossas soluções.
            </p>

            <p>
              Nomeadamente nas etapas de conceção, fabricação e montagem dos trabalhos.
            </p>
            <p>
              Realizamos trabalhos de raiz e também de restauro de mobiliário.
            </p>
            <p>
              Destacam-se os trabalhos de Cozinhas, Roupeiros, Móveis, Escadas, Mobiliário Interios e Decorações Interiores.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1 bg-light border-0" data-aos="fade" style="padding-top:125px">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck text-primary"></span>
            </div>
            <div class="text">
              <h2 class="font-heading-serif" style="color:#994d00">Entrega ao Domicilio</h2>
              <p class="text-align-center">
                Finalize a sua encomenda até as 14:00 horas de um dia útil e nós entregamos no dia útil seguinte ou numa data á sua escolha.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2 text-primary"></span>
            </div>
            <div class="text">
              <h2 class="font-heading-serif" style="color:#994d00">Volte Sempre</h2>
              <p>
                Irá ser sempre bem-vindo no seu retorno á loja e será ser sempre atendido com a máxima simpatia
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help text-primary"></span>
            </div>
            <div class="text">
              <h2 class="font-heading-serif" style="color:#994d00">Ajuda ao Cliente</h2>
              <p>
                Sempre que tiver alguma dúvida contacte-nos através dos nossos meios online ou através dos nossos contactos telefónicos
              </p>
            </div>
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
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" />
    </svg>
  </div>

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