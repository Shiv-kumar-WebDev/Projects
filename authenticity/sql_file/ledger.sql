-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2021 at 11:44 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authenticity`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `opening_stock` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `purchased_qty` int NOT NULL,
  `sold_qty` int NOT NULL,
  `waste_qty` int NOT NULL,
  `final_stock` int NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `month`, `opening_stock`, `product_id`, `variant_id`, `purchased_qty`, `sold_qty`, `waste_qty`, `final_stock`, `created`) VALUES
(1, 'Aug-2021', 0, 75, 0, 0, 0, 1, 10, '2021-10-20 23:32:09'),
(2, 'Aug-2021', 0, 78, 0, 0, 0, 1, 12, '2021-10-20 23:32:09'),
(3, 'Sep-2021', 10, 75, 0, 0, 0, 1, 10, '2021-10-20 23:41:46'),
(4, 'Sep-2021', 12, 78, 0, 0, 0, 1, 12, '2021-10-20 23:41:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
