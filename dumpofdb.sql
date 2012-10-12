-- MySQL dump 10.13  Distrib 5.5.25, for osx10.6 (i386)
--
-- Host: retrojorgen.mysql.domeneshop.no    Database: retrojorgen
-- ------------------------------------------------------
-- Server version	5.5.28-log

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
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `followerid` int(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8474 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (8396,1,1),(8402,3,1),(8404,3,3),(8405,1,3),(8468,1,4),(8469,9,1),(8470,9,9),(8471,10,1),(8472,10,10),(8473,1,10);
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `latestshareview`
--

DROP TABLE IF EXISTS `latestshareview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `latestshareview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shareid` int(40) DEFAULT NULL,
  `userid` int(40) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `latestshareview`
--

LOCK TABLES `latestshareview` WRITE;
/*!40000 ALTER TABLE `latestshareview` DISABLE KEYS */;
INSERT INTO `latestshareview` VALUES (5,8457,1,'2012-10-10 12:40:22');
/*!40000 ALTER TABLE `latestshareview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `latestview`
--

DROP TABLE IF EXISTS `latestview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `latestview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shareid` int(40) DEFAULT NULL,
  `userid` int(40) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `latestview`
--

LOCK TABLES `latestview` WRITE;
/*!40000 ALTER TABLE `latestview` DISABLE KEYS */;
INSERT INTO `latestview` VALUES (18,8457,1,'2012-10-10 11:48:38'),(20,8448,9,'2012-10-04 15:13:39'),(21,8451,10,'2012-10-04 17:10:00');
/*!40000 ALTER TABLE `latestview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shareid` int(40) DEFAULT NULL,
  `userid` int(40) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sharelog`
--

DROP TABLE IF EXISTS `sharelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sharelog` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `page` text COLLATE latin1_danish_ci NOT NULL,
  `username` int(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_name` varchar(250) COLLATE latin1_danish_ci DEFAULT NULL,
  `message` varchar(100) COLLATE latin1_danish_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8458 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sharelog`
--

LOCK TABLES `sharelog` WRITE;
/*!40000 ALTER TABLE `sharelog` DISABLE KEYS */;
INSERT INTO `sharelog` VALUES (8408,'http://www.vg.no/',6,'2012-09-12 19:46:57','VG Nett - Forsiden - VG Nett','hest'),(8409,'http://www.retrojorgen.com/congratulations.html',7,'2012-09-12 19:52:01','www.retrojorgen.com/congratulations.html','Heisann!'),(8410,'http://www.retrojorgen.com/congratulations.html',8,'2012-09-12 19:54:44','www.retrojorgen.com/congratulations.html','Heusann'),(8411,'http://www.dagbladet.no/2012/09/12/nyheter/madeleine_rodriguez/bolivia/kokain/utenriks/23351448/',8,'2012-09-12 19:57:15','- Jeg skulle vÃ¦rt sluppet i august, men mÃ¥ sitte og rÃ¥tne i fengsel - nyheter - Dagbladet.no','Dette var stilig'),(8412,'http://2012.dconstruct.org/conference/jenson/',1,'2012-09-13 08:11:17','dConstruct 2012 Â· Scott Jenson','Cool speech about dropping mobile apps'),(8413,'chrome://chrome/extensions/',8,'2012-09-13 18:28:40','Extensions','This is a really long text using all of the space availiblee'),(8414,'http://www.dagbladet.no/2012/09/14/nyheter/prins_william/kongelige/kate_middleton/utenriks/23417384/',8,'2012-09-14 17:05:10','Kate og William saksÃ¸ker fransk blad etter skandalebilder av topplÃ¸skos - nyheter - Dagbladet.no','this looks awesome'),(8415,'http://www.retrojorgen.com/congratulations.html',3,'2012-09-15 16:29:40','www.retrojorgen.com/congratulations.html','oh shiiiit'),(8416,'http://www.youtube.com/results?search_query=best+talkshow+ever&oq=best+talkshow+ever&gs_l=youtube.3..0i10l4.1571.4202.0.6625.18.17.0.1.1.0.77.799.17.17.0...0.0...1ac.1.KKxTvg8jeYc',3,'2012-09-15 16:44:36','best talkshow ever - YouTube','czech it out!'),(8417,'http://www.insitedesignlab.com/how-to-make-a-single-page-website/',8,'2012-09-17 13:36:31','How to Make a Single Page Website - Insite Design Lab','Been looking for a blog post on creating a single page site'),(8418,'http://www.retrojorgen.com/showfollowersJSON.php',8,'2012-09-20 11:01:03','www.retrojorgen.com/showfollowersJSON.php','halla!'),(8419,'http://en.wikipedia.org/wiki/Stockholmsnatt',8,'2012-09-20 11:09:23','Stockholmsnatt - Wikipedia, the free encyclopedia','Must remember to watch this movie'),(8420,'http://www.youtube.com/watch?v=CFcvMBz6hTM',8,'2012-09-20 11:18:24','SÃ¶karna - YouTube','Need to remember to watch this as well'),(8444,'http://www.smashingmagazine.com/2012/09/21/not-all-doom-gloom-web-community/',8,'2012-09-24 07:45:46','It\'s Not All Doom And Gloom On The Web | Smashing Magazine','Cool article about web communities'),(8445,'http://gfx.nrk.no/-qWzIhaExRm0smitIkve_wauDMlOjnTkwXBDqgCReq9g.jpg',8,'2012-09-24 07:52:01','-qWzIhaExRm0smitIkve_wauDMlOjnTkwXBDqgCReq9g.jpg (462Ã—260)','Funny chat'),(8446,'www.vg.no',8,'2012-09-25 10:49:48','vg.no','Denne siden har nyheter på seg'),(8447,'www.vg.no',8,'2012-09-25 10:50:02','vg.no','Denne siden har nyheter på seg'),(8448,'http://open.spotify.com/track/4fneOmcXmPrDQ2ZsSbExXW',9,'2012-10-04 15:13:36','General Error by 047 on Spotify','Freaking love this song'),(8449,'http://open.spotify.com/track/4fneOmcXmPrDQ2ZsSbExXW',1,'2012-10-04 15:15:40','General Error by 047 on Spotify','I freaking love this song oh yeeh.'),(8450,'http://i.imgur.com/Tlu8H.gif',1,'2012-10-04 16:27:13','Tlu8H.gif (250Ã—187)','haha..!'),(8451,'http://blog.freshteapot.net/post/32555426931/sneak-peak-d3-wordcloud-tree-data',10,'2012-10-04 17:09:50','Chris & Computers - Playing with d3 continues','@retrojorgen Awesome extension #rjchrome_extension'),(8454,'http://open.spotify.com/track/4iJPiihfg0ylhZr5c1Hd7n',1,'2012-10-05 09:04:08','Girls (Original Mix) by Prodigy on Spotify','Still one of the best prodigy songs'),(8455,'http://open.spotify.com/track/6Ku78IkySXj208dEElgNmg',1,'2012-10-10 08:29:51','There Will Never Be Another You by Lester Young and Oscar Peterson on Spotify','Oscar Peterson. The man'),(8456,'http://imgur.com/Zu0et',1,'2012-10-10 09:13:51','Whenever I go to the club these days... - Imgur','hihi :)'),(8457,'http://www.theverge.com/2012/10/10/3482590/watch-this-electromagnetic-induction-levitation',1,'2012-10-10 11:48:27','Watch this: Electromagnetic induction demonstrated by levitating an aluminum plate | The Verge','This is pretty cool');
/*!40000 ALTER TABLE `sharelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(40) COLLATE latin1_danish_ci DEFAULT NULL,
  `created_at` varchar(40) COLLATE latin1_danish_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'retrojorgen','Tue Apr 14 08:12:33 +0000 2009','2012-07-28 11:57:43'),(3,'tantepose','Tue Jan 06 08:39:18 +0000 2009','2012-08-08 19:37:33'),(4,'ptdorf','Fri Feb 15 06:04:09 +0000 2008','2012-08-10 14:34:37'),(9,'latestversions','Tue Mar 20 14:29:37 +0000 2012','2012-10-04 15:10:35'),(10,'freshteapot','Fri May 09 02:46:45 +0000 2008','2012-10-04 17:05:57');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-12 11:03:08
