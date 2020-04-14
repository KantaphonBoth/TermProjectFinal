-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2020 at 03:13 PM
-- Server version: 8.0.17
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerType` enum('Member','VIP','Other') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerTelNo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `Gender`, `CustomerType`, `CustomerTelNo`) VALUES
(1111, 'pang', 'F', 'Member', '0986900241'),
(1112, 'yut', 'M', 'VIP', '0991236789'),
(1113, 'kung', 'F', 'Other', '0981021614'),
(1114, 'boat', 'M', 'VIP', '0934969681'),
(1115, 'toon', 'M', 'Other', '0934795670'),
(1116, 'non', 'M', 'Other', '0801237890'),
(1117, 'bunny', 'F', 'Member', '0937895432'),
(1118, 'buddy', 'M', 'VIP', '0828905643'),
(1119, 'run', 'F', 'Member', '0869024321'),
(1120, 'vanny', 'F', 'Other', '0954958900');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `ProductDetail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `ProductDetail`) VALUES
(1, 'cocoa', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(2, 'americano', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(3, 'mocha', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(4, 'espresso', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(5, 'latte', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(6, 'green tea', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(7, 'fresh milk', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(8, 'thai tea', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(9, 'lemon tea', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(10, 'barista', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `SaleDateTime` datetime NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `GrandTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `SaleDateTime`, `CustomerID`, `StaffID`, `GrandTotal`) VALUES
(1, '2020-04-14 10:00:00', 1113, 9991, 50),
(2, '2020-04-14 11:00:00', 1114, 9992, 100),
(3, '2020-04-14 11:21:00', 1115, 9991, 150),
(4, '2020-04-14 12:00:00', 1111, 9995, 200),
(5, '2020-04-14 13:00:00', 1112, 9993, 500),
(6, '2020-04-14 14:00:00', 1116, 9993, 80),
(7, '2020-04-15 15:00:00', 1120, 9995, 100),
(8, '2020-04-14 16:00:00', 1119, 9993, 200),
(9, '2020-04-15 11:00:00', 1118, 9991, 40),
(10, '2020-04-15 12:00:00', 1117, 9992, 50),
(11, '2020-04-15 13:00:00', 1115, 9993, 500),
(12, '2020-04-15 12:00:00', 1114, 9991, 80),
(13, '2020-04-15 12:26:00', 1113, 9992, 100),
(14, '2020-04-15 13:00:00', 1117, 9995, 200),
(15, '2020-04-15 14:00:00', 1119, 9994, 40),
(16, '2020-04-16 11:21:00', 1117, 9991, 100),
(17, '2020-04-16 13:00:00', 1118, 9992, 150),
(18, '2020-04-16 14:00:00', 1113, 9993, 250),
(19, '2020-04-16 15:00:00', 1116, 9994, 320),
(20, '2020-04-14 16:00:00', 1111, 9995, 320);

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `SaleDetailID` int(11) NOT NULL,
  `SaleID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`SaleDetailID`, `SaleID`, `ProductID`, `Price`, `Quantity`, `Amount`) VALUES
(331, 1, 2, 50, 1, 50),
(332, 2, 3, 50, 2, 100),
(333, 3, 4, 50, 3, 150),
(334, 4, 1, 40, 5, 200),
(335, 5, 5, 50, 10, 500),
(336, 6, 6, 40, 2, 80),
(337, 7, 10, 50, 2, 100),
(338, 8, 9, 40, 5, 200),
(339, 9, 9, 40, 1, 40),
(340, 10, 3, 50, 1, 50),
(341, 11, 2, 50, 10, 500),
(342, 12, 1, 40, 2, 80),
(343, 13, 4, 50, 2, 100),
(344, 14, 6, 40, 5, 200),
(345, 15, 1, 40, 1, 40),
(346, 16, 5, 50, 2, 100),
(347, 17, 4, 50, 3, 150),
(348, 18, 2, 50, 5, 250),
(349, 19, 9, 40, 6, 320),
(350, 20, 8, 40, 6, 320);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `StaffID` int(11) NOT NULL,
  `StaffCode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `StaffName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `StaffPassword` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `StaffLevel` enum('Staff','Manager','Admin') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`StaffID`, `StaffCode`, `StaffName`, `Gender`, `StaffPassword`, `StaffLevel`) VALUES
(9991, 'yuwan1', 'yuwan', 'F', '1234', 'Staff'),
(9992, 'non56', 'nonthawut', 'M', '1111', 'Manager'),
(9993, 'mo13', 'monchanok', 'F', '2222', 'Admin'),
(9994, 'ii456', 'yuttanun', 'M', '3333', 'Staff'),
(9995, 'ron890', 'ronnarit', 'M', '4444', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`SaleDetailID`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`StaffID`),
  ADD UNIQUE KEY `StaffCode` (`StaffCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1121;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `SaleDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9996;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
