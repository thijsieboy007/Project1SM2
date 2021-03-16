-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2021 at 10:13 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `georgehollywood`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(45) DEFAULT NULL,
  `CategoryDescription` mediumtext NOT NULL,
  `categorycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logon`
--

DROP TABLE IF EXISTS `logon`;
CREATE TABLE IF NOT EXISTS `logon` (
  `userid` int NOT NULL,
  `password` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text,
  `Availability` tinyint(1) DEFAULT NULL,
  `prize` decimal(10,0) DEFAULT NULL,
  `feedingNum` int NOT NULL,
  `allergieInfo` text NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `BookID` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservationproducts`
--

DROP TABLE IF EXISTS `reservationproducts`;
CREATE TABLE IF NOT EXISTS `reservationproducts` (
  `productID` int NOT NULL,
  `ReservationruleID` int UNSIGNED NOT NULL,
  PRIMARY KEY (`productID`,`ReservationruleID`),
  KEY `FK_reservationrule` (`ReservationruleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservationrule`
--

DROP TABLE IF EXISTS `reservationrule`;
CREATE TABLE IF NOT EXISTS `reservationrule` (
  `ReservationruleID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ReservationID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`ReservationruleID`),
  UNIQUE KEY `ReservationID_UNIQUE` (`ReservationID`),
  UNIQUE KEY `ReservationruleID_UNIQUE` (`ReservationruleID`),
  KEY `ReservationruleID` (`ReservationruleID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `ReservationsID` int NOT NULL AUTO_INCREMENT,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `tableID` int NOT NULL,
  `numOfGuests` int NOT NULL,
  PRIMARY KEY (`ReservationsID`),
  KEY `ReservationsID` (`ReservationsID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleID` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) NOT NULL,
  `roleDescription` mediumtext,
  `createroles` binary(1) NOT NULL,
  `accessorders` binary(1) NOT NULL,
  `changeorders` binary(1) NOT NULL,
  `accessUsers` binary(1) NOT NULL,
  `deleteUsers` binary(1) NOT NULL,
  `updateUsers` binary(1) NOT NULL,
  `addProducts` binary(1) DEFAULT NULL,
  `changeProducts` binary(1) DEFAULT NULL,
  `removeProducts` binary(1) DEFAULT NULL,
  PRIMARY KEY (`roleID`),
  UNIQUE KEY `roleName_UNIQUE` (`roleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `tableID` int NOT NULL AUTO_INCREMENT,
  `size` int NOT NULL,
  `locationID` int NOT NULL,
  PRIMARY KEY (`tableID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tableID`, `size`, `locationID`) VALUES
(1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `roleID` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(45) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `createDateTime` datetime NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `roleID_UNIQUE` (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_reservationProducts` FOREIGN KEY (`productID`) REFERENCES `reservationproducts` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservationproducts`
--
ALTER TABLE `reservationproducts`
  ADD CONSTRAINT `FK_reservationrule` FOREIGN KEY (`ReservationruleID`) REFERENCES `reservationrule` (`ReservationruleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservationrule`
--
ALTER TABLE `reservationrule`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `ReservationID` FOREIGN KEY (`ReservationsID`) REFERENCES `reservationrule` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `roleID` FOREIGN KEY (`roleID`) REFERENCES `user` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `logonID` FOREIGN KEY (`userID`) REFERENCES `logon` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
