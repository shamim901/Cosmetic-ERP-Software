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
-- Table structure for table `emp_documentation_status`
--

CREATE TABLE `emp_documentation_status` (
  `DOC_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `NID_STATUS_FILE` varchar(200) DEFAULT NULL,
  `PV_STATUS_FILE` varchar(200) DEFAULT NULL,
  `JAS_STATUS_FILE` varchar(200) DEFAULT NULL,
  `NDA_STATUS_FILE` varchar(200) DEFAULT NULL,
  `DL_STATUS_FILE` varchar(200) DEFAULT NULL,
  `PASSPORT_STATUS_FILE` varchar(200) DEFAULT NULL,
  `EDUCATIONAL_STATUS_FILE` varchar(200) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL DEFAULT 0,
  `CREATED_DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
