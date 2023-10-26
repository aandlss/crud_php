<?php
    session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>
<body>
<?php 
include('../component/cabecalho.php');
?>
<div class="btn-container">
<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $from = $_GET['from'];
    if ($from == 1 || $from == 2 || $from == 3){
        $mensagem = $from == 1 ? '<h2>Medicamento inserido com sucesso</h2>' : ($from == 2 ? '<h2>Medicamento alterado com sucesso</h2>' : '<h2>Medicamento excluído com sucesso</h2>');
        echo $mensagem;
    } else {
        header('Location: ../pages/home.php');
    }
    
} else {
    echo '<h2>Erro no processamento!</h2>';
}
?>
<a href="../pages/home.php" class="btn btn-primary">Voltar ao Menu Principal</a>
<?php 
    if ($from == 1){
        echo '<a href="../pages/operacoes-medicamento.php?mode=INS" class="btn btn-secondary">Cadastrar Novo Medicamento</a>';
    }
?>
</div>
