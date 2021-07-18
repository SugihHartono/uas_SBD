-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2021 pada 16.41
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
-- Database: `sugih_311910736`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kue`
--

CREATE TABLE `kue` (
  `kode_kue` int(100) NOT NULL,
  `nama_kue` varchar(100) NOT NULL,
  `jenis_kue` varchar(20) NOT NULL,
  `harga_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kue`
--

INSERT INTO `kue` (`kode_kue`, `nama_kue`, `jenis_kue`, `harga_jual`) VALUES
(1, 'Dodol', 'Kering', '70000'),
(3, 'Talam', 'Basah', '55000'),
(5, 'Akar Kelapa', 'Kering', '65000'),
(9, 'Renginang', 'Kering', '65000'),
(100009, 'Semprong', 'Kering', '75000');

--
-- Trigger `kue`
--
DELIMITER $$
CREATE TRIGGER `delete_kue` BEFORE DELETE ON `kue` FOR EACH ROW begin
	INSERT into log_kue
set kode_kue_lama = old.kode_kue,
kode_kue_baru = "-",
nama_kue_lama = old.nama_kue,
nama_kue_baru = "-",
jenis_kue_lama = old.jenis_kue,
jenis_kue_baru = "-",
harga_jual_lama = old.harga_jual,
harga_jual_baru = "0",
ket = "Delete",
waktu = now();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_kue` AFTER INSERT ON `kue` FOR EACH ROW begin
	INSERT into log_kue
set kode_kue_lama = "-",
kode_kue_baru = new.kode_kue,
nama_kue_lama = "-",
nama_kue_baru = new.nama_kue,
jenis_kue_lama = "-",
jenis_kue_baru = new.jenis_kue,
harga_jual_lama = "0",
harga_jual_baru = new.harga_jual,
ket = "Insert",
waktu = now();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kue` BEFORE UPDATE ON `kue` FOR EACH ROW begin
	INSERT into log_kue
set kode_kue_lama = old.kode_kue,
kode_kue_baru = new.kode_kue,
nama_kue_lama = old.nama_kue,
nama_kue_baru = new.nama_kue,
jenis_kue_lama = old.jenis_kue,
jenis_kue_baru = new.jenis_kue,
harga_jual_lama = old.harga_jual,
harga_jual_baru = new.harga_jual,
ket = "Update",
waktu = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kue`
--

CREATE TABLE `log_kue` (
  `id_log` int(10) NOT NULL,
  `kode_kue_lama` int(100) DEFAULT NULL,
  `kode_kue_baru` int(100) DEFAULT NULL,
  `nama_kue_lama` varchar(100) DEFAULT NULL,
  `nama_kue_baru` varchar(100) DEFAULT NULL,
  `jenis_kue_lama` varchar(20) DEFAULT NULL,
  `jenis_kue_baru` varchar(20) DEFAULT NULL,
  `harga_jual_lama` varchar(100) DEFAULT NULL,
  `harga_jual_baru` varchar(100) DEFAULT NULL,
  `ket` varchar(10) NOT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_kue`
--

INSERT INTO `log_kue` (`id_log`, `kode_kue_lama`, `kode_kue_baru`, `nama_kue_lama`, `nama_kue_baru`, `jenis_kue_lama`, `jenis_kue_baru`, `harga_jual_lama`, `harga_jual_baru`, `ket`, `waktu`) VALUES
(5, 0, 9, '-', 'Renginang', '-', 'Kering', '0', '65000', 'Insert', '2021-07-14'),
(6, 7, 0, 'Bugis', '-', 'Basah', '-', '55000', '0', 'Delete', '2021-07-14'),
(7, 0, 100009, '-', 'Semprong', '-', 'Kering', '0', '75000', 'Insert', '2021-07-18'),
(8, 1, 1, 'Dodol', 'Dodol', 'Kering', 'Kering', '60000', '70000', 'Update', '2021-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pembeli`
--

CREATE TABLE `log_pembeli` (
  `id_log` int(10) NOT NULL,
  `no_hp_lama` varchar(14) DEFAULT NULL,
  `no_hp_baru` varchar(14) DEFAULT NULL,
  `nama_pembeli_lama` varchar(225) DEFAULT NULL,
  `nama_pembeli_baru` varchar(225) DEFAULT NULL,
  `alamat_lama` varchar(225) DEFAULT NULL,
  `alamat_baru` varchar(225) DEFAULT NULL,
  `ket` varchar(10) NOT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_pembeli`
--

INSERT INTO `log_pembeli` (`id_log`, `no_hp_lama`, `no_hp_baru`, `nama_pembeli_lama`, `nama_pembeli_baru`, `alamat_lama`, `alamat_baru`, `ket`, `waktu`) VALUES
(8, '081234008457', '081234008457', 'Adelia', 'Adelia', 'kp Rawa banteng', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah', 'Update', '2021-07-14'),
(9, '085717310788', '085717310788', 'Sugih Hartono', 'Sugih Hartono', 'kp Rawa banteng', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah Kec Cikarang Timur', 'Update', '2021-07-14'),
(10, '-', '0857', '-', 'Sugih', '-', 'kp Rawa banteng', 'Insert', '2021-07-14'),
(11, '0857', '-', 'Sugih', '-', 'kp Rawa banteng', '-', 'Delete', '2021-07-14'),
(12, '-', '0889919786', '-', 'Ghibran', '-', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah Kec Cikarang Timur', 'Insert', '2021-07-15'),
(13, '0889919786', '0889919786', 'Ghibran', 'Ghibran', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah Kec Cikarang Timur', 'rawa kalong', 'Update', '2021-07-15'),
(14, '0889919786', '-', 'Ghibran', '-', 'rawa kalong', '-', 'Delete', '2021-07-15'),
(15, '-', '081122334455', '-', 'Ghibran', '-', 'Kp Tegaldanas', 'Insert', '2021-07-18'),
(16, '085717310788', '085717310788', 'Sugih Hartono', 'Sugih Hartono', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah Kec Cikarang Timur', 'Kp Rawa banteng', 'Update', '2021-07-18'),
(17, '081122334455', '-', 'Ghibran', '-', 'Kp Tegaldanas', '-', 'Delete', '2021-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `no_hp` varchar(14) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`no_hp`, `nama_pembeli`, `alamat`) VALUES
('081234008457', 'Adelia', 'Kp Rancamalaka Rt 001/005 Desa Hegarmanah'),
('085717310788', 'Sugih Hartono', 'Kp Rawa banteng');

--
-- Trigger `pembeli`
--
DELIMITER $$
CREATE TRIGGER `delete_pembeli` BEFORE DELETE ON `pembeli` FOR EACH ROW begin
insert into log_pembeli
set no_hp_lama=old.no_hp,
no_hp_baru="-",
nama_pembeli_lama=old.nama_pembeli,
nama_pembeli_baru="-",
alamat_lama=old.alamat,
alamat_baru="-",
ket	= "Delete",
waktu=now();
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pembeli` AFTER INSERT ON `pembeli` FOR EACH ROW begin
	insert into log_pembeli
set no_hp_baru = new.no_hp,
no_hp_lama = "-",
nama_pembeli_baru = new.nama_pembeli,
nama_pembeli_lama = "-",
alamat_baru = new.alamat,
alamat_lama = "-",
ket	= "Insert",
waktu = now();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pembeli` BEFORE UPDATE ON `pembeli` FOR EACH ROW begin
	insert into log_pembeli
set no_hp_lama = old.no_hp,
no_hp_baru = new.no_hp,
nama_pembeli_lama = old.nama_pembeli,
nama_pembeli_baru = new.nama_pembeli,
alamat_lama = old.alamat,
alamat_baru = new.alamat,
ket	= "Update",
waktu = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `kode_kue` int(11) DEFAULT NULL,
  `berat` int(225) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_hp`, `kode_kue`, `berat`, `tanggal`) VALUES
(3, '085717310788', 1, 10, '2021-07-10'),
(4, '081234008457', 5, 2, '2021-07-13'),
(5, '081234008457', 1, 13, '2021-07-15'),
(6, '085717310788', 100009, 2, '2021-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(7, 'adel', 'adeliaanandaputri321@gmail.com', '94c93d4f9686cfeae29e9cbc3230cbf9', '2021-07-15 16:01:10'),
(8, 'sugih', 'Sugih@mhs.pelitabangsa.ac.id', 'fbcc66cb8b819f2f2a5ba3644e96b5b1', '2021-07-18 13:06:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`kode_kue`);

--
-- Indeks untuk tabel `log_kue`
--
ALTER TABLE `log_kue`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `log_pembeli`
--
ALTER TABLE `log_pembeli`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`no_hp`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT untuk tabel `log_kue`
--
ALTER TABLE `log_kue`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log_pembeli`
--
ALTER TABLE `log_pembeli`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
