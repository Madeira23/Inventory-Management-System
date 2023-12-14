<?php 
require('requireLogin.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stock Management System</title>
    <?php include_once "css_imports.html"; ?>
</head>
<body>

<header>
    <h1>Stock Management System</h1>
</header>

<div class="container">
    <div class="content-container">
        <h2>Login</h2>
        
        <div class="image-container">
            <img src="logo.jpg" alt="Stock Management System Image">
        </div>

        <?php
        // Processar o formulário de login aqui, se necessário
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Adicione aqui a lógica de autenticação, por exemplo, verificando as credenciais no banco de dados.

            // Exemplo de lógica de autenticação simples
            $conexao = new mysqli("localhost","root","","gestaostock");

            // Verificar a conexão
            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            // Consultar as credenciais
            $query = "SELECT * FROM Usuarios WHERE username='$username' AND senha='$password'";
            $resultado = $conexao->query($query);

            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();
                echo 'Login bem-sucedido. Redirecionando...';
                // Adicione aqui o redirecionamento para a página principal ou painel de controle.
                // Por exemplo: header("Location: dashboard.php");
            } else {
                echo 'Credenciais inválidas. Tente novamente.';
            }

            // Fechar a conexão

            
            $conexao->close(); 
        }
        ?>

        <div class="login-container">
            <form action="process_login.php" method="post" class="login-form">
                <div class="login-field">
                    <label for="username">Utilizador:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="login-field">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary login-button">Entrar</button>
            </form>
        </div>

        <p>Ainda não tem uma conta? <a href="register.php">Criar conta</a></p>
    </div>
</div>

</body>
</html>
