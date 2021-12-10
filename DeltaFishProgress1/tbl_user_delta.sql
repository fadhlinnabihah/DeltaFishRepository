-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 03:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a174777`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_delta`
--

CREATE TABLE `tbl_user_delta` (
  `USERNAME` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `FPASSQ` text NOT NULL,
  `FPASS` varchar(255) NOT NULL,
  `BANKNO` int(50) DEFAULT NULL,
  `BANKNAME` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_delta`
--

INSERT INTO `tbl_user_delta` (`USERNAME`, `PASS`, `NAME`, `EMAIL`, `PHONE`, `FPASSQ`, `FPASS`, `BANKNO`, `BANKNAME`) VALUES
('', '', '', '', '', '', '', NULL, NULL),
('Demo1', '1234', 'Demo Account', 'demo1@gmail.com', '017-1234567', '', '', 21345678, 'Maybank'),
('maricuba', '123456', 'mari cuba', 'maricuba@mail.com', '0123456789', 'petname', 'comel', NULL, NULL),
('maricubatry', '123456', 'mari cuba try', 'maricubatry@yahoo.com', '0123456789', 'petname', 'hitam', NULL, NULL),
('test', '123456', 'test1', 'test1@gmail.com', '017-2345678', 'birthplace', 'hkl', 765432356, 'Bank Islam'),
('test2', '123456', 'test test', 'test2@mail.com', '012-3456432', 'primaryschool', 'skukm', NULL, NULL),
('ujisatu', '123456', 'Uji Satu', 'ujisatu@gmail.com', '012-3456789', 'mothername', 'siti', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user_delta`
--
ALTER TABLE `tbl_user_delta`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
