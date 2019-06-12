/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.6.21 : Database - bkk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`bkk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bkk`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(id_admin,nama_admin,alamat,no_telp,email) values (1,'admin','jalan santai','0812','marnodev8@gmail.com');

/*Table structure for table `loker` */

DROP TABLE IF EXISTS `loker`;

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `isi` mediumtext,
  `tanggal_ex` datetime DEFAULT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `loker` */

insert  into `loker`(id_loker,posisi,nama_perusahaan,isi,tanggal_ex) values (1,'programmer','PT. UJI COBA','<p>ok yes</p>','2019-06-30 00:00:00'),(2,'admin database','PT. UJI COBA','<p>ewaaa</p>','2019-06-30 00:00:00'),(3,'marketing','pt. a','<p>cek out</p><p><br></p>','2019-06-30 00:00:00');

/*Table structure for table `pelamar` */

DROP TABLE IF EXISTS `pelamar`;

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelamar` varchar(150) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `ketrampilan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pelamar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pelamar` */

insert  into `pelamar`(id_pelamar,nama_pelamar,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama,no_telp,pendidikan,ketrampilan) values (4,'harizha justine ramadhianita zahra firdausi andita sari','PEREMPUAN','magetan','2019-06-30','jalan santai','ISLAM','08','SMA','super'),(5,'marno','LAKI - LAKI','magetan','2019-06-01','aaaaaaaaaaa','ISLAM','081','D4','programming');

/*Table structure for table `pelamar_kerja` */

DROP TABLE IF EXISTS `pelamar_kerja`;

CREATE TABLE `pelamar_kerja` (
  `id_pel` int(11) NOT NULL AUTO_INCREMENT,
  `id_loker` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `rekrut` int(1) DEFAULT '0',
  UNIQUE KEY `id_pel` (`id_pel`),
  KEY `FK_pelamar_kerja` (`id_loker`),
  KEY `FK_pelamar` (`id_pelamar`),
  CONSTRAINT `FK_pelamar` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE,
  CONSTRAINT `FK_pelamar_kerja` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id_loker`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `pelamar_kerja` */

insert  into `pelamar_kerja`(id_pel,id_loker,id_pelamar,rekrut) values (37,1,5,1),(39,1,4,0),(42,2,4,1),(43,2,5,1),(44,3,4,0),(45,3,5,1);

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `id_loker` int(11) NOT NULL,
  `isi` mediumtext,
  `cekview` int(1) DEFAULT '1',
  PRIMARY KEY (`id_pengumuman`),
  KEY `FK_pengumuman` (`id_loker`),
  CONSTRAINT `FK_pengumuman` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id_loker`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

insert  into `pengumuman`(id_pengumuman,id_loker,isi,cekview) values (2,1,'<p>panggilan tes di sini</p>',0),(3,2,'<p>besok tes</p>',0),(4,3,'<p>tes tes kates</p>',0);

/*Table structure for table `perusahaan` */

DROP TABLE IF EXISTS `perusahaan`;

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `perusahaan` */

insert  into `perusahaan`(id_perusahaan,nama_perusahaan,alamat,no_telp,email) values (11,'PT. UJI COBA','abs','435','marno08041995@gmail.com'),(17,'pt. a','jalan santai','435','lf_mano@yahoo.com');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(id_user,email,password,level) values (10,'marno08041995@gmail.com','c4c11e282b92ab0587634e593a8d19a97ddb4e6e8027603e64516ac8f2ca7f97','perusahaan'),(15,'marnodev8@gmail.com','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','admin'),(17,'lf_mano@yahoo.com','d728d0d141ebc3b0ad58b4e0c095bf13e85269cb582660aa9cd66f9d01ded84c','perusahaan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
