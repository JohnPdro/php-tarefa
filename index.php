<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Controle de Tarefas 📚</h1>
        <form class="row me-auto ms-auto pe-5 ps-5 w-75">
            <div class="col-12">
                <label class="form-label">Nome da tarefa:</label>
                <input name="nome" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Finalizada?</label>
                <select name="finalizada" class="form-select">
                    <option value="vazio">---Escolha---</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>
            <div class="col-12 text-center mt-3">
                <button type="submit" class="w-50 btn btn-success">Salvar✔</button>
            </div>

        </form>
    </div>

    <?php

    if (isset($_GET["nome"])) {
        $nome = $_GET["nome"];
        $finalizada = $_GET["finalizada"];
    } else {
        $nome = "";
        $finalizada = "";
    }

    //dados de conexão com o banco de dados
    $servidor = "localhost";
    $usuario_bd = "root";
    $senha_usuario = "";
    $banco_dados = "tarefas";

    //abrir a conexão com o banco de dados
    $conexao = mysqli_connect($servidor, $usuario_bd, $senha_usuario, $banco_dados);

    //criar o sql
    $sql = "insert into tarefa(nome, finalizada) values('$nome', '$finalizada')";

    //executar o sql no banco de dados
    if ($nome != "") {
        mysqli_query($conexao, $sql);
    }

    //fechar a conexao com o banco de dados
    mysqli_close($conexao);
    ?>

    <?php
    //Abrir a conexao com o banco de dados
    $conexao = mysqli_connect($servidor, $usuario_bd, $senha_usuario, $banco_dados);

    //Criar sql
    $sql = "select * from tarefa";

    //executar o sql no banco de dados
    $todasAsTarefas = mysqli_query($conexao, $sql);
    echo "<br>Todas as tarefas <br>";

    ?>
    <table class="table">
        <?php
    //laço de repetição para exibir os dados
    while ($umaTarefa = mysqli_fetch_assoc($todasAsTarefas)) {
        echo "<tr><td>". $umaTarefa["Nome"] . " </td><td> " . $umaTarefa["Finalizada"] . "</td></tr>";
    }
    ?>
    </table>

    //Fechar a conexao com o banco de dados
    mysqli_close($conexao);
    ?>
</body>

</html>