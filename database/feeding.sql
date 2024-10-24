/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - feeding
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`feeding` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `feeding`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `dispensing` */

DROP TABLE IF EXISTS `dispensing`;

CREATE TABLE `dispensing` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `fish_id` varchar(11) DEFAULT NULL,
  `stock_id` varchar(11) DEFAULT NULL,
  `pono` varchar(100) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `expired` */

DROP TABLE IF EXISTS `expired`;

CREATE TABLE `expired` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) DEFAULT NULL,
  `stock_id` varchar(100) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `fish` */

DROP TABLE IF EXISTS `fish`;

CREATE TABLE `fish` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `feed_usage` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `applicable_date` date DEFAULT NULL,
  `applicable_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `purchaseorder` */

DROP TABLE IF EXISTS `purchaseorder`;

CREATE TABLE `purchaseorder` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `pono` varchar(100) DEFAULT NULL,
  `invno` varchar(100) DEFAULT NULL,
  `stock_id` varchar(100) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `rrdate` date DEFAULT NULL,
  `rrtime` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `stocks` */

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stockalert` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `stocktable` */

DROP TABLE IF EXISTS `stocktable`;

CREATE TABLE `stocktable` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) DEFAULT NULL,
  `invno` varchar(100) DEFAULT NULL,
  `stock_id` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `trantype` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `contactno` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
