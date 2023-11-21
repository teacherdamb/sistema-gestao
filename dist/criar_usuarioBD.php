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

// Obtendo a data e hora atual
$criacao = date('Y-m-d H:i:s'); // Formato: YYYY-MM-DD HH:MM:SS

// Utilizando prepared statement para evitar SQL Injection
$sql = "INSERT INTO tabletest (name, email, created, password, city) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Verificando se a preparação foi bem-sucedida
if ($stmt) {
    $stmt->bind_param("sssss", $nome, $email, $criacao, $password, $city);

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
