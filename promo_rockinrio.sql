-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `admin_promo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2343731b812e49350f2649cdd5a7a08c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.72 Safari/537.36', 1374518306, 'a:4:{s:9:"user_data";s:0:"";s:7:"usuario";s:6:"danilo";s:5:"senha";s:9:"105970021";s:6:"logado";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `IdCandidato` int(10) NOT NULL AUTO_INCREMENT,
  `NomeCandidato` varchar(50) COLLATE utf8_bin NOT NULL,
  `CodigoPromocao` varchar(10) COLLATE utf8_bin NOT NULL,
  `FlagAceite` int(1) NOT NULL DEFAULT '0',
  `FlagEmail` int(1) DEFAULT '0',
  PRIMARY KEY (`IdCandidato`),
  UNIQUE KEY `CodigoPromocao` (`CodigoPromocao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `LoginUsuario` varchar(32) COLLATE utf8_bin NOT NULL,
  `EmailUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `SenhaUsuario` varchar(32) COLLATE utf8_bin NOT NULL,
  `Ativo` int(1) NOT NULL,
  `DataCriacao` datetime NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `EmailUsuario` (`EmailUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `LoginUsuario`, `EmailUsuario`, `SenhaUsuario`, `Ativo`, `DataCriacao`) VALUES
(1, 'danilo', 'danilo@livrariamarcafacil.com.br', '105970021', 1, '2013-07-19 00:00:00'),
(2, 'admin', 'admin@livrariamarcafacil.com.br', 'adminmf332211', 1, '2013-07-22 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;