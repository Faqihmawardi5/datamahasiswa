-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Jan 2025 pada 05.55
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas_muh_brebes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=swe7;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'faqihmawardi5', '$2y$10$wjJJRez7VMc74lNyOZfvS.ylc4B9UHrQPCv5VJEoKTZXnKKgPFcvq'),
(3, 'admin1', '$2y$10$r0fYLRGCVBSPduY3F3OC2OvJ7Tt3J3nW7jwDheDXp4kR9jDRH/XRi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_msh`
--

CREATE TABLE `tb_msh` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_msh`
--

INSERT INTO `tb_msh` (`id`, `nim`, `nama`, `jurusan`, `email`, `photo`) VALUES
(1, '22.01.0.0026', 'Miftah Adi Saputra', 'Teknik Informatika', 'adimiftah235@gmail.com', 'man.png'),
(2, '22.01.0.0027', 'Alif Priyadi', 'Teknik Informatika', 'alifyadi2004@gmail.com', 'man.png'),
(3, '22.01.0.0028', 'Muhammad Baihaqi Handika', 'Teknik Informatika', 'baihaqihandika@gmail.com', 'man.png'),
(4, '22.01.0.0029', 'Ashabul Yamin', 'Teknik Informatika', 'ashabuly46@gmail.com', 'man.png'),
(5, '22.01.0.0030', 'Dwi Amelia Rahma', 'Teknik Informatika', 'dwiamelrahma@gmail.com', 'pr.png'),
(6, '22.01.0.0033', 'Nirmala Damayanti', 'Teknik Informatika', 'nirmaladamayanti496?@gmail.com', 'pr.png'),
(7, '22.01.0.0034', 'Fahmi Ridho Alhamdi', 'Teknik Informatika', 'bagolfahmi69@gmail.com', 'man.png'),
(8, '22.01.0.0035', 'Nadifa Syaevilla', 'Teknik Informatika', 'nadifadukuhturi123@gmail.com', 'pr.png'),
(9, '22.01.0.0036', 'Arya Pangestu', 'Teknik Informatika', 'aryapangestu869@gmail.com', 'man.png'),
(10, '22.01.0.0039', 'Fahri Raziq Arona Zifa', 'Teknik Informatika', 'fahriraziq23@gmail.com', 'fahri.jpg'),
(11, '22.01.0.0040', 'Andhika Noval Lazuardi Rohman', 'Teknik Informatika', 'novallazuardi3113@gmail.com', 'man.png'),
(12, '22.01.0.0041', 'Muhammad Mahdhi Arkhan', 'Teknik Informatika', 'mahdiarkhan566@gmail.com', 'man.png'),
(13, '22.01.0.0045', 'Ditiyo Adam Dewantoro Subakti', 'Teknik Informatika', 'adamdewantara254@gmail.com', 'man.png'),
(14, '22.01.0.0052', 'Farhan Ammar Amrulloh', 'Teknik Informatika', 'farhanammaramrulloh08?gmail.com', 'man.png'),
(16, '22.01.0.0042', 'Faiq Alfafa', 'Teknik Informatika', 'alfafafaigl6@gmail.com', 'man.png'),
(17, '22.01.0.0028', 'Muhammad Khoirul Mizan', 'Teknik Informatika', 'khoirulmizan2704@gmail.com', 'man.png'),
(20, '22.01.0.0057', 'Kaesya Amada Sultoni', 'Teknik Informatika', 'kesyaamda3@gmail.com', 'pr.png'),
(22, '22.01.0.0051', 'Muhammad Faqih Mawardi', 'Teknik Informatika', 'faqihmawardi5@yahoo.com', 'aku.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_msh`
--
ALTER TABLE `tb_msh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_msh`
--
ALTER TABLE `tb_msh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
