<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	error_reporting(0);
	ini_set(“display_errors”, 0 );

	$con=mysqli_connect("localhost","root","","agenda");
	
	//$sql = "SELECT servico.descricao, servico.idserv FROM servico, tiposervico WHERE tiposervico.idservico=1";
	$sql = "SELECT * FROM servico";
	$result = mysqli_query($con, $sql);


?>
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
		header('location: cadTipoServico.php');
    } else {
        echo "Cadastrado realizado.";
    }
}
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
