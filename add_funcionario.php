<?php
include 'conexao.php'; // Inclua o arquivo de conexão
require('requireLogin.php');
include_once "css_imports.html"; 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adicionar_usuario'])) {
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

    $sql = "INSERT INTO usuarios (nome, username, senha, IsAdmin) VALUES ('$nome', '$username', '$senha', '$isAdmin')";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar funcionário: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Funcioário</title>
</head>
<body>
    <h2>Adicionar Funcioário</h2>
    <form method="post" action="add_usuario.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="isAdmin">É administrador?</label>
        <input type="checkbox" name="isAdmin"><br>

        <input type="submit" name="adicionar_usuario" value="Adicionar">
    </form>
</body>
</html>
