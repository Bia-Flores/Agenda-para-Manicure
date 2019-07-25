<?php
	error_reporting(0);
	ini_set(“display_errors”, 0 );

	session_start();
	//include_once "../admin/login.php";

	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
	<form action = "" name = "cliente" method = "POST">
			<fieldset>
				<legend> Buscar Cliente </legend><br>
				Nome do Cliente: <input type="text" name = "nome" id = "nome" required><br><br>
				
				<input type="submit" Value="Buscar Cadastro"> 
			</fieldset>
</form>


<?php
    if (isset($_POST['nome'])) {
        include_once '../class/ClassConexaoCliente.php';
        
		$nome = $_POST['nome'];
		
        $ObjCliente = BuscarCliente($nome);
        echo " <div > <table border='1' id='table-milagre' style='position: absolute; top: 508px; width: 100%; height: auto; background-color: white;'>
                   <tr>
                   
                     <th>Nome</th>
					 <th>CPF</th>
					 <th>RG</th>
					 <th>CEP</th>
					 <th>Endereço</th>
					 <th>Cidade</th>
					 <th>UF</th>
					 <th>Telefone</th>
					 <th>Celular</th>
					 <th>E-mail</th>
					 
					 <th>Foto</th>
                   </tr>";
				   
        foreach ($ObjCliente as $cliente) {
            echo'<tr align=center>';
            //echo'<td>' . $cliente['idclie'] . '</td>';
			echo'<td>' . $cliente['nome'] . '</td>';
			echo'<td>' . $cliente['CPF'] . '</td>';
			echo'<td>' . $cliente['RG'] . '</td>';
			echo'<td>' . $cliente['CEP'] . '</td>';
			echo'<td>' . $cliente['endereco'] . '</td>';
            echo'<td>' . $cliente['cidade'] . '</td>';
			echo'<td>' . $cliente['UF'] . '</td>';
			echo'<td>' . $cliente['telefone'] . '</td>';
			echo'<td>' . $cliente['celular'] . '</td>';
			echo'<td>' . $cliente['email'] . '</td>';
			/*echo'<td>' . $cliente['senha'] . '</td>';*/
			echo'<td>' . $cliente['foto'] . '</td>';
			echo'</tr>';
			echo'<tr>';
            echo'<td align=center colspan = 5 ><a href=editCliente.php?idclie=' . $cliente['idclie'] . '>Atualizar Cadastro</a></td>';
			echo'<td align=center colspan = 6 ><a href=excCliente.php?idclie=' . $cliente['idclie'] . '>Excluir Cadastro</a></td>';
            echo'</tr>';
        }
		echo "	</div>";
    }
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
