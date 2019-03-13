-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 10:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nkevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `bid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `decorationtype` varchar(100) NOT NULL,
  `decorationprice` varchar(100) NOT NULL,
  `caketype` varchar(100) NOT NULL,
  `cakeprice` varchar(100) NOT NULL,
  `phototype` varchar(100) NOT NULL,
  `photoprice` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`bid`, `uid`, `location`, `date`, `time`, `decorationtype`, `decorationprice`, `caketype`, `cakeprice`, `phototype`, `photoprice`, `totalprice`) VALUES
(107, 3, 'Mysore', '2018-12-25', '11:11', 'Balloon Round', '2000', 'Ice Cake', '1500', 'Photography with video making', '8000', '11500'),
(109, 1, 'Bangalore', '2018-12-26', '23:11', 'Balloon Arch', '1500', 'Pastries', '1000', 'Photography', '5000', '7500'),
(110, 3, 'shettihalli', '2018-02-22', '10:20', 'Balloon Pillar', '1000', 'Ice Cake', '1500', 'Photography with video making', '8000', '10500'),
(111, 1, 'Mandya', '2018-12-03', '09:56', 'Balloon Round', '2000', 'Ice Cake', '1500', 'Photography with video making', '8000', '11500'),
(112, 4, 'Kengeri', '2018-12-24', '07:00', 'Balloon Pillar', '1000', 'Normal', '500', 'Photography', '5000', '6500'),
(113, 1, 'Hennur Depot', '2018-12-21', '14:22', 'Balloon Pillar', '1000', 'Pastries', '1000', 'Photography', '5000', '7000'),
(114, 1, 'Mysore', '2018-12-20', '01:01', 'Balloon Pillar', '1000', 'Normal', '500', 'Photography', '5000', '6500');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `firstname`, `email`, `phone`, `reason`) VALUES
(1, 'Sathish', 'sathish@gmail.com', '9876543211', 'Good Photography!'),
(2, 'Sathish', 'sathish@gmail.com', '9876543211', 'The event went well...'),
(4, 'Sagar', 'sagar@gmail.com', '9087654321', 'Required more no. of photos and price of photographs are costly!!');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `pid` int(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `phototype` varchar(100) NOT NULL,
  `photoprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`pid`, `uid`, `location`, `date`, `time`, `phototype`, `photoprice`) VALUES
(1, '1', 'Hubli', '2018-12-31', '23:56', 'Photography with video making', '8000'),
(2, '4', 'Mandya', '2018-12-12', '17:00', 'Portfolio', '2000'),
(3, '1', 'Bangalore', '2018-12-18', '10:09', 'Pre Wedding', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `phone`, `question`, `answer`, `uid`) VALUES
('Arunkishore', 'V', 'kishore0arun@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', '9902392342', '1', 'xyz', 1),
('Harsha', 'S', 'harsha@gmail.com', '05605349e5e76123ea0aa0de3b50579a', '9999999999', '1', 'xyz', 2),
('Sathish', 'M', 'sathish@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', '9876543211', '1', 'xyz', 3),
('Sagar', 'N', 'sagarn@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', '9087654321', '1', 'xyz', 4);

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `wid` int(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `decorationtype` varchar(100) NOT NULL,
  `decorationprice` varchar(100) NOT NULL,
  `makeuptype` varchar(100) NOT NULL,
  `makeupprice` varchar(100) NOT NULL,
  `phototype` varchar(100) NOT NULL,
  `photoprice` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`wid`, `uid`, `location`, `date`, `time`, `decorationtype`, `decorationprice`, `makeuptype`, `makeupprice`, `phototype`, `photoprice`, `totalprice`) VALUES
(2, '1', 'Bangalore', '2018-12-15', '02:01', 'Overall Decoration', '200000', 'Grooming for both', '15000', 'Photography with video making', '8000', '223000'),
(3, '1', 'Bangalore', '2018-12-15', '02:01', 'Overall Decoration', '200000', 'Grooming for both', '15000', 'Photography with video making', '8000', '223000'),
(4, '4', 'Hanumathnagara', '2018-12-21', '01:01', 'Stage Decoration', '50000', 'Grooming for both', '15000', 'Photography with video making', '8000', '73000'),
(5, '1', 'Mangalore', '2018-12-31', '12:12', 'Overall Decoration', '200000', 'Grooming for both', '15000', 'Photography with video making', '8000', '223000'),
(6, '1', 'Mangalore', '2018-12-31', '12:12', 'Overall Decoration', '200000', 'Grooming for both', '15000', 'Photography with video making', '8000', '223000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `wid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
