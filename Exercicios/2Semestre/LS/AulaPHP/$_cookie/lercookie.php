<?php

    if(isset ($_COOKIE["usuario"])){
        echo "Bem vindo, " . $_COOKIE["usuario"] . "!";
    }
    else {
        echo "Cookie não encontrado";
    }

?>