/*
SQLyog Ultimate v13.1.1 (32 bit)
MySQL - 10.1.16-MariaDB : Database - pkl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pkl` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pkl`;

/*Table structure for table `kategori_bidang` */

DROP TABLE IF EXISTS `kategori_bidang`;

CREATE TABLE `kategori_bidang` (
  `id_bd` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `bidang` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_bd`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_bidang` */

insert  into `kategori_bidang`(`id_bd`,`id_mhs`,`id_users`,`bidang`) values 
(1,NULL,NULL,'Teknik Informatika'),
(2,NULL,NULL,'Teknik Komputer'),
(3,NULL,NULL,'Animasi'),
(4,NULL,NULL,'Sistem Informasi'),
(5,NULL,NULL,'Managemen Informatika');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(30) DEFAULT NULL,
  `id_bd` int(30) DEFAULT NULL,
  `id_nilai` int(30) DEFAULT NULL,
  `nama` char(30) DEFAULT NULL,
  `alamat` text,
  `telp` char(30) DEFAULT NULL,
  `usia` date DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `asal_sekolah` char(35) DEFAULT NULL,
  `foto_mhs` char(60) DEFAULT NULL,
  `suket` char(60) DEFAULT NULL,
  `cv` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id_mhs`,`id_users`,`id_bd`,`id_nilai`,`nama`,`alamat`,`telp`,`usia`,`email`,`asal_sekolah`,`foto_mhs`,`suket`,`cv`) values 
(1,2,NULL,NULL,'Aditya P Kusnadi','Jl.saptamarga no 61','0895610348494','1998-12-01','a@mail.com','SMAN 13 BDG','5d522abfd0a16.jpg',NULL,NULL);

/*Table structure for table `masternilai` */

DROP TABLE IF EXISTS `masternilai`;

CREATE TABLE `masternilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(30) DEFAULT NULL,
  `id_mhs` int(30) DEFAULT NULL,
  `aspek` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `masternilai` */

insert  into `masternilai`(`id_nilai`,`id_users`,`id_mhs`,`aspek`) values 
(1,NULL,NULL,'Penampilan'),
(2,NULL,NULL,'Keterampilan'),
(3,NULL,NULL,'Sosial');

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `id_p` char(60) NOT NULL,
  `id_mhs` char(30) DEFAULT NULL,
  `id_bd` char(30) DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penilaian` */

/*Table structure for table `penilaiandet` */

DROP TABLE IF EXISTS `penilaiandet`;

CREATE TABLE `penilaiandet` (
  `id_pdet` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` char(60) DEFAULT NULL,
  `aspek` char(60) DEFAULT NULL,
  `nilai` char(60) DEFAULT NULL,
  `keterangan` char(60) DEFAULT NULL,
  PRIMARY KEY (`id_pdet`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `penilaiandet` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `type` int(1) DEFAULT '0',
  `lastmodified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_users`,`username`,`password`,`type`,`lastmodified`) values 
(1,'admin','admin',1,NULL),
(2,'apkblack17','aditya007',0,'2019-08-13 10:11:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
