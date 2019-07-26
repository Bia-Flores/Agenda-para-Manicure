<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	

<?php
	include_once '../class/ClassConexaoPrest.php';
	$Cod_Prestador="";
	$Nome_Prestador="";
	$CPF_Prestador="";
	$RG_Prestador="";
	$CEP_Prestador="";
	$End_Prestador="";
	$Cidade_Prestador="";
	$UF_Prestador="";
	$Fone_Prestador="";
	$Celular_Prestador="";
	$Email_Prestador="";
	$Senha_Prestador="";
	$Foto_Prestador="";
	$Serv_Prestador="";
	
	if(isset($_GET['idprest'])){
		$IDPrestador=$_GET['idprest'];
		$prestador=BuscaRegPrest($IDPrestador);
		
		$Cod_Prestador=$prestador[0]['idprest'];
		$Nome_Prestador=$prestador[0]['nome'];
		$CPF_Prestador=$prestador[0]['CPF'];
		$RG_Prestador=$prestador[0]['RG'];
		$CEP_Prestador=$prestador[0]['CEP'];
		$End_Prestador=$prestador[0]['endereco'];
		$Cidade_Prestador=$prestador[0]['cidade'];
		$UF_Prestador=$prestador[0]['UF'];
		$Fone_Prestador=$prestador[0]['telefone'];
		$Celular_Prestador=$prestador[0]['celular'];
		$Email_Prestador=$prestador[0]['email'];
		$Senha_Prestador=$prestador[0]['senha'];
		$Foto_Prestador=$prestador[0]['foto'];
		$Serv_Prestador=$prestador[0]['idservico'];
	}
?>

	<form action="" name="cliente" method="post">
		<legend><b> ATUALIZAR CADASTRO PRESTADOR DE SERVIÇOS</legend>
		<table border='0' >
			<tr>
				<th align=left>Código:</th><td> <input type="label" name="idprest" id="idprest" value="<?php echo $Cod_Prestador?>" required></td>
				<th align=left>UF:</th><td> <input type="text" name="UF" id="UF" value="<?php echo $UF_Prestador?>" required></td>
			</tr>
			<tr>
				<th align=left>Nome:</th><td> <input type="text" name="nome" id="nome" value="<?php echo $Nome_Prestador?>" required></td>
				<th align=left>Telefone:</th><td> <input type="text" name="telefone" id="telefone" value="<?php echo $Fone_Prestador?>" required></td>
			</tr>
			<tr>
				<th align=left>CPF:</th><td> <input type="text" name="CPF" id="CPF"  value="<?php echo $CPF_Prestador?>" required></td>
				<th align=left>Celular:</th><td> <input type="text" name="celular" id="celular" value="<?php echo $Celular_Prestador?>" required></td>
			</tr>
			<tr>
				<th align=left>RG:</th><td> <input type="text" name="RG" id="RG" value="<?php echo $RG_Prestador?>" required></td>
				<th align=left>E-mail:</th><td> <input type="text" name="email" id="email" value="<?php echo $Email_Prestador?>" required></td>	
			</tr>
			<tr>
				<th align=left>CEP:</th><td> <input type="text" name="CEP" id="CEP" value="<?php echo $CEP_Prestador?>" required></td>
				<th align=left>Senha:</th><td> <input type="password" name="senha" id="senha" value="<?php echo $Senha_Prestador?>" required></td>
			</tr>
			<tr>
				<th align=left>Endereço:</th><td> <input type="text" name="endereco" id="endereco" value="<?php echo $End_Prestador?>" required ></td>
				<th align=left>Foto:</th><td> <input type="text" name = "foto" id = "foto" value="<?php echo $Foto_Prestador?>"></td>	
			</tr>
			<tr>
				<th align=left>Cidade:</th><td> <input type="text" name="cidade" id="cidade" value="<?php echo $Cidade_Prestador?>" required ></td>
				<th align=left>Tipo de Serviço:</th><td> <input type="number" name="idservico" id="idservico" value="<?php echo $Serv_Prestador?>" required ></td>
			</tr>
			<tr>			
				<td colspan="2" ><input type="submit" Value="Salvar Alterações"></td> 
			</tr>
		</table>
		
	</form>
	
<?php
if(isset($_POST['idprest'])&& isset($_POST['nome'])&& isset($_POST['CPF'])&& isset($_POST['RG'])&& isset($_POST['CEP'])&& isset($_POST['endereco'])&& isset($_POST['cidade'])&& isset($_POST['UF'])&& isset($_POST['telefone'])&& isset($_POST['celular'])&& isset($_POST['email'])&& isset($_POST['senha'])&& isset($_POST['foto'])&& isset($_POST['idservico'])){
	$Cod_Prestador=$_POST['idprest'];
	$Nome_Prestador=$_POST['nome'];
	$CPF_Prestador=$_POST['CPF'];
	$RG_Prestador=$_POST['RG'];
	$CEP_Prestador=$_POST['CEP'];
	$End_Prestador=$_POST['endereco'];
	$Cidade_Prestador=$_POST['cidade'];
	$UF_Prestador=$_POST['UF'];
	$Fone_Prestador=$_POST['telefone'];
	$Celular_Prestador=$_POST['celular'];
	$Email_Prestador=$_POST['email'];
	//$Senha_Prestador=$_POST['senha'];
	$MD5 = md5($_POST['senha']);
	$Senha_Prestador=$MD5;
	$Foto_Prestador=$_POST['foto'];
	$Serv_Prestador=$_POST['idservico'];
	
	$resultado=AlterarPrest($Cod_Prestador, $Nome_Prestador, $CPF_Prestador, $RG_Prestador, $CEP_Prestador, $End_Prestador, $Cidade_Prestador, $UF_Prestador, $Fone_Prestador, $Celular_Prestador, $Email_Prestador, $Senha_Prestador, $Foto_Prestador, $Serv_Prestador);
}
?>
<button> <a href = 'busPrestador.php'>Buscar</a></button>
<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
