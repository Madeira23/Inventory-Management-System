<?php require('requireLogin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Componente</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>
    <h2>Editar Componente</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost","root","","gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Dados do formulário
        $id = $_POST["id"];
        $tipo = $_POST["tipo"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $capacidade = $_POST["capacidade"];
        $velocidade = $_POST["velocidade"];
        $potencia = $_POST["potencia"];
        $cor = $_POST["cor"];
        $preco = $_POST["preco"];
        $dataLancamento = $_POST["dataLancamento"];

        // Atualizar no banco de dados
        $query = "UPDATE Componentes 
                  SET Tipo='$tipo', Marca='$marca', Modelo='$modelo', Capacidade=$capacidade, Velocidade='$velocidade', 
                      Potencia=$potencia, Cor='$cor', Preco=$preco, DataLancamento='$dataLancamento' 
                  WHERE ID=$id";

        if ($conexao->query($query) === TRUE) {
            echo "Componente atualizado com sucesso!<br>";
        } else {
            echo "Erro ao atualizar componente: " . $conexao->error;
        }

        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];

        $query_movimentos = "INSERT INTO movimentos (movimento, data, hora, funcionario_id, funcionario_nome) 
                             VALUES ('Edição', CURRENT_DATE, CURRENT_TIME, $userId, '$username')";

        if ($conexao->query($query_movimentos) === TRUE) {
            echo "Histórico atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar componente: " . $conexao->error;
        }

        // Fechar a conexão
        $conexao->close();
    } 
    
    if (isset($_GET["id"])) {
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost","root","","gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Obter os dados do componente
        $id = $_GET["id"];
        $query = "SELECT * FROM Componentes WHERE ID=$id";
        $resultado = $conexao->query($query);

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
        } else {
            echo "Componente não encontrado.";
            exit();
        }

        // Fechar a conexão
        $conexao->close();
    } else {
        echo "ID do componente não fornecido.";
        exit();
    }
    ?>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $linha['ID']; ?>">

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?php echo $linha['Tipo']; ?>" required><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?php echo $linha['Marca']; ?>" required><br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $linha['Modelo']; ?>" required><br>

        <label for="capacidade">Capacidade:</label>
        <input type="number" name="capacidade" value="<?php echo $linha['Capacidade']; ?>" required><br>

        <label for="velocidade">Velocidade:</label>
        <input type="text" name="velocidade" value="<?php echo $linha['Velocidade']; ?>" required><br>

        <label for="potencia">Potência:</label>
        <input type="number" name="potencia" value="<?php echo $linha['Potencia']; ?>" required><br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" value="<?php echo $linha['Cor']; ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $linha['Preco']; ?>" required><br>

        <label for="dataLancamento">Data de Lançamento:</label>
        <input type="date" name="dataLancamento" value="<?php echo $linha['DataLancamento']; ?>" required><br>

        <input type="submit" value="Atualizar Componente">
    </form>

    <br>
    <a href="index.php"class="btn btn-primary">Voltar para a Lista de Componentes</a>
</body>
</html>
