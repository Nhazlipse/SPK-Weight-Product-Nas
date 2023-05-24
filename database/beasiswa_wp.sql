-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 05:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alter` int(11) NOT NULL,
  `code` varchar(128) DEFAULT NULL,
  `alternatif` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alter`, `code`, `alternatif`) VALUES
(19, 'M1', 'M. Anas Baihaqi Y.'),
(20, 'M2', 'Bagas Prayoga D.'),
(21, 'M3', 'Ewaldo Salvage V.'),
(22, 'M4', 'Wahyu Ibnu B.'),
(23, 'M5', 'Fara Carmila'),
(24, 'M6', 'Habib Maulana Rizky'),
(25, 'M7', 'Muhammad Riko A.'),
(26, 'M8', 'Ahmad Habib Mustofa'),
(27, 'M9', 'Abi Yahya F.'),
(28, 'M10', 'Dimas Bagus N.');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_alter` int(11) DEFAULT NULL,
  `c1` int(128) DEFAULT NULL,
  `c2` int(128) DEFAULT NULL,
  `c3` int(128) DEFAULT NULL,
  `c4` int(128) DEFAULT NULL,
  `c5` int(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_alter`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(8, 19, 4, 6, 2, 3, 3),
(9, 20, 3, 4, 2, 2, 2),
(10, 21, 3, 5, 1, 1, 2),
(11, 22, 3, 6, 2, 2, 2),
(12, 23, 4, 4, 3, 3, 3),
(13, 24, 2, 5, 5, 5, 4),
(14, 25, 3, 7, 3, 3, 5),
(15, 26, 1, 3, 1, 1, 2),
(16, 27, 3, 6, 3, 2, 1),
(17, 28, 3, 3, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `kriteria` varchar(256) DEFAULT NULL,
  `jenis` varchar(32) DEFAULT NULL,
  `bobot` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `code`, `kriteria`, `jenis`, `bobot`) VALUES
(1, 'C1', 'Nilai IPK', 'benefit', 4),
(2, 'C2', 'Semester', 'benefit', 5),
(3, 'C3', 'Pekerjaan Orangtua', 'benefit', 2),
(4, 'C4', 'Jumlah Penghasilan Orangtua', 'benefit', 4),
(5, 'C5', 'Jumlah Saudara Kandung', 'benefit', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alter`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_alter` (`id_alter`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_alter`) REFERENCES `alternatif` (`id_alter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
