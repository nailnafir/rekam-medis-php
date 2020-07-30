-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2020 pada 16.51
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `kodeDokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(150) NOT NULL,
  `spesialis` varchar(150) NOT NULL,
  `jk` varchar(150) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kodeuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kodeDokter`, `nama_dokter`, `spesialis`, `jk`, `alamat`, `no_hp`, `kodeuser`) VALUES
(8, 'DK-342715841', 'Drg. Bambang Mulyono', 'Gigi', 'L', 'Medan', '0852332121', 'US-2240815'),
(9, 'DK-232915463', 'Dr. Ilham Nasution', 'Jantung', 'L', 'Jl. Gaperta', '0852111225', 'US-2240815'),
(10, 'DK-452915317', 'Dr. Ningsih Hasibuan', 'Kandungan', 'P', 'Jl. Bromo Ujung No. 255', '085112212121', 'US-2240815'),
(11, 'DK-252915666', 'Dr. Joko Sulistiono', 'Otak', 'L', 'Jl. Brikjen Katamso Gg. Markisa', '08541152254', 'US-2240815'),
(12, 'DK-452915253', 'Dr. Jaka Siregar', 'Paru - Paru', 'L', 'Jl. Sisingamangaraja No. 432', '083158585411', 'US-2240815'),
(13, 'DK-510215323', 'Dr. Zulkifli', 'Bedah', 'L', 'Jl. Seksama', '08212122121', 'US-2240815'),
(14, 'DK-060215861', 'DR.EDYAN PINEM', 'Telinga & Hidung', 'L', 'Jl. Bromob', '0812122111', 'US-2240815');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dok`
--

CREATE TABLE `jadwal_dok` (
  `id_jadwal` int(5) NOT NULL,
  `kodedokter` varchar(50) NOT NULL,
  `waktu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dok`
--

INSERT INTO `jadwal_dok` (`id_jadwal`, `kodedokter`, `waktu`) VALUES
(3, 'DK-342715841', 'Senin (10.00-12.00) WIB\r\nRabu (13.00-15.00) WIB\r\nSabtu  (15.00-19.00) WIB'),
(4, 'DK-232915463', 'Senin (12.30 - 15.30) WIB\r\nSelasa (07.30 - 12.30) WIB\r\nKamis (08.00 - 12.00) WIB'),
(5, 'DK-452915317', 'Rabu (08.00-12.00) WIB\r\nJumat (08.00-15.00) WIB\r\nSabtu  (09.00-13.00) WIB '),
(6, 'DK-252915666', 'Selasa (10.00-12.00) WIB\r\nRabu (13.00-15.00) WIB\r\nJumat (15.00-19.00) WIB '),
(7, 'DK-452915253', 'Kami (10.00-12.00) WIB\r\nJumat (13.00-15.00) WIB\r\nSabtu  (15.00-19.00) WIB '),
(8, 'DK-142915808', 'Senin (12.30 - 15.30) WIB\r\nSelasa (07.30 - 12.30) WIB\r\nKamis (08.00 - 12.00) WIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsul_spesial`
--

CREATE TABLE `konsul_spesial` (
  `id_spesialis` int(5) NOT NULL,
  `nama_spesialis` varchar(150) NOT NULL,
  `id_tindakan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsul_spesial`
--

INSERT INTO `konsul_spesial` (`id_spesialis`, `nama_spesialis`, `id_tindakan`) VALUES
(1, 'Anak', 5),
(2, 'Mata', 5),
(3, 'Internis', 5),
(4, 'THT', 5),
(5, 'Obsgin', 5),
(6, 'Kulit', 5),
(7, 'Bedah', 5),
(8, 'Orthopedi', 5),
(9, 'Onkologi', 5),
(10, 'Paru', 5),
(11, 'Rehab Medik', 5),
(12, 'Beurologi', 5),
(13, 'Tumbuh Kembang', 5),
(14, 'Urologi', 5),
(15, 'Jantung', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(150) NOT NULL,
  `jmlh_obat` varchar(150) NOT NULL,
  `satuan` varchar(150) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `kodeuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jmlh_obat`, `satuan`, `detail`, `kodeuser`) VALUES
(1, 'Amoxsan 250 mg', '10', '-', '-', 'US-2240815'),
(2, 'Amaryl M 1', '2', '-', '-', 'US-2240816'),
(3, 'Amaryl M 2', '6', '-', '-', 'US-2240817'),
(4, 'Aldisi SR', '3', '-', '-', 'US-2240818'),
(5, 'Artrodar', '8', '-', '-', 'US-2240819'),
(6, 'Acyclovir', '3', '-', '-', 'US-2240820'),
(7, 'Carniq', '10', '-', '-', 'US-2240821'),
(8, 'Cefarox 100', '10', '-', '-', 'US-2240822'),
(9, 'Compraz', '10', '-', '-', 'US-2240823'),
(10, 'Celestamine', '10', '-', '-', 'US-2240824'),
(11, 'Centrizine', '10', '-', '-', 'US-2240825'),
(12, 'Cardivask 5', '10', '-', '-', 'US-2240826'),
(13, 'Cardivask 10', '10', '-', '-', 'US-2240827'),
(14, 'Captopril 12,5', '10', '-', '-', 'US-2240828'),
(15, 'Creestor 20', '10', '-', '-', 'US-2240829'),
(16, 'Cedocart 5', '10', '-', '-', 'US-2240830'),
(17, 'Digest 30', '10', '-', '-', 'US-2240831'),
(18, 'Dextamine', '10', '-', '-', 'US-2240832'),
(19, 'Diaglime 2', '10', '-', '-', 'US-2240833'),
(20, 'Ester C', '10', '-', '-', 'US-2240834'),
(21, 'Enzlyplex', '10', '-', '-', 'US-2240835'),
(22, 'Fludane', '10', '-', '-', 'US-2240836'),
(23, 'Fludane plus', '10', '-', '-', 'US-2240837'),
(24, 'Flutamol plus', '10', '-', '-', 'US-2240838'),
(25, 'Flutab', '10', '-', '-', 'US-2240839'),
(26, 'Fixef 100', '10', '-', '-', 'US-2240840'),
(27, 'Fleximuv capsul', '10', '-', '-', 'US-2240841'),
(28, 'Fg.Troches', '10', '-', '-', 'US-2240842'),
(29, 'gastram', '10', '-', '-', 'US-2240843'),
(30, 'Gastrilan', '10', '-', '-', 'US-2240844'),
(31, 'Glucovance 500/2.5', '10', '-', '-', 'US-2240845'),
(32, 'Incidal OD', '10', '-', '-', 'US-2240846'),
(33, 'Imodium', '10', '-', '-', 'US-2240847'),
(34, 'Itzol', '10', '-', '-', 'US-2240848'),
(35, 'Inflaz 4', '10', '-', '-', 'US-2240849'),
(36, 'Imox', '10', '-', '-', 'US-2240850'),
(37, 'Kalmoxillin 500', '10', '-', '-', 'US-2240851'),
(38, 'Kaflam', '10', '-', '-', 'US-2240852'),
(39, 'Lesvatin 10', '10', '-', '-', 'US-2240853'),
(40, 'Lipitor 10', '10', '-', '-', 'US-2240854'),
(41, 'lipinorm 10', '10', '-', '-', 'US-2240855'),
(42, 'lipinorm 20', '10', '-', '-', 'US-2240856'),
(43, 'Lodia', '10', '-', '-', 'US-2240857'),
(44, 'Lodoz 2.5', '10', '-', '-', 'US-2240858'),
(45, 'Lacophen 500', '10', '-', '-', 'US-2240859'),
(46, 'Lyphen', '10', '-', '-', 'US-2240860'),
(47, 'Leomoxyl 500', '10', '-', '-', 'US-2240861'),
(48, 'Mefinal 500', '10', '-', '-', 'US-2240862'),
(49, 'Molasic 500', '10', '-', '-', 'US-2240863'),
(50, 'Mesol 4', '10', '-', '-', 'US-2240864'),
(51, 'Mesol 8', '10', '-', '-', 'US-2240865'),
(52, 'Neurodial ', '10', '-', '-', 'US-2240866'),
(53, 'New Diatab', '10', '-', '-', 'US-2240867'),
(54, 'Norvask 5', '10', '-', '-', 'US-2240868'),
(55, 'Neurobion 500', '10', '-', '-', 'US-2240869'),
(56, 'Neurofeenac plus', '10', '-', '-', 'US-2240870'),
(57, 'Plantacid forte', '10', '-', '-', 'US-2240871'),
(58, 'Pariet 20', '10', '-', '-', 'US-2240872'),
(59, 'Pirofel 20', '10', '-', '-', 'US-2240873'),
(60, 'Provital plus', '10', '-', '-', 'US-2240874'),
(61, 'Remelox 7.5', '10', '-', '-', 'US-2240875'),
(62, 'Recustein', '10', '-', '-', 'US-2240876'),
(63, 'Sanmol', '10', '-', '-', 'US-2240877'),
(64, 'Sanprima Forte', '10', '-', '-', 'US-2240878'),
(65, 'Spasmacine', '10', '-', '-', 'US-2240879'),
(66, 'Tranec', '10', '-', '-', 'US-2240880'),
(67, 'Transamin', '10', '-', '-', 'US-2240881'),
(68, 'Tylonic 300', '10', '-', '-', 'US-2240882'),
(69, 'Ulsikur', '10', '-', '-', 'US-2240883'),
(70, 'Vocefa 500', '10', '-', '-', 'US-2240884'),
(71, 'Viaclav 500', '10', '-', '-', 'US-2240885'),
(72, 'Vomistop', '10', '-', '-', 'US-2240886'),
(73, 'Zyloric 300', '10', '-', '-', 'US-2240887'),
(74, 'Zincare', '10', '-', '-', 'US-2240888'),
(75, 'Zegase', '10', '-', '-', 'US-2240889'),
(76, 'Albothyl cons', '5', '-', '-', 'US-2240890'),
(77, 'Amoxsan 125 mg DS', '10', '-', '-', 'US-2240891'),
(78, 'Apialys syrup', '10', '-', '-', 'US-2240892'),
(79, 'Benacol exp yrup', '10', '-', '-', 'US-2240893'),
(80, 'Bethadine gargle 190 ml', '10', '-', '-', 'US-2240894'),
(81, 'bethadine sol 30 ml', '10', '-', '-', 'US-2240895'),
(82, 'bethadine sol 60 ml', '8', '-', '-', 'US-2240896'),
(83, 'Caladinel lot 95 ml', '10', '-', '-', 'US-2240897'),
(84, 'Farmacrol forte susp', '10', '-', '-', 'US-2240898'),
(85, 'Flutamol plus syrup', '10', '-', '-', 'US-2240899'),
(86, 'kalmoxillin syrup', '10', '-', '-', 'US-2240900'),
(87, 'Lenopront syrup', '10', '-', '-', 'US-2240901'),
(88, 'Nifural syrup', '10', '-', '-', 'US-2240902'),
(89, 'OBH Nellco sp dewasa', '10', '-', '-', 'US-2240903'),
(90, 'OBH Nellco sp anak', '10', '-', '-', 'US-2240904'),
(91, 'primperan drop', '10', '-', '-', 'US-2240905'),
(92, 'plantacid susp', '10', '-', '-', 'US-2240906'),
(93, 'propepsa susp', '10', '-', '-', 'US-2240907'),
(94, 'Sanadryl DMP syrup', '10', '-', '-', 'US-2240908'),
(95, 'Sanadryl exp syrup', '10', '-', '-', 'US-2240909'),
(96, 'Sanmol syrup', '10', '-', '-', 'US-2240910'),
(97, 'Tempra syrup', '10', '-', '-', 'US-2240911'),
(98, 'Tempra drop', '10', '-', '-', 'US-2240912'),
(99, 'Triaminic pilek syrup', '10', '-', '-', 'US-2240913'),
(100, 'Triaminic batuk pilek syrup', '10', '-', '-', 'US-2240914'),
(101, 'Toplexil syrup 120 ml', '10', '-', '-', 'US-2240915'),
(102, 'Vocefa forte 250 mg DS', '10', '-', '-', 'US-2240916'),
(103, 'Ventolin exp syrup', '10', '-', '-', 'US-2240917'),
(104, 'Bioplacenton gel', '10', '-', '-', 'US-2240918'),
(105, 'Burnazin Zalf', '10', '-', '-', 'US-2240919'),
(106, 'Bethadine zalf 10 gr', '10', '-', '-', 'US-2240920'),
(107, 'Benoson cr', '10', '-', '-', 'US-2240921'),
(108, 'Counterpain cr 30 gr', '10', '-', '-', 'US-2240922'),
(109, 'Diprosone cr', '10', '-', '-', 'US-2240923'),
(110, 'Diprogenta cr', '10', '-', '-', 'US-2240924'),
(111, 'Fleximuv cr', '10', '-', '-', 'US-2240925'),
(112, 'Formyco cr', '10', '-', '-', 'US-2240926'),
(113, 'Ichtiol zalf', '10', '-', '-', 'US-2240927'),
(114, 'Kenalog in orabase', '10', '-', '-', 'US-2240928'),
(115, 'Thrombophob gel', '10', '-', '-', 'US-2240929'),
(116, 'Thecort cr', '10', '-', '-', 'US-2240930'),
(117, 'Virumerz gel 10 gr', '10', '-', '-', 'US-2240931'),
(118, 'Tarivid otic', '10', '-', '-', 'US-2240932'),
(119, 'Faktu supp', '10', '-', '-', 'US-2240933'),
(120, 'Haemocaine oint 15 gr', '10', '-', '-', 'US-2240934'),
(121, 'c.Eyefresh TM', '10', '-', '-', 'US-2240935'),
(122, 'c.Fenicol TM 0,5 %', '10', '-', '-', 'US-2240936'),
(123, 'C.Fenicol ZM', '10', '-', '-', 'US-2240937'),
(124, 'C. Xitrol TM', '10', '-', '-', 'US-2240938'),
(125, 'C.Xitrol Zm', '10', '-', '-', 'US-2240939'),
(126, 'Visine Tm', '10', '-', '-', 'US-2240940'),
(127, 'Dexamethasone inj', '8', '-', '-', 'US-2240941'),
(128, 'Neurabion 5000 inj', '8', '-', '-', 'US-2240942'),
(129, 'Ranitidine inj', '10', '-', '-', 'US-2240943');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_psaien` int(10) NOT NULL,
  `kodePasien` varchar(50) NOT NULL,
  `id_pegawai` varchar(150) NOT NULL,
  `foto_pasien` text NOT NULL,
  `tgl_daf` varchar(50) NOT NULL,
  `jam_daf` varchar(50) NOT NULL,
  `kodeuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_psaien`, `kodePasien`, `id_pegawai`, `foto_pasien`, `tgl_daf`, `jam_daf`, `kodeuser`) VALUES
(12, 'WNO-9525', '2', 'elliot.jpg', '2016-06-26', '08:55:07', ''),
(13, 'OKN-6488', '1', 'steve.jpg', '2016-06-26', '08:55:33', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `kj` varchar(100) NOT NULL,
  `nama_pegawai` varchar(300) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `status_kel` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `kj`, `nama_pegawai`, `unit`, `jk`, `alamat`, `status_kel`, `tgl_lhr`) VALUES
(1, '151112394', '4', 'Kestio Pambudi', 'Manajer Direktur', 'P', 'Medan', 'Suami', '1997-10-10'),
(2, '121313122', '8', 'Gunawan Rifaldi Lubis', 'Sekretaris', 'P', 'Jl. Letda Sujono', 'Suami', '1980-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_kel`
--

CREATE TABLE `pegawai_kel` (
  `id_kpeg` int(5) NOT NULL,
  `nip_pegawai` int(20) NOT NULL,
  `nama_kpeg` varchar(150) NOT NULL,
  `jk_kpeg` varchar(150) NOT NULL,
  `tgllahir_kpeg` date NOT NULL,
  `alamat_kpeg` text NOT NULL,
  `status_kpeg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai_kel`
--

INSERT INTO `pegawai_kel` (`id_kpeg`, `nip_pegawai`, `nama_kpeg`, `jk_kpeg`, `tgllahir_kpeg`, `alamat_kpeg`, `status_kpeg`) VALUES
(1, 121313122, 'Anggun Septia', 'W', '1980-12-12', 'Medan', 'Istri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(5) NOT NULL,
  `nama_penyakit` varchar(15) NOT NULL,
  `kode_pen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `kode_pen`) VALUES
(1, 'Apendiksitis', '186'),
(2, 'Asma', '176'),
(3, 'Anemia', '68'),
(4, 'Diabetes Melitu', '104'),
(5, 'Diare & Gastroe', '005'),
(6, 'Gangguan Ginjal', '214'),
(7, 'Gangguan Mata', '131'),
(8, 'Gasteritis & Du', '184'),
(9, 'Gigi & Mulut', '180'),
(10, 'Ginekologi', '230'),
(11, 'Hati lainnya', '38'),
(12, 'Hemia', '188'),
(13, 'Hemoroid', '163'),
(14, 'Hiperlipidemia', '158'),
(15, 'Hipertensi', '146'),
(16, 'ISPA', '168'),
(17, 'Jantung', '152'),
(18, 'Karsinoma', '96.2'),
(19, 'Kecelakaan', '300'),
(20, 'Kehamilan Norma', '293'),
(21, 'Kontrasepsi', '293'),
(22, 'Kulit', '199'),
(23, 'Migren & Sindro', '125'),
(24, 'Neurologi', '129'),
(25, 'Osteoarteritis', '201'),
(26, 'Psikosis', '15.9'),
(27, 'Sinusitis', '171'),
(28, 'Sist Kemih Lain', '217'),
(29, 'Sist muskuloske', '210'),
(30, 'Telinga', '142'),
(31, 'Thyroid', '103'),
(32, 'Tuberculosis', '008'),
(33, 'Hiperpuricemia', '-'),
(34, 'Tumor', '96.6'),
(35, 'Paru', '-'),
(36, 'Imsomnia', '-'),
(37, 'Demam', '34'),
(38, 'Hipotensi', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poliklinik` int(5) NOT NULL,
  `nama_poliklinik` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `racik_obat`
--

CREATE TABLE `racik_obat` (
  `id_racik` int(5) NOT NULL,
  `kode_resep` varchar(20) NOT NULL,
  `nama_obat` text NOT NULL,
  `racik` text NOT NULL,
  `aturan_pakai` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `pengambil_obat` varchar(30) NOT NULL,
  `petugas_apotek` varchar(30) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `kodepasien` varchar(10) NOT NULL,
  `tgl_racik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `racik_obat`
--

INSERT INTO `racik_obat` (`id_racik`, `kode_resep`, `nama_obat`, `racik`, `aturan_pakai`, `harga`, `pengambil_obat`, `petugas_apotek`, `id_dokter`, `kodepasien`, `tgl_racik`) VALUES
(7, 'WNO-9525-001', 'Salap', '2kos, 3nan, 4btr', '2x1', '500.000', 'Gunawan Rifaldi Lubis', 'Martinus', 'DK-452915317', 'WNO-9525', '2016-06-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedik`
--

CREATE TABLE `rekammedik` (
  `id_rm` int(5) NOT NULL,
  `nomorRm` varchar(50) NOT NULL,
  `kodepasien` varchar(50) NOT NULL,
  `kodedokter` varchar(50) NOT NULL,
  `keluhan` varchar(150) NOT NULL,
  `diagnosa` varchar(150) NOT NULL,
  `tindakan` varchar(50) NOT NULL,
  `id_rs` int(5) NOT NULL,
  `spesialis` int(5) NOT NULL,
  `id_penyakit` int(5) NOT NULL,
  `jam` varchar(150) NOT NULL,
  `tgl` varchar(150) NOT NULL,
  `kodeuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekammedik`
--

INSERT INTO `rekammedik` (`id_rm`, `nomorRm`, `kodepasien`, `kodedokter`, `keluhan`, `diagnosa`, `tindakan`, `id_rs`, `spesialis`, `id_penyakit`, `jam`, `tgl`, `kodeuser`) VALUES
(22, 'RM-2606161', 'WNO-9525', 'DK-342715841', 'Sakit Perut', 'diare', '5', 0, 14, 18, '09:03:03', '2016-06-26', 'US-0908164');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs`
--

CREATE TABLE `rs` (
  `id_rs` int(5) NOT NULL,
  `nama_rs` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggungan`
--

CREATE TABLE `tanggungan` (
  `id_tanggungan` int(5) NOT NULL,
  `kodeTanggungan` varchar(30) NOT NULL,
  `id_kpeg` int(5) NOT NULL,
  `foto_tanggungan` text NOT NULL,
  `tgl_daft` varchar(50) NOT NULL,
  `jam_daft` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggungan`
--

INSERT INTO `tanggungan` (`id_tanggungan`, `kodeTanggungan`, `id_kpeg`, `foto_tanggungan`, `tgl_daft`, `jam_daft`) VALUES
(5, 'IGB-6386', 1, 'kristy.png', '2016/06/26', '08:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `nm_tindakan` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  `lap` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nm_tindakan`, `ket`, `lap`) VALUES
(5, 'Konsultasi Dokter Spesialis', '-', 0),
(6, 'Pemeriksaan Laboratorium', '-', 1),
(7, 'Pemeriksaan Radiologi', '-', 1),
(8, 'Fisioterapi', '-', 1),
(9, 'Rawat Inap', '', 0),
(11, 'Haemodialisa', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_obat`
--

CREATE TABLE `tmp_obat` (
  `id_temp` int(5) NOT NULL,
  `kdrm` varchar(150) NOT NULL,
  `kdobat` varchar(150) NOT NULL,
  `ambil` varchar(150) NOT NULL,
  `jam_ambil` varchar(150) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `kduser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_obat`
--

INSERT INTO `tmp_obat` (`id_temp`, `kdrm`, `kdobat`, `ambil`, `jam_ambil`, `tgl_ambil`, `kduser`) VALUES
(20, 'RM-2606161', '6', '2', '09:03:39', '2016-06-26', 'US-0908164'),
(21, 'RM-2606161', '2', '3', '09:03:44', '2016-06-26', 'US-0908164');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_man`
--

CREATE TABLE `user_man` (
  `id_user` int(5) NOT NULL,
  `kodeUser` varchar(10) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(150) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_man`
--

INSERT INTO `user_man` (`id_user`, `kodeUser`, `last_name`, `first_name`, `jk`, `alamat`, `no_hp`, `tgl_lahir`, `username`, `password`, `photo`, `akses`) VALUES
(11, 'US-0908164', '-', 'Nailul Firdaus', 'L', 'Ciledug, Tangerang, Banten', '081288070110', '1998-01-28', 'admin', 'admin', 'Me.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jadwal_dok`
--
ALTER TABLE `jadwal_dok`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `konsul_spesial`
--
ALTER TABLE `konsul_spesial`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_psaien`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pegawai_kel`
--
ALTER TABLE `pegawai_kel`
  ADD PRIMARY KEY (`id_kpeg`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indeks untuk tabel `racik_obat`
--
ALTER TABLE `racik_obat`
  ADD PRIMARY KEY (`id_racik`);

--
-- Indeks untuk tabel `rekammedik`
--
ALTER TABLE `rekammedik`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indeks untuk tabel `rs`
--
ALTER TABLE `rs`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indeks untuk tabel `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indeks untuk tabel `tmp_obat`
--
ALTER TABLE `tmp_obat`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indeks untuk tabel `user_man`
--
ALTER TABLE `user_man`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dok`
--
ALTER TABLE `jadwal_dok`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konsul_spesial`
--
ALTER TABLE `konsul_spesial`
  MODIFY `id_spesialis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_psaien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai_kel`
--
ALTER TABLE `pegawai_kel`
  MODIFY `id_kpeg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_poliklinik` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `racik_obat`
--
ALTER TABLE `racik_obat`
  MODIFY `id_racik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rekammedik`
--
ALTER TABLE `rekammedik`
  MODIFY `id_rm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `rs`
--
ALTER TABLE `rs`
  MODIFY `id_rs` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanggungan`
--
ALTER TABLE `tanggungan`
  MODIFY `id_tanggungan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tmp_obat`
--
ALTER TABLE `tmp_obat`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_man`
--
ALTER TABLE `user_man`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
