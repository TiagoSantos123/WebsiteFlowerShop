<?php
if (isset($_POST['register'])) {

    require "dbUsers.inc.php";

    $PNome = $_REQUEST['first_name'];
    $SNome = $_REQUEST['last_name'];
    $Email = $_REQUEST['your_email'];
    $Password = $_REQUEST['password'];
    $PasswordRepeat = $_REQUEST['comfirm_password'];  
    $tipoUtilizador = 1;

    $key = "6LeDSuQiAAAAAMjXrXBiHceJnZ2FZzNJ_sK7oiYh";
    $secretKey = "6LeDSuQiAAAAAM_HvdLI_DiNrlderbhEjpdO6CgL";

    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";
    $content = file_get_contents($request);
    $json = json_decode($content);

    if (empty($PNome) || empty($SNome) || empty($Email) || empty($Password) || empty($PasswordRepeat)) {

        header("Location: ../Register.php?error=camposporpreencher&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
        exit();
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $PNome)) {
        header("Location: ../Register.php?error=apenasletrasN&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
        exit();
    } else
      if (!preg_match("/^[a-zA-Z ]*$/", $SNome)) {
        header("Location: ../Register.php?error=apenasletrasA&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
        exit();
    } else
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Register.php?error=emailinválido&primeironome=" . $PNome . "&últimonome=" . $SNome);
        exit();
    } else 
        if ($Password != $PasswordRepeat) {
        header("Location: ../Register.php?error=verificarpass&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
        exit();
    }else 
        if($json->success != "false"){
        header("Location: ../Register.php?error=falhoucaptcha&primeironome=" . $PNome . "&últimonome=" . $SNome . "&email=" . $Email);
        exit();
    } else {
        $sql = "SELECT pNome FROM utilizadores WHERE pNome=? AND uNome=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Register.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $PNome,$SNome);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("Location: ../Register.php?error=usertaken&email=" . $Email);
                exit();
            } else {
                $sql = "INSERT INTO utilizadores(idUtilizador,pNome,uNome,emailUsers,pwdUsers) VALUES(?,?,?,?,?)";   //Mudar dados conforme fizer a base de dados
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../Register.php?error=sqlerror2");
                    exit();
                } else {
                    $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $tipoUtilizador, $PNome, $SNome, $Email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../Login.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../Register.php");
    exit();
}
