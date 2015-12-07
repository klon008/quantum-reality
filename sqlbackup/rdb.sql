-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 07 2015 г., 17:47
-- Версия сервера: 5.5.46-0ubuntu0.14.04.2
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `rdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment_email`
--

CREATE TABLE IF NOT EXISTS `comment_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `comment` text,
  `email` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Эта таблица несёт резервный функционал' AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `comment_email`
--

INSERT INTO `comment_email` (`id`, `name`, `contact_phone`, `comment`, `email`, `time`) VALUES
(1, 'фвыаыва', '+7 (894) 655-4984', 'asdfdf', 'klon_008@mail.ru', '2015-12-06 18:08:01'),
(2, 'wwwwwwwwwww', '+7 (923) 777-777', 'sdafasdfsadf', 'asdasd@mail.ru', '2015-12-06 19:54:18'),
(3, 'wwwwwwwwwww', '+7 (923) 777-777', 'sdafasdfsadf', 'asdasd@mail.ru', '2015-12-06 19:57:15'),
(4, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:02:03'),
(5, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:03:31'),
(6, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:04:56'),
(7, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:05:08'),
(8, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:05:34'),
(9, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:06:12'),
(10, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:06:38'),
(11, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:09:03'),
(12, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:11:31'),
(13, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:12:28'),
(14, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:16:31'),
(15, 'wqeqweqwe', '+7 (213) 213-1231', 'dsafgasdfgasdf', 'klon_007182374@masda.ri', '2015-12-06 20:18:33'),
(16, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:19:06'),
(17, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:22:41'),
(18, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:22:56'),
(19, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:23:36'),
(20, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:25:25'),
(21, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:27:22'),
(22, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:29:12'),
(23, 'KLON', '+7 (923) 444-4444', 'Привет!', 'klon_008@mail.ru', '2015-12-06 20:29:14'),
(24, 'wwwwwww', '+7 (894) 655-4984', 'asdfasdf', 'klon_007182374@masda.ri', '2015-12-06 20:29:34'),
(25, 'wwwwwww', '+7 (894) 655-4984', 'asdfasdf', 'klon_007182374@masda.ri', '2015-12-06 20:29:35'),
(26, 'wwwwwww', '+7 (894) 655-4984', 'asdfasdf', 'klon_007182374@masda.ri', '2015-12-06 20:30:30'),
(27, 'wwwwwww', '+7 (894) 655-4984', 'asdfasdf', 'klon_007182374@masda.ri', '2015-12-06 20:31:26'),
(28, 'wwwwwww', '+7 (234) 123-1231', 'asdfdsf', 'klon_007182374@masda.ri', '2015-12-06 20:33:11'),
(29, 'asdffffffffffffffff', '+7 (894) 655-4984', 'asddddddddddddddddd', 'klon_007182374@masda.ri', '2015-12-06 20:39:34'),
(30, 'wwwwwww', '+7 (234) 123-1231', 'asdfasdf', 'klon_007182374@masda.ri', '2015-12-06 20:40:49'),
(31, 'фвыаыва', '+7 (234) 123-1231', '213231', 'klon_007182374@masda.ri', '2015-12-07 07:51:41');

-- --------------------------------------------------------

--
-- Структура таблицы `game_list`
--

CREATE TABLE IF NOT EXISTS `game_list` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `recent_reviews`
--

CREATE TABLE IF NOT EXISTS `recent_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` date DEFAULT NULL,
  `quality` int(1) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `recent_reviews`
--

INSERT INTO `recent_reviews` (`id`, `author`, `comment`, `date`, `quality`) VALUES
(1, 'Анна Трушниковы', 'Большая благодарность организаторам!!!! Было весело, интересно, (где бы мы еще по болоту бы походили!!!!!!!!!!)))))))) советуем присоединяться!!!!', '2015-11-27', 5),
(2, 'Большой Тугрик', 'Работаем с фирмой N уже довольно давно. Никаких нареканий, одни положительные впечатления. Будем продолжать сотрудничество.', '2015-11-27', 3),
(3, 'Малый Тугрик', 'Наша компания впервые обратилась к фирме N около полугода назад с задачей разработать продающий сайт, который реально генерирует продажи, а не ...', '2015-11-27', 1);

--
-- Триггеры `recent_reviews`
--
DROP TRIGGER IF EXISTS `recent_reviews_def_date`;
DELIMITER //
CREATE TRIGGER `recent_reviews_def_date` BEFORE INSERT ON `recent_reviews`
 FOR EACH ROW IF (NEW.`date` IS NULL) THEN SET NEW.`date`= CURRENT_DATE;
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `registered_users`
--

CREATE TABLE IF NOT EXISTS `registered_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET cp1251 NOT NULL COMMENT 'Имя',
  `surname` varchar(255) CHARACTER SET cp1251 NOT NULL COMMENT 'Фамилия',
  `email` varchar(255) CHARACTER SET cp1251 DEFAULT NULL COMMENT 'Емэйл',
  `comment` text CHARACTER SET cp1251 COMMENT 'Комментарий',
  `number_participants` int(11) NOT NULL COMMENT 'Количество персон',
  `contact_phone` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
  `date` date NOT NULL,
  `work_schedule_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_work_shedule_idx` (`work_schedule_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `registered_users`
--

INSERT INTO `registered_users` (`id`, `name`, `surname`, `email`, `comment`, `number_participants`, `contact_phone`, `date`, `work_schedule_fk`) VALUES
(1, 'Руслан', '', 'rudadochkin@yandex.ru', 'паша косячит )))))', 3, '+7 (950) 594-3808', '2015-11-19', 3),
(3, 'asdfasdfasdf', '', 'dafshdfjkyhgads@mail.ru', 'fsagasdf', 4, '+7 (834) 576-1829', '2015-11-24', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `work_schedule`
--

CREATE TABLE IF NOT EXISTS `work_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_shedule` varchar(255) CHARACTER SET cp1251 DEFAULT NULL COMMENT 'Текст расписания(например: с 12.00 до 13.00)',
  `count_shedule` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `work_schedule`
--

INSERT INTO `work_schedule` (`id`, `text_shedule`, `count_shedule`) VALUES
(1, 'с 12:00 до 13:00 ', 1),
(2, 'с 13:30 до 14:30 ', 2),
(3, 'с 15:00 до 16:00 ', 3),
(4, 'с 16:30 до 17:30', 4),
(5, 'с 18:00 до 19:00 ', 5),
(6, 'с 19:30 до 20:30 ', 6),
(7, 'с 21:00 до 21:30', 7),
(8, 'с 22:00 до 23:00', 8);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `registered_users`
--
ALTER TABLE `registered_users`
  ADD CONSTRAINT `fk_work_shedule` FOREIGN KEY (`work_schedule_fk`) REFERENCES `work_schedule` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
