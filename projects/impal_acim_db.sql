-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2017 at 01:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impal_acim_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok_barang` int(11) NOT NULL DEFAULT '0',
  `harga_barang` double NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `id_supplier` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_barang`, `harga_barang`, `tgl_kadaluarsa`, `id_supplier`) VALUES
('111', 'Sabun Colek', 0, 3200, '2017-11-06', 3),
('112', 'Kondom Vortex', 30, 21312, '2017-11-18', 2),
('113', 'Sabun Muka', 24, 14750, '2017-11-07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `email`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `jabatan`, `password`) VALUES
('101', 'charly@gmail.com', 'Charly Haholongan', 'P', '08577232321', 'Cikarang Timur', 'ADMIN', 'f99aecef3d12e02dcbb6260bbdd35189c89e6e73'),
('102', 'kukuhganteng@gmail.com', 'Kukuh Sulistyo', 'L', '08577771210', 'Cikarang Timur', 'KASIR', 'f99aecef3d12e02dcbb6260bbdd35189c89e6e73');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(12) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tgl_penjualan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_karyawan`, `tgl_penjualan`) VALUES
(17, '102', '2017-11-12 18:56:45'),
(18, '102', '2017-11-15 20:02:44'),
(19, '102', '2017-11-15 20:12:25'),
(20, '102', '2017-11-16 10:20:27'),
(21, '102', '2017-11-16 17:32:00'),
(22, '102', '2017-11-16 17:48:52'),
(23, '102', '2017-11-16 17:50:04'),
(24, '102', '2017-11-16 17:51:34'),
(25, '102', '2017-11-16 18:27:05'),
(26, '102', '2017-11-16 18:27:49'),
(27, '102', '2017-11-16 18:32:44'),
(28, '102', '2017-11-16 18:33:32'),
(29, '102', '2017-11-16 18:41:53'),
(30, '102', '2017-11-16 18:51:29'),
(31, '102', '2017-11-16 18:53:48'),
(32, '102', '2017-11-16 18:54:19'),
(33, '102', '2017-11-16 18:56:59'),
(34, '102', '2017-11-16 18:57:50'),
(35, '102', '2017-11-16 19:03:05'),
(36, '102', '2017-11-16 19:14:18'),
(37, '102', '2017-11-16 19:19:46'),
(38, '102', '2017-11-16 19:20:30'),
(39, '102', '2017-11-16 19:22:42'),
(40, '102', '2017-11-16 19:23:29'),
(41, '102', '2017-11-16 19:25:03'),
(42, '102', '2017-11-16 19:25:16'),
(43, '102', '2017-11-16 19:25:34'),
(44, '102', '2017-11-16 19:26:15'),
(45, '102', '2017-11-16 19:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(12) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `id_penjualan`, `id_barang`, `jumlah`) VALUES
(8, 17, '111', 3),
(9, 17, '123', 2),
(10, 18, '111', 5),
(11, 19, '101', 1),
(12, 20, '123', 2),
(13, 21, '123', 1),
(14, 22, '111', 3),
(15, 23, '111', 1),
(16, 24, '111', 1),
(17, 25, '113', 2),
(18, 26, '112', 1),
(19, 27, '112', 2),
(20, 28, '112', 3),
(21, 29, '112', 2),
(22, 30, '112', 2),
(23, 31, '112', 1),
(24, 32, '113', 1),
(25, 33, '113', 1),
(26, 34, '113', 1),
(27, 35, '113', 1),
(28, 36, '113', 2),
(29, 37, '113', 1),
(30, 38, '113', 1),
(31, 39, '113', 1),
(32, 40, '113', 1),
(33, 41, '113', 1),
(34, 42, '113', 1),
(35, 43, '113', 1),
(36, 44, '113', 1),
(37, 45, '113', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
(1, 'COBA', 'asdfasd', '132312312'),
(2, 'CV Multiguna', 'Bandungan', '123123123123'),
(3, 'CV Agung Abadi', 'Jl. Hj. Umayah 1, Citereup, Bandung, Jawa Barat', '082119874517');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;