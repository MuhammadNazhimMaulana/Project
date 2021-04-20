-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2021 pada 09.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nama_dosen` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `alamat`, `email`) VALUES
(1, '119326897', 'Budi', 'Jalan Besse Kajuara', 'budianto@yahoo.com'),
(2, '119234634', 'Moel', 'Jalan D . I. Panjaitana', 'mulio@yahoo.com'),
(3, '119234738', 'Vinsomke Dream', 'Jalan Andalas', 'v.dream@gmail.com'),
(4, '119980765', 'Victor', 'Jalan Setiabudhi', 'victor@gmail.com'),
(5, '119875343', 'Udin', 'Jalan Diponegoro', 'udin@gmail.com'),
(6, '119981351', 'Aso', 'Jalan Pramuka', 'asooo@gmail.com'),
(8, '1199986543', 'Asep', 'Jalan Diponegoro', 'asep@gmail.com'),
(9, '1199986547', 'Victor Aoi', 'Jalan Pisang', 'aoivic@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `npm`, `nama_mhs`, `tgl_lahir`, `alamat`, `jns_kelamin`) VALUES
(1, '1194210', 'Tempe', '2002-02-13', 'Jalan Ahamd Yani', 'L'),
(12, '1194220', 'Tempe', '2002-02-13', 'Jalan Besse Kajuara', 'P'),
(13, '1194300', 'Matrix', '0000-00-00', 'Jalan Yos Sudarso', 'P'),
(14, '1194087', 'Marco', '1995-02-13', 'Jalan Beringin', 'L'),
(15, '1194090', 'Apollo', '1999-12-13', 'Jalan Besse Kajuara', 'L'),
(16, '1194091', 'Suci', '2000-11-10', 'Jalan Manurunge', 'P'),
(17, '1194092', 'Suci', '2001-01-02', 'Jalan Pisang', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_mk` int(11) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`) VALUES
(1, 'PTI1420', 'Sistem ERP', 3),
(2, 'PTI1301', 'Bahasa Inggris', 2),
(3, 'PTI1610', 'Desain Interaksi', 4),
(4, 'PTI1439', 'Aljabar', 3),
(6, 'PTI1450', 'Cybersecurity', 3),
(7, 'PTI1490', 'Algoritma', 4),
(8, 'PTI1500', 'Sistem Operasi', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `id_perkuliahan` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nilai` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perkuliahan`
--

INSERT INTO `perkuliahan` (`id_perkuliahan`, `id_mhs`, `id_mk`, `id_dosen`, `nilai`) VALUES
(3, 1, 1, 1, 'A'),
(4, 1, 2, 2, 'B'),
(6, 12, 3, 1, 'B'),
(7, 12, 4, 5, 'C'),
(8, 12, 1, 2, 'C'),
(9, 13, 1, 2, 'A'),
(10, 13, 3, 3, 'A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indeks untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `id_mhs` (`id_mhs`,`id_mk`,`id_dosen`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD CONSTRAINT `perkuliahan_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  ADD CONSTRAINT `perkuliahan_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `matakuliah` (`id_mk`),
  ADD CONSTRAINT `perkuliahan_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
