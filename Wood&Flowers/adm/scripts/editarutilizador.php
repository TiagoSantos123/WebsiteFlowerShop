<?php

if (isset($_POST['editar-utilizador'])) {
  require "conexaoBD.php";
  $idUsers = $_POST['idUsers'];
  $pNome = $_POST['pNome'];
  $uNome = $_POST['uNome'];
  $email = $_POST['email'];
  if (isset($_POST['tipo'])) {
    $select1 = $_POST['tipo'];
    switch ($select1) {
      case 'Normal':
        $idUtilizador = 1;
        break;
      case 'Admin':
        $idUtilizador = 2;
        break;
    }
  }
  if (empty($pNome) || empty($uNome) || empty($email)) {
    header("Location: ../EditarUtilizadores.php?error=camposporpreencher&idUtilizador=" . $idUsers . "&primeironome=" . $pNome . "&últimonome=" . $uNome . "&email=" . $email);
    exit();
  } else
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../EditarUtilizadores.php?error=emailinválido&idUtilizador=" . $idUsers . "&primeironome=" . $pNome . "&últimonome=" . $uNome . "&email=" . $email);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $pNome)) {
    header("Location: ../EditarUtilizadores.php?error=apenasletrasN&idUtilizador=" . $idUsers . "&primeironome=" . $pNome . "&últimonome=" . $uNome . "&email=" . $email);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $uNome)) {
    header("Location: ../EditarUtilizadores.php?error=apenasletrasA&idUtilizador=" . $idUsers . "&primeironome=" . $pNome . "&últimonome=" . $uNome . "&email=" . $email);
    exit();
  } else {
    $sql = "UPDATE utilizadores SET idUtilizador = ? ,pNome = ? ,uNome = ? ,emailUsers = ? where idUsers=$idUsers";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../EditarUtilizadores.php?error=sqlerror2");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ssss", $idUtilizador, $pNome, $uNome, $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      header("Location: ../Utilizadores.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../Utilizadores.php");
  exit();
}
