-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 05:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `teamlead` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `teammember1` varchar(20) NOT NULL,
  `usn1` varchar(10) NOT NULL,
  `teammember2` varchar(20) NOT NULL,
  `usn2` varchar(10) NOT NULL,
  `teammember3` varchar(20) NOT NULL,
  `usn3` varchar(10) NOT NULL,
  `domain` varchar(15) NOT NULL,
  `projectname` varchar(80) NOT NULL,
  `section` varchar(1) NOT NULL,
  `email` varchar(35) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`teamlead`, `usn`, `teammember1`, `usn1`, `teammember2`, `usn2`, `teammember3`, `usn3`, `domain`, `projectname`, `section`, `email`, `time`) VALUES
('har', '1ep16cs099', 'var', '1ep16cs089', 'hqe', '1ep16cs088', 'dfr', '1ep16cs045', 'machine learnin', 'data jaiii', 'B', 'harithgriyer@gmail.com', '2019-11-12 16:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`usn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `projectname` (`projectname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
