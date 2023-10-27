-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: dbgudang
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.11-MariaDB
-- Date: Fri, 27 Oct 2023 11:25:03 +0700

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `brgkode` char(20) NOT NULL,
  `brgnama` varchar(100) NOT NULL,
  `brgkatid` int(10) unsigned NOT NULL,
  `brgsatid` int(10) unsigned NOT NULL,
  `brgharga` double NOT NULL,
  `brggambar` varchar(200) NOT NULL,
  `brgstok` int(11) NOT NULL,
  PRIMARY KEY (`brgkode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `barang` VALUES ('b3','Keyboard',36,3,200000,'upload/b3.jpg',13),('KB001','Laptop Acer Aspire 5',36,3,12000000,'upload/KB001.jpg',1),('KB002','Beras 5 Kg',24,3,105000,'upload/KB002.jpg',90),('KB004','Pulpen Pilot G2',25,3,2000,'upload/KB004.jpg',200),('KB007','Meja Makan Kayu',28,3,1500000,'upload/KB007.jpg',2),('KB010','Bola Sepak Adidas',31,3,200000,'upload/KB010.jpg',40);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `barang` with 6 row(s)
--

--
-- Table structure for table `barangkeluar`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangkeluar` (
  `faktur` char(20) NOT NULL,
  `tglfaktur` date NOT NULL,
  `idpel` int(11) NOT NULL,
  `totalharga` double NOT NULL,
  `jumlahuang` double NOT NULL,
  `sisauang` int(11) NOT NULL,
  PRIMARY KEY (`faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangkeluar`
--

LOCK TABLES `barangkeluar` WRITE;
/*!40000 ALTER TABLE `barangkeluar` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `barangkeluar` VALUES ('1810230002','2023-10-18',4,10202000,1000000,0),('1810230003','2023-10-18',4,129000,130000,1000);
/*!40000 ALTER TABLE `barangkeluar` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `barangkeluar` with 2 row(s)
--

--
-- Table structure for table `barangmasuk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangmasuk` (
  `faktur` char(20) NOT NULL,
  `tglfaktur` date NOT NULL,
  `totalharga` double NOT NULL,
  PRIMARY KEY (`faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangmasuk`
--

LOCK TABLES `barangmasuk` WRITE;
/*!40000 ALTER TABLE `barangmasuk` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `barangmasuk` VALUES ('f02','2023-10-13',3000000),('f04','2023-10-16',600000);
/*!40000 ALTER TABLE `barangmasuk` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `barangmasuk` with 2 row(s)
--

--
-- Table structure for table `detail_barangkeluar`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_barangkeluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(10) NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_barangkeluar`
--

LOCK TABLES `detail_barangkeluar` WRITE;
/*!40000 ALTER TABLE `detail_barangkeluar` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `detail_barangkeluar` VALUES (3,'1810230002','KB010',200000,50,10000000),(5,'1810230003','KB004',2000,12,24000),(17,'1810230002','b3',200000,1,200000),(18,'1810230002','KB004',2000,1,2000),(19,'1810230003','KB002',105000,1,105000);
/*!40000 ALTER TABLE `detail_barangkeluar` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `detail_barangkeluar` with 5 row(s)
--

--
-- Table structure for table `detail_barangmasuk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_barangmasuk` (
  `iddetail` bigint(20) NOT NULL AUTO_INCREMENT,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(20) NOT NULL,
  `dethargamasuk` double NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL,
  PRIMARY KEY (`iddetail`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_barangmasuk`
--

LOCK TABLES `detail_barangmasuk` WRITE;
/*!40000 ALTER TABLE `detail_barangmasuk` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `detail_barangmasuk` VALUES (2,'f02','ere',200000,100000,10,2000000),(10,'f02','KB010',200000,200000,5,1000000),(11,'f04','b3',200000,200000,3,600000);
/*!40000 ALTER TABLE `detail_barangmasuk` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `detail_barangmasuk` with 3 row(s)
--

--
-- Table structure for table `kategori`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `katid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `katnama` varchar(50) NOT NULL,
  PRIMARY KEY (`katid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `kategori` VALUES (6,'Minuman'),(24,'Makanan'),(25,'Alat Tulis'),(26,'Kesehatan'),(27,'Otomotif'),(28,'Furniture'),(29,'Mainan'),(30,'Perhiasan'),(31,'Olahraga'),(32,'Musik'),(33,'Kuliner'),(34,'Kosmetik'),(35,'Perabot Rumah Tangga'),(36,'Elektrik'),(37,'Buku'),(38,'Film'),(39,'Kesejahteraan'),(40,'Hobi'),(41,'Alat Masak'),(42,'Majalah'),(43,'Detergent');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `kategori` with 21 row(s)
--

--
-- Table structure for table `levels`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `levelid` int(11) NOT NULL AUTO_INCREMENT,
  `levelnama` varchar(50) NOT NULL,
  PRIMARY KEY (`levelid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `levels` VALUES (1,'Admin'),(2,'Kasir'),(3,'Gudang'),(4,'Pimpinan');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `levels` with 4 row(s)
--

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` VALUES (1,'2023-10-09-022239','App\\Database\\Migrations\\Kategori','default','App',1696818532,1),(2,'2023-10-09-022257','App\\Database\\Migrations\\Satuan','default','App',1696818532,1),(3,'2023-10-09-022313','App\\Database\\Migrations\\Barang','default','App',1696818532,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `migrations` with 3 row(s)
--

--
-- Table structure for table `pelanggan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `pelid` int(11) NOT NULL AUTO_INCREMENT,
  `pelnama` varchar(100) NOT NULL,
  `peltelp` char(20) NOT NULL,
  PRIMARY KEY (`pelid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pelanggan` VALUES (4,'test4','084324324534'),(5,'test5','08425345112451');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pelanggan` with 2 row(s)
--

--
-- Table structure for table `satuan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuan` (
  `satid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satnama` varchar(50) NOT NULL,
  PRIMARY KEY (`satid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `satuan` VALUES (2,'Kilogram'),(3,'Pieces'),(4,'Kilograms'),(5,'Liters'),(6,'Meters'),(7,'Dozens'),(8,'Pounds'),(9,'Gallons'),(10,'Centimeters'),(11,'Ounces'),(12,'Yards');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `satuan` with 11 row(s)
--

--
-- Table structure for table `temp_barangkeluar`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_barangkeluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(10) NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_barangkeluar`
--

LOCK TABLES `temp_barangkeluar` WRITE;
/*!40000 ALTER TABLE `temp_barangkeluar` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `temp_barangkeluar` VALUES (20,'1810230001','KB002',105000,4,420000),(21,'1810230001','KB010',200000,2,400000),(22,'1810230002','KB010',200000,5,1000000),(23,'1810230003','KB002',105000,1,105000),(24,'1810230003','KB004',2000,12,24000),(25,'1810230004','KB002',105000,1,105000),(26,'1810230005','KB002',105000,1,105000),(27,'1810230006','KB002',105000,1,105000),(28,'1810230007','KB002',105000,1,105000),(29,'1810230008','KB010',200000,1,200000),(30,'2410230001','KB002',105000,1,105000),(31,'2410230002','KB002',105000,1,105000),(32,'2410230002','KB010',200000,1,200000);
/*!40000 ALTER TABLE `temp_barangkeluar` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `temp_barangkeluar` with 13 row(s)
--

--
-- Table structure for table `temp_barangmasuk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_barangmasuk` (
  `iddetail` bigint(20) NOT NULL AUTO_INCREMENT,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(20) NOT NULL,
  `dethargamasuk` double NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL,
  PRIMARY KEY (`iddetail`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_barangmasuk`
--

LOCK TABLES `temp_barangmasuk` WRITE;
/*!40000 ALTER TABLE `temp_barangmasuk` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `temp_barangmasuk` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `temp_barangmasuk` with 0 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` char(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL,
  `userlevelid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES ('admin','Administrasi','$2y$10$rRz.iLgiO10PZNzefMC.S.embLA.l30f.hBCWj4nJ2b9BTdcQLv32',1),('gudang','Fitri','$2y$10$rRz.iLgiO10PZNzefMC.S.embLA.l30f.hBCWj4nJ2b9BTdcQLv32',3),('kasir','Afiifatuts','$2y$10$rRz.iLgiO10PZNzefMC.S.embLA.l30f.hBCWj4nJ2b9BTdcQLv32',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 3 row(s)
--

DROP TRIGGER IF EXISTS `tri_tambah_stok_barang`;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tri_tambah_stok_barang
 AFTER INSERT 
ON detail_barangmasuk
FOR EACH ROW
BEGIN
UPDATE barang SET barang.brgstok = barang.brgstok + new.detjml WHERE barang.brgkode = new.detbrgkode;
END */;;
DELIMITER ;

DROP TRIGGER IF EXISTS `tri_update_stok_barang`;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER dbgudang.tri_update_stok_barang 
AFTER UPDATE ON dbgudang.detail_barangmasuk 
FOR EACH ROW BEGIN UPDATE barang 
SET brgstok = (brgstok - old.detjml) + new.detjml 
WHERE brgkode = new.detbrgkode; 
END */;;
DELIMITER ;

DROP TRIGGER IF EXISTS `tri_kurangi_stok_barang`;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER dbgudang.tri_kurangi_stok_barang AFTER
DELETE ON dbgudang.detail_barangmasuk FOR EACH ROW BEGIN 
UPDATE barang SET brgstok = brgstok - old.detjml WHERE brgkode = old.detbrgkode;
END */;;
DELIMITER ;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Fri, 27 Oct 2023 11:25:03 +0700
