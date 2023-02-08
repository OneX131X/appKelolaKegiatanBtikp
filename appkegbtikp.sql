-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2023 at 02:20 PM
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
(8, 8, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(9, 10, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(10, 11, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(11, 12, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(15, 6, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Editing dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(17, 9, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(18, 13, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Motion Graphic ala KOKBISA, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Ediuting dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(19, 15, 'Pembukaan, Konsep Kurikulum Merdeka dengan platform Merdeka Mengajar, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline', 'Idea Visualization, Pemanfaatan Games Animasi Edukasi Berbasis Html dan Smartphone, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi,  Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Editing dalam Pembuatan Motion Graphic dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan'),
(21, 16, 'Pembukaan, Laporan Ketua, Implementasi Pendidikan Karakter dan Perubahan Mindset Pendidikan Untuk Pengembangan Kurikulum Merdeka dengan Platform Merdeka Mengajar, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi', 'Teknik Dasar Pembuatan Animasi dan Karakter Animasi, Pemanfaatan Games Animasi Edukasi Berbasis HTML dan Smartphone, Android Administrasi Kelas Akun Belajar.id, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline, Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Editing dalam Pembuatan Motion Grafik dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan dan Penyelesaian Administrasi'),
(22, 2, 'Pembukaan, Laporan Ketua, Implementasi Pendidikan Karakter dan Perubahan Mindset Pendidikan Untuk Pengembangan Kurikulum Merdeka dengan Platform Merdeka Mengajar, Praktek Pembuatan Skenario Naskah dan Storytelling dalam Animasi', 'Teknik Dasar Pembuatan Animasi dan Karakter Animasi, Pemanfaatan Games Animasi Edukasi Berbasis HTML dan Smartphone, Android Administrasi Kelas Akun Belajar.id, Pembuatan dan Pengembangan Media Pembelajaran Interaktif Berbasis Aplikasi Storyline, Praktek Penerapan Sound Efek dan Voiceover dalam Pengisian Video Animasi Pembelajaran, Praktek Editing dalam Pembuatan Motion Grafik dan Animasi Pembelajaran', 'Presentasi Hasil Karya dan Upload Konten Video Pembelajaran, Penutupan dan Penyelesaian Administrasi');

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
(1, 'Ranjang', '40', 'baik', 'tidak ada kerusakan'),
(2, 'AC', '20', 'baik', 'tidak ada kerusakan'),
(3, 'TV', '20', 'kurang baik', '2 unit perlu diperiksa');

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
(25, '13', 2, 'L', '2');

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
(2, 'Bimtek Peningkatan Kompetensi Guru dan Pembuatan Video Animasi Pembelajaran Jenjang SMP Angkatan 1', '2022-06-04', '2022-06-06', 4, '39'),
(6, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMA Angkatan 1', '2022-05-29', '2022-05-31', 4, '39'),
(8, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMK Angkatan 1', '2022-06-01', '2022-06-03', 4, '39'),
(9, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMA Angkatan 2', '2022-06-10', '2022-06-12', 4, '39'),
(10, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMK Angkatan 2', '2022-06-07', '2022-06-09', 4, '39'),
(11, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMP Angkatan 1', '2022-06-13', '2022-06-15', 4, '39'),
(12, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMP Angkatan 2', '2022-06-16', '2022-06-18', 4, '39'),
(15, 'Bimtek Pengelolaan Informasi Sekolah Berbasis TIK Jenjang SMK Angkatan 3', '2022-07-14', '2022-07-16', 0, '39'),
(16, 'Bimtek Peningkatan Kompetensi Guru dan Pembuatan Video Animasi Pembelajaran Jenjang SD Angkatan 1', '2022-08-10', '2022-08-11', 0, '39');

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
(1, 'admin', '$2y$10$baqQ4zTS37tzcjXzcU9GjO5.a.IIvc1OX1.kwHleKXxjVo9dZXDK2', 'ADMIN', '2023-02-07 08:06:57'),
(12, 'narasumber', '$2y$10$GpUIMnLTwouPHDBJdpxdReblRN57fj7oOtXKiPEwOkvQz42sv5LTy', 'PEMATERI', '2023-02-07 17:55:19');

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
(22, 'Muhammad Adi, S.Pd', '7718282371728318', '8', 'L', '1996-06-07', 'SMK 1 Banjarmasin', 'S1 Komputer Stimik', '0895552127382', 'adi77@gmail.com'),
(23, 'Amelia Utami, S.Pd', '7717727361827361', '6', 'P', '1995-05-25', 'SMA 2 Banjarmasin', 'S1 Pendidikan Unlam', '0813144423871', 'amel292@gmail.com'),
(25, 'Muhammad Okti, S.Kom', '7782718723713412', '8', 'L', '1994-10-13', 'SMK 1 Banjarbaru', 'S1 Komputer Stimik', '0813331274618', 'm_okti13@gmail.com'),
(26, 'Kurniawan Rasyidi', '7712631726311231', '8', 'L', '2000-08-04', 'SMKN 2 banjarmasin', 'S1 Komputer Uniska', '0894533123618', 'kurniawanrasyidi1321@gmail.com');

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
(2, '9', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(3, '10', '6', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(5, '11', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(6, '12', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(8, '15', '9', 'hadir', 'hadir', 'hadir', 'baik'),
(9, '16', '2', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(10, '18', '6', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(12, '20', '8', 'hadir', 'hadir', 'hadir', 'sangat baik'),
(15, '24', '8', 'hadir', 'hadir', 'hadir', ''),
(17, '25', '8', 'hadir', 'hadir', 'hadir', 'baik'),
(19, '22', '8', 'hadir', 'hadir', 'hadir', ''),
(26, '23', '6', 'hadir', 'hadir', 'hadir', ''),
(31, '19', '8', 'hadir', 'hadir', 'hadir', ''),
(32, '26', '8', 'hadir', 'hadir', 'hadir', '');

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
(5, '8', '6', 'SMA/MA', 'guru', 'I', 'islam', 'hss', 'SMAN 1 Angkinang Hulu Sungai Selatan', ' JALAN TEMBOK REL KRETA, Angkinang, Kec. Angkinang, Kab. Hulu Sungai Selatan Prov. Kalimantan Selatan', '0813124681726', 'surat sk6.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(7, '9', '9', 'SMA/MA', 'guru', 'I', 'islam', 'balangan', 'SMAN 2 Paringin Balangan', 'Jl. A. Yani No.Km. 14.800, Gambut, Kec. Gambut, Kabupaten Banjar, Kalimantan Selatan 70652', '0895552613716', 'surat sk2.jpg', 'ditolak', 'persyaratan kurang lengkap / sesuai'),
(9, '11', '9', 'SMA/MA', 'guru', 'I', 'islam', 'barito kuala', 'SMA GIBS Barito Kuala', 'Jl. Trans Kalimantan KM.12, Sungai Lumbah, Kec. Alalak, Kabupaten Barito Kuala, Kalimantan Selatan 70582', '0895552153612', 'surat sk3.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(10, '12', '9', 'SMA/MA', 'guru', 'I', 'islam', 'balangan', 'SMAN 2 Paringin Balangan', 'JL. A. YANI KOMPLEK PENDIDIKAN TERPADU KELURAHAN BATU PIRING, HARAPAN BARU, Kec. Paringin Selatan, Kab. Balangan Prov. Kalimantan Selatan', '0813124681726', 'surat sk4.jpg', 'ditolak', 'persyaratan kurang lengkap / sesuai'),
(14, '18', '6', 'SMA/MA', 'guru', 'I', 'islam', 'bjb', '', 'Jl. Pangeran Suriansyah, Mentaos, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70711', '0895127361872', 'surat-sk5.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(16, '15', '9', 'SMA/MA', 'guru', 'I', 'islam', 'tanah laut', '', 'batu ampar', '', 'surat sk.jpg', 'diterima', ''),
(17, '16', '9', 'SMA/MA', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman', '', 'surat sk.jpg', 'diterima', ''),
(18, '19', '8', 'SMK', 'guru', 'I', 'budha', 'bjb', '', 'Jl. Ahmad Yani KM. 32, 5, Loktabat Selatan, Banjarbaru Selatan, Guntung Payung, Kec. Landasan Ulin, Kota Banjar Baru, Kalimantan Selatan 70721', '', 'surat sk5.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(19, '20', '8', 'SMK', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman No.45 Banjarmasin, Kalimantan Selatan', '', 'surat sk.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(20, '21', '6', 'SMA/MA', 'guru', 'I', 'islam', 'tanah laut', '', 'JL. H.M. SARBINI, Gunung Mas, Kec. Batu Ampar, Kab. Tanah Laut Prov. Kalimantan Selatan', '', 'surat sk5.jpg', 'ditolak', 'persyaratan kurang lengkap / sesuai'),
(21, '22', '8', 'SMK', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman No.45 Banjarmasin, Kalimantan Selatan', '', 'surat-sk4.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(22, '23', '6', 'SMA/MA', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Mulawarman No.21, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70115', '', 'surat-sk2.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(26, '24', '8', 'SMK', 'guru', 'I', 'islam', 'bjb', '', 'Jl. Ahmad Yani KM. 32, 5, Loktabat Selatan, Banjarbaru Selatan, Guntung Payung, Kec. Landasan Ulin, Kota Banjar Baru, Kalimantan Selatan 70721', '', 'surat sk.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(30, '25', '8', 'SMK', 'guru', 'I', 'islam', 'bjb', '', 'Jl. Ahmad Yani KM. 32, 5, Loktabat Selatan, Banjarbaru Selatan, Guntung Payung, Kec. Landasan Ulin, Kota Banjar Baru, Kalimantan Selatan 70721', '', 'surat sk8.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(32, '10', '6', 'SMA/MA', 'guru', 'I', 'islam', 'balangan', '', 'JL. A. YANI KOMPLEK PENDIDIKAN TERPADU KELURAHAN BATU PIRING, HARAPAN BARU, Kec. Paringin Selatan, Kab. Balangan Prov. Kalimantan Selatan', '', 'surat-sk.jpg', 'diterima', 'persyaratan lengkap dan sesuai'),
(33, '26', '8', 'SMK', 'guru', 'I', 'islam', 'bjm', '', 'Jl. Kayutangi', '', 'surat-sk.jpg', 'diterima', 'syarat lengkap');

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
(22, '18', '1', '6', '2022-05-29', '2022-05-31'),
(23, '20', '7', '8', '2022-06-01', '2022-06-03'),
(24, '21', '7', '6', '2022-05-29', '2022-05-31'),
(28, '24', '4', '8', '2022-06-01', '2022-06-03'),
(29, '25', '4', '8', '2022-06-01', '2022-06-03');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kegiatan_diikuti`
--
ALTER TABLE `kegiatan_diikuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `peserta_aktifitas`
--
ALTER TABLE `peserta_aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `peserta_daftar`
--
ALTER TABLE `peserta_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
