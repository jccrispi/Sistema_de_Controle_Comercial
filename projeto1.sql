-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2016 às 05:30
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `altera`
--

CREATE TABLE `altera` (
  `qtdecompra` int(11) NOT NULL,
  `cod_compra` int(11) NOT NULL,
  `cod_mercadcomp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `altera`
--

INSERT INTO `altera` (`qtdecompra`, `cod_compra`, `cod_mercadcomp`) VALUES
(250, 38, 1),
(300, 38, 2),
(76, 39, 10),
(176, 40, 5),
(229, 40, 4),
(39, 40, 3),
(7, 40, 7),
(27, 41, 11),
(5, 42, 3),
(20, 43, 12),
(15, 2, 14),
(133, 2, 16),
(30, 3, 18),
(500, 3, 16),
(80, 3, 15),
(50, 5, 14),
(80, 5, 17),
(250, 38, 1),
(300, 38, 2),
(76, 39, 10),
(176, 40, 5),
(229, 40, 4),
(39, 40, 3),
(7, 40, 7),
(27, 41, 11),
(5, 42, 3),
(20, 43, 12),
(15, 2, 14),
(133, 2, 16),
(30, 3, 18),
(500, 3, 16),
(80, 3, 15),
(50, 5, 14),
(80, 5, 17),
(250, 38, 1),
(300, 38, 2),
(76, 39, 10),
(176, 40, 5),
(229, 40, 4),
(39, 40, 3),
(7, 40, 7),
(27, 41, 11),
(5, 42, 3),
(20, 43, 12),
(15, 2, 14),
(133, 2, 16),
(30, 3, 18),
(500, 3, 16),
(80, 3, 15),
(50, 5, 14),
(80, 5, 17),
(250, 38, 1),
(300, 38, 2),
(76, 39, 10),
(176, 40, 5),
(229, 40, 4),
(39, 40, 3),
(7, 40, 7),
(27, 41, 11),
(5, 42, 3),
(20, 43, 12),
(15, 2, 14),
(133, 2, 16),
(30, 3, 18),
(500, 3, 16),
(80, 3, 15),
(50, 5, 14),
(80, 5, 17),
(250, 38, 1),
(300, 38, 2),
(76, 39, 10),
(176, 40, 5),
(229, 40, 4),
(39, 40, 3),
(7, 40, 7),
(27, 41, 11),
(5, 42, 3),
(20, 43, 12),
(15, 2, 14),
(133, 2, 16),
(30, 3, 18),
(500, 3, 16),
(80, 3, 15),
(50, 5, 14),
(80, 5, 17);

--
-- Acionadores `altera`
--
DELIMITER $$
CREATE TRIGGER `tgr_delete_onaltera` AFTER DELETE ON `altera` FOR EACH ROW begin
update mercadoria set qtdemercad = qtdemercad - old.qtdecompra
where codigomercad = old.cod_mercadcomp;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgr_insert_onaltera` AFTER INSERT ON `altera` FOR EACH ROW update mercadoria set qtdemercad = qtdemercad + new.qtdecompra
where codigomercad = new.cod_mercadcomp
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgr_update_inaltera` AFTER UPDATE ON `altera` FOR EACH ROW begin
update mercadoria set qtdemercad = qtdemercad - old.qtdecompra where codigomercad = 

old.cod_mercadcomp;
update mercadoria set qtdemercad = qtdemercad + new.qtdecompra where codigomercad = 

new.cod_mercadcomp;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `codigocid` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`codigocid`, `nome`) VALUES
(26, 'Albany'),
(12, 'Boston'),
(4, 'Caldas Novas'),
(9, 'Chicago'),
(23, 'Florianópolis'),
(1, 'Goiânia'),
(27, 'Great Falls'),
(17, 'Kiev'),
(20, 'Kingston'),
(15, 'Londres'),
(11, 'Los Angeles'),
(16, 'Madrid'),
(19, 'Miami'),
(24, 'Montreal'),
(21, 'Moscou'),
(13, 'Nova Dheli'),
(10, 'Nova York'),
(22, 'Paris'),
(25, 'Portland'),
(5, 'São Paulo'),
(14, 'Tokio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cnpjcli` bigint(20) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inscricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cnpjcli`, `nome`, `rua`, `numero`, `bairro`, `cep`, `inscricao`, `cod_cid`) VALUES
(5689822, 'David Waren', 'Square', '4855656', 'Bronx', '56222', '25884225', 10),
(654899132, 'David Cameron', 'Circle', '485', 'Point', '55822', '25884225', 12),
(566497000158, 'Manoel Silva', 'Lua Nova', '657', 'Salim', '65788-750', '6546500', 14),
(654011000158, 'Harrison Willis', 'Black', '564', 'River', '6546598', '56564988946', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consome`
--

CREATE TABLE `consome` (
  `cod_mercad` int(11) NOT NULL,
  `cod_vendamercad` int(11) NOT NULL,
  `qtdemercvenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `consome`
--

INSERT INTO `consome` (`cod_mercad`, `cod_vendamercad`, `qtdemercvenda`) VALUES
(11, 30, 3),
(2, 31, 2),
(12, 33, 2),
(3, 36, 2),
(5, 36, 1),
(17, 9, 3),
(18, 9, 8),
(17, 10, 5),
(16, 10, 9),
(15, 17, 1),
(17, 18, 15),
(17, 19, 8);

--
-- Acionadores `consome`
--
DELIMITER $$
CREATE TRIGGER `tgr_delete_inconsome` AFTER DELETE ON `consome` FOR EACH ROW begin
update mercadoria set qtdemercad = qtdemercad + old.qtdemercvenda where codigomercad = old.cod_mercad;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgr_insert_onconsome` AFTER INSERT ON `consome` FOR EACH ROW begin
update mercadoria set qtdemercad = qtdemercad - new.qtdemercvenda
where codigomercad = new.cod_mercad;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgr_update_inconsome` AFTER UPDATE ON `consome` FOR EACH ROW begin
update mercadoria set qtdemercad = qtdemercad + old.qtdemercvenda where codigomercad = old.cod_mercad;
update mercadoria set qtdemercad = qtdemercad - new.qtdemercvenda where codigomercad = new.cod_mercad;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpjforn` bigint(20) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inscricaoforn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cnpjforn`, `nome`, `rua`, `numero`, `bairro`, `cep`, `inscricaoforn`, `cod_cid`) VALUES
(88888888, 'Jake Smith Roe', 'Ashley', '56', 'Jason', '556465', '582254', 19),
(567981000154, 'Net Work Servidores S/A', 'Alagados', '654', 'Suave', '74657-578', '6547981654', 1),
(581475000179, 'Diacono Assistance Ltda.', 'Fugas', '6579', 'Setentrional', '55887-550', '65540014', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornvende`
--

CREATE TABLE `fornvende` (
  `codcompra` int(11) NOT NULL,
  `cnpj_forn` bigint(20) NOT NULL,
  `hrcompra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtcompra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_funccompra` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornvende`
--

INSERT INTO `fornvende` (`codcompra`, `cnpj_forn`, `hrcompra`, `dtcompra`, `cpf_funccompra`) VALUES
(2, 88888888, '22:23:26', '11/09/2016', 12345),
(3, 567981000154, '22:29:06', '11/09/2016', 12345),
(4, 567981000154, '22:30:39', '11/09/2016', 12345),
(5, 581475000179, '22:33:52', '11/09/2016', 12345),
(7, 581475000179, '22:43:11', '11/09/2016', 12345);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpffunc` bigint(20) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpffunc`, `nome`, `rua`, `numero`, `bairro`, `cep`, `rg`, `cod_cid`) VALUES
(12345, 'user', 'Yellow', '45', 'Nyagara', '65465', '56498', 25),
(58225, 'Jake Roe', 'Here', '25252525', 'More', '58885', '1010101010', 14),
(58825, 'Petter', 'Brown', '58', 'Water', '582222', '8812', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `cod` int(11) NOT NULL,
  `numcpf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`cod`, `numcpf`) VALUES
(1, 12345);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE `mercadoria` (
  `codigomercad` int(11) NOT NULL,
  `qtdemercad` int(11) DEFAULT '0',
  `descricaomercad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precmercad` decimal(10,2) NOT NULL,
  `preccusto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`codigomercad`, `qtdemercad`, `descricaomercad`, `precmercad`, `preccusto`) VALUES
(14, 325, 'Keyboard', '30.00', '15.00'),
(15, 399, 'Motherboard', '300.00', '210.00'),
(16, 3156, 'Hard Drive - 1 TB', '220.00', '120.00'),
(17, 369, 'Video Card', '400.00', '250.00'),
(18, 142, 'Antenna', '30.00', '15.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recai`
--

CREATE TABLE `recai` (
  `codservico` int(11) NOT NULL,
  `codvenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `recai`
--

INSERT INTO `recai` (`codservico`, `codvenda`) VALUES
(2, 30),
(2, 31),
(9, 9),
(10, 10),
(12, 10),
(10, 18),
(9, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codigoserv` int(11) NOT NULL,
  `descricaoserv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precserv` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`codigoserv`, `descricaoserv`, `precserv`) VALUES
(9, 'Cleaning the server', '100.00'),
(10, 'Replacing of power supplier', '60.00'),
(12, 'Replacing of video card', '45.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `codigovend` int(11) NOT NULL,
  `preventrega` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtvenda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hrvenda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_func` bigint(20) NOT NULL,
  `cnpj_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`codigovend`, `preventrega`, `dtvenda`, `hrvenda`, `cpf_func`, `cnpj_cliente`) VALUES
(3, '12/16/2016', '11/09/2016', '23:11:44', 12345, 5689822),
(4, '', '11/09/2016', '23:13:36', 12345, 5689822),
(5, '', '11/09/2016', '23:13:43', 12345, 5689822),
(6, '', '11/09/2016', '23:14:52', 12345, 566497000158),
(7, '', '11/09/2016', '23:15:41', 12345, 5689822),
(8, '05/12/16', '11/09/2016', '23:17:32', 12345, 654899132),
(9, '05/12/16', '11/09/2016', '23:17:55', 12345, 654899132),
(10, '05/01/17', '11/09/2016', '23:32:13', 12345, 654011000158),
(16, '', '11/09/2016', '23:43:58', 12345, 566497000158),
(17, '5/01/2017', '11/09/2016', '23:49:19', 12345, 5689822),
(18, '', '11/09/2016', '23:50:24', 12345, 5689822),
(19, '', '11/09/2016', '23:51:20', 12345, 5689822);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `altera`
--
ALTER TABLE `altera`
  ADD KEY `cod_mercadcomp` (`cod_mercadcomp`),
  ADD KEY `cod_compra` (`cod_compra`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`codigocid`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cnpjcli`),
  ADD UNIQUE KEY `cnpjcli` (`cnpjcli`),
  ADD KEY `cod_cid` (`cod_cid`);

--
-- Indexes for table `consome`
--
ALTER TABLE `consome`
  ADD KEY `cod_mercad` (`cod_mercad`),
  ADD KEY `cod_vendamercad` (`cod_vendamercad`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpjforn`),
  ADD UNIQUE KEY `cnpjforn` (`cnpjforn`),
  ADD KEY `cod_cid` (`cod_cid`);

--
-- Indexes for table `fornvende`
--
ALTER TABLE `fornvende`
  ADD PRIMARY KEY (`codcompra`),
  ADD KEY `cnpj_forn` (`cnpj_forn`),
  ADD KEY `cpf_funccompra` (`cpf_funccompra`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpffunc`),
  ADD UNIQUE KEY `cpffunc` (`cpffunc`),
  ADD KEY `cod_cid` (`cod_cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `mercadoria`
--
ALTER TABLE `mercadoria`
  ADD PRIMARY KEY (`codigomercad`);

--
-- Indexes for table `recai`
--
ALTER TABLE `recai`
  ADD KEY `codservico` (`codservico`),
  ADD KEY `codvenda` (`codvenda`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`codigoserv`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`codigovend`),
  ADD KEY `cpf_func` (`cpf_func`),
  ADD KEY `cnpj_cliente` (`cnpj_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `codigocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `fornvende`
--
ALTER TABLE `fornvende`
  MODIFY `codcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mercadoria`
--
ALTER TABLE `mercadoria`
  MODIFY `codigomercad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `codigoserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `codigovend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_cid`) REFERENCES `cidade` (`codigocid`);

--
-- Limitadores para a tabela `consome`
--
ALTER TABLE `consome`
  ADD CONSTRAINT `consome_ibfk_1` FOREIGN KEY (`cod_mercad`) REFERENCES `mercadoria` (`codigomercad`),
  ADD CONSTRAINT `consome_ibfk_2` FOREIGN KEY (`cod_vendamercad`) REFERENCES `venda` (`codigovend`);

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`cod_cid`) REFERENCES `cidade` (`codigocid`);

--
-- Limitadores para a tabela `fornvende`
--
ALTER TABLE `fornvende`
  ADD CONSTRAINT `fornvende_ibfk_1` FOREIGN KEY (`cnpj_forn`) REFERENCES `fornecedor` (`cnpjforn`),
  ADD CONSTRAINT `fornvende_ibfk_2` FOREIGN KEY (`cpf_funccompra`) REFERENCES `funcionario` (`cpffunc`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cod_cid`) REFERENCES `cidade` (`codigocid`);

--
-- Limitadores para a tabela `recai`
--
ALTER TABLE `recai`
  ADD CONSTRAINT `recai_ibfk_1` FOREIGN KEY (`codservico`) REFERENCES `servico` (`codigoserv`),
  ADD CONSTRAINT `recai_ibfk_2` FOREIGN KEY (`codvenda`) REFERENCES `venda` (`codigovend`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`cpf_func`) REFERENCES `funcionario` (`cpffunc`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`cnpj_cliente`) REFERENCES `cliente` (`cnpjcli`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
