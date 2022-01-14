-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2022 pada 17.10
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `izintinggal`
--

CREATE TABLE `izintinggal` (
  `id_izintinggal` varchar(64) NOT NULL,
  `nama_jlayanan` varchar(64) NOT NULL,
  `noregister` varchar(64) NOT NULL,
  `niora` varchar(64) NOT NULL,
  `nopermohonan` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kebangsaan` varchar(70) NOT NULL,
  `jkelamin` varchar(20) NOT NULL,
  `tgl_penyelesaian` date NOT NULL,
  `no_paspor` varchar(64) NOT NULL,
  `tgl_habisberlakupaspor` date NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `perpanjangan` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'default.pdf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `izintinggal`
--

INSERT INTO `izintinggal` (`id_izintinggal`, `nama_jlayanan`, `noregister`, `niora`, `nopermohonan`, `nama`, `kebangsaan`, `jkelamin`, `tgl_penyelesaian`, `no_paspor`, `tgl_habisberlakupaspor`, `layanan`, `perpanjangan`, `lokasi`, `file`) VALUES
('60e567e5e46ed', 'ITK', '2BA3485676T', 'BT877590AU', '3456789', 'Samuel Oclair', 'AMERIKA SERIKAT', 'Laki-Laki', '2021-07-14', 'AS01234790', '2024-07-08', 'PERPANJANGAN IZIN TINGGAL KUNJUNGAN SAAT KEDATANGAN', 1, 'L3-R1-B1', 'Samuel_Oclair.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenislayanan`
--

CREATE TABLE `jenislayanan` (
  `id_jlayanan` varchar(64) NOT NULL,
  `nama_jlayanan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenislayanan`
--

INSERT INTO `jenislayanan` (`id_jlayanan`, `nama_jlayanan`) VALUES
('JL01', 'Paspor'),
('JL02', 'ITK'),
('JL03', 'ITAP'),
('JL04', 'ITAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paspor`
--

CREATE TABLE `paspor` (
  `id_pemohonpaspor` varchar(64) NOT NULL,
  `np_paspor` varchar(64) NOT NULL,
  `tglpermohonan` date NOT NULL,
  `tglcetak` date NOT NULL,
  `noregistrasi` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jkelamin` varchar(20) NOT NULL,
  `jpermohonan` varchar(255) NOT NULL,
  `no_paspor` varchar(64) NOT NULL,
  `mksdkeberangkatan` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'default.pdf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paspor`
--

INSERT INTO `paspor` (`id_pemohonpaspor`, `np_paspor`, `tglpermohonan`, `tglcetak`, `noregistrasi`, `nama`, `jkelamin`, `jpermohonan`, `no_paspor`, `mksdkeberangkatan`, `lokasi`, `file`) VALUES
('60e2c1dc42799', 'A0000124', '2021-07-05', '2021-07-06', 'V0000124', 'Neng Resa Herawati', 'Perempuan', '48 H', '012346', 'Kuliah', 'L1. R1. B1', 'Neng_Resa_Herawati.pdf'),
('60e2c4d1a7cc2', 'A0000125', '2021-07-05', '2021-07-06', 'V0000125', 'Syafitri Amadea', 'Perempuan', '48 H', '012347', 'Kuliah', 'L1. R1. B1', 'Syafitri_Amadea.pdf'),
('60e3c45e95a00', 'A0000123', '2021-07-06', '2021-07-07', 'V0000123', 'Rinta Rizanti Wahdiningsih', 'Perempuan', '24 H', '012345', 'Kuliah', 'L1. R1. B1', 'Rinta_Rizanti_Wahdiningsih.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('admin','operator') NOT NULL DEFAULT 'operator',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `full_name`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'admin', '$2y$10$J168lzLrvwvG8zkTm//gsePR3eqSJpaZo0iYp8mqlRUTij7.lB1nC', 'admin@gmail.com', 'Admin', 'admin', '2022-01-01 16:01:44', 'user_no_image.jpg', '2021-07-08 08:06:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `izintinggal`
--
ALTER TABLE `izintinggal`
  ADD PRIMARY KEY (`id_izintinggal`);

--
-- Indeks untuk tabel `jenislayanan`
--
ALTER TABLE `jenislayanan`
  ADD PRIMARY KEY (`id_jlayanan`);

--
-- Indeks untuk tabel `paspor`
--
ALTER TABLE `paspor`
  ADD PRIMARY KEY (`id_pemohonpaspor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
