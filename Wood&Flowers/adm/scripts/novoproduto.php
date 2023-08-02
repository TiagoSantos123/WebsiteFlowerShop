<?php
if (isset($_POST['novo-utilizador'])) {

  require "conexaoBD.php";
  $imagem = "images/" . basename($_FILES["fileToUpload"]["name"]);
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

  $nomeEmpresa = $_POST['empresa'];
  $estado = $_POST['estado'];

  if (empty($nome) || empty($preco) || empty($descricao)) {
    header("Location: ../NovoProduto.php?error=camposporpreencher&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else if ($nomeEmpresa == 'NadaSelecionado1') {
    header("Location: ../NovoProduto.php?error=PreenchaEmpresa&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else if ($estado == 'NadaSelecionado2') {
    header("Location: ../NovoProduto.php?error=PreenchaEstado&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if ($estado == 'NadaSelecionado3') {
    header("Location: ../NovoProduto.php?error=SelecioneImagem&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  }
  if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
    header("Location: ../NovoProduto.php?error=apenasletrasN&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if (preg_match("/^[a-zA-Z ]*$/", $preco)) {
    header("Location: ../NovoProduto.php?error=apenasnumero&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else
  if (!preg_match("/^[a-zA-Z ]*$/", $descricao)) {
    header("Location: ../NovoProduto.php?error=apenasletrasD&nomeProduto=" . $nome . "&preco=" . $preco . "&descricao=" . $descricao);
    exit();
  } else {
    $sql = "INSERT INTO produtos(idEmpresa,idEstadoProduto,nomeProduto,precoProduto,descricao,imagemProduto) VALUES(?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../NovoProduto.php?error=sqlerror2");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ssssss", $idEmpresa, $idEstadoProduto, $nome, $preco, $descricao, $imagem);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      InsereImagem();
      header("Location: ../produtos.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../NovoProduto.php");
  exit();
}



function InsereImagem()
{

  $target_dir = "../../images/produtos/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
