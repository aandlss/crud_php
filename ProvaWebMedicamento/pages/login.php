<!DOCTYPE html>
<html>
<head>
    <title>Login - MedMais</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php 
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error == 2){
                    echo "<p>Senha incorreta</p>";
                } else {
                    echo "<p>Usuário não encontrado</p>";
                }
            }   
        ?>
        <form action="../includes/login_acesso.php" method="POST">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
