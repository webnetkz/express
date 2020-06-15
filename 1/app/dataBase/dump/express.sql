-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2020 г., 09:49
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `express`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dispatch`
--

CREATE TABLE `dispatch` (
  `id` int(13) NOT NULL,
  `qr_name` varchar(55) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `stat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dispatch`
--

INSERT INTO `dispatch` (`id`, `qr_name`, `date`, `stat`) VALUES
(1, 'DWE12345678901', '25.05.2020', 0),
(2, 'DWE12345678902', '25.05.2020', 0),
(3, 'DWE12345678903', '25.05.2020', 0),
(4, 'DWE12345678904', '25.05.2020', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
