<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../Email/PHPMailer/Exception.php';
require '../../Email/PHPMailer/PHPMailer.php';
require '../../Email/PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
session_start();
if (isset($_POST['editar-encomenda'])) {
  require "conexaoBD.php";
  $idEncomenda = $_POST['idEncomenda'];
  $idProduto = $_POST['idProduto'];
  $Quantidade = $_POST['Quantidade'];
  $data = $_POST['data'];
  $Email = $_POST['email'];
  $PNome = $_POST['nome'];
  if (isset($_POST['estado'])) {
    $select1 = $_POST['estado'];
    switch ($select1) {
      case 'Processada':
        $idEstadoEncomenda = 1;
        break;
      case 'Enviada':
        $idEstadoEncomenda = 2;
        break;
      case 'Recebido':
        $idEstadoEncomenda = 3;
        break;
    }
  }

  /*if($idEstadoEncomenda == 2){*/
    try{

      //Server settings
      $mail->SMTPDebug = 2;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'woodflowerserra@gmail.com';                 // SMTP username
      $mail->Password   = 'uffqhapzjxirombj';                       // SMTP password
      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );

      $mail->setFrom('woodflowerserra@gmail.com', 'woodflowerserra@gmail.com'); //From
      $mail->addReplyTo($Email);
      $mail->addAddress($Email, 'Utilizador');     // To

      $subject = 'Encomenda Enviada';
      $message = '<p> A sua encomenda foi enviada, irá recebe-la o mais breve possível</p>';
      $message .= '<br><br><p>Melhores Cumprimentos </br>';
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body = $message;
      $mail->send();

    } catch (Exception $e) {
    }
    

  /*}
  else if($idEstadoEncomenda == 3){

  }*/


  $sql = "UPDATE encomendas SET idEstadoEncomenda = ? , dataEncomenda = ? where idEncomenda=$idEncomenda";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../EditarEncomenda.php?error=sqlerror2");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ss", $idEstadoEncomenda, $data);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
  }
  $sql2 = "UPDATE detalheencomenda SET quantidade = ? where idEncomenda=$idEncomenda";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("Location: ../EditarEncomenda.php?error=sqlerror2");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $Quantidade);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ../Encomendas.php");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../Encomendas.php");
  exit();
}
