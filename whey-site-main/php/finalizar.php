```php
<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: Login.html");
    exit;
}

include("cons.php");
include("DLL.php");

$login = $_SESSION['logado'];


$consulta = "SELECT CPF, NOME FROM CLIENTE WHERE LOGIN = '$login'";

$resultado = banco($server, $user, $password, $db, $consulta);

$usuario = $resultado->fetch_assoc();

$cpf = $usuario['CPF'];


$consulta = "SELECT * FROM ENDERECO WHERE CPF = '$cpf'";

$resultado = banco($server, $user, $password, $db, $consulta);

$endereco = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Compra Confirmada</title>
    <link rel="stylesheet" href="../css/whey.css">
    <script defer src="../javascript/script.js"></script>
  

</head>

<body>

<div class="cima-session">
    <div id="text"></div>
</div>

<div class="topo">

    <div class="logo-session">

        <img class="logo" src="../img/OLD.png">

        <a href="mostra_carrinho.php">
            <img class="carrinho-icon" src="../img/logoico1.svg">
        </a>

        <a href="../Login.html">
            <img class="user-icon" src="../img/logoico2.svg">
        </a>

    </div>

    <div class="nav">

        <ul>
            <li><a href="../index.html">home</a></li>
            <li><a href="../2.html">whey</a></li>
            <li><a href="../3.html">Creatina</a></li>
            <li><a href="../4.html">Hipercalóricos</a></li>
        </ul>

    </div>

</div>

<div class="pedido_confirmado">

    <h1>Compra confirmada!</h1>

    <?php

    echo "<h2>Obrigado pela compra, " . $usuario['NOME'] . "!</h2>";
    echo "<p>Seu pedido será enviado para:</p>";
    echo "<h3>Rua: " . $endereco['RUA'] . "</h3>";
    echo "<h3>Bairro: " . $endereco['BAIRRO'] . "</h3>";
    echo "<h3>Cidade: " . $endereco['CIDADE'] . "</h3>";
    echo "<h3>Estado: " . $endereco['ESTADO'] . "</h3>";
    echo "<h3>CEP: " . $endereco['CEP'] . "</h3>";
    date_default_timezone_set('America/Bahia');
    echo "<h3>Data da compra: " . date('d/m/Y H:i') . "</h3>";
    ?>

    <a href="../index.html">
        <button class="botao_finalizar">
            Voltar para a loja
        </button>
    </a>

</div>


<div class="rodapetela">

    <p>© 2026 Old Suplementos</p>

    <p>Site feito por Luiz Hottavio e José Arthur</p>

</div>

</body>

</html>
