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
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width: 50%;">Nome</th>
                    <th style="width: 10%; text-align: center;">Registro MS</th>
                    <th style="width: 12%; text-align: center;">Quantidade na embalagem</th>
                    <th style="width: 10%; text-align: center;">Unidade de medida</th>
                    <?php
                    if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
                    ?>
                    <th style="width: 5%; text-align: center;"></th>
                    <th style="width: 5%;"></th>
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
                    <td style="text-align: center;"><?php echo $registro['RegistroMS'] ?></td>
                    <td style="text-align: center;"><?php echo $registro['QuantidadePerEmbalagem']." de ".$registro['Concentracao'] ?></td>
                    <td style="text-align: center;"><?php echo $registro['UnidadeMedida'] ?></td>
                    <?php
                    if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
                    ?>
                    <td style="width: 5%; text-align: center;"><a href="operacoes-medicamento.php?mode=UPD&idmedicamento=<?php echo $registro['IdMedicamento'] ?>">Editar</a></td>
                    <td style="width: 5%; text-align: center;">
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
                    } else {
                    ?>
                        <a style="background-color: #13b300;" href="../pages/login.php">Fazer login</a>
                    <?php    
                    }
                ?>
        </div>
    </div>
</body>
</html>