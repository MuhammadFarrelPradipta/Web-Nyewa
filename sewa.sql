-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 01:10 PM
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
-- Database: `sewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `password_pemilik` varchar(100) NOT NULL,
  `email_pemilik` varchar(100) NOT NULL,
  `no_pemilik` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `password_pemilik`, `email_pemilik`, `no_pemilik`) VALUES
(3, 'Muhammad Farrel Pradipta', '7eed7340d6ad80b8cd9800b5cefae431', 'farrel@gmail.com', '089619103122');

-- --------------------------------------------------------

--
-- Table structure for table `pencari`
--

CREATE TABLE `pencari` (
  `id_pencari` int(100) NOT NULL,
  `nama_pencari` varchar(1000) NOT NULL,
  `password_pencari` varchar(1000) NOT NULL,
  `email_pencari` varchar(1000) NOT NULL,
  `no_pencari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencari`
--

INSERT INTO `pencari` (`id_pencari`, `nama_pencari`, `password_pencari`, `email_pencari`, `no_pencari`) VALUES
(1, 'Muhammad Farrel Pradipta', '7eed7340d6ad80b8cd9800b5cefae431', 'farrel@gmail.com', '089619103122');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `pesan_pengajuan` text NOT NULL,
  `sewa_pengajuan` varchar(100) NOT NULL,
  `kepada_pengajuan` varchar(100) NOT NULL,
  `dari_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `tanggal_pengajuan`, `pesan_pengajuan`, `sewa_pengajuan`, `kepada_pengajuan`, `dari_pengajuan`) VALUES
(1, '2022-06-15', 'Saya akan ke tempat kos untuk melakukan negoisasi pada tanggal tersebut', '1', 'Muhammad Farrel Pradipta', 'Muhammad Farrel Pradipta'),
(2, '2022-06-16', 'Saya akan bayar ditempat ', '6', 'Muhammad Farrel Pradipta', 'Fulan'),
(3, '2022-06-16', 'Bayar ditempat', '4', 'Muhammad Farrel Pradipta', 'Fulan');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` int(100) NOT NULL,
  `nama_properti` varchar(1000) NOT NULL,
  `foto_properti` varchar(1000) NOT NULL,
  `lokasi_properti` varchar(1000) NOT NULL,
  `harga_properti` int(100) NOT NULL,
  `jenis_properti` varchar(100) NOT NULL,
  `milik_properti` text NOT NULL,
  `jumlah_pengunjung` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `foto_properti`, `lokasi_properti`, `harga_properti`, `jenis_properti`, `milik_properti`, `jumlah_pengunjung`) VALUES
(1, 'Kost Mevvah', 'kos.jpg', 'Purbalingga', 500000, 'Kost', 'Muhammad Farrel Pradipta', 16),
(3, 'Kontrakan GG Gaming', 'secretgaming.jpg', 'Purbalingga', 1000000, 'Kontrakan', 'Muhammad Farrel Pradipta', 9),
(4, 'Kost Eksklusif', 'download (1).jpg', 'Jogja', 1000000, 'Kost', 'Muhammad Farrel Pradipta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_transaksi` varchar(1000) NOT NULL,
  `nama_kos` varchar(1000) NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `tanggal_mulai_sewa` date NOT NULL,
  `tanggal_selesai_sewa` date NOT NULL,
  `jangka_waktu` int(100) NOT NULL,
  `biaya_transaksi` int(100) NOT NULL,
  `status_transaksi` int(5) NOT NULL,
  `pemilik_properti` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_transaksi`, `nama_kos`, `tanggal_pertemuan`, `tanggal_mulai_sewa`, `tanggal_selesai_sewa`, `jangka_waktu`, `biaya_transaksi`, `status_transaksi`, `pemilik_properti`) VALUES
(1, 'Muhammad Farrel Pradipta', 'Kost Mevvah', '2022-06-18', '2022-06-18', '2022-07-18', 1, 1000000, 1, 'Muhammad Farrel Pradipta'),
(2, 'Fulan', 'Kost Eksklusif', '2022-06-16', '2022-06-17', '2022-12-17', 6, 6000000, 2, 'Muhammad Farrel Pradipta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `pencari`
--
ALTER TABLE `pencari`
  ADD PRIMARY KEY (`id_pencari`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pencari`
--
ALTER TABLE `pencari`
  MODIFY `id_pencari` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
