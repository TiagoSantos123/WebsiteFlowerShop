<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['sendEmail-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/PAP_12/PAP/Wood&Flowers/new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);


    $Expire = Date("U") + 1800;                                       //Criar base de dados com os campos ID, Token, Selector, Expire, Email

    require "dbUsers.inc.php";

    $userEmail = $_POST["email"];

    $sql = "delete from pwdReset where pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Não apagou";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }


    $sql = "insert into pwdReset (pwdResetEmail, pwdResetSelector,pwdResetToken,pwdResetExpires) values(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Não inseriu";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $Expire);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

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
        $mail->setFrom('woodflowerserra@gmail.com', 'woodflowerserra@gmail.com'); //From
        $mail->addReplyTo($to);
        $mail->addAddress($to, 'Utilizador');     // To
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content

        $subject = 'Altere a sua palavra-passe';
        $message = '<p> Recebemos um pedido para alterar a sua palavra-passe. O link para alterar a sua palavra-passe encontra-se mais abaixo</p>';
        $message .= '<p>Este é o link para alterar a sua palavra-passe: </br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        header("Location: ../reset-password.php?alteracao=sucedido");
        exit();
    } catch (Exception $e) {
    }
} else {
    header("Location: ../Login.php");
    exit();
}
