-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2019 at 11:03 AM
-- Server version: 10.4.7-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `hakses`
--

CREATE TABLE `hakses` (
  `id_pengguna` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_routing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hakses`
--

INSERT INTO `hakses` (`id_pengguna`, `id_routing`) VALUES
('nosesi', 1),
('nosesi', 2),
('nosesi', 3),
('nosesi', 4),
('nosesi', 5),
('raya', 1),
('raya', 2),
('raya', 3),
('raya', 4),
('raya', 5),
('raya', 6),
('raya', 7),
('raya', 8),
('raya', 9),
('raya', 10),
('raya', 11),
('raya', 12),
('raya', 13),
('raya', 14),
('raya', 15),
('raya', 16),
('raya', 17),
('raya', 18),
('raya', 19),
('raya', 20),
('raya', 21),
('raya', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `basisdata` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `password`, `nama`, `level`, `basisdata`) VALUES
('nosesi', '', '', NULL, ''),
('raya', 'raya', 'AppEm', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `routing`
--

CREATE TABLE `routing` (
  `id_routing` int(11) NOT NULL,
  `halaman_routing` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routing`
--

INSERT INTO `routing` (`id_routing`, `halaman_routing`) VALUES
(1, ''),
(2, 'login'),
(3, 'logout'),
(4, 'formpendaftaran'),
(5, 'prosespendaftaran'),
(6, 'profil'),
(7, 'hakakses'),
(8, 'basisdata'),
(9, 'departemen'),
(10, 'suntingdepartemen'),
(11, 'pemasok'),
(12, 'suntingpemasok'),
(13, 'kodebarang'),
(14, 'suntingkodebarang'),
(15, 'persediaan'),
(16, 'hargajual'),
(17, 'bukunota'),
(18, 'fifo'),
(19, 'rekab'),
(20, 'pembelian'),
(21, 'penjualan'),
(22, 'ajax');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakses`
--
ALTER TABLE `hakses`
  ADD PRIMARY KEY (`id_pengguna`,`id_routing`),
  ADD KEY `id_routing` (`id_routing`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `routing`
--
ALTER TABLE `routing`
  ADD PRIMARY KEY (`id_routing`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routing`
--
ALTER TABLE `routing`
  MODIFY `id_routing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hakses`
--
ALTER TABLE `hakses`
  ADD CONSTRAINT `hakses_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `hakses_ibfk_2` FOREIGN KEY (`id_routing`) REFERENCES `routing` (`id_routing`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
