-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 12:09 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`ID_akun` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_akun`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'John Doe'),
(2, 'aldo', 'b104ab9a0e58c861b9628208b3fecd58', 'Ronaldo Simanjuntak'),
(3, 'dheya', 'e374c06fc308b0a29d8ceff00e859179', 'Dheya Anggita'),
(4, 'bilal', '5ae1c881ad1d8d750f15c232a3232379', 'Ranger Merah'),
(5, 'citra', 'e260eab6a7c45d139631f72b55d8506b', 'Ambar');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
`ID_alternatif` int(11) NOT NULL,
  `ID_jasa` int(11) NOT NULL,
  `ID_pengiriman` int(11) NOT NULL,
  `nilai` decimal(2,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`ID_alternatif`, `ID_jasa`, `ID_pengiriman`, `nilai`) VALUES
(1, 2, 4, '0.33'),
(2, 1, 5, '0.31'),
(3, 2, 6, '0.33'),
(4, 4, 7, '0.16'),
(5, 3, 9, '0.32'),
(6, 3, 8, '0.30'),
(7, 3, 10, '0.29'),
(8, 3, 11, '0.30'),
(10, 1, 13, '0.21');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pengiriman`
--

CREATE TABLE IF NOT EXISTS `jasa_pengiriman` (
`ID_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`ID_jasa`, `nama_jasa`) VALUES
(1, 'Puninar'),
(2, 'Nippon Express'),
(3, 'Yamato'),
(4, 'Atlantic'),
(10, 'JNE');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`ID_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_kriteria`, `nama_kriteria`) VALUES
(1, 'Harga'),
(2, 'Ketepatan Waktu'),
(3, 'Pelayanan'),
(4, 'Kualitas Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
`ID_pengiriman` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `berat` int(6) NOT NULL,
  `karakteristik_barang` varchar(50) NOT NULL,
  `jenis_pengiriman` varchar(50) NOT NULL,
  `waktu_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`ID_pengiriman`, `tujuan`, `berat`, `karakteristik_barang`, `jenis_pengiriman`, `waktu_pengiriman`) VALUES
(4, 'Bandung', 1, 'Mudah Pecah', 'Reguler', 'Pagi'),
(5, 'Jakarta', 100, 'Tidak Mudah Pecah', 'Express', 'Malam'),
(6, 'Seoul, Korea.', 212, 'Mudah Pecah', 'Express', 'Siang'),
(7, 'Milan, Italy', 121, 'Mudah Pecah', 'Reguler', 'Malam'),
(8, 'Bandung', 779, 'Tidak Mudah Pecah', 'Express', 'Malam'),
(9, 'malaysia', 53, 'Mudah Pecah', 'Express', 'Malam'),
(10, 'zimbabwe', 44, 'Mudah Pecah', 'Express', 'Siang'),
(11, 'Pangalengan', 920, 'Mudah Pecah', 'Express', 'Malam'),
(12, 'Seoul, Korea.', 100, 'Mudah Pecah', 'Express', 'Malam'),
(13, 'Milan', 902, 'Mudah Pecah', 'Reguler', 'Malam'),
(14, 'Green Land', 664, 'Mudah Pecah', 'Reguler', 'Pagi');

-- --------------------------------------------------------

--
-- Table structure for table `rank_alternatif`
--

CREATE TABLE IF NOT EXISTS `rank_alternatif` (
`ID_rank` int(11) NOT NULL,
  `ID_pengiriman` int(11) NOT NULL,
  `ID_jasa` int(11) NOT NULL,
  `nilai` decimal(2,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `rank_alternatif`
--

INSERT INTO `rank_alternatif` (`ID_rank`, `ID_pengiriman`, `ID_jasa`, `nilai`) VALUES
(18, 4, 1, '0.21'),
(19, 4, 2, '0.33'),
(20, 4, 3, '0.28'),
(21, 4, 4, '0.18'),
(30, 5, 1, '0.31'),
(31, 5, 2, '0.27'),
(32, 5, 3, '0.22'),
(33, 5, 4, '0.24'),
(34, 6, 1, '0.22'),
(35, 6, 2, '0.33'),
(36, 6, 3, '0.32'),
(37, 6, 4, '0.17'),
(38, 7, 1, '0.17'),
(39, 7, 2, '0.34'),
(40, 7, 3, '0.29'),
(41, 7, 4, '0.16'),
(42, 9, 1, '0.22'),
(43, 9, 2, '0.29'),
(44, 9, 3, '0.32'),
(45, 9, 4, '0.17'),
(46, 8, 1, '0.27'),
(47, 8, 2, '0.27'),
(48, 8, 3, '0.30'),
(49, 8, 4, '0.17'),
(50, 10, 1, '0.23'),
(51, 10, 2, '0.30'),
(52, 10, 3, '0.29'),
(53, 10, 4, '0.19'),
(54, 11, 1, '0.22'),
(55, 11, 2, '0.27'),
(56, 11, 3, '0.30'),
(57, 11, 4, '0.23'),
(70, 12, 1, '0.19'),
(71, 12, 2, '0.19'),
(72, 12, 3, '0.16'),
(73, 12, 4, '0.18'),
(75, 13, 1, '0.21'),
(76, 13, 2, '0.19'),
(77, 13, 3, '0.19'),
(78, 13, 4, '0.19');

-- --------------------------------------------------------

--
-- Table structure for table `rank_kriteria`
--

CREATE TABLE IF NOT EXISTS `rank_kriteria` (
`ID_rank` int(11) NOT NULL,
  `ID_pengiriman` int(11) NOT NULL,
  `ID_kriteria` int(11) NOT NULL,
  `nilai` decimal(2,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `rank_kriteria`
--

INSERT INTO `rank_kriteria` (`ID_rank`, `ID_pengiriman`, `ID_kriteria`, `nilai`) VALUES
(20, 4, 1, '0.19'),
(21, 4, 2, '0.36'),
(22, 4, 3, '0.11'),
(23, 4, 4, '0.34'),
(24, 5, 1, '0.51'),
(25, 5, 2, '0.17'),
(26, 5, 3, '0.17'),
(27, 5, 4, '0.17'),
(28, 6, 1, '0.14'),
(29, 6, 2, '0.21'),
(30, 6, 3, '0.17'),
(31, 6, 4, '0.51'),
(32, 7, 1, '0.17'),
(33, 7, 2, '0.37'),
(34, 7, 3, '0.11'),
(35, 7, 4, '0.34'),
(36, 9, 1, '0.08'),
(37, 9, 2, '0.28'),
(38, 9, 3, '0.15'),
(39, 9, 4, '0.47'),
(40, 8, 1, '0.09'),
(41, 8, 2, '0.25'),
(42, 8, 3, '0.30'),
(43, 8, 4, '0.38'),
(56, 10, 1, '0.17'),
(57, 10, 2, '0.19'),
(58, 10, 3, '0.23'),
(59, 10, 4, '0.41'),
(60, 11, 1, '0.13'),
(61, 11, 2, '0.49'),
(62, 11, 3, '0.10'),
(63, 11, 4, '0.28'),
(64, 12, 1, '0.14'),
(65, 12, 2, '0.44'),
(66, 12, 3, '0.16'),
(67, 12, 4, '0.25'),
(68, 13, 1, '0.15'),
(69, 13, 2, '0.31'),
(70, 13, 3, '0.19'),
(71, 13, 4, '0.35');

-- --------------------------------------------------------

--
-- Table structure for table `rank_perkriteria`
--

CREATE TABLE IF NOT EXISTS `rank_perkriteria` (
`ID_rank` int(11) NOT NULL,
  `ID_jasa` int(11) NOT NULL,
  `ID_kriteria` int(11) NOT NULL,
  `nilai` decimal(2,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=420 ;

--
-- Dumping data for table `rank_perkriteria`
--

INSERT INTO `rank_perkriteria` (`ID_rank`, `ID_jasa`, `ID_kriteria`, `nilai`) VALUES
(395, 1, 2, '0.21'),
(396, 2, 2, '0.21'),
(397, 3, 2, '0.14'),
(398, 4, 2, '0.15'),
(400, 1, 3, '0.19'),
(401, 2, 3, '0.22'),
(402, 3, 3, '0.16'),
(403, 4, 3, '0.24'),
(405, 1, 4, '0.21'),
(406, 2, 4, '0.16'),
(407, 3, 4, '0.26'),
(408, 4, 4, '0.18'),
(415, 1, 1, '0.20'),
(416, 2, 1, '0.20'),
(417, 3, 1, '0.20'),
(418, 4, 1, '0.20'),
(419, 10, 1, '0.20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`ID_akun`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
 ADD PRIMARY KEY (`ID_alternatif`), ADD KEY `ID_jasa` (`ID_jasa`), ADD KEY `ID_pengiriman` (`ID_pengiriman`);

--
-- Indexes for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
 ADD PRIMARY KEY (`ID_jasa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`ID_kriteria`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
 ADD PRIMARY KEY (`ID_pengiriman`);

--
-- Indexes for table `rank_alternatif`
--
ALTER TABLE `rank_alternatif`
 ADD PRIMARY KEY (`ID_rank`), ADD KEY `ID_pengiriman` (`ID_pengiriman`), ADD KEY `ID_jasa` (`ID_jasa`);

--
-- Indexes for table `rank_kriteria`
--
ALTER TABLE `rank_kriteria`
 ADD PRIMARY KEY (`ID_rank`), ADD KEY `ID_pengiriman` (`ID_pengiriman`), ADD KEY `ID_kriteria` (`ID_kriteria`);

--
-- Indexes for table `rank_perkriteria`
--
ALTER TABLE `rank_perkriteria`
 ADD PRIMARY KEY (`ID_rank`), ADD KEY `ID_jasa` (`ID_jasa`), ADD KEY `ID_kriteria` (`ID_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
MODIFY `ID_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
MODIFY `ID_jasa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `ID_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
MODIFY `ID_pengiriman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rank_alternatif`
--
ALTER TABLE `rank_alternatif`
MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `rank_kriteria`
--
ALTER TABLE `rank_kriteria`
MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `rank_perkriteria`
--
ALTER TABLE `rank_perkriteria`
MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=420;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`ID_jasa`) REFERENCES `jasa_pengiriman` (`ID_jasa`),
ADD CONSTRAINT `alternatif_ibfk_2` FOREIGN KEY (`ID_pengiriman`) REFERENCES `pengiriman` (`ID_pengiriman`);

--
-- Constraints for table `rank_alternatif`
--
ALTER TABLE `rank_alternatif`
ADD CONSTRAINT `rank_alternatif_ibfk_1` FOREIGN KEY (`ID_pengiriman`) REFERENCES `pengiriman` (`ID_pengiriman`),
ADD CONSTRAINT `rank_alternatif_ibfk_2` FOREIGN KEY (`ID_jasa`) REFERENCES `jasa_pengiriman` (`ID_jasa`);

--
-- Constraints for table `rank_kriteria`
--
ALTER TABLE `rank_kriteria`
ADD CONSTRAINT `rank_kriteria_ibfk_1` FOREIGN KEY (`ID_pengiriman`) REFERENCES `pengiriman` (`ID_pengiriman`),
ADD CONSTRAINT `rank_kriteria_ibfk_2` FOREIGN KEY (`ID_kriteria`) REFERENCES `kriteria` (`ID_kriteria`);

--
-- Constraints for table `rank_perkriteria`
--
ALTER TABLE `rank_perkriteria`
ADD CONSTRAINT `rank_perkriteria_ibfk_1` FOREIGN KEY (`ID_jasa`) REFERENCES `jasa_pengiriman` (`ID_jasa`),
ADD CONSTRAINT `rank_perkriteria_ibfk_2` FOREIGN KEY (`ID_kriteria`) REFERENCES `kriteria` (`ID_kriteria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
