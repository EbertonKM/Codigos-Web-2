-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/02/2025 às 01:11
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
-- Banco de dados: `projeto_01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.config`
--

CREATE TABLE `tb_admin.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.config`
--

INSERT INTO `tb_admin.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Projeto 01', 'Prof. Dr. Robyson Aggio', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo officia esse excepturi libero! Asperiores voluptatem impedit vero, molestias nihil, rerum dolore cumque eveniet ex, fuga delectus quis quia accusamus repellat?\r\n\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, porro atque nostrum numquam mollitia, totam magnam, praesentium eveniet corrupti ut aliquid! Ut facilis fugit nostrum iure quae odit molestias eveniet!\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo officia esse excepturi libero! Asperiores voluptatem impedit vero, molestias nihil, rerum dolore cumque eveniet ex, fuga delectus quis quia accusamus repellat?\r\n', 'fa-brands fa-html5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore hic, optio tempora ipsum nesciunt porro, impedit consequuntur similique, eos ab ad voluptates! Eum laudantium, dolorem ab ipsa vero tempora illo!', 'fa-brands fa-css3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore hic, optio tempora ipsum nesciunt porro, impedit consequuntur similique, eos ab ad voluptates! Eum laudantium, dolorem ab ipsa vero tempora illo!', 'fa-brands fa-js', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore hic, optio tempora ipsum nesciunt porro, impedit consequuntur similique, eos ab ad voluptates! Eum laudantium, dolorem ab ipsa vero tempora illo!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.depoimentos`
--

CREATE TABLE `tb_admin.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.depoimentos`
--

INSERT INTO `tb_admin.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(2, 'Primeiro Depoimento', 'Este é o primeiro depoimento, exemplo genérico de depoimento com informações depoimentísticas de um depoimento que foi depoimentado por um depoimentador.', '2025-02-04', 5),
(3, 'Um segundo depoimento', 'Este é um segundo depoimento, depoimentado durante a produção do site para testar as funcionalidades do depoimentamento de depoimentos por um depoimentador.', '2025-02-05', 2),
(6, 'Novo depoimento', 'Loren lorendo loreamento dos lorens do depoimento', '2025-02-06', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.servicos`
--

CREATE TABLE `tb_admin.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.servicos`
--

INSERT INTO `tb_admin.servicos` (`id`, `servico`, `order_id`) VALUES
(1, 'Um serviço prestado por especialistas em serviços, garantindo que seu serviço seja servido com excelência por quem entende de servir serviços.', 1),
(2, 'Realizamos serviços para quem busca um serviço bem realizado, feito por realizadores de serviços que dominam a arte do servir.', 3),
(3, 'Se você precisa de um serviço, nosso serviço está aqui para servir, porque servir serviços é o servimos de melhor.', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.slides`
--

CREATE TABLE `tb_admin.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.slides`
--

INSERT INTO `tb_admin.slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(1, 'ifprPalmas', '67a66a14cbfb2.jpg', 1),
(2, 'ifrpUniaoDaVitoria', '67a6723c0f473.jpg', 2),
(3, 'ifprFoz', '67a7c6d8a0ff9.jpeg', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `usuario`, `senha`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', 'ifpr.png', 'Usuário admin', 4),
(4, 'user', 'user', 'download.jpg', 'Usuário', 0),
(5, 'gerente', 'gerente', 'images.jpg', 'Gerente', 2),
(7, 'funcionario', 'funcionario', '', 'Funcionário', 1),
(8, 'ceo', 'ceo', '679be1f54c758.jpg', 'CEO', 3),
(9, 'miguel', 'miguel', '', 'Miguel Ramires', 4),
(10, 'usuario', 'usuario', '', 'Usuário Genérico', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2024-12-11'),
(2, '::1', '2025-01-27'),
(3, '::1', '2025-01-28'),
(4, '::1', '2025-01-29'),
(5, '::1', '2025-02-05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin.depoimentos`
--
ALTER TABLE `tb_admin.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.servicos`
--
ALTER TABLE `tb_admin.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.slides`
--
ALTER TABLE `tb_admin.slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.depoimentos`
--
ALTER TABLE `tb_admin.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_admin.servicos`
--
ALTER TABLE `tb_admin.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.slides`
--
ALTER TABLE `tb_admin.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
