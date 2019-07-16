<?php
	session_start();
	include_once "login_Ok.php";
	
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
<?php

	include_once '../class/ClassConexaoAdmin.php';
	
	$id = $_GET['idadmim'];
	
	if(isset($_GET['idadmim'])){
		
		$resultado = ApagarAdmin($id);
		if ($resultado == True){
			echo "Cadastro Excluído";
		}
	}
	
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

