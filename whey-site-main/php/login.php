<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("cons.php");
include("DLL.php");

extract($_POST);

if(isset($b2)) {

    $consulta = "SELECT * FROM CLIENTE WHERE LOGIN = '$login'";

    $resultado = banco($server, $user, $password, $db, $consulta);

    $usuario = $resultado->fetch_assoc();

    if($usuario) {

        $pass = md5($senha);

        if($pass == $usuario['SENHA']) {

            $_SESSION['logado'] = $login;

            header("Location: ../index.html");
            exit;

        } else {

            echo "Senha incorreta.";
             echo '<a href="../Login.html">Voltar</a>';



        }

    } else {

 

         header("Location: ../cadastro.html");

    }
}

?>