-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2024 pada 16.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin-ticket@eticket.com', 'P@ssw0rd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `tiket_id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `status_pesanan` enum('registrasi','tervalidasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`tiket_id`, `nama_pemesan`, `email`, `tanggal_pesanan`, `status_pesanan`) VALUES
(12313213, 'fatah', 'fatah@gmail.com', '2024-09-26 14:59:03', 'tervalidasi'),
(114422255, 'ddddd', 'ddddd@mail.com', '2024-09-25 19:58:00', 'tervalidasi'),
(123123134, 'cccc', 'cccc@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(123311144, 'gggg', 'gggg@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(412312314, 'dadas', 'dadas@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(1122344411, 'ffffff', 'ffffff@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(1133494961, 'raju', 'raju@gmail.com', '2024-09-30 19:58:00', 'registrasi'),
(1231231244, 'adadaad', 'adadaad@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(1241241121, 'aaaa', 'aaaa@mail.com', '2024-09-26 14:59:03', 'registrasi'),
(1735807052, 'andre', 'andre@eticket.com', '2024-09-25 19:58:00', 'registrasi'),
(1881518541, 'andre', 'admin-ticket@eticket.com', '2024-09-26 18:08:00', 'registrasi'),
(2131311111, 'botol', 'botol@mail.com', '2024-09-26 14:59:03', 'registrasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`tiket_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
