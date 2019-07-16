<?php
	session_start();
	include_once "login_Ok.php";
	
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
	<section>
		<form action = "" name = "admin" id="admin" method = "POST">
				<fieldset>
					<legend> Buscar Administrador </legend><br>
					Nome: <input type="text" name = "nome" id = "nome" required><br><br>
					
					<input id="btn-milagre" type="submit" Value="Buscar"> 
				</fieldset>
		</form>


		<?php
			if (isset($_POST['nome'])) {
				include_once '../class/ClassConexaoAdmin.php';
				
				$nome = $_POST['nome'];
				//idadmim, nome, CPF, telefone, celular, email, senha, foto
				$ObjAdmin = BuscarAdmin($nome);
				echo "<div > <table border='1' id='table-milagre' style='position: absolute; top: 508px; width: 100%; height: auto; background-color: white;'>
						   <tr>
							<th>Código</th>
							 <th>Nome</th>
							 <th>CPF</th>
							 <th>Telefone</th>
							 <th>Celular</th>
							 <th>E-mail</th>
							
							 <th>Foto</th>
						   </tr>";
						   
				foreach ($ObjAdmin as $administrador) {
					echo'<tr align=center>';
					echo'<td>' . $administrador['idadmim'] . '</td>';
					echo'<td>' . $administrador['nome'] . '</td>';
					echo'<td>' . $administrador['CPF'] . '</td>';
					echo'<td>' . $administrador['telefone'] . '</td>';
					echo'<td>' . $administrador['celular'] . '</td>';
					echo'<td>' . $administrador['email'] . '</td>';
					/*echo'<td>' . $administrador['senha'] . '</td>';*/
					echo'<td>' . $administrador['foto'] . '</td>';
					echo'</tr>';
					echo'<tr>';
					echo'<td align=center colspan = 4 ><a href=editAdmin.php?idadmim=' . $administrador['idadmim'] . '>Atualizar Cadastro</a></td>';
					echo'<td align=center colspan = 4 ><a href=excAdmin.php?idadmim=' . $administrador['idadmim'] . '>Excluir Cadastro</a></td>';
					echo'</tr>';
				}
				echo "	</div>";
			}
		?>

</section>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
