<?php

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

                // Posiciona a logo no canto superior direito
                $logoPath = __DIR__ . '/assets/img/Logo Imperio.png';
                $pdf->Image($logoPath, $pdf->getPageWidth() - 40, 10, 30, 30);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(0, 10, 'Nome / Razão Social: ' . $row['nome'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'CNPJ: ' . $row['cnpj'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1, 'L');

                // Adiciona linha divisória acima de "Detalhes do Orçamento"
                $pdf->SetLineWidth(0.5);
                $pdf->Line(10, $pdf->GetY(), $pdf->getPageWidth() - 10, $pdf->GetY());
                
                $pdf->Cell(0, 10, 'Detalhes do Orçamento', 0, 1, 'C');


                $pdf->SetFont('times', '', 10);
                $pdf->Cell(0, 10, 'ID do Orçamento: ' . $row['ID'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Largura: ' . $row['largura'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Altura: ' . $row['altura'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Comprimento: ' . $row['comprimento'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Material: ' . $row['material'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Layout: ' . $row['layout'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Valor: ' . $row['valor'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Endereço: ' . $row['endereco'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Bairro: ' . $row['bairro'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'CEP: ' . $row['cep'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Consultor: ' . $row['consultor'], 0, 1, 'L');
                $pdf->Cell(0, 10, 'Status: ' . $row['status'], 0, 1, 'L');
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
