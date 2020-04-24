-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2020 at 01:53 AM
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
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerTelNo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `CustomerTelNo`) VALUES
(1111, 'pang', '0986900241'),
(1112, 'yut', '0991236789'),
(1113, 'kung', '0981021614'),
(1114, 'boat', '0934969681'),
(1115, 'toon', '0934795670'),
(1116, 'non', '0801237890'),
(1117, 'bunny', '0937895432'),
(1118, 'buddy', '0828905643'),
(1119, 'run', '0869024321'),
(1120, 'vanny', '0954958900'),
(1121, 'king', '0999999991'),
(1122, 'ning', '0999999992'),
(1123, 'may', '0999999993'),
(1124, 'ly', '0999999994'),
(1125, 'candy', '0999999995'),
(1126, 'fah', '0999999996'),
(1127, 'city', '0999999997'),
(1128, 'bag', '0999999998'),
(1129, 'molee', '0999999981'),
(1130, 'one', '0999999982');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetall`
--

CREATE TABLE `ordersdetall` (
  `ProducID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `ProductDetail` text COLLATE utf8_unicode_ci NOT NULL
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
(10, 'cappuccino', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(11, 'smoothie', 45, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(12, 'black coffee', 50, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(13, 'iced chocolate', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(14, 'hot chocolate', 35, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(15, 'black tea', 60, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(16, 'fruit tea', 60, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(17, 'herbal tea', 60, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(18, 'milkshake', 40, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(19, 'macchiato', 55, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(20, 'orange juice', 45, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(2227, 'hot chocolate', 35, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(2228, 'hot chocolate', 35, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L'),
(2229, 'hot chocolate', 35, 'หวานมาก\r\nหวานปกติ\r\nหวานน้อย\r\nไซต์ S\r\nไซต์ M\r\nไซต์ L');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `SaleDateTime` datetime NOT NULL,
  `CustomerName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`StaffID`, `StaffName`, `Gender`) VALUES
(1, 'yuwan', 'F'),
(2, 'nonthawut', 'M'),
(3, 'monchanok', 'F'),
(4, 'yuttanun', 'M'),
(5, 'ronnarit', 'M'),
(6, 'janjaw', 'F'),
(7, 'panida', 'F'),
(8, 'wiyada', 'F'),
(9, 'veniga', 'F'),
(10, 'yonthida', 'F');

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
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2230;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
