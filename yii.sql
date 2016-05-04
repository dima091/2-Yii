-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2016 г., 12:58
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `num` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  KEY `task` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`num`, `comment`, `date`, `name`) VALUES
(1, 'comment1', '2016-04-22 13:54:19', 'Dima'),
(2, 'comment2', '2016-04-22 13:54:41', 'Dima'),
(1, 'comment1.3', '2016-04-22 14:50:00', 'Дима'),
(3, 'My comment for task3', '2016-04-23 13:08:53', 'Dima'),
(1, 'Good!', '2016-04-23 13:41:13', 'Dima'),
(4, 'First comment!', '2016-04-23 13:42:28', 'Dima'),
(7, 'aqhdasd', '2016-04-23 14:07:36', 'Dima'),
(4, 'done!', '2016-04-23 14:08:15', 'Dima'),
(14, 'done', '2016-04-23 14:44:18', 'Dima'),
(4, 'sort', '2016-04-23 15:07:50', 'Dima'),
(1, 'sort', '2016-04-23 15:08:18', 'Dima'),
(1, 'comment for task1', '2016-04-28 03:23:08', 'Dima'),
(1, 'comment for task1', '2016-04-28 03:23:08', 'Dima'),
(1, 'comment for task1', '2016-04-28 03:23:08', 'Dima'),
(10, 'comment for task8', '2016-04-28 03:25:55', 'Dima'),
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2016-05-04 09:55:19', 'Dima');

-- --------------------------------------------------------

--
-- Структура таблицы `fio`
--

CREATE TABLE IF NOT EXISTS `fio` (
  `name` text NOT NULL,
  `id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fio`
--

INSERT INTO `fio` (`name`, `id`) VALUES
('Salko', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(55) NOT NULL,
  `datepicker` date NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`num`, `task`, `datepicker`, `done`) VALUES
(1, 'task1', '2016-04-22', 1),
(2, 'task2', '2016-04-23', 1),
(3, 'task3', '2016-04-24', 1),
(4, 'task4', '2016-04-25', 1),
(5, 'task5', '2016-04-28', 1),
(6, 'task6', '2016-04-29', 1),
(7, 'task7', '2016-04-12', 1),
(10, 'task8', '2016-04-15', 1),
(11, 'task9', '2016-04-24', 1),
(12, 'task10', '2016-04-28', 0),
(13, 'task11', '2016-04-06', 0),
(14, 'task12', '2016-04-25', 0),
(15, 'task13', '2016-04-26', 0),
(16, 'task14', '2016-04-26', 0),
(43, 'task15', '2016-05-04', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
