-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 07:10 AM
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
-- Table structure for table `district_office`
--

CREATE TABLE `district_office` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ofice_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district_office`
--

INSERT INTO `district_office` (`id`, `name`, `ofice_name`, `address`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(2, 'Feni', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(3, 'Brahmanbaria', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(4, 'Rangamati', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(5, 'Noakhali', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(6, 'Chandpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, 'Lakshmipur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(8, 'Chattogram', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(9, 'Coxsbazar', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(10, 'Khagrachhari', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(11, 'Bandarban', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(12, 'Sirajganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(13, 'Pabna', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(14, 'Bogura', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 'Rajshahi', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(16, 'Natore', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, 'Joypurhat', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(18, 'Chapainawabganj', 'শিবগঞ্জ অফিস', 'শিব', 'msreza@901', '৪৩৩৪৬৪৩', 0, NULL, NULL),
(19, 'Naogaon', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(20, 'Jashore', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(21, 'Satkhira', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(22, 'Meherpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(23, 'Narail', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(24, 'Chuadanga', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(25, 'Kushtia', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(26, 'Magura', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(27, 'Khulna', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(28, 'Bagerhat', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(29, 'Jhenaidah', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(30, 'Jhalakathi', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(31, 'Patuakhali', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(32, 'Pirojpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(33, 'Barisal', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(34, 'Bhola', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(35, 'Barguna', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(36, 'Sylhet', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(37, 'Moulvibazar', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(38, 'Habiganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(39, 'Sunamganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(40, 'Narsingdi', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(41, 'Gazipur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(42, 'Shariatpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(43, 'Narayanganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(44, 'Tangail', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(45, 'Kishoreganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(46, 'Manikganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(47, 'Dhaka', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(48, 'Munshiganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(49, 'Rajbari', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(50, 'Madaripur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(51, 'Gopalganj', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(52, 'Faridpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(53, 'Panchagarh', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(54, 'Dinajpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(55, 'Lalmonirhat', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(56, 'Nilphamari', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(57, 'Gaibandha', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(58, 'Thakurgaon', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(59, 'Rangpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(60, 'Kurigram', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(61, 'Sherpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(62, 'Mymensingh', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(63, 'Jamalpur', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(64, 'Netrokona', NULL, NULL, NULL, NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district_office`
--
ALTER TABLE `district_office`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
