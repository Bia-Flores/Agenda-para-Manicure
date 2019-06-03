<!--<?php
	include_once "../cabecalho.php";
?>
-->
		<form action = "" name = "cadTipoServico" method ="POST">
			<fieldset>
				<legend>CADASTRAR TIPOS DE SERVIÇOS </legend><br>
					<table border='0'>
						<tr>
							<th align=left>Serviço:</th><td> <input type="text" name="idservico" id="idservico" required></td>
						</tr>
						<tr>
							<th align=left>Descrição:</th><td> <input type="text" name="descricao" id="descricao" required></td>
						</tr>
						<tr>			
							<th colspan="2" ><input type="submit" Value="Cadastrar">
											<input type="submit" Value="Editar">
											<input type="submit" Value="Excluir">
											</th> 
						</tr>
					</table>
			</fieldset>
		</form>	
	</body>
</html>

<?php
include_once '../class/ClassConexaoServ.php';

// PARA CADASTRAR SERVIÇOS
if (isset($_POST['idservico']) && isset($_POST['descricao'])) {
	$idservico = $_POST['idservico'];
	$descricao = $_POST['descricao'];
        
	//CHAMADA DO MÉTODO CadastroTipoServ 
    $resultado = CadastroTipoServ($idservico, $descricao);
    if ($resultado == TRUE) {
		echo header('Location: cadTipoServico.php');
    } else {
        echo "Serviço cadastrado.";
    }
}

?>