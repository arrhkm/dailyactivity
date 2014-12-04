-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2014 at 10:57 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dailyactivity`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyreport`
--

CREATE TABLE IF NOT EXISTS `dailyreport` (
  `id` varchar(45) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `date_report` varchar(45) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dailyreport_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dailyreport`
--

INSERT INTO `dailyreport` (`id`, `employee_id`, `date_report`, `code`) VALUES
('S08057-2014-11-27', 'S08057', '2014-11-27', NULL),
('S09078-2014-11-25', 'S09078', '2014-11-25', NULL),
('S09078-2014-11-26', 'S09078', '2014-11-26', NULL),
('S09078-2014-11-27', 'S09078', '2014-11-27', NULL),
('S09078-2014-11-28', 'S09078', '2014-11-28', NULL),
('S09078-2014-12-01', 'S09078', '2014-12-01', NULL),
('S10094-2014-11-28', 'S10094', '2014-11-28', NULL),
('S11103-2014-11-27', 'S11103', '2014-11-27', NULL),
('S11103-2014-11-28', 'S11103', '2014-11-28', NULL),
('S11103-2014-12-01', 'S11103', '2014-12-01', NULL),
('S13208-2014-11-26', 'S13208', '2014-11-26', NULL),
('S13208-2014-12-01', 'S13208', '2014-12-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `name`) VALUES
(1, 'HRD'),
(2, 'Accounting'),
(3, 'Purcashing'),
(4, 'Enginering');

-- --------------------------------------------------------

--
-- Table structure for table `detilreport`
--

CREATE TABLE IF NOT EXISTS `detilreport` (
  `id` int(11) NOT NULL,
  `dailyreport_id` varchar(45) NOT NULL,
  `listjob` varchar(45) DEFAULT NULL,
  `describejob` varchar(100) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  PRIMARY KEY (`id`,`dailyreport_id`),
  KEY `fk_detilreport_dailyreport1_idx` (`dailyreport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detilreport`
--

INSERT INTO `detilreport` (`id`, `dailyreport_id`, `listjob`, `describejob`, `duration`) VALUES
(1, 'S09078-2014-11-26', 'download', '', '00:00:00'),
(5, 'S13208-2014-11-26', 'Cost Project', 'Cost Project Periode Gaji 06 November 2014', '00:00:00'),
(6, 'S13208-2014-11-26', 'Cost Project', 'Cost Project Periode Gaji 13 November 2014', '00:00:00'),
(7, 'S09078-2014-11-25', 'Download absensi', 'Download absensi Daily Worker', '00:10:00'),
(8, 'S09078-2014-11-27', 'Safety Talk', 'Informasi tentang APD', '00:30:00'),
(9, 'S09078-2014-11-27', 'Trouble shooting connection Line Telp Pk. Fu', 'Kabel telephone terputus', '00:30:00'),
(10, 'S11103-2014-11-27', 'Safety Talk', '', '00:30:00'),
(11, 'S11103-2014-11-27', 'service aipon 119', '', '00:30:00'),
(12, 'S11103-2014-11-27', 'Cek mobil L 1282 GH', 'pengantian suspensi', '00:30:00'),
(13, 'S09078-2014-11-27', 'Download Abdensi DW', '', '00:05:00'),
(14, 'S09078-2014-11-27', 'trial and repair daily activity', '', '01:00:00'),
(15, 'S09078-2014-11-27', 'Repair error dailyactivity sub detilreport', '', '01:00:00'),
(16, 'S09078-2014-11-27', 'Create manualbook input daily activity ', '', '01:00:00'),
(17, 'S08057-2014-11-27', 'Payroll', 'Payroll Calculation LDP, MSU, BRP', '03:00:00'),
(18, 'S09078-2014-11-27', 'Prog DailyAct modul Departement', '', '02:58:00'),
(19, 'S09078-2014-11-27', 'Prog DailyAct modul jobtitle', '', '01:00:00'),
(20, 'S09078-2014-11-27', 'Trouble shooting Arlika ', 'Connection Internet and IE', '00:10:00'),
(21, 'S09078-2014-11-28', 'Download absesnsi DW', '', '00:05:00'),
(22, 'S09078-2014-11-28', 'Develop prog. modul jobtitle', '', '01:40:00'),
(23, 'S09078-2014-11-28', 'Develop prog. repair password ', '', '01:30:00'),
(24, 'S10094-2014-11-28', 'review kontrak', 'review kontrak untuk diterapkan di staff', '09:00:00'),
(25, 'S09078-2014-11-28', 'Prog DA. Sub. Create Total Durasi', '', '00:12:00'),
(26, 'S09078-2014-11-28', 'Prog. DA sub report D.A.', 'Googling cari referensi tutorial coding', '04:00:00'),
(27, 'S09078-2014-12-01', 'Download absensi', '', '00:05:00'),
(28, 'S09078-2014-12-01', 'Prog. D.A', 'Create report', '00:12:00'),
(29, 'S09078-2014-12-01', 'Trouble Shooting Printer', 'Memindah Printer Arlika ke Pak. Hakim', '00:44:00'),
(30, 'S09078-2014-12-01', 'Prog. D.A', 'Create Report', '00:42:00'),
(32, 'S13208-2014-12-01', 'WTPT', 'Mengerjakan WTPT untuk gaji periode 13 November 2014 [ Berhubungan dg Cost Project 13 November 14 ] ', '01:00:00'),
(33, 'S13208-2014-12-01', 'Toolbox Meeting', 'Toolbox Meeting Harian', '00:15:00'),
(35, 'S09078-2014-11-25', 'Burning CD Bu Umakis', '', '00:05:00'),
(36, 'S09078-2014-11-25', 'Trouble Shooting Printer', 'Isi tinta Printer Arlika', '00:10:00'),
(37, 'S09078-2014-11-25', 'Prog. D.A', 'Create report deilt report', '05:00:00'),
(38, 'S09078-2014-11-26', 'Prog. D.A.', 'Daily activities per User', '02:00:00'),
(39, 'S09078-2014-11-26', 'Prog. D.A.', 'Change Password Per user', '02:30:00'),
(40, 'S09078-2014-11-26', 'Prog. D.A.', 'create prog. and Import Data User Employee from file excel ', '01:45:00'),
(41, 'S09078-2014-11-26', 'Prog. D.A.', 'Create view for admin and for staff', '02:10:00'),
(42, 'S09078-2014-11-26', 'Prog. D.A.', 'Create User and password default', '00:10:00'),
(44, 'S11103-2014-11-27', 'inspect  oprasioanal maint', '', '00:00:00'),
(45, 'S11103-2014-11-27', 'belanja tutup radiator + antar baut ke galfan', '', '00:00:01'),
(46, 'S11103-2014-12-01', 'inspec oprasioanal maint', '', '00:00:00'),
(47, 'S11103-2014-12-01', 'inspect pekerjaan perbaikan kompresor', 'pekerjaan memindah knalpot kompresorPDS530', '00:00:45'),
(48, 'S11103-2014-11-28', 'inspec oprasioanal maint', '', '00:00:00'),
(50, 'S11103-2014-11-28', 'sigenta project roling door ', 'inspect kebutuhan kabel power', '00:00:04'),
(51, 'S09078-2014-12-01', 'Prog. D.A', 'Manual Input Daily Activities', '03:10:00'),
(52, 'S09078-2014-12-01', 'Prog. D.A', 'List Job Title Employee', '02:56:00'),
(54, 'S13208-2014-12-01', 'Administrasi', 'Penggandaan slip gaji periode 20 Nov 14 & 27 Nov 14 untuk bagian finance', '00:30:00'),
(56, 'S13208-2014-12-01', 'Cost Project', 'Mengerjakan Cost Project Periode Gaji 06 November 2014 & 13 November 2014', '05:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` varchar(15) NOT NULL,
  `jobtitle_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_jopbtitle1_idx` (`jobtitle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `jobtitle_id`, `name`, `password`, `level`, `email`) VALUES
('admin', NULL, 'Admin', 'f3e79bfac8805b8c637d0f66b39b186e', '9', ''),
('S02004', NULL, 'Imam Wahyudi', '311e8f488f7298e3188234a0bd08ed62', '1', NULL),
('S04007', NULL, 'Tatuk Bargijono', 'f4b7246e9dfd2a9b9e21a82a2aba0903', '1', NULL),
('S04008', NULL, 'Ahmad Fudholi', '9ac026b4460943609f15c9eac973456f', '1', NULL),
('S05009', NULL, 'Yuri Widyastuti', '2441cefbf7478e70e3751f5f57026bf3', '1', NULL),
('S05010', NULL, 'Adi Irmantyo', 'e655bf1c57b8013c515def036a84d309', '1', NULL),
('S05019', NULL, 'Neni Rahayu', '87920464281097332d4e60926186748a', '1', NULL),
('S06020', NULL, 'Djoko Santoso', '1144c82bb42e9a38a77ca394c127e5d8', '1', NULL),
('S06023', NULL, 'Nia Nelviza', '1f3e11fff1964abb5ffff5374fda593a', '1', NULL),
('S06024', NULL, 'Nur Aini', '19777a94958f7c718bb59416f4acad86', '1', NULL),
('S06028', NULL, 'Sesile Santi Murti', 'a205cf127a6458987646203cfc7c8e44', '1', NULL),
('S07032', NULL, 'Muhammad Nadzir Zaini', '1adc51ad90fabf3cf87409b60b39e1a5', '1', NULL),
('S07033', NULL, 'Isharyanto', '360183510f09ed574a3c707685a31462', '1', NULL),
('S07034', NULL, 'Mochmmad Arifin', 'ad323d08347b3f1860312fa6622ba82c', '1', NULL),
('S08041', NULL, 'Nizma Hasbiyasari', '8bdbe29c9be1e415507b54ec43594e10', '1', NULL),
('S08043', NULL, 'Nefertitie Anggen', 'a4c7ded17a5e8b119bc06b519387b777', '1', NULL),
('S08044', NULL, 'Benny Kurniawan', 'ffbea09bccba28805c3753e5ba2aadf2', '1', NULL),
('S08048', NULL, 'Arlika Widya Manggar Sari', '55d105686af5f3cb883f87859ec66f83', '1', NULL),
('S08049', NULL, 'Anita Yuliana', '9bf178dda29188643fb66e670be5ce2d', '1', NULL),
('S08050', NULL, 'Nuur Zainila Romadani', '8fab2744a9259a4665319676186a2bff', '1', ''),
('S08052', NULL, 'Khushoyin', 'd00450df6184a3d2ec723e4afa7c95fc', '1', NULL),
('S08057', NULL, 'R. Ichwanul Hakim', '760e69aae9cf987d451d813f9f16eca9', '9', 'ichwanul_hakim@lintech.co.id'),
('S09063', NULL, 'Achmad Zainuddin', '40ce616133f75b33f0ad9e42d1135f98', '1', NULL),
('S09071', NULL, 'Endro Budiono', '6325f0ea42b0e8c13880d8949a26c796', '1', NULL),
('S09078', 6, 'M. Arraf Hakam', 'd235b0d23d786c863c364deb3edd7e1c', '9', 'hakam@lintech.co.id'),
('S09080', NULL, 'Umakis Rahaju Wiludjeng', 'fdfb69b5cfc1df8d9fa7f93b4aa7a803', '1', NULL),
('S10090', NULL, 'Joice Henryawardhani', '944a3e39467a666a7a76a7a5ebe98e03', '1', NULL),
('S10094', NULL, 'Bondan Cahyadi', '2e3cb138ce0b8f8d06b300e72b9aeecc', '1', NULL),
('S10095', NULL, 'Meita Sari Ramadani', '11c47298a4d62dac7620e86f2a526dde', '1', NULL),
('S11103', NULL, 'Abdul Syakur', '1ad97377fe6cbb3afa1a124d3073bdd9', '1', 'saqur@lintech.co.id'),
('S11110', NULL, 'Agus Hermawan', '6c42ff0813856d270ba5d8691509d738', '1', NULL),
('S11117', NULL, 'David Kurniawan', '8912934855ad1e6d210b361529e1c815', '1', NULL),
('S11123', NULL, 'Andhita Raheng Permadhi', '7f656a70acaf8664b91cacf52886b750', '1', NULL),
('S11128', NULL, 'Esti Setyo Utami', '43e62aebb6c898a705092b65a7ea5199', '1', NULL),
('S11132', NULL, 'Rohmad Jarwanto', '2afe7dd4fab20add526ecf765ce5c1e3', '1', NULL),
('S11133', NULL, 'Agung Joko Purnomo', 'cd3a967574b0616d330f51d84203df8f', '1', NULL),
('S11134', NULL, 'Satriyo Luhur Prasetyo', '2178a30d87604a95375b51730e68047a', '1', NULL),
('S11135', NULL, 'Lukman Hakim', '9c30c0eef14d90ad3ee1af252a380735', '1', NULL),
('S11148', NULL, 'Choirul Huda', '97acbb3f7c5216c25b76b0bac561dbbe', '1', NULL),
('S11152', NULL, 'Anthon Widodo', '061e589ac78946f055af181e367ab2ca', '1', NULL),
('S11154', NULL, 'Nurani Hamidah', '3dfcdfad08dfd435b0d7fd6b26b870a0', '1', NULL),
('S11159', NULL, 'Naharis Salam', 'd1ec3977d652adc3fd0c5b2333014adb', '1', NULL),
('S11162', NULL, 'Peni Choidjah', '6c44f7cfb935eda5b8ec69bf188934a5', '1', NULL),
('S11164', NULL, 'Rima Maduwati Putri', 'f85056c64f2134b8d04f9e22898dd8a9', '1', NULL),
('S11168', NULL, 'Yuli Kustiadi', '486a1434b209ba8cdf04241117b94883', '1', NULL),
('S11176', NULL, 'Sugeng Cahyo Wiyono', 'b96cd8e2a1421f4152d7bf96e009d464', '1', NULL),
('S11177', NULL, 'Emil Budy Sasmito', '6a2c41727f52dc217737e78258271c44', '1', NULL),
('S13206', NULL, 'Heru Darmawan', '4fb8130dbe074ceb2884138437cc2d4e', '1', NULL),
('S13208', NULL, 'Andry Widya Putra', '19984dcaea13176bbb694f62ba6b5b35', '1', 'andre@lintech.co.id'),
('S13209', NULL, 'Dian Agustina Retnowati', 'd2869c662cd1be459694aba64f324456', '1', NULL),
('S13210', NULL, 'M Saiful Hidayat', '7c95c9265f18d0d32bd460b9ec440810', '1', NULL),
('S13213', NULL, 'Handy Susanto', 'd06626c14f95ea6a72c00150acbe54e6', '1', NULL),
('S13214', NULL, 'Achmad Rizal Rifa''i', 'a6bcdfdc65f80c085c949b196e8a6cec', '1', NULL),
('S13219', NULL, 'Zudva Widiaranma Putri', '53d2725ee10d1dee0241883f5848e102', '1', NULL),
('S13222', NULL, 'Nopi Triyanto', 'afba1289daf7da37cd411c87c356504f', '1', NULL),
('S13224', NULL, 'Noval Robiq', '6ffafa104b7c869aca0f9e9fcb5e014e', '1', NULL),
('S13225', NULL, 'Yuzar Slamet', 'fba72bd8b0cbf48f6daeda72992ea018', '1', NULL),
('S13226', NULL, 'Imam Basofi', '750824c820e55741b71da9eb8099d9e9', '1', NULL),
('S14227', NULL, 'Hariyanto Wibowo', 'bf31f5d1bcdd75b1b897636793f01291', '1', NULL),
('S14228', NULL, 'Nanang Hadi Rahman', 'ae9bcc8d360a9667f1be7816e28a510f', '1', NULL),
('S14229', NULL, 'Nurlaili', 'a9a4dd91018d2d04126ddd53946fc7c1', '1', NULL),
('S14231', NULL, 'Sugiono Setiawan', 'f0838e6e739ef86067dd12b34700f4e5', '1', NULL),
('S14232', NULL, 'Ade Fariz Zakariya', '4df68038adaebd85f059346a3650fce4', '1', NULL),
('S14233', NULL, 'Shafarudin Shafar', '5d0bbadbf4c78935bd0315a77085b42c', '1', NULL),
('S14235', NULL, 'M Irfan Samsu Nuhan', '0af7dc2a047eb4223a4f5fb3dcc4db59', '1', NULL),
('S14238', NULL, 'Ririk Hariasa', '1004e79d74e4bcbc96afc605ce7ff975', '1', NULL),
('S14239', NULL, 'Rina Buawan Fatmawati', '4353948571a7f86173c4c0db6b6fc428', '1', NULL),
('S14241', NULL, 'Edy Sunarko', 'b8b777a0be6a9775bdf62c314e8f5ebb', '1', NULL),
('S14243', NULL, 'Dede Afrianto', '91728cb5601518f0ccfb7c5ac5f9cb52', '1', NULL),
('S14249', NULL, 'Kancil', '5d63f53448760d92e8bd2dedb792c90d', '1', NULL),
('S14250', NULL, 'Aditya Pratama', 'd14402859a3e4db45054c81ba4051393', '1', NULL),
('S14252', NULL, 'Sugiarto', '3a5d268ab82eac80f071045594ca9705', '1', NULL),
('S14255', NULL, 'Abdillah Rusdi', '91c2ac97a74fac648488f52888d8a51c', '1', NULL),
('S14256', NULL, 'Wahyu Diah Aliani', 'ad57e8e7b8a3597aa4c692aa1a41937b', '1', NULL),
('S14257', NULL, 'Hijrah Prajaya', 'd220839ecdab0cecf8f001966596d797', '1', NULL),
('S14260', NULL, 'Agus Sigit Susanto', '49b607b7dea2978459e7fba8a0ef4a8f', '1', NULL),
('S14263', NULL, 'Novita Sari', '0f931823272e9c8fcddd074659771f56', '1', NULL),
('S14264', NULL, 'Istianah', '9877ae0c931a5b7f860ad7cb285995af', '1', NULL),
('S14265', NULL, 'Indah Heriningrum', 'eb89d00e440283b122ac3fe01cc3f621', '1', NULL),
('S14266', NULL, 'Candra Bagaskara', 'e9dd58d46749b6d9c356613617fabd99', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobtitle`
--

CREATE TABLE IF NOT EXISTS `jobtitle` (
  `id` int(11) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jopbtitle_departement1_idx` (`departement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobtitle`
--

INSERT INTO `jobtitle` (`id`, `departement_id`, `name`) VALUES
(1, 1, 'LEGAL'),
(2, 1, 'HRD PAYROLL'),
(3, 1, 'HRD ADMIN'),
(4, 1, 'HRD RECRUITMENT'),
(5, 1, 'IT NETWORKING'),
(6, 1, 'IT DATABASE PROGRAMMING');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyreport`
--
ALTER TABLE `dailyreport`
  ADD CONSTRAINT `fk_dailyreport_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detilreport`
--
ALTER TABLE `detilreport`
  ADD CONSTRAINT `fk_detilreport_dailyreport1` FOREIGN KEY (`dailyreport_id`) REFERENCES `dailyreport` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobtitle`
--
ALTER TABLE `jobtitle`
  ADD CONSTRAINT `fk_jopbtitle_departement1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
