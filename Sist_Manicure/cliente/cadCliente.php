<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	

	<form action = "" name = "cadCliente" method ="POST">
		<h5> Cadastro de Cliente </h5><br>
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
	</form>	

	
	<?php
include_once '../class/ClassConexaoCliente.php';

// PARA CADASTRAR NOVO CLIENTE
if (isset($_POST['nome']) && isset($_POST['CPF']) && isset($_POST['RG'])&& isset($_POST['CEP']) && isset($_POST['endereco']) && isset($_POST['cidade']) && isset($_POST['UF']) && isset($_POST['telefone']) && isset($_POST['celular']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['foto'])) {
	$nome = $_POST['nome'];
    $CPF = $_POST['CPF'];
	$RG = $_POST['RG'];
	$CEP = $_POST['CEP'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$UF = $_POST['UF'];
    $telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$foto = $_POST['foto'];
    
	//CHAMADA DO MÉTODO CadastraCliente 
    $resultado = CadastraCliente($nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto);
	if ($resultado == TRUE) {
		echo header('Location: cadCliente.php');
    } else {
        echo "Cliente cadastrado.";
    }
}
?>


<?php
	include_once "../rodape.php";
?>
