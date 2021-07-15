-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 05:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `telepon_admin` varchar(20) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  `foto_admin` varchar(30) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `telepon_admin`, `tgl_buat`, `foto_admin`, `id_level`) VALUES
(1, 'Kholis', 'kholis', '$2y$10$HbJ06AEJhF2xM1UqleVZHusBpQSzUU4y.FQUUASZujPHbZtTxnysq', '0812890098771', 1562075102, 'Yonathan_Subardi1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tahapan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_mulai`, `tanggal_selesai`, `tahapan`) VALUES
(1, '2021-06-02', '2021-06-02', 'Pengemumuman Penerimaan Pendaftaran Perserta Didik Baru (PPDB)'),
(2, '2021-06-15', '2021-06-15', 'Pendaftaran'),
(3, '2021-07-03', '0000-00-00', 'Seleksi'),
(4, '2021-07-04', '0000-00-00', 'Pengumuman Penetapan Perserta Didik Baru'),
(5, '2021-07-06', '2021-07-08', 'Daftar Ulang'),
(6, '2021-07-13', '2021-06-13', 'Hari Pertama Masuk Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `jalur_pendaftaran`
--

CREATE TABLE `jalur_pendaftaran` (
  `id_jalur` int(11) NOT NULL,
  `nama_jalur` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur_pendaftaran`
--

INSERT INTO `jalur_pendaftaran` (`id_jalur`, `nama_jalur`) VALUES
(1, 'Prestasi Akademik dan Non-Akademik'),
(2, 'Nilai Raport'),
(3, 'Afirmasi'),
(4, 'Perpindahan Tugas Orang Tua/Wali'),
(5, 'Zonasi');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Kejaksan'),
(2, 'Pekalipan'),
(3, 'Lemahwungkuk'),
(4, 'Kesambi'),
(5, 'Harjamukti');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `kelurahan`) VALUES
(1, 'Kejaksan'),
(2, 'Kesenden'),
(3, 'Kebon Baru'),
(4, 'Sukapura'),
(5, 'Pekalipan'),
(6, 'Pekalangan'),
(7, 'Pulasaren'),
(8, 'Jagasatru'),
(9, 'Lemahwungkuk'),
(10, 'Panjunan'),
(11, 'Kasepuhan'),
(12, 'Pengambiran'),
(13, 'Kesambi'),
(14, 'Drajat'),
(15, 'Pekiringan'),
(16, 'Sunyarangi'),
(17, 'Karyamulya'),
(18, 'Harjamukti'),
(19, 'Kalijaga'),
(20, 'Argasunya'),
(21, 'Kecapi'),
(22, 'Larangan');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama_panitia` varchar(50) NOT NULL,
  `username_panitia` varchar(50) NOT NULL,
  `password_panitia` varchar(256) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `telepon_panitia` varchar(20) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  `foto_panitia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `username_panitia`, `password_panitia`, `jabatan`, `telepon_panitia`, `id_sekolah`, `id_level`, `tgl_buat`, `foto_panitia`) VALUES
(6, 'VIOLETRA', 'violetra', '$2y$10$LUG0YWszyUvmgayyGS/n1uZonZkXCeX02FBazdMdsJ22HzgBbtZ6e', 'Bimbingan Konseling', '08900188', 0, 2, 1625303082, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `no_form` varchar(50) NOT NULL,
  `tahun_akademik` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_jalur` int(11) NOT NULL,
  `foto_siswa` varchar(50) NOT NULL,
  `berkas_pendaftar` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_panitia` int(11) NOT NULL,
  `status_verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`no_form`, `tahun_akademik`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat_siswa`, `id_kelurahan`, `rt`, `rw`, `id_kecamatan`, `id_sekolah`, `id_jalur`, `foto_siswa`, `berkas_pendaftar`, `tanggal_daftar`, `id_panitia`, `status_verifikasi`) VALUES
('211010011625308361', '2017/2018', 'MOHAMMAD WAKHYUDI', 'Perempuan', 'CIREBON', '2021-07-03', 'Islam', 'Pelandakan', 1, 1, 2, 1, 1, 2, 'SITI_NURFADILAH8.jpg', 'SITI_NURFADILAH8.jpg', '2021-07-03', 1, 0),
('211010011625308777', '2017/2018', 'SITI NURFADILAH', 'Perempuan', 'CIREBON', '2021-07-03', 'Islam', 'Pelandakan', 6, 1, 2, 2, 1, 2, 'SITI_NURFADILAH11.jpg', 'SITI_NURFADILAH11.jpg', '2021-07-03', 1, 0),
('211060011625332283', '2017/2018', 'MOHAMMAD WAKHYUDI', 'Laki-Laki', 'CIREBON', '2021-07-03', 'Islam', 'JL. P. GRENJENG', 18, 3, 6, 5, 6, 2, 'MOHAMMAD_WAKHYUDI5.JPG', 'MOHAMMAD_WAKHYUDI5.JPG', '2021-07-03', 6, 0),
('211150011625310492', '2017/2018', 'ANANDA FIRLIYANA', 'Perempuan', 'CIREBON', '2021-07-03', 'Islam', 'Jl. Kampung Melati No. 7', 2, 1, 2, 3, 15, 3, 'ANANDA_FIRLIYANA2.JPG', 'ANANDA_FIRLIYANA2.JPG', '2021-07-03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id_reward` int(11) NOT NULL,
  `reward` int(50) NOT NULL,
  `tanggal_buat` int(11) NOT NULL,
  `status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id_reward`, `reward`, `tanggal_buat`, `status_aktif`) VALUES
(1, 100000, 1581380144, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `kode_sekolah` int(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `kode_sekolah`, `nama_sekolah`) VALUES
(1, 101, 'MI AL - HIDAYAH GUPPI'),
(2, 102, 'MI DARUL MASHOLEH'),
(3, 103, 'MI DARUN NAIM'),
(4, 104, 'MI SALAFIYAH'),
(5, 105, 'SD IT AS SUNAH'),
(6, 106, 'SD NEGERI GRENJENG'),
(7, 107, 'SD NEGERI JABANG BAYI'),
(8, 108, 'SD NEGERI KALITANJUNG 1'),
(9, 109, 'SD NEGERI KALITANJUNG 2'),
(10, 110, 'SD NEGERI KANGGRAKSAN'),
(11, 111, 'SD NEGERI KARANG YUDHA'),
(12, 112, 'SD NEGERI KARYA MULYA 1'),
(13, 113, 'SD NEGERI KARYA MULYA 2'),
(14, 114, 'SD NEGERI KARYAWINAYA'),
(15, 115, 'SD NEGERI KAYU WALANG'),
(16, 116, 'SD NEGERI KESAMBI DALAM 3'),
(17, 117, 'SD NEGERI KETILANG'),
(18, 118, 'SD NEGERI KURANJI'),
(19, 119, 'SD NEGERI LEMAH ABANG'),
(20, 120, 'SD NEGERI MAJASEM 1'),
(21, 121, 'SD NEGERI MAJASEM 2'),
(22, 122, 'SD NEGERI MEGA ELTRA'),
(23, 123, 'SD NEGERI PEKIRINGAN'),
(24, 124, 'SD NEGERI PELANDAKAN 1'),
(25, 125, 'SD NEGERI PELANDAKAN 1'),
(26, 126, 'SD NEGERI PULASAREN 4'),
(27, 127, 'SD NEGERI RAJAWALI'),
(28, 128, 'SD NEGERI SADAGORI 1'),
(29, 129, 'SD NEGERI SADAGORI 2'),
(30, 130, 'SD NEGERI SILIH ASIH 1'),
(31, 131, 'SD NEGERI SILIH ASIH 2'),
(32, 132, 'SD NEGERI SUNYARAGI 2'),
(33, 133, 'SD NEGERI 1 KEPONGPONGAN'),
(34, 134, 'SD NEGERI 2 KEPONGPONGAN'),
(35, 135, 'SD NEGERI 3 KEPONGPONGAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jalur_pendaftaran`
--
ALTER TABLE `jalur_pendaftaran`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`no_form`),
  ADD UNIQUE KEY `id_kelurahan` (`id_kelurahan`),
  ADD UNIQUE KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_kampus` (`id_jalur`),
  ADD KEY `id_member` (`id_panitia`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `panitia`
--
ALTER TABLE `panitia`
  ADD CONSTRAINT `panitia_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
