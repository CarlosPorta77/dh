-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.10.10    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` double(5,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `discount` double(5,2) NOT NULL DEFAULT '0.00',
  `notes` text CHARACTER SET utf8mb4,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_details_cart_id_foreign` (`cart_id`),
  KEY `cart_details_product_id_foreign` (`product_id`),
  CONSTRAINT `cart_details_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  CONSTRAINT `cart_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_details`
--

LOCK TABLES `cart_details` WRITE;
/*!40000 ALTER TABLE `cart_details` DISABLE KEYS */;
INSERT INTO `cart_details` VALUES (20,1,1,'',4.00,161.00,0.00,'','2017-11-24 02:16:23','2017-11-24 02:16:23');
/*!40000 ALTER TABLE `cart_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_date` datetime DEFAULT NULL,
  `estimate_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,NULL,NULL,NULL,'Active',1,NULL,NULL,'2017-11-23 14:53:42','2017-11-23 14:53:42');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orden` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,10,'Aperitivos','Aperitivos',NULL,'2017-11-23 12:13:52','2017-11-23 12:13:52'),(2,20,'Ceviches','Pescados y mariscos marinados en cítricos',NULL,'2017-11-23 12:13:52','2017-11-23 12:13:52'),(3,30,'Platos calientes','Platos calientes',NULL,'2017-11-23 12:13:53','2017-11-23 12:13:53'),(4,40,'Platos gourmet','Platos gourmet',NULL,'2017-11-23 12:13:53','2017-11-23 12:13:53'),(5,50,'Tempura','Tempura',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(6,60,'Maki','Maki',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(7,70,'Rolls clásicos','Rolls clásicos',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(8,80,'Rolls especiales','Rolls especiales',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(9,90,'Geishas','Arrolladitos de salmón sin arroz',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(10,100,'Temakis','Cono de alga nori relleno de arroz',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(11,110,'Niguiri','Pescados sobre canapé de arroz',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(12,120,'Sashimi','Fetas de pescado sin cocción',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(13,130,'Tiraditos','Finas fetas de pescado con aderezos',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(14,140,'Combinados ','Combinados de rolls/sushi/sashimi',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(15,150,'Promociones','Promociones',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(16,160,'Bebidas','Bebidas',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(17,170,'Postres','Postres',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54'),(18,180,'Extras','Extras',NULL,'2017-11-23 12:13:54','2017-11-23 12:13:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (73,'2014_10_12_000000_create_users_table',1),(74,'2014_10_12_100000_create_password_resets_table',1),(75,'2017_11_19_053645_add_fields_users_table',1),(76,'2017_11_19_165041_create_categories_table',1),(77,'2017_11_19_170242_create_products_table',1),(78,'2017_11_19_211941_create_product_images_table',1),(83,'2017_11_21_122522_create_carts_table',2),(84,'2017_11_21_122613_create_cart_details_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
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
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (16,'https://lorempixel.com/600/400/?54462',0,6,'2017-11-23 12:14:05','2017-11-23 23:16:03'),(17,'https://lorempixel.com/600/400/?71544',1,6,'2017-11-23 12:14:05','2017-11-23 23:16:03'),(18,'https://lorempixel.com/600/400/?45594',0,6,'2017-11-23 12:14:06','2017-11-23 23:16:03'),(19,'https://lorempixel.com/600/400/?71729',0,7,'2017-11-23 12:14:06','2017-11-23 12:14:06'),(20,'https://lorempixel.com/600/400/?75357',0,7,'2017-11-23 12:14:07','2017-11-23 12:14:07'),(21,'https://lorempixel.com/600/400/?44853',0,7,'2017-11-23 12:14:07','2017-11-23 12:14:07'),(22,'https://lorempixel.com/600/400/?35536',0,8,'2017-11-23 12:14:08','2017-11-23 12:14:08'),(23,'https://lorempixel.com/600/400/?65731',0,8,'2017-11-23 12:14:08','2017-11-23 12:14:08'),(24,'https://lorempixel.com/600/400/?77340',0,8,'2017-11-23 12:14:09','2017-11-23 12:14:09'),(31,'https://lorempixel.com/600/400/?20646',0,11,'2017-11-23 12:14:16','2017-11-23 12:14:16'),(32,'https://lorempixel.com/600/400/?82359',0,11,'2017-11-23 12:14:16','2017-11-23 12:14:16'),(33,'https://lorempixel.com/600/400/?34183',0,11,'2017-11-23 12:14:17','2017-11-23 12:14:17'),(34,'https://lorempixel.com/600/400/?40680',0,12,'2017-11-23 12:14:17','2017-11-23 12:14:17'),(35,'https://lorempixel.com/600/400/?79358',0,12,'2017-11-23 12:14:18','2017-11-23 12:14:18'),(36,'https://lorempixel.com/600/400/?56885',0,12,'2017-11-23 12:14:18','2017-11-23 12:14:18'),(37,'https://lorempixel.com/600/400/?84236',0,13,'2017-11-23 12:14:19','2017-11-23 12:14:19'),(38,'https://lorempixel.com/600/400/?45153',0,13,'2017-11-23 12:14:19','2017-11-23 12:14:19'),(39,'https://lorempixel.com/600/400/?70473',0,13,'2017-11-23 12:14:19','2017-11-23 12:14:19'),(40,'https://lorempixel.com/600/400/?48353',0,14,'2017-11-23 12:14:20','2017-11-23 12:14:20'),(41,'https://lorempixel.com/600/400/?42644',0,14,'2017-11-23 12:14:20','2017-11-23 12:14:20'),(42,'https://lorempixel.com/600/400/?96650',0,14,'2017-11-23 12:14:21','2017-11-23 12:14:21'),(43,'https://lorempixel.com/600/400/?49643',0,15,'2017-11-23 12:14:21','2017-11-23 12:14:21'),(44,'https://lorempixel.com/600/400/?78014',0,15,'2017-11-23 12:14:22','2017-11-23 12:14:22'),(45,'https://lorempixel.com/600/400/?27741',0,15,'2017-11-23 12:14:22','2017-11-23 12:14:22'),(46,'https://lorempixel.com/600/400/?54616',0,16,'2017-11-23 12:14:23','2017-11-23 12:14:23'),(47,'https://lorempixel.com/600/400/?93093',0,16,'2017-11-23 12:14:23','2017-11-23 12:14:23'),(48,'https://lorempixel.com/600/400/?77687',0,16,'2017-11-23 12:14:24','2017-11-23 12:14:24'),(49,'https://lorempixel.com/600/400/?78772',0,17,'2017-11-23 12:14:28','2017-11-23 12:14:28'),(50,'https://lorempixel.com/600/400/?57265',0,17,'2017-11-23 12:14:28','2017-11-23 12:14:28'),(51,'https://lorempixel.com/600/400/?21743',0,17,'2017-11-23 12:14:29','2017-11-23 12:14:29'),(52,'https://lorempixel.com/600/400/?12260',0,18,'2017-11-23 12:14:29','2017-11-23 12:14:29'),(53,'https://lorempixel.com/600/400/?45447',0,18,'2017-11-23 12:14:30','2017-11-23 12:14:30'),(54,'https://lorempixel.com/600/400/?20660',0,18,'2017-11-23 12:14:30','2017-11-23 12:14:30'),(55,'https://lorempixel.com/600/400/?34293',0,19,'2017-11-23 12:14:31','2017-11-23 12:14:31'),(56,'https://lorempixel.com/600/400/?56411',0,19,'2017-11-23 12:14:31','2017-11-23 12:14:31'),(57,'https://lorempixel.com/600/400/?14928',0,19,'2017-11-23 12:14:32','2017-11-23 12:14:32'),(58,'https://lorempixel.com/600/400/?67786',0,20,'2017-11-23 12:14:32','2017-11-23 12:14:32'),(59,'https://lorempixel.com/600/400/?73021',0,20,'2017-11-23 12:14:33','2017-11-23 12:14:33'),(60,'https://lorempixel.com/600/400/?94129',0,20,'2017-11-23 12:14:33','2017-11-23 12:14:33'),(61,'https://lorempixel.com/600/400/?25330',0,21,'2017-11-23 12:14:34','2017-11-23 12:14:34'),(62,'https://lorempixel.com/600/400/?29793',0,21,'2017-11-23 12:14:34','2017-11-23 12:14:34'),(63,'https://lorempixel.com/600/400/?48022',0,21,'2017-11-23 12:14:34','2017-11-23 12:14:34'),(64,'https://lorempixel.com/600/400/?57650',0,22,'2017-11-23 12:14:35','2017-11-23 12:14:35'),(65,'https://lorempixel.com/600/400/?78241',0,22,'2017-11-23 12:14:35','2017-11-23 12:14:35'),(66,'https://lorempixel.com/600/400/?66054',0,22,'2017-11-23 12:14:36','2017-11-23 12:14:36'),(67,'https://lorempixel.com/600/400/?67692',0,23,'2017-11-23 12:14:36','2017-11-23 12:14:36'),(68,'https://lorempixel.com/600/400/?34366',0,23,'2017-11-23 12:14:37','2017-11-23 12:14:37'),(69,'https://lorempixel.com/600/400/?32852',0,23,'2017-11-23 12:14:37','2017-11-23 12:14:37'),(70,'https://lorempixel.com/600/400/?20944',0,24,'2017-11-23 12:14:38','2017-11-23 12:14:38'),(71,'https://lorempixel.com/600/400/?78530',0,24,'2017-11-23 12:14:38','2017-11-23 12:14:38'),(72,'https://lorempixel.com/600/400/?47064',0,24,'2017-11-23 12:14:39','2017-11-23 12:14:39'),(73,'https://lorempixel.com/600/400/?88517',0,25,'2017-11-23 12:14:43','2017-11-23 12:14:43'),(74,'https://lorempixel.com/600/400/?73671',0,25,'2017-11-23 12:14:43','2017-11-23 12:14:43'),(75,'https://lorempixel.com/600/400/?44910',0,25,'2017-11-23 12:14:44','2017-11-23 12:14:44'),(76,'https://lorempixel.com/600/400/?57202',0,26,'2017-11-23 12:14:44','2017-11-23 12:14:44'),(77,'https://lorempixel.com/600/400/?25352',0,26,'2017-11-23 12:14:45','2017-11-23 12:14:45'),(78,'https://lorempixel.com/600/400/?36584',0,26,'2017-11-23 12:14:45','2017-11-23 12:14:45'),(79,'https://lorempixel.com/600/400/?88534',0,27,'2017-11-23 12:14:46','2017-11-23 12:14:46'),(80,'https://lorempixel.com/600/400/?32936',0,27,'2017-11-23 12:14:46','2017-11-23 12:14:46'),(81,'https://lorempixel.com/600/400/?74235',0,27,'2017-11-23 12:14:47','2017-11-23 12:14:47'),(82,'https://lorempixel.com/600/400/?12757',0,28,'2017-11-23 12:14:47','2017-11-23 12:14:47'),(83,'https://lorempixel.com/600/400/?80442',0,28,'2017-11-23 12:14:48','2017-11-23 12:14:48'),(84,'https://lorempixel.com/600/400/?18690',0,28,'2017-11-23 12:14:48','2017-11-23 12:14:48'),(85,'https://lorempixel.com/600/400/?95753',0,29,'2017-11-23 12:14:49','2017-11-23 12:14:49'),(86,'https://lorempixel.com/600/400/?77567',0,29,'2017-11-23 12:14:49','2017-11-23 12:14:49'),(87,'https://lorempixel.com/600/400/?73195',0,29,'2017-11-23 12:14:50','2017-11-23 12:14:50'),(88,'https://lorempixel.com/600/400/?49871',0,30,'2017-11-23 12:14:50','2017-11-23 12:14:50'),(89,'https://lorempixel.com/600/400/?43991',0,30,'2017-11-23 12:14:50','2017-11-23 12:14:50'),(90,'https://lorempixel.com/600/400/?54497',0,30,'2017-11-23 12:14:51','2017-11-23 12:14:51'),(91,'https://lorempixel.com/600/400/?94701',0,31,'2017-11-23 12:14:51','2017-11-23 12:14:51'),(92,'https://lorempixel.com/600/400/?49965',0,31,'2017-11-23 12:14:52','2017-11-23 12:14:52'),(93,'https://lorempixel.com/600/400/?23607',0,31,'2017-11-23 12:14:52','2017-11-23 12:14:52'),(94,'https://lorempixel.com/600/400/?58173',0,32,'2017-11-23 12:14:53','2017-11-23 12:14:53'),(95,'https://lorempixel.com/600/400/?42085',0,32,'2017-11-23 12:14:53','2017-11-23 12:14:53'),(96,'https://lorempixel.com/600/400/?16789',0,32,'2017-11-23 12:14:54','2017-11-23 12:14:54'),(97,'https://lorempixel.com/600/400/?20123',0,33,'2017-11-23 12:14:58','2017-11-23 12:14:58'),(98,'https://lorempixel.com/600/400/?93630',0,33,'2017-11-23 12:14:58','2017-11-23 12:14:58'),(99,'https://lorempixel.com/600/400/?13165',0,33,'2017-11-23 12:14:59','2017-11-23 12:14:59'),(100,'https://lorempixel.com/600/400/?39827',0,34,'2017-11-23 12:14:59','2017-11-23 12:14:59'),(101,'https://lorempixel.com/600/400/?25333',0,34,'2017-11-23 12:15:00','2017-11-23 12:15:00'),(102,'https://lorempixel.com/600/400/?11144',0,34,'2017-11-23 12:15:00','2017-11-23 12:15:00'),(103,'https://lorempixel.com/600/400/?27314',0,35,'2017-11-23 12:15:01','2017-11-23 12:15:01'),(104,'https://lorempixel.com/600/400/?97636',0,35,'2017-11-23 12:15:01','2017-11-23 12:15:01'),(105,'https://lorempixel.com/600/400/?94474',0,35,'2017-11-23 12:15:02','2017-11-23 12:15:02'),(106,'https://lorempixel.com/600/400/?81540',0,36,'2017-11-23 12:15:02','2017-11-23 12:15:02'),(107,'https://lorempixel.com/600/400/?86103',0,36,'2017-11-23 12:15:03','2017-11-23 12:15:03'),(108,'https://lorempixel.com/600/400/?72990',0,36,'2017-11-23 12:15:03','2017-11-23 12:15:03'),(109,'https://lorempixel.com/600/400/?15116',0,37,'2017-11-23 12:15:04','2017-11-23 12:15:04'),(110,'https://lorempixel.com/600/400/?71728',0,37,'2017-11-23 12:15:04','2017-11-23 12:15:04'),(111,'https://lorempixel.com/600/400/?98848',0,37,'2017-11-23 12:15:05','2017-11-23 12:15:05'),(112,'https://lorempixel.com/600/400/?18117',0,38,'2017-11-23 12:15:05','2017-11-23 12:15:05'),(113,'https://lorempixel.com/600/400/?79054',0,38,'2017-11-23 12:15:06','2017-11-23 12:15:06'),(114,'https://lorempixel.com/600/400/?58091',0,38,'2017-11-23 12:15:06','2017-11-23 12:15:06'),(115,'https://lorempixel.com/600/400/?71344',0,39,'2017-11-23 12:15:07','2017-11-23 12:15:07'),(116,'https://lorempixel.com/600/400/?85008',0,39,'2017-11-23 12:15:07','2017-11-23 12:15:07'),(117,'https://lorempixel.com/600/400/?93861',0,39,'2017-11-23 12:15:07','2017-11-23 12:15:07'),(118,'https://lorempixel.com/600/400/?74315',0,40,'2017-11-23 12:15:08','2017-11-23 12:15:08'),(119,'https://lorempixel.com/600/400/?90804',0,40,'2017-11-23 12:15:08','2017-11-23 12:15:08'),(120,'https://lorempixel.com/600/400/?99038',0,40,'2017-11-23 12:15:09','2017-11-23 12:15:09'),(125,'5a16cea99022cArrolladitos Primavera 07.JPG',0,1,'2017-11-23 13:35:38','2017-11-23 13:36:50'),(126,'5a16ceb9a7feeArrolladitos Primavera 08.JPG',1,1,'2017-11-23 13:35:54','2017-11-23 13:36:51'),(127,'5a16cee563997Arrolladitos Primavera 02.JPG',0,1,'2017-11-23 13:36:37','2017-11-23 13:36:50'),(128,'5a16f4b9ccc69Gomae-800x533[1].jpg',0,2,'2017-11-23 16:18:01','2017-11-23 16:18:01'),(129,'5a16f75842859Kara-ague-800x533[1].jpg',0,3,'2017-11-23 16:29:12','2017-11-23 16:29:12'),(130,'5a16f82c40dddGyoza-800x533[1].jpg',0,4,'2017-11-23 16:32:44','2017-11-23 16:32:44'),(131,'5a16f92f1d73cYakitori 06.JPG',0,5,'2017-11-23 16:37:03','2017-11-23 16:37:03'),(132,'5a16f93f2bbb8Yakitori 11.JPG',0,5,'2017-11-23 16:37:19','2017-11-23 16:37:19'),(133,'5a16f9617bbfbYakitori 24.JPG',0,5,'2017-11-23 16:37:54','2017-11-23 16:37:54');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `long_description` text CHARACTER SET utf8mb4,
  `price` double(12,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Harumaki de vegetales','Arrolladitos primavera de vegetales','Harumaki de vegetales. Nuestra versión de los clásicos arrolladitos primavera hechos con materia prima de primera calidad acompañados c/salsa de tamarindo (agridulce).',161.00,25,1,'2017-11-23 12:13:54','2017-11-23 12:30:25'),(2,'Gomae','Espinacas cocidas con sésamo.','Espinacas cocidas con salsa de soja y sésamo, levemente dulce.',141.00,18,1,'2017-11-23 12:13:55','2017-11-23 16:24:53'),(3,'Kara-ague de pollo','Pollo soufflé macerado con salsa de soja.','Pollo soufflé macerado con salsa de soja y jengibre con semillas de sésamo, acompañado con salsa de mayonesa y wasabi.',231.00,37,1,'2017-11-23 12:13:55','2017-11-23 16:27:34'),(4,'Gyoza de cerdo','Empanaditas de cerdo cocidas al vapor con salsa de soja y jengibre.  (10u.)',NULL,176.00,33,1,'2017-11-23 12:13:55','2017-11-23 16:35:58'),(5,'Yakitori','Brochettes de pollo caramelizadas c/salsa teriyaki, acompañadas con arroz c/sésamo (3 palitos).',NULL,238.00,11,1,'2017-11-23 12:13:56','2017-11-23 16:35:27'),(6,'Iste voluptates id accusamus excepturi','Saepe dolorem quia quos et nesciunt ducimus.','Hic aut veniam ex veritatis voluptates. Placeat omnis consequatur ipsam et officiis.',117.29,30,1,'2017-11-23 12:13:56','2017-11-23 12:13:56'),(7,'Architecto non dolores incidunt','Nesciunt vel qui porro non est perspiciatis at voluptates quia qui.','Neque ipsam mollitia aut dolorem. Laudantium autem sit eum consequuntur aut dolor. Eos possimus porro est quae iusto aliquid quidem. Suscipit aspernatur et cum praesentium omnis minus.',29.08,24,1,'2017-11-23 12:13:57','2017-11-23 12:13:57'),(8,'Vel ut nisi','Excepturi quasi totam ratione saepe quis voluptates quidem itaque impedit.','Et repudiandae nostrum rerum accusantium maxime odio est nostrum. Aut sint esse assumenda fugit. Sit et rerum nisi error odio sequi.',70.44,46,1,'2017-11-23 12:13:57','2017-11-23 12:13:57'),(11,'Tempora et voluptate','Illum tempora dolor voluptate id fugiat soluta et eius minima.','Tempore non accusantium at. Quas aut quis perspiciatis hic incidunt. Fugit consequatur earum et ut enim ex ut.',82.17,44,2,'2017-11-23 12:14:10','2017-11-23 12:14:10'),(12,'Ipsam ut nemo rerum','Tenetur a esse suscipit facilis vel placeat quia qui in.','Beatae ducimus eos quidem impedit. Iure sit tempora quam voluptatem. Sed quibusdam maxime amet dignissimos et eos.',143.70,40,2,'2017-11-23 12:14:11','2017-11-23 12:14:11'),(13,'Ab eveniet necessitatibus omnis','Ea iusto consequatur et itaque corporis saepe unde dolor ea qui voluptatum esse dolorem.','Quos rerum perferendis quod ut et qui qui ut. Quae aut blanditiis corrupti veniam et qui et. Sed et est occaecati mollitia dolor impedit amet.',94.66,48,2,'2017-11-23 12:14:11','2017-11-23 12:14:11'),(14,'Culpa sit','Voluptas sed esse dolores molestias excepturi cum sapiente aut quas.','Et delectus doloremque a. Qui quaerat qui ut voluptatem quaerat voluptate. Impedit amet fugiat doloremque rerum. Quasi laudantium velit repudiandae molestiae ipsum.',67.12,43,2,'2017-11-23 12:14:12','2017-11-23 12:14:12'),(15,'Voluptatum corporis praesentium eos','In nam hic earum consectetur et dolore aliquid commodi doloribus laboriosam temporibus aliquam.','Similique voluptatibus omnis velit omnis autem qui iusto. Maxime nihil deserunt libero qui quam. Necessitatibus maiores facere quos delectus voluptatem vel consequatur.',114.87,12,2,'2017-11-23 12:14:12','2017-11-23 12:14:12'),(16,'Laborum qui ratione ad velit','Atque repellendus ut consequatur aut quisquam commodi asperiores delectus at explicabo.','Fuga similique rerum sint nesciunt ut non. Necessitatibus perspiciatis unde voluptatem enim id cumque. Eos sunt qui qui eum. Vel dolor magni neque atque.',116.77,19,2,'2017-11-23 12:14:12','2017-11-23 12:14:12'),(17,'Voluptas incidunt laudantium veritatis','Enim fugit et maiores eligendi illum rerum quia sequi ut culpa et at non.','Beatae consectetur quia quos voluptatem sit maxime animi assumenda. Est sed iusto voluptas aut autem quia.',145.69,41,3,'2017-11-23 12:14:24','2017-11-23 12:14:24'),(18,'Consectetur et aut','Voluptas sint ratione laudantium sint quae officia ut unde aliquid.','Non nobis reiciendis in at molestiae. Minima atque impedit maiores. Accusantium excepturi sequi rerum facere. Magnam quod perferendis hic quaerat tempora voluptas.',113.45,32,3,'2017-11-23 12:14:25','2017-11-23 12:14:25'),(19,'Repellendus aspernatur repudiandae','Distinctio rerum ullam vel dolor ut corporis odit impedit aut inventore.','Eligendi aut ut et assumenda voluptatem est. Qui modi dolor sunt totam delectus voluptas.',5.92,32,3,'2017-11-23 12:14:25','2017-11-23 12:14:25'),(20,'Quae earum exercitationem quia','Ea repellendus ullam rem doloribus consequuntur cumque qui reiciendis veniam et excepturi.','Odio quis possimus nobis dignissimos. Omnis accusamus aut magnam et. Quia consequuntur recusandae quis et odio in impedit animi.',32.94,25,3,'2017-11-23 12:14:26','2017-11-23 12:14:26'),(21,'Voluptate quod','Et vel quos quia accusamus ipsum sunt.','Illum minus quas quisquam dolore asperiores aut quis. Dolor quo ut quaerat voluptatum quae accusantium. Adipisci sit quas facilis libero.',22.49,27,3,'2017-11-23 12:14:26','2017-11-23 12:14:26'),(22,'Nam ipsam ipsum','Maiores repellat perferendis delectus voluptatem asperiores molestiae sunt est quis labore magnam et dolor.','Sit voluptatum culpa pariatur natus nostrum quidem. Dicta nobis ipsam voluptas pariatur cupiditate. Perspiciatis libero consequuntur quibusdam atque eligendi esse iure ipsum.',146.51,34,3,'2017-11-23 12:14:27','2017-11-23 12:14:27'),(23,'Quos dolore qui quas','Dolorum aspernatur quo officia ab eum non.','In molestiae optio voluptates est omnis beatae. Voluptatem voluptatem eius quia ut sed adipisci. Nam omnis aut tempore. Exercitationem eos omnis ad quidem vel doloremque ipsum fuga.',130.71,37,3,'2017-11-23 12:14:27','2017-11-23 12:14:27'),(24,'Voluptas neque minima','Aliquid expedita similique incidunt facere earum quidem.','Aliquam quis ab culpa quis non reiciendis nam. Vel aut sapiente voluptatem ut. Id unde quo dolor quam occaecati minima magnam. Eveniet dicta eum asperiores illo quia deleniti sint.',80.87,45,3,'2017-11-23 12:14:27','2017-11-23 12:14:27'),(25,'Sit autem aut','Tempore sed esse neque voluptatem reprehenderit non aperiam.','Aliquid soluta possimus beatae sint quae omnis. Qui incidunt animi totam esse facilis dolore saepe. Architecto sed non corrupti et omnis.',72.57,41,4,'2017-11-23 12:14:39','2017-11-23 12:14:39'),(26,'Tempora aliquam itaque','Quia eum placeat reprehenderit laborum sed officiis autem.','Neque aut et sit sint quia laboriosam. Non et voluptatem cumque. Ad impedit facere ea porro expedita sapiente. Autem et fugiat beatae omnis ut.',73.86,10,4,'2017-11-23 12:14:40','2017-11-23 12:14:40'),(27,'Qui minima voluptas soluta','Quaerat libero eos libero quis aut doloribus.','Possimus non illum cupiditate enim. Vero adipisci rerum quo. Exercitationem officiis qui soluta sequi minima in. Maiores cum quia enim nobis.',69.82,29,4,'2017-11-23 12:14:40','2017-11-23 12:14:40'),(28,'Quia tenetur rerum','Dolores explicabo ullam amet sint quasi voluptatem.','Qui placeat soluta laborum id omnis. Consequatur tempore nemo quia facilis impedit. Sequi necessitatibus error ut beatae. Voluptatum eum commodi suscipit sunt qui et cupiditate.',130.33,11,4,'2017-11-23 12:14:41','2017-11-23 12:14:41'),(29,'Et aliquam sunt','Velit minima autem illum sapiente dolores voluptatibus quia porro nesciunt facilis et itaque.','Magnam laborum blanditiis cupiditate ex eum nostrum. Fugit perferendis neque et. Sed molestiae inventore pariatur dolores qui omnis animi. Quod quia et sint ipsam consequuntur ea.',36.18,47,4,'2017-11-23 12:14:41','2017-11-23 12:14:41'),(30,'Quo tenetur rerum libero','Id impedit dolorem labore molestiae nisi eligendi beatae qui rerum dolorum eum consequatur.','Consequatur repellendus quo sed consequatur. Veritatis a cum fugiat provident saepe ipsum aut. Omnis non iusto error provident.',133.97,25,4,'2017-11-23 12:14:42','2017-11-23 12:14:42'),(31,'Quos nisi voluptatem','Sunt voluptatum vel quia vel sed quia numquam aspernatur.','Ea quaerat quis voluptate similique minus ut atque error. In reiciendis minima soluta ipsa. Minus optio non eius perspiciatis quam. Ab sequi velit natus incidunt doloribus dolorem.',120.20,29,4,'2017-11-23 12:14:42','2017-11-23 12:14:42'),(32,'Qui distinctio corporis','Aut alias facilis reprehenderit sint minus dolorem sequi vitae aperiam fugit laudantium.','Qui sit voluptatem itaque repellat sunt. Nulla soluta aperiam rerum eaque repudiandae quam. Quo explicabo culpa sapiente quos soluta. Hic eum in qui quo expedita excepturi.',112.24,44,4,'2017-11-23 12:14:42','2017-11-23 12:14:42'),(33,'Qui fugiat ab molestiae','Qui magni voluptatem sed aperiam rem architecto earum nihil ullam cum accusantium.','Provident necessitatibus qui eos eos expedita. Odio vitae corrupti nihil. Ut ipsa dicta aliquam quis quia libero est. Quia accusamus rerum est. Dolore enim consequatur architecto eum dolorem quas.',60.32,30,5,'2017-11-23 12:14:54','2017-11-23 12:14:54'),(34,'Corrupti voluptas enim','Ullam et quia ut voluptas et doloremque vel asperiores.','Itaque esse labore voluptas quia aut deserunt. Soluta ipsum reiciendis molestiae sequi totam aut beatae. Ex rerum et officiis sunt magni ullam.',78.10,37,5,'2017-11-23 12:14:55','2017-11-23 12:14:55'),(35,'Quis nobis atque','Quo molestiae non facilis aut et repellat et omnis atque voluptas.','Perferendis dolore cum ut. Voluptatem maiores aut qui eum. Quas et maiores suscipit exercitationem.',30.01,26,5,'2017-11-23 12:14:55','2017-11-23 12:14:55'),(36,'Fugiat et','Consequatur suscipit adipisci quibusdam consectetur non ducimus.','Esse placeat ipsa odio blanditiis saepe. Qui eum non qui ut. Deserunt facere sed quasi ut aperiam.',95.75,18,5,'2017-11-23 12:14:56','2017-11-23 12:14:56'),(37,'Maiores mollitia itaque','Eos ut aut rerum officia voluptatem amet occaecati culpa est.','Totam dignissimos sunt beatae delectus vel cum id. Dolore facilis exercitationem sint sunt a eaque. Beatae alias est dolor minus.',23.23,21,5,'2017-11-23 12:14:56','2017-11-23 12:14:56'),(38,'Accusantium sunt ut illo','Minima ipsum totam iure neque aperiam reprehenderit doloribus.','Eveniet aliquam fuga totam placeat sit quasi. Praesentium enim maxime qui quas ea quisquam est nobis. Placeat voluptas hic explicabo quisquam doloremque.',118.03,50,5,'2017-11-23 12:14:57','2017-11-23 12:14:57'),(39,'Aut praesentium aut ut','Nostrum quibusdam fugiat nulla odit non optio perferendis sint magni molestiae non error quaerat.','Veniam ut iste tempora voluptas et est. Aliquam ut qui earum id aut quo. Rem nihil nemo et nam voluptatibus cum.',109.02,17,5,'2017-11-23 12:14:57','2017-11-23 12:14:57'),(40,'Quo sed','Quia qui aut voluptates ut nam sunt quaerat mollitia eveniet eaque ut cumque.','Consectetur temporibus dolore voluptatem doloribus earum molestiae sed. Dicta ratione exercitationem ratione ut inventore consequatur aliquid.',31.62,12,5,'2017-11-23 12:14:58','2017-11-23 12:14:58');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `land_phone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cel_phone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Norberto','info@nute.com.ar','$2y$10$sO7Nvb/Gr3QRWE2C2.0Tru0RKrdkPuMkNXPh437OC0pbbL1KKJpcS',1,NULL,'NV74lbhowHRsYrFCtQl5K0h7F3TAOfUkQsosLtN5qCW7yYTqvCyvXiOmhV1r','2017-11-23 12:13:51','2017-11-23 12:13:51','Trosman','4111-2222','15-3333-4444','Corrientes 5555 Piso 1 Dto 2','CABA'),(2,'Luz','lmfrancione@lmf.com.ar','$2y$10$UbjtMwO4/zCZYfPJXNak3.Pry1hHEKTKbEsYDXQVcvuX97RuYUL.O',0,NULL,NULL,'2017-11-23 12:13:51','2017-11-23 12:13:51','Francione','4444-5555','15-6666-7777','Juan B Justo 999 Piso 10 Dto B','CABA');
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

-- Dump completed on 2017-11-24 10:59:55
