/*
SQLyog Community v12.2.6 (64 bit)
MySQL - 10.1.10-MariaDB : Database - ppocket_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ppocket_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ppocket_db`;

/*Table structure for table `bank_accounts` */

DROP TABLE IF EXISTS `bank_accounts`;

CREATE TABLE `bank_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bank_accounts` */

insert  into `bank_accounts`(`id`,`bank_name`,`account_title`,`account_type`,`balance_amount`,`created_at`,`updated_at`) values 
(4,'Bank Al-habib','Syed Muhammad Hussain','current',2300,'2017-01-20 21:59:57','2017-01-25 06:21:30'),
(5,'Meezan','Syed Muhammad Hussain','current',1000,'2017-01-20 22:00:09','2017-01-21 00:00:56');

/*Table structure for table `bonds` */

DROP TABLE IF EXISTS `bonds`;

CREATE TABLE `bonds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bonds` */

insert  into `bonds`(`id`,`amount`,`created_at`,`updated_at`) values 
(1,750,'2017-01-25 13:32:40','2017-01-25 13:32:40'),
(3,50,'2017-01-25 13:36:26','2017-01-25 13:36:36');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_name_unique` (`name`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `employees` */

/*Table structure for table `expense_types` */

DROP TABLE IF EXISTS `expense_types`;

CREATE TABLE `expense_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expense_types_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `expense_types` */

insert  into `expense_types`(`id`,`title`,`description`,`created_at`,`updated_at`) values 
(1,'Regular','','2017-01-20 01:11:31','2017-01-20 01:11:31'),
(2,'Losts','','2017-01-20 01:11:36','2017-01-20 01:11:36'),
(3,'Extras','','2017-01-20 01:11:40','2017-01-20 01:11:40'),
(4,'Insurance','','2017-01-20 01:11:45','2017-01-20 01:11:45'),
(5,'Maintenance','','2017-01-20 01:11:48','2017-01-20 01:11:48'),
(6,'Shopping','','2017-01-20 01:11:52','2017-01-20 01:11:52'),
(7,'Food and Entertainments','','2017-01-20 01:11:58','2017-01-20 01:11:58'),
(8,'Fule','','2017-01-20 17:19:18','2017-01-20 17:19:18');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `expense_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `expenses` */

insert  into `expenses`(`id`,`expense_type`,`amount`,`date`,`created_at`,`updated_at`,`title`,`comments`) values 
(1,3,100,'2017-01-20','2017-01-20 01:18:11','2017-01-20 17:11:26','Exp','Exp dfsfds'),
(2,4,200,'2017-01-20','2017-01-20 01:18:24','2017-01-20 01:18:24','Exp2','Exp2'),
(3,2,200,'2017-01-26','2017-01-20 01:18:36','2017-01-20 17:00:34','Exp 3 edit','Exp 3 edit');

/*Table structure for table `income_types` */

DROP TABLE IF EXISTS `income_types`;

CREATE TABLE `income_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `income_types` */

insert  into `income_types`(`id`,`title`,`created_at`,`updated_at`) values 
(1,'Salary','2017-01-19 23:30:35','2017-01-19 23:30:35'),
(2,'Bonus','2017-01-19 23:30:42','2017-01-19 23:30:42'),
(3,'Price','2017-01-19 23:30:48','2017-01-19 23:30:48');

/*Table structure for table `incomes` */

DROP TABLE IF EXISTS `incomes`;

CREATE TABLE `incomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `incomes` */

insert  into `incomes`(`id`,`title`,`type`,`amount`,`date`,`description`,`created_at`,`updated_at`) values 
(1,'test 001',1,600,'2017-01-19','dfsfsd','2017-01-19 23:32:19','2017-01-19 23:32:19'),
(2,'test 002',2,500,'2017-01-19','dsfgf','2017-01-19 23:32:29','2017-01-20 00:39:39'),
(3,'hgfh',1,400,'2017-01-19','gfhgfh','2017-01-19 23:34:05','2017-01-19 23:34:05'),
(4,'hgh',1,500,'2017-01-19','gfhgf','2017-01-19 23:35:09','2017-01-19 23:35:09');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `items` */

/*Table structure for table `loans` */

DROP TABLE IF EXISTS `loans`;

CREATE TABLE `loans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `loans` */

insert  into `loans`(`id`,`amount`,`type`,`description`,`created_at`,`updated_at`,`loan_date`) values 
(1,100,'credit','dfsdf','2017-01-27 07:14:55','2017-01-27 07:14:55','2017-01-27'),
(2,750,'credit','sddf edit','2017-01-27 07:15:21','2017-01-27 11:45:46','2017-01-03');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values 
('2017_01_20_174723_create_bank_account_table',1),
('2017_01_20_215146_create_transactions_table',2),
('2017_01_25_130236_create_bonds_table',3),
('2017_01_27_062424_create_loans_table',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` int(10) NOT NULL,
  `tran_date` date NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `desctiption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`bank_id`,`tran_date`,`debit`,`credit`,`desctiption`,`created_at`,`updated_at`) values 
(1,5,'2017-01-20',100,0,'test','2017-01-20 23:56:16','2017-01-20 23:56:16'),
(3,5,'2017-01-21',0,600,'ggfh','2017-01-21 00:00:56','2017-01-21 00:00:56'),
(4,4,'2017-01-23',0,500,'gddg edit','2017-01-23 12:06:55','2017-01-23 13:12:21'),
(5,4,'2017-01-25',0,500,'hjghj','2017-01-25 06:20:11','2017-01-25 06:20:11'),
(6,4,'2017-01-25',0,1000,'test','2017-01-25 06:20:51','2017-01-25 06:20:51'),
(7,4,'2017-01-25',0,100,'ghgf','2017-01-25 06:21:30','2017-01-25 06:21:30');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
