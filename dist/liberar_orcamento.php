<!-- listar_usuarios.php -->
<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'test';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $orcamentoId = $_GET['id'];

    // Atualizar o status e o usuário de liberação
    $updateSql = "UPDATE tabela_orcamentos SET status = 'Liberado', usuario_liberacao = 'Nome do Usuário Financeiro' WHERE ID = ?";
    $updateStmt = $conn->prepare($updateSql);

    if ($updateStmt) {
        $updateStmt->bind_param("i", $orcamentoId);

        if ($updateStmt->execute()) {
            echo "Orçamento liberado com sucesso!";
        } else {
            echo "Erro ao liberar orçamento: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        echo "Erro na preparação da declaração de atualização: " . $conn->error;
    }
}

// Fechando a conexão
$conn->close();
?>