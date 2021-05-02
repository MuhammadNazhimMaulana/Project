-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2021 pada 05.44
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_jns_barang` int(11) NOT NULL,
  `nama_barang` varchar(33) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_supplier`, `id_jns_barang`, `nama_barang`, `harga`) VALUES
(1, 1, 1, 'Baju Olahraga', 99000),
(2, 1, 2, 'Celana Olahraga', 100000),
(5, 5, 2, 'Celana Kain', 45000),
(6, 3, 3, 'Sandal Swallow', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_cst` int(11) NOT NULL,
  `nama_cst` varchar(30) NOT NULL,
  `alamat_cst` varchar(35) NOT NULL,
  `email_cst` varchar(30) NOT NULL,
  `telp_cst` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_cst`, `nama_cst`, `alamat_cst`, `email_cst`, `telp_cst`) VALUES
(1, 'Budianto', 'Jalan Beringin', 'budianto@gmail.com', '081940594304'),
(2, 'Anggun', 'Jalan Gunung Brawijaya', 'anggun@gmail.com', '081947654433'),
(4, 'Toni', 'Jalan Gunung Brawijaya', 'Toni@gmail.com', '081947659090'),
(7, 'Ono', 'Jalan K. H. ABD. Hamid', 'ono@gamil.com', '082145632111'),
(8, 'Nino', 'Jalan Sungai Musi', 'ninoo@gmail.com', '085342536221');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jns_barang`
--

CREATE TABLE `tbl_jns_barang` (
  `id_jns_barang` int(11) NOT NULL,
  `nama_jns_barang` varchar(35) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jns_barang`
--

INSERT INTO `tbl_jns_barang` (`id_jns_barang`, `nama_jns_barang`, `aktif`) VALUES
(1, 'Baju', 'Ya'),
(2, 'Celana', 'Ya'),
(3, 'Sandal', 'Ya'),
(4, 'Jas', 'Ya'),
(9, 'Topi', 'Ya'),
(10, 'Tas', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id_kirim` int(11) NOT NULL,
  `id_transportasi` int(11) NOT NULL,
  `tgl_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`id_kirim`, `id_transportasi`, `tgl_pengiriman`) VALUES
(1, 1, '2021-04-15'),
(2, 2, '2021-05-25'),
(3, 2, '2021-05-26'),
(4, 1, '2021-04-19'),
(6, 2, '2021-06-13'),
(7, 2, '2021-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `alamat_supplier` varchar(35) NOT NULL,
  `tlp_supplier` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `tlp_supplier`) VALUES
(1, 'CV. PRIMA', 'Jalan Nusantara', '081098675332'),
(2, 'CV. MUTIARA PRIMA', 'Jalan Pettarani', '085638453098'),
(3, 'CV. DIRGANTARA', 'Jalan A. Pangeran', '082323467854'),
(5, 'CV. BUDIANTO', 'Jalan Diponegoro', '081286574325'),
(6, 'PT. TAK DISANGKA', 'Jalan M. T. Haryono', '082325342116'),
(7, 'CV. GARIS BUMI', 'Jalan Serigala', '081221445666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_cst` int(11) NOT NULL,
  `id_kirim` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `keterangan` enum('Terkirim','Sedang Dikirim','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_cst`, `id_kirim`, `id_barang`, `tgl_transaksi`, `keterangan`) VALUES
(1, 1, 1, 1, '2021-03-21', 'Terkirim'),
(2, 1, 2, 2, '2021-03-21', 'Sedang Dikirim'),
(3, 2, 1, 1, '2021-02-11', 'Sedang Dikirim'),
(5, 2, 3, 1, '2020-12-11', 'Sedang Dikirim'),
(6, 1, 2, 2, '2020-10-29', 'Batal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transport`
--

CREATE TABLE `tbl_transport` (
  `id_transportasi` int(11) NOT NULL,
  `jenis_transportasi` enum('Darat','Laut','Udara') NOT NULL,
  `nama_transportasi` varchar(35) NOT NULL,
  `jml_tersedia` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transport`
--

INSERT INTO `tbl_transport` (`id_transportasi`, `jenis_transportasi`, `nama_transportasi`, `jml_tersedia`) VALUES
(1, 'Darat', 'Mobil Truk', 10),
(2, 'Darat', 'Mobil Bus', 5),
(3, 'Udara', 'Pesawat', 2),
(5, 'Laut', 'Kapal Feri', 2),
(7, 'Darat', 'Kereta', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`,`id_jns_barang`),
  ADD KEY `id_jns_barang` (`id_jns_barang`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_cst`);

--
-- Indeks untuk tabel `tbl_jns_barang`
--
ALTER TABLE `tbl_jns_barang`
  ADD PRIMARY KEY (`id_jns_barang`);

--
-- Indeks untuk tabel `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `id_transportasi` (`id_transportasi`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_cst` (`id_cst`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_kirim` (`id_kirim`);

--
-- Indeks untuk tabel `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_cst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_jns_barang`
--
ALTER TABLE `tbl_jns_barang`
  MODIFY `id_jns_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_transport`
--
ALTER TABLE `tbl_transport`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_jns_barang`) REFERENCES `tbl_jns_barang` (`id_jns_barang`),
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD CONSTRAINT `tbl_pengiriman_ibfk_1` FOREIGN KEY (`id_transportasi`) REFERENCES `tbl_transport` (`id_transportasi`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_cst`) REFERENCES `tbl_customer` (`id_cst`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`id_kirim`) REFERENCES `tbl_pengiriman` (`id_kirim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
