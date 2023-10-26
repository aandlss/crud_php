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
            
            $idMedicamento = $_GET['idmedicamento'];
            $medicamentoNome = $_POST['MedicamentoNome'];
            $registroMS = $_POST['RegistroMS'];
            $medicamentoDescricao = $_POST['MedicamentoDescricao'];
            $idTipoMedicamento = $_POST['IdTipoMedicamento'];
            $fabricante = $_POST['Fabricante'];
            $quantidadePerEmbalagem = $_POST['QuantidadePerEmbalagem'];
            $unidadeMedida = $_POST['UnidadeMedida'];
            $concentracao = $_POST['Concentracao'];
            $bula = $_POST['Bula'];
        
            $query = "UPDATE medicamento SET MedicamentoNome = ?, RegistroMS = ?, MedicamentoDescricao = ?, IdTipoMedicamento = ?, Fabricante = ?, QuantidadePerEmbalagem = ?, UnidadeMedida = ?, Concentracao = ?, Bula = ? WHERE IdMedicamento = ?";        
            $stmt = mysqli_prepare($con, $query);
            
            mysqli_stmt_bind_param($stmt, "sssisssssi", $medicamentoNome, $registroMS, $medicamentoDescricao, $idTipoMedicamento, $fabricante, $quantidadePerEmbalagem, $unidadeMedida, $concentracao, $bula, $idMedicamento);
        
            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../includes/success.php?from=2&success=1');
                exit;
            } else {
                echo "<h2>Erro ao alterar medicamento: " . mysqli_error($con);
            } 
            mysqli_stmt_close($stmt);
        } else {
            header('Location: ../pages/operacoes-medicamento.php');
        }
    } else {
        echo "<h2>Usuário deslogado. Favor fazer login<h2>";
    }
?>
</body>
</html>