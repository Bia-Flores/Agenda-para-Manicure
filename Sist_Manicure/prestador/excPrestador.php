<?php



	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
<?php

	include_once '../class/ClassConexaoPrest.php';
	
	$id = $_GET['idprest'];
	
	if(isset($_GET['idprest'])){
		
		$resultado = ApagarPrest($id);
		if ($resultado == True){
			echo "Cadastro Excluído";
		}
	}
	
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

