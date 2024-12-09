-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2024 às 15:20
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
-- Banco de dados: `books_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_livros`
--

CREATE TABLE `tb_livros` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `pages` int(11) DEFAULT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_livros`
--

INSERT INTO `tb_livros` (`id`, `title`, `author`, `pages`, `genre`) VALUES
(6, 'DUNE: The Graphic Novel2', 'Frank Herbert2', 1762, 'Science Fiction2'),
(9, 'A Revolução dos Bichos 2', 'George Orwell	2', 112, 'Fábula Política'),
(10, 'Pai Rico, Pai Pobre', 'Robert T. Kiyosaki', 336, 'Personal finance'),
(13, 'The War of Art', 'Sun Tzu', 160, 'strategy and self-help'),
(16, 'Animal Farm', 'George Orwell', 97, 'Fiction'),
(17, 'Alice\'s Adventures in Wonderland', 'Lewis Carroll', 106, 'Fiction'),
(18, 'Dracula', 'Bram Stoker', 490, 'Fiction'),
(19, 'Moby Dick', 'Herman Melville', 504, 'adventure and fiction'),
(20, 'Free Your Mind', 'M.P Neary', 37, 'self-help'),
(21, 'Agent Zero Book #1', 'Jack Mars', 368, 'Police, thriller and mystery'),
(22, 'Short Stories in English for Beginners', 'Olly Richards', 252, 'learning'),
(23, 'Becoming Mindful', 'HowToRelax Blog Team', 82, 'Health, family and personal development'),
(24, 'The Time Machine', 'H. G. Wells', 108, 'Fantasy, Horror'),
(25, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 576, 'Fantasy'),
(26, 'Harry Potter and the Sorcerer\'s Stone:', 'J. K. Rowling', 256, 'Fantasy'),
(27, 'The Two Towers: Lord of the Rings', 'J. R. R. Tolkien', 448, 'Fantasy');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
