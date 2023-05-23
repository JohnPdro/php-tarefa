<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
</head>
<body>
    <h1>Controle de Tarefas 📚</h1>
    <form action="">
        Nome da tarefa:
        <input name="nome">
        Finalizada?
        <input name="finalizada">
        <button type="submit">Salvar✔</button>
        
    </form>

    <?php
    $nome = $_GET["nome"];
    $finalizada = $_GET["finalizada"];
    echo $nome . "  -  " . $finalizada;

    //dados de conexão com o banco de dados
    $servidor = "localhost";
    $usuario_bd = "root";
    $senha_usuario = "";
    $banco_dados = "tarefas";

    //abrir a conexão com o banco de dados
    $conexao = mysqli_connect($servidor,$usuario_bd,$senha_usuario,$banco_dados);

    //criar o sql
    $sql = "insert into tarefa(nome, finalizada) values('$nome', '$finalizada')";

    //executar o sql no banco de dados
    mysqli_query($conexao, $sql);

    //fechar a conexao com o banco de dados
    mysqli_close($conexao);
    ?>
</body>
</html>