-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 01:24 PM
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
-- Table structure for table `emp_acr`
--

CREATE TABLE `emp_acr` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  `TOTAL_POINT` int(11) NOT NULL,
  `DECISION_STEPS` varchar(1) DEFAULT NULL COMMENT '1 = Eligible to rank promotion, 2 = Ineligible to rank promotion, 3 = Reach to maximum limit for this post',
  `COMMENT` varchar(150) DEFAULT NULL,
  `ACR_RESULT` tinyint(1) DEFAULT NULL,
  `DECISION_BY` int(11) NOT NULL,
  `DECISION_MAKER_DESIGNATION_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `ACR_YEAR` year(4) NOT NULL DEFAULT 0000,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL,
  `MODIFIED_DATE` datetime DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  `IS_DELETED` tinyint(1) DEFAULT 0 COMMENT '0= Not Deleted, 1= Deleted',
  `DELETED_BY` int(11) DEFAULT NULL,
  `DELETED_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_acr`
--

INSERT INTO `emp_acr` (`ID`, `EMPLOYEE_ID`, `TOTAL_POINT`, `DECISION_STEPS`, `COMMENT`, `ACR_RESULT`, `DECISION_BY`, `DECISION_MAKER_DESIGNATION_ID`, `DATE`, `ACR_YEAR`, `CREATED_DATE`, `CREATED_BY`, `MODIFIED_DATE`, `MODIFIED_BY`, `IS_DELETED`, `DELETED_BY`, `DELETED_DATE`) VALUES
(0, 1, 47643, '0', NULL, NULL, 0, 0, '0000-00-00', 2020, '2020-09-22 10:09:44', 0, NULL, NULL, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
