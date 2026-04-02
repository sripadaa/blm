-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2026 at 03:00 PM
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
-- Database: `bank_locker_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `complaint_text` text NOT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone`, `password`) VALUES
(2, 'hari', 'hari@gmail.com', '7825957235', 'd99774e66f79812af5833e1518e44be7');

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `locker_id` int(11) NOT NULL,
  `locker_number` varchar(50) NOT NULL,
  `availability_status` varchar(20) DEFAULT 'AVAILABLE',
  `type` varchar(20) DEFAULT NULL,
  `dimensions` varchar(50) DEFAULT NULL,
  `capacity` varchar(50) DEFAULT NULL,
  `allowed_items` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`locker_id`, `locker_number`, `availability_status`, `type`, `dimensions`, `capacity`, `allowed_items`) VALUES
(1, 'A-101', 'AVAILABLE', 'Small', '30x30x30 cm', '5kg', 'Documents, small electronics'),
(2, 'A-102', 'OCCUPIED', 'Small', '30x30x30 cm', '5kg', 'Documents, small electronics'),
(3, 'B-201', 'AVAILABLE', 'Medium', '60x45x45 cm', '15kg', 'Backpacks, laptops, books'),
(4, 'B-202', 'MAINTENANCE', 'Medium', '60x45x45 cm', '15kg', 'Backpacks, laptops, books'),
(5, 'C-301', 'AVAILABLE', 'Large', '120x60x60 cm', '50kg', 'Suitcases, heavy gear'),
(6, 'C-302', 'OCCUPIED', 'Large', '120x60x60 cm', '50kg', 'Suitcases, heavy gear'),
(7, 'D-401', 'AVAILABLE', 'Refrigerated', '40x40x40 cm', '10kg', 'Perishables, medicines'),
(8, 'D-402', 'RESERVED', 'Refrigerated', '40x40x40 cm', '10kg', 'Perishables, medicines'),
(9, 'E-501', 'AVAILABLE', 'Extra Wide', '45x90x45 cm', '25kg', 'Skateboards, musical instruments'),
(10, 'F-601', 'AVAILABLE', 'Small', '30x30x30 cm', '5kg', 'Keys, wallets, phones');

-- --------------------------------------------------------

--
-- Table structure for table `locker_request`
--

CREATE TABLE `locker_request` (
  `request_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `locker_id` int(11) DEFAULT NULL,
  `request_status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locker_request`
--

INSERT INTO `locker_request` (`request_id`, `customer_id`, `locker_id`, `request_status`) VALUES
(3, 2, 3, 'Pending'),
(4, 2, 3, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`locker_id`);

--
-- Indexes for table `locker_request`
--
ALTER TABLE `locker_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `locker_id` (`locker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locker`
--
ALTER TABLE `locker`
  MODIFY `locker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locker_request`
--
ALTER TABLE `locker_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `locker_request`
--
ALTER TABLE `locker_request`
  ADD CONSTRAINT `locker_request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `locker_request_ibfk_2` FOREIGN KEY (`locker_id`) REFERENCES `locker` (`locker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
