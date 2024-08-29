<?php include 'includes/db.php'; ?>

<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} ?>

<!-- Adicionando o CSS do Bootstrap -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Aluno</h2>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM alunos WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $genero = $_POST['genero'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_matricula = $_POST['data_matricula'];
        $categoria = $_POST['categoria'];

        $sql = "UPDATE alunos SET nome='$nome', idade='$idade', genero='$genero', telefone='$telefone', email='$email', data_matricula='$data_matricula', categoria='$categoria' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Dados do aluno atualizados com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro: ' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $row['idade']; ?>" required>
        </div>
        <div class="form-group">
            <label for="genero">Gênero</label>
            <select class="form-control" id="genero" name="genero" required>
                <option value="Masculino" <?php if ($row['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Feminino" <?php if ($row['genero'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="Adulto" <?php if ($row['categoria'] == 'Adulto') echo 'selected'; ?>>Adulto</option>
                <option value="Criança" <?php if ($row['categoria'] == 'Criança') echo 'selected'; ?>>Criança</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
            <label for="data_matricula">Data de Matrícula</label>
            <input type="date" class="form-control" id="data_matricula" name="data_matricula" value="<?php echo $row['data_matricula']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<!-- Adicionando o JavaScript do Bootstrap e dependências -->
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
