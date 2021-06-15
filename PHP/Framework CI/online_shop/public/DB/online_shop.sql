-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2021 pada 15.18
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `gambar`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Sepatu', 12000, 11, '1623238177_b5eff900d1c62604bc20.png', 1, '2021-06-09 06:29:37', 0, '0000-00-00 00:00:00'),
(2, 'Jam', 10000, 5, '1623242183_a122002295d94f38b431.jpg', 1, '2021-06-09 06:33:41', 1, '2021-06-09 07:36:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_user`, `id_barang`, `komentar`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 2, 1, '<p>Halo ini adalah sebuah komentar percobaan</p><p>&nbsp;</p><ol><li>Ada</li><li>Tidak</li></ol>', 2, '2021-06-13 08:21:53', 0, '0000-00-00 00:00:00'),
(2, 2, 1, '<p>Percobaan yang kedua <strong>lah ya</strong></p>', 2, '2021-06-13 08:22:44', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `alamat` text NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_user`, `id_barang`, `jumlah`, `total_harga`, `created_by`, `created_date`, `updated_by`, `updated_date`, `alamat`, `ongkir`, `status`) VALUES
(4, 2, 1, 2, 113000, 2, '2021-06-12 08:58:02', 0, '0000-00-00 00:00:00', 'Jalan Diponegoro', 89000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `avatar` text NOT NULL,
  `role` int(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `salt`, `avatar`, `role`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'nizam', '5ea0e7812367540832a5ce3d328aba26', '60bf743b263352.93932430', '', 0, 0, '2021-06-08 08:44:27', 0, '0000-00-00 00:00:00'),
(2, 'Antonio', '9f98b5ca519f9480daeb1d65f52bfceb', '60c20998290fd8.64712952', '', 1, 0, '2021-06-10 07:46:16', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD CONSTRAINT `tbl_komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  ADD CONSTRAINT `tbl_komentar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
