CREATE DATABASE  IF NOT EXISTS `srhotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `srhotel`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: srhotel
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `quarto`
--

DROP TABLE IF EXISTS `quarto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quarto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `andar` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `status` enum('Disponível','Ocupado') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_quarto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarto`
--

LOCK TABLES `quarto` WRITE;
/*!40000 ALTER TABLE `quarto` DISABLE KEYS */;
INSERT INTO `quarto` VALUES (1,101,1,1,'Disponível'),(2,102,1,1,'Disponível'),(3,103,1,1,'Disponível'),(4,104,1,1,'Disponível'),(5,105,1,2,'Disponível'),(6,106,1,1,'Disponível'),(7,107,1,1,'Disponível'),(8,108,1,1,'Disponível'),(9,109,1,1,'Disponível'),(10,110,1,2,'Disponível'),(11,111,1,1,'Disponível'),(12,112,1,1,'Disponível'),(13,113,1,1,'Disponível'),(14,114,1,1,'Disponível'),(15,115,1,3,'Disponível'),(16,116,1,1,'Disponível'),(17,117,1,1,'Disponível'),(18,118,1,1,'Disponível'),(19,119,1,1,'Disponível'),(20,120,1,4,'Disponível'),(21,121,1,1,'Disponível'),(22,201,2,1,'Disponível'),(23,202,2,1,'Disponível'),(24,203,2,1,'Disponível'),(25,204,2,1,'Disponível'),(26,205,2,2,'Disponível'),(27,206,2,1,'Disponível'),(28,207,2,1,'Disponível'),(29,208,2,1,'Disponível'),(30,209,2,1,'Disponível'),(31,210,2,2,'Disponível'),(32,211,2,1,'Disponível'),(33,212,2,1,'Disponível'),(34,213,2,1,'Disponível'),(35,214,2,1,'Disponível'),(36,215,2,3,'Disponível'),(37,216,2,1,'Disponível'),(38,217,2,1,'Disponível'),(39,218,2,1,'Disponível'),(40,219,2,1,'Disponível'),(41,220,2,4,'Disponível'),(42,221,2,1,'Disponível'),(43,301,3,1,'Disponível'),(44,302,3,1,'Disponível'),(45,303,3,1,'Disponível'),(46,304,3,1,'Disponível'),(47,305,3,2,'Disponível'),(48,306,3,1,'Disponível'),(49,307,3,1,'Disponível'),(50,308,3,1,'Disponível'),(51,309,3,1,'Disponível'),(52,310,3,2,'Disponível'),(53,311,3,1,'Disponível'),(54,312,3,1,'Disponível'),(55,313,3,1,'Disponível'),(56,314,3,1,'Disponível'),(57,315,3,3,'Disponível'),(58,316,3,1,'Disponível'),(59,317,3,1,'Disponível'),(60,318,3,1,'Disponível'),(61,319,3,1,'Disponível'),(62,320,3,4,'Disponível'),(63,321,3,1,'Disponível'),(64,401,4,1,'Disponível'),(65,402,4,1,'Disponível'),(66,403,4,1,'Disponível'),(67,404,4,1,'Disponível'),(68,405,4,2,'Disponível'),(69,406,4,1,'Disponível'),(70,407,4,1,'Disponível'),(71,408,4,1,'Disponível'),(72,409,4,1,'Disponível'),(73,410,4,2,'Disponível'),(74,411,4,1,'Disponível'),(75,412,4,1,'Disponível'),(76,413,4,1,'Disponível'),(77,414,4,1,'Disponível'),(78,415,4,3,'Disponível'),(79,416,4,1,'Disponível'),(80,417,4,1,'Disponível'),(81,418,4,1,'Disponível'),(82,419,4,1,'Disponível'),(83,420,4,4,'Disponível'),(84,421,4,1,'Disponível'),(85,501,5,1,'Disponível'),(86,502,5,1,'Disponível'),(87,503,5,1,'Disponível'),(88,504,5,1,'Disponível'),(89,505,5,2,'Disponível'),(90,506,5,1,'Disponível'),(91,507,5,1,'Disponível'),(92,508,5,1,'Disponível'),(93,509,5,1,'Disponível'),(94,510,5,2,'Disponível'),(95,511,5,1,'Disponível'),(96,512,5,1,'Disponível'),(97,513,5,1,'Disponível'),(98,514,5,1,'Disponível'),(99,515,5,3,'Disponível'),(100,516,5,1,'Disponível'),(101,517,5,1,'Disponível'),(102,518,5,1,'Disponível'),(103,519,5,1,'Disponível'),(104,520,5,4,'Disponível'),(105,521,5,1,'Disponível');
/*!40000 ALTER TABLE `quarto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-12 18:57:16
