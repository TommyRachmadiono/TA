-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 03:23 PM
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
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `title`, `description`, `file`, `user_id`) VALUES
(1, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a1.jpg', 1),
(2, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a2.jpg', 1),
(3, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a3.jpg', 1),
(4, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a4.jpg', 1),
(5, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a5.jpg', 1),
(6, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a6.jpg', 1),
(7, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a7.jpg', 1),
(8, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a8.jpg', 1),
(9, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a9.jpg', 1),
(10, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 'a10.jpg', 1);

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
(2, 1, '2018-11-08'),
(1, 2, '2018-11-07'),
(2, 2, '2018-11-08'),
(1, 3, '2018-11-07'),
(1, 4, '2018-11-07'),
(1, 5, '2018-11-07'),
(1, 6, '2018-11-07'),
(1, 7, '2018-11-07'),
(1, 8, '2018-11-07'),
(1, 9, '2018-11-07'),
(1, 10, '2018-11-07'),
(1, 11, '2018-11-07'),
(1, 12, '2018-11-07'),
(1, 13, '2018-11-07');

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

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`c_id`, `id_pengirim`, `id_penerima`, `time`) VALUES
(1, 16, 17, '2018-11-08 11:08:32'),
(2, 2, 1, '2018-11-19 12:02:28');

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

--
-- Dumping data for table `conversation_reply`
--

INSERT INTO `conversation_reply` (`cr_id`, `reply`, `fk_id_pengirim`, `time`, `fk_c_id`, `seen`) VALUES
(1, 'Putra/i anda mendapatkan nilai 00000 dari tugas <b>Tugas MTK 10</b> pada pelajaran <b>Matematika</b>.', 16, '2018-11-08 11:08:32', 1, 0),
(2, 'Putra/i anda mendapatkan nilai 100 dari tugas <b>Tugas MTK 10</b> pada pelajaran <b>Matematika</b>.', 16, '2018-11-08 11:08:51', 1, 0),
(3, 'Putra/i anda mendapatkan nilai 0 dari tugas <b>Tugas MTK 10</b> pada pelajaran <b>Matematika</b>.', 16, '2018-11-08 11:12:34', 1, 0),
(4, 'Halo admin', 2, '2018-11-19 12:02:28', 2, 0);

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `user_id`) VALUES
(1, 'asd', 'asd', '2018-10-25', '2018-10-25', '2018-10-25', 1),
(2, 'HORE', 'LOL', '2018-11-08', '2018-11-08', '2018-11-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `file`, `user_id`) VALUES
(1, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's1.jpg', 1),
(2, 'Lorem ', 'Lorem Ipsum Dolor Sit Amet', 's2.jpg', 1),
(4, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's4.jpg', 1),
(5, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's5.jpg', 1),
(6, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's6.jpg', 1),
(7, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's7.jpg', 1),
(8, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's8.jpg', 1),
(9, 'Lorem', 'Lorem Ipsum Dolor Sit Amet', 's9.jpg', 1),
(11, 'Coba Gambar', 'By Admin', 's3.jpg', 1);

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
(1, 'Grup Murid', 2, '2018-11-07'),
(2, 'YOLO', 1, '2018-11-08');

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
(2, '10 IPA 2'),
(3, '10 IPS 1'),
(4, '10 IPS 2'),
(5, '11 IPA 1'),
(6, '11 IPA 2'),
(7, '11 IPS 1'),
(8, '11 IPS 2'),
(9, '12 IPA 1'),
(10, '12 IPA 2'),
(11, '12 IPS 1'),
(12, '12 IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `isi` varchar(2000) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `postingan_idpostingan` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `isi`, `user_id`, `postingan_idpostingan`, `file`) VALUES
(1, 'asd', 14, 11, NULL),
(2, 'komentar pake file', 2, 10, '20181107171041Curriculum Vitae Alvin.docx'),
(3, 'komen pake gambar', 2, 10, '20181107171101A.jpg'),
(4, 'hari gini masih mikir?', 2, 23, NULL),
(5, 'mikirlah sebelum mikir itu di larang nak', 16, 23, NULL),
(6, 'foto jellyfish', 15, 22, '20181118081335Jellyfish.jpg');

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
(2, 23),
(3, 10),
(15, 22),
(16, 23);

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

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `file`, `matpel_id`, `week_id`, `user_id`) VALUES
(1, '201810190912412017-09-26.like-and-unlike-system-using-php-and-mysql-database.zip', 25, 1, 14),
(2, '20181118173522Document Flow Diagram.pdf', 10, 1, 15),
(3, '20181118173532week 1.pptx', 10, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(45) NOT NULL,
  `jenjang_id` enum('10','11','12') NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id`, `nama_pelajaran`, `jenjang_id`, `jurusan`) VALUES
(9, 'Matematika', '10', 'IPA'),
(10, 'Fisika', '10', 'IPA'),
(11, 'Biologi', '11', 'IPA'),
(12, 'Kimia', '11', 'IPA'),
(17, 'Matematika', '11', 'IPA'),
(18, 'Matematika', '12', 'IPA'),
(19, 'Fisika', '11', 'IPA'),
(20, 'Fisika', '12', 'IPA'),
(21, 'Biologi', '10', 'IPA'),
(22, 'Kimia', '10', 'IPA'),
(23, 'Biologi', '12', 'IPA'),
(24, 'Kimia', '12', 'IPA'),
(25, 'Sejarah', '10', 'IPS'),
(26, 'Sejarah', '11', 'IPS'),
(27, 'Sejarah', '12', 'IPS'),
(28, 'Geografi', '10', 'IPS'),
(29, 'Geografi', '11', 'IPS'),
(30, 'Geografi', '12', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_has_week`
--

CREATE TABLE `matpel_has_week` (
  `matpel_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_has_week`
--

INSERT INTO `matpel_has_week` (`matpel_id`, `week_id`, `title`, `description`) VALUES
(9, 1, '', ''),
(9, 2, '', ''),
(9, 3, '', ''),
(9, 4, '', ''),
(9, 5, '', ''),
(9, 6, '', ''),
(9, 7, '', ''),
(9, 8, '', ''),
(9, 9, '', ''),
(9, 10, '', ''),
(9, 11, '', ''),
(9, 12, '', ''),
(9, 13, '', ''),
(9, 14, '', ''),
(10, 1, 'Pertemuan Pertama', 'Kumpulkan tugas sesuai dengan kelas masing-masing'),
(10, 2, 'Pengenalan Materi', ''),
(10, 3, '', ''),
(10, 4, '', ''),
(10, 5, '', ''),
(10, 6, '', ''),
(10, 7, '', ''),
(10, 8, '', ''),
(10, 9, '', ''),
(10, 10, '', ''),
(10, 11, '', ''),
(10, 12, '', ''),
(10, 13, '', ''),
(10, 14, '', ''),
(11, 1, '', ''),
(11, 2, '', ''),
(11, 3, '', ''),
(11, 4, '', ''),
(11, 5, '', ''),
(11, 6, '', ''),
(11, 7, '', ''),
(11, 8, '', ''),
(11, 9, '', ''),
(11, 10, '', ''),
(11, 11, '', ''),
(11, 12, '', ''),
(11, 13, '', ''),
(11, 14, '', ''),
(12, 1, '', ''),
(12, 2, '', ''),
(12, 3, '', ''),
(12, 4, '', ''),
(12, 5, '', ''),
(12, 6, '', ''),
(12, 7, '', ''),
(12, 8, '', ''),
(12, 9, '', ''),
(12, 10, '', ''),
(12, 11, '', ''),
(12, 12, '', ''),
(12, 13, '', ''),
(12, 14, '', ''),
(17, 1, '', ''),
(17, 2, '', ''),
(17, 3, '', ''),
(17, 4, '', ''),
(17, 5, '', ''),
(17, 6, '', ''),
(17, 7, '', ''),
(17, 8, '', ''),
(17, 9, '', ''),
(17, 10, '', ''),
(17, 11, '', ''),
(17, 12, '', ''),
(17, 13, '', ''),
(17, 14, '', ''),
(18, 1, '', ''),
(18, 2, '', ''),
(18, 3, '', ''),
(18, 4, '', ''),
(18, 5, '', ''),
(18, 6, '', ''),
(18, 7, '', ''),
(18, 8, '', ''),
(18, 9, '', ''),
(18, 10, '', ''),
(18, 11, '', ''),
(18, 12, '', ''),
(18, 13, '', ''),
(18, 14, '', ''),
(19, 1, '', ''),
(19, 2, '', ''),
(19, 3, '', ''),
(19, 4, '', ''),
(19, 5, '', ''),
(19, 6, '', ''),
(19, 7, '', ''),
(19, 8, '', ''),
(19, 9, '', ''),
(19, 10, '', ''),
(19, 11, '', ''),
(19, 12, '', ''),
(19, 13, '', ''),
(19, 14, '', ''),
(20, 1, '', ''),
(20, 2, '', ''),
(20, 3, '', ''),
(20, 4, '', ''),
(20, 5, '', ''),
(20, 6, '', ''),
(20, 7, '', ''),
(20, 8, '', ''),
(20, 9, '', ''),
(20, 10, '', ''),
(20, 11, '', ''),
(20, 12, '', ''),
(20, 13, '', ''),
(20, 14, '', ''),
(21, 1, 'Ini Judul Topik Week Pertama', 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet '),
(21, 2, '', ''),
(21, 3, '', ''),
(21, 4, '', ''),
(21, 5, '', ''),
(21, 6, '', ''),
(21, 7, '', ''),
(21, 8, '', ''),
(21, 9, '', ''),
(21, 10, '', ''),
(21, 11, '', ''),
(21, 12, '', ''),
(21, 13, '', ''),
(21, 14, '', ''),
(22, 1, 'Materi Pengenalan Bahan Kimia', ''),
(22, 2, '', ''),
(22, 3, '', ''),
(22, 4, '', ''),
(22, 5, '', ''),
(22, 6, '', ''),
(22, 7, '', ''),
(22, 8, '', ''),
(22, 9, '', ''),
(22, 10, '', ''),
(22, 11, '', ''),
(22, 12, '', ''),
(22, 13, '', ''),
(22, 14, '', ''),
(23, 1, '', ''),
(23, 2, '', ''),
(23, 3, '', ''),
(23, 4, '', ''),
(23, 5, '', ''),
(23, 6, '', ''),
(23, 7, '', ''),
(23, 8, '', ''),
(23, 9, '', ''),
(23, 10, '', ''),
(23, 11, '', ''),
(23, 12, '', ''),
(23, 13, '', ''),
(23, 14, '', ''),
(24, 1, '', ''),
(24, 2, '', ''),
(24, 3, '', ''),
(24, 4, '', ''),
(24, 5, '', ''),
(24, 6, '', ''),
(24, 7, '', ''),
(24, 8, '', ''),
(24, 9, '', ''),
(24, 10, '', ''),
(24, 11, '', ''),
(24, 12, '', ''),
(24, 13, '', ''),
(24, 14, '', ''),
(25, 1, 'Judul Topik Untuk Week 1', 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet '),
(25, 2, '', ''),
(25, 3, '', ''),
(25, 4, '', ''),
(25, 5, '', ''),
(25, 6, '', ''),
(25, 7, '', ''),
(25, 8, '', ''),
(25, 9, '', ''),
(25, 10, '', ''),
(25, 11, '', ''),
(25, 12, '', ''),
(25, 13, '', ''),
(25, 14, '', ''),
(26, 1, 'Judul Topik', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi '),
(26, 2, '', ''),
(26, 3, '', ''),
(26, 4, '', ''),
(26, 5, '', ''),
(26, 6, '', ''),
(26, 7, '', ''),
(26, 8, '', ''),
(26, 9, '', ''),
(26, 10, '', ''),
(26, 11, '', ''),
(26, 12, '', ''),
(26, 13, '', ''),
(26, 14, '', ''),
(27, 1, '', ''),
(27, 2, '', ''),
(27, 3, '', ''),
(27, 4, '', ''),
(27, 5, '', ''),
(27, 6, '', ''),
(27, 7, '', ''),
(27, 8, '', ''),
(27, 9, '', ''),
(27, 10, '', ''),
(27, 11, '', ''),
(27, 12, '', ''),
(27, 13, '', ''),
(27, 14, '', ''),
(28, 1, '', ''),
(28, 2, '', ''),
(28, 3, '', ''),
(28, 4, '', ''),
(28, 5, '', ''),
(28, 6, '', ''),
(28, 7, '', ''),
(28, 8, '', ''),
(28, 9, '', ''),
(28, 10, '', ''),
(28, 11, '', ''),
(28, 12, '', ''),
(28, 13, '', ''),
(28, 14, '', ''),
(29, 1, 'Lorem Ipsum Dolor Sit Amet', 'Ini merupakan deskripsi'),
(29, 2, '', ''),
(29, 3, '', ''),
(29, 4, '', ''),
(29, 5, '', ''),
(29, 6, '', ''),
(29, 7, '', ''),
(29, 8, '', ''),
(29, 9, '', ''),
(29, 10, '', ''),
(29, 11, '', ''),
(29, 12, '', ''),
(29, 13, '', ''),
(29, 14, '', ''),
(30, 1, '', ''),
(30, 2, '', ''),
(30, 3, '', ''),
(30, 4, '', ''),
(30, 5, '', ''),
(30, 6, '', ''),
(30, 7, '', ''),
(30, 8, '', ''),
(30, 9, '', ''),
(30, 10, '', ''),
(30, 11, '', ''),
(30, 12, '', ''),
(30, 13, '', ''),
(30, 14, '', '');

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `c_id`, `n_number`, `id_penerima`) VALUES
(1, 1, 3, 17),
(2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notif_socmed`
--

CREATE TABLE `notif_socmed` (
  `id` int(11) NOT NULL,
  `nama_notif` varchar(255) NOT NULL,
  `idpostingan` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `seen` tinyint(1) DEFAULT NULL,
  `idkomentar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notif_socmed`
--

INSERT INTO `notif_socmed` (`id`, `nama_notif`, `idpostingan`, `id_penerima`, `time`, `seen`, `idkomentar`) VALUES
(1, 'Murid 1 mengomentari postingan anda', 10, 14, '2018-11-07 17:10:41', 0, 2),
(2, 'Murid 1 mengomentari postingan anda', 10, 14, '2018-11-07 17:11:01', 0, 3),
(3, 'Murid 2 menyukai postingan anda', 10, 14, '2018-11-07 17:15:28', 0, NULL),
(4, 'GUru 3 mengomentari postingan anda', 23, 2, '2018-11-08 11:17:03', 1, 5),
(5, 'GUru 3 menyukai postingan anda', 23, 2, '2018-11-08 11:46:09', 1, NULL),
(6, 'Guru 2 mengomentari postingan anda', 22, 2, '2018-11-18 08:13:35', 0, 6),
(8, 'Guru 2 menyukai postingan anda', 22, 2, '2018-11-18 08:14:18', 0, NULL);

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
(10, 'tes posting gambar', '2018-10-19', 14, NULL, '20181019095451Koala.jpg'),
(11, 'tes posting file', '2018-10-19', 14, NULL, '20181019095504APACitationStyle (1).docx'),
(12, 'Contoh Tugas', '2018-11-07', 2, NULL, '20181107171015TA BPMN Update Like Komen Status.jpg'),
(13, 'posting\r\n\r\nspasi\r\n\r\nbanyak\r\n\r\nhehe\r\n\r\noke', '2018-11-07', 3, NULL, NULL),
(14, 'file ppt', '2018-11-07', 3, NULL, '20181107171202Analisa2016.pptx'),
(22, 'Foto penguin X', '2018-11-07', 2, NULL, '20181107172716Penguins.jpg'),
(23, 'mikir', '2018-11-08', 2, NULL, NULL),
(24, 'Postingan di grup\r\n\r\ncoba', '2018-11-18', 2, 1, NULL),
(26, 'coba\r\n\r\nposting\r\n\r\npake\r\n\r\nenter\r\n\r\ntes', '2018-11-18', 15, NULL, NULL);

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
(2, 9),
(2, 10),
(2, 21),
(2, 22),
(3, 9),
(3, 10),
(3, 21),
(3, 22),
(4, 25),
(4, 28),
(5, 25),
(5, 28),
(6, 11),
(6, 12),
(6, 17),
(6, 19),
(7, 11),
(7, 12),
(7, 17),
(7, 19),
(8, 26),
(8, 29),
(9, 26),
(9, 29),
(10, 18),
(10, 20),
(10, 23),
(10, 24),
(11, 18),
(11, 20),
(11, 23),
(11, 24),
(12, 27),
(12, 30),
(13, 27),
(13, 30),
(14, 25),
(14, 26),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(15, 10),
(15, 11),
(15, 12),
(15, 19),
(15, 20),
(15, 21),
(15, 22),
(15, 23),
(15, 24),
(16, 9),
(16, 17),
(16, 18),
(29, 9),
(29, 10),
(29, 21),
(29, 22),
(30, 9),
(30, 10),
(30, 21),
(30, 22),
(31, 9),
(31, 10),
(31, 21),
(31, 22),
(32, 9),
(32, 10),
(32, 21),
(32, 22),
(34, 9),
(34, 10),
(34, 21),
(34, 22),
(35, 9),
(35, 10),
(35, 21),
(35, 22);

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
  `week_id` int(11) NOT NULL,
  `tgl_kumpul` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `namatugas`, `matpel_id`, `week_id`, `tgl_kumpul`) VALUES
(1, 'Tugas Geografi pertama', 28, 1, NULL),
(2, 'Tugas Pertama', 25, 1, NULL),
(3, 'Tugas Awal', 29, 1, NULL),
(4, 'Tugas Pertama 11', 26, 1, NULL),
(5, 'Tugas Pertemuan Pertama', 30, 1, NULL),
(6, 'Sejarah Tugas', 27, 1, NULL),
(9, 'Tugas Kimia 10', 22, 1, NULL),
(10, 'Tugas Pertama', 11, 1, NULL),
(11, 'Tugas Pertama', 19, 1, NULL),
(12, 'Tugas Pertama', 12, 1, NULL),
(13, 'Tugas Kelas 12', 24, 1, NULL),
(14, 'Tugas Awal 12', 23, 1, NULL),
(15, 'Tugas', 20, 1, NULL),
(16, 'Tugas MTK 10', 9, 1, NULL),
(17, 'Tugas Pertama Matematika', 17, 1, NULL),
(18, 'Tugas Awal MTK', 18, 1, NULL),
(19, 'Tugas Pake Deadline', 17, 1, '2018-11-15'),
(22, 'Tugas Pake Deadline', 10, 1, '2018-11-18'),
(26, 'Tugas 10 IPA 1', 10, 1, NULL),
(27, 'Tugas 10 IPA 2', 10, 1, NULL),
(28, 'Tugas Pake Batas Waktu', 21, 1, '2018-11-19'),
(29, 'Tugas Semua Kelas', 21, 1, NULL),
(30, 'Tugas Semua Kelas', 10, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('murid','guru','ortu','admin') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ortu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `foto`, `kelas_id`, `ortu_id`) VALUES
(1, 'admin', 'admin', 'tommyrachmadiono', 'admin', 'people1.png', NULL, NULL),
(2, 'Murid 1', 'murid1', '123456', 'murid', 'people15.png', 1, 17),
(3, 'Murid 2', 'murid2', '123456', 'murid', 'people19.png', 2, 18),
(4, 'Murid 3', 'murid3', '123456', 'murid', 'team1.jpg', 3, 19),
(5, 'Murid 4', 'murid4', '123456', 'murid', 'team3.jpg', 4, 20),
(6, 'Murid 5', 'murid5', '123456', 'murid', 'team4.jpg', 5, 21),
(7, 'Murid 6', 'murid6', '123456', 'murid', 'team5.jpg', 6, 22),
(8, 'Murid 7', 'murid7', '123456', 'murid', 'team6.jpg', 7, 23),
(9, 'Murid 8', 'murid8', '123456', 'murid', 'team7.jpg', 8, 24),
(10, 'Murid 9', 'murid9', '123456', 'murid', 'team8.jpg', 9, 25),
(11, 'Murid 10', 'murid10', '123456', 'murid', 'team9.jpg', 10, 26),
(12, 'Murid 11', 'murid11', '123456', 'murid', 'team10.jpg', 11, 27),
(13, 'Murid 12', 'murid12', '123456', 'murid', 'team11.jpg', 12, 28),
(14, 'Guru 1', 'guru1', '123456', 'guru', 'people22.png', NULL, NULL),
(15, 'Guru 2', 'guru2', '123456', 'guru', 'team12.jpg', NULL, NULL),
(16, 'Guru 3', 'guru3', '123456', 'guru', 'people18.png', NULL, NULL),
(17, 'Ortu 1', 'ortu1', '123456', 'ortu', NULL, NULL, NULL),
(18, 'Ortu 2', 'ortu2', '123456', 'ortu', NULL, NULL, NULL),
(19, 'Ortu 3', 'ortu3', '123456', 'ortu', NULL, NULL, NULL),
(20, 'Ortu 4', 'ortu4', '123456', 'ortu', NULL, NULL, NULL),
(21, 'Ortu 5', 'ortu5', '123456', 'ortu', NULL, NULL, NULL),
(22, 'Ortu 6', 'ortu6', '123456', 'ortu', NULL, NULL, NULL),
(23, 'Ortu 7', 'ortu7', '123456', 'ortu', NULL, NULL, NULL),
(24, 'Ortu 8', 'ortu8', '123456', 'ortu', NULL, NULL, NULL),
(25, 'Ortu 9', 'ortu9', '123456', 'ortu', NULL, NULL, NULL),
(26, 'Ortu 10', 'ortu10', '123456', 'ortu', NULL, NULL, NULL),
(27, 'Ortu 11', 'ortu11', '123456', 'ortu', NULL, NULL, NULL),
(28, 'Ortu 12', 'ortu12', '123456', 'ortu', NULL, NULL, NULL),
(29, 'Murid X', 'murid01', '123456', 'murid', NULL, 1, NULL),
(30, 'Murid Y', 'murid02', '123456', 'murid', NULL, 1, NULL),
(31, 'Murid Z', 'murid03', '123456', 'murid', NULL, 1, NULL),
(32, 'Murid A', 'murid04', '123456', 'murid', NULL, 2, NULL),
(34, 'Murid B', 'murid05', '123456', 'murid', NULL, 2, NULL),
(35, 'Murid C', 'murid06', '123456', 'murid', NULL, 2, NULL);

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
(4, 1, '2018101909254114081_Form perpanjangan TA.doc', '2018-10-19', NULL),
(13, 5, '2018110719043709_latihan BPMN multi user.docx', '2018-11-07', NULL),
(13, 6, '2018110719050109_latihan BPMN multi user.docx', '2018-11-07', NULL),
(2, 16, '20181108110314A.jpg', '2018-11-08', 0),
(29, 26, '20181118173033Week 12 - Ajax _ DB.ppt', '2018-11-18', 10),
(30, 26, '20181118173127FINAL PROJECT WEB FRAMEWORK PROGRAMMING.pdf', '2018-11-18', NULL),
(31, 26, '20181118173218ITFWeek1.pdf', '2018-11-18', NULL),
(32, 27, '20181118173247Document Flow Diagram.pdf', '2018-11-18', NULL),
(34, 27, '20181118173315Week 3 Business Intelligence.ppt', '2018-11-18', NULL),
(35, 27, '20181118173357Evaluasi Quiz & Tugas selama NTS.pdf', '2018-11-18', NULL),
(2, 30, '20181119121958APACitationStyle (1).docx', '2018-11-19', NULL),
(3, 30, '2018111912202309_latihan BPMN multi user.docx', '2018-11-19', NULL),
(29, 30, '2018111912240309_latihan BPMN multi user.docx', '2018-11-19', NULL),
(30, 30, '2018111912245909_latihan BPMN multi user.docx', '2018-11-19', NULL),
(31, 30, '2018111912254609_latihan BPMN multi user.docx', '2018-11-19', NULL),
(32, 30, '2018111912261509_latihan BPMN multi user.docx', '2018-11-19', NULL),
(34, 30, '2018111912264209_latihan BPMN multi user.docx', '2018-11-19', NULL),
(35, 30, '2018111912271109_latihan BPMN multi user.docx', '2018-11-19', NULL);

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
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `fk_conversation_user1_idx` (`id_pengirim`),
  ADD KEY `fk_conversation_user2_idx` (`id_penerima`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`cr_id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grup_user1_idx` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kelas_UNIQUE` (`nama_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`),
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
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notification_conversation1_idx` (`c_id`),
  ADD KEY `fk_notification_user1_idx` (`id_penerima`);

--
-- Indexes for table `notif_socmed`
--
ALTER TABLE `notif_socmed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_noitf_socmed_postingan1_idx` (`idpostingan`),
  ADD KEY `fk_noitf_socmed_user1_idx` (`id_penerima`),
  ADD KEY `fk_notif_socmed_komentar1_idx` (`idkomentar`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`idpostingan`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tugas_matpel1_idx` (`matpel_id`),
  ADD KEY `fk_tugas_week1_idx` (`week_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notif_socmed`
--
ALTER TABLE `notif_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `idpostingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  ADD CONSTRAINT `fk_matpel_has_week_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matpel_has_week_week1` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_conversation1` FOREIGN KEY (`c_id`) REFERENCES `conversation` (`c_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_user1` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `notif_socmed`
--
ALTER TABLE `notif_socmed`
  ADD CONSTRAINT `fk_noitf_socmed_postingan1` FOREIGN KEY (`idpostingan`) REFERENCES `postingan` (`idpostingan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noitf_socmed_user1` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notif_socmed_komentar1` FOREIGN KEY (`idkomentar`) REFERENCES `komentar` (`idkomentar`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_user_has_matpel_matpel1` FOREIGN KEY (`matpel_id`) REFERENCES `matpel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
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
