-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 24 2019 г., 08:36
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 5.6.40-12+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `matrix-ctf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `info` varchar(255) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'Worker',
  `email` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nick`, `tel`, `info`, `sex`, `password`, `role`, `email`, `city`, `site`) VALUES
(1, 'admin', '88007922424', 'aaaAAAaa', 'M', 'admin', 'Manager', 'cooler@mail.com', 'Moskov', 'coolerman.ru'),
(4, 'Coolerg', '88007922424', 'asdsad', 'M', '12312', 'Manager', 'cooler777@mail.com', 'Moskov', 'coolerman.ru'),
(5, 'asd', '88007922423', 'asfsfasdfasd', 'M', 'asd', 'Worker', 'asd@mail.com', 'Moskov', 'coolerman.ru'),
(6, 'asda', '789', 'asdasd', 'M', 'asd', 'Worker', 'asd', 'a', 'a'),
(7, 'asdaw', '789', 'asdasd', 'M', 'asd', 'Worker', 'asdw', 'a', 'a');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
