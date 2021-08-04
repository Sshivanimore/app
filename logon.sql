-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logon`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `empid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`empid`, `firstname`, `lastname`, `image`, `gender`, `email`) VALUES
(3, 'yukta', 'more', 'download1.jpg', 'female', 'yukta@gmail.com'),
(4, 'anirudha', 'gegegg', 'index.png', 'male', 'fefe@gmail.com'),
(5, 'pratibha', 'pednekar', 'offer_LI (2).jpg', 'female', 'ped@gmail.com'),
(6, 'pratibha', 'pednekar', 'offer_LI (2).jpg', 'female', 'ped@gmail.com'),
(7, 'pratibha', 'pednekar', 'offer_LI (2).jpg', 'female', 'ped@gmail.com'),
(8, 'pratibha', 'pednekar', 'offer_LI (2).jpg', 'female', 'ped@gmail.com'),
(9, 'shweta', 'mahadi', 'index.png', 'female', 'shweta@gmail.om'),
(10, 'shweta', 'mahadi', 'index.png', 'female', 'shweta@gmail.om'),
(11, 'sandeep', 'more', 'index.png', 'male', 'sandeep@gmail.com '),
(12, 'mahesh', 'chi', 'offer.png', 'male', 'ma@gmail.com'),
(13, 'shivani', 'More', 'logo', 'male', 'shivani800.sm@gmail.com'),
(14, 'farah', 'khan', 'index (2)_LI.jpg', 'female', 'fara@gmail.com'),
(15, 'Abd', 'more', 'wishlist.JPG', 'female', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `confirmpass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `confirmpass`) VALUES
(3, 'admin', 'admin@gmail.com', 'Admin@12', 'Admin@12'),
(4, 'suga', 'suga@gmail.com', 'Suga@123', 'Suga@123'),
(5, 'namjoon', 'namjoon@gmail.com', 'Shivani@12', 'Shivani@12'),
(6, 'shivani', 'shivani@gmail.com', 'Shivani@12', 'Shivani@12'),
(7, 'yukta', 'yukta@gmail.com', 'Shivani@12', 'Shivani@12'),
(8, 'ankita', 'ankita@gmail.com', '273ded1096d8a0992af7450deea1fc44', '273ded1096d8a0992af7450deea1fc44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
