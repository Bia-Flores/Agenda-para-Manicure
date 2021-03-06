-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jul-2019 às 03:35
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `idadmim` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idadmim`, `nome`, `CPF`, `telefone`, `celular`, `email`, `senha`, `foto`) VALUES
(1, 'Admin Teste', '000.000.000-00', '0123456789', '55 991010203', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'abc'),
(6, 'Flores', '090.090.090-00', '5532421966', '99999-3456', 'byaflores@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(8, 'Lucelia Linda', '020.807.220-93', '5532421966', '55 992325432', 'lucelia.vieiraa@hotmail.com', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idclie` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(10) DEFAULT NULL,
  `CEP` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(75) NOT NULL,
  `UF` char(2) DEFAULT NULL,
  `telefone` char(14) DEFAULT NULL,
  `celular` char(15) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idclie`, `nome`, `CPF`, `RG`, `CEP`, `endereco`, `cidade`, `UF`, `telefone`, `celular`, `email`, `senha`, `foto`) VALUES
(1, 'Carla Ribeiro', '014.025.036-00', '0001144778', '97584-222', 'Rua Sorria', 'Santana', 'RS', '5532421966', '99999-3456', 'carla@gmail.com', '12345', 'asdf'),
(2, 'Aninha Pereira Filho', '014.025.036.00', '0147852036', '97584-321', 'Rua Sorria, 200', 'Santana do Livramento', 'RS', '5532421966', '99999-3456', 'aninha@gmail.com', '12345', 'asdf'),
(3, 'Maria de FÃ¡tima Rodrigues Alves', '333.444.222-11', '0987667890', '97570-220', 'Rua Maria, 300', 'Santana do Livramento', 'RS', '5532421966', '55 991010203', 'maria@maria.com', '12345', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `listaserv`
--

CREATE TABLE `listaserv` (
  `idlista` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `idprest` int(11) NOT NULL,
  `valor` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `listaserv_ordem`
--

CREATE TABLE `listaserv_ordem` (
  `Lista_idlista` int(11) NOT NULL,
  `Ordem_idord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem`
--

CREATE TABLE `ordem` (
  `idord` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `agenda` date DEFAULT NULL,
  `valor_total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador`
--

CREATE TABLE `prestador` (
  `idprest` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(10) DEFAULT NULL,
  `CEP` char(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(75) NOT NULL,
  `UF` char(2) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `idservico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prestador`
--

INSERT INTO `prestador` (`idprest`, `nome`, `CPF`, `RG`, `CEP`, `endereco`, `cidade`, `UF`, `telefone`, `celular`, `email`, `senha`, `foto`, `idservico`) VALUES
(1, 'Gabriela Flores', '770.297.980-15', '1122334455', '97574-224', 'Rua TamandarÃ©, 15', 'SÃ£o Vicente do Sul', 'RS', '5532421966', '99999-3456', 'byaflores@gmail.com', '12345', 'abc', 1),
(2, 'Angela Maria Freitas Correia', '159.951.999-88', '1597536541', '97587-254', 'Rua Belizario Freitas, 100', 'Santana do Livramento', 'RS', '5532421966', '55999992321', 'angela@gmail.com', '12345', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idserv` int(11) NOT NULL,
  `NomeDesc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idserv`, `NomeDesc`) VALUES
(1, 'Manicure'),
(2, 'Pedicure'),
(4, 'Pedicure Canino'),
(5, 'Pedicure Teste Testado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposervico`
--

CREATE TABLE `tiposervico` (
  `idtipo` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `descrTipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tiposervico`
--

INSERT INTO `tiposervico` (`idtipo`, `idservico`, `descrTipo`) VALUES
(1, 1, 'Manicure Francesinha - Esmalte Importado'),
(2, 2, 'Pedicure - Francesinha Simples'),
(3, 4, 'Corte e aplicaÃ§Ã£o de base'),
(4, 5, 'Pedicure testando Correto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadmim`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idclie`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Indexes for table `listaserv`
--
ALTER TABLE `listaserv`
  ADD PRIMARY KEY (`idlista`),
  ADD KEY `idtipo` (`idtipo`),
  ADD KEY `idprest` (`idprest`);

--
-- Indexes for table `listaserv_ordem`
--
ALTER TABLE `listaserv_ordem`
  ADD PRIMARY KEY (`Lista_idlista`,`Ordem_idord`),
  ADD KEY `Ordem_idord` (`Ordem_idord`);

--
-- Indexes for table `ordem`
--
ALTER TABLE `ordem`
  ADD PRIMARY KEY (`idord`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indexes for table `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`idprest`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD KEY `idservico` (`idservico`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idserv`);

--
-- Indexes for table `tiposervico`
--
ALTER TABLE `tiposervico`
  ADD PRIMARY KEY (`idtipo`),
  ADD KEY `idservico` (`idservico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadmim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idclie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listaserv`
--
ALTER TABLE `listaserv`
  MODIFY `idlista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordem`
--
ALTER TABLE `ordem`
  MODIFY `idord` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idprest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tiposervico`
--
ALTER TABLE `tiposervico`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `listaserv`
--
ALTER TABLE `listaserv`
  ADD CONSTRAINT `listaserv_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tiposervico` (`idtipo`),
  ADD CONSTRAINT `listaserv_ibfk_2` FOREIGN KEY (`idprest`) REFERENCES `prestador` (`idprest`);

--
-- Limitadores para a tabela `listaserv_ordem`
--
ALTER TABLE `listaserv_ordem`
  ADD CONSTRAINT `listaserv_ordem_ibfk_1` FOREIGN KEY (`Lista_idlista`) REFERENCES `listaserv` (`idlista`),
  ADD CONSTRAINT `listaserv_ordem_ibfk_2` FOREIGN KEY (`Ordem_idord`) REFERENCES `ordem` (`idord`);

--
-- Limitadores para a tabela `ordem`
--
ALTER TABLE `ordem`
  ADD CONSTRAINT `ordem_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idclie`);

--
-- Limitadores para a tabela `prestador`
--
ALTER TABLE `prestador`
  ADD CONSTRAINT `prestador_ibfk_1` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idserv`);

--
-- Limitadores para a tabela `tiposervico`
--
ALTER TABLE `tiposervico`
  ADD CONSTRAINT `tiposervico_ibfk_1` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idserv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
