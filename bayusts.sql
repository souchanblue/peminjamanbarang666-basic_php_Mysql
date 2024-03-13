-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 05:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayusts`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `kategori`, `merk`, `jumlah`) VALUES
(23, 'ZW3D', 'Kamera', 'Elektronik', 'Nikon', 10),
(24, 'PD9C', 'Laptop', 'Elektronik', 'Lenovo', 30),
(25, 'SY7J', 'Kabel Terminal', 'Elektronik', 'Villager', 20),
(26, 'TW5Y', 'Bola', 'Olahraga', 'Atlas', 0),
(27, 'QI0H', 'Bola Voli', 'Olahraga', 'Eren', 10),
(28, 'ND4G', 'Bola Basket', 'Olahraga', 'Martin', 6),
(29, 'VI1F', 'Sapu', 'Omnivora Oportunistik', 'Capu', 10),
(30, 'GY3V', 'Cangkul', 'Parabot', 'TDR-3000', 4),
(31, 'BA3U', 'Pohon', 'Hewan', 'Cumulonimbus', 10);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` varchar(20) DEFAULT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `no_identitas`, `kode_barang`, `jumlah`, `keperluan`, `status`, `id_login`) VALUES
(9, '2024-03-12 00:00:00', '', '2228839918', 'KJ299', 10, '-', 'Belum', 1),
(11, '0000-00-00 00:00:00', '', '', '', 0, '', '', 6),
(13, '2024-03-13 00:00:00', '2024-03-14', '1231', 'dada', 1, 'makan', 'belum', 5),
(15, '2024-03-13 00:00:00', '2024-03-14', '1111', 'GY3V', 5, 'Mencangkul', 'Belum Dikembalikan', 5),
(16, '2024-03-15 00:00:00', '2024-03-16', '1234', 'TW5Y', 10, 'Main Bola', 'Otw', 2);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `ambil_stock` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah - NEW.jumlah WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembali_stock` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah + OLD.jumlah WHERE kode_barang = OLD.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_identitas`, `nama`, `status`, `username`, `password`, `role`) VALUES
(1, '1234567', 'M bayu firsaus', 'petugas', 'bayu', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin'),
(2, '1234', 'adi', 'murid', 'adi', '2e99bf4e42962410038bc6fa4ce40d97', 'member'),
(5, '1111', 'nana', 'murid\r\n', 'nana', '81dc9bdb52d04dc20036dbd8313ed055', 'member'),
(6, '222', 'sasa', 'petugas', 'sasa', 'f45731e3d39a1b2330bbf93e9b3de59e', 'admin'),
(7, '031107', 'Kazu', 'Pelajar', 'Ara', '636bfa0fb2716ff876f5e33854cc9648', 'member'),
(10, '9873', 'nina', 'pelajar', 'ninu', 'af465ebe364f4b50526eb5f59885d7aa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
