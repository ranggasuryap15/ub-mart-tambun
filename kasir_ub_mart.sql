-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 11:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_ub_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_kasir` varchar(150) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `nama_kasir`, `no_hp`, `role`) VALUES
('admin', 'admin', 'Admin', '', 'admin'),
('rizqi354', 'rizqi354', 'Rizqi Dakwati Sholikhat', '082310499535', 'kasir'),
('shafara354', 'shafara354', 'Shafara Rusdiani Fatima', '083872712342', 'kasir'),
('tri354', 'tri354', 'Tri Kurniawati', '081289993543', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `harga_pokok`, `harga_jual`, `profit`, `stok`, `satuan`, `tanggal`) VALUES
('079567350118', 'WD-40 Contact Cleaner', 20000, 25000, 5000, 0, 'pcs', '2022-11-26'),
('8901234775', 'Cimory Botol', 9000, 10000, 1000, 0, 'pcs', '2022-11-05'),
('8901234776', 'Milo', 1800, 2000, 200, 9, 'pcs', '2022-11-05'),
('8901234778', 'Sanqua Gelas', 20000, 22000, 2000, 25, 'dus', '2022-11-05'),
('8901234779', 'Sanqua Botol', 40000, 43000, 3000, 20, 'dus', '2022-11-05'),
('8901234780', 'Beras', 8000, 8500, 500, 25, 'liter', '2022-11-05'),
('8992745326229', 'Stella Green Fantasy', 12000, 15000, 3000, 10, 'pcs', '2022-11-24'),
('8996001600269', 'Le Minerale Botol', 40000, 44000, 4000, 13, 'dus', '2022-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `nota` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id`, `kode_barang`, `kuantitas`, `sub_total`, `kasir`, `nota`) VALUES
(11, '8901234780', 5, 42500, 'shafara354', 'UB-221225-001'),
(12, '079567350118', 1, 25000, 'shafara354', 'UB-221225-001'),
(13, '8901234776', 10, 20000, 'shafara354', 'UB-221225-001'),
(14, '8996001600269', 6, 264000, 'shafara354', 'UB-221225-002'),
(15, '8901234776', 1, 2000, 'shafara354', 'UB-221225-003'),
(16, '8996001600269', 5, 220000, 'shafara354', 'UB-221225-003'),
(17, '8996001600269', 1, 44000, 'shafara354', 'UB-221226-001'),
(18, '079567350118', 40, 1000000, 'shafara354', 'UB-221226-001'),
(19, '8996001600269', 1, 44000, 'shafara354', 'UB-221226-002');

--
-- Triggers `laporan_penjualan`
--
DELIMITER $$
CREATE TRIGGER `stokKeluar` AFTER INSERT ON `laporan_penjualan` FOR EACH ROW BEGIN 
	UPDATE data_barang SET stok = stok - NEW.kuantitas
    WHERE kode_barang = NEW.kode_barang;

	DELETE FROM transaksi_struk_temp
    WHERE kasir=NEW.kasir;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nota_harian`
--

CREATE TABLE `nota_harian` (
  `nota` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(15) NOT NULL,
  `kembalian` int(15) NOT NULL,
  `kasir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_harian`
--

INSERT INTO `nota_harian` (`nota`, `tanggal`, `bayar`, `kembalian`, `kasir`) VALUES
('UB-221225-001', '2022-12-25', 90000, 2500, 'shafara354'),
('UB-221225-002', '2022-12-25', 270000, 6000, 'shafara354'),
('UB-221225-003', '2022-12-25', 230000, 8000, 'shafara354'),
('UB-221226-001', '2022-12-26', 1050000, 6000, 'shafara354'),
('UB-221226-002', '2022-12-26', 50000, 6000, 'shafara354');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_struk_temp`
--

CREATE TABLE `transaksi_struk_temp` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `kasir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_KodeBarang` (`kode_barang`),
  ADD KEY `FK_Nota` (`nota`),
  ADD KEY `FK_KasirPenualan` (`kasir`);

--
-- Indexes for table `nota_harian`
--
ALTER TABLE `nota_harian`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `FK_Kasir` (`kasir`);

--
-- Indexes for table `transaksi_struk_temp`
--
ALTER TABLE `transaksi_struk_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_kodeBarang` (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi_struk_temp`
--
ALTER TABLE `transaksi_struk_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD CONSTRAINT `FK_KasirPenualan` FOREIGN KEY (`kasir`) REFERENCES `akun` (`username`),
  ADD CONSTRAINT `FK_KodeBarang` FOREIGN KEY (`kode_barang`) REFERENCES `data_barang` (`kode_barang`),
  ADD CONSTRAINT `FK_Nota` FOREIGN KEY (`nota`) REFERENCES `nota_harian` (`nota`);

--
-- Constraints for table `nota_harian`
--
ALTER TABLE `nota_harian`
  ADD CONSTRAINT `FK_Kasir` FOREIGN KEY (`kasir`) REFERENCES `akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
