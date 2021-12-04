-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 01:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coachfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `daydate` date NOT NULL,
  `costatus` int(11) NOT NULL COMMENT '0=>confirmation,1=>confirm,2=>decline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `coach_id`, `student_id`, `hours`, `daydate`, `costatus`) VALUES
(1, 2, 6, 3, '2021-01-24', 0),
(2, 3, 5, 3, '2021-01-28', 1),
(3, 1, 5, 7, '2021-01-09', 1),
(4, 1, 5, 3, '2021-01-13', 2),
(5, 1, 5, 23, '2021-01-28', 1),
(6, 1, 5, 71, '2021-01-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `create_admin`
--

CREATE TABLE `create_admin` (
  `id` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_admin`
--

INSERT INTO `create_admin` (`id`, `email`, `name`, `password`) VALUES
(1, 'admin@gmail.com', 'jitendra mehra', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `inetrest_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>requested,1=>accepted,2=>rejected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`inetrest_id`, `coach_id`, `student_id`, `status`) VALUES
(1, 1, 2, 1),
(2, 3, 5, 1),
(3, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `student_id`, `coach_id`, `rating`) VALUES
(1, 5, 1, 2),
(2, 5, 1, 3),
(3, 5, 1, 4),
(4, 5, 1, 4),
(5, 5, 1, 4),
(6, 5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=>active,0=>inactive',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `status`, `created`, `updated`) VALUES
(1, 'hindi', 1, 1611477612, 1611920342),
(2, 'english', 1, 1611477612, 1611477612),
(3, 'maths', 1, 1611477612, 1611477612),
(4, 'physics', 1, 1611918871, 1611953096),
(5, 'hindodi', 0, 1611952108, 1611952108),
(6, 'cvb', 0, 1611967770, 1611967770);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>admin,2=>coach,3=>student',
  `status` int(11) NOT NULL COMMENT '1=>active,0=>inactive',
  `subject_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `number`, `email`, `password`, `type`, `status`, `subject_id`, `created`, `updated`) VALUES
(1, 'jitendra mehra', 7078058343, 'jeetmehra2323@gmail.com', 'f22d795e490a8077d0d7546d2d3ec4b28f9cf54b', 2, 1, 2, 1611477528, 1611477874),
(2, 'vikram mehra', 8077605854, 'vikram123@gmail.com', '536874804ccbc5f27e37f391c27034468b046f9f', 3, 1, 0, 1611477612, 1611477612),
(3, 'jeet', 7078058343, 'jeetoo23@gmail.com', 'c6570d2ee226925a1ea887f8a56b3ccfa7c4bd4f', 2, 1, 1, 1611478641, 1611478641),
(4, 'asdfghnm', 12345678990, 'mea123@gmail.com', '3da541559918a808c2402bba5012f6c60b27661c', 3, 1, 0, 1611479822, 1611479822),
(5, 'nitin mehra', 1234567890, 'nitin@gmail.com', '44d16cbe12265f91d76bad742da61ab7194c0e5a', 3, 1, 0, 1611479866, 1611479900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `create_admin`
--
ALTER TABLE `create_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`inetrest_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `inetrest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
