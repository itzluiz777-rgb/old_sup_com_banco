<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include("cons.php");
include("DLL.php");

session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: Login.html");
    exit;
}
 extract($_POST);



$login = $_SESSION['logado'];

$consulta = "SELECT * FROM CLIENTE WHERE LOGIN = '$login'";

$resultado = banco($server, $user, $password, $db, $consulta);

$usuario = $resultado->fetch_assoc();

$cpf = $usuario['CPF'];
    
    
$consulta = "SELECT * FROM ENDERECO WHERE CPF = '$cpf'";

$resultado = banco($server, $user, $password, $db, $consulta);

$endereco_existente = $resultado->fetch_assoc();



if($endereco_existente) {

      header("Location:finalizar.php");
      exit;


}else {

 
if(isset($envio)) {
    $consulta = "INSERT INTO ENDERECO
    (CPF, BAIRRO,RUA, CIDADE, ESTADO, CEP)
    VALUES
    ('$cpf','$bairro','$rua','$cidade', '$estado', '$cep')";

    banco($server, $user, $password, $db, $consulta);

  
    header("Location:mostra_carrinho.php");
    exit;
}
else{
      header("Location:../dados.html");
      exit;
}
}

?>