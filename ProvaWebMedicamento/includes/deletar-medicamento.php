<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Exclusão de Medicamento</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php
session_start();
include('../component/cabecalho.php');
if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
    
        require_once($_SERVER['DOCUMENT_ROOT'] . '/ProvaWebMedicamento/includes/db.php');
        
        $idMedicamento = $_GET['idmedicamento'];
        $query = "DELETE FROM medicamento WHERE IdMedicamento = ?";
        $stmt = mysqli_prepare($con, $query);
        
        mysqli_stmt_bind_param($stmt, "i", $idMedicamento);
    
        if (mysqli_stmt_execute($stmt)) {
        ?>
            <div class="btn-container">
                <h2>Medicamento excluído com sucesso!</h2>
                <a href="../pages/home.php" class="btn btn-primary">Voltar ao Menu Principal</a>
            </div>
        <?php
        } else {
            echo "Erro ao excluir medicamento: " . mysqli_error($con);
        }
    
        mysqli_stmt_close($stmt);
} else {
    echo "<p>Usuário deslogado. Favor fazer login</p>";
}
?>
</body>
</html>