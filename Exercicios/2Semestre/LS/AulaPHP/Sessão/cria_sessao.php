<?php

    session_start();

    $_SESSION ["nome"] = "Ana";
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>  

    Nome:
    <?php echo $_SESSION["nome"]; ?>

</h1>
    
</body>
</html>