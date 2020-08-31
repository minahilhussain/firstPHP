-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: myDB
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  UNIQUE KEY `c_id` (`c_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (1,'Jane Austin','Must Read',29),(2,'Caroline','Highly recommended',30);
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rating`
--

DROP TABLE IF EXISTS `Rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rating` (
  `r_id` int(6) NOT NULL AUTO_INCREMENT,
  `book_id` int(6) DEFAULT NULL,
  `u_id` int(6) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `Rating_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rating`
--

LOCK TABLES `Rating` WRITE;
/*!40000 ALTER TABLE `Rating` DISABLE KEYS */;
INSERT INTO `Rating` VALUES (3,29,7,1,0),(4,29,5,1,0),(5,32,5,1,0),(6,33,5,1,0),(7,35,5,1,0),(8,30,8,1,0),(9,30,8,1,0),(10,30,8,0,1),(11,30,8,1,0),(12,30,8,1,0),(13,30,8,0,1),(14,29,8,0,1),(15,29,8,1,0),(16,34,8,1,0),(17,32,11,0,1),(18,32,11,1,0),(19,35,12,1,0),(20,30,15,1,0),(21,30,15,1,0),(22,34,6,0,1),(23,34,6,1,0),(24,33,6,1,0);
/*!40000 ALTER TABLE `Rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `t_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_id` (`t_id`),
  CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `Users_type` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (5,'Anthony Burges','a@gmail.com','$2y$10$VM.b2EQuYINb9GJE.HaHuOOEAX4q6rm9wddMzCojl.nBFmETl8iXa',1,3),(6,'Harper Lee','h@gmail.com','$2y$10$sYJindQLhIijB3GCdL0YRejaR8gO2eH0A1mf/fPVP553uHINLXYlW',1,3),(7,'Jane Austin','j@gmail.com','$2y$10$KedQXsbgHipgrrIYMsy9YeHeK8aXn81CFVr44zjyAnV62usBSOKti',1,3),(9,'Minahil','minahil@gmail.com','$2y$10$8XEC67moXryznLu1EMlq1OIXGX2EKyiRN.vu4HDGmnjs826KHWMlG',1,4),(11,'other','other@gmail.com','$2y$10$Q.gfK.64TgWTqEvTVM96q.7zns5hOvmKnLQdBV7YMneVy05nCRxYi',1,4),(12,'Caroline','c@gmail.com','$2y$10$K.oHtK6lMs1R.FS8TBZE3O2n7ghxuncj4ahyhag4l2k.ds64jReta',1,2),(14,'Admin','admin@gmail.com','$2y$10$3LO/hAoUEcxuiJA/ux3dA.pfvMiN3AKycGXOqLlCqt20SkBP3zTHG',1,1),(15,'User','user@yahoo.com','$2y$10$GbVJxGEJFsCO5J8jPqQbZuTl6dI4qBOedSm33epSK7dwh3ROGsjSu',1,4);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users_type`
--

DROP TABLE IF EXISTS `Users_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users_type` (
  `t_id` int(6) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users_type`
--

LOCK TABLES `Users_type` WRITE;
/*!40000 ALTER TABLE `Users_type` DISABLE KEYS */;
INSERT INTO `Users_type` VALUES (1,'admin'),(2,'Moderator'),(3,'Author'),(4,'other');
/*!40000 ALTER TABLE `Users_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(40) NOT NULL,
  `rating` double DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `des` varchar(500) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (29,'1985','Anthony Burges',3.75,1,'Anthony Burgess Wilson, FRSL, who published under the name Anthony Burgess, was an English writer and composer. Although Burgess was predominantly a comic writer, his dystopian satire A Clockwork Orange remains his best-known novel.','/var/www/my-domain/project1/uploads/17399310.pdf','/var/www/my-domain/project1/uploads/17399310.jpg'),(30,'To Kill a Mockingbird','Harper Lee',3.75,1,'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic','/var/www/my-domain/project1/uploads/2657.pdf','/var/www/my-domain/project1/uploads/2657.jpg'),(32,'Persuasion','Jane Austin',3.33,1,'Persuasion is the last novel fully completed by Jane Austen. It was published at the end of 1817, six months after her death. The story concerns Anne Elliot, a young Englishwoman of 27 years, whose family is moving to lower their expenses and get out of debt. They rent their home to an Admiral and his wife','/var/www/my-domain/project1/uploads/index1.pdf','/var/www/my-domain/project1/uploads/index1.jpeg'),(33,'Sanditon','Jane Austin',5,1,'Sanditon is an unfinished novel by the English writer Jane Austen. In January 1817, Austen began work on a new novel she called The Brothers, later titled Sanditon, and completed eleven chapters before stopping work in mid-March 1817, probably because of her illness','/var/www/my-domain/project1/uploads/index2.pdf','/var/www/my-domain/project1/uploads/index2.jpeg'),(34,'Earthly Powers','Anthony Burges',3.33,1,'Earthly Powers is a panoramic saga novel of the 20th century by Anthony Burgess first published in 1980. It begins with the \"outrageously provocative\" first sentence: \"It was the afternoon of my eighty-first birthday, and I was in bed with my catamite when Ali announced that the archbishop had come to see me','/var/www/my-domain/project1/uploads/index3.pdf','/var/www/my-domain/project1/uploads/index3.jpeg'),(35,'The Doctor Is Sick','Anthony Burges',5,1,'The Doctor Is Sick is a 1960 novel by Anthony Burgess. According to his autobiography, Burgess composed the book in just six weeks.','/var/www/my-domain/project1/uploads/index4.pdf','/var/www/my-domain/project1/uploads/index4.jpeg'),(37,'Go Set a Watchman','Harper Lee',0,1,'Go Set a Watchman is a novel by Harper Lee written before the Pulitzer Prizeâ€“winning To Kill a Mockingbird, her first and only other published novel. Although initially promoted as a sequel by its publisher, it is now accepted as being a first draft of To Kill a Mockingbird with many passages being used again','/var/www/my-domain/project1/uploads/index7.pdf','/var/www/my-domain/project1/uploads/index7.jpg'),(38,'Turkey Claus','Harper Lee',0,1,'Turkey needs Santa\'s help so he won\'t be eaten for Christmas dinner. Turkey is in trouble. Again. He made it through Thanksgiving without becoming a turkey dinner, but now it\'s almost Christmas, and guess what\'s on the menu? Turkey decides the only thing to do is to ask Santa for help.','../uploads/index6.pdf','../uploads/index6.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-31 11:09:53
