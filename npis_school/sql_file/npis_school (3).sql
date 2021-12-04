-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2021 at 10:01 AM
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
-- Database: `npis_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_phoneno` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email`, `password`, `username`, `admin_phoneno`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'deepa', 9087654321);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL,
  `img_type` int NOT NULL COMMENT '1=>gallery,2=>events',
  `gallery_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gallery_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `gallery_status` int NOT NULL DEFAULT '1' COMMENT '1=active 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `img_type`, `gallery_img`, `gallery_title`, `gallery_status`, `created_at`) VALUES
(10, 1, '1635230991-1W5A4003.JPG', 'Cultural Activities', 1, '2021-10-26 06:49:53'),
(13, 1, '1635231164-Poster_making.jpeg', 'Fit India Activities', 1, '2021-10-26 06:52:44'),
(14, 1, '1635231239-IMG20210918131549.jpg', 'kho kho championship 2021', 1, '2021-10-26 06:54:03'),
(15, 1, '1635231331-IMG-20210812-WA0010.jpg', 'online activities', 1, '2021-10-26 06:55:31'),
(16, 1, '1635231403-YASH7547.JPG', 'Sports activities', 1, '2021-10-26 06:56:48'),
(17, 1, '1635231471-Activity-7_March.jpeg', 'Scout n Guide ', 1, '2021-10-26 06:57:51'),
(19, 2, '1635231654-IMG-20210903-WA0040.jpg', 'Online Events', 1, '2021-10-26 07:00:54'),
(20, 1, '749-1W5A4010.JPG', 'Cultural Activities', 1, '2021-10-27 08:18:21'),
(21, 1, '955-IMG20210918165101.jpg', 'kho kho championship 2021', 1, '2021-10-27 08:19:15'),
(22, 1, '561-IMG-20210812-WA0034.jpg', 'online activities', 1, '2021-10-27 08:20:35'),
(23, 1, '540-Activity-3_Poster_making.jpeg', 'Scout n Guide', 1, '2021-10-27 08:21:31'),
(24, 1, '391-YASH7555.JPG', 'Sports activities', 1, '2021-10-27 08:22:11'),
(25, 1, '843-IMG_9497.JPG', 'Cultural Activities', 1, '2021-10-27 08:22:58'),
(26, 1, '617-IMG20210918172648.jpg', 'kho kho championship 2021', 1, '2021-10-27 08:23:40'),
(27, 1, '793-IMG-20210824-WA0000.jpg', 'online activities', 1, '2021-10-27 08:24:10'),
(28, 1, '670-Warm-up.jpeg', 'Scout n Guide', 1, '2021-10-27 08:24:55'),
(29, 2, '764-YASH7570.JPG', 'Sports activities', 1, '2021-10-27 08:25:37'),
(30, 2, '235-IMG-20210903-WA0050.jpg', 'Online Event', 1, '2021-10-27 08:27:49'),
(31, 2, '1081-IMG-20210903-WA0060.jpg', 'Online Event', 1, '2021-10-27 08:28:36'),
(32, 2, '168-IMG-20210903-WA0055.jpg', 'Online Event', 1, '2021-10-27 08:28:54'),
(33, 2, '903-IMG-20210903-WA0020.jpg', 'Event', 1, '2021-10-27 08:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `news_events-id` int NOT NULL,
  `news_events_title` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_events_status` int NOT NULL DEFAULT '1' COMMENT '1=active 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`news_events-id`, `news_events_title`, `created_at`, `news_events_status`) VALUES
(7, 'Dear Parent\r\nIt will be OFF for students from 13th October to 17th October on account of Dussehra for classes\r\nLKG to XII.\r\nPrincipal', '2021-10-27 08:38:29', 1),
(8, '  NEHRU INTERNATIONAL PUBLIC SCHOOL\r\n\r\nDATESHEET\r\nSESSION : 2021-2022\r\nHALF YEARLY EXAMINATION\r\nCLASS : IX & XI\r\n \r\nDATE IX XI Sc XI Comm\r\n21/10/21\r\nTHURSDAY ENGLISH COMP.SC. ACCOUNTANCY\r\n \r\n23/10/21\r\nSATURDAY COMPUTER ENGLISH ENGLISH\r\n \r\n26/10/21\r\nTUESDAY S. SCI CHEMISTRY B.ST.\r\n \r\n28/10/21\r\nTHURSDAY\r\n\r\nMATHS PHYSICS ECONOMICS\r\n \r\n30/10/21\r\nSATURDAY HINDI MATHS / BIO MATHS\r\n \r\n01/11/21\r\nMONDAY SCIENCE PHY. EDU. PHY. EDU.\r\n \r\nNOTE:\r\n- Duration of Exam: 90 Mins.\r\n- School Timings: 7:55a.m. to 9:45 a.m.\r\n- Mode of Exam: Offline\r\n- Format of Exam: MCQ\r\n- Classes will not commence during the testing period.\r\n- Classes will resume from November 8, 2021.\r\n- PTM will be held on Saturday, November 13, 2021.  ', '2021-10-27 08:39:42', 1),
(9, 'NEHRU INTERNATIONAL PUBLIC SCHOOL\r\n\r\nDATESHEET\r\nTERM-1 (2021-2022)\r\nPREBOARD EXAMINATION\r\nCLASS: X &amp; XII\r\n\r\nDATE X XII Sc XII Comm\r\n18/10/21\r\nMONDAY S. SCI CHEMISTRY ACCOUNTANCY\r\n\r\n20/10/21\r\nWEDNESDAY COMPUTER ENGLISH ENGLISH\r\n\r\n22/10/21\r\nFRIDAY HINDI COMP.SC. B.ST.\r\n\r\n25/10/21\r\nMONDAY\r\n\r\nMATHS PHYSICS ECONOMICS\r\n\r\n27/10/21\r\nWEDNESDAY ENGLISH MATHS / BIO MATHS\r\n\r\n29/10/21\r\nFRIDAY SCIENCE PHY. EDU. PHY. EDU.\r\n\r\nNOTE:\r\n- Duration of Exam: 90 minutes.\r\n- School Timings: 7:55a.m. to 9:45 a.m.\r\n- Mode of Exam: Offline\r\n- Format of Exam: MCQ\r\n- Classes will not commence during the testing period.\r\n- Classes will resume from November 8, 2021.\r\n- PTM will be held on Tuesday, November 2, 2021.', '2021-10-27 08:43:07', 1),
(10, 'Dear parents\r\n*For class X and XII, the exams are on the days assigned for transport (Monday, Wednesday and\r\nFriday).\r\n*The school buses will ply in the morning as usual but in the afternoon, the transport will be\r\nprovided ONLY at 2.00pm.\r\n*If your ward wants to avail school transport, then he/she needs to stay back in the school till 2.00\r\npm.\r\n*If your ward wishes to leave after exam, either you are required to pick up your ward or he/she\r\nshould get an application duly signed by you for allowing him/her to commute on his/her own.\r\n*For class IX and XI.\r\n*During exam days, the transport will be provided for the students availing school transport.\r\n*The dispersal of the students will be after the exam at 10.00am.\r\n*On 01/11/21, the transport will ply at 2.00 in the afternoon.\r\n*If your ward wishes to leave after exam, either you are required to pick up your ward or he/she\r\nshould get an application duly signed by you for allowing him/her to commute on his/her own.\r\nPrincipal\r\nPrincipal', '2021-10-27 08:43:26', 1),
(11, 'NEHRU INTERNATIONAL PUBLIC SCHOOL\r\n\r\nDATESHEET\r\nTERM-1 (2021-2022)\r\n\r\nPRACTICAL EXAMINATION / INTERNAL ASSESSMENT\r\n\r\nCLASS : XI &amp; XII\r\n\r\nDATE XI Sc XI Comm XII Sc XII Comm\r\n\r\n5/10/21\r\n\r\nPhysics\r\n&amp;\r\nChemistry\r\n\r\nASL (for absent\r\nstudents)\r\n\r\nComp.Sc./ Phy.Edu.\r\n&amp;\r\nMaths / Biology\r\n\r\nAccountancy\r\n&amp;\r\nEconomics\r\n\r\n6/10/21\r\n\r\nPhysics\r\n&amp;\r\nChemistry\r\n\r\nASL (for absent\r\nstudents)\r\n\r\nComp.Sc./ Phy.Edu.\r\n&amp;\r\nMaths / Biology\r\n\r\nAccountancy\r\n&amp;\r\nEconomics\r\n\r\n7/10/21\r\nComp.Sc./ Phy.Edu.\r\n&amp;\r\nASL (for absent\r\nstudents)\r\n\r\nBusiness Studies\r\n&amp;\r\nAccountancy\r\n\r\nPhysics\r\n&amp;\r\nChemistry Phy.Edu./Maths\r\n\r\n8/10/21\r\nComp.Sc./ Phy.Edu.\r\n&amp;\r\nASL (for absent\r\nstudents)\r\n\r\nBusiness Studies\r\n&amp;\r\nAccountancy\r\n\r\nPhysics\r\n&amp;\r\nChemistry Phy.Edu./Maths\r\n\r\n11/10/21\r\n\r\nMaths / Biology\r\n\r\nPhy.Edu./Maths\r\n&amp;\r\nEconomics ASL (for absent students)\r\n\r\nBusiness Studies\r\n&amp;\r\nASL (for absent\r\nstudents)\r\n\r\n12/10/21\r\n\r\nMaths / Biology\r\n\r\nPhy.Edu./Maths\r\n&amp;\r\nEconomics ASL (for absent students)\r\n\r\nBusiness Studies\r\n&amp;\r\nASL (for absent\r\nstudents)', '2021-10-27 08:43:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `slider_status` int NOT NULL DEFAULT '1' COMMENT '1=active 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_img`, `slider_title`, `slider_status`) VALUES
(12, '1635145603-image-1.jpg', '', 1),
(13, '1635145610-image-2.jpg', '', 1),
(14, '1635145657-image-3.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int NOT NULL,
  `testimonial_title` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `testimonial_description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `testimonial_rating` int NOT NULL,
  `testimonial_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_title`, `testimonial_description`, `testimonial_rating`, `testimonial_status`, `created_at`) VALUES
(4, 'Urvi Varshney (An alumini)', 'Nehru International Public School has been a great positive influence for me. The school not only provides quality education but also encourages to take interest in sports, arts and many other co-curricular activities and promotes holistic development. The school is well known for discipline and the faculty here is very supportive and friendly.', 5, 1, '2021-10-25 06:25:17'),
(5, 'Kalpana Tripathi (Mother of Devansh Tripathy)', 'Nehru International Public School train students to acquire skills set and social consciousness to make them professionals who can with stand the global competition and can emerge successful in their chosen professional career. With the atmosphere of discipline and upliftment of Co-curricular depths of pupil.', 4, 1, '2021-10-25 06:26:01'),
(6, 'Mr. Saurabh Suman (Father of Aradhya &amp; Ananya Semwal)', 'We are well aware of the effort you put into each child in your class. Thank you for going above and beyond for all the children during covid time by conducting online classes and being such a caring and important part of our community. My children are learning and developing under the positive influence of the teachers and staff at NIPS, Noida. I am proud to be a part of this esteemed school as a parent.', 5, 1, '2021-10-25 06:26:44'),
(7, 'Kulwant Arora &amp; Davinder Kaur', 'Our son took admission in 2007 (in LKG), spent his entire school-life here and we never felt the need to change his school. It is having good management and decent staff. They take discipline very seriously. The teachers are well qualified and experienced. They pay equal attention to each and every student. Overall a good educational institute. Parents who are looking for a better educational environment for their kids can definitely consider taking admission in this school.', 5, 1, '2021-10-25 06:27:11'),
(8, 'Subhasis Mazumder &amp; Rakhi Mazumder', 'This school is amazing in every aspect. The teachers here are very much humble and clear every doubt of the students. Infrastructure is also good. If we talk about discipline, this school is the best. Highly recommended.', 5, 1, '2021-10-25 06:27:33'),
(9, 'Amit Kumar, Savita Kumari', 'A well maintained institution with helpful and generous staff. Discipline is the topmost priority. Teachers are well experienced. They are well aware of every student&#39;s performance and deal accordingly. Health and fitness is given equal importance. We would highly recommend this school to parents.', 5, 1, '2021-10-25 06:27:59'),
(10, 'Lokesh Kumar', 'Nehru International Public School is a well known school in Noida. It is a helpful organization in development of students. Here teaching and learning takes place frequently. Management and teaching staff of school is very cooperative.', 5, 1, '2021-10-25 06:28:18'),
(11, 'Rekha Dubey (Mother of Akshit, UKG and Akshita III)', 'I am continuously impressed by how well all the teachers know the students. even the faculty in grades above our children know them and well beyond just recalling their names. This creates a very supportive climate for our children to go beyond limits.', 5, 1, '2021-10-25 06:32:08'),
(12, 'Vandana Sharma, Kumar Niranjan', 'This school provides memorable experiences, education, happiness, and great friendships. Not only in academics, this institution also excels in extra co-curricular activities which develop qualities like team spirit, leadership which are really essential for a student. The staff, the environment, the infrastructure all are great in their own way and discipline is at its peak. In a nutshell, this is the school you\'ll love to go.\r\n', 5, 1, '2021-10-27 08:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `toppers`
--

CREATE TABLE `toppers` (
  `toppers_id` int NOT NULL,
  `toppers_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `toppers_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `toppers_class` text COLLATE utf8mb4_general_ci NOT NULL,
  `toppers_percentage` text COLLATE utf8mb4_general_ci NOT NULL,
  `toppers_status` int NOT NULL DEFAULT '1' COMMENT '1=active 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toppers`
--

INSERT INTO `toppers` (`toppers_id`, `toppers_img`, `toppers_title`, `toppers_class`, `toppers_percentage`, `toppers_status`, `created_at`) VALUES
(9, '1635228767-Rank-1_Devansh-Tripathi-Science.jpg', 'Devansh-Tripathi ', '10', 'Rank-1 (Science)', 1, '2021-10-26 06:12:47'),
(12, '1635228998-Urvi-Biology.jpg', 'Urvi', '12', 'Biology', 1, '2021-10-26 06:16:38'),
(16, '1635237889-Rank-1_Nitish_Kumar_Sharma-Commerce.jpg', 'Nitish Kumar Sharma', '10', 'Rank-1 (Commerce)', 1, '2021-10-26 08:44:49'),
(17, '1635237959-Rank-2_Ankit_Pandey-Commerce.jpeg', 'Ankit Pandey', '10', 'Rank-2 (Commerce)', 1, '2021-10-26 08:45:59'),
(18, '1635238023-Aditya_Bhushan-English.jpg', 'Aditya Bhushan', '12', 'English', 1, '2021-10-26 08:47:03'),
(19, '1635238077-Amit_kumar_Mishra-Economics.jpeg', 'Amit kumar Mishra', '12', 'Economics', 1, '2021-10-26 08:47:57'),
(20, '1635238124-Devansh_Tripathi-Physical_Education.jpeg', 'Devansh Tripathi', '12', 'Physical Education', 1, '2021-10-26 08:48:44'),
(21, '116-Rank-2_Urvi-Science.jpeg', 'Urvi', '10', 'Rank-2 (Science)', 1, '2021-10-27 08:46:28'),
(22, '357-Rank-3_Aditya_Bhushan-Science.jpeg', 'Aditya Bhushan', '10', 'Rank-3 (Science)', 1, '2021-10-27 08:47:19'),
(23, '577-Rank-3_Amit_kumar_Mishra-Commerce.jpeg', 'Amit kumar Mishra', '10', 'Rank-3 (Commerce)', 1, '2021-10-27 08:48:27'),
(24, '42-Rank-3_Devanshi_Singh-Commerce.jpeg', 'Devanshi Singh', '10', 'Rank-3 (Commerce)', 1, '2021-10-27 08:49:26'),
(25, '658-Rank-3_Nikita_Negi-Science.jpeg', 'Nikita Negi', '10', 'ScienceRank-3', 1, '2021-10-27 08:50:20'),
(26, '969-Devanshi_Singh-English.jpeg', 'Devanshi Singh', '12', 'English', 1, '2021-10-27 08:54:48'),
(27, '639-Jaswant-Arora-Computer-Science.jpeg', 'Jaswant Arora', '12', 'Computer Science', 1, '2021-10-27 08:55:31'),
(28, '820-Nikita-Negi-Physical-Education.jpeg', 'Nikita Negi', '12', 'Physical Education', 1, '2021-10-27 08:56:12'),
(29, '966-Nitish-Kumar-Sharma-Business-Studies.jpeg', 'Nitish Kumar Sharma ', '12', 'Business Studies', 1, '2021-10-27 08:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videos_id` int NOT NULL,
  `videos_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `video_cat` int NOT NULL COMMENT '1=>gallery,2=>events',
  `video` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vid_status` int NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videos_id`, `videos_title`, `video_cat`, `video`, `vid_status`) VALUES
(7, 'Events 1', 2, '8-VID-20210805-WA0036.mp4', 1),
(8, 'Event 2', 2, '442-VID-20210823-WA0002.mp4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`news_events-id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `toppers`
--
ALTER TABLE `toppers`
  ADD PRIMARY KEY (`toppers_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `news_events-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toppers`
--
ALTER TABLE `toppers`
  MODIFY `toppers_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
