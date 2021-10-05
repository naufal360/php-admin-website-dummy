-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2021 pada 05.13
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guara_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `npm` char(8) NOT NULL,
  `semester` char(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `telepon` char(13) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `semester`, `email`, `jurusan`, `telepon`, `gambar`) VALUES
(1, 'Andy Warhol', '52233461', '3', 'andy@mail.com', 'Teknik Arsitektur', '087887887889', '6145c76b88b26.jpg'),
(4, 'Kevin Hart', '50004003', '5', 'hart@mail.com', 'Seni Musik', '12312313121', '6145be47ddaf5.jpg'),
(5, 'Chris Martin', '11191651', '6', 'chris@coldplay.com', 'Seni Musik', '0875568165165', '614f2fd61c36f.jpeg'),
(6, 'Ed Sheeran', '35191196', '4', 'ed@sheeran.com', 'Teknik Industri', '0856644882288', '614f3003cbae2.jpg'),
(7, 'Mimi Keene', '65165163', '1', 'mimi@ruby.com', 'Kesehatan Masyarakat', '0815665119161', '614f30e5c1ed0.jpg'),
(8, 'Emma Mackey', '21898982', '7', 'emma@maeve.com', 'Psikologi', '0855664899977', '614f3155a02b9.jpg'),
(9, 'Ryan Reynolds', '98821211', '4', 'ryan@deadpool.com', 'Hukum', '0812855564488', '614f31aab889a.jpg'),
(10, 'Tom Holland', '56648656', '2', 'tom@spiderman.com', 'Teknik Arsitektur', '0875655442252', '614f322188d0b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'user1', '$2y$10$G81yiwdce9p90IAykt7dnu6Z6TAub1kjB7hLUVcqPcoSK1K2hfTkS'),
(4, 'user2', '$2y$10$H5qr4c6ugTGxq8XfyZQ6ru4hBvpkXmpP4KykmOLSM7qYDCiUJCVpy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
