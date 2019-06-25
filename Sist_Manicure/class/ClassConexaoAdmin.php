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

// # # # # # # PARA LISTAR ADMINISTRADOR # # # # # # //
function BuscarAdmin($nome) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        //idadmim, nome, CPF, telefone, celular, email, senha, foto
		$sql = "SELECT idadmim, nome, CPF, telefone, celular, email, senha, foto FROM administrador WHERE nome LIKE '%{$nome}%'";
        $preparedStatment = $connection->prepare($sql);

        if ($preparedStatment->execute() == TRUE) {
            return $preparedStatment->fetchAll();
        } else {
            return array();
        }
    } catch (PDOException $exc) {
        if ((isset($connection)) && ($connection->inTransaction())) {
            $connection->rollBack();
        }
        return array();
    } finally {
        if (isset($connection)) {
            unset($connection);
        }
    }
}