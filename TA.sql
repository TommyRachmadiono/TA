-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 07:57 AM
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
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 2, '2018-06-26'),
(2, 3, '2018-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `c_id` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE `conversation_reply` (
  `cr_id` int(11) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `fk_id_pengirim` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `fk_c_id` int(11) NOT NULL,
  `seen` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'New', 2, '2018-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, '10 IPA 1'),
(2, '10 IPA 2');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `isi` varchar(2000) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `postingan_idpostingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `isi`, `user_id`, `postingan_idpostingan`) VALUES
(1, 'HEHEHE', 3, 2),
(2, 'a', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `matpel_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id`, `nama_pelajaran`) VALUES
(2, 'Matematika'),
(3, 'Fisika'),
(4, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_has_week`
--

CREATE TABLE `matpel_has_week` (
  `matpel_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_has_week`
--

INSERT INTO `matpel_has_week` (`matpel_id`, `week_id`, `title`, `description`) VALUES
(2, 1, '', ''),
(2, 2, '', ''),
(2, 3, '', ''),
(2, 4, '', ''),
(2, 5, '', ''),
(2, 6, '', ''),
(2, 7, '', ''),
(2, 8, '', ''),
(2, 9, '', ''),
(2, 10, '', ''),
(2, 11, '', ''),
(2, 12, '', ''),
(2, 13, '', ''),
(2, 14, '', ''),
(3, 1, '', ''),
(3, 2, '', ''),
(3, 3, '', ''),
(3, 4, '', ''),
(3, 5, '', ''),
(3, 6, '', ''),
(3, 7, '', ''),
(3, 8, '', ''),
(3, 9, '', ''),
(3, 10, '', ''),
(3, 11, '', ''),
(3, 12, '', ''),
(3, 13, '', ''),
(3, 14, '', ''),
(4, 1, '', ''),
(4, 2, '', ''),
(4, 3, '', ''),
(4, 4, '', ''),
(4, 5, '', ''),
(4, 6, '', ''),
(4, 7, '', ''),
(4, 8, '', ''),
(4, 9, '', ''),
(4, 10, '', ''),
(4, 11, '', ''),
(4, 12, '', ''),
(4, 13, '', ''),
(4, 14, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `n_number` int(11) DEFAULT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `idpostingan` int(11) NOT NULL,
  `isi` varchar(1000) DEFAULT NULL,
  `tgldiposting` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `grup_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`idpostingan`, `isi`, `tgldiposting`, `user_id`, `grup_id`, `file`) VALUES
(2, 'hmm\r\nhmm', '2018-06-26', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_user_matpel`
--

CREATE TABLE `relasi_user_matpel` (
  `user_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relasi_user_matpel`
--

INSERT INTO `relasi_user_matpel` (`user_id`, `matpel_id`) VALUES
(2, 2),
(2, 3),
(2, 4),
(3, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `user_id` int(11) NOT NULL,
  `postingan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `namatugas` varchar(45) DEFAULT NULL,
  `matpel_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `namatugas`, `matpel_id`, `week_id`) VALUES
(1, 'TUGAS MTK', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('murid','guru','ortu','admin') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ortu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `foto`, `kelas_id`, `ortu_id`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'people1.png', NULL, NULL),
(2, 'Guru AAA', 'guru', '123456', 'guru', 'people7.png', NULL, NULL),
(3, 'Murid XYZ', 'murid', '123456', 'murid', 'people3.png', 1, 4),
(4, 'Ortu X', 'ortu', '123456', 'ortu', 'people8.png', NULL, NULL),
(5, 'Tommy R', 'tommyr', '123456', 'murid', 'people2.png', 1, NULL),
(6, 'coba', 'coba', '123456', 'murid', 'people8.png', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_tugas`
--

CREATE TABLE `user_has_tugas` (
  `user_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tgl_diupload` date DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_tugas`
--

INSERT INTO `user_has_tugas` (`user_id`, `tugas_id`, `file`, `tgl_diupload`, `nilai`) VALUES
(3, 1, '20180628104315Hydrangeas.jpg', '2018-06-28', 55),
(5, 1, '20180628104126Desert.jpg', '2018-06-28', 55),
(6, 1, '20180628113812Tulips.jpg', '2018-06-28', 80);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `nama`) VALUES
(1, 'WEEK 1'),
(2, 'WEEK 2'),
(3, 'WEEK 3'),
(4, 'WEEK 4'),
(5, 'WEEK 5'),
(6, 'WEEK 6'),
(7, 'WEEK 7'),
(8, 'WEEK 8'),
(9, 'WEEK 9'),
(10, 'WEEK 10'),
(11, 'WEEK 11'),
(12, 'WEEK 12'),
(13, 'WEEK 13'),
(14, 'WEEK 14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_achievement_user1_idx` (`user_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`user_id`,`grup_id`),
  ADD KEY `fk_grup_has_user_user1_idx` (`user_id`),
  ADD KEY `fk_grup_has_user_grup1_idx` (`grup_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`c_id`,`id_pengirim`,`id_penerima`),
  ADD KEY `fk_conversation_user1_idx` (`id_pengirim`),
  ADD KEY `fk_conversation_user2_idx` (`id_penerima`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`cr_id`,`fk_id_pengirim`,`fk_c_id`),
  ADD KEY `fk_conversation_reply_conversation1_idx` (`fk_c_id`),
  ADD KEY `fk_conversation_reply_user1_idx` (`fk_id_pengirim`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_user1_idx` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_user1_idx` (`user_id`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_grup_user1_idx` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`,`matpel_id`,`week_id`),
  ADD KEY `fk_materi_matpel1_idx` (`matpel_id`),
  ADD KEY `fk_materi_week1_idx` (`week_id`),
  ADD KEY `fk_materi_user1_idx` (`user_id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`,`c_id`,`id_penerima`),
  ADD KEY `fk_notification_conversation1_idx` (`c_id`),
  ADD KEY `fk_notification_user1_idx` (`id_penerima`);

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
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`user_id`,`postingan_id`),
  ADD KEY `fk_user_has_postingan_postingan2_idx` (`postingan_id`),
  ADD KEY `fk_user_has_postingan_user2_idx` (`user_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`,`matpel_id`,`week_id`),
  ADD KEY `fk_tugas_matpel1_idx` (`matpel_id`),
  ADD KEY `fk_tugas_week1_idx` (`week_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`),
  ADD KEY `fk_user_kelas1_idx` (`kelas_id`),
  ADD KEY `fk_user_user1_idx` (`ortu_id`);

--
-- Indexes for table `user_has_tugas`
--
ALTER TABLE `user_has_tugas`
  ADD PRIMARY KEY (`tugas_id`,`user_id`),
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
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `idpostingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `fk_achievement_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `fk_grup_has_user_grup1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grup_has_user_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `fk_conversation_user1` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conversation_user2` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD CONSTRAINT `fk_conversation_reply_conversation1` FOREIGN KEY (`fk_c_id`) REFERENCES `conversation` (`c_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conversation_reply_user1` FOREIGN KEY (`fk_id_pengirim`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `fk_grup_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_postingan1` FOREIGN KEY (`postingan_idpostingan`) REFERENCES `postingan` (`idpostingan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_user_has_postingan_postingan1` FOREIGN KEY (`post_id`) REFERENCES `postingan` (`idpostingan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_postingan_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_materi_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materi_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materi_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matpel_has_week`
--
ALTER TABLE `matpel_has_week`
  ADD CONSTRAINT `fk_matpel_has_week_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matpel_has_week_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_conversation1` FOREIGN KEY (`c_id`) REFERENCES `conversation` (`c_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_user1` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `fk_postingan_grup1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_postingan_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `relasi_user_matpel`
--
ALTER TABLE `relasi_user_matpel`
  ADD CONSTRAINT `fk_user_has_matpel_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_matpel_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_user_has_postingan_postingan2` FOREIGN KEY (`postingan_id`) REFERENCES `postingan` (`idpostingan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_postingan_user2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `fk_tugas_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tugas_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_kelas1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_user1` FOREIGN KEY (`ortu_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_tugas`
--
ALTER TABLE `user_has_tugas`
  ADD CONSTRAINT `fk_user_has_tugas_tugas1` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_tugas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
