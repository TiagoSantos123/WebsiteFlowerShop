<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Entrar</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/animsition/css/animsition.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/daterangepicker/daterangepicker.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
        <?php
            $selector=$_GET['selector'];
            $validator=$_GET['validator'];

            if(empty($selector)  || empty($validator)){
                echo "Occoreu um erro";
            }
            else
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){

            }
        ?>
          <form
            class="login100-form validate-form p-l-55 p-r-55 p-t-178"
            action="includes/reset-password.inc.php"
            method="post"
          >
            <span class="login100-form-title">
              Altere palavra-passe
            </span>

            <input type="hidden" name="selector" value="<?php echo $selector ?>">
            <input type="hidden" name="validator" value="<?php echo $validator ?>">

            <div   class="wrap-input100 ">
              <input
                class="input100"
                type="password"
                name="pwd"
                placeholder="Palavra-passe"
              />
              <span class="focus-input100"></span>
            </div>

            <div
              class="text-right p-t-13 p-b-23 "
            >
              <input
                class="input100"
                type="password"
                name="pwd-repeat"
                placeholder="Repita Palavra-passe"
              />
              <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
              <button
                type="submit"
                name="reset-submit"
                class="login100-form-btn"
              >
                Altere palavra-passe
              </button>
            </div>

            <div class="text-right p-t-13 p-b-23">
              <a href="Login.php" class="txt2">
                Voltar
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main2.js"></script>
  </body>
</html>
