/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 5.5.53-log : Database - fanyi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fanyi` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fanyi`;

/*Table structure for table `fanyi_book` */

DROP TABLE IF EXISTS `fanyi_book`;

CREATE TABLE `fanyi_book` (
  `book_id` mediumint(7) unsigned NOT NULL AUTO_INCREMENT,
  `cn_text` varchar(400) DEFAULT NULL COMMENT '中文',
  `en_text` varchar(600) DEFAULT NULL COMMENT '翻译过的英文',
  `class_id` mediumint(7) DEFAULT NULL COMMENT '所属分类',
  `tag` tinyint(2) DEFAULT '0' COMMENT '标记是否醒目',
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `fanyi_book` */

insert  into `fanyi_book`(`book_id`,`cn_text`,`en_text`,`class_id`,`tag`) values 
(2,'餐巾纸','Napkin',1,0),
(3,'勺子','Spoon',1,0),
(24,'酒店在哪里','Where is the hotel?',3,0);

/*Table structure for table `fanyi_classify` */

DROP TABLE IF EXISTS `fanyi_classify`;

CREATE TABLE `fanyi_classify` (
  `class_id` mediumint(7) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` char(8) DEFAULT NULL,
  `class_en` char(8) DEFAULT NULL COMMENT '语言分类',
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `fanyi_classify` */

insert  into `fanyi_classify`(`class_id`,`class_name`,`class_en`) values 
(1,'常见物','en'),
(3,'日常短语','en');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
