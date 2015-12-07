-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rdb
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `game_list`
--

DROP TABLE IF EXISTS `game_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_list` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_list`
--

LOCK TABLES `game_list` WRITE;
/*!40000 ALTER TABLE `game_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent_reviews`
--

DROP TABLE IF EXISTS `recent_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recent_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` date DEFAULT NULL,
  `quality` int(1) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent_reviews`
--

LOCK TABLES `recent_reviews` WRITE;
/*!40000 ALTER TABLE `recent_reviews` DISABLE KEYS */;
INSERT INTO `recent_reviews` VALUES (1,'Анна Трушниковы','Большая благодарность организаторам!!!! Было весело, интересно, (где бы мы еще по болоту бы походили!!!!!!!!!!)))))))) советуем присоединяться!!!!','2015-11-27',5),(2,'Большой Тугрик','Работаем с фирмой N уже довольно давно. Никаких нареканий, одни положительные впечатления. Будем продолжать сотрудничество.','2015-11-27',3),(3,'Малый Тугрик','Наша компания впервые обратилась к фирме N около полугода назад с задачей разработать продающий сайт, который реально генерирует продажи, а не ...','2015-11-27',1);
/*!40000 ALTER TABLE `recent_reviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `recent_reviews_def_date` BEFORE INSERT ON `recent_reviews`
 FOR EACH ROW IF (NEW.`date` IS NULL) THEN SET NEW.`date`= CURRENT_DATE;
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_users` (
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
  KEY `fk_work_shedule_idx` (`work_schedule_fk`),
  CONSTRAINT `fk_work_shedule` FOREIGN KEY (`work_schedule_fk`) REFERENCES `work_schedule` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_users`
--

LOCK TABLES `registered_users` WRITE;
/*!40000 ALTER TABLE `registered_users` DISABLE KEYS */;
INSERT INTO `registered_users` VALUES (1,'Руслан','','rudadochkin@yandex.ru','паша косячит )))))',3,'+7 (950) 594-3808','2015-11-19',3),(3,'asdfasdfasdf','','dafshdfjkyhgads@mail.ru','fsagasdf',4,'+7 (834) 576-1829','2015-11-24',4);
/*!40000 ALTER TABLE `registered_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_schedule`
--

DROP TABLE IF EXISTS `work_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_shedule` varchar(255) CHARACTER SET cp1251 DEFAULT NULL COMMENT 'Текст расписания(например: с 12.00 до 13.00)',
  `count_shedule` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_schedule`
--

LOCK TABLES `work_schedule` WRITE;
/*!40000 ALTER TABLE `work_schedule` DISABLE KEYS */;
INSERT INTO `work_schedule` VALUES (1,'с 12:00 до 13:00 ',1),(2,'с 13:30 до 14:30 ',2),(3,'с 15:00 до 16:00 ',3),(4,'с 16:30 до 17:30',4),(5,'с 18:00 до 19:00 ',5),(6,'с 19:30 до 20:30 ',6),(7,'с 21:00 до 21:30',7),(8,'с 22:00 до 23:00',8);
/*!40000 ALTER TABLE `work_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-01 18:04:26
