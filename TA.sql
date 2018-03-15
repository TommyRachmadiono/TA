-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 07:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `grup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`grup_id`, `user_id`, `tgl_join`) VALUES
(17, 1, '2018-03-06'),
(17, 2, '2018-03-10'),
(17, 3, '2018-03-24'),
(18, 1, '2018-03-08'),
(19, 2, '2018-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id` int(11) NOT NULL,
  `topik_grup` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id`, `topik_grup`, `user_id`, `tgl_dibuat`) VALUES
(17, 'coba lagi', 1, '2018-03-06'),
(18, 'TES NEW GROUP', 1, '2018-03-08'),
(19, 'ZXC', 2, '2018-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `isi` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `postingan_idpostingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`user_id`, `post_id`) VALUES
(1, 17),
(2, 17),
(2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `file` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materi_has_week`
--

CREATE TABLE `materi_has_week` (
  `materi_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matpel_has_week`
--

CREATE TABLE `matpel_has_week` (
  `matpel_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `idpostingan` int(11) NOT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `tgldiposting` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `grup_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`idpostingan`, `isi`, `tgldiposting`, `user_id`, `grup_id`) VALUES
(17, 'COBA\r\nASD\r\nASD\r\nASD\r\nASD\r\n', '2018-03-06', 1, NULL),
(18, 'coba', '2018-03-06', 1, 17),
(19, 'sad', '2018-03-13', 1, NULL),
(20, 'asdf', '2018-03-13', 1, NULL),
(21, 'asdfdsafds', '2018-03-13', 1, NULL),
(22, 'dskafkdsf', '2018-03-13', 1, NULL),
(23, 'casocosckoewocd', '2018-03-13', 1, NULL),
(24, 'cboaboaboaob', '2018-03-13', 1, NULL),
(25, 'aksoemosmdosamofsa', '2018-03-13', 1, NULL),
(26, 'laskfkoigmremvoa', '2018-03-13', 1, NULL),
(27, 'sdsafcxacasds\r\nadasdsa', '2018-03-14', 1, 17),
(28, 'posting', '2018-03-14', 1, 17),
(29, '[psting 2', '2018-03-14', 1, 17),
(30, '6', '2018-03-14', 1, 17),
(31, '7', '2018-03-14', 1, 17),
(32, '8', '2018-03-14', 1, 17),
(33, '9', '2018-03-14', 1, 17),
(34, '10', '2018-03-14', 1, 17),
(35, '11', '2018-03-14', 1, 17),
(36, '12', '2018-03-14', 1, 17),
(37, '13', '2018-03-14', 1, 17),
(38, '14\r\n', '2018-03-14', 1, 17),
(39, '15', '2018-03-14', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_user_matpel`
--

CREATE TABLE `relasi_user_matpel` (
  `user_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `namatugas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_has_week`
--

CREATE TABLE `tugas_has_week` (
  `tugas_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `jurusan` enum('IPA','IPS','BAHASA') DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `jurusan`, `foto`) VALUES
(1, 'Tommy Rachmadiono', 'tommyr', '123456', 'murid', 'IPA', 'fotoprofil.jpg'),
(2, 'Guru ABC', 'guru', '123456', 'guru', '', 'fotoprofil.png'),
(3, 'Murid XYZ', 'murid', '123456', 'murid', 'IPS', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_tugas`
--

CREATE TABLE `user_has_tugas` (
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `file` varchar(45) DEFAULT NULL,
  `tgl_diupload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`grup_id`,`user_id`),
  ADD KEY `fk_grup_has_user_user1_idx` (`user_id`),
  ADD KEY `fk_grup_has_user_grup1_idx` (`grup_id`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_grup_user1_idx` (`user_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`,`user_id`,`postingan_idpostingan`),
  ADD KEY `fk_komentar_user1_idx` (`user_id`),
  ADD KEY `fk_komentar_postingan1_idx` (`postingan_idpostingan`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `fk_user_has_postingan_postingan1_idx` (`post_id`),
  ADD KEY `fk_user_has_postingan_user1_idx` (`user_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_has_week`
--
ALTER TABLE `materi_has_week`
  ADD PRIMARY KEY (`materi_id`,`week_id`),
  ADD KEY `fk_materi_has_week_week1_idx` (`week_id`),
  ADD KEY `fk_materi_has_week_materi1_idx` (`materi_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matpel_has_week`
--
ALTER TABLE `matpel_has_week`
  ADD PRIMARY KEY (`matpel_id`,`week_id`),
  ADD KEY `fk_matpel_has_week_week1_idx` (`week_id`),
  ADD KEY `fk_matpel_has_week_matpel1_idx` (`matpel_id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`idpostingan`,`user_id`),
  ADD KEY `fk_postingan_user1_idx` (`user_id`),
  ADD KEY `fk_postingan_grup1_idx` (`grup_id`);

--
-- Indexes for table `relasi_user_matpel`
--
ALTER TABLE `relasi_user_matpel`
  ADD PRIMARY KEY (`user_id`,`matpel_id`),
  ADD KEY `fk_user_has_matpel_matpel1_idx` (`matpel_id`),
  ADD KEY `fk_user_has_matpel_user_idx` (`user_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_has_week`
--
ALTER TABLE `tugas_has_week`
  ADD PRIMARY KEY (`tugas_id`,`week_id`),
  ADD KEY `fk_tugas_has_week_week1_idx` (`week_id`),
  ADD KEY `fk_tugas_has_week_tugas1_idx` (`tugas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_tugas`
--
ALTER TABLE `user_has_tugas`
  ADD PRIMARY KEY (`user_id`,`tugas_id`),
  ADD KEY `fk_user_has_tugas_tugas1_idx` (`tugas_id`),
  ADD KEY `fk_user_has_tugas_user1_idx` (`user_id`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `grup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `idpostingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `fk_grup_has_user_grup1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grup_has_user_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `fk_grup_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_postingan1` FOREIGN KEY (`postingan_idpostingan`) REFERENCES `postingan` (`idpostingan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_user_has_postingan_postingan1` FOREIGN KEY (`post_id`) REFERENCES `postingan` (`idpostingan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_postingan_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materi_has_week`
--
ALTER TABLE `materi_has_week`
  ADD CONSTRAINT `fk_materi_has_week_materi1` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materi_has_week_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matpel_has_week`
--
ALTER TABLE `matpel_has_week`
  ADD CONSTRAINT `fk_matpel_has_week_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matpel_has_week_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `fk_postingan_grup1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_postingan_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relasi_user_matpel`
--
ALTER TABLE `relasi_user_matpel`
  ADD CONSTRAINT `fk_user_has_matpel_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_matpel_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tugas_has_week`
--
ALTER TABLE `tugas_has_week`
  ADD CONSTRAINT `fk_tugas_has_week_tugas1` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tugas_has_week_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_tugas`
--
ALTER TABLE `user_has_tugas`
  ADD CONSTRAINT `fk_user_has_tugas_tugas1` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_tugas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
