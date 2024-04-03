-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 06:38 PM
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
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoicedata`
--

CREATE TABLE `invoicedata` (
  `id` int(11) NOT NULL,
  `billNo` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `discountPer` varchar(255) NOT NULL,
  `netTotal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoicedata`
--

INSERT INTO `invoicedata` (`id`, `billNo`, `total`, `discount`, `discountPer`, `netTotal`) VALUES
(390, 1, '450', '45', '10', '405');

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `id` int(11) NOT NULL,
  `billNo` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `disPer` varchar(255) NOT NULL,
  `netTotal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoicedetails`
--

INSERT INTO `invoicedetails` (`id`, `billNo`, `name`, `price`, `qty`, `total`, `discount`, `disPer`, `netTotal`) VALUES
(21, 1, 'item 1', '100', '5', '500', '50', '10', '450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoicedata`
--
ALTER TABLE `invoicedata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `billNo` (`billNo`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoicedata`
--
ALTER TABLE `invoicedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
