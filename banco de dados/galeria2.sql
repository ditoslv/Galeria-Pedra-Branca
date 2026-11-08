-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/09/2024 às 21:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `galeria2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `user_id` int(11) NOT NULL,
  `obra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`user_id`, `obra_id`) VALUES
(12, 8),
(12, 11),
(12, 17),
(12, 18),
(12, 19),
(12, 28),
(12, 31),
(12, 37),
(13, 7),
(13, 8),
(13, 17),
(13, 23),
(18, 7),
(18, 9),
(19, 7),
(19, 8),
(19, 9),
(20, 7),
(20, 12),
(20, 21),
(21, 7),
(21, 13),
(21, 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `data_obra` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `obras`
--

INSERT INTO `obras` (`id`, `nome`, `autor`, `data_obra`, `valor`, `descricao`, `foto`) VALUES
(7, 'São Lagrimas 123', 'Desconhecido', '0000-00-00', 0.00, 'Não possui', 'obra4.jpg'),
(8, 'Nada Denovo', 'Desconhecido', '0000-00-00', 0.00, 'Não possui', 'obra5.jpg'),
(9, 'Saudade do Brasil', 'Desconhecido', '2019-05-23', 0.00, 'Não possui', 'obra6.jpg'),
(11, 'Renascimento do Nordeste', 'Desconhecido', '2020-06-24', 0.00, 'Não possui', 'obra8.jpg'),
(12, 'FlorEssência ', 'Desconhecido', '2017-07-05', 0.00, 'Não possui', 'obra9.jpg'),
(13, 'Auto-Retrato', 'Desconhecido', '2023-07-27', 0.00, 'Não possui', 'obra11.jpg'),
(14, 'Kandinsky', 'Desconhecido', '2019-08-14', 0.00, 'Não possui', 'obra12.jpg'),
(17, 'Sem título - Fundo Verde', 'Mariliane Lepine', '2022-08-25', 1000.00, 'acrílica sobre a tela - 30x0cm', 'obra15.jpg'),
(18, 'Sem título -  Toalha Rosa', 'Mariliane Lepine', '2019-08-05', 1700.00, 'acrílica sobre a tela - 40x50cm', 'obra16.jpg'),
(19, 'Constelação', 'Raul Córdula', '2024-09-25', 1100.00, 'serigrafia sobre papel - 60x60cm', 'obra17.jpg'),
(20, 'Sem título - fundo rosa', 'Mariliane Lepine', '2018-02-18', 1800.00, 'Acrilica sobre cartão - 59x53cm', 'obra18.jpg'),
(21, 'Coleção Desenhos', 'Romero Andrade Lima', '2006-01-21', 900.00, 'Nanquim sobre papel - 42x30cm', 'obra19.jpg'),
(22, 'Coleção Desenhos', 'Romero Andrade Lima', '2012-04-22', 900.00, 'Nanquim sobre papel - 42x30cm', 'obra20.jpg'),
(23, 'Coleção Desenhos', 'Romero Andrade Lima', '2015-05-27', 900.00, 'Nanquim sobre papel - 42x30cm', 'obra21.jpg'),
(24, 'Coleção Desenhos', 'Romero Andrade Lima', '2004-07-01', 900.00, 'Nanquim sobre papel - 42x30cm', 'obra22.jpg'),
(25, 'Coleção Desenhos', 'Romero Andrade Lima', '2010-12-22', 900.00, 'Nanquim sobre papel - 42x30cm', 'obra23.jpg'),
(27, 'Ave Voadora', 'Heitor Dutra', '2003-06-28', 1200.00, 'Acrílica sobre a tela - 40x50cm', 'obra24.jpg'),
(28, 'Sem título', 'Heitor Dutra', '2001-01-01', 1200.00, 'Acrílica sobre a tela', 'obra25.jpg'),
(29, 'O fã Clube e Sabiá-Laranjeira', 'Heitor Dutra', '2016-02-07', 1750.00, 'Acrílica sobre a tela', 'obra26.jpg'),
(30, '313', 'Desconhecido', '2022-01-31', 0.00, 'Não possui', 'obra28.jpg'),
(31, '307', 'Desconhecido', '2008-08-30', 0.00, 'Não possui', 'obra29.jpg'),
(33, 'Lapa', 'Desconhecido', '2008-08-30', 0.00, 'Não possui', 'obra31.jpg'),
(34, 'Halloween ', 'Desconhecido', '2008-08-30', 0.00, 'Não possui', 'obra32.jpg'),
(35, 'Take me back to Piauí', 'Desconhecido', '2008-08-30', 0.00, 'Não possui', 'obra33.jpg'),
(36, 'Composição', 'Raul Córdula', '2008-08-30', 6000.00, 'Acrílica sobre madeira - 50x80cm', 'obra34.jpg'),
(37, 'Pink 12', 'Pilar Rodriguez', '2008-08-30', 3500.00, 'Técnica mista sobre tela', 'obra35.jpg'),
(38, 'Junho', '--', '2024-09-01', 0.00, '--', 'obra1.jpg'),
(40, 'Aliança de Ouro 123', '--', '0000-00-00', 0.00, '--', 'Aliança de Ouro II - série Horizontes, 2021.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `is_admin`) VALUES
(1, 'casdasd', 'whitehouse@gmail.com', '$2y$10$3cv27vTRhYga4p5IpmngK.XkVtyo.PUDwaKzxpJJrb.NtemlpurNC', 0),
(3, 'renan', 'renan@gmail.com', '$2y$10$Z9KSiUrtIT9DPPGNdSUqzO5ZC8CEcX70h2Fzm9Tu33Hcnixj61cTO', 0),
(4, 'xelinha', 'fefa@gmail.com', '$2y$10$CY2VvF/iG8/WE0HTUpF3rOoqWN1kMFa3QQ86sGsh60zvmS9PytSWK', 0),
(5, 'asdas', 'whitehouse@adsad', '$2y$10$iqIlL0jeLAl4oOL2y9/O6.8uDvJ/dwQ7xviJPfUyAcjlxWFYI08ge', 0),
(6, 'dadsa', 'whitehouse@gmail.com', '$2y$10$FWHMhMcOs8Ctbj1aQG/NBuLWLaxf3TBZeKgn61gmYVfBntelpMcsG', 0),
(10, 'jefferson', 'jefferson@gmail.com', '$2y$10$UiBuzqZzGWvGRzMpqHBAa.fgI9P5sKnoGl9.395t.XfZTxaQ9fx4e', 0),
(12, 'rennannn', 'rennan@gmail.com', '$2y$10$QW6fMU6PJfC4wUpw6qZGiOc3URxaufZSiqzeuFfUoqZ5qNRL5iNWS', 0),
(13, 'Alícia ', 'alicia@menezes.gmail.com', '$2y$10$QvDTHl3cDE6bll5srtOBjOzFSaLFnEgVo9XVjPDv6GssXut0pakVe', 0),
(14, 'heitor', 'heitor@gmail.com', '$2y$10$RFYOoxadTAVqlh.rqBLi.uo1U/hHchVC3kZBDwYMFaTz61dUfcwQq', 0),
(15, 'kauan', 'kauan@gmail.com', '$2y$10$Qa1N/dH996LXJcmvBoBHSeJ26BnOecRo6PZQABENsO8AHroGvppjO', 0),
(16, 'admin', 'admin@gmail.com', '$2y$10$i4dFj1YRLSQDDnZXypi1qulBViR2BMq09vSir6UAne65djDqO/.eS', 1),
(17, 'Kauan RD', 'reidelas@gmail.com', '$2y$10$m//9HNd.6gj6TakYFjO.YeZd9iPIp7TAaGYJmz72zkQxR6qcmT6hK', 0),
(18, 'gustavo', 'gustavo@gmail.com', '$2y$10$f0/fFG4qHMpx5AKVDi8GwOQWuB3Y/BqkmLDpVE8niFnAvT6BIjiuS', 0),
(19, 'danilo', 'danilo@gmail.com', '$2y$10$7WGVoY32hY5Rz1OxvvEnUuN35LkUAOqO9CTTp97NmnlguT1LMvUw6', 0),
(20, 'alvaro', 'batata@gmail.com', '$2y$10$.kQehddkJ6X5u2nDkJkdqO4uQeEE63fayyxw9O.TULC6Nfauevexe', 0),
(21, 'heitor', 'heitorr@gmail.com', '$2y$10$mpTYeGSQ6KXiaDupAV2rUOfZ1wYu60.PWxQ26OeEEdKx.2CQvjDs2', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`user_id`,`obra_id`),
  ADD KEY `obra_id` (`obra_id`);

--
-- Índices de tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
