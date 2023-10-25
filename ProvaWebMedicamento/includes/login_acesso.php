<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/ProvaWebMedicamento/includes/db.php');
	$_SESSION['logado'] = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])  && isset($_POST['password'])) {
        
        $UsuarioLogin = $_POST['username'];
        $UsuarioSenha = md5($_POST['password']); 

        $sql_login = "
		SELECT * FROM usuario WHERE UsuarioLogin='$UsuarioLogin'";
		echo "<p>".$UsuarioLogin." - ".$UsuarioSenha."</p>";
		$result = mysqli_query($con, $sql_login);
		
		if (mysqli_num_rows($result) > 0) {
			$usuario = mysqli_fetch_assoc($result);
			
			if ($usuario['UsuarioSenha'] == $UsuarioSenha) {
				$_SESSION['logado'] = true;
				unset($usuario['password']);
				$_SESSION['usuario'] = serialize($usuario);
                header('Location: ../pages/home.php');
			}
			else {
				header('Location: ../pages/login.php?error=2');
			}
		}
		else {
			header('Location: ../pages/login.php?error=1');
		}
    }
?>
