<?php
	session_start();
	$key = "6LeDSuQiAAAAAMjXrXBiHceJnZ2FZzNJ_sK7oiYh"
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registrar</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style2.css" />
	<!-- Captcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- Ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>Informação</h2>
				<p class="text-1">Bem-vindos</p>
				<p class="text-2"> Registre-se ao nosso website para poder fazer encomendas com entrega ao domícilio</p>
				<div class="form-left-last">
					<input type="submit" name="account" class="account" value="Tem uma conta" onclick="window.location.href='Login.php'">
				</div>
			</div>
			<form action="includes/signup.inc.php" method="post" class="form-detail" id="myform">
				<h2>Formulário de Registo</h2>
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "camposporpreencher") {
						echo '<p style=font-size:16px!important;color:#ff0000>Ficaram campos por preencher</p>';
					}
					if ($_GET['error'] == "emailinválido") {
						echo '<p style=font-size:16px!important;color:#ff0000>E-mail com formato inválido</p>';
					}
					if ($_GET['error'] == "verificarpass") {
						echo '<p style=font-size:16px!important;color:#ff0000>As palavras-chaves não são iguais</p>';
					}
					if ($_GET['error'] == "sqlerror") {
						echo '<p style=font-size:16px!important;color:#ff0000>Erro na conexão á base de dados</p>';
					}
					if ($_GET['error'] == "usertaken&email") {
						echo '<p style=font-size:16px!important;color:#ff0000>Este e-mail já está a ser utilizado</p>';
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
				} else
				if (isset($_GET['login'])) {
					if ($_GET['login'] == "sucesso") {
						echo '<p style=font-size:16px!important;color:#00cc00>Registo feito com sucesso</p>';
					}
				}
				?>
				<div class="form-group">
					<?php
					if (isset($_GET['primeironome'])) {
						$first = $_GET['primeironome'];
						echo '  <div class="form-row form-row-1">
										<label for="first_name">Primeiro Nome</label> 
										<input type="text" value="' . $first . '" name="first_name" id="first_name" class="input-text" >
									</div>';
					} else {
						echo '	<div class="form-row form-row-1">
										<label for="first_name">Primeiro Nome</label> 
										<input type="text" name="first_name" id="first_name" class="input-text" >
									</div>';
					}

					if (isset($_GET['últimonome'])) {
						$last = $_GET['últimonome'];
						echo '	<div class="form-row form-row-1">
										<label for="last_name">Último Nome</label>
										<input type="text" value="' . $last . '" name="last_name" id="last_name" class="input-text" >
									</div>';
					} else {
						echo '	<div class="form-row form-row-1">
										<label for="last_name">Último Nome</label>
										<input type="text" name="last_name" id="last_name" class="input-text" >
									</div>';
					}

					?>
				</div>
				<?php
				if (isset($_GET['email'])) {
					$email = $_GET['email'];
					echo '	<div class="form-row">
									<label for="your_email">Email</label>
									<input type="text"value="' . $email . '" name="your_email" id="your_email" class="input-text" >
								</div>';
				} else {
					echo '	<div class="form-row">
									<label for="your_email">Email</label>
									<input type="text" name="your_email" id="your_email" class="input-text" >
								</div>';
				}
				?>

				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Palavra-passe</label>
						<input type="password" name="password" id="password" class="input-text">
					</div>
					<div class="form-row ">
						<label for="comfirm-password">Confirme a palavra-passe</label>
						<input type="password" name="comfirm_password" id="comfirm_password" class="input-text">
					</div>
				</div>
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="<?php echo $key ?>"></div>
				</div>
				<div class="form-checkbox">
					<label class="container">
						<p>Eu concordo com os <a href="https://www.publico.pt/nos/termos-e-condicoes" class="text">termos e condições</a></p>
						<input type="checkbox" name="checkbox">
						<span class="checkmark"></span>
					</label>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" id="register" class="register" value="Registrar">
				</div>
				<div class="text-right p-t-13 p-b-23">
					<a style="color:#333" href="index.php" class="txt2">
						Voltar
					</a>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

