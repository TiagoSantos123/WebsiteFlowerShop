<?php
if (isset($_GET['idEncomenda'])) {
  require "conexaoBD.php";
  $idEncomenda = $_GET['idEncomenda'];
  $sql = "Delete from encomendas where idEncomenda=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../Encomendas.php?error=sqlerror2");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $idEncomenda);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ../Encomendas.php?Eliminado");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../Encomendas.php?erro");
}
