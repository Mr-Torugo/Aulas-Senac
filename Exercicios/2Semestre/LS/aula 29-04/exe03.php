
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Somar numeros</title>
</head>
<body>
 
<h2>Digite o primeiro numero</h2>
 
<form method="post">
    Número 1: <input type="number" name="n1"><br>
    Número 2: <input type="number" name="n2"><br>
    <input type="submit" value="Somar">
</form>

<?php
function somar(int $a, int $b) : int {
    return $a + $b;
}

if ($_POST) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

    echo "Resultado: " . somar($n1, $n2);
}
?>


 
</body>
</html>