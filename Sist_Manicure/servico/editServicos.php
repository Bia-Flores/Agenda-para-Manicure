<?php
	//ob_start();
	//session_start();

	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	/*//PARA ELIMINAR OS ERROS REPORTADOS 
	error_reporting(0);
	ini_set(“display_errors”, 0 );*/

?>
<!-- CSS DE ESTILO-->
<link href="../css/estilo.css" rel="stylesheet">	
	
	<!-- # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
						EDITAR SERVIÇOS 
	# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # -->
<section id="editServico">
	
	<?php
	include_once '../class/ClassConexaoServ.php';
	$Cod_Serv="";
	$Desc_Serv="";
	
	if(isset($_GET['idserv'])){
		$ID_Serv=$_GET['idserv'];
		$servico=BusRegServ($ID_Serv);
		
		$Cod_Serv=$servico[0]['idserv'];
		$Desc_Serv=$servico[0]['NomeDesc'];
	}
	?>
	
	<form action = "" name = "servico" method ="post" >
		<legend><b>EDITAR SERVIÇO</b></legend><br>
		<table border='0' >
			<tr> 
				<th align=left>Código:</th><td> <input type="text" name="idserv" id="idserv" value="<?php echo $Cod_Serv?>" required ></td>
			</tr>
			<tr>
				<th align=left>Descrição:</th><td> <input type="text" name="NomeDesc" id="NomeDesc" value="<?php echo $Desc_Serv?>" required ></td>
			</tr>
			<tr>			
				<th ><input type="submit" Value="Atualizar"></th>
			</tr>
		</table>
		</form>	
		
		<?php
		if(isset($_POST['idserv'])&& isset($_POST['NomeDesc'])){
			$Cod_Serv=$_POST['idserv'];
			$Desc_Serv=$_POST['NomeDesc'];
			
			$resultado=AltServico($Cod_Serv, $Desc_Serv);
		}
		?>
		<span><button> <a href = 'busServicos.php'>Buscar</a></button></span>
</section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
