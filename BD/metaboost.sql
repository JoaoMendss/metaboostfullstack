-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Ago-2025 às 22:12
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `metaboost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int NOT NULL,
  `Usuarios_idUsuario` int NOT NULL,
  `Categorias_idCategoria` int NOT NULL,
  `fotoAnuncio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomeAnuncio` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricaoAnuncio` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valorAnuncio` decimal(10,2) NOT NULL,
  `statusAnuncio` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `Usuarios_idUsuario`, `Categorias_idCategoria`, `fotoAnuncio`, `nomeAnuncio`, `descricaoAnuncio`, `valorAnuncio`, `statusAnuncio`) VALUES
(1, 1, 1, 'img/produto1.png', 'Suplemento Roxx', 'A Creatina Roxx 500g é ideal para quem busca mais \n\n\n\nforça, resistência e performance nos treinos. Sua fórmula pura garante absorção rápida e máxima eficiência, auxiliando no aumento da energia muscular e recuperação. Perfeita para atletas de todas as modalidades e quem deseja potencializar resultados de forma segura.', '600.00', 'disponivel'),
(2, 2, 1, 'img/produto1.png', 'Creatina Roxx', 'Creatina Roxx 500g', '20000.00', 'esgotado'),
(3, 3, 1, 'img/produto3.jpg', 'Garrafa Roxx', 'Garrafa Roxx 500ml', '500.00', 'disponivel'),
(6, 1, 1, 'img/imagem4.png', 'Creatina Growth', 'Creatina Growth Teste Teste', '120.00', 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int NOT NULL,
  `nomeCategoria` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Creatina'),
(2, 'Pré-Treino'),
(5, 'Whey Protein'),
(6, 'Carboidratos'),
(7, 'BCAA'),
(8, 'Glutamina'),
(9, 'Hipercalórico'),
(10, 'Omega 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `fotoUsuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nomeUsuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `telefoneUsuario` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `emailUsuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `senhaUsuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tipoUsuario` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`) VALUES
(1, 'img/Classico_2D.webp', 'Eldrey', '1991-04-10', 'telemacoBorba', '(42) 99999-9999', 'eldrey@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
(2, 'img/mario.png', 'João Mendes', '1983-12-10', 'imbau', '(42) 99999-7777', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente'),
(3, 'img/Luigi.png', 'Livia Brum', '1986-03-20', 'telemacoBorba', '(42) 99988-7799', 'livia@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncios_usuarios` (`Usuarios_idUsuario`),
  ADD KEY `fk_anuncios_categorias` (`Categorias_idCategoria`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_anuncios_categorias` FOREIGN KEY (`Categorias_idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `fk_anuncios_usuarios` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
