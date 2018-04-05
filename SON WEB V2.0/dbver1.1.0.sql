CREATE DATABASE  IF NOT EXISTS `son` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `son`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: son
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `acc_data`
--

DROP TABLE IF EXISTS `acc_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_data` (
  `email` varchar(45) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_cv` mediumblob NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `fac_name_UNIQUE` (`acc_name`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_data`
--

LOCK TABLES `acc_data` WRITE;
/*!40000 ALTER TABLE `acc_data` DISABLE KEYS */;
INSERT INTO `acc_data` VALUES ('2160819@slu.edu.ph','Nikki Ganotan','2160819@slu.edu.ph.doc'),('2162253@slu.edu.ph','Jerome Francis Salazar','2162253@slu.edu.ph.CVNiMitch.docx'),('2162752@slu.edu.ph','Mitch Ainslie Galatcha','2162752@slu.edu.ph.CVNiMitch.docx'),('2163907@slu.edu.ph','Dean Christian Baguisi','2163907@slu.edu.ph.2163907@slu.edu.ph.doc'),('bautistaelizabeth0701@gmail.com','Elizabeth Hull Bautista','bautistaelizabeth0701@gmail.com.doc'),('cayoy5@yahoo.com.ph','Carolina Villareal Bayla','cayoy5@yahoo.com.ph.doc'),('cherdalilis@yahoo.com','Cherylina Geston Dalilis','cherdalilis@yahoo.com.doc'),('cmbandaay@yahoo.com','Cheryll Mazaredo Bandaay','cmbandaay@yahoo.com.doc'),('denski74@yahoo.com','Dennis Glen Gascon Ramos','denski74@yahoo.com.doc'),('depaysodiadem@gmail.com','Diadem Lasegan Depayso','depaysodiadem@gmail.com.doc'),('donleonardodacumos@yahoo.com','Don Leonardo Narciza Dacumos','donleonardodacumos@yahoo.com.doc'),('ems2569@yahoo.com','Emily Poyaoan Abad','ems2569@yahoo.com.doc'),('engelbert_manuel@yahoo.com','Engelbert Cariaso Manuel','engelbert_manuel@yahoo.com.doc'),('erythropoeitin2011@yahoo.com','Rachel Cacho Alfonso','erythropoeitin2011@yahoo.com.doc'),('ferrerelisa@ymail.com','Elisa Calugay Ferrer','ferrerelisa@ymail.com.doc'),('florence_pulido@yahoo.com','Florence Loyao Pulido','florence_pulido@yahoo.com.doc'),('markjob06@yahoo.com','Mark Job Gavina Bascos','markjob06@yahoo.com.doc'),('mcc4370@yahoo.com','Marites Casino Cabansag','mcc4370@yahoo.com.doc'),('mgclacanaria@slu.edu.ph','Mary Grace Calano Lacanaria','mgclacanaria@slu.edu.ph.doc'),('ntdslu@yahoo.com','Norenia Tocli-E Dao-ayen','ntdslu@yahoo.com.doc'),('rona_abul@yahoo.com','Rufina Calub Abul','rona_abul@yahoo.com.doc'),('rosecpachao@yahoo.com.ph','Rosemarie Cawis Pachao','rosecpachao@yahoo.com.ph.doc'),('rvabubo@yahoo.com','Rhoel Villanueva Abubo','rvabubo@yahoo.com.doc'),('sheiffree@yahoo.com','Jefferson Sarenas Galanza','sheiffree@yahoo.com.doc'),('teresabasatan@yahoo.com.ph','Teresa Nagata Basatan','teresabasatan@yahoo.com.ph.doc'),('yaj_golva17@yahoo.com','Jay Agati Ablog','yaj_golva17@yahoo.com.doc');
/*!40000 ALTER TABLE `acc_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `acc_data` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES ('2160819@slu.edu.ph','$2y$10$kQkIVQ5UsluWlvTRF2ufPOWgx65qmCAIg73eRFNnJJkxseAtPDW/.','0'),('2162253@slu.edu.ph','$2y$10$PirINRx3FIfjo2cAFFTuzOE6aE/1UfIIemSKWYYkNdXQssOoDkALG','0'),('2162752@slu.edu.ph','$2y$10$N2yb/9nNvdGwA00THgRRZuGdDGZ0GGaHHct4TyBy2JCJaAex1vSiG','0'),('2163907@slu.edu.ph','$2y$10$qpBOcJ5cpehmPBoyWH7Qo.4WDMIlgxHTgDJyaYLcfJL68evA2dLUm','0'),('bautistaelizabeth0701@gmail.com','$2y$10$9H2d08Jeq8rS1DhJ6teBNugUjm/70oh1aivGzUva2trrQ64x.P/B.','1'),('cayoy5@yahoo.com.ph','$2y$10$7VQBsI/9js248V.H.wRh5uyLz9sT..e.mnYS5jkiOuBQs2dAS7pau','1'),('cherdalilis@yahoo.com','$2y$10$aZHBe4dTZN5DjX20Pf20Tu5TsGc3rneD1g.uQq9tUUOc5qxkrb9wu','1'),('cmbandaay@yahoo.com','$2y$10$C4A6Ryi4/p4yqnT/DymAfusNejzwWQ0rrjxHsiMw.XZAuzhYidjLC','1'),('denski74@yahoo.com','$2y$10$RgZKc4odG5az9NZ88cY2WuqTR.dNuGsYSbkaN9EBVfV3cbRVIpOvW','1'),('depaysodiadem@gmail.com','$2y$10$szfIWjMH7QAHuF.WmHJMCOrI9.K3uDfv99mS8TIKdP7Sz9AY0qKjO','1'),('donleonardodacumos@yahoo.com','$2y$10$/THwD/jsV5KGal5z6UpOYuvazMi37u6k4vmkFXlc1Oo4NoV3W67J.','1'),('ems2569@yahoo.com','$2y$10$telBvtmjr0AhomIARg5bdO6NnmYKupil8ETitlEvBLuFlGHpkG2Te','1'),('engelbert_manuel@yahoo.com','$2y$10$UenE35DGth9zp3I8JaYiTuSd9xd98ceC0Wg99/Qpyn5ZmMOkzY.5S','1'),('erythropoeitin2011@yahoo.com','$2y$10$q/DGdFsXxWsH5jSURQk9Bu5suEKMoLXqu1KTVIHcpIaazUkgSUT9q','1'),('ferrerelisa@ymail.com','$2y$10$5gq71p9Qwheib7RfnBiSPuQKy.l9QQg8VWpW.2085rlaqZqBfvuNa','1'),('florence_pulido@yahoo.com','$2y$10$3X2aebYXgj62v9Y7bAyeW.TfKGNnTUdcS1cmAuUd5UY1y6xV8m4sO','1'),('markjob06@yahoo.com','$2y$10$eh/7qFrc7S.rXfWZyCt9M.KXfUS8bKhxIUD7dBhenQw2NB7W0MPUu','1'),('mcc4370@yahoo.com','$2y$10$VNdUrieIu/lnYOWBHiWL6ORwDnsxCQBwJ3x7vAKWG1UNR6wwZYWLq','1'),('mgclacanaria@slu.edu.ph','$2y$10$RUD4nKdeUC4B0WiJVh77.uZeG5Gf.7sr7CkIJLcpAE3T42wmiKXzW','1'),('ntdslu@yahoo.com','$2y$10$kSgOnCf1DHBRW0D6sMtHweTxyCCkMyOxcBmu6HET/Edmv7WJT4/kq','0'),('rona_abul@yahoo.com','$2y$10$a22NyZ7gbY0A/7aBfaone.ePegOh9RoscMM5CY3cdOWDljOb1ONR6','1'),('rosecpachao@yahoo.com.ph','$2y$10$Xhet1gxLiwCm1o7sVyOHwuHyOzZSdchBU9Zkpuco09v5BpBomHcwu','1'),('rvabubo@yahoo.com','$2y$10$Le18sqeWvd7x2judzJfQ5.3M0YdlEWY/yTFSm4deVZ97GMH4vTlNG','1'),('sheiffree@yahoo.com','$2y$10$yHBr3F7sL36ei7Mt.jfu8OSoATRWRjYZKLvRws5eWoSLjRyywFSwe','1'),('teresabasatan@yahoo.com.ph','$2y$10$CeH6HVZp3y/NGuwleU1mnOCUl8X7T3H8mYjZWZcuFHzeA1IFU7ybC','1'),('yaj_golva17@yahoo.com','$2y$10$skqrNzi6QnisjRWL84J6Ue2dIWYMM3eTosCSuSH45ESykSZo5S8r2','1');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-26  6:40:54
