-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 04 2019 р., 07:01
-- Версія сервера: 5.6.41
-- Версія PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `task_manager`
--

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `description`, `img`) VALUES
(7, '27', 'What is Lorem ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.cc\r\n\r\n', 'osen_derevya_les_zdanie_trava_98806_4096x2732.jpg'),
(10, '27', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'tsvety_vetki_tsvetenie_117474_3840x2160.jpg'),
(12, '27', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'doroga_derevia_povorot_134516_1920x1080.jpg'),
(13, '27', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'listia_vetki_rastenie_134487_3840x2160.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(13, 'Bohdan', 'bohdan@icloud.com', '2134'),
(14, 'sdf', 'sdfomkol@mkolsdfsd', 'sdfs'),
(15, 'Bohdan', 'bogdan@gmail.com', 'swedmkpl;'),
(16, 'Ruslan', 'Rusalan@gmail.com', 'f58e15aa2a2af0ca7662051a804689f4'),
(17, 'asdfa', 'asdfa@fgs', '5488d9b491631bb12c08cc15af005e93'),
(18, 'Olen', 'jelenie@com', 'njsdo'),
(19, 'Ruslan', 'Ruslan_olen@pes', 'd9729feb74992cc3482b350163a1a010'),
(20, 'Ruslan', 'Ruslan_olen@pes', 'd9729feb74992cc3482b350163a1a010'),
(21, 'Walai', 'walia@fd', 'd9729feb74992cc3482b350163a1a010'),
(22, 'Walia', 'walia@fd', 'a168aef37c5374bc151790dce45fae47'),
(25, 'nowy', 'testpass@sd', '26f812c3a58c7b6976257e405c65a61e'),
(26, 'Ищрвфт', 'asdfs@sfg', '0d1ef2ecd9ef54bf896da7ae3c3af4e7'),
(27, 'Bohdan', 'hromenkobohdan@icloud.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(28, 'hromenkobohdan@icloud.com', 'hromenkobohdan@icloud.coms', '0cc175b9c0f1b6a831c399e269772661'),
(29, 'hromenkobohdan@icloud.com', 'hromenkobohdan@icloud.comfghfgjh', '4b43b0aee35624cd95b910189b3dc231'),
(30, 'hromenkobohdan@icloud.com', 'hromenkobohdan@icloud.comasdas', '0cc175b9c0f1b6a831c399e269772661'),
(31, 'Walentyn', 'walia@com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
