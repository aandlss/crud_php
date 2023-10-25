<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Medicamento - MedMais</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php 
        session_start();
        if (isset($_SESSION['usuario']) && $_SESSION['logado'] == true) {
        include("../component/cabecalho.php");
        $mode = isset($_GET['mode']) ? strtoupper($_GET['mode']) : '';
        if ($mode == "INS" || $mode == "UPD" || $mode == "DLT") {
            $titulo = $mode == "INS" ? "Cadastro de Medicamento" : ($mode == "UPD" ? "Edição de Medicamento" : "Exclusão de Medicamento");
            $url_post = "../includes/cadastrar-medicamento.php";
            echo "<h2>$titulo</h2>";

            if ($mode != "INS") {
                require_once($_SERVER['DOCUMENT_ROOT'] . '/ProvaWebMedicamento/includes/db.php');

                $idmedicamento = $_GET['idmedicamento'];
                $url_post = $mode == "UPD" ? "../includes/editar-medicamento.php?idmedicamento=".$idmedicamento : "../includes/deletar-medicamento.php?idmedicamento=".$idmedicamento;
                $query = "SELECT * FROM medicamento WHERE IdMedicamento = $idmedicamento";
                $resultado = mysqli_query($con, $query);

                if ($registro = mysqli_fetch_assoc($resultado)) {
                    $medicamentoNome = $registro['MedicamentoNome'];
                    $registroMS = $registro['RegistroMS'];
                    $medicamentoDescricao = $registro['MedicamentoDescricao'];
                    $idTipoMedicamento = $registro['IdTipoMedicamento'];
                    $fabricante = $registro['Fabricante'];
                    $quantidadePerEmbalagem = $registro['QuantidadePerEmbalagem'];
                    $unidadeMedida = $registro['UnidadeMedida'];
                    $concentracao = $registro['Concentracao'];
                    $bula = $registro['Bula'];
                }
            }
        } else {

            header('Location: ../pages/home.php');
        }
    ?>
    <form action="<?php echo $url_post?>" method="post">
        <label for="MedicamentoNome">Nome do Medicamento:</label>
        <input type="text" name="MedicamentoNome" value="<?php echo isset($medicamentoNome) ? $medicamentoNome : ''; ?>" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?> required>

        <label for="RegistroMS">Registro MS:</label>
        <input type="text" name="RegistroMS" maxLength="13" value="<?php echo isset($registroMS) ? $registroMS : ''; ?>" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?> required>

        <label for="MedicamentoDescricao">Descrição do Medicamento:</label>
        <textarea name="MedicamentoDescricao" rows="4" cols="50" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>><?php echo isset($medicamentoDescricao) ? $medicamentoDescricao : ''; ?></textarea>

        <label for="IdTipoMedicamento">ID do Tipo de Medicamento:</label>
        <select name="IdTipoMedicamento" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?> required>
            <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/ProvaWebMedicamento/includes/db.php');
            
            $sql_tipo_medicamento = "SELECT * FROM TipoMedicamento;";
            $result_tipo_medicamento = mysqli_query($con, $sql_tipo_medicamento);
            
            $opcoes = "";
            
            while ($tipo_medicamento = mysqli_fetch_assoc($result_tipo_medicamento)) {
                $tipoMedicamentoId = $tipo_medicamento['IdTipoMedicamento'];
                $tipoMedicamentoNome = $tipo_medicamento['tipoMedicamentoNome'];
                
                $selected = ($tipoMedicamentoId == $idTipoMedicamento) ? 'selected' : '';
                $opcoes .= "<option value=\"$tipoMedicamentoId\" $selected>$tipoMedicamentoNome</option>";
            }
            echo $opcoes;
            ?>
        </select>

        <label for="Fabricante">Fabricante:</label>
        <input type="text" name="Fabricante" value="<?php echo isset($fabricante) ? $fabricante : ''; ?>" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>>

        <label for="QuantidadePerEmbalagem">Quantidade por Embalagem:</label>
        <input type="number" name="QuantidadePerEmbalagem" value="<?php echo isset($quantidadePerEmbalagem) ? $quantidadePerEmbalagem : ''; ?>" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>>

        <label>Unidade de Medida:</label>
        <div>
            <label>
                <input type="radio" name="UnidadeMedida" value="ml" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>
                <?php echo (isset($unidadeMedida) && $unidadeMedida === 'ml') ? 'checked' : ''; ?>> Mililitro
            </label>
            <label>
                <input type="radio" name="UnidadeMedida" value="g" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>
                <?php echo (isset($unidadeMedida) && $unidadeMedida === 'g') ? 'checked' : ''; ?>> Grama
            </label>
            <label>
                <input type="radio" name="UnidadeMedida" value="mg" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>
                <?php echo (isset($unidadeMedida) && $unidadeMedida === 'mg') ? 'checked' : ''; ?>> Miligrama
            </label>
            <label>
                <input type="radio" name="UnidadeMedida" value="got" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>
                <?php echo (isset($unidadeMedida) && $unidadeMedida === 'got') ? 'checked' : ''; ?>> Gotas
            </label>
            <label>
                <input type="radio" name="UnidadeMedida" value="mgo" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>
                <?php echo (isset($unidadeMedida) && $unidadeMedida === 'mgo') ? 'checked' : ''; ?>> Microgotas
            </label>
        </div>


        <label for="Concentracao">Concentração:</label>
        <input type="text" name="Concentracao" value="<?php echo isset($concentracao) ? $concentracao : ''; ?>" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>>

        <label for="Bula">Bula:</label>
        <textarea name="Bula" rows="8" cols="50" <?php echo ($mode == 'DLT') ? 'disabled' : ''; ?>><?php echo isset($bula) ? $bula : ''; ?></textarea>

        <input <?php echo ($mode == 'DLT') ? 'class="btn-delete"' : ''; ?> type="submit" value="<?php echo ($mode == 'DLT') ? 'Excluir' : 'Enviar'; ?>" <?php echo ($mode == 'DLT') ? 'onclick="return confirm(\'Tem certeza de que deseja excluir este medicamento?\')"' : ''; ?>>
    </form>
    <?php
        } else {
            header('Location: ../pages/home.php');
        }
    ?>
</body>
</html>