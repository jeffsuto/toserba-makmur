-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2018 pada 08.32
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokolestari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `id_supplier` int(11) UNSIGNED DEFAULT NULL,
  `kode_kategori` varchar(7) DEFAULT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `stock_barang` int(1) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_barang` int(1) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `dimensi` varchar(10) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_supplier`, `kode_kategori`, `nama_barang`, `stock_barang`, `harga_beli`, `harga_barang`, `diskon`, `berat`, `dimensi`, `deskripsi`, `image`) VALUES
('32', 1, 'KID', 'ewqf', 323, NULL, 342, 23, 32, '23x32x3', '3232', '32_.jpg'),
('323', 1, 'KID', 'Baju partai Seragam', 117, 12000, 20000, 20, 12, '2x3x4', 'Ini barang bagruuuu', '323_.jpg'),
('434', 1, 'KID', '343', 43, 4343, 434444, 34, 434, '43x43x43', '434', '434_.jpg'),
('BR-06', 6, 'PB', 'Baju Merah Terang Benderang', 62, 10000, 15000, 30, 10, '12x4x10', 'ini baju warna merah', 'BR-06_1.jpg'),
('BR-08', 1, 'KID', 'sdfads', 23, NULL, 324, 23, 232, '23x32x32', 'sfadsa', 'BR-08_1.jpg'),
('BR-120', 1, 'KID', 'Baju partai Seragam', 2122, 1230, 1212, 12, 12, '12x21x2', '', 'BR-120_.jpg'),
('dsfds', 1, 'KID', 'Baju merah partai', 213, 12310, 121, 21, 12, '12x121x21', '', 'dsfds_.jpg'),
('fda', 1, 'KID', 'fdsfffdf', 32, 12, 3, 21, 32, '3x32x32', '', 'fda_.jpg'),
('sdf', 1, 'KID', 'fvfds', 32, 21, 1, 3, 31, '3x3x3', '', 'sdf_.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `id_kota` int(11) UNSIGNED DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customer`, `username`, `email`, `password`, `nama`, `alamat`, `id_kota`, `tlp`, `image`) VALUES
(13, 'Indah', 'indahsari@gmail.com', '123456', 'Indah', 'Jl. Setapak', 5104, '0822900002', NULL),
(14, 'Adi', 'Agungriadi0410@gmail.com', '12345', 'Adipati', 'Jl semarang', 3329, '081123456789', NULL),
(15, 'Linda', 'Novitalinda22@gmail.com', '123', 'Linda', 'Jl. Pagesangan', 3578, '082298141053', NULL),
(18, 'Admin', 'test', 'test', 'Administrator', 'Wonorejo Timur 1 Blok C/7', 3578, '08262625188', '18_.JPG'),
(19, 'jeffsuto', 'jeffrysuyanto@gmail.com', 'jeff', 'Jeffry Suyanto', 'Jl. Wonorejo Timur 1 Blok C No.7', 3578, '0856067028271', '19_.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_detail_pengiriman` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `jml_barang_kirim` int(10) UNSIGNED DEFAULT '0',
  `jml_barang_terima` int(10) UNSIGNED DEFAULT '0',
  `jml_barang_rusak` int(10) UNSIGNED DEFAULT '0',
  `kondisi_barang` varchar(100) DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_detail_pengiriman`, `id_pengiriman`, `kode_barang`, `qty`, `jml_barang_kirim`, `jml_barang_terima`, `jml_barang_rusak`, `kondisi_barang`) VALUES
(1, 52, 'BR-06', 5, 3, 3, 0, 'Kosong'),
(2, 53, 'BR-06', 1, 1, NULL, 0, NULL),
(3, 54, 'BR-06', 2, 2, 1, 1, 'BR-06_19.jpg'),
(4, 55, 'BR-06', 9, 9, 0, 0, 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` varchar(50) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `kode_barang`, `qty`, `catatan`) VALUES
('DT-0001', 'INV-0001', 'BR-06', 5, NULL),
('DT-0002', 'INV-0002', 'BR-06', 1, ''),
('DT-0003', 'INV-0003', 'BR-06', 2, ''),
('DT-0004', 'INV-0004', 'BR-06', 9, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspedisis`
--

CREATE TABLE `ekspedisis` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekspedisis`
--

INSERT INTO `ekspedisis` (`id`, `nama`) VALUES
(1, 'POS'),
(2, 'TIKI'),
(3, 'JNE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `kode_barang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id_favorit`, `id_customer`, `kode_barang`) VALUES
(2, 14, 'BR-06'),
(6, 13, 'BR-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(7) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('KID', 'Anak - anak'),
('KNT', 'Kantor'),
('PB', 'Umum'),
('SCH', 'Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `qty` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `komplain` text NOT NULL,
  `tgl_komplain` datetime NOT NULL,
  `status` enum('PROSES','SELESAI') DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `id_penjualan`, `komplain`, `tgl_komplain`, `status`) VALUES
(1, 'INV-0003', 'barangnya pecah', '2018-10-23 00:32:18', 'SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(10) UNSIGNED NOT NULL,
  `nama_kota` varchar(30) DEFAULT NULL,
  `id_provinsi` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `id_provinsi`) VALUES
(1101, 'KABUPATEN SIMEULUE', 11),
(1102, 'KABUPATEN ACEH SINGKIL', 11),
(1103, 'KABUPATEN ACEH SELATAN', 11),
(1104, 'KABUPATEN ACEH TENGGARA', 11),
(1105, 'KABUPATEN ACEH TIMUR', 11),
(1106, 'KABUPATEN ACEH TENGAH', 11),
(1107, 'KABUPATEN ACEH BARAT', 11),
(1108, 'KABUPATEN ACEH BESAR', 11),
(1109, 'KABUPATEN PIDIE', 11),
(1110, 'KABUPATEN BIREUEN', 11),
(1111, 'KABUPATEN ACEH UTARA', 11),
(1112, 'KABUPATEN ACEH BARAT DAYA', 11),
(1113, 'KABUPATEN GAYO LUES', 11),
(1114, 'KABUPATEN ACEH TAMIANG', 11),
(1115, 'KABUPATEN NAGAN RAYA', 11),
(1116, 'KABUPATEN ACEH JAYA', 11),
(1117, 'KABUPATEN BENER MERIAH', 11),
(1118, 'KABUPATEN PIDIE JAYA', 11),
(1171, 'KOTA BANDA ACEH', 11),
(1172, 'KOTA SABANG', 11),
(1173, 'KOTA LANGSA', 11),
(1174, 'KOTA LHOKSEUMAWE', 11),
(1175, 'KOTA SUBULUSSALAM', 11),
(1201, 'KABUPATEN NIAS', 12),
(1202, 'KABUPATEN MANDAILING NATAL', 12),
(1203, 'KABUPATEN TAPANULI SELATAN', 12),
(1204, 'KABUPATEN TAPANULI TENGAH', 12),
(1205, 'KABUPATEN TAPANULI UTARA', 12),
(1206, 'KABUPATEN TOBA SAMOSIR', 12),
(1207, 'KABUPATEN LABUHAN BATU', 12),
(1208, 'KABUPATEN ASAHAN', 12),
(1209, 'KABUPATEN SIMALUNGUN', 12),
(1210, 'KABUPATEN DAIRI', 12),
(1211, 'KABUPATEN KARO', 12),
(1212, 'KABUPATEN DELI SERDANG', 12),
(1213, 'KABUPATEN LANGKAT', 12),
(1214, 'KABUPATEN NIAS SELATAN', 12),
(1215, 'KABUPATEN HUMBANG HASUNDUTAN', 12),
(1216, 'KABUPATEN PAKPAK BHARAT', 12),
(1217, 'KABUPATEN SAMOSIR', 12),
(1218, 'KABUPATEN SERDANG BEDAGAI', 12),
(1219, 'KABUPATEN BATU BARA', 12),
(1220, 'KABUPATEN PADANG LAWAS UTARA', 12),
(1221, 'KABUPATEN PADANG LAWAS', 12),
(1222, 'KABUPATEN LABUHAN BATU SELATAN', 12),
(1223, 'KABUPATEN LABUHAN BATU UTARA', 12),
(1224, 'KABUPATEN NIAS UTARA', 12),
(1225, 'KABUPATEN NIAS BARAT', 12),
(1271, 'KOTA SIBOLGA', 12),
(1272, 'KOTA TANJUNG BALAI', 12),
(1273, 'KOTA PEMATANG SIANTAR', 12),
(1274, 'KOTA TEBING TINGGI', 12),
(1275, 'KOTA MEDAN', 12),
(1276, 'KOTA BINJAI', 12),
(1277, 'KOTA PADANGSIDIMPUAN', 12),
(1278, 'KOTA GUNUNGSITOLI', 12),
(1301, 'KABUPATEN KEPULAUAN MENTAWAI', 13),
(1302, 'KABUPATEN PESISIR SELATAN', 13),
(1303, 'KABUPATEN SOLOK', 13),
(1304, 'KABUPATEN SIJUNJUNG', 13),
(1305, 'KABUPATEN TANAH DATAR', 13),
(1306, 'KABUPATEN PADANG PARIAMAN', 13),
(1307, 'KABUPATEN AGAM', 13),
(1308, 'KABUPATEN LIMA PULUH KOTA', 13),
(1309, 'KABUPATEN PASAMAN', 13),
(1310, 'KABUPATEN SOLOK SELATAN', 13),
(1311, 'KABUPATEN DHARMASRAYA', 13),
(1312, 'KABUPATEN PASAMAN BARAT', 13),
(1371, 'KOTA PADANG', 13),
(1372, 'KOTA SOLOK', 13),
(1373, 'KOTA SAWAH LUNTO', 13),
(1374, 'KOTA PADANG PANJANG', 13),
(1375, 'KOTA BUKITTINGGI', 13),
(1376, 'KOTA PAYAKUMBUH', 13),
(1377, 'KOTA PARIAMAN', 13),
(1401, 'KABUPATEN KUANTAN SINGINGI', 14),
(1402, 'KABUPATEN INDRAGIRI HULU', 14),
(1403, 'KABUPATEN INDRAGIRI HILIR', 14),
(1404, 'KABUPATEN PELALAWAN', 14),
(1405, 'KABUPATEN S I A K', 14),
(1406, 'KABUPATEN KAMPAR', 14),
(1407, 'KABUPATEN ROKAN HULU', 14),
(1408, 'KABUPATEN BENGKALIS', 14),
(1409, 'KABUPATEN ROKAN HILIR', 14),
(1410, 'KABUPATEN KEPULAUAN MERANTI', 14),
(1471, 'KOTA PEKANBARU', 14),
(1473, 'KOTA D U M A I', 14),
(1501, 'KABUPATEN KERINCI', 15),
(1502, 'KABUPATEN MERANGIN', 15),
(1503, 'KABUPATEN SAROLANGUN', 15),
(1504, 'KABUPATEN BATANG HARI', 15),
(1505, 'KABUPATEN MUARO JAMBI', 15),
(1506, 'KABUPATEN TANJUNG JABUNG TIMUR', 15),
(1507, 'KABUPATEN TANJUNG JABUNG BARAT', 15),
(1508, 'KABUPATEN TEBO', 15),
(1509, 'KABUPATEN BUNGO', 15),
(1571, 'KOTA JAMBI', 15),
(1572, 'KOTA SUNGAI PENUH', 15),
(1601, 'KABUPATEN OGAN KOMERING ULU', 16),
(1602, 'KABUPATEN OGAN KOMERING ILIR', 16),
(1603, 'KABUPATEN MUARA ENIM', 16),
(1604, 'KABUPATEN LAHAT', 16),
(1605, 'KABUPATEN MUSI RAWAS', 16),
(1606, 'KABUPATEN MUSI BANYUASIN', 16),
(1607, 'KABUPATEN BANYU ASIN', 16),
(1608, 'KABUPATEN OGAN KOMERING ULU SE', 16),
(1609, 'KABUPATEN OGAN KOMERING ULU TI', 16),
(1610, 'KABUPATEN OGAN ILIR', 16),
(1611, 'KABUPATEN EMPAT LAWANG', 16),
(1612, 'KABUPATEN PENUKAL ABAB LEMATAN', 16),
(1613, 'KABUPATEN MUSI RAWAS UTARA', 16),
(1671, 'KOTA PALEMBANG', 16),
(1672, 'KOTA PRABUMULIH', 16),
(1673, 'KOTA PAGAR ALAM', 16),
(1674, 'KOTA LUBUKLINGGAU', 16),
(1701, 'KABUPATEN BENGKULU SELATAN', 17),
(1702, 'KABUPATEN REJANG LEBONG', 17),
(1703, 'KABUPATEN BENGKULU UTARA', 17),
(1704, 'KABUPATEN KAUR', 17),
(1705, 'KABUPATEN SELUMA', 17),
(1706, 'KABUPATEN MUKOMUKO', 17),
(1707, 'KABUPATEN LEBONG', 17),
(1708, 'KABUPATEN KEPAHIANG', 17),
(1709, 'KABUPATEN BENGKULU TENGAH', 17),
(1771, 'KOTA BENGKULU', 17),
(1801, 'KABUPATEN LAMPUNG BARAT', 18),
(1802, 'KABUPATEN TANGGAMUS', 18),
(1803, 'KABUPATEN LAMPUNG SELATAN', 18),
(1804, 'KABUPATEN LAMPUNG TIMUR', 18),
(1805, 'KABUPATEN LAMPUNG TENGAH', 18),
(1806, 'KABUPATEN LAMPUNG UTARA', 18),
(1807, 'KABUPATEN WAY KANAN', 18),
(1808, 'KABUPATEN TULANGBAWANG', 18),
(1809, 'KABUPATEN PESAWARAN', 18),
(1810, 'KABUPATEN PRINGSEWU', 18),
(1811, 'KABUPATEN MESUJI', 18),
(1812, 'KABUPATEN TULANG BAWANG BARAT', 18),
(1813, 'KABUPATEN PESISIR BARAT', 18),
(1871, 'KOTA BANDAR LAMPUNG', 18),
(1872, 'KOTA METRO', 18),
(1901, 'KABUPATEN BANGKA', 19),
(1902, 'KABUPATEN BELITUNG', 19),
(1903, 'KABUPATEN BANGKA BARAT', 19),
(1904, 'KABUPATEN BANGKA TENGAH', 19),
(1905, 'KABUPATEN BANGKA SELATAN', 19),
(1906, 'KABUPATEN BELITUNG TIMUR', 19),
(1971, 'KOTA PANGKAL PINANG', 19),
(2101, 'KABUPATEN KARIMUN', 21),
(2102, 'KABUPATEN BINTAN', 21),
(2103, 'KABUPATEN NATUNA', 21),
(2104, 'KABUPATEN LINGGA', 21),
(2105, 'KABUPATEN KEPULAUAN ANAMBAS', 21),
(2171, 'KOTA B A T A M', 21),
(2172, 'KOTA TANJUNG PINANG', 21),
(3101, 'KABUPATEN KEPULAUAN SERIBU', 31),
(3171, 'KOTA JAKARTA SELATAN', 31),
(3172, 'KOTA JAKARTA TIMUR', 31),
(3173, 'KOTA JAKARTA PUSAT', 31),
(3174, 'KOTA JAKARTA BARAT', 31),
(3175, 'KOTA JAKARTA UTARA', 31),
(3201, 'KABUPATEN BOGOR', 32),
(3202, 'KABUPATEN SUKABUMI', 32),
(3203, 'KABUPATEN CIANJUR', 32),
(3204, 'KABUPATEN BANDUNG', 32),
(3205, 'KABUPATEN GARUT', 32),
(3206, 'KABUPATEN TASIKMALAYA', 32),
(3207, 'KABUPATEN CIAMIS', 32),
(3208, 'KABUPATEN KUNINGAN', 32),
(3209, 'KABUPATEN CIREBON', 32),
(3210, 'KABUPATEN MAJALENGKA', 32),
(3211, 'KABUPATEN SUMEDANG', 32),
(3212, 'KABUPATEN INDRAMAYU', 32),
(3213, 'KABUPATEN SUBANG', 32),
(3214, 'KABUPATEN PURWAKARTA', 32),
(3215, 'KABUPATEN KARAWANG', 32),
(3216, 'KABUPATEN BEKASI', 32),
(3217, 'KABUPATEN BANDUNG BARAT', 32),
(3218, 'KABUPATEN PANGANDARAN', 32),
(3271, 'KOTA BOGOR', 32),
(3272, 'KOTA SUKABUMI', 32),
(3273, 'KOTA BANDUNG', 32),
(3274, 'KOTA CIREBON', 32),
(3275, 'KOTA BEKASI', 32),
(3276, 'KOTA DEPOK', 32),
(3277, 'KOTA CIMAHI', 32),
(3278, 'KOTA TASIKMALAYA', 32),
(3279, 'KOTA BANJAR', 32),
(3301, 'KABUPATEN CILACAP', 33),
(3302, 'KABUPATEN BANYUMAS', 33),
(3303, 'KABUPATEN PURBALINGGA', 33),
(3304, 'KABUPATEN BANJARNEGARA', 33),
(3305, 'KABUPATEN KEBUMEN', 33),
(3306, 'KABUPATEN PURWOREJO', 33),
(3307, 'KABUPATEN WONOSOBO', 33),
(3308, 'KABUPATEN MAGELANG', 33),
(3309, 'KABUPATEN BOYOLALI', 33),
(3310, 'KABUPATEN KLATEN', 33),
(3311, 'KABUPATEN SUKOHARJO', 33),
(3312, 'KABUPATEN WONOGIRI', 33),
(3313, 'KABUPATEN KARANGANYAR', 33),
(3314, 'KABUPATEN SRAGEN', 33),
(3315, 'KABUPATEN GROBOGAN', 33),
(3316, 'KABUPATEN BLORA', 33),
(3317, 'KABUPATEN REMBANG', 33),
(3318, 'KABUPATEN PATI', 33),
(3319, 'KABUPATEN KUDUS', 33),
(3320, 'KABUPATEN JEPARA', 33),
(3321, 'KABUPATEN DEMAK', 33),
(3322, 'KABUPATEN SEMARANG', 33),
(3323, 'KABUPATEN TEMANGGUNG', 33),
(3324, 'KABUPATEN KENDAL', 33),
(3325, 'KABUPATEN BATANG', 33),
(3326, 'KABUPATEN PEKALONGAN', 33),
(3327, 'KABUPATEN PEMALANG', 33),
(3328, 'KABUPATEN TEGAL', 33),
(3329, 'KABUPATEN BREBES', 33),
(3371, 'KOTA MAGELANG', 33),
(3372, 'KOTA SURAKARTA', 33),
(3373, 'KOTA SALATIGA', 33),
(3374, 'KOTA SEMARANG', 33),
(3375, 'KOTA PEKALONGAN', 33),
(3376, 'KOTA TEGAL', 33),
(3401, 'KABUPATEN KULON PROGO', 34),
(3402, 'KABUPATEN BANTUL', 34),
(3403, 'KABUPATEN GUNUNG KIDUL', 34),
(3404, 'KABUPATEN SLEMAN', 34),
(3471, 'KOTA YOGYAKARTA', 34),
(3501, 'KABUPATEN PACITAN', 35),
(3502, 'KABUPATEN PONOROGO', 35),
(3503, 'KABUPATEN TRENGGALEK', 35),
(3504, 'KABUPATEN TULUNGAGUNG', 35),
(3505, 'KABUPATEN BLITAR', 35),
(3506, 'KABUPATEN KEDIRI', 35),
(3507, 'KABUPATEN MALANG', 35),
(3508, 'KABUPATEN LUMAJANG', 35),
(3509, 'KABUPATEN JEMBER', 35),
(3510, 'KABUPATEN BANYUWANGI', 35),
(3511, 'KABUPATEN BONDOWOSO', 35),
(3512, 'KABUPATEN SITUBONDO', 35),
(3513, 'KABUPATEN PROBOLINGGO', 35),
(3514, 'KABUPATEN PASURUAN', 35),
(3515, 'KABUPATEN SIDOARJO', 35),
(3516, 'KABUPATEN MOJOKERTO', 35),
(3517, 'KABUPATEN JOMBANG', 35),
(3518, 'KABUPATEN NGANJUK', 35),
(3519, 'KABUPATEN MADIUN', 35),
(3520, 'KABUPATEN MAGETAN', 35),
(3521, 'KABUPATEN NGAWI', 35),
(3522, 'KABUPATEN BOJONEGORO', 35),
(3523, 'KABUPATEN TUBAN', 35),
(3524, 'KABUPATEN LAMONGAN', 35),
(3525, 'KABUPATEN GRESIK', 35),
(3526, 'KABUPATEN BANGKALAN', 35),
(3527, 'KABUPATEN SAMPANG', 35),
(3528, 'KABUPATEN PAMEKASAN', 35),
(3529, 'KABUPATEN SUMENEP', 35),
(3571, 'KOTA KEDIRI', 35),
(3572, 'KOTA BLITAR', 35),
(3573, 'KOTA MALANG', 35),
(3574, 'KOTA PROBOLINGGO', 35),
(3575, 'KOTA PASURUAN', 35),
(3576, 'KOTA MOJOKERTO', 35),
(3577, 'KOTA MADIUN', 35),
(3578, 'KOTA SURABAYA', 35),
(3579, 'KOTA BATU', 35),
(3601, 'KABUPATEN PANDEGLANG', 36),
(3602, 'KABUPATEN LEBAK', 36),
(3603, 'KABUPATEN TANGERANG', 36),
(3604, 'KABUPATEN SERANG', 36),
(3671, 'KOTA TANGERANG', 36),
(3672, 'KOTA CILEGON', 36),
(3673, 'KOTA SERANG', 36),
(3674, 'KOTA TANGERANG SELATAN', 36),
(5101, 'KABUPATEN JEMBRANA', 51),
(5102, 'KABUPATEN TABANAN', 51),
(5103, 'KABUPATEN BADUNG', 51),
(5104, 'KABUPATEN GIANYAR', 51),
(5105, 'KABUPATEN KLUNGKUNG', 51),
(5106, 'KABUPATEN BANGLI', 51),
(5107, 'KABUPATEN KARANG ASEM', 51),
(5108, 'KABUPATEN BULELENG', 51),
(5171, 'KOTA DENPASAR', 51),
(5201, 'KABUPATEN LOMBOK BARAT', 52),
(5202, 'KABUPATEN LOMBOK TENGAH', 52),
(5203, 'KABUPATEN LOMBOK TIMUR', 52),
(5204, 'KABUPATEN SUMBAWA', 52),
(5205, 'KABUPATEN DOMPU', 52),
(5206, 'KABUPATEN BIMA', 52),
(5207, 'KABUPATEN SUMBAWA BARAT', 52),
(5208, 'KABUPATEN LOMBOK UTARA', 52),
(5271, 'KOTA MATARAM', 52),
(5272, 'KOTA BIMA', 52),
(5301, 'KABUPATEN SUMBA BARAT', 53),
(5302, 'KABUPATEN SUMBA TIMUR', 53),
(5303, 'KABUPATEN KUPANG', 53),
(5304, 'KABUPATEN TIMOR TENGAH SELATAN', 53),
(5305, 'KABUPATEN TIMOR TENGAH UTARA', 53),
(5306, 'KABUPATEN BELU', 53),
(5307, 'KABUPATEN ALOR', 53),
(5308, 'KABUPATEN LEMBATA', 53),
(5309, 'KABUPATEN FLORES TIMUR', 53),
(5310, 'KABUPATEN SIKKA', 53),
(5311, 'KABUPATEN ENDE', 53),
(5312, 'KABUPATEN NGADA', 53),
(5313, 'KABUPATEN MANGGARAI', 53),
(5314, 'KABUPATEN ROTE NDAO', 53),
(5315, 'KABUPATEN MANGGARAI BARAT', 53),
(5316, 'KABUPATEN SUMBA TENGAH', 53),
(5317, 'KABUPATEN SUMBA BARAT DAYA', 53),
(5318, 'KABUPATEN NAGEKEO', 53),
(5319, 'KABUPATEN MANGGARAI TIMUR', 53),
(5320, 'KABUPATEN SABU RAIJUA', 53),
(5321, 'KABUPATEN MALAKA', 53),
(5371, 'KOTA KUPANG', 53),
(6101, 'KABUPATEN SAMBAS', 61),
(6102, 'KABUPATEN BENGKAYANG', 61),
(6103, 'KABUPATEN LANDAK', 61),
(6104, 'KABUPATEN MEMPAWAH', 61),
(6105, 'KABUPATEN SANGGAU', 61),
(6106, 'KABUPATEN KETAPANG', 61),
(6107, 'KABUPATEN SINTANG', 61),
(6108, 'KABUPATEN KAPUAS HULU', 61),
(6109, 'KABUPATEN SEKADAU', 61),
(6110, 'KABUPATEN MELAWI', 61),
(6111, 'KABUPATEN KAYONG UTARA', 61),
(6112, 'KABUPATEN KUBU RAYA', 61),
(6171, 'KOTA PONTIANAK', 61),
(6172, 'KOTA SINGKAWANG', 61),
(6201, 'KABUPATEN KOTAWARINGIN BARAT', 62),
(6202, 'KABUPATEN KOTAWARINGIN TIMUR', 62),
(6203, 'KABUPATEN KAPUAS', 62),
(6204, 'KABUPATEN BARITO SELATAN', 62),
(6205, 'KABUPATEN BARITO UTARA', 62),
(6206, 'KABUPATEN SUKAMARA', 62),
(6207, 'KABUPATEN LAMANDAU', 62),
(6208, 'KABUPATEN SERUYAN', 62),
(6209, 'KABUPATEN KATINGAN', 62),
(6210, 'KABUPATEN PULANG PISAU', 62),
(6211, 'KABUPATEN GUNUNG MAS', 62),
(6212, 'KABUPATEN BARITO TIMUR', 62),
(6213, 'KABUPATEN MURUNG RAYA', 62),
(6271, 'KOTA PALANGKA RAYA', 62),
(6301, 'KABUPATEN TANAH LAUT', 63),
(6302, 'KABUPATEN KOTA BARU', 63),
(6303, 'KABUPATEN BANJAR', 63),
(6304, 'KABUPATEN BARITO KUALA', 63),
(6305, 'KABUPATEN TAPIN', 63),
(6306, 'KABUPATEN HULU SUNGAI SELATAN', 63),
(6307, 'KABUPATEN HULU SUNGAI TENGAH', 63),
(6308, 'KABUPATEN HULU SUNGAI UTARA', 63),
(6309, 'KABUPATEN TABALONG', 63),
(6310, 'KABUPATEN TANAH BUMBU', 63),
(6311, 'KABUPATEN BALANGAN', 63),
(6371, 'KOTA BANJARMASIN', 63),
(6372, 'KOTA BANJAR BARU', 63),
(6401, 'KABUPATEN PASER', 64),
(6402, 'KABUPATEN KUTAI BARAT', 64),
(6403, 'KABUPATEN KUTAI KARTANEGARA', 64),
(6404, 'KABUPATEN KUTAI TIMUR', 64),
(6405, 'KABUPATEN BERAU', 64),
(6409, 'KABUPATEN PENAJAM PASER UTARA', 64),
(6411, 'KABUPATEN MAHAKAM HULU', 64),
(6471, 'KOTA BALIKPAPAN', 64),
(6472, 'KOTA SAMARINDA', 64),
(6474, 'KOTA BONTANG', 64),
(6501, 'KABUPATEN MALINAU', 65),
(6502, 'KABUPATEN BULUNGAN', 65),
(6503, 'KABUPATEN TANA TIDUNG', 65),
(6504, 'KABUPATEN NUNUKAN', 65),
(6571, 'KOTA TARAKAN', 65),
(7101, 'KABUPATEN BOLAANG MONGONDOW', 71),
(7102, 'KABUPATEN MINAHASA', 71),
(7103, 'KABUPATEN KEPULAUAN SANGIHE', 71),
(7104, 'KABUPATEN KEPULAUAN TALAUD', 71),
(7105, 'KABUPATEN MINAHASA SELATAN', 71),
(7106, 'KABUPATEN MINAHASA UTARA', 71),
(7107, 'KABUPATEN BOLAANG MONGONDOW UT', 71),
(7108, 'KABUPATEN SIAU TAGULANDANG BIA', 71),
(7109, 'KABUPATEN MINAHASA TENGGARA', 71),
(7110, 'KABUPATEN BOLAANG MONGONDOW SE', 71),
(7111, 'KABUPATEN BOLAANG MONGONDOW TI', 71),
(7171, 'KOTA MANADO', 71),
(7172, 'KOTA BITUNG', 71),
(7173, 'KOTA TOMOHON', 71),
(7174, 'KOTA KOTAMOBAGU', 71),
(7201, 'KABUPATEN BANGGAI KEPULAUAN', 72),
(7202, 'KABUPATEN BANGGAI', 72),
(7203, 'KABUPATEN MOROWALI', 72),
(7204, 'KABUPATEN POSO', 72),
(7205, 'KABUPATEN DONGGALA', 72),
(7206, 'KABUPATEN TOLI-TOLI', 72),
(7207, 'KABUPATEN BUOL', 72),
(7208, 'KABUPATEN PARIGI MOUTONG', 72),
(7209, 'KABUPATEN TOJO UNA-UNA', 72),
(7210, 'KABUPATEN SIGI', 72),
(7211, 'KABUPATEN BANGGAI LAUT', 72),
(7212, 'KABUPATEN MOROWALI UTARA', 72),
(7271, 'KOTA PALU', 72),
(7301, 'KABUPATEN KEPULAUAN SELAYAR', 73),
(7302, 'KABUPATEN BULUKUMBA', 73),
(7303, 'KABUPATEN BANTAENG', 73),
(7304, 'KABUPATEN JENEPONTO', 73),
(7305, 'KABUPATEN TAKALAR', 73),
(7306, 'KABUPATEN GOWA', 73),
(7307, 'KABUPATEN SINJAI', 73),
(7308, 'KABUPATEN MAROS', 73),
(7309, 'KABUPATEN PANGKAJENE DAN KEPUL', 73),
(7310, 'KABUPATEN BARRU', 73),
(7311, 'KABUPATEN BONE', 73),
(7312, 'KABUPATEN SOPPENG', 73),
(7313, 'KABUPATEN WAJO', 73),
(7314, 'KABUPATEN SIDENRENG RAPPANG', 73),
(7315, 'KABUPATEN PINRANG', 73),
(7316, 'KABUPATEN ENREKANG', 73),
(7317, 'KABUPATEN LUWU', 73),
(7318, 'KABUPATEN TANA TORAJA', 73),
(7322, 'KABUPATEN LUWU UTARA', 73),
(7325, 'KABUPATEN LUWU TIMUR', 73),
(7326, 'KABUPATEN TORAJA UTARA', 73),
(7371, 'KOTA MAKASSAR', 73),
(7372, 'KOTA PAREPARE', 73),
(7373, 'KOTA PALOPO', 73),
(7401, 'KABUPATEN BUTON', 74),
(7402, 'KABUPATEN MUNA', 74),
(7403, 'KABUPATEN KONAWE', 74),
(7404, 'KABUPATEN KOLAKA', 74),
(7405, 'KABUPATEN KONAWE SELATAN', 74),
(7406, 'KABUPATEN BOMBANA', 74),
(7407, 'KABUPATEN WAKATOBI', 74),
(7408, 'KABUPATEN KOLAKA UTARA', 74),
(7409, 'KABUPATEN BUTON UTARA', 74),
(7410, 'KABUPATEN KONAWE UTARA', 74),
(7411, 'KABUPATEN KOLAKA TIMUR', 74),
(7412, 'KABUPATEN KONAWE KEPULAUAN', 74),
(7413, 'KABUPATEN MUNA BARAT', 74),
(7414, 'KABUPATEN BUTON TENGAH', 74),
(7415, 'KABUPATEN BUTON SELATAN', 74),
(7471, 'KOTA KENDARI', 74),
(7472, 'KOTA BAUBAU', 74),
(7501, 'KABUPATEN BOALEMO', 75),
(7502, 'KABUPATEN GORONTALO', 75),
(7503, 'KABUPATEN POHUWATO', 75),
(7504, 'KABUPATEN BONE BOLANGO', 75),
(7505, 'KABUPATEN GORONTALO UTARA', 75),
(7571, 'KOTA GORONTALO', 75),
(7601, 'KABUPATEN MAJENE', 76),
(7602, 'KABUPATEN POLEWALI MANDAR', 76),
(7603, 'KABUPATEN MAMASA', 76),
(7604, 'KABUPATEN MAMUJU', 76),
(7605, 'KABUPATEN MAMUJU UTARA', 76),
(7606, 'KABUPATEN MAMUJU TENGAH', 76),
(8101, 'KABUPATEN MALUKU TENGGARA BARA', 81),
(8102, 'KABUPATEN MALUKU TENGGARA', 81),
(8103, 'KABUPATEN MALUKU TENGAH', 81),
(8104, 'KABUPATEN BURU', 81),
(8105, 'KABUPATEN KEPULAUAN ARU', 81),
(8106, 'KABUPATEN SERAM BAGIAN BARAT', 81),
(8107, 'KABUPATEN SERAM BAGIAN TIMUR', 81),
(8108, 'KABUPATEN MALUKU BARAT DAYA', 81),
(8109, 'KABUPATEN BURU SELATAN', 81),
(8171, 'KOTA AMBON', 81),
(8172, 'KOTA TUAL', 81),
(8201, 'KABUPATEN HALMAHERA BARAT', 82),
(8202, 'KABUPATEN HALMAHERA TENGAH', 82),
(8203, 'KABUPATEN KEPULAUAN SULA', 82),
(8204, 'KABUPATEN HALMAHERA SELATAN', 82),
(8205, 'KABUPATEN HALMAHERA UTARA', 82),
(8206, 'KABUPATEN HALMAHERA TIMUR', 82),
(8207, 'KABUPATEN PULAU MOROTAI', 82),
(8208, 'KABUPATEN PULAU TALIABU', 82),
(8271, 'KOTA TERNATE', 82),
(8272, 'KOTA TIDORE KEPULAUAN', 82),
(9101, 'KABUPATEN FAKFAK', 91),
(9102, 'KABUPATEN KAIMANA', 91),
(9103, 'KABUPATEN TELUK WONDAMA', 91),
(9104, 'KABUPATEN TELUK BINTUNI', 91),
(9105, 'KABUPATEN MANOKWARI', 91),
(9106, 'KABUPATEN SORONG SELATAN', 91),
(9107, 'KABUPATEN SORONG', 91),
(9108, 'KABUPATEN RAJA AMPAT', 91),
(9109, 'KABUPATEN TAMBRAUW', 91),
(9110, 'KABUPATEN MAYBRAT', 91),
(9111, 'KABUPATEN MANOKWARI SELATAN', 91),
(9112, 'KABUPATEN PEGUNUNGAN ARFAK', 91),
(9171, 'KOTA SORONG', 91),
(9401, 'KABUPATEN MERAUKE', 94),
(9402, 'KABUPATEN JAYAWIJAYA', 94),
(9403, 'KABUPATEN JAYAPURA', 94),
(9404, 'KABUPATEN NABIRE', 94),
(9408, 'KABUPATEN KEPULAUAN YAPEN', 94),
(9409, 'KABUPATEN BIAK NUMFOR', 94),
(9410, 'KABUPATEN PANIAI', 94),
(9411, 'KABUPATEN PUNCAK JAYA', 94),
(9412, 'KABUPATEN MIMIKA', 94),
(9413, 'KABUPATEN BOVEN DIGOEL', 94),
(9414, 'KABUPATEN MAPPI', 94),
(9415, 'KABUPATEN ASMAT', 94),
(9416, 'KABUPATEN YAHUKIMO', 94),
(9417, 'KABUPATEN PEGUNUNGAN BINTANG', 94),
(9418, 'KABUPATEN TOLIKARA', 94),
(9419, 'KABUPATEN SARMI', 94),
(9420, 'KABUPATEN KEEROM', 94),
(9426, 'KABUPATEN WAROPEN', 94),
(9427, 'KABUPATEN SUPIORI', 94),
(9428, 'KABUPATEN MAMBERAMO RAYA', 94),
(9429, 'KABUPATEN NDUGA', 94),
(9430, 'KABUPATEN LANNY JAYA', 94),
(9431, 'KABUPATEN MAMBERAMO TENGAH', 94),
(9432, 'KABUPATEN YALIMO', 94),
(9433, 'KABUPATEN PUNCAK', 94),
(9434, 'KABUPATEN DOGIYAI', 94),
(9435, 'KABUPATEN INTAN JAYA', 94),
(9436, 'KABUPATEN DEIYAI', 94),
(9471, 'KOTA JAYAPURA', 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pembelian`
--

CREATE TABLE `laporan_pembelian` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `qty` int(11) DEFAULT '0',
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_pembelian`
--

INSERT INTO `laporan_pembelian` (`id`, `kode_barang`, `qty`, `tgl_pembelian`) VALUES
(1, 'BR-06', 100, '2018-10-13'),
(2, 'BR-06', 12, '2017-06-01'),
(3, '32', 323, '2018-10-13'),
(4, '434', 43, '2018-10-13'),
(5, '323', 117, '2018-10-17'),
(6, 'fda', 32, '2018-10-17'),
(7, 'sdf', 32, '2018-10-17'),
(8, 'BR-120', 2122, '2018-10-17'),
(9, 'dsfds', 213, '2018-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `id_ekspedisi` int(11) UNSIGNED NOT NULL,
  `no_resi` varchar(50) DEFAULT 'Kosong',
  `alamat` varchar(100) NOT NULL,
  `waktu_pengiriman` datetime DEFAULT NULL,
  `status_pengiriman` enum('TERKIRIM','BELUM TERKIRIM','DITERIMA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_penjualan`, `id_ekspedisi`, `no_resi`, `alamat`, `waktu_pengiriman`, `status_pengiriman`) VALUES
(52, 'INV-0001', 3, '12321432', 'Wonorejo', '2018-09-23 08:31:01', 'TERKIRIM'),
(53, 'INV-0002', 3, '1234325435', 'Jl. Wonorejo Timur 1 Blok C No.7, Surabaya, Jawa Timur. Kode Pos : 60119. Hp : 0856067028271', '2018-10-14 13:48:53', 'TERKIRIM'),
(54, 'INV-0003', 3, '12421432534', 'Jl. Wonorejo Timur 1 Blok C No.7, Surabaya, Jawa Timur. Kode Pos : 60119. Hp : 0856067028271', '2018-10-14 13:49:16', 'TERKIRIM'),
(55, 'INV-0004', 1, '10029847472221044', 'Jl. Wonorejo Timur 1 Blok C No.7, Surabaya, Jawa Timur. Kode Pos : 60119. Hp : 0856067028271', '2018-10-23 01:29:12', 'TERKIRIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(50) NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_batas_akhir` datetime NOT NULL,
  `total_transaksi` float UNSIGNED NOT NULL,
  `total_jml_transaksi` int(10) UNSIGNED NOT NULL,
  `ongkir` float NOT NULL,
  `bukti_pembayaran` varchar(256) NOT NULL,
  `status_pembelian` enum('BELUM BAYAR','SUDAH BAYAR','PROSES VALIDASI','DIBATALKAN','SELESAI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_customer`, `tgl_transaksi`, `tgl_batas_akhir`, `total_transaksi`, `total_jml_transaksi`, `ongkir`, `bukti_pembayaran`, `status_pembelian`) VALUES
('INV-0001', 19, '2018-09-18 16:35:57', '2018-09-19 16:36:00', 10000, 15000, 5000, 'INV-0002_.jpg', 'SELESAI'),
('INV-0002', 19, '2018-10-02 19:19:06', '2018-10-03 19:19:06', 10500, 15500, 5000, 'INV-0002_.jpg', 'SELESAI'),
('INV-0003', 19, '2018-10-02 20:04:46', '2018-10-03 20:04:46', 10500, 15500, 5000, 'INV-0003_.jpg', 'SELESAI'),
('INV-0004', 19, '2018-10-09 14:56:24', '2018-10-10 14:56:24', 94500, 99500, 5000, 'belumuploadbukti.jpg', 'SUDAH BAYAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(10) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `tlp`, `keterangan`) VALUES
(1, 'CV. ABADI', 'Jl. Joyoboyo', '098765465353', 'ini pembaruan'),
(6, 'PT. Sinar Dunia Tbk', 'jl. sudarman', '031-987654', '..... desc ....');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_customer`, `kode_barang`, `komentar`) VALUES
(1, 13, 'BR-06', 'Barang bagus'),
(3, 19, 'BR-06', 'Barangnya sudah sampai, tepat waktu.'),
(4, 19, 'BR-06', 'gak sesuaii. kembalikan duit saya'),
(5, 19, 'BR-06', 'keren bingit'),
(6, 19, 'BR-06', 'keren bingit'),
(7, 19, 'BR-06', 'keren bingit'),
(8, 19, 'BR-06', 'keren bingit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `akses` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama`, `tlp`, `alamat`, `akses`) VALUES
(1, 'linda', 'novitalinda22@gmail.com', '1234', 'Linda Novita Sari', '082 345 777 999', 'jl. pagesangan 3a / 34a', 1),
(4, 'indra', 'admin1@g.com', '333', 'indra c edytya', '082 232 454 000', 'jl. joyoboyo', 0),
(5, 'admin', 'admin@admin.com', '123456', 'Admin', '097674911332', 'JL. Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_suplier` (`id_supplier`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id_detail_pengiriman`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `kode_penjualan` (`id_penjualan`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `ekspedisis`
--
ALTER TABLE `ekspedisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_ekspedisi` (`id_ekspedisi`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id_detail_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ekspedisis`
--
ALTER TABLE `ekspedisis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9472;

--
-- AUTO_INCREMENT untuk tabel `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengiriman_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `komplain_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `laporan_pembelian`
--
ALTER TABLE `laporan_pembelian`
  ADD CONSTRAINT `laporan_pembelian_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_ekspedisi`) REFERENCES `ekspedisis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
