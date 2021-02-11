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
-- Table structure for table `employee_department`
--

CREATE TABLE `employee_department` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `department_name_bangla` varchar(50) DEFAULT NULL,
  `department_code` varchar(5) NOT NULL,
  `dept_level` tinyint(4) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive ',
  `created_by` int(11) NOT NULL DEFAULT 1,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not deleted, 1=Deleted',
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_department`
--

INSERT INTO `employee_department` (`dept_id`, `department_name`, `department_name_bangla`, `department_code`, `dept_level`, `status`, `created_by`, `created_time`, `is_deleted`, `deleted_by`, `deleted_date`, `modify_by`, `modify_date`) VALUES
(1, 'Project chief', 'প্রকল্প প্রধান', '01', 0, 1, 1, '2016-03-18 20:05:55', 0, NULL, NULL, NULL, NULL),
(2, 'Administration and labor', 'প্রশাসন ও শ্রম', '02', 0, 1, 1, '2016-03-18 20:31:01', 1, 1, '2016-03-19 09:35:21', NULL, NULL),
(3, 'Administration and head of the department of labor', 'প্রশাসন ও শ্রম কল্যাণ বিভাগীয় প্রধান', '02', 0, 1, 1, '2016-03-18 20:38:18', 0, NULL, NULL, NULL, NULL),
(4, 'Administration', 'প্রশাসন', '03', 0, 1, 1, '2016-03-18 20:40:21', 0, NULL, NULL, NULL, NULL),
(5, 'Labor welfare', 'শ্রম কল্যাণ', '04', 0, 1, 1, '2016-03-18 20:41:36', 0, NULL, NULL, NULL, NULL),
(6, 'Security', 'নিরাপত্তা', '05', 8, 1, 1, '2016-03-18 20:43:11', 0, NULL, NULL, 1, '2017-02-12 07:02:17'),
(7, 'School', 'বিদ্যালয়', '06', 0, 1, 1, '2016-03-18 20:44:41', 0, NULL, NULL, NULL, NULL),
(8, 'treatment', 'চিকিৎস্যা', '07', 0, 1, 1, '2016-03-18 21:22:36', 0, NULL, NULL, NULL, NULL),
(9, 'Accounts and Finance', 'হিসাব ও অর্থ', '08', 0, 1, 1, '2016-03-18 21:24:06', 0, NULL, NULL, NULL, NULL),
(10, 'Jute Division', 'পাট বিভাগ', '10', 0, 1, 1, '2016-03-18 21:26:48', 0, NULL, NULL, NULL, NULL),
(11, 'Jute Division (Warehouse)', 'পাট বিভাগ(গুদাম)', '11', 0, 1, 1, '2016-03-18 21:28:39', 0, NULL, NULL, NULL, NULL),
(12, 'Patakraya Center', 'পাটক্রয় কেন্দ্র', '12', 0, 1, 1, '2016-03-18 21:30:30', 0, NULL, NULL, NULL, NULL),
(13, 'Mechanical', 'যান্ত্রিক', '13', 0, 1, 1, '2016-03-18 21:31:48', 0, NULL, NULL, NULL, NULL),
(14, 'Planing', 'পরিকল্পনা', '16', 0, 1, 1, '2016-03-18 21:37:54', 0, NULL, NULL, 1, '2016-03-19 11:05:14'),
(15, 'Store', 'ভান্ডার', '17', 0, 1, 1, '2016-03-18 21:41:49', 0, NULL, NULL, 1, '2016-03-19 11:04:08'),
(16, 'Purchase treasures', 'ভান্ডার ক্রয়', '18', 0, 1, 1, '2016-03-18 21:43:08', 0, NULL, NULL, 1, '2016-03-19 10:44:10'),
(17, 'Marketing', 'বিপণন', '19', 0, 1, 1, '2016-03-18 21:46:09', 0, NULL, NULL, NULL, NULL),
(18, 'Standard operates', 'মান নিয়ন্তন', '20', 0, 1, 1, '2016-03-18 21:50:54', 0, NULL, NULL, NULL, NULL),
(19, 'Manufacturing', 'উৎপাদন', '09', 0, 1, 1, '2016-03-18 21:53:48', 0, NULL, NULL, NULL, NULL),
(20, 'Electricity', 'বিদ্যুৎ', '14', 0, 1, 1, '2016-03-18 21:58:48', 0, NULL, NULL, NULL, NULL),
(21, 'Civil Engineering', 'পুর প্রকৌশল', '15', 0, 1, 1, '2016-03-18 22:01:08', 0, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
