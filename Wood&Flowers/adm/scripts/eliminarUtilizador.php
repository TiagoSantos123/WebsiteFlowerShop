<?php
if (isset($_GET['idUsers'])) {
  require "conexaoBD.php";
  $idUsers = $_GET['idUsers'];
  $sql = "Delete from utilizadores where idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../Utilizadores.php?error=sqlerror2");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $idUsers);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ../Utilizadores.php?Eliminado");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../Utilizadores.php?erro");
}
