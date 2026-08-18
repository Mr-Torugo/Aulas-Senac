 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Maior numero</title>
</head>
<body>
 
<h2>Digite o primeiro numero</h2>
 
<form method="post">
    Número 1: <input type="number" name="n1"><br>
    Número 2: <input type="number" name="n2"><br>
    Número 3: <input type="number" name="n3"><br>
    <input type="submit" value="Ver maior">
</form>

<?php
function maiorNumero($a, $b, $c) {
    return max($a, $b, $c);
}

if ($_POST) {
    echo "O maior número é: " . maiorNumero(
        $_POST['n1'],
        $_POST['n2'],
        $_POST['n3']
    );
}
?>


 
</body>
</html>