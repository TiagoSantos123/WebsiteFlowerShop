<?php
session_start();

require "includes/dbUsers.inc.php";

$_SESSION['cart'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Wood&Flowers</title>
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
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">´
      <form action="includes/encomenda.php" method="post">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black font-heading-serif" style="color:#86b300 !important">
                Detalhes do Utilizador
              </h2>
              <div class="p-3 p-lg-5 border">
                <?php
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "camposporpreencher") {
                    echo '<p style=font-size:16px!important;color:#ff0000>Ficaram campos por preencher</p>';
                  }
                  if ($_GET['error'] == "emailinvalido") {
                    echo '<p style=font-size:16px!important;color:#ff0000>E-mail com formato inválido</p>';
                  }
                }
                ?>
                <div class="form-group row">
                  <?php
                  $idUsers = $_SESSION['userId'];
                  $sql = "SELECT pNome, uNome from utilizadores where idUsers=$idUsers";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $idx = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $idx++;
                      if (isset($_GET['primeironome'])) {
                        $first = $_GET['primeironome'];
                        echo '<div class="col-md-6">
                              <label for="c_fname" class="text-black"
                                >Primeiro Nome <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_fname"
                                name="pNome"
                                value="' . $first . '"
                              />
                          </div>';
                      } else {
                        echo '<div class="col-md-6">
                              <label for="c_fname" class="text-black"
                                >Primeiro Nome <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_fname"
                                name="pNome"
                                value="' . $row['pNome'] . '"
                              />
                            </div>';
                      }

                      if (isset($_GET['ultimonome'])) {
                        $second = $_GET['ultimonome'];
                        echo '<div class="col-md-6">
                              <label for="c_lname" class="text-black"
                                >Último nome <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_lname"
                                name="uNome"
                                value="' . $second . '"
                              />
                            </div>';
                      } else {
                        echo '<div class="col-md-6">
                              <label for="c_lname" class="text-black"
                                >Último nome <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_lname"
                                name="uNome"
                                value="' . $row['uNome'] . '"
                              />
                            </div>';
                      }
                    }
                  }
                  ?>
                </div>
                <div class="form-group row">
                  <?php
                  if (isset($_GET['morada'])) {
                    $morada = $_GET['morada'];
                    echo '<div class="col-md-12">
                              <label for="c_address" class="text-black"
                                >Morada <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_address"
                                name="morada"
                                value="' . $morada . '"
                              />
                            </div>';
                  } else {
                    echo '<div class="col-md-12">
                              <label for="c_address" class="text-black"
                                >Morada <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_address"
                                name="morada"
                              />
                            </div>';
                  }
                  ?>
                </div>

                <div class="form-group row">
                  <?php
                  if (isset($_GET['localidade'])) {
                    $localidade = $_GET['localidade'];
                    echo '<div class="col-md-6">
                              <label for="c_state_country" class="text-black"
                                >Localidade <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_state_country"
                                name="localidade"
                                value="' . $localidade . '"
                              />
                            </div>';
                  } else {
                    echo '<div class="col-md-6">
                              <label for="c_state_country" class="text-black"
                                >Localidade <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_state_country"
                                name="localidade"
                              />
                            </div>';
                  }

                  if (isset($_GET['codigopostal'])) {
                    $cPostal = $_GET['codigopostal'];
                    echo '<div class="col-md-6">
                              <label for="c_postal_zip" class="text-black"
                                >Código-Postal <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_postal_zip"
                                name="cPostal"
                                value=' . $cPostal . '
                              />
                            </div>';
                  } else {
                    echo '<div class="col-md-6">
                              <label for="c_postal_zip" class="text-black"
                                >Código-Postal <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_postal_zip"
                                name="cPostal"
                              />
                            </div>';
                  }


                  ?>
                </div>

                <div class="form-group row mb-5">
                  <?php
                  $idUsers = $_SESSION['userId'];
                  $sql = "SELECT emailUsers from utilizadores where idUsers=$idUsers";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $idx = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $idx++;
                      if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo '<div class="col-md-6">
                              <label for="c_email_address" class="text-black"
                                >Email  <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_email_address"
                                name="email"
                                value="' . $email . '"
                              />
                            </div>';
                      } else {
                        echo '<div class="col-md-6">
                              <label for="c_email_address" class="text-black"
                                >Email  <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_email_address"
                                name="email"
                                value="' . $row['emailUsers'] . '"
                              />
                            </div>';
                      }
                    }
                  }

                  if (isset($_GET['telemovel'])) {
                    $telemovel = $_GET['telemovel'];
                    echo '<div class="col-md-6">
                              <label for="c_phone" class="text-black"
                                >Telemóvel <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_phone"
                                name="telemovel"
                                value="' . $telemovel . '"
                              />
                            </div>';
                  } else {
                    echo '<div class="col-md-6">
                              <label for="c_phone" class="text-black"
                                >Telemóvel <span class="text-danger"></span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="c_phone"
                                name="telemovel"
                              />
                            </div>';
                  }

                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black font-heading-serif" style="color:#86b300 !important">
                    A sua encomenda
                  </h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Produtos</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        $arrayProduto = $_SESSION['cart'];
                        $sql = "SELECT idProduto, nomeProduto, precoProduto FROM produtos";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($arrayProduto as $arrayIdProduto => $arrayQuantidade) {
                              if ($arrayIdProduto == $row['idProduto']) { ?>
                                <tr>
                                  <td><?php echo $row['nomeProduto']  ?>
                                    <strong class="mx-2">x</strong>
                                    <input hidden name="quantidade" id="quantidade" value="<?php echo $arrayQuantidade ?>">
                                    <?php echo $arrayQuantidade ?></td>
                                  <td><?php
                                      $preco = $arrayQuantidade * $row['precoProduto'];
                                      echo  $preco . "€";
                                      $total = $total + $preco; ?></td>
                                </tr>
                        <?php  }
                            }
                          }
                        } ?>
                        <tr>
                          <td class=" text-black font-weight-bold">
                            <strong>Total encomenda</strong>
                          </td>
                          <td class="text-black font-weight-bold">
                            <strong><?php
                                    echo $total . '€'; ?></strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>


                  </div>

                  <div class="form-group">
                    <button class="btn btn-success btn-lg btn-block" style="color:#ffffff !important" href="thankyou.php" name="encomenda">
                      Fazer encomenda
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form> -->
    </div>
    </form>
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