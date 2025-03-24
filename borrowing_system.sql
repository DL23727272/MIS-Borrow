-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 04:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrowing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `borrowID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `borrowDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returnDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_items`
--

INSERT INTO `borrowed_items` (`borrowID`, `userID`, `itemID`, `borrowDate`, `returnDate`) VALUES
(34, 3, 11, '2025-03-24 03:17:20', '2025-03-24 03:23:39'),
(35, 3, 2, '2025-03-24 03:17:20', '2025-03-24 03:18:13'),
(36, 3, 11, '2025-03-24 03:22:33', '2025-03-24 03:23:39'),
(37, 3, 11, '2025-03-24 03:23:20', '2025-03-24 03:23:39'),
(38, 4, 2, '2025-03-24 03:24:48', '2025-03-24 03:25:14'),
(39, 5, 2, '2025-03-24 03:41:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemDescription` text NOT NULL,
  `itemStatus` enum('Available','Borrowed') NOT NULL DEFAULT 'Available',
  `itemImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `itemDescription`, `itemStatus`, `itemImage`) VALUES
(2, 'Projector', 'Epson XGA Projector', 'Borrowed', 'item_67da26683d1c42.18175667.jpg'),
(3, 'HDMI Cable', '2m High-Speed HDMI Cable', 'Borrowed', 'hdmi.png'),
(4, 'Laptop', 'Dell Inspiron 15 with Intel i5 processor', 'Borrowed', 'laptop.jpg'),
(5, 'Projector', 'Epson HD projector for presentations', 'Borrowed', 'projector.jpg'),
(6, 'Chair', 'Ergonomic office chair with lumbar support', 'Available', 'chair.jpg'),
(7, 'Table', 'Wooden study table with drawers', 'Borrowed', 'table.jpg'),
(8, 'Camera', 'Canon EOS DSLR for photography', 'Borrowed', 'camera.jpg'),
(11, 'iPhone13', 'The most advanced dual-camera system ever on iPhone. Lightning-fast A15 Bionic chip.', 'Available', 'iphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `idNumber` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `idNumber`, `fullName`, `username`, `department`, `password`, `type`) VALUES
(1, '000001', 'John Doe', 'johndoe', 'IT Department', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'A21-00001', 'DL', 'DL', 'CCS', '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'A21-00002', 'Ruvic', 'Bacton', 'CCS', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'A20-00355', 'Rhumar', 'Rhumar Capillan', 'CCS', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'A21-000198', 'Mark Jeriel Gapusan Cabalbag', 'Jeriel', 'CCS', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD PRIMARY KEY (`borrowID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `idNumber` (`idNumber`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `borrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD CONSTRAINT `borrowed_items_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowed_items_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
