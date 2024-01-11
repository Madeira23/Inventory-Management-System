-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2024 às 16:42
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
(3, 'Memória RAM', 'Corsair', 'Vengeance LPX 16GB', 50, 16, '3200', NULL, 'preto', '79.99', '2023-05-20'),
(4, 'Disco Rígido', 'Seagate', 'BarraCuda 2TB', 30, 2000, NULL, NULL, 'azul', '54.95', '2023-08-10'),
(5, 'Fonte de Alimentação', 'EVGA', 'SuperNOVA 750W', 15, NULL, NULL, 750, 'prata', '129.99', '2023-03-17'),
(6, 'Placa-Mãe', 'ASUS', 'ROG Strix B550', 20, NULL, NULL, NULL, 'preto', '189.95', '2023-01-30'),
(7, 'Armazenamento SSD', 'Samsung', '970 EVO Plus 500GB', 40, 500, '3500', NULL, 'cinza', '89.99', '2023-06-25'),
(8, 'Cooler de CPU', 'NZXT', 'Kraken X63', 25, NULL, NULL, NULL, 'RGB', '149.99', '2023-04-12'),
(9, 'Placa de Som', 'Creative', 'Sound Blaster Z', 8, NULL, NULL, NULL, 'preto', '99.95', '2023-02-28'),
(11, 'Monitor', 'Dell', 'S2419HGF', 12, NULL, NULL, NULL, 'preto', '179.99', '2023-09-20'),
(12, 'Teclado Mecânico', 'Logitech', 'G Pro X', 25, NULL, NULL, NULL, 'preto', '129.00', '2023-11-10'),
(14, 'Webcam', 'Logitech', 'C920 HD Pro', 10, NULL, NULL, NULL, 'preto', '79.95', '2023-10-22'),
(15, 'Placa de Rede', 'TP-Link', 'Archer T9E', 15, NULL, NULL, NULL, 'preto', '39.99', '2023-08-08'),
(16, 'Cadeira Gamer', 'DXRacer', 'Formula Series', 8, NULL, NULL, NULL, 'vermelho', '299.00', '2023-01-15'),
(17, 'Headset Gamer', 'HyperX', 'Cloud II', 20, NULL, NULL, NULL, 'preto', '89.99', '2023-04-30'),
(18, 'Impressora', 'Epson', 'EcoTank L3150', 12, NULL, NULL, NULL, 'branco', '249.99', '2023-03-05'),
(19, 'Scanner', 'Canon', 'CanoScan LiDE 400', 7, 2321, '213', 123, 'preto', '89.95', '2023-05-18'),
(28, 'Processador', 'Intel', 'i5 12700', 1, 123, '123', 123, 'branco', '169.00', '2024-01-05'),
(30, 'televisor', 'samsung', 'hdd', 2, 500, '100', 50, 'branco', '30.00', '2023-10-04'),
(31, 'monitor', 'asus', 'tmn', 24, 2, '1', 100, 'preto', '234.00', '2024-01-02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id`, `movimento`, `data`, `hora`, `funcionario_id`, `funcionario_nome`, `movimento_detalhes_id`) VALUES
(83, 'Adição', '2024-01-05', '12:08:11', 3, 'Diogo Paulos', 20),
(84, 'Remoção', '2024-01-05', '12:08:28', 3, 'Diogo Paulos', 21),
(85, 'Edição', '2024-01-05', '12:09:13', 3, 'Diogo Paulos', 22),
(86, 'Adição', '2024-01-05', '14:07:27', 2, 'Admin Teste', 23),
(87, 'Remoção', '2024-01-05', '15:40:32', 2, 'Admin Teste', 24),
(88, 'Adição', '2024-01-05', '16:23:09', 1, 'Funcionário Teste', 25),
(89, 'Edição', '2024-01-05', '16:23:48', 1, 'Funcionário Teste', 26),
(90, 'Edição', '2024-01-09', '11:52:03', 2, 'Admin Teste', 27),
(91, 'Remoção', '2024-01-09', '11:52:08', 2, 'Admin Teste', 28),
(92, 'Remoção', '2024-01-09', '11:52:24', 2, 'Admin Teste', 29),
(93, 'Adição', '2024-01-11', '15:14:24', 2, 'Admin Teste', 30),
(94, 'Adição', '2024-01-11', '15:15:16', 2, 'Admin Teste', 31),
(95, 'Remoção', '2024-01-11', '15:18:48', 2, 'Admin Teste', 32),
(96, 'Edição', '2024-01-11', '15:19:07', 2, 'Admin Teste', 33),
(97, 'Remoção', '2024-01-11', '15:20:01', 2, 'Admin Teste', 34),
(98, 'Remoção', '2024-01-11', '15:20:16', 2, 'Admin Teste', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_detalhes`
--

CREATE TABLE `movimento_detalhes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `componente_before` varchar(255) NOT NULL,
  `componente_after` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimento_detalhes`
--

INSERT INTO `movimento_detalhes` (`id`, `tipo`, `componente_before`, `componente_after`) VALUES
(20, 'Processador', 'Nenhum', 'Intel i5 12400'),
(21, 'Motherboard', 'MSI B760', 'Removido'),
(22, 'Processador', 'Intel i5 12400', 'Intel i5 12700'),
(23, 'Memória Ram', 'Nenhum', 'Hyperx GSKILL'),
(24, 'Memória Ram', 'Hyperx GSKILL', 'Removido'),
(25, 'disco', 'Nenhum', 'samsung hdd'),
(26, 'televisor', 'samsung hdd', 'samsung hdd'),
(27, 'Placa Gráfica', 'NVIDIA GeForce RTX 3090', 'NVIDIA GeForce RTX 3090'),
(28, 'Placa Gráfica', 'NVIDIA GeForce RTX 3090', 'Removido'),
(29, '', ' ', 'Removido'),
(30, 'rwa', 'Nenhum', 'rwa rwa'),
(31, 'monitor', 'Nenhum', 'asus tmn'),
(32, 'Roteador Wi-Fi', 'Netgear Nighthawk AX12', 'Removido'),
(33, 'Scanner', 'Canon CanoScan LiDE 400', 'Canon CanoScan LiDE 400'),
(34, 'Mouse Gamer', 'Razer DeathAdder Elite', 'Removido'),
(35, 'Gabinete', 'NZXT H510', 'Removido');

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
(7, 'teste', 'teste', '$2y$10$gKajsCJ3/i0es6LjzE4UXOJ4EkQcuUpAK5h9oLLBLr7pAhzeWeMSy', 1),
(8, 'testar', 'testar', '$2y$10$Bp1a1wMKRF3FGtw65pQ.r.JjE/bvNnKGG14RI5OrgfgHFrkrja/0S', 0);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `movimento_detalhes`
--
ALTER TABLE `movimento_detalhes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
