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
-- Table structure for table `emp_job_history`
--

CREATE TABLE `emp_job_history` (
  `JOB_HIS_ID` int(10) UNSIGNED NOT NULL,
  `EMP_ID` int(10) UNSIGNED DEFAULT NULL,
  `DESIGNATION_ID` int(11) DEFAULT NULL,
  `inst_name` varchar(255) DEFAULT NULL,
  `TRANSFER_REMARKS` text DEFAULT NULL,
  `DATE_TO` datetime DEFAULT NULL,
  `DATE_FROM` datetime DEFAULT NULL,
  `ENTRY_REASON` tinyint(2) DEFAULT NULL COMMENT '1 = Posting, 2=Transfer, 3=Promotion, 4=Timescale, 5=PRL, 6=Attikoron',
  `CREATED_BY` int(10) UNSIGNED DEFAULT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_job_history`
--

INSERT INTO `emp_job_history` (`JOB_HIS_ID`, `EMP_ID`, `DESIGNATION_ID`, `inst_name`, `TRANSFER_REMARKS`, `DATE_TO`, `DATE_FROM`, `ENTRY_REASON`, `CREATED_BY`, `CREATED_DATE`) VALUES
(0, 1, NULL, 'nnjn', 'nnjn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, '2020-09-21 17:34:08'),
(0, 1, NULL, 'jnjn', 'jn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, '2020-09-22 07:47:07'),
(0, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-09-22 08:38:19'),
(0, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-09-22 09:14:56'),
(0, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-09-22 09:15:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
