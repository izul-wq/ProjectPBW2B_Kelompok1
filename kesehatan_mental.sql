-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2025 pada 18.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesehatan_mental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikell`
--

CREATE TABLE `artikell` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `sumber` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikell`
--

INSERT INTO `artikell` (`id`, `judul`, `isi`, `sumber`) VALUES
(3, 'Cara Mengelola Stres Sehari-hari', 'Stres dapat dikurangi dengan melakukan kegiatan seperti olahraga ringan, journaling, atau meditasi. Penting juga untuk berbagi cerita dengan orang terpercaya.', 'https://www.halodoc.com/artikel/kata-psikolog-ketahui-cara-tepat-untuk-mengelola-stres?srsltid=AfmBOorsUlMvzz4w-Htk6_oySVJYcu4c6M8_4EdbrMpP_J4pXKvVadw'),
(4, 'Mengapa Penting Menjaga Kesehatan Mental?', 'Kesehatan mental berpengaruh besar terhadap produktivitas dan hubungan sosial. Jaga pola tidur, makan teratur, dan beri waktu untuk diri sendiri.', 'https://sardjito.co.id/2022/08/31/pentingnya-menjaga-kesehatan-mental/'),
(5, 'Kenali Tanda-tanda Burnout', 'Burnout ditandai dengan kelelahan emosional, sinisme terhadap pekerjaan, dan penurunan performa. Jangan ragu untuk istirahat dan mencari bantuan.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-burnout'),
(6, 'Mengenal Depresi, Gejala dan Cara Mengatasinya', 'Penjelasan medis tentang depresi dari sisi psikiatri dan psikologi, serta penanganannya.', 'https://www.mitrakeluarga.com/artikel/gejala-depresi'),
(7, 'Mengenal Gangguan Kesehatan Mental ', 'Kesehatan mental atau yang juga dikenal dengan mental health adalah kondisi kesehatan yang berkaitan dengan aspek kejiwaan, psikis, dan emosional seseorang. Mental health mencerminkan keadaan kesehatan mental seseorang, termasuk tingkat keseimbangan emosional, kemampuan mengatasi tekanan, dan kualitas hubungan interpersonal.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-mental-health');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `psikolog` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `tanggal_booking` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `psikolog`, `nama`, `email`, `whatsapp`, `tanggal_booking`) VALUES
(1, 'Melati Ayu', 'AHMAD AZIZUL ARIF', 'ezi4123@gmail.com', '08512312', '2025-06-13 15:18:11'),
(2, 'Melati Ayu', 'j', 'earnestfaretz@gmail.com', '09ii', '2025-06-13 15:18:32'),
(3, 'Melati Ayu', 'AHMAD AZIZUL ARIF', 'ezi4123@gmail.com', '08512312', '2025-06-13 15:39:31'),
(4, 'Melati Ayu', 'asd', 'as@asd.com', '123123', '2025-06-13 15:54:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gelar` varchar(100) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama`, `tanggal`, `jam`, `gelar`, `label`, `pengalaman`, `harga`) VALUES
(1, 'Budi Santoso', '2025-06-06', '10:00:00', 'M.Psi., Psikolog', 'Psikolog Klinis Umum', 4, 100000),
(2, 'Siti Rahma', '2025-06-07', '13:30:00', 'M.Psi., Psikolog', 'Spesialis kesehatan mental orang dewasa', 2, 75000),
(3, 'Agus Wibowo', '2025-06-08', '09:00:00', 'M.Psi., Psikolog', 'Spesialis menangani masalah anak-anak dan remaja', 3, 90000),
(4, 'Melati Ayu', '2025-06-09', '15:00:00', 'M.Psi., Psikolog', 'Spesialis perkawinan & keluarga', 10, 399000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `pesan`) VALUES
(1, 'Randi', 'Website ini sangat membantu saya memahami pentingnya kesehatan mental.'),
(2, 'Rina', 'Saya merasa lebih tenang setelah membaca artikel dan ikut konsultasi.'),
(3, 'Bagas', 'Awalnya saya ragu untuk curhat, tapi ternyata sangat melegakan.'),
(4, 'Lina', 'Tampilan websitenya enak dilihat dan informasinya bermanfaat banget.'),
(5, 'Dewi', 'Terima kasih sudah menyediakan ruang aman untuk kami yang sedang berjuang.'),
(6, 'Andi Wijaya', 'Aplikasi ini membantu saya memahami kesehatan mental saya dengan lebih baik.'),
(7, 'Bella Dewi', 'Proses konsultasinya mudah dan terarah—sangat direkomendasikan!'),
(8, 'Citra Putri', 'Artikel di situs ini relevan dan mudah dipahami.'),
(9, 'Dimas Ardiansyah', 'Fitur jadwal konsultasi memudahkan saya membuat janji.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikell`
--
ALTER TABLE `artikell`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikell`
--
ALTER TABLE `artikell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
