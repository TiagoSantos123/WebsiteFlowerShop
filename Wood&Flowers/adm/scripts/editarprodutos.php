<?php

if (isset($_POST['editar-produto'])) {
  require "conexaoBD.php";
  $idProduto = $_POST['idProduto'];
  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  if (isset($_POST['empresa'])) {
    $select1 = $_POST['empresa'];
    switch ($select1) {
      case 'Wood_Flowers':
        $idEmpresa = 1;
        break;
      case 'Carpintaria':
        $idEmpresa = 2;
        break;
    }
  }
  if (isset($_POST['estado'])) {
    $select1 = $_POST['estado'];
    switch ($select1) {
      case 'Existe':
        $idEstadoProduto = 1;
        break;
      case 'NaoExiste':
        $idEstadoProduto = 2;
        break;
    }
  }
  if (empty($nome) || empty($preco) || empty($descricao)) {
    header("Location: ../EditarProdutos.php?error=camposporpreencher&idProduto=" . $idProduto . "&nome=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
    header("Location: ../EditarProdutos.php?error=apenasletrasN&idProduto=" . $idProduto . "&nome=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if (preg_match("/^[a-zA-Z ]*$/", $preco)) {
    header("Location: ../EditarProdutos.php?error=apenasnumero&idProduto=" . $idProduto . "&nome=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $descricao)) {
    header("Location: ../EditarProdutos.php?error=apenasletrasD&idProduto=" . $idProduto . "&nome=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else {
    $sql = "UPDATE produtos SET idEmpresa = ?, idEstadoProduto=? ,nomeProduto = ? ,precoProduto = ? ,descricao = ? where idProduto=$idProduto";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../EditarProdutos.php?error=sqlerror2");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "sssss", $idEmpresa, $idEstadoProduto, $nome, $preco, $descricao);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      header("Location: ../produtos.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../produtos.php");
  exit();
}
