-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pchome_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `pchome_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pchome_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pchome_db`;

--
-- Table structure for table `使用者資料表`
--

DROP TABLE IF EXISTS `使用者資料表`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `使用者資料表` (
  `帳號` varchar(20) NOT NULL,
  `密碼` varchar(40) NOT NULL,
  `姓名` varchar(45) NOT NULL,
  PRIMARY KEY (`帳號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `使用者資料表`
--

LOCK TABLES `使用者資料表` WRITE;
/*!40000 ALTER TABLE `使用者資料表` DISABLE KEYS */;
/*!40000 ALTER TABLE `使用者資料表` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `商品表`
--

DROP TABLE IF EXISTS `商品表`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `商品表` (
  `商品編號` int(10) NOT NULL,
  `商品名稱` varchar(20) NOT NULL,
  `商品圖片` mediumblob NOT NULL,
  `商品數量` int(2) NOT NULL,
  `商品單價` int(5) NOT NULL,
  PRIMARY KEY (`商品編號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `商品表`
--

LOCK TABLES `商品表` WRITE;
/*!40000 ALTER TABLE `商品表` DISABLE KEYS */;
/*!40000 ALTER TABLE `商品表` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `暢銷排行`
--

DROP TABLE IF EXISTS `暢銷排行`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `暢銷排行` (
  `暢銷編號` int(2) NOT NULL,
  `商品編號` int(10) NOT NULL,
  PRIMARY KEY (`暢銷編號`),
  KEY `商品編號` (`商品編號`),
  CONSTRAINT `暢銷排行_ibfk_1` FOREIGN KEY (`商品編號`) REFERENCES `商品表` (`商品編號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `暢銷排行`
--

LOCK TABLES `暢銷排行` WRITE;
/*!40000 ALTER TABLE `暢銷排行` DISABLE KEYS */;
/*!40000 ALTER TABLE `暢銷排行` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `訂單`
--

DROP TABLE IF EXISTS `訂單`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `訂單` (
  `訂單編號` int(10) NOT NULL,
  `帳號` varchar(20) NOT NULL,
  `訂單總價格` int(5) NOT NULL,
  PRIMARY KEY (`訂單編號`),
  KEY `帳號` (`帳號`),
  CONSTRAINT `訂單_ibfk_1` FOREIGN KEY (`帳號`) REFERENCES `使用者資料表` (`帳號`),
  CONSTRAINT `訂單_ibfk_2` FOREIGN KEY (`訂單編號`) REFERENCES `訂單商品關聯表` (`訂單編號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `訂單`
--

LOCK TABLES `訂單` WRITE;
/*!40000 ALTER TABLE `訂單` DISABLE KEYS */;
/*!40000 ALTER TABLE `訂單` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `訂單商品關聯表`
--

DROP TABLE IF EXISTS `訂單商品關聯表`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `訂單商品關聯表` (
  `商品編號` int(10) NOT NULL,
  `訂單編號` int(10) NOT NULL,
  `購買數量` int(2) NOT NULL,
  `商品總價格` int(5) NOT NULL,
  PRIMARY KEY (`商品編號`),
  KEY `訂單編號` (`訂單編號`),
  CONSTRAINT `訂單商品關聯表_ibfk_1` FOREIGN KEY (`商品編號`) REFERENCES `商品表` (`商品編號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `訂單商品關聯表`
--

LOCK TABLES `訂單商品關聯表` WRITE;
/*!40000 ALTER TABLE `訂單商品關聯表` DISABLE KEYS */;
/*!40000 ALTER TABLE `訂單商品關聯表` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `購物車`
--

DROP TABLE IF EXISTS `購物車`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `購物車` (
  `帳號` varchar(20) NOT NULL,
  `商品編號` int(10) NOT NULL,
  `購物車總價格` int(5) NOT NULL,
  `商品單價` int(5) NOT NULL,
  `購買數量` int(2) NOT NULL,
  PRIMARY KEY (`帳號`),
  KEY `商品編號` (`商品編號`),
  CONSTRAINT `購物車_ibfk_1` FOREIGN KEY (`商品編號`) REFERENCES `商品表` (`商品編號`),
  CONSTRAINT `購物車_ibfk_2` FOREIGN KEY (`帳號`) REFERENCES `使用者資料表` (`帳號`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `購物車`
--

LOCK TABLES `購物車` WRITE;
/*!40000 ALTER TABLE `購物車` DISABLE KEYS */;
/*!40000 ALTER TABLE `購物車` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pchome_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-02 23:43:37
