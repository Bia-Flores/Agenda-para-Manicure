<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
	<form action = "" name = "prestador" method = "POST">
			<fieldset>
				<legend> Buscar Prestador de Serviços</legend><br>
				Nome: <input type="text" name = "nome" id = "nome" required><br><br>
				
				<input type="submit" Value="Buscar Cadastro"> 
			</fieldset>
</form>


<?php
    if (isset($_POST['nome'])) {
        include_once '../class/ClassConexaoClassConexaoPrest.php';
        
		$nome = $_POST['nome'];
		
        $ObjPrest = BuscarPrest($nome);
        echo " <table border='1'>
                   <tr>
                    <th>Código</th>
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
					 <th>Senha</th>
					 <th>Foto</th>
					 <th>Serviço</th>
                   </tr>";
				   
        foreach ($ObjPrest as $prestador) {
            echo'<tr align=center>';
            echo'<td>' . $prestador['idprest'] . '</td>';
			echo'<td>' . $prestador['nome'] . '</td>';
			echo'<td>' . $prestador['CPF'] . '</td>';
			echo'<td>' . $prestador['RG'] . '</td>';
			echo'<td>' . $prestador['CEP'] . '</td>';
			echo'<td>' . $prestador['endereco'] . '</td>';
            echo'<td>' . $prestador['cidade'] . '</td>';
			echo'<td>' . $prestador['UF'] . '</td>';
			echo'<td>' . $prestador['telefone'] . '</td>';
			echo'<td>' . $prestador['celular'] . '</td>';
			echo'<td>' . $prestador['email'] . '</td>';
			echo'<td>' . $prestador['senha'] . '</td>';
			echo'<td>' . $prestador['foto'] . '</td>';
			echo'<td>' . $prestador['idservico'] . '</td>';
			echo'</tr>';
			echo'<tr>';
            echo'<td align=center colspan = 13 ><a href=editPrest.php?idprest=' . $prestador['idprest'] . '>Atualizar Cadastro</a></td>';
            echo'</tr>';
        }
    }
?>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
