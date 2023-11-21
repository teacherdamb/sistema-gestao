<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'test';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $email = $_POST['email']; // Assumindo que seu campo de email é chamado "email"
    $password = $_POST['password']; // Assumindo que seu campo de senha é chamado "password"

    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM tabela_usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password']; // Assumindo que seu campo de senha é chamado "password" no banco de dados

        // Verifica se a senha fornecida corresponde à senha armazenada
        if (password_verify($password, $hashedPassword)) {
            // Autenticação bem-sucedida
            $_SESSION['user_id'] = $row['id']; // Salva o ID do usuário na sessão (você pode armazenar outras informações se necessário)
            header("Location: index.php"); // Redireciona para a página do dashboard após o login
            exit();
        } else {
            echo "Senha incorreta";
        }
    } else {
        echo "Usuário não encontrado";
    }

    $conn->close(); // Fecha a conexão com o banco de dados
}
?>
