/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.21-MariaDB : Database - lupulhok_webreservation_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lupulhok_webreservation_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lupulhok_webreservation_db`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`) values 
(1,'admin','admin'),
(2,'kks','kks');

/*Table structure for table `tbl_webreservation` */

DROP TABLE IF EXISTS `tbl_webreservation`;

CREATE TABLE `tbl_webreservation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATESTAMP` date DEFAULT NULL,
  `TIME` varchar(8) DEFAULT NULL,
  `IP` varchar(15) DEFAULT NULL,
  `BROWSER` tinytext,
  `FORMID` varchar(255) DEFAULT NULL,
  `DATECHECKIN` varchar(255) DEFAULT NULL,
  `TIMECHECKIN` varchar(8) DEFAULT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `SECONDNAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PHONE` varchar(255) DEFAULT NULL,
  `HOTEL` varchar(255) DEFAULT NULL,
  `ROOMNO` varchar(255) DEFAULT NULL,
  `NUMBEROFGUEST` int(255) DEFAULT NULL,
  `TRANSPORT` varchar(3) DEFAULT NULL,
  `QUESTIONS` varchar(255) DEFAULT NULL,
  `NOTABLE` varchar(6) DEFAULT NULL,
  `STATUS` tinyint(4) DEFAULT NULL,
  `BOOK_NOW` varchar(255) DEFAULT NULL,
  `REFERER` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_webreservation` */

insert  into `tbl_webreservation`(`ID`,`DATESTAMP`,`TIME`,`IP`,`BROWSER`,`FORMID`,`DATECHECKIN`,`TIMECHECKIN`,`FIRSTNAME`,`SECONDNAME`,`EMAIL`,`PHONE`,`HOTEL`,`ROOMNO`,`NUMBEROFGUEST`,`TRANSPORT`,`QUESTIONS`,`NOTABLE`,`STATUS`,`BOOK_NOW`,`REFERER`) values 
(1,'2019-07-25','21:56:18','180.249.41.207','www.luputu.com/manual-booking.php','reservationlayoutgrid3','2019-07-28','19:00','Doris','Chan','waitress@luputu.com','082144320002','CBR','-',2,'No','','234',1,'Book Now','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362'),
(2,'2019-07-26','1:59:34','180.249.41.207','www.luputu.com/manual-booking.php','reservationlayoutgrid3','2019-08-28','19:00','kate','mooney','waitress@luputu.com','082144320002','tenganan ','-',2,'No','','1',3,'Book Now','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362'),
(3,'2019-07-26','2:02:56','180.249.41.207','www.luputu.com/manual-booking.php','reservationlayoutgrid3','2019-07-31','20:00','Mr','Lardinois','waitress@luputu.com','082144320002','genggong','-',1,'Yes','','1',1,'Book Now','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362'),
(4,'2019-07-26','5:29:36','36.84.65.116','www.luputu.com/manual-booking.php','manualbookinglayout','2019-07-26','18:00','Ms','Maria','admin@luputu.com','082144320002','Seabreeze ','-',1,'Yes','','1211',1,'Book Now','Mozilla/5.0 (Linux; Android 9; ASUS_Z01RD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.143 Mobile Safari/537.36'),
(5,'2019-07-26','5:38:58','36.84.65.116','www.luputu.com/manual-booking.php','manualbookinglayout','2019-07-26','18:45','Fabina','Roberti','admin@luputu.com','082144320002','Villa Cocomaya','-',6,'Yes','','123',1,'Book Now','Mozilla/5.0 (Linux; Android 9; ASUS_Z01RD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.143 Mobile Safari/537.36'),
(7,'2019-07-28','5:09:00','36.84.65.116','www.luputu.com/manual-booking.php','manualbookinglayout','2019-07-28','20:00','fam. ','elke','waitress@luputu.com','082144320002','CBR','-',6,'No','','',2,'Book Now','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362'),
(8,'2019-07-28','6:05:39','36.84.65.116','www.luputu.com/manual-booking.php','manualbookinglayout','2019-07-28','20:00','Mr/s','Bermol','waitress@luputu.com','082144320002','CBR','-',3,'No','','',2,'Book Now','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.18362'),
(9,'2019-07-29','4:55:07','36.84.65.116','www.luputu.com/manual-booking.php','manualbookinglayout','2019-07-29','19:00','Fam.','Robert','admin@luputu.com','082144320002','Bayshore hotel','-',4,'Yes','','',1,'Book Now','Mozilla/5.0 (Linux; Android 9; ASUS_Z01RD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.143 Mobile Safari/537.36'),
(12,NULL,NULL,NULL,NULL,NULL,'2019-08-09','01:00','2q','hfdh','waitress@luputu.com','082144320002','wwe','1',2,'rhr','weqwe','111',3,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
