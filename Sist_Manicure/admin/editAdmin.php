<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
<?php
	include_once '../class/ClassConexaoAdmin.php';
	$Cod_Admin="";
	$Nome_Admin="";
	$CPF_Admin="";
	$Fone_Admin="";
	$Celular_Admin="";
	$Email_Admin="";
	$Senha_Admin="";
	$Foto_Admin="";
	
	if(isset($_GET['idadmim'])){
		$IdAdmin=$_GET['idadmim'];
		$administrador=BuscaRegAdmin($IdAdmin);
		
		$Cod_Admin=$administrador[0]['idadmim'];
		$Nome_Admin=$administrador[0]['nome'];
		$CPF_Admin=$administrador[0]['CPF'];
		$Fone_Admin=$administrador[0]['telefone'];
		$Celular_Admin=$administrador[0]['celular'];
		$Email_Admin=$administrador[0]['email'];
		$Senha_Admin=$administrador[0]['senha'];
		$Foto_Admin=$administrador[0]['foto'];
	}
?>


		<div class="col-lg-12 mx-auto" style = "margin-right: 20px; margin-left: 20px">	
		<form action = "" name = "cadAdmin" method ="post" >
			<!--fieldset-->
				<legend><b>EDITAR CADASTRO DE ADMINISTRADOR</b></legend><br>
					<table border='0' >
						<tr>
							<th align=left>Código:</th><td> <input type="number" name="idadmim" id="idadmim" required value=<?php echo $Cod_Admin?>></td>
						</tr>
						<tr>
							<th align=left>Nome:</th><td> <input type="text" name="nome" id="nome" required value=<?php echo $Nome_Admin?>></td>
						</tr>
						<tr>
							<th align=left>CPF:</th><td> <input type="text" name="CPF" id="CPF" required value=<?php echo $CPF_Admin?>></td>
						</tr>
						<tr>
							<th align=left>Telefone:</th><td> <input type="text" name="telefone" id="telefone" required value=<?php echo $Fone_Admin?>></td>
						</tr>
						<tr>
							<th align=left>Celular:</th><td> <input type="text" name="celular" id="celular" required value=<?php echo $Celular_Admin?>></td>
						</tr>
						<tr>			
							<th align=left>E-mail:</th><td> <input type="text" name="email" id="email" required value=<?php echo $Email_Admin?>></td>	
						</tr>
						<tr>
							<th align=left>Senha:</th><td> <input type="password" name="senha" id="senha" required value=<?php echo $Senha_Admin?>></td>	
						</tr>
						<tr>
							<th align=left>Foto:</th><td> <input type="text" name="foto" id="foto" value=<?php echo $Foto_Admin?>></td>	
						</tr>
						<tr>			
							<th colspan="2" ><input type="submit" Value="Atualizar"></th> 
						</tr>
					</table>
			<!--/fieldset-->
		</form>	
	</div>
	
<?php
if(isset($_POST['idadmim'])&& isset($_POST['Nome'])&& isset($_POST['DtNasc'])&& isset($_POST['NomeDono'])&& isset($_POST['Email'])&& isset($_POST['Raca'])){
	$Cod_Admin=$_POST['idadmim'];
	$Nome_Admin=$_POST['nome'];
	$CPF_Admin=$_POST['CPF'];
	$Fone_Admin=$_POST['telefone'];
	$Celular_Admin=$_POST['celular'];
	$Email_Admin=$_POST['email'];
	$Senha_Admin=$_POST['senha'];
	$Foto_Admin=$_POST['foto'];
	//idadmim, nome, CPF, telefone, celular, email, senha, foto
	$resultado=AlterarAdmin($Cod_Admin, $Nome_Admin, $CPF_Admin, $Fone_Admin, $Celular_Admin, $Email_Admin, $Senha_Admin, $Foto_Admin);
}
?>


<?php
	include_once "../rodape.php";
?>

