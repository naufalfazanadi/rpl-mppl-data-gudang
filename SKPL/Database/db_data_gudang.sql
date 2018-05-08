-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2018 pada 09.31
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
-- Database: `db_data_gudang`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update` (IN `id` INT, IN `harga` INT, IN `qty` INT)  BEGIN
	#Routine body goes here...
	UPDATE t_transaksi SET JUMLAH_HARGA = harga WHERE ID_TRANSAKSI = id;
	UPDATE t_transaksi SET JUMLAH_QTY = qty WHERE ID_TRANSAKSI = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update2` (IN `id` INT)  BEGIN

	DECLARE v_harga INT;
	DECLARE v_qty INT;
	
	SELECT SUM(HARGA_JUAL) into v_harga FROM t_detail_transaksi where ID_TRANSAKSI = id;
	SELECT SUM(QTY) into v_qty FROM t_detail_transaksi where ID_TRANSAKSI = id;
	
	UPDATE t_transaksi SET JUMLAH_HARGA = v_harga WHERE ID_TRANSAKSI = id;
	UPDATE t_transaksi SET JUMLAH_QTY = v_qty WHERE ID_TRANSAKSI = id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `KODE_BARANG` varchar(255) NOT NULL,
  `ID_MEREK` int(11) NOT NULL,
  `NAMA_BARANG` varchar(255) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`ID_BARANG`, `ID_KATEGORI`, `KODE_BARANG`, `ID_MEREK`, `NAMA_BARANG`, `HARGA_BARANG`) VALUES
(1, 1, 'LA001', 1, 'Asus X450 J', 7550000),
(2, 1, 'LA002', 1, 'Asus ROG GX700', 79999000),
(3, 1, 'LA003', 1, 'Asus Transformer Book T100', 4394500),
(4, 1, 'LA004', 1, 'Asus VivoBook Flip 14 TP410UR', 7570000),
(5, 1, 'LA005', 2, 'Acer Predator Helios 300', 23666000),
(6, 1, 'LA006', 2, 'Acer Predator Triton', 54439000),
(7, 1, 'LA007', 2, 'Acer Aspire E5-476G', 6299000),
(8, 1, 'LA008', 2, 'Acer Aspire E5-523G', 5550000),
(9, 1, 'LA009', 3, 'Samsung Chromebook Plus', 11252678),
(10, 1, 'LA010', 3, 'Samsung NP300E4V', 4050000),
(11, 1, 'LA011', 3, 'Samsung NP270E4V', 4799000),
(12, 1, 'LA012', 5, 'Lenovo Ideapad 100', 2999000),
(14, 1, 'LA013', 5, 'Lenovo Thinkpad Yoga 920', 25499000),
(15, 1, 'LA014', 7, 'Xiaomi Ultrabook', 9900000),
(16, 1, 'LA015', 15, 'Apple Macbook Pro 2013', 34999999),
(17, 1, 'LA016', 18, 'HP Spectre 13', 22000000),
(18, 2, 'HP001', 3, 'Samsung Galaxy S9+', 12799000),
(19, 2, 'HP002', 3, 'Samsung Galaxy A8 (2018)', 5495000),
(20, 2, 'HP003', 7, 'Redmi Note 5', 2499000),
(21, 2, 'HP004', 7, 'Mi A1', 2999000),
(22, 2, 'HP005', 7, 'Redmi 5 Plus', 2200000),
(23, 3, 'MO001', 12, 'Raxer DeathAdder Chroma', 1500000),
(24, 3, 'MO002', 13, 'SteelSeries Rival 300', 671000),
(25, 3, 'MO003', 6, 'Logitech M337', 449000),
(26, 3, 'MO004', 6, 'Logitech M221 Silent', 249000),
(27, 3, 'MO005', 6, 'Logitech M171', 189000),
(28, 3, 'MO006', 6, 'Logitech G603 Lightspeed', 1049000),
(29, 3, 'MO007', 6, 'Logitech G903 Lightspeed', 2390000),
(30, 3, 'MO008', 6, 'Logitech G102 Prodigy', 379000),
(31, 4, 'KB001', 6, 'Logitech G610 Orion Brown', 2190000),
(32, 4, 'KB001', 6, 'Logitech G613 Wireless Mechanical', 1490000),
(33, 4, 'KB002', 6, 'Logitech G910 Orion Spectrum', 2999000),
(34, 4, 'KB003', 6, 'Logitech G810 Orion Spectrum', 2499000),
(37, 4, 'KB004', 6, 'Logitech G610 Orion Blue', 2190000),
(38, 4, 'KB005', 6, 'Logitech G310 Atlas Dawn', 1949000),
(40, 4, 'KB006', 6, 'Logitech G213 Prodigy', 949000),
(41, 4, 'KB007', 6, 'Logitech G105', 779000),
(42, 4, 'KB008', 6, 'Logitech G100S', 579000),
(43, 4, 'KB009', 6, 'Logitech G512', 1790000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_customer`
--

CREATE TABLE `t_customer` (
  `ID_CUSTOMER` int(11) NOT NULL,
  `KODE_CUSTOMER` varchar(10) NOT NULL,
  `NAMA_CUSTOMER` varchar(30) NOT NULL,
  `ALAMAT_CUSTOMER` varchar(100) NOT NULL,
  `EMAIL_CUSTOMER` varchar(30) NOT NULL,
  `TELP_CUSTOMER` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_customer`
--

INSERT INTO `t_customer` (`ID_CUSTOMER`, `KODE_CUSTOMER`, `NAMA_CUSTOMER`, `ALAMAT_CUSTOMER`, `EMAIL_CUSTOMER`, `TELP_CUSTOMER`) VALUES
(1, 'CUST271298', 'Resky Ramadhandi S', 'Bandung', 'reskyramadhandi@gmail.com', '085719242967'),
(2, 'CUST110196', 'Budi Darmawan', 'Jakarta', 'budidarmawan@mail.com', '081354822569'),
(3, 'CUST201090', 'Sulistio', 'Cirebon', 'sulistio@cirebon.gov', '085742258689'),
(4, 'CUST050885', 'Andi Ardiansyah', 'Bandung', 'andi@company.com', '0854752232545');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_barang`
--

CREATE TABLE `t_detail_barang` (
  `ID_DETAIL_BARANG` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_GUDANG` int(11) NOT NULL,
  `STOK_BARANG` int(11) NOT NULL,
  `LOKASI_BARANG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_barang`
--

INSERT INTO `t_detail_barang` (`ID_DETAIL_BARANG`, `ID_BARANG`, `ID_GUDANG`, `STOK_BARANG`, `LOKASI_BARANG`) VALUES
(4, 1, 1, 50, 'LRA002'),
(5, 1, 2, 100, 'LRB010'),
(6, 2, 2, 200, 'LRA005'),
(7, 2, 3, 50, 'LRA002'),
(8, 3, 3, 100, 'LRB010'),
(9, 3, 4, 200, 'LRA005'),
(10, 4, 4, 50, 'LRA002'),
(11, 4, 1, 100, 'LRB010'),
(12, 5, 1, 200, 'LRA005'),
(13, 5, 2, 50, 'LRA002'),
(14, 6, 2, 100, 'LRB010'),
(15, 6, 3, 200, 'LRA005'),
(16, 7, 3, 50, 'LRA002'),
(17, 7, 4, 100, 'LRB010'),
(18, 8, 4, 200, 'LRA005'),
(19, 8, 1, 50, 'LRA002'),
(20, 9, 1, 100, 'LRB010'),
(21, 9, 2, 200, 'LRA005'),
(22, 10, 2, 50, 'LRA002'),
(23, 10, 3, 100, 'LRB010'),
(24, 11, 3, 200, 'LRA005'),
(25, 11, 4, 50, 'LRA002'),
(26, 12, 4, 100, 'LRB010'),
(27, 12, 1, 200, 'LRA005'),
(29, 14, 2, 200, 'LRA005'),
(30, 14, 3, 50, 'LRA002'),
(31, 15, 3, 100, 'LRB010'),
(32, 15, 4, 200, 'LRA005'),
(33, 16, 4, 50, 'LRA002'),
(34, 16, 1, 100, 'LRB010'),
(35, 17, 1, 200, 'LRA005'),
(36, 17, 2, 50, 'LRA002'),
(37, 18, 2, 100, 'LRB010'),
(38, 18, 3, 200, 'LRA005'),
(39, 19, 3, 50, 'LRA002'),
(40, 19, 4, 100, 'LRB010'),
(41, 20, 4, 200, 'LRA005'),
(42, 20, 1, 50, 'LRA002'),
(43, 21, 1, 100, 'LRB010'),
(44, 21, 2, 100, 'LRB010'),
(45, 22, 2, 200, 'LRA005'),
(46, 22, 3, 200, 'LRA005'),
(47, 23, 3, 50, 'LRA002'),
(48, 23, 4, 100, 'LRB010'),
(49, 24, 4, 200, 'LRA005'),
(50, 24, 1, 50, 'LRA002'),
(51, 25, 1, 100, 'LRB010'),
(52, 25, 2, 200, 'LRA005'),
(53, 26, 2, 50, 'LRA002'),
(54, 26, 3, 100, 'LRB010'),
(55, 27, 3, 200, 'LRA005'),
(56, 27, 4, 50, 'LRA002'),
(57, 28, 4, 100, 'LRB010'),
(58, 28, 1, 200, 'LRA005'),
(59, 29, 1, 50, 'LRA002'),
(60, 29, 2, 100, 'LRB010'),
(61, 30, 2, 200, 'LRA005'),
(62, 30, 3, 50, 'LRA002'),
(63, 31, 3, 100, 'LRB010'),
(64, 31, 4, 200, 'LRA005'),
(65, 32, 4, 50, 'LRA002'),
(66, 32, 1, 100, 'LRB010'),
(67, 33, 1, 200, 'LRA005'),
(68, 33, 2, 50, 'LRA002'),
(69, 34, 2, 100, 'LRB010'),
(70, 34, 3, 200, 'LRA005'),
(73, 37, 1, 100, 'LRB010'),
(74, 37, 2, 200, 'LRA005'),
(75, 38, 2, 50, 'LRA002'),
(76, 38, 3, 100, 'LRB010'),
(78, 40, 4, 100, 'LRB010'),
(79, 40, 1, 200, 'LRA005'),
(80, 41, 1, 50, 'LRA002'),
(81, 41, 2, 100, 'LRB010'),
(82, 42, 2, 200, 'LRA005'),
(83, 42, 3, 50, 'LRA002'),
(84, 43, 3, 100, 'LRB010'),
(85, 43, 4, 200, 'LRA005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_transaksi`
--

CREATE TABLE `t_detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_TRANSAKSI` int(11) NOT NULL,
  `HARGA_JUAL` int(11) NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_transaksi`
--

INSERT INTO `t_detail_transaksi` (`ID_DETAIL_TRANSAKSI`, `ID_BARANG`, `ID_TRANSAKSI`, `HARGA_JUAL`, `QTY`) VALUES
(1, 23, 1, 1500000, 10),
(2, 1, 3, 7550000, 1),
(3, 25, 3, 4490000, 1),
(4, 32, 3, 2000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gudang`
--

CREATE TABLE `t_gudang` (
  `ID_GUDANG` int(11) NOT NULL,
  `KODE_GUDANG` varchar(10) NOT NULL,
  `NAMA_GUDANG` varchar(30) NOT NULL,
  `ALAMAT_GUDANG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gudang`
--

INSERT INTO `t_gudang` (`ID_GUDANG`, `KODE_GUDANG`, `NAMA_GUDANG`, `ALAMAT_GUDANG`) VALUES
(1, 'GD001', 'Gudang 1', 'Bandung'),
(2, 'GD002', 'Gudang 2', 'Jakarta'),
(3, 'GD003', 'Gudang 3', 'Bekasi'),
(4, 'GD004', 'Gudang 4', 'Bandung'),
(5, 'GD005', 'Gudang 5', 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `KODE_KATEGORI` varchar(10) NOT NULL,
  `NAMA_KATEGORI` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`ID_KATEGORI`, `KODE_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'KAT001', 'Laptop'),
(2, 'KAT002', 'Handphone'),
(3, 'KAT003', 'Mouse'),
(4, 'KAT004', 'Keyboard'),
(5, 'KAT005', 'Charger Laptop'),
(6, 'KAT006', 'Charger Handphone'),
(7, 'KAT007', 'Micro USB Cable'),
(8, 'KAT008', 'Type-C Cable'),
(9, 'KAT009', 'Lightning Cable'),
(10, 'KAT010', 'Gaming Console'),
(11, 'KAT011', 'Tablet'),
(12, 'KAT012', 'Speaker'),
(13, 'KAT013', 'RAM'),
(14, 'KAT014', 'HDD'),
(15, 'KAT015', 'SSD'),
(16, 'KAT016', 'Printer'),
(17, 'KAT017', 'Speaker Bluetooth'),
(18, 'KAT018', 'Headset'),
(19, 'KAT019', 'Headset Bluetooth'),
(20, 'KAT020', 'Webcam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_merek`
--

CREATE TABLE `t_merek` (
  `ID_MEREK` int(11) NOT NULL,
  `NAMA_MEREK` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_merek`
--

INSERT INTO `t_merek` (`ID_MEREK`, `NAMA_MEREK`) VALUES
(1, 'Asus'),
(2, 'Acer'),
(3, 'Samsung'),
(4, 'Sony'),
(5, 'Lenovo'),
(6, 'Logitech'),
(7, 'Xiaomi'),
(8, 'Toshiba'),
(9, 'Sandisk'),
(10, 'Hitachi'),
(11, 'Fantech'),
(12, 'Razer'),
(13, 'SteelSeries'),
(14, 'Audio Technica'),
(15, 'Apple'),
(16, 'Dell'),
(17, 'Canon'),
(18, 'HP'),
(19, 'Oppo'),
(20, 'Vivo'),
(21, 'Huawei'),
(22, 'Motorola'),
(23, 'OnePlus'),
(24, 'Rexus'),
(25, 'Microsoft'),
(26, 'JBL'),
(27, 'Bose'),
(28, 'Simbadda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_supplier`
--

CREATE TABLE `t_supplier` (
  `ID_SUPPLIER` int(11) NOT NULL,
  `KODE_SUPPLIER` varchar(255) NOT NULL,
  `NAMA_SUPPLIER` varchar(255) NOT NULL,
  `ALAMAT_SUPPLIER` varchar(255) NOT NULL,
  `EMAIL_SUPPLIER` varchar(255) NOT NULL,
  `TELP_SUPPLIER` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_supplier`
--

INSERT INTO `t_supplier` (`ID_SUPPLIER`, `KODE_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `EMAIL_SUPPLIER`, `TELP_SUPPLIER`) VALUES
(1, 'SUPP001', 'PT. Sinar Mulia Anugerah', 'Medan', 'mail@sinarmuliaanugerah.com', '82493023'),
(2, 'SUPP002', 'PT. Jaya Utama Santikah', 'Tangerang', 'mail@jayautamasantikah.co.id', '82493012'),
(3, 'SUPP003', 'PT. Asiaparts Indotech', 'Serpong', 'mail@asiapartsindotech.com', '824456533'),
(4, 'SUP004', 'PT. Semakin Di Depan', 'Jakarta', 'mail@semakindidepan.com', '82451325'),
(5, 'SUP005', 'PT. Lima Bintang Sejahtera', 'Bandung', 'mail@limabintang.com', '82125458'),
(6, 'SUP006', 'PT. Satu Hati', 'Bandung', 'mail@satuhati.com', '85135456'),
(99, 'SUP999', 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tipe_transaksi`
--

CREATE TABLE `t_tipe_transaksi` (
  `ID_TIPE_TRANSAKSI` int(11) NOT NULL,
  `KODE_TIPE_TRANSAKSI` varchar(10) NOT NULL,
  `NAMA_TIPE_TRANSAKSI` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tipe_transaksi`
--

INSERT INTO `t_tipe_transaksi` (`ID_TIPE_TRANSAKSI`, `KODE_TIPE_TRANSAKSI`, `NAMA_TIPE_TRANSAKSI`) VALUES
(1, 'TR1', 'Masuk'),
(2, 'TR2', 'Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tipe_user`
--

CREATE TABLE `t_tipe_user` (
  `ID_TIPE_USER` int(11) NOT NULL,
  `KODE_TIPE_USER` varchar(10) NOT NULL,
  `NAMA_TIPE_USER` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tipe_user`
--

INSERT INTO `t_tipe_user` (`ID_TIPE_USER`, `KODE_TIPE_USER`, `NAMA_TIPE_USER`) VALUES
(1, 'USER01', 'Admin'),
(2, 'USER02', 'General');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_TIPE_TRANSAKSI` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) NOT NULL,
  `ID_AKUN` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `KODE_TRANSAKSI` varchar(10) NOT NULL,
  `WAKTU_TRANSAKSI` datetime NOT NULL,
  `JUMLAH_QTY` int(11) NOT NULL,
  `JUMLAH_HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`ID_TRANSAKSI`, `ID_TIPE_TRANSAKSI`, `ID_CUSTOMER`, `ID_AKUN`, `ID_SUPPLIER`, `KODE_TRANSAKSI`, `WAKTU_TRANSAKSI`, `JUMLAH_QTY`, `JUMLAH_HARGA`) VALUES
(1, 2, 1, 1, 99, '280418002', '2018-04-28 19:22:40', 10, 15000000),
(3, 2, 2, 3, 99, '150318001', '2018-03-15 19:41:59', 3, 14040000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `ID_AKUN` int(11) NOT NULL,
  `ID_TIPE_USER` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAMA_USER` varchar(30) NOT NULL,
  `EMAIL_USER` varchar(30) NOT NULL,
  `TELP_USER` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`ID_AKUN`, `ID_TIPE_USER`, `USERNAME`, `PASSWORD`, `NAMA_USER`, `EMAIL_USER`, `TELP_USER`) VALUES
(1, 1, 'resky', '123', 'Resky Ramadhandi S', 'reskyramadhandi@student.upi.ed', '085719242967'),
(2, 1, 'admin', 'admin', 'default admin', 'admin@mail.com', '081358469875'),
(3, 2, 'dadang', 'dad999', 'Dadang Ahmad', 'dadang@mail.com', '0877546859321'),
(4, 2, 'dani', '123456789', 'Dani Mulya', 'danimulya@mail.com', '087745212358'),
(5, 2, 'guest', 'guest', 'guest', 'guest@mail.com', '085713215685');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_barang` (
`ID_BARANG` int(11)
,`KODE_BARANG` varchar(255)
,`NAMA_KATEGORI` varchar(30)
,`NAMA_MEREK` varchar(30)
,`NAMA_BARANG` varchar(255)
,`HARGA_BARANG` int(11)
,`JUMLAH_STOK` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_detail_barang` (
`ID_DETAIL_BARANG` int(11)
,`ID_BARANG` int(11)
,`KODE_BARANG` varchar(255)
,`NAMA_BARANG` varchar(255)
,`NAMA_KATEGORI` varchar(30)
,`NAMA_MEREK` varchar(30)
,`ID_GUDANG` int(11)
,`NAMA_GUDANG` varchar(30)
,`ALAMAT_GUDANG` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_detail_transaksi` (
`ID_DETAIL_TRANSAKSI` int(11)
,`ID_TRANSAKSI` int(11)
,`KODE_TRANSAKSI` varchar(10)
,`NAMA_BARANG` varchar(255)
,`HARGA_JUAL` int(11)
,`QTY` int(11)
,`NAMA_TIPE_TRANSAKSI` varchar(30)
,`NAMA_CUSTOMER` varchar(30)
,`USERNAME` varchar(30)
,`NAMA_SUPPLIER` varchar(255)
,`WAKTU_TRANSAKSI` datetime
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_stok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_stok` (
`ID_BARANG` int(11)
,`JUMLAH_STOK` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
`ID_TRANSAKSI` int(11)
,`KODE_TRANSAKSI` varchar(10)
,`NAMA_TIPE_TRANSAKSI` varchar(30)
,`NAMA_CUSTOMER` varchar(30)
,`USERNAME` varchar(30)
,`NAMA_SUPPLIER` varchar(255)
,`WAKTU_TRANSAKSI` datetime
,`JUMLAH_QTY` int(11)
,`JUMLAH_HARGA` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `t_barang`.`ID_BARANG` AS `ID_BARANG`,`t_barang`.`KODE_BARANG` AS `KODE_BARANG`,`t_kategori`.`NAMA_KATEGORI` AS `NAMA_KATEGORI`,`t_merek`.`NAMA_MEREK` AS `NAMA_MEREK`,`t_barang`.`NAMA_BARANG` AS `NAMA_BARANG`,`t_barang`.`HARGA_BARANG` AS `HARGA_BARANG`,`v_stok`.`JUMLAH_STOK` AS `JUMLAH_STOK` from ((((`t_barang` join `t_kategori`) join `t_merek`) join `t_detail_barang`) join `v_stok`) where ((`t_barang`.`ID_KATEGORI` = `t_kategori`.`ID_KATEGORI`) and (`t_barang`.`ID_MEREK` = `t_merek`.`ID_MEREK`) and (`t_barang`.`ID_BARANG` = `v_stok`.`ID_BARANG`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_detail_barang`
--
DROP TABLE IF EXISTS `v_detail_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_barang`  AS  select `t_detail_barang`.`ID_DETAIL_BARANG` AS `ID_DETAIL_BARANG`,`t_detail_barang`.`ID_BARANG` AS `ID_BARANG`,`t_barang`.`KODE_BARANG` AS `KODE_BARANG`,`t_barang`.`NAMA_BARANG` AS `NAMA_BARANG`,`t_kategori`.`NAMA_KATEGORI` AS `NAMA_KATEGORI`,`t_merek`.`NAMA_MEREK` AS `NAMA_MEREK`,`t_detail_barang`.`ID_GUDANG` AS `ID_GUDANG`,`t_gudang`.`NAMA_GUDANG` AS `NAMA_GUDANG`,`t_gudang`.`ALAMAT_GUDANG` AS `ALAMAT_GUDANG` from ((((`t_detail_barang` join `t_barang`) join `t_kategori`) join `t_merek`) join `t_gudang`) where ((`t_detail_barang`.`ID_BARANG` = `t_barang`.`ID_BARANG`) and (`t_detail_barang`.`ID_GUDANG` = `t_gudang`.`ID_GUDANG`) and (`t_barang`.`ID_MEREK` = `t_merek`.`ID_MEREK`) and (`t_barang`.`ID_KATEGORI` = `t_kategori`.`ID_KATEGORI`)) order by `t_detail_barang`.`ID_DETAIL_BARANG` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_detail_transaksi`
--
DROP TABLE IF EXISTS `v_detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_transaksi`  AS  select `t_detail_transaksi`.`ID_DETAIL_TRANSAKSI` AS `ID_DETAIL_TRANSAKSI`,`t_detail_transaksi`.`ID_TRANSAKSI` AS `ID_TRANSAKSI`,`v_transaksi`.`KODE_TRANSAKSI` AS `KODE_TRANSAKSI`,`t_barang`.`NAMA_BARANG` AS `NAMA_BARANG`,`t_detail_transaksi`.`HARGA_JUAL` AS `HARGA_JUAL`,`t_detail_transaksi`.`QTY` AS `QTY`,`v_transaksi`.`NAMA_TIPE_TRANSAKSI` AS `NAMA_TIPE_TRANSAKSI`,`v_transaksi`.`NAMA_CUSTOMER` AS `NAMA_CUSTOMER`,`v_transaksi`.`USERNAME` AS `USERNAME`,`v_transaksi`.`NAMA_SUPPLIER` AS `NAMA_SUPPLIER`,`v_transaksi`.`WAKTU_TRANSAKSI` AS `WAKTU_TRANSAKSI` from ((`t_detail_transaksi` join `t_barang`) join `v_transaksi`) where ((`t_detail_transaksi`.`ID_BARANG` = `t_barang`.`ID_BARANG`) and (`t_detail_transaksi`.`ID_TRANSAKSI` = `v_transaksi`.`ID_TRANSAKSI`)) order by `t_detail_transaksi`.`ID_DETAIL_TRANSAKSI` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_stok`
--
DROP TABLE IF EXISTS `v_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok`  AS  select `t_detail_barang`.`ID_BARANG` AS `ID_BARANG`,sum(`t_detail_barang`.`STOK_BARANG`) AS `JUMLAH_STOK` from `t_detail_barang` group by `t_detail_barang`.`ID_BARANG` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `t_transaksi`.`ID_TRANSAKSI` AS `ID_TRANSAKSI`,`t_transaksi`.`KODE_TRANSAKSI` AS `KODE_TRANSAKSI`,`t_tipe_transaksi`.`NAMA_TIPE_TRANSAKSI` AS `NAMA_TIPE_TRANSAKSI`,`t_customer`.`NAMA_CUSTOMER` AS `NAMA_CUSTOMER`,`t_user`.`USERNAME` AS `USERNAME`,`t_supplier`.`NAMA_SUPPLIER` AS `NAMA_SUPPLIER`,`t_transaksi`.`WAKTU_TRANSAKSI` AS `WAKTU_TRANSAKSI`,`t_transaksi`.`JUMLAH_QTY` AS `JUMLAH_QTY`,`t_transaksi`.`JUMLAH_HARGA` AS `JUMLAH_HARGA` from ((((`t_transaksi` join `t_tipe_transaksi`) join `t_customer`) join `t_user`) join `t_supplier`) where ((`t_transaksi`.`ID_TIPE_TRANSAKSI` = `t_tipe_transaksi`.`ID_TIPE_TRANSAKSI`) and (`t_transaksi`.`ID_CUSTOMER` = `t_customer`.`ID_CUSTOMER`) and (`t_transaksi`.`ID_SUPPLIER` = `t_supplier`.`ID_SUPPLIER`) and (`t_transaksi`.`ID_AKUN` = `t_user`.`ID_AKUN`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_MEMILIKI` (`ID_KATEGORI`),
  ADD KEY `FK_REFERENCE_11` (`ID_MEREK`);

--
-- Indeks untuk tabel `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`ID_CUSTOMER`);

--
-- Indeks untuk tabel `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  ADD PRIMARY KEY (`ID_DETAIL_BARANG`,`ID_BARANG`,`ID_GUDANG`),
  ADD KEY `FK_DILETAKKAN` (`ID_BARANG`),
  ADD KEY `FK_DILETAKKAN2` (`ID_GUDANG`);

--
-- Indeks untuk tabel `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`,`ID_BARANG`,`ID_TRANSAKSI`),
  ADD KEY `FK_MELAKUKAN` (`ID_BARANG`),
  ADD KEY `FK_MELAKUKAN2` (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `t_gudang`
--
ALTER TABLE `t_gudang`
  ADD PRIMARY KEY (`ID_GUDANG`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `t_merek`
--
ALTER TABLE `t_merek`
  ADD PRIMARY KEY (`ID_MEREK`);

--
-- Indeks untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- Indeks untuk tabel `t_tipe_transaksi`
--
ALTER TABLE `t_tipe_transaksi`
  ADD PRIMARY KEY (`ID_TIPE_TRANSAKSI`);

--
-- Indeks untuk tabel `t_tipe_user`
--
ALTER TABLE `t_tipe_user`
  ADD PRIMARY KEY (`ID_TIPE_USER`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_MEMASOK` (`ID_SUPPLIER`),
  ADD KEY `FK_MENGAJUKAN` (`ID_CUSTOMER`),
  ADD KEY `FK_MENGOPERASI` (`ID_AKUN`),
  ADD KEY `FK_TERBAGI` (`ID_TIPE_TRANSAKSI`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`ID_AKUN`),
  ADD KEY `FK_BERTIPE` (`ID_TIPE_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `t_customer`
--
ALTER TABLE `t_customer`
  MODIFY `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  MODIFY `ID_DETAIL_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  MODIFY `ID_DETAIL_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_gudang`
--
ALTER TABLE `t_gudang`
  MODIFY `ID_GUDANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `t_merek`
--
ALTER TABLE `t_merek`
  MODIFY `ID_MEREK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `t_tipe_transaksi`
--
ALTER TABLE `t_tipe_transaksi`
  MODIFY `ID_TIPE_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_tipe_user`
--
ALTER TABLE `t_tipe_user`
  MODIFY `ID_TIPE_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `t_kategori` (`ID_KATEGORI`),
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_MEREK`) REFERENCES `t_merek` (`ID_MEREK`);

--
-- Ketidakleluasaan untuk tabel `t_detail_barang`
--
ALTER TABLE `t_detail_barang`
  ADD CONSTRAINT `FK_DILETAKKAN` FOREIGN KEY (`ID_BARANG`) REFERENCES `t_barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_DILETAKKAN2` FOREIGN KEY (`ID_GUDANG`) REFERENCES `t_gudang` (`ID_GUDANG`);

--
-- Ketidakleluasaan untuk tabel `t_detail_transaksi`
--
ALTER TABLE `t_detail_transaksi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_BARANG`) REFERENCES `t_barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_MELAKUKAN2` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `t_transaksi` (`ID_TRANSAKSI`);

--
-- Ketidakleluasaan untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `FK_MEMASOK` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `t_supplier` (`ID_SUPPLIER`),
  ADD CONSTRAINT `FK_MENGAJUKAN` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `t_customer` (`ID_CUSTOMER`),
  ADD CONSTRAINT `FK_MENGOPERASI` FOREIGN KEY (`ID_AKUN`) REFERENCES `t_user` (`ID_AKUN`),
  ADD CONSTRAINT `FK_TERBAGI` FOREIGN KEY (`ID_TIPE_TRANSAKSI`) REFERENCES `t_tipe_transaksi` (`ID_TIPE_TRANSAKSI`);

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `FK_BERTIPE` FOREIGN KEY (`ID_TIPE_USER`) REFERENCES `t_tipe_user` (`ID_TIPE_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
