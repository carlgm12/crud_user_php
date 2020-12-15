CREATE DATABASE  IF NOT EXISTS `usuario_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `usuario_bd`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: usuario_bd
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `activo` int DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'fulanito','1234',1),(2,'carlosM','12',2),(34,'manuel','12',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_log`
--

DROP TABLE IF EXISTS `usuarios_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_log` (
  `idusuariolg` int NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` bigint DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuariolg`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_log`
--

LOCK TABLES `usuarios_log` WRITE;
/*!40000 ALTER TABLE `usuarios_log` DISABLE KEYS */;
INSERT INTO `usuarios_log` VALUES (1,1,'2020-12-13 00:00:00'),(2,2,'2020-12-13 14:02:47'),(3,1,'2020-12-13 14:33:18'),(4,1,'2020-12-13 20:07:08'),(5,1,'2020-12-13 20:59:01'),(6,2,'2020-12-13 20:59:57'),(7,1,'2020-12-13 21:02:46'),(8,2,'2020-12-13 21:03:46'),(9,1,'2020-12-13 21:04:07'),(10,2,'2020-12-13 21:07:01'),(11,2,'2020-12-13 21:17:10'),(12,2,'2020-12-13 21:21:53'),(13,2,'2020-12-13 21:45:18'),(14,1,'2020-12-13 21:46:04'),(15,1,'2020-12-13 21:51:25'),(16,1,'2020-12-13 21:57:23'),(17,1,'2020-12-13 22:06:13'),(18,1,'2020-12-13 22:17:06'),(19,1,'2020-12-13 22:22:41'),(20,1,'2020-12-13 22:24:47'),(21,1,'2020-12-13 22:26:53'),(22,1,'2020-12-13 22:50:30'),(23,2,'2020-12-13 23:14:55'),(24,1,'2020-12-13 23:17:41'),(25,1,'2020-12-13 23:18:14'),(26,1,'2020-12-13 23:20:52'),(27,1,'2020-12-13 23:26:12'),(28,1,'2020-12-13 23:27:31'),(29,1,'2020-12-13 23:30:40'),(30,1,'2020-12-13 23:32:30'),(31,1,'2020-12-13 23:37:39'),(32,1,'2020-12-13 23:40:04'),(33,1,'2020-12-13 23:44:03'),(34,1,'2020-12-13 23:47:47'),(35,1,'2020-12-13 23:52:01'),(36,1,'2020-12-13 23:56:03'),(37,1,'2020-12-13 23:59:25'),(38,1,'2020-12-14 00:12:53'),(39,1,'2020-12-14 00:14:24'),(40,1,'2020-12-14 00:16:04'),(41,1,'2020-12-14 00:18:15'),(42,1,'2020-12-14 00:22:31'),(43,1,'2020-12-14 00:31:13'),(44,1,'2020-12-14 00:32:02'),(45,1,'2020-12-14 00:37:29'),(46,1,'2020-12-14 08:25:38'),(47,1,'2020-12-14 08:38:46'),(48,1,'2020-12-14 08:42:19'),(49,1,'2020-12-14 08:54:14'),(50,1,'2020-12-14 08:58:05'),(51,1,'2020-12-14 09:01:34'),(52,1,'2020-12-14 09:06:02'),(53,1,'2020-12-14 09:12:04'),(54,2,'2020-12-14 09:14:10'),(55,1,'2020-12-14 09:14:43'),(56,2,'2020-12-14 09:26:56'),(57,2,'2020-12-14 09:30:35'),(58,2,'2020-12-14 09:51:44'),(59,2,'2020-12-14 09:53:03'),(60,1,'2020-12-14 09:53:22'),(61,1,'2020-12-14 10:28:12'),(62,1,'2020-12-14 11:00:21'),(63,2,'2020-12-14 11:25:12'),(64,1,'2020-12-14 11:25:35'),(65,1,'2020-12-14 11:32:50'),(66,1,'2020-12-14 11:33:27'),(67,1,'2020-12-14 11:37:00'),(68,1,'2020-12-14 11:50:02'),(69,1,'2020-12-14 11:51:19'),(70,1,'2020-12-14 11:54:43'),(71,2,'2020-12-14 11:57:43'),(72,1,'2020-12-14 12:01:19'),(73,1,'2020-12-14 12:34:43'),(74,1,'2020-12-14 12:37:39'),(75,1,'2020-12-14 12:52:05'),(76,1,'2020-12-14 12:56:24'),(77,1,'2020-12-14 12:59:06'),(78,1,'2020-12-14 13:04:40'),(79,1,'2020-12-14 13:06:15'),(80,1,'2020-12-14 13:08:45');
/*!40000 ALTER TABLE `usuarios_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_nivel`
--

DROP TABLE IF EXISTS `usuarios_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_nivel` (
  `idusuarionivel` int NOT NULL AUTO_INCREMENT,
  `nivel` varchar(200) DEFAULT NULL,
  `fk_id_usuario` bigint DEFAULT NULL,
  PRIMARY KEY (`idusuarionivel`),
  CONSTRAINT `fk_id_usuarionivel` FOREIGN KEY (`idusuarionivel`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_nivel`
--

LOCK TABLES `usuarios_nivel` WRITE;
/*!40000 ALTER TABLE `usuarios_nivel` DISABLE KEYS */;
INSERT INTO `usuarios_nivel` VALUES (1,'1',1),(2,'2',2);
/*!40000 ALTER TABLE `usuarios_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'usuario_bd'
--

--
-- Dumping routines for database 'usuario_bd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-14 22:43:09
