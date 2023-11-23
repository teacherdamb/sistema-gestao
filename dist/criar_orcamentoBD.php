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

// Definindo o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');

// Recebendo dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$consultor = isset($_POST['consultor']) ? trim($_POST['consultor']) : '';
$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
$largura = isset($_POST['largura']) ? $_POST['largura'] : '';
$altura = isset($_POST['altura']) ? $_POST['altura'] : '';
$comprimento = isset($_POST['comprimento']) ? $_POST['comprimento'] : '';
$material = isset($_POST['material']) ? $_POST['material'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';

// Validando os dados do formulário
if (empty($nome) || empty($cnpj) || empty($largura) || empty($altura) || empty($comprimento) || empty($material) || empty($layout) || empty($valor)) {
    echo "Por favor, preencha todos os campos do formulário.";
} else {
    // Prosseguir com a inserção
    $criacao = date('Y-m-d H:i:s'); // Formato: YYYY-MM-DD HH:MM:SS
    $status = 'Pendente';  // Status padrão
    $usuario_liberacao = NULL;  // Nenhum usuário do Financeiro liberou ainda

    $insertSql = "INSERT INTO tabela_orcamentos (id, nome, cnpj, criacao, email, endereco, bairro, cep, consultor, layout, largura, altura, comprimento, material, valor, status, usuario_liberacao) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $insertStmt = $conn->prepare($insertSql);
    
    if ($insertStmt) {
        $insertStmt->bind_param("ssssssssssssssss", $nome, $cnpj, $criacao, $email, $endereco, $bairro, $cep, $consultor, $layout, $largura, $altura, $comprimento, $material, $valor, $status, $usuario_liberacao);
    
        if ($insertStmt->execute()) {
            echo "Orçamento cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar orçamento: " . $insertStmt->error;
        }
    
        $insertStmt->close();
    } else {
        echo "Erro na preparação da declaração de inserção: " . $conn->error;
    }
}

// Fechando a conexão
$conn->close();