<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Componentes</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>
    <h2>Lista de Componentes</h2>

    <?php
    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "gestaostock");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Consultar os componentes
    $query = "SELECT * FROM Componentes";
    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        echo "<table border='1'>
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
            if( isset($precoTotal)) {
                $precoTotal = $precoTotal + $linha['Preco'];
            } else {
                $precoTotal = $linha['Preco'];
            }

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
                        <a href='edit.php?id={$linha['ID']}' class='btn btn-success'>Editar</a>
                        <a href='delete.php?id={$linha['ID']}' class='btn btn-danger'>Excluir</a>
                    </td>
                </tr>";
        }

        
        echo "</table>";
        echo "Preço total do PC: {$precoTotal}";
    } else {
        echo "Nenhum componente encontrado.";
    }

    // Fechar a conexão
    $conexao->close();
    ?>
    <br>
    <a href="add.php" class="btn btn-primary">Adicionar Novo Componente</a>
</body>
</html>
