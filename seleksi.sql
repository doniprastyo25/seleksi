-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 11:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seleksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE `analisa` (
  `id_analisa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilainya` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Tempat_lahir` varchar(100) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Jenis_Kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Nama_Ayah_Kandung` char(100) NOT NULL,
  `Nama_Ibu_Kandung` varchar(100) NOT NULL,
  `Nama_Wali` varchar(100) NOT NULL,
  `Kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `atribut` enum('cost','benefit') NOT NULL,
  `bobot_nilai` int(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `atribut`, `bobot_nilai`, `nama_kriteria`) VALUES
(1, 'cost', 3, 'Penghasilan_Ayah'),
(2, 'cost', 3, 'Penghasilan_Ibu'),
(3, 'benefit', 2, 'Jumlah_Saudara'),
(4, 'cost', 1, 'Pekerjaan_Ayah'),
(5, 'cost', 1, 'Pekerjaan_Ibu');

-- --------------------------------------------------------

--
-- Table structure for table `t_kriteria`
--

CREATE TABLE `t_kriteria` (
  `id_tkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nkriteria` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kriteria`
--

INSERT INTO `t_kriteria` (`id_tkriteria`, `id_kriteria`, `keterangan`, `nkriteria`) VALUES
(1, 1, '<500.000', 1),
(2, 1, '500.000-1.000.000', 2),
(3, 1, '1.000.000-2.000.000', 3),
(4, 1, '2.000.000-3.000.000', 4),
(5, 1, '3.000.000-5.000.000', 5),
(6, 1, '>5.000.000', 6),
(7, 2, '<500.000', 1),
(8, 2, '500.000-1.000.000', 2),
(9, 2, '1.000.000-2.000.000', 3),
(10, 2, '2.000.000-3.000.000', 4),
(11, 2, '3.000.000-5.000.000', 5),
(12, 2, '>5.000.000', 6),
(13, 3, '1', 1),
(14, 3, '2', 2),
(15, 3, '3', 3),
(16, 3, '4', 4),
(17, 3, '>5', 5),
(18, 4, 'Guru/Dosen', 5),
(19, 4, 'Pegawai Swasta', 4),
(20, 4, 'Wiraswasta', 3),
(21, 4, 'Petani', 2),
(22, 4, 'Buruh', 1),
(23, 5, 'Guru/Dosen', 5),
(24, 5, 'Pegawai Swasta', 4),
(25, 5, 'Wiraswasta', 3),
(26, 5, 'Petani', 2),
(27, 5, 'Buruh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `t_kriteria`
--
ALTER TABLE `t_kriteria`
  ADD PRIMARY KEY (`id_tkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa`
--
ALTER TABLE `analisa`
  MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;
--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_kriteria`
--
ALTER TABLE `t_kriteria`
  MODIFY `id_tkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
