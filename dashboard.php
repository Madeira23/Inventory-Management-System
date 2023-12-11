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
</header>



<div class="container">
    <div class="content-container">
        <h2>Lista de Componentes</h2>

        <?php
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost","root","","gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Consultar os componentes
        $query = "SELECT * FROM Componentes";
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
                            <a href='edit.php?id={$linha['ID']}'class='btn btn-danger'>Editar</a>
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

    <!-- <div class="image-container">
        <img src="logo.jpg" alt="Stock Management System Image">
    </div>
    -->
</div>

</body>
</html>
