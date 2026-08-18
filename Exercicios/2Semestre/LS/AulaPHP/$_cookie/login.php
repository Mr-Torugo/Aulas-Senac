<?php
    setcookie("usuario", "alguem", "time"() + 3600, "/");
    echo "Cookie enviado";

?>