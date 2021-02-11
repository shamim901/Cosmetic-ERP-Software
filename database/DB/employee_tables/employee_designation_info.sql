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
-- Table structure for table `employee_designation_info`
--

CREATE TABLE `employee_designation_info` (
  `DESIGNATION_ID` int(11) NOT NULL,
  `DESIGNATION_NAME` varchar(50) CHARACTER SET latin1 NOT NULL,
  `DESIGNATION_NAME_BANGLA` varchar(60) DEFAULT NULL,
  `GRADE_ID` int(11) NOT NULL,
  `LEVEL` tinyint(4) DEFAULT 0,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) DEFAULT NULL,
  `MODIFIED_DATE` datetime DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active.',
  `IS_DELETED` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Deleted, 0= Not Deleted',
  `DELETED_BY` int(11) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_designation_info`
--

INSERT INTO `employee_designation_info` (`DESIGNATION_ID`, `DESIGNATION_NAME`, `DESIGNATION_NAME_BANGLA`, `GRADE_ID`, `LEVEL`, `CREATED_BY`, `CREATED_DATE`, `MODIFIED_BY`, `MODIFIED_DATE`, `STATUS`, `IS_DELETED`, `DELETED_BY`, `DELETED_DATE`) VALUES
(1, 'General Manager', 'মহাব্যবস্থাপক', 1, 1, 1, '2016-02-06 23:08:59', 1, '2017-02-11 06:59:18', 1, 0, NULL, NULL),
(2, 'Manager', 'ব্যবস্থাপক', 1, 0, 1, '2016-02-07 18:41:10', 1, '2016-02-25 10:47:04', 1, 0, NULL, NULL),
(3, 'Assistant Manager', 'সহকারী ব্যবস্থাপক', 2, 0, 1, '2016-02-24 21:47:41', NULL, NULL, 1, 0, NULL, NULL),
(4, 'Managing Director', 'পরিচালন অধিকর্তা', 2, 0, 1, '2016-02-24 21:52:29', NULL, NULL, 1, 0, NULL, NULL),
(5, 'Deputy Managing Director', 'উপ - ব্যবস্থাপনা পরিচালক', 2, 0, 1, '2016-02-24 21:54:38', NULL, NULL, 1, 0, NULL, NULL),
(6, 'Chief Financial Officer', ' প্রধান অর্থনৈতিক কর্মকর্তা', 1, 0, 1, '2016-02-24 21:56:16', NULL, NULL, 1, 0, NULL, NULL),
(7, 'Executive Vice President', 'নির্বাহী উপরাষ্ট্রপতি', 1, 0, 1, '2016-02-24 21:57:28', NULL, NULL, 1, 0, NULL, NULL),
(8, 'Senior Vice President', 'জ্যেষ্ঠ সভাপতি', 2, 0, 1, '2016-02-24 21:58:37', 1, '2016-03-20 06:27:53', 1, 0, NULL, NULL),
(9, 'First Vice President', 'জ্যেষ্ঠ সহসভাপতি', 2, 0, 1, '2016-02-24 21:59:47', 1, '2017-01-19 05:06:33', 1, 0, NULL, NULL),
(10, 'Vice President', 'উপরাষ্ট্রপতি', 1, 0, 1, '2016-02-24 22:01:29', NULL, NULL, 1, 0, NULL, NULL),
(11, 'Senior Assistant Vice President', 'সিনিয়র সহকারী ভাইস প্রেসিডেন্ট', 2, 0, 1, '2016-02-24 22:02:48', NULL, NULL, 1, 0, NULL, NULL),
(12, 'First Assistant Vice President', ' প্রথম সহকারী ভাইস প্রেসিডেন্ট', 1, 0, 1, '2016-02-24 22:03:45', NULL, NULL, 1, 0, NULL, NULL),
(13, 'Executive Vice President', 'নির্বাহী উপরাষ্ট্রপতি', 2, 0, 1, '2016-02-24 22:04:47', NULL, NULL, 1, 0, NULL, NULL),
(14, 'Assistant Vice President', 'সহকারী উপ সভাপতি', 1, 0, 1, '2016-02-24 22:07:49', NULL, NULL, 1, 0, NULL, NULL),
(15, 'Pion', 'পিওন ', 21, 0, 1, '2016-04-23 01:03:06', NULL, NULL, 1, 0, NULL, NULL),
(16, 'MLSS', 'এম এল এস এস ', 20, 0, 1, '2016-04-23 01:03:48', NULL, NULL, 1, 0, NULL, NULL),
(17, 'Guard', 'দারওয়ান', 21, 0, 1, '2016-04-23 01:04:19', NULL, NULL, 1, 0, NULL, NULL),
(18, 'Sweeper', 'ঝাড়ুদার ', 21, 0, 1, '2016-04-23 01:05:39', NULL, NULL, 1, 0, NULL, NULL),
(19, 'Kerani', 'কেরানি', 20, 17, 1, '2017-02-11 01:54:05', NULL, NULL, 1, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
