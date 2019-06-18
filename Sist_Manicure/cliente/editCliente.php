<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	

<?php
	include_once '../class/ClassConexaoCliente.php';
	//idclie, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto
	$idclie="";
	$nome="";
	$CPF="";
	$RG="";
	$CEP="";
	$endereco="";
	$cidade="";
	$UF="";
	$telefone="";
	$celular="";
	$email="";
	$senha="";
	$foto="";
	
	if(isset($_GET['idclie'])){
		$idclie=$_GET['idclie'];
		$cliente=BuscaRegAnimal($idclie);
		
		$idclie=$cliente[0]['idclie'];
		$nome=$cliente[0]['nome'];
		$CPF=$cliente[0]['CPF'];
		$RG=$cliente[0]['RG'];
		$CEP=$cliente[0]['CEP'];
		$endereco=$cliente[0]['endereco'];
		$cidade=$cliente[0]['cidade'];
		$UF=$cliente[0]['UF'];
		$telefone=$cliente[0]['telefone'];
		$celular=$cliente[0]['celular'];
		$email=$cliente[0]['email'];
		$senha=$cliente[0]['senha'];
		$foto=$cliente[0]['foto'];
	}
?>

	<form action="" name="cliente" method="post">
		<legend> Editar Cadastro </legend>
		<table border='0'>
			<tr>
				<th align=left>Nome:</th><td> <input type="text" name = "nome" id = "nome" required></td>
			</tr>
			<tr>
				<th align=left>CPF:</th><td> <input type="text" name = "CPF" id = "CPF" required></td>
			</tr>
			<tr>
				<th align=left>RG:</th><td> <input type="text" name = "RG" id = "RG" required></td>
			</tr>
			<tr>
				<th align=left>CEP:</th><td> <input type="text" name = "CEP" id = "CEP" required></td>
			</tr>
			<tr>
				<th align=left>Endereço:</th><td> <input type="text" name = "endereco" id = "endereco" required></td>
			</tr>
			<tr>
				<th align=left>Cidade:</th><td> <input type="text" name = "cidade" id = "cidade" required></td>
			</tr>
			<tr>
				<th align=left>UF:</th><td> <input type="text" name = "UF" id = "UF" required></td>
			</tr>
			<tr>
				<th align=left>Telefone:</th><td> <input type="text" name = "telefone" id = "telefone" required></td>
			</tr>
			<tr>
				<th align=left>Celular:</th><td> <input type="text" name = "celular" id = "celular" required></td>
			</tr>
			<tr>			
				<th align=left>E-mail:</th><td> <input type="text" name = "email" id = "email" required></td>	
			</tr>
			<tr>
				<th align=left>Senha:</th><td> <input type="password" name = "senha" id = "senha" required></td>	
			</tr>
			<tr>
				<th align=left>Foto:</th><td> <input type="text" name = "foto" id = "foto"></td>	
			</tr>
			<tr>			
				<th colspan="2" ><input type="submit" Value="Cadastrar"></th> 
			</tr>
		</table>
		
		
		Código Cliente: <input type="number" name="idAnimais" id="idAnimais" required value=<?php echo $CodAnimal?>><br><br>
		Nome do Cliente: <input type="text" name="Nome" id="Nome" required value=<?php echo $NomeAnimal?>><br><br>
		Data Nascimento Animal: <input type="date" name="DtNasc" id="DtNasc" required value=<?php echo $NascAnimal?>><br><br>
		Nome do Proprietário: <input type="text" name="NomeDono" id="NomeDono" required value=<?php echo $NomeProp?>><br><br>
		E-mail do Proprietário:<input type="text" name="Email" id="Email" required value=<?php echo $EmailProp?>><br><br>
		Raça do Animal:<input type="text" name="Raca" id="Raca" required value=<?php echo $RacaAnimal?>><br><br>
				
		<input type="submit" value="Salvar Alterações">
	
		<button><a href="MenuVet.php"> Voltar Menu </a></button>
		</form>
	</body>
</html>

<?php
if(isset($_POST['idAnimais'])&& isset($_POST['Nome'])&& isset($_POST['DtNasc'])&& isset($_POST['NomeDono'])&& isset($_POST['Email'])&& isset($_POST['Raca'])){
	$CodAnimal=$_POST['idAnimais'];
	$NomeAnimal=$_POST['Nome'];
	$NascAnimal=$_POST['DtNasc'];
	$NomeProp=$_POST['NomeDono'];
	$EmailProp=$_POST['Email'];
	$RacaAnimal=$_POST['Raca'];
	
	$resultado=AlterarAnimais($CodAnimal, $NomeAnimal, $NascAnimal, $NomeProp, $EmailProp, $RacaAnimal);
}
?>