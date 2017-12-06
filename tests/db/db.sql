-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: autocrm_test
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `bodies`
--

DROP TABLE IF EXISTS `bodies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tradein_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodies`
--

LOCK TABLES `bodies` WRITE;
/*!40000 ALTER TABLE `bodies` DISABLE KEYS */;
INSERT INTO `bodies` VALUES (1,'1',NULL),(2,'2',NULL);
/*!40000 ALTER TABLE `bodies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(64) NOT NULL,
  `importer_db_name` varchar(32) NOT NULL,
  `host` varchar(128) DEFAULT NULL,
  `token` char(16) DEFAULT NULL,
  `ecm_id` int(11) DEFAULT NULL,
  `is_supported` tinyint(1) NOT NULL DEFAULT '0',
  `origin_id` int(11) DEFAULT NULL COMMENT 'ссылка на таблицу eqt_car_mark',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1337 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Opel','opel.png','opel',NULL,NULL,NULL,0,NULL),(2,'Chevrolet','chevrolet.png','chevrolet',NULL,NULL,NULL,0,NULL),(3,'Cadillac','cadillac.png','cadillac',NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_characteristic`
--

DROP TABLE IF EXISTS `car_characteristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_characteristic` (
  `id_car_characteristic` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `id_parent` int(8) DEFAULT NULL COMMENT 'Родитель',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `is_main` tinyint(1) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_car_characteristic`),
  KEY `id_car_type` (`id_car_type`),
  KEY `car_characteristic_origin` (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1572 DEFAULT CHARSET=utf8 COMMENT='Характеристики автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_characteristic`
--

LOCK TABLES `car_characteristic` WRITE;
/*!40000 ALTER TABLE `car_characteristic` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_characteristic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_characteristic_value`
--

DROP TABLE IF EXISTS `car_characteristic_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_characteristic_value` (
  `id_car_characteristic_value` int(8) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL COMMENT 'Значение',
  `unit` varchar(255) DEFAULT NULL COMMENT 'Еденица измерения',
  `id_car_characteristic` int(8) NOT NULL COMMENT 'Характеристика',
  `id_car_modification` int(8) NOT NULL COMMENT 'Модификация Авто',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `origin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_car_characteristic_value`),
  UNIQUE KEY `id_characteristic` (`id_car_characteristic`,`id_car_modification`),
  UNIQUE KEY `id_car_characteristic` (`id_car_characteristic`,`id_car_modification`,`id_car_type`),
  KEY `id_car_type` (`id_car_type`),
  KEY `car_characteristic_value_origin` (`origin_id`),
  KEY `id_car_modification` (`id_car_modification`)
) ENGINE=InnoDB AUTO_INCREMENT=35446042 DEFAULT CHARSET=utf8 COMMENT='Значения характеристик автомобиля';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_characteristic_value`
--

LOCK TABLES `car_characteristic_value` WRITE;
/*!40000 ALTER TABLE `car_characteristic_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_characteristic_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_generation`
--

DROP TABLE IF EXISTS `car_generation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_generation` (
  `id_car_generation` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `model_id` int(11) DEFAULT NULL COMMENT 'при выборке этот атрибут использовать нельзя',
  `year_begin` varchar(255) DEFAULT NULL COMMENT 'Год начала выпуска',
  `year_end` varchar(255) DEFAULT NULL COMMENT 'Год окончания выпуска',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `is_recent` tinyint(1) NOT NULL,
  `origin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_car_generation`),
  KEY `id_car_type` (`id_car_type`),
  KEY `car_generation_origin` (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10954 DEFAULT CHARSET=utf8 COMMENT='Поколения Моделей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_generation`
--

LOCK TABLES `car_generation` WRITE;
/*!40000 ALTER TABLE `car_generation` DISABLE KEYS */;
INSERT INTO `car_generation` VALUES (1,'1',1,'1','1',1,1,1,1),(2,'2',1,'1','1',1,1,0,1),(3,'3',1,'1','1',0,1,1,1),(4,'4',1,'1','1',0,1,0,1),(5,'5',2,'1','1',1,1,1,NULL);
/*!40000 ALTER TABLE `car_generation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_modification`
--

DROP TABLE IF EXISTS `car_modification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_modification` (
  `id_car_modification` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_serie` int(11) NOT NULL COMMENT 'Серия автомобиля',
  `name` varchar(255) NOT NULL COMMENT 'Название модификции',
  `start_production_year` int(8) DEFAULT NULL COMMENT 'Год начала производства',
  `end_production_year` int(8) DEFAULT NULL COMMENT 'Год конца производства',
  `drive_type` int(1) DEFAULT NULL,
  `engine_type` int(1) DEFAULT NULL,
  `transmission_type` int(1) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `price_min` int(8) DEFAULT NULL COMMENT 'Минимальная цена',
  `price_max` int(8) DEFAULT NULL COMMENT 'Максимальная цена',
  `package_code` varchar(255) DEFAULT NULL,
  `is_recent` tinyint(1) NOT NULL DEFAULT '1',
  `origin_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_car_modification`),
  KEY `id_car_serie` (`id_car_serie`),
  KEY `id_car_type` (`id_car_type`),
  KEY `car_modification_origin` (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221526 DEFAULT CHARSET=utf8 COMMENT='Модификации автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_modification`
--

LOCK TABLES `car_modification` WRITE;
/*!40000 ALTER TABLE `car_modification` DISABLE KEYS */;
INSERT INTO `car_modification` VALUES (1,1,'1',2010,2013,NULL,NULL,NULL,1,1,0,0,NULL,1,NULL,0),(2,1,'2',2010,2013,NULL,NULL,NULL,1,1,0,0,NULL,0,NULL,0),(3,1,'3',2010,2013,NULL,NULL,NULL,1,1,0,0,NULL,1,NULL,1),(4,1,'4',2010,2013,NULL,NULL,NULL,1,1,0,0,NULL,0,NULL,1),(5,1,'5',2010,2013,NULL,NULL,NULL,0,1,0,0,NULL,1,NULL,0),(6,1,'6',2010,2013,NULL,NULL,NULL,0,1,0,0,NULL,0,NULL,0),(7,1,'7',2010,2013,NULL,NULL,NULL,0,1,0,0,NULL,1,NULL,1),(8,1,'8',2010,2013,NULL,NULL,NULL,0,1,0,0,NULL,0,NULL,1);
/*!40000 ALTER TABLE `car_modification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_serie`
--

DROP TABLE IF EXISTS `car_serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_serie` (
  `id_car_serie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `model_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Название серии',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_generation` int(8) DEFAULT NULL COMMENT 'Поколение',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `body_id` int(11) DEFAULT NULL,
  `is_recent` tinyint(1) NOT NULL,
  `origin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_car_serie`),
  KEY `name` (`name`),
  KEY `id_car_type` (`id_car_type`),
  KEY `fk_car_serie_body` (`body_id`),
  KEY `fk_car_serie_model` (`model_id`),
  KEY `car_serie_origin` (`origin_id`),
  CONSTRAINT `fk_car_serie_body` FOREIGN KEY (`body_id`) REFERENCES `bodies` (`id`),
  CONSTRAINT `fk_car_serie_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51798 DEFAULT CHARSET=utf8 COMMENT='Cерии автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_serie`
--

LOCK TABLES `car_serie` WRITE;
/*!40000 ALTER TABLE `car_serie` DISABLE KEYS */;
INSERT INTO `car_serie` VALUES (1,1,'1',1,1,1,NULL,1,457),(2,1,'2',1,1,1,NULL,0,457),(3,1,'3',0,1,1,NULL,1,457),(4,1,'4',0,1,1,NULL,0,457),(5,1,'5',1,5,1,NULL,1,NULL);
/*!40000 ALTER TABLE `car_serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_type`
--

DROP TABLE IF EXISTS `car_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_type` (
  `id_car_type` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  PRIMARY KEY (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Автомобильный сайт';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_type`
--

LOCK TABLES `car_type` WRITE;
/*!40000 ALTER TABLE `car_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cities_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2521 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,1,1,'1'),(2,1,2,'2');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configurable_reference_params_weights`
--

DROP TABLE IF EXISTS `configurable_reference_params_weights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configurable_reference_params_weights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paramId` varchar(32) NOT NULL,
  `fieldId` int(10) unsigned NOT NULL,
  `weight` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`paramId`,`fieldId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configurable_reference_params_weights`
--

LOCK TABLES `configurable_reference_params_weights` WRITE;
/*!40000 ALTER TABLE `configurable_reference_params_weights` DISABLE KEYS */;
/*!40000 ALTER TABLE `configurable_reference_params_weights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configurable_reference_vehicle`
--

DROP TABLE IF EXISTS `configurable_reference_vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configurable_reference_vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelId` int(11) DEFAULT NULL,
  `brandId` int(10) unsigned DEFAULT NULL,
  `productionYear` year(4) DEFAULT NULL,
  `transmissionType` smallint(6) DEFAULT NULL,
  `engineType` smallint(6) DEFAULT NULL,
  `regionId` int(11) DEFAULT NULL,
  `generationId` int(10) unsigned DEFAULT NULL,
  `cache` bit(6) NOT NULL,
  `weight` int(10) unsigned DEFAULT '0',
  `paramId` varchar(32) NOT NULL,
  `paramValue` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `params` (`paramId`,`modelId`,`brandId`,`productionYear`,`transmissionType`,`engineType`,`regionId`)
) ENGINE=InnoDB AUTO_INCREMENT=1491 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configurable_reference_vehicle`
--

LOCK TABLES `configurable_reference_vehicle` WRITE;
/*!40000 ALTER TABLE `configurable_reference_vehicle` DISABLE KEYS */;
/*!40000 ALTER TABLE `configurable_reference_vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Россия','+7','ru'),(2,'Беларусь','+375','by'),(7,'Казахстан','+7','ru');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_instructions`
--

DROP TABLE IF EXISTS `crm_instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userGroupCode` varchar(32) NOT NULL,
  `brandId` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isForMobile` tinyint(1) NOT NULL DEFAULT '0',
  `excludedId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_instructions`
--

LOCK TABLES `crm_instructions` WRITE;
/*!40000 ALTER TABLE `crm_instructions` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_instructions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crms`
--

DROP TABLE IF EXISTS `crms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) NOT NULL,
  `hostname` varchar(32) DEFAULT NULL,
  `db_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=733 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crms`
--

LOCK TABLES `crms` WRITE;
/*!40000 ALTER TABLE `crms` DISABLE KEYS */;
/*!40000 ALTER TABLE `crms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_types`
--

DROP TABLE IF EXISTS `discount_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount_types` (
  `discount_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `discount_type_name` varchar(255) DEFAULT NULL,
  `discount_type_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `discount_type_unconditional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`discount_type_id`),
  KEY `brand_id_discount_type_unconditional` (`discount_type_unconditional`,`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_types`
--

LOCK TABLES `discount_types` WRITE;
/*!40000 ALTER TABLE `discount_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_brand_logo`
--

DROP TABLE IF EXISTS `eqt_brand_logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_brand_logo` (
  `brand_id` int(11) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`),
  CONSTRAINT `eqt_fk_brand_logo_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_brand_logo`
--

LOCK TABLES `eqt_brand_logo` WRITE;
/*!40000 ALTER TABLE `eqt_brand_logo` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_brand_logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_characteristic`
--

DROP TABLE IF EXISTS `eqt_car_characteristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_characteristic` (
  `id_car_characteristic` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) DEFAULT NULL,
  `id_parent` int(8) DEFAULT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_characteristic`),
  KEY `name` (`name`,`id_parent`,`id_car_type`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=1572 DEFAULT CHARSET=utf8 COMMENT='Характеристики автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_characteristic`
--

LOCK TABLES `eqt_car_characteristic` WRITE;
/*!40000 ALTER TABLE `eqt_car_characteristic` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_characteristic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_characteristic_value`
--

DROP TABLE IF EXISTS `eqt_car_characteristic_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_characteristic_value` (
  `id_car_characteristic_value` int(8) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL COMMENT 'Еденица измерения',
  `id_car_characteristic` int(8) NOT NULL,
  `id_car_modification` int(8) NOT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_characteristic_value`),
  UNIQUE KEY `id_characteristic` (`id_car_characteristic`,`id_car_modification`),
  UNIQUE KEY `id_car_characteristic` (`id_car_characteristic`,`id_car_modification`,`id_car_type`),
  KEY `id_car_type` (`id_car_type`),
  KEY `id_car_type_2` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=35770366 DEFAULT CHARSET=utf8 COMMENT='Значения характеристик автомобиля';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_characteristic_value`
--

LOCK TABLES `eqt_car_characteristic_value` WRITE;
/*!40000 ALTER TABLE `eqt_car_characteristic_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_characteristic_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_equipment`
--

DROP TABLE IF EXISTS `eqt_car_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_equipment` (
  `id_car_equipment` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL,
  `date_create` int(10) unsigned NOT NULL,
  `date_update` int(10) unsigned NOT NULL,
  `id_car_modification` int(8) NOT NULL,
  `price_min` int(8) DEFAULT NULL COMMENT 'Цена от',
  `id_car_type` int(8) NOT NULL,
  `year` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_car_equipment`),
  KEY `id_car_type` (`id_car_type`),
  KEY `date_delete` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=19875 DEFAULT CHARSET=utf8 COMMENT='Комплектации';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_equipment`
--

LOCK TABLES `eqt_car_equipment` WRITE;
/*!40000 ALTER TABLE `eqt_car_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_generation`
--

DROP TABLE IF EXISTS `eqt_car_generation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_generation` (
  `id_car_generation` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_car_model` int(8) NOT NULL,
  `year_begin` varchar(255) DEFAULT NULL,
  `year_end` varchar(255) DEFAULT NULL,
  `date_create` int(10) unsigned NOT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_car_generation`),
  KEY `id_car_model` (`id_car_model`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=10895 DEFAULT CHARSET=utf8 COMMENT='Поколения Моделей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_generation`
--

LOCK TABLES `eqt_car_generation` WRITE;
/*!40000 ALTER TABLE `eqt_car_generation` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_generation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_mark`
--

DROP TABLE IF EXISTS `eqt_car_mark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_mark` (
  `id_car_mark` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  `name_rus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_car_mark`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4143 DEFAULT CHARSET=utf8 COMMENT='Марки автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_mark`
--

LOCK TABLES `eqt_car_mark` WRITE;
/*!40000 ALTER TABLE `eqt_car_mark` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_mark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_model`
--

DROP TABLE IF EXISTS `eqt_car_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_model` (
  `id_car_model` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_mark` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  `name_rus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_car_model`),
  KEY `name` (`name`),
  KEY `id_car_mark` (`id_car_mark`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=22427 DEFAULT CHARSET=utf8 COMMENT='Модели автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_model`
--

LOCK TABLES `eqt_car_model` WRITE;
/*!40000 ALTER TABLE `eqt_car_model` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_modification`
--

DROP TABLE IF EXISTS `eqt_car_modification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_modification` (
  `id_car_modification` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_serie` int(11) NOT NULL,
  `id_car_model` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_modification`),
  KEY `id_car_model` (`id_car_model`),
  KEY `id_car_serie` (`id_car_serie`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=235467 DEFAULT CHARSET=utf8 COMMENT='Модификации автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_modification`
--

LOCK TABLES `eqt_car_modification` WRITE;
/*!40000 ALTER TABLE `eqt_car_modification` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_modification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_option`
--

DROP TABLE IF EXISTS `eqt_car_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_option` (
  `id_car_option` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_parent` int(8) DEFAULT NULL,
  `date_create` int(10) unsigned NOT NULL,
  `date_update` int(10) unsigned NOT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_option`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=30557 DEFAULT CHARSET=utf8 COMMENT='Опции';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_option`
--

LOCK TABLES `eqt_car_option` WRITE;
/*!40000 ALTER TABLE `eqt_car_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_option_value`
--

DROP TABLE IF EXISTS `eqt_car_option_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_option_value` (
  `id_car_option_value` int(8) NOT NULL AUTO_INCREMENT,
  `is_base` tinyint(1) NOT NULL DEFAULT '1',
  `id_car_option` int(8) NOT NULL,
  `id_car_equipment` int(8) NOT NULL,
  `date_create` int(10) unsigned NOT NULL,
  `date_update` int(10) unsigned NOT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_option_value`),
  UNIQUE KEY `id_car_option` (`id_car_option`,`id_car_equipment`,`id_car_type`),
  KEY `id_car_type` (`id_car_type`),
  KEY `date_delete` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=1244372 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Значения опций';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_option_value`
--

LOCK TABLES `eqt_car_option_value` WRITE;
/*!40000 ALTER TABLE `eqt_car_option_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_option_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_serie`
--

DROP TABLE IF EXISTS `eqt_car_serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_serie` (
  `id_car_serie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_model` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` int(10) unsigned DEFAULT NULL,
  `date_update` int(10) unsigned DEFAULT NULL,
  `id_car_generation` int(8) DEFAULT NULL,
  `id_car_type` int(8) NOT NULL,
  PRIMARY KEY (`id_car_serie`),
  KEY `name` (`name`),
  KEY `id_car_model` (`id_car_model`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=53240 DEFAULT CHARSET=utf8 COMMENT='Cерии автомобилей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_serie`
--

LOCK TABLES `eqt_car_serie` WRITE;
/*!40000 ALTER TABLE `eqt_car_serie` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_car_type`
--

DROP TABLE IF EXISTS `eqt_car_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_car_type` (
  `id_car_type` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_car_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Автомобильный сайт';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_car_type`
--

LOCK TABLES `eqt_car_type` WRITE;
/*!40000 ALTER TABLE `eqt_car_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_car_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_catalog_emplacement`
--

DROP TABLE IF EXISTS `eqt_catalog_emplacement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_catalog_emplacement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_catalog_emplacement_model` (`model_id`),
  KEY `eqt_fk_catalog_emplacement_serie` (`serie_id`),
  KEY `eqt_fk_catalog_emplacement_color` (`color_id`),
  KEY `eqt_fk_catalog_emplacement_equipment` (`equipment_id`),
  CONSTRAINT `eqt_fk_catalog_emplacement_color` FOREIGN KEY (`color_id`) REFERENCES `eqt_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_catalog_emplacement_equipment` FOREIGN KEY (`equipment_id`) REFERENCES `eqt_equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_catalog_emplacement_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_catalog_emplacement_serie` FOREIGN KEY (`serie_id`) REFERENCES `car_serie` (`id_car_serie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5782 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_catalog_emplacement`
--

LOCK TABLES `eqt_catalog_emplacement` WRITE;
/*!40000 ALTER TABLE `eqt_catalog_emplacement` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_catalog_emplacement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_catalog_foreshortening`
--

DROP TABLE IF EXISTS `eqt_catalog_foreshortening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_catalog_foreshortening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_catalog_foreshortening`
--

LOCK TABLES `eqt_catalog_foreshortening` WRITE;
/*!40000 ALTER TABLE `eqt_catalog_foreshortening` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_catalog_foreshortening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_catalog_image`
--

DROP TABLE IF EXISTS `eqt_catalog_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_catalog_image` (
  `emplacement_id` int(11) NOT NULL,
  `foreshortening_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `is_serie_main` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`emplacement_id`,`foreshortening_id`),
  KEY `eqt_fk_catalog_image_foreshortening` (`foreshortening_id`),
  CONSTRAINT `eqt_fk_catalog_image_emplacement` FOREIGN KEY (`emplacement_id`) REFERENCES `eqt_catalog_emplacement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_catalog_image_foreshortening` FOREIGN KEY (`foreshortening_id`) REFERENCES `eqt_catalog_foreshortening` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_catalog_image`
--

LOCK TABLES `eqt_catalog_image` WRITE;
/*!40000 ALTER TABLE `eqt_catalog_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_catalog_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_color`
--

DROP TABLE IF EXISTS `eqt_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `common_color_id` int(11) DEFAULT NULL,
  `rgb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_color_model` (`model_id`),
  KEY `eqt_fk_color_common_color` (`common_color_id`),
  CONSTRAINT `eqt_fk_color_common_color` FOREIGN KEY (`common_color_id`) REFERENCES `eqt_color` (`id`),
  CONSTRAINT `eqt_fk_color_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11374 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_color`
--

LOCK TABLES `eqt_color` WRITE;
/*!40000 ALTER TABLE `eqt_color` DISABLE KEYS */;
INSERT INTO `eqt_color` VALUES (1,NULL,1,NULL,'','1','2016-11-01 15:11:16','2017-10-05 10:59:05'),(2,NULL,2,NULL,'','2','2016-11-01 15:11:16','2017-10-05 10:59:05');
/*!40000 ALTER TABLE `eqt_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_equipment`
--

DROP TABLE IF EXISTS `eqt_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `series_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `archive_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tech_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_equipment_model` (`model_id`),
  KEY `eqt_fk_equipment_series` (`series_id`),
  CONSTRAINT `eqt_fk_equipment_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_equipment_series` FOREIGN KEY (`series_id`) REFERENCES `car_serie` (`id_car_serie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6954 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_equipment`
--

LOCK TABLES `eqt_equipment` WRITE;
/*!40000 ALTER TABLE `eqt_equipment` DISABLE KEYS */;
INSERT INTO `eqt_equipment` VALUES (1,1,1,'1',NULL,NULL,NULL,1,'2016-11-01 15:07:22','2017-02-17 10:25:16',NULL),(2,1,1,'2',NULL,NULL,NULL,3,'2016-11-01 15:07:22','2017-02-17 10:25:16',NULL),(3,2,2,'3',NULL,NULL,NULL,1,'2016-11-01 15:07:22','2017-02-17 10:25:16',NULL),(4,2,2,'4',NULL,NULL,NULL,3,'2016-11-01 15:07:22','2017-02-17 10:25:16',NULL);
/*!40000 ALTER TABLE `eqt_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_image`
--

DROP TABLE IF EXISTS `eqt_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serie_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_main` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_image_model` (`model_id`),
  KEY `eqt_fk_image_color` (`color_id`),
  KEY `eqt_fk_image_serie` (`serie_id`),
  CONSTRAINT `eqt_fk_image_color` FOREIGN KEY (`color_id`) REFERENCES `eqt_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_image_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_image_serie` FOREIGN KEY (`serie_id`) REFERENCES `car_serie` (`id_car_serie`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_image`
--

LOCK TABLES `eqt_image` WRITE;
/*!40000 ALTER TABLE `eqt_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_migration`
--

DROP TABLE IF EXISTS `eqt_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_migration`
--

LOCK TABLES `eqt_migration` WRITE;
/*!40000 ALTER TABLE `eqt_migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_model_option`
--

DROP TABLE IF EXISTS `eqt_model_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_model_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `model_option_tag_id` int(11) DEFAULT NULL,
  `name` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_model_option_model` (`model_id`),
  KEY `eqt_fk_model_option_option_group` (`option_group_id`),
  KEY `eqt_fk_model_option_model_option_tag` (`model_option_tag_id`),
  CONSTRAINT `eqt_fk_model_option_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  CONSTRAINT `eqt_fk_model_option_model_option_tag` FOREIGN KEY (`model_option_tag_id`) REFERENCES `eqt_model_option_tag` (`id`),
  CONSTRAINT `eqt_fk_model_option_option_group` FOREIGN KEY (`option_group_id`) REFERENCES `eqt_option_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73970 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_model_option`
--

LOCK TABLES `eqt_model_option` WRITE;
/*!40000 ALTER TABLE `eqt_model_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_model_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_model_option_tag`
--

DROP TABLE IF EXISTS `eqt_model_option_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_model_option_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_model_option_tag`
--

LOCK TABLES `eqt_model_option_tag` WRITE;
/*!40000 ALTER TABLE `eqt_model_option_tag` DISABLE KEYS */;
INSERT INTO `eqt_model_option_tag` VALUES (1,1,'1');
/*!40000 ALTER TABLE `eqt_model_option_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_offer`
--

DROP TABLE IF EXISTS `eqt_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `body_id` int(11) DEFAULT NULL,
  `modification_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `skin_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` decimal(19,4) DEFAULT NULL,
  `additions_cost` decimal(19,4) DEFAULT NULL,
  `discount` decimal(19,4) DEFAULT NULL,
  `trade_in_cost` decimal(19,4) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_offer_brand` (`brand_id`),
  KEY `eqt_fk_offer_model` (`model_id`),
  KEY `eqt_fk_offer_body` (`body_id`),
  KEY `eqt_fk_offer_modification` (`modification_id`),
  KEY `eqt_fk_offer_color` (`color_id`),
  KEY `eqt_fk_offer_skin` (`skin_id`),
  KEY `eqt_fk_offer_equipment` (`equipment_id`),
  CONSTRAINT `eqt_fk_offer_body` FOREIGN KEY (`body_id`) REFERENCES `bodies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_color` FOREIGN KEY (`color_id`) REFERENCES `eqt_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_equipment` FOREIGN KEY (`equipment_id`) REFERENCES `eqt_equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_modification` FOREIGN KEY (`modification_id`) REFERENCES `car_modification` (`id_car_modification`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_offer_skin` FOREIGN KEY (`skin_id`) REFERENCES `eqt_skin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_offer`
--

LOCK TABLES `eqt_offer` WRITE;
/*!40000 ALTER TABLE `eqt_offer` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_option`
--

DROP TABLE IF EXISTS `eqt_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_id` int(11) NOT NULL,
  `model_option_id` int(11) NOT NULL,
  `name` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `option_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_option_equipment` (`equipment_id`),
  KEY `eqt_fk_option_option_group` (`option_group_id`),
  KEY `eqt_fk_option_model_option` (`model_option_id`),
  CONSTRAINT `eqt_fk_option_equipment` FOREIGN KEY (`equipment_id`) REFERENCES `eqt_equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_option_model_option` FOREIGN KEY (`model_option_id`) REFERENCES `eqt_model_option` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eqt_fk_option_option_group` FOREIGN KEY (`option_group_id`) REFERENCES `eqt_option_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=329730 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_option`
--

LOCK TABLES `eqt_option` WRITE;
/*!40000 ALTER TABLE `eqt_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `eqt_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_option_group`
--

DROP TABLE IF EXISTS `eqt_option_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_option_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_option_group_brand` (`brand_id`),
  CONSTRAINT `eqt_fk_option_group_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=942 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_option_group`
--

LOCK TABLES `eqt_option_group` WRITE;
/*!40000 ALTER TABLE `eqt_option_group` DISABLE KEYS */;
INSERT INTO `eqt_option_group` VALUES (1,1,'1','2017-12-05 21:01:03','2017-12-05 21:01:12');
/*!40000 ALTER TABLE `eqt_option_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eqt_skin`
--

DROP TABLE IF EXISTS `eqt_skin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eqt_skin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `common_skin_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eqt_fk_skin_model` (`model_id`),
  KEY `eqt_fk_skin_common_skin` (`common_skin_id`),
  CONSTRAINT `eqt_fk_skin_common_skin` FOREIGN KEY (`common_skin_id`) REFERENCES `eqt_skin` (`id`),
  CONSTRAINT `eqt_fk_skin_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2622 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eqt_skin`
--

LOCK TABLES `eqt_skin` WRITE;
/*!40000 ALTER TABLE `eqt_skin` DISABLE KEYS */;
INSERT INTO `eqt_skin` VALUES (1,1,NULL,'1','1','2017-11-28 18:40:00','2017-11-28 18:40:05'),(2,2,NULL,NULL,'2','2017-11-28 18:40:29','2017-11-28 18:40:32');
/*!40000 ALTER TABLE `eqt_skin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `federal_districts`
--

DROP TABLE IF EXISTS `federal_districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `federal_districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `federal_districts`
--

LOCK TABLES `federal_districts` WRITE;
/*!40000 ALTER TABLE `federal_districts` DISABLE KEYS */;
INSERT INTO `federal_districts` VALUES (1,'1');
/*!40000 ALTER TABLE `federal_districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_year`
--

DROP TABLE IF EXISTS `model_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `is_recent` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_model_year` (`model_id`,`year`),
  CONSTRAINT `fk_model_year_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_year`
--

LOCK TABLES `model_year` WRITE;
/*!40000 ALTER TABLE `model_year` DISABLE KEYS */;
INSERT INTO `model_year` VALUES (1,1,1,1,0),(2,1,2,0,0),(3,2,3,1,0),(4,2,4,0,0);
/*!40000 ALTER TABLE `model_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `models` (
  `brand_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tradein_code` varchar(255) DEFAULT NULL,
  `is_recent` tinyint(1) NOT NULL DEFAULT '0',
  `dealerpoint_code` varchar(255) DEFAULT NULL,
  `ord` int(11) NOT NULL,
  `ecm_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_commercial` tinyint(1) NOT NULL,
  `origin_id` int(11) DEFAULT NULL COMMENT 'ссылка на таблицу eqt_car_model',
  PRIMARY KEY (`id`),
  KEY `brand_id_is_recent` (`brand_id`,`is_recent`)
) ENGINE=InnoDB AUTO_INCREMENT=8854 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,1,'1','1',1,NULL,0,NULL,0,0,1425),(1,2,'2','2',0,NULL,0,NULL,0,0,1427),(1,3,'3','3',0,NULL,0,NULL,1,0,1427),(1,4,'4','4',1,NULL,0,NULL,1,0,1427);
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models_bodies`
--

DROP TABLE IF EXISTS `models_bodies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `models_bodies` (
  `model_id` int(11) NOT NULL,
  `body_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(64) NOT NULL,
  PRIMARY KEY (`model_id`,`body_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models_bodies`
--

LOCK TABLES `models_bodies` WRITE;
/*!40000 ALTER TABLE `models_bodies` DISABLE KEYS */;
/*!40000 ALTER TABLE `models_bodies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_public` datetime DEFAULT NULL,
  `tags_bitmap` bigint(20) DEFAULT '0' COMMENT 'Битовая маска назначенных тэгов (см. класс appmodelsNewsTag)',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `okopf`
--

DROP TABLE IF EXISTS `okopf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `okopf` (
  `code` int(11) unsigned NOT NULL,
  `version` enum('1999','2007','2012') NOT NULL,
  `name` varchar(255) NOT NULL,
  UNIQUE KEY `code_version` (`code`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `okopf`
--

LOCK TABLES `okopf` WRITE;
/*!40000 ALTER TABLE `okopf` DISABLE KEYS */;
/*!40000 ALTER TABLE `okopf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `okved`
--

DROP TABLE IF EXISTS `okved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `okved` (
  `code` int(10) unsigned NOT NULL,
  `version` enum('2001') NOT NULL,
  `name` varchar(255) NOT NULL,
  UNIQUE KEY `code_version` (`code`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `okved`
--

LOCK TABLES `okved` WRITE;
/*!40000 ALTER TABLE `okved` DISABLE KEYS */;
/*!40000 ALTER TABLE `okved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `old_models_map`
--

DROP TABLE IF EXISTS `old_models_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `old_models_map` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) unsigned NOT NULL,
  `new_model_id` int(11) DEFAULT NULL,
  `new_body_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `old_models_map`
--

LOCK TABLES `old_models_map` WRITE;
/*!40000 ALTER TABLE `old_models_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `old_models_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_types`
--

DROP TABLE IF EXISTS `order_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_types` (
  `code` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ord` int(11) NOT NULL,
  UNIQUE KEY `idx` (`code`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_types`
--

LOCK TABLES `order_types` WRITE;
/*!40000 ALTER TABLE `order_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `federal_district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `federal_district_id` (`federal_district_id`),
  CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regions_ibfk_2` FOREIGN KEY (`federal_district_id`) REFERENCES `federal_districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,1,1,'1'),(2,1,1,'2');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slmi_models`
--

DROP TABLE IF EXISTS `slmi_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slmi_models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model_id` int(11) unsigned DEFAULT NULL,
  `body_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slmi_models`
--

LOCK TABLES `slmi_models` WRITE;
/*!40000 ALTER TABLE `slmi_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `slmi_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sources`
--

DROP TABLE IF EXISTS `sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sources`
--

LOCK TABLES `sources` WRITE;
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT INTO `sources` VALUES (1,'1',NULL),(2,'2',1),(3,'3',2),(4,'4',NULL),(5,'5',4);
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stat_models`
--

DROP TABLE IF EXISTS `stat_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stat_models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ord` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_idx` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stat_models`
--

LOCK TABLES `stat_models` WRITE;
/*!40000 ALTER TABLE `stat_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `stat_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `status_code` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status_ord` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  UNIQUE KEY `status_code` (`status_code`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `plainPassword` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('reference:guest','reference:admin','reference:manager','reference:user') NOT NULL,
  `photo` varchar(2048) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-updated` (`updatedAt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `maintenance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-06 15:56:45
