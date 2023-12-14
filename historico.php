<?php require('requireLogin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentos Table</title>
    <?php include_once "css_imports.html"; ?>
    <style>
        body{
            padding: 2rem;
        }
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
    $stmt = $conn->query("SELECT * FROM movimentos");
    $movimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the data in an HTML table
    echo '<table>';
    echo '<thead><tr><th>Movimento</th><th>Data</th><th>Hora</th><th>Funcionário Nome</th></tr></thead>';
    echo '<tbody>';
    foreach ($movimentos as $movimento) {
        echo '<tr>';
        echo '<td>' . $movimento['movimento'] . '</td>';
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
