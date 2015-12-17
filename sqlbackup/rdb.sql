-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 16 2015 г., 16:24
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
CREATE DATABASE IF NOT EXISTS `rdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rdb`;

-- --------------------------------------------------------

--
-- Структура таблицы `comment_email`
--

DROP TABLE IF EXISTS `comment_email`;
CREATE TABLE IF NOT EXISTS `comment_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `comment` text,
  `email` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Эта таблица несёт резервный функционал' AUTO_INCREMENT=1 ;

--
-- Очистить таблицу перед добавлением данных `comment_email`
--

TRUNCATE TABLE `comment_email`;
-- --------------------------------------------------------

--
-- Структура таблицы `game_list`
--

DROP TABLE IF EXISTS `game_list`;
CREATE TABLE IF NOT EXISTS `game_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Эта таблица содержит список игр и информацию о них' AUTO_INCREMENT=4 ;

--
-- Очистить таблицу перед добавлением данных `game_list`
--

TRUNCATE TABLE `game_list`;
--
-- Дамп данных таблицы `game_list`
--

INSERT INTO `game_list` (`id`, `game_name`, `image_link`, `comment`) VALUES
(1, 'Аномалия', '/images/anomaly_2.jpg', 'Команде из 2-4 человек предстоит решить захватывающие дух задачи, обнаружить тайники, использовать подсказки и найти ключи, чтобы выбраться из комнаты за 60 минут. Аномалия даст вам возможность проверить себя в крайне нестандартной ситуации. Чтобы понять чего вы стоите, нужно потерять свободу. Оказаться внутри Аномалии и найти выход. Многие люди не ценят свободу, пока не потеряют её. Чтобы почувствовать насколько дорога свобода, Вы потеряете её на час. Легко войти - сложно выйти! Участие в квесте в реальном времени "Тайна профессора" от "Аномалии" для компании до 4 человек от 198 грн! Екатеринослав 1925 год. В квартире профессора Лукьянова, изучающего редкие заболевания, произошло нечто страшное и необъяснимое. Найдены несколько тел, погибших при загадочных обстоятельствах, среди них и сам профессор.'),
(2, 'Мафия', '/images/mafia.jpg', '«Ма́фия» — салонная командная психологическая пошаговая ролевая игра с детективным сюжетом, моделирующая борьбу информированных друг о друге членов организованного меньшинства с неорганизованным большинством.\r\nЗавязка сюжета: Жители города, обессилевшие от разгула мафии, выносят решение пересажать в тюрьму всех мафиози до единого. В ответ мафия объявляет войну до полного уничтожения всех мирных горожан.'),
(3, 'Oculus Rift', '/images/virtual.jpg', 'Oculus Rift — очки виртуальной реальности, предоставивший, по заявлениям создателей, более широкое поле зрения, чем более ранние разработки[5][6]. Устройство создано компанией Oculus VR (изначально около 20 работников), получившей финансирование в размере 91 млн долларов США, из которых 2,4 млн было собрано на краудфандинговой платформе Kickstarter[4]. Компания основана Палмером Лаки[7] и Джоном Кармаком (позже стал CTO в Oculus VR)[8].\r\n\r\nНабор разработчика первой версии (DK1) продаётся с лета 2013 года. Вторая версия для разработчиков (DK2) стала доступна в июле 2014 года.[9] Всего к концу 2014 года было продано более 100 тысяч комплектов разработчика[10]. Потребительская версия (CV1) планируется к выпуску в первом квартале 2016 года[11].\r\n\r\nО проекте Oculus Rift положительно высказывались Джон Кармак, Гейб Ньюэлл, Клифф Блезински, Майкл Абраш, Тим Суини, Крис Робертс (англ.)русск. и другие. 25 марта 2014 года компания Oculus VR была приобретена Facebook за 2 миллиарда долларов США[12]; хотя до этого момента Oculus Rift позиционировался исключительно как устройство для компьютерных игр, руководитель Facebook Марк Цукерберг объявил, что видит в Oculus Rift и устройствах виртуальной реальности основу для нового поколения компьютерных технологий, которое идет на смену смартфонам[13].');

-- --------------------------------------------------------

--
-- Структура таблицы `recent_reviews`
--

DROP TABLE IF EXISTS `recent_reviews`;
CREATE TABLE IF NOT EXISTS `recent_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` date DEFAULT NULL,
  `quality` int(1) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Комментарии и отзывы о сайте и компании' AUTO_INCREMENT=6 ;

--
-- Очистить таблицу перед добавлением данных `recent_reviews`
--

TRUNCATE TABLE `recent_reviews`;
--
-- Дамп данных таблицы `recent_reviews`
--

INSERT INTO `recent_reviews` (`id`, `author`, `comment`, `date`, `quality`) VALUES
(1, 'Анна Трушниковы', 'Большая благодарность организаторам!!!! Было весело, интересно, (где бы мы еще по болоту бы походили!!!!!!!!!!)))))))) советуем присоединяться!!!!', '2015-11-27', 5),
(2, 'Большой Тугрик', 'Работаем с фирмой N уже довольно давно. Никаких нареканий, одни положительные впечатления. Будем продолжать сотрудничество.', '2015-11-27', 3),
(3, 'Малый Тугрик', 'Наша компания впервые обратилась к фирме N около полугода назад с задачей разработать продающий сайт, который реально генерирует продажи, а не ...', '2015-11-27', 1),
(4, 'Южный треугольник', 'Отличный квест! Приятно провели время всей компанией. Давно хотел сходить на что-нибудь подобное в нашем регионе (был в Москве на похожем, очень понравилось). \nБыло бы замечательно, если бы была возможность заказать квест на День рождения - хороший способ развлечь и познакомить гостей, которые видят друг друга впервые.', '2015-12-15', 5);

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

DROP TABLE IF EXISTS `registered_users`;
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
  `selected_game` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_work_shedule_idx` (`work_schedule_fk`),
  KEY `fk_selected_game_idx` (`selected_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица хранит данные о зарезервированных Датах и участниках' AUTO_INCREMENT=1 ;

--
-- Очистить таблицу перед добавлением данных `registered_users`
--

TRUNCATE TABLE `registered_users`;
-- --------------------------------------------------------

--
-- Структура таблицы `work_schedule`
--

DROP TABLE IF EXISTS `work_schedule`;
CREATE TABLE IF NOT EXISTS `work_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_shedule` varchar(255) CHARACTER SET cp1251 DEFAULT NULL COMMENT 'Текст расписания(например: с 12.00 до 13.00)',
  `count_shedule` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Конфигуратор расписания на рабочий день' AUTO_INCREMENT=9 ;

--
-- Очистить таблицу перед добавлением данных `work_schedule`
--

TRUNCATE TABLE `work_schedule`;
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
  ADD CONSTRAINT `fk_selected_game` FOREIGN KEY (`selected_game`) REFERENCES `game_list` (`id`),
  ADD CONSTRAINT `fk_work_shedule` FOREIGN KEY (`work_schedule_fk`) REFERENCES `work_schedule` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
