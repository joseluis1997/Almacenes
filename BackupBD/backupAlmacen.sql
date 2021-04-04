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
  UNIQUE KEY `areas_nom_area_unique` (`NOM_AREA`),
  KEY `areas_area_padre_foreign` (`AREA_PADRE`),
  CONSTRAINT `areas_area_padre_foreign` FOREIGN KEY (`AREA_PADRE`) REFERENCES `AREAS` (`COD_AREA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AREAS`
--

LOCK TABLES `AREAS` WRITE;
/*!40000 ALTER TABLE `AREAS` DISABLE KEYS */;
INSERT INTO `AREAS` VALUES (1,NULL,'GOBIERNO AUTÓNOMO DEPARTAMENTAL DE TARIJA',NULL,NULL,1,'2021-04-04 02:26:56','2021-04-04 02:26:56'),(2,1,'Secretaria Departamental de Economia y Finanzas','Avenida la paz',NULL,1,'2021-04-04 03:17:45','2021-04-04 03:17:45'),(3,2,'Acesoria Legal','avenida la paz',NULL,1,'2021-04-04 03:18:33','2021-04-04 03:18:33'),(4,2,'Direccion de Administracion','Avenida la paz',NULL,1,'2021-04-04 03:19:22','2021-04-04 03:19:22'),(5,4,'Activo Fijo','Avenida la paz',NULL,1,'2021-04-04 03:19:39','2021-04-04 03:19:39'),(6,4,'Almacenes','Avenida la paz',NULL,1,'2021-04-04 03:19:55','2021-04-04 03:19:55'),(7,4,'Servicios Generales','Avenida la paz',NULL,1,'2021-04-04 03:20:14','2021-04-04 03:20:14'),(8,1,'Secretaria Departamental de Pueblo y Naciones Indigenas','Avenida la paz',NULL,1,'2021-04-04 03:24:46','2021-04-04 03:24:46');
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
  `NOM_ARTICULO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESC_ARTICULO` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CANT_ACTUAL` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `MARCA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_ARTICULO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_ARTICULO`),
  UNIQUE KEY `articulo_nom_articulo_unique` (`NOM_ARTICULO`),
  KEY `articulo_fk_cod_partida_foreign` (`FK_COD_PARTIDA`),
  KEY `articulo_fk_cod_medida_foreign` (`FK_COD_MEDIDA`),
  CONSTRAINT `articulo_fk_cod_medida_foreign` FOREIGN KEY (`FK_COD_MEDIDA`) REFERENCES `MEDIDA` (`COD_MEDIDA`) ON DELETE CASCADE,
  CONSTRAINT `articulo_fk_cod_partida_foreign` FOREIGN KEY (`FK_COD_PARTIDA`) REFERENCES `PARTIDA` (`COD_PARTIDA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ARTICULO`
--

LOCK TABLES `ARTICULO` WRITE;
/*!40000 ALTER TABLE `ARTICULO` DISABLE KEYS */;
INSERT INTO `ARTICULO` VALUES (1,4,5,'Te en bolsitas','te en bolsitas para desayuno','0','Celestial',1,'2021-04-04 02:32:23','2021-04-04 02:32:23'),(2,4,6,'Cafe Instantaneo','cafe instantaneo de 200 gramos','0','Nescafe',1,'2021-04-04 02:35:50','2021-04-04 02:35:50'),(3,9,3,'Alimento Canino','Alimento canino  de 21 kilogramos','0','Dog Chow',1,'2021-04-04 02:37:35','2021-04-04 02:37:35'),(4,12,7,'Papel bond carta','papel bond tamaño carta 75 GRS','120','Multi',1,'2021-04-04 02:41:04','2021-04-04 02:41:04'),(5,12,5,'Papel Carbonico','papel carbónico marca pelikan','21','Pelikan',1,'2021-04-04 02:42:32','2021-04-04 02:42:32'),(6,13,8,'Arichivador a Palanca Oficio','Archivador de Palanca Lomo 1/2','15','Artesco',1,'2021-04-04 02:44:40','2021-04-04 02:44:40'),(7,13,8,'Archivador Rapido','Archivador Rapido marca lider','8','Lider',1,'2021-04-04 02:48:48','2021-04-04 02:48:48'),(8,25,8,'Carpicola','Carpicola marca artesco','25','Artesco',1,'2021-04-04 02:51:09','2021-04-04 02:51:09'),(9,25,9,'Clip para Papeles','clip para papeles numero 2','23','Kores',1,'2021-04-04 02:52:40','2021-04-04 02:52:40'),(10,21,8,'Secador','Toallas secador marca alclear','250','Alclear',1,'2021-04-04 02:55:19','2021-04-04 02:55:19'),(11,21,3,'Detergente Granulado','Detergente Granulado de 900 gramos','10','Bolivar',1,'2021-04-04 02:56:24','2021-04-04 02:56:24'),(12,21,5,'Ambientador solido para inodoro','Ambientador solido para inodoro marca Bcoole','12','Bcoole',1,'2021-04-04 02:57:46','2021-04-04 02:57:46'),(13,21,5,'Esponja','Esponja marca Sapolio','5','Sapolio',1,'2021-04-04 02:58:49','2021-04-04 02:58:49'),(14,25,8,'Estilete','Estilete marca Profield','30','Profield',1,'2021-04-04 02:59:52','2021-04-04 02:59:52'),(15,1,10,'Toners','Toners marca canon','0','Canon',1,'2021-04-04 03:01:51','2021-04-04 03:02:19'),(16,25,4,'Tubo de minas','tubo de minas para porta minas marca faber castell','15','Faber Castell',1,'2021-04-04 03:04:32','2021-04-04 03:04:32'),(17,8,10,'Yogurt','yogurt para refrigerios','5','Pil',1,'2021-04-04 03:35:50','2021-04-04 03:35:50');
/*!40000 ALTER TABLE `ARTICULO` ENABLE KEYS */;
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
  `COD_PROVEEDOR` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `NRO_ORD_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRO_PREVENTIVO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPROBANTE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `DETALLE_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_COMPRA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_COMPRA_STOCK`),
  UNIQUE KEY `compra_stocks_nro_ord_compra_unique` (`NRO_ORD_COMPRA`),
  UNIQUE KEY `compra_stocks_nro_preventivo_unique` (`NRO_PREVENTIVO`),
  KEY `compra_stocks_cod_area_foreign` (`COD_AREA`),
  KEY `compra_stocks_cod_proveedor_foreign` (`COD_PROVEEDOR`),
  KEY `compra_stocks_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `compra_stocks_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE,
  CONSTRAINT `compra_stocks_cod_proveedor_foreign` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `PROVEEDORES` (`COD_PROVEEDOR`) ON DELETE CASCADE,
  CONSTRAINT `compra_stocks_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMPRA_STOCKS`
--

LOCK TABLES `COMPRA_STOCKS` WRITE;
/*!40000 ALTER TABLE `COMPRA_STOCKS` DISABLE KEYS */;
INSERT INTO `COMPRA_STOCKS` VALUES (1,6,2,1,'0591','056','Resivo','2021-04-01','compra de de 120 resmas de hoja bond carta',1,'2021-04-04 03:41:39','2021-04-04 03:41:39'),(2,1,2,1,'0321','0895','Resivo','2021-05-05','compra, de materiales de escritorio de la papeleria Tarija',1,'2021-04-04 03:45:23','2021-04-04 03:45:23'),(3,6,3,1,'0078','0065','Resivo','2021-04-15','compra, de toallas secadoras',1,'2021-04-04 03:54:38','2021-04-04 03:54:38'),(4,6,6,1,'5621','458','Resivo','2021-05-09','compra, de 30 estilete de la libreria san bernardo',1,'2021-04-04 03:59:03','2021-04-04 03:59:03'),(5,6,7,1,'2356','0485','Resivo','2021-05-07','compra, de materiales de limpieza',1,'2021-04-04 04:04:50','2021-04-04 04:04:50'),(6,6,1,1,'1265','123','Resivo','2021-04-06','compra, de yogurt para refrigerio para la capacitacion del sistema sigadet del Almacen central',1,'2021-04-04 04:08:52','2021-04-04 04:08:52');
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
  `COD_PROVEEDOR` bigint(20) unsigned NOT NULL,
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `NRO_ORD_COMPRA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRO_PREVENTIVO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOTA_INGRESO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `COMPROBANTE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DETALLE_CONSUMO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_COMPRA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_CONSUMO_DIRECTO`),
  UNIQUE KEY `consumo_directos_nro_ord_compra_unique` (`NRO_ORD_COMPRA`),
  UNIQUE KEY `consumo_directos_nro_preventivo_unique` (`NRO_PREVENTIVO`),
  UNIQUE KEY `consumo_directos_nota_ingreso_unique` (`NOTA_INGRESO`),
  KEY `consumo_directos_cod_area_foreign` (`COD_AREA`),
  KEY `consumo_directos_cod_proveedor_foreign` (`COD_PROVEEDOR`),
  KEY `consumo_directos_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `consumo_directos_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE,
  CONSTRAINT `consumo_directos_cod_proveedor_foreign` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `PROVEEDORES` (`COD_PROVEEDOR`) ON DELETE CASCADE,
  CONSTRAINT `consumo_directos_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONSUMO_DIRECTOS`
--

LOCK TABLES `CONSUMO_DIRECTOS` WRITE;
/*!40000 ALTER TABLE `CONSUMO_DIRECTOS` DISABLE KEYS */;
INSERT INTO `CONSUMO_DIRECTOS` VALUES (1,8,2,1,'004','564','5163','2021-04-02','Factura','consumo directo para la secretaria departamental de pueblo y naciones indigenas',1,'2021-04-04 03:32:10','2021-04-04 03:32:10'),(2,5,1,1,'001','5757','01321','2021-04-16','Resivo','consumo directo, yogurt para capacitacion del sistema Sigadet',1,'2021-04-04 03:39:17','2021-04-04 03:39:17');
/*!40000 ALTER TABLE `CONSUMO_DIRECTOS` ENABLE KEYS */;
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
  `CANTIDAD` decimal(10,2) NOT NULL,
  `PRECIO_UNITARIO` decimal(10,2) NOT NULL,
  `ESTADO_DETALLE` tinyint(1) NOT NULL DEFAULT '1',
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
INSERT INTO `DETALLE_COMPRA_STOCK` VALUES (1,4,120.00,28.00,1),(2,6,15.00,3.50,1),(2,5,21.00,2.50,1),(2,8,25.00,7.50,1),(2,7,8.00,1.50,1),(2,9,23.00,3.00,1),(2,16,15.00,20.00,1),(3,10,250.00,10.00,1),(4,14,30.00,3.00,1),(5,11,10.00,16.00,1),(5,12,12.00,12.00,1),(5,13,5.00,2.50,1),(6,17,10.00,1.00,1);
/*!40000 ALTER TABLE `DETALLE_COMPRA_STOCK` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER updatedStock AFTER INSERT ON DETALLE_COMPRA_STOCK
FOR EACH ROW
	UPDATE ARTICULO SET CANT_ACTUAL = CANT_ACTUAL + NEW.CANTIDAD
	WHERE ARTICULO.COD_ARTICULO=NEW.COD_ARTICULO */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `DETALLE_CONSUMO_DIRECTO`
--

DROP TABLE IF EXISTS `DETALLE_CONSUMO_DIRECTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_CONSUMO_DIRECTO` (
  `COD_CONSUMO_DIRECTO` bigint(20) unsigned NOT NULL,
  `COD_ARTICULO` bigint(20) unsigned NOT NULL,
  `PRECIO_UNITARIO` decimal(10,2) NOT NULL,
  `CANTIDAD` decimal(10,2) NOT NULL,
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
INSERT INTO `DETALLE_CONSUMO_DIRECTO` VALUES (1,4,28.00,3.00),(1,7,22.50,10.00),(2,17,1.00,500.00);
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
  `CANTIDAD` decimal(10,2) NOT NULL,
  `ESTADO_PEDIDO` tinyint(1) NOT NULL DEFAULT '1',
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
INSERT INTO `DETALLE_PEDIDO` VALUES (17,1,5.00,1);
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
  `CANTIDAD` decimal(10,2) NOT NULL,
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
INSERT INTO `DETALLE_SALIDA` VALUES (1,17,5.00);
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER updatedStockSalida AFTER INSERT ON DETALLE_SALIDA
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
  `NOM_MEDIDA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESC_MEDIDA` text COLLATE utf8mb4_unicode_ci,
  `ESTADO_MEDIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_MEDIDA`),
  UNIQUE KEY `medida_nom_medida_unique` (`NOM_MEDIDA`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIDA`
--

LOCK TABLES `MEDIDA` WRITE;
/*!40000 ALTER TABLE `MEDIDA` DISABLE KEYS */;
INSERT INTO `MEDIDA` VALUES (1,'Kg','Unidad de medida para articulos que se miden en kilogramos',1,NULL,NULL),(2,'LT','Unidad de medida para articulos que se miden en litros',1,NULL,NULL),(3,'Bolsa','Unidad de medida en bolsas',1,NULL,NULL),(4,'Caja','Unidad de medida para articulos que s compra por cajas.',1,NULL,NULL),(5,'Paquete','Unidad de medida para articulos que llegan por paquetes.',1,NULL,NULL),(6,'Frasco','Unidad de medida para articulos en frascos',1,NULL,NULL),(7,'Resma','unidad de medida en Resmas',1,NULL,NULL),(8,'Pieza','Unidad de medida en pieza',1,NULL,NULL),(9,'Cajita','unidad de medida en cajitas',1,NULL,NULL),(10,'Unidad','unidad de medida en unidad',1,NULL,NULL);
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
  `DESCRIPCION` text COLLATE utf8mb4_unicode_ci,
  `ESTADO_PARTIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PARTIDA`),
  UNIQUE KEY `partida_nom_partida_unique` (`NOM_PARTIDA`),
  UNIQUE KEY `partida_nro_partida_unique` (`NRO_PARTIDA`),
  KEY `partida_partida_padre_foreign` (`PARTIDA_PADRE`),
  CONSTRAINT `partida_partida_padre_foreign` FOREIGN KEY (`PARTIDA_PADRE`) REFERENCES `PARTIDA` (`COD_PARTIDA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARTIDA`
--

LOCK TABLES `PARTIDA` WRITE;
/*!40000 ALTER TABLE `PARTIDA` DISABLE KEYS */;
INSERT INTO `PARTIDA` VALUES (1,NULL,'MATERIALES Y SUMINISTROS','30000','Comprende de la adquisición de articulos, materiales y bienes que se consumen o cambien de valor durante la gestión. Se incluye los materiales que se destinan a conservación y reparación de bienes de capital .',1,NULL,NULL),(2,1,'Alimentos y Productos Agroforestales','31000','Gastos destinados a la adquisición de bebidas y productos alimenticios, manufacturados o no, 1nduye animales vivos para consumo, aceites, grasas animal es y vegetal es, forrajes Y otros alimentos para  animal es; además, comprende productos agrícolas, ganaderos, de silvicultura, caza Y pesca. Comprende madera y productos de este material.',1,NULL,NULL),(3,2,'Alimentos y Bebidas para Personas, Desayuno Escolar y Otros','31100','Gastos destinados al pago de comida y bebida en establecimientos hospitalarios, penitenciarios, de orfandad, cuarteles, aeronaves, y para el personal de seguridad según convenio interinstitucional; incluye pago de refrigerio:al personal permanente, eventual y consultores individuales de linea de cada entidad, por procesos electorales,emergencias y/o desastres naturales; así como  almuerzos o cenas de trabajo según disposición legal, desayuno escota r y otros relacionados de acuerdo a normativa vigente.',1,NULL,NULL),(4,3,'Gastos  por   Refrigerios  al  personal  permanente','31110','eventual  y  consultores individual es de linea de las Instituciones Públicas Incluye pago por refrigerios al personal de seguridad de la Policía Boliviana, según convenio  interinstitucional.',1,NULL,NULL),(5,3,'Gastos por Alimentación y Otros Similares','31120','Incluye los efectuados en reuniones, seminarios, y otros eventos; así como los gastos por dotación  de víveres a la Policía Boliviana y Fuerzas Arma das.',1,NULL,NULL),(6,3,'Desayuno Escolar','31130','Desayuno Escolar',1,NULL,NULL),(7,3,'Alimentacion Hospitalaria, Penitenciaria, Aeronaves y Otras Especificas','31140','Alimentación Hospitalaria, Penitenciaria,Aeronaves y Otras Especificas',1,NULL,NULL),(8,3,'Alimentos y Bebidas para la atencion de emergencias y desastres naturales','31150','Alimentos y Bebidas para la atención de emergencias y desastres naturales.',1,NULL,NULL),(9,2,'Alimentos para Animales','31200','Gastos destinados a la adquisición de forrajes y otros alimentos para animales de propiedad de  instituciones publicas; alimentación de los animales de propiedad del ejercito y de la Policía  Boliviana, parques zoológicos, laboratorios de experimentación y otros similares',1,NULL,NULL),(10,2,'Productos Agricolas Pecuarios y Forestales','31300','gastos para la adquisición de granos básicos, frutas y flores silvestres, goma, ca?a similares y otros productos agroforestales y agropecuarios en bruto; ademas, gastos por concepto de adquisición de maderas de construcción, puertas, ventanas, vigas, cal lapos, durmientes manufacturados o no, y todo producto proveniente de esta rama, incluido carbón vegetal. Incluye gastos por la compra de ganado y otros animales vivos, destinados al consumo o para usos industriales y científicos; incluye productos derivados de los mismos, como ser leche, huevos, lana, miel, pieles y otros.',1,NULL,NULL),(11,1,'Productos de Papel Carton e Impresos','32000','Gastos destinados a la adquisición de papel y cartón en sus diversas formas y clases; libros y revistas, textos de enseñanza, compra y suscripciones de periódicos',1,NULL,NULL),(12,11,'Papel','32100','Gastos destinados a la adquisición de papel de escritorio y otros',1,NULL,NULL),(13,11,'Productos de Artes Graficos','32200','Gastos para la adquisición de productos de artes graficas y otros relacionados. Incluye gastos destinados a la adquisición de artículos hechos de papel y cartón',1,NULL,NULL),(14,11,'Libros Manuales y Revistas','32300','Gastos destinados a la adquisición de libros, manuales y revistas para las bibliotecas y oficinas',1,NULL,NULL),(15,11,'Textos de Enseñanza','32400','Gastos destinados a la compra de libros para uso docente',1,NULL,NULL),(16,11,'Periodicos y Boletines','32500','Gastos para la compra y suscripciones de periódicos y boletines, incluye gacetas oficinas.',1,NULL,NULL),(17,1,'Textiles y Vestuarios','33000','Gastos para la compra de ropa de trabajo, vestuarios, uniformes, adquisición de calzados, hilados, telas de lino, algodon, seda, lana, fibras artificiales y tapices, alfombras, sabanas, toallas, sacos de fibras y otros articulos.',1,NULL,NULL),(18,17,'Hilados y Telas','33100','Gastos destinados para la compra de hilados y telas de lino, algodón, seda, lana, y fibras artificiales, no utilizados aun en procesos de confección.',1,NULL,NULL),(19,17,'Confecciones y Textiles','33200','Gastos destinados a la adquisición de tapices, alfombras, sabanas, toallas, sacos de fibras, colchones, carpas, cortinas y otros textiles similares.',1,NULL,NULL),(20,1,'Productos Varios','39000','Gastos en productos de limpieza, material deportivo, utensilios de cocina y comedor, instrumental menor médico-quirlrgico, útiles de escritorio, de oficina y enseñanza, materiales eléctricos, repuestos y accesorios en general.',1,NULL,NULL),(21,20,'Materiales de Limpieza','39100','Gastos destinados a la adquisición de materiales como jabones, detergentes, desinfectantes, panos, cepillos, escobas y otros utilizados en limpieza e higiene de bienes y lugares públicos',1,NULL,NULL),(22,20,'Material Deportivo y Recreativo','39200','Gastos destinados a la adquisición de material deportivo. Incluye las compras para proveer material deportivo a las delegaciones deportivas destacadas dentro y fuera del país en representación oficial. Se incluye, ademas, el material destinado a usos recreativos se exceptúan las adquisiciones para donaciones a servidores publicos del estado plurinacional o personas del sector privado, de acuerdo a normativa vigente',1,NULL,NULL),(23,20,'utensilios de cocina y comedor','39300','Gastos destinados a la adquisición de menaje de cocina y vajilla de comedor a ser utilizadas en hospitales, hogares de niños, asilos y otras.',1,NULL,NULL),(24,20,'Instrumental Menor Medico Quirurgico','39400','Gastos destinados a la compra de estetoscopios, termémetros, probetas y demas utiles menores médicos quirirgicos utilzados en hospitales, clinicas y demas dependencias médicas del sector publico.',1,NULL,NULL),(25,20,'Utiles de Escritorio y Oficina','39500','Gastos destinados a la le adquisición de útiles de escritorio como ser: tintas, lapices, bolígrafos, engrapadoras, perforadoras, calculadoras, medios magnéticos, tóner para impresoras y fotocopiadores y otros destinados al funcionamiento de oficinas.',1,NULL,NULL);
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
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `DETALLE_PEDIDO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VALIDADO` tinyint(1) NOT NULL DEFAULT '0',
  `FECHA` date NOT NULL,
  `ESTADO_PEDIDO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PEDIDO`),
  KEY `pedidos_cod_area_foreign` (`COD_AREA`),
  KEY `pedidos_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `pedidos_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PEDIDOS`
--

LOCK TABLES `PEDIDOS` WRITE;
/*!40000 ALTER TABLE `PEDIDOS` DISABLE KEYS */;
INSERT INTO `PEDIDOS` VALUES (1,5,1,'yogurt, para refrigerio para una reunion',1,'2021-04-12',1,'2021-04-04 04:10:42','2021-04-04 04:11:20');
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
  `NOM_PROVEEDOR` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIR_PROVEEDOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TELEF_PROVEEDOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ESTADO_PROVEEDOR` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_PROVEEDOR`),
  UNIQUE KEY `proveedores_nit_unique` (`NIT`),
  UNIQUE KEY `proveedores_nom_proveedor_unique` (`NOM_PROVEEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROVEEDORES`
--

LOCK TABLES `PROVEEDORES` WRITE;
/*!40000 ALTER TABLE `PROVEEDORES` DISABLE KEYS */;
INSERT INTO `PROVEEDORES` VALUES (1,123456789012,'Pil Tarija','Avenida la paz y Circunvalacion','(+591) 76489562',1,'2021-04-04 02:27:08','2021-04-04 02:27:08'),(2,184786023,'Papelera Tarija','Calle colon entre avaroa y avenida vicotr paz','68705066',1,'2021-04-04 02:27:08','2021-04-04 02:27:08'),(3,3202826012,'Toallas Lourdes','Calle colon y avenida Circunvalacion','75148956',1,'2021-04-04 02:27:08','2021-04-04 03:53:10'),(4,678934013,'Libreria Nuevos tiempos','Calle colon N 437 zona central','66423674',1,'2021-04-04 02:27:08','2021-04-04 02:27:08'),(5,153268924,'Comercial stadium',' Potosi N 634 Enter junin y OConnor zona la Pampa','66-37440',1,'2021-04-04 02:27:08','2021-04-04 02:27:08'),(6,7320972010,'Libreria San Bernardo','Barrio san bernardo','+(591) - 789-645-21',1,'2021-04-04 03:57:20','2021-04-04 03:57:20'),(7,1020241028,'Coimsa srl','calle domingo paz y colon','78956231',1,'2021-04-04 04:03:04','2021-04-04 04:03:04');
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
  `COD_USUARIO` bigint(20) unsigned NOT NULL,
  `FECHA` date NOT NULL,
  `DETALLE_SALIDA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTADO_SALIDA` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`COD_SALIDA`),
  KEY `salidas_cod_area_foreign` (`COD_AREA`),
  KEY `salidas_cod_pedido_foreign` (`COD_PEDIDO`),
  KEY `salidas_cod_usuario_foreign` (`COD_USUARIO`),
  CONSTRAINT `salidas_cod_area_foreign` FOREIGN KEY (`COD_AREA`) REFERENCES `AREAS` (`COD_AREA`) ON DELETE CASCADE,
  CONSTRAINT `salidas_cod_pedido_foreign` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `PEDIDOS` (`COD_PEDIDO`) ON DELETE CASCADE,
  CONSTRAINT `salidas_cod_usuario_foreign` FOREIGN KEY (`COD_USUARIO`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SALIDAS`
--

LOCK TABLES `SALIDAS` WRITE;
/*!40000 ALTER TABLE `SALIDAS` DISABLE KEYS */;
INSERT INTO `SALIDAS` VALUES (1,1,5,1,'2021-04-04','yogurt, para refrigerio para una reunion',1,'2021-04-04 04:11:20','2021-04-04 04:11:20');
/*!40000 ALTER TABLE `SALIDAS` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_10_09_191117_create_proveedors_table',1),(5,'2019_12_09_024447_create_estructura_gs_table',1),(6,'2019_12_10_191248_create_consumo_directos_table',1),(7,'2020_06_26_200948_create_bitacoras_table',1),(8,'2020_06_26_201000_create_sesions_table',1),(9,'2020_07_02_223630_create_permission_tables',1),(10,'2020_07_16_003305_create_partidas_table',1),(11,'2020_07_16_003705_create_medidas_table',1),(12,'2020_07_16_003706_create_articulos_table',1),(13,'2020_09_12_212821_add_image_users_table',1),(14,'2020_12_01_192508_create_pedidos_table',1),(15,'2020_12_01_194038_create_detalle_consumo_directo_table',1),(16,'2020_12_01_194115_create_consumo_proveedor_table',1),(17,'2020_12_01_200822_create_compra_stocks_table',1),(18,'2020_12_01_200915_create_detalle_compra_stock_table',1),(19,'2020_12_01_202258_create_salidas_table',1),(20,'2020_12_01_202341_create_detalle_salida_table',1),(21,'2020_12_01_203942_create_detalle_pedido_table',1),(22,'2020_12_02_044505_create_supr_compra_stock_table',1),(23,'2020_12_02_045018_create_supr_salida_table',1),(24,'2020_12_02_045300_create_supr_pedido_table',1),(25,'2020_12_02_045515_create_supr_consumo_directo_table',1),(26,'2021_04_03_170253_add_descripcion_to_partida',1);
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
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Listar_usuarios','web','2021-04-04 02:26:56','2021-04-04 02:26:56'),(2,'Crear_usuarios','web','2021-04-04 02:26:56','2021-04-04 02:26:56'),(3,'Modificar_usuarios','web','2021-04-04 02:26:56','2021-04-04 02:26:56'),(4,'Deshabilitar_usuarios','web','2021-04-04 02:26:56','2021-04-04 02:26:56'),(5,'Habilitar_usuarios','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(6,'Ver_usuarios','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(7,'Listar_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(8,'Crear_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(9,'Modificar_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(10,'Deshabilitar_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(11,'Habilitar_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(12,'Ver_roles','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(13,'Listar_partidas','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(14,'Crear_partidas','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(15,'Modificar_partidas','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(16,'Deshabilitar_partidas','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(17,'Habilitar_partidas','web','2021-04-04 02:26:57','2021-04-04 02:26:57'),(18,'Ver_partidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(19,'Listar_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(20,'Crear_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(21,'Modificar_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(22,'Deshabilitar_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(23,'Habilitar_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(24,'Ver_Unidades_de_Medidas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(25,'Listar_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(26,'Crear_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(27,'Modificar_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(28,'Deshabilitar_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(29,'Habilitar_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(30,'Ver_articulos','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(31,'Listar_areas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(32,'Crear_areas','web','2021-04-04 02:26:58','2021-04-04 02:26:58'),(33,'Modificar_areas','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(34,'Deshabilitar_areas','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(35,'Habilitar_areas','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(36,'Ver_areas','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(37,'Listar_proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(38,'Crear_proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(39,'Modificar_proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(40,'Deshabilitar_proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(41,'Habilitar_proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(42,'Ver_Proveedores','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(43,'Listar_compras','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(44,'Crear_compras','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(45,'Modificar_compras','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(46,'Deshabilitar_compras','web','2021-04-04 02:26:59','2021-04-04 02:26:59'),(47,'Habilitar_compras','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(48,'Verdetalle_compras','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(49,'Listar_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(50,'Crear_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(51,'Modificar_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(52,'Deshabilitar_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(53,'Habilitar_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(54,'VerDetalles_consumos_directos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(55,'Listar_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(56,'Crear_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(57,'Modificar_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(58,'Deshabilitar_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(59,'Habilitar_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(60,'VerDetalle_pedidos','web','2021-04-04 02:27:00','2021-04-04 02:27:00'),(61,'Listar_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(62,'Crear_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(63,'Modificar_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(64,'Deshabilitar_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(65,'Habilitar_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(66,'Validar_Salida_Pedido','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(67,'VerDetalle_salidas','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(68,'VerDetalle_pedidos_Pendientes','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(69,'accesso_reportes','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(70,'accesso_reporteInventarioActual','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(71,'accesso_reporteInventarioActualDetallado','web','2021-04-04 02:27:01','2021-04-04 02:27:01'),(72,'accesso_FisicoValoradoConsumoDirectos','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(73,'acesso_ReporteDetalladoConsumoDirectos','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(74,'accesso_FisicoValoradoCompras','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(75,'accesso_ReporteDetalladoCompras','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(76,'accesso_ReporteAreas','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(77,'accesso_ConsolidadoFisicoValoradoTotal','web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(78,'accesso_Kardex','web','2021-04-04 02:27:02','2021-04-04 02:27:02');
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
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(19,2),(25,2),(31,2),(37,2),(49,2),(55,2),(61,2),(19,3),(25,3),(31,3),(37,3);
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
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `roles` VALUES (1,'Administrador',NULL,1,'web','2021-04-04 02:27:02','2021-04-04 02:27:02'),(2,'Tecnico',NULL,1,'web','2021-04-04 02:27:06','2021-04-04 02:27:06'),(3,'Visitante',NULL,1,'web','2021-04-04 02:27:06','2021-04-04 02:27:06');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `NOMBRES` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APELLIDOS` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM_USUARIO` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ESTADO_USUARIO` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_ci_unique` (`CI`),
  UNIQUE KEY `users_nombres_unique` (`NOMBRES`),
  UNIQUE KEY `users_nom_usuario_unique` (`NOM_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'8174801','Wilson','Flores Flores','75315092','Wilson2021','$2y$10$aHrw8zeZUWh3JUcsZ.1Hs.RHNIs6jM8bypuiM4jBHX3xnz8/6.mXa','1617509508pp.jpeg',1,'2021-04-04 02:27:06','2021-04-04 04:11:48'),(2,'8174702','Jose Luis','Mercado Alarcon','75315012','lucho1997','$2y$10$UGctQA/d25S5CNlV5LbzNOR564dx9mI8BKe.BoTe0i6jpKe.5m8sG','1617509554WhatsApp Image 2021-04-01 at 11.33.51.jpeg',1,'2021-04-04 04:12:34','2021-04-04 04:12:34');
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

-- Dump completed on 2021-04-04  5:33:46
