<?php
session_start();

require 'includes/dbUsers.inc.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Produto</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="fonts/icomoon/style.css" />

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
            <a href="index.html" class="site-logo">
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
                  <li>
                    <a href="about.php" class="nav-link text-left">Sobre Nós</a>
                  </li>
                  <li>
                    <a href="WoodFlowers.php" class="nav-link text-left">Wood & Flowers</a>
                  </li>
                  <li>
                    <a href="Shop.php" class="nav-link text-left">Carpintaria</a>
                  </li>
                  <li class="active">
                    <a href="shop-single.php" class="nav-link text-left">Produto</a>
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

    <div class="site-section mt-5 bg-light">
      <div class="container">
        <div class="row">
          <?php
          $idProduto = $_GET['idProduto'];
          $sql = "SELECT idProduto,nomeProduto,precoProduto,descricao,imagemProduto FROM produtos WHERE idProduto=$idProduto";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="col-lg-6">
                <div class="owl-carousel hero-slide owl-style">
                  <img src="<?php echo $row['imagemProduto']; ?>" alt="Image" class="img-fluid" />

                </div>
              </div>
              <div class="col-lg-5 ml-auto">
                <h2 class="text-primary">Detalhes do Produto</h2>

                </br>
                <h5 style="color:#000000">Nome do Produto: <?php echo $row['nomeProduto']; ?></h5>
                <h5 style="color:#000000">Preço do Produto: <?php echo $row['precoProduto'] . "€"; ?></h5>
                <h5 style="color:#000000">Descricao: <?php echo $row['descricao']; ?></h5>
                </br>
                </br>
                </br>
                <?php
                if (isset($_SESSION['userId'])) { ?>
                  <p>
                    <a style="color:#fff" href="cart.php?setCart&idProduto=<?php echo $row['idProduto']; ?>&quantidade=1" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Adicionar ao carrinho</a>
                  </p>
            <?php
                }
              }
            }
            ?>
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