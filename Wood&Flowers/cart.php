<?php
session_start();
require "includes/dbUsers.inc.php";


function CarrinhoVazio()
{
  return ($_SESSION['cart'] == null);
}

function Adicionar()
{
  if (isset($_GET['setCart'])) {
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    else{
      $cart = null;
    }
    $idProduto = $_GET['idProduto'];
    if($cart == null) { $cart = [$idProduto => 1];
    }
    else
    if (ExisteProduto($idProduto)) {
      $cart[$idProduto]++;
    } else {
      $cart[$idProduto] = 1;
    }
    $_SESSION['cart'] = $cart;
  }
}

function ExisteProduto($idProduto)
{
  if ($_SESSION['cart'] == null) {
    return false;
  }

  foreach ($_SESSION['cart'] as $cartIdProduto => $cartQuantidade) {
    if ($idProduto == $cartIdProduto) return true;
  }

  return false;
}

function Remover()
{
  if (isset($_GET['removerProduto'])) {
    $idProduto = $_GET['idProduto'];
    $cart = $_SESSION['cart'];
    unset($cart[$idProduto]);
    $_SESSION['cart'] = $cart;
  }
}

function Atualizar()
{
  if (isset($_GET['atualizarCart'])) {
    $idProduto = $_GET['idProduto'];
    $quantidade = $_GET['quantidade'];
    $cart = $_SESSION['cart'];
    if ($quantidade < 1) {
      unset($cart[$idProduto]);
    } else {
      $cart[$idProduto] = $quantidade;
    }
    $_SESSION['cart'] = $cart;
  }
}
Atualizar();
Adicionar();
Remover();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carrinho</title>
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

    <div class="site-section  pb-0">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-7 section-title text-center mb-5">
            <h2 class="d-block" style="color:#994d00">Carrinho</h2>
          </div>
        </div>
        <?php if (CarrinhoVazio()) {
          echo '<p style=font-size:16px!important;color:#ff0000>O carrinho está vazio</p>';
        } else {

        ?>
          <div class="row mb-5">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail" style="color:#86b300">Imagem</th>
                    <th class="product-name" style="color:#86b300">Produto</th>
                    <th class="product-price" style="color:#86b300">Preço</th>
                    <th class="product-quantity" style="color:#86b300">Quantidade</th>
                    <th class="product-total" style="color:#86b300">Total</th>
                    <th class="product-remove" style="color:#86b300">Remover</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  $arrayProduto = $_SESSION['cart'];
                  $sql = "SELECT idProduto, nomeProduto, precoProduto,imagemProduto FROM produtos";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      foreach ($arrayProduto as $arrayIdProduto => $arrayQuantidade) {
                        if ($arrayIdProduto == $row['idProduto']) { ?>
                          <tr>
                            <td class="product-thumbnail">
                              <img src="<?php echo $row['imagemProduto'] ?>" alt="Image" class="img-fluid" />
                            </td>
                            <td class=product-name>
                              <h2 class='h5 cart-product-title text-black'>
                                <?php echo $row['nomeProduto'] ?>
                              </h2>
                            </td>
                            <td><?php echo  $row['precoProduto'] . "€" ?></td>
                            <td>
                              <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                  <a href="cart.php?atualizarCart&idProduto=<?php echo $row['idProduto'] . '&quantidade=' . ($arrayQuantidade - 1); ?>" class="btn btn-outline-success">&minus;</a>
                                </div>
                                <form action="cart.php" method="get" style="width:50px">
                                  <input type="hidden" name="setCart" />
                                  <input type="hidden" name="idProduto=<?php echo $row['idProduto']; ?>" />
                                  <input type="text" class="form-control text-center border mr-0" value="<?php echo $arrayQuantidade; ?>" name="quantidade" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style="padding:0" />
                                </form>
                                <div class="input-group-append">
                                  <a href="cart.php?atualizarCart&idProduto=<?php echo $row['idProduto'] . '&quantidade=' . ($arrayQuantidade + 1); ?>" class="btn btn-outline-success">&plus;</a>
                                </div>
                              </div>
                            </td>
                            <td>
                              <?php
                              $preco = $row['precoProduto'] * $arrayQuantidade;
                              $total += $preco;
                              echo $preco . "€"; ?>
                            </td>
                            <td>
                              <a href="cart.php?removerProduto&idProduto=<?php echo $row['idProduto'] ?>" style="color:#fff" class="btn btn-success height-auto btn-sm">X</a>
                            </td>
                          </tr>
                  <?php
                        }
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="site-section pt-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-success btn-lg btn-block" onclick="window.location='index.php'" style="color:#fff">
                  Continuar ás compras
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"></div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <?php if (CarrinhoVazio()) { ?>
                  <?php } else { ?>
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 " style="color:#994d00 !important">
                        Total no Carrinho
                      </h3>
                    <?php } ?>
                    </div>
                </div>

                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black"></span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">
                      <?php
                      if (CarrinhoVazio()) {
                        echo "";
                      } else {
                        echo $total . "€";
                      }
                      ?>
                    </strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <?php if (CarrinhoVazio()) { ?>
                      <a type="hidden" class="btn btn-success btn-lg btn-block" style="color:#fff;display:none">
                        Fazer Encomenda
                      </a>
                    <?php } else { ?>
                      <?php if (!(isset($_SESSION['userId']))){?>
                        <a class="btn btn-success btn-lg btn-block" href="Loginencomenda.php?encomenda=login" style="color:#fff">
                          Fazer Encomenda
                        </a>
                       <?php }
                       else{?>
                        	<a class="btn btn-success btn-lg btn-block" href="checkout.php?encomenda" style="color:#fff">
                            Fazer Encomenda
                          </a>
                       <?php 
                        }?>
                    <?php } ?>
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