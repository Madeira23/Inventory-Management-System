-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 18:25
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
(1, 'Processador', 'Intel', 'Core i7', NULL, '3.6 GHz', NULL, NULL, '300.00', '2022-01-01'),
(2, 'Placa Gráfica', 'NVIDIA', 'GeForce RTX 3080', 10, NULL, NULL, NULL, '800.00', '2022-02-15'),
(3, 'Motherboard', 'ASUS', 'ROG Strix B550-F', NULL, NULL, NULL, NULL, '200.00', '2022-03-10'),
(4, 'Disco', 'Samsung', '970 EVO Plus', 500, NULL, NULL, NULL, '120.00', '2022-04-05'),
(6, 'Processador', 'Amd', 'Ryzen 5 50000', 3, '213hz', 4, 'Amarelo', '965.00', '1989-07-12'),
(8, '4235324', '345345', '234523', 12312, '21312', 21312, '3125423', '1231.00', '2020-02-05'),
(9, '123', '12123', '111111', 111111, '111111', 1111, '11111111', '11111.00', '2023-01-01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `componentes`
--
ALTER TABLE `componentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
