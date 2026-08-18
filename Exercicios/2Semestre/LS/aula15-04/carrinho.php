<?php
session_start();
 
//lista de produtos array associativo
$produtos = [
     1=>["nome" => "Camiseta", "preco" => 50],
     2=>["nome" => "Calça","preco" => 100],
     3=>["nome" => "Tênis", "preco" => 200]
 
];
if(isset($_GET['remover'])){
    $id = $_GET['remover'];
    unset($_SESSION['carrinho'][$id]);
}
 
$total =0;
echo "<h1>Carrinho</h1>";
 
if(empty($_SESSION['carrinho'])){
    echo "Carrinho vazio";
}else{
    foreach($_SESSION['carrinho'] as $id =>$quantidade){
        $nome = $produtos[$id]['nome'];
        $preco = $produtos[$id]['preco'];
        $subtotal = $preco* $quantidade;
        $total += $subtotal;
 
        echo "$nome - QTd: $quantidade - Subtotal: R$ $subtotal";
        echo "<a href='?remover=$id'> Remover</a> <br>";
    }
    echo "<h3>Total: R$ $total</h3>";
}
?>
<a href="exe03.php">Voltar</a