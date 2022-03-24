-- MariaDB dump 10.19  Distrib 10.4.20-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	10.4.20-MariaDB

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Camiseta manga corta',NULL),(2,'Camiseta manga larga',NULL),(3,'Sudadera',NULL),(4,'Delantales',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) NOT NULL,
  `codigo` varchar(6) DEFAULT NULL,
  `orden` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (1,'Negro','000000',NULL),(2,'Blanco','ffffff',NULL),(3,'Púrpura','591252',NULL),(4,'Chocolate','36221a',NULL),(5,'Azul Denim','4d4b71',NULL),(6,'Naranja','ec6413',NULL);
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familias`
--

DROP TABLE IF EXISTS `familias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familias` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `familia` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familias`
--

LOCK TABLES `familias` WRITE;
/*!40000 ALTER TABLE `familias` DISABLE KEYS */;
INSERT INTO `familias` VALUES (1,'Mujer',NULL),(2,'Unisex',NULL),(3,'Niños',NULL),(4,'Bebé',NULL);
/*!40000 ALTER TABLE `familias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Roly','ROLY-LOGO.png'),(2,'B&C','BC-LOGO.png');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelos` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_marca` tinyint(2) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_modelo_marca` (`id_marca`),
  CONSTRAINT `fk_modelo_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (1,1,'Dogo Premium','CamisetasUnisexCategoria.png'),(3,1,'Jamaica','CamisetasChicaCategoria.png'),(4,1,'Bataly',NULL),(5,1,'Xtrem',NULL);
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prendas`
--

DROP TABLE IF EXISTS `prendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prendas` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_categoria` tinyint(2) NOT NULL,
  `id_familia` tinyint(2) NOT NULL,
  `id_talla` tinyint(2) NOT NULL,
  `id_color` tinyint(2) NOT NULL,
  `id_proveedor` tinyint(2) NOT NULL,
  `id_marca` tinyint(2) DEFAULT NULL,
  `id_modelo` tinyint(2) NOT NULL,
  `referencia` varchar(40) DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prenda_categoria` (`id_categoria`),
  KEY `fk_prenda_familia` (`id_familia`),
  KEY `fk_prenda_talla` (`id_talla`),
  KEY `fk_prenda_color` (`id_color`),
  KEY `fk_prenda_proveedor` (`id_proveedor`),
  KEY `fk_prenda_marcas` (`id_marca`),
  KEY `fk_prenda_modelos` (`id_modelo`),
  CONSTRAINT `fk_prenda_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_prenda_color` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id`),
  CONSTRAINT `fk_prenda_familia` FOREIGN KEY (`id_familia`) REFERENCES `familias` (`id`),
  CONSTRAINT `fk_prenda_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`),
  CONSTRAINT `fk_prenda_modelos` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id`),
  CONSTRAINT `fk_prenda_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`),
  CONSTRAINT `fk_prenda_talla` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prendas`
--

LOCK TABLES `prendas` WRITE;
/*!40000 ALTER TABLE `prendas` DISABLE KEYS */;
INSERT INTO `prendas` VALUES (8,1,2,1,1,1,1,1,'CA6502',1,NULL),(9,1,2,2,1,1,1,1,'CA6502',1,NULL),(10,1,2,3,1,1,1,1,'CA6502',1,NULL),(11,1,2,4,1,1,1,1,'CA6502',1,NULL),(12,1,2,5,1,1,1,1,'CA6502',1,NULL),(13,1,2,6,1,1,1,1,'CA6502',1,NULL),(14,1,2,7,1,1,1,1,'CA6502',1,NULL),(15,1,2,1,2,1,1,1,'CA6502',2,NULL),(16,1,2,2,2,1,1,1,'CA6502',0,NULL),(17,1,2,3,2,1,1,1,'CA6502',2,NULL),(18,1,2,4,2,1,1,1,'CA6502',1,NULL),(19,1,2,5,2,1,1,1,'CA6502',2,NULL),(20,1,2,6,2,1,1,1,'CA6502',1,NULL),(21,1,2,7,2,1,1,1,'CA6502',2,NULL),(22,1,2,1,3,1,1,1,'CA6502',1,NULL),(23,1,2,2,3,1,1,1,'CA6502',0,NULL),(24,1,2,3,3,1,1,1,'CA6502',1,NULL),(25,1,2,4,3,1,1,1,'CA6502',3,NULL),(26,1,2,5,3,1,1,1,'CA6502',1,NULL),(27,1,2,6,3,1,1,1,'CA6502',2,NULL),(28,1,2,7,3,1,1,1,'CA6502',0,NULL),(29,1,2,1,4,1,1,1,'CA6502',3,NULL),(30,1,2,2,4,1,1,1,'CA6502',0,NULL),(31,1,2,3,4,1,1,1,'CA6502',3,NULL),(32,1,2,4,4,1,1,1,'CA6502',0,NULL),(33,1,2,5,4,1,1,1,'CA6502',0,NULL),(34,1,2,6,4,1,1,1,'CA6502',0,NULL),(35,1,2,7,4,1,1,1,'CA6502',0,NULL),(36,1,2,1,5,1,1,1,'CA6502',2,NULL),(37,1,2,2,5,1,1,1,'CA6502',0,NULL),(38,1,2,3,5,1,1,1,'CA6502',1,NULL),(39,1,2,4,5,1,1,1,'CA6502',0,NULL),(40,1,2,5,5,1,1,1,'CA6502',0,NULL),(41,1,2,6,5,1,1,1,'CA6502',0,NULL),(42,1,2,7,5,1,1,1,'CA6502',0,NULL),(43,1,1,1,1,1,1,3,'CA6627',0,NULL),(44,1,1,2,1,1,1,3,'CA6627',4,NULL),(45,1,1,3,1,1,1,3,'CA6627',0,NULL),(46,1,1,4,1,1,1,3,'CA6627',0,NULL),(47,1,1,5,1,1,1,3,'CA6627',0,NULL),(48,1,1,1,2,1,1,3,'CA6627',0,NULL),(49,1,1,2,2,1,1,3,'CA6627',0,NULL),(50,1,1,3,2,1,1,3,'CA6627',0,NULL),(51,1,1,4,2,1,1,3,'CA6627',0,NULL),(52,1,1,5,2,1,1,3,'CA6627',0,NULL),(53,1,1,1,3,1,1,3,'CA6627',2,NULL),(54,1,1,2,3,1,1,3,'CA6627',2,NULL),(55,1,1,3,3,1,1,3,'CA6627',1,NULL),(56,1,1,4,3,1,1,3,'CA6627',1,NULL),(57,1,1,5,3,1,1,3,'CA6627',1,NULL),(58,1,1,1,4,1,1,3,'CA6627',0,NULL),(59,1,1,2,4,1,1,3,'CA6627',0,NULL),(60,1,1,3,4,1,1,3,'CA6627',0,NULL),(61,1,1,4,4,1,1,3,'CA6627',0,NULL),(62,1,1,5,4,1,1,3,'CA6627',0,NULL),(63,1,1,1,5,1,1,3,'CA6627',3,NULL),(64,1,1,2,5,1,1,3,'CA6627',0,NULL),(65,1,1,3,5,1,1,3,'CA6627',0,NULL),(66,1,1,4,5,1,1,3,'CA6627',0,NULL),(67,1,1,5,5,1,1,3,'CA6627',0,NULL),(68,1,2,1,6,1,1,1,'CA65020131',1,NULL),(69,1,2,2,6,1,1,1,'CA65020131',0,NULL),(70,1,2,3,6,1,1,1,'CA65020131',0,NULL),(71,1,2,4,6,1,1,1,'CA65020131',0,NULL),(72,1,2,5,6,1,1,1,'CA65020131',0,NULL),(73,1,2,6,6,1,1,1,'CA65020131',0,NULL),(74,1,2,7,6,1,1,1,'CA65020131',0,NULL),(75,4,2,8,5,1,1,4,'DE912690143',0,NULL),(76,2,2,1,1,1,1,5,'',1,NULL),(77,2,2,2,1,1,1,5,'',0,NULL),(78,2,2,3,1,1,1,5,'',0,NULL),(79,2,2,4,1,1,1,5,'',0,NULL),(80,2,2,5,1,1,1,5,'',0,NULL),(81,1,1,1,6,1,1,3,'CA6627',0,'jamaica-naranja.png'),(82,1,1,2,6,1,1,3,'CA6627',0,'jamaica-naranja.png'),(83,1,1,3,6,1,1,3,'CA6627',0,'jamaica-naranja.png'),(84,1,1,4,6,1,1,3,'CA6627',0,'jamaica-naranja.png'),(85,1,1,5,6,1,1,3,'CA6627',0,'jamaica-naranja.png');
/*!40000 ALTER TABLE `prendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'Gorfactory','pedidos.barcelona01@gorfactory.es',935440085,'Esther Fernández',NULL);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas`
--

DROP TABLE IF EXISTS `tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tallas` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `talla` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas`
--

LOCK TABLES `tallas` WRITE;
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
INSERT INTO `tallas` VALUES (1,'S'),(2,'M'),(3,'L'),(4,'XL'),(5,'2XL'),(6,'3XL'),(7,'4XL'),(8,'única');
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rol` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'nooors','noooors','nooors@gmail.com','admin','2021-07-12',NULL),(2,'Pepote','Pepotez','pepe@gamil.com','gestor','2021-07-12',NULL),(3,'Maika','Makosky','maika@maika.com','gestor','2021-07-12',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-16  0:32:35
