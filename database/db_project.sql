-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2020 pada 07.25
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `idBerita` tinyint(4) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `text` text NOT NULL,
  `gambar` varchar(150) NOT NULL DEFAULT 'no-image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`idBerita`, `judul`, `tanggal`, `text`, `gambar`) VALUES
(1, 'Destinasi Wisata Aceh Masuk Nominasi API Award ', '2020-07-08', '<p></p><p>BANDA ACEH - Delapan destinasi yang ada di Aceh masuk nominasi Anugerah Pesona Indonesia (API) Award 2020. Hal ini diketahui melalui surat yang dikirim kepada Kepala Dinas Kebudayaan dan Pariwisata Provinsi dan Kabupaten/Kota yang berhasil masuk nominasi tertanggal 1 Juli 2020.</p><p>Artikel ini telah tayang di serambinews.com dengan judul 8 Destinasi Wisata Aceh Masuk Nominasi API Award.</p>', 'user_b311b8c1692a.jpg'),
(2, 'Suatu Berita', '2020-07-08', '<p><span xss=removed>Some quick example text to build on the card title and make up the bulk of the card\'s content.</span><br></p>', 'no-image.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `idGallery` tinyint(4) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`idGallery`, `judul`, `url`, `deskripsi`) VALUES
(2, 'Nusa: Lomba Traktir', 'https://www.youtube.com/embed/DWCCrq_RCKY', 'Perlombaan traktir'),
(3, 'Upin Ipin Musim Prestasi', 'https://www.youtube.com/embed/E4R_e9bkLgg', 'Serial upin upin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idKegiatan` tinyint(4) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(180) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `lat` varchar(100) NOT NULL COMMENT 'latitude',
  `lng` varchar(100) NOT NULL COMMENT 'longitude',
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`idKegiatan`, `nama`, `alamat`, `deskripsi`, `tanggal`, `lat`, `lng`, `foto`) VALUES
(2, 'Lawatan Sejarah Daerah', 'Kota sabang', 'melakukan lawatan ke situs-situs sejarah yang mempunyai orientasi nilai kesatuan dan persatuan bangsa, yang di ikuti oleh siswa SMA.', '2020-07-05', '5.891851769799032', '95.32564344688997', 'kegiatan_95dddd6ac39a.jpg'),
(3, 'Jejak Tradisi Daerah', 'deli serdang Desa Pagar Merbau', 'kegiatan ini melibatkan siswa-siswi (sederajat) untuk melihat dan belajar nilai-nilai budaya secara langsung dengan mengunjungi lokasi-lokasi dimana mata budaya tersebut berada. Dengan belajar langsung diharapkan siswa dapat mengenal keragaman budaya dan berupaya untuk melestarikannya.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '2020-08-11', '3.5267259', '98.7890194', 'kegiatan_63b1d850fb0d.jpg'),
(4, 'Pelestarian Tradisi Makmeugang', 'kota banda aceh', 'Makmeugang merupakan tradisi memasak daging dan menikmati bersama keluarga yang berkembang di kalangan masyarakat Aceh sejak pada masa kesultanan Aceh sebagai rasa syukur dan terima kasih atas kemakmuran Aceh.', '2018-01-15', '5.4978912417712085', '95.28933050849592', 'kegiatan_d38adf158327.jpeg'),
(5, 'Dialog Budaya Nasional', 'Lampeuneurut Banda Aceh\r\n', 'Kegiatan dialog budaya nasional yang dilakukan melibatkan peserta yang dari seluruh Indonesia yang meliputi budayawan, akademisi, aktivis budaya, praktisi, dan komunitas bidang kebudayaan, yang secara selektif dipilih dan diutus melalui Balai Pelestarian Nilai Budaya Se-Indonesia. ', '2017-01-02', '5.4719180439636546', '95.3384718944967', 'kegiatan_d4b7e689b814.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'no-photo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `nama`, `nohp`, `email`, `username`, `password`, `foto`) VALUES
(1, 'Administrator', '-', 'admin@localhost', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user_9b85c7877fef.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idBerita`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idGallery`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idKegiatan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `idBerita` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idGallery` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `idKegiatan` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
