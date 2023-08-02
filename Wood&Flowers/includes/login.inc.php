<?php

$sqlUsers = "SELECT * FROM utilizadores where emailUsers=?";

if (isset($_POST['login-submit'])) {

    require "dbUsers.inc.php";
    $email = $_POST['username'];
    $password = $_POST['pass'];

    if (empty($email) || empty($password)) {

        header("Location: ../Login.php?error=camposporpreencher&email=" . $email);
        exit();
    } else
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Login.php?error=emailinvalido");
        exit();
    } else {
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlUsers)) {
            header("Location: ../Login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../Login.php?error=palavra-passerrada");
                    exit();
                } else
                if ($pwdCheck == true) {
                    if ($row["idUtilizador"] == 1) {
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        header("Location: ../Index.php?login=sucesso");
                    } else if ($row["idUtilizador"] == 2) {
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        header("Location: ../ADM/home.php?login=sucesso");
                    }
                    exit();
                } else {
                    header("Location: ../Login.php?error=utilizadorenixestente");
                    exit();
                }
            } else {
                header("Location: ../Login.php?error=utilizadorerrado");
                exit();
            }
        }
    }
} else {
    header("Location: ../Login.php");
    exit();
}
