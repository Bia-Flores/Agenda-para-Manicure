<?php
	session_start();
	
	
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
<?php

	include_once '../class/ClassConexaoServ.php';
	
	$id = $_GET['idserv'];
	
	if(isset($_GET['idserv'])){
		
		$resultado = ApagarServ($id);
		if ($resultado == True){
			echo "Cadastro Excluído";
		}
	}
	
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

