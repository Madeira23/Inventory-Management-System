<?php
session_start();
// Este arquivo será responsável por processar as credenciais de login submetidas no formulário.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Adicione aqui a lógica de autenticação, por exemplo, verificando as credenciais no banco de dados.

    // Exemplo de lógica de autenticação simples
    $conexao = new mysqli("localhost", "root", "", "gestaostock");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Consultar as credenciais
    $query = "SELECT * FROM Usuarios WHERE username='$username' AND senha='$password'";
    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        $utilizador = $resultado->fetch_assoc();

        // Adicione aqui a lógica para redirecionar com base nas permissões
        if ($utilizador['IsAdmin'] == 1) {
            // Redirecionar para a página do admin
            header("Location: dashboard.php");
        } else {
            // Redirecionar para a página do funcionário
            header("Location: index.php");
        }

        $_SESSION['logado']=true;
        $_SESSION['userId']=$utilizador['ID'];
        $_SESSION['username']=$utilizador['nome'];

        // Fechar a conexão
        $conexao->close();
    } else {
        // Autenticação falhou
        echo 'Credenciais inválidas. Tente novamente.';
    }
}
?>
