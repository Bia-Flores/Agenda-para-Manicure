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
	
	<!-- # # # # # # # # # # BUSCAR TIPO DE SERVIÇOS # # # # # # # # # # -->
	<Section id="editTipoServ">
	
	<form action = "" name = "busTipoServico" method ="POST">
		<legend>Buscar Tipo de Serviço</legend><br>
		Descrição:<input type="text" name = "descrTipo" id = "descrTipo" required><br><br>
		<input type="submit" Value="Buscar">		
	</form>	
	
	<?php
	include_once '../class/ClassConexaoServ.php';

	if (isset($_POST['descrTipo'])) {
		$descrTipo = $_POST['descrTipo'];
			
		$ObjTipoServ = BusTipoServ($descrTipo);
		echo "<div > <table border='1' id='table-milagre' style='position: absolute; text-align:center; top: 485px; width: auto; height: auto; background-color: white;'>
			<thead>
				<th>Código</th>
				<th>Serviço</th>
				<th>Descrição</th>
			<th colspan = '2'>Ações</th>
			</thead>
			<tbody>";
				   
		foreach ($ObjTipoServ as $tiposervico) {
			echo'<tr align=center>';
			echo'<td>' . $tiposervico['idtipo'] . '</td>';
			echo'<td>' . $tiposervico['idservico'] . '</td>';
			echo'<td>' . $tiposervico['descrTipo'] . '</td>';
			
			echo'<td><a href=editTipo.php?idtipo=' . $tiposervico['idtipo'] . '>Atualizar Cadastro</a></td>';
			echo'<td><a href=excTipoServ.php?idtipo=' . $tiposervico['idtipo'] . '>Excluir Cadastro</a></td>';
			echo'<tr>';
		}
		echo'</tbody></table>';
		echo "	</div>";
	}
	?>
	</Section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
