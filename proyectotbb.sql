-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: proyectotbb
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amigos`
--

DROP TABLE IF EXISTS `amigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `amigos` (
  `id_ami` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_ami`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amigos`
--

LOCK TABLES `amigos` WRITE;
/*!40000 ALTER TABLE `amigos` DISABLE KEYS */;
INSERT INTO `amigos` VALUES (1,16550441,123,'2019-05-19 19:43:43',1),(2,16550441,16550522,'2019-05-29 19:14:30',1);
/*!40000 ALTER TABLE `amigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_chats`
--

DROP TABLE IF EXISTS `c_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `c_chats` (
  `id_cch` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  PRIMARY KEY (`id_cch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_chats`
--

LOCK TABLES `c_chats` WRITE;
/*!40000 ALTER TABLE `c_chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `chats` (
  `id_cha` int(11) NOT NULL AUTO_INCREMENT,
  `id_cch` int(11) DEFAULT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) DEFAULT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `leido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cha`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (202,NULL,123,NULL,'hola mundo cruel :\'v','2019-05-21 12:25:59',NULL),(203,NULL,16550441,NULL,'hola','2019-05-21 12:30:16',NULL),(204,NULL,123,NULL,'asd','2019-05-22 12:21:08',NULL),(205,NULL,16550441,NULL,'asasd','2019-05-23 21:59:56',NULL),(206,NULL,16550441,NULL,'sdasd','2019-05-27 13:02:08',NULL),(207,NULL,16550441,NULL,'uhi','2019-05-31 10:34:15',NULL);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comentarios` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `NoControl` int(11) DEFAULT NULL,
  `comentario` text,
  `fecha` datetime DEFAULT NULL,
  `publicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_com`),
  KEY `NoControl` (`NoControl`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`NoControl`) REFERENCES `usuario` (`NoControl`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (3,16550522,'What u need?','2019-05-30 17:57:17',21);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `likes` (
  `id_lik` int(11) NOT NULL AUTO_INCREMENT,
  `NoControl` int(11) DEFAULT NULL,
  `id_pub` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lik`),
  KEY `NoControl` (`NoControl`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`NoControl`) REFERENCES `usuario` (`NoControl`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `publicaciones` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `NoControl` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `contenido` text NOT NULL,
  `comentarios` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `disklikes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `publicaciones_ibfk_1` (`NoControl`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`NoControl`) REFERENCES `usuario` (`NoControl`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` VALUES (18,16550522,'2019-05-26 21:40:09','hola mundo cruel',1,0,0),(19,16550522,'2019-05-26 21:44:34','F',1,0,0),(21,16550441,'2019-05-30 17:56:54','HELP!',1,0,0),(22,16550441,'2019-05-31 10:34:01','quiero pasar :v',1,0,0);
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `publicas`
--

DROP TABLE IF EXISTS `publicas`;
/*!50001 DROP VIEW IF EXISTS `publicas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `publicas` AS SELECT 
 1 AS `id_pub`,
 1 AS `NoControl`,
 1 AS `fecha`,
 1 AS `contenido`,
 1 AS `comentarios`,
 1 AS `likes`,
 1 AS `disklikes`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `NoControl` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ape_m` varchar(50) NOT NULL,
  `ape_p` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NoControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (123,'Hola','Cruel','Mundo','caca',NULL,NULL,NULL,'2019-05-17 14:32:13','ISC'),(16550441,'Ariel Josue','Orozco','Estrada','Hola','1998-10-19',NULL,'Hombre','2019-05-16 20:14:35','ISC'),(16550522,'Antonio','Zavala','Vazquez','Hola',NULL,NULL,NULL,'2019-05-20 13:02:19','ISC');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_usuario`
--

DROP TABLE IF EXISTS `vista_usuario`;
/*!50001 DROP VIEW IF EXISTS `vista_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `vista_usuario` AS SELECT 
 1 AS `NoControl`,
 1 AS `nombre`,
 1 AS `ape_m`,
 1 AS `ape_p`,
 1 AS `contrasena`,
 1 AS `nacimiento`,
 1 AS `avatar`,
 1 AS `sexo`,
 1 AS `fecha_reg`,
 1 AS `carrera`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `publicas`
--

/*!50001 DROP VIEW IF EXISTS `publicas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `publicas` AS select `publicaciones`.`id_pub` AS `id_pub`,`publicaciones`.`NoControl` AS `NoControl`,`publicaciones`.`fecha` AS `fecha`,`publicaciones`.`contenido` AS `contenido`,`publicaciones`.`comentarios` AS `comentarios`,`publicaciones`.`likes` AS `likes`,`publicaciones`.`disklikes` AS `disklikes` from `publicaciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_usuario`
--

/*!50001 DROP VIEW IF EXISTS `vista_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_usuario` AS select `usuario`.`NoControl` AS `NoControl`,`usuario`.`nombre` AS `nombre`,`usuario`.`ape_m` AS `ape_m`,`usuario`.`ape_p` AS `ape_p`,`usuario`.`contrasena` AS `contrasena`,`usuario`.`nacimiento` AS `nacimiento`,`usuario`.`avatar` AS `avatar`,`usuario`.`sexo` AS `sexo`,`usuario`.`fecha_reg` AS `fecha_reg`,`usuario`.`carrera` AS `carrera` from `usuario` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 18:21:17
