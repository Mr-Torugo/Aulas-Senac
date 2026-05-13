<?php
   //include_once "includes/config.inc.php";
   require_once "conexao/includes/config.inc.php";// se der erro não executa o resto da aplicação
   
   //LISTAGEM TABELA CONTATOS
   //Busca todos os registros da tabela
   //  toda consulta é uma query
   //O resultado (cursors da consulta) fica guardado em $stmt(statement)
   $stmt = $pdo -> query ("SELECT * FROM contatos ORDER BY id ASC");
   

   //Pega todas as linhas retornadas pela consulta e transforma em um array de registros (cada posição no array é um contato)
   //No final, $contatos vira um array de contatos
   $contatos = $stmt -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
</head>
<body>
    <?php
    if(empty($contatos)):?>
    <p>Nenhum registor encontrado</p>
    <?php else: ?>
    <table border="1" cellpadding="1" cellspacing="0">
    <thead >
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($contatos as $contato)
        ?>
        <tr>
            <td><?=htmlespecialchars($contato['id'])?></td>
            <td><?=htmlespecialchars($contato['nome'])?></td>
            <td><?=htmlespecialchars($contato['email'])?></td>
            <td>Atualizar</td>
            <td>Excluir</td>
        </tr>
        <?php endforeach?>
    </tbody>
    </table>
    <?php endif ?>
</body>
</html>