<?php
require_once('includes/db.php'); // Inclua o arquivo de configuração do banco de dados

require_once('tcpdf/tcpdf.php'); // Inclua a biblioteca TCPDF

// Inicialize o objeto TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configurações do documento PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CT Back Belt');
$pdf->SetTitle('Relatório de Alunos');
$pdf->SetSubject('Relatório de Alunos');
$pdf->SetKeywords('TCPDF, PDF, exemplo, relatório, alunos');

// Configurações de cabeçalho e rodapé
$pdf->setHeaderData('', 0, 'Relatório de Alunos', '');

// Configurações de fonte
$pdf->setFontSubsetting(true);

// Adicione uma página
$pdf->AddPage();

// Consulta ao banco de dados para obter os dados dos alunos
$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);

// Tabela de conteúdo
$html = '<table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Gênero</th>
                <th>Categoria</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data de Matrícula</th>
            </tr>';

// Loop para adicionar linhas de dados da tabela
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                 <td>' . $row['id'] . '</td>
                 <td>' . $row['nome'] . '</td>
                 <td>' . $row['idade'] . '</td>
                 <td>' . $row['genero'] . '</td>
                 <td>' . $row['categoria'] . '</td>
                 <td>' . $row['telefone'] . '</td>
                 <td>' . $row['email'] . '</td>
                 <td>' . $row['data_matricula'] . '</td>
             </tr>';
}

$html .= '</table>';

// Escreva o conteúdo HTML no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF para o navegador
$pdf->Output('relatorio_alunos.pdf', 'D');

// Feche a conexão com o banco de dados
$conn->close();
?>
