-- MySQL dump 10.13  Distrib 5.1.71, for unknown-linux-gnu (x86_64)
--
-- Host: localhost    Database: zerosptp_zeros
-- ------------------------------------------------------
-- Server version	5.1.71-rel14.9-log

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
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`doctor_id`),
  CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` (`doctor_id`, `specialization`, `dob`) VALUES (9,'','0000-00-00'),(15,'','0000-00-00'),(18,'','0000-00-00'),(22,'','0000-00-00'),(24,'','0000-00-00'),(26,'','0000-00-00'),(29,'','0000-00-00'),(30,'','0000-00-00'),(32,'','0000-00-00'),(33,'','0000-00-00'),(34,'','0000-00-00');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labs`
--

DROP TABLE IF EXISTS `labs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  PRIMARY KEY (`lab_id`),
  CONSTRAINT `fk_lab_id` FOREIGN KEY (`lab_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labs`
--

LOCK TABLES `labs` WRITE;
/*!40000 ALTER TABLE `labs` DISABLE KEYS */;
INSERT INTO `labs` (`lab_id`) VALUES (8),(10),(19),(20),(21),(27);
/*!40000 ALTER TABLE `labs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `notif_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `in_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `user_id`, `message`, `read`, `notif_on`) VALUES (1,9,'sanketh sent a report for review',1,'2014-10-10 12:38:48'),(2,9,'sanketh sent a report for review',1,'2014-10-10 15:02:41'),(3,9,'sanketh sent a report for review',1,'2014-10-10 15:02:49'),(4,7,'pras updated his review for report test 2',1,'2014-10-10 18:28:31'),(5,9,'sanketh sent a report for review',1,'2014-10-10 18:55:52'),(6,9,'sanketh sent a report for review',1,'2014-10-10 19:00:25'),(7,9,'sanketh sent a report for review',1,'2014-10-10 19:00:45'),(8,7,'pras updated his review for report Cardio Report',1,'2014-10-10 19:02:18'),(9,7,'pras updated his review for report test 2',1,'2014-10-10 19:04:03'),(10,7,'pras updated his review for report test report',1,'2014-10-10 19:05:06'),(11,7,'pras updated his review for report X Ray Scan Thigh Bone',1,'2014-10-10 19:06:44'),(12,7,'pras updated his review for report test 2',1,'2014-10-11 20:01:37'),(13,7,'pras updated his review for report test 2',1,'2014-10-11 20:02:57'),(14,7,'pras updated his review for report test 2',1,'2014-10-11 20:03:31'),(15,9,'sanketh sent a report for review',1,'2014-10-11 20:17:46'),(16,7,'pras updated his review for report Nee bondha',1,'2014-10-11 20:19:57'),(17,15,'ujjwal sent a report for review',1,'2014-10-12 05:20:31'),(18,15,'palindrome sent a report for review',1,'2014-10-12 05:55:58'),(19,7,'pras updated his review for report Nee bondha',1,'2014-10-12 13:37:56'),(20,9,'sanketh sent a report for review',1,'2014-10-12 13:41:45'),(21,18,'ujjwal sent a report for review',0,'2014-10-12 17:08:04'),(22,11,'Nitin updated his review for report kala',1,'2014-10-12 17:08:35'),(23,18,'ujjwal sent a report for review',0,'2014-10-12 17:22:52'),(24,11,'Nitin updated his review for report report',1,'2014-10-12 17:23:36'),(25,7,'pras updated his review for report Test rpeort',1,'2014-10-14 07:10:07'),(26,30,'sanketh sent a report for review',1,'2014-10-15 07:34:05'),(27,30,'prudhvi93 sent a report for review',1,'2014-10-15 07:37:08'),(28,31,'sanketh95 updated his review for report Blood Test',1,'2014-10-15 07:37:57'),(29,31,'sanketh95 updated his review for report Blood Test',1,'2014-10-15 07:41:25'),(30,31,'sanketh95 updated his review for report Blood Test',1,'2014-10-15 07:42:00'),(31,31,'lab uploaded a report named rname for you',1,'2014-10-15 09:18:12'),(32,31,'lab uploaded a report named Nation for you',1,'2014-10-15 09:19:45'),(33,31,'lab uploaded a report named Nation for you',1,'2014-10-15 09:20:18'),(34,32,'ujjwal sent a report for review',1,'2014-10-16 04:28:25'),(35,32,'ujjwal sent a report for review',1,'2014-10-16 04:28:55'),(36,32,'ujjwal sent a report for review',1,'2014-10-16 04:29:25'),(37,11,'kula updated his review for report report',1,'2014-10-16 04:32:41'),(38,33,'ujjwal sent a report for review',0,'2014-10-16 05:32:45'),(39,33,'ujjwal sent a report for review',0,'2014-10-16 05:33:33'),(40,11,'Varma updated his review for report report',1,'2014-10-16 05:35:40'),(41,11,'Varma updated his review for report report',1,'2014-10-16 05:35:44'),(42,34,'ujjwal sent a report for review',1,'2014-10-17 13:05:53'),(43,11,'sharma updated his review for report Trtutgjg',1,'2014-10-17 13:07:13');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`patient_id`),
  CONSTRAINT `fk_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`patient_id`, `dob`) VALUES (7,'0000-00-00'),(11,'0000-00-00'),(12,'0000-00-00'),(13,'0000-00-00'),(14,'0000-00-00'),(16,'0000-00-00'),(17,'0000-00-00'),(23,'0000-00-00'),(25,'0000-00-00'),(31,'0000-00-00');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(100) NOT NULL,
  `u_by` int(11) NOT NULL,
  `u_for` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `u_for` (`u_for`),
  CONSTRAINT `fk_u_for` FOREIGN KEY (`u_for`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` (`id`, `rname`, `u_by`, `u_for`, `fname`, `uploaded_on`) VALUES (5,'jaffa',7,7,'0a320b7cab229bbedc92ebaf8643de28.pdf','2014-10-10 09:38:51'),(6,'Blue Ray',8,7,'90290e356e1dd3e847772519ffc6bc79.pdf','2014-10-10 09:47:52'),(7,'Ray ',7,7,'b125175a765a97df8d1b54aded41cbc0.pdf','2014-10-10 18:38:57'),(8,'test repost',8,7,'5a7a2bb9d67916bdfe3626bd2a966932.pdf','2014-10-11 03:26:51'),(9,'fdfasdfas',7,7,'fba60c31c968c7931afb707755882ae4.pdf','2014-10-11 03:33:56'),(10,'test report',10,7,'e60337d0d773478c3d12a955174b1b27.pdf','2014-10-11 05:46:46'),(11,'test 2',7,7,'fb0daee485bd1ec1bfe5883939790c9a.pdf','2014-10-11 05:49:13'),(12,'My Blood Report',7,7,'f8afc201a3d5b21cf597a4cb0a641375.pdf','2014-10-10 07:00:57'),(13,'Cardio Report',7,7,'bac2788c43ea5d54cad881c467381a2f.pdf','2014-10-10 14:47:21'),(14,'Cardio Report',7,7,'c9c432855ecdf8c76ff642ea794450fd.pdf','2014-10-10 14:47:21'),(15,'Treadmill Test Report',7,7,'5de3f6c43f1da32a2f5be0b77d2b5942.pdf','2014-10-10 14:47:55'),(16,'X Ray Scan Thigh Bone',7,7,'d9921f3c16cc3af306aa3e3e4fc45805.pdf','2014-10-10 14:48:36'),(17,'Nee bondha',7,7,'be2f722f679c31bf59bb03820e3f269e.pdf','2014-10-11 20:17:38'),(18,'first post',11,11,'0834d7dedba9e274c1beb0a56b90ad1a.pdf','2014-10-12 02:35:58'),(19,'Blood Group',12,12,'16cf2e2a553b831166d2c4cc4b00f936.pdf','2014-10-12 03:12:47'),(20,'Dominos',13,13,'ff8b597f47c02529089bcd9f62d0ddcb.pdf','2014-10-12 04:05:41'),(21,'metro map',14,14,'70d78cd1c08fc8904a268ed7b08fee3a.pdf','2014-10-12 04:49:07'),(22,'Report',16,16,'c73053ebe83458f505607c51b3eced94.pdf','2014-10-12 05:53:04'),(23,'Test rpeort',7,7,'1754fb3feb6ed486741f8f9a30220fb5.pdf','2014-10-12 13:41:17'),(24,'kala',11,11,'433393d51b880979b47b5b13044aa25a.pdf','2014-10-12 17:07:49'),(25,'report',19,11,'6cd57fc0bcc24486d360fc61695c8d54.pdf','2014-10-12 17:13:12'),(26,'sdcsdsdcv',11,11,'c4a0166466b3b83dca404313290e0642.pdf','2014-10-13 08:23:25'),(27,'Blood Test',31,31,'e9371734f8d6b8256f745e4d6629e2a6.pdf','2014-10-15 07:36:48'),(28,'CT Scan',8,31,'c431d7af047649e05a308a58b841c32a.jpg','2014-10-15 08:59:01'),(29,'MRI Scan',8,31,'c7621e39a68c6da15872b1dd47405bdf.pdf','2014-10-15 09:02:32'),(30,'Treadmill Test Report',8,31,'ace5428d18bc1dfadeeaa1a3255d2795.pdf','2014-10-15 09:04:54'),(31,'Cardio Report',8,31,'14dedc0d174ebe8a1f77f729b72897a6.pdf','2014-10-15 09:07:47'),(32,'X Ray Scan Thigh Bone',8,31,'1322062218eb0ad609ec041bb4b7866e.pdf','2014-10-15 09:12:22'),(33,'Nation',8,31,'359f5f9fbef7356ab44740c5936b214d.pdf','2014-10-15 09:18:12'),(34,'Nation',8,31,'295f455ce1a2c8380d842053dbe93cf0.pdf','2014-10-15 09:19:45'),(35,'Nation',8,31,'74ad435ed934ec153be0feddc6e8f3f8.pdf','2014-10-15 09:20:18'),(36,'Testing ',11,11,'7050a86d6fde69f4283fe12711758ff6.jpg','2014-10-16 06:18:52'),(37,'Trtutgjg',11,11,'b173959388ac00e4866b0ce0d2402f83.jpg','2014-10-16 09:27:25');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `comments` longtext,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_r_d_id` (`r_id`,`d_id`),
  KEY `in_d_id` (`d_id`),
  CONSTRAINT `fk_d_id` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_r_id` FOREIGN KEY (`r_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `r_id`, `d_id`, `comments`, `reviewed`) VALUES (2,6,9,'akjsdgalksjdh;als',1),(3,5,9,NULL,0),(4,7,9,'Dooki sachipo',1),(5,10,9,'You are dead !',1),(6,11,9,'I\'ll die',1),(7,9,9,NULL,0),(8,8,9,NULL,0),(9,16,9,'Kalu teeseyali',1),(10,14,9,NULL,0),(11,15,9,NULL,0),(12,13,9,'Yo bro !',1),(13,12,9,NULL,0),(14,17,9,'Test comment\n',1),(15,18,15,NULL,0),(16,22,15,NULL,0),(17,23,9,'fdfdsfsfsadfsdfsdfsfdsfsdfsdfsdfsdf',1),(18,24,18,'                                                           thik hai',1),(19,25,18,'                                             ahhaa               ',1),(20,23,30,NULL,0),(21,27,30,'Your die , you die !',1),(22,26,32,NULL,0),(24,25,32,'                                you are healthy                            ',1),(25,24,32,NULL,0),(26,25,33,'                                  hjiiiii\n                          ',1),(27,24,33,NULL,0),(28,37,34,'                                                            sahi hai',1);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('DOCTOR','PATIENT','LAB') NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `addrline1` text,
  `addrline2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `type`, `phone`, `addrline1`, `addrline2`, `city`, `state`, `pin`) VALUES (7,'sanketh','jaffa','admin@me.in','sanketh','PATIENT',NULL,'','','','',''),(8,'lab','lab','lab@me.com','Lab','LAB',NULL,NULL,NULL,NULL,NULL,NULL),(9,'pras','pras','s@me.in','Saprashanth','DOCTOR',NULL,'huijkl','','','',''),(10,'kumar','test','kumar@me.in','kumar','LAB',NULL,'delhi','','','',''),(11,'ujjwal','kuy99999','kingsinghujjwal9@gmail.com','kumar','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(12,'nilanshu0501','98996400222','nilanshu0501@yahoo.co.in','Neel','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(13,'Arpit Artworks','registered','arpitsaxena91@gmail.com','Arpit Saxena','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(14,'krish','krishanu','krishi.yadav5@gmail.com','krishanu','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(15,'Dr.Aarti','aarti_munch','draartikumariyadav@gmail.com','Dr.Aarti kumari','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(16,'palindrome','friends@05','nitin.gupta054@gmail.com','Nitin Gupta','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(17,'Saxena','21345589','amit1235813@gmail.com','Amit','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(18,'Nitin','friends@05','nitingupta1250@gmail.com','Nitin','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(19,'lab','kuy99999','nitgupt@adobe.com','lab','LAB',NULL,NULL,NULL,NULL,NULL,NULL),(20,'Jeetu','jeetusaurav','labocarediagnostics@gmail.com','Labocarediagnostic','LAB',NULL,NULL,NULL,NULL,NULL,NULL),(21,'Ubhay','9650271877','ubhayrajput01@gmail.com','Ubhay ','LAB',NULL,NULL,NULL,NULL,NULL,NULL),(22,'drgoswami','jaishriram11$','drrahulgoswami@yahoo.co.in','rahul','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(23,'sachinece9','sac@22298','sachin.yadav4555@gmail.com','Sachin','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(24,'pawanpachwania','240737','pachwania.pawan@gmail.com','PAWAN PACHWANIA','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(25,'ishitachawla','reebok24oct','ishcha177@gmail.com','Ishita Chawla','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(26,'product','hello','','dot','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(27,'ankit','ankit','psc.vasundhara2@lalpathlab.com','ankit','LAB',NULL,NULL,NULL,NULL,NULL,NULL),(28,'Ankit255','vasu','psc.vasundhara2@lalpathlabs.com','Ankit','',NULL,NULL,NULL,NULL,NULL,NULL),(29,'Gupta','mohit$','mohitg13@gmail.com','Mohit','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(30,'sanketh95','sanketh','sanketh.mopuru@gmail.com','Sanketh','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(31,'prudhvi93','prudhvi','prudhviraj.iit@gmail.com','Prudhvi','PATIENT',NULL,NULL,NULL,NULL,NULL,NULL),(32,'kula','kuy99999','kumarujjwal.zeros@gmail.com','kala','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL),(33,'Varma','smithasairam','rahulsmitha@yahoo.com','Rahul','DOCTOR',NULL,'','','','',''),(34,'sharma','qwert','komalsharmame@gmail.com','komal','DOCTOR',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'zerosptp_zeros'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-18  6:48:25
