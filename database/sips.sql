-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2024 pada 04.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sips`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `nama_bus` varchar(255) NOT NULL,
  `kode_koridor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `nama_bus`, `kode_koridor`) VALUES
(2, 'TBV-01', 'V'),
(4, 'TBI-01', 'I'),
(5, 'TBI-02', 'I'),
(6, 'TBIV-09', 'IV'),
(8, 'TBI-10', 'I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `jenis_kerusakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `jenis_kerusakan`) VALUES
(2, 'Rem blong'),
(3, 'Ganti Oli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koridor`
--

CREATE TABLE `koridor` (
  `id_koridor` int(11) NOT NULL,
  `kode_koridor` varchar(11) NOT NULL,
  `nama_koridor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koridor`
--

INSERT INTO `koridor` (`id_koridor`, `kode_koridor`, `nama_koridor`) VALUES
(1, 'I', 'TBI'),
(2, 'V', 'TBV'),
(4, 'IV', 'TBIV'),
(5, 'CAD', 'CAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `id_mekanik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_bus`, `id_kerusakan`, `id_mekanik`) VALUES
(11, 2, 3, 3),
(12, 5, 2, 2),
(13, 4, 3, 2),
(14, 2, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(11) NOT NULL,
  `nama_mekanik` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`, `jabatan`) VALUES
(2, 'Asep', 'Mekanik'),
(3, 'ridwan', 'mekanik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User',
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'Admin', '$2y$10$gjbVX5x/QZWKS.9SWV2wYeWCAv9aDFtLKd1trPxS2tiLVhRtc6zlK', 'Admin', 'Aktif'),
(2, 'Ridwan', '$2y$10$gjbVX5x/QZWKS.9SWV2wYeWCAv9aDFtLKd1trPxS2tiLVhRtc6zlK', 'User', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indeks untuk tabel `koridor`
--
ALTER TABLE `koridor`
  ADD PRIMARY KEY (`id_koridor`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koridor`
--
ALTER TABLE `koridor`
  MODIFY `id_koridor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
