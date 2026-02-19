<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php echo "hello world!"; ?>
    <h1>SENAC</h1>
    <?php
    // Variáveis
        $nome = "Alickson";
        $sobrenome = "Ramos";
        $idade = 30;
        $altura = 1.55;
        $casado = false;
    // Exibindo as variáveis
        echo "Nome: " . $nome . " " . $sobrenome . "<br>";
        echo "Idade: " . $idade . "<br>";
        echo "Altura: " . $altura . "<br>";
        echo "Casado: " . ($casado ? "Sim" : "Não") . "<br>";
    ?>
    
</body>
</html>