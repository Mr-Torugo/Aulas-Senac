 

<?php

function temTamanhoMinimo($senha) {
    return strlen($senha) >= 8;
}

function temNumero($senha) {
    for ($i = 0; $i < strlen($senha); $i++) {
        if (is_numeric($senha[$i])) {
            return true;
        }
    }
    return false;
}

function temMaiuscula($senha) {
    for ($i = 0; $i < strlen($senha); $i++) {
        if (ctype_upper($senha[$i])) {
            return true;
        }
    }
    return false;
}

function senhaValida($senha) {
    return temTamanhoMinimo($senha) &&
           temNumero($senha) &&
           temMaiuscula($senha);
}

/* TESTE */
$senha = "Senha123";

if (senhaValida($senha)) {
    echo "Senha válida ";
} else {
    echo "Senha inválida ";
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validação de senha</title>
</head>
<body>
 
<h2>digite a senha</h2>
 
<form method="post">
    Digite a senha:
    <input type="text" name="senha">
    <input type="submit" value="Verificar">
</form>

<?php
if ($_POST) {
    $senha = $_POST['senha'];

    if (senhaValida($senha)) {
        echo "Senha válida";
    } else {
        echo "Senha inválida";
    }
}
?>


 
</body>
</html>