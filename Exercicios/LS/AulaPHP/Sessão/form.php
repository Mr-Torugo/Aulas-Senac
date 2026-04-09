<?php
   
    session_start();
    $erro = $_SESSION["erro"] ?? 0;
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="valida.php" method="post">
        <div>
            <label>Usuario: </label>
            <input type="text" name="usuario">
        </div>
        <div>
            <label>Senha: </label>
            <input type="password" name="senha">
        </div>
        <div>
            <input type="submit">
        </div>
        <div>
            <?php
                if ($erro == "1"){
                    echo "Você é burro senha errada!";
                }
            ?>
        </div>            
    </form>
 
</body>
</html>
 