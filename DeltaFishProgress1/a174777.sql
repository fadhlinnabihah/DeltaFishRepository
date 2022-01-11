-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 01:42 AM
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


- Table structure for table `tbl_order_delta`
--

CREATE TABLE `tbl_order_delta` (
  `fld_order_num` varchar(255) NOT NULL,
  `fld_order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `fld_seller_id` varchar(255) DEFAULT NULL,
  `fld_customer_id` varchar(255) DEFAULT NULL,
  `tbl_payment` varchar(255) NOT NULL,
  `tbl_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail_delta`
--

CREATE TABLE `tbl_order_detail_delta` (
  `fld_order_detail_num` varchar(255) NOT NULL,
  `fld_order_num` varchar(255) NOT NULL,
  `fld_product_num` varchar(255) NOT NULL,
  `fld_order_detail_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productbid_delta`
--

CREATE TABLE `tbl_productbid_delta` (
  `ID` int(11) NOT NULL,
  `PICTURE` varchar(50) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `SELLER` varchar(50) NOT NULL,
  `DUEDATE` datetime NOT NULL,
  `HIGHESTBID` int(11) NOT NULL,
  `HIGHESTBIDDER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productbid_delta`
--

INSERT INTO `tbl_productbid_delta` (`ID`, `PICTURE`, `NAME`, `DESCRIPTION`, `SELLER`, `DUEDATE`, `HIGHESTBID`, `HIGHESTBIDDER`) VALUES
(1, '1.jpg', 'Apollo Shark', 'These sharks have a fast growth rate and would increase to a maximum size of about 9 inches in an aquarium if taken care of properly and kept in good water conditions. Silver Apollo sharks have a great lifespan and can live up to about 14 years or more in', 'raja_sing90', '2021-11-26 19:31:57', 200, 'King1009'),
(2, '2.jpg', 'Cory Agassizi', 'The Agassizi\'s Cory Catfish is a very peaceful schooling fish that is compatible with most nano aquarium animals, including dwarf cichlids and angelfish. It might prey on some smaller dwarf shrimp, but is safe with larger shrimp and most other peaceful or', 'betta_new', '2021-11-12 01:35:54', 50, 'GOGOGOL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productsell_delta`
--

CREATE TABLE `tbl_productsell_delta` (
  `ID` int(11) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `SELLER` varchar(50) DEFAULT NULL,
  `PRICE` int(11) NOT NULL,
  `STOCK` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productsell_delta`
--

INSERT INTO `tbl_productsell_delta` (`ID`, `PICTURE`, `NAME`, `DESCRIPTION`, `SELLER`, `PRICE`, `STOCK`) VALUES
(1, '1.jpg', 'Red leopard', 'The red leopard snake skin discus is one of the most interestingly patterned discus available. It is a cultivated discus, particularly the result of cross breeding a leopard discus with a snakeskin discus, which gives the red leopard snake skin discus its unusual appearance. As with all cultivated discus, it has been bred to enhance the vivid color and interesting markings. The leopard discus has been bred to produce a spotted appearance, and snake skin discus has thin striations that resemble the skin of a snake. When bred together, the leopard and snake skin discus create a beautiful, striking pattern that combines the better of the two for a truly spectacular combination.', 'amin1989', 3000, 6),
(2, '2.jpg', 'Siamese Fighting Fish', 'Bettas reproduce through spawning, starting with a mating dance in which the male and female spiral around each other. The male builds a bubble nest and proceeds to guard the eggs as well as raise the young. Gestation is 24-36 hours and the young stay in the nest until their bodies absorb their yolk sacs. The typical lifespan of the betta is 3-5 years with proper care.', 'gol89', 259, 2),
(3, '3.jpg', 'Seabass', '', NULL, 25, 2),
(4, '4.jpg', 'Keli', 'keli viral', NULL, 300, 6),
(5, '5.jpg', 'Ikan Kelah', '', NULL, 200, 4),
(6, '6.jpg', 'Gold Fish', '', NULL, 230, 6);

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
('Demo1', '1234', 'Demo Account', 'demo1@gmail.com', '017-1234567', '', '', 21345678, 'Maybank'),
('maricuba', 'abcdef', 'mari cuba', 'maricuba@mail.com', '0123456789', 'petname', 'comel', NULL, NULL),
('maricubatry', '123456', 'mari cuba try', 'maricubatry@yahoo.com', '0123456789', 'petname', 'hitam', NULL, NULL),
('test', 'abcdef', 'test1', 'test1@gmail.com', '017-2345678', 'birthplace', 'hkl', 765432356, 'Bank Islam'),
('test2', 'abcdefg', 'test test', 'test2@mail.com', '012-3456432', 'primaryschool', 'skukm', NULL, NULL),
('ujisatu', 'abcdef', 'Uji Satu', 'ujisatu@gmail.com', '012-3456789', 'mothername', 'siti', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_productbid_delta`
--
ALTER TABLE `tbl_productbid_delta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_productsell_delta`
--
ALTER TABLE `tbl_productsell_delta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_delta`
--
ALTER TABLE `tbl_user_delta`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_productbid_delta`
--
ALTER TABLE `tbl_productbid_delta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_productsell_delta`
--
ALTER TABLE `tbl_productsell_delta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `tbl_order_delta` CHANGE `fld_seller_id` `fld_seller_user` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL, CHANGE `fld_customer_id` `fld_customer_user` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL; 

ALTER TABLE `tbl_user_delta` ADD `ADDRESS` VARCHAR(255) NULL DEFAULT NULL AFTER `BANKNAME`; 