-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2025 pada 13.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `tahun_terbit`, `image`, `created_at`) VALUES
(1, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 'bumi_manusia.jpg', '2025-11-10 07:49:05'),
(2, 'Laskar Pelangi', 'Andrea Hirata', 2005, 'Laskar_pelangi_sampul.jpg', '2025-11-10 10:38:30'),
(4, 'Tenggelamnya Kapal Van der Wijck', 'Hamka', 1938, 'Tenggelamnya kapal vanderwijck.jpg', '2025-11-10 12:24:58'),
(5, 'Cantik Itu Luka', 'Eka Kurniawan', 2002, 'cantik itu luka.jpg', '2025-11-10 12:28:16'),
(6, 'Atomic Habits', 'James Clear', 2018, 'atomic habits.jpg', '2025-11-10 12:28:49'),
(7, 'Laut Bercerita', 'Leila S. Chudori', 2017, 'laut bercerita.jpg', '2025-11-10 12:29:22'),
(8, 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'Dee Lestari', 2001, 'supernova.jpg', '2025-11-10 12:31:13'),
(9, 'Filosofi Teras', 'Henry Manampiring', 2018, 'filosofi teras.jpg', '2025-11-10 12:32:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
