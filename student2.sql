-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 12:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student2`
--

-- --------------------------------------------------------

--
-- Table structure for table `infos2`
--

CREATE TABLE `infos2` (
  `id` int(10) NOT NULL,
  `name` varchar(25) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `email` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `address` varchar(40) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `class` int(2) NOT NULL,
  `roll` int(4) NOT NULL,
  `hobby` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `gender` varchar(6) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `photo` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infos2`
--

INSERT INTO `infos2` (`id`, `name`, `email`, `address`, `class`, `roll`, `hobby`, `gender`, `photo`) VALUES
(6, 'rahim', 'gbc@gmail.com', 'dhaka', 3, 3, 'sports,travle,readin,writeing', 'male', '38593-Tulips.jpg'),
(7, 'aysha', 'sadad@gmail.com', 'dhaka', 3, 6, 'travle,readin,writeing', 'female', '11568-Desert.jpg'),
(8, 'tanmay', 'admin@admin.com', 'asfsdf', 2, 23, 'sports', 'male', '79979-Jellyfish.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infos2`
--
ALTER TABLE `infos2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infos2`
--
ALTER TABLE `infos2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
