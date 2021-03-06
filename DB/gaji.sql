-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jan 2017 pada 16.28
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajian`
--

CREATE TABLE `gajian` (
  `nik` varchar(10) NOT NULL,
  `kd_gaji` int(20) NOT NULL,
  `gaji_bulan` varchar(10) NOT NULL,
  `gaji_tahun` varchar(4) NOT NULL,
  `hadir` varchar(2) NOT NULL,
  `telat` varchar(2) NOT NULL,
  `tidak_hadir` varchar(2) NOT NULL,
  `premi_hadir` int(20) NOT NULL,
  `tunjangan_konsumsi` int(20) NOT NULL,
  `komisi_penjualan` int(20) NOT NULL,
  `komisi_bsc` int(20) NOT NULL,
  `barang_berkomisi` int(20) NOT NULL,
  `tunjangan_jamsostek` int(20) NOT NULL,
  `uang_lembur` int(20) NOT NULL,
  `gaji_bruto` int(20) NOT NULL,
  `setor_jamsostek` int(20) NOT NULL,
  `pot_jamsostek` int(20) NOT NULL,
  `gaji_netto` int(20) NOT NULL,
  `pot_telat` int(20) NOT NULL,
  `pot_tidak_hadir` int(20) NOT NULL,
  `pot_premi_hadir` int(20) NOT NULL,
  `pot_itu` int(20) NOT NULL,
  `pot_iuran_wajib` int(20) NOT NULL,
  `pot_iuran_sukarela` int(20) NOT NULL,
  `pot_iuran_koperasi` int(20) NOT NULL,
  `biaya_adm` int(20) NOT NULL,
  `take_home_pay` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gajian`
--

INSERT INTO `gajian` (`nik`, `kd_gaji`, `gaji_bulan`, `gaji_tahun`, `hadir`, `telat`, `tidak_hadir`, `premi_hadir`, `tunjangan_konsumsi`, `komisi_penjualan`, `komisi_bsc`, `barang_berkomisi`, `tunjangan_jamsostek`, `uang_lembur`, `gaji_bruto`, `setor_jamsostek`, `pot_jamsostek`, `gaji_netto`, `pot_telat`, `pot_tidak_hadir`, `pot_premi_hadir`, `pot_itu`, `pot_iuran_wajib`, `pot_iuran_sukarela`, `pot_iuran_koperasi`, `biaya_adm`, `take_home_pay`) VALUES
('1051412', 2, 'Januari', '2016', '5', '6', '6', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6),
('1051412', 3, 'Maret', '2019', '23', '23', '23', 234, 34534543, 234, 234, 234, 234, 234, 345345, 345435, 435435, 435435, 345, 345, 543, 543, 55, 43, 5345, 345, 54),
('1051412', 4, 'Maret', '2017', '23', '23', '23', 777123, 9999, 234, 234, 432, 234, 324, 234, 234, 423, 234, 234, 423, 234, 234, 234, 34, 234, 234, 234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `departemen` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('tetap','kontrak','magang','outsource') NOT NULL,
  `gaji_pokok` int(225) NOT NULL,
  `tunjangan` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `departemen`, `nama`, `alamat`, `gender`, `no_hp`, `status`, `gaji_pokok`, `tunjangan`) VALUES
('1051412', 'IT', 'Dewan Rahadyan', 'Jl. Sekeloa Utara 225B', 0, '081277049803', 'tetap', 90000000, 100000000),
('1312', 'QC', '123', '123213', 1, '123123', 'kontrak', 0, 0),
('20160002', 'QC', 'Jampang', 'Kp. Jampang', 0, '085687659087', 'kontrak', 0, 0),
('20160003', 'Marketing', 'Anton Sugianto', 'Kp. Pilar Timur', 0, '085677738883', 'kontrak', 0, 0),
('20160004', '0', 'Ujang Syamsudin', 'Kp. Sukatani - Cikarang - Bekasi', 0, '09876758432', 'magang', 0, 0),
('20160005', '0', 'Rizki Firdaus', 'Kp. Pilar Barat - Cikarang - Bekasi', 0, '085694123456', 'outsource', 0, 0),
('213', '3', '123', '123', 0, '123', 'kontrak', 0, 0),
('23', '2', '123', '123214', 0, '124', 'tetap', 0, 0),
('2312333', '2', '12333', '213', 1, '213', 'magang', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `no_hp`, `level`, `gambar`) VALUES
(2, 'admin', 'admin', 'Hakko Bio Richard', '085694984803', 'admin', 'gambar_admin/admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gajian`
--
ALTER TABLE `gajian`
  ADD PRIMARY KEY (`kd_gaji`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gajian`
--
ALTER TABLE `gajian`
  MODIFY `kd_gaji` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
