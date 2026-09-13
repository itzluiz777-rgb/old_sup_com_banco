<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../Login.html");
    exit;
}

include("cons.php");
include("DLL.php");

extract($_POST);

$login = $_SESSION['logado'];

$consulta = "SELECT CPF FROM CLIENTE WHERE LOGIN = '$login'";

$resultado = banco($server, $user, $password, $db, $consulta);

$usuario = $resultado->fetch_assoc();

$cpf = $usuario['CPF'];

$consulta = "SELECT * FROM CARRINHO 
             WHERE CPF = '$cpf' AND ID_PRODUTO = '$id'";

$resultado = banco($server, $user, $password, $db, $consulta);

$produto = $resultado->fetch_assoc();

if ($produto) {

    $quantidade = $produto['QUANTIDADE'] + 1;

    $consulta = "UPDATE CARRINHO
                 SET QUANTIDADE = '$quantidade'
                 WHERE CPF = '$cpf' AND ID_PRODUTO = '$id'";

    banco($server, $user, $password, $db, $consulta);

} else {

    $consulta = "INSERT INTO CARRINHO 
                 (CPF, ID_PRODUTO, QUANTIDADE, NOME, IMAGEM, PRECO)
                 VALUES 
                 ('$cpf', '$id', 1, '$nome', '$imagem', '$preco')";

    banco($server, $user, $password, $db, $consulta);
}

header("Location: mostra_carrinho.php");
exit;

?>