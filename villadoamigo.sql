-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/08/2018 às 15:10
-- Versão do servidor: 5.6.11-log
-- Versão do PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `id6900919_villa`
--
CREATE DATABASE IF NOT EXISTS `id6900919_villa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id6900919_villa`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `idanimal` int(11) NOT NULL AUTO_INCREMENT,
  `doador` varchar(300) NOT NULL,
  `adotante` varchar(300) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `especie` varchar(100) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `porte` varchar(50) NOT NULL,
  `docil` varchar(15) NOT NULL,
  `vacinado` varchar(100) NOT NULL,
  `peso` varchar(25) NOT NULL,
  `idade` varchar(50) NOT NULL,
  `pelagem` varchar(50) NOT NULL,
  `castrado` varchar(10) NOT NULL,
  `foto` varchar(300) NOT NULL,
  PRIMARY KEY (`idanimal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `animal`
--

INSERT INTO `animal` (`idanimal`, `doador`, `adotante`, `nome`, `especie`, `sexo`, `raca`, `porte`, `docil`, `vacinado`, `peso`, `idade`, `pelagem`, `castrado`, `foto`) VALUES
(1, 'leeoomelo', NULL, 'Ana', 'Cachorro', 'FÃªmea', 'SRD (Sem RaÃ§a Definida)', 'Medio', 'Sim', 'Sim', '4', '3 meses', 'Baixo', 'Sim', 'imagens/animais/ddd8b4cd28f35105b0aa68b8ec687e88.jpg'),
(2, 'leeoomelo', NULL, 'Otto', 'Cachorro', 'Macho', 'SRD+Pitbull', 'Grande', 'Sim', 'Sim', '30', '7 anos', 'Baixo', 'Sim', 'imagens/animais/390102f28049bfa438fcf6373826122d.jpg'),
(3, 'leeoomelo', NULL, 'Billi', 'Gato', 'Macho', 'SRD (Sem RaÃ§a Definida) ', 'Grande', 'NÃ£o', 'Sim', '5', '5 anos', 'Medio', 'Sim', 'imagens/animais/95b28f7a5801a8e4c9378f36fac32bb7.jpg'),
(4, 'leeoomelo', NULL, 'Pedro', 'Cachorro', 'Macho', 'SRD (Sem RaÃ§a Definida) ', 'Pequeno', 'Sim', 'Sim', '4', '3 meses', 'Baixo', 'NÃ£o', 'imagens/animais/389894e82ff03a7dbf60fe2b7342defe.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `parceiro`
--

CREATE TABLE IF NOT EXISTS `parceiro` (
  `id_parceiro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_parceiro` varchar(300) NOT NULL,
  `email_parceiro` varchar(300) NOT NULL,
  PRIMARY KEY (`id_parceiro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE IF NOT EXISTS `solicitacoes` (
  `id_solic` int(11) NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) NOT NULL,
  `login_doador` varchar(100) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  PRIMARY KEY (`id_solic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `tipo` int(1) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `cep` int(8) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `senha`, `tipo`, `nome`, `sobrenome`, `cpf`, `telefone`, `celular`, `email`, `cep`, `bairro`, `cidade`, `estado`) VALUES
(1, 'admin', 'YWRtaW4xMjM0', 0, 'leonardo', 'administrador', '46565827869', '1146531017', '11989354791', 'leonardomdmelo@gmail.com', 7407360, 'Jardim ArujÃ¡', 'ArujÃ¡', 'SP'),
(2, 'leeoomelo', 'bGVvMTIz', 1, 'leonardo', 'melo', '26913721897', '1146521017', '11997865412', 'leonardomdmelo@hotmail.com', 7407360, 'Jardim ArujÃ¡', 'ArujÃ¡', 'SP');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
