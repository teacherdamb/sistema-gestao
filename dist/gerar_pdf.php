<?php

use Com\Tecnick\Pdf\Tcpdf;
use TCPDF as GlobalTCPDF;

require_once(__DIR__ . '/TCPDF/tcpdf.php');

try {
    // Verifica se o ID do orçamento foi passado via GET
    if (isset($_GET['id'])) {
        $orcamentoId = $_GET['id'];

        // Consulte o banco de dados para obter os detalhes do orçamento com base no ID
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'test';

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para obter detalhes do orçamento
        $sql = "SELECT * FROM tabela_orcamentos WHERE ID = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $orcamentoId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Criação de um novo documento PDF
                $pdf = new GlobalTCPDF();
                $pdf->SetMargins(10, 10, 10);
                $pdf->AddPage();

                // Adiciona conteúdo ao PDF
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(0, 10, 'Detalhes do Orçamento', 0, 1, 'C');

                $pdf->SetFont('times', '', 10);
                $pdf->Cell(0, 10, 'ID do Orçamento: ' . $row['ID'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Nome / Razão Social: ' . $row['nome'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'CNPJ: ' . $row['cnpj'], 0, 1, 'L');
                // ... Adicione outras informações conforme necessário

                // Saída do PDF
                $pdf->Output('orcamento_' . $orcamentoId . '.pdf', 'D');
            } else {
                echo "Nenhum orçamento encontrado com o ID fornecido.";
            }

            $stmt->close();
        } else {
            throw new Exception("Erro na preparação da declaração: " . $conn->error);
        }

        $conn->close();
    } else {
        echo "ID do orçamento não fornecido.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
