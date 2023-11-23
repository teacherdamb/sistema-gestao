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
$nome = $_POST['nome'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha
$city = $_POST['city'];
$escopo = $_POST['escopo']; // Adicionando a captura do escopo

// Verificar se o e-mail já está cadastrado
$checkEmailSql = "SELECT * FROM tabela_usuarios WHERE email = ?";
$checkEmailStmt = $conn->prepare($checkEmailSql);

if ($checkEmailStmt) {
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();

    if ($checkEmailResult->num_rows > 0) {
        // O e-mail já está cadastrado
        echo "Erro: E-mail já cadastrado.";
        $checkEmailStmt->close();
        $conn->close();
        exit;
    }

    $checkEmailStmt->close();
} else {
    echo "Erro na preparação da declaração: " . $conn->error;
}

// Se o e-mail não está cadastrado, prosseguir com a inserção
$criacao = date('Y-m-d H:i:s'); // Formato: YYYY-MM-DD HH:MM:SS
$sql = "INSERT INTO tabela_usuarios (id, name, email, created, password, city, escopo) VALUES (NULL, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Verificando se a preparação foi bem-sucedida
if ($stmt) {
    $stmt->bind_param("ssssss", $nome, $email, $criacao, $password, $city, $escopo);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro na preparação da declaração: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
