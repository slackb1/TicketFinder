CREATE DATABASE  IF NOT EXISTS `db_spring17_slackb1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_spring17_slackb1`;
-- MySQL dump 10.13  Distrib 5.6.17, for osx10.6 (i386)
--
-- Host: csweb.hh.nku.edu    Database: db_spring17_slackb1
-- ------------------------------------------------------
-- Server version	5.5.44

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
-- Table structure for table `finalproject_users`
--

DROP TABLE IF EXISTS `finalproject_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finalproject_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finalproject_users`
--

LOCK TABLES `finalproject_users` WRITE;
/*!40000 ALTER TABLE `finalproject_users` DISABLE KEYS */;
INSERT INTO `finalproject_users` VALUES (1,'user','pass',0),(2,'admin','pass',1),(4,'new','pass',0);
/*!40000 ALTER TABLE `finalproject_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finalproject_reservations`
--

DROP TABLE IF EXISTS `finalproject_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finalproject_reservations` (
  `reservationID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `numOfTickets` int(11) NOT NULL,
  PRIMARY KEY (`reservationID`),
  KEY `userID_idx` (`userID`),
  KEY `eventID_idx` (`eventID`),
  CONSTRAINT `eventID` FOREIGN KEY (`eventID`) REFERENCES `finalproject_events` (`eventID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `finalproject_users` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finalproject_reservations`
--

LOCK TABLES `finalproject_reservations` WRITE;
/*!40000 ALTER TABLE `finalproject_reservations` DISABLE KEYS */;
INSERT INTO `finalproject_reservations` VALUES (3,4,2,3),(12,1,1,3),(17,1,8,2),(18,1,9,5);
/*!40000 ALTER TABLE `finalproject_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finalproject_events`
--

DROP TABLE IF EXISTS `finalproject_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finalproject_events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` tinytext NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `photopath` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finalproject_events`
--

LOCK TABLES `finalproject_events` WRITE;
/*!40000 ALTER TABLE `finalproject_events` DISABLE KEYS */;
INSERT INTO `finalproject_events` VALUES (1,'Clutch','Louisville','KY','The Louisville Palace','2017-05-12','images/clutch.jpg'),(2,'Tom Petty & The Heartbreakers','Cincinnati','OH','US Bank Arena','2017-06-12','images/tom_petty.jpg'),(4,'Casting Crowns','Highland Heights','KY','BB&T Arena','2017-05-27','images/castingcrowns.jpg'),(5,'Incubus','Cincinnati','OH','Riverbend Music Center','2017-07-27','images/incubus.jpg'),(6,'Ben Folds','Cincinnati','OH','Taft Theatre','2017-05-09','images/benfolds.jpg'),(7,'Jimmy Buffett','Cincinnati','OH','My Backyard','2017-07-08','images/buffet.jpg'),(8,'Tim McGraw','Louisville','KY','KFC Yum! Center','2017-04-28','images/mcgraw.jpg'),(9,'Red Hot Chili Peppers','Louisville','KY','KFC Yum! Center','2017-05-16','images/chilipeppers.jpg'),(10,'Third Eye Blind','Indianapolis','IN','The Lawn White River State Park','2017-07-09','images/thirdeyeblind.jpg');
/*!40000 ALTER TABLE `finalproject_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-26 16:53:47
