-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 01:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coxsbike_ifb_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_bank_info`
--

CREATE TABLE `emp_bank_info` (
  `EMP_BANK_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `BANK_name` varchar(11) DEFAULT NULL,
  `ACCOUNT_NAME` varchar(100) NOT NULL,
  `ACCOUNT_NO` varchar(20) NOT NULL,
  `BRANCH_ID` varchar(11) NOT NULL,
  `IS_DELETED` int(11) NOT NULL DEFAULT 0,
  `RECORD_DATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CREATED_BY` int(11) NOT NULL,
  `MODIFY_BY` int(11) DEFAULT NULL,
  `MODIFY_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_bank_info`
--

INSERT INTO `emp_bank_info` (`EMP_BANK_ID`, `EMP_ID`, `BANK_name`, `ACCOUNT_NAME`, `ACCOUNT_NO`, `BRANCH_ID`, `IS_DELETED`, `RECORD_DATE_TIME`, `CREATED_BY`, `MODIFY_BY`, `MODIFY_DATE`) VALUES
(1, 1, '0', 'njnj', 'bjb', '0', 0, '2020-09-22 09:54:46', 0, NULL, NULL),
(2, 1, 'Islamic', 'Shamim', '56', 'Shib', 0, '2020-09-22 09:57:47', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_bank_info`
--
ALTER TABLE `emp_bank_info`
  ADD PRIMARY KEY (`EMP_BANK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_bank_info`
--
ALTER TABLE `emp_bank_info`
  MODIFY `EMP_BANK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
