<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	


<?php
    if (isset($_POST['nome'])) {
        include_once '../class/ClassConexaoCliente.php';
        
		$Nome = $_POST['nome'];

        $ObjCliente = BuscarCliente($nome);
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
                   </tr>";
				   
        foreach ($ObjCliente as $cliente) {
            echo'<tr align=center>';
            echo'<td>' . $cliente['idclie'] . '</td>';
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
			echo'<td>' . $cliente['senha'] . '</td>';
			echo'<td>' . $cliente['foto'] . '</td>';
			echo'</tr>';
			echo'<tr>';
            echo'<td align=center colspan = 6 ><a href=editCliente.php?idclie=' . $cliente['idclie'] . '>Atualizar</a></td>';
            echo'</tr>';
        }
    }
?>


<?php
	include_once "../rodape.php";
?>
