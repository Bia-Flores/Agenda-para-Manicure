<?php
	include_once "../cabecalho.php";
	include_once "../banner.php";
?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
	<form action = "" name = "admin" method = "POST">
			<fieldset>
				<legend> Buscar Administrador </legend><br>
				Nome: <input type="text" name = "nome" id = "nome" required><br><br>
				
				<input type="submit" Value="Buscar"> 
			</fieldset>
	</form>


<?php
    if (isset($_POST['nome'])) {
        include_once '../class/ClassConexaoAdmin.php';
        
		$nome = $_POST['nome'];
		//idadmim, nome, CPF, telefone, celular, email, senha, foto
        $ObjAdmin = BuscarAdmin($nome);
        echo " <table border='1'>
                   <tr>
                    <th>Código</th>
                     <th>Nome</th>
					 <th>CPF</th>
					 <th>Telefone</th>
					 <th>Celular</th>
					 <th>E-mail</th>
					 <th>Senha</th>
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
            echo'<td>' . $administrador['senha'] . '</td>';
			echo'<td>' . $administrador['foto'] . '</td>';
			echo'</tr>';
			echo'<tr>';
            echo'<td align=center colspan = 8 ><a href=editAdmin.php?idadmim=' . $administrador['idadmim'] . '>Atualizar Cadastro</a></td>';
            echo'</tr>';
        }
    }
?>


<?php
	include_once "../rodape.php";
?>
