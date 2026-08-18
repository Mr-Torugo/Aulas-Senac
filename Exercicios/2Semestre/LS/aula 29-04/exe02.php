<?php
// Função de saudação
function saudar($nome) {
    echo "<p>Olá, $nome!</p>";
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Saudação</title>
</head>
<body>
 
<h2>Digite um nome</h2>
 
<form method="post">
    <input type="text" name="nome" required>
    <button type="submit">Saudar</button>
</form>
 
<?php
// Exibe a saudação somente após enviar o nome
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    saudar($_POST['nome']);
}
?>
 
</body>
</html>