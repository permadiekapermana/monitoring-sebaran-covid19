-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 08:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoringcovid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `jk`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(11) NOT NULL,
  `id_jk` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `usia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_jk`, `id_status`, `tgl_input`, `usia`) VALUES
('NO_0001', 1, 5, '2020-03-01', 43),
('NO_0002', 2, 5, '2020-03-01', 44),
('NO_0003', 1, 5, '2020-03-01', 34),
('NO_0004', 2, 5, '2020-03-01', 55),
('NO_0005', 1, 5, '2020-03-01', 34),
('NO_0006', 1, 5, '2020-03-02', 25),
('NO_0007', 2, 3, '2020-03-02', 44),
('NO_0008', 1, 3, '2020-03-02', 23),
('NO_0009', 1, 3, '2020-03-02', 56),
('NO_0010', 2, 2, '2020-03-03', 44),
('NO_0011', 2, 2, '2020-03-03', 67),
('NO_0012', 1, 3, '2020-03-03', 26),
('NO_0013', 1, 3, '2020-03-03', 51),
('NO_0014', 1, 1, '2020-03-03', 68),
('NO_0015', 1, 5, '2020-03-04', 36),
('NO_0016', 2, 5, '2020-03-04', 67),
('NO_0017', 1, 3, '2020-03-04', 55),
('NO_0018', 1, 3, '2020-03-04', 67),
('NO_0019', 1, 3, '2020-03-04', 44),
('NO_0020', 1, 3, '2020-03-04', 74),
('NO_0021', 1, 5, '2020-03-05', 32),
('NO_0022', 1, 5, '2020-03-05', 64),
('NO_0023', 1, 5, '2020-03-05', 23),
('NO_0024', 1, 5, '2020-03-05', 44),
('NO_0025', 1, 2, '2020-03-05', 66),
('NO_0026', 1, 3, '2020-03-05', 41),
('NO_0027', 1, 5, '2020-03-06', 49),
('NO_0028', 1, 5, '2020-03-06', 33),
('NO_0029', 1, 2, '2020-03-06', 11),
('NO_0030', 1, 3, '2020-12-01', 17),
('NO_0031', 1, 5, '2020-03-07', 10),
('NO_0032', 2, 2, '2020-03-07', 33),
('NO_0033', 1, 3, '2020-03-07', 55),
('NO_0034', 1, 5, '2020-03-08', 11),
('NO_0035', 2, 5, '2020-03-08', 6),
('NO_0036', 1, 3, '2020-03-08', 60),
('NO_0037', 1, 5, '2020-03-09', 22),
('NO_0038', 1, 5, '2020-03-09', 11),
('NO_0039', 2, 1, '2020-03-09', 57),
('NO_0040', 1, 1, '2020-03-09', 45),
('NO_0041', 1, 5, '2020-03-10', 44),
('NO_0042', 1, 5, '2020-03-10', 30),
('NO_0043', 1, 1, '2020-03-10', 62),
('NO_0044', 1, 1, '2020-03-10', 20);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Meninggal'),
(2, 'Dirawat'),
(3, 'Sembuh'),
(5, 'Positif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'permadi', 'f86e328f5bcd47f653da719fc79cabb187f7968e', 'Permadi Eka Permana', 'Superadmin'),
(2, 'yuda', '6810cc7868124b693e068ab19eacbe9ac6c4c3f0', 'Yuda Permana', 'Superadmin'),
(3, 'selly', '9be6dc90c71c1d8b94d3a8d5308398bcf67c9504', 'Selly Amaliatama', 'Superadmin'),
(4, 'endah', '80dec167468c479b9c9dccb9980f4aef07ecf30a', 'Endah Febiana Gunawan', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `jenis_kelamin` (`id_jk`),
  ADD KEY `status` (`id_status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`id_jk`) REFERENCES `jenis_kelamin` (`id_jk`),
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
