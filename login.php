<?php
session_start();

// Inclui o arquivo de configuração do banco de dados
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    // Consultar o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário encontrado, iniciar sessão
        $_SESSION['username'] = $user;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Nome de usuário ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-box p-4 border rounded shadow">
        <h2 class="text-center mb-4">Administração</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group mb-3">
                <label for="username">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

<!-- Adicionando o JavaScript do Bootstrap e dependências -->
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
