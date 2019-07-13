 <!doctype html>
<html>
	<head>	</head>
	<body>

		<form action="" name="logAdmin" method="post">
			CPF: <input type="text" name="CPF"/><br><br>
			Senha: <input type="password" name="senha"/><br><br>
			<input type="submit"/>
		</form>
		
	</body>
</html>

<?php
	session_start();
	include_once '../class/ClassConexaoAdmin.php';
	
	if(isset($_POST['CPF'])){
		/*
		echo $_POST['senha'];
		echo '<BR>';
		echo md5($_POST['senha']);
		*/
		$resultado = LogAdmin($_POST['CPF'],$_POST['senha']);
		
		//$resultado = LogAdmin($_POST['CPF'],$MD5 = md5($_POST['senha']);
		var_dump($resultado);
		if($resultado > 1) {
			$_SESSION['loginADM'] = true;
			header("location:cadAdmin.php");
		} else {
			echo "Credenciais inválidas";
			header("location:login.php");
		}
		
	}
	else
		echo "Não logado";	
?>
