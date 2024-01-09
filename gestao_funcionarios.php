<?php
require('requireLogin.php');


$fullUrl = $_SERVER['REQUEST_URI'];
$specificWord = 'gestao_funcionarios';
$urlVerify = false;
if (strpos($fullUrl, $specificWord) !== false) {
    $urlVerify = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentos Table</title>
    <?php include_once "css_imports.html"; ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-center">
            <h1>Stock Management System</h1>
            <div class="navbar-container">
                <a href="dashboard.php" class="btn btn-secondary navbar-link">Dashboard</a>
                <a href="historico.php" class="btn btn-secondary navbar-link">Histórico de Alterações</a>
                <?php if($urlVerify) { ?>
                    <a href="gestao_funcionarios.php" class="btn btn-primary navbar-link">Gestão de Funcionários</a>
                <?php } else { ?>
                    <a href="gestao_funcionarios.php" class="btn btn-secondary navbar-link">Gestão de Funcionários</a>
                <?php } ?>
            </div>
        </div>
        <div class="navbar-login">
            <a class="btn btn-success">Login</a>
        </div>
    </nav>
</header>

<div class="container">
    <div class="content-container">
        <h2>Lista de Funcionários</h2>

        <!-- Adicione o formulário de pesquisa -->
        <form method="GET" action="" class="row mb-3" style="width: 100%; justify-content:center;">
            <div class="" style="width: max-content; display: flex; flex-direction: row;">
                <label for="funcionário" style="display:flex; align-items: center; margin-right: .5rem;">Pesquisar por Funcionário:</label>
                <input type="text" name="funcionário" id="funcionário" class="form-control" style="width: fit-content !important;">
            </div>
            <div style="width: max-content;">
                <input type="submit" value="Pesquisar" class="btn btn-primary">
            </div>
        </form>

        <?php
        // Conectar ao banco de dados
        $conexao = new mysqli("localhost","root","","gestaostock");

        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Consultar os funcionarios com base na pesquisa
        $whereClause = "";
        if (isset($_GET['funcionario']) && !empty($_GET['funcionario'])) {
            $produto = $conexao->real_escape_string($_GET['funcionario']);
            $whereClause = " WHERE Tipo LIKE '%$funcionario%' OR Marca LIKE '%$funcionario%' OR Modelo LIKE '%$funcionario%'";
        }

        $query = "SELECT * FROM usuarios" . $whereClause;
        $resultado = $conexao->query($query);

        if ($resultado->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>nome</th>
                        <th>username</th>
                        <th>senha</th>
                        <th>IsAdmin</th>
                    </tr>";

            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$linha['ID']}</td>
                        <td>{$linha['nome']}</td>
                        <td>{$linha['username']}</td>
                        <td>{$linha['senha']}</td>
                        <td>{$linha['IsAdmin']}</td>
                        <td>
                            <a href='edit_funcionario.php?id={$linha['ID']}' class='btn btn-success'>Editar</a>
                            <a href='remove_funcionario.php?id={$linha['ID']}' class='btn btn-danger'>Excluir</a> 
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum Funcionário encontrado.";
        }

        // Fechar a conexão
        $conexao->close();
        ?>

        <a href="add_funcionario.php" class="button">Adicionar Novo Funcionário</a>
    </div>
</div>

</body>
</html>


