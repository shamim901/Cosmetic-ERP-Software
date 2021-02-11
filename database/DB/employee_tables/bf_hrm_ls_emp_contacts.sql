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
-- Table structure for table `bf_hrm_ls_emp_contacts`
--

CREATE TABLE `bf_hrm_ls_emp_contacts` (
  `EMP_CONTACTS_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `PRESENT_POST_OFFICE_ID` int(7) DEFAULT NULL,
  `PRESENT_CITY_TOWN` varchar(100) DEFAULT NULL,
  `PRESENT_CITY_TOWN_BENGALI` varchar(100) DEFAULT NULL,
  `PERMANENT_POST_OFFICE_ID` int(7) DEFAULT NULL,
  `PERMANENT_CITY_VILLAGE` varchar(100) DEFAULT NULL,
  `PERMANENT_CITY_VILLAGE_BENGALI` varchar(100) DEFAULT NULL,
  `PRESENT_ADDRESS` text NOT NULL,
  `PERMANENT_ADDRESS` text NOT NULL,
  `TELEPHONE` varchar(15) DEFAULT NULL,
  `MOBILE` varchar(15) NOT NULL,
  `ALTERNATIVE_MOBILE` varchar(15) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `FAX_NO` varchar(30) DEFAULT NULL,
  `EMERGENCY_CONTACT_PERSON` varchar(50) DEFAULT NULL,
  `RELATION` tinyint(2) DEFAULT NULL,
  `EMERGENCY_CONTACT_NO` varchar(15) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `MODIFY_BY` int(11) DEFAULT NULL,
  `MODIFY_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
