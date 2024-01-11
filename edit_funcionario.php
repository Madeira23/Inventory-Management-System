<?php



require('requireLogin.php');
include_once "css_imports.html";
$conexao = new mysqli("localhost", "root", "", "gestaostock");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
    $id_usuario = $_GET['id'];
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

    $sql = "UPDATE usuarios SET nome='$nome', username='$username', senha='$senha', IsAdmin='$isAdmin' WHERE ID='$id_usuario'";

    if ($conexao->query($sql) === TRUE) {
        echo "Funcionário editado com sucesso!";
        header("Location: gestao_funcionarios.php");
        } else {
        echo "Erro ao editar Funcionário: " . $conexao->error;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
</head>
<body>
    <h2>Editar Funcionário</h2>
    <form method="post" action="">

        <label for="nome">Novo Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="username">Novo Username:</label>
        <input type="text" name="username" required><br>

        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="isAdmin">É administrador?</label>
        <input type="checkbox" name="isAdmin"><br>

        <input type="submit" name="editar_usuario" class="btn btn-warning" value="Editar">
    </form>
</body>
</html>
