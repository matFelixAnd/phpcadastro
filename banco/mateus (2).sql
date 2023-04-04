-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Set-2022 às 13:08
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mateus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_vis`
--

DROP TABLE IF EXISTS `cad_vis`;
CREATE TABLE IF NOT EXISTS `cad_vis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rg` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeFT` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caminhoFT` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cad_vis`
--

INSERT INTO `cad_vis` (`id`, `rg`, `nome`, `sobrenome`, `email`, `telefone`, `descricao`, `nomeFT`, `caminhoFT`, `created`, `modified`) VALUES
(1, '393140738', 'mateus', 'felix1', 'mateusyami@outlook.com', '11945498896', 'primeiro registro', '631b78b7b138d', 'arquivos/631b78b7b138d.png', '2022-09-09 14:32:39', '2022-09-13 13:06:23'),
(2, '555555555', 'Lucassa', 'andrade', 'lucas.felixandrade@gmail.com', '11988888888', 'lucas', '631b7d283b3ca', 'arquivos/631b7d283b3ca.png', '2022-09-09 14:51:36', '2022-09-09 17:57:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `psq_vis`
--

DROP TABLE IF EXISTS `psq_vis`;
CREATE TABLE IF NOT EXISTS `psq_vis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idvis` int(11) NOT NULL,
  `rg` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `psq_vis`
--

INSERT INTO `psq_vis` (`id`, `idvis`, `rg`, `nome`, `sobrenome`, `descricao`, `created`) VALUES
(1, 1, '393140738', 'mateus', 'felix', 'primeira visita', '2022-09-09 14:34:33'),
(2, 1, '393140738', 'mateus', 'felix', 'asdasdasd', '2022-09-09 14:37:15'),
(3, 2, '555555555', 'lucas', 'felix', 'primeira visita de lucas\r\n', '2022-09-09 14:52:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
