<?php include 'includes/db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Aluno excluído com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro: ' . $conn->error . '</div>';
    }
}
header('Location: index.php');
?>
