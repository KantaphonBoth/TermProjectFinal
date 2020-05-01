-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2020 at 11:58 AM
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
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetall`
--

CREATE TABLE `ordersdetall` (
  `productid` int(11) NOT NULL,
  `ordersid` int(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordersdetall`
--

INSERT INTO `ordersdetall` (`productid`, `ordersid`, `price`, `quantity`) VALUES
(2, 1, '50', 1),
(9, 1, '40', 1),
(15, 1, '60', 1),
(6, 2, '40', 1),
(10, 2, '50', 1),
(11, 2, '225', 5),
(2, 2, '150', 3),
(9, 3, '40', 1),
(5, 3, '50', 1),
(8, 4, '40', 1),
(2, 4, '150', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `image`) VALUES
(1, 'cocoa', 40, 'cocoa.jpg'),
(2, 'americano', 50, 'americano.jpg'),
(3, 'mocha', 50, 'mocha.jpg'),
(4, 'espresso', 50, 'espresso.jpg'),
(5, 'latte', 50, 'latte.jpg'),
(6, 'green tea', 40, 'green tea.jpeg'),
(7, 'fresh milk', 40, 'freshmilk.jpg'),
(8, 'thai tea', 40, 'thaitea.jpg'),
(9, 'lemon tea', 40, 'lemtea.jpg'),
(10, 'cappuccino', 50, 'cappuccino.jpg'),
(11, 'smoothie', 45, 'smoothie.jpg'),
(12, 'black coffee', 50, 'black coffee.jpg'),
(13, 'iced chocolate', 40, 'icechock.png'),
(14, 'hot chocolate', 35, 'hotchock.jpg'),
(15, 'black tea', 60, 'blacktea.jpg'),
(16, 'fruit tea', 60, 'fruit tea.jpg'),
(17, 'herbal tea', 60, 'herbal tea.jpg'),
(18, 'milkshake', 40, 'milkshake.jpg'),
(19, 'macchiato', 55, 'macchiato.png'),
(20, 'orange juice', 45, 'orange juice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `CustomerName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phonNo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SaleDateTime` datetime NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `CustomerName`, `phonNo`, `SaleDateTime`, `Total`) VALUES
(1, 'pang', '0986900241', '2020-04-25 12:00:00', 150),
(2, 'yut', '0991236789', '2020-04-25 14:30:00', 465),
(3, 'kung', '0981021614', '2020-04-25 16:00:00', 90),
(4, 'ii', '861234567', '2020-04-26 11:30:00', 190);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phonNo` int(12) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FName`, `LName`, `Email`, `phonNo`, `UserName`, `Password`) VALUES
(1, 'yuwan', 'yu', 'yuwan@gmail.com', 841111111, 'yuwan', '123456789'),
(2, 'non', 'nonthawut', 'non@gmail.com', 941234567, 'non', '123456789'),
(3, 'mo', 'monchanok', 'mo@gmail.com', 841234567, 'mo', '123456789'),
(4, 'ii', 'yuttanun', 'ii@gmail.com', 861234567, 'ii', '123456789'),
(5, 'ron', 'ronnarit', 'ron@gmail.com', 811234567, 'ron', '123456789'),
(6, 'janjaw', 'jann', 'jann@gmail.com', 948123654, 'jann', '123456789'),
(7, 'nuy', 'panida', 'nuy@gmail.com', 612345678, 'nuy', '123456789'),
(8, 'wi', 'wiyada', 'wi@gmail.com', 812345678, 'wi', '123456789'),
(9, 'ni', 'veniga', 'niI@gmail.com', 812345677, 'ni', '123456789'),
(10, 'yo', 'yonthida', 'yo@gmail.com', 831234567, 'yo', '123456789');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2230;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
