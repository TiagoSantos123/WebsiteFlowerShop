<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['enviarMsg'])) {


    $PNome = $_POST['pNome'];
    $UNome = $_POST['uNome'];
    $Email = $_POST['email'];
    $Assunto = $_POST['assunto'];
    $PMsg = $_POST['mensagem'];

    $key = "6LeDSuQiAAAAAMjXrXBiHceJnZ2FZzNJ_sK7oiYh";
    $secretKey = "6LeDSuQiAAAAAM_HvdLI_DiNrlderbhEjpdO6CgL";

    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";
    $content = file_get_contents($request);
    $json = json_decode($content);

    if (empty($PNome) || empty($UNome) || empty($Email) || empty($Assunto) || (!strlen(trim($PMsg)))) {
        header("Location: ../contact.php?error=camposporpreencher&primeironome=" . $PNome . "&últimonome=" . $UNome . "&email=" . $Email . "&assunto=" . $Assunto);
        exit();
    } else
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../contact.php?error=emailinválido&primeironome=" . $PNome . "&últimonome=" . $UNome . "&assunto=" . $Assunto);
        exit();
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $PNome)) {
        header("Location: ../contact.php?error=apenasletrasN&primeironome=" . $PNome . "&últimonome=" . $UNome . "&assunto=" . $Assunto);
        exit();
    } else
      if (!preg_match("/^[a-zA-Z ]*$/", $UNome)) {
        header("Location: ../contact.php?error=apenasletraA&primeironome=" . $PNome . "&últimonome=" . $UNome . "&assunto=" . $Assunto);
        exit();
    } 
    else 
    if($json->success != "false"){
        header("Location: ../contact.php?error=falhoucaptcha&primeironome=" . $PNome . "&últimonome=" . $UNome . "&assunto=" . $Assunto);
        exit();
    }
    else {
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP(); 
            $mail->Mailer = "smtp";                                           // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'woodflowerserra@gmail.com';                 // SMTP username
            $mail->Password   = 'uffqhapzjxirombj';                       // SMTP password
            //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            //$mail->Port       = 587;  // TCP port to connect to
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $mail->setFrom($Email, $Email); //From
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
            $message = "<p> O/A " . $PNome . " " . $UNome . " enviou uma mensagem acerca de " . $Assunto."</p>";
            $message .= '<p>' . $PMsg;
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $Assunto;
            $mail->Body = $message;
            $mail->send();
            header("Location: ../ObrigadoContacto.php?email=enviado");
            exit();
        } catch (Exception $e) {
        }
    }
} else {
    header("Location: ../contact.php");
    exit();
}
