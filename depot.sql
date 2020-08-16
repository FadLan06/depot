-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Des 2017 pada 06.26
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `kategori` varchar(2) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `nama_akun`, `kategori`, `kode`) VALUES
(48, 'Kas', 'HL', '111'),
(49, 'Persediaan', 'HL', '112'),
(50, 'Piutang Usaha', 'HL', '113'),
(51, 'Perlengkapan', 'HL', '114'),
(52, 'Peralatan', 'HL', '121'),
(53, 'Kendaraan', 'HL', '122'),
(54, 'Utang Bunga', 'HL', '123'),
(55, 'Utang Gaji', 'HL', '124'),
(56, 'Utang Usaha', 'HT', '211'),
(57, 'Modal Usaha', 'HT', '311'),
(58, 'Prive', 'HL', '312'),
(59, 'Pendapatan', 'HT', '411'),
(60, 'Pembelian', 'HL', '412'),
(61, 'Penjualan', 'HT', '413'),
(62, 'Beban Penjualan Rupa-Rupa', 'HL', '414'),
(63, 'Retur Pembelian dan Pengurangan Harga', 'HL', '511'),
(64, 'Potongan Pembelian', 'HL', '512'),
(65, 'Beban Gajian Penjualan', 'HL', '513'),
(66, 'Retur Penjualan dan Pengurangan Harga', 'HL', '514'),
(67, 'Potongan Penjualan', 'HL', '515'),
(68, 'Beban Sewa', 'HL', '516'),
(69, 'Beban Listrik', 'HL', '517'),
(70, 'Beban Administrasi Rupa-Rupa', 'HL', '518'),
(71, 'Beban Angkut Penjualan', 'HL', '521'),
(72, 'Beban Iklan', 'HL', '522'),
(73, 'Beban Komisi', 'HL', '523');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `id_akun` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `tipe` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id`, `tgl`, `id_akun`, `ket`, `ref`, `nominal`, `tipe`) VALUES
(219, '2017-07-01', '48', 'Kas', '', 350000000, 'D'),
(220, '2017-07-01', '57', 'Modal ', '', 350000000, 'K'),
(221, '2017-07-02', '49', 'Persediaan Air', '', 52000000, 'D'),
(222, '2017-07-02', '48', 'Kas', '', 52000000, 'K'),
(223, '2017-07-02', '52', 'Peralatan Depot', '', 15750000, 'D'),
(224, '2017-07-02', '50', 'Utang Usaha', '', 15750000, 'K'),
(227, '2017-08-03', '51', 'Perlengkapan', '', 5000000, 'D'),
(228, '2017-07-04', '50', 'Piutang Usaha', '', 13200000, 'D'),
(229, '2017-08-03', '48', 'Kas', '', 5000000, 'K'),
(232, '2017-07-08', '48', 'Kas', '', 5000000, 'D'),
(233, '2017-07-08', '50', 'Piutang Usaha', '', 5000000, 'K'),
(234, '2017-07-12', '60', 'Pembelian', '', 55300000, 'D'),
(235, '2017-07-12', '48', 'Kas', '', 55300000, 'K'),
(238, '2017-07-13', '71', 'Beban Angkut Penjualan', '', 350000, 'D'),
(239, '2017-07-13', '48', 'Kas', '', 350000, 'K'),
(240, '2017-07-17', '65', 'Beban Gaji Bagian Penjualan', '', 1000000, 'D'),
(241, '2017-07-17', '48', 'Kas', '', 1000000, 'K'),
(242, '2017-07-20', '48', 'Kas', '', 5500000, 'D'),
(243, '2017-07-20', '61', 'Penjualan', '', 5500000, 'K'),
(244, '2017-07-20', '67', 'Potongan Penjualan', '', 250000, 'D'),
(245, '2017-07-20', '59', 'Pendapatan', '', 250000, 'K'),
(246, '2017-07-23', '62', 'Beban Penjualan Rupa-rupa', '', 450000, 'D'),
(247, '2017-07-23', '59', 'Pendapatan', '', 450000, 'K'),
(248, '2017-07-25', '68', 'Beban Sewa', '', 1000000, 'D'),
(249, '2017-07-25', '48', 'Kas', '', 1000000, 'K'),
(250, '2017-07-26', '53', 'Motor', '', 12000000, 'D'),
(251, '2017-07-26', '48', 'Kas', '', 12000000, 'K'),
(252, '2017-07-28', '70', 'Beban Administrasi Rupa-rupa', '', 1500000, 'D'),
(253, '2017-07-28', '48', 'Kas', '', 1500000, 'K'),
(256, '2017-07-28', '69', 'Beban Listrik', '', 532000, 'D'),
(257, '2017-07-28', '48', 'Kas', '', 532000, 'K'),
(258, '2017-07-30', '54', 'Utang Bunga', '', 1400000, 'D'),
(259, '2017-07-30', '48', 'Kas', '', 1400000, 'K'),
(260, '2017-07-30', '55', 'Utang Gaji', '', 500000, 'D'),
(261, '2017-07-30', '59', 'Kas', '', 500000, 'K'),
(262, '2017-07-31', '73', 'Biayi Komisi', '', 500000, 'D'),
(263, '2017-07-31', '48', 'Kas', '', 500000, 'K'),
(264, '2017-08-06', '58', 'Prive', '', 15000000, 'D'),
(265, '2017-08-06', '48', 'Kas', '', 15000000, 'K'),
(266, '2017-08-15', '72', 'Beban Iklan', '', 250000, 'D'),
(267, '2017-08-15', '48', 'Kas', '', 250000, 'K'),
(270, '2017-08-28', '69', 'Beban Listrik', '', 532000, 'D'),
(271, '2017-08-28', '48', 'Kas', '', 532000, 'K'),
(272, '2017-07-07', '56', 'Utang Usaha', '', 10500000, 'D'),
(273, '2017-07-07', '48', 'Kas', '', 10500000, 'K'),
(274, '2017-07-04', '59', 'Pendapatan', '', 13200000, 'K'),
(275, '2017-07-12', '64', 'Potongan Pembelian', '', 500000, 'D'),
(276, '2017-07-12', '48', 'Kas', '', 500000, 'K'),
(277, '2017-08-25', '68', 'Beban Sewa', '', 1000000, 'D'),
(278, '2017-08-25', '48', 'Kas', '', 1000000, 'K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
