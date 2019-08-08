--
-- Current Database: `simplestock`
--

CREATE DATABASE /*!32312 IF NOT EXISTS */ `simplestock` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `simplestock`;


--
-- Table structure for table `purchase_orders_statuses`
--

DROP TABLE IF EXISTS `purchase_orders_statuses`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders_statuses`
(
    `id`   int(11) NOT NULL,
    `name` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders_statuses`
--

LOCK TABLES `purchase_orders_statuses` WRITE;
/*!40000 ALTER TABLE `purchase_orders_statuses`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders_statuses`
    ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces`
(
    `id`   int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `provinces`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities`
(
    `id`          int(11) NOT NULL AUTO_INCREMENT,
    `name`        varchar(255) DEFAULT NULL,
    `province_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_city_provinces1_idx` (`province_id`),
    CONSTRAINT `fk_city_provinces1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `cities`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers`
(
    `id`               int(11)   NOT NULL AUTO_INCREMENT,
    `employee_name`    varchar(255)   DEFAULT NULL,
    `employee_surname` varchar(255)   DEFAULT NULL,
    `company_name`     varchar(255)   DEFAULT NULL,
    `address`          varchar(255)   DEFAULT NULL,
    `website`          varchar(255)   DEFAULT NULL,
    `email`            varchar(255)   DEFAULT NULL,
    `phone`            varchar(255)   DEFAULT NULL,
    `area`             varchar(255)   DEFAULT NULL,
    `cuit`             varchar(255)   DEFAULT NULL,
    `observations`     varchar(255)   DEFAULT NULL,
    `city_id`          int(11)   NOT NULL,
    `company_id`       int(11)        DEFAULT NULL,
    `created_at`       timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`       int(11)        DEFAULT NULL,
    `updated_at`       timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`       int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_providers_cities1_idx` (`city_id`),
    CONSTRAINT `fk_providers_cities1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `providers`
    ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories`
(
    `id`         int(11)   NOT NULL AUTO_INCREMENT,
    `name`       varchar(255)    DEFAULT NULL,
    `company_id` int(11)        DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by` int(11)        DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by` int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles`
(
    `id`             int(11)   NOT NULL AUTO_INCREMENT,
    `name`           varchar(255)    DEFAULT NULL,
    `description`    varchar(255)    DEFAULT NULL,
    `security_stock` int(11)        DEFAULT NULL,
    `internal_code`  varchar(255)    DEFAULT NULL,
    `provider_code`  varchar(255)    DEFAULT NULL,
    `cateogry_id`    int(11)   NOT NULL,
    `provider_id`    int(11)   NOT NULL,
    `company_id`     int(11)   NOT NULL,
    `created_at`     timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`     int(11)        DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`     int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_articles_categories_idx` (`cateogry_id`),
    KEY `fk_articles_providers1_idx` (`provider_id`),
    CONSTRAINT `fk_articles_categories` FOREIGN KEY (`cateogry_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_articles_providers1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `articles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building_sites`
--

DROP TABLE IF EXISTS `building_sites`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building_sites`
(
    `id`           int(11)   NOT NULL AUTO_INCREMENT,
    `name`         varchar(255)   DEFAULT NULL,
    `start_date`   date           DEFAULT NULL,
    `address`      varchar(255)   DEFAULT NULL,
    `observations` varchar(255)   DEFAULT NULL,
    `company_id`   int(11)        DEFAULT NULL,
    `created_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`   int(11)        DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`   int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building_sites`
--

LOCK TABLES `building_sites` WRITE;
/*!40000 ALTER TABLE `building_sites`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `building_sites`
    ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies`
(
    `id`         int(11)   NOT NULL AUTO_INCREMENT,
    `name`       varchar(255)    DEFAULT NULL,
    `website`    varchar(255)    DEFAULT NULL,
    `phone`      varchar(255)    DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `address`    varchar(255)    DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies`
    DISABLE KEYS */;
INSERT INTO `companies`
VALUES (1, 'HEAL S.A.', '', NULL, '2018-11-24 06:32:54', '2018-11-24 06:32:54', NULL);
/*!40000 ALTER TABLE `companies`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees`
(
    `id`           int(11)   NOT NULL AUTO_INCREMENT,
    `name`         varchar(255)   DEFAULT NULL,
    `surname`      varchar(255)   DEFAULT NULL,
    `cuil`         varchar(255)   DEFAULT NULL,
    `phone`        varchar(255)   DEFAULT NULL,
    `email`        varchar(255)   DEFAULT NULL,
    `address`      varchar(255)   DEFAULT NULL,
    `position`     varchar(255)   DEFAULT NULL,
    `observations` varchar(255)   DEFAULT NULL,
    `company_id`   int(11)   NOT NULL,
    `created_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_by`   int(11)        DEFAULT NULL,
    `created_by`   int(11)        DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees`
    DISABLE KEYS */;
INSERT INTO `employees`
VALUES (5, 'Francisco Emilio Miguel Hanna', 'Hanna', '12321312312', '3825554196', 'franciscohanna92@gmail.com',
        'Pablo Ramela S/N, Bº Del Bono Green', 'Operario', '', 1, '2018-11-27 05:11:39', NULL, NULL,
        '2018-11-27 05:11:39');
/*!40000 ALTER TABLE `employees`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_issues`
--

DROP TABLE IF EXISTS `inventory_issues`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_issues`
(
    `id`               int(11)   NOT NULL AUTO_INCREMENT,
    `date`             date           DEFAULT NULL,
    `employee_id`      int(11)   NOT NULL,
    `building_site_id` int(11)   NOT NULL,
    `company_id`       int(11)        DEFAULT NULL,
    `created_at`       timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`       int(11)        DEFAULT NULL,
    `updated_at`       timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`       int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_inventory_issues_building_sites1_idx` (`building_site_id`),
    KEY `fk_inventory_issues_employees1_idx` (`employee_id`),
    CONSTRAINT `fk_inventory_issues_building_sites1` FOREIGN KEY (`building_site_id`) REFERENCES `building_sites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_inventory_issues_employees1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_issues`
--

LOCK TABLES `inventory_issues` WRITE;
/*!40000 ALTER TABLE `inventory_issues`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_issues`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_issues_articles`
--

DROP TABLE IF EXISTS `inventory_issues_articles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_issues_articles`
(
    `id`                 int(11) NOT NULL AUTO_INCREMENT,
    `quantity`           varchar(255) DEFAULT NULL,
    `inventory_issue_id` int(11) NOT NULL,
    `article_id`         int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_inventory_issues_has_articles_articles1_idx` (`article_id`),
    KEY `fk_inventory_issues_has_articles_inventory_issues1_idx` (`inventory_issue_id`),
    CONSTRAINT `fk_inventory_issues_has_articles_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_inventory_issues_has_articles_inventory_issues1` FOREIGN KEY (`inventory_issue_id`) REFERENCES `inventory_issues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_issues_articles`
--

LOCK TABLES `inventory_issues_articles` WRITE;
/*!40000 ALTER TABLE `inventory_issues_articles`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_issues_articles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_receipts`
--

DROP TABLE IF EXISTS `inventory_receipts`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_receipts`
(
    `id`           int(11)   NOT NULL AUTO_INCREMENT,
    `date`         date           DEFAULT NULL,
    `number`       varchar(255)   DEFAULT NULL,
    `providers_id` int(11)   NOT NULL,
    `company_id`   int(11)        DEFAULT NULL,
    `created_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`   int(11)        DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`   int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_inventory_receipts_providers1_idx` (`providers_id`),
    CONSTRAINT `fk_inventory_receipts_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_receipts`
--

LOCK TABLES `inventory_receipts` WRITE;
/*!40000 ALTER TABLE `inventory_receipts`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_receipts`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_receipts_articles`
--

DROP TABLE IF EXISTS `inventory_receipts_articles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_receipts_articles`
(
    `id`                   int(11) NOT NULL AUTO_INCREMENT,
    `quantity`             int(11) DEFAULT NULL,
    `article_id`           int(11) NOT NULL,
    `inventory_receipt_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_inventory_receipts_has_articles_articles1_idx` (`article_id`),
    KEY `fk_inventory_receipts_has_articles_inventory_receipts1_idx` (`inventory_receipt_id`),
    CONSTRAINT `fk_inventory_receipts_has_articles_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_inventory_receipts_has_articles_inventory_receipts1` FOREIGN KEY (`inventory_receipt_id`) REFERENCES `inventory_receipts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_receipts_articles`
--

LOCK TABLES `inventory_receipts_articles` WRITE;
/*!40000 ALTER TABLE `inventory_receipts_articles`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_receipts_articles`
    ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders`
(
    `id`           int(11)   NOT NULL AUTO_INCREMENT,
    `date`         varchar(255)   DEFAULT NULL,
    `observations` varchar(255)   DEFAULT NULL,
    `provider_id`  int(11)   NOT NULL,
    `status_id`    int(11)   NOT NULL,
    `company_id`   int(11)        DEFAULT NULL,
    `created_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by`   int(11)        DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by`   int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_purchase_orders_providers1_idx` (`provider_id`),
    KEY `fk_purchase_orders_purchase_orders_statuses1_idx` (`status_id`),
    CONSTRAINT `fk_purchase_orders_providers1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_purchase_orders_purchase_orders_statuses1` FOREIGN KEY (`status_id`) REFERENCES `purchase_orders_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders`
--

LOCK TABLES `purchase_orders` WRITE;
/*!40000 ALTER TABLE `purchase_orders`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_orders_articles`
--

DROP TABLE IF EXISTS `purchase_orders_articles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders_articles`
(
    `id`                int(11) NOT NULL AUTO_INCREMENT,
    `quantity`          int(11) DEFAULT NULL,
    `purchase_order_id` int(11) NOT NULL,
    `article_id`        int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_purchase_orders_has_articles_articles1_idx` (`article_id`),
    KEY `fk_purchase_orders_has_articles_purchase_orders1_idx` (`purchase_order_id`),
    CONSTRAINT `fk_purchase_orders_has_articles_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_purchase_orders_has_articles_purchase_orders1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders_articles`
--

LOCK TABLES `purchase_orders_articles` WRITE;
/*!40000 ALTER TABLE `purchase_orders_articles`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders_articles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users`
(
    `id`         int(11)   NOT NULL AUTO_INCREMENT,
    `email`      varchar(255)    DEFAULT NULL,
    `password`   varchar(255)    DEFAULT NULL,
    `company_id` int(11)   NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `created_by` int(11)        DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_by` int(11)        DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_users_tenants1_idx` (`company_id`),
    CONSTRAINT `fk_users_tenants1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'simplestock'
--

--
-- Dumping routines for database 'simplestock'
--