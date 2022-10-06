-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 06 2022 г., 18:41
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lists`
--

CREATE TABLE `lists` (
  `id_list` int(11) NOT NULL,
  `list_name` varchar(50) NOT NULL,
  `list_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `assigner` varchar(32) NOT NULL,
  `assigner_email` varchar(32) NOT NULL,
  `performer` varchar(32) NOT NULL,
  `performer_email` varchar(32) NOT NULL,
  `task_description` text NOT NULL,
  `beginning` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_login` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `user_login`, `user_name`, `user_password`) VALUES
(2, 'Admin', 'Admin', '12345678'),
(3, 'admin', 'Ярослав', 'admin'),
(4, 'admin11', 'Yan', 'admin11'),
(5, '21321312', 'йцуйц', '444444');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id_list`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lists`
--
ALTER TABLE `lists`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
