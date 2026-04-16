<?php
session_start();
 
if (isset($_SESSION['visita'])) {
    $_SESSION['visita']++;
} else {
    $_SESSION['visita'] = 1;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas</title>
</head>
<body>
    <h2>Você visitou essa página <?php echo $_SESSION['visita']; ?> vez(es)</h2>
</body>
</html>