-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2019 às 01:52
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `administracao`
--

CREATE DATABASE administracao;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `numero_matricula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(14) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`numero_matricula`);

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `numero_matricula` int(11) NOT NULL AUTO_INCREMENT;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` ( `nome`, `sexo`, `data_nascimento`, `endereco`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `created`, `modified`) VALUES
('Pessoa Teste 1', 0, '2018-11-05', '', '', '', '', '', '', '2019-12-08 15:08:04', '2019-12-08 15:08:04'),
('Pessoa Teste 2', 1, '2019-12-09', '', '', '', '', '', '', '2019-12-09 00:07:20', '2019-12-09 00:07:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `numero_turma` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `quantidade_vagas` int(11) NOT NULL,
  `nome_professor` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`numero_turma`);

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `numero_turma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`descricao`, `quantidade_vagas`, `nome_professor`, `created`, `modified`) VALUES
('Turma Teste 1', 10, 'Julia', '2019-12-10 22:43:50', '2019-12-10 22:43:50'),
('Turma Teste 2', 10, 'Nana', '2019-12-12 23:06:40', '2019-12-12 23:06:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `numero_aluno_turma` int(11) NOT NULL,
  `numero_matricula` int(11) DEFAULT NULL,
  `numero_turma` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`numero_aluno_turma`);

--
-- AUTO_INCREMENT de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `numero_aluno_turma` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `aluno_turma` (`numero_matricula`, `numero_turma`, `created`, `modified`) VALUES
(1, 1, '2019-12-10 22:43:50', '2019-12-10 22:43:50'),

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL
);

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario`, `senha`) VALUES
('nathiele', '123');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
