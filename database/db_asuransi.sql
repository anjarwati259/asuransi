-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 05:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asuransi`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_customer`
--

CREATE TABLE `db_customer` (
  `id_customer` varchar(50) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_premi` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_klaim`
--

CREATE TABLE `tb_detail_klaim` (
  `id_detail_klaim` int(11) NOT NULL,
  `id_klaim` int(11) NOT NULL,
  `id_detail_produk` int(11) DEFAULT NULL,
  `jml_hari` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tgl_klaim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_produk`
--

CREATE TABLE `tb_detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_produk`
--

INSERT INTO `tb_detail_produk` (`id_detail_produk`, `id_kelas`, `id_produk`, `harga`, `status`) VALUES
(1, 1, 'RIKAM', 100000, 1),
(2, 2, 'RIKAM', 200000, 1),
(3, 3, 'RIKAM', 400000, 1),
(4, 4, 'RIKAM', 800000, 1),
(5, 1, 'RIKDU', 50000, 1),
(6, 2, 'RIKDU', 50000, 1),
(7, 3, 'RIKDU', 60000, 1),
(8, 4, 'RIKDU', 70000, 1),
(9, 1, 'RIKDS', 80000, 1),
(10, 2, 'RIKDS', 100000, 1),
(11, 3, 'RIKDS', 135000, 1),
(12, 4, 'RIKDS', 200000, 1),
(13, 1, 'RIICU', 150000, 1),
(14, 2, 'RIICU', 300000, 1),
(15, 3, 'RIICU', 600000, 1),
(16, 4, 'RIICU', 120000, 1),
(17, 1, 'RIPOK', 1000000, 0),
(18, 2, 'RIPOK', 2000000, 0),
(19, 3, 'RIPOK', 4000000, 0),
(20, 4, 'RIPOK', 8000000, 0),
(21, 1, 'RIPOB', 3000000, 0),
(22, 2, 'RIPOB', 6000000, 0),
(23, 3, 'RIPOB', 12000000, 0),
(24, 4, 'RIPOB', 24000000, 0),
(25, 1, 'RIANK', 1000000, 2),
(26, 2, 'RIANK', 2000000, 2),
(27, 3, 'RIANK', 4000000, 2),
(28, 4, 'RIANK', 8000000, 2),
(29, 1, 'RIAMB', 50000, 0),
(30, 2, 'RIAMB', 60000, 0),
(31, 3, 'RIAMB', 70000, 0),
(32, 4, 'RIAMB', 80000, 0),
(33, 1, 'RILAB', 1000000, 2),
(34, 2, 'RILAB', 2000000, 2),
(35, 3, 'RILAB', 4000000, 2),
(36, 4, 'RILAB', 8000000, 2),
(37, 1, 'RIOBT', 3000000, 2),
(38, 2, 'RIOBT', 6000000, 2),
(39, 3, 'RIOBT', 12000000, 2),
(40, 4, 'RIOBT', 24000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'PM-100'),
(2, 'PM-200'),
(3, 'PM-400'),
(4, 'PM-800');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klaim`
--

CREATE TABLE `tb_klaim` (
  `id_klaim` int(11) NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `total_ditanggung` int(11) NOT NULL,
  `bayar_sendiri` int(11) NOT NULL,
  `tgl_klaim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_premi`
--

CREATE TABLE `tb_premi` (
  `id_premi` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_premi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_premi`
--

INSERT INTO `tb_premi` (`id_premi`, `id_kelas`, `nama_premi`, `harga`) VALUES
(1, 1, 'Premi - Pria', 750000),
(2, 2, 'Premi - Pria', 1250000),
(3, 3, 'Premi - Pria', 1750000),
(4, 4, 'Premi - Pria', 2450000),
(5, 1, 'Premi - Wanita', 850000),
(6, 2, 'Premi - Wanita', 1350000),
(7, 3, 'Premi - Wanita', 2000000),
(8, 4, 'Premi - Wanita', 2700000),
(9, 1, 'Premi - Anak dibawah 12 tahun', 825000),
(10, 2, 'Premi - Anak dibawah 12 tahun', 1300000),
(11, 3, 'Premi - Anak dibawah 12 tahun', 1800000),
(12, 4, 'Premi - Anak dibawah 12 tahun', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`) VALUES
('RIAMB', 'Ambulance, per-kejadian'),
('RIANK', 'Aneka perawatan rumah sakit, per-tahun'),
('RIICU', 'ICU/NICCU per-hari, maksimal 90 hari'),
('RIKAM', 'Biaya kamar per-hari, maksimal 90 hari'),
('RIKDS', 'Kunjungan dokter spesialis per-hari'),
('RIKDU', 'Kunjungan dokter umum per-hari'),
('RILAB', 'Test diagnostik, laboratorium, per-tahun'),
('RIOBT', 'Obat-obatan, per-tahun'),
('RIPOB', 'Pembedahan operasi besar, per-operasi'),
('RIPOK', 'Pembedahan operasi kecil, per-operasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_customer`
--
ALTER TABLE `db_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_detail_klaim`
--
ALTER TABLE `tb_detail_klaim`
  ADD PRIMARY KEY (`id_detail_klaim`),
  ADD KEY `id_klaim` (`id_klaim`),
  ADD KEY `id_detail_produk` (`id_detail_produk`);

--
-- Indexes for table `tb_detail_produk`
--
ALTER TABLE `tb_detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `tb_detail_produk_ibfk_2` (`id_produk`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_klaim`
--
ALTER TABLE `tb_klaim`
  ADD PRIMARY KEY (`id_klaim`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tb_premi`
--
ALTER TABLE `tb_premi`
  ADD PRIMARY KEY (`id_premi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_klaim`
--
ALTER TABLE `tb_detail_klaim`
  MODIFY `id_detail_klaim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_produk`
--
ALTER TABLE `tb_detail_produk`
  MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_klaim`
--
ALTER TABLE `tb_klaim`
  MODIFY `id_klaim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_premi`
--
ALTER TABLE `tb_premi`
  MODIFY `id_premi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_customer`
--
ALTER TABLE `db_customer`
  ADD CONSTRAINT `db_customer_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tb_detail_klaim`
--
ALTER TABLE `tb_detail_klaim`
  ADD CONSTRAINT `tb_detail_klaim_ibfk_1` FOREIGN KEY (`id_klaim`) REFERENCES `tb_klaim` (`id_klaim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_klaim_ibfk_2` FOREIGN KEY (`id_detail_produk`) REFERENCES `tb_detail_produk` (`id_detail_produk`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tb_detail_produk`
--
ALTER TABLE `tb_detail_produk`
  ADD CONSTRAINT `tb_detail_produk_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_klaim`
--
ALTER TABLE `tb_klaim`
  ADD CONSTRAINT `tb_klaim_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `db_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_premi`
--
ALTER TABLE `tb_premi`
  ADD CONSTRAINT `tb_premi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
