-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 02:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `162_ulfimustatiqabidatulizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'd1647213ca0137ab5b713464ea092f42');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'BPSDMP Kominfo Surabaya bersama Dinas Kominfo Pamekasan Resmi Buka Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI', 'Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Surabaya, Selasa 9/3/2021 membuka secara resmi pelaksanaan kegiatan Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI bidang TIK bagi Angkatan Kerja Muda. Kegiatan yang dilaksanakan di FrontOne Hotel Pamekasan ini di dahului dengan pelaksanaan Kegiatan Rapid Test, Senin 8/3/2021, yang diikuti oleh sekitar 40 peserta angkatan kerja muda baru di wilayah Kabupaten Pamekasan dan Sumenep.\r\nKepala BPSDMP Kominfo Surabaya Ibu Eka Handayani dalam sambutannya mengatakan bahwa Indonesia saat ini mengalami permasalahan ketenagakerjaan terutama dalam hal skill gaps, dimana kebutuhan tenaga kerja ahli dalam biang teknologi masih belum tercukupi.\r\n“Laporan World Bank Tahun 2016 bahwa saat ini Indonesia mengalami kekurangan tenaga kerja semi terampil sebesar 9 juta tahun 2015-2030, sementara di sisi lain Indonesia justru diproyeksikan menjadi Negara ekonom terbesar ke 7 tahun 2030., Ucapnya dihadapan peserta pelatihan. “', 'GAMBAR KEGIATAN 1.jpg'),
(2, 'Pelatihan dan Sertifikasi Kompetensi Berbasis SKKNI Hadir di Mojokerto', 'BPSDMP Kominfo Surabaya dan Dinas Komunikasi dan Informatika Kota Mojokerto menyelenggarakan kegiatan Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI bidang TIK bagi Angkatan Kerja Muda. Kegiatan yang diadakan di Hotel Ayola Sunrise Mojokerto dibuka oleh Walikota Mojokerto (Ibu Hj. Ika Puspitasari, SE) dan turut pula dihadiri oleh Bapak Gaguk Tri Prasetyo, AMT, MM selaku Kepala Dinas Kominfo Kota Mojokerto, Ibu Dra. Ec. Nirmala Dewi, MM selaku perwakilan Kepala Dinas Kominfo Jawa Timur serta didampingi oleh Kepala BPSDMP Kominfo Surabaya, Ibu Eka Handayani, SE., MM\r\nKegiatan ini diikuti oleh 70 orang peserta yang telah melalui proses seleksi administrasi dan protokol kesehatan yang ketat, seluruh peserta sebelum mengikuti pelatihan diwajibkan untuk mengikuti Rapid Test Antigen yang telah disediakan panitia penyelenggara dan menerapkan 5M. Pelatihan ini terbagi menjadi 3 skema yaitu; skema junior graphic design, skema staf manajemen data dan terampil menggunakan teknologi digital bagi perempuan dan ibu rumah tangga, yang bertujuan untuk meningkatkan keterampilan khususnya bagi angkatan kerja muda Indonesia dibidang TIK.\r\n“Kemampuan dibidang TIK seperti halnya pelatihan ini sangat penting di era digital (Industri 4.0). Saat ini tidak ada lagi masyarakat yang tidak melek teknologi. Usia berapa pun harus mengenal teknologi, apalagi usia angkatan muda, teknologi digital adalah hal yang wajib diketahui dan dipahami. Karena saat ini dibidang apapun tidak ada yang tidak menggunakan TIK,” ujar Ning Ita sapaan akrab Wali Kota Mojokerto dalam sambutannya', 'GAMBAR KEGIATAN 2.jpg'),
(3, 'Pelatihan Pengenalan Digital Marketing', 'BPSDMP Kominfo Surabaya dan Gapura Digital bekerjasama menyelenggarakan pelatihan pengenalan digital marketing diikuti oleh 153 orang peserta melalui aplikasi zoom meeting dan youtube channel BPSDMP Kominfo Surabaya. Pelatihan ini bertujuan agar dapat meningkatkan dan memajukan bisnis serta menambah kemampuan dan pengetahuan tentang pemasaran digital.\r\nKegiatan ini dibuka oleh Kepala BPSDMP Kominfo Surabaya, Ibu Eka Handayani dan dihadiri oleh Kepala Badan Litbang SDM Hary Budiarto yang memberikan tambahan ilmu tentang ekonomi digital. Dalam sambutannya, Bapak Hary Budiarto menyampaikan bahwa meskipun sedang dilanda pandemi kita tidak boleh bermalas-malasan dan menyerah, kita harus mampu memanfaatkan waktu dengan mengasah kemampuan melalui pelatihan-pelatihan. Salah satu contohnya adalah pelatihan yang diadakan oleh BPSDMP Kominfo Surabaya.', 'GAMBAR KEGIATAN 3.png'),
(4, 'Pembukaan Government Transformation Academy Tahun 2021 dan Penandatangan MOU dengan Gubernur NTB', 'Senin, 25 Oktober 2021. Kementerian Komunikasi dan Informatika melalui Badan Penelitian dan Pengembangan Sumber Daya Manusia (Balitbang SDM) menyelenggarakan kegiatan Pembukaan Pelatihan Government Transformation Academy (GTA) Tahun 2021. Kegiatan pembukaan dan orientasi ini diselenggarakan secara tatap muka (langsung) di Kota Mataram NTB dan online via aplikasi video conference di berberapa daerah diantaranya Palangkaraya, Jember dan Mamuju.\r\nKegiatan yang diadakan di Kantor BPSDMD Provinsi NTB ini dibuka secara resmi oleh Wakil Gubernur NTB, Ibu Dr. Ir. Hj. Sitti Rohmi Djalilah, M.Pd. Dihadiri oleh Kepala Badan Litbang SDM Kemenkominfo Bapak Harry Budiarto, Sekretaris Balitbang SDM, Kepala BPSDMP Kominfo Surabaya, Kapokja GTA, dan beberapa Kepala OPD Provinsi NTB.', 'GAMBAR KEGIATAN 4.png'),
(6, 'BPSDMP Kominfo Surabaya Resmi Tutup Pelatihan Sertifikasi Kompetensi 2021 di Pamekasan', 'Setelah berlangsung hampir selama 5 hari pelaksanaan pelatihan sertfikasi kompetensi sejak selasa hingga sabtu, 9 sampai dengan 13 Maret 2021, Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Surabaya, akhirnya resmi tutup pelatihan sertifikasi kompetensi tahun 2021 di Pamekasan, Sabtu 13/3/2021.\r\n', 'GAMBAR KEGIATAN 5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
