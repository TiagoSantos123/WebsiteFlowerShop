<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
session_start();
if (isset($_POST['encomenda'])) {
    require "dbUsers.inc.php";
    $PNome = $_POST['pNome'];
    $UNome = $_POST['uNome'];
    $Morada = $_POST['morada'];
    $Localidade = $_POST['localidade'];
    $cPostal = $_POST['cPostal'];
    $Email = $_POST['email'];
    $Telemovel = $_POST['telemovel'];
    $idEstadoEncomenda = 1;
    $idUsers = $_SESSION['userId'];
    $data = date("Y/m/d");
    $quantidade = $_POST['quantidade'];

    if (empty($PNome) || empty($UNome) || empty($Morada) || empty($Localidade) ||  empty($cPostal) || empty($Email) || empty($Telemovel)) {
        header("Location: ../checkout.php?error=camposporpreencher&primeironome=" . $PNome . "&ultimonome=" . $UNome . "&morada=" . $Morada . "&localidade=" . $Localidade . "&codigopostal=" . $cPostal . "&email=" . $Email . "&telemovel=" . $Telemovel);
        exit();
    } else
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../checkout.php?error=emailinvalido&primeironome=" . $PNome . "&ultimonome=" . $UNome . "&morada=" . $Morada . "&localidade=" . $Localidade . "&codigopostal=" . $cPostal . "&telemovel=" . $Telemovel);
        exit();
    } else {

        try {

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

            //Recipients
            $mail->setFrom($Email, $Email);  //From
            $mail->addReplyTo($Email, $PNome);
            $mail->addAddress('woodflowerserra@gmail.com', 'Utilizador');     // To
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $subject = "Encomenda";
            $message = "<p> O/A " . $PNome . " " . $UNome . " fez uma encomenda no website wood & flowers</p>";
            $message .= '<p>A morada desta pessoa é a ' . $Morada . ' ,o seu código-postal é o ' . $cPostal . ' ,vive em ' . $Localidade . ' e o seu contacto telefónico é ' . $Telemovel;
            $message .= '<p>Esta pessoa fez uma encomenda de: </p><ul>';
            $total = 0;
            $arrayProduto = $_SESSION['cart'];
            $sql = "SELECT idProduto, nomeProduto, precoProduto FROM produtos";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($arrayProduto as $arrayIdProduto => $arrayQuantidade) {
                        if ($arrayIdProduto == $row['idProduto']) {
                            $preco = $arrayQuantidade * $row['precoProduto'];
                            $total = $total + $preco;
                            $message .= "<li>" . $arrayQuantidade . ' ' . $row['nomeProduto'] . ' no valor de ' . $total . '€</li>';
                        }
                    }
                }
                $message .= "</ul>";
            }


            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
        } catch (Exception $e) {
        }

        $sql = "INSERT INTO encomendas(idEstadoEncomenda,idUtilizador,dataEncomenda) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../checkout.php?error=sqlerror2");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $idEstadoEncomenda, $idUsers, $data);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        $sql = "SELECT max(idEncomenda) as idenc FROM encomendas";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $idEncomenda = $row['idenc'];
        }
        $arrayProduto = $_SESSION['cart'];
        foreach ($arrayProduto as $arrayIdProduto => $arrayQuantidade) {
            $sql2 = "INSERT INTO detalheencomenda(idEncomenda,idProduto,quantidade) VALUES(?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                header("Location: ../checkout.php?error=sqlerror2");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $idEncomenda, $arrayIdProduto, $arrayQuantidade);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
        }

        $sql3 = "UPDATE utilizadores set Morada = ? , Localidade = ? , CPostal = ? , Telemovel = ? where idUsers=$idUsers";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql3)) {
            header("Location: ../checkout.php?error=sqlerror3");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $Morada, $Localidade, $cPostal, $Telemovel);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        $_SESSION['cart'] = null;
        header("Location: ../thankyou.php?sucesso=emailenviado");
        exit();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../thankyou.php");
    exit();
}

