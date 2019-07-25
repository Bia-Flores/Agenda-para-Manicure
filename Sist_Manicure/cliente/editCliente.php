<?php

	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	

<?php
	include_once '../class/ClassConexaoCliente.php';
	$Cod_Cliente="";
	$Nome_Cliente="";
	$CPF_Cliente="";
	$RG_Cliente="";
	$CEP_Cliente="";
	$End_Cliente="";
	$Cidade_Cliente="";
	$UF_Cliente="";
	$Fone_Cliente="";
	$Celular_Cliente="";
	$Email_Cliente="";
	$Senha_Cliente="";
	$Foto_Cliente="";
	
	if(isset($_GET['idclie'])){
		$IDCliente=$_GET['idclie'];
		$cliente=BuscaRegCliente($IDCliente);
		
		$Cod_Cliente=$cliente[0]['idclie'];
		$Nome_Cliente=$cliente[0]['nome'];
		$CPF_Cliente=$cliente[0]['CPF'];
		$RG_Cliente=$cliente[0]['RG'];
		$CEP_Cliente=$cliente[0]['CEP'];
		$End_Cliente=$cliente[0]['endereco'];
		$Cidade_Cliente=$cliente[0]['cidade'];
		$UF_Cliente=$cliente[0]['UF'];
		$Fone_Cliente=$cliente[0]['telefone'];
		$Celular_Cliente=$cliente[0]['celular'];
		$Email_Cliente=$cliente[0]['email'];
		$Senha_Cliente=$cliente[0]['senha'];
		$Foto_Cliente=$cliente[0]['foto'];
	}
?>

	<form action="" name="cliente" method="post">
		<legend><b> ATUALIZAR CADASTRO DE CLIENTES</legend>
		<table border='0' >
			<tr>
				<th align=left>Código:</th><td> <input type="label" name="idclie" id="idclie" value="<?php echo $Cod_Cliente?>" required></td>
				<th align=left>UF:</th><td> <input type="text" name="UF" id="UF" value="<?php echo $UF_Cliente?>" required></td>
			</tr>
			<tr>
				<th align=left>Nome:</th><td> <input type="text" name="nome" id="nome" value="<?php echo $Nome_Cliente?>" required></td>
				<th align=left>Telefone:</th><td> <input type="text" name="telefone" id="telefone" value="<?php echo $Fone_Cliente?>" required></td>
			</tr>
			<tr>
				<th align=left>CPF:</th><td> <input type="text" name="CPF" id="CPF"  value="<?php echo $CPF_Cliente?>" required></td>
				<th align=left>Celular:</th><td> <input type="text" name="celular" id="celular" value="<?php echo $Celular_Cliente?>" required></td>
			</tr>
			<tr>
				<th align=left>RG:</th><td> <input type="text" name="RG" id="RG" value="<?php echo $RG_Cliente?>" required></td>
				<th align=left>E-mail:</th><td> <input type="text" name="email" id="email" value="<?php echo $Email_Cliente?>" required></td>	
			</tr>
			<tr>
				<th align=left>CEP:</th><td> <input type="text" name="CEP" id="CEP" value="<?php echo $CEP_Cliente?>" required></td>
				<th align=left>Senha:</th><td> <input type="password" name="senha" id="senha" value="<?php echo $Senha_Cliente?>" required></td>
			</tr>
			<tr>
				<th align=left>Endereço:</th><td> <input type="text" name="endereco" id="endereco" value="<?php echo $End_Cliente?>" required ></td>
				<th align=left>Foto:</th><td> <input type="text" name = "foto" id = "foto" value="<?php echo $Foto_Cliente?>"></td>	
			</tr>
			<tr>
				<th align=left>Cidade:</th><td> <input type="text" name="cidade" id="cidade" value="<?php echo $Cidade_Cliente?>" required ></td>
			</tr>
			<tr>			
				<td colspan="2" ><input type="submit" Value="Salvar Alterações"></td> 
			</tr>
		</table>
		
	</form>
	
<?php
if(isset($_POST['idclie'])&& isset($_POST['nome'])&& isset($_POST['CPF'])&& isset($_POST['RG'])&& isset($_POST['CEP'])&& isset($_POST['endereco'])&& isset($_POST['cidade'])&& isset($_POST['UF'])&& isset($_POST['telefone'])&& isset($_POST['celular'])&& isset($_POST['email'])&& isset($_POST['senha'])&& isset($_POST['foto'])){
	$Cod_Cliente=$_POST['idclie'];
	$Nome_Cliente=$_POST['nome'];
	$CPF_Cliente=$_POST['CPF'];
	$RG_Cliente=$_POST['RG'];
	$CEP_Cliente=$_POST['CEP'];
	$End_Cliente=$_POST['endereco'];
	$Cidade_Cliente=$_POST['cidade'];
	$UF_Cliente=$_POST['UF'];
	$Fone_Cliente=$_POST['telefone'];
	$Celular_Cliente=$_POST['celular'];
	$Email_Cliente=$_POST['email'];
	$Senha_Cliente=$_POST['senha'];
	$Foto_Cliente=$_POST['foto'];
	
	$resultado=AlterarCliente($Cod_Cliente, $Nome_Cliente, $CPF_Cliente, $RG_Cliente, $CEP_Cliente, $End_Cliente, $Cidade_Cliente, $UF_Cliente, $Fone_Cliente, $Celular_Cliente, $Email_Cliente, $Senha_Cliente, $Foto_Cliente);
}
?>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
