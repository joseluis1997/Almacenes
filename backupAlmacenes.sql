-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: almacenes
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `AREAS`
--

DROP TABLE IF EXISTS `AREAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AREAS` (
  `COD_AREA` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `AREA_PADRE` bigint(20) unsigned DEFAULT NULL,
  `NOM_AREA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UBICACION_AREA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESC_AREA` text COLLATE utf8mb4_unicode_ci,
  `ESTADO_AREA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_AREA`),
  KEY `areas_area_padre_foreign` (`AREA_PADRE`),
  CONSTRAINT `areas_area_padre_foreign` FOREIGN KEY (`AREA_PADRE`) REFERENCES `AREAS` (`COD_AREA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AREAS`
--

LOCK TABLES `AREAS` WRITE;
/*!40000 ALTER TABLE `AREAS` DISABLE KEYS */;
INSERT INTO `AREAS` VALUES (1,NULL,'GOBIERNO AUTÓNOMO DEPARTAMENTAL DE TARIJA',NULL,NULL,1,'2021-02-14 20:51:06','2021-02-14 20:51:06'),(2,1,'secretaria de recursos humanos','victor opaz','sfdfsd',1,'2021-02-15 00:57:14','2021-02-15 00:57:14'),(3,1,'unidad de activos fijos','barrio san bernardo','unidad e activos fijos de la gobernacion de tarija',1,'2021-02-20 02:27:57','2021-02-20 02:27:57');
/*!40000 ALTER TABLE `AREAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ARTICULO`
--

DROP TABLE IF EXISTS `ARTICULO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ARTICULO` (
  `COD_ARTICULO` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FK_COD_PARTIDA` bigint(20) unsigned NOT NULL,
  `FK_COD_MEDIDA` bigint(20) unsigned NOT NULL,
  `NOM_ARTICULO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESC_ARTICULO` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CANT_ACTUAL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_ARTICULO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_ARTICULO`),
  UNIQUE KEY `articulo_nom_articulo_unique` (`NOM_ARTICULO`),
  KEY `articulo_fk_cod_partida_foreign` (`FK_COD_PARTIDA`),
  KEY `articulo_fk_cod_medida_foreign` (`FK_COD_MEDIDA`),
  CONSTRAINT `articulo_fk_cod_medida_foreign` FOREIGN KEY (`FK_COD_MEDIDA`) REFERENCES `MEDIDA` (`COD_MEDIDA`) ON DELETE CASCADE,
  CONSTRAINT `articulo_fk_cod_partida_foreign` FOREIGN KEY (`FK_COD_PARTIDA`) REFERENCES `PARTIDA` (`COD_PARTIDA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ARTICULO`
--

LOCK TABLES `ARTICULO` WRITE;
/*!40000 ALTER TABLE `ARTICULO` DISABLE KEYS */;
INSERT INTO `ARTICULO` VALUES (1,1,1,'pilfrus','asdasd','1921',1,'2021-02-14 20:52:35','2021-02-14 20:52:35'),(2,1,1,'tonners','asdasasewq2e','5080',1,'2021-02-14 20:52:46','2021-02-14 20:52:46');
/*!40000 ALTER TABLE `ARTICULO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BITACORAS`
--

DROP TABLE IF EXISTS `BITACORAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BITACORAS` (
  `COD_BITACORAS` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tabla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consulta_sql` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_BITACORAS`),
  KEY `bitacoras_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `bitacoras_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BITACORAS`
--

LOCK TABLES `BITACORAS` WRITE;
/*!40000 ALTER TABLE `BITACORAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `BITACORAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMPRA_STOCKS`
--

DROP TABLE IF EXISTS `COMPRA_STOCKS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COMPRA_STOCKS` (
  `COD_COMPRA_STOCK` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_AREA` bigint(20) unsigned NOT NULL,
  `NRO_ORD_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRO_PREVENTIVO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACTURA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `DETALLE_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_COMPRA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_COMPRA_STOCK`),
  KEY `compra_stocks_cod_area_foreign` (`COD_AREA`),
  CONSTRAINT `compra_stocks_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMPRA_STOCKS`
--

LOCK TABLES `COMPRA_STOCKS` WRITE;
/*!40000 ALTER TABLE `COMPRA_STOCKS` DISABLE KEYS */;
INSERT INTO `COMPRA_STOCKS` VALUES (1,2,'004','004','Factura','2021-02-18','sdfsfsd',1,'2021-02-17 02:32:07','2021-02-17 02:32:07'),(2,1,'004','004','Factura','2021-02-23','SDFSDF',1,'2021-02-17 04:23:45','2021-02-17 04:23:45'),(3,1,'005','005','Factura','2021-02-03','SFSGFDGDF',1,'2021-02-17 04:24:31','2021-02-17 04:24:31');
/*!40000 ALTER TABLE `COMPRA_STOCKS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CONSUMO_DIRECTOS`
--

DROP TABLE IF EXISTS `CONSUMO_DIRECTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONSUMO_DIRECTOS` (
  `COD_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_AREA` bigint(20) unsigned NOT NULL,
  `NRO_ORD_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRO_PREVENTIVO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOTA_INGRESO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `FACTURA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DETALLE_CONSUMO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_COMPRA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_CONSUMO_DIRECTO`),
  KEY `consumo_directos_cod_area_foreign` (`COD_AREA`),
  CONSTRAINT `consumo_directos_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONSUMO_DIRECTOS`
--

LOCK TABLES `CONSUMO_DIRECTOS` WRITE;
/*!40000 ALTER TABLE `CONSUMO_DIRECTOS` DISABLE KEYS */;
INSERT INTO `CONSUMO_DIRECTOS` VALUES (6,2,'002','004','se','2021-02-06','asdad','PRUEBITA',1,'2021-02-18 21:20:27','2021-02-19 15:01:07'),(7,2,'0101','0101','si cumple con el numero de ingreso','2021-02-19','facturitaaaaa','PRUEBITA',1,'2021-02-18 21:21:57','2021-02-19 16:01:36'),(12,2,'5656','57577','aqui va el numero de ingreso que se registra en el excel','2021-02-11','Factura','primera compra de consumo directo',1,'2021-02-19 02:12:12','2021-02-19 15:00:56'),(24,1,'012','013','si cumple con el numero de nota de ingreso','2021-02-13','resivo','test de primer consumo directo',1,'2021-02-20 02:15:42','2021-02-20 02:15:42'),(25,3,'013','014','aqui por favor ponga el numero de la nota de ingreso','2021-02-13','resivito','ahora si creo que funcionara',1,'2021-02-20 02:26:33','2021-02-20 02:28:16'),(26,3,'55','5556','si tiene numero de ingreso','2021-02-13','facturita55','test por 5ta ves',1,'2021-02-20 02:41:13','2021-02-20 02:41:13');
/*!40000 ALTER TABLE `CONSUMO_DIRECTOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CONSUMO_PROVEEDOR`
--

DROP TABLE IF EXISTS `CONSUMO_PROVEEDOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONSUMO_PROVEEDOR` (
  `COD_CONSUMO_PROVEEDOR` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_PROVEEDOR` bigint(20) unsigned NOT NULL,
  `COD_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL,
  `ESTADO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_CONSUMO_PROVEEDOR`),
  KEY `consumo_proveedor_cod_proveedor_foreign` (`COD_PROVEEDOR`),
  KEY `consumo_proveedor_cod_consumo_directo_foreign` (`COD_CONSUMO_DIRECTO`),
  CONSTRAINT `consumo_proveedor_cod_consumo_directo_foreign` FOREIGN KEY (`COD_CONSUMO_DIRECTO`) REFERENCES `CONSUMO_DIRECTOS` (`COD_CONSUMO_DIRECTO`) ON DELETE CASCADE,
  CONSTRAINT `consumo_proveedor_cod_proveedor_foreign` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `PROVEEDORES` (`COD_PROVEEDOR`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONSUMO_PROVEEDOR`
--

LOCK TABLES `CONSUMO_PROVEEDOR` WRITE;
/*!40000 ALTER TABLE `CONSUMO_PROVEEDOR` DISABLE KEYS */;
/*!40000 ALTER TABLE `CONSUMO_PROVEEDOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DETALLE_COMPRA_STOCK`
--

DROP TABLE IF EXISTS `DETALLE_COMPRA_STOCK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_COMPRA_STOCK` (
  `COD_COMPRA_STOCK` bigint(20) unsigned NOT NULL,
  `COD_ARTICULO` bigint(20) unsigned NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `PRECIO_UNITARIO` decimal(8,2) NOT NULL,
  `ESTADO_DETALLE` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_compra_stock_cod_compra_stock_foreign` (`COD_COMPRA_STOCK`),
  KEY `detalle_compra_stock_cod_articulo_foreign` (`COD_ARTICULO`),
  CONSTRAINT `detalle_compra_stock_cod_articulo_foreign` FOREIGN KEY (`COD_ARTICULO`) REFERENCES `ARTICULO` (`COD_ARTICULO`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compra_stock_cod_compra_stock_foreign` FOREIGN KEY (`COD_COMPRA_STOCK`) REFERENCES `COMPRA_STOCKS` (`COD_COMPRA_STOCK`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DETALLE_COMPRA_STOCK`
--

LOCK TABLES `DETALLE_COMPRA_STOCK` WRITE;
/*!40000 ALTER TABLE `DETALLE_COMPRA_STOCK` DISABLE KEYS */;
INSERT INTO `DETALLE_COMPRA_STOCK` VALUES (1,1,3,3.00,1,NULL,NULL),(1,2,3,200.00,1,NULL,NULL),(2,1,2000,2.00,1,NULL,NULL),(3,2,5000,5.00,1,NULL,NULL);
/*!40000 ALTER TABLE `DETALLE_COMPRA_STOCK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DETALLE_CONSUMO_DIRECTO`
--

DROP TABLE IF EXISTS `DETALLE_CONSUMO_DIRECTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_CONSUMO_DIRECTO` (
  `COD_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL,
  `COD_ARTICULO` bigint(20) unsigned NOT NULL,
  `PRECIO_UNITARIO` decimal(8,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_consumo_directo_cod_consumo_directo_foreign` (`COD_CONSUMO_DIRECTO`),
  KEY `detalle_consumo_directo_cod_articulo_foreign` (`COD_ARTICULO`),
  CONSTRAINT `detalle_consumo_directo_cod_articulo_foreign` FOREIGN KEY (`COD_ARTICULO`) REFERENCES `ARTICULO` (`COD_ARTICULO`) ON DELETE CASCADE,
  CONSTRAINT `detalle_consumo_directo_cod_consumo_directo_foreign` FOREIGN KEY (`COD_CONSUMO_DIRECTO`) REFERENCES `CONSUMO_DIRECTOS` (`COD_CONSUMO_DIRECTO`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DETALLE_CONSUMO_DIRECTO`
--

LOCK TABLES `DETALLE_CONSUMO_DIRECTO` WRITE;
/*!40000 ALTER TABLE `DETALLE_CONSUMO_DIRECTO` DISABLE KEYS */;
INSERT INTO `DETALLE_CONSUMO_DIRECTO` VALUES (12,1,2.00,12,NULL,NULL),(12,2,50.00,500,NULL,NULL),(6,1,2.00,50,NULL,NULL),(6,2,100.00,100500,NULL,NULL),(24,1,2.00,2,NULL,NULL),(24,2,2.00,2,NULL,NULL),(25,1,2.00,3,NULL,NULL),(25,2,7.00,5,NULL,NULL),(26,1,1.00,1,NULL,NULL),(26,2,5.00,5,NULL,NULL);
/*!40000 ALTER TABLE `DETALLE_CONSUMO_DIRECTO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DETALLE_PEDIDO`
--

DROP TABLE IF EXISTS `DETALLE_PEDIDO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_PEDIDO` (
  `COD_ARTICULO` bigint(20) unsigned NOT NULL,
  `COD_PEDIDO` bigint(20) unsigned NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ESTADO_PEDIDO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_pedido_cod_articulo_foreign` (`COD_ARTICULO`),
  KEY `detalle_pedido_cod_pedido_foreign` (`COD_PEDIDO`),
  CONSTRAINT `detalle_pedido_cod_articulo_foreign` FOREIGN KEY (`COD_ARTICULO`) REFERENCES `ARTICULO` (`COD_ARTICULO`) ON DELETE CASCADE,
  CONSTRAINT `detalle_pedido_cod_pedido_foreign` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `PEDIDOS` (`COD_PEDIDO`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DETALLE_PEDIDO`
--

LOCK TABLES `DETALLE_PEDIDO` WRITE;
/*!40000 ALTER TABLE `DETALLE_PEDIDO` DISABLE KEYS */;
INSERT INTO `DETALLE_PEDIDO` VALUES (2,3,12,1,NULL,NULL),(1,4,2,1,NULL,NULL),(2,4,120,1,NULL,NULL),(1,5,20,1,NULL,NULL),(2,6,20,1,NULL,NULL),(1,6,100,1,NULL,NULL),(2,7,21,1,NULL,NULL),(2,8,23,1,NULL,NULL);
/*!40000 ALTER TABLE `DETALLE_PEDIDO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DETALLE_SALIDA`
--

DROP TABLE IF EXISTS `DETALLE_SALIDA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_SALIDA` (
  `COD_SALIDA` bigint(20) unsigned NOT NULL,
  `COD_ARTICULO` bigint(20) unsigned NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_salida_cod_salida_foreign` (`COD_SALIDA`),
  KEY `detalle_salida_cod_articulo_foreign` (`COD_ARTICULO`),
  CONSTRAINT `detalle_salida_cod_articulo_foreign` FOREIGN KEY (`COD_ARTICULO`) REFERENCES `ARTICULO` (`COD_ARTICULO`) ON DELETE CASCADE,
  CONSTRAINT `detalle_salida_cod_salida_foreign` FOREIGN KEY (`COD_SALIDA`) REFERENCES `SALIDAS` (`COD_SALIDA`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DETALLE_SALIDA`
--

LOCK TABLES `DETALLE_SALIDA` WRITE;
/*!40000 ALTER TABLE `DETALLE_SALIDA` DISABLE KEYS */;
INSERT INTO `DETALLE_SALIDA` VALUES (2,2,12,NULL,NULL),(3,1,20,NULL,NULL),(3,2,20,NULL,NULL),(4,1,100,NULL,NULL),(4,2,20,NULL,NULL),(5,2,21,NULL,NULL);
/*!40000 ALTER TABLE `DETALLE_SALIDA` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER updStockAlmacen AFTER INSERT ON DETALLE_SALIDA
FOR EACH ROW
	UPDATE ARTICULO SET CANT_ACTUAL = CANT_ACTUAL - NEW.CANTIDAD
	WHERE ARTICULO.COD_ARTICULO=NEW.COD_ARTICULO */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `MEDIDA`
--

DROP TABLE IF EXISTS `MEDIDA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEDIDA` (
  `COD_MEDIDA` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_MEDIDA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESC_MEDIDA` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_MEDIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_MEDIDA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIDA`
--

LOCK TABLES `MEDIDA` WRITE;
/*!40000 ALTER TABLE `MEDIDA` DISABLE KEYS */;
INSERT INTO `MEDIDA` VALUES (1,'Kg','Unidad de medida kilogramos',0,NULL,NULL);
/*!40000 ALTER TABLE `MEDIDA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARTIDA`
--

DROP TABLE IF EXISTS `PARTIDA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PARTIDA` (
  `COD_PARTIDA` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PARTIDA_PADRE` bigint(20) unsigned DEFAULT NULL,
  `NOM_PARTIDA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRO_PARTIDA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_PARTIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PARTIDA`),
  UNIQUE KEY `partida_nom_partida_unique` (`NOM_PARTIDA`),
  UNIQUE KEY `partida_nro_partida_unique` (`NRO_PARTIDA`),
  KEY `partida_partida_padre_foreign` (`PARTIDA_PADRE`),
  CONSTRAINT `partida_partida_padre_foreign` FOREIGN KEY (`PARTIDA_PADRE`) REFERENCES `PARTIDA` (`COD_PARTIDA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARTIDA`
--

LOCK TABLES `PARTIDA` WRITE;
/*!40000 ALTER TABLE `PARTIDA` DISABLE KEYS */;
INSERT INTO `PARTIDA` VALUES (1,NULL,'MATERIALES Y SUMINISTROS','30000',1,NULL,NULL);
/*!40000 ALTER TABLE `PARTIDA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PEDIDOS`
--

DROP TABLE IF EXISTS `PEDIDOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PEDIDOS` (
  `COD_PEDIDO` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_AREA` bigint(20) unsigned NOT NULL,
  `DETALLE_PEDIDO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VALIDADO` tinyint(1) NOT NULL DEFAULT '0',
  `FECHA` date NOT NULL,
  `ESTADO_PEDIDO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PEDIDO`),
  KEY `pedidos_cod_area_foreign` (`COD_AREA`),
  CONSTRAINT `pedidos_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PEDIDOS`
--

LOCK TABLES `PEDIDOS` WRITE;
/*!40000 ALTER TABLE `PEDIDOS` DISABLE KEYS */;
INSERT INTO `PEDIDOS` VALUES (3,1,'asdasdad',1,'2021-02-11',1,'2021-02-14 20:53:32','2021-02-17 04:53:10'),(4,2,'luchito',1,'2021-02-11',1,'2021-02-14 20:53:57','2021-02-17 04:32:15'),(5,1,'asdasdad',1,'2021-02-11',1,'2021-02-14 20:53:57','2021-02-17 04:55:05'),(6,1,'SDSAASF',1,'2021-02-19',1,'2021-02-17 04:57:14','2021-02-17 04:58:09'),(7,1,'luchito',1,'2021-02-12',1,'2021-02-17 05:07:08','2021-02-17 13:58:03'),(8,1,'esto es una prueba de modificacion',0,'2021-02-12',1,'2021-02-18 21:11:23','2021-02-19 02:50:32');
/*!40000 ALTER TABLE `PEDIDOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROVEEDORES`
--

DROP TABLE IF EXISTS `PROVEEDORES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROVEEDORES` (
  `COD_PROVEEDOR` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NIT` bigint(20) NOT NULL,
  `NOM_PROVEEDOR` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIR_PROVEEDOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TELEF_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ESTADO_PROVEEDOR` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PROVEEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROVEEDORES`
--

LOCK TABLES `PROVEEDORES` WRITE;
/*!40000 ALTER TABLE `PROVEEDORES` DISABLE KEYS */;
INSERT INTO `PROVEEDORES` VALUES (1,12323,'litoral','av la paz',75315092,1,'2021-02-14 20:53:03','2021-02-14 20:53:03'),(2,23424234,'lidita','b/constructor',2343523523,1,'2021-02-14 20:53:13','2021-02-15 00:13:02');
/*!40000 ALTER TABLE `PROVEEDORES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SALIDAS`
--

DROP TABLE IF EXISTS `SALIDAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SALIDAS` (
  `COD_SALIDA` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_PEDIDO` bigint(20) unsigned NOT NULL,
  `COD_AREA` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `DETALLE_SALIDA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_SALIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SALIDA`),
  KEY `salidas_cod_area_foreign` (`COD_AREA`),
  KEY `salidas_cod_pedido_foreign` (`COD_PEDIDO`),
  CONSTRAINT `salidas_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE,
  CONSTRAINT `salidas_cod_pedido_foreign` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `PEDIDOS` (`COD_PEDIDO`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SALIDAS`
--

LOCK TABLES `SALIDAS` WRITE;
/*!40000 ALTER TABLE `SALIDAS` DISABLE KEYS */;
INSERT INTO `SALIDAS` VALUES (1,3,1,'2021-02-08','hola',1,NULL,NULL),(2,3,1,'2021-02-17','va de nuevo',1,'2021-02-17 04:53:10','2021-02-17 04:53:10'),(3,5,1,'2021-02-17','va de nuevo',1,'2021-02-17 04:55:05','2021-02-17 04:55:05'),(4,6,1,'2021-02-17','va de nuevo',1,'2021-02-17 04:58:09','2021-02-17 04:58:09'),(5,7,1,'2021-02-17','va de nuevo',1,'2021-02-17 13:58:03','2021-02-17 13:58:03');
/*!40000 ALTER TABLE `SALIDAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUPR_COMPRA_STOCK`
--

DROP TABLE IF EXISTS `SUPR_COMPRA_STOCK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUPR_COMPRA_STOCK` (
  `COD_SUPR_COMPRA_STOCK` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_COMPRA_STOCK` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SUPR_COMPRA_STOCK`),
  KEY `supr_compra_stock_cod_compra_stock_foreign` (`COD_COMPRA_STOCK`),
  KEY `supr_compra_stock_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `supr_compra_stock_cod_compra_stock_foreign` FOREIGN KEY (`COD_COMPRA_STOCK`) REFERENCES `COMPRA_STOCKS` (`COD_COMPRA_STOCK`) ON DELETE CASCADE,
  CONSTRAINT `supr_compra_stock_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUPR_COMPRA_STOCK`
--

LOCK TABLES `SUPR_COMPRA_STOCK` WRITE;
/*!40000 ALTER TABLE `SUPR_COMPRA_STOCK` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUPR_COMPRA_STOCK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUPR_CONSUMO_DIRECTO`
--

DROP TABLE IF EXISTS `SUPR_CONSUMO_DIRECTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUPR_CONSUMO_DIRECTO` (
  `COD_SUPR_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SUPR_CONSUMO_DIRECTO`),
  KEY `supr_consumo_directo_cod_consumo_directo_foreign` (`COD_CONSUMO_DIRECTO`),
  KEY `supr_consumo_directo_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `supr_consumo_directo_cod_consumo_directo_foreign` FOREIGN KEY (`COD_CONSUMO_DIRECTO`) REFERENCES `CONSUMO_DIRECTOS` (`COD_CONSUMO_DIRECTO`) ON DELETE CASCADE,
  CONSTRAINT `supr_consumo_directo_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUPR_CONSUMO_DIRECTO`
--

LOCK TABLES `SUPR_CONSUMO_DIRECTO` WRITE;
/*!40000 ALTER TABLE `SUPR_CONSUMO_DIRECTO` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUPR_CONSUMO_DIRECTO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUPR_PEDIDO`
--

DROP TABLE IF EXISTS `SUPR_PEDIDO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUPR_PEDIDO` (
  `COD_SUPR_PEDIDO` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_PEDIDO` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SUPR_PEDIDO`),
  KEY `supr_pedido_cod_pedido_foreign` (`COD_PEDIDO`),
  KEY `supr_pedido_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `supr_pedido_cod_pedido_foreign` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `PEDIDOS` (`COD_PEDIDO`) ON DELETE CASCADE,
  CONSTRAINT `supr_pedido_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUPR_PEDIDO`
--

LOCK TABLES `SUPR_PEDIDO` WRITE;
/*!40000 ALTER TABLE `SUPR_PEDIDO` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUPR_PEDIDO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUPR_SALIDA`
--

DROP TABLE IF EXISTS `SUPR_SALIDA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUPR_SALIDA` (
  `COD_SUPR_SALIDA` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `COD_SALIDA` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SUPR_SALIDA`),
  KEY `supr_salida_cod_usuario_foreign` (`COD_USUARIO`),
  KEY `supr_salida_cod_salida_foreign` (`COD_SALIDA`),
  CONSTRAINT `supr_salida_cod_salida_foreign` FOREIGN KEY (`COD_SALIDA`) REFERENCES `SALIDAS` (`COD_SALIDA`) ON DELETE CASCADE,
  CONSTRAINT `supr_salida_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUPR_SALIDA`
--

LOCK TABLES `SUPR_SALIDA` WRITE;
/*!40000 ALTER TABLE `SUPR_SALIDA` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUPR_SALIDA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account2`
--

DROP TABLE IF EXISTS `account2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account2` (
  `acct_num` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account2`
--

LOCK TABLES `account2` WRITE;
/*!40000 ALTER TABLE `account2` DISABLE KEYS */;
INSERT INTO `account2` VALUES (10,8.00),(10,8.00);
/*!40000 ALTER TABLE `account2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_09_024447_create_estructura_gs_table',1),(5,'2019_12_10_191248_create_consumo_directos_table',1),(6,'2020_06_26_200948_create_bitacoras_table',1),(7,'2020_06_26_201000_create_sesions_table',1),(8,'2020_07_02_223630_create_permission_tables',1),(9,'2020_07_16_003305_create_partidas_table',1),(10,'2020_07_16_003705_create_medidas_table',1),(11,'2020_07_16_003706_create_articulos_table',1),(12,'2020_09_12_212821_add_image_users_table',1),(13,'2020_12_01_191117_create_proveedors_table',1),(14,'2020_12_01_192508_create_pedidos_table',1),(15,'2020_12_01_194038_create_detalle_consumo_directo_table',1),(16,'2020_12_01_194115_create_consumo_proveedor_table',1),(17,'2020_12_01_200822_create_compra_stocks_table',1),(18,'2020_12_01_200915_create_detalle_compra_stock_table',1),(19,'2020_12_01_202258_create_salidas_table',1),(20,'2020_12_01_202341_create_detalle_salida_table',1),(21,'2020_12_01_203942_create_detalle_pedido_table',1),(22,'2020_12_02_044505_create_supr_compra_stock_table',1),(23,'2020_12_02_045018_create_supr_salida_table',1),(24,'2020_12_02_045300_create_supr_pedido_table',1),(25,'2020_12_02_045515_create_supr_consumo_directo_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (3,'App\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'accesso_usuarios','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(2,'crear_usuarios','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(3,'modificar_usuarios','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(4,'eliminar_usuarios','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(5,'Mostrar_usuarios','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(6,'accesso_roles','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(7,'crear_roles','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(8,'modificar_roles','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(9,'eliminar_roles','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(10,'Mostrar_role','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(11,'accesso_partidas','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(12,'crear_partidas','web','2021-02-14 20:51:06','2021-02-14 20:51:06'),(13,'modificar_partidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(14,'eliminar_partidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(15,'Mostrar_partidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(16,'accesso_medidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(17,'crear_medidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(18,'modificar_medidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(19,'eliminar_medidas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(20,'Mostrar_Unidad_de_Medida','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(21,'accesso_articulos','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(22,'crear_articulos','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(23,'modificar_articulos','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(24,'eliminar_articulos','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(25,'Mostrar_articulos','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(26,'accesso_areas','web','2021-02-14 20:51:07','2021-02-14 20:51:07'),(27,'crear_areas','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(28,'modificar_areas','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(29,'eliminar_areas','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(30,'Mostrar_areas','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(31,'accesso_proveedores','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(32,'crear_proveedores','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(33,'modificar_proveedores','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(34,'eliminar_proveedores','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(35,'Mostrar_Proveedores','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(36,'accesso_cierregestion','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(37,'crear_cierregestion','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(38,'modificar_cierregestion','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(39,'eliminar_cierregestion','web','2021-02-14 20:51:08','2021-02-14 20:51:08'),(40,'accesso_almacen','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(41,'crear_almacen','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(42,'modificar_almacen','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(43,'eliminar_almacen','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(44,'mostrar_almacen','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(45,'accesso_consumodirecto','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(46,'crear_consumodirecto','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(47,'modificar_consumodirecto','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(48,'eliminar_consumodirecto','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(49,'accesso_pedidos','web','2021-02-14 20:51:09','2021-02-14 20:51:09'),(50,'crear_pedidos','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(51,'modificar_pedidos','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(52,'eliminar_pedidos','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(53,'accesso_salidas','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(54,'crear_salidas','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(55,'modificar_salidas','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(56,'eliminar_salidas','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(57,'accesso_reportes','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(58,'crear_reportes','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(59,'modificar_reportes','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(60,'eliminar_reportes','web','2021-02-14 20:51:10','2021-02-14 20:51:10'),(61,'accesso_reporteInventarioActual','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(62,'accesso_reporteInventarioManual','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(63,'accesso_Kardex','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(64,'accesso_ReporteDetalladoStockAlmacen','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(65,'accesso_FisicoValoradoConsumoDirecto','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(66,'accesso_InventarioDetalladoAlmacen','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(67,'accesso_ConsolidadoFisicoValoradoTotal','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(68,'accesso_ReporteDetalladoIngresosConsumoDirecto','web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(69,'accesso_FisicoValoradoStockAlmacen','web','2021-02-14 20:51:11','2021-02-14 20:51:11');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (2,1),(3,1),(1,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3),(50,3),(51,3),(52,3),(53,3),(54,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(66,3),(67,3),(68,3),(69,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'editor',NULL,1,'web','2021-02-14 20:51:11','2021-02-14 20:51:11'),(2,'moderador',NULL,1,'web','2021-02-14 20:51:12','2021-02-14 20:51:12'),(3,'super-admin',NULL,1,'web','2021-02-14 20:51:12','2021-02-14 20:51:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesions`
--

DROP TABLE IF EXISTS `sesions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sesions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `inicio_sesion` datetime NOT NULL,
  `cierre_sesion` datetime NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sesions_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `sesions_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesions`
--

LOCK TABLES `sesions` WRITE;
/*!40000 ALTER TABLE `sesions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CI` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APELLIDO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM_USUARIO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ESTADO_USUARIO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nombre_unique` (`NOMBRE`),
  UNIQUE KEY `users_nom_usuario_unique` (`NOM_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'8174801','Wilson','Flores Flores','75315092','Wilson2021','$2y$10$oXYNcFzikFPpOnz0rvXXd.MpEHVWIFiqNfkR0tLTLOBEHzB7twVGS','1613338835avatar1.jpg',1,'2021-02-14 20:51:15','2021-02-14 21:40:35');
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

-- Dump completed on 2021-02-20  3:48:38
