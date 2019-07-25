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
	
<!-- # # # # # # # # # # EDITAR SERVIÇOS # # # # # # # # # # -->
<section id="editServico">
	<form action = "" name = "busServico" method ="POST">
		<legend>Buscar Serviço</legend><br>
		Descrição: <input type="text" name = "NomeDesc" id = "NomeDesc" required><br><br>
		<input type="submit" Value="Buscar">
	</form>	
	
	
	<?php
	include_once '../class/ClassConexaoServ.php';

	// PARA CADASTRAR NOVO SERVIÇO
	if (isset($_POST['NomeDesc'])) {
		$NomeDesc = $_POST['NomeDesc'];
			
		$ObjServ = BusServico($NomeDesc);
		echo"<div > <table border='1' id='table-milagre' style='position: absolute; text-align:center; top: 485px; width: auto; height: auto; background-color: white;'>
			<thead>
				<th>Código</th>
				<th>Descrição</th>
				<th colspan = '2'>Ações</th>
			</thead>
			<tbody>";
				   
		foreach ($ObjServ as $servico) {
			echo'<tr align=center>';
			echo'<td>' . $servico['idserv'] . '</td>';
			echo'<td>' . $servico['NomeDesc'] . '</td>';
			
			echo'<td><a href=editServicos.php?idserv=' . $servico['idserv'] . '>Atualizar Cadastro</a></td>';
			echo'<td><a href=excServicos.php?idserv=' . $servico['idserv'] . '>Excluir Cadastro</a></td>';
			echo'<tr>';
		}
		echo'</tbody></table>';
		echo "	</div>";
	}
	?>
	
			
</section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
