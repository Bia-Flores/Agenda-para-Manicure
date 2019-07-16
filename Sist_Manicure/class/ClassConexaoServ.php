<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # # # TABELA SERVIÇOS # # # # # # # # //
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


// # # # # # # PARA LISTAR SERVIÇO # # # # # # //
function BuscarServico($descricao) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idserv, descricao FROM servico WHERE descricao LIKE '%{$descricao}%'";
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


// # # # # # PARA BUSCAR OS SERVIÇO POR CÓDIGO # # # # # //
//idserv, descricao
function BuscaRegServico($idserv) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idserv, descricao FROM servico WHERE idserv = :idserv";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idclie", $idclie);

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



// # # # # # # # # TABELA TIPOS DE SERVIÇOS # # # # # # # # //
// # # # # # # PARA CADASTRAR TIPOS DE SERVIÇOS # # # # # # //
function CadastroTipoServ($idtipo, $idservico, $descricao){
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


// # # # # # # PARA LISTAR TIPO DE SERVIÇO # # # # # # //
function BuscarTipoServ($descricao) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idtipo, idservico, descricao FROM tiposervico WHERE descricao LIKE '%{$descricao}%'";
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

//******************************************************************************************************

// # # # # # PARA BUSCAR OS SERVIÇO POR CÓDIGO # # # # # //
//idserv, descricao
function BuscaRegTipoServ($idserv) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idserv, descricao FROM servico WHERE idserv = :idserv";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idclie", $idclie);

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
