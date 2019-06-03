<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # PARA CADASTRAR NOVO PROFISSIONAL # # # # # # //
function CadastraPrest($nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto, $idservico){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO prestador (nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico) VALUES (:nome, :CPF, :RG, :CEP, :endereco, :cidade, :UF, :telefone, :celular, :email, ;senha, :foto, :idservico)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":nome", $nome);
		$preparedStatment->bindParam(":CPF", $CPF);
		$preparedStatment->bindParam(":RG", $RG);
		$preparedStatment->bindParam(":CEP", $CEP);
		$preparedStatment->bindParam(":endereco", $endereco);
		$preparedStatment->bindParam(":cidade", $cidade);
		$preparedStatment->bindParam(":UF", $UF);
		$preparedStatment->bindParam(":telefone", $telefone);
		$preparedStatment->bindParam(":celular", $celular);
		$preparedStatment->bindParam(":email", $email);
		$preparedStatment->bindParam(":senha", $senha);
		$preparedStatment->bindParam(":foto", $foto);
		$preparedStatment->bindParam(":idservico", $idservico);
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