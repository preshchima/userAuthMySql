-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 02:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuriphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `id` int(11) NOT NULL,
  `full_names` varchar(120) NOT NULL,
  `country` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`id`, `full_names`, `country`, `email`, `gender`, `password`) VALUES
(2, 'Nancy Vicky', 'Nigeria', 'nancy@gmail.com', 'Female', 'andy'),
(3, 'Seyi Olufe', 'Nigeria', 'seyi@gmail.com', 'Male', '1234'),
(4, 'Chioma Victoria', 'Nigeria', 'vicky@gmail.com', 'Female', '129323'),
(8, 'Nfon Andrew', 'Cameroon', 'drew@gmail.com', 'Male', 'tatah'),
(13, 'Hameed', 'Nigeria', 'ham@mail.com', 'Male', '2222'),
(14, 'Sochima Precious', 'Nigeria', 'sochima.eziagwu@gmail.com', 'Female', '^@b5zFAqkCvuKsJV4q'),
(15, 'Presh', 'Cameroon', 'preshchima@gmail.com', 'Male', '^@b5zFAqkCvuKsJV4q'),
(17, 'Kate', 'Nigeria', 'katemedical@mail.com', 'Female', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
