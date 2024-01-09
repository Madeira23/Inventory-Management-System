<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remover_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $sql = "DELETE FROM usuarios WHERE ID = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário removido com sucesso!";
    } else {
        echo "Erro ao remover funcionário: " . $conn->error;
    }
}

$conn->close();
?>
