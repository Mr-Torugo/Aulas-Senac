<?php
   //config para conectar ao banco e reutilizar
   //criar arqv .env no gitignore para não vazar dados

   $host = 'localhost';      //endereço do servidor do banco
   $db = 'banco1';     //variavel q acessa o banco através do nome  
   $user =  'root';
   $pass = '';
   $charset = 'utf8mb4';    //conjunto de caracteres do banco que limpa  
   
   //data spurce name, string de conexão como banco
   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

   //acesso ao banco usando pdo do proprio php usando orientação a objeto
   //cria um array chamado options com configurações do PDO
   $option=[
    //Define o modo de erro para exeções
      PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,

    //Define o modo de busca padrão para arrays associativos, nome da variável (retorna todos atributos em array como coluna ao invés de indice)
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   ];

   try{
        $pdo = new PDO($dsn, $user, $pass, $option);//instanciando novo objeto dentro da classe PDO
        echo("Banco conectado");
   }
   catch(PDOException $e){
    die ("Erro na conexão com banco" . $e->getMessage());

   }



?>

