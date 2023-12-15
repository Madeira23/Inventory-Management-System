-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Dez-2023 às 16:32
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestaostock`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `componentes`
--

CREATE TABLE `componentes` (
  `ID` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Modelo` varchar(50) DEFAULT NULL,
  `Quantidade` int(11) NOT NULL,
  `Capacidade` int(11) DEFAULT NULL,
  `Velocidade` varchar(20) DEFAULT NULL,
  `Potencia` int(11) DEFAULT NULL,
  `Cor` varchar(20) DEFAULT NULL,
  `Preco` decimal(10,2) DEFAULT NULL,
  `DataLancamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `componentes`
--

INSERT INTO `componentes` (`ID`, `Tipo`, `Marca`, `Modelo`, `Quantidade`, `Capacidade`, `Velocidade`, `Potencia`, `Cor`, `Preco`, `DataLancamento`) VALUES
(2, 'Placa Gráfica', 'NVIDIA', 'GeForce RTX 3080', 10, 10, '213', 123, 'pleto', '823.52', '2022-02-15'),
(3, 'Motherboard', 'ASUS', 'ROG Strix B550-F', 5, 213, '231', 123, 'amarelo', '200.00', '2022-03-10'),
(18, 'Disco', 'Samsung', 'SSD', 5, 1000, '10', 10, 'cinzento', '50.00', '2023-02-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE `movimentos` (
  `id` int(11) NOT NULL,
  `movimento` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `funcionario_nome` varchar(255) NOT NULL,
  `componente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id`, `movimento`, `data`, `hora`, `funcionario_id`, `funcionario_nome`, `componente_id`) VALUES
(2, 'Edição', '2023-12-14', '14:08:14', 3, 'Diogo Paulos', 2),
(5, 'Edição', '2023-12-14', '14:16:21', 3, 'Diogo Paulos', 3),
(6, 'Edição', '2023-12-14', '14:16:46', 3, 'Diogo Paulos', NULL),
(9, 'Adição', '2023-12-14', '14:44:41', 3, 'Diogo Paulos', NULL),
(10, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(11, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(12, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(13, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(14, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(15, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(16, 'Adição', '2023-12-14', '16:39:45', 3, 'Diogo Paulos', NULL),
(17, 'Edição', '2023-12-15', '14:28:35', 2, 'Admin Teste', NULL),
(18, 'Edição', '2023-12-15', '14:32:38', 1, 'Funcionário Teste', NULL),
(19, 'Edição', '2023-12-15', '14:32:50', 1, 'Funcionário Teste', NULL),
(20, 'Remoção', '2023-12-15', '14:34:04', 2, 'Admin Teste', NULL),
(21, 'Remoção', '2023-12-15', '14:34:07', 2, 'Admin Teste', NULL),
(22, 'Remoção', '2023-12-15', '14:34:43', 2, 'Admin Teste', NULL),
(23, 'Remoção', '2023-12-15', '14:34:48', 2, 'Admin Teste', NULL),
(24, 'Remoção', '2023-12-15', '14:35:59', 2, 'Admin Teste', NULL),
(25, 'Remoção', '2023-12-15', '14:36:13', 2, 'Admin Teste', NULL),
(26, 'Remoção', '2023-12-15', '14:36:22', 2, 'Admin Teste', NULL),
(27, 'Remoção', '2023-12-15', '14:40:40', 2, 'Admin Teste', NULL),
(28, 'Remoção', '2023-12-15', '14:41:11', 2, 'Admin Teste', NULL),
(29, 'Remoção', '2023-12-15', '14:41:19', 2, 'Admin Teste', NULL),
(30, 'Remoção', '2023-12-15', '14:47:52', 2, 'Admin Teste', NULL),
(31, 'Remoção', '2023-12-15', '14:48:02', 2, 'Admin Teste', NULL),
(32, 'Remoção', '2023-12-15', '14:49:18', 2, 'Admin Teste', NULL),
(33, 'Remoção', '2023-12-15', '14:49:22', 2, 'Admin Teste', NULL),
(34, 'Remoção', '2023-12-15', '14:49:27', 2, 'Admin Teste', NULL),
(35, 'Remoção', '2023-12-15', '14:49:32', 2, 'Admin Teste', NULL),
(36, 'Remoção', '2023-12-15', '14:49:41', 2, 'Admin Teste', NULL),
(37, 'Remoção', '2023-12-15', '14:49:44', 2, 'Admin Teste', NULL),
(38, 'Remoção', '2023-12-15', '14:49:45', 2, 'Admin Teste', NULL),
(39, 'Remoção', '2023-12-15', '14:49:46', 2, 'Admin Teste', NULL),
(40, 'Remoção', '2023-12-15', '14:49:52', 2, 'Admin Teste', NULL),
(41, 'Remoção', '2023-12-15', '14:50:14', 2, 'Admin Teste', NULL),
(42, 'Remoção', '2023-12-15', '14:51:00', 2, 'Admin Teste', NULL),
(43, 'Remoção', '2023-12-15', '14:57:33', 2, 'Admin Teste', NULL),
(44, 'Remoção', '2023-12-15', '14:58:45', 2, 'Admin Teste', NULL),
(45, 'Remoção', '2023-12-15', '15:00:03', 2, 'Admin Teste', NULL),
(46, 'Adição', '2023-12-15', '15:08:31', 2, 'Admin Teste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nome`, `username`, `senha`, `IsAdmin`) VALUES
(1, 'Funcionário Teste', 'funcionario', 'senha_funcionario', 0),
(2, 'Admin Teste', 'admin', 'senha_admin', 1),
(3, 'Diogo Paulos', 'dpaulos', '12345678', 0),
(7, 'Pedro', 'pedra', '$2y$10$Q6oU/8Vb8l6lB4QG62dxpupk1CfkfTLtNtpWEweX868sRHlgWgjSO', 0),
(8, 'Pedro', 'pedra', '$2y$10$pYf5gMyeDDSHVrquKaK8qubLtIPnt4TsVG8dkkiZLRoYCOQ6UpiAG', 0),
(9, 'Pedro', 'pedra', '$2y$10$EkrIpqybJMxHtP5.swWnTe3MFM0km5tiO8j39ZZ.ESMyQlMms6Y5a', 0),
(10, 'teste', 'teste', '$2y$10$FyVdsuMI8KMUGN.57Txfs.oJXEcCcIRDGoyT.XSPjU2qVnMpqBVSO', 1),
(11, 'teste', 'teste', '$2y$10$DQbaIXmhrvI5m9bYhTfACenAZ3188tZbwtmGgDuCGiiTQ1zaMaKuK', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimentos_ibfk_1` (`funcionario_id`),
  ADD KEY `movimentos_ibfk_2` (`componente_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `componentes`
--
ALTER TABLE `componentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD CONSTRAINT `movimentos_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `usuarios` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `movimentos_ibfk_2` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
