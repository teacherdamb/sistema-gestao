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
$sql = "SELECT COUNT(*) as totalUsers FROM tabletest";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    $row = $result->fetch_assoc();
    $totalUsers = isset($row['totalUsers']) ? $row['totalUsers'] : 0;

    // Exibir o número de usuários no card
    echo '<div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">' . $totalUsers . '<span class="fs-6 fw-normal"><svg class="icon"></span></div>
                    <div>Usuários Cadastrados</div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg class="icon">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-options"></use>
                      </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                  </div>
                </div>';

    $result->free(); // Libera os resultados
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
