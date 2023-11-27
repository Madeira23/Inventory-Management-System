<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Componente</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>
    <h2>Adicionar Componente</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost", "root", "", "gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Dados do formulário
        $tipo = $_POST["tipo"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $capacidade = $_POST["capacidade"];
        $velocidade = $_POST["velocidade"];
        $potencia = $_POST["potencia"];
        $cor = $_POST["cor"];
        $preco = $_POST["preco"];
        $dataLancamento = $_POST["dataLancamento"];

        // Inserir no banco de dados
        $query = "INSERT INTO Componentes (Tipo, Marca, Modelo, Capacidade, Velocidade, Potencia, Cor, Preco, DataLancamento) 
                  VALUES ('$tipo', '$marca', '$modelo', $capacidade, '$velocidade', $potencia, '$cor', $preco, '$dataLancamento')";

        if ($conexao->query($query) === TRUE) {
            echo "Componente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar componente: " . $conexao->error;
        }

        // Fechar a conexão
        $conexao->close();
    }
    ?>

    <form method="POST" action="">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" required><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" required><br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required><br>

        <label for="capacidade">Capacidade:</label>
        <input type="number" name="capacidade"><br>

        <label for="velocidade">Velocidade:</label>
        <input type="text" name="velocidade"><br>

        <label for="potencia">Potência:</label>
        <input type="number" name="potencia"><br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor"><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required><br>

        <label for="dataLancamento">Data de Lançamento:</label>
        <input type="date" name="dataLancamento" required><br>

        <input type="submit" value="Adicionar Componente">
    </form>

    <br>
    <a href="index.php"class="btn btn-primary">Voltar para a Lista de Componentes</a>
</body>
</html>