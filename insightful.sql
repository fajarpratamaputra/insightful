# ************************************************************
# Sequel Ace SQL dump
# Version 2111
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: insightful
# Generation Time: 2020-11-27 03:21:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `category`, `created_at`)
VALUES
	(1,'tes update','2020-11-27 08:03:11');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_chat_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_chat_group`;

CREATE TABLE `category_chat_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `psycologist_id` int(11) DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `is_publish` tinyint(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table counseling
# ------------------------------------------------------------

DROP TABLE IF EXISTS `counseling`;

CREATE TABLE `counseling` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `psycologist_id` int(11) DEFAULT NULL,
  `diagnosis` text,
  `status` tinyint(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table healty_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `healty_status`;

CREATE TABLE `healty_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_title` varchar(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `psycologist_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table hrd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hrd`;

CREATE TABLE `hrd` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `photo` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `hrd` WRITE;
/*!40000 ALTER TABLE `hrd` DISABLE KEYS */;

INSERT INTO `hrd` (`id`, `office_id`, `fullname`, `phone`, `address`, `photo`, `email`, `password`, `date_created`)
VALUES
	(3,1,'Ismaill','02192100123','Makassar','file-1606008794.png','admin@admin.com','$2a$08$R38Ne1H4Rg3HWRoj0LaMROr6AHH3rXntwaL838vNG5zH7VnmlqO0W','2020-11-25 04:25:41'),
	(4,1,'hrd','087','tes','file-1606446710.png','hr123@gmail.com','$2a$08$xKWJj1ndGncwRy6inAn.2eRCTWxkOd/r1St6syi444SzdVVKqO8qK',NULL);

/*!40000 ALTER TABLE `hrd` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mood_record
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mood_record`;

CREATE TABLE `mood_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `mood` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `banner` varchar(100) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `description`, `banner`, `category`, `status`, `author`, `date_created`)
VALUES
	(5,'tes saja','<p>tes&nbsp;</p><p><br></p>',NULL,0,'0','','2020-11-27 10:25:55'),
	(6,'apa lagi','<p>tes juga nda papa ji</p>','file-1606442695.png',1,'1','tes','2020-11-27 10:54:20');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table office
# ------------------------------------------------------------

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `date_created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;

INSERT INTO `office` (`id`, `name`, `phone`, `email`, `address`, `date_created`)
VALUES
	(1,'telkom branch manado','0411232425','telkom@telkom.co.id','Manado','2020-11-25 05:11:05'),
	(2,'Telkom Branch Kendari','0411535859',NULL,'Kendari','2020-11-22 06:40:42');

/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table psycologist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `psycologist`;

CREATE TABLE `psycologist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text,
  `photo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `psycologist` WRITE;
/*!40000 ALTER TABLE `psycologist` DISABLE KEYS */;

INSERT INTO `psycologist` (`id`, `fullname`, `phone`, `address`, `photo`, `email`, `password`, `date_created`)
VALUES
	(2,'DR Tirta','082192100124','Jakarta','file-1606002459.png','tirta@gmail.com','$2a$08$1hpIoGVZtj2Oai32pCh7m.gS2ddHzR7dRebMongLulRQA5XvUWsg2',NULL);

/*!40000 ALTER TABLE `psycologist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table superadmin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `superadmin`;

CREATE TABLE `superadmin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `superadmin` WRITE;
/*!40000 ALTER TABLE `superadmin` DISABLE KEYS */;

INSERT INTO `superadmin` (`id`, `email`, `password`, `login_date`)
VALUES
	(1,'admin@admin.com','$2a$08$w7jz8GLxB/hz.ONm8ECw8.WgFM.gh8M1pr5tEmipveh7cno8RSlVG','2020-11-22 05:32:26');

/*!40000 ALTER TABLE `superadmin` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
