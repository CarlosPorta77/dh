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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_details`
--

LOCK TABLES `cart_details` WRITE;
/*!40000 ALTER TABLE `cart_details` DISABLE KEYS */;
INSERT INTO `cart_details` VALUES (20,1,1,'',4.00,161.00,0.00,'','2017-11-24 02:16:23','2017-11-24 02:16:23'),(22,1,4,'',4.00,176.00,0.00,'','2017-11-25 15:06:13','2017-11-25 15:06:13'),(23,1,3,'',2.00,231.00,0.00,'','2017-11-25 15:24:17','2017-11-25 15:24:17'),(24,2,1,'',3.00,161.00,0.00,'','2017-11-25 21:55:55','2017-11-25 21:55:55'),(25,2,18,'',3.00,183.00,0.00,'','2017-11-27 03:04:54','2017-11-27 03:04:54'),(26,2,19,'',2.00,317.00,0.00,'','2017-11-27 03:34:25','2017-11-27 03:34:25'),(27,4,7,'',2.00,204.00,0.00,'','2017-11-27 17:09:37','2017-11-27 17:09:37'),(29,4,5,'',1.00,238.00,0.00,'','2017-11-27 17:11:07','2017-11-27 17:11:07'),(30,4,6,'',2.00,277.00,0.00,'','2017-11-27 17:12:45','2017-11-27 17:12:45'),(31,5,52,'',2.00,205.00,0.00,'','2017-11-27 19:42:00','2017-11-27 19:42:00'),(33,5,58,'',2.00,176.00,0.00,'','2017-11-27 19:42:45','2017-11-27 19:42:45'),(34,5,51,'',1.00,221.00,0.00,'','2017-11-27 19:45:14','2017-11-27 19:45:14'),(36,7,65,'',3.00,303.00,0.00,'','2017-11-27 20:24:54','2017-11-27 20:24:54'),(38,7,44,'',3.00,188.00,0.00,'','2017-11-27 20:26:14','2017-11-27 20:26:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,'2017-11-25 19:11:29',NULL,NULL,'Pending',1,'Diaz Velez 4421, 7° C','Sin wasabi, por favor!!!','2017-11-23 14:53:42','2017-11-25 19:11:29'),(2,'2017-11-27 06:15:08',NULL,NULL,'Pending',1,'Corrientes 1000 8° B',NULL,'2017-11-25 19:11:29','2017-11-27 06:15:08'),(3,NULL,NULL,NULL,'Active',1,NULL,NULL,'2017-11-27 06:15:08','2017-11-27 06:15:08'),(4,'2017-11-27 17:13:37',NULL,NULL,'Pending',2,'Julian Alvarez 1000 piso 8 dto C','Bien cocido por favor','2017-11-27 17:09:01','2017-11-27 17:13:37'),(5,'2017-11-27 19:47:40',NULL,NULL,'Pending',2,'Monroe 680','Sin picante.','2017-11-27 17:13:37','2017-11-27 19:47:40'),(6,NULL,NULL,NULL,'Active',2,NULL,NULL,'2017-11-27 19:47:40','2017-11-27 19:47:40'),(7,'2017-11-27 20:28:22',NULL,NULL,'Pending',3,'Posadas 123','Sin sal.','2017-11-27 20:23:41','2017-11-27 20:28:22'),(8,NULL,NULL,NULL,'Active',3,NULL,NULL,'2017-11-27 20:28:22','2017-11-27 20:28:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,10,'Aperitivos','Aperitivos','5a1b643b87dd6-Arrolladitos Primavera 07.JPG','2017-11-23 12:13:52','2017-11-27 01:02:52'),(2,20,'Ceviches','Pescados y mariscos marinados en cítricos','5a1b6a5320586-Ceviche-Peruano-01[1].jpg','2017-11-23 12:13:52','2017-11-27 01:28:51'),(3,30,'Platos calientes','Platos calientes','5a1b6afa9b6ab-Yakimeshi 12.JPG','2017-11-23 12:13:53','2017-11-27 01:31:39'),(4,40,'Platos gourmet','Platos gourmet','5a1b6b31b2892-Vieyras gratinadas 11.JPG','2017-11-23 12:13:53','2017-11-27 01:32:34'),(5,50,'Tempura','Tempura','5a1b6b5861d0a-Tempura de Calamares 07.JPG','2017-11-23 12:13:54','2017-11-27 01:33:13'),(6,60,'Maki','Maki','5a1b6b7bdaaf2-Maki de Salmon (M) 03.JPG','2017-11-23 12:13:54','2017-11-27 01:33:48'),(7,70,'Rolls clásicos','Rolls clásicos','5a1b6b9d3daf3-New York Roll (M) 03.JPG','2017-11-23 12:13:54','2017-11-27 01:34:21'),(8,80,'Rolls especiales','Rolls especiales','5a1b6bc6b4018-Crocante New York roll con Phila 12.JPG','2017-11-23 12:13:54','2017-11-27 01:35:03'),(9,90,'Geishas','Arrolladitos de salmón sin arroz','5a1b6d57c9387-Gueisha-lang-crocante-aji-amarillo-06[1].jpg','2017-11-23 12:13:54','2017-11-27 01:41:43'),(10,100,'Temakis','Cono de alga nori relleno de arroz','5a1b6d18602ca-Temaki de Salmon 03.jpg','2017-11-23 12:13:54','2017-11-27 01:40:40'),(11,110,'Niguiri','Pescados sobre canapé de arroz','5a1b6d9f48db1-Niguiri de Salmon (M) 10.JPG','2017-11-23 12:13:54','2017-11-27 01:42:55'),(12,120,'Sashimi','Fetas de pescado sin cocción','5a1b6dbd30e8c-Sashimi de Salmon 06.JPG','2017-11-23 12:13:54','2017-11-27 01:43:25'),(13,130,'Tiraditos','Finas fetas de pescado con aderezos','5a1b6de78b154-Tiradito-de-Salmon-(M)-08[1].jpg','2017-11-23 12:13:54','2017-11-27 01:44:07'),(14,140,'Combinados','Combinados de rolls/sushi/sashimi','5a1b6e0c34831-Combo7-800x533[1].jpg','2017-11-23 12:13:54','2017-11-27 01:44:44'),(15,150,'Promociones','Promociones','5a1b6e26b9892-ComboRollsEspeciales-800x533[1].jpg','2017-11-23 12:13:54','2017-11-27 01:45:10'),(16,160,'Bebidas','Bebidas','5a1b6fd90d74d-japanese-nama-beer-sapporo-yebisu-kirin[1].jpg','2017-11-23 12:13:54','2017-11-27 01:52:25'),(17,170,'Postres','Postres','5a1b6e8f2b905-recetas-cocina-japonesa-ingredientes-yokan[1].jpg','2017-11-23 12:13:54','2017-11-27 01:46:55'),(18,180,'Extras','Extras','5a1b6ed716493-wasabi-paste_3118859c[1].jpg','2017-11-23 12:13:54','2017-11-27 01:48:07');
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
INSERT INTO `password_resets` VALUES ('info@nute.com.ar','$2y$10$Xz7OZCwlx5Cbe/HcvV0YherMRXGjt/x3j0g6ndhZ1t4GSdUT/KpAe','2017-11-26 01:15:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (125,'5a16cea99022cArrolladitos Primavera 07.JPG',1,1,'2017-11-23 13:35:38','2017-11-25 14:20:25'),(128,'5a16f4b9ccc69Gomae-800x533[1].jpg',0,2,'2017-11-23 16:18:01','2017-11-23 16:18:01'),(129,'5a16f75842859Kara-ague-800x533[1].jpg',0,3,'2017-11-23 16:29:12','2017-11-23 16:29:12'),(130,'5a16f82c40dddGyoza-800x533[1].jpg',0,4,'2017-11-23 16:32:44','2017-11-23 16:32:44'),(131,'5a16f92f1d73cYakitori 06.JPG',0,5,'2017-11-23 16:37:03','2017-11-23 16:37:03'),(132,'5a16f93f2bbb8Yakitori 11.JPG',0,5,'2017-11-23 16:37:19','2017-11-23 16:37:19'),(133,'5a16f9617bbfbYakitori 24.JPG',0,5,'2017-11-23 16:37:54','2017-11-23 16:37:54'),(134,'5a1832e653076Langostinos al Ajillo 06.JPG',1,6,'2017-11-24 14:55:34','2017-11-24 14:56:36'),(135,'5a18330821a3bLangostinos al Ajillo 04.JPG',0,6,'2017-11-24 14:56:08','2017-11-24 14:56:36'),(136,'5a18331d465c0Langostinos al Ajillo 09.JPG',0,6,'2017-11-24 14:56:29','2017-11-24 14:56:36'),(137,'5a1833af36916Vieyras gratinadas 13.JPG',1,7,'2017-11-24 14:58:55','2017-11-24 14:59:31'),(138,'5a1833c098ec3Vieyras gratinadas 02.JPG',0,7,'2017-11-24 14:59:13','2017-11-24 14:59:31'),(139,'5a1833cbd0912Vieyras gratinadas 09.JPG',0,7,'2017-11-24 14:59:24','2017-11-24 14:59:31'),(140,'5a18345eae705Ceviche-Peruano-01[1].jpg',0,11,'2017-11-24 15:01:50','2017-11-24 15:01:50'),(141,'5a1838bef0f55Ceviche-Peruano-01[1].jpg',1,14,'2017-11-24 15:20:31','2017-11-24 15:20:50'),(142,'5a18394da24b5Yakimeshi 15.JPG',1,17,'2017-11-24 15:22:54','2017-11-24 15:23:28'),(143,'5a18395a1138eYakimeshi 16.JPG',0,17,'2017-11-24 15:23:06','2017-11-24 15:23:28'),(144,'5a18396669cfdYakimeshi 06.JPG',0,17,'2017-11-24 15:23:19','2017-11-24 15:23:28'),(145,'5a1839cec5991Yakisoba 03.JPG',0,18,'2017-11-24 15:25:03','2017-11-24 15:25:54'),(146,'5a1839ee189ceYakisoba 05.JPG',1,18,'2017-11-24 15:25:34','2017-11-24 15:25:54'),(147,'5a1839f8e88fbYakisoba 08.JPG',0,18,'2017-11-24 15:25:45','2017-11-24 15:25:54'),(148,'5a183a9d9705fTeppanyaki de Langostinos 04.JPG',1,19,'2017-11-24 15:28:30','2017-11-24 15:29:00'),(149,'5a183aa9d2885Teppanyaki de Langostinos 10.JPG',0,19,'2017-11-24 15:28:42','2017-11-24 15:29:00'),(150,'5a183ab6efc2fTeppanyaki de Langostinos 13.JPG',0,19,'2017-11-24 15:28:55','2017-11-24 15:29:00'),(151,'5a1c1b30a8e01BBQ-800x533[1].jpg',0,44,'2017-11-27 14:03:28','2017-11-27 14:03:28'),(152,'5a1c1c45cc929Endivias-800x533[1].jpg',0,45,'2017-11-27 14:08:05','2017-11-27 14:08:05'),(153,'5a1c1ecc18190Yakimeshi 06.JPG',0,47,'2017-11-27 14:18:52','2017-11-27 14:18:52'),(154,'5a1c1eeb35852Yakimeshi 16.JPG',0,46,'2017-11-27 14:19:23','2017-11-27 14:19:23'),(155,'5a1c22133d301maxresdefault[1].jpg',0,50,'2017-11-27 14:32:51','2017-11-27 14:32:51'),(156,'5a1c227c2378cmaxresdefault[1].jpg',0,51,'2017-11-27 14:34:36','2017-11-27 14:34:36'),(157,'5a1c22d0ec5acYakisoba 10.JPG',0,48,'2017-11-27 14:36:01','2017-11-27 14:36:01'),(158,'5a1c23060d98fyakisoba-pasta-con-langostinos[1].jpg',0,49,'2017-11-27 14:36:54','2017-11-27 14:36:54'),(161,'5a1c241d8fe8ePollo con Almendras 10.JPG',0,52,'2017-11-27 14:41:34','2017-11-27 14:41:34'),(162,'5a1c2466c139dPollo-al-curry-500x273[1].jpg',0,53,'2017-11-27 14:42:47','2017-11-27 14:42:47'),(163,'5a1c250093808Vieyras gratinadas 11.JPG',0,54,'2017-11-27 14:45:21','2017-11-27 14:45:21'),(164,'5a1c261d5e73dSalmonCakes-1[1].jpg',0,55,'2017-11-27 14:50:05','2017-11-27 14:50:05'),(165,'5a1c26a31f54bSalmonMiCuit2[1].jpg',0,56,'2017-11-27 14:52:19','2017-11-27 14:52:19'),(166,'5a1c27769b608SalmonPureBatatas-1[1].jpg',0,57,'2017-11-27 14:55:50','2017-11-27 14:55:50'),(167,'5a1c281b50813Arrolladitos Primavera 04.JPG',0,58,'2017-11-27 14:58:35','2017-11-27 14:58:35'),(168,'5a1c2891dc7c7Arrolladitos Primavera 05.JPG',0,59,'2017-11-27 15:00:34','2017-11-27 15:00:34'),(169,'5a1c28f205930SalmonTeriyaki-1[1].jpg',0,60,'2017-11-27 15:02:10','2017-11-27 15:02:10'),(170,'5a1c2ed476ad3Surubi-2-800x533[1].jpg',0,61,'2017-11-27 15:27:16','2017-11-27 15:27:16'),(171,'5a1c2f5f9bda2Dorado-800x533[1].jpg',0,62,'2017-11-27 15:29:35','2017-11-27 15:29:35'),(172,'5a1c304e9e056Pejerrey-1-800x533[1].jpg',0,63,'2017-11-27 15:33:34','2017-11-27 15:33:34'),(173,'5a1c30e16f401TruchaChampan-1[1].jpg',0,64,'2017-11-27 15:36:01','2017-11-27 15:36:01'),(174,'5a1c313506288MerluzaNegra-2[1].jpg',0,65,'2017-11-27 15:37:25','2017-11-27 15:37:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Harumaki de vegetales','Arrolladitos primavera de vegetales','Harumaki de vegetales. Nuestra versión de los clásicos arrolladitos primavera hechos con materia prima de primera calidad acompañados c/salsa de tamarindo (agridulce).',161.00,25,1,'2017-11-23 12:13:54','2017-11-23 12:30:25'),(2,'Gomae','Espinacas cocidas con sésamo.','Espinacas cocidas con salsa de soja y sésamo, levemente dulce.',141.00,18,1,'2017-11-23 12:13:55','2017-11-23 16:24:53'),(3,'Kara-ague de pollo','Pollo soufflé macerado con salsa de soja.','Pollo soufflé macerado con salsa de soja y jengibre con semillas de sésamo, acompañado con salsa de mayonesa y wasabi.',231.00,37,1,'2017-11-23 12:13:55','2017-11-23 16:27:34'),(4,'Gyoza de cerdo','Empanaditas de cerdo cocidas al vapor con salsa de soja y jengibre.  (10u.)',NULL,176.00,33,1,'2017-11-23 12:13:55','2017-11-23 16:35:58'),(5,'Yakitori','Brochettes de pollo caramelizadas c/salsa teriyaki, acompañadas con arroz c/sésamo (3 palitos).',NULL,238.00,11,1,'2017-11-23 12:13:56','2017-11-23 16:35:27'),(6,'Langostinos al ajillo','Langostinos al ajillo, un imperdible clásico de la cocina española.',NULL,277.00,30,1,'2017-11-23 12:13:56','2017-11-24 14:50:56'),(7,'Vieyras gratinadas','Vieyras con espinaca, almendras tostadas, salsa bechamel y queso gratinado.',NULL,204.00,24,1,'2017-11-23 12:13:57','2017-11-24 14:58:11'),(11,'Ceviche Peruano de pescados','Ceviche Peruano c/pescados blancos. Con cebolla morada, choclo, batatas caramelizadas, leche de tigre, ají rocoto y canchita.',NULL,176.00,44,2,'2017-11-23 12:14:10','2017-11-24 15:00:58'),(14,'Ceviche Tropical','Ceviche Tropical c/salmón rosado, mango, cebolla morada, leche de tigre al maracuya, rocoto, cilantro y canchitas.',NULL,215.00,43,2,'2017-11-23 12:14:12','2017-11-24 15:19:48'),(17,'Yakimeshi de vegetales','Arroz salteado al wok con vegetales y huevo',NULL,152.00,41,3,'2017-11-23 12:14:24','2017-11-27 14:15:48'),(18,'Yakisoba de pollo','Fideos tricolor salteados al wok con pollo y vegetales',NULL,183.00,32,3,'2017-11-23 12:14:25','2017-11-27 14:26:16'),(19,'Teppanyaki de langostinos','Langostinos grillados a la plancha con vegetales salteados, guarnición de arroz con sésamo y exquisita salsa',NULL,317.00,32,3,'2017-11-23 12:14:25','2017-11-27 14:28:49'),(44,'BBQ Chicken Wings','Alitas de pollo doradas y laqueadas con salsa BBQ especial japonesa.',NULL,188.00,NULL,1,'2017-11-27 13:59:23','2017-11-27 13:59:23'),(45,'Endivias c/tartar de salmón','Endivias c/tartar de salmón c/eneldo y alcaparras.',NULL,200.00,NULL,1,'2017-11-27 14:07:32','2017-11-27 14:07:32'),(46,'Yakimeshi de pollo','Arroz salteado al wok con pollo, vegetales y huevo',NULL,173.00,NULL,3,'2017-11-27 14:16:20','2017-11-27 14:17:24'),(47,'Yakimeshi de langostinos','Arroz salteado al wok con langostinos, vegetales y huevo',NULL,256.00,NULL,3,'2017-11-27 14:17:54','2017-11-27 14:17:54'),(48,'Yakisoba de vegetales','Fideos tricolor salteados al wok con vegetales',NULL,152.00,NULL,3,'2017-11-27 14:25:52','2017-11-27 14:25:52'),(49,'Yakisoba de langostinos','Fideos tricolor salteados al wok con langostinos y vegetales',NULL,256.00,NULL,3,'2017-11-27 14:26:32','2017-11-27 14:26:32'),(50,'Teppanyaki de vegetales','Vegetales al wok, guarnición de arroz con sésamo y exquisita salsa',NULL,176.00,NULL,3,'2017-11-27 14:27:45','2017-11-27 14:30:49'),(51,'Teppanyaki de salmón rosado','Salmón rosado grillado a la plancha con vegetales salteados, guarnición de arroz con sésamo y exquisita salsa',NULL,221.00,NULL,3,'2017-11-27 14:28:34','2017-11-27 14:29:25'),(52,'Pollo con almendras','Pollo al wok con vegetales acompañado guarnición de arroz con sésamo',NULL,205.00,NULL,3,'2017-11-27 14:38:05','2017-11-27 14:38:05'),(53,'Pollo al curry','Pollo al wok con suave salsa de curry c/guarnición de arroz pilaf',NULL,205.00,NULL,3,'2017-11-27 14:40:00','2017-11-27 14:43:47'),(54,'Vieyras gratinadas','Vieyras gratinadas con espinaca, almendras tostadas, salsa bechamel y queso parmesano gratinado.',NULL,204.00,NULL,4,'2017-11-27 14:44:40','2017-11-27 14:44:40'),(55,'Salmón cakes con chutney','Salmón cakes con chutney y ensalada de hierbas','Nuestra versión de este plato clásico inglés se cocina con el mejor salmón, garantía Furusato, papa y aromatizado con un toque de jengibre, cebolla de verdeo y ají. Dorados con panko, mantienen el crocante por fuera y la cremosidad por dentro.\r\n\r\nViene acompañado con un chutney artesanal de mango y una ensaladita de hierbas. Una entrada que pronto será un clásico.',217.00,NULL,4,'2017-11-27 14:46:47','2017-11-27 14:46:47'),(56,'Salmón en dos cocciones (mi-cuit)','Salmón en dos cocciones con suave salsa de limón y arroz pilaf','Lomo de salmón rosado del Pacífico cocinado primero a baja temperatura, manteniendo sus sabores y terminado a la plancha, dorado pero rosado al interior, todavía jugoso.\r\n\r\nLo acompañamos con un delicioso arroz pilaf y una salsa de limón, fresca, que combina a la perfección con la sutileza del pescado.',320.00,NULL,4,'2017-11-27 14:51:50','2017-11-27 15:23:36'),(57,'Salmón grillado con puré de batatas','Salmón grillado con puré de batatas ahumadas, salteado e hinojos y cherrys','Salmón del Pacífico fresco, dorado a la plancha con aceite de oliva, con un puré de batatas ahumadas al quebracho, original y muy sabroso y un salteado de hinojos y tomates cherrys, rápido y ligero que aporta gran frescor a un plato difícil de encontrar en otros restaurantes.\r\n\r\nFurusato innova y te lo lleva a casa.',320.00,NULL,4,'2017-11-27 14:55:21','2017-11-27 15:23:54'),(58,'Harumaki de carne','Arrolladitos primavera de carne c/salsa tamarindo','Harumaki. Nuestra versión de los clásicos arrolladitos primavera hechos con materia prima de primera calidad acompañados c/salsa de tamarindo (agridulce).',176.00,NULL,1,'2017-11-27 14:57:15','2017-11-27 14:57:15'),(59,'Harumaki de salmón','Arrolladitos primavera de salmón c/salsa tamarindo','Harumaki. Nuestra versión de los clásicos arrolladitos primavera hechos con materia prima de primera calidad acompañados c/salsa de tamarindo (agridulce).',200.00,NULL,1,'2017-11-27 14:59:56','2017-11-27 14:59:56'),(60,'Salmón teriyaki','Salmón grillado caramelizado con salsa teriyaki','Nuestro clásico salmón rosado (200g) con salsa teriyaki c/guarnición de arroz con sésamo.',320.00,NULL,4,'2017-11-27 15:01:28','2017-11-27 15:01:28'),(61,'Surubí c/soufflé de maiz','Surubí con soufflé de maiz, guarnición de calabaza kabutiá','Surubí servido con calabaza Kabutiá asada y flan de choclo y queso.\r\nCon una fresca salsa criolla que aportará el equilibrio a este plato delicioso y novedoso.\r\nUn pescado que mira al interior del país y homenajea el litoral.',283.00,NULL,4,'2017-11-27 15:25:20','2017-11-27 15:26:42'),(62,'Dorado crocante','Dorado crocante con cuscus de verduras asadas y frutos secos','Dorado crocante, con cuscús de verduras asadas y frutos secos, hecho a base trigo burgol.\r\n\r\nAcompañado con puré de morrones asados, emulsionados con aceite de oliva y nueces. Para terminar una lima dorada y caramelizada que añade acidez a este equilibrado plato.\r\n\r\nUna opción con aromas mediterráneos con lo mejor que ofrecen nuestros ríos argentinos.',283.00,NULL,4,'2017-11-27 15:28:12','2017-11-27 15:29:13'),(63,'Rollitos de pejerrey','Rollitos de pejerrey rellenos con verduras de temporada','Arrollados de pejerrey servidos con una variedad de verduras glaseadas al estilo francés y una ligera salsa verde al perejil. Una delicada veloute que acompaña perfectamente este plato.\r\n\r\nUn clásico que no va a defraudar.',283.00,NULL,4,'2017-11-27 15:33:06','2017-11-27 15:33:06'),(64,'Trucha al champán','Trucha con salsa de azafrán español y champán con salteado de hongos y espinacas','Trucha entera sin espinas, dorada a la plancha, en su punto.\r\n\r\nAcompañada con papines andinos dorados y crocantes al horno y un salteado de champiñones y espinacas frescas que proponen lo mejor de la tierra con lo mejor del mar. Para combinar todo esto nada mejor que una salsa de azafán español y champán. Delicada y deliciosa.\r\n\r\nAlta cocina en su casa.',320.00,NULL,4,'2017-11-27 15:34:52','2017-11-27 15:35:24'),(65,'Merluza negra grillada','Merluza negra grillada con wok de vegetales','Bocados de merluza negra austral del Sur argentino. Simplemente grillada con un mínimo de aceite de oliva extra virgen, un toque de manteca y tomillo, su textura jugosa la hace codiciada en todo el mundo.\r\n\r\nAcompañados de la mejor manera con un salteado de vegetales al wok, rápido, dejando que los vegetales mantengan todas sus propiedades y unos granos de sésamo tostado. Una dupla de diez.',303.00,NULL,4,'2017-11-27 15:36:54','2017-11-27 15:36:54');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Norberto','info@nute.com.ar','$2y$10$sO7Nvb/Gr3QRWE2C2.0Tru0RKrdkPuMkNXPh437OC0pbbL1KKJpcS',1,NULL,'8PgKWIx7w5POkQx6g7fFzldoPsshZDHxgJ2JR03sGUMoptGBmfJqJvR8bXtN','2017-11-23 12:13:51','2017-11-23 12:13:51','Trosman','4111-2222','15-3333-4444','Corrientes 5555 Piso 1 Dto 2','CABA'),(2,'Luz','lmfrancione@lmf.com.ar','$2y$10$UbjtMwO4/zCZYfPJXNak3.Pry1hHEKTKbEsYDXQVcvuX97RuYUL.O',0,NULL,'G3q87eHBcnJrDp9XdiGuIsL8Y6rDmIawDgmN8kAsDid9JIe79klMEfRWHFOA','2017-11-23 12:13:51','2017-11-23 12:13:51','Francione','4444-5555','15-6666-7777','Juan B Justo 999 Piso 10 Dto B','CABA'),(3,'Diego','diego@gmail.com','$2y$10$MuQYu9I/YyOglnsqR807DuX..BWnpD71jizX3R./4VGoSXcW3tKrS',0,NULL,'dFmB7TSmziJKUX0oBZlgVRbhTsvsoYGO9VSZVBC330wRCzNRBgQpezeIWi8r','2017-11-27 20:23:39','2017-11-27 20:23:39',NULL,'111','111','Corrientes 1000','CABA');
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

-- Dump completed on 2017-11-28 16:49:42
