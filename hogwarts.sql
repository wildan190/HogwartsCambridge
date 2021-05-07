-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 04:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hogwarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade1`
--

CREATE TABLE `grade1` (
  `id_tmhs` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(11) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade2`
--

CREATE TABLE `grade2` (
  `id_grade2` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(20) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade3`
--

CREATE TABLE `grade3` (
  `id_grade3` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(30) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade3`
--

INSERT INTO `grade3` (`id_grade3`, `NoKK`, `namasis`, `alamat`, `gender`, `agama`, `walsis`, `tgllhr`) VALUES
(7, '011198765', 'Louis Arthur William', 'Kensington, Cambridge', 'Laki-Laki', 'Anglikan', 'William Arthur Charles', '2021-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `grade4`
--

CREATE TABLE `grade4` (
  `id_grade4` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(30) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade5`
--

CREATE TABLE `grade5` (
  `id_grade5` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(30) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade6`
--

CREATE TABLE `grade6` (
  `id_grade6` int(11) NOT NULL,
  `NoKK` varchar(11) NOT NULL,
  `namasis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `walsis` varchar(30) NOT NULL,
  `tgllhr` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `NIP` int(16) NOT NULL,
  `email` varchar(191) NOT NULL,
  `pelajaran` varchar(20) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade1`
--
ALTER TABLE `grade1`
  ADD PRIMARY KEY (`id_tmhs`);

--
-- Indexes for table `grade2`
--
ALTER TABLE `grade2`
  ADD PRIMARY KEY (`id_grade2`);

--
-- Indexes for table `grade3`
--
ALTER TABLE `grade3`
  ADD PRIMARY KEY (`id_grade3`);

--
-- Indexes for table `grade4`
--
ALTER TABLE `grade4`
  ADD PRIMARY KEY (`id_grade4`);

--
-- Indexes for table `grade5`
--
ALTER TABLE `grade5`
  ADD PRIMARY KEY (`id_grade5`);

--
-- Indexes for table `grade6`
--
ALTER TABLE `grade6`
  ADD PRIMARY KEY (`id_grade6`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade1`
--
ALTER TABLE `grade1`
  MODIFY `id_tmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade2`
--
ALTER TABLE `grade2`
  MODIFY `id_grade2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade3`
--
ALTER TABLE `grade3`
  MODIFY `id_grade3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade4`
--
ALTER TABLE `grade4`
  MODIFY `id_grade4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade5`
--
ALTER TABLE `grade5`
  MODIFY `id_grade5` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade6`
--
ALTER TABLE `grade6`
  MODIFY `id_grade6` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
