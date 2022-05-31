/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_koperasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_koperasi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_koperasi`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(255) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `admin` */

insert  into `admin`(`ID_ADMIN`,`USERNAME`,`PASSWORD`) values 
('ADM0001','admin','12345');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` varchar(255) NOT NULL,
  `ID_USER` varchar(255) NOT NULL,
  `ID_PINJAMAN` varchar(255) NOT NULL,
  `ANGSURAN_KE` int(10) NOT NULL,
  `SISA_PEMBAYARAN` varchar(255) DEFAULT NULL,
  `DENDA` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_PEMBAYARAN`),
  KEY `ID_USER` (`ID_USER`),
  KEY `ID_PINJAMAN` (`ID_PINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`ID_PEMBAYARAN`,`ID_USER`,`ID_PINJAMAN`,`ANGSURAN_KE`,`SISA_PEMBAYARAN`,`DENDA`,`KETERANGAN`,`created_at`) values 
('SHA16282d27b8c98f','SHA16282d1e38eeea','1120000',1,'12320000','','','2022-05-17 00:38:51'),
('SHA16282d286e5494','SHA16282d1e38eeea','1120000',2,'11200000','','','2022-05-17 00:39:02');

/*Table structure for table `pinjaman` */

DROP TABLE IF EXISTS `pinjaman`;

CREATE TABLE `pinjaman` (
  `ID_PINJAMAN` varchar(255) NOT NULL,
  `ID_USER` varchar(255) NOT NULL,
  `JUMLAH_PINJAMAN` varchar(50) NOT NULL,
  `BUNGA` varchar(50) NOT NULL,
  `LAMA_CICILAN` int(10) NOT NULL,
  `ANGSURAN` varchar(50) NOT NULL,
  `TANGGAL_JATUH_TEMPO` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_PINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `pinjaman` */

insert  into `pinjaman`(`ID_PINJAMAN`,`ID_USER`,`JUMLAH_PINJAMAN`,`BUNGA`,`LAMA_CICILAN`,`ANGSURAN`,`TANGGAL_JATUH_TEMPO`) values 
('SHA16282d25d871a0','SHA16282d1e38eeea','12000000','1440000',12,'1120000','2023-01-02');

/*Table structure for table `simpanan` */

DROP TABLE IF EXISTS `simpanan`;

CREATE TABLE `simpanan` (
  `ID_SIMPANAN` varchar(255) NOT NULL,
  `ID_USER` varchar(255) NOT NULL,
  `JENIS_SIMPANAN` varchar(20) NOT NULL,
  `SALDO` varchar(100) NOT NULL,
  `TANGGAL_SIMPANAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_SIMPANAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `simpanan` */

insert  into `simpanan`(`ID_SIMPANAN`,`ID_USER`,`JENIS_SIMPANAN`,`SALDO`,`TANGGAL_SIMPANAN`) values 
('cf6a335aa6131c833f67f2a49aa422dd2cab67f1','SHA16282d1e38eeea','Wajib','100000','2022-05-17 05:36:19'),
('SHA16282d22285d60','SHA16282d1e38eeea','Pokok','1000000','2022-05-17 00:00:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` varchar(255) NOT NULL,
  `EMAIL` varchar(244) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `JALAN` varchar(255) NOT NULL,
  `KELURAHAN` varchar(255) NOT NULL,
  `KECAMATAN` varchar(255) NOT NULL,
  `KODE_POS` int(5) NOT NULL,
  `TELEPON` varchar(15) NOT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `user` */

insert  into `user`(`ID_USER`,`EMAIL`,`USERNAME`,`PASSWORD`,`NAMA`,`JALAN`,`KELURAHAN`,`KECAMATAN`,`KODE_POS`,`TELEPON`,`STATUS`) values 
('SHA16282d1e38eeea','sandhyzidan@gmail.com','sandhy','12345','Mochamad Sandhy Zidan Ramdhani','Jln. Kebunjayanti NO 51','Sukapura','Kiaracondong',40285,'089524536437','Tidak Meminjam');

/* Trigger structure for table `user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `simpanan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `simpanan` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	insert into simpanan values (SHA1(NEW.NAMA),NEW.ID_USER, 'Wajib' ,'100000',now());
    END */$$


DELIMITER ;

/* Procedure structure for procedure `tot_pokok` */

/*!50003 DROP PROCEDURE IF EXISTS  `tot_pokok` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tot_pokok`()
BEGIN
	SELECT SUM(simpanan.SALDO) as total_wajib, user.* FROM simpanan INNER JOIN user ON simpanan.ID_USER = user.ID_USER WHERE 	simpanan.JENIS_SIMPANAN = 'Pokok' GROUP BY ID_USER;
END */$$
DELIMITER ;

/* Procedure structure for procedure `tot_sukarela` */

/*!50003 DROP PROCEDURE IF EXISTS  `tot_sukarela` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tot_sukarela`()
BEGIN
	SELECT SUM(simpanan.SALDO) as total_wajib, user.* FROM simpanan INNER JOIN user ON simpanan.ID_USER = user.ID_USER WHERE 	simpanan.JENIS_SIMPANAN = 'Sukarela' GROUP BY ID_USER;
END */$$
DELIMITER ;

/* Procedure structure for procedure `tot_wajib` */

/*!50003 DROP PROCEDURE IF EXISTS  `tot_wajib` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tot_wajib`()
BEGIN
	SELECT SUM(simpanan.SALDO) as total_wajib, user.* FROM simpanan INNER JOIN user ON simpanan.ID_USER = user.ID_USER WHERE 	simpanan.JENIS_SIMPANAN = 'Wajib' GROUP BY ID_USER;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
