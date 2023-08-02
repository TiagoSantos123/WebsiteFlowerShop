<?php
    session_start();
?>
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
          <form
            class="login100-form validate-form p-l-55 p-r-55 p-t-178"
            action="includes/login.encomenda.inc.php"
            method="post"
          >
            <span class="login100-form-title">
              Entrar
            </span>
            <?php
              if(isset($_GET['error'])){
                if($_GET['error']=="camposporpreencher")
                {
                  echo '<p style=font-size:16px!important;color:#ff0000>Ficaram campos por preencher</p>';
                }
                if($_GET['error']=="emailinvalido")
                {
                  echo '<p style=font-size:16px!important;color:#ff0000>E-mail com formato inválido</p>';
                }
                if($_GET['error']=="sqlerror")
                {
                  echo '<p style=font-size:16px!important;color:#ff0000>Erro na conexão á base de dados</p>';
                }
                if($_GET['error']=="palavra-passerrada")
                {
                  echo '<p style=font-size:16px!important;color:#ff0000>Palavra-chave incorreta</p>';
                }
                if($_GET['error']=="utilizadorerrado")
                {
                  echo '<p style=font-size:16px!important;color:#ff0000>E-mail incorreto</p>';
                }              
              }
              else
              if(isset($_GET['login'])){
                if($_GET['login']=="sucesso")
                {
                  echo '<p style=font-size:16px!important;color:#00cc00>Login feito com sucesso</p>';
                } 
              }
              else
              if(isset($_GET['encomenda'])){
                if($_GET['encomenda']=="login")
                {
                  echo '<p style=font-size:16px!important;color:#86b300>Tem de fazer o login para fazer encomendas</p>';
                } 
              }
              
            ?>
            <div
              class="text-right p-t-13 p-b-23 "
            >
              <span class="focus-input100"></span>
            </div>


            <?php
              if(isset($_GET['email']))
              {
                $email=$_GET['email'];
                echo '<div   class="wrap-input100 ">
                      <input
                        class="input100"                       
                        type="text"
                        name="username"                       
                        placeholder="'.$email.'"
                      />
                      <span class="focus-input100"></span>
                    </div>';
              }
              else {
                echo' <div   class="wrap-input100 ">
                      <input
                        class="input100"
                        type="text"
                        name="username"
                        placeholder="E-mail"
                      />
                      <span class="focus-input100"></span>
                    </div>';
              }
                
            ?>
            <div
              class="text-right p-t-13 p-b-23 "
            >
              <input
                class="input100"
                type="password"
                name="pass"
                placeholder="Palavra-chave"
              />
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23">
              <span class="txt1">
                Esqueceu-se da
              </span>

              <a href="reset-password.php" class="txt2">
                Palavra-chave?
              </a>
            </div>

            <div class="container-login100-form-btn">
              <button
                type="submit"
                name="login-submit"
                class="login100-form-btn"
              >
                Entrar
              </button>
            </div> 
            <div class="flex-col-c p-t-170 p-b-40">
              <span class="txt1 p-b-9">
                Ainda não tem conta
              </span>

              <a href="Register.php" class="txt3">
                Inscreva-se agora
              </a>
            </div>

            <div class="text-right p-t-13 p-b-23">
              <a href="index.php" class="txt2">
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
