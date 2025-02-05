-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 08:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_piket`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `id_koordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `ruangan_lab` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `nomor_kelompok` int(11) NOT NULL,
  `id_koordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_data` int(11) NOT NULL,
  `persetujuan` varchar(200) NOT NULL,
  `penilaian` varchar(255) NOT NULL,
  `keterangan_penilaian` text NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `id_koordinator` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `absen` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koordinator`
--

INSERT INTO `koordinator` (`id_koordinator`, `nama`, `absen`, `foto`, `id_users`) VALUES
(14, 'Aisyah', '3', 'profile.jpeg', 21),
(18, 'Putri Aisyah Dwijanti', '27', 'putri.jpeg', 25),
(19, 'Nadine Mutiara', '15', 'nadine.jpeg', 26),
(20, 'Putra Adam Pratama', '20', 'adam.jpeg', 27),
(21, 'Ahmad Dzaki', '1', 'dzaki.jpeg', 28),
(22, 'A Samudra', '2', 'samudra.jpeg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_absen` int(11) NOT NULL,
  `foto` text NOT NULL,
  `id_koordinator` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'putri@gmail.com', 'putri ', 'putri888', '2024-12-02 00:33:20'),
(2, 'eko@gmail.com', 'ek000', 'f2843ddbf9a22ae2916d1df882f4bfc0f250a4458e4e980132b2f740b4bfe4d3', '2024-12-02 00:34:10'),
(3, 'clara@gmail.com', 'Kasih Clara', '55cf4039ed934096e2a4562f064b0159424dc9edbc35801a5cd31a1f579d7e66', '2024-12-02 00:52:52'),
(4, 'dwijanti9@gmail.com', 'Putri888', '5e968ce47ce4a17e3823c29332a39d049a8d0afb08d157eb6224625f92671a51', '2024-12-02 00:58:00'),
(5, 'chika@gmail.com', 'Chika Sekar', 'b16d6d2a573189c50732dcf60b838e508a921a4d1d6ccf0b0779555e0b88fdd3', '2024-12-02 01:43:50'),
(6, 'dwi@gmail.com', 'Putri Aisyah Dj', '01b626287b1337f110c51c2677bf6edb934486ca51a692c05d69e94dc9f4a44e', '2024-12-06 17:42:19'),
(7, 'cikcik@gmail.com', 'Cikaaja', '83cf8b609de60036a8277bd0e96135751bbc07eb234256d4b65b893360651bf2', '2024-12-06 17:44:19'),
(8, 'Aam@gmail.com', 'Aminah', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2024-12-06 20:14:43'),
(10, 'Keikei@gmail.com', 'Kekei', '3b502d61c86ee5f5236fb5b67506ba3d11f3c68e6d6ebb31b796619fdd37d5db', '2025-01-08 07:01:01'),
(11, 'zalfa@gmail.com', 'Zalfa', 'b2dd70f678d086dc0d4ffcd07032670e32aaecedd1fb0e6974729ae3709d2c20', '2025-01-08 07:03:45'),
(12, 'ghi@gmail.com', 'Ghina', 'ededa200d2d02208918affdb9fd324e3d9846fd9ddbd339e946d05e9ea05dcb4', '2025-01-08 07:10:18'),
(14, 'dj@gmail.com', 'Dj Putri', '3f39d5c348e5b79d06e842c114e6cc571583bbf44e4b0ebfda1a01ec05745d43', '2025-01-08 10:30:19'),
(16, 'mam@gmail.com', 'imam', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '2025-01-22 02:20:03'),
(18, 'mud@gmail.com', 'samudra', '3514acf61732f662da19625f7fe781c3e483f2dce8506012f3bb393f5003e105', '2025-01-22 21:45:26'),
(19, 'caca@gmail.com', 'Caca', '5c28fab375d47994b30190b01338ea48daa0b307909a3d465a597772469633e1', '2025-02-02 22:13:17'),
(20, 'dewi@gmail.com', 'Ica Dewi', '872f0076c7e4835f34d8d2cb61b6a6e8f99f6eeb964c8959e9ceb053e623bb0a', '2025-02-02 23:28:57'),
(21, 'aisyah@gmail.com', 'Aisyah', '3d61460d661e431b161c2a482d151d4d2dd571ed33527f01f741c0c4fb7782a5', '2025-02-03 00:23:35'),
(22, 'ikaa@gmail.com', 'Ika', '24e30cd2c442dcc7d62cd607966898b5a572b5d29d54925b52f8da484b3be963', '2025-02-03 01:33:44'),
(23, 'putriii@gmail.com', 'Putri Aisyah D', '997af0fb6c844069db0e17d37b90e4e44314c5a84c2187f35ca4e45f82e66d59', '2025-02-03 01:44:16'),
(25, 'putri88@gmail.com', 'Putri Aisyah Dwijanti', '888bc464a73188c96432caae56b6fa4c1cb49d11d70772960f95226747efd53d', '2025-02-04 01:58:14'),
(26, 'nadin3@gmail.com', 'Nadine Mutiara', '931e7498c686de406069be5bbf055ad1912f43d55e6e5e3bbd0687639018dcfa', '2025-02-04 02:05:20'),
(27, 'adam4@gmail.com', 'Putra Adam Pratama', 'f7f376a1fcd0d0e11a10ed1b6577c99784d3a6bbe669b1d13fae43eb64634f6e', '2025-02-04 02:10:24'),
(28, 'dzaki11@gmail.com', 'Ahmad Dzaki', 'abb962982ac25035f16e3d48f6eb184d24888202918d31e709eb4759bf09fbe1', '2025-02-04 02:11:41'),
(30, 'samudra8@gmail.com', 'A Samudra', '8dc6d3ff70432b82c777231835febdd397efaf6962c6d5499240d2cfab7f366a', '2025-02-04 02:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_koordinator` (`id_koordinator`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_koordinator` (`id_koordinator`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`id_koordinator`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_koordinator` (`id_koordinator`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `id_koordinator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_koordinator`) REFERENCES `koordinator` (`id_koordinator`);

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`id_koordinator`) REFERENCES `koordinator` (`id_koordinator`);

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`),
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD CONSTRAINT `koordinator_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_koordinator`) REFERENCES `koordinator` (`id_koordinator`),
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
