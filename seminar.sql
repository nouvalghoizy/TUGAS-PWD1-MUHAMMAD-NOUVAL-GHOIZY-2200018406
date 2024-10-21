-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 07:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `name`, `institution`, `country`, `address`, `is_deleted`, `created_at`) VALUES
(1, 'mnouvalghoizy@gmail.com', 'Ghoizy', 'uad', 'indo', 'shdbabshd\r\n', 1, '2024-10-21 16:57:15'),
(2, 'mnouvalghoizy@gmail.com', 'nopal', 'uad', 'indo', 'TAMANANNNN', 1, '2024-10-21 16:57:28'),
(3, '2200018406@webmail.uad.ac.id', 'Sigit Rendang', 'UAD', 'INDO', 'BANTUL\r\n', 0, '2024-10-21 17:07:08'),
(4, 'farhanhafid19@gmail.com', 'Sunda', 'uad', 'indo', 'godean', 1, '2024-10-21 17:10:05'),
(5, 'marsono@gmail.com', 'Maryam', 'Uad', 'Purworejo', 'bantul mas', 0, '2024-10-21 17:13:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
