<!DOCTYPE html>
<html>
<head>
    <title>Resultado do Cadastro de Medicamento</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php
    session_start();
    include('../component/cabecalho.php');
    if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once($_SERVER['DOCUMENT_ROOT'] . '/ProvaWebMedicamento/includes/db.php');
        
            $medicamentoNome = $_POST['MedicamentoNome'];
            $registroMS = $_POST['RegistroMS'];
            $medicamentoDescricao = $_POST['MedicamentoDescricao'];
            $idTipoMedicamento = $_POST['IdTipoMedicamento'];
            $fabricante = $_POST['Fabricante'];
            $quantidadePerEmbalagem = $_POST['QuantidadePerEmbalagem'];
            $unidadeMedida = $_POST['UnidadeMedida'];
            $concentracao = $_POST['Concentracao'];
            $bula = $_POST['Bula'];
        
            $query = "INSERT INTO medicamento (MedicamentoNome, RegistroMS, MedicamentoDescricao, IdTipoMedicamento, Fabricante, QuantidadePerEmbalagem, UnidadeMedida, Concentracao, Bula) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = mysqli_prepare($con, $query);
            
            mysqli_stmt_bind_param($stmt, "sssisssss", $medicamentoNome, $registroMS, $medicamentoDescricao, $idTipoMedicamento, $fabricante, $quantidadePerEmbalagem, $unidadeMedida, $concentracao, $bula);
        
            if (mysqli_stmt_execute($stmt)) { ?> 
                <div class="btn-container">
                    <h2>Medicamento inserido com sucesso!</h2>
                    <a href="../pages/home.php" class="btn btn-primary">Voltar ao Menu Principal</a>
                    <a href="../pages/operacoes-medicamento.php?mode=INS" class="btn btn-secondary">Cadastrar Novo Medicamento</a>
                </div>
            <?php } else {
                echo "<h2>Erro ao inserir medicamento: " . mysqli_error($con) . "</h2>";
            }
            mysqli_stmt_close($stmt);
        } else {
            header('Location: ../pages/operacoes-medicamento.php');
        }
    } else {
        echo "<h2>Usuário deslogado. Favor fazer login</h2>";
    }
    ?>
</body>
</html>