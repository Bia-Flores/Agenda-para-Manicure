<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>

	<form action = "" name = "cadPrestador" method ="POST">
		<legend><b>CADASTRO DE PRESTADOR DE SERVIÇO</b></legend><br>
		<table border='0' style="width:100%">
			<tr>
				<th align=left>Nome:</th><td> <input type="text" name = "nome" id = "nome" required></td>	
				<th align=left>UF:</th><td> <input type="text" name = "UF" id = "UF" required></td>
			</tr>
			<tr>
				<th align=left>CPF:</th><td> <input type="text" name = "CPF" id = "CPF" required></td>
				<th align=left>Telefone:</th><td> <input type="text" name = "telefone" id = "telefone" required></td>
			</tr>
			<tr>
				<th align=left>RG:</th><td> <input type="text" name = "RG" id = "RG" required></td>
				<th align=left>Celular:</th><td> <input type="text" name = "celular" id = "celular" required></td>
			</tr>
			<tr>
				<th align=left>CEP:</th><td> <input type="text" name = "CEP" id = "CEP" required></td>
				<th align=left>E-mail:</th><td> <input type="text" name = "email" id = "email" required></td>	
			</tr>
			<tr>
				<th align=left>Endereço:</th><td> <input type="text" name = "endereco" id = "endereco" required></td>
				<th align=left>Senha:</th><td> <input type="password" name = "senha" id = "senha" required></td>
			</tr>
			<tr>
				<th align=left>Cidade:</th><td> <input type="text" name = "cidade" id = "cidade" required></td>
				<th align=left>Foto:</th><td> <input type="text" name = "foto" id = "foto" ></td>	<!--required campo obrigatório-->
			</tr>
			<tr>
				<th align=left>Tipo de Serviço:</th><td> <input type="number" name = "idservico" id = "idservico" required></td>
			</tr>
			<tr>			
				<th colspan="4" ><input type="submit" Value="Criar Agenda"></th> 
			</tr>
		</table>
	</form>	

	
	<?php
include_once '../class/ClassConexaoPrest.php';

// PARA CADASTRAR NOVO PRESTADOR DE SERVIÇO
if (isset($_POST['nome']) && isset($_POST['CPF']) && isset($_POST['RG']) && isset($_POST['CEP']) && isset($_POST['endereco']) && isset($_POST['cidade']) && isset($_POST['UF']) && isset($_POST['telefone']) && isset($_POST['celular']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['foto']) && isset($_POST['idservico'])) {
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
	$idservico = $_POST['idservico'];
    
	//CHAMADA DO MÉTODO CadastraPrest 
    $resultado = CadastraPrest($nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto, $idservico);
    if ($resultado == TRUE) {
		echo header('Location: cadPrestador.php');
    } else {
        echo "Profissional cadastrado.";
    }
}
?>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

