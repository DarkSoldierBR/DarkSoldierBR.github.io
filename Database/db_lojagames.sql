CREATE DATABASE  IF NOT EXISTS `db_lojagames` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `db_lojagames`;
-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_lojagames
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

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
-- Table structure for table `Pedido`
--

DROP TABLE IF EXISTS `Pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido`
--

LOCK TABLES `Pedido` WRITE;
/*!40000 ALTER TABLE `Pedido` DISABLE KEYS */;
INSERT INTO `Pedido` VALUES (1),(2);
/*!40000 ALTER TABLE `Pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido_has_Playstation`
--

DROP TABLE IF EXISTS `Pedido_has_Playstation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedido_has_Playstation` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idPlaystation` int(11) DEFAULT NULL,
  `Preco` double DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido_has_Playstation`
--

LOCK TABLES `Pedido_has_Playstation` WRITE;
/*!40000 ALTER TABLE `Pedido_has_Playstation` DISABLE KEYS */;
INSERT INTO `Pedido_has_Playstation` VALUES (1,10,79.59),(2,10,79.59);
/*!40000 ALTER TABLE `Pedido_has_Playstation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido_has_Xbox`
--

DROP TABLE IF EXISTS `Pedido_has_Xbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedido_has_Xbox` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idXbox` int(11) DEFAULT NULL,
  `Preco` double DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido_has_Xbox`
--

LOCK TABLES `Pedido_has_Xbox` WRITE;
/*!40000 ALTER TABLE `Pedido_has_Xbox` DISABLE KEYS */;
INSERT INTO `Pedido_has_Xbox` VALUES (1,8,187.46),(2,8,187.46);
/*!40000 ALTER TABLE `Pedido_has_Xbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Playstation`
--

DROP TABLE IF EXISTS `Playstation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Playstation` (
  `idPlaystation` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` double DEFAULT NULL,
  PRIMARY KEY (`idPlaystation`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Playstation`
--

LOCK TABLES `Playstation` WRITE;
/*!40000 ALTER TABLE `Playstation` DISABLE KEYS */;
INSERT INTO `Playstation` VALUES (1,'Red Dead Redemption 2','Aventura',124.99),(6,'Tom Clancy\'s Rainbow Six Siege Deluxe Edition','Tiro',44.99),(7,'The Outer Worlds','RPG',187.42),(8,'Borderlands 3','Ação',167.43),(9,'Need for Speed™ Heat','Corrida',160.12),(10,'Battlefield™ V','Tiro',79.59),(11,'Borderlands 3 - Edição Superdeluxe','Ação',334.66);
/*!40000 ALTER TABLE `Playstation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Xbox`
--

DROP TABLE IF EXISTS `Xbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Xbox` (
  `idXbox` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` double DEFAULT NULL,
  PRIMARY KEY (`idXbox`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Xbox`
--

LOCK TABLES `Xbox` WRITE;
/*!40000 ALTER TABLE `Xbox` DISABLE KEYS */;
INSERT INTO `Xbox` VALUES (1,'Cyberpunk 2077','RPG',249.49),(2,'Watch Dogs:® Legion','Ação',230),(3,'Halo: The Master Chief Collection','FPS',129),(4,'Halo 5: Guardians','FPS',79),(5,'Need for Speed™ Heat','Corrida',155.35),(6,'Just Cause 4 Reloaded','Ação',149.95),(7,'Shadow of the Tomb Raider Definitive Edition','Aventura',99.98),(8,'The Outer Worlds','RPG',187.46),(9,'Call of Duty®: Modern Warfare®','Tiro',229),(10,'Battlefield™ V','Tiro',99.5),(11,'The Surge 2','RPG',184),(12,'Gears 5 Ultimate Edition','Tiro',147.95),(13,'Forza Horizon 4 Ultimate Edition','Corrida',156.22),(14,'test','tst',34);
/*!40000 ALTER TABLE `Xbox` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-27 18:09:27
