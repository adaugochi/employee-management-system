-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: ems
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wallet` decimal(19,2) NOT NULL DEFAULT '0.00',
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_of_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(19,2) NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `profile_picture` text COLLATE utf8mb4_unicode_ci,
  `is_profile_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employees_user_id_foreign` (`user_id`),
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,1000000000.00,'Technical support',NULL,NULL,5000000.00,4,NULL,NULL,NULL,NULL,NULL,'2022-03-20 23:00:00',NULL,NULL,0,'2022-03-25 00:36:33','2022-03-27 06:10:58'),(2,0.00,'Forensic Scientist',NULL,NULL,7000000.00,5,NULL,NULL,NULL,NULL,NULL,'2022-03-21 23:00:00',NULL,NULL,0,'2022-03-25 00:44:05','2022-03-24 23:44:05'),(3,400000.00,'Biochemist',NULL,NULL,3000000.00,6,NULL,NULL,NULL,NULL,NULL,'2022-03-30 22:00:00',NULL,NULL,0,'2022-03-25 01:08:14','2022-03-27 06:10:47'),(7,2388000.00,'Teacher',NULL,NULL,2388000.00,10,NULL,NULL,NULL,NULL,NULL,'2022-03-30 22:00:00',NULL,NULL,0,'2022-03-25 01:56:44','2022-03-28 16:23:53'),(8,5630090.00,'Product Manage',NULL,NULL,600090.00,11,'flat 2 primavera terrace','Ibadan','Bayelsa','Nigeria','200211','2022-03-31 22:00:00',NULL,NULL,0,'2022-03-25 21:06:46','2022-03-28 16:47:02'),(9,700000000.00,'Frontend Engineer',NULL,NULL,700000000.00,12,'flat 2 primavera terrace','Ibadan','Oyo','Nigeria','200211','2022-03-30 22:00:00',NULL,'16485397967b892d0db6324385b49b924113570db2.jpg',1,'2022-03-25 21:52:09','2022-03-29 05:48:22'),(10,0.00,'Frontend Engineer',NULL,NULL,200000.00,14,NULL,NULL,NULL,NULL,NULL,'2022-03-29 22:00:00',NULL,NULL,0,'2022-03-29 05:30:11','2022-03-29 04:30:11'),(11,0.00,'Technician',NULL,NULL,2000000.00,15,'123 Main Street','Lone','Hawaii','USA',NULL,'2022-03-30 22:00:00',NULL,NULL,1,'2022-03-29 05:34:56','2022-03-29 07:49:39');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (17,'2014_10_12_000000_create_users_table',1),(18,'2014_10_12_100000_create_password_resets_table',1),(19,'2019_08_19_000000_create_failed_jobs_table',1),(20,'2022_03_23_222832_create_employees_table',1),(21,'2022_03_25_223628_add_columns_to_employees_table',2),(24,'2022_03_26_095347_create_payroll_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('obi@gmail.com','wGApKhe3BfvciMz5rA9od2ihzFzhVdbT7YdyykwvSTaD2MDApMpD4722tznX','2022-03-25 01:26:44','2022-03-25 01:56:44'),('blessing@gmail.com','7m39n3Pzy2SgPu7KGHsj8N6sB6TabgeXpvFYXbzwEUdXWnmFKwOUIpLxgQmJ','2022-03-25 20:36:46','2022-03-25 20:06:46'),('ugomgbede@gmail.com','8aQ9R0NamEOIUGf9qh5a6MU3V2vrbyE81qMMQPLGl2c3AxLc8C8xiEaNN6n8FFaxqujhvtRYMgrKebyuzJZMnvhzf1DsPIzb6rNP','2022-03-26 02:27:36','2022-03-26 01:57:36'),('adaa@gmail.com','NnjU0ISohcHaaSgUJhTTKg0c5k1sFGOPRvuQGkrV0Y4nv0amuyrQxyHdSc27cJDmCIdvcgZu2rmx5HDgn3hGEDEdz3pAwYx0aF7w','2022-03-26 02:37:18','2022-03-26 02:07:18'),('adaa@gmail.com','lMoO42JriGEQS6XdgiSl4L1biCtQCyfixQLC97JqViYTK3lumo1qYHzTYfJ2KnfWsFS88vVdowYYu5L5SETixOZNU6WwOMneO6pf','2022-03-26 02:37:39','2022-03-26 02:07:39'),('adaa@gmail.com','pDGDHaGi47tjO0qvx7rgT6BLEnsi0gYITv2zuptXEJpmVVTHN3pN2bWA5hh5QEuuTT3Z6vpTGkG40Zdk6MQHCAKfnifZ59wn6FtQ','2022-03-26 02:38:21','2022-03-26 02:08:21'),('adaa@gmail.com','X70jiBQExXmmgNQUgEyjLkHE7EVIKzjA3yfL4ikHrIEzd38MHNAWsy7bZmlyV4KxAD01PtSdUYrexpA6g1xEDXxb8O2KKqYPnVOI','2022-03-26 02:38:55','2022-03-26 02:08:55'),('adaamgbede@gmail.com','ELJvdktBV6MFLk4uqTnvbVQDxTzYQJ6vKLfIWrip76TMcJORiCaWdFfKDQs4RdjwaZ0F6KzG0IHlo4b7WAQukib5KlhQx6cP30Nn','2022-03-27 06:51:38','2022-03-27 06:21:38'),('adaa@gmail.com','Z8nAP1LfFbyjpQAgJrUM35qnRNYeXwrfzFDx2ODhgTLXPGYYOrOgzlzImQXp16sIOHrZwxw5ymt83WgB2LnhQ0JmZllEP84cpOom','2022-03-28 12:42:35','2022-03-28 12:12:35'),('blessing@gmail.com','lPPc3G0A9P60YmdeHhvoveN4Rh8b4SxWuBUWBU2ddLm3ow7rgYTpGaV5qLBSclt9IpMx6xjl2acOQL27jpH1ggcHtqP8qP5UkLLV','2022-03-28 17:10:51','2022-03-28 16:40:51'),('mark@yahoo.com','HPSmyG5ybUF3EHn7oUI91XLfSVCIg8UxGVF4nSVI5ymI5M0qnFyCZRQCUo9RakHbWfDnvIi72tocRNaQMAsOpDjFel0KlR0NsbVN','2022-03-29 05:04:56','2022-03-29 04:34:56');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_history` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `transaction_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` decimal(19,2) NOT NULL,
  `paid_by` bigint unsigned NOT NULL,
  `month` smallint NOT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `paid_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `payment_history_employee_id_foreign` (`employee_id`),
  KEY `payment_history_paid_by_foreign` (`paid_by`),
  KEY `payment_history_updated_by_foreign` (`updated_by`),
  CONSTRAINT `payment_history_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `payment_history_paid_by_foreign` FOREIGN KEY (`paid_by`) REFERENCES `users` (`id`),
  CONSTRAINT `payment_history_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
INSERT INTO `payment_history` VALUES (2,8,'txn_Wjpxks7HmeYLJdU',5000000.00,1,3,NULL,'2022-03-28 15:43:25','2022-03-28 15:43:25'),(3,8,'txn_dF3tUC0dfhSY9WU',600090.00,1,3,NULL,'2022-03-28 18:23:46','2022-03-28 18:23:46'),(4,7,'txn_bt6p2cLtINSTsze',2388000.00,1,3,NULL,'2022-03-28 18:23:53','2022-03-28 18:23:53'),(5,9,'txn_CbpuSy2RnkO05hM',700000000.00,1,3,NULL,'2022-03-28 18:23:57','2022-03-28 18:23:57');
/*!40000 ALTER TABLE `payment_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `international_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  UNIQUE KEY `users_international_number_unique` (`international_number`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Miss','Admin','EMS',NULL,'Admin EMS','admin@ems.com','08109046780','+2348109030672','$2y$10$aMRBOwaZjQA4542VKvJ/Reu.z3q6aojQ6qoqrfYEwxtseLI400/ma',1,1,'admin',NULL,'2022-03-24 23:58:29','2022-03-24 23:58:29'),(4,'miss','Maryfaith','Mgbede','Ugochi','Maryfaith Mgbede','adaamgbede@gmail.com','08109030673','+2348109030673','$2y$10$fJ9BbtAxIfY54l.2SEOU3uE6wODn3ExjonZEUeFozy.UNTWK//S4y',0,1,'employee',NULL,'2022-03-24 23:36:33','2022-03-27 06:25:06'),(5,'mr','Mark','Mgbede','Ugo','Mark Mgbede','ugomgbede@gmail.com','08109030670','+2348109030670','$2y$10$T130tDSeFY7Pa0mhVYQip.jUfEIzzuZwJ8bWUC5JaPBxMjiLcXJDq',0,1,'employee',NULL,'2022-03-24 23:44:05','2022-03-26 01:57:58'),(6,'dr','Osahon','Ebo',NULL,'Osahon Ebo','osahon@gmail.com','810 903 0671','+2348109030671',NULL,0,0,'employee',NULL,'2022-03-25 00:08:14','2022-03-26 01:27:16'),(10,'prof','Jude','Obi',NULL,'Jude Obi','obi@gmail.com','810 903 0674','+2348109030674',NULL,0,0,'employee',NULL,'2022-03-25 00:56:44','2022-03-26 01:23:24'),(11,'miss','Blessing','osuji','Ada','Blessing osuji','blessing@gmail.com','8109030675','+2348109030675','$2y$10$yuQjzxl3nzHbZ5HpOAMZ8OpAbhbTYzmT4XkugC8IeoKBWpplGO0FG',0,1,'employee',NULL,'2022-03-25 20:06:46','2022-03-28 16:47:02'),(12,'engr','Adaa','Mgbede','Ugo','Adaa Mgbede','adaa@gmail.com','08109030611','+2348109030611','$2y$10$hsDSyDfc32KLFE9R/05bJ.GZchbgWyka610QxoQ/jjlOdvEx.FGnS',0,1,'employee',NULL,'2022-03-25 20:52:09','2022-03-28 12:13:20'),(14,'miss','Mary','Okosun','Oghonghon','Mary Okosun','maryoko@gmail.com','8109030567','+2348109030567',NULL,0,0,'employee',NULL,'2022-03-29 04:30:11','2022-03-29 04:30:11'),(15,'mr','Mark','Mgbede','Ugo','Mark Mgbede','mark@yahoo.com','9090456723','+2349090456723','$2y$10$ndXcoWaQPkJzN7vI49P4weEhW7kdhaGbNrdNfKUVLa2gry3djbnKm',0,1,'employee',NULL,'2022-03-29 04:34:56','2022-03-29 04:35:28');
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

-- Dump completed on 2022-03-29  9:50:39
