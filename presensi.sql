-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 12:52 PM
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
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `no` int(11) NOT NULL,
  `nip` char(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_hp` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(25) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'user.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no`, `nip`, `nama`, `tgl_lahir`, `jabatan`, `alamat`, `kota`, `no_hp`, `email`, `foto`) VALUES
(16, '11111111123', 'Yant0', '2023-03-10', 'guru', 'ada', 'Pekalongan', 8928365476253, 'yanti@gmail.com', 'bagus.jpg'),
(4, '11111111113', 'Yanti', '2023-03-10', 'guru', 'Kauman', 'Pekalongan', 8928365476253, 'yanti@gmail.com', 'user.jpg'),
(6, '11111111115', 'Guru5', '1993-02-19', 'Guru', 'asdasda', 'asdasf', 085875282178, 'guru@gmail.com', 'user.jpg'),
(7, '11111111116', 'Guru6', '1993-02-19', 'Guru', '1qwasdas', 'Pekalongan', 085875282178, 'guru2@gmail.com', 'user.jpg'),
(8, '11111111117', 'Guru7', '1993-02-19', 'Guru', 'asdasd', 'Pekalongan', 085875282178, 'guru@gmail.com', 'user.jpg'),
(10, '11111111119', 'Yanti', '2023-03-10', 'guru', 'asdasd', 'Pekalongan', 8928365476253, 'yanti@gmail.com', 'user.jpg'),
(14, '11111111122', 'Mumtaza', '2023-03-10', 'guru', 'asdhagsdh', 'Pekalongan', 8928365476253, 'mmtzatzyy@gmail.com', 'Mumtaza.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `no` int(11) NOT NULL,
  `nip` char(11) NOT NULL,
  `kehadiran` varchar(1) NOT NULL DEFAULT 'A',
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`no`, `nip`, `kehadiran`, `jam`, `tanggal`, `keterangan`) VALUES
(14, '11111111113', 'A', '13:12:00', '2023-02-21', 'Belum Hadir'),
(19, '11111111114', 'H', '11:51:57', '2023-03-16', 'Telat Sebentar'),
(15, '11111111112', 'H', '21:18:35', '2023-03-15', 'Tepat Waktu'),
(16, '11111111113', 'H', '21:18:35', '2023-03-15', 'Telat Sebentar'),
(17, '11111111112', 'H', '11:41:15', '2023-03-16', 'Tepat Waktu'),
(18, '11111111113', 'H', '11:45:50', '2023-03-16', 'Tepat Waktu'),
(20, '11111111115', 'S', '11:56:24', '2023-03-16', 'Sakit'),
(21, '11111111116', 'I', '11:57:22', '2023-03-16', 'Ijin'),
(23, '11111111117', 'A', '13:09:30', '2023-03-16', 'Tidak Hadir'),
(24, '11111111112', 'H', '12:56:39', '2023-03-17', 'Tepat Waktu'),
(25, '11111111114', 'H', '12:56:44', '2023-03-17', 'Telat Lama'),
(26, '11111111113', 'S', '12:56:56', '2023-03-17', 'Sakit'),
(27, '11111111116', 'H', '12:57:11', '2023-03-17', 'Telat Lama'),
(28, '11111111117', 'H', '12:58:29', '2023-03-17', 'Telat Lama'),
(29, '11111111115', 'H', '14:07:08', '2023-03-17', 'Tepat Waktu'),
(30, '11111111118', 'H', '17:18:27', '2023-03-17', 'Telat Lama'),
(31, '11111111119', 'H', '17:18:27', '2023-03-17', 'Tepat Waktu'),
(32, '11111111121', 'H', '17:18:27', '2023-03-17', 'Tepat Waktu'),
(39, '11111111118', 'B', '23:48:46', '2023-03-16', 'Belum Hadir'),
(37, '11111111122', 'H', '23:41:31', '2023-03-17', 'Tepat Waktu'),
(40, '11111111119', 'B', '23:48:46', '2023-03-16', 'Belum Hadir'),
(57, '11111111112', 'B', '18:37:26', '2023-03-18', 'Belum Hadir'),
(58, '11111111113', 'B', '18:37:26', '2023-03-18', 'Belum Hadir'),
(59, '11111111115', 'B', '18:37:26', '2023-03-18', 'Belum Hadir'),
(60, '11111111123', 'H', '19:01:59', '2023-03-18', 'Telat Lama'),
(48, '11111111119', 'H', '10:02:18', '2023-03-18', 'Telat Lama'),
(49, '11111111118', 'H', '10:02:52', '2023-03-18', 'Telat Lama'),
(50, '11111111121', 'H', '10:04:34', '2023-03-18', 'Telat Lama'),
(51, '11111111122', 'S', '10:05:19', '2023-03-18', 'Sakit'),
(53, '11111111116', 'H', '10:15:00', '2023-03-18', 'Telat Lama'),
(54, '11111111117', 'H', '10:17:27', '2023-03-18', ''),
(61, '11111111112', 'H', '13:38:44', '2023-03-24', 'Tepat Waktu'),
(62, '11111111123', 'H', '13:38:48', '2023-03-24', 'Tepat Waktu'),
(63, '11111111113', 'H', '13:38:52', '2023-03-24', 'Tepat Waktu'),
(64, '11111111118', 'H', '13:38:55', '2023-03-24', 'Tepat Waktu'),
(65, '11111111122', 'H', '13:38:58', '2023-03-24', 'Tepat Waktu'),
(66, '11111111117', 'I', '13:40:56', '2023-03-24', 'Ijin'),
(67, '11111111119', 'A', '13:43:10', '2023-03-24', 'Tidak Hadir'),
(68, '11111111115', 'S', '16:51:38', '2023-03-24', 'Sakit'),
(69, '11111111116', 'H', '16:51:38', '2023-03-24', 'Telat Lama'),
(70, '11111111121', 'B', '16:51:38', '2023-03-24', 'Belum Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `no` int(2) NOT NULL,
  `jam_presensi` int(2) UNSIGNED ZEROFILL NOT NULL,
  `menit_presensi` int(2) UNSIGNED ZEROFILL NOT NULL,
  `telat_jam_presensi` int(2) UNSIGNED ZEROFILL NOT NULL,
  `telat_menit_presensi` int(2) UNSIGNED ZEROFILL NOT NULL,
  `denda_alpha` bigint(11) NOT NULL,
  `denda_telat_sebentar` bigint(11) NOT NULL,
  `denda_telat_lama` bigint(11) NOT NULL,
  `jam_batas_presensi` int(2) UNSIGNED ZEROFILL NOT NULL,
  `menit_batas_presensi` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`no`, `jam_presensi`, `menit_presensi`, `telat_jam_presensi`, `telat_menit_presensi`, `denda_alpha`, `denda_telat_sebentar`, `denda_telat_lama`, `jam_batas_presensi`, `menit_batas_presensi`) VALUES
(1, 14, 00, 14, 05, 2000, 3000, 5000, 14, 00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `nama_lengkap`, `username`, `password`, `jabatan`) VALUES
(1, 'Administrator', 'admin', '6624eadab3ab74acc9aaf651c2f9430e', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
