-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `alternatives`
--

DROP TABLE IF EXISTS `alternatives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alternatives` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alternatives_question_id_foreign` (`question_id`),
  CONSTRAINT `alternatives_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatives`
--

LOCK TABLES `alternatives` WRITE;
/*!40000 ALTER TABLE `alternatives` DISABLE KEYS */;
/*!40000 ALTER TABLE `alternatives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer_alternative`
--

DROP TABLE IF EXISTS `answer_alternative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer_alternative` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` int unsigned NOT NULL,
  `alternative_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_alternative_answer_id_foreign` (`answer_id`),
  KEY `answer_alternative_alternative_id_foreign` (`alternative_id`),
  CONSTRAINT `answer_alternative_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `answer_alternative_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_alternative`
--

LOCK TABLES `answer_alternative` WRITE;
/*!40000 ALTER TABLE `answer_alternative` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_alternative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `quiz_submission_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_foreign` (`question_id`),
  KEY `answers_quiz_submission_id_foreign` (`quiz_submission_id`),
  CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `answers_quiz_submission_id_foreign` FOREIGN KEY (`quiz_submission_id`) REFERENCES `quiz_submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_level_id_foreign` (`level_id`),
  KEY `applications_company_id_foreign` (`company_id`),
  CONSTRAINT `applications_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `applications_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authentication_codes`
--

DROP TABLE IF EXISTS `authentication_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authentication_codes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authentication_codes`
--

LOCK TABLES `authentication_codes` WRITE;
/*!40000 ALTER TABLE `authentication_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `authentication_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banners_company_id_foreign` (`company_id`),
  CONSTRAINT `banners_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_automatic_companies`
--

DROP TABLE IF EXISTS `campaign_automatic_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaign_automatic_companies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `campaign_automatic_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_automatic_companies_campaign_automatic_id_foreign` (`campaign_automatic_id`),
  KEY `campaign_automatic_companies_company_id_foreign` (`company_id`),
  CONSTRAINT `campaign_automatic_companies_campaign_automatic_id_foreign` FOREIGN KEY (`campaign_automatic_id`) REFERENCES `campaigns_automatic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `campaign_automatic_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_automatic_companies`
--

LOCK TABLES `campaign_automatic_companies` WRITE;
/*!40000 ALTER TABLE `campaign_automatic_companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_automatic_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_categories`
--

DROP TABLE IF EXISTS `campaign_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaign_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_categories_holding_id_foreign` (`holding_id`),
  CONSTRAINT `campaign_categories_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_categories`
--

LOCK TABLES `campaign_categories` WRITE;
/*!40000 ALTER TABLE `campaign_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_dispatches`
--

DROP TABLE IF EXISTS `campaign_dispatches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaign_dispatches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `campaign_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_dispatches`
--

LOCK TABLES `campaign_dispatches` WRITE;
/*!40000 ALTER TABLE `campaign_dispatches` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_dispatches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaigns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_sending_email` int DEFAULT NULL,
  `push_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `push_body` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_sending_push` int DEFAULT NULL,
  `whatsapp_body` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_sending_whatsapp` int DEFAULT NULL,
  `sms_body` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_sending_sms` int DEFAULT NULL,
  `voucher_description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_expires` int NOT NULL,
  `voucher_value` decimal(10,2) DEFAULT NULL,
  `max_sending_voucher` int DEFAULT NULL,
  `voucher_payment_minimum_value` decimal(8,2) DEFAULT NULL,
  `voucher_giftcard_id` int unsigned DEFAULT NULL,
  `voucher_product_id` int unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `keep_alive` tinyint(1) NOT NULL DEFAULT '0',
  `sending_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_hour` time NOT NULL,
  `scheduled_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audience_segmentation` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_execution_date` datetime DEFAULT NULL,
  `campaign_category_id` int unsigned DEFAULT NULL,
  `vouchers` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaigns_company_id_foreign` (`company_id`),
  KEY `campaigns_voucher_giftcard_id_foreign` (`voucher_giftcard_id`),
  KEY `campaigns_voucher_product_id_foreign` (`voucher_product_id`),
  KEY `campaigns_campaign_category_id_foreign` (`campaign_category_id`),
  CONSTRAINT `campaigns_campaign_category_id_foreign` FOREIGN KEY (`campaign_category_id`) REFERENCES `campaign_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `campaigns_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `campaigns_voucher_giftcard_id_foreign` FOREIGN KEY (`voucher_giftcard_id`) REFERENCES `giftcards` (`id`),
  CONSTRAINT `campaigns_voucher_product_id_foreign` FOREIGN KEY (`voucher_product_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns_automatic`
--

DROP TABLE IF EXISTS `campaigns_automatic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaigns_automatic` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaigns_automatic_type_unique` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns_automatic`
--

LOCK TABLES `campaigns_automatic` WRITE;
/*!40000 ALTER TABLE `campaigns_automatic` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaigns_automatic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cards` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `safe2pay_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cards_user_id_foreign` (`user_id`),
  CONSTRAINT `cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int unsigned NOT NULL,
  `giftcard_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `value` double(8,2) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `receiver_user_id` int unsigned DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  KEY `cart_items_receiver_user_id_foreign` (`receiver_user_id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_giftcard_id_foreign` (`giftcard_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_items_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `cart_items_receiver_user_id_foreign` FOREIGN KEY (`receiver_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_company_id_foreign` (`company_id`),
  CONSTRAINT `carts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `championships`
--

DROP TABLE IF EXISTS `championships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `championships` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `championships_company_id_foreign` (`company_id`),
  CONSTRAINT `championships_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `championships`
--

LOCK TABLES `championships` WRITE;
/*!40000 ALTER TABLE `championships` DISABLE KEYS */;
/*!40000 ALTER TABLE `championships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_ins`
--

DROP TABLE IF EXISTS `check_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_ins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `visit_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `check_ins_company_id_foreign` (`company_id`),
  KEY `check_ins_user_id_foreign` (`user_id`),
  CONSTRAINT `check_ins_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `check_ins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_ins`
--

LOCK TABLES `check_ins` WRITE;
/*!40000 ALTER TABLE `check_ins` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_ins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communication_dispatches`
--

DROP TABLE IF EXISTS `communication_dispatches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communication_dispatches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `has_email` tinyint(1) NOT NULL DEFAULT '0',
  `has_voucher` tinyint(1) NOT NULL DEFAULT '0',
  `has_sms` tinyint(1) NOT NULL DEFAULT '0',
  `has_whatsapp` tinyint(1) NOT NULL DEFAULT '0',
  `has_push` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `campaign_id` int unsigned DEFAULT NULL,
  `campaign_dispatch_id` int unsigned DEFAULT NULL,
  `campaign_automatic_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_automatic_id` int unsigned DEFAULT NULL,
  `voucher_code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `communication_dispatches_campaign_automatic_id_foreign` (`campaign_automatic_id`),
  CONSTRAINT `communication_dispatches_campaign_automatic_id_foreign` FOREIGN KEY (`campaign_automatic_id`) REFERENCES `campaigns_automatic` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communication_dispatches`
--

LOCK TABLES `communication_dispatches` WRITE;
/*!40000 ALTER TABLE `communication_dispatches` DISABLE KEYS */;
/*!40000 ALTER TABLE `communication_dispatches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_anchor` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complement` longtext COLLATE utf8mb4_unicode_ci,
  `reference` longtext COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color_primary` text COLLATE utf8mb4_unicode_ci,
  `color_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_tertiary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel` mediumtext COLLATE utf8mb4_unicode_ci,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_category_id` int unsigned DEFAULT NULL,
  `auto_accept_sales` tinyint(1) NOT NULL DEFAULT '1',
  `pix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `automatic_recharge_balance` tinyint(1) NOT NULL DEFAULT '0',
  `recharge_balance_when` double(8,2) NOT NULL DEFAULT '5.00',
  `recharge_balance_value` double(8,2) NOT NULL DEFAULT '10.00',
  `recharge_balance_with_card_id` int unsigned DEFAULT NULL,
  `free_shipments` double NOT NULL DEFAULT '0',
  `user_id` int unsigned DEFAULT NULL,
  `accepted_spoten_pay` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_payment_methods_spoten_pay` json DEFAULT NULL,
  `accepted_payment_methods_checkin_employee` json DEFAULT NULL,
  `accepted_payment_methods_checkin_customer` json DEFAULT NULL,
  `accepted_membership_terms` tinyint(1) NOT NULL DEFAULT '0',
  `payment_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://spoten.app/politica-de-privacidade',
  `terms_of_use_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://spoten.app/br/termos-de-uso',
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_agency_digit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_digit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_financial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `safe2pay_sub_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_sub_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_value_installment` int NOT NULL DEFAULT '5',
  `customer_pay_installment_fees` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_installment_quantity` int NOT NULL DEFAULT '1',
  `iugu_sub_account_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_sub_account_api_token_live` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_sub_account_api_token_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_sub_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_weekly_performance_report` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_monthly_performance_report` tinyint(1) NOT NULL DEFAULT '1',
  `working_time` json DEFAULT NULL,
  `app_latest_version_ios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_latest_version_android` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloud_functions_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://us-central1-spoten-app.cloudfunctions.net',
  `onelink_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_slug_unique` (`slug`),
  KEY `companies_holding_id_foreign` (`holding_id`),
  KEY `companies_user_id_foreign` (`user_id`),
  KEY `companies_company_category_id_foreign` (`company_category_id`),
  KEY `companies_recharge_balance_with_card_id_foreign` (`recharge_balance_with_card_id`),
  CONSTRAINT `companies_company_category_id_foreign` FOREIGN KEY (`company_category_id`) REFERENCES `company_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `companies_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `companies_recharge_balance_with_card_id_foreign` FOREIGN KEY (`recharge_balance_with_card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (5,1,'Açaí da Maria','acaidamaria@teste.com',1,0,'https://picsum.photos/500',NULL,'12.345.678/9000-00','(12) 3456-7890','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','37500-903','Avenida Bps 1303','1303','Pinheirinho','Itajubá','MG',NULL,NULL,-22.41382001,-45.45234996,'2023-08-30 21:34:04','2023-08-30 21:34:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,NULL,1,NULL,NULL,NULL,0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(7,1,'Café do João','cafedojoao@teste.com',1,0,'https://picsum.photos/500',NULL,'00.000.987/6543-21','(09) 8765-4321','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','37500-050','Rua Coronel Renno','4','Centro','Itajubá','MG',NULL,NULL,-22.42268064,-45.45240326,'2023-08-30 21:36:17','2023-08-30 21:36:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,NULL,1,NULL,NULL,NULL,0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'--',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(8,1,'Padaria Irmãos ABC','contato@irmaosabc.com',1,0,'https://picsum.photos/500',NULL,'00.000.987/6543-22','(09) 8765-4321','A melhor da região!','37500-050','Rua Coronel Renno','4','Centro','Itajubá','MG',NULL,NULL,-22.42268064,-45.45240326,'2023-08-30 21:38:41','2023-08-30 21:38:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,NULL,1,NULL,NULL,NULL,0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'---',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(9,1,'Mercado Guanabara','mercadoguanabara@spoten.app',1,0,'https://picsum.photos/500',NULL,'24.632.432/0001-83','(67) 3247-4325','A melhor da região!','37500-050','Rua Coronel Renno','4','Centro','Itajubá','MG',NULL,NULL,-22.42268064,-45.45240326,'2023-08-30 21:39:00','2023-08-30 21:39:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,NULL,1,NULL,NULL,NULL,0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'----',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(10,1,'Escolinha Teste',NULL,1,1,NULL,NULL,'322332',NULL,NULL,'37505-031','Rua Miguel Braga','3','Boa Vista','Itajubá','MG',NULL,NULL,NULL,NULL,'2023-09-01 05:22:03','2023-09-01 05:22:03',NULL,'#1b212b','d42330',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,54,1,'[\"credit\", \"debit\", \"pix\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]',0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'736c2c',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(12,1,'Escolinha Teste',NULL,1,1,NULL,NULL,'34332',NULL,NULL,'37505-031','Rua Miguel Braga','4','Boa Vista','Itajubá','MG',NULL,NULL,NULL,NULL,'2023-09-01 05:23:13','2023-09-01 05:23:13',NULL,'#1b212b','d42330',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,54,1,'[\"credit\", \"debit\", \"pix\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]',0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'d6ef97',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL),(14,1,'Escolinha 2',NULL,1,0,NULL,NULL,'433432',NULL,NULL,'37502-101','Avenida São Vicente de Paulo','43','Medicina','Itajubá','MG',NULL,NULL,NULL,NULL,'2023-09-01 05:35:49','2023-09-01 05:35:49',NULL,'#1b212b','d42330',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,0,0,5.00,10.00,NULL,0,54,1,'[\"credit\", \"debit\", \"pix\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]','[\"credit\", \"debit\", \"pix\", \"money\", \"others\"]',0,NULL,NULL,'https://spoten.app/politica-de-privacidade','https://spoten.app/br/termos-de-uso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'346dcb',NULL,NULL,5,1,1,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'https://us-central1-spoten-app.cloudfunctions.net',NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_categories`
--

DROP TABLE IF EXISTS `company_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_company_category_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_holding_id_foreign` (`holding_id`),
  KEY `company_categories_parent_company_category_id_foreign` (`parent_company_category_id`),
  CONSTRAINT `categories_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `company_categories_parent_company_category_id_foreign` FOREIGN KEY (`parent_company_category_id`) REFERENCES `company_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_categories`
--

LOCK TABLES `company_categories` WRITE;
/*!40000 ALTER TABLE `company_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_customer`
--

DROP TABLE IF EXISTS `company_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_customer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `observation` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `company_customer_user_id_foreign` (`user_id`),
  KEY `company_customer_company_id_foreign` (`company_id`),
  KEY `company_customer_created_at_index` (`created_at`),
  CONSTRAINT `company_customer_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_customer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_customer`
--

LOCK TABLES `company_customer` WRITE;
/*!40000 ALTER TABLE `company_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_customer_tags`
--

DROP TABLE IF EXISTS `company_customer_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_customer_tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int unsigned NOT NULL,
  `company_customer_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_customer_tags_company_customer_id_foreign` (`company_customer_id`),
  KEY `company_customer_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `company_customer_tags_company_customer_id_foreign` FOREIGN KEY (`company_customer_id`) REFERENCES `company_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_customer_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_customer_tags`
--

LOCK TABLES `company_customer_tags` WRITE;
/*!40000 ALTER TABLE `company_customer_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_customer_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_employee`
--

DROP TABLE IF EXISTS `company_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_employee` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `company_position_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_company_company_id_foreign` (`company_id`),
  KEY `user_company_user_id_foreign` (`user_id`),
  KEY `company_employee_company_position_id_foreign` (`company_position_id`),
  CONSTRAINT `company_employee_company_position_id_foreign` FOREIGN KEY (`company_position_id`) REFERENCES `company_positions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `user_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `user_company_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_employee`
--

LOCK TABLES `company_employee` WRITE;
/*!40000 ALTER TABLE `company_employee` DISABLE KEYS */;
INSERT INTO `company_employee` VALUES (1,54,5,NULL,NULL,'2023-08-31 01:57:09','2023-08-31 01:57:09'),(2,54,7,NULL,NULL,'2023-08-31 01:57:09','2023-08-31 01:57:09'),(3,54,8,NULL,NULL,'2023-08-31 01:57:09','2023-08-31 01:57:09'),(4,54,9,NULL,NULL,'2023-08-31 01:57:09','2023-08-31 01:57:09'),(5,54,10,NULL,NULL,NULL,NULL),(6,54,12,NULL,NULL,NULL,NULL),(7,54,14,NULL,NULL,'2023-09-01 05:35:49','2023-09-01 05:35:49');
/*!40000 ALTER TABLE `company_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_followers`
--

DROP TABLE IF EXISTS `company_followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_followers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `accepted_mails` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_sms` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_whatsapp` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_pushs` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_followers_company_id_foreign` (`company_id`),
  KEY `company_followers_user_id_foreign` (`user_id`),
  CONSTRAINT `company_followers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_followers`
--

LOCK TABLES `company_followers` WRITE;
/*!40000 ALTER TABLE `company_followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_module`
--

DROP TABLE IF EXISTS `company_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_module` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `module_id` int unsigned NOT NULL,
  `config_json` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_module_company_id_foreign` (`company_id`),
  KEY `company_module_module_id_foreign` (`module_id`),
  CONSTRAINT `company_module_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `company_module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_module`
--

LOCK TABLES `company_module` WRITE;
/*!40000 ALTER TABLE `company_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_partners`
--

DROP TABLE IF EXISTS `company_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_partners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `partner_id` int unsigned NOT NULL,
  `has_public_store` tinyint(1) NOT NULL DEFAULT '1',
  `cashback_percentage` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_partners_company_id_foreign` (`company_id`),
  KEY `company_partners_partner_id_foreign` (`partner_id`),
  CONSTRAINT `company_partners_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_partners_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_partners`
--

LOCK TABLES `company_partners` WRITE;
/*!40000 ALTER TABLE `company_partners` DISABLE KEYS */;
INSERT INTO `company_partners` VALUES (1,10,5,1,0.00,NULL,NULL),(2,12,5,1,0.00,NULL,NULL),(4,14,5,1,0.00,NULL,NULL);
/*!40000 ALTER TABLE `company_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_plan`
--

DROP TABLE IF EXISTS `company_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_plan` (
  `company_id` int unsigned NOT NULL,
  `plan_id` int unsigned NOT NULL,
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `value` double NOT NULL,
  `additional_value` double NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `vouchers` tinyint(1) NOT NULL DEFAULT '0',
  `surveys` tinyint(1) NOT NULL DEFAULT '0',
  `giftcards` tinyint(1) NOT NULL DEFAULT '0',
  `subscriptions` tinyint(1) NOT NULL DEFAULT '0',
  `spoten_pay` tinyint(1) NOT NULL DEFAULT '0',
  `individual_shipments` tinyint(1) NOT NULL DEFAULT '0',
  `scheduling_shipments` tinyint(1) NOT NULL DEFAULT '0',
  `customers` int NOT NULL,
  `customers_price` double NOT NULL,
  `free_shipments` int NOT NULL,
  `employees` int DEFAULT NULL,
  `mail_price` double NOT NULL,
  `sms_price` double NOT NULL,
  `push_price` double NOT NULL,
  `whatsapp_price` double NOT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `card_id` int unsigned DEFAULT NULL,
  `recharge_date` datetime NOT NULL,
  `cancellation_date` datetime DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit',
  `trial_period` tinyint(1) NOT NULL DEFAULT '0',
  `renewable` tinyint(1) NOT NULL DEFAULT '1',
  `months_duration` int NOT NULL DEFAULT '1',
  `automatic_renovation` tinyint(1) NOT NULL DEFAULT '1',
  `spoten_fee_configurations` json DEFAULT NULL,
  `generated_by_payment_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_plan_company_id_foreign` (`company_id`),
  KEY `company_plan_plan_id_foreign` (`plan_id`),
  KEY `company_plan_generated_by_payment_id_foreign` (`generated_by_payment_id`),
  KEY `company_plan_card_id_foreign` (`card_id`),
  CONSTRAINT `company_plan_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `company_plan_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `company_plan_generated_by_payment_id_foreign` FOREIGN KEY (`generated_by_payment_id`) REFERENCES `payments` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `company_plan_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_plan`
--

LOCK TABLES `company_plan` WRITE;
/*!40000 ALTER TABLE `company_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_positions`
--

DROP TABLE IF EXISTS `company_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_positions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_positions_company_id_foreign` (`company_id`),
  CONSTRAINT `company_positions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_positions`
--

LOCK TABLES `company_positions` WRITE;
/*!40000 ALTER TABLE `company_positions` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_tokens`
--

DROP TABLE IF EXISTS `device_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `device_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `company_anchor_id` int unsigned DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `device_tokens_user_id_company_anchor_id_token_unique` (`user_id`,`company_anchor_id`,`token`),
  KEY `device_tokens_company_anchor_id_foreign` (`company_anchor_id`),
  CONSTRAINT `device_tokens_company_anchor_id_foreign` FOREIGN KEY (`company_anchor_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `device_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_tokens`
--

LOCK TABLES `device_tokens` WRITE;
/*!40000 ALTER TABLE `device_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `device_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disclose_logs`
--

DROP TABLE IF EXISTS `disclose_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disclose_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `access` tinyint(1) NOT NULL,
  `register` tinyint(1) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disclose_logs`
--

LOCK TABLES `disclose_logs` WRITE;
/*!40000 ALTER TABLE `disclose_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `disclose_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `started_at` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_company_id_foreign` (`company_id`),
  CONSTRAINT `events_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `feedback_grades`
--

DROP TABLE IF EXISTS `feedback_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_grades` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` int unsigned NOT NULL,
  `feedback_type_id` int unsigned NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_grades_feedback_id_foreign` (`feedback_id`),
  KEY `feedback_grades_feedback_type_id_foreign` (`feedback_type_id`),
  CONSTRAINT `feedback_grades_feedback_id_foreign` FOREIGN KEY (`feedback_id`) REFERENCES `feedbacks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `feedback_grades_feedback_type_id_foreign` FOREIGN KEY (`feedback_type_id`) REFERENCES `feedback_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_grades`
--

LOCK TABLES `feedback_grades` WRITE;
/*!40000 ALTER TABLE `feedback_grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_types`
--

DROP TABLE IF EXISTS `feedback_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_types_holding_id_foreign` (`holding_id`),
  CONSTRAINT `feedback_types_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_types`
--

LOCK TABLES `feedback_types` WRITE;
/*!40000 ALTER TABLE `feedback_types` DISABLE KEYS */;
INSERT INTO `feedback_types` VALUES (1,1,'Qualidade',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00'),(2,1,'Atendimento',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00'),(3,1,'Custo x Benefício',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00');
/*!40000 ALTER TABLE `feedback_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `spoten_grade` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedbacks_payment_id_foreign` (`payment_id`),
  CONSTRAINT `feedbacks_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giftcard_categories`
--

DROP TABLE IF EXISTS `giftcard_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giftcard_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giftcard_categories_company_id_foreign` (`company_id`),
  CONSTRAINT `giftcard_categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giftcard_categories`
--

LOCK TABLES `giftcard_categories` WRITE;
/*!40000 ALTER TABLE `giftcard_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `giftcard_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giftcard_usage_restrictions`
--

DROP TABLE IF EXISTS `giftcard_usage_restrictions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giftcard_usage_restrictions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `giftcard_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `giftcard_usage_restrictions_giftcard_id_product_id_unique` (`giftcard_id`,`product_id`),
  KEY `giftcard_usage_restrictions_product_id_foreign` (`product_id`),
  CONSTRAINT `giftcard_usage_restrictions_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `giftcard_usage_restrictions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giftcard_usage_restrictions`
--

LOCK TABLES `giftcard_usage_restrictions` WRITE;
/*!40000 ALTER TABLE `giftcard_usage_restrictions` DISABLE KEYS */;
/*!40000 ALTER TABLE `giftcard_usage_restrictions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giftcards`
--

DROP TABLE IF EXISTS `giftcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giftcards` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_product` tinyint(1) NOT NULL DEFAULT '1',
  `match_id` int unsigned DEFAULT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int unsigned NOT NULL,
  `voucher_category_id` int unsigned DEFAULT NULL,
  `giftcard_category_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validity_days` int DEFAULT NULL,
  `validity_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sales_limit` int unsigned DEFAULT NULL,
  `purchase_limit` int DEFAULT NULL,
  `is_giftable` tinyint(1) NOT NULL DEFAULT '1',
  `subscription_id` int unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `accepted_payment_methods` json DEFAULT NULL,
  `insurance_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giftcards_company_id_foreign` (`company_id`),
  KEY `giftcards_giftcard_category_id_foreign` (`giftcard_category_id`),
  KEY `giftcards_subscription_id_foreign` (`subscription_id`),
  KEY `giftcards_voucher_category_id_foreign` (`voucher_category_id`),
  KEY `giftcards_match_id_foreign` (`match_id`),
  KEY `giftcards_event_id_foreign` (`event_id`),
  CONSTRAINT `giftcards_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `giftcards_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `giftcards_giftcard_category_id_foreign` FOREIGN KEY (`giftcard_category_id`) REFERENCES `giftcard_categories` (`id`),
  CONSTRAINT `giftcards_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `giftcards_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `giftcards_voucher_category_id_foreign` FOREIGN KEY (`voucher_category_id`) REFERENCES `voucher_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giftcards`
--

LOCK TABLES `giftcards` WRITE;
/*!40000 ALTER TABLE `giftcards` DISABLE KEYS */;
/*!40000 ALTER TABLE `giftcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holdings`
--

DROP TABLE IF EXISTS `holdings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holdings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `app_latest_version_ios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_latest_version_android` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `default_company_plan_id` int unsigned DEFAULT NULL,
  `default_spoten_fee_pix` double NOT NULL DEFAULT '1.1',
  `default_spoten_fee_debit` double NOT NULL DEFAULT '2.5',
  `default_spoten_fee_credit` json DEFAULT NULL,
  `default_spoten_fee_subscription` double NOT NULL DEFAULT '10',
  `default_spoten_fee_giftcard` double NOT NULL DEFAULT '10',
  `minimum_spoten_fee_pix` double DEFAULT NULL,
  `minimum_spoten_fee_credit` double DEFAULT NULL,
  `minimum_spoten_fee_debit` double DEFAULT NULL,
  `link_help_center` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_help_chat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_spoten_fee_fixed_debit_value` double NOT NULL DEFAULT '0.5',
  `default_spoten_fee_fixed_credit_value` double NOT NULL DEFAULT '0.5',
  `default_spoten_fee_fixed_pix_value` double NOT NULL DEFAULT '0.5',
  `status_service_aws_sms` tinyint(1) NOT NULL DEFAULT '1',
  `status_service_sendgrid_email` tinyint(1) NOT NULL DEFAULT '1',
  `status_service_twilio_sms` tinyint(1) NOT NULL DEFAULT '1',
  `gateway_fee_pix` double(8,2) NOT NULL DEFAULT '0.89',
  `gateway_fee_debit` double(8,2) NOT NULL DEFAULT '2.39',
  `gateway_fee_credit` json DEFAULT NULL,
  `gateway_fee_fixed_credit_value` double(8,2) NOT NULL DEFAULT '0.30',
  `gateway_fee_anticipation_of_receivables` double(8,2) NOT NULL DEFAULT '1.99',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `holdings_default_company_plan_id_foreign` (`default_company_plan_id`),
  CONSTRAINT `holdings_default_company_plan_id_foreign` FOREIGN KEY (`default_company_plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holdings`
--

LOCK TABLES `holdings` WRITE;
/*!40000 ALTER TABLE `holdings` DISABLE KEYS */;
INSERT INTO `holdings` VALUES (1,'Spoten','Supporting local businesses is easy and rewarding with Spoten.',NULL,NULL,'2023-08-30 18:51:13','2023-08-30 18:51:13',1,1.1,2.5,NULL,10,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.5,0.5,0.5,1,1,1,0.89,2.39,NULL,0.30,1.99,NULL,NULL);
/*!40000 ALTER TABLE `holdings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `introduction_steps`
--

DROP TABLE IF EXISTS `introduction_steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `introduction_steps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `introduction_steps_company_id_foreign` (`company_id`),
  CONSTRAINT `introduction_steps_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `introduction_steps`
--

LOCK TABLES `introduction_steps` WRITE;
/*!40000 ALTER TABLE `introduction_steps` DISABLE KEYS */;
/*!40000 ALTER TABLE `introduction_steps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_value` double(8,2) NOT NULL,
  `cashback_percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `voucher_payment_minimum_value` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `base` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `levels_holding_id_foreign` (`holding_id`),
  CONSTRAINT `levels_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,1,'Configuração Inicial - 5% Cashback',100.00,5.00,NULL,NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00',1);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `championship_id` int unsigned DEFAULT NULL,
  `home_team_id` int unsigned NOT NULL,
  `challenging_team_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `started_at` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `scoreboard_home` int DEFAULT NULL,
  `scoreboard_challenging` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matches_company_id_foreign` (`company_id`),
  KEY `matches_home_team_id_foreign` (`home_team_id`),
  KEY `matches_challenging_team_id_foreign` (`challenging_team_id`),
  KEY `matches_championship_id_foreign` (`championship_id`),
  CONSTRAINT `matches_challenging_team_id_foreign` FOREIGN KEY (`challenging_team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `matches_championship_id_foreign` FOREIGN KEY (`championship_id`) REFERENCES `championships` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `matches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matches_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=583 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_07_14_183253_ratings',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2020_07_30_111415_create_holdings_table',1),(7,'2020_07_30_112323_create_categories_table',1),(8,'2020_07_30_112329_create_levels_table',1),(9,'2020_07_30_112332_create_companies_table',1),(10,'2020_07_30_112336_create_status_payments_table',1),(11,'2020_07_30_112343_create_payments_table',1),(12,'2020_07_30_112349_create_category_company_table',1),(13,'2020_07_30_112355_create_applications_table',1),(14,'2020_07_30_112401_create_users_table',1),(15,'2020_07_30_112406_create_vouchers_table',1),(16,'2020_07_30_112411_create_check_ins_table',1),(17,'2020_07_30_112414_create_orders_table',1),(18,'2020_07_30_112418_create_feedbacks_table',1),(19,'2020_07_30_112422_create_type_feedbacks_table',1),(20,'2020_07_30_112426_create_grades_table',1),(21,'2020_08_03_085457_create_media_table',1),(22,'2020_08_14_123903_add_company_id_to_users_table',1),(23,'2020_08_14_162854_add_company_id_to_orders_table',1),(24,'2020_08_18_092533_add_percentage_to_levels_table',1),(25,'2020_08_21_183757_add_cashback_value_to_orders_table',1),(26,'2020_09_14_123720_add_is_confirmed_to_orders_table',1),(27,'2020_09_15_143614_alter_table_companies_alter_column_description',1),(28,'2020_09_17_103038_add_photo_to_companies_table',1),(29,'2020_09_30_154435_alter_column_companies_add_free_vouchers',1),(30,'2020_10_02_132518_alter_table_companies_set_photo_null',1),(31,'2020_10_02_150104_alter_table_categories_add_icon',1),(32,'2020_10_06_114913_alter_table_vouchers_add_code',1),(33,'2020_10_19_160736_alter_vouchers_table_add_expiration_date',1),(34,'2020_10_21_112337_alter_table_vouchers_add_is_used',1),(35,'2020_10_21_141549_alter_table_companies_add_is_active',1),(36,'2020_10_22_112400_alter_table_users_add_birth_date',1),(37,'2020_10_23_170856_create_push_notifications_table',1),(38,'2020_10_26_090149_add_push_device_id_to_users_table',1),(39,'2020_11_19_121341_create_user_company_table',1),(40,'2020_11_19_122547_remove_company_id_from_users_table',1),(41,'2020_12_02_113542_create_questions_table',1),(42,'2020_12_02_113827_create_answers_table',1),(43,'2020_12_02_134725_create_surveys_table',1),(44,'2020_12_02_160421_create_subscriptions_table',1),(45,'2020_12_02_161341_create_subscription_user_pivot_table',1),(46,'2020_12_02_165126_create_subscription_benefits_table',1),(47,'2020_12_07_160158_add_card_image_to_subscriptions_table',1),(48,'2020_12_07_172431_add_payment_link_to_subscriptions_table',1),(49,'2020_12_16_172432_add_pix_key_to_subscriptions_table',1),(50,'2020_12_16_172433_add_description_to_vouchers_table',1),(51,'2020_12_18_172434_add_extra_info_to_vouchers_table',1),(52,'2021_01_13_172435_add_order_id_to_payments_table',1),(53,'2021_01_13_172436_add_tax_cupon_to_payments_table',1),(54,'2021_01_13_172437_add_description_to_subscription_user_pivot_table',1),(55,'2021_01_27_172450_alter_table_grades_set_feedback_id',1),(56,'2021_01_27_172451_alter_table_user_company_set_user_id',1),(57,'2021_01_27_172452_alter_table_check_ins_set_user_id',1),(58,'2021_01_27_172453_alter_table_vouchers_set_user_id',1),(59,'2021_01_27_172454_alter_table_payments_set_user_id',1),(60,'2021_02_01_172455_add_user_id_to_survey_table',1),(61,'2021_02_03_172456_remove_voucher_id_from_orders_table',1),(62,'2021_02_03_172457_add_voucher_id_to_payments_table',1),(63,'2021_02_09_103455_create_modules_table',1),(64,'2021_02_09_104351_create_company_modules_table',1),(65,'2021_02_09_172455_add_user_id_to_grades_table',1),(66,'2021_02_10_173614_alter_table_users_alter_columns_nullable',1),(67,'2021_02_11_173615_remove_is_active_from_subscription_user_pivot_table',1),(68,'2021_02_16_172434_add_document_fields_to_users_table',1),(69,'2021_02_16_172435_add_color_to_companies_table',1),(70,'2021_02_18_172436_create_campaigns_table',1),(71,'2021_02_22_172438_add_start_date_to_vouchers_table',1),(72,'2021_02_23_172439_add_social_links_to_companies_table',1),(73,'2021_02_24_172440_add_campaign_id_to_vouchers_table',1),(74,'2021_02_24_172441_add_address_to_users_table',1),(75,'2021_03_02_154320_alter_table_payments_set_order_id',1),(76,'2021_03_02_172442_alter_email_nullable_to_users_table',1),(77,'2021_03_02_172443_create_sms_codes_table',1),(78,'2021_03_03_060338_alter_feedbacks_table_set_order_id',1),(79,'2021_03_03_093302_alter_voucher_table_set_expiration_date_type_datetime',1),(80,'2021_03_04_122311_alter_payments_table_add_cashback_value',1),(81,'2021_03_04_123005_alter_orders_table_remove_cashback_value',1),(82,'2021_03_04_172443_add_social_passwords_to_users_table',1),(83,'2021_03_08_172444_create_payment_with_subscription_table',1),(84,'2021_03_10_090149_add_email_image_to_campaigns_table',1),(85,'2021_03_10_160617_alter_campaigns_table_set_voucher_expires',1),(86,'2021_03_12_150949_alter_campaigns_table_set_keep_alive',1),(87,'2021_03_15_085457_drop_push_notifications_table',1),(88,'2021_03_16_111749_alter_campaigns_table_add_last_execution',1),(89,'2021_03_16_120709_alter_campaigns_table_set_is_active',1),(90,'2021_03_18_120634_create_campaign_log_table',1),(91,'2021_03_18_122056_drop_campaign_log_table',1),(92,'2021_03_18_122059_create_campaigns_log_table',1),(93,'2021_03_18_145012_alter_payments_table_rename_tax_cupon',1),(94,'2021_03_19_064328_alter_campaigns_log_table_add_company_id',1),(95,'2021_03_19_064609_alter_campaigns_log_table_set_campaign_id',1),(96,'2021_03_22_132716_alter_payments_table_set_credited_voucher',1),(97,'2021_03_22_172455_add_discount_to_payment_with_subscription_table',1),(98,'2021_03_22_172456_add_accepted_campaigns_to_users_table',1),(99,'2021_03_23_181341_create_company_customer_pivot_table',1),(100,'2021_03_24_171611_alter_campaigns_log_table_rename_voucher_id',1),(101,'2021_03_25_141142_alter_users_table_set_accepted_campaigns',1),(102,'2021_03_26_142729_alter_campaigns_log_table_set_voucher_code',1),(103,'2021_03_29_115835_alter_categories_table_add_parent_category',1),(104,'2021_03_29_121820_drop_category_company_table',1),(105,'2021_03_29_130514_alter_companies_table_add_category_id',1),(106,'2021_04_04_181749_alter_campaigns_log_table_add_auto_campaign_type',1),(107,'2021_04_08_176449_add_uuid_to_users_table',1),(108,'2021_04_08_176450_add_accepted_fields_to_users_table',1),(109,'2021_04_08_177699_alter_users_table_set_uuid',1),(110,'2021_04_13_090413_alter_payments_table_add_pagarme_transaction_id',1),(111,'2021_04_13_090413_alter_payments_table_set_pagarme_transaction_id',1),(112,'2021_04_13_150141_alter_users_table_set_photo_characters',1),(113,'2021_04_14_061953_alter_companies_tables_add_auto_accept_sales',1),(114,'2021_04_14_064807_alter_payments_table_add_is_accepted',1),(115,'2021_04_19_031916_create_cards_table',1),(116,'2021_04_27_090413_alter_users_table_add_imported_from',1),(117,'2021_04_30_480141_alter_users_table_set_phone_unique',1),(118,'2021_05_08_062336_alter_vouchers_table_set_voucher_code',1),(119,'2021_05_08_063529_alter_campaigns_log_table_set_voucher_code_to_uuid',1),(120,'2021_05_10_093750_create_jobs_table',1),(121,'2021_05_11_161142_alter_campaigns_table_set_varchar_size',1),(122,'2021_05_17_121704_alter_orders_table_drop_is_confirmed',1),(123,'2021_05_17_130126_alter_payments_table_add_generated_cashback',1),(124,'2021_05_18_122821_alter_companies_table_add_pix',1),(125,'2021_05_23_200406_alter_companies_table_set_latitude_longitude_default',1),(126,'2021_05_24_020553_alter_subscriptions_table_drop_subscription_period',1),(127,'2021_05_24_020622_alter_subscriptions_table_add_monthly_value',1),(128,'2021_05_24_020639_alter_subscriptions_table_add_yearly_value',1),(129,'2021_05_24_020813_alter_subscriptions_table_drop_price',1),(130,'2021_05_24_020845_alter_subscriptions_table_drop_payment_link',1),(131,'2021_05_24_020901_alter_subscriptions_table_drop_pix',1),(132,'2021_05_24_053852_alter_payments_table_add_stripe_transaction_id',1),(133,'2021_05_24_054001_alter_cards_table_add_stripe_card_id',1),(134,'2021_05_24_143050_alter_payments_table_set_stripe_nullable',1),(135,'2021_05_24_143113_alter_cards_table_set_stripe_nullable',1),(136,'2021_05_24_152432_create_giftcards_table',1),(137,'2021_05_24_155345_alter_vouchers_table_add_giftcard_id',1),(138,'2021_05_24_163620_alter_payments_table_add_subscription_id',1),(139,'2021_05_24_173352_alter_giftcards_table_add_validity',1),(140,'2021_05_25_161021_alter_payments_table_add_giftcard_id',1),(141,'2021_05_25_164112_alter_payments_table_rename_pagarme',1),(142,'2021_05_25_164124_alter_cards_table_rename_pagarme',1),(143,'2021_05_26_004315_create_disclose_logs_table',1),(144,'2021_05_27_144424_alter_payment_with_subscription_table_set_payment_id_foreign',1),(145,'2021_05_27_153833_create_plans_table',1),(146,'2021_05_27_153843_create_company_plan_table',1),(147,'2021_05_27_185001_add_indexes_company_dashboard',1),(148,'2021_05_27_210717_alter_companies_table_add_balance',1),(149,'2021_05_27_210810_alter_companies_table_add_free_shipments',1),(150,'2021_05_27_232420_alter_voucher_table_defaults',1),(151,'2021_06_01_085242_alter_company_plan_table_set_plan_id',1),(152,'2021_06_02_161115_alter_users_table_add_latlong_address',1),(153,'2021_06_07_025730_alter_company_plan_table_add_card_id',1),(154,'2021_06_07_025803_alter_company_plan_table_add_type',1),(155,'2021_06_07_032425_alter_company_plan_table_add_recharge_date',1),(156,'2021_06_07_103325_alter_company_plan_set_card_id',1),(157,'2021_06_08_163148_alter_payments_table_add_plan_id',1),(158,'2021_06_08_164213_alter_payments_table_add_balance',1),(159,'2021_06_09_013229_alter_company_plan_table_add_payment_method',1),(160,'2021_06_11_041101_alter_plans_table_rename_subcriptions',1),(161,'2021_06_11_041113_alter_company_plan_table_rename_subcriptions',1),(162,'2021_06_11_155015_alter_company_plan_table_rename_adicional_value',1),(163,'2021_06_11_160926_alter_company_table_add_trial_period',1),(164,'2021_06_14_021436_alter_companies_table_add_user_id',1),(165,'2021_06_14_040721_alter_user_company_rename_table',1),(166,'2021_06_14_074709_alter_plans_table_set_employees_nullable',1),(167,'2021_06_14_074722_alter_company_plan_table_set_employees_nullable',1),(168,'2021_06_14_075419_alter_plans_table_add_renewable',1),(169,'2021_06_14_075439_alter_company_plan_table_add_renewable',1),(170,'2021_06_14_075813_alter_plans_table_add_month_duration',1),(171,'2021_06_14_075839_alter_company_plan_table_add_month_duration',1),(172,'2021_06_14_080628_alter_plans_table_rename_month_duration',1),(173,'2021_06_14_080637_alter_company_plan_table_rename_month_duration',1),(174,'2021_06_14_082950_alter_company_plan_table_set_type_nullable',1),(175,'2021_06_16_103811_alter_levels_table_add_base',1),(176,'2021_06_16_161333_alter_companies_table_add_accepted_spoten_pay',1),(177,'2021_06_16_161500_alter_companies_table_add_accepted_membership_terms',1),(178,'2021_06_17_155651_alter_company_plan_table_add_id',1),(179,'2021_06_17_192409_alter_companies_table_set_phone_nullable',1),(180,'2021_06_18_205805_alter_vouchers_table_add_promotional',1),(181,'2021_06_21_100026_create_triggers_log_table',1),(182,'2021_06_21_234652_alter_subscriptions_table_add_limit',1),(183,'2021_06_22_095528_alter_vouchers_table_add_read',1),(184,'2021_06_22_100528_alter_giftcards_table_add_active',1),(185,'2021_06_22_172449_rename_subscription_user_table',1),(186,'2021_06_23_161441_alter_subscriptions_table_rename_limit',1),(187,'2021_06_23_161818_alter_subscriptions_table_set_quantity_vacancies_nullable_true',1),(188,'2021_06_23_202540_alter_subscriptions_table_drop_quantity_vacancies',1),(189,'2021_06_23_202551_alter_subscriptions_table_add_quantity_vacancies',1),(190,'2021_06_23_213433_alter_subscription_member_table_add_card_id',1),(191,'2021_06_24_021520_alter_vouchers_table_add_giver_user_id',1),(192,'2021_07_06_033020_alter_company_plan_add_automatic_renovation',1),(193,'2021_07_09_094424_alter_users_table_add_phone_verification_at',1),(194,'2021_07_09_102231_alter_companies_table_add_payment_menu_link',1),(195,'2021_07_13_155614_alter_vouchers_table_drop_foreign_campaign_id',1),(196,'2021_07_19_130744_add_spoten_fee_to_payments_table',1),(197,'2021_07_19_132642_add_spoten_fee_to_company_table',1),(198,'2021_07_22_132208_add_date_to_withdrawn_to_payments_table',1),(199,'2021_07_22_134316_add_days_to_withdrawn_credit_to_companies_table',1),(200,'2021_07_22_135138_add_days_to_withdrawn_pix_to_companies_table',1),(201,'2021_07_22_141853_add_days_to_withdrawn_debt_to_companies_table',1),(202,'2021_07_22_165537_alter_payments_table_add_type',1),(203,'2021_07_29_104134_alter_companies_table_add_payments_accepted',1),(204,'2021_07_29_135551_alter_companies_table_add_payments_declared',1),(205,'2021_07_30_101309_alter_payments_table_add_withdrawn_date',1),(206,'2021_07_30_112401_create_users_import_table',1),(207,'2021_08_04_102803_alter_companies_table_add_transaction_fees',1),(208,'2021_08_04_132733_alter_payments_table_update_spoten_fee',1),(209,'2021_08_05_111021_alter_companies_table_add_safe2pay',1),(210,'2021_08_05_113144_alter_users_table_add_reference',1),(211,'2021_08_06_100339_alter_plans_table_add_description',1),(212,'2021_08_09_140733_alter_company_plan_table_add_name',1),(213,'2021_08_09_140949_alter_company_plan_table_add_description',1),(214,'2021_08_10_111251_alter_holding_table_add_api_latest_version',1),(215,'2021_08_10_145647_alter_companies_table_set_document_unique',1),(216,'2021_08_10_160348_alter_companies_table_set_register_nullable',1),(217,'2021_08_11_100916_alter_plans_table_add_active',1),(218,'2021_08_12_160020_alter_company_plan_set_expiration_date_nullable',1),(219,'2021_08_12_160049_alter_company_plan_remove_type',1),(220,'2021_08_12_222027_alter_plans_table_add_holding_id',1),(221,'2021_08_12_222116_alter_holdings_table_add_default_company_plan_id',1),(222,'2021_08_16_200656_alter_companies_tables_add_profile_link',1),(223,'2021_08_18_151712_alter_payments_rename_type',1),(224,'2021_08_26_104126_alter_companies_table_add_payments_methods_customer',1),(225,'2021_08_27_153945_alter_levels_table_renme_value',1),(226,'2021_08_30_154404_create_personas_table',1),(227,'2021_08_31_123517_alter_levels_table_change_type_voucher_value_to_double',1),(228,'2021_08_31_165553_alter_subscription_benefits_table_add_presential',1),(229,'2021_09_01_110752_alter_payments_table_rename_is_confirmed',1),(230,'2021_09_01_150732_alter_companies_table_rename_accepted_payment_methods_checkin',1),(231,'2021_09_02_121653_add_is_active_to_subscriptions_table',1),(232,'2021_09_03_102407_alter_subscriptions_table_rename_active',1),(233,'2021_09_08_154734_alter_giftcards_table_add_name',1),(234,'2021_09_08_165617_alter_giftcards_table_rename_active',1),(235,'2021_09_09_100331_alter_subscription_member_table_set_expiration_date_datetime',1),(236,'2021_09_15_095034_drop_surveys_table',1),(237,'2021_09_15_095251_drop_answers_table',1),(238,'2021_09_15_095309_drop_questions_table',1),(239,'2021_09_15_095427_create_quizzes_table',1),(240,'2021_09_15_100334_create_questions_table_1509',1),(241,'2021_09_15_100903_create_alternatives_table',1),(242,'2021_09_15_101642_create_answers_new_table',1),(243,'2021_09_15_102308_create_answer_alternative_table',1),(244,'2021_09_15_103400_alter_company_plan_table_add_cancellation_date',1),(245,'2021_09_23_080553_alter_personas_table_add_frequent_day_and_age',1),(246,'2021_09_28_112114_add_is_cancelled_to_subscription_member_table',1),(247,'2021_10_01_170154_alter_personas_table_rename_path_photo',1),(248,'2021_10_01_202728_alter_personas_table_alter_type_frequent_day',1),(249,'2021_10_04_063159_alter_answers_table_set_on_question_id',1),(250,'2021_10_04_063733_alter_alternatives_table_set_on_question_id',1),(251,'2021_10_05_155925_create_table_tags',1),(252,'2021_10_05_160942_create_table_tag_customer',1),(253,'2021_10_06_155841_alter_monthly_value_table_subscriptions',1),(254,'2021_10_06_170737_alter_users_table_add_deleted_at',1),(255,'2021_10_06_172811_alter_table_companies_add_deleted_at',1),(256,'2021_10_08_085433_alter_cards_table_add_document',1),(257,'2021_10_18_112114_add_is_follower_to_company_customer_table',1),(258,'2021_10_18_155841_add_config_recharge_in_table_companies',1),(259,'2021_10_21_170626_add_image_to_plans_table',1),(260,'2021_10_25_105920_create_giftcard_category_table',1),(261,'2021_10_25_110856_alter_giftcards_table_add_giftcard_category_fk',1),(262,'2021_10_26_083311_alter_payments_table_add_receiver_id',1),(263,'2021_10_26_090144_alter_payments_table_add_giftcard_description',1),(264,'2021_10_26_155841_add_limit_columns_to_table_giftcards',1),(265,'2021_10_26_173756_create_table_promotional_codes',1),(266,'2021_10_27_095221_create_table_promo_code_company',1),(267,'2021_10_27_172145_add_promo_code_id_to_vouchers_table',1),(268,'2021_10_28_132208_add_spoten_grade_to_feedbacks_table',1),(269,'2021_10_28_173353_alter_giftcards_table_add_photo',1),(270,'2021_11_03_170244_alter_giftcards_table_add_instructions',1),(271,'2021_11_04_143516_alter_subscription_menber_table_add_automatic_renovation',1),(272,'2021_11_04_150636_alter_campaign_table_add_giftcard_id',1),(273,'2021_11_04_190243_alter_giftcard_table_add_subscription_id',1),(274,'2021_11_08_153626_alter_vouchers_table_add_minimum_value_of_order',1),(275,'2021_11_08_175449_alter_campaigns_table_add_minimum_value_of_order',1),(276,'2021_11_09_164600_alter_vouchers_table_add_generated_by_payment_id',1),(277,'2021_11_10_161113_alter_giftcards_table_rename_validaty',1),(278,'2021_11_10_174547_alter_giftcards_table_add_validity_date_and_change_validity_days',1),(279,'2021_11_23_192851_create_campaign_dispatches_table',1),(280,'2021_11_23_193720_alter_campaigns_log_table_rename_table',1),(281,'2021_11_23_223957_alter_communication_dispatches_table_add_campaign_dispatch_id',1),(282,'2021_11_23_225106_alter_campaign_dispatches_table_add_company_id',1),(283,'2021_11_24_082951_create_suggestions_table',1),(284,'2021_11_24_133321_add_billing_configuration_to_plans_table',1),(285,'2021_11_25_075726_add_billing_configuration_to_company_plan_table',1),(286,'2021_11_25_135532_create_promotional_code_user_table',1),(287,'2021_11_25_174356_add_spoten_fee_columns_to_table_holdings',1),(288,'2021_11_27_124820_alter_companies_table_add_bank_data',1),(289,'2021_11_27_153858_alter_payments_table_rename_giftcard_description',1),(290,'2021_11_30_131750_alter_subscription_member_add_period',1),(291,'2021_11_30_131758_alter_subscription_member_add_method',1),(292,'2021_11_30_150136_add_slug_to_companies_table',1),(293,'2021_11_30_221018_alter_payments_table_add_subscription_period',1),(294,'2021_11_30_221243_alter_subscription_member_table_add_generated_by_payment_id',1),(295,'2021_11_30_222647_alter_payments_table_add_card_id',1),(296,'2021_12_01_135459_alter_company_plan_table_add_generated_by_payment_id',1),(297,'2021_12_03_085428_alter_table_companies_slug_field',1),(298,'2021_12_03_131029_alter_promotional_codes_table_change_code_unique_to_true',1),(299,'2021_12_03_131414_alter_promotional_codes_table_drop_photo',1),(300,'2021_12_03_133219_alter_promotional_code_company_table_add_voucher_description',1),(301,'2021_12_03_133231_alter_promotional_code_company_table_rename_validity_days',1),(302,'2021_12_04_151839_alter_promotional_code_company_set_nullable_voucher_description',1),(303,'2021_12_05_161412_alter_promotional_code_company_drop_validity_days',1),(304,'2021_12_05_161456_alter_promotional_code_company_add_expiration_date',1),(305,'2021_12_05_175019_alter_company_customer_table_set_is_follower_default_false',1),(306,'2021_12_07_121238_alter_users_table_add_stripe_customer_id',1),(307,'2021_12_08_161819_create_notifications_table',1),(308,'2021_12_10_164329_create_voucher_categories_table',1),(309,'2021_12_10_164611_alter_vouchers_table_add_category_id',1),(310,'2021_12_13_125227_change_expiration_date_to_accpet_null_in_vouchers_table',1),(311,'2021_12_14_092047_alter_company_plan_set_default_payment_method',1),(312,'2021_12_14_100509_alter_users_table_remove_unique_key',1),(313,'2021_12_15_155652_alter_company_plan_table_set_foreign_key_card_id',1),(314,'2021_12_15_161535_alter_payments_table_set_foreign_key_card_id',1),(315,'2021_12_15_163151_alter_subscription_member_table_set_foreign_key_card_id',1),(316,'2021_12_16_115943_alter_company_plan_table_set_nullable_payment_method',1),(317,'2021_12_21_095408_alter_giftcard_categories_table_set_nullable_photo',1),(318,'2021_12_24_075223_create_carts_table',1),(319,'2021_12_24_080447_create_cart_products',1),(320,'2021_12_27_102101_alter_payments_table_create_cart_id',1),(321,'2021_12_28_155206_alter_payments_table_add_gateway_name',1),(322,'2021_12_28_155217_alter_payments_table_add_gateway_transaction_id',1),(323,'2021_12_29_021906_alter_companies_table_drop_safe2pay_id_token',1),(324,'2021_12_29_022008_alter_companies_table_add_safe2pay_id',1),(325,'2021_12_29_022023_alter_companies_table_add_stripe_id',1),(326,'2021_12_30_233621_alter_companies_table_rename_safe2pay_id',1),(327,'2021_12_30_233630_alter_companies_table_rename_stripe_id',1),(328,'2022_01_04_162000_create_tags_table',1),(329,'2022_01_07_132518_alter_campaigns_table_add_max_sending',1),(330,'2022_01_08_230654_alter_companies_table_drop_spoten_fee_order_pix',1),(331,'2022_01_08_230743_alter_companies_table_drop_spoten_fee_order_debit',1),(332,'2022_01_08_230755_alter_companies_table_drop_spoten_fee_order_credit',1),(333,'2022_01_08_230818_alter_companies_table_drop_spoten_fee_subscription',1),(334,'2022_01_08_230833_alter_companies_table_drop_spoten_fee_giftcard',1),(335,'2022_01_09_052356_alter_payments_table_add_gateway_splitted_value',1),(336,'2022_01_09_052436_alter_companies_table_drop_days_withdraw_debit',1),(337,'2022_01_09_052446_alter_companies_table_drop_days_withdraw_pix',1),(338,'2022_01_09_052500_alter_companies_table_drop_days_withdraw_credit',1),(339,'2022_01_09_052558_alter_companies_table_drop_free_vouchers',1),(340,'2022_01_11_101244_alter_company_plan_table_set_nullable_false_payment_method',1),(341,'2022_01_13_172037_alter_companies_table_add_email_financial',1),(342,'2022_01_14_082538_alter_companies_table_add_installment',1),(343,'2022_01_18_141019_alter_payments_table_add_installment',1),(344,'2022_01_19_150857_create_subscription_invitation_table',1),(345,'2022_01_19_173006_add_type_to_disclose_logs_table',1),(346,'2022_01_20_192023_alter_payments_table_add_gateway_split_fee',1),(347,'2022_01_24_082330_alter_subscriptions_table_add_is_active_waiting_list',1),(348,'2022_01_26_154438_alter_payments_table_add_subscription_invitation_id',1),(349,'2022_01_26_180224_alter_payments_table_add_subscription_invitation_id_foreign_key',1),(350,'2022_01_27_102402_alter_vouchers_table_set_default_expiration_date',1),(351,'2022_02_02_233153_alter_payments_table_add_is_processed',1),(352,'2022_02_04_020132_alter_promotional_code_company_table_drop_foreign_key',1),(353,'2022_02_04_020540_alter_promotional_code_company_table_rename_table_promotional_code_vouchers',1),(354,'2022_02_04_021358_alter_promotional_code_vouchers_table_add_foreign_key',1),(355,'2022_02_04_022508_alter_promotional_code_vouchers_table_add_payment_minimum_value',1),(356,'2022_02_04_023009_alter_promotional_code_vouchers_table_rename_voucher_value',1),(357,'2022_02_04_023021_alter_promotional_code_vouchers_table_rename_voucher_description',1),(358,'2022_02_04_023048_alter_promotional_code_vouchers_table_rename_voucher_expiration_date',1),(359,'2022_02_05_142942_alter_payments_table_rename_gateway_splitted_value',1),(360,'2022_02_05_142944_alter_users_unique_fields',1),(361,'2022_02_14_144618_create_giftcard_usage_restrictions_table',1),(362,'2022_02_15_103101_alter_giftcards_table_add_is_product',1),(363,'2022_02_15_115457_add_payment_minimum_value_to_levels_table',1),(364,'2022_02_17_144950_alter_promotional_code_vouchers_add_product_and_giftcard',1),(365,'2022_02_21_044624_alter_vouchers_drop_is_used_and_is_sold',1),(366,'2022_02_21_045355_update_vouchers_table_is_redeemed',1),(367,'2022_02_21_045356_alter_vouchers_rename_is_redeemed',1),(368,'2022_02_21_045357_update_vouchers_table_redeemed_at',1),(369,'2022_02_22_135425_alter_vouchers_table_add_product_id',1),(370,'2022_02_23_075421_alter_promotional_code_user_table_drop_foreign',1),(371,'2022_02_23_075515_alter_promotional_code_user_table_rename_to_promotional_code_redeem',1),(372,'2022_02_23_075754_alter_promotional_code_redeems_table_add_foreign',1),(373,'2022_02_23_084018_alter_promotional_code_vouchers_table_set_value_nullable_true',1),(374,'2022_03_02_185257_alter_companies_table_remove_unique_key',1),(375,'2022_03_03_140240_add_minimums_fee_to_holdings_table',1),(376,'2022_03_08_164514_add_links_utils_to_holdings_table',1),(377,'2022_03_09_114712_alter_holdings_table_rename_default_spoten_fee_order_pix',1),(378,'2022_03_09_115221_alter_holdings_table_rename_default_spoten_fee_order_credit',1),(379,'2022_03_09_115227_alter_holdings_table_rename_default_spoten_fee_order_debit',1),(380,'2022_03_10_201408_alter_holdings_table_add_default_spoten_fee_value_fixed',1),(381,'2022_03_10_201839_alter_payments_table_add_spoten_fee_fixed_value',1),(382,'2022_03_16_105921_alter_payment_table_add_error_message',1),(383,'2022_03_16_120306_add_user_id_to_communication_dispatches_table',1),(384,'2022_03_17_133428_create_payment_postbacks_table',1),(385,'2022_03_18_113309_alter_company_customer_add_comments',1),(386,'2022_03_18_180847_alter_sms_codes_table_rename_authentication_codes',1),(387,'2022_03_18_181320_alter_authentication_codes_table_add_email',1),(388,'2022_03_27_022252_create_procedure_update_payments_table_set_gateway_split_fee',1),(389,'2022_03_29_135559_add_status_service_to_holdins_table',1),(390,'2022_03_31_182637_alter_communication_dispatches_table_change_order_columns',1),(391,'2022_04_04_150802_alter_card_table_add_iugu_card_id',1),(392,'2022_04_05_101157_alter_users_table_add_iugu_client_id',1),(393,'2022_04_06_120306_auto_campaigns',1),(394,'2022_04_06_153914_create_auto_campaign_company_table',1),(395,'2022_04_08_134553_insert_new_status_in_status_payments',1),(396,'2022_04_11_101114_alter_company_table_add_subaccount_columns_iugu',1),(397,'2022_04_11_133659_alter_companies_table_add_iugu_account_id',1),(398,'2022_04_13_153907_add_notifications_to_companies_table',1),(399,'2022_04_14_132105_alter_vouchers_table_rename_promotional',1),(400,'2022_04_14_132802_alter_vouchers_table_drop_start_date',1),(401,'2022_04_14_145416_alter_companies_table_drop_foreign_category_id',1),(402,'2022_04_14_145517_alter_companies_table_rename_category_id',1),(403,'2022_04_14_150131_alter_categories_table_drop_foreign_parent_category_id',1),(404,'2022_04_14_150342_alter_categories_table_rename_parent_category_id',1),(405,'2022_04_14_150636_rename_categories_table',1),(406,'2022_04_14_150824_alter_companies_table_add_foreign_company_category_id',1),(407,'2022_04_14_151000_alter_company_categories_table_add_foreign_parent_company_category_id',1),(408,'2022_04_15_101706_add_working_time_to_companies_table',1),(409,'2022_04_15_134746_alter_giftcards_table_add_voucher_cateory_id',1),(410,'2022_04_18_130938_alter_campaigns_table_drop_foreign_giftcard_id',1),(411,'2022_04_18_131056_alter_campaigns_table_rename_giftcard_id',1),(412,'2022_04_18_131425_alter_campaigns_table_add_foreign_giftcard_id',1),(413,'2022_04_18_131650_alter_campaigns_table_add_voucher_product_id',1),(414,'2022_04_20_101535_crate_company_followers_table',1),(415,'2022_04_22_132731_alter_payment_postbacks_table_rename_response',1),(416,'2022_04_22_132911_alter_payment_postbacks_add_ip',1),(417,'2022_04_26_101931_update_companies_table_set_iugu_data',1),(418,'2022_04_28_104942_alter_giftcards_table_add_purchase',1),(419,'2022_05_02_185423_alter_companies_table_set_foreign_recharge_balance_with_card_id',1),(420,'2022_05_02_190000_delete_cards_iugu_card_id_is_null',1),(421,'2022_05_03_133023_delete_payments_of_voucher_redeem',1),(422,'2022_05_03_212706_alter_holdings_table_rename_app_latest_version',1),(423,'2022_05_03_212752_alter_holdings_table_add_app_latest_version_android',1),(424,'2022_05_04_172701_alter_default_spoten_fee_fixed_value_to_holdings_table',1),(425,'2022_05_05_190224_alter_holdings_table_drop_default_spoten_fee_fixed_value',1),(426,'2022_05_09_133430_create_company_subscriptions_partner_table',1),(427,'2022_05_12_115023_alter_communication_dispatches_rename_auto_campaign_type',1),(428,'2022_05_12_115152_alter_communication_dispatches_add_campaign_automatic_id',1),(429,'2022_05_18_214327_alter_payments_table_add_product_id',1),(430,'2022_05_18_215614_alter_cart_product_table_drop_foreign_receiver_user_id',1),(431,'2022_05_18_215624_alter_cart_product_table_drop_foreign_cart_id',1),(432,'2022_05_18_215948_alter_cart_product_table_rename_to_cart_items',1),(433,'2022_05_18_220118_alter_cart_items_table_add_foreign_cart_id',1),(434,'2022_05_18_220223_alter_cart_items_table_add_foreign_receiver_user_id',1),(435,'2022_05_18_220457_alter_cart_items_table_add_foreign_giftcard_id',1),(436,'2022_05_18_220618_alter_cart_items_table_add_product_id',1),(437,'2022_05_18_220954_alter_cart_items_table_set_nullable_true_giftcard_id',1),(438,'2022_05_23_103250_add_is_reversed_to_payment_table',1),(439,'2022_05_24_144837_import_customers_to_company_followers_table',1),(440,'2022_06_01_100351_alter_payments_table_alter_type_withdraw_date',1),(441,'2022_06_03_104134_alter_company_customer_table_drop_accepted_comunication',1),(442,'2022_06_03_130804_alter_users_table_add_push_token',1),(443,'2022_06_06_120549_alter_feedbacks_table',1),(444,'2022_06_10_204425_alter_users_table_drop_push_device_id',1),(445,'2022_06_19_222235_add_anchor_to_companies_table',1),(446,'2022_06_19_232323_create_teams_table',1),(447,'2022_06_19_234240_create_matches_table',1),(448,'2022_06_24_003130_create_company_partners_table',1),(449,'2022_06_24_024341_create_players_table',1),(450,'2022_06_24_034454_create_news_table',1),(451,'2022_06_24_041333_add_matches_to_giftcards_table',1),(452,'2022_06_24_043030_add_scoreboard_to_matches_table',1),(453,'2022_06_30_142847_create_campaign_categories_table',1),(454,'2022_06_30_143426_alter_campaigns_table_add_campaign_category_id',1),(455,'2022_07_04_161827_add_facebook_to_companies_table',1),(456,'2022_07_05_025008_create_sponsors_table',1),(457,'2022_07_05_025152_create_banners_table',1),(458,'2022_07_05_031633_alter_color_to_companies_table',1),(459,'2022_07_05_033447_add_image_to_subscription_benefits_table',1),(460,'2022_07_07_155211_create_transactions_table',1),(461,'2022_07_07_163214_add_balance_to_users_table',1),(462,'2022_07_07_204355_alter_payments_table_add_company_plan_id',1),(463,'2022_07_07_210600_alter_payments_table_add_subscription_member_id',1),(464,'2022_07_08_130536_alter_subscription_member_table_add_is_active',1),(465,'2022_07_12_092537_alter_into_to_subscription_member_table',1),(466,'2022_07_13_161640_alter_payments_table_add_used_wallet_balance_value',1),(467,'2022_07_14_041228_create_steps_table',1),(468,'2022_07_14_043639_add_fields_app_to_companies_table',1),(469,'2022_07_20_090816_add_price_to_communication_dispatches_table',1),(470,'2022_07_27_151019_alter_tag_customer_table_rename_customer_tags',1),(471,'2022_07_28_160656_create_company_positions_table',1),(472,'2022_07_31_180449_insert_permissions_table_employee_permissions',1),(473,'2022_07_31_210414_alter_company_employee_table_add_company_position_id',1),(474,'2022_08_02_082310_add_is_accpect_to_company_employee_table',1),(475,'2022_08_04_100952_alter_feedbacks_table_set_nullable_spoten_grade',1),(476,'2022_08_04_104522_alter_grades_table_rename_grade',1),(477,'2022_08_10_184258_alter_customer_tags_table_drop_foreigns',1),(478,'2022_08_10_184545_rename_customer_tags_table',1),(479,'2022_08_10_184703_alter_company_customer_tags_table_rename_user_id',1),(480,'2022_08_10_184828_alter_company_customer_tags_table_add_foreigns',1),(481,'2022_08_10_194622_alter_users_table_drop_foreign_imported_from',1),(482,'2022_08_10_194745_alter_users_table_rename_imported_from',1),(483,'2022_08_10_194920_alter_users_table_add_foreign_imported_from_company_id',1),(484,'2022_08_25_094626_alter_notifications_table_add_is_read',1),(485,'2022_08_29_171439_alter_companies_table_add_privacy_policy_link',1),(486,'2022_08_29_182515_alter_holdings_table_add_gateway_fees',1),(487,'2022_08_29_190921_update_holdings_table_set_gateway_fee_credit',1),(488,'2022_08_29_191852_alter_holdings_table_change_default_spoten_fee_credit',1),(489,'2022_08_29_192443_update_holdings_table_set_default_spoten_fee_credit',1),(490,'2022_08_29_230830_alter_payments_table_add_gateway_fee',1),(491,'2022_08_29_230836_alter_payments_table_add_gateway_fee_fixed_value',1),(492,'2022_09_13_125748_alter_payments_table_add_gateway_split_fee_value',1),(493,'2022_09_16_131943_alter_payments_table_add_gateway_account_api_token',1),(494,'2022_09_16_134351_alter_companies_table_add_terms_of_use_link',1),(495,'2022_09_16_190445_alter_matches_table_set_nullable_comment',1),(496,'2022_09_20_124925_alter_giftcards_table_add_softdelete',1),(497,'2022_09_20_134359_alter_subscriptions_table_add_value',1),(498,'2022_09_20_135328_alter_subscriptions_table_add_expired_at',1),(499,'2022_09_20_135848_alter_subscriptions_table_add_duration_days',1),(500,'2022_09_20_200249_alter_subscriptions_table_add_is_allow_renovation',1),(501,'2022_09_20_201920_alter_subscriptions_table_set_value_nullable_false',1),(502,'2022_09_20_202133_alter_subscriptions_table_drop_monthly_value',1),(503,'2022_09_20_202145_alter_subscriptions_table_drop_yearly_value',1),(504,'2022_09_20_223221_alter_subscription_member_table_drop_period',1),(505,'2022_09_20_223928_alter_payments_table_drop_subscription_period',1),(506,'2022_09_20_225414_alter_matches_table_add_softdelete',1),(507,'2022_09_21_163535_alter_companies_table_add_cover_image',1),(508,'2022_09_27_150945_alter_matches_table_add_started_at',1),(509,'2022_09_27_182904_alter_companies_table_drop_privacy_policy_link',1),(510,'2022_09_27_183034_alter_companies_table_drop_terms_of_use_link',1),(511,'2022_09_27_183155_alter_companies_table_add_again_terms_of_use_link',1),(512,'2022_09_27_183205_alter_companies_table_add_again_privacy_policy_link',1),(513,'2022_09_29_150744_alter_quizzes_table_add_product_id',1),(514,'2022_09_29_151120_alter_quizzes_table_set_nullable_true_subscription_id',1),(515,'2022_09_29_151523_alter_quizzes_table_add_giftcard_id',1),(516,'2022_09_30_144956_alter_notifications_table_add_payload',1),(517,'2022_10_08_184217_update_payments_table_set_product_id',1),(518,'2022_10_13_114450_create_quiz_submissions_table',1),(519,'2022_10_13_120203_alter_answers_table_add_quiz_submission_id',1),(520,'2022_10_14_171055_create_requests_log_table',1),(521,'2022_10_17_151551_alter_subscriptions_table_add_commercial_description',1),(522,'2022_10_17_230035_alter_giftcards_table_change_description_and_instructions_to_text',1),(523,'2022_10_24_133257_alter_cart_items_table_change_value_to_float',1),(524,'2022_10_25_162951_alter_grades_table_drop_user_id',1),(525,'2022_10_25_183613_alter_feedbacks_table_drop_order_id',1),(526,'2022_10_25_192005_alter_type_feedbacks_table_drop_foreign_holding_id',1),(527,'2022_10_25_192740_alter_grades_table_drop_foreign_feedback_id_and_type_feedback_id',1),(528,'2022_10_25_192924_rename_type_feedbacks_table',1),(529,'2022_10_25_193106_alter_feedback_types_table_add_foreign_holding_id',1),(530,'2022_10_25_193254_rename_grades_table',1),(531,'2022_10_25_193353_alter_feedback_grades_table_rename_type_feedback_id',1),(532,'2022_10_25_193554_alter_feedback_grades_table_add_foreign_feedback_id_and_feedback_type_id',1),(533,'2022_10_27_190710_alter_answers_table_drop_user_id',1),(534,'2022_10_31_190036_alter_quiz_submissions_table_add_subscription_member_id',1),(535,'2022_10_31_191411_alter_quiz_submissions_table_add_cart_item_id',1),(536,'2022_10_31_191445_alter_quiz_submissions_table_add_payment_id',1),(537,'2022_10_31_195329_update_quiz_submissions_table_set_subscription_member_id',1),(538,'2022_11_01_142439_alter_notifications_table_add_company_id',1),(539,'2022_11_01_142903_create_device_tokens_table',1),(540,'2022_11_01_151144_alter_users_table_drop_push_device_tokens',1),(541,'2022_11_01_155437_altere_payments_table_add_company_anchor_id',1),(542,'2022_11_25_152907_alter_giftcards_table_add_accepted_payment_methods',1),(543,'2022_11_25_153008_alter_subscriptions_table_add_accepted_payment_methods',1),(544,'2022_12_14_160204_alter_promotional_code_vouchers_table_set_nullable_true_expiration_date',1),(545,'2022_12_14_161032_alter_promotional_code_vouchers_table_set_default_expiration_date',1),(546,'2022_12_14_180839_alter_vouchers_table_set_nullable_true_user_id',1),(547,'2022_12_20_161801_alter_cart_items_table_set_foreign_on_delete_and_on_update',1),(548,'2023_01_09_184651_alter_company_customer_table_add_uuid',1),(549,'2023_01_09_185657_alter_company_customer_table_set_nullable_false_uuid',1),(550,'2023_01_10_131103_alter_company_customer_table_drop_unique_uuid',1),(551,'2023_01_10_131401_alter_company_customer_table_set_nullable_true_uuid',1),(552,'2023_01_26_144156_alter_company_partners_add_has_public_store',1),(553,'2023_02_13_155646_alter_companies_table_add_cloud_functions_url',1),(554,'2023_02_17_224101_alter_users_table_set_default_accepted_fields',1),(555,'2023_02_22_180809_alter_news_table_add_embed_url',1),(556,'2023_02_22_211013_alter_campaigns_table_set_scheduled_hour_to_time_type',1),(557,'2023_03_06_170240_alter_campaigns_table_add_vouchers',1),(558,'2023_03_09_131231_alter_holdings_table_add_logo',1),(559,'2023_03_09_133333_alter_holdings_table_add_background_image',1),(560,'2023_03_16_182419_alter_device_tokens_table_add_unique_key_value',1),(561,'2023_03_22_153539_alter_companies_table_add_onelink_link',1),(562,'2023_04_10_204359_alter_vouchers_table_add_redeemed_by_user_id',1),(563,'2023_04_24_152330_alter_giftcard_categories_table_add_deleted_at',1),(564,'2023_04_24_152712_alter_giftcard_categories_set_nullable_true_description',1),(565,'2023_05_05_192951_alter_questions_table_add_deleted_at',1),(566,'2023_05_09_100705_create_championships_table',1),(567,'2023_05_09_132947_alter_matches_table_add_championship_id',1),(568,'2023_05_09_164914_create_rosters_table',1),(569,'2023_05_10_114905_alter_players_table_add_roster_id',1),(570,'2023_05_10_133515_alter_goftcards_table_add_insurance_policy_column',1),(571,'2023_05_18_092332_alter_championships_table_add_deleted_at',1),(572,'2023_05_24_112904_alter_matches_add_link_column',1),(573,'2023_05_30_003808_alter_championships_table_add_is_active',1),(574,'2023_05_30_003853_alter_rosters_table_add_is_active',1),(575,'2023_05_30_133043_alter_matches_table_set_default_true_is_active',1),(576,'2023_06_05_191052_create_events_table',1),(577,'2023_06_05_192151_alter_giftcards_table_add_event_id',1),(578,'2023_06_05_192612_alter_events_table_add_deleted_at',1),(579,'2023_06_12_160441_alter_subscription_member_add_installments_quantity',1),(580,'2023_06_26_205215_alter_events_table_add_photo',1),(581,'2023_08_30_155743_create_permission_tables',1),(582,'2023_08_30_184554_add_display__name_to_roles_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
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
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',51),(3,'App\\Models\\User',52),(3,'App\\Models\\User',53),(4,'App\\Models\\User',54),(4,'App\\Models\\User',55),(4,'App\\Models\\User',56);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_base_config` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_company_id_foreign` (`company_id`),
  CONSTRAINT `news_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` json DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  `company_anchor_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  KEY `notifications_company_anchor_id_foreign` (`company_anchor_id`),
  CONSTRAINT `notifications_company_anchor_id_foreign` FOREIGN KEY (`company_anchor_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `value` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_company_id_foreign` (`company_id`),
  CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
-- Table structure for table `payment_postbacks`
--

DROP TABLE IF EXISTS `payment_postbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_postbacks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int unsigned NOT NULL,
  `body` json NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_postbacks_payment_id_foreign` (`payment_id`),
  CONSTRAINT `payment_postbacks_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_postbacks`
--

LOCK TABLES `payment_postbacks` WRITE;
/*!40000 ALTER TABLE `payment_postbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_postbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_with_subscription`
--

DROP TABLE IF EXISTS `payment_with_subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_with_subscription` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int unsigned NOT NULL,
  `subscription_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_with_subscription_subscription_id_foreign` (`subscription_id`),
  KEY `payment_with_subscription_payment_id_foreign` (`payment_id`),
  CONSTRAINT `payment_with_subscription_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payment_with_subscription_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_with_subscription`
--

LOCK TABLES `payment_with_subscription` WRITE;
/*!40000 ALTER TABLE `payment_with_subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_with_subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `credited_voucher_id` int unsigned DEFAULT NULL,
  `used_voucher_id` int unsigned DEFAULT NULL,
  `company_id` int unsigned NOT NULL,
  `company_anchor_id` int unsigned DEFAULT NULL,
  `status_payment_id` int unsigned NOT NULL,
  `spoten_fee` decimal(8,2) NOT NULL,
  `spoten_fee_fixed_value` double NOT NULL DEFAULT '0',
  `withdraw_date` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdrawn_date` datetime DEFAULT NULL,
  `value` double NOT NULL,
  `used_wallet_balance_value` decimal(8,2) DEFAULT NULL,
  `cashback_value` double NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `tax_coupon` text COLLATE utf8mb4_unicode_ci,
  `safe2pay_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `generated_cashback` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int unsigned DEFAULT NULL,
  `subscription_member_id` int unsigned DEFAULT NULL,
  `subscription_invitation_id` int unsigned DEFAULT NULL,
  `giftcard_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_user_id` int unsigned DEFAULT NULL,
  `plan_id` int unsigned DEFAULT NULL,
  `company_plan_id` int unsigned DEFAULT NULL,
  `balance` tinyint(1) NOT NULL DEFAULT '0',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment_fee` double DEFAULT NULL,
  `customer_pay_installment_fees` tinyint(1) DEFAULT NULL,
  `installments_quantity` int DEFAULT NULL,
  `card_id` int unsigned DEFAULT NULL,
  `cart_id` int unsigned DEFAULT NULL,
  `gateway_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_account_api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_response` json DEFAULT NULL,
  `gateway_splitted` tinyint(1) NOT NULL DEFAULT '0',
  `gateway_split_fee` double DEFAULT NULL,
  `gateway_split_fee_value` double(8,2) DEFAULT NULL,
  `gateway_fee` double(8,2) DEFAULT NULL,
  `gateway_fee_fixed_value` double(8,2) DEFAULT NULL,
  `is_processed` tinyint(1) NOT NULL DEFAULT '0',
  `is_reversed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `payments_company_id_foreign` (`company_id`),
  KEY `payments_status_payment_id_foreign` (`status_payment_id`),
  KEY `payments_user_id_foreign` (`user_id`),
  KEY `payments_used_voucher_id_foreign` (`used_voucher_id`),
  KEY `payments_credited_voucher_id_foreign` (`credited_voucher_id`),
  KEY `payments_order_id_foreign` (`order_id`),
  KEY `payments_subscription_id_foreign` (`subscription_id`),
  KEY `payments_giftcard_id_foreign` (`giftcard_id`),
  KEY `payments_plan_id_foreign` (`plan_id`),
  KEY `payments_receiver_user_id_foreign` (`receiver_user_id`),
  KEY `payments_card_id_foreign` (`card_id`),
  KEY `payments_cart_id_foreign` (`cart_id`),
  KEY `payments_subscription_invitation_id_foreign` (`subscription_invitation_id`),
  KEY `payments_product_id_foreign` (`product_id`),
  KEY `payments_company_plan_id_foreign` (`company_plan_id`),
  KEY `payments_subscription_member_id_foreign` (`subscription_member_id`),
  KEY `payments_company_anchor_id_foreign` (`company_anchor_id`),
  CONSTRAINT `payments_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `payments_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  CONSTRAINT `payments_company_anchor_id_foreign` FOREIGN KEY (`company_anchor_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `payments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_company_plan_id_foreign` FOREIGN KEY (`company_plan_id`) REFERENCES `company_plan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `payments_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`),
  CONSTRAINT `payments_receiver_user_id_foreign` FOREIGN KEY (`receiver_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `payments_status_payment_id_foreign` FOREIGN KEY (`status_payment_id`) REFERENCES `status_payments` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_subscription_invitation_id_foreign` FOREIGN KEY (`subscription_invitation_id`) REFERENCES `subscription_invitations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `payments_subscription_member_id_foreign` FOREIGN KEY (`subscription_member_id`) REFERENCES `subscription_member` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `payments_used_voucher_id_foreign` FOREIGN KEY (`used_voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `frequent_day` int NOT NULL,
  `medium_ticket` double NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_company_id_foreign` (`company_id`),
  CONSTRAINT `personas_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double NOT NULL,
  `months_free_trial` int NOT NULL DEFAULT '0',
  `vouchers` tinyint(1) NOT NULL DEFAULT '0',
  `surveys` tinyint(1) NOT NULL DEFAULT '0',
  `giftcards` tinyint(1) NOT NULL DEFAULT '0',
  `subscriptions` tinyint(1) NOT NULL DEFAULT '0',
  `spoten_pay` tinyint(1) NOT NULL DEFAULT '0',
  `individual_shipments` tinyint(1) NOT NULL DEFAULT '0',
  `scheduling_shipments` tinyint(1) NOT NULL DEFAULT '0',
  `customers` int NOT NULL,
  `customers_price` double NOT NULL,
  `free_shipments` int NOT NULL,
  `employees` int DEFAULT NULL,
  `mail_price` double NOT NULL,
  `sms_price` double NOT NULL,
  `push_price` double NOT NULL,
  `whatsapp_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `renewable` tinyint(1) NOT NULL DEFAULT '1',
  `months_duration` int NOT NULL DEFAULT '1',
  `holding_id` int unsigned DEFAULT NULL,
  `spoten_fee_configurations` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plans_holding_id_foreign` (`holding_id`),
  CONSTRAINT `plans_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (1,1,'FREE TRIAL',NULL,NULL,0,0,0,0,0,0,0,0,0,100,0.04,10,NULL,0.02,0.35,0.05,0.09,NULL,NULL,0,3,NULL,NULL),(2,1,'PRO',NULL,NULL,399,0,0,0,0,0,0,0,0,500,0.03,400,NULL,0.02,0.35,0.05,0.09,NULL,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `roster_id` int unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `players_company_id_foreign` (`company_id`),
  KEY `players_roster_id_foreign` (`roster_id`),
  CONSTRAINT `players_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `players_roster_id_foreign` FOREIGN KEY (`roster_id`) REFERENCES `rosters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotional_code_redeems`
--

DROP TABLE IF EXISTS `promotional_code_redeems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotional_code_redeems` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `promotional_code_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotional_code_redeems_promotional_code_id_foreign` (`promotional_code_id`),
  KEY `promotional_code_redeems_user_id_foreign` (`user_id`),
  CONSTRAINT `promotional_code_redeems_promotional_code_id_foreign` FOREIGN KEY (`promotional_code_id`) REFERENCES `promotional_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotional_code_redeems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotional_code_redeems`
--

LOCK TABLES `promotional_code_redeems` WRITE;
/*!40000 ALTER TABLE `promotional_code_redeems` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotional_code_redeems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotional_code_vouchers`
--

DROP TABLE IF EXISTS `promotional_code_vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotional_code_vouchers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `promotional_code_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `giftcard_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `payment_minimum_value` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotional_code_vouchers_promotional_code_id_foreign` (`promotional_code_id`),
  KEY `promotional_code_vouchers_company_id_foreign` (`company_id`),
  KEY `promotional_code_vouchers_product_id_foreign` (`product_id`),
  KEY `promotional_code_vouchers_giftcard_id_foreign` (`giftcard_id`),
  CONSTRAINT `promotional_code_vouchers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotional_code_vouchers_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotional_code_vouchers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotional_code_vouchers_promotional_code_id_foreign` FOREIGN KEY (`promotional_code_id`) REFERENCES `promotional_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotional_code_vouchers`
--

LOCK TABLES `promotional_code_vouchers` WRITE;
/*!40000 ALTER TABLE `promotional_code_vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotional_code_vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotional_codes`
--

DROP TABLE IF EXISTS `promotional_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotional_codes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promotional_codes_code_unique` (`code`),
  KEY `promotional_codes_holding_id_foreign` (`holding_id`),
  CONSTRAINT `promotional_codes_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotional_codes`
--

LOCK TABLES `promotional_codes` WRITE;
/*!40000 ALTER TABLE `promotional_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotional_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `quiz_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_quiz_id_foreign` (`quiz_id`),
  CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_submissions`
--

DROP TABLE IF EXISTS `quiz_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_submissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `payment_id` int unsigned DEFAULT NULL,
  `cart_item_id` int unsigned DEFAULT NULL,
  `subscription_member_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_submissions_quiz_id_foreign` (`quiz_id`),
  KEY `quiz_submissions_user_id_foreign` (`user_id`),
  KEY `quiz_submissions_subscription_member_id_foreign` (`subscription_member_id`),
  KEY `quiz_submissions_cart_item_id_foreign` (`cart_item_id`),
  KEY `quiz_submissions_payment_id_foreign` (`payment_id`),
  CONSTRAINT `quiz_submissions_cart_item_id_foreign` FOREIGN KEY (`cart_item_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quiz_submissions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quiz_submissions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quiz_submissions_subscription_member_id_foreign` FOREIGN KEY (`subscription_member_id`) REFERENCES `subscription_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quiz_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_submissions`
--

LOCK TABLES `quiz_submissions` WRITE;
/*!40000 ALTER TABLE `quiz_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizzes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `pre_answer_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_answer_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int unsigned DEFAULT NULL,
  `giftcard_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_subscription_id_foreign` (`subscription_id`),
  KEY `quizzes_product_id_foreign` (`product_id`),
  KEY `quizzes_giftcard_id_foreign` (`giftcard_id`),
  CONSTRAINT `quizzes_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `quizzes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `quizzes_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rateable_id` int NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rater_id` int DEFAULT NULL,
  `rater_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_logs`
--

DROP TABLE IF EXISTS `request_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` json DEFAULT NULL,
  `status_code` int DEFAULT NULL,
  `response` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_logs`
--

LOCK TABLES `request_logs` WRITE;
/*!40000 ALTER TABLE `request_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
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
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','web','2023-08-30 18:46:52','2023-08-30 18:46:52','Super Administrador'),(2,'manager','web','2023-08-30 18:46:52','2023-08-30 18:46:52','Gestor'),(3,'company','web','2023-08-30 18:46:52','2023-08-30 18:46:52','Empresa'),(4,'employee','web','2023-08-30 18:46:52','2023-08-30 18:46:52','Funcionário'),(5,'client','web','2023-08-30 18:46:52','2023-08-30 18:46:52','Cliente');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rosters`
--

DROP TABLE IF EXISTS `rosters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rosters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rosters_company_id_foreign` (`company_id`),
  CONSTRAINT `rosters_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rosters`
--

LOCK TABLES `rosters` WRITE;
/*!40000 ALTER TABLE `rosters` DISABLE KEYS */;
/*!40000 ALTER TABLE `rosters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sponsors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sponsors_company_id_foreign` (`company_id`),
  CONSTRAINT `sponsors_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_payments`
--

DROP TABLE IF EXISTS `status_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_payments`
--

LOCK TABLES `status_payments` WRITE;
/*!40000 ALTER TABLE `status_payments` DISABLE KEYS */;
INSERT INTO `status_payments` VALUES (1,'Processando',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00'),(2,'Aprovado',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00'),(3,'Recusado',NULL,'2023-08-30 18:52:00','2023-08-30 18:52:00'),(4,'Cancelado',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(5,'Em Análise',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(6,'Parcialmente Pago',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(7,'Reembolsado',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(8,'Expirado',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(9,'Em Protesto',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52'),(10,'Contestado',NULL,'2023-08-30 18:40:52','2023-08-30 18:40:52');
/*!40000 ALTER TABLE `status_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_benefits`
--

DROP TABLE IF EXISTS `subscription_benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_benefits` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` int unsigned NOT NULL,
  `holding_id` int unsigned NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presential` tinyint(1) NOT NULL DEFAULT '1',
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_benefits_subscription_id_foreign` (`subscription_id`),
  KEY `subscription_benefits_holding_id_foreign` (`holding_id`),
  CONSTRAINT `subscription_benefits_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `subscription_benefits_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_benefits`
--

LOCK TABLES `subscription_benefits` WRITE;
/*!40000 ALTER TABLE `subscription_benefits` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_benefits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_invitations`
--

DROP TABLE IF EXISTS `subscription_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_invitations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_invitations_token_unique` (`token`),
  KEY `subscription_invitations_user_id_foreign` (`user_id`),
  KEY `subscription_invitations_subscription_id_foreign` (`subscription_id`),
  CONSTRAINT `subscription_invitations_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subscription_invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_invitations`
--

LOCK TABLES `subscription_invitations` WRITE;
/*!40000 ALTER TABLE `subscription_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_member`
--

DROP TABLE IF EXISTS `subscription_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_member` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `subscription_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `expiration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `card_id` int unsigned DEFAULT NULL,
  `automatic_renovation` tinyint(1) NOT NULL DEFAULT '1',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generated_by_payment_id` int unsigned DEFAULT NULL,
  `installments_quantity` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `subscription_user_user_id_foreign` (`user_id`),
  KEY `subscription_user_subscription_id_foreign` (`subscription_id`),
  KEY `subscription_user_expiration_date_index` (`expiration_date`),
  KEY `subscription_member_generated_by_payment_id_foreign` (`generated_by_payment_id`),
  KEY `subscription_member_card_id_foreign` (`card_id`),
  CONSTRAINT `subscription_member_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `subscription_member_generated_by_payment_id_foreign` FOREIGN KEY (`generated_by_payment_id`) REFERENCES `payments` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `subscription_user_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscription_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_member`
--

LOCK TABLES `subscription_member` WRITE;
/*!40000 ALTER TABLE `subscription_member` DISABLE KEYS */;
INSERT INTO `subscription_member` VALUES (1,54,1,1,0,'2023-11-29 20:01:52','2023-08-31 20:01:52','2023-08-31 20:01:52',NULL,NULL,1,NULL,NULL,1),(2,54,2,1,0,'2023-11-29 20:01:52','2023-08-31 20:01:52','2023-08-31 20:01:52',NULL,NULL,1,NULL,NULL,1),(3,54,3,1,0,'2023-11-29 20:01:52','2023-08-31 20:01:52','2023-08-31 20:01:52',NULL,NULL,1,NULL,NULL,1),(4,55,3,1,0,'2023-11-29 20:44:38','2023-08-31 20:44:38','2023-08-31 20:44:38',NULL,NULL,1,NULL,NULL,1),(5,56,3,1,0,'2023-11-29 20:44:38','2023-08-31 20:44:38','2023-08-31 20:44:38',NULL,NULL,1,NULL,NULL,1),(6,56,2,1,0,'2023-11-29 20:44:38','2023-08-31 20:44:38','2023-08-31 20:44:38',NULL,NULL,1,NULL,NULL,1);
/*!40000 ALTER TABLE `subscription_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_partners`
--

DROP TABLE IF EXISTS `subscription_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_partners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` int unsigned NOT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_partners_subscription_id_foreign` (`subscription_id`),
  KEY `subscription_partners_company_id_foreign` (`company_id`),
  CONSTRAINT `subscription_partners_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subscription_partners_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_partners`
--

LOCK TABLES `subscription_partners` WRITE;
/*!40000 ALTER TABLE `subscription_partners` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_accept_waiting_list` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `card_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity_vacancies` int DEFAULT NULL,
  `value` double(8,2) NOT NULL,
  `expired_at` datetime DEFAULT NULL,
  `duration_days` int DEFAULT NULL,
  `is_allow_renovation` tinyint(1) NOT NULL DEFAULT '1',
  `commercial_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_payment_methods` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_company_id_foreign` (`company_id`),
  CONSTRAINT `subscriptions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,5,'Guanabara #VIP',1,1,'Clube com beneficios exclusivos para nossos clientes.','http://www.hostcgs.com.br/hostimagem/images/442guanabara.png','2023-08-31 19:11:10','2023-08-31 19:11:10',NULL,100.00,NULL,NULL,1,NULL,NULL),(2,7,'Clube do Açai',1,1,'Clube com beneficios exclusivos para nossos clientes.','http://www.hostcgs.com.br/hostimagem/images/847card_acai.jpg','2023-08-31 19:11:10','2023-08-31 19:11:10',NULL,100.00,NULL,NULL,1,NULL,NULL),(3,8,'Shell Protect',1,1,'Clube com beneficios exclusivos para nossos clientes.','http://www.hostcgs.com.br/hostimagem/images/569SHELL_CARD.jpg','2023-08-31 19:11:10','2023-08-31 19:11:10',NULL,100.00,NULL,NULL,1,NULL,NULL),(4,8,'Shell Basic',1,1,'Clube com beneficios exclusivos para nossos clientes.','http://www.hostcgs.com.br/hostimagem/images/970SHELL_CARD_basic.jpg','2023-08-31 19:11:10','2023-08-31 19:11:10',NULL,100.00,NULL,NULL,1,NULL,NULL),(5,14,'Turma 1',1,1,'asdads',NULL,'2023-09-01 17:22:12','2023-09-01 17:22:12',NULL,100.00,'1970-01-01 00:00:23',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suggestions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suggestions_company_id_foreign` (`company_id`),
  KEY `suggestions_user_id_foreign` (`user_id`),
  CONSTRAINT `suggestions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `suggestions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestions`
--

LOCK TABLES `suggestions` WRITE;
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;
/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_company_id_foreign` (`company_id`),
  CONSTRAINT `tags_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_holding_id_foreign` (`holding_id`),
  CONSTRAINT `teams_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `triggers_log`
--

DROP TABLE IF EXISTS `triggers_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `triggers_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `triggers_log`
--

LOCK TABLES `triggers_log` WRITE;
/*!40000 ALTER TABLE `triggers_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `triggers_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci,
  `surname` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` datetime DEFAULT NULL,
  `wallet_balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_photo` text COLLATE utf8mb4_unicode_ci,
  `selfie_photo` text COLLATE utf8mb4_unicode_ci,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complement` longtext COLLATE utf8mb4_unicode_ci,
  `reference` longtext COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `facebook_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted_mails` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_sms` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_whatsapp` tinyint(1) NOT NULL DEFAULT '1',
  `accepted_pushs` tinyint(1) NOT NULL DEFAULT '1',
  `imported_from_company_id` int unsigned DEFAULT NULL,
  `latitude_address` decimal(10,8) DEFAULT NULL,
  `longitude_address` decimal(10,8) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stripe_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_customer_id_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iugu_customer_id_live` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uuid_unique` (`uuid`),
  UNIQUE KEY `users_email_deleted_at_unique` (`email`,`deleted_at`),
  UNIQUE KEY `users_phone_deleted_at_unique` (`phone`,`deleted_at`),
  UNIQUE KEY `users_document_deleted_at_unique` (`document`,`deleted_at`),
  KEY `users_holding_id_foreign` (`holding_id`),
  KEY `users_imported_from_company_id_foreign` (`imported_from_company_id`),
  CONSTRAINT `users_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `users_imported_from_company_id_foreign` FOREIGN KEY (`imported_from_company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Super','Admin','super@admin.com','$2y$10$cMJ5HRpxRaG.mDsk2JgA7eoXeiy1mCYLpr1r/zRmxUk1/Y1zV5NKS',NULL,'-',NULL,NULL,1,'-','2023-08-30 18:48:13',NULL,0.00,'2023-08-30 18:48:13','2023-08-30 18:48:13',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64ef8eed6e9de',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,1,'Gestor Spoten','1','gestor@spoten.com','$2y$10$f.sSOqjHyRSC3eK3/bo4JeA8M5zGpg6CH9flcpGHxzEVQwXCwjlZm',NULL,'1223322323','male','1931-10-03',1,'','2023-08-31 01:51:38',NULL,0.00,'2023-08-31 01:51:38','2023-08-31 01:51:38',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64eff22aa18d7',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,1,'Gestor Açaí da Maria','1','acaidamaria@teste.com','$2y$10$QxDgEtN.nwnklfz6/KSyfuC4ZZipuxStCOJIdm6QItT8CAaWEYtl6',NULL,'1223322323','male','1970-11-23',1,'','2023-08-31 01:51:38',NULL,0.00,'2023-08-31 01:51:38','2023-08-31 01:51:38',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64eff22aacc78',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,1,'Gestor Café do João','1','cafedojoao@teste.com','$2y$10$9fRX3QZCb6Av5jBerk5VbOwB6fsRyo4vDkWhtZIBOcYetIKZ4xy7a',NULL,'1223322323','male','1943-10-20',1,'','2023-08-31 01:51:38',NULL,0.00,'2023-08-31 01:51:38','2023-08-31 01:51:38',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'64eff22ab8023',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,1,'Ciente 1',NULL,'cliente1@pando.com','$2y$10$Vx25lLC5iUX4ydTsYsF7Z.LFbWs07wa7JbnC9LW/R6jF8.RkPFm/i',NULL,'3434344343','female','2016-08-27',1,'','2023-08-31 01:53:24',NULL,0.00,'2023-08-31 01:53:24','2023-08-31 01:53:24',NULL,NULL,NULL,0,'11347-010','Rua Ibrahin Abdalla Set El Banat','50','Jardim Rio Branco','São Vicente','SP','Casa',NULL,NULL,NULL,NULL,NULL,NULL,'64eff294089e8',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,1,'Ciente 3',NULL,'cliente3@pando.com','$2y$10$mOBuB4KmOo9jCACf/20dG.2cWe5QAlqIluY1tYNr1m1CWI/Rmkrb2',NULL,'3434344343','male','2012-05-25',1,'','2023-08-31 01:53:24',NULL,0.00,'2023-08-31 01:53:24','2023-08-31 01:53:24',NULL,NULL,NULL,0,'11347-010','Rua Ibrahin Abdalla Set El Banat','50','Jardim Rio Branco','São Vicente','SP','Casa',NULL,NULL,NULL,NULL,NULL,NULL,'64eff29413db1',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,1,'Ciente 2',NULL,'cliente2@pando.com','$2y$10$.tdQ7/3ukea89EAJXZ9KGOn16VCSfC0VJvAIFN7x83MYJMB9hTFSS',NULL,'3434344343','female','2020-12-08',1,'','2023-08-31 01:53:24',NULL,0.00,'2023-08-31 01:53:24','2023-08-31 01:53:24',NULL,NULL,NULL,0,'11347-010','Rua Ibrahin Abdalla Set El Banat','50','Jardim Rio Branco','São Vicente','SP','Casa',NULL,NULL,NULL,NULL,NULL,NULL,'64eff2941f12c',1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_import`
--

DROP TABLE IF EXISTS `users_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_import` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_import_email_unique` (`email`),
  UNIQUE KEY `users_import_document_unique` (`document`),
  KEY `users_import_holding_id_foreign` (`holding_id`),
  CONSTRAINT `users_import_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_import`
--

LOCK TABLES `users_import` WRITE;
/*!40000 ALTER TABLE `users_import` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher_categories`
--

DROP TABLE IF EXISTS `voucher_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voucher_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `holding_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `voucher_categories_holding_id_foreign` (`holding_id`),
  CONSTRAINT `voucher_categories_holding_id_foreign` FOREIGN KEY (`holding_id`) REFERENCES `holdings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher_categories`
--

LOCK TABLES `voucher_categories` WRITE;
/*!40000 ALTER TABLE `voucher_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `voucher_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vouchers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int unsigned DEFAULT NULL,
  `code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `company_id` int unsigned NOT NULL,
  `voucher_category_id` int unsigned DEFAULT NULL,
  `promotional_code_id` int unsigned DEFAULT NULL,
  `current_value` double NOT NULL,
  `total_value` double NOT NULL,
  `redeemed_at` datetime DEFAULT NULL,
  `redeemed_by_user_id` int unsigned DEFAULT NULL,
  `payment_minimum_value` decimal(8,2) DEFAULT NULL,
  `expiration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `extra_info` text COLLATE utf8mb4_unicode_ci,
  `giftcard_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `is_promotional` tinyint(1) NOT NULL DEFAULT '1',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `giver_user_id` int unsigned DEFAULT NULL,
  `generated_by_payment_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchers_code_unique` (`code`),
  KEY `vouchers_company_id_foreign` (`company_id`),
  KEY `vouchers_user_id_foreign` (`user_id`),
  KEY `vouchers_campaign_id_foreign` (`campaign_id`),
  KEY `vouchers_giftcard_id_foreign` (`giftcard_id`),
  KEY `vouchers_giver_user_id_foreign` (`giver_user_id`),
  KEY `vouchers_promotional_code_id_foreign` (`promotional_code_id`),
  KEY `vouchers_generated_by_payment_id_foreign` (`generated_by_payment_id`),
  KEY `vouchers_voucher_category_id_foreign` (`voucher_category_id`),
  KEY `vouchers_product_id_foreign` (`product_id`),
  KEY `vouchers_redeemed_by_user_id_foreign` (`redeemed_by_user_id`),
  CONSTRAINT `vouchers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `vouchers_generated_by_payment_id_foreign` FOREIGN KEY (`generated_by_payment_id`) REFERENCES `payments` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `vouchers_giftcard_id_foreign` FOREIGN KEY (`giftcard_id`) REFERENCES `giftcards` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `vouchers_giver_user_id_foreign` FOREIGN KEY (`giver_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `vouchers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `giftcards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vouchers_promotional_code_id_foreign` FOREIGN KEY (`promotional_code_id`) REFERENCES `promotional_codes` (`id`),
  CONSTRAINT `vouchers_redeemed_by_user_id_foreign` FOREIGN KEY (`redeemed_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vouchers_voucher_category_id_foreign` FOREIGN KEY (`voucher_category_id`) REFERENCES `voucher_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('deposit','withdraw','payment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deposit',
  `user_id` int unsigned NOT NULL,
  `payment_id` int unsigned DEFAULT NULL,
  `value` decimal(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallet_transactions_user_id_foreign` (`user_id`),
  KEY `wallet_transactions_payment_id_foreign` (`payment_id`),
  CONSTRAINT `wallet_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `wallet_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_transactions`
--

LOCK TABLES `wallet_transactions` WRITE;
/*!40000 ALTER TABLE `wallet_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallet_transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-01 14:30:33
