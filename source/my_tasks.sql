-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 04:31 AM
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
-- Table structure for table `my_tasks`
--

CREATE TABLE `my_tasks` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_fee` int(11) NOT NULL,
  `warranty_period` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cre_time` datetime NOT NULL DEFAULT current_timestamp(),
  `place_time` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `employee_id` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_tasks`
--

INSERT INTO `my_tasks` (`id`, `customer_id`, `payment_fee`, `warranty_period`, `status`, `cre_time`, `place_time`, `note`, `employee_id`) VALUES
(7, 20, 0, '', 0, '2022-07-09 18:29:02', 'Mai', '', 4),
(8, 20, 0, '', 1, '2022-07-09 18:29:02', 'Mai', '', 4),
(9, 58, 123, '1 năm', 0, '2022-07-09 18:32:56', '15/5/25', '', 4),
(10, 58, 123, '1 năm', 0, '2022-07-09 18:32:56', '15/5/25', '', 4),
(11, 60, 12344, '2 tháng', 0, '2022-07-09 18:34:35', '12/12/22', 'Đi dạo', 8),
(12, 60, 12344, '2 tháng', 0, '2022-07-09 18:34:35', '12/12/22', 'Đi dạo', 8),
(13, 24, 1234, '1 tháng', 3, '2022-07-09 18:36:01', '15/7/2022', 'Đi dạo', 6),
(14, 24, 0, '', 0, '2022-07-09 19:01:05', 'mai', '', 7),
(15, 21, 0, '', 0, '2022-07-09 19:31:58', 'as', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_tasks`
--
ALTER TABLE `my_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FR_employees_tasks` (`employee_id`),
  ADD KEY `FR_customers_tasks` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_tasks`
--
ALTER TABLE `my_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `my_tasks`
--
ALTER TABLE `my_tasks`
  ADD CONSTRAINT `FR_customers_tasks` FOREIGN KEY (`customer_id`) REFERENCES `my_customers` (`id`),
  ADD CONSTRAINT `FR_employees_tasks` FOREIGN KEY (`employee_id`) REFERENCES `my_employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
