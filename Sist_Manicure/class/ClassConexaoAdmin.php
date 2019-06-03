<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # PARA CADASTRAR NOVO ADMINISTRADOR # # # # # # //
function CadastraAdmin($nome, $CPF, $telefone, $celular, $email, $senha, $foto){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO administrador (nome, CPF, telefone, celular, email, senha, foto) VALUES (:nome, :CPF, :telefone, :celular, :email, :senha, :foto)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":nome", $nome);
		$preparedStatment->bindParam(":CPF", $CPF);
		$preparedStatment->bindParam(":telefone", $telefone);
		$preparedStatment->bindParam(":celular", $celular);
		$preparedStatment->bindParam(":email", $email);
		$preparedStatment->bindParam(":senha", $senha);
		$preparedStatment->bindParam(":foto", $foto);
		$executionResult = $preparedStatment->execute();
		$connection->commit();
		
		if ($executionResult == true){
			return true;
		}
		throw new PDOException();
	}	
	catch (PDOException $exc){
		if ((isset($connection)) && ($connection->inTransaction())){
			$connection->roolBack();
		}
		print($exc->getMessage());
		return false;
	}
	finally{
		if (isset($connection)){
			unset($connection);
		}
	}
}