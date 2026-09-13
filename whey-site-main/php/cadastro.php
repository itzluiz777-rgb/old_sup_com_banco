
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("cons.php");
include("DLL.php");

extract($_POST);

if(isset($b1)) {


    $consulta = "SELECT * FROM CLIENTE WHERE LOGIN = '$login'";

    $resultado = banco($server, $user, $password, $db, $consulta);

    $usuario = $resultado->fetch_assoc();

    if($usuario) {

          header("Location: ../Login.html");

    } else {

        
        $pass = md5($senha);

    
        $consulta = "INSERT INTO CLIENTE (NOME,LOGIN, SENHA,CPF)
                     VALUES ('$nome','$login', '$pass','$cpf')";

        banco($server, $user, $password, $db, $consulta);

        
          header("Location: ../Login.html");

    }
}

?>

