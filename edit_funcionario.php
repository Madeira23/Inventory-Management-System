<?php
include 'conexao.php';
require('requireLogin.php');
include_once "css_imports.html"; 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

    $sql = "UPDATE usuarios SET nome='$nome', username='$username', senha='$senha', IsAdmin='$isAdmin' WHERE ID='$id_usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário editado com sucesso!";
    } else {
        echo "Erro ao editar Funcionário: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
</head>
<body>
    <h2>Editar Funcionário</h2>
    <form method="post" action="edit_usuario.php">
        <label for="id_usuario">ID do Funcionário:</label>
        <input type="text" name="id_usuario" required><br>

        <label for="nome">Novo Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="username">Novo Username:</label>
        <input type="text" name="username" required><br>

        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="isAdmin">É administrador?</label>
        <input type="checkbox" name="isAdmin"><br>

        <input type="submit" name="editar_usuario" value="Editar">
    </form>
</body>
</html>
