-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 09:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jda2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tadmin`
--

CREATE TABLE `tadmin` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tbday`
--

CREATE TABLE `tbday` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `timages`
--

CREATE TABLE `timages` (
  `id` int(11) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Active` varchar(10) NOT NULL,
  `Ordr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tmain`
--

CREATE TABLE `tmain` (
  `tid` int(11) NOT NULL,
  `Application` varchar(50) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmain`
--

INSERT INTO `tmain` (`tid`, `Application`, `Source`, `Active`) VALUES
(1, 'Webpage', 'twebpage', 'yes'),
(2, 'Message', 'tmessages', 'yes'),
(3, 'Image', 'timages', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tmessages`
--

CREATE TABLE `tmessages` (
  `Mid` int(11) NOT NULL,
  `Source` varchar(200) NOT NULL,
  `Font` varchar(100) NOT NULL,
  `Size` int(11) NOT NULL,
  `Active` varchar(10) NOT NULL,
  `Ordr` int(11) NOT NULL,
  `Fcolor` varchar(50) NOT NULL,
  `Bcolor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `twebpage`
--

CREATE TABLE `twebpage` (
  `wid` int(11) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Active` varchar(20) NOT NULL,
  `Ordr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tadmin`
--
ALTER TABLE `tadmin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tbday`
--
ALTER TABLE `tbday`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `timages`
--
ALTER TABLE `timages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Ordr` (`Ordr`);

--
-- Indexes for table `tmain`
--
ALTER TABLE `tmain`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tmessages`
--
ALTER TABLE `tmessages`
  ADD PRIMARY KEY (`Mid`),
  ADD UNIQUE KEY `Ordr` (`Ordr`);

--
-- Indexes for table `twebpage`
--
ALTER TABLE `twebpage`
  ADD PRIMARY KEY (`wid`),
  ADD UNIQUE KEY `Ordr` (`Ordr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tadmin`
--
ALTER TABLE `tadmin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbday`
--
ALTER TABLE `tbday`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `timages`
--
ALTER TABLE `timages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tmain`
--
ALTER TABLE `tmain`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmessages`
--
ALTER TABLE `tmessages`
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `twebpage`
--
ALTER TABLE `twebpage`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
