<?php require('requireLogin.php'); ?>

<?php
if (isset($_GET["id"])) {
    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "gestaostock");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Excluir o componente
    $id = $_GET["id"];
    $query = "DELETE FROM Componentes WHERE ID=$id";

    $conexao->query($query);

    if ( mysqli_affected_rows($conexao) > 0) {
        echo "Componente excluído com sucesso!!";

        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];

        $query_movimentos = "INSERT INTO movimentos (movimento, data, hora, funcionario_id, funcionario_nome) 
                                VALUES ('Remoção', CURRENT_DATE, CURRENT_TIME, $userId, '$username')";

        if ($conexao->query($query_movimentos) === TRUE) {
            echo "Histórico atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar componente: " . $conexao->error;
        }
    } else {
        echo "Erro ao excluir componente: " . $conexao->error;
    }

    

    // Fechar a conexão
    $conexao->close();
} else {
    echo "ID do componente não fornecido.";
}

?>
  <br>
    <a href="index.php"class="btn btn-primary">Voltar para a Lista de Componentes</a>
