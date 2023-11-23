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
$sql = "SELECT * FROM tabela_orcamentos";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    echo '<table class="table table-hover mb-0" border="1">
            <tr class="align-middle">
                <th class="text-center">ID</th>
                <th class="text-center">Data de Criação</th>
                <th class="text-center">Nome / Razão Social</th>
                <th class="text-center">CPF / CNPJ</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Largura</th>
                <th class="text-center">Altura</th>
                <th class="text-center">Comprimento</th>
                <th class="text-center">Material</th>
                <th class="text-center">Layout</th>
                <th class="text-center">Valor Total</th>
                <th class="text-center">Status</th> <!-- Adicionando a coluna de status -->
                <th class="text-center">Ações</th> <!-- Adicionando a coluna de ações -->
            </tr>';

    // Loop através dos resultados e exibição na tabela
    while ($row = $result->fetch_assoc()) {
        echo '<tr class="align-middle">
                <td class="text-center">' . (isset($row['ID']) ? $row['ID'] : '') . '</td>
                <td class="text-center">' . (isset($row['criacao']) ? date('Y-m-d', strtotime($row['criacao'])) : '') . '</td>
                <td class="text-center">' . (isset($row['nome']) ? $row['nome'] : '') . '</td>
                <td class="text-center">' . (isset($row['cnpj']) ? $row['cnpj'] : '') . '</td>
                <td class="text-center">' . (isset($row['email']) ? $row['email'] : '') . '</td>
                <td class="text-center">' . (isset($row['largura']) ? $row['largura'] : '') . '</td>
                <td class="text-center">' . (isset($row['altura']) ? $row['altura'] : '') . '</td>
                <td class="text-center">' . (isset($row['comprimento']) ? $row['comprimento'] : '') . '</td>
                <td class="text-center">' . (isset($row['material']) ? $row['material'] : '') . '</td>
                <td class="text-center">' . (isset($row['layout']) ? $row['layout'] : '') . '</td>
                <td class="text-center">' . (isset($row['valor']) ? $row['valor'] : '') . '</td>
                <td class="text-center">' . (isset($row['status']) ? $row['status'] : '') . '</td>
                <td class="text-center">
                    <a href="liberar_orcamento.php?id=' . $row['ID'] . '">Liberar</a>
                </td>
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