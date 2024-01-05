<?php 
session_start();

$loginError = false;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conexao = new mysqli("localhost", "root", "", "gestaostock");

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    $query = "SELECT * FROM Usuarios WHERE username='$username' AND senha='$password'";
    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        $utilizador = $resultado->fetch_assoc();

        if ($utilizador['IsAdmin'] == 1) {
            header("Location: dashboard.php");
        } else {
            header("Location: index.php");
        }

        $_SESSION['logado']=true;
        $_SESSION['userId']=$utilizador['ID'];
        $_SESSION['username']=$utilizador['nome'];

        $conexao->close();
    } else {
        $loginError = true;
    }
}

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

        <?php if($loginError == true) { ?>
            <div class="alert alert-danger" style="width: fit-content; margin: 0 auto 1rem auto;" role="alert">
                Credenciais inválidas. Tente novamente!
            </div>
        <?php } ?>

        <div class="login-container">    
            <form method="post" class="login-form">
                <div class="login-field">
                    <label for="username">Utilizador:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="login-field">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <input type="submit" name="submit" value="Entrar" class="btn btn-primary login-button"/>
            </form>
        </div>

        <p style="margin-top: .5rem">Ainda não tem uma conta? <a href="register.php">Criar conta</a></p>
    </div>
</div>

</body>
</html>
