<?php



	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
<?php

	include_once '../class/ClassConexaoCliente.php';
	
	$id = $_GET['idclie'];
	
	if(isset($_GET['idclie'])){
		
		$resultado = ApagarCliente($id);
		if ($resultado == True){
			echo "Cadastro Excluído";
		}
	}
	
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

