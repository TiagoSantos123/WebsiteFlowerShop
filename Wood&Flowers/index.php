<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ínicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
            <a href="index.php" class="site-logo">
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
                  <li class="active"><a href="index.php" class="nav-link text-left">Ínicio</a></li>
                  <li><a href="about.php" class="nav-link text-left">Sobre Nós</a></li>
                  <li><a href="WoodFlowers.php" class="nav-link text-left">Wood & Flowers</a></li>
                  <li><a href="shop.php" class="nav-link text-left">Carpintaria</a></li>
                  <li><a href="contact.php" class="nav-link text-left">Contactos</a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <li><a class="nav-link text-left"></a></li>
                  <?php
                  // User logged
                  if (isset($_SESSION['userId'])) {  ?>
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


    <div class="owl-carousel hero-slide owl-style">
      <div class="intro-section container" style="background-image: url('images/loja3.jpg'); opacity:0.9;">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <h1>Wood & Flowers</h1>
          </div>
        </div>
      </div>

      <div class="intro-section container" style="background-image: url('images/Carpintaria2.jpg');opacity:0.9;">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <h1>Carpintaria</h1>
          </div>
        </div>
      </div>

    </div>



    <div class="site-section mt-5">
      <div class="container">

        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block" style="color:#86b300">Produtos da Wood & Flowers</h2>
            <p><a href="WoodFlowers.php" style="color: #994d00">Todos os produtos da Wood & Flowers <span class="icon-long-arrow-right"></span></a></p>

          </div>
        </div>
        <div class="row">


          <?php

          require "includes/dbUsers.inc.php";
          $sql = "SELECT idProduto,idEstadoProduto,nomeProduto,precoProduto,imagemProduto FROM produtos where idempresa = 1 and idEstadoProduto=1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            $idx = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $idx++;
              if ($idx > 3) break;
          ?>
              <div class="col-lg-4 mb-5 col-md-6">
                <form action="cart.php" action="post">
                  <div class="wine_v_1 text-center pb-4">
                    <a href="shop-single.php?idProduto=<?php echo $row['idProduto']; ?>" class="thumbnail d-block mb-4"><img src="<?php echo $row['imagemProduto'] ?>" alt="Image" class="img-fluid"></a>
                    <div>
                      <h3 class="heading mb-1" name="Nproduto"><a href="#"><?php echo $row['nomeProduto']; ?></a></h3>
                      <span class="price" name="preco"><?php echo $row['precoProduto'] . "€" ?></span>
                      <span name="idProduto"></span>
                      <span name="quantidade"></span>
                    </div>
                      <div class="wine-actions">
                        <h3 class="heading-2"><a href="#"><?php echo $row['nomeProduto']; ?></a></h3>
                        <span class="price d-block"><?php echo $row['precoProduto'] . "€" ?></span>
                        <a href="cart.php?setCart&idProduto=<?php echo $row['idProduto']; ?>&quantidade=1" style="background-color:#86b300" class="btn btn-success" name="addCart"><span class="icon-shopping-bag mr-3"></span> Adicionar ao carrinho</a>
                      </div>
                  </div>
                </form>


              </div>
          <?php
            }
          } else {
            echo 'Erro';
          }
          ?>

        </div>
      </div>
    </div>

    <div class="hero-2" style="background-image: url('images/Espelho.jpg'); opacity: 0.9">
      <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">

          </div>
        </div>
      </div>
    </div>




    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block" style="color: #994d00">Produtos da Carpintaria</h2>
            <p><a href="Shop.php" style="color:#86b300">Todos os produtos da carpintaria <span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
        <div class="row">

          <?php

          require "includes/dbUsers.inc.php";
          $sql = "SELECT idProduto,idEstadoProduto,nomeProduto,precoProduto,imagemProduto FROM produtos where idEmpresa=2 and idEstadoProduto=1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            $idx = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $idx++;
              if ($idx > 3) break;
          ?>
              <div class="col-lg-4 mb-5 col-md-6">
                <form action="cart.php" action="post">
                  <div class="wine_v_1 text-center pb-4">
                    <a href="shop-single.php?idProduto=<?php echo $row['idProduto']; ?>" class="thumbnail d-block mb-4">
                      <img src="<?php echo $row['imagemProduto'] ?>" alt="Image" class="img-fluid">
                    </a>
                    <div>
                      <h3 class="heading mb-1" name="Nproduto"><a href="#"><?php echo $row['nomeProduto']; ?></a></h3>
                      <span class="price" name="preco"><?php echo $row['precoProduto'] . "€" ?><br>Sujeito a orçamento</span>
                      <span name="idProduto"></span>
                      <span name="quantidade"></span>
                    </div>
                      <div class="wine-actions">
                        <h3 class="heading-2"><a href="#"><?php echo $row['nomeProduto']; ?></a></h3>
                        <span class="price d-block"><?php echo $row['precoProduto'] . "€" ?></span>
                        <a href="cart.php?setCart&idProduto=<?php echo $row['idProduto']; ?>&quantidade=1" style="background-color:#86b300" class="btn btn-success" name="addCart"><span class="icon-shopping-bag mr-3"></span> Adicionar ao carrinho</a>
                      </div>
                  </div>
                </form>

              </div>
          <?php
            }
          } else {
            echo 'Erro';
          }
          ?>


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