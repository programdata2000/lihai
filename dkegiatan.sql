-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 10.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkegiatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `tanggalkegiatan` date NOT NULL,
  `namapetugas` varchar(30) NOT NULL,
  `jeniskegiatan` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tinggiair` int(11) NOT NULL,
  `detailkegiatan` varchar(100) NOT NULL,
  `fotokegiatan` varchar(5000) NOT NULL,
  `gambar` varchar(5000) NOT NULL,
  `odanp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `cekjuru` varchar(20) NOT NULL,
  `namajuru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `tanggalkegiatan`, `namapetugas`, `jeniskegiatan`, `lokasi`, `tinggiair`, `detailkegiatan`, `fotokegiatan`, `gambar`, `odanp`, `tanggal`, `cekjuru`, `namajuru`) VALUES
(12, '2023-07-12', 'DONI CANDRA', 'pemeliharaan', 'Bsl38', 70, 'merambah', '', '', 'p100', '2023-07-13', 'ok', 'YASMA PUTRA MARFADIKA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
