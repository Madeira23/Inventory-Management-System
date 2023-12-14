-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2023 às 16:13
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

INSERT INTO `componentes` (`ID`, `Tipo`, `Marca`, `Modelo`, `Capacidade`, `Velocidade`, `Potencia`, `Cor`, `Preco`, `DataLancamento`) VALUES
(2, 'Placa Gráfica', 'NVIDIA', 'GeForce RTX 3080', 10, '213', 123, 'pleto', '823.51', '2022-02-15'),
(3, 'Motherboard', 'ASUS', 'ROG Strix B550-F', 213, '231', 123, 'amarelo', '200.00', '2022-03-10'),
(4, 'Disco', 'Samsung', '970 EVO Plus', 500, '123', 123, 'branquinho', '120.00', '2022-04-05'),
(12, 'Processador', 'Intel', 'i5 12400F', 2203947, '12370', 23498, 'arco-iris', '169.99', '2023-12-14'),
(13, 'Processador', 'Amd', '123', 123, '123', 1234354, 'amarelo', '77777.00', '2023-12-27'),
(14, 'Processador', 'Amd', '123', 123, '123', 1234354, 'amarelo', '77777.00', '2023-12-27'),
(15, 'Processador', 'Amd', '123', 123, '123', 1234354, 'amarelo', '77777.00', '2023-12-27'),
(16, 'Processador', 'Amd', '123', 123, '123', 1234354, 'amarelo', '77777.00', '2023-12-27');

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
(6, 'Edição', '2023-12-14', '14:16:46', 3, 'Diogo Paulos', 4),
(9, 'Adição', '2023-12-14', '14:44:41', 3, 'Diogo Paulos', NULL);

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
(3, 'Diogo Paulos', 'dpaulos', '12345678', 0);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
