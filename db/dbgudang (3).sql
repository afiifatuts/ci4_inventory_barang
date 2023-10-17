-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 11:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `brgkode` char(20) NOT NULL,
  `brgnama` varchar(100) NOT NULL,
  `brgkatid` int(10) UNSIGNED NOT NULL,
  `brgsatid` int(10) UNSIGNED NOT NULL,
  `brgharga` double NOT NULL,
  `brggambar` varchar(200) NOT NULL,
  `brgstok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`brgkode`, `brgnama`, `brgkatid`, `brgsatid`, `brgharga`, `brggambar`, `brgstok`) VALUES
('b3', 'Keyboard', 36, 3, 200000, 'upload/b3.jpg', 13),
('KB001', 'Laptop Acer Aspire 5', 36, 3, 12000000, 'upload/KB001.jpg', 1),
('KB002', 'Beras 5 Kg', 24, 3, 105000, 'upload/KB002.jpg', 90),
('KB004', 'Pulpen Pilot G2', 25, 3, 2000, 'upload/KB004.jpg', 200),
('KB007', 'Meja Makan Kayu', 28, 3, 1500000, 'upload/KB007.jpg', 2),
('KB010', 'Bola Sepak Adidas', 31, 3, 200000, 'upload/KB010.jpg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `faktur` char(20) NOT NULL,
  `tglfaktur` date NOT NULL,
  `idpel` int(11) NOT NULL,
  `totalharga` double NOT NULL,
  `jumlahuang` double NOT NULL,
  `sisauang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `faktur` char(20) NOT NULL,
  `tglfaktur` date NOT NULL,
  `totalharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`faktur`, `tglfaktur`, `totalharga`) VALUES
('f02', '2023-10-13', 3000000),
('f04', '2023-10-16', 600000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barangkeluar`
--

CREATE TABLE `detail_barangkeluar` (
  `id` int(11) NOT NULL,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(10) NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barangmasuk`
--

CREATE TABLE `detail_barangmasuk` (
  `iddetail` bigint(20) NOT NULL,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(20) NOT NULL,
  `dethargamasuk` double NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_barangmasuk`
--

INSERT INTO `detail_barangmasuk` (`iddetail`, `detfaktur`, `detbrgkode`, `dethargamasuk`, `dethargajual`, `detjml`, `detsubtotal`) VALUES
(2, 'f02', 'ere', 200000, 100000, 10, 2000000),
(10, 'f02', 'KB010', 200000, 200000, 5, 1000000),
(11, 'f04', 'b3', 200000, 200000, 3, 600000);

--
-- Triggers `detail_barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `tri_kurangi_stok_barang` AFTER DELETE ON `detail_barangmasuk` FOR EACH ROW BEGIN 
UPDATE barang SET brgstok = brgstok - old.detjml WHERE brgkode = old.detbrgkode;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tri_tambah_stok_barang` AFTER INSERT ON `detail_barangmasuk` FOR EACH ROW BEGIN
UPDATE barang SET barang.brgstok = barang.brgstok + new.detjml WHERE barang.brgkode = new.detbrgkode;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tri_update_stok_barang` AFTER UPDATE ON `detail_barangmasuk` FOR EACH ROW BEGIN UPDATE barang 
SET brgstok = (brgstok - old.detjml) + new.detjml 
WHERE brgkode = new.detbrgkode; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `katid` int(10) UNSIGNED NOT NULL,
  `katnama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`katid`, `katnama`) VALUES
(6, 'Minuman'),
(24, 'Makanan'),
(25, 'Alat Tulis'),
(26, 'Kesehatan'),
(27, 'Otomotif'),
(28, 'Furniture'),
(29, 'Mainan'),
(30, 'Perhiasan'),
(31, 'Olahraga'),
(32, 'Musik'),
(33, 'Kuliner'),
(34, 'Kosmetik'),
(35, 'Perabot Rumah Tangga'),
(36, 'Elektrik'),
(37, 'Buku'),
(38, 'Film'),
(39, 'Kesejahteraan'),
(40, 'Hobi'),
(41, 'Alat Masak'),
(42, 'Majalah'),
(43, 'Detergent');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-10-09-022239', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1696818532, 1),
(2, '2023-10-09-022257', 'App\\Database\\Migrations\\Satuan', 'default', 'App', 1696818532, 1),
(3, '2023-10-09-022313', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1696818532, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelid` int(11) NOT NULL,
  `pelnama` varchar(100) NOT NULL,
  `peltelp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelid`, `pelnama`, `peltelp`) VALUES
(4, 'test4', '084324324534'),
(5, 'test5', '08425345112451');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `satid` int(10) UNSIGNED NOT NULL,
  `satnama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`satid`, `satnama`) VALUES
(2, 'Kilogram'),
(3, 'Pieces'),
(4, 'Kilograms'),
(5, 'Liters'),
(6, 'Meters'),
(7, 'Dozens'),
(8, 'Pounds'),
(9, 'Gallons'),
(10, 'Centimeters'),
(11, 'Ounces'),
(12, 'Yards');

-- --------------------------------------------------------

--
-- Table structure for table `temp_barangkeluar`
--

CREATE TABLE `temp_barangkeluar` (
  `id` int(11) NOT NULL,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(10) NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_barangkeluar`
--

INSERT INTO `temp_barangkeluar` (`id`, `detfaktur`, `detbrgkode`, `dethargajual`, `detjml`, `detsubtotal`) VALUES
(14, '1710230001', 'b3', 200000, 321, 64200000),
(15, '1710230001', 'KB001', 12000000, 11, 132000000),
(16, '1710230001', 'KB007', 1500000, 1, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_barangmasuk`
--

CREATE TABLE `temp_barangmasuk` (
  `iddetail` bigint(20) NOT NULL,
  `detfaktur` char(20) NOT NULL,
  `detbrgkode` char(20) NOT NULL,
  `dethargamasuk` double NOT NULL,
  `dethargajual` double NOT NULL,
  `detjml` int(11) NOT NULL,
  `detsubtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`brgkode`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`faktur`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`faktur`);

--
-- Indexes for table `detail_barangkeluar`
--
ALTER TABLE `detail_barangkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barangmasuk`
--
ALTER TABLE `detail_barangmasuk`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelid`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satid`);

--
-- Indexes for table `temp_barangkeluar`
--
ALTER TABLE `temp_barangkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_barangmasuk`
--
ALTER TABLE `temp_barangmasuk`
  ADD PRIMARY KEY (`iddetail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_barangkeluar`
--
ALTER TABLE `detail_barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_barangmasuk`
--
ALTER TABLE `detail_barangmasuk`
  MODIFY `iddetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp_barangkeluar`
--
ALTER TABLE `temp_barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temp_barangmasuk`
--
ALTER TABLE `temp_barangmasuk`
  MODIFY `iddetail` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
