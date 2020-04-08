-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 05:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whitelakeinformationmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `Account_ID` int(8) NOT NULL,
  `Staff_ID` int(8) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Account_Type` int(10) NOT NULL,
  `Account_Status` text NOT NULL,
  `Pass_Update` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Staff_ID`, `Username`, `Password`, `Account_Type`, `Account_Status`, `Pass_Update`) VALUES
(45, 42, 'cgray00', 'fa6a5a3224d7da66d9e0bdec25f62cf0', 5, 'Active', '2018-06-14'),
(47, 44, 'ttest00', 'e9e80e4c18de8e9abe79098ba852f181', 1, 'FirstLogin', '2018-05-06'),
(48, 45, 'ttest01', '0ee0293204e598329f3d894806b76873', 2, 'FirstLogin', '2018-05-06'),
(50, 47, 'ttest03', '1aacc709e3a59681f60c7cfa35d3f2e5', 3, 'FirstLogin', '2018-05-06'),
(51, 47, 'ttest04', 'b9880131524ea4afa9300356d2477158', 4, 'FirstLogin', '2018-05-06'),
(52, 48, 'ttest04', 'b9880131524ea4afa9300356d2477158', 4, 'FirstLogin', '2018-05-06'),
(53, 49, 'ttest06', '37701e3d28491669ab5eaa1467eb8d50', 1, 'Active', '2018-05-10'),
(54, 50, 'ttest07', '9b6b249ca27284311db1df1aae014ea8', 2, 'Active', '2018-05-11'),
(55, 51, 'ttest08', '6b7330782b2feb4924020cc4a57782a9', 3, 'Active', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `docstore`
--

CREATE TABLE IF NOT EXISTS `docstore` (
  `DocStore_ID` int(30) NOT NULL,
  `Staff_ID` int(8) NOT NULL,
  `File_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `market_stock`
--

CREATE TABLE IF NOT EXISTS `market_stock` (
  `MStock_ID` int(8) NOT NULL,
  `Stock_ID` int(8) NOT NULL,
  `Staff_ID` int(8) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Market_Price` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_stock`
--

INSERT INTO `market_stock` (`MStock_ID`, `Stock_ID`, `Staff_ID`, `Quantity`, `Market_Price`) VALUES
(4, 16, 42, 190, 9),
(6, 18, 42, 22, 9);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Staff_ID` int(8) NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Job_Role` text NOT NULL,
  `Employment_Start` date NOT NULL,
  `Employment_End` date NOT NULL,
  `DOB` date NOT NULL,
  `Address1` varchar(50) NOT NULL,
  `Address2` varchar(50) NOT NULL,
  `Address3` varchar(50) NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone_No` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `First_Name`, `Last_Name`, `Job_Role`, `Employment_Start`, `Employment_End`, `DOB`, `Address1`, `Address2`, `Address3`, `Postcode`, `Email`, `Phone_No`) VALUES
(42, 'Chez', 'Gray', 'Sales Director', '2018-03-24', '0000-00-00', '1996-06-17', '50 Royal Parade', 'Flat 414 B', 'Plymouth', 'PL1 1DZ', 'tester@test.com', '2147483647'),
(44, 'Test', 'Test', 'Sales Director', '2018-03-25', '0000-00-00', '1985-03-07', 'test1', '', '', 'test1111', 'test1@test.com', '2147483647'),
(45, 'Test', 'Test', 'Production Director', '2018-03-25', '0000-00-00', '1998-03-05', 'test2', '', '', 'test2222', 'test2@test.com', '2147483647'),
(47, 'Test', 'Test', 'Sales Director', '2018-03-25', '0000-00-00', '1998-03-06', 'test', '', 'test', '74747474', 'test@test.com', '2147483647'),
(48, 'Test', 'Test', 'Sales Director', '2018-03-25', '0000-00-00', '1999-03-04', 'test', '', '', 'test1323', 'test@test.com', '54355434355'),
(49, 'Test', 'Test', 'Packing Department', '2018-03-30', '0000-00-00', '1996-03-06', 'tested', 'tested', 'tested', 'tested11', 'test@testing.com', '2196312783'),
(50, 'Test', 'Test', 'Sales Director', '2018-03-30', '0000-00-00', '1999-03-10', 'test', 'test', 'test', 'test1213', 'testlevel2@test.com', '80980980980'),
(51, 'Test', 'Test', 'Sales Director', '2018-03-30', '0000-00-00', '1993-03-17', 'test', 'test', 'test', 'test2312', 'testlevel3@test.com', '26723462342');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_ID` int(8) NOT NULL,
  `Staff_ID` int(8) NOT NULL,
  `Name` text NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Milk_Type` text NOT NULL,
  `Pastuerised_Stat` text NOT NULL,
  `Rennet` text NOT NULL,
  `Style` text NOT NULL,
  `Weight_Est` varchar(30) NOT NULL,
  `Origin` text NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Prod_Stat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_ID`, `Staff_ID`, `Name`, `Description`, `Milk_Type`, `Pastuerised_Stat`, `Rennet`, `Style`, `Weight_Est`, `Origin`, `Quantity`, `Price`, `Prod_Stat`) VALUES
(16, 50, 'KATHERINE', 'test', 'Cows', 'Yes (Thermised)', '', 'test', 'test', 'test', 99, 5, 'Low Production'),
(18, 42, 'LILLY / LITTLE LILLY', 'The lovely Lilly is a classically mild and creamy unpasteurised goat cheese. This brie-style cheese has a bloomy rind that is vibrant white in colour. Artisan goat cheese at its best, created in Somerset.	', 'Goats', 'Yes (Thermised)', 'Vegetarian', 'Soft', '125g / 230g', 'Somerset', 58, 5, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `docstore`
--
ALTER TABLE `docstore`
  ADD PRIMARY KEY (`DocStore_ID`);

--
-- Indexes for table `market_stock`
--
ALTER TABLE `market_stock`
  ADD PRIMARY KEY (`MStock_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Stock_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `docstore`
--
ALTER TABLE `docstore`
  MODIFY `DocStore_ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `market_stock`
--
ALTER TABLE `market_stock`
  MODIFY `MStock_ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Stock_ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
