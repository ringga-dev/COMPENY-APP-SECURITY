-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 10:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_web`
--

CREATE TABLE `admin_web` (
  `nik` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `enable_login` varchar(50) NOT NULL,
  `create` varchar(255) NOT NULL,
  `update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_web`
--

INSERT INTO `admin_web` (`nik`, `username`, `password`, `fullname`, `position`, `enable_login`, `create`, `update`) VALUES
('1111', 'master', '$2y$10$nXT6l7uV8JZKL4ld/SUkt..o1wXFXAopneA06GfF2i0ruYI1Wc7g2', 'master', 'admin', '1', '', ''),
('2222', 'admin', '$2y$10$HSHAVqy8kfBDQ4ZmlbZkdeiigGMvvL3/mMaKvLc0aZnoFKTrFoijy', 'admin', 'adminUndia', '1', '03-Nov-2021 02:17:49 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `app_company`
--

CREATE TABLE `app_company` (
  `id` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_company`
--

INSERT INTO `app_company` (`id`, `date`, `company`) VALUES
(2, '04-Nov-2021', 'PT Etowa Packaging Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah_undia`
--

CREATE TABLE `hadiah_undia` (
  `id` int(11) NOT NULL,
  `barang` text DEFAULT NULL,
  `create` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_patrol`
--

CREATE TABLE `list_patrol` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `patrol_ke` int(11) NOT NULL DEFAULT 0,
  `qr_code` varchar(50) NOT NULL DEFAULT '0',
  `tgl` varchar(50) NOT NULL DEFAULT '0',
  `create` varchar(50) NOT NULL DEFAULT '0',
  `update` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_patrol`
--

INSERT INTO `list_patrol` (`id`, `id_user`, `patrol_ke`, `qr_code`, `tgl`, `create`, `update`) VALUES
(255, 5, 0, 'QR-001-L7', '2021-12-01 10:11:31', '2021-12-01 10:12:18', '0'),
(256, 5, 0, 'QR-002-L1', '2021-12-01 10:11:33', '2021-12-01 10:12:18', '0'),
(257, 5, 0, 'QR-003-L6', '2021-12-01 10:11:34', '2021-12-01 10:12:18', '0'),
(258, 5, 0, 'QR-004-L6', '2021-12-01 10:11:35', '2021-12-01 10:12:18', '0'),
(259, 5, 0, 'QR-005-L6', '2021-12-01 10:11:36', '2021-12-01 10:12:18', '0'),
(260, 5, 0, 'QR-006-L7', '2021-12-01 10:11:39', '2021-12-01 10:12:18', '0'),
(261, 5, 0, 'QR-007-L7', '2021-12-01 10:11:43', '2021-12-01 10:12:18', '0'),
(262, 5, 0, 'QR-010-L6', '2021-12-01 10:11:51', '2021-12-01 10:12:18', '0'),
(263, 5, 0, 'QR-009-L6', '2021-12-01 10:11:47', '2021-12-01 10:12:18', '0'),
(264, 5, 0, 'QR-008-L7', '2021-12-01 10:11:44', '2021-12-01 10:12:18', '0'),
(265, 5, 0, 'QR-011-L6', '2021-12-01 10:11:53', '2021-12-01 10:12:18', '0'),
(266, 5, 0, 'QR-014-L6', '2021-12-01 10:11:58', '2021-12-01 10:12:18', '0'),
(267, 5, 0, 'QR-013-L6', '2021-12-01 10:11:56', '2021-12-01 10:12:18', '0'),
(268, 5, 0, 'QR-015-L6', '2021-12-01 10:11:59', '2021-12-01 10:12:18', '0'),
(269, 5, 0, 'QR-016-L1', '2021-12-01 10:12:00', '2021-12-01 10:12:18', '0'),
(270, 5, 0, 'QR-012-L6', '2021-12-01 10:11:54', '2021-12-01 10:12:18', '0'),
(271, 5, 0, 'QR-018-L7', '2021-12-01 10:12:02', '2021-12-01 10:12:19', '0'),
(272, 5, 0, 'QR-017-L6', '2021-12-01 10:12:01', '2021-12-01 10:12:19', '0'),
(273, 5, 0, 'QR-019-L7', '2021-12-01 10:12:03', '2021-12-01 10:12:19', '0'),
(274, 5, 0, 'QR-020-L7', '2021-12-01 10:12:05', '2021-12-01 10:12:19', '0'),
(275, 5, 0, 'QR-021-L7', '2021-12-01 10:12:07', '2021-12-01 10:12:19', '0'),
(276, 5, 0, 'QR-022-L7', '2021-12-01 10:12:08', '2021-12-01 10:12:19', '0'),
(277, 5, 0, 'QR-023-L7', '2021-12-01 10:12:12', '2021-12-01 10:12:19', '0'),
(278, 5, 0, 'QR-002-L1', '2021-12-06 15:29:56', '2021-12-06 15:32:16', '0'),
(279, 5, 0, 'QR-001-L7', '2021-12-06 15:29:49', '2021-12-06 15:32:16', '0'),
(280, 5, 0, 'QR-003-L6', '2021-12-06 15:30:00', '2021-12-06 15:32:16', '0'),
(281, 5, 0, 'QR-004-L6', '2021-12-06 15:30:06', '2021-12-06 15:32:16', '0'),
(282, 5, 0, 'QR-005-L6', '2021-12-06 15:30:11', '2021-12-06 15:32:16', '0'),
(283, 5, 0, 'QR-006-L7', '2021-12-06 15:30:16', '2021-12-06 15:32:16', '0'),
(284, 5, 0, 'QR-007-L7', '2021-12-06 15:30:20', '2021-12-06 15:32:16', '0'),
(285, 5, 0, 'QR-018-L7', '2021-12-06 15:30:57', '2021-12-06 15:32:16', '0'),
(286, 5, 0, 'QR-008-L7', '2021-12-06 15:30:24', '2021-12-06 15:32:16', '0'),
(287, 5, 0, 'QR-009-L6', '2021-12-06 15:30:28', '2021-12-06 15:32:16', '0'),
(288, 5, 0, 'QR-011-L6', '2021-12-06 15:30:34', '2021-12-06 15:32:16', '0'),
(289, 5, 0, 'QR-012-L6', '2021-12-06 15:30:37', '2021-12-06 15:32:16', '0'),
(290, 5, 0, 'QR-010-L6', '2021-12-06 15:30:31', '2021-12-06 15:32:16', '0'),
(291, 5, 0, 'QR-013-L6', '2021-12-06 15:30:41', '2021-12-06 15:32:16', '0'),
(292, 5, 0, 'QR-014-L6', '2021-12-06 15:30:44', '2021-12-06 15:32:16', '0'),
(293, 5, 0, 'QR-017-L6', '2021-12-06 15:30:53', '2021-12-06 15:32:16', '0'),
(294, 5, 0, 'QR-015-L6', '2021-12-06 15:30:46', '2021-12-06 15:32:16', '0'),
(295, 5, 0, 'QR-016-L1', '2021-12-06 15:30:50', '2021-12-06 15:32:16', '0'),
(296, 5, 0, 'QR-019-L7', '2021-12-06 15:31:01', '2021-12-06 15:32:16', '0'),
(297, 5, 0, 'QR-020-L7', '2021-12-06 15:31:04', '2021-12-06 15:32:16', '0'),
(298, 5, 0, 'QR-022-L7', '2021-12-06 15:31:12', '2021-12-06 15:32:16', '0'),
(299, 5, 0, 'QR-021-L7', '2021-12-06 15:31:08', '2021-12-06 15:32:16', '0'),
(300, 5, 0, 'QR-023-L7', '2021-12-06 15:31:16', '2021-12-06 15:32:16', '0'),
(301, 5, 0, 'QR-001-L7', '2021-12-06 16:59:14', '2021-12-06 16:59:21', '0'),
(302, 5, 0, 'QR-001-L7', '2021-12-06 17:01:57', '2021-12-06 17:02:01', '0'),
(303, 5, 0, 'QR-001-L7', '2021-12-06 17:02:26', '2021-12-06 17:02:28', '0'),
(304, 104, 0, 'QR-002-L1', '2021-12-07 08:15:18', '2021-12-07 08:15:56', '0'),
(305, 104, 0, 'QR-003-L6', '2021-12-07 08:15:33', '2021-12-07 08:15:56', '0'),
(306, 104, 0, 'QR-001-L7', '2021-12-07 08:14:56', '2021-12-07 08:15:56', '0'),
(307, 104, 0, 'QR-004-L6', '2021-12-07 08:15:34', '2021-12-07 08:15:56', '0'),
(308, 104, 0, 'QR-003-L6', '2021-12-07 08:16:33', '2021-12-07 08:16:38', '0'),
(309, 104, 0, 'QR-002-L1', '2021-12-07 08:16:30', '2021-12-07 08:16:38', '0'),
(310, 104, 0, 'QR-001-L7', '2021-12-07 08:16:28', '2021-12-07 08:16:38', '0'),
(311, 104, 0, 'QR-004-L6', '2021-12-07 08:16:35', '2021-12-07 08:16:38', '0'),
(312, 5, 0, 'QR-003-L6', '2021-12-07 08:48:20', '2021-12-07 08:48:38', '0'),
(313, 5, 0, 'QR-004-L6', '2021-12-07 08:48:22', '2021-12-07 08:48:38', '0'),
(314, 5, 0, 'QR-002-L1', '2021-12-07 08:48:18', '2021-12-07 08:48:38', '0'),
(315, 5, 0, 'QR-001-L7', '2021-12-07 08:48:12', '2021-12-07 08:48:38', '0'),
(316, 5, 0, 'QR-005-L6', '2021-12-07 08:48:25', '2021-12-07 08:48:38', '0');

-- --------------------------------------------------------

--
-- Table structure for table `list_visitor`
--

CREATE TABLE `list_visitor` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jadwal` varchar(100) DEFAULT NULL,
  `qr_code` varchar(100) DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `masuk` varchar(50) DEFAULT NULL,
  `keluar` varchar(50) DEFAULT NULL,
  `create` varchar(50) DEFAULT NULL,
  `update` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_visitor`
--

INSERT INTO `list_visitor` (`id`, `id_user`, `nama`, `jadwal`, `qr_code`, `keperluan`, `description`, `masuk`, `keluar`, `create`, `update`) VALUES
(24, 'selesai', 'master', '2021-11-02 08:54', 'JJSKKSKKKSKKSKS', 'facf afasdf', 'fadsfadf', '1635818135', '1635818166', '02-Nov-2021 08:54:43 AM By ringga', NULL),
(37, 'berjalan', 'ringga septia pribadi', '2021-11-24 11:16', 'sbQeHWxZBtjNvSlodYOr', 'facf afasdf', 'sdsfs adf adf', '1637723785', NULL, '24-Nov-2021 10:16:19 AM By master', NULL),
(38, 'plan', 'dasda', '2021-11-25 00:16', 'iLzxVJFmPnDOukXcMETB', 'adfa', 'fadsfadf', NULL, NULL, '24-Nov-2021 10:16:52 AM By master', NULL),
(39, 'selesai', 'ringga septia pribadi', '2021-11-25 16:00', 'QdHZjeYOglBLaskIJEzc', ' kunjungan', 'on time ', '1637827923', '1637827959', '25-Nov-2021 03:01:56 PM By master', NULL),
(40, 'selesai', 'ma', '2021-12-07 00:08', 'hICkgsamQEtTyvelwFZK', 'fda', 'asdfa', '1638846528', '1638846567', '07-Dec-2021 10:08:38 AM By master', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_absen_etowa`
--

CREATE TABLE `mas_absen_etowa` (
  `id` int(11) NOT NULL,
  `id_bet` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_absen_etowa`
--

INSERT INTO `mas_absen_etowa` (`id`, `id_bet`, `date`, `time`) VALUES
(68, '8811', '2021-12-15 13:51:40', '1639551100'),
(70, '8811', '2021-12-10 07:51:44', '1639097504'),
(71, '8811', '2021-12-10 17:20:01', '1639381441'),
(72, '8811', '2021-12-13 07:53:35', '1639382915'),
(73, '8811', '2021-12-13 17:26:21', '1639383981'),
(74, '8811', '2021-12-14 07:52:37', '1639443157'),
(75, '8811', '2021-12-14 12:02:35', '1639458155'),
(76, '8811', '2021-12-14 13:03:22', '1639461802'),
(77, '8811', '2021-12-14 17:13:45', '1639476825'),
(78, '8811', '2021-12-15 07:50:56', '1639529456'),
(79, '8811', '2021-12-15 15:01:44', '1639555304'),
(80, '3', '2021-12-15 15:01:52', '1639555312');

-- --------------------------------------------------------

--
-- Table structure for table `mas_aksesmenu`
--

CREATE TABLE `mas_aksesmenu` (
  `id` int(11) NOT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_aksesmenu`
--

INSERT INTO `mas_aksesmenu` (`id`, `posisi`, `menu_id`) VALUES
(1, 'admin', 1),
(2, 'admin', 2),
(3, 'admin', 3),
(4, 'admin', 4),
(5, 'adminUndia', 5),
(6, 'admin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mas_failed_for_finger`
--

CREATE TABLE `mas_failed_for_finger` (
  `id` int(11) NOT NULL,
  `id_bet` varchar(50) DEFAULT NULL,
  `stts` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_failed_for_finger`
--

INSERT INTO `mas_failed_for_finger` (`id`, `id_bet`, `stts`, `keterangan`, `date`) VALUES
(1, '21-4617', 'dfadfadfa', 'keluar', '2021-11-24 16:51:20'),
(2, '21-4617', 'keluar', 'dfadfadfa', '2021-11-24 16:53:53'),
(3, '21-4617', 'masuk', 'dfadfadfa', '2021-11-25 08:41:13'),
(4, '21-4617', 'keluar', 'dfadfadfa', '2021-11-25 08:41:22'),
(5, 'it-2021', 'keluar', 'gdudhdhshhdg', '2021-11-25 08:59:08'),
(7, '21-4917', 'masuk', 'bzjz', '2021-11-30 13:08:50'),
(8, '21-4618', 'keluar', 'basah', '2021-12-06 14:22:56'),
(9, '21-4619', 'keluar', 'hdh', '2021-12-06 14:23:11'),
(10, '18447064', 'keluar', 'chf', '2021-12-06 15:05:41'),
(11, '21-4618', 'keluar', 'fbfb', '2021-12-07 08:20:27'),
(12, '21-4619', 'keluar', 'cddd', '2021-12-07 10:27:56'),
(13, '21-4619', 'keluar', 'vdidbdhvdhdbd', '2021-12-07 10:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `mas_late_user`
--

CREATE TABLE `mas_late_user` (
  `id` int(11) NOT NULL,
  `id_bet` varchar(50) DEFAULT NULL,
  `id_shift` int(11) DEFAULT NULL,
  `stts` int(1) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_late_user`
--

INSERT INTO `mas_late_user` (`id`, `id_bet`, `id_shift`, `stts`, `alasan`, `date`, `time`) VALUES
(41, '21-4917', 2, 1, NULL, '2021-11-10 16:40:54', '1636537254'),
(42, '21-4917', 2, 1, NULL, '2021-11-11 08:33:05', '1636594385'),
(43, '21-4917', 2, 1, NULL, '2021-11-12 08:12:44', '1636679564'),
(45, '21-4917', 2, 1, NULL, '2021-11-22 08:12:49', '1637543569'),
(47, '21-4917', 2, 2, 'gauhssb', '2021-11-22 15:17:07', '1637569027'),
(48, '21-4917', 2, 2, 'gsgsga', '2021-11-23 08:43:39', '1637631819'),
(49, '21-4917', 2, 1, 'fcdx', '2021-11-23 08:47:49', '1637632069'),
(50, '21-4917', 2, 1, 'vsjsv', '2021-11-24 10:53:38', '1637726018'),
(54, '21-4917', 2, 2, 'mkan siang', '2021-11-30 13:06:27', '1638252387'),
(55, '21-4917', 2, 1, 'cgcgfdf', '2021-11-30 13:10:06', '1638252606'),
(56, '21-4617', 2, 1, 'vhggs', '2021-12-06 15:03:55', '1638777835'),
(57, '21-4618', 2, 1, 'dgdg', '2021-12-07 08:19:38', '1638839978'),
(58, '21-4619', 2, 1, 'rgff', '2021-12-07 08:21:14', '1638840074');

-- --------------------------------------------------------

--
-- Table structure for table `mas_menu`
--

CREATE TABLE `mas_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `app` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `stts` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_menu`
--

INSERT INTO `mas_menu` (`id`, `menu`, `app`, `icon`, `stts`) VALUES
(1, 'Admin', 'security', ' fa-cogs', 'true'),
(2, 'patrol', 'security', 'fa-user-shield', 'true'),
(3, 'Visitor', 'security', 'fa-address-book', 'true'),
(4, 'User', 'security', 'fa-users', 'true'),
(5, 'undia', 'security', 'fa-random', 'true'),
(6, 'Izin', 'security', 'fa-user-check', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `mas_qr_location`
--

CREATE TABLE `mas_qr_location` (
  `id` int(11) NOT NULL,
  `qr` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `dec` text DEFAULT NULL,
  `stts` varchar(50) DEFAULT NULL,
  `lot` int(11) DEFAULT NULL,
  `log` text DEFAULT NULL,
  `create` varchar(50) DEFAULT NULL,
  `update` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_qr_location`
--

INSERT INTO `mas_qr_location` (`id`, `qr`, `image`, `dec`, `stts`, `lot`, `log`, `create`, `update`) VALUES
(22, 'QR-001-L7', NULL, '<p>Pastikan:</p><ul><li><span style=\"font-size: 1rem;\">Keran dalam keadaan tertutup/ tidak bocor.</span></li></ul><p></p><p></p>', 'CP1 Keran air area LOT-7', 7, ', ', '01-Nov-2021 11:03:04 AM', '09-Dec-2021 08:25:55 AM By master'),
(23, 'QR-002-L1', NULL, '<p>Pastikan:</p><ul><li>Motor parkir dengan teratur.</li><li>Tidak ada bensin yg bocor / tumpah dari motor.</li><li>Tidak ada barang2 penting yg tertinggal di motor.</li></ul>', 'CP2 Motor park area LOT-7', 7, ', ', '01-Nov-2021 11:05:02 AM', '09-Dec-2021 08:22:06 AM By master'),
(24, 'QR-003-L6', NULL, '<p>Pastikan:</p><ul><li>Tidak ada bekas puntung rokok yang masih menyala.</li><li>Karyawan yg sedang di area smoking adalah jam istirahat/ break.</li><li>Karyawan hanya merokok. Tidak makan2 di area smoking.</li></ul>', 'CP3 Smoking area LOT-6', 6, ', ', '01-Nov-2021 11:06:55 AM', '09-Dec-2021 08:22:25 AM By master'),
(25, 'QR-004-L6', NULL, '<p>Pastikan:</p><ul><li>Pintu reception terkunci jika diluar jam kerja/ hari libur.</li><li>Keran kolam tidak bocor/ air tidak tumpah2.</li><li>Air mancur pastikan menyala.</li></ul>', 'CP4 Pintu reception & Kolam LOT-6', 6, ', ', '01-Nov-2021 11:07:33 AM', '09-Dec-2021 08:22:45 AM By master'),
(26, 'QR-005-L6', NULL, '<p>Pastikan:</p><ul><li>Semua keran air tertutup, tidak ada yg bocor.</li><li>Lampu mati jika tidak ada orang didalam/ cek kartu sensor.</li></ul>', 'CP5 Toilet Cewek LOT-6', 6, ', ', '01-Nov-2021 11:08:11 AM', '09-Dec-2021 08:23:02 AM By master'),
(28, 'QR-007-L7', NULL, '<p>Pastikan:</p><ul><li>Lampu dan kipas angin dalam keadaan mati jika tidak digunakan.</li></ul>', 'CP7 Locker area LOT-7', 7, ', ', '01-Nov-2021 11:10:21 AM', '09-Dec-2021 08:23:36 AM By master'),
(29, 'QR-006-L7', NULL, '<p>Pastikan:</p><ul><li>Semua keran air tertutup, tidak ada yg bocor.</li><li>Lampu mati jika tidak ada orang didalam/ cek kartu sensor.</li><li>Keran dispenser dalam keadaan tertutup/ tidak bocor.</li></ul>', 'CP6 Toilet Cowok & Dispenser area LOT-7', 7, ', ', '01-Nov-2021 11:11:39 AM', '09-Dec-2021 08:23:24 AM By master'),
(30, 'QR-008-L7', NULL, '<p>Pastikan:</p><ul><li>Lampu dan kipas angin dalam keadaan mati jika tidak ada orang.</li><li>Pastika keran air di tempat cuci dalam keadaan tertutup dan tidak bocor.</li></ul>', 'CP8 Kantin area LOT-7', 7, ', ', '01-Nov-2021 11:12:19 AM', '09-Dec-2021 08:21:12 AM By master'),
(31, 'QR-009-L6', NULL, '<p>Pastikan:</p><ul><li>Pintu office dalam keadaan terkunci jika diluar jam kerja/ hari libur.</li></ul>', 'CP9 Pintu office LOT-6', 6, ', ', '01-Nov-2021 11:13:25 AM', '09-Dec-2021 08:23:49 AM By master'),
(32, 'QR-010-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP10 EPS-GP area LOT-6 Lt.2', 6, ', ', '01-Nov-2021 11:14:16 AM', '09-Dec-2021 08:24:03 AM By master'),
(33, 'QR-011-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP11 Store area & panel LOT-6', 6, ', ', '01-Nov-2021 11:15:30 AM', '09-Dec-2021 08:24:24 AM By master'),
(34, 'QR-012-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li><li>Pintu arah office selalu dalam keadaan terkunci.</li></ul>', 'CP12 Carrier tape & gangway LOT-6', 6, ', ', '01-Nov-2021 11:16:07 AM', '09-Dec-2021 08:27:56 AM By master'),
(35, 'QR-013-L6', NULL, '<p>Pastika:</p><ul><li>Lampu dalam ke adaan OFF dia luar jam kerja / libur</li></ul>', 'CP13 EPS Bawah LOT-6', 6, ', ', '01-Nov-2021 11:16:39 AM', '09-Dec-2021 08:51:05 AM By master'),
(37, 'QR-014-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP14 Cut sheet area LOT-6', 6, ', ', '01-Nov-2021 11:18:32 AM', '09-Dec-2021 08:27:10 AM By master'),
(38, 'QR-015-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li><li>Pintu ditutup pada saat diluar jam kerja/ hari libur.</li></ul>', 'CP15 Laser Room & Block LOT-6', 6, ', ', '01-Nov-2021 11:19:16 AM', '09-Dec-2021 08:46:04 AM By master'),
(39, 'QR-016-L1', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li><li>Tidak ada kebocoran pipa air/ pipa gas.</li></ul>', 'CP16 Boiler &amp; Compressor', 6, ', ', '01-Nov-2021 11:20:01 AM', '09-Dec-2021 08:26:20 AM By master'),
(40, 'QR-017-L6', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP17 Expander Area LOT-6 ', 6, ', ', '01-Nov-2021 11:20:38 AM', '09-Dec-2021 08:26:36 AM By master'),
(41, 'QR-018-L7', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP18 Store Material LOT-7', 7, ', ', '01-Nov-2021 11:21:29 AM', '09-Dec-2021 08:45:38 AM By master'),
(42, 'QR-019-L7', NULL, '<p>Pastikan:</p><ul><li>Tidak ada kebocoran di area Tangki minyak, dan cairan B3.</li></ul>', 'CP19 Scrap & B3 Area LOT-7', 7, ', ', '01-Nov-2021 11:22:07 AM', '09-Dec-2021 08:24:52 AM By master'),
(43, 'QR-020-L7', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP20 Cutting area LOT-7', 7, ', ', '01-Nov-2021 11:22:36 AM', '09-Dec-2021 08:24:38 AM By master'),
(44, 'QR-021-L7', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP21 VF Room & Tooling LOT-7', 7, ', ', '01-Nov-2021 11:23:18 AM', '09-Dec-2021 08:28:10 AM By master'),
(45, 'QR-022-L7', NULL, 'doc', 'CP22 Platform VF Lt. 2', 7, ', ', '01-Nov-2021 11:24:45 AM', NULL),
(46, 'QR-023-L7', NULL, '<p>Pastikan:</p><ul><li>Listrik dan lampu dalam keadaan OFF jika diluar jam kerja/ hari libur.</li></ul>', 'CP23 Panel Listrik area LOT-7', 7, ', ', '01-Nov-2021 11:25:19 AM', '09-Dec-2021 08:28:30 AM By master');

-- --------------------------------------------------------

--
-- Table structure for table `mas_shift`
--

CREATE TABLE `mas_shift` (
  `id` int(11) NOT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `masuk` varchar(50) DEFAULT NULL,
  `keluar` varchar(50) DEFAULT NULL,
  `m_rest` varchar(50) DEFAULT NULL,
  `s_rest` varchar(50) DEFAULT NULL,
  `create` varchar(50) DEFAULT NULL,
  `update` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_shift`
--

INSERT INTO `mas_shift` (`id`, `shift`, `masuk`, `keluar`, `m_rest`, `s_rest`, `create`, `update`) VALUES
(2, 'Production VF/GP/QA/Engg (shift 1)', '06:00', '15:00', '11:00', '12:00', '2021-Nov-10 10:30:22 AM master', '2021-Nov-25 02:59:57 PM by master'),
(3, 'Production VF/GP/QA/Engg (shift 2)', '15:00', '00:00', '19:00', '20:00', '2021-Nov-10 10:31:46 AM by master', '2021-Nov-22 02:25:29 PM by master'),
(5, 'Production VF/GP/QA/Engg (shift 3)', '00:00', '08:00', '04:00', '05:00', '2021-Nov-22 10:19:49 AM by master', '2021-Nov-22 02:26:04 PM by master');

-- --------------------------------------------------------

--
-- Table structure for table `mas_submenu`
--

CREATE TABLE `mas_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `sub_menu` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `stts` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_submenu`
--

INSERT INTO `mas_submenu` (`id`, `menu_id`, `sub_menu`, `url`, `stts`) VALUES
(1, 1, 'Menu', 'admin/menu', 'false'),
(2, 1, 'User Managemen', 'admin/user', 'true'),
(3, 1, 'User Managemen App', 'admin/user_app', 'true'),
(4, 2, 'QR location', 'admin/qr_location', 'true'),
(5, 3, 'Daftar Visitor', 'admin/visitor', 'true'),
(6, 2, 'History Patrol', 'admin/history_patrol', 'true'),
(7, 4, 'All user', 'admin/all_users', 'true'),
(8, 4, 'User Location', 'admin/user_location', 'false'),
(9, 5, 'User', 'home/user_undia', 'true'),
(10, 5, 'Hadia', 'home/user_hadia', 'true'),
(11, 5, 'user X hadia', 'home/user_mendapat', 'true'),
(12, 5, 'User Scan', 'home/user_scan', 'true'),
(13, 6, 'Izin User', 'admin/izin', 'true'),
(14, 6, 'Late Users', 'admin/late_user', 'true'),
(15, 1, 'Shift', 'admin/shift', 'true'),
(16, 4, 'failed for finger', 'admin/failed_for_finger', 'true'),
(17, 4, 'Absen User Etowa', 'admin/absen_user_etowa', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `mas_user_location`
--

CREATE TABLE `mas_user_location` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mas_user_scan`
--

CREATE TABLE `mas_user_scan` (
  `id` int(11) NOT NULL,
  `id_bet` varchar(50) DEFAULT NULL,
  `w_masuk` varchar(100) DEFAULT NULL,
  `w_keluar` varchar(100) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `menuju` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_user_scan`
--

INSERT INTO `mas_user_scan` (`id`, `id_bet`, `w_masuk`, `w_keluar`, `dari`, `menuju`, `date`) VALUES
(25, 'it-2021', '1637733803', '1637724332', 'lot1', 'lot 6', '2021-11-24'),
(26, '21-4617', '1637724387', '1637724379', 'lot1', 'lot 6', '2021-11-24'),
(27, '21-4617', '1637724842', '1637724740', 'lot 7', 'lot 1', '2021-11-24'),
(29, '21-4917', '1638328680', '1638328652', 'lot1', 'lot 6', '2021-12-01'),
(30, '21-4618', '1638775495', '1638775454', 'lot1', 'lot 6', '2021-12-06'),
(31, '21-4619', '1638775496', '1638775456', 'lot1', 'lot 6', '2021-12-06'),
(32, '21-4620', '1638775490', '1638775463', 'lot1', 'lot 6', '2021-12-06'),
(33, '21-4617', '1638775493', '1638775465', 'lot1', 'lot 6', '2021-12-06'),
(34, '21-4618', '1638775609', '1638775567', 'vxjsv', 'ghzg', '2021-12-06'),
(35, '21-4619', '1638775613', '1638775581', 'vxjsv', 'ghzg', '2021-12-06'),
(36, '21-4620', '1638775605', '1638775586', 'vxjsv', 'ghzg', '2021-12-06'),
(37, '21-4617', '1638775606', '1638775587', 'vxjsv', 'ghzg', '2021-12-06'),
(38, '21-4617', '1638777912', '1638777899', 'fhg', 'gh', '2021-12-06'),
(39, '21-4618', '1638839955', '1638839918', 'lot1', 'lot 6', '2021-12-07'),
(40, '21-4619', '1638848555', '1638848290', 'lot1', 'lot 6', '2021-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblweb_privilege`
--

CREATE TABLE `tblweb_privilege` (
  `id` int(11) NOT NULL,
  `privilege_name` varchar(126) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblweb_privilege`
--

INSERT INTO `tblweb_privilege` (`id`, `privilege_name`) VALUES
(1, 'IT'),
(2, 'PRODUCTION'),
(3, 'PLANNER'),
(4, 'CS'),
(5, 'QA'),
(6, 'TECHNICAL'),
(7, 'STORE'),
(8, 'VF'),
(9, 'GP'),
(10, 'EPS'),
(11, 'QC'),
(12, 'TOOLING'),
(13, 'ENG'),
(14, 'ACC'),
(15, 'MTK'),
(16, 'DESIGN'),
(17, 'PG & PE'),
(18, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `user_app`
--

CREATE TABLE `user_app` (
  `id` int(11) NOT NULL,
  `id_finger` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_bet` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_phone` varchar(255) DEFAULT NULL,
  `devisi` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `enable_login` int(11) DEFAULT NULL,
  `created` varchar(100) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_app`
--

INSERT INTO `user_app` (`id`, `id_finger`, `name`, `id_bet`, `email`, `no_phone`, `devisi`, `password`, `image`, `enable_login`, `created`, `created_by`, `update_by`) VALUES
(5, '1', 'tes', '21-4617', 'tes@gmail.com', '67456747', 'security', '$2y$10$nXT6l7uV8JZKL4ld/SUkt..o1wXFXAopneA06GfF2i0ruYI1Wc7g2', 'user.jpg', 1, '2021-09-01 12:02:14 PM', 'user', NULL),
(16, '2', 'tes 2', 'it-2021', 'tes2@gmail.com', '08228462115221', 'IT', '$2y$10$ZHrA6G/h0YQzIxeBup7WXO1muipZHthThm1udk9vuVlXENQuDCbga', 'user.jpg', 1, '2021-Nov-12 11:28:43 AM', 'master', '2021-Nov-25 02:58:32 PM By master'),
(101, '3', 'ringga septia pribadi', '21-4917', 'admin@gmail.com', '082284621151', 'IT', '$2y$10$0HTUELw972eWI0WLsM0Nn.3n0qHQWfUe6ObpbopNrC4D5NT2uGIF2', 'user.jpg', 1, '2021-Nov-26 04:09:45 PM', 'master', '2021-Nov-30 01:06:09 PM By master'),
(102, '4', 'Siff Siang', '39', 'ringgamungo97@gmail.com', '08228462115789789', 'PLANNER', '$2y$10$dNB8fCOoSpb6z5pYFcOuX.FW8ZpsJ6aSo.yN/hO04n52SUdsiM7dG', 'user.jpg', 1, '2021-Nov-26 04:44:49 PM', 'master', NULL),
(103, '5', 'tes 3', '21-4618', 'tes18@gmail.com', '12344564', 'security', '$2y$10$4peERJkUk/C.EEWKzHwKou23vA66sUMXOli6PhfkQOddCkJtQPnf.', 'user.jpg', 1, '2021-Nov-29 10:50:18 AM', 'master', NULL),
(104, '6', 'tes 4', '21-4619', 'tes19@gmail.com', '234353535', 'security', '$2y$10$OK0ffyPS3KyusoW8u87A.uDV1pIh8hp5ydzSKVUk1ak8kHFdQ9z2S', 'user.jpg', 1, '2021-Nov-29 10:50:52 AM', 'master', NULL),
(105, '7', 'tes 5', '21-4620', 'tes20@gmail.com', '78967897897', 'STORE', '$2y$10$W2K/0DFfoAErddDCNhDqRelXngAFHsMnwB7719UEfa4G.edqX.6vG', 'user.jpg', 1, '2021-Nov-29 10:51:23 AM', 'master', NULL),
(106, '8811', 'Aldi Taher Trial', '21-0008', 'alditaher@gmail.com', '1453245657656', 'IT', '$2y$10$ONcwe.ezCu7exb7ezPROFOEfSY7BpJ4yBBC/Nm8bA5Uiq0M7xfulG', 'user.jpg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `bet_id` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `exp` varchar(50) DEFAULT NULL,
  `firebase` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`bet_id`, `token`, `exp`, `firebase`) VALUES
('5', '2y10HbDmvj3QVOaRzlUHipueKu4obP2hjfO5qfNCBqqjOpPZoyC8Hu1S', '1638849222', NULL),
('15', '2y10dYtoTWeKyq40UzcwkfINNOJTTQt6aO2brAr7AoLC2X6eJl7fFWYRO', '1638849222', NULL),
('16', '2y10jGp0xhmxaiDcFLT9vvjAu8ufRtgh1LXACfJ0tT2DynHkeWKubxi', '1638849222', NULL),
('101', '2y10z2HHiH67D1ushbEuJWqsjMA2dRV9gJPLWCoEwdEV8veSzozPe', '1638849222', NULL),
('104', '2y10jXgC3fhCqXTgC2mV0HGYAeVmPCRWfPsVedk61gJcPsIzEzho4wihK', '1638849222', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_undian`
--

CREATE TABLE `user_undian` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `bet_id` varchar(50) DEFAULT NULL,
  `hadiah` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `create` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_undian`
--

INSERT INTO `user_undian` (`id`, `name`, `bet_id`, `hadiah`, `is_active`, `create`) VALUES
(1, 'ringga2', 'it-2021', 0, 0, '1637806426'),
(2, 'ringga septia pribadi', '21-21121', 0, 1, '25-Nov-2021 03:05:59 PM by admin'),
(3, 'tes', '21-4617', 0, 1, '1637910081'),
(4, 'ringga septia pribadi', '4531', 0, 1, '1637917798'),
(5, 'Aldi Taher Trial', '21-0008', 0, 1, '1639551065'),
(6, 'ringga septia pribadi', '21-4917', 0, 1, '1639557954');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_web`
--
ALTER TABLE `admin_web`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `app_company`
--
ALTER TABLE `app_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiah_undia`
--
ALTER TABLE `hadiah_undia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_patrol`
--
ALTER TABLE `list_patrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `list_visitor`
--
ALTER TABLE `list_visitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qr_code` (`qr_code`);

--
-- Indexes for table `mas_absen_etowa`
--
ALTER TABLE `mas_absen_etowa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bet` (`id_bet`);

--
-- Indexes for table `mas_aksesmenu`
--
ALTER TABLE `mas_aksesmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `mas_failed_for_finger`
--
ALTER TABLE `mas_failed_for_finger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_late_user`
--
ALTER TABLE `mas_late_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_menu`
--
ALTER TABLE `mas_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mas_qr_location`
--
ALTER TABLE `mas_qr_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_shift`
--
ALTER TABLE `mas_shift`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mas_submenu`
--
ALTER TABLE `mas_submenu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_id` (`menu_id`) USING BTREE;

--
-- Indexes for table `mas_user_location`
--
ALTER TABLE `mas_user_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_user_scan`
--
ALTER TABLE `mas_user_scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblweb_privilege`
--
ALTER TABLE `tblweb_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_app`
--
ALTER TABLE `user_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD KEY `id_user` (`bet_id`) USING BTREE;

--
-- Indexes for table `user_undian`
--
ALTER TABLE `user_undian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bet_id` (`bet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_company`
--
ALTER TABLE `app_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hadiah_undia`
--
ALTER TABLE `hadiah_undia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `list_patrol`
--
ALTER TABLE `list_patrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `list_visitor`
--
ALTER TABLE `list_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mas_absen_etowa`
--
ALTER TABLE `mas_absen_etowa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `mas_aksesmenu`
--
ALTER TABLE `mas_aksesmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mas_failed_for_finger`
--
ALTER TABLE `mas_failed_for_finger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mas_late_user`
--
ALTER TABLE `mas_late_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mas_menu`
--
ALTER TABLE `mas_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mas_qr_location`
--
ALTER TABLE `mas_qr_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mas_shift`
--
ALTER TABLE `mas_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mas_submenu`
--
ALTER TABLE `mas_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mas_user_location`
--
ALTER TABLE `mas_user_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2456;

--
-- AUTO_INCREMENT for table `mas_user_scan`
--
ALTER TABLE `mas_user_scan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblweb_privilege`
--
ALTER TABLE `tblweb_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user_undian`
--
ALTER TABLE `user_undian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
