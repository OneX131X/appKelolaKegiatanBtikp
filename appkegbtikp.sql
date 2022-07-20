-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 06:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkegbtikp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_karyawan`
--

CREATE TABLE `bagian_karyawan` (
  `id` int(11) NOT NULL,
  `bagian_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian_karyawan`
--

INSERT INTO `bagian_karyawan` (`id`, `bagian_id`, `karyawan_id`, `tanggal_mulai`) VALUES
(1, 1, 5, '2018-03-03'),
(2, 2, 3, '2018-04-01'),
(3, 3, 6, '2018-04-04'),
(4, 1, 4, '2018-03-03'),
(5, 2, 7, '2018-04-01'),
(6, 3, 8, '2018-04-04'),
(8, 1, 1, '2022-01-18'),
(9, 2, 1, '2022-01-01'),
(10, 3, 11, '2022-01-01'),
(11, 5, 11, '2022-01-01'),
(12, 3, 13, '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kegiatan`
--

CREATE TABLE `detail_kegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(255) NOT NULL,
  `hari_satu` varchar(500) NOT NULL,
  `hari_dua` varchar(500) NOT NULL,
  `hari_tiga` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kegiatan`
--

INSERT INTO `detail_kegiatan` (`id`, `id_kegiatan`, `hari_satu`, `hari_dua`, `hari_tiga`) VALUES
(2, 6, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(6, 9, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(7, 2, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(8, 8, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id` int(11) NOT NULL,
  `nama_fasilitas_kmr` varchar(255) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id`, `nama_fasilitas_kmr`, `jumlah`, `kondisi`, `keterangan`) VALUES
(1, 'Ranjang', '40', 'baik', ''),
(2, 'AC', '20', 'baik', ''),
(3, 'TV', '20', 'baik', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_karyawan`
--

CREATE TABLE `jabatan_karyawan` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan_karyawan`
--

INSERT INTO `jabatan_karyawan` (`id`, `karyawan_id`, `jabatan_id`, `tanggal_mulai`) VALUES
(1, 3, 5, '2013-03-03'),
(2, 3, 4, '2014-04-01'),
(3, 4, 5, '2014-04-04'),
(4, 3, 3, '2015-05-05'),
(5, 4, 4, '2015-05-06'),
(6, 5, 5, '2015-05-05'),
(7, 3, 2, '2015-06-01'),
(8, 4, 3, '2015-06-02'),
(9, 5, 4, '2015-06-03'),
(11, 3, 1, '2017-07-01'),
(12, 4, 2, '2017-07-02'),
(13, 5, 3, '2017-07-02'),
(14, 6, 4, '2017-07-02'),
(15, 7, 5, '2017-07-07'),
(16, 7, 4, '2018-08-02'),
(17, 8, 5, '2018-08-08'),
(18, 2, 1, '2022-01-18'),
(20, 1, 1, '2021-12-27'),
(21, 1, 2, '2022-01-01'),
(22, 11, 4, '2022-01-01'),
(23, 13, 4, '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `no_kamar` varchar(2) NOT NULL,
  `kuantitas` int(1) NOT NULL,
  `jenisKamar` enum('L','P') NOT NULL,
  `letakLantai` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `no_kamar`, `kuantitas`, `jenisKamar`, `letakLantai`) VALUES
(1, '01', 2, 'P', '1'),
(2, '02', 2, 'P', '1'),
(3, '11', 2, 'L', '2'),
(4, '12', 2, 'L', '2'),
(6, '13', 2, 'L', '2'),
(7, '03', 2, 'P', '1'),
(8, '04', 2, 'P', '1'),
(9, '05', 2, 'P', '1'),
(10, '06', 2, 'P', '1'),
(11, '07', 2, 'P', '1'),
(12, '08', 2, 'P', '1'),
(13, '09', 2, 'P', '1'),
(14, '10', 2, 'P', '1'),
(15, '14', 2, 'L', '2'),
(16, '15', 2, 'L', '2'),
(17, '16', 2, 'L', '2'),
(18, '17', 2, 'L', '2'),
(19, '18', 2, 'L', '2'),
(20, '19', 2, 'L', '2'),
(21, '20', 2, 'L', '2'),
(22, '21', 3, 'P', '2'),
(23, '22', 3, 'L', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglSelesai` date NOT NULL,
  `jumlahSesi` int(1) NOT NULL,
  `quota` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tglMulai`, `tglSelesai`, `jumlahSesi`, `quota`) VALUES
(2, 'Bimtek Peningkatan Kompetensi Guru dan Pembuatan Video Animasi Pembelajaran', '2022-06-04', '2022-06-06', 4, '40'),
(6, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMA Angkatan 1', '2022-05-29', '2022-05-31', 4, '40'),
(8, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMK Angkatan 1', '2022-06-01', '2022-06-03', 4, '40'),
(9, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMA Angkatan 2', '2022-06-10', '2022-06-12', 4, '40'),
(10, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMK Angkatan 2', '2022-06-07', '2022-06-09', 4, '40'),
(11, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMP Angkatan 1', '2022-06-13', '2022-06-15', 4, '40'),
(12, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMP Angkatan 2', '2022-06-16', '2022-06-18', 4, '40');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_diikuti`
--

CREATE TABLE `kegiatan_diikuti` (
  `id` int(11) NOT NULL,
  `id_kegiatan` varchar(255) NOT NULL,
  `jumlah_peserta` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_diikuti`
--

INSERT INTO `kegiatan_diikuti` (`id`, `id_kegiatan`, `jumlah_peserta`) VALUES
(9, '6', '39'),
(10, '9', '70');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jK` enum('L','P') NOT NULL,
  `NoTelp` varchar(13) NOT NULL,
  `waktuTugas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `nik`, `jK`, `NoTelp`, `waktuTugas`) VALUES
(14, 'Arie Mursandi', '7762763412631827', 'P', '0816471263412', '2022-06-07'),
(15, 'Khairina Aidhafullsy Zulmi, S.Kom', '7766266627345162', 'L', '0895443536525', '2022-06-01'),
(16, 'Firdaus Dwi Cahyo', '7576776216316237', 'L', '0813214234621', '2022-06-01'),
(17, 'Vina Pebriyanti, S.Psi', '7771261634123441', 'P', '0895546356154', '2022-06-04'),
(18, 'Juli Anshori, M.Kom', '7713126351672318', 'L', '0813312351263', '2022-06-04'),
(19, 'Muhammad Rizky Adha, A.Md.', '7717272418726421', 'L', '0895566376418', '2022-06-07'),
(20, 'Dra. Nurhuda Yetti, M.Pd.', '7778146264123123', 'P', '0813247867251', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` char(2) DEFAULT NULL,
  `gapok` double DEFAULT NULL,
  `tunjangan` double DEFAULT NULL,
  `uang_makan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `karyawan_id`, `tahun`, `bulan`, `gapok`, `tunjangan`, `uang_makan`) VALUES
(1, 3, 2020, '11', 2400000, 500000, 800000),
(2, 4, 2020, '11', 2300000, 450000, 684000),
(3, 5, 2020, '11', 2200000, 400000, 684000),
(4, 6, 2020, '11', 2100000, 350000, 640000),
(5, 7, 2020, '11', 2100000, 350000, 612000),
(6, 8, 2020, '11', 1000000, 100000, 380000),
(7, 3, 2020, '12', 2400000, 500000, 1200000),
(8, 4, 2020, '12', 2300000, 450000, 722000),
(9, 5, 2020, '12', 2200000, 400000, 720000),
(10, 6, 2020, '12', 2100000, 350000, 680000),
(11, 7, 2020, '12', 2100000, 350000, 646000),
(12, 8, 2020, '12', 1000000, 100000, 360000),
(13, 3, 2021, '01', 2400000, 500000, 800000),
(14, 4, 2021, '01', 2300000, 450000, 722000),
(15, 5, 2021, '01', 2200000, 400000, 612000),
(16, 6, 2021, '01', 2100000, 350000, 680000),
(17, 7, 2021, '01', 2100000, 350000, 646000),
(18, 8, 2021, '01', 1000000, 100000, 340000),
(21, 3, 2022, '01', 2300000, 450000, 1140000),
(22, 4, 2020, '08', 2300000, 450000, 1140000),
(23, 11, 2022, '01', 2100000, 350000, 0),
(24, 13, 2022, '02', 2100000, 350000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('ADMIN','USER','PEMATERI','') DEFAULT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `peran`, `login_terakhir`) VALUES
(1, 'admin', '$2y$10$baqQ4zTS37tzcjXzcU9GjO5.a.IIvc1OX1.kwHleKXxjVo9dZXDK2', 'ADMIN', '2022-07-17 07:32:54'),
(9, 'peserta', '$2y$10$An2JCJV6jUieWp2kbvzAfuTX7w5hG4vnTvb8GSELzuJ4ebAp6sV42', 'USER', '2022-07-16 06:43:52'),
(12, 'narasumber', '$2y$10$eaaWNdBBFpZBhSESRlFTZeJ1N0xhq0JODCisUBpnrsXjpzARQ3jSe', 'PEMATERI', '2022-07-14 12:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_kegiatan` varchar(255) NOT NULL,
  `jenisKelamin` enum('L','P') NOT NULL,
  `tglLahir` date NOT NULL,
  `asalSekolah` varchar(100) NOT NULL,
  `pendTerakhir` varchar(100) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama_peserta`, `nik`, `id_kegiatan`, `jenisKelamin`, `tglLahir`, `asalSekolah`, `pendTerakhir`, `noTelp`, `email`) VALUES
(8, 'Gatot, S.Pd.', '7711246646366677', '6', 'L', '1986-09-21', 'SMAN 1 Angkinang Hulu Sungai Selatan', 'S1 Pendidikan Unlam', '0899765665322', 'gatot112@gmail.com'),
(9, 'Hadiani Nur, S.Pd.', '7711232586534654', '9', 'P', '1997-07-01', 'SMAN 1 Gambut PJJ Banjar', 'S1 Pendidikan Uniska', '0813125432654', 'hadiani301@gmail.com'),
(10, 'Dina Meilina Siahaan, S.Pd.', '6474011301001223', '6', 'P', '1996-03-01', 'SMAN 2 Paringin Balangan', 'S1 Pendidikan Unlam', '0813336557126', 'dinamelinas@gmail.com'),
(11, 'Niko Rahmad Apriliyanto, S.Pd.', '6474011301001324', '9', 'L', '1988-12-08', 'SMA GIBS Barito Kuala', 'S1 Pendidikan Uniska', '0895421431231', 'nikorahmad@gmail.com'),
(12, 'Raihani, S.Pd.', '7722727746127413', '9', 'P', '1995-10-25', 'SMAN 2 Paringin Balangan', 'S1 Pendidikan Unlam', '0813241264615', 'raihani111@gmail.com'),
(18, 'Amatunnur, S.Pd', '7716672467162317', '6', 'P', '1993-08-12', 'SMA 2 Banjarbaru', 'S1 Pendidikan Unlam', '0895559374178', 'annur22@gmail.com'),
(19, 'Khuon, S.Kom.', '7717127371263813', '8', 'L', '1989-07-12', 'SMK 1 Banjarbaru', 'S1 Komputer Stimik', '0813124361823', 'khn21@gmail.com'),
(20, 'Zainia Putri, M.Kom', '7726263716837121', '8', 'P', '1996-07-24', 'SMK 1 Banjarmasin', 'S1 Komputer Unlam', '0813222741872', 'zain001@gmail.com'),
(21, 'Fitriani, S. Pd.', '7771273127318231', '6', 'P', '1992-06-27', 'SMAN 1 Batu Ampar', 'S1 Pendidikan Unlam', '0813131231274', 'fitri11@gmail.com'),
(22, 'Muhammad Adi, S.Pd', '7718282371728318', '8', 'L', '1996-06-07', 'SMK 1 Banjarmasin', 'S1 Komputer Stimik', '0895552127382', 'adi77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_aktifitas`
--

CREATE TABLE `peserta_aktifitas` (
  `id` int(11) NOT NULL,
  `id_peserta` varchar(255) NOT NULL,
  `id_kegiatan` varchar(255) NOT NULL,
  `absen1` enum('hadir','tidak hadir','') NOT NULL,
  `absen2` enum('hadir','tidak hadir','') NOT NULL,
  `absen3` enum('hadir','tidak hadir','') NOT NULL,
  `penilaian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_aktifitas`
--

INSERT INTO `peserta_aktifitas` (`id`, `id_peserta`, `id_kegiatan`, `absen1`, `absen2`, `absen3`, `penilaian`) VALUES
(1, '8', '6', 'hadir', 'hadir', 'hadir', 'baik'),
(2, '9', '9', 'hadir', 'hadir', 'hadir', ''),
(3, '10', '6', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(5, '11', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(6, '12', '9', 'hadir', 'hadir', 'hadir', ''),
(8, '15', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(9, '16', '2', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(10, '18', '6', 'hadir', 'hadir', 'hadir', 'sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_daftar`
--

CREATE TABLE `peserta_daftar` (
  `id` int(11) NOT NULL,
  `id_peserta` varchar(100) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `jenjang` enum('SD/MI','SMP/MTS','SMA/MA','SMK') NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `agama` enum('islam','katolik','protestan','hindu','budha','khonghuchu') NOT NULL,
  `kabKota` enum('bjm','bjb','banjar','tapin','hss','hst','hsu','balangan','tabalong','barito kuala','tanah laut','tanah bumbu','kotabaru') NOT NULL,
  `unitKerja` varchar(100) NOT NULL,
  `alamatSekolah` varchar(255) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `suratSK` varchar(255) NOT NULL,
  `status_` enum('','diterima','ditolak') NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_daftar`
--

INSERT INTO `peserta_daftar` (`id`, `id_peserta`, `id_kegiatan`, `jenjang`, `jabatan`, `golongan`, `agama`, `kabKota`, `unitKerja`, `alamatSekolah`, `hp`, `suratSK`, `status_`, `keterangan`) VALUES
(5, '8', '6', 'SMA/MA', 'guru', 'I', 'islam', 'hss', 'SMAN 1 Angkinang Hulu Sungai Selatan', 'hss', '0813124681726', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(6, '10', '6', 'SMA/MA', 'guru', 'I', 'islam', 'banjar', 'SMAN 1 Gambut PJJ Banjar', 'gambut', '0813547126847', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(7, '9', '9', 'SMA/MA', 'guru', 'I', 'islam', 'balangan', 'SMAN 2 Paringin Balangan', 'jl balangan', '0895552613716', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(9, '11', '9', 'SMA/MA', 'guru', 'I', 'islam', 'barito kuala', 'SMA GIBS Barito Kuala', 'barito kuala', '0895552153612', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(10, '12', '9', 'SMA/MA', 'guru', 'I', 'islam', 'balangan', 'SMAN 2 Paringin Balangan', 'jl balangan', '0813124681726', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(14, '18', '6', 'SMA/MA', 'guru', 'I', 'islam', 'bjb', '', 'Jl. Gunung Sari', '0895127361872', 'surat sk.jpg', 'diterima', 'syarat lengkap'),
(16, '15', '9', 'SMA/MA', 'guru', 'I', 'islam', 'tanah laut', '', 'batu ampar', '', 'surat sk.jpg', 'diterima', ''),
(17, '16', '9', 'SMA/MA', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman', '', 'surat sk.jpg', 'diterima', ''),
(18, '19', '8', 'SMK', 'guru', 'I', 'budha', 'bjb', '', 'Jl. A. Yani', '', 'surat sk.jpg', 'diterima', ''),
(19, '20', '8', 'SMK', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman', '', 'surat sk.jpg', 'diterima', ''),
(20, '21', '6', 'SMA/MA', 'guru', 'I', 'islam', 'tanah laut', '', 'batu ampar', '', 'surat sk.jpg', 'diterima', ''),
(21, '22', '8', 'SMK', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman', '', 'surat sk.jpg', 'diterima', '');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keterangan` enum('HADIR','SAKIT','IZIN','CUTI','AKHIR PEKAN','LIBUR NASIONAL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `karyawan_id`, `tanggal`, `jam_masuk`, `jam_keluar`, `keterangan`) VALUES
(1, 3, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(2, 3, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(3, 3, '2020-11-03', '08:00:00', '16:00:00', 'HADIR'),
(4, 3, '2020-11-04', '08:00:00', '16:00:00', 'HADIR'),
(5, 3, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(6, 3, '2020-11-06', '08:00:00', '16:00:00', 'HADIR'),
(7, 3, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(8, 3, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(9, 3, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(10, 3, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(11, 3, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(12, 3, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(13, 3, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(14, 3, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(15, 3, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(16, 3, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(17, 3, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(18, 3, '2020-11-18', '08:00:00', '16:00:00', 'HADIR'),
(19, 3, '2020-11-19', '08:00:00', '16:00:00', 'HADIR'),
(20, 3, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(21, 3, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(22, 3, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(23, 3, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(24, 3, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(25, 3, '2020-11-25', '08:00:00', '16:00:00', 'HADIR'),
(26, 3, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(27, 3, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(28, 3, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(29, 3, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(30, 3, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(31, 3, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(32, 3, '2020-12-02', '08:00:00', '16:00:00', 'HADIR'),
(33, 3, '2020-12-03', '08:00:00', '16:00:00', 'HADIR'),
(34, 3, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(35, 3, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(36, 3, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(37, 3, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(38, 3, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(39, 3, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(40, 3, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(41, 3, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(42, 3, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(43, 3, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(44, 3, '2020-12-14', '08:00:00', '16:00:00', 'HADIR'),
(45, 3, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(46, 3, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(47, 3, '2020-12-17', '08:00:00', '16:00:00', 'HADIR'),
(48, 3, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(49, 3, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(50, 3, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(51, 3, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(52, 3, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(53, 3, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(54, 3, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(55, 3, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(56, 3, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(57, 3, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(58, 3, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(59, 3, '2020-12-29', '08:00:00', '16:00:00', 'HADIR'),
(60, 3, '2020-12-30', '08:00:00', '16:00:00', 'HADIR'),
(61, 3, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(62, 3, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(63, 3, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(64, 3, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(65, 3, '2021-01-04', '08:00:00', '16:00:00', 'HADIR'),
(66, 3, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(67, 3, '2021-01-06', '08:00:00', '16:00:00', 'HADIR'),
(68, 3, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(69, 3, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(70, 3, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(71, 3, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(72, 3, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(73, 3, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(74, 3, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(75, 3, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(76, 3, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(77, 3, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(78, 3, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(79, 3, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(80, 3, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(81, 3, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(82, 3, '2021-01-21', '08:00:00', '16:00:00', 'HADIR'),
(83, 3, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(84, 3, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(85, 3, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(86, 3, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(87, 3, '2021-01-26', '08:00:00', '16:00:00', 'HADIR'),
(88, 3, '2021-01-27', '08:00:00', '16:00:00', 'HADIR'),
(89, 3, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(90, 3, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(91, 3, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(92, 3, '2021-01-31', NULL, NULL, 'AKHIR PEKAN'),
(93, 4, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(94, 4, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(95, 4, '2020-11-03', '08:35:00', '16:00:00', 'HADIR'),
(96, 4, '2020-11-04', NULL, NULL, 'SAKIT'),
(97, 4, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(98, 4, '2020-11-06', '08:00:00', '16:00:00', 'HADIR'),
(99, 4, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(100, 4, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(101, 4, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(102, 4, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(103, 4, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(104, 4, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(105, 4, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(106, 4, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(107, 4, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(108, 4, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(109, 4, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(110, 4, '2020-11-18', '08:45:00', '16:00:00', 'HADIR'),
(111, 4, '2020-11-19', NULL, NULL, 'IZIN'),
(112, 4, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(113, 4, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(114, 4, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(115, 4, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(116, 4, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(117, 4, '2020-11-25', '08:00:00', '16:00:00', 'HADIR'),
(118, 4, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(119, 4, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(120, 4, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(121, 4, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(122, 4, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(123, 4, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(124, 4, '2020-12-02', '08:00:00', '16:00:00', 'HADIR'),
(125, 4, '2020-12-03', '08:00:00', '16:00:00', 'HADIR'),
(126, 4, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(127, 4, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(128, 4, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(129, 4, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(130, 4, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(131, 4, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(132, 4, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(133, 4, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(134, 4, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(135, 4, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(136, 4, '2020-12-14', '08:00:00', '16:00:00', 'HADIR'),
(137, 4, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(138, 4, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(139, 4, '2020-12-17', NULL, NULL, 'SAKIT'),
(140, 4, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(141, 4, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(142, 4, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(143, 4, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(144, 4, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(145, 4, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(146, 4, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(147, 4, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(148, 4, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(149, 4, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(150, 4, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(151, 4, '2020-12-29', '08:50:00', '16:00:00', 'HADIR'),
(152, 4, '2020-12-30', '08:00:00', '16:00:00', 'HADIR'),
(153, 4, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(154, 4, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(155, 4, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(156, 4, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(157, 4, '2021-01-04', '08:00:00', '16:00:00', 'HADIR'),
(158, 4, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(159, 4, '2021-01-06', '08:00:00', '16:00:00', 'HADIR'),
(160, 4, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(161, 4, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(162, 4, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(163, 4, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(164, 4, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(165, 4, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(166, 4, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(167, 4, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(168, 4, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(169, 4, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(170, 4, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(171, 4, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(172, 4, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(173, 4, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(174, 4, '2021-01-21', NULL, NULL, 'IZIN'),
(175, 4, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(176, 4, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(177, 4, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(178, 4, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(179, 4, '2021-01-26', '08:00:00', '16:00:00', 'HADIR'),
(180, 4, '2021-01-27', '08:40:00', '16:00:00', 'HADIR'),
(181, 4, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(182, 4, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(183, 4, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(184, 4, '2021-01-31', NULL, NULL, 'AKHIR PEKAN'),
(185, 5, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(186, 5, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(187, 5, '2020-11-03', '08:00:00', '16:00:00', 'HADIR'),
(188, 5, '2020-11-04', '08:00:00', '16:00:00', 'HADIR'),
(189, 5, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(190, 5, '2020-11-06', '08:35:00', '16:00:00', 'HADIR'),
(191, 5, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(192, 5, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(193, 5, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(194, 5, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(195, 5, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(196, 5, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(197, 5, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(198, 5, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(199, 5, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(200, 5, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(201, 5, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(202, 5, '2020-11-18', '08:35:00', '16:00:00', 'HADIR'),
(203, 5, '2020-11-19', '08:00:00', '16:00:00', 'HADIR'),
(204, 5, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(205, 5, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(206, 5, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(207, 5, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(208, 5, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(209, 5, '2020-11-25', NULL, NULL, 'SAKIT'),
(210, 5, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(211, 5, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(212, 5, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(213, 5, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(214, 5, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(215, 5, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(216, 5, '2020-12-02', '08:00:00', '16:00:00', 'HADIR'),
(217, 5, '2020-12-03', '08:00:00', '16:00:00', 'HADIR'),
(218, 5, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(219, 5, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(220, 5, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(221, 5, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(222, 5, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(223, 5, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(224, 5, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(225, 5, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(226, 5, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(227, 5, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(228, 5, '2020-12-14', '08:00:00', '16:00:00', 'HADIR'),
(229, 5, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(230, 5, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(231, 5, '2020-12-17', '08:00:00', '16:00:00', 'HADIR'),
(232, 5, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(233, 5, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(234, 5, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(235, 5, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(236, 5, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(237, 5, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(238, 5, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(239, 5, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(240, 5, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(241, 5, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(242, 5, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(243, 5, '2020-12-29', '08:00:00', '16:00:00', 'HADIR'),
(244, 5, '2020-12-30', '08:00:00', '16:00:00', 'HADIR'),
(245, 5, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(246, 5, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(247, 5, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(248, 5, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(249, 5, '2021-01-04', '08:00:00', '16:00:00', 'HADIR'),
(250, 5, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(251, 5, '2021-01-06', NULL, NULL, 'IZIN'),
(252, 5, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(253, 5, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(254, 5, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(255, 5, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(256, 5, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(257, 5, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(258, 5, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(259, 5, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(260, 5, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(261, 5, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(262, 5, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(263, 5, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(264, 5, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(265, 5, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(266, 5, '2021-01-21', '08:00:00', '16:00:00', 'HADIR'),
(267, 5, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(268, 5, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(269, 5, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(270, 5, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(271, 5, '2021-01-26', NULL, NULL, 'SAKIT'),
(272, 5, '2021-01-27', NULL, NULL, 'SAKIT'),
(273, 5, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(274, 5, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(275, 5, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(276, 5, '2021-01-31', NULL, NULL, 'AKHIR PEKAN'),
(277, 6, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(278, 6, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(279, 6, '2020-11-03', '08:00:00', '16:00:00', 'HADIR'),
(280, 6, '2020-11-04', '08:00:00', '16:00:00', 'HADIR'),
(281, 6, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(282, 6, '2020-11-06', '08:00:00', '16:00:00', 'HADIR'),
(283, 6, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(284, 6, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(285, 6, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(286, 6, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(287, 6, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(288, 6, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(289, 6, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(290, 6, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(291, 6, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(292, 6, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(293, 6, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(294, 6, '2020-11-18', '08:00:00', '16:00:00', 'HADIR'),
(295, 6, '2020-11-19', '08:00:00', '16:00:00', 'HADIR'),
(296, 6, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(297, 6, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(298, 6, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(299, 6, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(300, 6, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(301, 6, '2020-11-25', '08:00:00', '16:00:00', 'HADIR'),
(302, 6, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(303, 6, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(304, 6, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(305, 6, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(306, 6, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(307, 6, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(308, 6, '2020-12-02', '08:00:00', '16:00:00', 'HADIR'),
(309, 6, '2020-12-03', '08:00:00', '16:00:00', 'HADIR'),
(310, 6, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(311, 6, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(312, 6, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(313, 6, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(314, 6, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(315, 6, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(316, 6, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(317, 6, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(318, 6, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(319, 6, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(320, 6, '2020-12-14', '08:00:00', '16:00:00', 'HADIR'),
(321, 6, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(322, 6, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(323, 6, '2020-12-17', '08:00:00', '16:00:00', 'HADIR'),
(324, 6, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(325, 6, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(326, 6, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(327, 6, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(328, 6, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(329, 6, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(330, 6, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(331, 6, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(332, 6, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(333, 6, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(334, 6, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(335, 6, '2020-12-29', '08:00:00', '16:00:00', 'HADIR'),
(336, 6, '2020-12-30', '08:00:00', '16:00:00', 'HADIR'),
(337, 6, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(338, 6, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(339, 6, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(340, 6, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(341, 6, '2021-01-04', '08:00:00', '16:00:00', 'HADIR'),
(342, 6, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(343, 6, '2021-01-06', '08:00:00', '16:00:00', 'HADIR'),
(344, 6, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(345, 6, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(346, 6, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(347, 6, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(348, 6, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(349, 6, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(350, 6, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(351, 6, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(352, 6, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(353, 6, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(354, 6, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(355, 6, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(356, 6, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(357, 6, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(358, 6, '2021-01-21', '08:00:00', '16:00:00', 'HADIR'),
(359, 6, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(360, 6, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(361, 6, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(362, 6, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(363, 6, '2021-01-26', '08:00:00', '16:00:00', 'HADIR'),
(364, 6, '2021-01-27', '08:00:00', '16:00:00', 'HADIR'),
(365, 6, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(366, 6, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(367, 6, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(368, 6, '2021-01-31', NULL, NULL, 'AKHIR PEKAN'),
(369, 7, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(370, 7, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(371, 7, '2020-11-03', '08:35:00', '16:00:00', 'HADIR'),
(372, 7, '2020-11-04', NULL, NULL, 'SAKIT'),
(373, 7, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(374, 7, '2020-11-06', '08:00:00', '16:00:00', 'HADIR'),
(375, 7, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(376, 7, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(377, 7, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(378, 7, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(379, 7, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(380, 7, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(381, 7, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(382, 7, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(383, 7, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(384, 7, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(385, 7, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(386, 7, '2020-11-18', '08:45:00', '16:00:00', 'HADIR'),
(387, 7, '2020-11-19', NULL, NULL, 'IZIN'),
(388, 7, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(389, 7, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(390, 7, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(391, 7, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(392, 7, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(393, 7, '2020-11-25', '08:00:00', '16:00:00', 'HADIR'),
(394, 7, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(395, 7, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(396, 7, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(397, 7, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(398, 7, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(399, 7, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(400, 7, '2020-12-02', '08:00:00', '16:00:00', 'HADIR'),
(401, 7, '2020-12-03', '08:00:00', '16:00:00', 'HADIR'),
(402, 7, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(403, 7, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(404, 7, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(405, 7, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(406, 7, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(407, 7, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(408, 7, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(409, 7, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(410, 7, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(411, 7, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(412, 7, '2020-12-14', '08:00:00', '16:00:00', 'HADIR'),
(413, 7, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(414, 7, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(415, 7, '2020-12-17', NULL, NULL, 'SAKIT'),
(416, 7, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(417, 7, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(418, 7, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(419, 7, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(420, 7, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(421, 7, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(422, 7, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(423, 7, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(424, 7, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(425, 7, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(426, 7, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(427, 7, '2020-12-29', '08:50:00', '16:00:00', 'HADIR'),
(428, 7, '2020-12-30', '08:00:00', '16:00:00', 'HADIR'),
(429, 7, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(430, 7, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(431, 7, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(432, 7, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(433, 7, '2021-01-04', '08:55:00', '16:00:00', 'HADIR'),
(434, 7, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(435, 7, '2021-01-06', '08:00:00', '16:00:00', 'HADIR'),
(436, 7, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(437, 7, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(438, 7, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(439, 7, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(440, 7, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(441, 7, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(442, 7, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(443, 7, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(444, 7, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(445, 7, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(446, 7, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(447, 7, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(448, 7, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(449, 7, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(450, 7, '2021-01-21', NULL, NULL, 'IZIN'),
(451, 7, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(452, 7, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(453, 7, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(454, 7, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(455, 7, '2021-01-26', '08:00:00', '16:00:00', 'HADIR'),
(456, 7, '2021-01-27', '08:40:00', '16:00:00', 'HADIR'),
(457, 7, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(458, 7, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(459, 7, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(460, 7, '2021-01-31', NULL, NULL, 'AKHIR PEKAN'),
(461, 8, '2020-11-01', NULL, NULL, 'AKHIR PEKAN'),
(462, 8, '2020-11-02', '08:00:00', '16:00:00', 'HADIR'),
(463, 8, '2020-11-03', '08:00:00', '16:00:00', 'HADIR'),
(464, 8, '2020-11-04', '08:00:00', '16:00:00', 'HADIR'),
(465, 8, '2020-11-05', '08:00:00', '16:00:00', 'HADIR'),
(466, 8, '2020-11-06', '08:35:00', '16:00:00', 'HADIR'),
(467, 8, '2020-11-07', NULL, NULL, 'AKHIR PEKAN'),
(468, 8, '2020-11-08', NULL, NULL, 'AKHIR PEKAN'),
(469, 8, '2020-11-09', '08:00:00', '16:00:00', 'HADIR'),
(470, 8, '2020-11-10', NULL, NULL, 'LIBUR NASIONAL'),
(471, 8, '2020-11-11', '08:00:00', '16:00:00', 'HADIR'),
(472, 8, '2020-11-12', '08:00:00', '16:00:00', 'HADIR'),
(473, 8, '2020-11-13', '08:00:00', '16:00:00', 'HADIR'),
(474, 8, '2020-11-14', NULL, NULL, 'AKHIR PEKAN'),
(475, 8, '2020-11-15', NULL, NULL, 'AKHIR PEKAN'),
(476, 8, '2020-11-16', '08:00:00', '16:00:00', 'HADIR'),
(477, 8, '2020-11-17', '08:00:00', '16:00:00', 'HADIR'),
(478, 8, '2020-11-18', '08:35:00', '16:00:00', 'HADIR'),
(479, 8, '2020-11-19', '08:00:00', '16:00:00', 'HADIR'),
(480, 8, '2020-11-20', '08:00:00', '16:00:00', 'HADIR'),
(481, 8, '2020-11-21', NULL, NULL, 'AKHIR PEKAN'),
(482, 8, '2020-11-22', NULL, NULL, 'AKHIR PEKAN'),
(483, 8, '2020-11-23', '08:00:00', '16:00:00', 'HADIR'),
(484, 8, '2020-11-24', '08:00:00', '16:00:00', 'HADIR'),
(485, 8, '2020-11-25', NULL, NULL, 'IZIN'),
(486, 8, '2020-11-26', '08:00:00', '16:00:00', 'HADIR'),
(487, 8, '2020-11-27', '08:00:00', '16:00:00', 'HADIR'),
(488, 8, '2020-11-28', NULL, NULL, 'AKHIR PEKAN'),
(489, 8, '2020-11-29', NULL, NULL, 'AKHIR PEKAN'),
(490, 8, '2020-11-30', '08:00:00', '16:00:00', 'HADIR'),
(491, 8, '2020-12-01', '08:00:00', '16:00:00', 'HADIR'),
(492, 8, '2020-12-02', NULL, NULL, 'CUTI'),
(493, 8, '2020-12-03', NULL, NULL, 'CUTI'),
(494, 8, '2020-12-04', '08:00:00', '16:00:00', 'HADIR'),
(495, 8, '2020-12-05', NULL, NULL, 'AKHIR PEKAN'),
(496, 8, '2020-12-06', NULL, NULL, 'AKHIR PEKAN'),
(497, 8, '2020-12-07', '08:00:00', '16:00:00', 'HADIR'),
(498, 8, '2020-12-08', '08:00:00', '16:00:00', 'HADIR'),
(499, 8, '2020-12-09', NULL, NULL, 'LIBUR NASIONAL'),
(500, 8, '2020-12-10', '08:00:00', '16:00:00', 'HADIR'),
(501, 8, '2020-12-11', '08:00:00', '16:00:00', 'HADIR'),
(502, 8, '2020-12-12', NULL, NULL, 'AKHIR PEKAN'),
(503, 8, '2020-12-13', NULL, NULL, 'AKHIR PEKAN'),
(504, 8, '2020-12-14', '08:37:00', '16:00:00', 'HADIR'),
(505, 8, '2020-12-15', '08:00:00', '16:00:00', 'HADIR'),
(506, 8, '2020-12-16', '08:00:00', '16:00:00', 'HADIR'),
(507, 8, '2020-12-17', '08:00:00', '16:00:00', 'HADIR'),
(508, 8, '2020-12-18', '08:00:00', '16:00:00', 'HADIR'),
(509, 8, '2020-12-19', NULL, NULL, 'AKHIR PEKAN'),
(510, 8, '2020-12-20', NULL, NULL, 'AKHIR PEKAN'),
(511, 8, '2020-12-21', '08:00:00', '16:00:00', 'HADIR'),
(512, 8, '2020-12-22', '08:00:00', '16:00:00', 'HADIR'),
(513, 8, '2020-12-23', '08:00:00', '16:00:00', 'HADIR'),
(514, 8, '2020-12-24', NULL, NULL, 'LIBUR NASIONAL'),
(515, 8, '2020-12-25', NULL, NULL, 'LIBUR NASIONAL'),
(516, 8, '2020-12-26', NULL, NULL, 'AKHIR PEKAN'),
(517, 8, '2020-12-27', NULL, NULL, 'AKHIR PEKAN'),
(518, 8, '2020-12-28', '08:00:00', '16:00:00', 'HADIR'),
(519, 8, '2020-12-29', '08:00:00', '16:00:00', 'HADIR'),
(520, 8, '2020-12-30', '08:35:00', '16:00:00', 'HADIR'),
(521, 8, '2020-12-31', '08:00:00', '16:00:00', 'HADIR'),
(522, 8, '2021-01-01', NULL, NULL, 'LIBUR NASIONAL'),
(523, 8, '2021-01-02', NULL, NULL, 'AKHIR PEKAN'),
(524, 8, '2021-01-03', NULL, NULL, 'AKHIR PEKAN'),
(525, 8, '2021-01-04', '08:00:00', '16:00:00', 'HADIR'),
(526, 8, '2021-01-05', '08:00:00', '16:00:00', 'HADIR'),
(527, 8, '2021-01-06', NULL, NULL, 'IZIN'),
(528, 8, '2021-01-07', '08:00:00', '16:00:00', 'HADIR'),
(529, 8, '2021-01-08', '08:00:00', '16:00:00', 'HADIR'),
(530, 8, '2021-01-09', NULL, NULL, 'AKHIR PEKAN'),
(531, 8, '2021-01-10', NULL, NULL, 'AKHIR PEKAN'),
(532, 8, '2021-01-11', '08:00:00', '16:00:00', 'HADIR'),
(533, 8, '2021-01-12', '08:00:00', '16:00:00', 'HADIR'),
(534, 8, '2021-01-13', '08:00:00', '16:00:00', 'HADIR'),
(535, 8, '2021-01-14', '08:00:00', '16:00:00', 'HADIR'),
(536, 8, '2021-01-15', '08:00:00', '16:00:00', 'HADIR'),
(537, 8, '2021-01-16', NULL, NULL, 'AKHIR PEKAN'),
(538, 8, '2021-01-17', NULL, NULL, 'AKHIR PEKAN'),
(539, 8, '2021-01-18', '08:00:00', '16:00:00', 'HADIR'),
(540, 8, '2021-01-19', '08:00:00', '16:00:00', 'HADIR'),
(541, 8, '2021-01-20', '08:00:00', '16:00:00', 'HADIR'),
(542, 8, '2021-01-21', '08:00:00', '16:00:00', 'HADIR'),
(543, 8, '2021-01-22', '08:00:00', '16:00:00', 'HADIR'),
(544, 8, '2021-01-23', NULL, NULL, 'AKHIR PEKAN'),
(545, 8, '2021-01-24', NULL, NULL, 'AKHIR PEKAN'),
(546, 8, '2021-01-25', '08:00:00', '16:00:00', 'HADIR'),
(547, 8, '2021-01-26', NULL, NULL, 'SAKIT'),
(548, 8, '2021-01-27', NULL, NULL, 'SAKIT'),
(549, 8, '2021-01-28', '08:00:00', '16:00:00', 'HADIR'),
(550, 8, '2021-01-29', '08:00:00', '16:00:00', 'HADIR'),
(551, 8, '2021-01-30', NULL, NULL, 'AKHIR PEKAN'),
(552, 8, '2021-01-31', NULL, NULL, 'AKHIR PEKAN');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `peserta_id` varchar(100) NOT NULL,
  `kamar_id` varchar(2) NOT NULL,
  `kegiatan_id` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `peserta_id`, `kamar_id`, `kegiatan_id`, `checkin`, `checkout`) VALUES
(7, '9', '2', '9', '2022-06-10', '2022-06-12'),
(11, '8', '3', '6', '2022-06-01', '2022-06-03'),
(14, '12', '2', '9', '2022-06-16', '2022-06-18'),
(16, '10', '1', '6', '2022-06-01', '2022-06-03'),
(17, '11', '3', '9', '2022-06-10', '2022-06-12'),
(21, '19', '4', '8', '2022-06-01', '2022-06-03'),
(22, '18', '1', '6', '2022-05-29', '2022-05-31'),
(23, '20', '7', '8', '2022-06-01', '2022-06-03'),
(24, '21', '7', '6', '2022-05-29', '2022-05-31'),
(25, '22', '4', '8', '2022-06-01', '2022-06-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_karyawan`
--
ALTER TABLE `bagian_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_diikuti`
--
ALTER TABLE `kegiatan_diikuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_aktifitas`
--
ALTER TABLE `peserta_aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_daftar`
--
ALTER TABLE `peserta_daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_karyawan`
--
ALTER TABLE `bagian_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kegiatan_diikuti`
--
ALTER TABLE `kegiatan_diikuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `peserta_aktifitas`
--
ALTER TABLE `peserta_aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peserta_daftar`
--
ALTER TABLE `peserta_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
