<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	error_reporting(0);
	ini_set(“display_errors”, 0 );


?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	

	<form action = "" name = "cadServico" method ="POST">
		<legend><b>CADASTRO DE SERVIÇO</b></legend><br>
		Descrição: <input type="text" name = "descricao" id = "descricao" required><br><br>
		<input type="submit" Value="Cadastrar">
	</form>	

	
	<?php
include_once '../class/ClassConexaoServ.php';

// PARA CADASTRAR NOVO SERVIÇO
if (isset($_POST['descricao'])) {
	$descricao = $_POST['descricao'];
        
	//CHAMADA DO MÉTODO CADASTRA SERVIÇO
    $resultado = CadastraServ($descricao);
	if ($resultado == TRUE) {
		header('location: cadCliente.php');
    } else {
        echo "Cadastrado realizado.";
    }
}
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
