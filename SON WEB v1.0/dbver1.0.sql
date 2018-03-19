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
INSERT INTO `acc_data` VALUES ('2160819@slu.edu.ph','Nikki Ganotan','2160819@slu.edu.ph.doc'),('2162253@slu.edu.ph','Jerome Francis Salazar','2162253@slu.edu.ph.doc'),('2162752@slu.edu.ph','Mitch Ainslie Galatcha','21262752@slu.edu.ph.doc'),('2163907@slu.edu.ph','Dean Christian Baguisi','2163907@slu.edu.ph.doc'),('ferrerelisa@ymail.com','Elisa Calugay Ferrer','ferrerelisa@ymail.com.doc'),('markjob06@yahoo.com','Mark Job Gavina Bascos','markjob06@yahoo.com.doc'),('mgclacanaria@slu.edu.ph','Mary Grace Calano Lacanaria','mgclacanaria@slu.edu.ph.doc'),('sheiffree@yahoo.com','Jefferson Sarenas Galanza','sheiffree@yahoo.com.doc'),('teresabasatan@yahoo.com.ph','Teresa Nagata Basatan','teresabasatan@yahoo.com.ph.doc');
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
INSERT INTO `accounts` VALUES ('2160819@slu.edu.ph','$2y$10$kQkIVQ5UsluWlvTRF2ufPOWgx65qmCAIg73eRFNnJJkxseAtPDW/.','0'),('2162253@slu.edu.ph','$2y$10$PirINRx3FIfjo2cAFFTuzOE6aE/1UfIIemSKWYYkNdXQssOoDkALG','0'),('2162752@slu.edu.ph','$2y$10$3U.K/WUNYlEqrR7Kxb8ahub2Hr9SW0f5Hz.oaeD9aUUV3u1TTKHx.','0'),('2163907@slu.edu.ph','$2y$10$qpBOcJ5cpehmPBoyWH7Qo.4WDMIlgxHTgDJyaYLcfJL68evA2dLUm','0'),('ferrerelisa@ymail.com','$2y$10$xfPB6WnqtTSJDDUKKEtxvOqN8QFPJhxlxlsIXTt/5f3V3zbyMI9iq','1'),('markjob06@yahoo.com','$2y$10$YRA/rIAByDyD3kTEZY2BHeMdjxKZS7Z3Qzn5ZyGo8hHO6H5hY0WGG','1'),('mgclacanaria@slu.edu.ph','$2y$10$1QHnbAVbIC0Pmdr70AH65u/uBHtlaEPHYqK4WjK9sHUh0NCGCIc1K','1'),('sheiffree@yahoo.com','$2y$10$4FUXJgfPz/ieV.LyF/akMeap44y/xREKOx13EmZ4O6H01F4zje/Xa','1'),('teresabasatan@yahoo.com.ph','$2y$10$vN1.hHEPTxp3eGRaVs1xZu7DfMvdZ6djrK2Nj2C.fnbOHWiC//vlO','1');
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

-- Dump completed on 2018-03-19 18:38:34
