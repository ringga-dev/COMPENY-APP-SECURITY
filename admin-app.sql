-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 07:09 AM
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
(317, 5, 0, 'QR-005-L6', '2021-12-22 08:55:45', '2021-12-22 08:56:02', '0'),
(318, 5, 0, 'QR-002-L1', '2021-12-22 08:55:40', '2021-12-22 08:56:02', '0'),
(319, 5, 0, 'QR-004-L6', '2021-12-22 08:55:43', '2021-12-22 08:56:02', '0'),
(320, 5, 0, 'QR-001-L7', '2021-12-22 08:55:38', '2021-12-22 08:56:02', '0'),
(321, 5, 0, 'QR-003-L6', '2021-12-22 08:55:42', '2021-12-22 08:56:02', '0'),
(322, 5, 0, 'QR-006-L7', '2021-12-22 08:55:48', '2021-12-22 08:56:02', '0'),
(323, 5, 0, 'QR-008-L7', '2021-12-22 08:55:51', '2021-12-22 08:56:02', '0'),
(324, 5, 0, 'QR-007-L7', '2021-12-22 08:55:49', '2021-12-22 08:56:02', '0'),
(325, 5, 0, 'QR-001-L7', '2021-12-22 13:34:16', '2021-12-22 13:34:35', '0'),
(326, 5, 0, 'QR-004-L6', '2021-12-22 13:34:23', '2021-12-22 13:34:35', '0'),
(327, 5, 0, 'QR-002-L1', '2021-12-22 13:34:20', '2021-12-22 13:34:35', '0'),
(328, 5, 0, 'QR-003-L6', '2021-12-22 13:34:21', '2021-12-22 13:34:35', '0'),
(329, 5, 0, 'QR-005-L6', '2021-12-22 13:34:24', '2021-12-22 13:34:35', '0'),
(330, 5, 0, 'QR-006-L7', '2021-12-22 13:34:25', '2021-12-22 13:34:35', '0'),
(331, 5, 0, 'QR-007-L7', '2021-12-22 13:34:27', '2021-12-22 13:34:35', '0'),
(332, 5, 0, 'QR-009-L6', '2021-12-22 13:34:31', '2021-12-22 13:34:35', '0'),
(333, 5, 0, 'QR-008-L7', '2021-12-22 13:34:28', '2021-12-22 13:34:35', '0'),
(334, 5, 0, 'QR-007-L7', '2021-12-22 13:35:09', '2021-12-22 13:35:18', '0'),
(335, 5, 0, 'QR-009-L6', '2021-12-22 13:34:57', '2021-12-22 13:35:18', '0'),
(336, 5, 0, 'QR-006-L7', '2021-12-22 13:35:10', '2021-12-22 13:35:18', '0'),
(337, 5, 0, 'QR-010-L6', '2021-12-22 13:35:04', '2021-12-22 13:35:18', '0'),
(338, 5, 0, 'QR-008-L7', '2021-12-22 13:35:06', '2021-12-22 13:35:18', '0'),
(339, 5, 0, 'QR-002-L1', '2021-12-22 13:38:51', '2021-12-22 13:38:55', '0'),
(340, 5, 0, 'QR-021-L7', '2021-12-24 15:07:40', '2021-12-24 15:13:03', '0'),
(341, 5, 0, 'QR-023-L7', '2021-12-24 15:07:32', '2021-12-24 15:13:03', '0'),
(342, 5, 0, 'QR-020-L7', '2021-12-24 15:07:45', '2021-12-24 15:13:03', '0'),
(343, 5, 0, 'QR-019-L7', '2021-12-24 15:07:48', '2021-12-24 15:13:03', '0'),
(344, 5, 0, 'QR-022-L7', '2021-12-24 15:07:36', '2021-12-24 15:13:03', '0'),
(345, 5, 0, 'QR-013-L6', '2021-12-24 15:09:08', '2021-12-24 15:13:04', '0'),
(346, 5, 0, 'QR-018-L7', '2021-12-24 15:07:54', '2021-12-24 15:13:04', '0'),
(347, 5, 0, 'QR-017-L6', '2021-12-24 15:08:38', '2021-12-24 15:13:04', '0'),
(348, 5, 0, 'QR-015-L6', '2021-12-24 15:09:01', '2021-12-24 15:13:04', '0'),
(349, 5, 0, 'QR-016-L1', '2021-12-24 15:08:56', '2021-12-24 15:13:04', '0'),
(350, 5, 0, 'QR-009-L6', '2021-12-24 15:09:22', '2021-12-24 15:13:04', '0'),
(351, 5, 0, 'QR-014-L6', '2021-12-24 15:09:11', '2021-12-24 15:13:04', '0'),
(352, 5, 0, 'QR-011-L6', '2021-12-24 15:09:15', '2021-12-24 15:13:04', '0'),
(353, 5, 0, 'QR-012-L6', '2021-12-24 15:09:18', '2021-12-24 15:13:04', '0'),
(354, 5, 0, 'QR-010-L6', '2021-12-24 15:09:26', '2021-12-24 15:13:04', '0'),
(355, 5, 0, 'QR-008-L7', '2021-12-24 15:09:28', '2021-12-24 15:13:04', '0'),
(356, 5, 0, 'QR-003-L6', '2021-12-24 15:09:48', '2021-12-24 15:13:04', '0'),
(357, 5, 0, 'QR-005-L6', '2021-12-24 15:09:42', '2021-12-24 15:13:04', '0'),
(358, 5, 0, 'QR-006-L7', '2021-12-24 15:09:31', '2021-12-24 15:13:04', '0'),
(359, 5, 0, 'QR-007-L7', '2021-12-24 15:09:37', '2021-12-24 15:13:04', '0'),
(360, 5, 0, 'QR-004-L6', '2021-12-24 15:09:58', '2021-12-24 15:13:05', '0'),
(361, 5, 0, 'QR-002-L1', '2021-12-24 15:09:51', '2021-12-24 15:13:05', '0'),
(362, 5, 0, 'QR-001-L7', '2021-12-24 15:09:54', '2021-12-24 15:13:05', '0');

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
(37, 'berjalan', 'ringga septia pribadi', '2021-11-24 11:16', 'sbQeHWxZBtjNvSlodYOr', 'facf afasdf', 'sdsfs adf adf', '1637723785', NULL, '24-Nov-2021 10:16:19 AM By master', NULL),
(38, 'plan', 'dasda', '2021-11-25 00:16', 'iLzxVJFmPnDOukXcMETB', 'adfa', 'fadsfadf', NULL, NULL, '24-Nov-2021 10:16:52 AM By master', NULL),
(40, 'selesai', 'ma', '2021-12-07 00:08', 'hICkgsamQEtTyvelwFZK', 'fda', 'asdfa', '1638846528', '1638846567', '07-Dec-2021 10:08:38 AM By master', NULL),
(41, 'plan', 'asep 1', '2021-12-22 00:51', 'uELTFzaCYcqRiQAwPVeI', 'kunjungan', 'memantau data produck', NULL, NULL, '22-Dec-2021 08:52:18 AM By master', NULL);

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
(91, '8811', '2021-12-16 13:54:21', '1639637661'),
(92, '4917', '2021-12-16 13:59:57', '1639637997'),
(93, '8811', '2021-12-16 14:04:24', '1639638264'),
(94, '8811', '2021-12-16 14:37:24', '1639640244'),
(99, '8811', '2021-12-16 14:43:28', '1639640608'),
(100, '4917', '2021-12-16 14:43:36', '1639640616'),
(101, '4917', '2021-12-17 16:01:08', '1639731668'),
(102, '8811', '2021-12-17 16:02:19', '1639731739'),
(103, '8811', '2021-12-22 13:49:48', '1640155788'),
(104, '4917', '2021-12-22 13:50:05', '1640155805'),
(105, '4917', '2021-12-23 17:02:22', '1640253742'),
(106, '8811', '2021-12-24 11:55:07', '1640321707'),
(107, '8811', '2021-12-24 16:07:49', '1640336869');

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
(14, '21-0008', 'keluar', 'mesin rusak', '2021-12-24 13:06:55');

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
(5, '1', 'tes', '21-4617', 'tes@gmail.com', '67456747', 'security', '$2y$10$nXT6l7uV8JZKL4ld/SUkt..o1wXFXAopneA06GfF2i0ruYI1Wc7g2', '1640336935_be00a299bc9714152300.jpg', 1, '2021-09-01 12:02:14 PM', 'user', NULL),
(106, '8811', 'Aldi Taher Trial', '21-0008', 'alditaher@gmail.com', '1453245657656', 'IT', '$2y$10$ONcwe.ezCu7exb7ezPROFOEfSY7BpJ4yBBC/Nm8bA5Uiq0M7xfulG', 'user.jpg', 2, NULL, NULL, NULL),
(107, '9001', 'Lee Kaw Hwa', '97-0001', 'Lee Kaw Hwa@gmail.com', NULL, 'GA241  Mr. Lee Kaw Hwa', '$2y$10$nTSWMI5lkPGsih00X6yn1.0anPf187tr7/hKIDkVvqLsG8pwSCIXW', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(108, '9218', 'Ria Gunawati', '99-0218', 'Ria Gunawati@gmail.com', '08388365520', 'GA271 Marketing Departemen', '$2y$10$QVV2R0W8ydpBOsRivsKaQOakbMcNiDwfKxJiGp1opocD/S9bDl8GS', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(109, '9296', 'Lastri Sri Untari', '00-0296', 'Lastri Sri Untari@gmail.com', '081277099673', 'PN151  Customer Service', '$2y$10$g9v2q5vinTIFJwddzvJHKe5NcnSKUXA63KeeGPcIWLvIQZrmdRYeO', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(110, '9330', 'Candra Denny Moris Sinaga', '00-0330', 'Candra Denny Moris Sinaga@gmail.com', '085272853336', 'PN153  Store Driver', '$2y$10$wkOvC1e0O9NPogJ6RuV/m.2h1IRVeMwdZ7hiOahfX0o2mld/8R3C2', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(111, '9370', 'Julita Sitinjak', '01-0370', 'Julita Sitinjak@gmail.com', '085374307161', 'PN171  Quality Control', '$2y$10$THpdMliZW9AwvxTXg02h2OxLWKAcYhkboCHKibLP/VgdwUCV15Q1u', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(112, '2271', 'Rahman Sibarani', '10-2271', 'Rahman Sibarani@gmail.com', '081364421172', 'PN183  General (Engineering)', '$2y$10$KkiPG/PQIKYCQK63Ck6lWeFjwziaAFlw14iaKQVb4.mLQoyoJMWte', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(113, '3887', 'Edy Wandy', '17-3887', 'Edy Wandy@gmail.com', '0778 371111', 'PN149  Production General', '$2y$10$usEBj4HpXBHfHFBA/ZqvEuI0KkvzGfFeON3TmTq09y9BAwgyj8hJ6', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(114, '4239', 'Jatmo Widodo', '18-4239', 'Jatmo Widodo@gmail.com', '081372372916', 'PN183  General (Engineering)', '$2y$10$kKoWgSn6VXzrEzwc69flUuHGXBe.VI6YTo4Obo7CDewoQUoRI6Zpm', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(115, '4322', 'Romaden Tamba ', '19-4322', 'Romaden Tamba@gmail.com', '081364386578', 'PN141  Production Engineering ', '$2y$10$XlWjbGrH4jeh/RCwE0j9aubNJxMHgpZItbOkPSwzRaddlKlUCw8Fy', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(116, '4351', 'Sarina ', '19-4351', 'Sarina@gmail.com', '082388031288', 'GA221  Account', '$2y$10$PyitS6b9SYL6MegmXFZrU.K4z6ASRVWj8CdJfKDiFowwY8jNUWOhi', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(117, '4362', 'Kembar Martua Sitompul ', '19-4362', 'Kembar Martua Sitompul@gmail.com', '085218288298', 'PN120  Vacuum Forming', '$2y$10$f7Y./jEEXjOEFaYsYnqgfetf7SdL.b9k0JuVFlyeGoH7yA0my7vQa', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(118, '4378', 'Kurnia wati ', '19-4378', 'Kurnia wati@gmail.com', '081270602453', 'PN151  Customer Service', '$2y$10$lMBo4sXmqwe6xlu4Gk4cf.DgnUbNd4J4QPcQWAJE67BDL9gXypb1y', 'user.jpg', 2, '2021-Dec-16 01:29:16 PM', 'master', NULL),
(119, '4432', 'Cadra Waldi ', '19-4432', 'Cadra Waldi@gmail.com', '082173207372', 'PN120  Vacuum Forming', '$2y$10$DTyupb/ikOP6FFzlMLlPUuA1ATSyJytSV/y8WrMg8VHV6tA79R3Zy', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(120, '4435', 'Eka Yulia ', '19-4435', 'Eka Yulia@gmail.com', '081364442171', 'PN171  Quality Control', '$2y$10$ZK/B3yiNfDFg.1Cdlfm/qezo6c8g95A6LgBm/D9BSWOKes8lX.L/2', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(121, '4516', 'Mahlil Tarore ', '19-4516', 'Mahlil Tarore@gmail.com', '082366043786', 'PN163 General (Tooling)', '$2y$10$KdFnYjHMrfM.V2fJpl730eonHE/TdBzrysytVzqufBIPId/aGPFSW', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(122, '4523', 'Restu Fajar Pamungkas', '19-4523', 'Restu Fajar Pamungkas@gmail.com', '085765701703', 'GA214  Cleaning Service', '$2y$10$w8S3K/xF/C1G0DSLZ64Cn.2CxMDNA.rIsB6vRX5EO2wHtkviS6ci.', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(123, '4531', 'Donny Perdana', '19-4531', 'Donny Perdana@gmail.com', '085267111953', 'PN152  Store', '$2y$10$A.4HBUPw0LNASlSuptyqj.gMPlxY1KGZUlTtKaPcrZ7GZp/j/1qoK', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(124, '4540', 'Maya Sari', '19-4540', 'Maya Sari@gmail.com', '081261519120', 'GA221  Account', '$2y$10$nPKk7HTIyGDFJcLgU1EbOeDERCb0dxKq2Dc8JbXy1xDsl9E2ZjTQO', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(125, '4542', 'Edy Wardy', '19-4542', 'Edy Wardy@gmail.com', '082126686699', 'PN152  Store', '$2y$10$X.ERIG0H80rxsRXRdt0tW.cRbhci5DVSpmgGyk8OeR2c6rfncNPjy', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(126, '4549', 'Akhir Muda Hasibuan', '20-4549', 'Akhir Muda Hasibuan@gmail.com', '082163929212', 'PN152  Store', '$2y$10$/uaAokqfWALgExucBAVIpORY9wi4XSuN9EpTsNFqzk35dCuQ6bENS', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(127, '4564', 'Arpiandi', '20-4564', 'Arpiandi@gmail.com', '082286993775', 'PN110  EPS/EPE', '$2y$10$PzU3wS/28tbIA3mvFSxpxO8pC7.j1S4R4GrQDpN0jaQyKIIxTpi9C', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(128, '4566', 'Kepin', '20-4566', 'Kepin@gmail.com', '082286893187', 'PN141  Production Engineering ', '$2y$10$y10RF2l.voaLmMR3Kp6UbOF2nw5ly2KwsJzjBXjM8q11eW7Vgn8wK', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(129, '4571', 'Yunita Sahari', '20-4571', 'Yunita Sahari@gmail.com', '085765512370', 'PN151  Customer Service', '$2y$10$J6wAjsF3Thwr6uNpbSGrzu4i7xwxJqJdsrB3FjAVxMZUS12NsGspO', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(130, '4572', 'Harman Adi', '20-4572', 'Harman Adi@gmail.com', '081364025201', 'PN152  Store', '$2y$10$5WA1COzRlfH7WFFegOEWRe8tr1XZxH4gOVo4F/GBJpYWwArCE.s6.', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(131, '4605', 'Yolanda Herawati', '20-4605', 'Yolanda Herawati@gmail.com', '085977804694', 'PN171  Quality Control', '$2y$10$sH7tK6X8735wIUz1L0562uSZ7I3HZ1U7gQ5KoTRBlzlhl0FshW6PS', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(132, '4607', 'A. Sadudin', '20-4607', 'A. Sadudin@gmail.com', '085805488286', 'PN152  Store', '$2y$10$6RYAHVJphDq7HtndWvgQPOx3lcqJmasbsaap9HSs77RzfLkR82xMW', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(133, '4670', 'Muhammad Ikhsan', '20-4670', 'Muhammad Ikhsan@gmail.com', '089623580848', 'PN130  General Packaging', '$2y$10$JvZyNiMUzRazZOA9HQqr..8lEJbZkW8VMnPClVR71u/fAur/Ov28a', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(134, '4680', 'Sa\'ban Kurniadi', '20-4680', 'Sa\'ban Kurniadi@gmail.com', '082171476346', 'PN171  Quality Control', '$2y$10$9cDmAeB/W.eXNNsND9Poc.4Lab8YLU4kURhhlS/JTQIAFgOjmGyxy', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(135, '4699', 'Syaiful', '20-4699', 'Syaiful@gmail.com', '082288230603', 'PN120  Vacuum Forming', '$2y$10$1g0bKMWPxFQ1VsmlAcff5OdV6HSk5TYfQupe/lvIGQJDsgZaDyXmO', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(136, '4701', 'Ikhsannul Fikri', '20-4701', 'Ikhsannul Fikri@gmail.com', '081270806070', 'PN163 General (Tooling)', '$2y$10$1HXExs2QP8mA4s3dg3Di5eDX1zmDlvWGE9NRRxO/3XZnZ7CU5lAf2', 'user.jpg', 2, '2021-Dec-16 01:29:17 PM', 'master', NULL),
(137, '4703', 'Andika Saputra', '20-4703', 'Andika Saputra@gmail.com', '085668394825', 'PN130  General Packaging', '$2y$10$IuSe9iLKju/N8LBk/NMKhuur33DnVH4rel0AXzG73tM4S9CUjyThm', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(138, '4704', 'Trimiyati', '20-4704', 'Trimiyati@gmail.com', '082362287565', 'PN149  Production General', '$2y$10$3NISiWl/NRb4fTI/ehPLLeUR1UbL67O3RNUSSlp9lbq8j6FcYZcQ.', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(139, '4707', 'Tauristina', '20-4707', 'Tauristina@gmail.com', '081378875114', 'PN120  Vacuum Forming', '$2y$10$GLQ5Qa7zZyDk7faZd/a.CuXJVjzIfnNC045Mx8J.TALdiUkadnu0W', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(140, '4709', 'Nurmailis Yanti', '20-4709', 'Nurmailis Yanti@gmail.com', '081270449164', 'PN130  General Packaging', '$2y$10$hddD82TLJSokgx0Ky1gaX.KKepueFOvDAWrP5g.IB85X2Mot/QTuO', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(141, '4716', 'Ajeng Puspa Sari', '20-4716', 'Ajeng Puspa Sari@gmail.com', '082389422968', 'PN145  Planning', '$2y$10$xTPU0YFLwzn0tDQg71XeGuUTQmXjEga62AhSHGdZllAP//ThZq0RG', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(142, '4717', 'Syamsio Manurung', '20-4717', 'Syamsio Manurung@gmail.com', '081275730605', 'PN110  EPS/EPE', '$2y$10$9BltncfpPIC8gbMZnICpMuQZleUTPaPDP57fjSvjEeN.nMlzLjia6', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(143, '4718', 'Khairul Anwar Siregar', '20-4718', 'Khairul Anwar Siregar@gmail.com', '085249611663', 'PN120  Vacuum Forming', '$2y$10$PwNJYf7Oadd7pMVFsL8iZevxCCXbZY47342uvTbOoGwo9W5djw0eG', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(144, '4726', 'Charli Pahotan Alamsyah Siahaan', '20-4726', 'Charli Pahotan Alamsyah Siahaan@gmail.com', '081267931588', 'PN171  Quality Control', '$2y$10$/M.H9InI6lgQsdz8...Tr.UoIq6a.QTDJh91avD4Cr/vBCy5u/sZW', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(145, '4727', 'Robert Simanjuntak', '20-4727', 'Robert Simanjuntak@gmail.com', '081315431067', 'PN149  Production General', '$2y$10$lazQhD8MWl8X/i8zKnffGOQHH79GhbnSHxiN1O/QRXIWh1c9k1486', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(146, '4729', 'Arif Abdurrohman', '20-4729', 'Arif Abdurrohman@gmail.com', '082285140953', 'PN153  Store Driver', '$2y$10$2LZPd.HL/UJpooI0dGx3xek.QHyWdIbDgN9SJmnDaE9iIr5Cm.KC2', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(147, '4750', 'Andri Dimi Pasunda', '20-4750', 'Andri Dimi Pasunda@gmail.com', '085266181895', 'PN130  General Packaging', '$2y$10$fCZQmp09omSXS1/vuCLTlO9FeHOzXfliy8994MOY8GzhCg71wXdxm', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(148, '4752', 'Gopi Yuantoni Putra ', '20-4752', 'Gopi Yuantoni Putra@gmail.com', '081266071530', 'PN163 General (Tooling)', '$2y$10$qYYgmztGRX8fFq90UzEdQujjVj18.KjObv9a7IBncFW8dnq5D0oUa', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(149, '4753', 'Ismadi ', '20-4753', 'Ismadi@gmail.com', '085668823404', 'PN163 General (Tooling)', '$2y$10$kZeyOnG89Ii5ANMV/ELtVuhoYpWDemBJYUllVsBapl6OHUbbuOEsC', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(150, '4755', 'Chairil Anwar', '20-4755', 'Chairil Anwar@gmail.com', '085251520592', 'PN120  Vacuum Forming', '$2y$10$UUFK7L7sny4oE/CaSnFZBuNP2lFbCD6p2h9zjRngOJCQlHQs/cLTS', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(151, '4768', 'Rizki Mulya Ritonga', '20-4768', 'Rizki Mulya Ritonga@gmail.com', '081991295789', 'PN183  General (Engineering)', '$2y$10$Sly5MzIYoy1uKW.ORqjqWescSFjS.7hC.WjlLskPCqVE5Mfhs3Cqu', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(152, '4771', 'Novebri Tri Vani', '20-4771', 'Novebritrivani@gmail.com', '085271358395', 'GA216  HR', '$2y$10$F0PZqWd39eEOpHi.wasVFuoOyUYLE7fk6kuF61x45EGra1NET5smC', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(153, '4775', 'Nur hayati Suksin', '20-4775', 'Nur hayati Suksin@gmail.com', '082169928468', 'PN120  Vacuum Forming', '$2y$10$Pln2LKztsTwHlsMgnKryZOYYdK41rgfoRc4SElztKqxu/ZV.hUyTK', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(154, '4777', 'Deny Susyanti', '20-4777', 'Deny Susyanti@gmail.com', '085265032036', 'PN120  Vacuum Forming', '$2y$10$KLy9X/AOl7t0ICy.ncYLb.n2frB5fVJx8xOlCnY5EdYs1QDaGYlVy', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(155, '4778', 'Asnidawati', '20-4778', 'Asnidawati@gmail.com', '081371354116', 'PN120  Vacuum Forming', '$2y$10$hUTyO.LsSk2tf1AaSE0hbetgAdqQmra5MyUbqkIJBxNhXO2qXNgHi', 'user.jpg', 2, '2021-Dec-16 01:29:18 PM', 'master', NULL),
(156, '4784', 'Fahrul Rozy', '20-4784', 'Fahrul Rozy@gmail.com', '082284418954', 'PN110  EPS/EPE', '$2y$10$WvCUbts7hxhagM2/MzyZaOk6Qkx3tGJr7Z.CqwOkZjZWW.FE7CeIm', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(157, '4793', 'Dafrizal', '20-4793', 'Dafrizal@gmail.com', '085263187421', 'PN152  Store', '$2y$10$ORkuH9rSLsyyRhD3QMdQ9OIFmgq6AtUne6FOyvR/xRBLJGZk0NOh2', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(158, '4794', 'Chechy Ronal Donata', '20-4794', 'Chechy Ronal Donata@gmail.com', '081268067552', 'PN163 General (Tooling)', '$2y$10$jZa5I5LEi1ryO5hNW92U4uaWlm/sOpH4Oe6Gu2ffvqRE8Cn3kPai2', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(159, '4795', 'Moh. Mambaul Huda', '20-4795', 'Moh. Mambaul Huda@gmail.com', '081280067155', 'PN163 General (Tooling)', '$2y$10$/ZraU3Nay0f7TvrmwdHkg.XzoKfX4siqFzb1N88DSMGkwdIU0mxHS', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(160, '4796', 'Noviyanto', '20-4796', 'Noviyanto@gmail.com', '085765104508', 'PN163 General (Tooling)', '$2y$10$qlBpv0zNR451HC5ShAfDNe5bgywjmEiIy2vKby09GT/K4ufoih1H.', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(161, '4798', 'Dewi Arista Ulfa', '21-4798', 'Dewi Arista Ulfa@gmail.com', '081261428204', 'PN145  Planning', '$2y$10$reEvMRuXuaSyeDQSkmTE5e/RzYItKo74WtKoiSipvK1g/Ge0ytyF2', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(162, '4799', 'Asmauliddiah Nur Hamzah', '21-4799', 'Asmauliddiah Nur Hamzah@gmail.com', '087797999194', 'PN145  Planning', '$2y$10$UZa/ke4fBplxcuNz84kGN.261mhOGWVqTxTmRc/MXv481jbaNa7NC', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(163, '4800', 'Hidayat', '21-4800', 'Hidayat@gmail.com', '08153127267', 'PN148  Sales Design', '$2y$10$uuLXT3ncWpVPgvAAe7kZxe2yfkHfTOjlJeO0scBxPoPney8jpqOYG', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(164, '4801', 'Muhammad Mauludi', '21-4801', 'Muhammad Mauludi@gmail.com', '087749386617', 'PN148  Sales Design', '$2y$10$ZJjRXjX3uVIj3yajkah3P.P9QS1vaEd2k1u0ZWIdMp3NsM2kvv71q', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(165, '4802', 'Dimas Ferri Setiawan', '21-4802', 'Dimas Ferri Setiawan@gmail.com', '081548518543', 'GA214  Cleaning Service', '$2y$10$lkSyIvZyVlzgswMqfEFniO16aus.48Si0w.dh7KbWYWPL9p8WQkeO', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(166, '4803', 'Kharis Nasukha', '21-4803', 'Kharis Nasukha@gmail.com', '081270355051', 'PN141  Production Engineering ', '$2y$10$pqJS16n/Ejr1EwGCqApqsOK9x//nyoiWLTCCZ2AOIhRSXGDxXqY8i', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(167, '4804', 'Sakir', '21-4804', 'Sakir@gmail.com', '082171488018', 'PN120  Vacuum Forming', '$2y$10$oB1rkS9OiDYP4/7cIyRmvurrjDQyb3pI.aowV8lM.LwOeSpTAe8Oa', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(168, '4805', 'Hotman Fernando Simanjuntak', '21-4805', 'Hotman Fernando Simanjuntak@gmail.com', '081263643640', 'PN183  General (Engineering)', '$2y$10$WKp8b2UKtnU2q90AuSmOM.3LvUP7ykF5laDH2B2FBM527B9YmJWz.', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(169, '4806', 'Jontar Hutagaol', '21-4806', 'Jontar Hutagaol@gmail.com', '081365064674', 'PN110  EPS/EPE', '$2y$10$B0JqBnkLdDJOufOwv3TVW.Ojvivi8ylHVQDZEgHuwuL6vhqXDh.By', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(170, '4807', 'Gufron Muhajjalin', '21-4807', 'Gufron Muhajjalin@gmail.com', '088708010529', 'PN110  EPS/EPE', '$2y$10$PrTFVFs7QKbpRztf/amUIeMToQvkFJVuMawQIi8ywjqV4gitmii9O', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(171, '4813', 'Akbar Ramadhan', '21-4813', 'Akbar Ramadhan@gmail.com', '085271109285', 'PN120  Vacuum Forming', '$2y$10$25BTBshfscW/D0o1.8xWhO42QN9/fuFXb11rTJV.z84oPST5CaDCm', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(172, '4814', 'Rahmad Hidayat', '21-4814', 'Rahmad Hidayat@gmail.com', '083809493156', 'PN120  Vacuum Forming', '$2y$10$ViFmDXlYN0cqF6waRKbpNuDUwE8P1.lWN3Dtbd5Gwij2rcKOBFSBe', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(173, '4815', 'Mujiono', '21-4815', 'Mujiono@gmail.com', '08117707021', 'GA216  HR', '$2y$10$XEVFSHCsRi.x6d98HBYbkOINCCbGHHu5E1CcVk1VxRmiUlRfl7x6C', 'user.jpg', 2, '2021-Dec-16 01:29:19 PM', 'master', NULL),
(174, '4818', 'Pebri Desni Rianti', '21-4818', 'Pebri Desni Rianti@gmail.com', '085265557182', 'PN120  Vacuum Forming', '$2y$10$X3OerSsDj7P2CvG..fOMa.O5VB0zJnG/Ei/lGglattLEVG9qke5EW', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(175, '4825', 'Budimansyah', '21-4825', 'Budimansyah@gmail.com', '087724160617', 'PN120  Vacuum Forming', '$2y$10$PQmTEIU2.TzL6Iw4EZOo/uKZY3RnFsRtgKtwNgkERGkGEywPvh/3S', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(176, '4827', 'Nelfa Yetmi', '21-4827', 'Nelfa Yetmi@gmail.com', '085356443679', 'PN130  General Packaging', '$2y$10$uvnWHMGuqD27hZwNIX9oFO9oj6XFlMG8GptI9DOdxTbAXVSRNmJ.6', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(177, '4828', 'Sartika', '21-4828', 'Sartika@gmail.com', '081371605727', 'PN130  General Packaging', '$2y$10$JNPm95SD23FGloKJAvl64.3QSAuirUJrHLva9uruzQff15Lkc7G3S', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(178, '4831', 'Tanti Novia Sugiyanti', '21-4831', 'Tanti Novia Sugiyanti@gmail.com', '081266461009', 'PN110  EPS/EPE', '$2y$10$98waiYlKWyspbeiOs8PjgetFQAxoHEnsCgqGiPGYIb9Oeo6oMf/GG', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(179, '4832', 'Rolan Jolian Pratama', '21-4832', 'Rolan Jolian Pratama@gmail.com', '082169159272', 'PN120  Vacuum Forming', '$2y$10$CVe.VosPIgefq11LTV35BOXrkE20htZTGaEibWgLXYrQJcT2nTvz6', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(180, '4833', 'Catur Irawan', '21-4833', 'Catur Irawan@gmail.com', '082174381097', 'PN183  General (Engineering)', '$2y$10$rhgISXxuMO1jHVM7n1bnQuRnABcHlQq0CdOq38ulFb5AP4YAGTDze', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(181, '4835', 'Dani Kardani', '21-4835', 'Dani Kardani@gmail.com', '082381459988', 'PN163 General (Tooling)', '$2y$10$rfu0pc64f8eXVni1HsnYxu81IZ8OMdUXFRixOHYxV0BVCtzTv9/5i', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(182, '4836', 'Muhammad Ridho', '21-4836', 'Muhammad Ridho@gmail.com', '085725549355', 'GA231  Information Technology', '$2y$10$kHXL4vnIFtMRmIi/bDEc5OzkEmJFUGVFow7cZ.l8R2xlbbFIEkNPu', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(183, '4837', 'Muhammad Nurman Azhari', '21-4837', 'Muhammad Nurman Azhari@gmail.com', '089516399358', 'PN110  EPS/EPE', '$2y$10$wov6AjDIyGOSZ6KGyjO25OdrYN7.t6ZsgIAt.ZjO5/coYddyQg3c6', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(184, '4838', 'Tasya Imanda', '21-4838', 'Tasya Imanda@gmail.com', '082383869362', 'PN171  Quality Control', '$2y$10$KVNz13CL9k9oORQieXzD5OOpLPSIqWNAU.2Y5yrWaH6i4QYOe78ui', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(185, '4839', 'Ruth Winarti Saragih', '21-4839', 'Ruth Winarti Saragih@gmail.com', '082385383630', 'GA216  HR', '$2y$10$Qk0wBUlUfYjS0l56cPuCLOVchK.z7iOWySirLHljTjEvLHjZq.YSa', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(186, '4840', 'Hengky Widodo', '21-4840', 'Hengky Widodo@gmail.com', '081275353400', 'PN163 General (Tooling)', '$2y$10$k4GYhZfTnCN/AI73m2cBM.w1kRCHJdvzRuAgVVA9dRF/z23axMbmG', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(187, '4841', 'Sudarwati', '21-4841', 'Sudarwati@gmail.com', '085274420809', 'PN171  Quality Control', '$2y$10$kSEDh4VbeaEGgTvPK8HCoeFhZTI1YJ/qgRsF/LSdmt06hDG7CPsZi', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(188, '4842', 'Jama\'udin', '21-4842', 'Jama\'udin@gmail.com', '081279099591', 'PN130  General Packaging', '$2y$10$59QQ6imqGhWPl4wi7GuYk.6MmBgyEQYgWHSvFGTzFHRCFlCAPwbC.', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(189, '4844', 'Evida Juanti', '21-4844', 'Evida Juanti@gmail.com', '085263593939', 'PN120  Vacuum Forming', '$2y$10$/S7NQlub0/QEmRxJJ/u0COVHq6F3ZVSakn/WlUlbLQfygsVg3zahK', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(190, '4849', 'Ade Irawan', '21-4849', 'Ade Irawan@gmail.com', '0895603618333', 'PN120  Vacuum Forming', '$2y$10$yIYjbLHEMONHZ8g7lx4lU.TicBpu8Hev94ooFObOLkZaNX1LjfeD.', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(191, '4851', 'Rajani Pernando Sitinjak', '21-4851', 'Rajani Pernando Sitinjak@gmail.com', '082171482312', 'PN120  Vacuum Forming', '$2y$10$LNPXVNS6GGgWwnSrRXo6x.HO069.Za0uGO23PXPjstrW5zgB72yxS', 'user.jpg', 2, '2021-Dec-16 01:29:20 PM', 'master', NULL),
(192, '4853', 'Kriston Simanjuntak ', '21-4853', 'Kriston Simanjuntak@gmail.com ', '082285537479', 'PN183  General (Engineering)', '$2y$10$nbWoEGZYa/1RP9QW1ysKV.W5Rm/S5dl3bvNLxtpdooqBvYxg8nKie', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(193, '4854', 'Syafri Adi Putra ', '21-4854', 'Syafri Adi Putra@gmail.com ', '082275048588', 'PN110  EPS/EPE', '$2y$10$vBiTAZtnA1Vg.zI0g7bbAeMCxixxeniS3McLB5sHyUmtvqwZzQsXq', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(194, '4855', 'Indrawati', '21-4855', 'Indrawati@gmail.com', '081371428858', 'PN110  EPS/EPE', '$2y$10$RWqV/DFGtnUKx6oQKE0AS.j1hLLuktneozm3wjrHvHvWGVL1OPrQm', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(195, '4857', 'Refni ', '21-4857', 'Refni@gmail.com ', '082389933386', 'PN130  General Packaging', '$2y$10$USgth0tb8e5Dt.rGMHorDOMnZj5gJHbyyuIFvKJLzLiP8o8nOtC8q', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(196, '4858', 'Gita Mardiana', '21-4858', 'Gita Mardiana@gmail.com', '081912516441', 'PN130  General Packaging', '$2y$10$lgZqiQHtah7YFxH6mTx0eO6G51rdCP2jOjOfxpr.3hV8ryBNJ5iv2', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(197, '4860', 'Aysah Maryam Making ', '21-4860', 'Aysah Maryam Making@gmail.com ', '081270708487', 'PN130  General Packaging', '$2y$10$r4/O0kPhrortL2fmMo/2kegUORzieK4BHwFKtbkHE.nlnV9rCSIiW', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(198, '4861', 'Safril Sarif', '21-4861', 'Safril Sarif@gmail.com', '089340201435', 'PN130  General Packaging', '$2y$10$cDkyn4bp3OOuw6Xx/KAoFeVGFog3SyjXmvV6VS.J6y1ATSbX/zrLu', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(199, '4865', 'Kandar ', '21-4865', 'Kandar@gmail.com ', '082170200513', 'PN130  General Packaging', '$2y$10$su5UhsxQP.3qc14yW7agdudTqL1PqbZzFVVhPOZvyoenbTkW1mIEC', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(200, '4870', 'Riki Riwandi ', '21-4870', 'Riki Riwandi@gmail.com ', '082286027855', 'PN120  Vacuum Forming', '$2y$10$jspUt1hslw7bI/weYZFsGudw851zFLlInBboiyLNWt9oQc37O.w4S', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(201, '4872', 'Dina Mariana Naiborhu ', '21-4872', 'Dina Mariana Naiborhu@gmail.com ', '081266791999', 'PN120  Vacuum Forming', '$2y$10$JyOAADh8vE37KzPGFRcEWuZyh/BZT9Pl9Q.ilVg35KGqQgJU2nkBa', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(202, '4873', 'Sepriadi ', '21-4873', 'Sepriadi@gmail.com ', '082171425092', 'PN183  General (Engineering)', '$2y$10$WrUVnOplXDl4hmlT42hB4uKXmYSIs0dTBbWsHFMTJcCI9pl3RWZSa', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(203, '4875', 'Yudi Iskandi ', '21-4875', 'Yudi Iskandi@gmail.com ', '081268733381', 'PN163 General (Tooling)', '$2y$10$V2aJGUD6dCNWujKFoHEVNO7ds9jbeBO41Q1Djx7VbdKg7M57gyUfO', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(204, '4876', 'Jekson Parulian Manullang ', '21-4876', 'Jekson Parulian Manullang@gmail.com ', '082388341995', 'PN152  Store', '$2y$10$LF1mrRCryMvFPhmvgTJgXOgkLD63kzP6iBFlne8DmNgb5Mzxx3rNS', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(205, '4877', 'Wegi Bayu Perdana ', '21-4877', 'Wegi Bayu Perdana@gmail.com ', '082384672636', 'PN152  Store', '$2y$10$hCJCzkttsriCoOOal7fqIu.vD4KofYvr4Oh.byh1.FzsQxhjdMfE.', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(206, '4878', 'Meri Lestari ', '21-4878', 'Meri Lestari@gmail.com ', '081364609004', 'PN120  Vacuum Forming', '$2y$10$MSkKl7QX3m0AHZt07.Pnsua0yUZbTwxN1PiKLajwjVVY/gQ3afHi.', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(207, '4880', 'Kompas Perri Siregar ', '21-4880', 'Kompas Perri Siregar@gmail.com ', '\'082283389311', 'PN120  Vacuum Forming', '$2y$10$hPSUgOjfnJMUoPYZhXe24OKUwdVMRUehH1m5XWBba592Fbj/Of57m', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(208, '4881', 'Ferdinata Ginting ', '21-4881', 'Ferdinata Ginting@gmail.com ', '08566604861', 'PN130  General Packaging', '$2y$10$Th6c4tu5pOyZ.JcIWmetMu2Hvme.wktslAQRX.s591WLu8UfEdNe6', 'user.jpg', 2, '2021-Dec-16 01:29:21 PM', 'master', NULL),
(209, '4883', 'Mardiana Siregar ', '21-4883', 'Mardiana Siregar@gmail.com ', '085261872944', 'PN130  General Packaging', '$2y$10$3Y4it/A3rt5ao8Do5mL10eDXAzJYZkraXDAclt10kCmwLnm0w/Kfy', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(210, '4884', 'Aldi Hendra ', '21-4884', 'Aldi Hendra@gmail.com ', '085376738809', 'PN130  General Packaging', '$2y$10$o1mAOLEG3v25gRHCNJ.1n.3VDd7n3rTODj/6OsJZlQjnWtgrhnrlq', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(211, '4885', 'Sutikno ', '21-4885', 'Sutikno@gmail.com ', '082385213636', 'PN163 General (Tooling)', '$2y$10$xcakGlKb7qNJai6zphDEZ.ruPmuoomDcIwmbo0lJ5QTmWVKBxR2cW', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(212, '4892', 'Anggun Chairunnisa', '21-4892', 'Anggun Chairunnisa@gmail.com', '0895401204900', 'PN130  General Packaging', '$2y$10$kAa5VLbZfbMTIn/orvNFiOB9btKUuETdeI8k0uEbmO.X1qh52IfUG', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(213, '4893', 'Hidayatullah ', '21-4893', 'Hidayatullah@gmail.com ', '082177245779', 'PN130  General Packaging', '$2y$10$lWC.8CusaJQihukb.4DEsuI0pbDjc4QScmOJu0wBKTSlXzPhkcvEi', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(214, '4894', 'Asnul Sitompul ', '21-4894', 'Asnul Sitompul@gmail.com ', '085361557278', 'PN130  General Packaging', '$2y$10$RMaD6i71X5hflwsmUazfMuGJOEsWcEsX7E7dQbkPApOIkV5KCf1wy', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(215, '4895', 'Selamet Rahman ', '21-4895', 'Selamet Rahman@gmail.com ', '085375789231', 'PN183  General (Engineering)', '$2y$10$4aOhWCfb3Vt5D74Aj5BY7O6YC246KDWh8o0Wx7/OjXC/FGPGpiM3u', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(216, '4896', 'Taupik ', '21-4896', 'Taupik@gmail.com ', '082390300893', 'PN152  Store', '$2y$10$QCYjVGiyTSFDVpTcg/.lnuX3TuBTD2zCvv7qncIZbeKdewiw5d/uC', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(217, '4897', 'Eferi Doni ', '21-4897', 'Eferi Doni@gmail.com ', '085264095535', 'PN152  Store', '$2y$10$.B/VlQAF.5rUA7xPv8wNy.d5/mS.bBxlJgT0IluwUDOZx.Da9XWMa', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(218, '4898', 'Riska Asmayanti ', '21-4898', 'Riska Asmayanti@gmail.com ', '085363330955', 'PN152  Store', '$2y$10$snV.BHnEYUwSoqSeLMHNKuiZggNMDaB2OhIdj.UikKI9kVoFTrbUe', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(219, '4899', 'Sahruzi Siagian ', '21-4899', 'Sahruzi Siagian@gmail.com ', '085271786096', 'PN120  Vacuum Forming', '$2y$10$VdRIWG7uM1lvBkpBBgodQe1TBdpS.MDlr4dmX1.c1Pz9lExOX2P.e', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(220, '4901', 'Limiati Novtiana', '21-4901', 'Limiati Novtiana@gmail.com', '081293086389', 'PN145  Planning', '$2y$10$el13lVhdW6C3mVBmXGybh.MmeMMf.dHgnPM61sWywBarW.OWdSAnO', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(221, '4902', 'Murah Rejeki ', '21-4902', 'Murah Rejeki@gmail.com ', '081364811193', 'PN171  Quality Control', '$2y$10$bJdb.2Bb2zZrAuQH/vuD9uKMrEy7gTUNP2lkNnfwOVvGiS7.Epbg2', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(222, '4904', 'Chris donovan Putra Harahap', '21-4904', 'Chris donovan Putra Harahap@gmail.com', '0895395187756', 'PN120  Vacuum Forming', '$2y$10$vxQFVUpQGi9s.FO3OT.Tw.DHWAHMZIJvxzOdkbc1rAapqZaQr8bSi', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(223, '4905', 'Desi Muhlisyaningsih ', '21-4905', 'Desi Muhlisyaningsih@gmail.com ', '0895370741101', 'PN120  Vacuum Forming', '$2y$10$6eTF1BjL6dTAEArRB8xNYOfgvezeUnLND.o14RDsUfK3G6s.SsQFG', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(224, '4906', 'Paulus Ba\'un ', '21-4906', 'Paulus Ba\'un@gmail.com ', '081270118095', 'PN152  Store', '$2y$10$Jay2G1As/rnajFiZ9m5oeeiOlPQXRxFhCyAZBYknLHk6Mdq05zYw.', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(225, '4907', 'Yogi Junaidi ', '21-4907', 'Yogi Junaidi@gmail.com ', '081276582632', 'PN120  Vacuum Forming', '$2y$10$75hpfCe1FQjjkHEL01QSfeuo2YisPKu.FXyQryCHNbCqet7R8KeWy', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(226, '4908', 'Tengku Rafli Akhila ', '21-4908', 'Tengku Rafli Akhila@gmail.com ', '0895629504117', 'PN120  Vacuum Forming', '$2y$10$CQTxAv7iBPJZnKU25i.C1OMd/rHo7rxFlitSN3Mo0hs8jvMVmUtOS', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(227, '4909', 'Jumadil Ilham ', '21-4909', 'Jumadil Ilham@gmail.com ', '081958551220', 'PN148  Sales Design', '$2y$10$1h1D1JyWtuKGEIgfidk8ie2nFL4s7hZBKWRInP8NMrv5bBXMWl4QK', 'user.jpg', 2, '2021-Dec-16 01:29:22 PM', 'master', NULL),
(228, '4910', 'David Valentin Putra ', '21-4910', 'David Valentin Putra@gmail.com ', '081261414264', 'PN130  General Packaging', '$2y$10$JfrF92rBH4O98OQsWkt/3.tFH9FJvEO3N0vvv2AvG27O37QFsFWce', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(229, '4911', 'Apriansyah ', '21-4911', 'Apriansyah@gmail.com ', '087791240435', 'PN110  EPS/EPE', '$2y$10$ZtLO3pUtzOeKlsjtQ9gFFOpZTPG5Y0DF8SK0H00qGwehrYbeE.tCC', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(230, '4915', 'Gabriella Angela Saputra ', '21-4915', 'Gabriella Angela Saputra@gmail.com ', '085837111449', 'PN110  EPS/EPE', '$2y$10$BPMBP47i.JxWYDS5AxqFiOpN4VIMdwPJHu3BRK7Dg3INapjENjNaW', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(231, '4917', 'Ringga Septia Pribadi ', '21-4917', 'Ringga Septia Pribadi@gmail.com ', '082264821151', 'GA231  Information Technology', '$2y$10$xOQKeMybBWiTt3uef0UDLu/ZbkvjvNPywJDjemtBNecVaQ81H4u3q', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(232, '4918', 'Heri Irawan ', '21-4918', 'Heri Irawan@gmail.com ', '082392282415', 'PN183  General (Engineering)', '$2y$10$MA4fUNjsgI9JZ91ypm4pGuovkXa92oc.Np.Ygo62vjKRxfLbNtIXu', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(233, '4919', 'Tri Devi T.H Hutabarat ', '21-4919', 'Tri Devi T.H Hutabarat@gmail.com', '08117710603', 'GA221  Account', '$2y$10$2mwAqgb.Qw5GzekKgfuos.GWqrqqwRWHLbYTLVEj3UjGcrDQLGIyq', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(234, '4920', 'Dewi Sartika', '21-4921', 'Dewi.sartika0587@gmail.com', '088271758723', 'GA216  HR', '$2y$10$8DqBWD3p7Jz3OcCMPecz6ORL9lDitYaSD1Z51zo.JEi7VNDcSabca', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(235, '4922', 'Juliaman Hutabarat ', '21-4922', 'Juliaman Hutabarat@gmail.com', '081372112649', 'PN152  Store', '$2y$10$.Wh86pVZKNV4wgMPyVlSB.rtBcFEBYygqRV/67lDop1uy0f94v/x6', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(236, '4923', 'Thara Feby Angela ', '21-4923', 'Thara Feby Angela@gmail.com', '082213816251', 'PN152  Store', '$2y$10$gArq1yRkY0YCR37MW4z7ZO/.ncgyKiza.3Ja0y8fqEvDNsqzpmqJm', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(237, '4924', 'Dany Catur Arianto', '21-4924', 'Dany Catur Arianto@gmail.com', '0895629126411', 'PN171  Quality Control', '$2y$10$QGb8qEuQo6kns4xbhaUYQ.Dx6F5g3tJqwQL4ZU5/r5DciT.pjTrsC', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(238, '4925', 'Ilham Handani Saputra', '21-4925', 'Ilham Handani Saputra@gmail.com', '082160566212', 'PN171  Quality Control', '$2y$10$CojK4s0ZJRhgOTwjTf5DrOsSplVLL/w6IIIn0WSok0RyoMo8/5Zn6', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(239, '4927', 'Yan pauzal ', '21-4927', 'Yan pauzal@gmail.com', '082283930055', 'PN110  EPS/EPE', '$2y$10$/j46QtQLoVLuqKz..xK4de51.obxzVdyAJyh5/fxqALIepmdDAYr.', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(240, '4928', 'Febrin Yurindo ', '21-4928', 'Febrin Yurindo@gmail.com', '082288037542', 'PN110  EPS/EPE', '$2y$10$91tGxTuWQK/cYfi5VjsHWe8hZUorh5imTvpv6hvcSY3fyihYJOpyq', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(241, '4929', 'Nurul Hasna ', '21-4929', 'Nurul Hasna@gmail.com', '08987065484', 'PN110  EPS/EPE', '$2y$10$pY.8qTAuSg59mQ884wBduuj8P6ec1dRVNnWcRZUHlTUYMEz2lWsNG', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(242, '4930', 'Surya Darma ', '21-4930', 'Surya Darma@gmail.com', '085263311896', 'PN130  General Packaging', '$2y$10$I9g4oqcC/eAb9Q/SbcprBuVNMNgTxXOCcIE4/T.Ymx0JWVyBkrfua', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(243, '4932', 'Rovida Rahmi ', '21-4932', 'Rovida Rahmi@gmail.com', '081261895206', 'PN130  General Packaging', '$2y$10$WS4tVz/sOm0xApHFOPS.k.//G6/ZxBvGhkUrV.PUcPomj0w/L/mg6', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(244, '4933', 'Yurlinda ', '21-4933', 'Yurlinda@gmail.com', '085832846934', 'PN120  Vacuum Forming', '$2y$10$W8U3L0uTJGSmxSD.higvmunWlbPJeTePEgQ3K7MhMld.6Bsua2CnW', 'user.jpg', 2, '2021-Dec-16 01:29:23 PM', 'master', NULL),
(245, '4934', 'Helmaliza ', '21-4934', 'Helmaliza@gmail.com', '085765115861', 'PN120  Vacuum Forming', '$2y$10$YnDwgEIxpNRpRT5rKJVJB.YdldiorWiL5gZAeoTkb9MWnlBt4X6Oq', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(246, '4935', 'Delista Sianturi ', '21-4935', 'Delista Sianturi@gmail.com', '081270404311', 'PN120  Vacuum Forming', '$2y$10$1mAtYY3BGalgdyD2bHMSK.HOrpDuox3/il0a60ouJjXBb.yJpDoK.', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(247, '4936', 'Widia Dewi Laia ', '21-4936', 'Widia Dewi Laia@gmail.com', '085363985714', 'PN120  Vacuum Forming', '$2y$10$y.VgB5EwZWwqMDPGV/OhruLgOwgie2uBiN7Lh92sbKssH83/qUFxe', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(248, '4937', 'Rika Ayu ', '21-4937', 'Rika Ayu@gmail.com', '085765878566', 'PN120  Vacuum Forming', '$2y$10$u7BPJU6BFyRO0kMGv7Om3eINDLBVaop0cPN/w5E29N8vXSsx.YSx2', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(249, '4938', 'Nico Manullang ', '21-4938', 'Nico Manullang@gmail.com', '081261493301', 'PN120  Vacuum Forming', '$2y$10$9YJb75Q4PmwLvugj7DT0PeCePK8YjCviEWAOe5nxJaSmk2VXlI0fO', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(250, '4940', 'Randy Afrimaputra', '21-4940', 'Randy Afrimaputra@gmail.com', '081275337442', 'PN120  Vacuum Forming', '$2y$10$fJ/aM2PKn/4hOyENNPA7LecDC3ALTZsxlcz4vYEt3p26x.bHE2PJ2', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(251, '4941', 'Syahrul Rivaldi', '21-4941', 'Syahrul Rivaldi@gmail.com', '085262447188', 'PN120  Vacuum Forming', '$2y$10$APYc2bef5B57ujSpq8yMUOU0yEynAsOvMvEPrQkG8bMKi8sJ9As12', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(252, '4942', 'Khairil Anwar', '21-4942', 'Khairil Anwar@gmail.com', '081360021760', 'PN120  Vacuum Forming', '$2y$10$x6it.Y12HCdUzObxqPRqruHBFQ8cJJUBXNSJFVMyrP6uO6CQhd61y', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(253, '4944', 'Esther Indrayani Lumban Gaol', '21-4944', 'Esther Indrayani Lumban Gaol@gmail.com', '087893180710', 'PN110  EPS/EPE', '$2y$10$Fxm6iQOQBht2/pcA0YusdeTVObCPCEwp7.Rt0TDhalqZ6K91DbNv.', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(254, '4945', 'Yudik Eko Sunaryo ', '21-4945', 'Yudik Eko Sunaryo@gmail.com', '085853313133', 'PN152  Store', '$2y$10$L/KtxI6YZaiMazoOGfglZO623NAwUzPsfRUdbpFfRdzLPQGCadwi6', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(255, '4946', 'Farizal Akbar', '21-4946', 'Farizal Akbar@gmail.com', '081994164954', 'PN120  Vacuum Forming', '$2y$10$TXkSIvpNVvpnveezve86QOb63Dnvhl3gUqXR4e3rmPJC66.dge4MS', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(256, '4947', 'M. Yunus Pulungan', '21-4947', 'M. Yunus Pulungan@gmail.com', '082288594377', 'PN120  Vacuum Forming', '$2y$10$JPN2Kz13yrpL1Yfb2.yjY.6U9ofyXn3PtshZoqw1L5MkoKdAztkje', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(257, '4948', 'Edi Zulkarnain', '21-4948', 'Edi Zulkarnain@gmail.com', '085658430295', 'PN120  Vacuum Forming', '$2y$10$tgBFhN1uuLk/zeGxFeXWAOKOwpzf9nyxccXMdUV17xL/KZdllbwf2', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(258, '4949', 'Rosni Agustina Sinurat', '21-4949', 'Rosni Agustina Sinurat@gmail.com', '081261564600', 'PN120  Vacuum Forming', '$2y$10$p4OSK/om3vCjTFRTtBfBV.uA8i0Pu8506Rc4VerWI1SDxnOuiu2Iy', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(259, '4950', 'Nabila Dea Alifia', '21-4950', 'Nabila Dea Alifia@gmail.com', '0895603617632', 'GA271 Marketing Departemen', '$2y$10$Q7gr1wkVqyhAJdaSE/nF7ufD0RBbPIMnyIFTeVbZM1cbNgjtLHjom', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(260, '4951', 'Sabarudin', '21-4951', 'Sabarudin@gmail.com', '082174639292', 'PN130  General Packaging', '$2y$10$aLM8nUkJEbKCEILLV5luV.biPomyDw3RGyI2m3uMZECW79rNhGaeS', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(261, '4952', 'Ismail Bin Ishak', '21-4952', 'Ismail Bin Ishak@gmail.com', '085264990577', 'PN130  General Packaging', '$2y$10$oxo/eHIhwnshpwhRwLVQduT5t9QEvRD/8J4pljE8zMDAu09jluFxm', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(262, '4953', 'Mareta Pujawati', '21-4953', 'Mareta Pujawati@gmail.com', '087749339784', 'PN130  General Packaging', '$2y$10$emIuj/7uMUB45D5l/1QpWum3KJhS8hsnlXhGTSESSj8.PLKJIbIQe', 'user.jpg', 2, '2021-Dec-16 01:29:24 PM', 'master', NULL),
(263, '4954', 'Fitri Hamidah', '21-4954', 'Fitri Hamidah@gmail.com', '081383395287', 'PN120  Vacuum Forming', '$2y$10$/mpljKXpvhZQ2rJGaAPXq.TqM0G4Li/.oiS8oGeofUJHQhmgpaLha', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(264, '4955', 'Mavfira Adillah', '21-4955', 'Mavfira Adillah@gmail.com', '085210320171', 'PN120  Vacuum Forming', '$2y$10$2n16N47gqoSkk6GniUYoueIaSaQTzlTHT96h7hPQfFXG5sX/EbQYS', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(265, '4956', 'Neorah Nefa Chairani', '21-4956', 'Neorah Nefa Chairani@gmail.com', '087735239266', 'PN120  Vacuum Forming', '$2y$10$0tvkU5KG/izFIc2/ib88C.6cj5NNED2zgpy8H5y1aFXXIpAStd4li', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(266, '4958', 'Herlina', '21-4958', 'Herlina@gmail.com', '081372274473', 'PN110  EPS/EPE', '$2y$10$goaB/83vtleyi5IAvB/Ctej28KQ0q8J4r7gLuqLORH7ms6eW0AfgO', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(267, '4959', 'Paska Veronika Sinaga', '21-4959', 'Paska Veronika Sinaga@gmail.com', '085358462276', 'PN110  EPS/EPE', '$2y$10$.YtBH3a81l9akzX2gqGCkOnC/7nezxvbsCtNjWvbUpZujxDwSnzfW', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(268, '4960', 'Andre Saputra', '21-4960', 'Andre Saputra@gmail.com', '082367585767', 'PN120  Vacuum Forming', '$2y$10$RPzmn58wC9rDxQoRAFYhOup8SdAjic7vt/BX.TNYMexP6.YkwGzem', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(269, '4961', 'Andre Setiawan', '21-4961', 'Andre Setiawan@gmail.com', '082287095509', 'PN130  General Packaging', '$2y$10$QwMNb65MotVXVFjmVuZ8K.71XdWm6fhIXye84Rgd.YKNFdnXfUFim', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(270, '4962', 'Battiar', '21-4962', 'Battiar@gmail.com', '081363114472', 'PN152  Store', '$2y$10$vZ.bmMEAt31nQtX40HEja.9ZoXR1MlQqpLbSqFYE49n7grPZNoo0i', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(271, '4963', 'Wiko Pratama', '21-4963', 'Wiko Pratama@gmail.com', '082288432368', 'PN152  Store', '$2y$10$4WU/0OSiTzHsgh4ls9vds.HE7DZ5BS/J7XgycHvQkCYYJNROvpAIS', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(272, '4964', 'Robet Hutauruk', '21-4964', 'Robet Hutauruk@gmail.com', '081270065506', 'PN141  Production Engineering ', '$2y$10$lLYHza13yJ9zyQNSvNwmV.WcpbNdFKqPlKZz5jy79duZxIWYv2Acq', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL),
(273, '4965', 'Rio Rianto', '21-4965', 'Rio Rianto@gmail.com', '082170846832', 'GA214  Cleaning Service', '$2y$10$IsIuLEvSdM0lRUeXwGav/OjalgLe56m/OS.Q7kR.eHO5d7yZUjaTy', 'user.jpg', 2, '2021-Dec-16 01:29:25 PM', 'master', NULL);

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
('5', '2y10jC0Jx2dwO5tOuaYVDYncM2PqQMKrM6vLlhUDOYbXiQn3RwamDpC', '1640758080', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `list_visitor`
--
ALTER TABLE `list_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mas_absen_etowa`
--
ALTER TABLE `mas_absen_etowa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `mas_aksesmenu`
--
ALTER TABLE `mas_aksesmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mas_failed_for_finger`
--
ALTER TABLE `mas_failed_for_finger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `user_undian`
--
ALTER TABLE `user_undian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
