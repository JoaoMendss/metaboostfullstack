-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/09/2025 às 02:46
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
-- Banco de dados: `metaboost`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int(11) NOT NULL,
  `Usuarios_idUsuario` int(11) NOT NULL,
  `Categorias_idCategoria` int(11) NOT NULL,
  `fotoAnuncio` varchar(100) NOT NULL,
  `nomeAnuncio` varchar(50) NOT NULL,
  `descricaoAnuncio` varchar(1000) NOT NULL,
  `valorAnuncio` decimal(10,2) NOT NULL,
  `statusAnuncio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `Usuarios_idUsuario`, `Categorias_idCategoria`, `fotoAnuncio`, `nomeAnuncio`, `descricaoAnuncio`, `valorAnuncio`, `statusAnuncio`) VALUES
(11, 1, 2, 'img/2.png', 'Roxx Energy PRO (315g) - Sabor: Buff Grape', 'Roxx PRO (315g)  ** Aprimore seus reflexos, tenha mais foco nos jogos, fique em estado de alerta constante durante as partidas.      Cada pote de ROXX Energy PRO mais de 40 doses. Cada dose diluída em 300ml de água contém uma carga de combustível completa para recarregar suas energias de forma segura e saudável. Veja como nossa fórmula é diferente:   Benefícios: - Sem adição de açúcar;- 1,8g de L-Alanina;- 1,2g de L- Arginina;- 400mg de Cafeína;- 1,2g de L-Taurina;- Low Carb (Baixo Carboidrato);- Zero Sódio;- Zero Glúten;- Zero Lactose', 89.99, 'disponivel'),
(12, 1, 2, 'img/1.png', 'ROXX ENERGY FOR PLAYERS (280G)', 'Roxx Energy For Players (280g)       ROXX Lemon of Legends, mas pode chamar de LOL! Uma deliciosa combinação de diferentes tipos de limão, criando uma bebida energética refrescante e com um sabor exclusivo. Ao adicionar uma medida de ROXX na água gelada, você já vai sentir o aroma de limão mais delicioso que você já sentiu. Na boca, uma mistura dos melhores aromas de limão, criteriosamente selecionados para criar a versão Lemon of Legends.      ROXX Energy ACID TUBES é a invenção de sabor mais maluca que já foi criada para uma bebida energética. Agora você pode abastecer suas energias com o sabor das balas de gomas com um delicioso toque ácido e o incrível sabor Morango e baunilha.      Cada pote de ROXX Energy contém 40 doses. Cada dose diluída em 300ml de água contém uma carga de combustível completa para recarregar suas energias de forma segura e saudável. Veja como nossa fórmula é diferente:   Benefícios: - Sem adição de açúcar;- 2g de Arginina;- 50mg de NAC;- 150mg de Cafeína;- 1g', 119.99, 'disponivel'),
(13, 1, 2, 'img/3.png', 'Évora Pw (300g) - Integralmédica', 'Integralmédica lança a você em sua linha Darkness, especialista em produtos de alta qualidade e com concentração de nutrientes, Évora PW. Pré-treino para auxiliar nas metas nos treinos. Com fórmula energizante, garante melhora da condição física e do desgaste mental, pontos primordiais para bodybuilders que querem sempre dar um &quot;passo a diante&quot; em sua forma física ou no desempenho. \r\nAlcance alta energia com um pré-treino!', 129.99, 'disponivel'),
(14, 1, 10, 'img/4.webp', 'Suplemento Alimentar Games Alta Performace 60cps B', 'Nesta compra você receberá 1 frasco com 60cps de Energy Games da Body Power.\r\n\r\nSabemos que hoje os gamers são atletas que competem em jogos eletrônicos em torneios e campeonatos de alto nível, exigindo também um alto nível de habilidade e desempenho.\r\n\r\nJogadores profissionais gastam em média 5:28h diárias de treinamento em frente ao computador, esse número pode chegar a 12 até 14 horas de práticas diárias.\r\n\r\nAlém disso, os jogadores podem estar envolvidos em outras atividades atreladas ao jogo, tais como reuniões, discussões estratégicas, análises de vídeos de gameplay e entrevistas.\r\n\r\nPensando nisso a Body Power da Vital Natus desenvolveu um suplemento alimentar para gamers que auxilia, estimula o bom funcionamento do organismo, melhorando a saúde, energia, foco, disposição, concentração e bem estar, promovendo disposição, energia e foco que são dois componentes essenciais para o bem-estar físico e mental.', 111.90, 'disponivel'),
(15, 1, 2, 'img/5.png', 'X-Bomb - Sabor Guarapower 300g', 'X-Bomb é um suplemento nutricional nootrópico\r\nque potencializa o desempenho físico e cognitivo.\r\nPerfeito para rotinas diárias, estudo e trabalho.\r\nGarante foco e energia.', 89.90, 'disponivel'),
(16, 1, 5, 'img/6.png', 'GHOST Gamer Energy &amp; Focus Support - 40 porçõe', 'GHOST GAMER é a combinação perfeita de nootrópicos e energia natural para garantir que você esteja ligado para uma tarde no taco ou no escritório. Entregue na verdadeira forma GHOST com design doente, uma fórmula totalmente transparente e sabor épico de peixe sueco.', 129.99, 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
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
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`) VALUES
(1, 'img/Classico_2D.webp', 'Eldrey', '1991-04-10', 'telemacoBorba', '(42) 99836-7766', 'eldrey@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
(2, 'img/mario.png', 'João Mendes', '1983-12-10', 'imbau', '(42) 99868-2358', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente'),
(3, 'img/Luigi.png', 'Livia Brum', '1986-03-20', 'telemacoBorba', '(42) 99988-7799', 'livia@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncios_usuarios` (`Usuarios_idUsuario`),
  ADD KEY `fk_anuncios_categorias` (`Categorias_idCategoria`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_anuncios_categorias` FOREIGN KEY (`Categorias_idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `fk_anuncios_usuarios` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
