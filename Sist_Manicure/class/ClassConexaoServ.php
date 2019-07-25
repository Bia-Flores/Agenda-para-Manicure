<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # # # TABELA SERVIÇOS # # # # # # # # //
// # # # # # # PARA CADASTRAR SERVIÇOS # # # # # # //
function CadastraServ($NomeDesc){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO servico (NomeDesc) VALUES (:NomeDesc)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":NomeDesc", $NomeDesc);
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
function BusServico($NomeDesc) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idserv, NomeDesc FROM servico WHERE NomeDesc LIKE '%{$NomeDesc}%'";
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
function BusRegServ($idserv) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idserv, NomeDesc FROM servico WHERE idserv = :idserv";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idserv", $idserv);

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


// # # # # # FUNÇÃO PARA EDITAR TIPOS DE SERVIÇOS # # # # # //
function AltServico($idserv, $NomeDesc) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $connection->beginTransaction();
        $sql = "UPDATE servico SET NomeDesc = :NomeDesc WHERE idserv = :idserv";
		$preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idserv", $idserv);
        $preparedStatment->bindParam(":NomeDesc", $NomeDesc);
		$preparedStatment->execute();
        $executionResult = $preparedStatment->execute();
        $connection->commit();

		//var_dump ($sql);
		
	} catch (PDOException $exc) {
		if ((isset($connection)) && ($connection->inTransaction())) {
			$connection->rollBack();
		}
		print $exc->getMessage();
	} finally {
		if (isset($connection)) {
			unset($connection);
		}
	}
}

// # # # # FUNÇÃO PARA APAGAR # # # # # //
function ApagarServ($idserv) {
    $connection;

    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$sql = "DELETE FROM servico WHERE idserv = $idserv";
        $preparedStatment = $connection->prepare($sql);
				
        if ($preparedStatment->execute() == TRUE) {
            //return $preparedStatment->fetchAll();
			return TRUE;
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

/* # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
* * * * * * * * * * * TABELA TIPOS DE SERVIÇOS * * * * * * * * * *
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # */


// # # # # # # PARA CADASTRAR TIPOS DE SERVIÇOS # # # # # # //
function CadastroTipoServ($idservico, $descrTipo){
	$connection;
	try{
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO tiposervico (idservico, descrTipo) VALUES (:idservico, :descrTipo)";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":idservico", $idservico);
		$preparedStatment->bindParam(":descrTipo", $descrTipo);
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
function BusTipoServ($descrTipo) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idtipo, idservico, descrTipo FROM tiposervico WHERE descrTipo LIKE '%{$descrTipo}%'";
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
function BusRegTipoServ($idtipo) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idtipo, idservico, descrTipo FROM tiposervico WHERE idtipo = :idtipo";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idtipo", $idtipo);

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


// # # # # # FUNÇÃO PARA EDITAR TIPOS DE SERVIÇOS # # # # # //
function AltTipServ($idtipo, $idservico, $descrTipo) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $connection->beginTransaction();
        $sql = "UPDATE tiposervico SET idservico = :idservico, descrTipo = :descrTipo WHERE idtipo = :idtipo";
		$preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idtipo", $idtipo);
        $preparedStatment->bindParam(":idservico", $idservico);
        $preparedStatment->bindParam(":descrTipo", $descrTipo);
		$preparedStatment->execute();
        $executionResult = $preparedStatment->execute();
        $connection->commit();

		//var_dump ($sql);
		
	} catch (PDOException $exc) {
		if ((isset($connection)) && ($connection->inTransaction())) {
			$connection->rollBack();
		}
		print $exc->getMessage();
	} finally {
		if (isset($connection)) {
			unset($connection);
		}
	}
}


// # # # # FUNÇÃO PARA APAGAR # # # # # //
function ApagarTipoServ($idtipo) {
    $connection;

    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$sql = "DELETE FROM tiposervico WHERE idtipo = $idtipo";
        $preparedStatment = $connection->prepare($sql);
		//$preparedStatment->bindParam(":idadmim", $idadmim);
		
		
        if ($preparedStatment->execute() == TRUE) {
            //return $preparedStatment->fetchAll();
			return TRUE;
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

