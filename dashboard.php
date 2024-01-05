<?php require('requireLogin.php');

$fullUrl = $_SERVER['REQUEST_URI'];
$specificWord = 'dashboard';
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
    <title>Stock Management System</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="navbar-center">
            <h1>Stock Management System</h1>
            <div class="navbar-container">
                <?php if($urlVerify) { ?>
                    <a href="dashboard.php" class="btn btn-primary navbar-link">Dashboard</a>
                <?php } else { ?>
                    <a href="dashboard.php" class="btn btn-secondary navbar-link">Dashboard</a>
                <?php } ?>
                <a href="historico.php" class="btn btn-secondary navbar-link">Histórico de Alterações</a>
                <a href="gestao_funcionarios.php" class="btn btn-secondary navbar-link">Gestão de Funcionários</a>
            </div>
        </div>
        <div class="navbar-login">
            <?php if($_SESSION['logado'] !== true) { ?>
                <a href="login.php" class="btn btn-success">Login</a>
            <?php } else { ?>
                <p style="font-size: 10pt"><?=$_SESSION['username']?></p>
                <a href="logout.php" class="btn btn-success">Logout</a>
            <?php } ?>
        </div>
    </nav>
</header>

<div class="container">
    <div class="content-container">
        <h2>Lista de Componentes</h2>

        <!-- Adicione o formulário de pesquisa -->
        <form method="GET" action="" class="row mb-3" style="width: 100%; justify-content:center;">
            <div class="" style="width: max-content; display: flex; flex-direction: row;">
                <label for="produto" style="display:flex; align-items: center; margin-right: .5rem;">Pesquisar por Produto:</label>
                <input type="text" name="produto" id="produto" class="form-control" style="width: fit-content !important;">
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
                            <a href='edit.php?id={$linha['ID']}' class='btn btn-success'>Editar</a>
                            <a href='delete.php?id={$linha['ID']}' class='btn btn-danger'>Excluir</a> 
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
