<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # PARA CADASTRAR SERVIÇOS # # # # # # //
function CadastraServ($descricao){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO servico (descricao) VALUES (:descricao)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":descricao", $descricao);
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

// # # # # # # PARA CADASTRAR TIPOS DE SERVIÇOS # # # # # # //
function CadastroTipoServ($idservico, $descricao){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO tipoServico (idservico, descricao) VALUES (:idservico, :descricao)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":idservico", $idservico);
		$preparedStatment->bindParam(":descricao", $descricao);
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