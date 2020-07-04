-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 09:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public_dist`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `qty`, `unit`, `price`, `info`, `media_id`, `created_at`) VALUES
(2, 'coconut_oil', '100', 'liter', '20', 'Oil', 'uploads/abc_1584341487.png', '2020-03-16 12:21:27'),
(1, 'rice_gidda', '100', 'Kg', '10', 'fyguionm', 'Null', '2020-03-16 11:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `item` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `card_no`, `item`, `qty`, `created_at`, `status`) VALUES
(1, 'slkoo1', 'ration001', 'rice_gidda', '10', '2020-03-16 11:26:28', 1),
(2, 'slkoo1', 'ration001', 'rice_gidda', '10', '2020-03-16 11:26:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `income` varchar(20) NOT NULL,
  `nation` varchar(60) NOT NULL,
  `f_member` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `card_no`, `holder_name`, `address`, `income`, `nation`, `f_member`, `created_at`, `fid`) VALUES
(10, '123456', 'erxt', 'xcv', 'BPL', 'india', 'esrdty', '2020-07-04 11:57:30', 34),
(1, 'ration001', 'alva', 'kolya', 'APL', 'indian', 'No date', '2020-03-16 11:18:58', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_no` (`card_no`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`card_no`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `user` (`card_no`),
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`item`) REFERENCES `item` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
