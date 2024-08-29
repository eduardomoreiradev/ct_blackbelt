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
    <title>Adicionar Novo Aluno</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mobile.css">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Adicionar Novo Aluno</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $genero = $_POST['genero'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_matricula = $_POST['data_matricula'];
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO alunos (nome, idade, genero, telefone, email, data_matricula, categoria) VALUES ('$nome', '$idade', '$genero', '$telefone', '$email', '$data_matricula', '$categoria')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Aluno adicionado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post" action="create.php" class="mt-4">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select class="form-select" id="genero" name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <option value="Adulto">Adulto</option>
                <option value="Criança">Criança</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="data_matricula" class="form-label">Data de Matrícula</label>
            <input type="date" class="form-control" id="data_matricula" name="data_matricula" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
        </div>
        <br>
        <div class="d-grid">
            <a href="index.php" class="btn btn-secondary btn-block">Voltar</a>
        </div>
    </form>
</div>

<!-- Adicionando o JavaScript do Bootstrap e dependências -->
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
