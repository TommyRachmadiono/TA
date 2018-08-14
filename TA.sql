-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 11:09 AM
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
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a1.jpg', 1),
(4, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a2.jpg', 1),
(5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a3.jpg', 1),
(6, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a4.jpg', 1),
(7, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a5.jpg', 1),
(8, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a6.jpg', 1),
(9, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a7.jpg', 1),
(10, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a8.jpg', 1),
(11, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a9.jpg', 1),
(12, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 'a10.jpg', 1);

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
(2, 2, '2018-08-13'),
(2, 3, '2018-08-13'),
(2, 4, '2018-08-13'),
(1, 6, '2018-08-12'),
(1, 7, '2018-08-12'),
(2, 16, '2018-08-13'),
(2, 17, '2018-08-13'),
(2, 18, '2018-08-13'),
(2, 19, '2018-08-13'),
(2, 20, '2018-08-13'),
(2, 21, '2018-08-13'),
(2, 22, '2018-08-13'),
(2, 25, '2018-08-13'),
(2, 26, '2018-08-13');

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
(1, 2, 1, '2018-08-09 10:37:10'),
(2, 28, 24, '2018-08-13 08:55:50'),
(3, 28, 6, '2018-08-13 17:40:17'),
(4, 28, 7, '2018-08-13 17:40:29'),
(5, 28, 10, '2018-08-13 17:40:34'),
(6, 28, 11, '2018-08-13 17:40:38'),
(7, 28, 8, '2018-08-13 17:40:54'),
(8, 28, 9, '2018-08-13 17:40:58'),
(9, 28, 12, '2018-08-13 17:41:03'),
(10, 28, 13, '2018-08-13 17:41:07'),
(11, 28, 14, '2018-08-13 17:41:14'),
(12, 28, 15, '2018-08-13 17:41:18');

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
(1, 'Haloo', 2, '2018-08-09 10:37:10', 1, 1),
(2, 'oke\r\noke', 2, '2018-08-09 10:39:10', 1, 1),
(3, 'iya halo gan\r\nhehe', 1, '2018-08-09 10:39:41', 1, 1),
(4, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas wkwkwk</b> pada pelajaran <b>Sejarah XII</b>.', 28, '2018-08-13 08:55:50', 2, 0),
(5, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas wkwkwk</b> pada pelajaran <b>Sejarah XII</b>.', 28, '2018-08-13 08:56:26', 2, 0),
(6, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika X</b>.', 28, '2018-08-13 17:40:17', 3, 0),
(7, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika X</b>.', 28, '2018-08-13 17:40:29', 4, 0),
(8, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika X</b>.', 28, '2018-08-13 17:40:30', 4, 0),
(9, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika X</b>.', 28, '2018-08-13 17:40:34', 5, 0),
(10, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika X</b>.', 28, '2018-08-13 17:40:38', 6, 0),
(11, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XI</b>.', 28, '2018-08-13 17:40:54', 7, 0),
(12, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XI</b>.', 28, '2018-08-13 17:40:58', 8, 0),
(13, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XI</b>.', 28, '2018-08-13 17:41:03', 9, 0),
(14, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XI</b>.', 28, '2018-08-13 17:41:07', 10, 0),
(15, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XII</b>.', 28, '2018-08-13 17:41:14', 11, 0),
(16, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XII</b>.', 28, '2018-08-13 17:41:18', 12, 0),
(17, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XII</b>.', 28, '2018-08-13 17:41:21', 2, 0),
(18, 'Putra/i anda mendapatkan nilai 80 dari tugas <b>Tugas Baru</b> pada pelajaran <b>Matematika XII</b>.', 28, '2018-08-13 17:41:25', 2, 0),
(19, 'Tes', 1, '2018-08-14 10:03:04', 1, 1),
(20, 'TES', 1, '2018-08-14 10:03:09', 1, 1),
(21, 'TES', 1, '2018-08-14 10:03:13', 1, 1),
(22, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 1, '2018-08-14 10:29:49', 1, 1),
(23, 'tes \r\ntes\r\nas\r\n\r\n\r\nasd', 1, '2018-08-14 10:38:28', 1, 1),
(26, 'coba\r\nngetes', 1, '2018-08-14 10:57:50', 1, 0);

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
(1, 'Event Sekolah', 'Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla \r\nBla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla \r\nBla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla Bla', '2018-08-13', '2018-08-13', '2018-08-13', 1),
(2, 'A', '', '2018-08-14', '2018-08-14', '2018-08-14', 1),
(3, 'A', '', '2018-08-14', '2018-08-14', '2018-08-14', 1),
(4, 'A', NULL, '2018-08-01', '2018-08-01', '2018-08-01', 1),
(5, 'B', '', '2018-08-14', '2018-08-14', '2018-08-14', 1),
(6, 'B', '', '2018-08-14', '2018-08-14', '2018-08-14', 1),
(7, 'C', '', '2018-08-16', '2018-08-16', '2018-08-14', 1),
(8, 'C', '', '2018-08-18', '2018-08-18', '2018-08-14', 1);

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
(5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's1.jpg', 1),
(6, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's2.jpg', 1),
(7, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's3.jpg', 1),
(8, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's4.jpg', 1),
(9, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's5.jpg', 1),
(10, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's6.jpg', 1),
(11, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's7.jpg', 1),
(13, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's9.jpg', 1),
(14, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.', 's10.jpg', 1);

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
(1, 'OrTU', 6, '2018-08-12'),
(2, 'Paguyuban Murid Teladan', 2, '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id` int(11) NOT NULL,
  `nama_jenjang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id`, `nama_jenjang`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

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
(5, '10 IPS 1'),
(6, '10 IPS 2'),
(20, '11 aasd'),
(3, '11 IPA 1'),
(7, '11 IPA 2'),
(4, '11 IPS 1'),
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
(1, 'Makasih pak', 26, 19, NULL),
(2, 'Ini gambar penguin hehe', 26, 17, '20180813135557Penguins.jpg'),
(3, 'Halo gan', 21, 16, NULL),
(5, 'Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem \r\n\r\n\r\nLorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem Lorem lorem lorem lorem lorem ', 19, 20, NULL),
(6, 'Waduh jangan suka bajak2', 28, 21, NULL),
(7, 'terlalu', 16, 21, NULL),
(8, 'nih', 3, 22, '20180813135927BPMN Proses Penggunaan Line.png'),
(9, 'materinya ini nih', 3, 22, '20180813135949Analisa2016.pptx'),
(10, 'hei', 20, 16, NULL),
(11, 'random ', 20, 16, '2018081314004014081_Form perpanjangan TA.doc'),
(13, 'Nice', 20, 24, NULL),
(14, 'Halo juga', 21, 25, NULL);

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
(4, 17),
(20, 16);

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
(3, '2018081316082509_latihan BPMN multi user.docx', 11, 1, 5),
(4, '20180813160845APACitationStyle.docx', 11, 2, 5),
(5, '2018081316090109_latihan BPMN multi user.docx', 12, 1, 5),
(6, '2018081316090709_latihan BPMN multi user.docx', 13, 1, 5),
(7, '2018081316091509_latihan BPMN multi user.docx', 20, 1, 5),
(8, '2018081316092409_latihan BPMN multi user.docx', 21, 1, 5),
(9, '2018081316093209_latihan BPMN multi user.docx', 22, 1, 5),
(10, '2018081316094109_latihan BPMN multi user.docx', 29, 1, 5),
(11, '2018081316094809_latihan BPMN multi user.docx', 30, 1, 5),
(12, '2018081316095709_latihan BPMN multi user.docx', 31, 1, 5),
(13, '2018081316242509_latihan BPMN multi user.docx', 19, 1, 27),
(14, '2018081316243009_latihan BPMN multi user.docx', 8, 1, 27),
(15, '2018081316243609_latihan BPMN multi user.docx', 9, 1, 27),
(16, '2018081316244209_latihan BPMN multi user.docx', 10, 1, 27),
(17, '2018081316245009_latihan BPMN multi user.docx', 14, 1, 27),
(18, '2018081316245809_latihan BPMN multi user.docx', 15, 1, 27),
(19, '2018081316250509_latihan BPMN multi user.docx', 16, 1, 27),
(20, '2018081316251509_latihan BPMN multi user.docx', 17, 1, 27),
(21, '2018081316252309_latihan BPMN multi user.docx', 18, 1, 27),
(23, '2018081317051709_latihan BPMN multi user.docx', 1, 1, 28),
(24, '2018081317053309_latihan BPMN multi user.docx', 2, 1, 28),
(25, '2018081317055509_latihan BPMN multi user.docx', 4, 1, 28),
(26, '2018081317062009_latihan BPMN multi user.docx', 23, 1, 28),
(27, '2018081317064709_latihan BPMN multi user.docx', 24, 1, 28),
(28, '2018081317070609_latihan BPMN multi user.docx', 25, 1, 28),
(29, '2018081317072509_latihan BPMN multi user.docx', 26, 1, 28),
(30, '2018081317075609_latihan BPMN multi user.docx', 27, 1, 28),
(31, '2018081317082009_latihan BPMN multi user.docx', 28, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(45) NOT NULL,
  `jenjang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id`, `nama_pelajaran`, `jenjang_id`) VALUES
(1, 'Matematika X', 1),
(2, 'Matematika XI', 2),
(4, 'Matematika XII', 3),
(8, 'Fisika X', 1),
(9, 'Fisika XI', 2),
(10, 'Fisika XII', 3),
(11, 'Sejarah X', 1),
(12, 'Sejarah XI', 2),
(13, 'Sejarah XII', 3),
(14, 'Biologi X', 1),
(15, 'Biologi XI', 2),
(16, 'Biologi XII', 3),
(17, 'Kimia X', 1),
(18, 'Kimia XI', 2),
(19, 'Kimia XII', 3),
(20, 'Ekonomi X', 1),
(21, 'Ekonomi XI', 2),
(22, 'Ekonomi XII', 3),
(23, 'Bahasa Indonesia X', 1),
(24, 'Bahasa Indonesia XI', 2),
(25, 'Bahasa Indonesia XII', 3),
(26, 'Bahasa Inggris X', 1),
(27, 'Bahasa Inggris XI', 2),
(28, 'Bahasa Inggris XII', 3),
(29, 'Geografi X', 1),
(30, 'Geografi XI', 2),
(31, 'Geografi XII', 3);

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
(1, 1, 'Tutorial', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(1, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(2, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(4, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(8, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(9, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(10, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 1, 'Ini Topik Week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 2, 'Ini Topik Week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 3, 'Ini Judl', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(11, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(12, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(13, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(14, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(15, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(16, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(17, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(18, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(19, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(20, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(21, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(22, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi');
INSERT INTO `matpel_has_week` (`matpel_id`, `week_id`, `title`, `description`) VALUES
(23, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(23, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(24, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(25, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(26, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(27, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(28, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(29, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(30, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 1, 'Topik week 1', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 2, 'Topik week 2', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 3, 'Topik week 3', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 4, 'Topik week 4', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 5, 'Topik week 5', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 6, 'Topik week 6', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 7, 'Topik week 7', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 8, 'Topik week 8', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 9, 'Topik week 9', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 10, 'Topik week 10', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 11, 'Topik week 11', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 12, 'Topik week 12', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 13, 'Topik week 13', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi'),
(31, 14, 'Topik week 14', 'Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi Ini deskripsi');

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
(1, 1, 0, 1),
(2, 1, 7, 2),
(3, 2, 4, 24),
(4, 3, 1, 6),
(5, 4, 2, 7),
(6, 5, 1, 10),
(7, 6, 1, 11),
(8, 7, 1, 8),
(9, 8, 1, 9),
(10, 9, 1, 12),
(11, 10, 1, 13),
(12, 11, 1, 14),
(13, 12, 1, 15);

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
(1, 'Murid 12 mengomentari postingan anda', 19, 27, '2018-08-13 13:55:29', 0, 1),
(2, 'Murid 12 mengomentari postingan anda', 17, 4, '2018-08-13 13:55:57', 0, 2),
(3, 'Murid 9 mengomentari postingan anda', 16, 3, '2018-08-13 13:56:25', 1, 3),
(5, 'Murid 7 mengomentari postingan anda', 20, 21, '2018-08-13 13:57:26', 1, 5),
(6, 'Guru 3 mengomentari postingan anda', 21, 19, '2018-08-13 13:58:13', 0, 6),
(7, 'Murid 4 mengomentari postingan anda', 21, 19, '2018-08-13 13:58:54', 0, 7),
(8, 'Murid 2 mengomentari postingan anda', 22, 16, '2018-08-13 13:59:27', 0, 8),
(9, 'Murid 2 mengomentari postingan anda', 22, 16, '2018-08-13 13:59:49', 0, 9),
(10, 'Murid 8 mengomentari postingan anda', 16, 3, '2018-08-13 14:00:22', 1, 10),
(11, 'Murid 8 menyukai postingan anda', 16, 3, '2018-08-13 14:00:31', 1, NULL),
(12, 'Murid 8 mengomentari postingan anda', 16, 3, '2018-08-13 14:00:40', 1, 11),
(14, 'Murid 8 mengomentari postingan anda', 24, 2, '2018-08-13 14:26:10', 1, 13),
(15, 'Murid 9 mengomentari postingan anda', 25, 20, '2018-08-13 14:26:53', 0, 14);

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
(15, 'asdasdasda\r\nasdasdas\r\ndasdasda', '2018-08-12', 6, 1, NULL),
(16, 'Halo teman', '2018-08-13', 3, NULL, NULL),
(17, 'Ini gambar koala', '2018-08-13', 4, NULL, '20180813134537Koala.jpg'),
(18, 'Yang butuh soal latihan ini bisa di download', '2018-08-13', 18, NULL, '2018081313463909_latihan BPMN multi user.docx'),
(19, 'Silahkan di download materi pembelajaran web', '2018-08-13', 27, NULL, '20180813134748PWEBJEQUERY.rar'),
(20, 'Lorem ipsum dolor sit amet.', '2018-08-13', 21, NULL, NULL),
(21, 'Aplikasi bajakan nih', '2018-08-13', 19, NULL, '20180813135757[BAGAS31] Jamu-Sublime.rar'),
(22, 'Ada yang punya contoh bpmn + materinya ?', '2018-08-13', 16, NULL, NULL),
(24, 'Silahkan berbagi apapun disini', '2018-08-13', 2, 2, NULL),
(25, 'Halo halo semua', '2018-08-13', 20, 2, NULL),
(26, 'Waow', '2018-08-13', 21, 2, '20180813142644A.jpg'),
(27, 'Mungkin ada yang butuh', '2018-08-13', 2, 2, '2018081314280514081_Form perpanjangan TA.doc'),
(28, 'Widihh', '2018-08-13', 3, 2, NULL),
(29, 'Welcome guys', '2018-08-13', 2, 2, NULL);

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
(1, 1),
(1, 2),
(2, 1),
(2, 8),
(2, 14),
(2, 17),
(2, 23),
(2, 26),
(3, 1),
(3, 8),
(3, 14),
(3, 17),
(3, 23),
(3, 26),
(4, 2),
(4, 9),
(4, 15),
(4, 18),
(4, 24),
(4, 27),
(5, 11),
(5, 12),
(5, 13),
(5, 20),
(5, 21),
(5, 22),
(5, 29),
(5, 30),
(5, 31),
(16, 2),
(16, 9),
(16, 15),
(16, 18),
(16, 24),
(16, 27),
(17, 1),
(17, 11),
(17, 20),
(17, 23),
(17, 26),
(17, 29),
(18, 1),
(18, 11),
(18, 20),
(18, 23),
(18, 26),
(18, 29),
(19, 2),
(19, 12),
(19, 21),
(19, 24),
(19, 27),
(19, 30),
(20, 2),
(20, 12),
(20, 21),
(20, 24),
(20, 27),
(20, 30),
(21, 4),
(21, 10),
(21, 16),
(21, 19),
(21, 25),
(21, 28),
(22, 4),
(22, 10),
(22, 16),
(22, 19),
(22, 25),
(22, 28),
(25, 4),
(25, 13),
(25, 22),
(25, 25),
(25, 28),
(25, 31),
(26, 4),
(26, 13),
(26, 22),
(26, 25),
(26, 28),
(26, 31),
(27, 8),
(27, 9),
(27, 10),
(27, 14),
(27, 15),
(27, 16),
(27, 17),
(27, 18),
(27, 19),
(28, 1),
(28, 2),
(28, 4),
(28, 23),
(28, 24),
(28, 25),
(28, 26),
(28, 27),
(28, 28);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `user_id` int(11) NOT NULL,
  `postingan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`user_id`, `postingan_id`) VALUES
(2, 16);

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
(2, 'Tugas Week 1', 11, 1),
(4, 'Tugas Week 1', 12, 1),
(5, 'Tugas Week 1', 13, 1),
(6, 'Tugas Week 1', 20, 1),
(7, 'Tugas Week 1', 21, 1),
(8, 'Tugas Week 1', 22, 1),
(9, 'Tugas Week 1', 29, 1),
(10, 'Tugas Week 1', 30, 1),
(11, 'Tugas Week 1', 31, 1),
(12, 'Tugas Remidi', 31, 2),
(13, 'Tugas Remidi', 11, 2),
(14, 'Tugas Remidi', 12, 2),
(15, 'Tugas Remidi', 13, 2),
(16, 'Tugas Remidi', 20, 2),
(18, 'Tugas Remidi', 21, 2),
(19, 'Tugas Remidi', 22, 2),
(20, 'Tugas Remidi', 29, 2),
(21, 'Tugas Remidi', 30, 2),
(22, 'Tugasl Awal', 8, 1),
(23, 'Tugas Awal', 9, 1),
(24, 'Tugas Awal', 10, 1),
(25, 'Tugas Awal', 14, 1),
(26, 'Tugas Awal', 15, 1),
(27, 'Tugas Awal', 16, 1),
(28, 'Tugas Awal', 17, 1),
(29, 'Tugas Awal', 18, 1),
(30, 'Tugas Awal', 19, 1),
(31, 'Quiz', 19, 2),
(32, 'Quiz', 8, 2),
(33, 'Quiz', 9, 2),
(34, 'Quiz', 10, 2),
(35, 'Quiz', 14, 2),
(36, 'Quiz', 15, 2),
(37, 'Quiz', 16, 2),
(38, 'Quiz', 17, 2),
(39, 'Quiz', 18, 2),
(40, 'Tugas Pengganti', 1, 2),
(41, 'Tugas Baru', 2, 1),
(42, 'Tugas Pengganti Libur', 2, 2),
(43, 'Tugas Baru', 4, 1),
(44, 'Tugas Pengganti Libur', 4, 2),
(45, 'Tugas Baru', 23, 1),
(46, 'Tugas Pengganti Libur', 23, 2),
(47, 'Tugas Baru', 24, 1),
(48, 'Tugas Pengganti Libur', 24, 2),
(49, 'Tugas Baru', 25, 1),
(50, 'Tugas Pengganti Libur', 25, 2),
(51, 'Tugas Baru', 26, 1),
(52, 'Tugas Pengganti Libur', 26, 2),
(53, 'Tugas Baru', 27, 1),
(54, 'Tugas Pengganti Libur', 27, 2),
(55, 'Tugas Baru', 28, 1),
(56, 'Tugas Pengganti Libur', 28, 2),
(57, 'Tugas Baru', 1, 1);

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
(1, 'ADMIN', 'admin', 'tommyrachmadiono', 'admin', 'people1.png', NULL, NULL),
(2, 'Murid 1', 'murid1', '123456', 'murid', 'people3.png', 1, 6),
(3, 'Murid 2', 'murid2', '123456', 'murid', 'people5.png', 2, 7),
(4, 'Murid 3', 'murid3', '123456', 'murid', 'people9.png', 3, 8),
(5, 'Guru 1', 'guru1', '123456', 'guru', 'people11.png', NULL, NULL),
(6, 'Ortu 1', 'ortu1', '123456', 'ortu', 'team1.jpg', NULL, NULL),
(7, 'Ortu 2', 'ortu2', '123456', 'ortu', 'team2.jpg', NULL, NULL),
(8, 'Ortu 3', 'ortu3', '123456', 'ortu', 'team3.jpg', NULL, NULL),
(9, 'Ortu 4', 'ortu4', '123456', 'ortu', 'team4.jpg', NULL, NULL),
(10, 'Ortu 5', 'ortu5', '123456', 'ortu', 'team5.jpg', NULL, NULL),
(11, 'Ortu 6', 'ortu6', '123456', 'ortu', 'team6.jpg', NULL, NULL),
(12, 'Ortu 7', 'ortu7', '123456', 'ortu', 'team7.jpg', NULL, NULL),
(13, 'Ortu 8', 'ortu8', '123456', 'ortu', 'team8.jpg', NULL, NULL),
(14, 'Ortu 9', 'ortu9', '123456', 'ortu', 'team9.jpg', NULL, NULL),
(15, 'Ortu 10', 'ortu10', '123456', 'ortu', 'team10.jpg', NULL, NULL),
(16, 'Murid 4', 'murid4', '123456', 'murid', 'people10.png', 7, 9),
(17, 'Murid 5', 'murid5', '123456', 'murid', 'people12.png', 5, 10),
(18, 'Murid 6', 'murid6', '123456', 'murid', 'people14.png', 6, 11),
(19, 'Murid 7', 'murid7', '123456', 'murid', 'people15.png', 4, 12),
(20, 'Murid 8', 'murid8', '123456', 'murid', 'people19.png', 8, 13),
(21, 'Murid 9', 'murid9', '123456', 'murid', 'people22.png', 9, 14),
(22, 'Murid 10', 'murid10', '123456', 'murid', 'people21.png', 10, 15),
(23, 'Ortu 11', 'ortu11', '123456', 'ortu', 'team11.jpg', NULL, NULL),
(24, 'Ortu 12', 'ortu12', '123456', 'ortu', 'team12.jpg', NULL, NULL),
(25, 'Murid 11', 'murid11', '123456', 'murid', 'people23.png', 11, 24),
(26, 'Murid 12', 'murid12', '123456', 'murid', 'people17.png', 12, 24),
(27, 'Guru 2', 'guru2', '123456', 'guru', 'people18.png', NULL, NULL),
(28, 'Guru 3', 'guru3', '123456', 'guru', 'people13.png', NULL, NULL);

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
(4, 41, '20180813171018Jellyfish.jpg', '2018-08-13', 80),
(16, 41, '20180813171040Jellyfish.jpg', '2018-08-13', 80),
(19, 41, '20180813171727Jellyfish.jpg', '2018-08-13', 80),
(20, 41, '20180813171747Jellyfish.jpg', '2018-08-13', 80),
(21, 43, '20180813171806Jellyfish.jpg', '2018-08-13', 80),
(22, 43, '20180813171823Jellyfish.jpg', '2018-08-13', 80),
(25, 43, '20180813171840Jellyfish.jpg', '2018-08-13', 80),
(26, 43, '20180813171901Jellyfish.jpg', '2018-08-13', 80),
(2, 57, '20180813171400Jellyfish.jpg', '2018-08-13', 80),
(3, 57, '20180813171423Jellyfish.jpg', '2018-08-13', 80),
(17, 57, '20180813171340Jellyfish.jpg', '2018-08-13', 80),
(18, 57, '20180813171708Jellyfish.jpg', '2018-08-13', 80);

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
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_pelajaran` (`nama_pelajaran`),
  ADD KEY `fk_matpel_jenjang1_idx` (`jenjang_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notif_socmed`
--
ALTER TABLE `notif_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `idpostingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
-- Constraints for table `matpel`
--
ALTER TABLE `matpel`
  ADD CONSTRAINT `fk_matpel_jenjang1` FOREIGN KEY (`jenjang_id`) REFERENCES `jenjang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
