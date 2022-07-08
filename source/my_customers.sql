-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 11:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_customers`
--

CREATE TABLE `my_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `street` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cre_time` datetime DEFAULT current_timestamp(),
  `mod_time` datetime DEFAULT current_timestamp(),
  `employee_id` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `my_customers` ADD CONSTRAINT `my_customers_ibfk_1`
FOREIGN KEY (`employee_id`) REFERENCES `my_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Dumping data for table `my_customers`
--

INSERT INTO `my_customers` (`id`, `name`, `phone`, `email`, `birthday`, `province`, `district`, `street`, `cre_time`, `mod_time`, `service_id`, `status`, `employee_id`) VALUES
(20, 'Dịch Dương Thiên Tỉ', '0123456789', '1@gmail.com', '2022-01-23 00:00:00', 1, 0, '152 Tây Kinh', '2022-01-23 11:51:19', '2022-01-23 11:51:19', 1, 0, NULL),
(21, 'Trần Thị Thu Hà', NULL, '2@gmail.com', '2022-01-23 05:49:50', 3, 4, '11 Tân Thời', '2022-01-23 11:51:19', '2022-01-23 11:51:19', 5, 0, NULL),
(23, 'Vương Trung Đỉnh', '0123456799', 'mrking@gmail.com', '1982-08-15 00:00:00', 49, 0, '17 Bắc Kinh', '2022-01-25 09:13:34', '0000-00-00 00:00:00', 10, 0, NULL),
(24, 'Triệu Trấn Bắc', '', '', '0000-00-00 00:00:00', 0, 0, '2022-01-25 09:18:24', '2022-01-25 09:18:24', '0000-00-00 00:00:00', 22, 1, NULL),
(54, 'Trần Thương', '', '', '0000-00-00 00:00:00', 0, 0, '', '2022-01-25 10:08:47', '2022-01-25 10:08:47', 18, 1, NULL),
(58, 'Tạ Kinh Vũ', '024632318541', 'dsa', '1955-04-12 00:00:00', 0, 0, '16 Tây Long', '2022-01-25 10:31:52', '2022-01-25 10:31:52', 4, 0, NULL),
(60, 'Hạ Dương', '', '', '0000-00-00 00:00:00', 49, 9, '102 Bắc Ái', '2022-01-25 11:00:38', '2022-01-25 11:00:38', 8, 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_customers`
--
ALTER TABLE `my_customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_customers`
--
ALTER TABLE `my_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
