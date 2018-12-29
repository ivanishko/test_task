-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 29 2018 г., 17:54
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beejeetest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `email` text CHARACTER SET cp1251 NOT NULL,
  `user` varchar(10) CHARACTER SET cp1251 NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`task_id`, `email`, `user`, `text`, `status`, `date_create`) VALUES
(3, 'qwerty@qw.ru', 'user1', 'text1', 1, '2018-12-28 10:44:50'),
(4, 'qwerty', 'user2', 'text2', 0, '2018-12-28 10:39:21'),
(5, 'qwq', 'qwe@sd.ry', 'qwe', 0, '2018-12-28 12:56:18'),
(6, 'erw', 'er@sdf.re', 'ewrwerwer', 0, '2018-12-28 12:57:25'),
(7, 'aSa', 'asd@asd.er', 'sdasdsdasda', 0, '2018-12-28 13:04:20'),
(8, 'asd', 'asd@sjd.we', 'wewerwerwer', 0, '2018-12-28 13:07:57'),
(9, 'DSFSD', 'SSD@EWR.RE', 'SDFSDFSD', 0, '2018-12-28 13:09:54'),
(10, 'qweqw@qw.qw', 'qweqw', 'qweqweqweqwe', 0, '2018-12-28 13:39:52'),
(11, 'qweqw@qwe.qwe', 'qweqw', 'qweqweqweqweq', 0, '2018-12-28 13:40:15'),
(12, 'qweq@wqeqw.qwe', 'qwe', 'qweqweqweqwe', 0, '2018-12-28 13:40:42'),
(13, '12312@234.234', '123', '23423234', 0, '2018-12-28 13:40:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
