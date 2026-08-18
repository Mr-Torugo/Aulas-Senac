<?php
    setcookie("usuario", "alguem", "time"() + 3600, "/");

    $usuario = $_COOKIE["usuario"] ?? "visitante";

    echo "Bem vindo, " . htmlspecialchars($usuario, ENT_QUOTES, "UTF-8");

?>