-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: cws
-- ------------------------------------------------------
-- Server version	5.5.40-1

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
-- Table structure for table `family_relation`
--

DROP TABLE IF EXISTS `family_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_relation`
--

LOCK TABLES `family_relation` WRITE;
/*!40000 ALTER TABLE `family_relation` DISABLE KEYS */;
INSERT INTO `family_relation` VALUES (1,'Father'),(2,'Mother'),(3,'Son'),(4,'Daughter'),(5,'Husband'),(6,'Wife'),(7,'Brother'),(8,'Sister'),(9,'Grand Father'),(10,'Grand Mother'),(11,'Great Grand Father'),(12,'Great Grand Mother'),(13,'Grand Son'),(14,'Grand Daughter'),(15,'Grand Child'),(16,'Uncle'),(17,'Aunt'),(18,'Nephew'),(19,'Niece'),(20,'Step Father'),(21,'Step Mother'),(22,'Step Son'),(23,'Step Daughter'),(24,'Father in Law'),(25,'Mother in Law'),(26,'Son in Law'),(27,'Daughter in Law'),(28,'Sister in Law'),(29,'Brother in Law'),(30,'Friends');
/*!40000 ALTER TABLE `family_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ia`
--

DROP TABLE IF EXISTS `ia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ia` (
  `file_no` varchar(50) NOT NULL,
  `assessment` text NOT NULL,
  `legal_doc` text NOT NULL,
  `living_env` text NOT NULL,
  `living_cond` text NOT NULL,
  `q12` longtext NOT NULL,
  `q34` longtext NOT NULL,
  `q56` longtext NOT NULL,
  `q78` longtext NOT NULL,
  `remarks_staff` longtext NOT NULL,
  `created` datetime NOT NULL,
  `last_change` datetime DEFAULT NULL,
  PRIMARY KEY (`file_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ia`
--

LOCK TABLES `ia` WRITE;
/*!40000 ALTER TABLE `ia` DISABLE KEYS */;
INSERT INTO `ia` VALUES ('10','2014-11-10;jakarta;diding','yes;no;yes he have','','','','','','','','2015-01-07 11:04:48',NULL),('12','2013-12-12;jakarta;diding','no;no;yes i have','3;1,1,0,0,1,0,1,0,0,0,1,0;0,0,1,0,1,1','-;4x6;500.000','1;2','3;4','5;6','7;8','remarks','2015-01-07 13:05:01',NULL),('13','2012-10-12;jakarta;-','1;2;3','3;0,0,0,0,0,0,0,0,0,0,0,0;0,0,0,0,0,0',';;',';',';',';',';','','2015-01-07 18:18:53',NULL),('5','2015-01-15;jakarta;-','no;no;yes','','','','','','','','2015-01-07 11:45:40',NULL),('88','2014-12-02;jakarta;--','no;no;ye he have','','','','','','','','2015-01-05 11:50:25',NULL);
/*!40000 ALTER TABLE `ia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marital_status`
--

DROP TABLE IF EXISTS `marital_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marital_status` (
  `marital_id` varchar(3) NOT NULL,
  `marital` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_status`
--

LOCK TABLES `marital_status` WRITE;
/*!40000 ALTER TABLE `marital_status` DISABLE KEYS */;
INSERT INTO `marital_status` VALUES ('SI','Single'),('MA','Married'),('EN','Engaged'),('WR','Widower'),('WW','Widow');
/*!40000 ALTER TABLE `marital_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_country`
--

DROP TABLE IF EXISTS `master_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_country`
--

LOCK TABLES `master_country` WRITE;
/*!40000 ALTER TABLE `master_country` DISABLE KEYS */;
INSERT INTO `master_country` VALUES (1,'Afghanistan'),(2,'Akrotiri'),(3,'Albania'),(4,'Algeria'),(5,'American Samoa'),(6,'Andorra'),(7,'Angola'),(8,'Anguilla'),(9,'Antigua and Barbuda'),(10,'Argentina'),(11,'Armenia'),(12,'Aruba'),(13,'Ashmore and Cartier Islands'),(14,'Australia'),(15,'Austria'),(16,'Azerbaijan'),(17,'Bahamas'),(18,'Bahrain'),(19,'Baker Island'),(20,'Bangladesh'),(21,'Barbados'),(22,'Belarus'),(23,'Belgium'),(24,'Belize'),(25,'Benin'),(26,'Bermuda'),(27,'Bhutan'),(28,'Bolivia'),(29,'Bosnia and Herzegovina'),(30,'Botswana'),(31,'Bouvet Island'),(32,'Brazil'),(33,'British Indian Ocean Territory'),(34,'British Virgin Islands'),(35,'Brunei'),(36,'Bulgaria'),(37,'Burkina Faso'),(38,'Burma'),(39,'Burundi'),(40,'Cambodia'),(41,'Cameroon'),(42,'Canada'),(43,'Cape Verde'),(44,'Cayman Islands'),(45,'Central African Republic'),(46,'Chad'),(47,'Chile'),(48,'China'),(49,'Christmas Island'),(50,'Clipperton Island'),(51,'Cocos (Keeling) Islands'),(52,'Colombia'),(53,'Comoros'),(54,'Congo'),(55,'Cook Islands'),(56,'Coral Sea Islands'),(57,'Costa Rica'),(58,'Cote d Ivoire'),(59,'Croatia'),(60,'Cuba'),(61,'Cyprus'),(62,'Czech Republic'),(63,'Denmark'),(64,'Dhekelia'),(65,'Djibouti'),(66,'Dominica'),(67,'Dominican Republic'),(68,'Ecuador flag'),(69,'Egypt'),(70,'El Salvador'),(71,'Equatorial Guinea'),(72,'Eritrea'),(73,'Estonia'),(74,'Ethiopia'),(75,'European Union'),(76,'Falkland Islands flag'),(77,'Faroe Islands'),(78,'Fiji'),(79,'Finland'),(80,'France'),(81,'French Polynesia'),(82,'French Southern and Antarctic Lands'),(83,'Gabon'),(84,'Gambia'),(85,'Georgia'),(86,'Germany'),(87,'Ghana'),(88,'Gibraltar'),(89,'Greece'),(90,'Greenland'),(91,'Grenada'),(92,'Guam'),(93,'Guatemala'),(94,'Guernsey'),(95,'Guinea Bissau'),(96,'Guinea'),(97,'Guyana'),(98,'Haiti'),(99,'Heard Island and McDonald Islands'),(100,'Holy See'),(101,'Honduras'),(102,'Hong Kong'),(103,'Howland Island'),(104,'Hungary'),(105,'Iceland'),(106,'India'),(107,'Indonesia'),(108,'Iran'),(109,'Iraq'),(110,'Ireland'),(111,'Isle of Man'),(112,'Israel'),(113,'Italy'),(114,'Jamaica flag'),(115,'Jan Mayen'),(116,'Japan'),(117,'Jarvis Island'),(118,'Jersey'),(119,'Johnston Atoll'),(120,'Jordan'),(121,'Kazakhstan'),(122,'Kenya'),(123,'Kingman Reef'),(124,'Kiribati'),(125,'Kuwait'),(126,'Kyrgyzstan'),(127,'Laos'),(128,'Latvia'),(129,'Lebanon'),(130,'Lesotho'),(131,'Liberia'),(132,'Libya'),(133,'Liechtenstein'),(134,'Lithuania'),(135,'Luxembourg'),(136,'Macau'),(137,'Macedonia'),(138,'Madagascar'),(139,'Malawi'),(140,'Malaysia'),(141,'Maldives'),(142,'Mali'),(143,'Malta'),(144,'Marshall Islands'),(145,'Mauritania'),(146,'Mauritius'),(147,'Mayotte'),(148,'Mexico'),(149,'Micronesia'),(150,'Midway Islands'),(151,'Moldova'),(152,'Monaco'),(153,'Mongolia'),(154,'Montenegro'),(155,'Montserrat'),(156,'Morocco'),(157,'Mozambique'),(158,'Namibia'),(159,'Nauru'),(160,'Navassa Island'),(161,'Nepal'),(162,'Netherlands Antilles'),(163,'Netherlands'),(164,'New Caledonia'),(165,'New Zealand'),(166,'Nicaragua'),(167,'Niger'),(168,'Nigeria'),(169,'Niue'),(170,'Norfolk Island'),(171,'North Korea'),(172,'Northern Mariana Islands'),(173,'Norway'),(174,'Oman'),(175,'Pakistan'),(176,'Palau'),(177,'Palmyra Atoll'),(178,'Panama'),(179,'Papua New Guinea'),(180,'Paraguay'),(181,'Peru'),(182,'Philippines'),(183,'Pitcairn Islands'),(184,'Poland'),(185,'Portugal'),(186,'Puerto Rico'),(187,'Qatar'),(188,'Romania'),(189,'Russia'),(190,'Rwanda'),(191,'Saint Barthelemy'),(192,'Saint Helena'),(193,'Saint Kitts and Nevis'),(194,'Saint Lucia'),(195,'Saint Martin'),(196,'Saint Pierre and Miquelon'),(197,'Saint Vincent and the Grenadines'),(198,'Samoa'),(199,'San Marino'),(200,'Sao Tome and Principe'),(201,'Saudi Arabia'),(202,'Senegal'),(203,'Serbia'),(204,'Seychelles'),(205,'Sierra Leone'),(206,'Singapore'),(207,'Slovakia'),(208,'Slovenia'),(209,'Solomon Islands'),(210,'Somalia'),(211,'South Africa'),(212,'South Georgia'),(213,'South Korea'),(214,'Spain'),(215,'Sri Lanka'),(216,'Sudan'),(217,'Suriname'),(218,'Svalbard'),(219,'Swaziland'),(220,'Sweden'),(221,'Switzerland'),(222,'Syria'),(223,'Taiwan'),(224,'Tajikistan'),(225,'Tanzania'),(226,'Thailand'),(227,'Timor Leste'),(228,'Togo'),(229,'Tokelau'),(230,'Tonga'),(231,'Trinidad and Tobago'),(232,'Tunisia'),(233,'Turkey'),(234,'Turkmenistan'),(235,'Turks and Caicos Islands'),(236,'Tuvalu'),(237,'Uganda'),(238,'Ukraine'),(239,'United Arab Emirates'),(240,'United Kingdom'),(241,'United States'),(242,'Uruguay'),(243,'US Pacific Island Wildlife Refuges'),(244,'Uzbekistan'),(245,'Vanuatu'),(246,'Venezuela'),(247,'Vietnam'),(248,'Virgin Islands'),(249,'Wake Island'),(250,'Wallis and Futuna'),(251,'Yemen'),(252,'Zambia'),(253,'Zimbabwe');
/*!40000 ALTER TABLE `master_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `file_no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coo` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `marital` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `arrival` text NOT NULL,
  `education` text NOT NULL,
  `skill` text NOT NULL,
  `mot` varchar(50) NOT NULL,
  `known_language` varchar(50) NOT NULL,
  `previous_occupation` text NOT NULL,
  `volunteer` varchar(50) NOT NULL,
  `date_recognition` date NOT NULL,
  `active` varchar(2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  PRIMARY KEY (`file_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES ('098','test','1','1993-03-07','M','SI','-','097','','Refugee',',','','','','','','','0000-00-00','1','2015-01-07 17:44:49','0000-00-00 00:00:00'),('1','dadang','1','1979-10-24','M','SI','-','-','','Refugee','Jakarta,2009-01-27','-','-','-','-','-','-','2014-12-24','1','2015-01-04 10:59:30','0000-00-00 00:00:00'),('10','entin','107','1989-06-20','F','MA','tangerang','-','','Refugee','Bogor,2010-02-09','-','-','-','-','-','-','2012-07-11','1','2015-01-04 20:39:45','0000-00-00 00:00:00'),('12','astri','15','1979-10-23','F','MA','address','-','','Asylum Seeker','Jakarta,2014-11-04','-','-','-','-','-','-','2015-01-01','1',NULL,'2015-01-04 19:54:08'),('13','aris','107','1993-02-02','M','SI','','087870870412','','Refugee','Bogor,2014-10-06','-','-','Bahasa Indonesia','English','-','-','2015-01-01','1',NULL,'2015-01-04 00:19:09'),('14','asuna','1','2009-02-03','F','SI','','-','','Refugee','Bogor,2015-01-01','-','-','-','-','-','-','2015-01-02','3',NULL,'2015-01-04 18:36:20'),('19028','dudung suherman','107','1992-03-29','M','SI','','','','0',',','','','','','','','2014-10-21','1','2015-01-12 11:52:25','2015-01-12 14:44:42'),('5','diana','105','1993-02-02','F','SI','','','','Refugee',',','','','','','','','0000-00-00','3','2015-01-07 11:44:20','2015-01-12 11:53:33'),('88','diding','1','1989-04-24','M','SI','-','0987777','','Refugee','Jakarta,2012-10-23','-','-','-','-','-','-','2013-06-19','2','2015-01-05 10:17:43','2015-01-05 11:15:09'),('90','kaka','107','1989-10-10','M','SI','-','098','','Refugee','Jakarta,2014-06-17','-','-','-','-','-','-','2015-01-01','1','2015-01-05 15:10:15','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reported_family`
--

DROP TABLE IF EXISTS `reported_family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reported_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_no` varchar(50) DEFAULT NULL,
  `value` text,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reported_family`
--

LOCK TABLES `reported_family` WRITE;
/*!40000 ALTER TABLE `reported_family` DISABLE KEYS */;
INSERT INTO `reported_family` VALUES (2,'13','aris;21;M;Son;-;-;-','0000-00-00 00:00:00'),(3,'13','asd;12;F;Daughter;-;-;-','0000-00-00 00:00:00'),(4,'14','asuna;12;F;Sister;-;-;-','2015-01-04 10:46:29'),(5,'1','adul;12;M;Brother;-;-;-','2015-01-04 10:59:49'),(6,'12','astri;12;M;Sister;-;-;-','2015-01-04 19:51:14'),(7,'10','nanang;16;M;Brother;-;-;-','2015-01-04 20:40:06'),(8,'88','test;12;M;Father;-;-;-','2015-01-05 11:15:29'),(9,'90','adik;21;M;Brother;-;-;-','2015-01-05 15:10:37'),(10,'098','test;16;F;Sister;;;','2015-01-07 17:45:25');
/*!40000 ALTER TABLE `reported_family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_log`
--

DROP TABLE IF EXISTS `system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_location` varchar(50) NOT NULL,
  `log_message` text NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_log`
--

LOCK TABLES `system_log` WRITE;
/*!40000 ALTER TABLE `system_log` DISABLE KEYS */;
INSERT INTO `system_log` VALUES (1,1,'login','Login success','2014-12-26 13:48:50'),(2,1,'User form','Edit user ','2014-12-26 13:49:06'),(3,1,'User form','Edit user ','2014-12-26 13:50:12'),(4,2,'login','Login success','2014-12-26 13:50:53'),(5,2,'login','Login success','2014-12-26 13:56:19'),(6,0,'User form','Edit user ','2014-12-31 12:03:13'),(7,0,'User form','Add new User','2014-12-31 12:04:02'),(8,2,'login','Login success','2015-01-02 17:22:47'),(9,2,'login','Login success','2015-01-03 21:54:10'),(10,2,'login','Login success','2015-01-04 10:47:39'),(11,2,'login','Login success','2015-01-04 15:53:03'),(12,2,'login','Login success','2015-01-04 20:37:27'),(13,0,'User form','Add new User','2015-01-04 20:56:57'),(14,2,'login','Login success','2015-01-04 20:58:01'),(15,2,'login','Login success','2015-01-05 09:48:04'),(16,2,'login','Login success','2015-01-05 11:13:41'),(17,2,'login','Login success','2015-01-05 12:07:40'),(18,0,'User form','Edit user ','2015-01-05 15:38:52'),(19,2,'login','Login success','2015-01-06 10:23:47'),(20,2,'login','Login success','2015-01-07 10:49:13'),(21,2,'login','Login success','2015-01-07 11:43:41'),(22,2,'login','Login success','2015-01-07 12:02:23'),(23,2,'login','Login success','2015-01-07 12:25:20'),(24,2,'login','Login success','2015-01-07 17:35:44'),(25,2,'login','Login success','2015-01-07 17:42:35'),(26,2,'login','Login success','2015-01-07 18:26:17'),(27,2,'login','Login success','2015-01-08 10:06:21'),(28,2,'login','Login success','2015-01-09 14:17:49'),(29,2,'login','Login success','2015-01-11 11:46:54'),(30,2,'login','Login success','2015-01-12 10:07:55'),(31,2,'login','Login success','2015-01-12 11:03:20'),(32,2,'login','Login success','2015-01-12 14:39:08');
/*!40000 ALTER TABLE `system_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_real_name` varchar(50) NOT NULL,
  `user_password` text NOT NULL,
  `user_mail` text NOT NULL,
  `user_info` text NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_change` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'super','super admin','1b3231655cebb7a1f783eddf27d254ca','aris@tech4changes.org','--','2014-12-26 13:48:50','2015-01-05 15:38:52'),(2,2,'aris','aris winardi','288077f055be4fadc3804a69422dd4f8','aris@tech4changes.org','--','2015-01-12 14:39:08','2014-12-26 13:50:12'),(3,2,'test','test','098f6bcd4621d373cade4e832627b4f6','test','test',NULL,NULL),(4,0,'','','d41d8cd98f00b204e9800998ecf8427e','','',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `group_access` text NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (1,'Super Admin',''),(2,'Administrator','');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `with_whom_living`
--

DROP TABLE IF EXISTS `with_whom_living`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `with_whom_living` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_no` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `with_whom_living`
--

LOCK TABLES `with_whom_living` WRITE;
/*!40000 ALTER TABLE `with_whom_living` DISABLE KEYS */;
INSERT INTO `with_whom_living` VALUES (1,'88','test;-;11;1992-03-15,22;F;09888;Friends;-','2015-01-05 11:16:48'),(2,'12','dudung;09;10;1987-09-02,27;M;09888;Friends;--','2015-01-05 13:35:10'),(3,'10','diana;-;1;1996-01-20,18;F;-;Sister;-','2015-01-07 11:06:13'),(4,'5','adi;-;105;,12;M;-;Friends;-','2015-01-07 11:46:18'),(5,'100','asd;;0;,;M;;0;','2015-01-07 12:05:02');
/*!40000 ALTER TABLE `with_whom_living` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-12 16:26:14
