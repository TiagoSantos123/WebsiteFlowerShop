<?php

if (isset($_POST['reset-submit'])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];


    if (empty($password)  || empty($passwordrepeat)) {
        header("Location: ../Login.php?erro=espacosporpreencher");
        exit();
    } else
    if ($password != $passwordrepeat) {
        header("Location: ../Login.php?erro=aspwdsaodiferentes");
        exit();
    }

    $currentDate = Date("U");

    require "dbUsers.inc.php";

    $sql = "SELECT  * from pwdreset where pwdResetSelector= ?  and pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Ocorreu um erro";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Ocorreu um erro, tem de voltar a repetir o processo";
            exit();
        } else {
            $tokenbin = hex2bin($validator);
            $tokenCheck = password_verify($tokenbin, $row['pwdResetToken']);

            if ($tokenCheck === false) {
                echo "Ocorreu um erro, tem de voltar a repetir o processo";
                exit();
            } else 
            if ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "select * from utilizadores where emailusers=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Ocorreu um erro1";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Ocorreu um erro, tem de voltar a repetir o processo";
                        exit();
                    } else {
                        $sql = "update utilizadores set pwdUsers=? where emailUsers=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Ocorreu um erro2";
                            exit();
                        } else {
                            $newPwdHashed = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHashed, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "delete from pwdReset where pwdResetEmail=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "Ocorreu um erro3";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../Login.php?newpwd=sucesso");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../Login.php");
    exit();
}
