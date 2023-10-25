-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 11:50 AM
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
  `brgkode` char(10) NOT NULL,
  `brgnama` varchar(100) NOT NULL,
  `brgkatid` int(10) UNSIGNED NOT NULL,
  `brgsatid` int(10) UNSIGNED NOT NULL,
  `brgharga` double NOT NULL,
  `brggambar` varchar(200) NOT NULL,
  `brgstok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(6, 'test'),
(7, 'test2'),
(8, 'w'),
(9, 'e'),
(10, 'q'),
(11, 'q'),
(12, 'Data 1'),
(13, 'Data 2'),
(14, 'Data 3'),
(15, 'Data 4'),
(16, 'Data 5'),
(17, 'Data 6'),
(18, 'Data 7'),
(19, 'Data 8'),
(20, 'Data 9'),
(21, 'Data 10');

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
(2, 'Kilogram');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`brgkode`),
  ADD KEY `barang_brgkatid_foreign` (`brgkatid`),
  ADD KEY `barang_brgsatid_foreign` (`brgsatid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD KEY `katid` (`katid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD KEY `satid` (`satid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_brgkatid_foreign` FOREIGN KEY (`brgkatid`) REFERENCES `kategori` (`katid`),
  ADD CONSTRAINT `barang_brgsatid_foreign` FOREIGN KEY (`brgsatid`) REFERENCES `satuan` (`satid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
