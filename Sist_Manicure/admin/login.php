<?php
	ob_start();
	session_start();

	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	/*//PARA ELIMINAR OS ERROS REPORTADOS 
	error_reporting(0);
	ini_set(“display_errors”, 0 );*/

?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	

		<form action="" name="logAdmin" id='logAdmin' method="post" style="font-weight: bold; text-align:center;">
			<p>IDENTIFICAÇÃO DE USUÁRIO</P>
			CPF: <input type="text" name="CPF"/><br><br>
			Senha: <input type="password" name="senha"/><br><br>
			<input type="submit"/>
		</form>
		

<?php

	include_once '../class/ClassConexaoAdmin.php';
	
	if(isset($_POST['CPF'])){
		
		$resultado = LogAdmin($_POST['CPF'], $_POST['senha']);
		
		//$resultado = LogAdmin($_POST['CPF'], $_POST['$senha = $MD5']);
		
		
		if($resultado) {
			$_SESSION['loginADM'] = true;
			header('Location:cadAdmin.php');
		} else {
			//header("location:login.php");
			echo "Credenciais inválidas";
		}
		
	}
	
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
