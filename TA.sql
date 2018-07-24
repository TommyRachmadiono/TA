-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:54 AM
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
  `description` varchar(1000) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `title`, `description`, `file`, `user_id`) VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit amet, cons', 'a1.jpg', 1),
(2, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, co', 'a2.jpg', 1),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, co', 'a3.jpg', 1),
(4, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, co', 'a4.jpg', 1),
(5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, co', 'a5.jpg', 1),
(6, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nLorem ipsum dolor sit amet, co', 'a6.jpg', 1),
(7, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', 'a7.jpg', 1),
(8, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', 'a8.jpg', 1),
(9, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', 'a9.jpg', 1),
(10, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', 'a10.jpg', 1);

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
(1, 1, '2018-07-24'),
(2, 1, '2018-07-24'),
(1, 9, '2018-07-24'),
(2, 9, '2018-07-24'),
(1, 10, '2018-07-24'),
(2, 10, '2018-07-24'),
(1, 11, '2018-07-24'),
(2, 11, '2018-07-24'),
(1, 12, '2018-07-24'),
(2, 12, '2018-07-24'),
(1, 13, '2018-07-24'),
(2, 13, '2018-07-24'),
(1, 14, '2018-07-24'),
(2, 14, '2018-07-24'),
(1, 15, '2018-07-24'),
(2, 15, '2018-07-24'),
(1, 16, '2018-07-24'),
(2, 16, '2018-07-24'),
(1, 17, '2018-07-24'),
(2, 17, '2018-07-24'),
(1, 18, '2018-07-24'),
(2, 18, '2018-07-24'),
(1, 39, '2018-07-15'),
(2, 40, '2018-07-24');

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
(9, 39, 29, '2018-07-11 18:23:40'),
(11, 39, 30, '2018-07-12 08:57:41');

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
(1, 'Putra/i anda mendapatkan nilai 55 dari tugas Tugas Week 1 pada pelajaran Matematika.', 39, '2018-07-11 18:23:40', 9, 1),
(2, 'Putra/i anda mendapatkan nilai 100 dari tugas <b>Tugas Week 1</b> pada pelajaran <b>Matematika</b>.', 39, '2018-07-11 18:28:20', 9, 1),
(3, 'Putra/i anda mendapatkan nilai 88 dari tugas <b>Tugas Week 1</b> pada pelajaran <b>Matematika</b>.', 39, '2018-07-11 18:29:52', 9, 0),
(6, 'Putra/i anda mendapatkan nilai 32 dari tugas <b>Tugas Week 1</b> pada pelajaran <b>Matematika</b>.', 39, '2018-07-12 08:57:41', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `user_id`) VALUES
(1, 'Event Sekolah', '', '2018-07-15', '2018-07-15', '2018-07-15', 1),
(2, 'Event X', '[Deprecation] Resource requests whose URLs contained both removed whitespace (`\\n`, `\\r`, `\\t`) characters and less-than characters (`<`) are blocked. Please remove newlines and encode less-than characters from places like element attribute values in order to load these resources.', '2018-07-24', '2018-07-24', '2018-07-24', 1);

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

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `file`, `user_id`) VALUES
(1, 'Lorem Ipsum', 's1.jpg', 1),
(2, 'Lorem Ipsum', 's2.jpg', 1),
(3, 'Lorem Ipsum', 's3.jpg', 1),
(4, 'Lorem Ipsum', 's4.jpg', 1),
(5, 'Lorem Ipsum', 's5.jpg', 1),
(6, 'Lorem Ipsum', 's6.jpg', 1),
(7, 'Lorem Ipsum', 's7.jpg', 1),
(9, 'Lorem Ipsum', 's9.jpg', 1),
(10, 'Lorem Ipsum', 's10.jpg', 1);

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
(1, 'groupKu', 39, '2018-07-15'),
(2, 'Kelompok Belajar', 40, '2018-07-24');

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
(5, '11 IPA 1');

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
(9, 'hmm', 39, 7),
(94, 'oke\r\noke\r\noke', 1, 36),
(96, 'asd', 1, 90),
(99, 'HAHA', 9, 65),
(100, 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', 9, 7),
(101, 'nice', 13, 94),
(102, 'Whoops', 18, 97);

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
(13, 94),
(13, 95),
(16, 97);

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `c_id`, `n_number`, `id_penerima`) VALUES
(1, 9, 1, 29),
(3, 11, 1, 30);

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
(7, 'HEHE', '2018-07-15', 1, NULL, '20180715111319[BAGAS31] Jamu-Sublime.rar'),
(33, 'sadaskdosakd', '2018-07-21', 39, 1, '2018072117573009_latihan BPMN multi user.docx'),
(34, 'asdsa\r\nasdas\r\nasdasd', '2018-07-21', 39, 1, '20180721175741BPMN Proses Penggunaan Line.png'),
(35, 'HMMMMMMMmmmmmasd', '2018-07-21', 39, 1, '20180721175759CV_TommyRachmadiono_UniversitasSurabaya.pdf'),
(36, 'aaaa', '2018-07-21', 39, 1, '20180721175827A.jpg'),
(65, 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', '2018-07-24', 40, NULL, NULL),
(75, 'coba', '2018-07-24', 40, 2, NULL),
(88, '1', '2018-07-24', 1, 1, NULL),
(89, '2', '2018-07-24', 1, 1, NULL),
(90, '3', '2018-07-24', 1, 1, NULL),
(91, 'asdsadsadsa', '2018-07-24', 1, 2, NULL),
(92, 'asd', '2018-07-24', 1, 2, NULL),
(93, 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', '2018-07-24', 9, NULL, '20180724112037Jadwal Kuliah Semester 7.xlsx'),
(94, 'Coba Upload Foto\r\nDi postingan', '2018-07-24', 9, NULL, '20180724112138A.jpg'),
(95, 'Form XYZ', '2018-07-24', 13, NULL, '2018072411224814081_Form perpanjangan TA.doc'),
(96, 'Contoh BPMN', '2018-07-24', 13, NULL, '20180724112331BPMN Proses Penggunaan Facebook.png'),
(97, 'Lorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.\r\n\r\nLorem ipsum dolor sit amet, nam et possim nostrud conclusionemque, nec ea sanctus perpetua, sed fastidii intellegebat id. Id facete phaedrum voluptatibus pri. Ea aeque aliquip detracto eum, eum sonet ignota te. Dicant discere his et. An munere nullam epicurei per.', '2018-07-24', 16, NULL, NULL);

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
(1, 2),
(9, 4),
(10, 2),
(10, 3),
(10, 4),
(11, 2),
(11, 3),
(11, 4),
(12, 2),
(12, 3),
(12, 4),
(13, 2),
(13, 3),
(13, 4),
(14, 2),
(14, 3),
(14, 4),
(15, 2),
(15, 3),
(15, 4),
(16, 2),
(16, 3),
(16, 4),
(17, 2),
(17, 3),
(17, 4),
(18, 2),
(18, 3),
(18, 4),
(39, 2),
(39, 3),
(39, 4),
(40, 2),
(40, 3),
(40, 4);

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
(2, 'Tugas Week 1', 2, 1);

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
(9, 'Murid 1', 'murid1', '123456', 'murid', 'people3.png', 1, 29),
(10, 'Murid 2', 'murid2', '123456', 'murid', 'people5.png', 1, 30),
(11, 'Murid 3', 'murid3', '123456', 'murid', 'people9.png', 2, 31),
(12, 'Murid 4', 'murid4', '123456', 'murid', 'people10.png', 2, 32),
(13, 'Murid 5', 'murid5', '123456', 'murid', 'people11.png', 3, 33),
(14, 'Murid 6', 'murid6', '123456', 'murid', 'people12.png', 3, 34),
(15, 'Murid 7', 'murid7', '123456', 'murid', 'people14.png', 4, 35),
(16, 'Murid 8', 'murid8', '123456', 'murid', 'people15.png', 4, 36),
(17, 'Murid 9', 'murid9', '123456', 'murid', 'people19.png', 5, 37),
(18, 'Murid 10', 'murid10', '123456', 'murid', 'people20.png', 5, 38),
(29, 'Ortu 1', 'ortu1', '123456', 'ortu', NULL, NULL, NULL),
(30, 'Ortu 2', 'ortu2', '123456', 'ortu', NULL, NULL, NULL),
(31, 'Ortu 3', 'ortu3', '123456', 'ortu', NULL, NULL, NULL),
(32, 'Ortu 4', 'ortu4', '123456', 'ortu', NULL, NULL, NULL),
(33, 'Ortu 5', 'ortu5', '123456', 'ortu', NULL, NULL, NULL),
(34, 'Ortu 6', 'ortu6', '123456', 'ortu', NULL, NULL, NULL),
(35, 'Ortu 7', 'ortu7', '123456', 'ortu', NULL, NULL, NULL),
(36, 'Ortu 8', 'ortu8', '123456', 'ortu', NULL, NULL, NULL),
(37, 'Ortu 9', 'ortu9', '123456', 'ortu', NULL, NULL, NULL),
(38, 'Ortu 10', 'ortu10', '123456', 'ortu', NULL, NULL, NULL),
(39, 'Guru 1', 'guru1', '123456', 'guru', 'people18.png', NULL, NULL),
(40, 'Guru 2', 'guru2', '123456', 'guru', 'people22.png', NULL, NULL);

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
(9, 2, '20180711105210Chrysanthemum.jpg', '2018-07-11', 88),
(10, 2, '20180711105237Koala.jpg', '2018-07-11', 32),
(11, 2, '20180711105257Desert.jpg', '2018-07-11', NULL),
(12, 2, '20180711105316Hydrangeas.jpg', '2018-07-11', NULL),
(13, 2, '20180711105334Penguins.jpg', '2018-07-11', NULL),
(14, 2, '20180711105353Jellyfish.jpg', '2018-07-11', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `idpostingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
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
