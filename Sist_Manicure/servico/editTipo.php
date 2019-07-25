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
	$Cod_TipServ="";
	$Cod_Serv="";
	$Desc_TipServ="";
	
	if(isset($_GET['idtipo'])){
		$ID_Tipo=$_GET['idtipo'];
		$tiposervico=BusRegTipoServ($ID_Tipo);
		
		$Cod_TipServ=$tiposervico[0]['idtipo'];
		$Cod_Serv=$tiposervico[0]['idservico'];
		$Desc_TipServ=$tiposervico[0]['descrTipo'];
	}
	?>
	
	<form action = "" name = "tiposervico" method ="post" >
		<legend><b>EDITAR TIPO DE SERVIÇO</b></legend><br>
		<table border='0' >
			<tr> 
				<th align=left>Código:</th><td> <input type="text" name="idtipo" id="idtipo" value="<?php echo $Cod_TipServ?>" required ></td>
			</tr>
			<tr> 
				<th align=left>Serviço:</th><td> <input type="text" name="idservico" id="idservico" value="<?php echo $Cod_Serv?>" required ></td>
			</tr>
			<tr>
				<th align=left>Descrição:</th><td> <input type="text" name="descrTipo" id="descrTipo" value="<?php echo $Desc_TipServ?>" required ></td>
			</tr>
			<tr>			
				<th ><input type="submit" Value="Atualizar"></th>
			</tr>
		</table>
		</form>	
		
		<?php
		if(isset($_POST['idtipo'])&& isset($_POST['idservico'])){
			$Cod_TipServ=$_POST['idtipo'];
			$Cod_Serv=$_POST['idservico'];
			$Desc_TipServ=$_POST['descrTipo'];
			
			$resultado=AltTipServ($Cod_TipServ, $Cod_Serv, $Desc_TipServ);
		}
		?>
		<span><button> <a href = 'busTipServ.php'>Buscar</a></button></span>
</section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
