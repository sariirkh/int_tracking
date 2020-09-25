-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 10:58 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_acc`
--

CREATE TABLE `tb_acc` (
  `id_acc` varchar(3) NOT NULL,
  `nm_acc` varchar(20) DEFAULT NULL,
  `rem_acc` varchar(20) DEFAULT NULL,
  `stat_acc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_acc`
--

INSERT INTO `tb_acc` (`id_acc`, `nm_acc`, `rem_acc`, `stat_acc`) VALUES
('A99', 'Intern', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_accfrm`
--

CREATE TABLE `tb_accfrm` (
  `id_userfrm` varchar(7) NOT NULL,
  `id_acc` varchar(3) NOT NULL,
  `code_frm` varchar(5) NOT NULL,
  `is_add` int(1) NOT NULL,
  `is_edt` int(1) NOT NULL,
  `is_del` int(1) NOT NULL,
  `is_spec1` int(1) NOT NULL,
  `is_spec2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_accfrm`
--

INSERT INTO `tb_accfrm` (`id_userfrm`, `id_acc`, `code_frm`, `is_add`, `is_edt`, `is_del`, `is_spec1`, `is_spec2`) VALUES
('UF00001', 'A99', 'FR099', 1, 1, 1, 1, 1),
('UF00002', 'A99', 'FR002', 1, 1, 1, 1, 1),
('UF00003', 'A99', 'FR003', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp`
--

CREATE TABLE `tb_emp` (
  `id_emp` varchar(6) NOT NULL,
  `nm_emp` varchar(100) NOT NULL,
  `nicknm_emp` varchar(20) NOT NULL,
  `altnm_emp` varchar(80) NOT NULL,
  `hon_emp` varchar(10) DEFAULT NULL,
  `nik_emp` varchar(9) DEFAULT NULL,
  `id_div` varchar(4) NOT NULL,
  `id_dept` varchar(4) NOT NULL,
  `about_emp` text,
  `title_emp` varchar(100) DEFAULT NULL,
  `pos_emp` varchar(100) DEFAULT '',
  `site_emp` varchar(30) DEFAULT '',
  `stw_emp` date DEFAULT NULL,
  `enw_emp` date DEFAULT NULL,
  `id_loc` varchar(3) DEFAULT NULL,
  `sex_emp` enum('Male','Female') DEFAULT NULL,
  `bp_emp` varchar(50) DEFAULT '',
  `bd_emp` date DEFAULT NULL,
  `phone_emp` varchar(22) NOT NULL,
  `ktp_emp` varchar(16) DEFAULT NULL,
  `kk_emp` varchar(20) DEFAULT NULL,
  `sn_emp` varchar(20) DEFAULT NULL,
  `address_emp` text,
  `marst_emp` enum('Married','Single','Widow/Widower') DEFAULT NULL,
  `rel_emp` enum('Islam','Katolik','Kristen','Hindu','Budha','Konghucu','-') DEFAULT NULL,
  `eth_emp` varchar(30) DEFAULT NULL,
  `edu_emp` varchar(10) DEFAULT NULL,
  `maj_emp` varchar(50) DEFAULT NULL,
  `uni_emp` varchar(100) DEFAULT NULL,
  `blood_emp` enum('A','B','O','AB','-') DEFAULT NULL,
  `sim_emp` varchar(20) DEFAULT NULL,
  `passport_emp` varchar(20) DEFAULT NULL,
  `npwp_emp` varchar(30) DEFAULT NULL,
  `bpjs_emp` varchar(20) DEFAULT NULL,
  `kpj_emp` varchar(20) DEFAULT NULL,
  `email_emp` varchar(50) DEFAULT NULL,
  `emailwork_emp` varchar(50) DEFAULT NULL,
  `bank_emp` varchar(20) DEFAULT NULL,
  `bankbranch_emp` varchar(50) DEFAULT NULL,
  `bankacc_emp` varchar(25) DEFAULT NULL,
  `ecn_emp` varchar(50) DEFAULT NULL,
  `father_emp` varchar(50) DEFAULT NULL,
  `mother_emp` varchar(50) DEFAULT NULL,
  `spouse_emp` varchar(50) DEFAULT NULL,
  `numchild_emp` int(11) DEFAULT NULL,
  `numsibling_emp` int(11) DEFAULT NULL,
  `workday_emp` varchar(20) NOT NULL,
  `worktime_emp` varchar(20) NOT NULL,
  `efin_emp` varchar(30) DEFAULT NULL,
  `id_st_emp` varchar(10) NOT NULL,
  `acno_emp` int(6) NOT NULL,
  `id_tt` varchar(4) NOT NULL,
  `notes_emp` text,
  `show_emp` int(1) NOT NULL,
  `code_user` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_emp`
--

INSERT INTO `tb_emp` (`id_emp`, `nm_emp`, `nicknm_emp`, `altnm_emp`, `hon_emp`, `nik_emp`, `id_div`, `id_dept`, `about_emp`, `title_emp`, `pos_emp`, `site_emp`, `stw_emp`, `enw_emp`, `id_loc`, `sex_emp`, `bp_emp`, `bd_emp`, `phone_emp`, `ktp_emp`, `kk_emp`, `sn_emp`, `address_emp`, `marst_emp`, `rel_emp`, `eth_emp`, `edu_emp`, `maj_emp`, `uni_emp`, `blood_emp`, `sim_emp`, `passport_emp`, `npwp_emp`, `bpjs_emp`, `kpj_emp`, `email_emp`, `emailwork_emp`, `bank_emp`, `bankbranch_emp`, `bankacc_emp`, `ecn_emp`, `father_emp`, `mother_emp`, `spouse_emp`, `numchild_emp`, `numsibling_emp`, `workday_emp`, `worktime_emp`, `efin_emp`, `id_st_emp`, `acno_emp`, `id_tt`, `notes_emp`, `show_emp`, `code_user`) VALUES
('E99901', 'Intern', 'Intern', 'Intern', NULL, NULL, 'DV01', 'DP01', '1', NULL, '', '', '2020-09-25', '2020-09-25', NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, 'ST01', 1, 'TT01', NULL, 1, 'USR99901');

-- --------------------------------------------------------

--
-- Table structure for table `tb_frm`
--

CREATE TABLE `tb_frm` (
  `code_frm` varchar(5) NOT NULL,
  `id_frm` varchar(30) NOT NULL,
  `desc_frm` varchar(30) NOT NULL,
  `id_frmgroup` varchar(4) NOT NULL,
  `is_shortcut` int(11) NOT NULL,
  `stat_frm` int(1) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_frm`
--

INSERT INTO `tb_frm` (`code_frm`, `id_frm`, `desc_frm`, `id_frmgroup`, `is_shortcut`, `stat_frm`, `sort_order`) VALUES
('FRM02', 'Form', 'Daftar Form', 'FG05', 1, 1, 1),
('FRM03', 'Form Group', 'Daftar Form Group', 'FG05', 1, 1, 1),
('FRM99', 'Barang', 'Form Barang', 'FG99', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_frmgroup`
--

CREATE TABLE `tb_frmgroup` (
  `id_frmgroup` varchar(4) NOT NULL,
  `nm_frmgroup` varchar(50) NOT NULL,
  `icon_frmgroup` varchar(30) DEFAULT NULL,
  `iconcolor_frmgroup` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_frmgroup`
--

INSERT INTO `tb_frmgroup` (`id_frmgroup`, `nm_frmgroup`, `icon_frmgroup`, `iconcolor_frmgroup`) VALUES
('FG05', 'Others', 'fa-user', 'text-white'),
('FG99', 'Trial', 'fa-user', 'text-white');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `merk_kendaraan` varchar(255) NOT NULL,
  `nomor_kendaraan` varchar(255) NOT NULL,
  `pengguna_kendaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `merk_kendaraan`, `nomor_kendaraan`, `pengguna_kendaraan`) VALUES
(1, 'mobil', 'toyota', 'p 3047 ko', 'Sari'),
(2, 'mobil', 'toyota', 'P 4301 MD', 'Ella'),
(3, 'mobil', 'toyota', 'P 2076 YT', 'Sari'),
(4, 'mobil', 'toyota', 'P 5628 PT', 'Nando');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loc`
--

CREATE TABLE `tb_loc` (
  `id_loc` varchar(3) NOT NULL,
  `nm_loc` varchar(30) NOT NULL,
  `phn_loc` varchar(16) DEFAULT NULL,
  `fax_loc` varchar(16) DEFAULT NULL,
  `email_loc` varchar(50) DEFAULT NULL,
  `addr_loc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_loc`
--

INSERT INTO `tb_loc` (`id_loc`, `nm_loc`, `phn_loc`, `fax_loc`, `email_loc`, `addr_loc`) VALUES
('HQ1', 'Head Office', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `id_kendaraan`, `nama_lokasi`) VALUES
(1, 1, 'Mangli'),
(12, 2, 'Jember'),
(13, 3, 'Bangsal'),
(14, 4, 'Tanggul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_lokasi` int(11) NOT NULL,
  `latitude_now` varchar(255) NOT NULL,
  `longitude_now` varchar(255) NOT NULL,
  `jarak_now` double NOT NULL,
  `status` enum('di jalan','sudah sampai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `waktu`, `id_lokasi`, `latitude_now`, `longitude_now`, `jarak_now`, `status`) VALUES
(1, '2020-09-24 06:39:27', 2, '5', '2', 4, 'di jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `profile_id` varchar(4) NOT NULL,
  `website_name` varchar(30) NOT NULL,
  `website_title` varchar(30) NOT NULL,
  `website_icon` varchar(30) NOT NULL,
  `website_logo` varchar(30) NOT NULL,
  `website_address` text NOT NULL,
  `website_phone` text NOT NULL,
  `website_email` varchar(30) NOT NULL,
  `website_twitter` varchar(30) NOT NULL,
  `website_facebook` varchar(30) NOT NULL,
  `website_linkedin` varchar(30) NOT NULL,
  `website_gplus` varchar(30) NOT NULL,
  `website_instagram` varchar(30) NOT NULL,
  `profile_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`profile_id`, `website_name`, `website_title`, `website_icon`, `website_logo`, `website_address`, `website_phone`, `website_email`, `website_twitter`, `website_facebook`, `website_linkedin`, `website_gplus`, `website_instagram`, `profile_status`) VALUES
('WP01', 'MiO Web', 'PT Mangli Djaya Raya', 'mdr-ico.ico', 'mdr-logo.png', 'Jl Mayjen D.I Pandjaitan No. 99 Petung Bangsalsari, Jember Jawa Timur - Indonesia', '+62331 486656 | 711866 | 711984', 'info@ptmdr.co.id', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `code_user` varchar(8) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `pwd_user` varchar(60) NOT NULL,
  `id_acc` varchar(3) NOT NULL,
  `ava_user` varchar(80) NOT NULL,
  `jd_user` date NOT NULL,
  `isonline_user` int(1) DEFAULT NULL,
  `lastlogin_user` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`code_user`, `nm_user`, `pwd_user`, `id_acc`, `ava_user`, `jd_user`, `isonline_user`, `lastlogin_user`) VALUES
('USR99901', 'intern', '$2y$12$UAkJdlTcMZVXYGmCtZ1xfegwnq7pj9EYJYBZ1yulkYPHukOaO3vIO', 'A99', 'def.jpg', '2020-09-25', 1, '2020-09-25 13:42:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_acc`
--
ALTER TABLE `tb_acc`
  ADD PRIMARY KEY (`id_acc`);

--
-- Indexes for table `tb_accfrm`
--
ALTER TABLE `tb_accfrm`
  ADD PRIMARY KEY (`id_userfrm`);

--
-- Indexes for table `tb_emp`
--
ALTER TABLE `tb_emp`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `tb_frm`
--
ALTER TABLE `tb_frm`
  ADD PRIMARY KEY (`code_frm`);

--
-- Indexes for table `tb_frmgroup`
--
ALTER TABLE `tb_frmgroup`
  ADD PRIMARY KEY (`id_frmgroup`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_loc`
--
ALTER TABLE `tb_loc`
  ADD PRIMARY KEY (`id_loc`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`code_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
