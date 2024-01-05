-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jan-2024 às 14:58
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `componentes`
--

INSERT INTO `componentes` (`ID`, `Tipo`, `Marca`, `Modelo`, `Quantidade`, `Capacidade`, `Velocidade`, `Potencia`, `Cor`, `Preco`, `DataLancamento`) VALUES
(2, 'Placa Gráfica', 'NVIDIA', 'GeForce RTX 3090', 0, 10, '213', 123, 'pleto', 823.52, '2022-02-15'),
(28, 'Processador', 'Intel', 'i5 12700', 1, 123, '123', 123, 'branco', 169.00, '2024-01-05');

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
  `movimento_detalhes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id`, `movimento`, `data`, `hora`, `funcionario_id`, `funcionario_nome`, `movimento_detalhes_id`) VALUES
(83, 'Adição', '2024-01-05', '12:08:11', 3, 'Diogo Paulos', 20),
(84, 'Remoção', '2024-01-05', '12:08:28', 3, 'Diogo Paulos', 21),
(85, 'Edição', '2024-01-05', '12:09:13', 3, 'Diogo Paulos', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_detalhes`
--

CREATE TABLE `movimento_detalhes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `componente_before` varchar(255) NOT NULL,
  `componente_after` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `movimento_detalhes`
--

INSERT INTO `movimento_detalhes` (`id`, `tipo`, `componente_before`, `componente_after`) VALUES
(20, 'Processador', 'Nenhum', 'Intel i5 12400'),
(21, 'Motherboard', 'MSI B760', 'Removido'),
(22, 'Processador', 'Intel i5 12400', 'Intel i5 12700');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `movimentos_ibfk_2` (`movimento_detalhes_id`);

--
-- Índices para tabela `movimento_detalhes`
--
ALTER TABLE `movimento_detalhes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componente_id_after` (`componente_after`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `movimento_detalhes`
--
ALTER TABLE `movimento_detalhes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `movimentos_ibfk_2` FOREIGN KEY (`movimento_detalhes_id`) REFERENCES `movimento_detalhes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
