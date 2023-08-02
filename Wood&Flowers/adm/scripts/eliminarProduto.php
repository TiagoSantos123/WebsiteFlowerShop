<?php
if (isset($_GET['idProduto'])) {
  require "conexaoBD.php";
  $idProduto = $_GET['idProduto'];
  $idEncomenda = $_GET['idEncomenda'];
  $estado = 4;
  $sql = "Delete from detalheencomenda where idProduto=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../Encomendas.php?error=sqlerror2");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $idProduto);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
  }
  $sql2 = "SELECT count(idEncomenda) as nprodutos from detalheencomenda where idEncomenda=$idEncomenda";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if ($row['nprodutos'] == 0) {
    $sql2 = "UPDATE encomendas SET idEstadoEncomenda = ? where idEncomenda = $idEncomenda";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql2)) {
      header("Location: ../Encomendas.php?error=sqlerror2");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $estado);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      header("Location: ../Encomendas.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../Encomendas.php?erro");
}
