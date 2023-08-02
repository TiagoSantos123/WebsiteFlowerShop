<?php
/*require "conexaoBD.php";
$idUtilizador = $_POST['idUtilizador'];
$data = $_POST['dataEnc'];
if (isset($_POST['estado'])) {
  $select1 = $_POST['estado'];
  switch ($select1) {
    case 'Processada':
      $idEstado = 1;
      break;
    case 'Enviada':
      $idEstado = 2;
      break;
    case 'Recebido':
      $idEstado = 3;
      break;
  }
}

//insere encomenda
$sql = "INSERT INTO encomendas(idEstadoEncomenda,idUtilizador,dataEncomenda) VALUES(?,?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sss", $idEstado, $idUtilizador, $data);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  //obtem o numero da ultima encomenda inserida
  $sql = "SELECT max(idEncomenda) as idenc FROM encomendas";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idEncomenda = $row['idenc'];
  }
}
//Insere detalhesencomenda
$tableData = stripcslashes($_POST['pTableData']);
$tableData = json_decode($tableData, TRUE);

foreach ($tableData as $produto) {
  $sql = "INSERT INTO detalheencomenda(idEncomenda,idProduto,quantidade) VALUES(?,?,?)";
  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "sss", $idEncomenda, $produto['idProduto'], $produto['quantidade']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
header("Location: ../Encomendas.php");
exit();*/




require "conexaoBD.php";
$idUtilizador = $_POST['idUtilizador'];
$data = $_POST['dataEnc'];
if (isset($_POST['estado'])) {
  $select1 = $_POST['estado'];
  switch ($select1) {
    case 'Processada':
      $idEstado = 1;
      break;
    case 'Enviada':
      $idEstado = 2;
      break;
    case 'Recebido':
      $idEstado = 3;
      break;
  }
}

//insere encomenda
$sql = "INSERT INTO encomendas(idEstadoEncomenda,idUtilizador,dataEncomenda) VALUES(?,?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sss", $idEstado, $idUtilizador, $data);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  //obtem o numero da ultima encomenda inserida
  $sql = "SELECT max(idEncomenda) as idenc FROM encomendas";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idEncomenda = $row['idenc'];
  }
}
//Insere detalhesencomenda
$tableData = stripcslashes($_POST['pTableData']);
$tableData = json_decode($tableData, TRUE);
$GLOBALS["tabela"] = $tableData;


foreach ($tableData as $produto) {
  $sql = "INSERT INTO detalheencomenda(idEncomenda,idProduto,quantidade) VALUES(?,?,?)";
  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "sss", $idEncomenda, $produto['idProduto'], $produto['quantidade']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
