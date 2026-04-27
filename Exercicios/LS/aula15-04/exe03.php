<?php
session_start();
 
//lista de produtos array associativo
$produtos = [
     1=>["nome" => "Camiseta", "preco" => 50],
     2=>["nome" => "Calça","preco" => 100],
     3=>["nome" => "Tênis", "preco" => 200]
 
];
 
 
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}
 
if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    if(isset($_SESSION['carrinho'][$id])){
        $_SESSION['carrinho'][$id]++;
    }else{
        $_SESSION['carrinho'][$id] =1;
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Produtos</h1>
    <?php foreach ($produtos as $id =>$produto):?>
    <p>
        <?php echo $produto['nome'];?> - R$ <?php echo $produto['preco'];?>
        <a href="?id=<?php echo $id;?>">Adicionar</a>
 
    </p>
    <?php endforeach; ?>
 
        <a href= "carrinho.php">Ver Carrinho</a>
</body>
</html>