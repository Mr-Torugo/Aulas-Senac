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
 
   //exclusao via post
   //filtrando campo delete id para validar se o tipo dele é inteir
 
   if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST["delete_id"])){
    $id=filter_input(INPUT_POST,'delete_id',FILTER_VALIDATE_INT);
    //echo $id;
    //die();
 
    if($id){
        // prepara o SQL para apagar  o registro
        $stmt= $pdo -> prepare("DELETE FROM contatos WHERE id = : id");
        //excutar o SQL
        stmt -> execute([':id'=> $id]);
 
    }
   }
   header("Location: /");
   exit
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
    <p>Nenhum registro encontrado</p>
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
        <?php foreach($contatos as $contato) : ?>
        <tr>
            <td><?=htmlspecialchars($contato['id'])?></td>
            <td><?=htmlspecialchars($contato['nome'])?></td>
            <td><?=htmlspecialchars($contato['email'])?></td>
            <td>
                <form method="post" action="/form_contato.php">
                    <input type="hidden" name="atualiza_id" value="<?=$contato["id"];?>">
                <button type="submit">Atualizar</button>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="delete_id" value="<?=$contato["id"];?>">
                <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <?php endif ?>
</body>
</html>