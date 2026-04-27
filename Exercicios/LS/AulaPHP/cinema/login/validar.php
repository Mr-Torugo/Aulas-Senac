<?php 
    session_start();

    $usuario = $_POST["user"];
    $senha = $_POST["pass"];
    $usuarioCorreto = "admin";
    $senhaCorreta = "123";

    if (($usuario == $usuarioCorreto) && ($senha == $senhaCorreta)){
        $_SESSION["logado"] = true;
        $_SESSION["erro"] = 0;
        header("location:perfil.php");
    }
    else{
        $_SESSION["logado"] = false;
        $_SESSION["erro"] = 1;
        header("location:perfil.php");
    }
?>
    