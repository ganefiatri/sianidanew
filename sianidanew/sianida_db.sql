-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 08:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g7`
--

-- --------------------------------------------------------

--
-- Table structure for table `breaktime`
--

CREATE TABLE `breaktime` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `author` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_restitusi`
--

CREATE TABLE `db_restitusi` (
  `id` int(11) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `jenis_lap` varchar(100) DEFAULT NULL,
  `nama_pelapor` varchar(150) DEFAULT NULL,
  `nama_pelanggan` varchar(150) DEFAULT NULL,
  `nomor_pelanggan` varchar(100) DEFAULT NULL,
  `relasi` varchar(150) DEFAULT NULL,
  `nominal` varchar(200) DEFAULT NULL,
  `nominal_text` varchar(250) DEFAULT NULL,
  `jangka_waktu` varchar(100) DEFAULT NULL,
  `jenis_masalah` varchar(150) DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL,
  `uraian` text,
  `author` varchar(50) DEFAULT NULL,
  `author_sign` text,
  `signature` text,
  `signature_true` int(11) DEFAULT NULL,
  `author_sign2` text,
  `signature2` text,
  `signature_true2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_disclaimer`
--

CREATE TABLE `form_disclaimer` (
  `id` int(11) NOT NULL,
  `digital_sign` longtext COLLATE utf8_unicode_ci,
  `msisdn` varchar(14) COLLATE utf8_unicode_ci DEFAULT '',
  `msisdn_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `msisdn_nik` varchar(16) COLLATE utf8_unicode_ci DEFAULT '',
  `msisdn_alamat` text COLLATE utf8_unicode_ci,
  `msisdn_nomorkk` varchar(24) COLLATE utf8_unicode_ci DEFAULT '',
  `msisdn_tempatlahir` text COLLATE utf8_unicode_ci,
  `msisdn_tanggallahir` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rowstat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `slug` varchar(16) NOT NULL,
  `deskripsi` text NOT NULL,
  `value` varchar(225) NOT NULL,
  `ct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gk_banking`
--

CREATE TABLE `gk_banking` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `msisdn` varchar(50) DEFAULT NULL,
  `ck1` varchar(20) DEFAULT NULL,
  `ck2` varchar(20) DEFAULT NULL,
  `ck3` varchar(20) DEFAULT NULL,
  `ck4` varchar(20) DEFAULT NULL,
  `ck5` varchar(20) DEFAULT NULL,
  `ck6` varchar(20) DEFAULT NULL,
  `ck7` varchar(20) DEFAULT NULL,
  `ck8` varchar(20) DEFAULT NULL,
  `ck9` varchar(20) DEFAULT NULL,
  `ck10` varchar(20) DEFAULT NULL,
  `ck11` varchar(20) DEFAULT NULL,
  `ck12` varchar(20) DEFAULT NULL,
  `ck13` varchar(20) DEFAULT NULL,
  `ck14` varchar(20) DEFAULT NULL,
  `ck15` varchar(20) DEFAULT NULL,
  `ck16` varchar(50) DEFAULT NULL,
  `date` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_sign` varchar(100) DEFAULT NULL,
  `digital_sign` longtext,
  `digital_sign2` text NOT NULL,
  `cek` int(11) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `tipe1` int(11) DEFAULT NULL,
  `tipe2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_excel`
--

CREATE TABLE `import_excel` (
  `id` int(11) NOT NULL,
  `name1` varchar(100) DEFAULT NULL,
  `name3` varchar(100) DEFAULT NULL,
  `jenis_grapari` varchar(50) DEFAULT NULL,
  `kategori_grapari` varchar(50) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `type_grapari` varchar(50) DEFAULT NULL,
  `jam_operasional` varchar(100) DEFAULT NULL,
  `alamat_lengkap` varchar(250) DEFAULT NULL,
  `longtitude` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(200) DEFAULT NULL,
  `provinsi` varchar(200) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL,
  `kota` varchar(200) DEFAULT NULL,
  `persedian_mygrapari` varchar(10) DEFAULT NULL,
  `interaksi_mygrapari` varchar(200) DEFAULT NULL,
  `case` int(11) DEFAULT NULL,
  `dealer` varchar(100) DEFAULT NULL,
  `visit` varchar(100) DEFAULT NULL,
  `respon_sms` varchar(100) DEFAULT NULL,
  `respon_web` varchar(100) DEFAULT NULL,
  `ces` varchar(100) DEFAULT NULL,
  `tnps` varchar(100) DEFAULT NULL,
  `online_booking` varchar(100) DEFAULT NULL,
  `visit_class` varchar(100) DEFAULT NULL,
  `ces_class` varchar(100) DEFAULT NULL,
  `tnps_class` varchar(100) DEFAULT NULL,
  `sampling` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indeks`
--

CREATE TABLE `indeks` (
  `value` int(11) NOT NULL,
  `cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `msisdn` varchar(14) NOT NULL,
  `nama_plgn` varchar(64) NOT NULL,
  `kronologis` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `revenue` decimal(10,0) DEFAULT NULL,
  `case_type` varchar(64) DEFAULT NULL,
  `internet_no` varchar(12) DEFAULT NULL,
  `ndem_no` varchar(8) DEFAULT NULL,
  `tiket_no` varchar(12) DEFAULT NULL,
  `c_t` int(11) NOT NULL DEFAULT '0',
  `no_telp` varchar(14) DEFAULT NULL,
  `indihome_alasan_tutup` varchar(255) DEFAULT NULL,
  `jenis_product` varchar(64) DEFAULT NULL,
  `revenuetelkom` decimal(10,0) DEFAULT NULL,
  `antrian` varchar(14) DEFAULT NULL,
  `antrian_hp` varchar(14) DEFAULT NULL,
  `paketlama` varchar(20) DEFAULT NULL,
  `paketbaru` varchar(20) DEFAULT NULL,
  `csname` varchar(100) DEFAULT NULL,
  `topik_layanan` varchar(200) DEFAULT NULL,
  `halopaket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbookx`
--

CREATE TABLE `logbookx` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `msisdn` varchar(14) NOT NULL,
  `nama_plgn` varchar(64) NOT NULL,
  `kronologis` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `revenue` decimal(10,0) DEFAULT NULL,
  `case_type` varchar(64) DEFAULT NULL,
  `internet_no` varchar(12) DEFAULT NULL,
  `ndem_no` varchar(8) DEFAULT NULL,
  `tiket_no` varchar(12) DEFAULT NULL,
  `c_t` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook_last`
--

CREATE TABLE `logbook_last` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `msisdn` varchar(14) NOT NULL,
  `nama_plgn` varchar(64) NOT NULL,
  `kronologis` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `revenue` decimal(10,0) DEFAULT NULL,
  `case_type` varchar(64) DEFAULT NULL,
  `internet_no` varchar(12) DEFAULT NULL,
  `ndem_no` varchar(8) DEFAULT NULL,
  `tiket_no` varchar(12) DEFAULT NULL,
  `c_t` int(11) NOT NULL DEFAULT '0',
  `no_telp` varchar(14) DEFAULT NULL,
  `indihome_alasan_tutup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `note` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penutupan`
--

CREATE TABLE `penutupan` (
  `id` int(11) NOT NULL,
  `id_workbook` int(11) NOT NULL,
  `jenis_modem` varchar(32) NOT NULL,
  `serial_number` varchar(32) NOT NULL,
  `merk_stb` varchar(32) DEFAULT NULL,
  `sn_stb` varchar(255) DEFAULT NULL,
  `remote` tinyint(1) DEFAULT NULL,
  `kabel` tinyint(1) DEFAULT NULL,
  `kabel_lan` tinyint(1) DEFAULT NULL,
  `adaptor` tinyint(1) DEFAULT NULL,
  `tanggal` int(11) NOT NULL,
  `digital_sign` longtext,
  `digital_sign2` text NOT NULL,
  `digital_sign2_true` int(1) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `jenis_product` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rast`
--

CREATE TABLE `rast` (
  `id` int(11) NOT NULL,
  `author` int(2) UNSIGNED NOT NULL,
  `nofastel` varchar(255) NOT NULL,
  `namaplgn` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rekomendasi` text NOT NULL,
  `date` int(11) NOT NULL,
  `permasalahan` text NOT NULL,
  `kesimpulan` text NOT NULL,
  `adjustmentval` varchar(255) NOT NULL,
  `adjustmentdate` int(11) NOT NULL,
  `no_tiket` varchar(100) DEFAULT NULL,
  `jenis_tiket` varchar(50) DEFAULT NULL,
  `cek` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reaktivasi_kartuhalo`
--

CREATE TABLE `reaktivasi_kartuhalo` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `msisdn` varchar(18) NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `col1_1` varchar(64) DEFAULT NULL,
  `col1_2` varchar(64) DEFAULT NULL,
  `col1_3` varchar(64) DEFAULT NULL,
  `col1_4` varchar(64) DEFAULT NULL,
  `col1_5` varchar(64) DEFAULT NULL,
  `col1_6` varchar(64) DEFAULT NULL,
  `col2_1` varchar(64) DEFAULT NULL,
  `col2_2` varchar(64) DEFAULT NULL,
  `col2_3` varchar(64) DEFAULT NULL,
  `col2_4` varchar(64) DEFAULT NULL,
  `col2_5` varchar(64) DEFAULT NULL,
  `col2_6` varchar(64) DEFAULT NULL,
  `waktu` int(11) NOT NULL,
  `digital_sign` longtext,
  `c_t` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `nama` varchar(64) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `kk` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `digital_sign` longtext NOT NULL,
  `c_t` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regmsisdn`
--

CREATE TABLE `regmsisdn` (
  `reg_id` int(11) NOT NULL,
  `msisdn` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regprepaid`
--

CREATE TABLE `regprepaid` (
  `id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `nama` varchar(64) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `kk` varchar(16) NOT NULL,
  `digital_sign` longtext NOT NULL,
  `ktplifetime` int(11) DEFAULT NULL,
  `gender` enum('MALE','FEMALE','','') NOT NULL,
  `addrbyktp` text NOT NULL,
  `addr` text NOT NULL,
  `birthplace` text NOT NULL,
  `birthdate` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `c_t` int(11) NOT NULL DEFAULT '0',
  `statement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regprepaid_msisdn`
--

CREATE TABLE `regprepaid_msisdn` (
  `reg_id` int(11) NOT NULL,
  `msisdn` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `starla`
--

CREATE TABLE `starla` (
  `id` int(11) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `topik` varchar(100) DEFAULT NULL,
  `info` varchar(10) DEFAULT NULL,
  `validasi` varchar(10) DEFAULT NULL,
  `identifikasi` varchar(10) DEFAULT NULL,
  `eskalasi` varchar(10) DEFAULT NULL,
  `dokumentasi` varchar(10) DEFAULT NULL,
  `selling` varchar(10) DEFAULT NULL,
  `digital` varchar(10) DEFAULT NULL,
  `nego` varchar(10) DEFAULT NULL,
  `gromming` varchar(10) DEFAULT NULL,
  `uniform` varchar(10) DEFAULT NULL,
  `greeting` varchar(10) DEFAULT NULL,
  `intimasi` varchar(10) DEFAULT NULL,
  `komunikasi` varchar(10) DEFAULT NULL,
  `survey` varchar(10) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_esign`
--

CREATE TABLE `tb_esign` (
  `id` int(11) NOT NULL,
  `author` varchar(10) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `nama_plg` varchar(250) DEFAULT NULL,
  `no_ktp` varchar(250) DEFAULT NULL,
  `jk` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `no_tlp` varchar(250) DEFAULT NULL,
  `tempat_lhr` varchar(100) DEFAULT NULL,
  `tanggal_lhr` varchar(100) DEFAULT NULL,
  `warga` varchar(250) DEFAULT NULL,
  `layanan` varchar(250) DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL,
  `alasan` varchar(250) DEFAULT NULL,
  `jumlah_rest` varchar(200) DEFAULT NULL,
  `terbilang` varchar(500) DEFAULT NULL,
  `penyelesaian` varchar(50) DEFAULT NULL,
  `kelengkapan` varchar(150) DEFAULT NULL,
  `petugas` varchar(150) DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `pengaduan` varchar(250) DEFAULT NULL,
  `uraian` varchar(500) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `img` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE `vc` (
  `id` int(11) NOT NULL,
  `msisdn` varchar(16) NOT NULL,
  `date` int(11) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breaktime`
--
ALTER TABLE `breaktime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_restitusi`
--
ALTER TABLE `db_restitusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_disclaimer`
--
ALTER TABLE `form_disclaimer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gk_banking`
--
ALTER TABLE `gk_banking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_excel`
--
ALTER TABLE `import_excel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbookx`
--
ALTER TABLE `logbookx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook_last`
--
ALTER TABLE `logbook_last`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `penutupan`
--
ALTER TABLE `penutupan`
  ADD PRIMARY KEY (`id_workbook`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rast`
--
ALTER TABLE `rast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reaktivasi_kartuhalo`
--
ALTER TABLE `reaktivasi_kartuhalo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `regmsisdn`
--
ALTER TABLE `regmsisdn`
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `regprepaid`
--
ALTER TABLE `regprepaid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `regprepaid_msisdn`
--
ALTER TABLE `regprepaid_msisdn`
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `starla`
--
ALTER TABLE `starla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_esign`
--
ALTER TABLE `tb_esign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `vc`
--
ALTER TABLE `vc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breaktime`
--
ALTER TABLE `breaktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4330;

--
-- AUTO_INCREMENT for table `db_restitusi`
--
ALTER TABLE `db_restitusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_disclaimer`
--
ALTER TABLE `form_disclaimer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gk_banking`
--
ALTER TABLE `gk_banking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `import_excel`
--
ALTER TABLE `import_excel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1193;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38944;

--
-- AUTO_INCREMENT for table `logbookx`
--
ALTER TABLE `logbookx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13974;

--
-- AUTO_INCREMENT for table `logbook_last`
--
ALTER TABLE `logbook_last`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27496;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `penutupan`
--
ALTER TABLE `penutupan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4603;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rast`
--
ALTER TABLE `rast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reaktivasi_kartuhalo`
--
ALTER TABLE `reaktivasi_kartuhalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `regprepaid`
--
ALTER TABLE `regprepaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1450;

--
-- AUTO_INCREMENT for table `starla`
--
ALTER TABLE `starla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_esign`
--
ALTER TABLE `tb_esign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vc`
--
ALTER TABLE `vc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `regmsisdn`
--
ALTER TABLE `regmsisdn`
  ADD CONSTRAINT `regmsisdn_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
