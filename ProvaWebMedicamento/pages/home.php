<?php
    session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>
<body>
<?php 
    include('../component/cabecalho.php')
?>
<?php
    require_once('../includes/db.php');
    $sql_select = "SELECT * FROM medicamento";

    $result = mysqli_query($con, $sql_select);
        
    ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Registro MS</th>
                <th>Quantidade na embalagem</th>
                <?php
                if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
                ?>
                <th></th>
                <th></th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
    <?php
    while (($registro = mysqli_fetch_assoc($result)) != null) {
        ?>
            <tr>
                <td><?php echo $registro['MedicamentoNome'] ?></td>
                <td><?php echo $registro['RegistroMS'] ?></td>
                <td><?php echo $registro['QuantidadePerEmbalagem']." ".$registro['UnidadeMedida'] ?></td>
                <?php
                if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
                ?>
                <td><a href="operacoes-medicamento.php?mode=UPD&idmedicamento=<?php echo $registro['IdMedicamento'] ?>">Editar</a></td>
                <td>
                    <a href="../includes/deletar-medicamento.php?idmedicamento=<?php echo $registro['IdMedicamento'] ?>"
                    onclick="return confirm('Tem certeza de que deseja excluir este medicamento?')"
                    class="btn-delete">Deletar</a>
                </td>
                <?php 
                }
                ?>
            </tr>
        <?php
    }
    ?>   
        </tbody>
    </table>
    <?php 
        if (mysqli_num_rows($result) <= 0) {
    ?>
    <p>Nenhum medicamento cadastrado</p>
    <?php
    }
?>
    <div class="alinha-centro botoes-controle">
            <?php
                if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
            ?>
                <a href="operacoes-medicamento.php?mode=INS">Cadastrar Medicamento</a>
            <?php 
                }
            ?>
    </div>
</body>
</html>