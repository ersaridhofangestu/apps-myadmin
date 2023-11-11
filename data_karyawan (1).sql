-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 01:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `name`, `gender`, `address`, `position`) VALUES
(1234657902, 'ridho', 'Female', 'JAKARTA', 'DEREKTUR'),
(1234657904, 'ridho', 'Female', 'JAKARTA', 'DEREKTUR'),
(1234657905, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657906, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657907, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657908, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657909, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657910, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657911, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657912, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657913, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657914, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657915, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657916, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657917, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657918, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657919, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657920, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657921, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657922, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657923, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657924, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR'),
(1234657931, 'ersa', 'Male', 'JAKARTA', 'DEREKTUR'),
(1234657932, 'ersa', 'Male', 'JAKARTA', 'DEREKTUR'),
(1234657933, 'RIDHO', 'Female', 'BANTUNG', 'DEREKTUR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234657934;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
