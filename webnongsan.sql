/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.7.23-log : Database - webnongsan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`webnongsan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webnongsan`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `depth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `position` smallint(6) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`url_image`,`parent_id`,`depth`,`position`,`status`,`created_at`,`updated_at`) values (2,NULL,0,'2',NULL,'AVAILABLE','2018-10-05 16:16:24','2018-10-05 16:16:24'),(3,NULL,0,'3',NULL,'AVAILABLE','2018-10-05 16:17:18','2018-10-05 16:17:18'),(4,NULL,2,'2/4',NULL,'AVAILABLE','2018-10-05 16:17:36','2018-10-05 16:17:36');

/*Table structure for table `categories_translation` */

DROP TABLE IF EXISTS `categories_translation`;

CREATE TABLE `categories_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories_translation` */

insert  into `categories_translation`(`id`,`name`,`description`,`slug`,`meta_title`,`meta_description`,`meta_data`,`locale`,`category_id`) values (1,'Cây lương thực',NULL,'cay-luong-thuc',NULL,NULL,NULL,'vi',2),(2,'Cây ăn quả',NULL,'cay-an-qua',NULL,NULL,NULL,'vi',3),(3,'Lúa',NULL,'lua',NULL,NULL,NULL,'vi',4);

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`name`,`email`,`phone`,`message`,`created_at`,`updated_at`) values (1,'Customer','customer1@gmail.com','123456','Hello','2018-10-07 06:21:24','2018-10-07 06:21:24');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `node` text COLLATE utf8mb4_unicode_ci,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`first_name`,`last_name`,`account`,`email`,`phone`,`password`,`address`,`node`,`provider`,`provider_id`,`remember_token`,`created_at`,`updated_at`) values (1,'Customer',NULL,NULL,NULL,'customer@gmail.com','165990152','$2y$10$y7xM98dIgqWkwwByqCNRO.PZvxLeavNIN4l4v.R0H2QrcSKGLHFpm',NULL,NULL,NULL,NULL,'rX3Gq3OycyPvr2fhGqL82TYZMTPPqfZu2Ych2wl2awvhoTqlY8m7HjwX2rbW','2018-10-06 17:39:10','2018-10-06 17:39:10'),(7,'Customer 2',NULL,NULL,NULL,'customer2@gmail.com','165990152','$2y$10$KbVIaegq2FY.aqH9MSo.EeDatc2oFSmkr9O5VDKNscGgg07O7X.O6','Hà Nội','Mua hangf',NULL,NULL,'XCnBKpJvfBQcNUQd1dTnp0C2bP7OktadbR6KeErBJbZNniYjtGXrInQJwIGv','2018-10-06 17:48:18','2018-10-08 05:53:20');

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `languages` */

insert  into `languages`(`id`,`locale`,`name_display`,`icon`,`description`,`status`) values (1,'vi','Tiếng việt','flag-icon flag-icon-vn',NULL,'AVAILABLE');

/*Table structure for table `ltm_translations` */

DROP TABLE IF EXISTS `ltm_translations`;

CREATE TABLE `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=409 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ltm_translations` */

insert  into `ltm_translations`(`id`,`status`,`locale`,`group`,`key`,`value`,`created_at`,`updated_at`) values (1,0,'en','backend','actions.update','Update','2018-10-06 03:19:23','2018-10-08 09:30:22'),(2,0,'en','backend','actions.list','List','2018-10-06 03:19:23','2018-10-08 09:30:22'),(3,0,'en','backend','actions.delete','Delete','2018-10-06 03:19:24','2018-10-08 09:30:22'),(4,0,'en','backend','actions.actions','Actions','2018-10-06 03:19:24','2018-10-08 09:30:22'),(5,0,'en','backend','actions.edit','Edit','2018-10-06 03:19:24','2018-10-08 09:30:22'),(6,0,'en','backend','actions.create','Create','2018-10-06 03:19:24','2018-10-08 09:30:22'),(7,0,'en','backend','actions.search','Search','2018-10-06 03:19:24','2018-10-08 09:30:22'),(8,0,'en','backend','actions.submit','Submit','2018-10-06 03:19:24','2018-10-08 09:30:22'),(9,0,'en','backend','category.add','Create category','2018-10-06 03:19:24','2018-10-08 09:30:22'),(10,0,'en','backend','category.name','Name category','2018-10-06 03:19:24','2018-10-08 09:30:22'),(11,0,'en','backend','category.code','Code','2018-10-06 03:19:24','2018-10-08 09:30:22'),(12,0,'en','backend','category.icon','Icon','2018-10-06 03:19:24','2018-10-08 09:30:22'),(13,0,'en','backend','category.status','Status','2018-10-06 03:19:24','2018-10-08 09:30:22'),(14,0,'en','backend','category.action','Actions','2018-10-06 03:19:24','2018-10-08 09:30:22'),(15,0,'en','backend','category.edit','Edit','2018-10-06 03:19:24','2018-10-08 09:30:22'),(16,0,'en','backend','category.delete','Delete','2018-10-06 03:19:24','2018-10-08 09:30:22'),(17,0,'en','backend','category.list','List','2018-10-06 03:19:24','2018-10-08 09:30:22'),(18,0,'en','backend','category.category','Category','2018-10-06 03:19:24','2018-10-08 09:30:22'),(19,0,'en','backend','category.create','Create category','2018-10-06 03:19:24','2018-10-08 09:30:22'),(20,0,'en','backend','category.garena','Garena','2018-10-06 03:19:24','2018-10-08 09:30:22'),(21,0,'en','backend','category.detail','Detail','2018-10-06 03:19:24','2018-10-08 09:30:22'),(22,0,'en','backend','category.description','Description','2018-10-06 03:19:24','2018-10-08 09:30:22'),(23,0,'en','backend','category.meta_title','Meta Title','2018-10-06 03:19:24','2018-10-08 09:30:22'),(24,0,'en','backend','category.meta_description','Meta Description','2018-10-06 03:19:24','2018-10-08 09:30:22'),(25,0,'en','backend','category.meta_content','Meta Content','2018-10-06 03:19:24','2018-10-08 09:30:22'),(26,0,'en','backend','category.parent','Parent','2018-10-06 03:19:24','2018-10-08 09:30:22'),(27,0,'en','backend','category.available','Available','2018-10-06 03:19:24','2018-10-08 09:30:22'),(28,0,'en','backend','category.disable','Disable','2018-10-06 03:19:24','2018-10-08 09:30:22'),(29,0,'en','backend','category.update_success','Update category success','2018-10-06 03:19:25','2018-10-08 09:30:22'),(30,0,'en','backend','category.create_success','Create category success','2018-10-06 03:19:25','2018-10-08 09:30:22'),(31,0,'en','backend','language.create','Create','2018-10-06 03:19:25','2018-10-08 09:30:22'),(32,0,'en','backend','language.language','Language','2018-10-06 03:19:25','2018-10-08 09:30:22'),(33,0,'en','backend','language.name','Name','2018-10-06 03:19:25','2018-10-08 09:30:22'),(34,0,'en','backend','language.code','Code','2018-10-06 03:19:25','2018-10-08 09:30:22'),(35,0,'en','backend','language.icon','Icon','2018-10-06 03:19:25','2018-10-08 09:30:22'),(36,0,'en','backend','language.status','Status','2018-10-06 03:19:25','2018-10-08 09:30:22'),(37,0,'en','backend','language.actions','Actions','2018-10-06 03:19:25','2018-10-08 09:30:22'),(38,0,'en','backend','language.edit','Edit','2018-10-06 03:19:25','2018-10-08 09:30:22'),(39,0,'en','backend','language.delete','Delete','2018-10-06 03:19:25','2018-10-08 09:30:22'),(40,0,'en','backend','language.available','Available','2018-10-06 03:19:25','2018-10-08 09:30:22'),(41,0,'en','backend','language.disable','Disable','2018-10-06 03:19:25','2018-10-08 09:30:22'),(42,0,'en','backend','language.list','List','2018-10-06 03:19:25','2018-10-08 09:30:22'),(43,0,'en','backend','language.success_message','Actions success','2018-10-06 03:19:25','2018-10-08 09:30:22'),(44,0,'en','backend','menu.product','Product','2018-10-06 03:19:25','2018-10-08 09:30:22'),(45,0,'en','backend','menu.category','Categories','2018-10-06 03:19:26','2018-10-08 09:30:22'),(46,0,'en','backend','menu.users','User','2018-10-06 03:19:26','2018-10-08 09:30:22'),(47,0,'en','backend','menu.role','Role','2018-10-06 03:19:26','2018-10-08 09:30:22'),(48,0,'en','backend','menu.language','Language','2018-10-06 03:19:26','2018-10-08 09:30:22'),(49,0,'en','backend','menu.setting','Setting','2018-10-06 03:19:26','2018-10-08 09:30:22'),(50,0,'en','backend','menu.profile','Profile','2018-10-06 03:19:26','2018-10-08 09:30:22'),(51,0,'en','backend','menu.change_password','Change Password','2018-10-06 03:19:26','2018-10-08 09:30:22'),(52,0,'en','backend','menu.login','Login','2018-10-06 03:19:26','2018-10-08 09:30:22'),(53,0,'en','backend','menu.logout','Logout','2018-10-06 03:19:26','2018-10-08 09:30:22'),(54,0,'en','backend','menu.manager','Manager','2018-10-06 03:19:26','2018-10-08 09:30:22'),(55,0,'en','backend','status.status','Status','2018-10-06 03:19:26','2018-10-08 09:30:22'),(56,0,'en','backend','status.available','Available','2018-10-06 03:19:26','2018-10-08 09:30:22'),(57,0,'en','backend','status.disable','Disable','2018-10-06 03:19:26','2018-10-08 09:30:22'),(58,0,'en','backend','user.create','Create','2018-10-06 03:19:26','2018-10-08 09:30:22'),(59,0,'en','backend','user.update','Update','2018-10-06 03:19:26','2018-10-08 09:30:22'),(60,0,'en','backend','user.edit','Edit','2018-10-06 03:19:26','2018-10-08 09:30:22'),(61,0,'en','backend','user.permission','Permission','2018-10-06 03:19:26','2018-10-08 09:30:22'),(62,0,'en','backend','user.delete','Delete','2018-10-06 03:19:26','2018-10-08 09:30:22'),(63,0,'en','backend','user.chosse_image','Chosse Image','2018-10-06 03:19:26','2018-10-08 09:30:22'),(64,0,'en','backend','user.status','Status','2018-10-06 03:19:26','2018-10-08 09:30:22'),(65,0,'en','backend','user.available','Available','2018-10-06 03:19:26','2018-10-08 09:30:22'),(66,0,'en','backend','user.disable','Disable','2018-10-06 03:19:26','2018-10-08 09:30:22'),(67,0,'en','backend','user.name','Name','2018-10-06 03:19:26','2018-10-08 09:30:22'),(68,0,'en','backend','user.phone','Phone','2018-10-06 03:19:26','2018-10-08 09:30:22'),(69,0,'en','backend','user.email','Email','2018-10-06 03:19:27','2018-10-08 09:30:22'),(70,0,'en','backend','user.user','Users','2018-10-06 03:19:27','2018-10-08 09:30:22'),(71,0,'en','backend','user.image','Avatar','2018-10-06 03:19:27','2018-10-08 09:30:22'),(72,0,'en','backend','user.chosse_avatar','Chosse Avatar','2018-10-06 03:19:27','2018-10-08 09:30:22'),(73,0,'en','backend','user.change_password','Change password','2018-10-06 03:19:27','2018-10-08 09:30:22'),(74,0,'en','backend','user.password','Password','2018-10-06 03:19:27','2018-10-08 09:30:22'),(75,0,'en','backend','user.confirm_password','Confirm Password','2018-10-06 03:19:27','2018-10-08 09:30:22'),(76,0,'en','backend','user.list','List users','2018-10-06 03:19:27','2018-10-08 09:30:22'),(77,0,'en','backend','name_website','Name Web','2018-10-06 03:19:27','2018-10-08 09:30:22'),(78,0,'en','confirm','success','Success','2018-10-06 03:19:27','2018-10-06 03:49:12'),(79,0,'en','confirm','failue','Failue','2018-10-06 03:19:27','2018-10-06 03:49:12'),(80,0,'en','confirm','warning','Warning','2018-10-06 03:19:27','2018-10-06 03:49:12'),(81,0,'en','confirm','btn_confirm','Yes','2018-10-06 03:19:28','2018-10-06 03:49:12'),(82,0,'en','confirm','btn_cancel','No','2018-10-06 03:19:28','2018-10-06 03:49:12'),(83,0,'en','confirm','text_confirm','Are you sur?','2018-10-06 03:19:28','2018-10-06 03:49:12'),(84,0,'en','confirm','message_success','Action success','2018-10-06 03:19:28','2018-10-06 03:49:12'),(85,0,'en','confirm','message_failue','Actions error','2018-10-06 03:19:28','2018-10-06 03:49:12'),(86,0,'en','confirm','message_warning','Action warning','2018-10-06 03:19:28','2018-10-06 03:49:12'),(87,0,'en','role','code','Code','2018-10-06 03:19:28','2018-10-06 03:50:01'),(88,0,'en','role','name_display','Name Display','2018-10-06 03:19:29','2018-10-06 03:50:01'),(89,0,'en','role','description','Desciption','2018-10-06 03:19:29','2018-10-06 03:50:01'),(90,0,'en','role','actions','Actions','2018-10-06 03:19:29','2018-10-06 03:50:01'),(91,0,'en','role','create','Create Role','2018-10-06 03:19:29','2018-10-06 03:50:01'),(92,0,'en','role','update','Update','2018-10-06 03:19:29','2018-10-06 03:50:01'),(93,0,'en','role','delete','Delete','2018-10-06 03:19:29','2018-10-06 03:50:01'),(94,0,'en','role','list','List Roles','2018-10-06 03:19:29','2018-10-06 03:50:01'),(95,0,'en','role','role','Roles','2018-10-06 03:19:29','2018-10-06 03:50:01'),(96,0,'en','role','edit','Edit','2018-10-06 03:19:29','2018-10-06 03:50:01'),(97,0,'en','validation','accepted',':attribute must be accepted.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(98,0,'en','validation','active_url',':attribute is not a valid URL.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(99,0,'en','validation','after',':attribute must be a date after :date.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(100,0,'en','validation','after_or_equal',':attribute must be a date after or equal to :date.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(101,0,'en','validation','alpha',':attribute may only contain letters.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(102,0,'en','validation','alpha_dash',':attribute may only contain letters, numbers, and dashes.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(103,0,'en','validation','alpha_num',':attribute may only contain letters and numbers.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(104,0,'en','validation','array',':attribute must be an array.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(105,0,'en','validation','before',':attribute must be a date before :date.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(106,0,'en','validation','before_or_equal',':attribute must be a date before or equal to :date.','2018-10-06 03:19:30','2018-10-06 03:53:44'),(107,0,'en','validation','between.numeric',':attribute must be between :min and :max.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(108,0,'en','validation','between.file',':attribute must be between :min and :max kilobytes.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(109,0,'en','validation','between.string',':attribute must be between :min and :max characters.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(110,0,'en','validation','between.array',':attribute must have between :min and :max items.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(111,0,'en','validation','boolean',':attribute field must be true or false.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(112,0,'en','validation','confirmed',':attribute confirmation does not match.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(113,0,'en','validation','date',':attribute is not a valid date.','2018-10-06 03:19:31','2018-10-06 03:53:44'),(114,0,'en','validation','date_format',':attribute does not match the format :format.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(115,0,'en','validation','different',':attribute and :other must be different.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(116,0,'en','validation','digits',':attribute must be :digits digits.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(117,0,'en','validation','digits_between',':attribute must be between :min and :max digits.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(118,0,'en','validation','dimensions',':attribute has invalid image dimensions.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(119,0,'en','validation','distinct',':attribute field has a duplicate value.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(120,0,'en','validation','email',':attribute must be a valid email address.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(121,0,'en','validation','exists','selected :attribute is invalid.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(122,0,'en','validation','file',':attribute must be a file.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(123,0,'en','validation','filled',':attribute field must have a value.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(124,0,'en','validation','gt.numeric',':attribute must be greater than :value.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(125,0,'en','validation','gt.file',':attribute must be greater than :value kilobytes.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(126,0,'en','validation','gt.string',':attribute must be greater than :value characters.','2018-10-06 03:19:32','2018-10-06 03:53:44'),(127,0,'en','validation','gt.array',':attribute must have more than :value items.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(128,0,'en','validation','gte.numeric',':attribute must be greater than or equal :value.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(129,0,'en','validation','gte.file',':attribute must be greater than or equal :value kilobytes.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(130,0,'en','validation','gte.string',':attribute must be greater than or equal :value characters.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(131,0,'en','validation','gte.array',':attribute must have :value items or more.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(132,0,'en','validation','image',':attribute must be an image.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(133,0,'en','validation','in','selected :attribute is invalid.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(134,0,'en','validation','in_array',':attribute field does not exist in :other.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(135,0,'en','validation','integer',':attribute must be an integer.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(136,0,'en','validation','ip',':attribute must be a valid IP address.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(137,0,'en','validation','ipv4',':attribute must be a valid IPv4 address.','2018-10-06 03:19:33','2018-10-06 03:53:44'),(138,0,'en','validation','ipv6',':attribute must be a valid IPv6 address.','2018-10-06 03:19:34','2018-10-06 03:53:44'),(139,0,'en','validation','json',':attribute must be a valid JSON string.','2018-10-06 03:19:34','2018-10-06 03:53:44'),(140,0,'en','validation','lt.numeric',':attribute must be less than :value.','2018-10-06 03:19:34','2018-10-06 03:53:44'),(141,0,'en','validation','lt.file',':attribute must be less than :value kilobytes.','2018-10-06 03:19:34','2018-10-06 03:53:44'),(142,0,'en','validation','lt.string',':attribute must be less than :value characters.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(143,0,'en','validation','lt.array',':attribute must have less than :value items.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(144,0,'en','validation','lte.numeric',':attribute must be less than or equal :value.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(145,0,'en','validation','lte.file',':attribute must be less than or equal :value kilobytes.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(146,0,'en','validation','lte.string',':attribute must be less than or equal :value characters.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(147,0,'en','validation','lte.array',':attribute must not have more than :value items.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(148,0,'en','validation','max.numeric',':attribute may not be greater than :max.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(149,0,'en','validation','max.file',':attribute may not be greater than :max kilobytes.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(150,0,'en','validation','max.string',':attribute may not be greater than :max characters.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(151,0,'en','validation','max.array',':attribute may not have more than :max items.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(152,0,'en','validation','mimes',':attribute must be a file of type: :values.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(153,0,'en','validation','mimetypes',':attribute must be a file of type: :values.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(154,0,'en','validation','min.numeric',':attribute must be at least :min.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(155,0,'en','validation','min.file',':attribute must be at least :min kilobytes.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(156,0,'en','validation','min.string',':attribute must be at least :min characters.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(157,0,'en','validation','min.array',':attribute must have at least :min items.','2018-10-06 03:19:35','2018-10-06 03:53:44'),(158,0,'en','validation','not_in',':attribute is invalid.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(159,0,'en','validation','not_regex',':attribute format is invalid.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(160,0,'en','validation','numeric',':attribute must be a number.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(161,0,'en','validation','present',':attribute field must be present.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(162,0,'en','validation','regex',':attribute format is invalid.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(163,0,'en','validation','required',':attribute field is required.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(164,0,'en','validation','required_if',':attribute field is required when :other is :value.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(165,0,'en','validation','required_unless',':attribute field is required unless :other is in :values.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(166,0,'en','validation','required_with',':attribute field is required when :values is present.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(167,0,'en','validation','required_with_all',':attribute field is required when :values is present.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(168,0,'en','validation','required_without',':attribute field is required when :values is not present.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(169,0,'en','validation','required_without_all',':attribute field is required when none of :values are present.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(170,0,'en','validation','same',':attribute and :other must match.','2018-10-06 03:19:36','2018-10-06 03:53:44'),(171,0,'en','validation','size.numeric',':attribute must be :size.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(172,0,'en','validation','size.file',':attribute must be :size kilobytes.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(173,0,'en','validation','size.string',':attribute must be :size characters.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(174,0,'en','validation','size.array',':attribute must contain :size items.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(175,0,'en','validation','string',':attribute must be a string.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(176,0,'en','validation','timezone',':attribute must be a valid zone.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(177,0,'en','validation','unique',':attribute has already been taken.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(178,0,'en','validation','uploaded',':attribute failed to upload.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(179,0,'en','validation','url',':attribute format is invalid.','2018-10-06 03:19:37','2018-10-06 03:53:44'),(180,0,'en','validation','custom.attribute-name.rule-name','custom-message','2018-10-06 03:19:37','2018-10-06 03:53:44'),(181,0,'vi','backend','menu.post','Bài viết','2018-10-06 03:32:19','2018-10-08 09:30:22'),(182,0,'en','backend','menu.post','Post','2018-10-06 03:32:31','2018-10-08 09:30:22'),(183,0,'vi','backend','post.post','Bài viết','2018-10-06 03:33:09','2018-10-08 09:30:22'),(184,0,'vi','backend','post.title','Tiêu đề','2018-10-06 03:33:16','2018-10-08 09:30:22'),(185,0,'vi','backend','post.vote','Đánh giá','2018-10-06 03:33:21','2018-10-08 09:30:22'),(186,0,'vi','backend','post.view','Lượt xem','2018-10-06 03:33:25','2018-10-08 09:30:22'),(187,0,'vi','backend','status.status','Trạng thái','2018-10-06 03:33:30','2018-10-08 09:30:22'),(188,0,'vi','backend','post.garena','Cơ bản','2018-10-06 03:33:58','2018-10-08 09:30:22'),(189,0,'vi','backend','post.seo','Seo','2018-10-06 03:34:13','2018-10-08 09:30:22'),(190,0,'vi','backend','post.description','Mô tả','2018-10-06 03:34:20','2018-10-08 09:30:22'),(191,0,'vi','backend','post.content','Nội dung','2018-10-06 03:34:25','2018-10-08 09:30:22'),(192,0,'vi','backend','post.tag','Thẻ gắn','2018-10-06 03:34:32','2018-10-08 09:30:22'),(193,0,'vi','backend','post.image','Ảnh sản phẩm','2018-10-06 03:34:37','2018-10-08 09:30:22'),(194,0,'vi','backend','post.status','Trạng thái','2018-10-06 03:34:44','2018-10-08 09:30:22'),(195,0,'vi','backend','seo.meta_title','Thẻ meta tiêu đề','2018-10-06 03:35:19','2018-10-08 09:30:22'),(196,0,'vi','backend','seo.meta_description','Thẻ meta mô tả','2018-10-06 03:35:24','2018-10-08 09:30:22'),(197,0,'vi','backend','seo.meta_content','Thẻ meta nội dung','2018-10-06 03:35:28','2018-10-08 09:30:22'),(198,0,'en','backend','post.content','Content','2018-10-06 03:35:43','2018-10-08 09:30:22'),(199,0,'en','backend','post.description','Desciption','2018-10-06 03:35:49','2018-10-08 09:30:22'),(200,0,'en','backend','post.garena','Garena','2018-10-06 03:35:55','2018-10-08 09:30:22'),(201,0,'en','backend','post.image','Image','2018-10-06 03:35:57','2018-10-08 09:30:22'),(202,0,'en','backend','post.post','Post','2018-10-06 03:35:59','2018-10-08 09:30:22'),(203,0,'en','backend','post.seo','Seo','2018-10-06 03:36:02','2018-10-08 09:30:22'),(204,0,'en','backend','post.status','Status','2018-10-06 03:36:07','2018-10-08 09:30:22'),(205,0,'en','backend','post.tag','Tag','2018-10-06 03:36:09','2018-10-08 09:30:22'),(206,0,'en','backend','post.title','Title','2018-10-06 03:36:12','2018-10-08 09:30:22'),(207,0,'en','backend','post.view','View','2018-10-06 03:36:16','2018-10-08 09:30:22'),(208,0,'en','backend','post.vote','Vote','2018-10-06 03:36:19','2018-10-08 09:30:22'),(209,0,'en','backend','seo.meta_content','Meta content','2018-10-06 03:36:26','2018-10-08 09:30:22'),(210,0,'en','backend','seo.meta_description','Meta desrciption','2018-10-06 03:36:37','2018-10-08 09:30:22'),(211,0,'en','backend','seo.meta_title','Meta title','2018-10-06 03:36:43','2018-10-08 09:30:22'),(212,0,'vi','backend','actions.actions','Thao tác','2018-10-06 03:38:36','2018-10-08 09:30:22'),(213,0,'vi','backend','actions.create','Thêm mới','2018-10-06 03:38:43','2018-10-08 09:30:22'),(214,0,'vi','backend','actions.delete','Xóa','2018-10-06 03:38:46','2018-10-08 09:30:22'),(215,0,'vi','backend','actions.edit','Sửa','2018-10-06 03:38:51','2018-10-08 09:30:22'),(216,0,'vi','backend','actions.list','Danh sách','2018-10-06 03:39:02','2018-10-08 09:30:22'),(217,0,'vi','backend','actions.search','Tìm kiếm','2018-10-06 03:39:05','2018-10-08 09:30:22'),(218,0,'vi','backend','actions.submit','Gửi','2018-10-06 03:39:09','2018-10-08 09:30:22'),(219,0,'vi','backend','actions.update','Cập nhật','2018-10-06 03:39:16','2018-10-08 09:30:22'),(220,0,'vi','backend','category.action','Thao tác','2018-10-06 03:39:25','2018-10-08 09:30:22'),(221,0,'vi','backend','category.add','Thêm mới loại sản phẩm','2018-10-06 03:39:40','2018-10-08 09:30:22'),(222,0,'vi','backend','category.available','Hoạt động','2018-10-06 03:39:45','2018-10-08 09:30:22'),(223,0,'vi','backend','category.category','Loại sản phẩm','2018-10-06 03:39:51','2018-10-08 09:30:22'),(224,0,'vi','backend','category.code','Mã','2018-10-06 03:39:55','2018-10-08 09:30:22'),(225,0,'vi','backend','category.create','Thêm mới','2018-10-06 03:40:03','2018-10-08 09:30:22'),(226,0,'vi','backend','category.create_success','Thêm mới loại sản phẩm thành công','2018-10-06 03:40:39','2018-10-08 09:30:22'),(227,0,'vi','backend','category.delete','Xóa','2018-10-06 03:40:54','2018-10-08 09:30:22'),(228,0,'vi','backend','category.description','Mô tả','2018-10-06 03:41:00','2018-10-08 09:30:22'),(229,0,'vi','backend','category.detail','Chi tiết','2018-10-06 03:41:05','2018-10-08 09:30:22'),(230,0,'vi','backend','category.disable','Không hoạt động','2018-10-06 03:41:12','2018-10-08 09:30:22'),(231,0,'vi','backend','category.edit','Sửa','2018-10-06 03:41:15','2018-10-08 09:30:22'),(232,0,'vi','backend','category.garena','Cơ bản','2018-10-06 03:41:26','2018-10-08 09:30:22'),(233,0,'vi','backend','category.icon','Icon','2018-10-06 03:41:31','2018-10-08 09:30:22'),(234,0,'vi','backend','category.list','Danh sách','2018-10-06 03:41:34','2018-10-08 09:30:22'),(235,0,'vi','backend','category.meta_content','Thẻ meta nội dung','2018-10-06 03:41:42','2018-10-08 09:30:22'),(236,0,'vi','backend','category.meta_description','Thẻ meta mô tả','2018-10-06 03:41:53','2018-10-08 09:30:22'),(237,0,'vi','backend','category.meta_title','Thẻ meta tiêu đề','2018-10-06 03:42:00','2018-10-08 09:30:22'),(238,0,'vi','backend','category.name','Tên loại sản phẩm','2018-10-06 03:42:10','2018-10-08 09:30:22'),(239,0,'vi','backend','category.parent','Loại sản phẩm cha','2018-10-06 03:42:18','2018-10-08 09:30:22'),(240,0,'vi','backend','category.status','Trạng thái','2018-10-06 03:42:25','2018-10-08 09:30:22'),(241,0,'vi','backend','category.update_success','Cập nhật thành công','2018-10-06 03:42:32','2018-10-08 09:30:22'),(242,0,'vi','backend','language.actions','Thao tác','2018-10-06 03:42:37','2018-10-08 09:30:22'),(243,0,'vi','backend','menu.category','Loại sản phẩm','2018-10-06 03:42:53','2018-10-08 09:30:22'),(244,0,'vi','backend','menu.change_password','Đổi mật khẩu','2018-10-06 03:42:59','2018-10-08 09:30:22'),(245,0,'vi','backend','menu.language','Ngôn ngữ','2018-10-06 03:43:08','2018-10-08 09:30:22'),(246,0,'vi','backend','menu.login','Đăng nhập','2018-10-06 03:43:12','2018-10-08 09:30:22'),(247,0,'vi','backend','menu.logout','Đăng xuất','2018-10-06 03:43:17','2018-10-08 09:30:22'),(248,0,'vi','backend','menu.manager','Quản lí','2018-10-06 03:43:21','2018-10-08 09:30:22'),(249,0,'vi','backend','menu.product','Sản phẩm','2018-10-06 03:43:26','2018-10-08 09:30:22'),(250,0,'vi','backend','menu.profile','Thông tin cá nhân','2018-10-06 03:43:39','2018-10-08 09:30:22'),(251,0,'vi','backend','menu.role','Vai trò','2018-10-06 03:44:00','2018-10-08 09:30:22'),(252,0,'vi','backend','menu.setting','Cài đặt','2018-10-06 03:44:05','2018-10-08 09:30:22'),(253,0,'vi','backend','menu.users','Người dùng','2018-10-06 03:44:12','2018-10-08 09:30:22'),(254,0,'vi','backend','name_website','Đồ bảo hộ','2018-10-06 03:44:26','2018-10-08 09:30:22'),(255,0,'vi','backend','status.available','Hoạt động','2018-10-06 03:46:16','2018-10-08 09:30:22'),(256,0,'vi','backend','status.disable','Không hoạt động','2018-10-06 03:46:20','2018-10-08 09:30:22'),(257,0,'vi','backend','user.available','Hoạt động','2018-10-06 03:46:33','2018-10-08 09:30:22'),(258,0,'vi','backend','user.change_password','Đổi mật khẩu','2018-10-06 03:46:40','2018-10-08 09:30:22'),(259,0,'vi','backend','user.chosse_avatar','Chọn ảnh đại diện','2018-10-06 03:46:47','2018-10-08 09:30:22'),(260,0,'vi','backend','user.chosse_image','Chọn ảnh','2018-10-06 03:46:50','2018-10-08 09:30:22'),(261,0,'vi','backend','user.confirm_password','Nhập lại mật khẩu','2018-10-06 03:46:58','2018-10-08 09:30:22'),(262,0,'vi','backend','user.create','Thêm mới','2018-10-06 03:47:04','2018-10-08 09:30:22'),(263,0,'vi','backend','user.delete','Xóa','2018-10-06 03:47:06','2018-10-08 09:30:22'),(264,0,'vi','backend','user.disable','Không hoạt động','2018-10-06 03:47:11','2018-10-08 09:30:22'),(265,0,'vi','backend','user.edit','Sửa','2018-10-06 03:47:14','2018-10-08 09:30:22'),(266,0,'vi','backend','user.email','Email','2018-10-06 03:47:17','2018-10-08 09:30:22'),(267,0,'vi','backend','user.image','Ảnh đại diện','2018-10-06 03:47:23','2018-10-08 09:30:22'),(268,0,'vi','backend','user.list','Danh sách','2018-10-06 03:47:28','2018-10-08 09:30:22'),(269,0,'vi','backend','user.name','Tên người dùng','2018-10-06 03:47:34','2018-10-08 09:30:22'),(270,0,'vi','backend','user.password','Mật khẩu','2018-10-06 03:47:37','2018-10-08 09:30:22'),(271,0,'vi','backend','user.permission','Quyền','2018-10-06 03:47:41','2018-10-08 09:30:22'),(272,0,'vi','backend','user.phone','Số điện thoại','2018-10-06 03:47:46','2018-10-08 09:30:22'),(273,0,'vi','backend','user.status','Trạng thái','2018-10-06 03:47:50','2018-10-08 09:30:22'),(274,0,'vi','backend','user.update','Cập nhật','2018-10-06 03:47:54','2018-10-08 09:30:22'),(275,0,'vi','backend','user.user','Người dùng','2018-10-06 03:47:58','2018-10-08 09:30:22'),(276,0,'vi','confirm','btn_cancel','Hủy','2018-10-06 03:48:15','2018-10-06 03:49:12'),(277,0,'vi','confirm','btn_confirm','Đồng ý','2018-10-06 03:48:19','2018-10-06 03:49:12'),(278,0,'vi','confirm','failue','Lỗi','2018-10-06 03:48:23','2018-10-06 03:49:12'),(279,0,'vi','confirm','message_failue','Thao tác thất bại','2018-10-06 03:48:31','2018-10-06 03:49:12'),(280,0,'vi','confirm','message_success','Thao tác thành công','2018-10-06 03:48:36','2018-10-06 03:49:12'),(281,0,'vi','confirm','message_warning','Thao tác bị cảnh báo không hợp lệ','2018-10-06 03:48:50','2018-10-06 03:49:12'),(282,0,'vi','confirm','success','Thành công','2018-10-06 03:48:56','2018-10-06 03:49:12'),(283,0,'vi','confirm','text_confirm','Bạn chắc chắn?','2018-10-06 03:49:06','2018-10-06 03:49:12'),(284,0,'vi','confirm','warning','Cảnh báo','2018-10-06 03:49:10','2018-10-06 03:49:12'),(285,0,'vi','role','actions','Thao tác','2018-10-06 03:49:20','2018-10-06 03:50:01'),(286,0,'vi','role','code','Mã','2018-10-06 03:49:22','2018-10-06 03:50:01'),(287,0,'vi','role','create','Thêmmới','2018-10-06 03:49:31','2018-10-06 03:50:01'),(288,0,'vi','role','delete','Xóa','2018-10-06 03:49:33','2018-10-06 03:50:01'),(289,0,'vi','role','description','Mô tả','2018-10-06 03:49:36','2018-10-06 03:50:01'),(290,0,'vi','role','edit','Sửa','2018-10-06 03:49:39','2018-10-06 03:50:01'),(291,0,'vi','role','list','Danh sách','2018-10-06 03:49:43','2018-10-06 03:50:01'),(292,0,'vi','role','name_display','Tên hiện thị','2018-10-06 03:49:50','2018-10-06 03:50:01'),(293,0,'vi','role','role','Vai trò','2018-10-06 03:49:55','2018-10-06 03:50:01'),(294,0,'vi','role','update','Cập nhật','2018-10-06 03:49:59','2018-10-06 03:50:01'),(295,0,'vi','validation','between.string',':attribute chỉ từ :min đến :max kí tự.','2018-10-06 03:51:05','2018-10-06 03:53:44'),(296,0,'vi','validation','required',':attribute không được để trống','2018-10-06 03:51:28','2018-10-06 03:53:44'),(297,0,'vi','validation','unique',':attribute cũng đã tồn tại.','2018-10-06 03:52:05','2018-10-06 03:53:44'),(298,0,'vi','validation','same',':attribute và :other phải giống nhau','2018-10-06 03:52:36','2018-10-06 03:53:44'),(299,0,'vi','validation','max.string',':attribute tối đa :max kí tự.','2018-10-06 03:53:13','2018-10-06 03:53:44'),(300,0,'vi','validation','min.numeric',':attribute tối thiểu :max kí tự.','2018-10-06 03:53:31','2018-10-06 03:53:44'),(301,0,'vi','validation','min.string',':attribute tối thiểu :min kí tự.','2018-10-06 03:53:42','2018-10-06 03:53:44'),(302,0,'vi','backend','product.name','Tên sản phẩm','2018-10-06 03:57:13','2018-10-08 09:30:22'),(303,0,'vi','backend','product.garena','Cơ bản','2018-10-06 03:57:27','2018-10-08 09:30:22'),(304,0,'vi','backend','product.seo','Seo','2018-10-06 03:57:32','2018-10-08 09:30:22'),(307,0,'vi','backend','product.old_price','Giá cũ','2018-10-06 03:58:13','2018-10-08 09:30:22'),(308,0,'vi','backend','product.new_price','Giá mới','2018-10-06 03:58:21','2018-10-08 09:30:22'),(309,0,'vi','backend','product.qty','Số lượng','2018-10-06 03:58:25','2018-10-08 09:30:22'),(310,0,'vi','backend','product.category','Loại sản phẩm','2018-10-06 03:58:30','2018-10-08 09:30:22'),(311,0,'vi','backend','product.description','Mô tả','2018-10-06 03:58:35','2018-10-08 09:30:22'),(312,0,'vi','backend','product.content','Nội dung','2018-10-06 03:58:41','2018-10-08 09:30:22'),(313,0,'vi','backend','product.tag','Thẻ gắn','2018-10-06 03:58:45','2018-10-08 09:30:22'),(314,0,'vi','backend','product.image','Ảnh đại diện','2018-10-06 03:58:50','2018-10-08 09:30:22'),(315,0,'vi','backend','product.add','Thêm mới','2018-10-06 03:58:58','2018-10-08 09:30:22'),(316,0,'vi','backend','product.status','Trạng thái','2018-10-06 03:59:16','2018-10-08 09:30:22'),(317,0,'en','backend','product.add','Create','2018-10-06 04:00:02','2018-10-08 09:30:22'),(318,0,'en','backend','product.category','Category','2018-10-06 04:00:11','2018-10-08 09:30:22'),(319,0,'en','backend','product.content','Content','2018-10-06 04:00:13','2018-10-08 09:30:22'),(320,0,'en','backend','product.description','Description','2018-10-06 04:00:18','2018-10-08 09:30:22'),(321,0,'en','backend','product.garena','Garena','2018-10-06 04:00:21','2018-10-08 09:30:22'),(322,0,'en','backend','product.image','Image','2018-10-06 04:00:23','2018-10-08 09:30:22'),(323,0,'en','backend','product.name','Name','2018-10-06 04:00:26','2018-10-08 09:30:22'),(324,0,'en','backend','product.new_price','New price','2018-10-06 04:00:33','2018-10-08 09:30:22'),(325,0,'en','backend','product.old_price','Old price','2018-10-06 04:00:37','2018-10-08 09:30:22'),(326,0,'en','backend','product.qty','Quanlity','2018-10-06 04:00:40','2018-10-08 09:30:22'),(327,0,'en','backend','product.seo','Seo','2018-10-06 04:00:44','2018-10-08 09:30:22'),(328,0,'en','backend','product.status','status','2018-10-06 04:00:48','2018-10-08 09:30:22'),(329,0,'en','backend','product.tag','Tag','2018-10-06 04:00:50','2018-10-08 09:30:22'),(330,0,'vi','backend','product.code','Mã sản phẩm','2018-10-06 04:02:26','2018-10-08 09:30:22'),(331,0,'en','backend','product.code','Code','2018-10-06 04:02:34','2018-10-08 09:30:22'),(333,0,'vi','backend','setting.contact','Liên hệ','2018-10-06 04:27:44','2018-10-08 09:30:22'),(334,0,'vi','backend','setting.google_analytic','Google Analytic','2018-10-06 04:28:01','2018-10-08 09:30:22'),(335,0,'vi','backend','setting.description','Mô tả','2018-10-06 04:28:05','2018-10-08 09:30:22'),(336,0,'vi','backend','setting.address','Địa chỉ','2018-10-06 04:28:10','2018-10-08 09:30:22'),(337,0,'vi','backend','setting.phone','Phone','2018-10-06 04:28:14','2018-10-08 09:30:22'),(338,0,'vi','backend','setting.work_time','Work time','2018-10-06 04:28:20','2018-10-08 09:30:22'),(339,0,'vi','backend','setting.fax','Fax','2018-10-06 04:28:25','2018-10-08 09:30:22'),(340,0,'vi','backend','setting.email','Email','2018-10-06 04:28:30','2018-10-08 09:30:22'),(341,0,'vi','backend','setting.facebook','FaceBook','2018-10-06 04:28:34','2018-10-08 09:30:22'),(342,0,'vi','backend','setting.google_plus','Google plus','2018-10-06 04:28:39','2018-10-08 09:30:22'),(343,0,'vi','backend','setting.youtube','Youtube','2018-10-06 04:28:44','2018-10-08 09:30:22'),(344,0,'vi','backend','setting.instagram','Instagram','2018-10-06 04:28:51','2018-10-08 09:30:22'),(345,0,'vi','backend','setting.zalo','Zalo','2018-10-06 04:28:55','2018-10-08 09:30:22'),(346,0,'vi','backend','setting.coppyright','Copy right','2018-10-06 04:28:59','2018-10-08 09:30:22'),(347,0,'vi','backend','setting.google_map','Google map','2018-10-06 04:29:03','2018-10-08 09:30:22'),(349,0,'vi','frontend','product.new_price','Giá mới','2018-10-07 05:20:47','2018-10-08 07:38:17'),(350,0,'vi','frontend','product.old_price','Giá cũ','2018-10-07 05:20:55','2018-10-08 07:38:17'),(351,0,'vi','frontend','product.description','Mô tả sản phẩm','2018-10-07 05:21:09','2018-10-08 07:38:17'),(352,0,'vi','frontend','product.code','Mã sản phẩm','2018-10-07 05:21:56','2018-10-08 07:38:17'),(353,0,'vi','frontend','product.intro','Giới thiệu','2018-10-07 05:22:02','2018-10-08 07:38:17'),(354,0,'vi','frontend','product.option','Chọn','2018-10-07 05:22:10','2018-10-08 07:38:17'),(355,0,'vi','frontend','product.qty','Số lượng','2018-10-07 05:22:16','2018-10-08 07:38:17'),(358,0,'vi','frontend','category','Danh mục sản phẩm','2018-10-07 05:23:50','2018-10-08 07:38:17'),(359,0,'vi','frontend','hot_product','Sản phẩm mua nhiều','2018-10-07 05:24:42','2018-10-08 07:38:17'),(360,0,'vi','frontend','new_product','Sản phẩm mới','2018-10-07 05:24:49','2018-10-08 07:38:17'),(362,0,'vi','frontend','tag','Thẻ gắn','2018-10-07 05:26:27','2018-10-08 07:38:17'),(363,0,'vi','frontend','info','Thông tin','2018-10-07 05:27:26','2018-10-08 07:38:17'),(364,0,'vi','frontend','soical','Mạng xã hội','2018-10-07 05:27:33','2018-10-08 07:38:17'),(365,0,'vi','frontend','related_product','Sản phẩm khác','2018-10-07 05:28:07','2018-10-08 07:38:17'),(366,0,'vi','frontend','sale','Sale','2018-10-07 08:45:28','2018-10-08 07:38:17'),(367,0,'vi','frontend','new','Mới','2018-10-07 08:45:48','2018-10-08 07:38:17'),(368,0,'vi','frontend','hot','Hot','2018-10-07 08:46:38','2018-10-08 07:38:17'),(370,0,'vi','backend','menu.members','Khách hàng','2018-10-07 15:26:36','2018-10-08 09:30:22'),(371,0,'vi','backend','menu.orders','Đặt hàng','2018-10-07 15:27:01','2018-10-08 09:30:22'),(372,0,'vi','backend','menu.tags','Tag','2018-10-07 15:27:08','2018-10-08 09:30:22'),(373,0,'vi','backend','menu.tag','Tag','2018-10-07 15:27:56','2018-10-08 09:30:22'),(374,0,'vi','backend','menu.contacts','Liên hệ','2018-10-07 15:29:11','2018-10-08 09:30:22'),(375,0,'vi','backend','tag.name','Tên thẻ','2018-10-07 15:29:39','2018-10-08 09:30:22'),(376,0,'vi','backend','order.code','Mã đơn','2018-10-07 16:20:04','2018-10-08 09:30:22'),(377,0,'vi','backend','order.name','Người mua','2018-10-07 16:20:08','2018-10-08 09:30:22'),(378,0,'vi','backend','order.total','Tổng giá','2018-10-07 16:20:13','2018-10-08 09:30:22'),(379,0,'vi','backend','status.status_order','Trạng thái đơn','2018-10-07 16:20:18','2018-10-08 09:30:22'),(380,0,'vi','backend','status_payment','Thanh toán','2018-10-07 16:20:23','2018-10-08 09:30:22'),(381,0,'vi','backend','status.pending_process','Đợi xử lí','2018-10-07 16:20:31','2018-10-08 09:30:22'),(382,0,'vi','backend','status.processing','Đang xử lí','2018-10-07 16:20:35','2018-10-08 09:30:22'),(383,0,'vi','backend','status.shipping','Đang chuyển hàng','2018-10-07 16:20:40','2018-10-08 09:30:22'),(384,0,'vi','backend','status.success','Thành công','2018-10-07 16:20:45','2018-10-08 09:30:22'),(385,0,'vi','backend','status.cancel','Hủy đơn','2018-10-07 16:20:50','2018-10-08 09:30:22'),(386,0,'vi','backend','status.status_payment','Thanh toán','2018-10-07 16:23:29','2018-10-08 09:30:22'),(387,0,'vi','backend','status.pending_pay','Chưa thanh toán','2018-10-07 16:23:57','2018-10-08 09:30:22'),(388,0,'vi','backend','status.success_pay','Đã thanh toán','2018-10-07 16:24:07','2018-10-08 09:30:22'),(389,0,'vi','backend','product.total','Tổng giá','2018-10-07 16:47:28','2018-10-08 09:30:22'),(390,0,'vi','frontend','login.lable','Đăng nhập','2018-10-08 05:54:56','2018-10-08 07:38:17'),(391,0,'vi','frontend','customer.email','Email','2018-10-08 05:55:02','2018-10-08 07:38:17'),(392,0,'vi','frontend','customer.password','Mật khẩu','2018-10-08 05:55:11','2018-10-08 07:38:17'),(393,0,'vi','frontend','login.login','Đăng nhập','2018-10-08 05:55:17','2018-10-08 07:38:17'),(394,0,'vi','frontend','register.lable','Đăng kí','2018-10-08 05:55:31','2018-10-08 07:38:17'),(395,0,'vi','frontend','customer.name','Họ tên','2018-10-08 05:55:35','2018-10-08 07:38:17'),(396,0,'vi','frontend','customer.phone','Số điện thoại','2018-10-08 05:55:48','2018-10-08 07:38:17'),(398,0,'vi','frontend','customer.confirm_password','Nhập lại mật khẩu','2018-10-08 05:56:22','2018-10-08 07:38:17'),(399,0,'vi','frontend','product.product','Sản phẩm','2018-10-08 05:58:19','2018-10-08 07:38:17'),(400,0,'vi','frontend','change_password','Đổi mật khẩu','2018-10-08 05:59:51','2018-10-08 07:38:17'),(401,0,'vi','frontend','customer.sign_up','Đăng xuất','2018-10-08 06:00:38','2018-10-08 07:38:17'),(402,0,'vi','frontend','customer.sign_in','Đăng nhập','2018-10-08 06:00:42','2018-10-08 07:38:17'),(403,0,'vi','frontend','slogan','Đồ bảo hộ uy tín','2018-10-08 06:00:49','2018-10-08 07:38:17'),(404,0,'vi','frontend','customer.logout','Đăng xuất','2018-10-08 06:02:10','2018-10-08 07:38:17'),(405,0,'vi','frontend','profile.lable','Profile','2018-10-08 06:02:16','2018-10-08 07:38:17'),(406,0,'vi','frontend','customer.old_password','Mật khẩu cũ','2018-10-08 06:02:47','2018-10-08 07:38:17'),(407,0,'vi','frontend','customer.password_confirm','Nhập lại mật khẩu','2018-10-08 06:03:37','2018-10-08 07:38:17'),(408,0,'vi','backend','cancel','Cancel','2018-10-08 09:30:13','2018-10-08 09:30:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_04_02_193005_create_translations_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2018_06_28_033913_create_roles_table',1),(5,'2018_06_28_034036_create_role_user_table',1),(6,'2018_06_28_034231_create_permission_table',1),(7,'2018_06_28_034308_create_permission_role_table',1),(8,'2018_06_28_034418_create_permission_group_table',1),(9,'2018_07_12_040234_create_languages_table',1),(10,'2018_07_14_011435_create_categories_table',1),(11,'2018_07_14_011927_create_categories_translation_table',1),(13,'2018_10_05_162948_create_posts_table',2),(15,'2018_10_05_232032_create_products_table',3),(16,'2018_10_06_042058_create_setting_table',4),(17,'2018_10_06_172237_create_customers_table',5),(18,'2018_10_06_203410_create_slides_table',6),(19,'2018_10_07_061838_create_contacts_table',7),(20,'2018_10_07_075414_create_orders_table',8),(21,'2018_10_07_081153_create_order_products_table',8),(22,'2018_10_07_142330_create_tags_table',9);

/*Table structure for table `order_products` */

DROP TABLE IF EXISTS `order_products`;

CREATE TABLE `order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_products` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_order` int(11) DEFAULT NULL,
  `code` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: Đang xử lí, 1: Đã xử lí, 2: Đang giao hàng, 3: Thành công, 4: Hủy đơn hàng',
  `payment_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: Chưa thanh toán, 1: Đã thanh toán',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_group` */

DROP TABLE IF EXISTS `permission_group`;

CREATE TABLE `permission_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_group_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_group` */

insert  into `permission_group`(`id`,`name`,`display_name`,`created_at`,`updated_at`) values (1,'user','User Manager','2018-10-05 16:22:47','2018-10-05 16:22:47'),(2,'role','Role','2018-10-05 16:22:47','2018-10-05 16:22:47'),(3,'user_permission','Add permission','2018-10-05 16:22:47','2018-10-05 16:22:47'),(4,'category','Loại sản phẩm','2018-10-05 16:22:47','2018-10-05 16:22:47'),(5,'product','Sản phẩm','2018-10-05 16:22:47','2018-10-05 16:22:47'),(6,'slide','slide ','2018-10-05 16:22:47','2018-10-05 16:22:47'),(7,'tag','Thẻ gắn ','2018-10-05 16:22:47','2018-10-05 16:22:47'),(8,'member','Khách hàng',NULL,NULL),(9,'order','Đơn hàng',NULL,NULL),(10,'contact','Liên hệ',NULL,NULL),(11,'setting','Cài đặt hệ thông',NULL,NULL),(12,'post','Bài viết',NULL,NULL);

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`id`,`permission_id`,`role_id`,`created_at`,`updated_at`) values (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,1,NULL,NULL),(4,4,1,NULL,NULL),(5,5,1,NULL,NULL),(6,6,1,NULL,NULL),(7,7,1,NULL,NULL),(8,8,1,NULL,NULL),(9,9,1,NULL,NULL),(10,10,1,NULL,NULL),(11,11,1,NULL,NULL),(12,12,1,NULL,NULL),(13,13,1,NULL,NULL),(14,14,1,NULL,NULL),(15,18,1,NULL,NULL),(16,19,1,NULL,NULL),(17,20,1,NULL,NULL),(18,21,1,NULL,NULL),(19,22,1,NULL,NULL),(20,23,1,NULL,NULL),(21,24,1,NULL,NULL),(22,25,1,NULL,NULL),(23,26,1,NULL,NULL),(24,27,1,NULL,NULL),(25,28,1,NULL,NULL),(26,29,1,NULL,NULL),(27,30,1,NULL,NULL),(28,31,1,NULL,NULL),(29,32,1,NULL,NULL),(30,33,1,NULL,NULL),(33,34,1,NULL,NULL),(34,37,1,NULL,NULL),(35,38,1,NULL,NULL),(36,35,1,NULL,NULL),(37,36,1,NULL,NULL),(38,39,1,NULL,NULL),(39,13,2,NULL,NULL),(40,18,2,NULL,NULL),(41,19,2,NULL,NULL),(42,20,2,NULL,NULL),(43,21,2,NULL,NULL),(44,28,2,NULL,NULL),(45,30,2,NULL,NULL),(46,31,2,NULL,NULL),(47,32,2,NULL,NULL),(48,33,2,NULL,NULL),(49,40,1,NULL,NULL),(50,41,1,NULL,NULL);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`permission_group_id`,`description`,`created_at`,`updated_at`) values (1,'user.read','Read','1',NULL,NULL,NULL),(2,'user.create','Create','1',NULL,NULL,NULL),(3,'user.update','Update','1',NULL,NULL,NULL),(4,'user.delete','Delete','1',NULL,NULL,NULL),(5,'role.read','Read','2',NULL,NULL,NULL),(6,'role.create','Create','2',NULL,NULL,NULL),(7,'role.update','Update','2',NULL,NULL,NULL),(8,'role.delete','Delete','2',NULL,NULL,NULL),(9,'permission.add_role','Add permission for Role','3',NULL,NULL,NULL),(10,'permission.add_permission','Add role User','3',NULL,NULL,NULL),(11,'category.create','Thêm mới','4',NULL,'2018-10-05 16:23:57','2018-10-05 16:23:57'),(12,'category.update','Cập nhật','4',NULL,'2018-10-05 16:24:40','2018-10-05 16:24:40'),(13,'category.read','Xem','4',NULL,'2018-10-05 16:25:12','2018-10-05 16:25:12'),(14,'category.delete','Xóa','4',NULL,'2018-10-05 16:25:41','2018-10-05 16:25:41'),(18,'product.create','Thêm mới','5',NULL,NULL,NULL),(19,'product.update','Cập nhật','5',NULL,NULL,NULL),(20,'product.read','Xem','5',NULL,NULL,NULL),(21,'product.delete','Xóa','5',NULL,NULL,NULL),(22,'slide.create','Thêm mới','6',NULL,NULL,NULL),(23,'slide.update','Cập nhật','6',NULL,NULL,NULL),(24,'slide.read','Xem','6',NULL,NULL,NULL),(25,'slide.delete','Xóa','6',NULL,NULL,NULL),(26,'tag.create','Thêm mới','7',NULL,NULL,NULL),(27,'tag.update','Cập nhật','7',NULL,NULL,NULL),(28,'tag.read','Xem','7',NULL,NULL,NULL),(29,'tag.delete','Xóa','7',NULL,NULL,NULL),(30,'post.create','Thêm mới','12',NULL,NULL,NULL),(31,'post.update','Cập nhật','12',NULL,NULL,NULL),(32,'post.read','Xem','12',NULL,NULL,NULL),(33,'post.delete','Xóa','12',NULL,NULL,NULL),(34,'contact.read','Xem liên hệ','10',NULL,NULL,NULL),(35,'member.read','Xem khách hàng','8',NULL,NULL,NULL),(36,'order.read','Xem đơn hàng','9',NULL,NULL,NULL),(37,'setting.read','Xem cấu hình hệ thống','11',NULL,NULL,NULL),(38,'setting.update','Cập nhật cấu hình hệ thống','11',NULL,NULL,NULL),(39,'order.update','Cập nhật trạng thái đơn ','9',NULL,NULL,NULL),(40,'post.by_provider','Toàn quyền tin tức (admin)','12',NULL,NULL,NULL),(41,'product.by_provider','Toàn quyền sản phẩm (admin)','5',NULL,NULL,NULL);

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `remove` int(11) NOT NULL DEFAULT '0',
  `hot` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `prioritize` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `url_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`slug`,`description`,`content`,`tag`,`user_create`,`remove`,`hot`,`view`,`prioritize`,`created_by`,`url_image`,`meta_keyword`,`meta_description`,`meta_content`,`meta_title`,`status`,`created_at`,`updated_at`) values (2,'Tiêu đề bài viết 1','tieu-de-bai-viet-1','<p>M&ocirc; tả bài 1</p>','<p>M&ocirc; tả bài 2</p>','Bài 1',1,0,0,0,0,1,'/photos/1/about-us.png',NULL,NULL,NULL,'dada','AVAILABLE','2018-10-05 16:57:13','2018-10-05 17:10:22'),(5,'Tiêu đề bài viết 2','tieu-de-bai-viet-2','<p>M&ocirc; tả bài 1</p>','<p>M&ocirc; tả bài 2</p>','Bài 1',1,0,0,0,0,1,'/photos/1/about-us.png',NULL,NULL,NULL,'dada','AVAILABLE','2018-10-05 16:57:13','2018-10-05 16:57:13');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` double DEFAULT '0',
  `new_price` double NOT NULL DEFAULT '0',
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_detail` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_update` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'AVAILABLE',
  `hot` tinyint(1) DEFAULT NULL,
  `tag` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `meta_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_content` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`code`,`name`,`slug`,`old_price`,`new_price`,`image`,`image_detail`,`category_id`,`description`,`qty`,`specification`,`user_update`,`status`,`hot`,`tag`,`created_by`,`meta_title`,`meta_keyword`,`meta_description`,`meta_content`,`created_at`,`updated_at`) values (1,'NS1123','Bưởi 5 roi','buoi-5-roi',100000,50000,'/photos/shares/product/buoi-300x300.jpeg',NULL,3,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',50,NULL,1,'AVAILABLE',NULL,'Bưởi',2,NULL,NULL,NULL,NULL,'2018-10-06 01:28:35','2018-10-28 14:35:38'),(2,'NS3423','Bơ','bo',30000,25000,'/photos/shares/product/shqbotrinhmuoiC-300x300.jpg',NULL,2,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',500,NULL,1,'AVAILABLE',NULL,'Bơ',2,NULL,NULL,NULL,NULL,'2018-10-06 02:24:30','2018-10-28 14:35:12'),(3,'NS2344','Tỏi','toi',NULL,24000,'/photos/shares/product/toi1tep-300x300.jpg',NULL,2,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',5000,NULL,1,'AVAILABLE',1,'Tỏi 1 nhân,Tỏi',2,NULL,NULL,NULL,NULL,'2018-10-06 02:24:34','2018-10-28 14:34:46'),(4,'NS4434','Tỏi nhiều nhân','toi-nhieu-nhan',60000,50000,'/photos/shares/product/toi-ly-son-9-300x300.png',NULL,3,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',50,NULL,1,'AVAILABLE',1,'Tỏi,Tỏi nhiều nhân',2,NULL,NULL,NULL,NULL,'2018-10-06 02:24:38','2018-10-28 14:34:18'),(5,'NS2423','Xoài','xoai',NULL,50000,'/photos/shares/product/shqxoaicat2-300x300.jpg',NULL,3,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',50,NULL,1,'AVAILABLE',1,'Xoài ,Cây lương thực,Cây ăn quả',2,NULL,NULL,NULL,NULL,'2018-10-06 02:24:47','2018-10-28 14:33:45'),(6,'NS3422','Lúa CK123','lua-ck123',NULL,30000,'/photos/shares/product/download.jpg',NULL,4,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Thương hiệu:</td>\r\n			<td><a href=\"https://fact-depot.com/asafe-b124\" title=\"Asafe\">Asafe</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xuất xứ thương hiệu:</td>\r\n			<td>Đ&agrave;i Loan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất:</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',500,NULL,1,'AVAILABLE',1,'lúa,Cây lương thực',2,NULL,NULL,NULL,NULL,'2018-10-06 02:24:57','2018-10-28 14:33:04');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`) values (1,1,1),(2,2,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'superadmin','Super Admin','Super admin',NULL,NULL),(2,'provider','Nhà cung cấp','Nhà cung cấp',NULL,NULL),(3,'admin','Quản trị website','Quản trị website',NULL,NULL);

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `setting` */

insert  into `setting`(`id`,`setting`,`key`,`created_at`,`updated_at`) values (1,'{\"address\":\"Hà Nội\",\"phone\":\"012345678\",\"worktime\":\"7:00 - 20:00\",\"fax\":\"123456\",\"email\":\"bando@gmail.com\",\"fb\":\"https://www.facebook.com\",\"google_plus\":\"https://www.google.com/\",\"youtube\":\"https://www.youtube.com\",\"instagram\":\"https://www.instagram.com/\",\"zalo\":\"https://zalo.me\",\"google_map\":\"\",\"description\":\"Công ty chuyên bán đồ bảo hộ lao động\",\"coppyright\":\"© 2018\"}','CONTACT','2018-10-06 04:34:01','2018-10-06 04:34:01');

/*Table structure for table `slides` */

DROP TABLE IF EXISTS `slides`;

CREATE TABLE `slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desciption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `slides` */

insert  into `slides`(`id`,`title`,`url_slide`,`url_link`,`desciption`,`sort_by`,`status`,`created_at`,`updated_at`) values (1,'Slide 1','/photos/1/images1390361_nongsansach.jpg','https://www.facebook.com/',NULL,'1','AVAILABLE','2018-10-06 20:42:15','2018-10-28 14:37:15'),(2,'Slide 2','/photos/1/maxresdefault.jpg','https://www.facebook.com',NULL,'2','AVAILABLE','2018-10-06 20:47:00','2018-10-28 14:37:09');

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `peson` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_sell` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `stores` */

insert  into `stores`(`id`,`peson`,`tax_code`,`address`,`cate_sell`,`user_id`) values (1,'Provider 1','123456','0125114116','Bán lúa',2);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`status`,`created_at`,`updated_at`) values (4,'Cây ăn quả','AVAILABLE','2018-10-07 14:43:23','2018-10-07 14:43:23'),(5,'Cây lúa','AVAILABLE','2018-10-07 14:43:26','2018-10-08 07:54:13'),(6,'Cây lương thực','AVAILABLE','2018-10-07 14:43:39','2018-10-08 07:54:19'),(7,'Cây cảnh','AVAILABLE','2018-10-07 14:43:42','2018-10-07 14:43:42'),(8,'Cây nhiệt đới','AVAILABLE','2018-10-07 14:43:45','2018-10-07 14:43:45'),(9,'Tag 6','AVAILABLE','2018-10-07 14:43:48','2018-10-07 14:43:48');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `is_admin` int(2) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`phone`,`avatar`,`password`,`status`,`is_admin`,`remember_token`,`created_at`,`updated_at`) values (1,'Super Admin','admin@admin.com','0123456789','1.png','$2y$10$hdZNP.6t2Qj6N5vb24ndceervE5uTCWDPp1e2haxJPgY6J.hHbY56','AVAILABLE',NULL,'GTQuUI4GZiKyEJzT0sq0Sl4fDSnabV9t415b3Itadgwd4hBxftpc0PZjIHqV',NULL,NULL),(2,'Cửa hàng ABC','provider@gmail.com','Hà Nội','/1.png','$2y$10$8qe0YiJKk0mGY9esSj6zbuephvduTof6YGYiadTg643xoqCxRwsuy','AVAILABLE',0,'c73ZS4qF4DJ6SA5MemMPNg9LPsBz246jLfZokZIhRRuA9lINkaoyIceIONw8','2018-10-28 14:40:31','2018-10-28 14:41:26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
