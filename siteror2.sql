-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/02/2025 às 20:41
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
-- Banco de dados: `siteror2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.noticias`
--

CREATE TABLE `tb_admin.noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.noticias`
--

INSERT INTO `tb_admin.noticias` (`id`, `titulo`, `conteudo`, `capa`, `order_id`, `slug`) VALUES
(5, 'Sobreviva em um planeta alienígena', '<div>\n<p>Mais de 12 locais feitos &agrave; m&atilde;o, todos lotados de monstros desafiadores e chefes enormes que se op&otilde;em &agrave; sua exist&ecirc;ncia. Lute at&eacute; o chefe final e escape ou continue seu jogo infinitamente e veja o quanto voc&ecirc; &eacute; capaz de sobreviver. Um sistema de escalonamento &uacute;nico faz com que voc&ecirc; e seus inimigos ganhem poder ilimitado ao longo do jogo.</p>\n</div>', '67bcc5c73dcb4.png', 5, 'sobreviva-em-um-planeta-alienigena'),
(6, 'Descubra novos itens poderosos', '<div>\r\n<p>Mais de 110 itens mant&ecirc;m cada partida atualizada e cheia de novos desafios. Quanto mais itens voc&ecirc; coletar, maiores e mais surpreendentes as combina&ccedil;&otilde;es dos efeitos podem ser. Quanto mais itens voc&ecirc; encontrar, mais folclore (e estrat&eacute;gias) voc&ecirc; descobrir&aacute; por meio dos registros.</p>\r\n</div>', '67bcc71a86953.jpg', 6, 'descubra-novos-itens-poderosos'),
(7, 'Libere novos jeitos de jogar', '<div>\r\n<p>Libere uma tripula&ccedil;&atilde;o de sobreviventes jog&aacute;veis, cada um com estilo de combate &uacute;nico e diferentes habilidades para dominar. Conhe&ccedil;a os mist&eacute;rios dos Artefatos e ative modifica&ccedil;&otilde;es de jogabilidade. Com fases, inimigos e itens aleat&oacute;rios, nenhuma partida ser&aacute; igual a outra.</p>\r\n</div>', '67bcc734db1d8.jpg', 7, 'libere-novos-jeitos-de-jogar'),
(8, 'Jogue Individual ou cooperativamente', '<div>\r\n<p>Aventure-se por conta pr&oacute;pria ou com at&eacute; tr&ecirc;s amigos no modo cooperativo online ou dispute o desafio rotativo das Prova&ccedil;&otilde;es Prism&aacute;ticas. Sobreviventes novinhos em folha, como a Art&iacute;fice a Ca&ccedil;adora o Comando e &eacute; claro, o Engenheiro.</p>\r\n</div>', '67bcc75573e33.jpg', 8, 'jogue-individual-ou-cooperativamente');

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

--
-- Despejando dados para a tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(27, '::1', '2025-02-24 16:41:03', '67bccb340058c');

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
(7, 'bg1', '67bcc3bbaf94e.jpg', 7),
(8, 'bg2', '67bcc3c452cda.jpg', 8),
(9, 'bg3', '67bcc3cb06db2.jpg', 9);

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
(11, 'adm', 'adm', '67bcc17548663.png', 'Administrador', 1),
(12, 'user', 'user', '67bcc07b050d4.png', 'Usuário', 0);

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
(5, '::1', '2025-02-05'),
(6, '::1', '2025-02-24');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
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
-- AUTO_INCREMENT de tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_admin.slides`
--
ALTER TABLE `tb_admin.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
