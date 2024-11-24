-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Nov 2024 pada 12.57
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id` int(11) NOT NULL,
  `nama_tamu` varchar(500) DEFAULT NULL,
  `email_tamu` varchar(500) DEFAULT NULL,
  `pesan_tamu` varchar(500) DEFAULT NULL,
  `tgl_insert` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `nama_tamu`, `email_tamu`, `pesan_tamu`, `tgl_insert`) VALUES
(15, 'bintang', 'bintang@email.com', 'hai, selamat ya untuk pencapaian kamu', '2024-11-17 21:50:52'),
(16, 'dian', 'dian@gmail.com', 'happynya dapat kabar baik dari kamu', '2024-11-17 21:51:20'),
(17, 'budi', 'budiman@email.com', 'sekali lagi selamat ya atas pencapaian kamu, semangatttttt!!!!!', '2024-11-17 21:51:56'),
(18, 'brian', 'brian_k@email.com', 'selamat yaaaaa, aku ikut happy untuk pencapaian kamu', '2024-11-17 21:52:43'),
(19, 'keysa', 'keysa@gmail.com', 'selamat ya kamu berhasil buktikan kerja keras kamu yaaa', '2024-11-17 22:08:01'),
(20, 'putra', 'putra_h@gmail.com', 'selamat ya, ikut bahagia', '2024-11-17 22:13:03'),
(21, 'candra', 'candra_l@email.com', 'happy untuk pencapaiannya, aku tunggu meet kita lagi ya', '2024-11-17 22:13:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
