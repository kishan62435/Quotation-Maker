-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: quotation
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `graphics card`
--

DROP TABLE IF EXISTS `graphics card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `graphics card` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `gst` decimal(6,2) NOT NULL,
  `rate` decimal(8,3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graphics card`
--

LOCK TABLES `graphics card` WRITE;
/*!40000 ALTER TABLE `graphics card` DISABLE KEYS */;
INSERT INTO `graphics card` VALUES (1,'NVIDIA gt530',18.00,6000.000);
/*!40000 ALTER TABLE `graphics card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hard disk`
--

DROP TABLE IF EXISTS `hard disk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hard disk` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `gst` decimal(6,2) NOT NULL,
  `rate` decimal(8,3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hard disk`
--

LOCK TABLES `hard disk` WRITE;
/*!40000 ALTER TABLE `hard disk` DISABLE KEYS */;
INSERT INTO `hard disk` VALUES (2,'Adata 1 TB hard disk',18.00,2350.000);
/*!40000 ALTER TABLE `hard disk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyboard`
--

DROP TABLE IF EXISTS `keyboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keyboard` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `gst` decimal(6,2) NOT NULL,
  `rate` decimal(8,3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyboard`
--

LOCK TABLES `keyboard` WRITE;
/*!40000 ALTER TABLE `keyboard` DISABLE KEYS */;
INSERT INTO `keyboard` VALUES (13,'KEYBOARD UDB, MAKE - FINGERS, MODEL - MAGNIFICO MOONLIT',20.00,625.000),(14,'KEYBOARD USB, MAKE - PRODOT, MODEL - FEATHER',18.00,725.000),(15,'KEYBOARD USB, MAKE - LAPCARE, MODEL - E-9 KEYBOARD',18.00,785.000),(16,'KEYBOARD UDB, MAKE - LOGITCH, MODEL - K120',18.00,725.000),(18,'KEYBOARD UDB, MAKE - LOGITCH, MODEL - K140',20.00,685.000);
/*!40000 ALTER TABLE `keyboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitor`
--

DROP TABLE IF EXISTS `monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitor` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `gst` decimal(6,2) NOT NULL,
  `rate` decimal(8,3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitor`
--

LOCK TABLES `monitor` WRITE;
/*!40000 ALTER TABLE `monitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `monitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mouse`
--

DROP TABLE IF EXISTS `mouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mouse` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `gst` decimal(6,2) NOT NULL,
  `rate` decimal(8,3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mouse`
--

LOCK TABLES `mouse` WRITE;
/*!40000 ALTER TABLE `mouse` DISABLE KEYS */;
INSERT INTO `mouse` VALUES (1,'MOUSE USB, MAKE - LOGITECH, MODEL - M90',18.00,296.610),(2,'MOUSE USB, MAKE - LENOVO, MODEL - 300',18.00,322.033);
/*!40000 ALTER TABLE `mouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (10,'Graphics Card'),(9,'Hard Disk'),(1,'keyboard'),(3,'monitor'),(2,'mouse');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_table`
--

DROP TABLE IF EXISTS `quotation_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotation_table` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `firm_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_table`
--

LOCK TABLES `quotation_table` WRITE;
/*!40000 ALTER TABLE `quotation_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` int unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(10) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kishan','d8ff68f279df69af9a4825eb5eec021e','admin'),(2,'swayam','be278b1e2f685a040f2af84315321ae8','operator');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-03 22:37:43
