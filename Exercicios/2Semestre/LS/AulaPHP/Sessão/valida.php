<?php
    session_start();
 
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
 
    if(($usuario === "admin") && ($senha === "123")){
        $_SESSION["logado"] = true;  
        $_SESSION["nome"] = "joão";
        $_SESSION["erro"] = 0;
        header("location:perfil.php");    
    }
    else{
        $_SESSION["logado"] = false;
        $_SESSION["erro"] = "1";
        header("location:form.php");
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
   
</body>
</html>
 