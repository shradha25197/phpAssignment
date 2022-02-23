-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 04:04 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currencyconvertor`
--
CREATE DATABASE IF NOT EXISTS `currencyconvertor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `currencyconvertor`;

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `ID` int(10) NOT NULL,
  `IP` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorization`
--

INSERT INTO `authorization` (`ID`, `IP`) VALUES
(1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `currency_master`
--

CREATE TABLE `currency_master` (
  `CURRENCY_ID` int(10) NOT NULL,
  `CURRENCY_CODE` varchar(10) NOT NULL,
  `CURRENCY_DES` varchar(10) NOT NULL,
  `CURRENCY_RATE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_master`
--

INSERT INTO `currency_master` (`CURRENCY_ID`, `CURRENCY_CODE`, `CURRENCY_DES`, `CURRENCY_RATE`) VALUES
(1, 'INR', 'INR', 84.8051),
(2, 'BSD', 'BSD', 1.13506),
(3, 'USD', 'USD', 1.13506),
(4, 'EUR', 'EUR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `USER_ID` int(10) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_ADDRESS` varchar(50) NOT NULL,
  `USER_ADDED_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_EMAIL`, `USER_ADDRESS`, `USER_ADDED_DATE`) VALUES
(1, 'sitelucent', 'password@123', 'sitelucent@gmail.com', 'Eindhoven', '2022-02-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `currency_master`
--
ALTER TABLE `currency_master`
  ADD PRIMARY KEY (`CURRENCY_ID`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `currency_master`
--
ALTER TABLE `currency_master`
  MODIFY `CURRENCY_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
