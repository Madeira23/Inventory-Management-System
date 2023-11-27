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

    if ($conexao->query($query) === TRUE) {
        echo "Componente excluído com sucesso!";
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
