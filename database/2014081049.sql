-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 02:24 
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2014081049`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` char(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama_admin`, `password`) VALUES
('dodi', 'Dodi Riyanto', 'cf90edaf85bc270d4e57c7f4dbd4a157'),
('eka', 'Eka Putra', '62d01ae745e76e248f60ea3705a387fc'),
('suryana', 'Suryana', '65b908e90977b9e4039e57ba00011db9');

-- --------------------------------------------------------

--
-- Table structure for table `isi_berita`
--

CREATE TABLE IF NOT EXISTS `isi_berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_berita` varchar(30) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal_berita` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_berita`
--

INSERT INTO `isi_berita` (`id_berita`, `id_kategori`, `judul_berita`, `isi_berita`, `tanggal_berita`) VALUES
(1, 1, 'Judul Berita Satu', 'Isi dalam berita satu', '2016-04-20'),
(2, 2, 'Judul Berita Dua', 'Isi dalam berita dua', '2016-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE IF NOT EXISTS `kategori_berita` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `keterangan_kategori` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori`, `nama_kategori`, `keterangan_kategori`) VALUES
(1, 'Kategori Utama', 'Keterangan kategori utama'),
(2, 'Kategori Kedua', 'Keterangan kategori kedua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `isi_berita`
--
ALTER TABLE `isi_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isi_berita`
--
ALTER TABLE `isi_berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `isi_berita`
--
ALTER TABLE `isi_berita`
  ADD CONSTRAINT `isi_berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_berita` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
