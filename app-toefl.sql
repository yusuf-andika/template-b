-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2023 pada 04.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-toefl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` text NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `kelas`, `password`) VALUES
(2, '061530800610', 'Yusuf Andika', '2EC', '$2y$10$S67NFeAQNr.ITF6HE12sn.KopevtoP.urOkfOqUYYwC79neSfiRN6'),
(3, '061530800601', 'Muhammad Dody Daryanto', '5EA', '$2y$10$T7u98E5Iz278lHJCR.i3VOAk3apop6XHKTWYLSzLID/j9rAM06Jvi'),
(4, '061530800600', 'Muhammad Ardiansyah', '6EB', '$2y$10$toW0zRiGKmnKzLYkxG47TuGS3feWnf/e/SX18cu6uBpOaD7xGyaee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor`
--

CREATE TABLE `skor` (
  `id` int(11) NOT NULL,
  `kode_test` varchar(25) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `skor` varchar(25) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skor`
--

INSERT INTO `skor` (`id`, `kode_test`, `nim`, `skor`, `tanggal`) VALUES
(1, 'TST-001', '061530800610', '575', '2023-03-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(20) NOT NULL,
  `jenis_soal` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `kode_soal`, `jenis_soal`, `deskripsi`, `file`, `a`, `b`, `c`, `d`, `e`, `jawaban`) VALUES
(13, 'LI-001', 'Listening', 'Once upon a time, there was a young girl named Maria who loved to read. She would spend hours in the library every day, exploring new worlds and meeting new characters. One day, while reading a book about a brave knight, Maria was transported to a magical kingdom where she was tasked with saving the princess from a wicked dragon. Maria was scared but determined, and with the help of a friendly dragon named Fred, she was able to defeat the evil dragon and rescue the princess. After returning to the real world, Maria continued to read and dream about all of the amazing adventures waiting for her in the pages of her books.', 'ad.mp3', 'aasdsdsdsdsd', 'ab', 'ac', 'ad', 'ae', 'A'),
(18, 'RE-001', 'Reading', 'Once upon a time, there was a young girl named Maria who loved to read. She would spend hours in the library every day, exploring new worlds and meeting new characters. One day, while reading a book about a brave knight, Maria was transported to a magical kingdom where she was tasked with saving the princess from a wicked dragon. Maria was scared but determined, and with the help of a friendly dragon named Fred, she was able to defeat the evil dragon and rescue the princess. After returning to the real world, Maria continued to read and dream about all of the amazing adventures waiting for her in the pages of her books.', '', 'Maria spends hours reading in the library', 'Maria is transported to a magical kingdom', 'Maria meets a friendly dragon named Fred', 'Maria defeats the wicked dragon and saves the princess', 'Maria continues to read and dream about new adventures', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `kode_test` varchar(25) NOT NULL,
  `kode_soal` varchar(25) NOT NULL,
  `jawab` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`id`, `kode_test`, `kode_soal`, `jawab`, `updated_at`) VALUES
(1, 'TST-001', 'RE-001', 'A', '2023-03-25 03:32:04'),
(2, 'TST-001', 'LI-001', 'A', '2023-03-25 03:55:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `is_login` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`, `is_login`) VALUES
(3, 'admin', '$2y$10$Gmzr5kgkYFIwVZoYieTV9uEKeWYZ/EQtVnvjEK2WmavGSbHym3Soi', 'Yusuf Andika', 'Administrator', 'F');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `skor`
--
ALTER TABLE `skor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
