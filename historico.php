<?php require('requireLogin.php'); 

$fullUrl = $_SERVER['REQUEST_URI'];
$specificWord = 'historico';
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
                <?php if($urlVerify) { ?>
                    <a href="historico.php" class="btn btn-primary navbar-link">Histórico de Alterações</a>
                <?php } else { ?>
                    <a href="historico.php" class="btn btn-secondary navbar-link">Histórico de Alterações</a>
                <?php } ?>
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

<?php
// Assuming you have a database connection, replace these lines with your actual database connection code.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestaostock";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch data from the "movimentos" table
    $stmt = $conn->query("SELECT * FROM movimentos ORDER BY hora DESC");
    $movimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    function getDetalhesById($detalhe){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestaostock";
    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->query("SELECT * FROM movimento_detalhes WHERE id='$detalhe'");
        $detalhe = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $detalhe;
    }

    
    // Display the data in an HTML table
    echo '<table>';
    echo '<thead><tr><th>Movimento</th><th>Tipo de Componente</th><th>Componente Antes</th><th>Componente Depois</th><th>Data</th><th>Hora</th><th>Funcionário Nome</th></tr></thead>';
    echo '<tbody>';
    foreach ($movimentos as $movimento) {
        $detalhes = getDetalhesById($movimento['movimento_detalhes_id'])[0];

        echo '<tr>';
        echo '<td>' . $movimento['movimento'] . '</td>';
        echo '<td>' . $detalhes['tipo'] . '</td>';
        echo '<td>' . $detalhes['componente_before'] . '</td>';
        echo '<td>' . $detalhes['componente_after'] . '</td>';
        echo '<td>' . $movimento['data'] . '</td>';
        echo '<td>' . $movimento['hora'] . '</td>';
        echo '<td>' . $movimento['funcionario_nome'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

</body>
</html>
