-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 11:05 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_emprestimo` datetime NOT NULL,
  `data_devolucao` datetime NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `data_emprestimo`, `data_devolucao`, `usuario_id`) VALUES
(1, '2020-03-05 17:22:45', '2020-03-19 17:22:45', 1),
(2, '2020-03-03 17:22:45', '2020-03-07 17:22:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo_livros`
--

CREATE TABLE `emprestimo_livros` (
  `emprestimo_id` int(10) UNSIGNED NOT NULL,
  `livro_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emprestimo_livros`
--

INSERT INTO `emprestimo_livros` (`emprestimo_id`, `livro_id`) VALUES
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `inner-join`
-- (See below for the actual view)
--
CREATE TABLE `inner-join` (
`titulo` varchar(80)
,`autores` text
,`secao` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `left-join`
-- (See below for the actual view)
--
CREATE TABLE `left-join` (
`nome` varchar(60)
,`data_emprestimo` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autores` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secao_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `autores`, `secao_id`) VALUES
(3, 'livro 1', 'autor 1, autor 2', 1),
(4, 'livro 2', 'autor 43, autor 5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `secao`
--

CREATE TABLE `secao` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secao`
--

INSERT INTO `secao` (`id`, `nome`) VALUES
(1, 'romance'),
(2, 'terror');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `nome`) VALUES
(1, 'email1@email.com', 'Ricardo'),
(2, 'email2@email.com', 'Rodrigo'),
(3, 'email3@email.com', 'Jorge');

-- --------------------------------------------------------

--
-- Structure for view `inner-join`
--
DROP TABLE IF EXISTS `inner-join`;

CREATE ALGORITHM=UNDEFINED DEFINER=`vinn`@`localhost` SQL SECURITY DEFINER VIEW `inner-join`  AS  select `l`.`titulo` AS `titulo`,`l`.`autores` AS `autores`,`s`.`nome` AS `secao` from (`livro` `l` join `secao` `s` on(`l`.`secao_id` = `s`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `left-join`
--
DROP TABLE IF EXISTS `left-join`;

CREATE ALGORITHM=UNDEFINED DEFINER=`vinn`@`localhost` SQL SECURITY DEFINER VIEW `left-join`  AS  select `u`.`nome` AS `nome`,`e`.`data_emprestimo` AS `data_emprestimo` from (`usuario` `u` left join `emprestimo` `e` on(`u`.`id` = `e`.`usuario_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `emprestimo_livros`
--
ALTER TABLE `emprestimo_livros`
  ADD KEY `emprestimo_id` (`emprestimo_id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secao_id` (`secao_id`);

--
-- Indexes for table `secao`
--
ALTER TABLE `secao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `secao`
--
ALTER TABLE `secao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `emprestimo_livros`
--
ALTER TABLE `emprestimo_livros`
  ADD CONSTRAINT `emprestimo_livros_ibfk_1` FOREIGN KEY (`emprestimo_id`) REFERENCES `emprestimo` (`id`),
  ADD CONSTRAINT `emprestimo_livros_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`);

--
-- Constraints for table `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`secao_id`) REFERENCES `secao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
