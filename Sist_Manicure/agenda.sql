-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2019 às 02:40
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
  `senha` varchar(10) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idadmim`, `nome`, `CPF`, `telefone`, `celular`, `email`, `senha`, `foto`) VALUES
(1, 'Beatriz Gabriel Flores', '111.222.333-44', '5532421966', '55 991010203', 'byaflores@gmail.com', '12345', 'abc'),
(2, 'Junior Gabriel Flores', '171.222.341-98', '55 3242-0000', '55 992325432', 'junior@gmail.com', '12345', ''),
(3, 'Lucelita Luluzinha', '000.999.876-12', '55 3241 2525', '55 999992401', 'lulu@gmail.com', '12345', '');

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
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(10) NOT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idclie`, `nome`, `CPF`, `RG`, `CEP`, `endereco`, `cidade`, `UF`, `telefone`, `celular`, `email`, `senha`, `foto`) VALUES
(1, 'Carla Ribeiro', '014.025.036-00', '0001144778', '97584-222', 'Rua Sorria', 'Santana', 'RS', '5532421966', '99999-3456', 'carla@gmail.com', '12345', 'asdf'),
(2, 'Aninha Agora esta correto', '014.025.036.00', '0147852036', '97584-321', 'Rua Sorria', 'Santana', 'RS', '5532421966', '99999-3456', 'aninha@gmail.com', '12345', 'asdf'),
(3, 'Maria de FÃ¡tima Rodrigues', '333.444.222-11', '0987667890', '97570-220', 'Rua Maria', 'Santana do Livramento', 'RS', '5532421966', '55 991010203', 'maria@maria.com', '12345', ''),
(5, 'Musquita Musquiteira', '000.000.999-99', '0000000009', '97543-222', 'Rua das Flores', 'Santana do Livramento', 'RS', '5532421966', '55 991010203', 'musquita@gmail.com', '12345', ''),
(7, 'Aaaaa Baaaaa', '098.098.098-98', '8989898989', '97654-220', 'Rua Alcantara', 'SANTANA DO LIVRAMENTO', 'RS', '5532421966', '55 991010203', 'abcd@gmail.com', '12345', ''),
(8, 'Debora Segui', '222.222.222-44', '1212121212', '97564-009', 'Rua Dom Pedro, 23', 'SANTANA DO LIVRAMENTO', 'RS', '5532421966', '55 999992401', 'debora@gmail.com', '1345', ''),
(10, 'Lucelia', '121.232.343-55', '7865432567', '96010-760', 'Avenida Amazonas,800', 'Pelotas', 'RS', '984697549', '985697549', 'lucelia.vieiraa@hotmail.com', '123456', 'ty.jpg'),
(12, 'Lucia Marinho', '9078654345', '9876543215', '96010-760', 'Avenida Amazonas,800', 'Pelotas', 'RS', '984697549', '984697549', 'lucelia.vieiraa@hotmail.com', '876543', 'RS'),
(15, 'Beatriz Gabriel Flores', '111.111.111-13', '0000000009', '97574-224', 'RUA ALMIRANTE BARROSO', 'SANTANA DO LIVRAMENTO', 'RS', '984697549', '984697549', 'byaflores@gmail.com', '12345', 'er.jpg'),
(17, 'Bia Flores Belas', '528.987.987.09', '0000000090', '97574-224', 'RUA ALMIRANTE BARROSO', 'SANTANA DO LIVRAMENTO', 'RS', '984697549', '984697549', 'byaflores@gmail.com', '12345', 'abc.jpg'),
(18, 'Beatriz Permanece Correto', '111.222.333-90', '1122334459', '97574-224', 'RUA ALMIRANTE BARROSO', 'SANTANA DO LIVRAMENTO', 'RS', '55 3242-0000', '55999992321', 'byaflores@gmail.com', '1234', 'kop.jpg');

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
  `UF` varchar(2) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(10) NOT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `idservico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prestador`
--

INSERT INTO `prestador` (`idprest`, `nome`, `CPF`, `RG`, `CEP`, `endereco`, `cidade`, `UF`, `telefone`, `celular`, `email`, `senha`, `foto`, `idservico`) VALUES
(1, 'Gabriel Flores', '770.297.980-15', '1122334455', '97574-224', 'RUA ALMIRANTE BARROSO', 'SANTANA DO LIVRAMENTO', 'RS', '5532421966', '99999-3456', 'byaflores@gmail.com', '12345', 'abc', 1),
(2, 'Angela Maria Freitas', '159.951.999-88', '1597536541', '97587-254', 'Rua Belizario Freitas, 100', 'Santana do Livramento', 'RS', '5532421966', '55999992321', 'angela@gmail.com', '12345', '', 1),
(3, 'Claudia Alves', '258.852.258-88', '1477411477', '97578-225', 'Rua Bragantino, 200', 'Santana do Livramento', 'RS', '5532421966', '55 991010203', 'claudia@gmail.com', '12345', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idserv` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idserv`, `descricao`) VALUES
(1, 'Manicure'),
(2, 'Pedicure'),
(8, 'PÃ©s limpo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposervico`
--

CREATE TABLE `tiposervico` (
  `idtipo` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tiposervico`
--

INSERT INTO `tiposervico` (`idtipo`, `idservico`, `descricao`) VALUES
(1, 1, 'Manicure Francesinha - Esmalte Importado'),
(3, 1, 'Aplicacao Unhas Posticas'),
(4, 2, 'Francesinha no pé'),
(5, 2, 'Pedicure Francesinha - Esmalte Importado');

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
  MODIFY `idadmim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idclie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `idprest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
