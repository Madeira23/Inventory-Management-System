<?php

$conexao = new mysqli("localhost", "root", "", "gestaostock");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
    $id_usuario = $_GET["id"];
    $sql = "DELETE FROM usuarios WHERE ID = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_usuario);

if ($stmt->execute()) {
    header("Location: gestao_funcionarios.php");
} else {
    echo "Erro ao remover funcionário: " . $stmt->error;
}
$stmt->close(); 

?>
