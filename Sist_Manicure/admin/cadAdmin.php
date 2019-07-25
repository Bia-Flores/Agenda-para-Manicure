<?php
	session_start();
	include_once "login_Ok.php";
	
	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	/*PARA ELIMINAR OS ERROS REPORTADOS 
	error_reporting(0);
	ini_set(“display_errors”, 0 );*/

?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
		
	<div class="col-lg-12 mx-auto" style = "margin-right: 20px; margin-left: 20px">	
		<form action = "" name = "cadAdmin" method ="POST" >
			<!--fieldset-->
				<legend><b>ADMINISTRADORES </b></legend><br>
					<table border='0' >
						<tr>
							<th align=left>Nome:</th><td> <input type="text" name="nome" id="nome" required></td>
						</tr>
						<tr>
							<th align=left>CPF:</th><td> <input type="text" name="CPF" id="CPF" required></td>
						</tr>
						<tr>
							<th align=left>Telefone:</th><td> <input type="text" name="telefone" id="telefone" required></td>
						</tr>
						<tr>
							<th align=left>Celular:</th><td> <input type="text" name="celular" id="celular" required></td>
						</tr>
						<tr>			
							<th align=left>E-mail:</th><td> <input type="text" name="email" id="email" required></td>	
						</tr>
						<tr>
							<th align=left>Senha:</th><td> <input type="password" name="senha" id="senha" required></td>	
						</tr>
						<tr>
							<th align=left>Foto:</th><td> <input type="text" name="foto" id="foto" ></td>	
						</tr>
						<tr>			
							<th colspan="2" ><input type="submit" Value="Cadastrar"></th> 
						</tr>
					</table>
			<!--/fieldset-->
		</form>	
	</div>

<?php
include_once '../class/ClassConexaoAdmin.php';

// PARA CADASTRAR NOVO ADMINISTRADOR
if (isset($_POST['nome']) && isset($_POST['CPF']) && isset($_POST['telefone']) && isset($_POST['celular']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['foto'])) {
	$MD5 = md5($_POST['senha']);
	$nome = $_POST['nome'];
    $CPF = $_POST['CPF'];
    $telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$foto = $_POST['foto'];
	$senha = $MD5;
    
	//CHAMADA DO MÉTODO CadastraAdmin 
    $resultado = CadastraAdmin($nome, $CPF, $telefone, $celular, $email, $senha, $foto);
    if ($resultado == TRUE) {
		//echo header("Loaction: cadAdmin.php"); 
    //} else {
      //  echo "Administrador cadastrado.";
    }
}

?>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
