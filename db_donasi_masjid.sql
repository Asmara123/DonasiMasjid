-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 02:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donasi_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_donatur`
--

CREATE TABLE `tb_donatur` (
  `id_donatur` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masjid`
--

CREATE TABLE `tb_masjid` (
  `id_masjid` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` int(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jml_donasi` int(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `no_rek` int(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `nama_rek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_submit`
--

CREATE TABLE `tb_submit` (
  `id_submit` varchar(10) NOT NULL,
  `id_masjid` varchar(10) NOT NULL,
  `id_donatur` varchar(11) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sukses`
--

CREATE TABLE `tb_sukses` (
  `id_sukses` int(11) NOT NULL,
  `id_submit` varchar(10) NOT NULL,
  `id_masjid` varchar(10) NOT NULL,
  `id_donatur` varchar(11) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_donatur`
--
ALTER TABLE `tb_donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `tb_masjid`
--
ALTER TABLE `tb_masjid`
  ADD PRIMARY KEY (`id_masjid`);

--
-- Indexes for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD PRIMARY KEY (`id_submit`),
  ADD KEY `id_masjid` (`id_masjid`),
  ADD KEY `id_donatur` (`id_donatur`);

--
-- Indexes for table `tb_sukses`
--
ALTER TABLE `tb_sukses`
  ADD PRIMARY KEY (`id_sukses`),
  ADD KEY `id_masjid` (`id_masjid`),
  ADD KEY `id_donatur` (`id_donatur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_sukses`
--
ALTER TABLE `tb_sukses`
  MODIFY `id_sukses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD CONSTRAINT `tb_submit_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `tb_masjid` (`id_masjid`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_submit_ibfk_2` FOREIGN KEY (`id_donatur`) REFERENCES `tb_donatur` (`id_donatur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sukses`
--
ALTER TABLE `tb_sukses`
  ADD CONSTRAINT `tb_sukses_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `tb_masjid` (`id_masjid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sukses_ibfk_2` FOREIGN KEY (`id_donatur`) REFERENCES `tb_donatur` (`id_donatur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
