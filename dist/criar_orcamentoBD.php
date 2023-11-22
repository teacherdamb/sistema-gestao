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
$largura = isset($_POST['largura']) ? $_POST['largura'] : '';
$altura = isset($_POST['altura']) ? $_POST['altura'] : '';
$comprimento = isset($_POST['comprimento']) ? $_POST['comprimento'] : '';
$material = isset($_POST['material']) ? $_POST['material'] : '';
$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';

// Validando os dados do formulário
if (empty($nome) || empty($cnpj) || empty($email) || empty($largura) || empty($altura) || empty($comprimento) || empty($material) || empty($layout) || empty($valor)) {
    echo "Por favor, preencha todos os campos do formulário.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, forneça um e-mail válido.";
} else {
    // Consulta SQL para verificar se o e-mail já está cadastrado
    $checkEmailSql = "SELECT * FROM tabela_orcamentos WHERE email = ?";
    $checkEmailStmt = $conn->prepare($checkEmailSql);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();
    
    if ($checkEmailResult->num_rows > 0) {
        echo "E-mail já cadastrado.";
    } else {
        // Se o e-mail não está cadastrado, prosseguir com a inserção
        $criacao = date('Y-m-d H:i:s'); // Formato: YYYY-MM-DD HH:MM:SS
        $insertSql = "INSERT INTO tabela_orcamentos (id, nome, cnpj, criacao, email, largura, altura, comprimento, material, layout, valor) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $insertStmt = $conn->prepare($insertSql);
        
        if ($insertStmt) {
            $insertStmt->bind_param("ssssssssss", $nome, $cnpj, $criacao, $email, $largura, $altura, $comprimento, $material, $layout, $valor);
        
            if ($insertStmt->execute()) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir dados: " . $insertStmt->error;
            }
        
            $insertStmt->close();
        } else {
            echo "Erro na preparação da declaração de inserçãoo: " . $conn->error;
        }
    }

    $checkEmailStmt->close();
}

// Fechando a conexão
$conn->close();
?>
