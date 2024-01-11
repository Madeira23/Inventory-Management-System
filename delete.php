<?php require('requireLogin.php'); ?>

<?php
if (isset($_GET["id"])) {
    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "gestaostock");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    function componenteAntes($id) {
        $conexao = new mysqli("localhost", "root", "", "gestaostock");
    
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }
    
        $query = "SELECT tipo, marca, modelo FROM componentes WHERE id='$id'";
        
        $result = $conexao->query($query);
    
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $conexao->close();
                return $row;
            } else {
                $conexao->close();
                return null;
            }
        } else {
            $conexao->close();
            return null;
        }
    }        

    $componente_antes = componenteAntes($_GET["id"]);

    $componente_antes_tipo = $componente_antes['tipo'];
    $componente_nome_antes = $componente_antes['marca'] . " " . $componente_antes['modelo'];
    $componente_nome_depois = "Removido";

    $query_movimento_detalhes = "INSERT INTO movimento_detalhes (tipo, componente_before, componente_after) 
                        VALUES ('$componente_antes_tipo', '$componente_nome_antes', '$componente_nome_depois')";

    if ($conexao->query($query_movimento_detalhes) === TRUE) {
        echo "Histórico atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar componente: " . $conexao->error;
    }

    function getMovimentoDetalhesId($str_before, $str_after){
        $conexao = new mysqli("localhost", "root", "", "gestaostock");
    
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }
    
        $query = "SELECT id FROM movimento_detalhes WHERE componente_before='$str_before' and componente_after='$str_after' ORDER BY id DESC LIMIT 1";
        
        $result = $conexao->query($query);
    
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $conexao->close();
                return $row;
            } else {
                $conexao->close();
                return null;
            }
        } else {
            $conexao->close();
            return null;
        }
    }

    $movimento_detalhes_id = getMovimentoDetalhesId($componente_nome_antes, $componente_nome_depois)['id'];

    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];

    $query_movimentos = "INSERT INTO movimentos (movimento, data, hora, funcionario_id, funcionario_nome, movimento_detalhes_id) 
                        VALUES ('Remoção', CURRENT_DATE, CURRENT_TIME, $userId, '$username', '$movimento_detalhes_id')";

    if ($conexao->query($query_movimentos) === TRUE) {
        echo "Histórico atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar componente: " . $conexao->error;
    }    
    
    // Excluir o componente
    $id = $_GET["id"];
    $query = "DELETE FROM Componentes WHERE ID=$id";
    
    $conexao->query($query);
    
    if ( mysqli_affected_rows($conexao) > 0) {
        echo "Componente excluído com sucesso!!";
        header("Location: dashboard.php");
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
