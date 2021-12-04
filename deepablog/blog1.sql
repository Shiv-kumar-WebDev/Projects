-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 09:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_id` varchar(255) NOT NULL,
  `imgSrc` longtext NOT NULL,
  `user` varchar(255) NOT NULL,
  `clock` text NOT NULL,
  `title` longtext NOT NULL,
  `blog_description` longtext NOT NULL,
  `popular_post` int(11) NOT NULL DEFAULT 0 COMMENT 'popular post = 1, not popular post = 0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`id`, `category_id`, `subcategory_id`, `imgSrc`, `user`, `clock`, `title`, `blog_description`, `popular_post`, `created_at`, `status`) VALUES
(19, '16', '27', '1633419163-blog.jpg', '', '', 'Learn everything Simplified', 'The Feynman Learning Technique is a simple way of approaching anything new you want ... You can better explain the why behind your description of the what.The Feynman Learning Technique is a simple way of approaching anything new you want ... You can better explain the why behind your description of the what.', 1, '2021-10-05 13:02:43', 1),
(20, '17', '31', '1633419209-blog1.jpg', '', '', 'Learn everything Simplified', 'This course gives you easy access to the invaluable learning techniques used by ... different learning modes and how it encapsulates (“chunks”) information.This course gives you easy access to the invaluable learning techniques used by ... different learning modes and how it encapsulates (“chunks”) information.', 1, '2021-10-05 13:03:29', 1),
(21, '17', '31', '1633419248-blog2.jpg', '', '', 'Learn everything Simplified', 'This free online 4-week course will help you learn basic English skills. ... All of these activities will improve your confidence in elementary English.This free online 4-week course will help you learn basic English skills. ... All of these activities will improve your confidence in elementary English.', 1, '2021-10-05 13:04:08', 1),
(22, '21', '32', '1633506406-blog4.jpg', '', '', 'Museum Job Descriptions It takes many, many people to run a museum', 'Museum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museumMuseum Job Descriptions It takes many, many people to run a museum', 1, '2021-10-06 13:16:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`) VALUES
(16, 'Fashion', 1),
(17, 'Health', 1),
(18, 'Beauty', 1),
(21, 'Museum', 1),
(22, 'light', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_website` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `comment_status` int(11) NOT NULL DEFAULT 0 COMMENT '1=approve 0=not approve',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `blog_id`, `comment_name`, `comment_email`, `comment_website`, `message`, `comment_status`, `created_at`) VALUES
(1, 19, 'dddd', 'admin@gmail.com', 'sssss', 'eeeeeee', 1, '2021-10-07 09:14:29');

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
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_id` varchar(255) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_title` text NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `blog_id`, `category_id`, `subcategory_id`, `slider_img`, `slider_title`, `slider_status`, `created_at`) VALUES
(13, 0, '21', '32', '1633415785-slide3-3.jpg', 'Generating a title for a museum show involves curators', 1, '2021-10-05 06:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `name`, `status`) VALUES
(27, 18, 'facecare', 1),
(31, 17, 'medical1', 1),
(32, 21, 'old museum', 1),
(33, 22, 'bulb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `create_admin`
--
ALTER TABLE `create_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD UNIQUE KEY `category_id` (`category_id`,`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
