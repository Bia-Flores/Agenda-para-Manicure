<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # PARA CADASTRAR NOVO PROFISSIONAL # # # # # # //
function CadastraPrest($nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto, $idservico){
	$connection;
	try{		
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO prestador (nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico) VALUES (:nome, :CPF, :RG, :CEP, :endereco, :cidade, :UF, :telefone, :celular, :email, :senha, :foto, :idservico)";
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


// # # # # # # PARA LISTAR PROFISSIONAL # # # # # # //
function BuscarPrest($nome) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		
        $sql = "SELECT idprest, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico FROM prestador WHERE nome LIKE '%{$nome}%'";
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



// # # # # # PARA BUSCAR OS DADOS POR CÓDIGO NA TABELA PRESTADOR # # # # # //
//idprest, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico
function BuscaRegPrest($idprest) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idprest, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico FROM prestador WHERE idprest = :idprest";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idprest", $idprest);

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

// # # # # # FUNÇÃO PARA ALTERAR OS DADOS DA TABELA PRESTADOR # # # # # //
//idprest, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto, idservico
function AlterarPrest($idprest, $nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto, $idservico) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $connection->beginTransaction();
		$sql = "UPDATE prestador SET nome = :nome, CPF = :CPF, RG = :RG, CEP = :CEP, endereco = :endereco, cidade = :cidade, UF = :UF, telefone = :telefone, celular = :celular, email = :email, senha = :senha, foto = :foto, idservico = :idservico WHERE idprest = :idprest";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idprest", $idprest);
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
		$preparedStatment->execute();
        $executionResult = $preparedStatment->execute();
        $connection->commit();

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


// # # # # FUNÇÃO PARA EXCLUIR CADASTRO DE PRESTADOR DE SERVIÇO # # # # # //
function ApagarPrest($idprest) {
    $connection;

    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$sql = "DELETE FROM prestador WHERE idprest = $idprest";
        $preparedStatment = $connection->prepare($sql);
		
		
        if ($preparedStatment->execute() == TRUE) {
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

