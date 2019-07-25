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
	

<section id="menu_serv">
	<!-- # # # # # # # # # # CADASTRO DE SERVIÇOS # # # # # # # # # # -->
	<article id="servico">
	<form action = "" name = "cadServico" method ="POST">
		<legend><b>CADASTRO DE SERVIÇO</b></legend><br>
		Descrição: <input type="text" name = "NomeDesc" id = "NomeDesc" required><br><br>
		<input type="submit" Value="Cadastrar">
	</form>	
	
	<?php
	include_once '../class/ClassConexaoServ.php';

	// PARA CADASTRAR NOVO SERVIÇO
	if (isset($_POST['NomeDesc'])) {
		$NomeDesc = $_POST['NomeDesc'];
			
		//CHAMADA DO MÉTODO CADASTRA SERVIÇO
		$resultado = CadastraServ($NomeDesc);
		if ($resultado == TRUE) {
			//header('location: cadCliente.php');
		} else {
			echo "Cadastrado realizado.";
		}
	}
	?>
	</article>
	
	
	<!-- # # # # # # # # # # CADASTRO TIPO DE SERVIÇOS # # # # # # # # # # -->
	<aside id="tipoServ">
	<form action = "" name = "cadTipoServico" method ="POST">
		<legend><b>CADASTRO TIPO DE SERVIÇO</b></legend><br>
		Tipo:<input type="number" name = "idservico" id = "idservico" required><br><br>
		Descrição:<input type="text" name = "descrTipo" id = "descrTipo" required><br><br>
		<input type="submit" Value="Cadastrar">
	</form>	
	
	<?php
	include_once '../class/ClassConexaoServ.php';

	// PARA CADASTRAR NOVO TIPO DE SERVIÇO
	if (isset($_POST['idservico']) && isset($_POST['descrTipo'])) {
		$idservico = $_POST['idservico'];
		$descrTipo = $_POST['descrTipo'];
			
		//CHAMADA DO MÉTODO CADASTRA SERVIÇO
		$resultado = CadastroTipoServ($idservico, $descrTipo);
		if ($resultado == TRUE) {
			//echo "Cadastrado realizado.";
		} else {
			header('location: cadTipoServico.php');
		}
	}
	?>
	</aside>
			
</section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
