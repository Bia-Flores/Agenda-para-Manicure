<?php
// # # # # # # CLASSE CONEXÃO COM O BANCO DE DADOS "AGENDA" # # # # # # //
// # # # # # # PARA CADASTRAR NOVO CLIENTE # # # # # # //
function CadastraCliente($nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto){
	$connection;
	try{		
		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
		$connection->beginTransaction();
		$sql = "INSERT INTO cliente (nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto) VALUES (:nome, :CPF, :RG, :CEP, :endereco, :cidade, :UF, :telefone, :celular, :email, :senha, :foto)";
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

// # # # # # # PARA LISTAR CLIENTE # # # # # # //
function BuscarCliente($nome) {
    $connection;
    try {
   		$connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idclie, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto FROM cliente WHERE nome LIKE '%{$nome}%'";
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

// # # # # # PARA BUSCAR OS DADOS POR CÓDIGO NA TABELA CLIENTES # # # # # //
//idclie $nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto
function BuscaRegCliente($idclie) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $sql = "SELECT idclie, nome, CPF, RG, CEP, endereco, cidade, UF, telefone, celular, email, senha, foto FROM cliente WHERE idclie = :idclie";
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

// # # # # # FUNÇÃO PARA ALTERAR OS DADOS DA TABELA CLIENTES # # # # # //
//idclie $nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto
function AlterarCliente($idclie, $nome, $CPF, $RG, $CEP, $endereco, $cidade, $UF, $telefone, $celular, $email, $senha, $foto) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        $connection->beginTransaction();
		$sql = "UPDATE cliente SET nome = :nome, CPF = :CPF, RG = :RG, CEP = :CEP, endereco = :endereco, cidade = :cidade, UF = :UF, telefone = :telefone, celular = :celular, email = :email, senha = :senha, foto = :foto";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":idclie", $idclie);
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

