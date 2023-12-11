<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management System</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>

<header>
    <h1>Stock Management System</h1>
    <nav>
        <a href="index2.php">Dashboard</a>
        <a href="historico.php">Histórico de Alterações</a>
        <a href="gestao_funcionarios.php">Gestão de Funcionários</a>
        <!-- Adicione mais itens de menu conforme necessário -->
    </nav>
</header>

<div class="container">
    <div class="content-container">
        <h2>Lista de Componentes</h2>

        <!-- Adicione o formulário de pesquisa -->
        <form method="GET" action="">
            <label for="produto">Pesquisar por Produto:</label>
            <input type="text" name="produto" id="produto">
            <input type="submit" value="Pesquisar">
        </form>

        <?php
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost","root","","gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Consultar os componentes com base na pesquisa
        $whereClause = "";
        if (isset($_GET['produto']) && !empty($_GET['produto'])) {
            $produto = $conexao->real_escape_string($_GET['produto']);
            $whereClause = " WHERE Tipo LIKE '%$produto%' OR Marca LIKE '%$produto%' OR Modelo LIKE '%$produto%'";
        }

        $query = "SELECT * FROM Componentes" . $whereClause;
        $resultado = $conexao->query($query);

        if ($resultado->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Capacidade</th>
                        <th>Velocidade</th>
                        <th>Potencia</th>
                        <th>Cor</th>
                        <th>Preco</th>
                        <th>DataLancamento</th>
                        <th>Ações</th>
                    </tr>";

            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$linha['ID']}</td>
                        <td>{$linha['Tipo']}</td>
                        <td>{$linha['Marca']}</td>
                        <td>{$linha['Modelo']}</td>
                        <td>{$linha['Capacidade']}</td>
                        <td>{$linha['Velocidade']}</td>
                        <td>{$linha['Potencia']}</td>
                        <td>{$linha['Cor']}</td>
                        <td>{$linha['Preco']}</td>
                        <td>{$linha['DataLancamento']}</td>
                        <td>
                            <a href='edit.php?id={$linha['ID']}' class='btn btn-danger'>Editar</a>
                            <a href='delete.php?id={$linha['ID']}' class='btn btn-success'>Excluir</a> 
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum componente encontrado.";
        }

        // Fechar a conexão
        $conexao->close();
        ?>

        <a href="add.php" class="button">Adicionar Novo Componente</a>
    </div>
</div>

</body>
</html>
