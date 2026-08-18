<?php

   require_once "conexao/includes/config.inc.php";
   // Processa o envio do formulário de salvamento verifica se o metodo é post e se globar existe
   if ($_SERVER["REQUEST_METHOD"]=== "POST" && isset ($_POST["salvar"])){
    // Captura/recebe os dados, remove espaços em branco extras e evita erros caso o campo esteja vazio
    $nome=trim($_POST["nome"]?? '');
    $email=trim($_POST["email"]?? '');

    $stmt = $pdo -> prepare ('INSERT INTO contatos (nome,email)VALUES (:nome,:email)');
    $stmt ->execute ([
        ':nome' => $nome,
        ':email' => $email,
        
    ]);
    header("Location:./");
    exit;

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
    <form method="post" action=" ">
        <label for="Nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="Email">Email</label>
        <input type="text" id="email" name="email" required>
        <br>
        <input type="submit" name="salvar" value="salvar">
    </form>
</body>
</html>