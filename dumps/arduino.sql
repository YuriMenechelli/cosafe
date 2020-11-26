-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2020 às 03:09
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arduino`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `sensor_id`, `valor`, `data`) VALUES
(168, 20982, 267, '2020-11-16 03:33:08'),
(169, 20983, 318, '2020-11-16 03:33:09'),
(170, 20984, 321, '2020-11-16 03:33:11'),
(171, 21078, 102, '2020-11-17 16:43:17'),
(172, 21079, 104, '2020-11-17 16:49:05'),
(173, 21082, 110, '2020-11-17 16:53:10'),
(174, 21083, 99, '2020-11-17 16:55:23'),
(175, 21084, 98, '2020-11-17 16:56:47'),
(176, 21086, 100, '2020-11-17 16:57:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sensor`
--

INSERT INTO `sensor` (`id`, `valor`, `data`) VALUES
(20975, 31, '2020-11-16 03:32:57'),
(20976, 31, '2020-11-16 03:32:58'),
(20977, 30, '2020-11-16 03:33:00'),
(20978, 31, '2020-11-16 03:33:01'),
(20979, 31, '2020-11-16 03:33:03'),
(20980, 33, '2020-11-16 03:33:05'),
(20981, 40, '2020-11-16 03:33:06'),
(20982, 267, '2020-11-16 03:33:08'),
(20983, 318, '2020-11-16 03:33:09'),
(20984, 321, '2020-11-16 03:33:11'),
(20985, 77, '2020-11-16 03:33:12'),
(20986, 53, '2020-11-16 03:33:15'),
(20987, 43, '2020-11-16 03:33:18'),
(20988, 40, '2020-11-16 03:33:19'),
(20989, 39, '2020-11-16 03:33:21'),
(20990, 37, '2020-11-16 03:33:23'),
(20991, 36, '2020-11-16 03:33:24'),
(20992, 36, '2020-11-16 03:33:26'),
(20993, 35, '2020-11-16 03:33:27'),
(20994, 35, '2020-11-16 03:33:29'),
(20995, 35, '2020-11-16 03:33:30'),
(20996, 35, '2020-11-16 03:33:32'),
(20997, 34, '2020-11-16 03:33:33'),
(20998, 34, '2020-11-16 03:33:35'),
(20999, 34, '2020-11-16 03:33:37'),
(21000, 34, '2020-11-16 03:33:38'),
(21001, 34, '2020-11-16 03:33:40'),
(21002, 33, '2020-11-16 03:33:41'),
(21003, 33, '2020-11-16 03:33:43'),
(21004, 33, '2020-11-16 03:33:44'),
(21005, 33, '2020-11-16 03:33:46'),
(21006, 34, '2020-11-16 03:33:47'),
(21007, 33, '2020-11-16 03:33:49'),
(21008, 33, '2020-11-16 03:33:50'),
(21009, 33, '2020-11-16 03:33:52'),
(21010, 33, '2020-11-16 03:33:54'),
(21011, 33, '2020-11-16 03:33:55'),
(21012, 33, '2020-11-16 03:33:57'),
(21013, 33, '2020-11-16 03:33:58'),
(21014, 33, '2020-11-16 03:34:00'),
(21015, 33, '2020-11-16 03:34:01'),
(21016, 33, '2020-11-16 03:34:03'),
(21017, 33, '2020-11-16 03:34:04'),
(21018, 33, '2020-11-16 03:34:06'),
(21019, 33, '2020-11-16 03:34:07'),
(21020, 33, '2020-11-16 03:34:09'),
(21021, 33, '2020-11-16 03:34:11'),
(21022, 33, '2020-11-16 03:34:12'),
(21023, 33, '2020-11-16 03:34:14'),
(21024, 33, '2020-11-16 03:34:15'),
(21025, 33, '2020-11-16 03:34:17'),
(21026, 33, '2020-11-16 03:34:18'),
(21027, 33, '2020-11-16 03:34:20'),
(21028, 33, '2020-11-16 03:34:21'),
(21029, 33, '2020-11-16 03:34:23'),
(21030, 33, '2020-11-16 03:34:24'),
(21031, 33, '2020-11-16 03:34:26'),
(21032, 33, '2020-11-16 03:34:28'),
(21033, 33, '2020-11-16 03:34:29'),
(21034, 33, '2020-11-16 03:34:31'),
(21035, 32, '2020-11-16 03:34:32'),
(21036, 33, '2020-11-16 03:34:34'),
(21037, 33, '2020-11-16 03:34:35'),
(21038, 33, '2020-11-16 03:34:37'),
(21039, 33, '2020-11-16 03:34:38'),
(21040, 33, '2020-11-16 03:34:40'),
(21041, 33, '2020-11-16 03:34:41'),
(21042, 33, '2020-11-16 03:34:43'),
(21043, 33, '2020-11-16 03:34:45'),
(21044, 33, '2020-11-16 03:34:46'),
(21045, 33, '2020-11-16 03:34:48'),
(21046, 33, '2020-11-16 03:34:49'),
(21047, 33, '2020-11-16 03:34:51'),
(21048, 33, '2020-11-16 03:34:52'),
(21049, 33, '2020-11-16 03:34:54'),
(21050, 33, '2020-11-16 03:34:55'),
(21051, 33, '2020-11-16 03:34:57'),
(21052, 33, '2020-11-16 03:34:59'),
(21053, 32, '2020-11-16 03:35:00'),
(21054, 33, '2020-11-16 03:35:02'),
(21055, 33, '2020-11-16 03:35:03'),
(21056, 32, '2020-11-16 03:35:05'),
(21057, 32, '2020-11-16 03:35:06'),
(21058, 33, '2020-11-16 03:35:08'),
(21059, 32, '2020-11-16 03:35:09'),
(21060, 32, '2020-11-16 03:35:11'),
(21061, 32, '2020-11-16 03:35:12'),
(21062, 33, '2020-11-16 03:35:14'),
(21063, 32, '2020-11-16 03:35:16'),
(21064, 32, '2020-11-16 03:35:17'),
(21065, 32, '2020-11-16 03:35:19'),
(21066, 32, '2020-11-16 03:35:20'),
(21067, 33, '2020-11-16 03:35:22'),
(21068, 32, '2020-11-16 03:35:23'),
(21069, 32, '2020-11-16 03:35:25'),
(21070, 33, '2020-11-16 03:35:26'),
(21071, 32, '2020-11-16 03:35:28'),
(21072, 33, '2020-11-16 03:35:29'),
(21073, 32, '2020-11-16 03:35:31'),
(21074, 32, '2020-11-16 03:35:33'),
(21075, 32, '2020-11-16 03:35:34'),
(21076, 32, '2020-11-16 03:35:36'),
(21077, 32, '2020-11-16 03:35:37'),
(21078, 102, '2020-11-17 16:43:17'),
(21079, 104, '2020-11-17 16:49:05'),
(21080, 104, '2020-11-17 16:49:33'),
(21081, 110, '2020-11-17 16:52:34'),
(21082, 110, '2020-11-17 16:53:10'),
(21083, 99, '2020-11-17 16:55:23'),
(21084, 98, '2020-11-17 16:56:47'),
(21085, 98, '2020-11-17 16:57:12'),
(21086, 35, '2020-11-17 16:57:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dt_inc` date NOT NULL COMMENT 'Data de inclusão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `login`, `senha`, `dt_inc`) VALUES
(20, 'Danilo', '445.856.574-02', 'danilo.nogueira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-27'),
(21, 'Samuel', '452.864.231-01', 'samuel.teles@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-27'),
(22, 'Kezley', '237.545.231-05', 'kezley.alexandre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-27'),
(23, 'Yuri', '485.325.157-07', 'yuri.menechelli@gmail.com', '6d9798928bab295c6b53c0d965a06ddc', '2020-10-27'),
(24, 'Henrique', '225.541.587-06', 'henrique.dinucci@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2020-10-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_ibfk_2` (`sensor_id`);

--
-- Índices para tabela `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de tabela `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21087;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `fk_sensor_id` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
