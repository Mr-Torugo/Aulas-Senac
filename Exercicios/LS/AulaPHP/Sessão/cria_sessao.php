<?php
    session_start();
    $_SESSION["nome"] = "ana";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>nome: <?php echo $_SESSION["nome"];?></h1>
</body>
</html>