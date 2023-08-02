<?php
if (isset($_POST['novo-utilizador'])) {

  require "conexaoBD.php";

  $PNome = $_POST['Nome'];
  $SNome = $_POST['Apelido'];
  $Email = $_POST['Email'];
  $Password = $_POST['Pass'];
  $PasswordRepeat = $_POST['Confirma_Pass'];
  if (isset($_POST['Tipo'])) {
    $select1 = $_POST['Tipo'];
    switch ($select1) {
      case 'Normal':
        $tipoUtilizador = 1;
        break;
      case 'Admin':
        $tipoUtilizador = 2;
        break;
    }
  }
  $select1 = $_POST['Tipo'];
  if (empty($PNome) || empty($SNome) || empty($Email) || empty($Password) || empty($PasswordRepeat)) {
    header("Location: ../NovoUtilizador.php?error=camposporpreencher&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
    exit();
  } else
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../NovoUtilizador.php?error=emailinválido&primeironome=" . $PNome . "&últimonome=" . $SNome);
    exit();
  } else 
    if ($Password != $PasswordRepeat) {
    header("Location: ../NovoUtilizador.php?error=verificarpass&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
    exit();
  } elseif ($select1 == 'NadaSelecionado') {
    header("Location: ../NovoUtilizador.php?error=PreenchaTipo&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $PNome)) {
    header("Location: ../NovoUtilizador.php?error=apenasletrasN&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $SNome)) {
    header("Location: ../NovoUtilizador.php?error=apenasletrasA&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
    exit();
  } else {
    $sql = "SELECT pNome FROM utilizadores WHERE pNome=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../NovoUtilizador.php?error=sqlerror1");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $PNome, $SNome);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        header("Location: ../NovoUtilizador.php?error=usertaken&email=" . $Email);
        exit();
      } else {
        $sql = "INSERT INTO utilizadores(idUtilizador,pNome,uNome,emailUsers,pwdUsers) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../NovoUtilizador.php?error=sqlerror2");
          exit();
        } else {
          $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sssss", $tipoUtilizador, $PNome, $SNome, $Email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          header("Location: ../utilizadores.php");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../NovoUtilizador.php");
  exit();
}
