<!DOCTYPE html>
<html>
<head>
    <title>MedMais - Medicamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
        }
        h1 {
            margin: 0;
        }
        a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #0056b3;
            border-radius: 5px;
        }
        a:hover {
            background-color: #003a75;
        }
    </style>
</head>
<body>
    <header>
        <h1>MedMais - Medicamentos</h1>
        <a href="../pages/home.php">Home</a>
        <?php
            if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
        ?>
                <a href="../pages/operacoes-medicamento.php?mode=INS">Cadastrar Medicamento</a>
                <a style="background-color: #e76b00;" href="../includes/logoff_acesso.php" onclick="return confirm('Tem certeza de que deseja sair do sistema?')">Sair</a>

        <?php
            } else {
            ?>
                <a style="background-color: #13b300;" href="../pages/login.php">Fazer login</a>
            <?php    
            }
        ?>
    </header>
</body>
</html>