<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} ?>

<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mobile.css"> <!-- Inclua o seu CSS para estilos específicos de dispositivos móveis -->
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Lista de Alunos</h2>

    <?php
    $sql = "SELECT * FROM alunos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>ID</th><th>Nome</th><th>Idade</th><th>Gênero</th><th>Categoria</th><th>Telefone</th><th>Email</th><th>Data de Matrícula</th><th>Ações</th></tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['idade'] . '</td>';
            echo '<td>' . $row['genero'] . '</td>';
            echo '<td>' . $row['categoria'] . '</td>';
            echo '<td>' . $row['telefone'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['data_matricula'] . '</td>';
            echo '<td>';
            echo '<a href="update.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Editar</a> ';
            echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Excluir</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        echo '</div>'; // Fim da div table-responsive
    } else {
        echo '<div class="alert alert-info" role="alert">Nenhum aluno cadastrado.</div>';
    }
    ?>

    <div class="d-grid gap-2 mt-4">
        <a href="create.php" class="btn btn-primary">Adicionar Novo Aluno</a>
        <a href="logout.php" class="btn btn-secondary">Sair</a>
        <a href="gerar_pdf.php" class="btn btn-success">Gerar PDF</a>
    </div>
</div>

<!-- Adicionando o JavaScript do Bootstrap e dependências -->
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
