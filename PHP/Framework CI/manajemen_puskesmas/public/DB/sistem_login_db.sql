-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2021 pada 09.27
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
-- Database: `sistem_login_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1 : admin 2 : kasir 3: apoteker'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Nazhim', 'admin', 'admin', 1),
(3, 'Maulana', 'kasir', 'kasir', 2),
(4, 'Nizam', 'apoteker', 'apoteker', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(225) NOT NULL,
  `rumah_sakit` varchar(225) NOT NULL,
  `spesialis` varchar(225) NOT NULL,
  `jadwal_hari` varchar(250) NOT NULL,
  `jadwal_waktu` varchar(45) NOT NULL,
  `jenis_klinik` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `rumah_sakit`, `spesialis`, `jadwal_hari`, `jadwal_waktu`, `jenis_klinik`) VALUES
(2, 'dr. Reggie Basudara', 'Rumah Sakit Umum', 'Spesialis THT', 'Selasa dan Jumat', '10.00-12.00', ''),
(6, 'dr. Alam Syaputra', 'RSUD Tenriawaru', 'Spesialis Kejiwaan', 'Selasa dan Kamis', '09.30-11.30', 'Klinik Bersama'),
(7, 'dr. Ray', 'Rumah Sakit Umum Daerah', 'Spesialis Mata', 'Jumat ', '13.00-15.00', 'Klinik Punya ku'),
(8, 'dr. Ayub', 'RSUD Tenriawaru', 'Spesialis Anak', 'Selasa dan Rabu', '09.00 - 11.30', ''),
(15, 'dr. Rio Djaja', 'RSUD Makassar', 'Spesialis Tulang', 'Selasa dan Rabu', '08.45 - 10.00', 'Klinik Bersama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pengunjung`
--

CREATE TABLE `laporan_pengunjung` (
  `id_laporan` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `total_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_pengunjung`
--

INSERT INTO `laporan_pengunjung` (`id_laporan`, `id_transaksi`, `id_admin`, `tanggal_bergabung`, `tanggal_keluar`, `total_transaksi`) VALUES
(1, 11, 1, '2021-01-18', '2021-01-30', 7),
(2, 6, 1, '2021-02-01', '2021-02-28', 4),
(3, 6, 4, '2021-05-16', '2021-05-29', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `perusahaan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `tanggal_kadaluarsa`, `perusahaan`) VALUES
(1, 'stokasas', 200, '2020-12-22', 'PT. Kimia Farma'),
(2, 'Conidin', 100, '2020-12-24', ''),
(3, 'Termorex', 90, '2020-12-31', ''),
(6, 'Insto', 40, '2021-01-13', 'PT. Kimia Farma'),
(7, 'Intuna', 100, '2021-02-24', 'PT.Farma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `jadwal_periksa` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id`, `jadwal_periksa`, `id_dokter`, `id_ruang`, `id_daftar`, `id_obat`) VALUES
(12, 2, '2021-05-13', 6, 1, 9, 1),
(13, 4, '2021-05-29', 15, 2, 15, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_obat`
--

CREATE TABLE `pembelian_obat` (
  `id_pembelian` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_obat`
--

INSERT INTO `pembelian_obat` (`id_pembelian`, `id`, `id_pasien`, `id_transaksi`, `id_obat`, `jumlah_beli`, `jumlah_bayar`, `bukti_bayaran`) VALUES
(3, 3, 12, 11, 2, 3, 300, ''),
(10, 3, 12, 11, 1, 43, 1720, 'shirt.png'),
(11, 3, 12, 11, 2, 5, 200, 'shoes.png'),
(12, 2, 12, 2, 1, 2, 80, 'headphone.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `sakit` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `kebutuhan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `nama`, `sakit`, `id_dokter`, `kebutuhan`) VALUES
(4, 'Maulanaa', 'Sakit di kepala', 6, ''),
(9, 'Oyong', 'Suka melakukan hal aneh', 6, 'Tidak Urgent'),
(13, 'Adam Mali', 'Pungggung', 2, 'Tidak Urgent'),
(15, 'Nim', 'Sakit Perut', 2, 'Urgent'),
(16, 'Doni', 'Sakit Punggung', 15, 'Tidak Urgent');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(60) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
(1, 'periksa', 5),
(2, 'laboratorium', 3),
(5, 'Ruang Tidur', 13),
(15, 'Istirahat', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `biaya_pembayaran` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id`, `id_pasien`, `biaya_pembayaran`, `nama_kasir`, `bukti_bayar`, `ket`, `tanggal`) VALUES
(2, 2, 12, 1000, 'Monika', 'watch.jpg', 'Lunas', '2021-01-14'),
(6, 2, 12, 496, 'Adam', 'Proof.png', 'Belum Lunas', '2021-01-30'),
(11, 3, 12, 21000, 'Dante', 'headphone.jpg', 'Belum Lunas', '2021-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ktp` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `ktp`, `alamat`, `kota`, `provinsi`, `kode_pos`, `email`, `password`) VALUES
(2, 'Adammm', 'Mali', 2147483647, 'Jalan Anu', 'Bogor', 'Jawa Barat', 4192, 'swdweqd@yahoo.com', '$2y$10$9WCm5Jz3KbW/.s5jzlSxa.FpCsF8Vqng5l29cO4f1GW3eGaCx77TW'),
(3, 'Jackson', 'New', 2147483647, 'Di Bumi', 'Bone', 'Sulsel', 213452, 'newjackson@yahoo.com', '$2y$10$riBFISVR3CyLxqRFiy9iluqFK3WiyWCQkk2PAKGveLi0E5ce1Pya.'),
(4, 'Diablo', 'Men', 1234321423, 'Di Pinggir', 'Bogor', 'Jawa Barat', 1231, 'saya@gmail.com', '$2y$10$JECtLTw9prIbhA8cTVW34.3fxgCZABBpOx.vvYDa5FfuxUI6IWdOG'),
(11, 'Spy', 'Mendoza', 2147483647, 'Jalan Dr. Wahidin', 'Banjarmasin', 'Kalimantan Selatan', 421352, 'spy@gmail.com', '$2y$10$nS7ZNUEdrjMzqNRSaKYvQuiLTh61VYsogGaYFY7bwwfBIcQUScLbK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `laporan_pengunjung`
--
ALTER TABLE `laporan_pengunjung`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `laporan_pengunjung`
--
ALTER TABLE `laporan_pengunjung`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
