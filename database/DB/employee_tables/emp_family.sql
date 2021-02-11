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
-- Table structure for table `emp_family`
--

CREATE TABLE `emp_family` (
  `EMP_FAMILY_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `NAME_BENGALI` varchar(100) DEFAULT NULL,
  `RELATION` tinyint(2) NOT NULL,
  `BIRTH_DATE` date NOT NULL,
  `AGE` tinyint(2) DEFAULT NULL,
  `OCCPATION` int(11) DEFAULT NULL,
  `CONTACT_NO` varchar(15) DEFAULT NULL,
  `RECORD_CREATED_DATE_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `RECORD_MODIFY_DATE_TIME` datetime DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `MODIFY_BY` int(11) DEFAULT NULL,
  `IS_DELETED` tinyint(1) DEFAULT 0 COMMENT '0=Not Deleted, 1= Deleted',
  `DELETED_BY` int(11) DEFAULT NULL,
  `DELETED_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_family`
--

INSERT INTO `emp_family` (`EMP_FAMILY_ID`, `EMP_ID`, `NAME`, `NAME_BENGALI`, `RELATION`, `BIRTH_DATE`, `AGE`, `OCCPATION`, `CONTACT_NO`, `RECORD_CREATED_DATE_TIME`, `RECORD_MODIFY_DATE_TIME`, `CREATED_BY`, `MODIFY_BY`, `IS_DELETED`, `DELETED_BY`, `DELETED_DATE`) VALUES
(1, 1, 'Shamim', 'nn', 0, '0000-00-00', 0, 0, '0', '2020-09-21 17:14:10', NULL, 0, NULL, 0, NULL, NULL),
(2, 1, 'jnjn', 'nj', 0, '0000-00-00', 0, 0, '0', '2020-09-22 07:46:54', NULL, 0, NULL, 0, NULL, NULL),
(3, 1, ',l,', ',', 0, '0000-00-00', NULL, 0, '0', '2020-09-22 08:38:16', NULL, 0, NULL, 0, NULL, NULL),
(4, 1, '', '', 0, '0000-00-00', 0, 0, '0', '2020-09-22 09:14:48', NULL, 0, NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_family`
--
ALTER TABLE `emp_family`
  ADD PRIMARY KEY (`EMP_FAMILY_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_family`
--
ALTER TABLE `emp_family`
  MODIFY `EMP_FAMILY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
