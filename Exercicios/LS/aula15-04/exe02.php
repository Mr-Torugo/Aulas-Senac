<?php
session_start();
 
/*
   Verifica se o usuário clicou em algum tema
*/
if (isset($_GET['tema'])) {
    if ($_GET['tema'] === 'claro' || $_GET['tema'] === 'escuro') {
        $_SESSION['tema'] = $_GET['tema'];
    }
}
 
/*
   Define o tema padrão (claro) caso não exista sessão
*/
$tema = $_SESSION['tema'] ?? 'claro';
 
/*
   Define estilos conforme o tema
*/
if ($tema === 'escuro') {
    $corFundo = '#121212';
    $corTexto = '#ffffff';
} else {
    $corFundo = '#ffffff';
    $corTexto = '#000000';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Tema com Session</title>
</head>
<body style="background-color: <?= $corFundo ?>; color: <?= $corTexto ?>; font-family: Arial;">
 
    <h1>Sistema de Tema (Session)</h1>
 
    <p>Escolha um tema:</p>
 
    <a href="?tema=claro">
        <button>Tema claro</button>
    </a>
 
    <a href="?tema=escuro">
        <button>Tema escuro</button>
    </a>
 
    <hr>
 
    <p>Tema atual: <strong><?=($tema) ?></strong></p>
 
</body>
</html>
 