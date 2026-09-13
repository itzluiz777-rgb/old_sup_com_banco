
<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: Login.html");
    exit;}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <link rel="stylesheet" href="../css/whey.css">
    <script defer src="../javascript/script.js"></script>
    <script defer src="javascript/banner.js"></script>
</head>

<body>

<div class="cima-session">
    <div id="text"></div> 
</div>   

<div class="topo">
    <div class="logo-session">
         <img class="logo" src="../img/OLD.png">
        <a href="mostra_carrinho.php"><img class="carrinho-icon" src="../img/logoico1.svg"></a>
            <a href="../Login.html/"><img class="user-icon" src="../img/logoico2.svg"></a>

        <a href="Login.html">
            <img class="user-icon" src="../img/logoico2.svg">
        </a>

        <div class="search-box">
            <input type="text" class="search-text" placeholder="Pesquisar...">

            <a class="search-btn">
                <img class="loupe-white" src="../img/lupa1.svg" width="40" height="40">
                <img class="loupe-verde" src="../img/lupa2.svg" width="40" height="40">
            </a>
        </div>
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

<h1 class="titulo-carrinho">Carrinho de compras</h1>

<div class="carrinho-fundo">
    <div id="carrinho-div">

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("cons.php");
include("DLL.php");
$total = 0;
$login = $_SESSION['logado'];
$consulta = "SELECT * FROM CLIENTE WHERE LOGIN = '$login'";

$resultado = banco($server, $user, $password, $db, $consulta);

$usuario = $resultado->fetch_assoc();

$cpf = $usuario['CPF'];


$consulta = "SELECT * FROM CARRINHO WHERE CPF = '$cpf'";

$resultado = banco($server, $user, $password, $db, $consulta);

$produto = $resultado->fetch_assoc();

if ($produto) {

    do {

        echo "
        <div class='produto-carrinho'>
            <img src='../{$produto['IMAGEM']}'>
            <h1>{$produto['NOME']}</h1>
            <h2>R$ {$produto['PRECO']}</h2>
            <input type='number' value='{$produto['QUANTIDADE']}'>
        </div>
        ";

       
        $total += $produto['PRECO'] * $produto['QUANTIDADE'];

    } while ($produto = $resultado->fetch_assoc());

} else {

    echo "<h2>Carrinho vazio</h2>";
}

?>

    </div>
</div>

<div class="pedido_final">
    <h1>Pedido Total</h1>
    <h2>R$ <?php echo "$total"; ?></h2>
    <form action="dados.php" method="post">
        <input type="submit" value="Finalizar Compra" class="botao_finalizar">
    </form>
</div>

<div class="rodapetela">
    <p>© 2026 Old Suplementos</p>
    <p>Site feito por Luiz Hottavio e José Arthur</p>
</div>

</body>
</html>