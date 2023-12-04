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

        <form action="process_login.php" method="post">
            <label for="username">Utilizador:</label>
            <input type="text" name="username" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

        <p>Ainda não tem uma conta? <a href="register.php">Registre-se</a></p>
    </div>

    <div class="image-container">
        <img src="stock_image.jpg" alt="Stock Management System Image">
    </div>
</div>

</body>
</html>
