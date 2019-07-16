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

	<article id="servico">
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
				header('location: servicos.php');
			} else {
				echo "Cadastrado realizado.";
			}
		}
		?>

	</article>

	<aside id="tipoServ">
		<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
		<form action = "" name = "cadTipoServico" method ="POST">
			<legend><b>CADASTRO TIPO DE SERVIÇO</b></legend><br>
			Tipo:<input type="number" name = "idservico" id = "idservico" required><br><br>
			Descrição:<input type="text" name = "descricao" id = "descricao" required><br><br>
			<input type="submit" Value="Cadastrar">
		</form>	
	
		<?php
		include_once '../class/ClassConexaoServ.php';

		// PARA CADASTRAR NOVO TIPO DE SERVIÇO
		if (isset($_POST['idservico']) && isset($_POST['descricao'])) {
			$idservico = $_POST['idservico'];
			$descricao = $_POST['descricao'];
				
			//CHAMADA DO MÉTODO CADASTRA SERVIÇO
			$resultado = CadastroTipoServ($idservico, $descricao);
			if ($resultado == TRUE) {
				header('location: servicos.php');
			} else {
				echo "Cadastrado realizado.";
			}
		}
		?>

	</aside>
			
</section>
		

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
