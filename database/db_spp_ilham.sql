-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2021 pada 07.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp_ilham`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Kesalahan membaca data untuk tabel db_spp_ilham.kelas: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_spp_ilham`.`kelas`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(12) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(15, 1, '0034508827', '2021-01-04', 'januari', '2021', 1, 200000),
(17, 1, '0034508827', '2021-03-11', 'maret', '2021', 1, 200000),
(18, 1, '0034508827', '2021-02-03', 'februari', '2021', 1, 200000),
(19, 2, '0034508827', '2021-04-29', 'april', '2021', 1, 200000),
(20, 2, '0034508827', '2021-05-06', 'Mei', '2021', 1, 200000),
(21, 2, '0034508827', '2021-06-12', 'juni', '2021', 1, 200000),
(22, 2, '0029482937', '2021-07-29', 'juli', '2021', 3, 100000),
(23, 2, '0029482937', '2021-08-13', 'agustus', '2021', 3, 100000),
(24, 2, '0029482937', '2021-09-08', 'september', '2021', 3, 100000),
(25, 2, '0022126766', '2021-10-19', 'oktober', '2021', 2, 150000),
(26, 2, '0022126766', '2021-11-21', 'november', '2021', 2, 150000),
(27, 2, '0022126766', '2021-12-04', 'desember', '2021', 2, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('Admin','Petugas','siswa','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', '123', 'H.Asep Saepullah Spd', 'Admin'),
(2, 'petugas', '321', 'Rachmawati Rahayu Spd', 'Petugas'),
(18, '0034508827', 'ilham', 'Ilham Baihaqie Nur Falah', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('0022126766', '181910545', 'Putri Melida Agrezta', 1, 'Cihanjuang', '08534261233', 1),
('0028127065', '181910549', 'Wita Amelia', 2, 'Kota Bandung', '08725647142', 2),
('0029482937', '181910550', 'Salma Nur Aisy', 2, 'Cimahi', '08552351637', 2),
('0029692434', '181910543', 'Ihsan Nurmansyah', 1, 'Padalarang', '08123142345', 1),
('0032002614', '181910548', 'Muhammad Yusuf', 2, 'Dago', '081253625136', 2),
('0032364014', '181910547', 'Meisa Damayanti', 1, 'Jl Riau', '08562157356', 1),
('0034117682', '181910544', 'Lucky Wiratama Suganda', 2, 'Sumur Bandung', '0856242315', 2),
('0034221785', '181910552', 'Afgani Maulana', 3, 'Cimahi selatan', '08219037745', 3),
('0034508827', '181910543', 'Ilham Baihaqie Nur Falah', 3, 'Batujajar Barat', '08654325441', 1),
('0039758919', '181910551', 'Indah Muslimah', 3, 'Kota Cimahi', '083275686543', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2021, 200000),
(2, 2020, 150000),
(3, 2019, 120000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
