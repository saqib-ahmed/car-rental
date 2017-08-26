-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 12:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cre`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `sNo` int(32) NOT NULL DEFAULT '0',
  `auxCable` int(32) DEFAULT NULL,
  `umFlag` int(32) DEFAULT NULL,
  `modelName` varchar(45) DEFAULT NULL,
  `cType` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `hourlyRate` float DEFAULT NULL,
  `dailyRate` float DEFAULT NULL,
  `seatingCap` int(32) DEFAULT NULL,
  `transType` varchar(45) DEFAULT NULL,
  `loName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sNo`),
  KEY `loName` (`loName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`sNo`, `auxCable`, `umFlag`, `modelName`, `cType`, `color`, `hourlyRate`, `dailyRate`, `seatingCap`, `transType`, `loName`) VALUES
(1, 1, 0, 'Civic', 'Sedan', 'white', 5, 100, 5, 'manual', 'Main Block'),
(2, 0, 1, 'Audi A5', 'Convertible', 'black', 20, 400, 4, 'Automatic', 'Electrical Department'),
(3, 1, 0, 'Toyota APV', 'SUV', 'Silver', 8, 150, 8, 'Manual', 'Electrical Department'),
(4, 1, 0, 'Toyota Prius', 'Hybrid', 'Maron', 5, 100, 5, 'Auto', 'Bus Stand'),
(5, 1, 0, 'Mercedes Benz', 'Sedan', 'Black', 15, 300, 4, 'Auto', 'Boy''s Hostel'),
(6, 1, 1, 'Suzuki Cultus', 'Sedan', 'Silver', 3, 60, 5, 'Manual', 'Boy''s Hostel'),
(7, 1, 0, 'Toyota Grande', 'Sedan', 'Black', 5, 100, 5, 'Manual', 'Car Parking'),
(8, 0, 0, 'High roof Euro  ', 'SUV', 'White', 10, 200, 16, 'Manual', 'Bus Stand'),
(9, 0, 1, 'Mazda RX-8', 'Sports', 'Black', 25, 500, 4, 'Auto', 'Electrical Department'),
(10, 1, 0, 'BMW M3', 'sports', 'Blue', 25, 500, 2, 'Auto', 'Car Parking'),
(11, 1, 0, 'RV Lemon Law', 'SUV', 'Choclate', 50, 1000, 5, 'Manual', 'Main Block');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`loName`) REFERENCES `location` (`loName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
