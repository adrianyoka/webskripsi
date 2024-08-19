-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2023 pada 23.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedagogi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_data`
--

CREATE TABLE `absensi_data` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `keterangan` set('Hadir','Izin','Sakit','-') NOT NULL,
  `master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_data`
--

INSERT INTO `absensi_data` (`id`, `siswa_id`, `keterangan`, `master_id`) VALUES
(7, 39, 'Hadir', 7),
(8, 48, 'Izin', 7),
(9, 49, 'Hadir', 7),
(10, 50, 'Hadir', 7),
(11, 39, 'Izin', 8),
(12, 48, 'Hadir', 8),
(13, 49, 'Hadir', 8),
(14, 50, '-', 8),
(15, 39, 'Hadir', 9),
(16, 48, 'Izin', 9),
(17, 39, 'Hadir', 10),
(18, 48, 'Izin', 10),
(19, 1917051043, 'Hadir', 11),
(20, 1957051014, 'Izin', 11),
(21, 1917051043, 'Hadir', 12),
(22, 1957051014, 'Izin', 12),
(23, 1917051043, 'Hadir', 13),
(24, 1957051014, 'Izin', 13),
(25, 1917051043, 'Hadir', 14),
(26, 1957051014, 'Izin', 14),
(27, 1917051043, 'Hadir', 15),
(28, 1957051014, 'Hadir', 15),
(29, 1917051043, 'Hadir', 16),
(30, 1957051014, '-', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_master`
--

CREATE TABLE `absensi_master` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_master`
--

INSERT INTO `absensi_master` (`id`, `tanggal`, `kelas_id`) VALUES
(7, '2023-08-28', 1),
(8, '2023-09-03', 1),
(9, '2023-09-04', 1),
(10, '2023-09-05', 1),
(11, '2023-09-25', 1),
(12, '2023-09-26', 1),
(13, '2023-09-30', 1),
(14, '2023-10-03', 1),
(15, '2023-10-04', 1),
(16, '2023-10-06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab`
--

CREATE TABLE `bab` (
  `id` int(11) NOT NULL,
  `judul_bab` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bab`
--

INSERT INTO `bab` (`id`, `judul_bab`, `deskripsi`, `mapel_id`, `kelas_id`) VALUES
(6, 'BAB 1 - Operasi Hitung Bilangan Bulat', 'Pada ...', 1, 1),
(7, 'BAB 2 – Pengukuran Waktu, Sudut, Jarak, & Kecepatan', 'Pada ...', 1, 1),
(8, 'BAB 1 - PUEBI', 'materi tentang ...', 2, 1),
(24, 'BAB 1 - Zat Alam', 'pada pertemuan kali ini ...', 3, 1),
(27, 'Sejarah Perkembangan Indonesia', 'Majapahit', 4, 1),
(30, 'BAB 3 - Pengukuran Massa', 'testt', 1, 1),
(31, 'BAB 1 - Tematik 1', 'ini materi kelas 5', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(64) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `kelas_id`, `mapel_id`, `id_user`) VALUES
(214748365, 'Adrian Septa Yoka', 1, 1, 2),
(903240901, 'Muhammad Fadhil Hakim', 2, 2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `rombel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `tujuan_pembelajaran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `tujuan_pembelajaran`) VALUES
(1, 'Matematika', ''),
(2, 'Bahasa Indonesia', ''),
(3, 'IPA', ''),
(4, 'IPS', ''),
(5, 'PKN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `tipe` set('video','youtube','pdf','ppt','link lainnya') NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `guru_id` int(64) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `bab_id` int(11) NOT NULL,
  `is_tampil` set('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul`, `attachment`, `tipe`, `deskripsi`, `guru_id`, `kelas_id`, `mapel_id`, `bab_id`, `is_tampil`) VALUES
(1, 'Operasi Hitung Bilangan Bulat - Teori', 'Matematika_-_Dummy_-_1.mp4', 'video', 'perkalian dek', 214748365, 1, 1, 6, '1'),
(2, 'ini judul 2', '2107051028_NurrohGalbie_BasisData.pdf', 'pdf', 'perkalian dek', 214748365, 1, 1, 7, '1'),
(3, 'ini judul bab 1 - 2 yang panjang ya adik adik', 'https://www.youtube.com/embed/p2Y0rDFRSmo', 'youtube', 'perkalian dek', 214748365, 1, 1, 6, '1'),
(4, 'ini judul ppt nya', 'flamesorria.pptx', 'ppt', 'perkalian dek', 214748365, 1, 1, 6, '1'),
(5, 'ini judul link lainnya', 'https://www.youtube.com/embed/p2Y0rDFRSmo', 'link lainnya', 'perkalian dek', 214748365, 1, 1, 6, '1'),
(6, 'dekk', 'https://www.youtube.com/embed/p2Y0rDFRSmo', 'link lainnya', 'Puebi dek', 214748365, 1, 2, 8, '1'),
(11, 'Materi Kelas 5', 'Modul_2.pdf', 'pdf', 'test materi kelas 5', 903240901, 2, 2, 31, '1'),
(12, 'contoh materi baru', 'Modul_2.pdf', 'pdf', 'ini contoh materi baru yang di sembunyikan dari siswa', 214748365, 1, 1, 30, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(64) NOT NULL,
  `id_user` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `image`, `kelas_id`, `is_active`, `date_created`, `id_user`) VALUES
(1917051043, 'Adrian Septa Yoka', 'default.jpg', 1, 1, 1689806063, 7),
(1957051014, 'Muhammad Fadhil Hakim', 'fadhil1.jpg', 1, 1, 1586163321, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(64) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` set('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(2, '197410102008011015', '$2y$10$3qQ2TYrtQHy44LblPMexnu4ZQrCWD.dYh20P.sOL5cyo6Z48fJQEq', 'adrian@gmail.com', '1'),
(3, 'admin', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.', 'admin@gmail.com', '0'),
(5, '1957051014', '$2y$10$djI2M/FQH2k3H7b6tLK5X.MZG1R.wrARoR6NerH3tsScNnsNCnexa', 'fadhilhakim645@gmail.com', '2'),
(6, '198010102008011015', '$2y$10$Q6OS/CQx53X.23R7BPYnKe9iHGltaIoP8V7fY8H4BIP0IVjRnBt2.', 'jess@gmail.com', '1'),
(7, '1917051043', '$2y$10$QSuSFFmFxfYljyW/k60GZuUy13lRXH4S9D2SwYq2jS3FoQBEUB6NK', 'adriansepta@gmail.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_data`
--
ALTER TABLE `absensi_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_master_data` (`master_id`);

--
-- Indeks untuk tabel `absensi_master`
--
ALTER TABLE `absensi_master`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`) USING BTREE,
  ADD KEY `fk_bab_kelas` (`kelas_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_guru` (`id_user`),
  ADD KEY `fk_mapel_guru` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`,`mapel_id`) USING BTREE;

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kelas_materi` (`kelas_id`),
  ADD KEY `fk_mapel_materi` (`mapel_id`),
  ADD KEY `fk_bab_materi` (`bab_id`),
  ADD KEY `guru_id` (`guru_id`,`kelas_id`,`mapel_id`,`bab_id`) USING BTREE;

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `fk_siswa` (`id_user`),
  ADD KEY `fk_siswa_kelas` (`kelas_id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
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
-- AUTO_INCREMENT untuk tabel `absensi_data`
--
ALTER TABLE `absensi_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `absensi_master`
--
ALTER TABLE `absensi_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `bab`
--
ALTER TABLE `bab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_data`
--
ALTER TABLE `absensi_data`
  ADD CONSTRAINT `absensi_master_data` FOREIGN KEY (`master_id`) REFERENCES `absensi_master` (`id`);

--
-- Ketidakleluasaan untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD CONSTRAINT `fk_bab_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `fk_bab_mapel` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_kelas_guru` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `fk_mapel_guru` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_bab_materi` FOREIGN KEY (`bab_id`) REFERENCES `bab` (`id`),
  ADD CONSTRAINT `fk_guru_materi` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `fk_kelas_materi` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `fk_mapel_materi` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
