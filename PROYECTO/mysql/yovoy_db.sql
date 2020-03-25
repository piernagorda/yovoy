-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 03:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yovoy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `creator` varchar(20) NOT NULL,
  `creationDate` date NOT NULL,
  `eventDate` date NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `joinevent`
--

CREATE TABLE `joinevent` (
  `username` varchar(20) NOT NULL,
  `eventId` int(11) NOT NULL,
  `joinDate` date NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `creationDate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imgName` varchar(30) NOT NULL DEFAULT 'default',
  `type` int(1) NOT NULL COMMENT '0: Admin; 1: Usuario Regular; 2: Usuario Premium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `creationDate`, `name`, `email`, `imgName`, `type`) VALUES
('2', '2', '2020-03-09', 'Ejemplo', 'ejemplo@gmail.com', 'default', 1),
('admin', 'yovoy', '2020-03-07', 'Admin', 'admin@yovoy.com', 'default', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `joinevent`
--
ALTER TABLE `joinevent`
  ADD PRIMARY KEY (`eventId`,`username`) USING BTREE,
  ADD KEY `FOREIGN (USER)` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joinevent`
--
ALTER TABLE `joinevent`
  ADD CONSTRAINT `FOREIGN (EVENT)` FOREIGN KEY (`eventId`) REFERENCES `event` (`eventId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN (USER)` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
