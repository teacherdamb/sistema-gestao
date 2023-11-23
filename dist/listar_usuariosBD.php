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

// Consulta SQL para obter todos os usuários
$sql = "SELECT * FROM tabela_usuarios";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    echo '<table class="table border mb-0" border="1">
            <tr class="align-middle">
                <th>Nome</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Data de Criação</th>
                <th class="text-center">Cidade</th>
            </tr>';

    // Loop através dos resultados e exibição na tabela
    while ($row = $result->fetch_assoc()) {
        echo '<tr class="align-middle">
                <td>' . (isset($row['name']) ? $row['name'] : '') . '</td>
                <td class="text-center">' . (isset($row['email']) ? $row['email'] : '') . '</td>
                <td class="text-center">' . (isset($row['created']) ? $row['created'] : '') . '</td>
                <td class="text-center">' . (isset($row['city']) ? $row['city'] : '') . '</td>
                <td class="text-center">' .(isset($row['escopo']) ? $row['escopo'] : '') . '</td>
              </tr>';
    }

    echo '</table>';

    $result->free(); // Libera os resultados
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
