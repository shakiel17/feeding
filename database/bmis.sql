/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.38-MariaDB : Database - bmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bmis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bmis`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_barangay` */

DROP TABLE IF EXISTS `bmis_barangay`;

CREATE TABLE `bmis_barangay` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `mun_id` int(11) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_household` */

DROP TABLE IF EXISTS `bmis_household`;

CREATE TABLE `bmis_household` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `h_code` varchar(100) DEFAULT NULL,
  `h_type` varchar(100) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(109) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_household_details` */

DROP TABLE IF EXISTS `bmis_household_details`;

CREATE TABLE `bmis_household_details` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `h_code` varchar(100) DEFAULT NULL,
  `h_member` int(11) DEFAULT NULL,
  `h_member_type` varchar(100) DEFAULT NULL,
  `is_head` int(11) DEFAULT '0',
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_member` */

DROP TABLE IF EXISTS `bmis_member`;

CREATE TABLE `bmis_member` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  `priv_id` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Active',
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_municipality` */

DROP TABLE IF EXISTS `bmis_municipality`;

CREATE TABLE `bmis_municipality` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_province` */

DROP TABLE IF EXISTS `bmis_province`;

CREATE TABLE `bmis_province` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updaeed` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bmis_purok` */

DROP TABLE IF EXISTS `bmis_purok`;

CREATE TABLE `bmis_purok` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `time_updated` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
