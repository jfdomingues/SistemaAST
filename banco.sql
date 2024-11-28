-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2024 às 03:59
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id` int(6) NOT NULL,
  `executivo` varchar(50) DEFAULT NULL,
  `funcional` varchar(50) DEFAULT NULL,
  `dataCriacao` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT NULL,
  `id_usuario` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id`, `executivo`, `funcional`, `dataCriacao`, `status`, `id_usuario`) VALUES
(1, 'Pessoas e Serviços', 'TI', '2024-11-27 23:44:33', 'Ativado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ast`
--

CREATE TABLE `ast` (
  `astId` int(6) NOT NULL,
  `astArea` varchar(20) DEFAULT NULL,
  `local` varchar(20) DEFAULT NULL,
  `executante` varchar(20) DEFAULT NULL,
  `astData` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `especialista` varchar(50) DEFAULT NULL,
  `participantes` varchar(20) DEFAULT NULL,
  `atividade` varchar(60) DEFAULT NULL,
  `notaBloqueio` decimal(5,2) DEFAULT NULL,
  `desvioBloqueio` varchar(20) DEFAULT NULL,
  `notaPT` decimal(5,2) DEFAULT NULL,
  `desvioPT` varchar(20) DEFAULT NULL,
  `notaAPR` decimal(5,2) DEFAULT NULL,
  `desvioAPR` varchar(20) DEFAULT NULL,
  `notaGeral` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `dataInsert` timestamp NULL DEFAULT NULL,
  `dataEnter` timestamp NULL DEFAULT NULL,
  `dataExit` timestamp NULL DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `nivel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `matricula`, `area`, `nome`, `mail`, `senha`, `dataInsert`, `dataEnter`, `dataExit`, `status`, `nivel`) VALUES
(1, 2024, '1', 'Usuário ADM', 'atendimento@ast.com.br', '$2y$10$0WTj5EHwEDzf4.67eh7X7uwRgCMhqOvLWd8FEvXbiczNzG8qKE/u6', '2024-11-28 00:48:55', '2024-11-28 05:09:19', NULL, 'ativado', 'administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ast`
--
ALTER TABLE `ast`
  ADD PRIMARY KEY (`astId`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ast`
--
ALTER TABLE `ast`
  MODIFY `astId` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
