-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 05:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complain_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` char(12) NOT NULL,
  `phone no.` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `phone no.`) VALUES
('admin', 'admin@email', 'Admin', 'admin', '0099');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `Complain_ID` varchar(20) NOT NULL,
  `Subject` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Text` varchar(120) NOT NULL,
  `Comment` varchar(60) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `User_ID` varchar(20) NOT NULL,
  `Feedback` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`Complain_ID`, `Subject`, `Date`, `Text`, `Comment`, `Status`, `User_ID`, `Feedback`) VALUES
('123', 'not needed', '2020-12-22', 'empty', 'nothing', 'Resolved', '1234', ''),
('333', 'none', '2020-12-09', 'yes', 'empty', 'Pending', '1234', ''),
('654', 'easy', '2020-11-18', 'yes', 'not yet', 'Pending', '456', '');

-- --------------------------------------------------------

--
-- Table structure for table `managed by`
--

CREATE TABLE `managed by` (
  `Admin_ID` varchar(20) NOT NULL,
  `Complain_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `Phone`) VALUES
('amr', '123123'),
('Exo', '01795839707');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`) VALUES
('1234', 'a.gmail.com', 'haha', '1'),
('456', 'gg@gg.gg', 'Kuroko', '2'),
('Aluu', 'aluu@baluu', 'Aluu', '1212'),
('amr', 'amr@email', 'amr', '1212'),
('Aukik', 'aukik@email', 'Aukik', '12'),
('Exo', 'exo@email', 'Exo Stranger', '2626');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`Complain_ID`),
  ADD KEY `user_id` (`User_ID`);

--
-- Indexes for table `managed by`
--
ALTER TABLE `managed by`
  ADD PRIMARY KEY (`Admin_ID`,`Complain_ID`),
  ADD KEY `complain_id` (`Complain_ID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID` (`id`,`email`,`name`,`password`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`User_ID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managed by`
--
ALTER TABLE `managed by`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complain_id` FOREIGN KEY (`Complain_ID`) REFERENCES `complain` (`Complain_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
