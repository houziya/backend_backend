/*
SQLyog Community v12.03 (64 bit)
MySQL - 10.1.13-MariaDB : Database - workspace
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`workspace` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `workspace`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `area` int(11) DEFAULT NULL,
  `publish_time` datetime DEFAULT NULL,
  `question` varchar(512) DEFAULT NULL,
  `has_question` int(11) DEFAULT NULL,
  `answers` varchar(512) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(128) DEFAULT 'SYS',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(128) DEFAULT 'SYS',
  `answer` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `article` */

insert  into `article`(`id`,`title`,`area`,`publish_time`,`question`,`has_question`,`answers`,`created_at`,`created_by`,`updated_at`,`updated_by`,`answer`) values (2,'上海市限制临牌',2,'2016-04-11 00:00:00','你认为这是个好主意吗？',1,'是,否','2016-04-11 08:12:00','SYS','2016-04-12 07:12:15','SYS','1'),(5,'证监会放大招',1,'2016-04-12 00:00:00','你认为这是个好主意吗？',1,'是,否','2016-04-11 08:12:00','SYS','2016-04-11 08:31:21','SYS','1'),(6,'3月CPI同比增长2.3%',3,'2016-04-13 00:00:00','你认为这是个好主意吗？',1,'是,否','2016-04-11 08:12:00','SYS','2016-04-11 08:31:21','SYS','1'),(7,'打击海淘',4,'2016-04-03 00:00:00','你认为这是个好主意吗？',1,'是,否','2016-04-11 08:12:00','SYS','2016-04-11 08:31:21','SYS','1'),(8,'菜价疯狂',2,'2016-04-05 00:00:00','你认为这是个好主意吗？',0,'','2016-04-11 08:12:00','SYS','2016-04-11 08:31:21','SYS',''),(9,'<div>111</div>',1,'2016-04-23 00:00:00','',1,',','2016-04-14 09:07:19','SYS','2017-03-17 12:13:12','SYS','0'),(10,'ddddddddddddd',1,'2017-03-29 00:00:00','ddddddddddddd',1,'dee,eee','2017-03-17 12:12:04','SYS','2017-03-17 12:12:21','SYS','0');

/*Table structure for table `article_tags` */

DROP TABLE IF EXISTS `article_tags`;

CREATE TABLE `article_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id_index` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `article_tags` */

insert  into `article_tags`(`id`,`article_id`,`tag_id`) values (1,2,0),(2,2,1),(3,2,2),(4,2,3),(5,10,0),(6,10,1),(7,10,2),(8,10,3),(9,9,0),(10,9,1),(11,9,2),(12,9,3),(13,9,0),(14,9,1),(15,9,2),(16,9,3);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('超级管理员','1',1457335941);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/*',2,NULL,NULL,NULL,1457335219,1457335219),('/article/*',2,NULL,NULL,NULL,1460361978,1460361978),('/article/create',2,NULL,NULL,NULL,1460362043,1460362043),('/article/delete',2,NULL,NULL,NULL,1460362043,1460362043),('/article/index',2,NULL,NULL,NULL,1460362043,1460362043),('/article/update',2,NULL,NULL,NULL,1460362043,1460362043),('/article/view',2,NULL,NULL,NULL,1460362043,1460362043),('/nav/*',2,NULL,NULL,NULL,1457350112,1457350112),('/nav/index',2,NULL,NULL,NULL,1457350112,1457350112),('/rbac/*',2,NULL,NULL,NULL,1457350112,1457350112),('/rbac/index',2,NULL,NULL,NULL,1457350112,1457350112),('/site/login',2,NULL,NULL,NULL,1457353907,1457353907),('/site/logout',2,NULL,NULL,NULL,1457353907,1457353907),('/widget/*',2,NULL,NULL,NULL,1457407876,1457407876),('/widget/bootstrap',2,NULL,NULL,NULL,1457407876,1457407876),('/widget/jui',2,NULL,NULL,NULL,1457407876,1457407876),('超级管理员',1,NULL,NULL,NULL,1457335192,1457335949);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('超级管理员','/*');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values (1,'RBAC权限',NULL,'/rbac/index',10,NULL),(2,'Nav左导航栏',NULL,'/nav/index',20,NULL),(4,'登出',NULL,'/site/logout',10000,NULL),(5,'Widget',NULL,NULL,30,NULL),(6,'表单样例',5,'/article/index',10,NULL),(7,'企业简介',NULL,'/article/profile',NULL,NULL);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1489634213),('m130524_201442_init',1489634292);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (1,'admin','','$2y$13$AJS8y8JeTOCnyM.POUbwtu7ctr4KUNjcquWeFwfq7qhE9w.o0HVwK',NULL,'',10,0,0);

/*Table structure for table `user_bak` */

DROP TABLE IF EXISTS `user_bak`;

CREATE TABLE `user_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_bak` */

insert  into `user_bak`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (1,'wangmeng','','$2y$13$eXQl9YCo5XcKqqy9ymd2t.SuOvpXYERidceXoT/bPt4iwmOW3GiBy',NULL,'',10,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
