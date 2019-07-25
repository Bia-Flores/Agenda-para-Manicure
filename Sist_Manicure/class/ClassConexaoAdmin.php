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

// # # # # # PARA LISTAR OS DADOS POR CÓDIGO DA TABELA ADMINISTRADOR # # # # # //
function BuscaRegAdmin($idadmim) {
    $connection;
    try {
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idadmim, nome, CPF, telefone, celular, email, senha, foto FROM administrador WHERE idadmim = :idadmim";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idadmim", $idadmim);

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

// # # # # # FUNÇÃO PARA ALTERAR OS DADOS DA TABELA ADMINISTRADOR # # # # # //
//idadmim, nome, CPF, telefone, celular, email, senha, foto
function AlterarAdmin($idadmim, $nome, $CPF, $telefone, $celular, $email, $senha, $foto) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $connection->beginTransaction();
        $sql = "UPDATE administrador SET nome = :nome, CPF = :CPF, telefone = :telefone, celular = :celular, email = :email, senha = :senha, foto = :foto WHERE idadmim = :idadmim";
		$preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idadmim", $idadmim);
        $preparedStatment->bindParam(":nome", $nome);
        $preparedStatment->bindParam(":CPF", $CPF);
		$preparedStatment->bindParam(":telefone", $telefone);
		$preparedStatment->bindParam(":celular", $celular);
		$preparedStatment->bindParam(":email", $email);
		$preparedStatment->bindParam(":senha", $senha);
		$preparedStatment->bindParam(":foto", $foto);
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

// # # # # FUNÇÃO PARA LOGAR ADMINISTRADOR # # # # # //
function LogAdmin($CPF, $senha) {
	$senha_cod = md5($senha); /*variavel comparação*/
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		//$sql = "SELECT CPF, senha FROM administrador WHERE CPF = :CPF AND senha = :senha";
		$sql = "SELECT CPF, senha FROM administrador WHERE CPF = :CPF AND senha = :senha_cod";
        $preparedStatment = $connection->prepare($sql);
		$preparedStatment->bindParam(":CPF", $CPF);
		//$preparedStatment->bindParam(":senha", $senha);
		$preparedStatment->bindParam(":senha_cod", $senha_cod);
		
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

// # # # # FUNÇÃO PARA APAGAR CADASTRO DE ADMINISTRADOR # # # # # //
function ApagarAdmin($idadmim) {
    $connection;

    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$sql = "DELETE FROM administrador WHERE idadmim = $idadmim";
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

