<!--<?php
	include_once "../cabecalho.php";
?>
-->
		<form action = "" name = "cadServico" method ="POST">
			<fieldset>
				<legend>CADASTRAR SERVIÇOS </legend><br>
					<table border='0'>
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
if (isset($_POST['descricao'])) {
	$descricao = $_POST['descricao'];
        
	//CHAMADA DO MÉTODO CadastraServ 
    $resultado = CadastraServ($descricao);
    if ($resultado == TRUE) {
		echo header('Location: cadServico.php');
    } else {
        echo "Serviço cadastrado.";
    }
}

?>