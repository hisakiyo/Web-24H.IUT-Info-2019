-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnueabihf (armv8l)
--
-- Host: localhost    Database: 24h
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

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
-- Table structure for table `Cafes`
--

DROP TABLE IF EXISTS `Cafes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cafes` (
  `id_caf` int(11) NOT NULL,
  `nom_caf` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_caf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cafes`
--

LOCK TABLES `Cafes` WRITE;
/*!40000 ALTER TABLE `Cafes` DISABLE KEYS */;
INSERT INTO `Cafes` VALUES (1,'Arabica'),(2,'Robusta');
/*!40000 ALTER TABLE `Cafes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Commandes`
--

DROP TABLE IF EXISTS `Commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Commandes` (
  `typ_caf` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `id_pay` int(11) NOT NULL,
  `qte_com` int(11) DEFAULT NULL,
  `nom_expo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dat_com` date DEFAULT NULL,
  `num_com` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`num_com`),
  KEY `const_id_caf` (`typ_caf`),
  KEY `const_pay_comm` (`id_pay`),
  KEY `const_fournisseur_comm` (`nom_expo`),
  CONSTRAINT `const_fournisseur_comm` FOREIGN KEY (`nom_expo`) REFERENCES `Utilisateurs` (`id_con_uti`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commandes`
--

LOCK TABLES `Commandes` WRITE;
/*!40000 ALTER TABLE `Commandes` DISABLE KEYS */;
INSERT INTO `Commandes` VALUES ('1',3,1,'user1','2019-05-24',1),('2',3,30,'user1','2019-05-24',4),('1',4,40,'user1','2019-05-24',5),('1',5,69,'user1','2019-05-24',6),('1',10,420,'user1','2019-05-24',7),('1',3,1,'user1','2019-05-24',8),('1',3,1,'user1','2019-05-24',9),('1',3,1,'user1','2019-05-24',10),('1',3,4,'user1','2019-05-24',11),('2',3,1,'user1','2019-05-24',12);
/*!40000 ALTER TABLE `Commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pays`
--

DROP TABLE IF EXISTS `Pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pays` (
  `id_pay` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lib_pay` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `des_pay` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
  `cap_pay` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `dra_pay` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `hab_pay` int(100) DEFAULT NULL,
  `sur_pay` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_pay`),
  UNIQUE KEY `id_pay` (`id_pay`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pays`
--

LOCK TABLES `Pays` WRITE;
/*!40000 ALTER TABLE `Pays` DISABLE KEYS */;
INSERT INTO `Pays` VALUES (3,'Bresil','Le Bresil, en forme longue la republique federative du Bresil,\nest le plus grand Etat d’Amerique latine. Le Bresil est le cinquieme plus grand pays de la planete,\nderriere la Russie, le Canada, les etats-Unis et la Chine.','Brasilia','Bresil.png',208846892,8514876),(4,'Viêt Nam','Le Viêt Nam, Viet Nam, Vietnam ou Viêtnam, en forme longue la republique socialiste du Viêt Nam,\nen vietnamien Việt Nam Écouter et Cộng hoà Xã hội Chủ nghĩa Việt Nam Écouter, est un pays d\'Asie du Sud-Est situé à l\'est \nde la péninsule indochinoise.','Hanoï','Vietnam.png',92699227,330997),(5,'Indonesie','L’Indonesie, en forme longue la republique d Indonesie est un pays transcontinental \n     principalement situe en Asie du Sud-Est4. Avec, comptabilisees à ce jour, 13 466 îles, dont 922 habitees, \n     il s agit du plus grand archipel au monde.','Jakarta','Indonesie.png',262787403,1904569),(7,'Colombie','La Colombie, en forme longue la république de Colombie (en espagnol : Colombia ou República de Colombia Speaker Icon.svg audio) \n    est une république constitutionnelle unitaire comprenant 32 départements.','Bogota','Colombie.png',49100000,1141748),(8,'Ethopie','L\'Éthiopie, en forme longue la république démocratique fédérale d’Éthiopie, en amharique Ītyōṗṗyā Écouter, ኢትዮጵያ et ye-Ītyōṗṗyā \n    Fēdēralāwī Dīmōkrāsīyāwī Rīpeblīk Écouter,\n     የኢትዮጵያ ፌዴራላዊ ዲሞክራሲያዊ ሪፐብሊክ, est un État de la Corne de l\'Afrique.','Addis-Abeba','Ethiopie.png',108386391,112712),(9,'Inde','L\'Inde (en hindi : भारत / Bhārat), officiellement la république de l\'Inde (en hindi : भारत गणराज्य / Bhārat Gaṇarājya), \n    est un pays d\'Asie du Sud qui occupe la majeure partie du sous-continent indien.','New Delhi','Inde.png',1296834042,3287263),(10,'Honduras','Le Honduras, en forme longue la république du Honduras, en espagnol República de Honduras, est un pays situé en \n    Amérique centrale, limité au nord par la mer des Caraïbes, qui compte de nombreuses îles, cayes et îlots \n    dont les plus importants sont les Islas de la Bahía et les îles du Cygne (voir version anglaise ou espagnole pour plus d\'informations).','Tegucigalpa','Hunduras.png',9182766,112090),(11,'Perou','Le Pérou, en forme longue la république du Pérou, en espagnol Perú et República del Perú (Speaker Icon.svg audio),\n     en quechua Piruw et Piruw Republika et en aymara Piruw et Piruw Suyu, est un pays situé dans l\'Ouest de l\'Amérique du Sud.','Lima','Perou.png',32280640,1285315),(12,'Mexique','Le Mexique, en forme longue les États-Unis mexicains6, en espagnol México et Estados Unidos Mexicanos, est un pays situé dans la partie méridionale de l\'Amérique du Nord.','Mexico','Mexique.png',125959205,1964375),(13,'Gautemala','Le Guatemala, ou Guatémala4, en forme longue la république du Guatemala (ou du Guatémala), en espagnol : República de Guatemala, est un pays d\'Amérique centrale entouré par le Mexique, le Belize, la mer des Caraïbes, le Honduras, le Salvador et l\'océan Pacifique. Il fait partie de l\'Amérique latine.\n     Son nom vient du nahuatl Cuauhtēmallān, qui peut se traduire par « lieu rempli d\'arbres5» \n     et signifie peut-être « pays des Quichés ».','Guatemala','Gautemala.png',16581273,108890);
/*!40000 ALTER TABLE `Pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Quantites`
--

DROP TABLE IF EXISTS `Quantites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Quantites` (
  `id_caf` int(11) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `quantite` double DEFAULT NULL,
  KEY `const_caf_quant` (`id_caf`),
  KEY `const_pay_quant` (`id_pays`),
  CONSTRAINT `const_caf_quant` FOREIGN KEY (`id_caf`) REFERENCES `Cafes` (`id_caf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Quantites`
--

LOCK TABLES `Quantites` WRITE;
/*!40000 ALTER TABLE `Quantites` DISABLE KEYS */;
INSERT INTO `Quantites` VALUES (1,1,38),(2,1,14),(1,2,1),(1,2,22),(1,3,1.5),(2,3,7.5),(1,4,8),(2,4,0),(1,5,6),(2,5,0),(1,6,1.5),(2,6,3.5),(1,7,5),(2,7,0),(1,8,4.5),(1,9,4.5),(1,10,4);
/*!40000 ALTER TABLE `Quantites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utilisateurs`
--

DROP TABLE IF EXISTS `Utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utilisateurs` (
  `id_con_uti` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp_uti` varchar(50) COLLATE utf8_bin NOT NULL,
  `lib_ent` varchar(50) COLLATE utf8_bin NOT NULL,
  `adr_uti` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `tel_uti` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `typ_uti` int(11) NOT NULL,
  `cod_pos_uti` int(11) DEFAULT NULL,
  `vil_uti` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `pays_uti` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_con_uti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utilisateurs`
--

LOCK TABLES `Utilisateurs` WRITE;
/*!40000 ALTER TABLE `Utilisateurs` DISABLE KEYS */;
INSERT INTO `Utilisateurs` VALUES ('user1','user1','ok','d','5',1,5,'d','d');
/*!40000 ALTER TABLE `Utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-24 20:38:26
