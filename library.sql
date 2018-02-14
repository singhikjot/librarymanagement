-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 07:51 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('admin', 'd8578edf8458ce06fbc5bb76a58c5ca4');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `copies` int(3) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `issued` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `category`, `author`, `ISBNNumber`, `copies`, `RegDate`, `issued`) VALUES
(1, 'PHP And MySql programming', '5', '1', 222333, 20, '2017-07-08 20:04:55', 19),
(3, 'physics', '6', '4', 1111, 15, '2017-07-08 20:17:31', 13),
(5, 'algorithms', '0', '0', 794562, 10, '2017-11-16 19:52:32', 9),
(6, 'toc', 'cse', 'ikjot', 12345678, 20, '2017-11-17 16:54:07', 19),
(7, 'os', 'cse', 'puneet', 875432, 10, '2017-11-17 16:55:03', 10),
(8, 'os', 'cse', 'puneet', 875432, 10, '2017-11-17 16:55:14', 10),
(9, 'software testing', 'cse', 'abc', 676567, 10, '2017-11-18 14:12:41', 9),
(10, 'Web technology', 'cse', 'abc', 456456, 10, '2017-11-21 11:43:46', 10),
(11, 'Introduction to C', 'cse', 'Yashwant', 789789, 10, '2017-11-22 19:42:22', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnStatus`) VALUES
(10, 1111, '151239', '2017-11-18 13:58:18', 1),
(11, 1111, '151239', '2017-11-18 14:16:34', 1),
(14, 789789, '151240', '2017-11-22 19:42:52', 0),
(15, 676567, '151240', '2017-11-22 19:43:56', 0),
(16, 794562, '151240', '2017-11-22 19:44:52', 0),
(17, 222333, '151247', '2017-11-22 19:45:19', 0),
(18, 789789, '151247', '2017-11-22 19:45:37', 0),
(19, 12345678, '151239', '2017-11-22 19:46:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `RegDate`, `UpdationDate`) VALUES
(11, '151239', 'Ikjot Singh', 'ikjotrok1997@gmail.com', '9816697739', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2017-11-16 17:06:43', '2017-11-18 22:16:30'),
(14, '151240', 'Samiksha Gupta', 'samiksha@gmail.com', '8629010324', '332532dcfaa1cbf61e2a266bd723612c', '2017-11-22 19:40:17', NULL),
(15, '151247', 'Pawan Palariya', 'pawanpalariya@gmail.com', '8630788179', '40eb95572d967a62183292ef5f78bf9a', '2017-11-22 19:41:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
