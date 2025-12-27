/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: recipe_tempora
-- ------------------------------------------------------
-- Server version	11.7.2-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `difficulties`
--

DROP TABLE IF EXISTS `difficulties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `difficulties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difficulties`
--

LOCK TABLES `difficulties` WRITE;
/*!40000 ALTER TABLE `difficulties` DISABLE KEYS */;
INSERT INTO `difficulties` VALUES
(1,'easy'),
(2,'medium'),
(3,'hard');
/*!40000 ALTER TABLE `difficulties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES
(1,'oeuf'),
(2,'lait'),
(3,'farine'),
(4,'Rhum'),
(5,'Sel'),
(6,'beurre');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_ingredients`
--

DROP TABLE IF EXISTS `recipe_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe_ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `uid_recipe` varchar(32) NOT NULL,
  PRIMARY KEY (`id_ingredient`,`uid_recipe`),
  KEY `recipe_ingredient_recipe_FK` (`uid_recipe`),
  CONSTRAINT `recipe_ingredient_ingredient_Id_fk` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id`),
  CONSTRAINT `recipe_ingredient_recipe_FK` FOREIGN KEY (`uid_recipe`) REFERENCES `recipes` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_ingredients`
--

LOCK TABLES `recipe_ingredients` WRITE;
/*!40000 ALTER TABLE `recipe_ingredients` DISABLE KEYS */;
INSERT INTO `recipe_ingredients` VALUES
(1,'3','Bm7Cr9DdFqsJh3Al'),
(2,'2l','Bm7Cr9DdFqsJh3Al'),
(3,'500 g','Bm7Cr9DdFqsJh3Al'),
(3,'2l','lklxUSfcUb9GFYjD'),
(4,'un peu de','Bm7Cr9DdFqsJh3Al'),
(4,'12 l de ','lklxUSfcUb9GFYjD');
/*!40000 ALTER TABLE `recipe_ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipes` (
  `uid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `uid_user` varchar(32) NOT NULL,
  `uid_chef` varchar(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `steps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NOT NULL,
  `duration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `kitchenware` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci DEFAULT NULL,
  `nb_people` int(11) NOT NULL,
  `id_difficulty` int(11) NOT NULL DEFAULT 1,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `recipes_users_uid_fk` (`uid_user`),
  KEY `recipes_difficulties_FK` (`id_difficulty`),
  KEY `recipes_types_FK` (`id_type`),
  KEY `recipes_users_FK` (`uid_chef`),
  CONSTRAINT `recipes_difficulties_FK` FOREIGN KEY (`id_difficulty`) REFERENCES `difficulties` (`id`),
  CONSTRAINT `recipes_types_FK` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`),
  CONSTRAINT `recipes_users_FK` FOREIGN KEY (`uid_chef`) REFERENCES `users` (`uid`),
  CONSTRAINT `recipes_users_uid_fk` FOREIGN KEY (`uid_user`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES
('Bm7Cr9DdFqsJh3Al','N3a7ED9arzFlDbbs','N3a7ED9arzFlDbbs','Crepes','Oui','Tu mélange tout','9min','Fouet ',10,1,'2025-12-27 17:55:34','2025-12-27 17:55:34',1),
('lklxUSfcUb9GFYjD','N3a7ED9arzFlDbbs','ma3wCVJ9yBXQ3jn8','Flioup','','C\'est la fête des canards','10 min','',2,3,'2025-12-27 17:58:27','2025-12-27 17:58:27',1);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'user'),
(10,'administrator');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES
(1,'savory'),
(2,'sweet');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reset_password`
--

DROP TABLE IF EXISTS `user_reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_reset_password` (
  `uid_user` varchar(32) NOT NULL,
  `link` varchar(64) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`uid_user`),
  CONSTRAINT `user_reset_password_users_FK` FOREIGN KEY (`uid_user`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reset_password`
--

LOCK TABLES `user_reset_password` WRITE;
/*!40000 ALTER TABLE `user_reset_password` DISABLE KEYS */;
INSERT INTO `user_reset_password` VALUES
('N3a7ED9arzFlDbbs','yUrlFbdO9t5uSHY6C2lI0vtNPBxHFNQm','2025-12-15 15:15:32');
/*!40000 ALTER TABLE `user_reset_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `uid_user` varchar(32) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1,
  `date_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`uid_user`,`id_role`),
  KEY `user_role_roles_FK` (`id_role`),
  CONSTRAINT `user_role_roles_FK` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_role_users_FK` FOREIGN KEY (`uid_user`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES
('ma3wCVJ9yBXQ3jn8',1,'2025-12-27 17:51:12'),
('N3a7ED9arzFlDbbs',10,'2025-12-27 17:51:00');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tokens` (
  `uid` varchar(32) NOT NULL,
  `uid_user` varchar(32) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`uid`),
  KEY `user_tokens_users_FK` (`uid_user`),
  CONSTRAINT `user_tokens_users_FK` FOREIGN KEY (`uid_user`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` VALUES
('7MDf33RzsasGJ1xu','N3a7ED9arzFlDbbs','127.0.0.1','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE3Njk0NDUwMzksImRhdGEiOiJbXSJ9.tqsK1kxZ8pv8YbIMqIhfbBnLJ7DmRKcxJtikkxtP9dA','2025-12-27 17:30:39'),
('STMgpitLO5P27dA3','N3a7ED9arzFlDbbs','127.0.0.1','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE3NjgzODY3OTUsImRhdGEiOiJbXSJ9.nCX0Xrv-IJ_8y7EkHi7fhA_UiGnvoQzxmDMNTECpg9s','2025-12-15 11:33:15');
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `to_modify` tinyint(1) NOT NULL DEFAULT 0,
  `date_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`uid`),
  UNIQUE KEY `users_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
('ma3wCVJ9yBXQ3jn8','Laure','Gonnord','test','$2y$12$/HvkN/w111qVN9IvNTs0C..48T6B7l7VyxJXCrr357QYflIfnVgze',0,'2025-12-26 00:17:32','2025-12-26 00:17:32'),
('N3a7ED9arzFlDbbs','Marine','Gonnord','marine.gonnord.pro@gmail.com','$2y$12$.sD4cwfc30w1hQWwqtIQfOtr/nJzR.aPPdSXxmBX52ZHXaawWmDzW',0,'2025-12-13 18:32:57','2025-12-13 18:32:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_uca1400_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER add_role
AFTER INSERT
ON users FOR EACH ROW
BEGIN
	INSERT INTO user_role (uid_user) VALUES (NEW.uid);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'recipe_tempora'
--

--
-- Dumping routines for database 'recipe_tempora'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-27 18:00:19
