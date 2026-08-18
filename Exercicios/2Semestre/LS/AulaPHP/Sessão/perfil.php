<?php
    session_start();
    if(!$_SESSION["logado"]){
        $_SESSION["erro"] = 2;
        header("location:form.php");
    }
    else{    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_SESSION["nome"] ?>
</body>
    <?php } ?>
</html>