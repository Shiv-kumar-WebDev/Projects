-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2021 at 01:56 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aauthenticity`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `pincode` varchar(255) CHARACTER SET utf8 NOT NULL,
  `building` text NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `street_address` varchar(256) NOT NULL,
  `state` varchar(100) CHARACTER SET utf8 NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `username`, `email`, `user_phone`, `pincode`, `building`, `city`, `street_address`, `state`, `country`) VALUES
(8, 1, 'jhbkj', 'jaat@gmail.com', 8976787876, '110096', 'india', 'delhi', 'nmb mn', 'Delhi', ''),
(9, 6, 'eeee', 'rajivdhaor@gmail.com', 9891475003, '201010', 'B-008, ARIHANT PARADISO, MALL ROAD,', 'GHAZIABAD', 'AHINSA KHAND-2, INDIRAPURAM', 'Uttar Pradesh', ''),
(10, 11, 'pk', 'pk12@gmail.com', 8978776765, '110096', 'india', 'East Delhi', 'lklvlsdkv', 'Delhi', ''),
(11, 11, 'jitendra mehra', 'jeetmehra2323@gmail.com', 7078058343, '122001', '10 Basai road', 'GURUGRAM', 'gurgaon', 'Near Seithi Hospital', ''),
(12, 15, 'Admin', 'jeetmeadmin@gmail.com', 1234567890, '122001', '10 Basai road', 'GURUGRAM', 'gurgaon', 'Near Seithi Hospital', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `admin_phoneno` bigint(20) NOT NULL,
  `minimum_order_amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email`, `password`, `username`, `admin_phoneno`, `minimum_order_amount`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 9560387054, '100');

-- --------------------------------------------------------

--
-- Table structure for table `apply_coupon`
--

CREATE TABLE `apply_coupon` (
  `apply_coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attr`
--

CREATE TABLE `attr` (
  `attr_id` int(11) NOT NULL,
  `attr_name` varchar(255) NOT NULL,
  `attr_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attr`
--

INSERT INTO `attr` (`attr_id`, `attr_name`, `attr_status`) VALUES
(1, 'Size', 1),
(2, 'Color', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attr_optn`
--

CREATE TABLE `attr_optn` (
  `optn_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `optn_name` varchar(255) NOT NULL,
  `optn_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attr_optn`
--

INSERT INTO `attr_optn` (`optn_id`, `attribute_id`, `optn_name`, `optn_status`) VALUES
(1, 1, '10 Inch', 1),
(2, 2, 'Red', 1),
(3, 2, 'Blue', 1),
(4, 1, '5 Inch', 1),
(5, 2, 'Pink', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `maincategory_id` int(11) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` text NOT NULL,
  `cat_grid` int(11) NOT NULL DEFAULT '0' COMMENT '1=>active,0=>inactive',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Active and 0 = Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `maincategory_id`, `name_en`, `name_ar`, `image`, `cat_grid`, `create_date`, `updated`, `status`) VALUES
(1, 1, 'COOK WARE', '', '712-in1.jpg', 1, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(2, 5, 'MUGS', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(5, 1, 'UTILITIES', '', '25-in7.jpg', 1, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(7, 2, 'TABLE COASTER', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(8, 2, 'WRAPS', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(9, 2, 'TABLE LAMPS', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(10, 6, 'DINNER SET', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(11, 4, 'SHOW PIECE', '', '698-in5.jpg', 1, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(12, 4, 'BRASS', '', '802-de.jpg', 1, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(13, 2, 'SERVE WARE', '', '18-ta.jpg', 1, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(14, 4, 'Candles ', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(15, 4, 'Candle Stand ', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(16, 2, 'Tissue Box', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(17, 2, 'Table Lamps', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(18, 2, 'Book Ends ', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(19, 2, 'Mini Pots ', '', '', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1),
(20, 2, 'Dinner plates ', '', '680-a.jpg', 0, '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` text CHARACTER SET utf8 NOT NULL,
  `city_status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1 and deactive = 0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `status`) VALUES
(1, 'Red', '1.jpg', 1),
(2, 'Pink', '2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `copied_subcategory`
--

CREATE TABLE `copied_subcategory` (
  `copied_subcatid` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `maincatid` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `copied_subcategory`
--

INSERT INTO `copied_subcategory` (`copied_subcatid`, `subcategory_id`, `maincatid`, `catid`) VALUES
(1, 35, 1, 1),
(2, 35, 5, 2),
(3, 35, 1, 5),
(4, 29, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(125) NOT NULL,
  `country_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,9=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_status`) VALUES
(2, 'USA', 1),
(3, 'UAE', 1),
(4, 'UK', 1),
(5, 'INDIA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_weight`
--

CREATE TABLE `country_weight` (
  `c_weight_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `c_weight_from` varchar(125) NOT NULL,
  `c_weight_to` varchar(100) NOT NULL,
  `c_weight_price` int(11) NOT NULL,
  `c_weight_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_weight`
--

INSERT INTO `country_weight` (`c_weight_id`, `country_id`, `c_weight_from`, `c_weight_to`, `c_weight_price`, `c_weight_status`) VALUES
(1, 2, '0', '3', 100, 1),
(2, 3, '2', '10', 150, 1),
(3, 4, '1', '13', 200, 1),
(4, 5, '0', '5', 250, 1),
(5, 5, '5', '15', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `discount_type` varchar(100) NOT NULL COMMENT 'Options: fixed_cart, percent.',
  `coupon_amount` int(11) NOT NULL,
  `discount_upto` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `usage_limit_per_user` int(11) DEFAULT NULL,
  `for_all` varchar(10) DEFAULT NULL COMMENT 'yes: For all product & Categories',
  `exclude_sale_items` tinyint(4) NOT NULL DEFAULT '0',
  `minimum_amount` int(11) DEFAULT NULL,
  `users` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive\r\n',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL COMMENT '2=>deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `discount_type`, `coupon_amount`, `discount_upto`, `start_date`, `expiry_date`, `usage_limit_per_user`, `for_all`, `exclude_sale_items`, `minimum_amount`, `users`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'MEAZZY', 'percent', 20, 700, '2021-08-11', '2021-09-01', 5, NULL, 1, 200, '7', 1, NULL, NULL, 0),
(2, 'AZAD1', 'fixed_cart', 1200, 550, '2021-09-14', '2021-10-26', 5, NULL, 0, 1500, '10', 1, NULL, NULL, 0),
(3, 'D1WALI', 'fixed_cart', 5000, 500, '2021-09-14', '2021-09-18', 5, NULL, 0, 2000, '15', 1, NULL, NULL, 0),
(4, 'hello', 'percent', 10, 2000, '2021-09-14', '2021-09-30', 1, NULL, 0, 200, '12', 1, NULL, NULL, 0),
(5, 'dhjk', 'percent', 20, 300, '2021-09-28', '2021-10-02', 2, NULL, 0, 200, '12', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `deliveryboy_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `epassword` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Active and 1 = Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_date`
--

CREATE TABLE `delivery_date` (
  `delivery_date_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_time`
--

CREATE TABLE `delivery_time` (
  `delivery_time_id` int(11) NOT NULL,
  `delivery_date_id` int(11) NOT NULL,
  `start_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `end_time` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_timing`
--

CREATE TABLE `delivery_timing` (
  `dtime_id` int(11) NOT NULL,
  `timing` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_timing`
--

INSERT INTO `delivery_timing` (`dtime_id`, `timing`) VALUES
(1, '10AM - 12PM'),
(2, '12PM - 3PM'),
(3, '3PM - 5PM');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `feedback_type` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Feedback and 1 = complaint  ',
  `feed_description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE `instagram` (
  `instagram_id` int(11) NOT NULL,
  `post_url` varchar(50) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `poststatus` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instagram`
--

INSERT INTO `instagram` (`instagram_id`, `post_url`, `post_image`, `poststatus`) VALUES
(5, 'http://localhost/aauthenticity/landing/productdeta', '120-4.jpg', 1),
(6, 'http://localhost/aauthenticity/landing/productdeta', '588-14.jpg', 1),
(8, 'jhjh', '28-1.jpg', 1),
(9, ' ojbmn', '332-5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `maincategory_id` int(11) NOT NULL,
  `maincategory_name_en` varchar(100) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `maincat_image` text NOT NULL,
  `spotlight` int(11) NOT NULL DEFAULT '0' COMMENT '1=>active,0=>inactive',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maincatstatus` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`maincategory_id`, `maincategory_name_en`, `name_ar`, `maincat_image`, `spotlight`, `create_date`, `updated`, `maincatstatus`) VALUES
(1, 'KITCHENWARE', '', '756-in7.jpg', 1, '2021-04-03 07:54:17', '2021-10-18 08:54:20', 1),
(2, 'TABLEWARE', '', '924-DTES1390_-_Copy.jpg', 1, '2021-04-03 07:54:38', '2021-10-18 08:54:20', 1),
(4, 'DECOR', '', '436-de.jpg', 1, '2021-04-03 07:57:07', '2021-10-18 08:54:20', 1),
(5, 'TEA & COFFEE', '', '1014-in2.jpg', 1, '2021-04-03 12:14:07', '2021-10-18 08:54:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_wallet`
--

CREATE TABLE `my_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `tr_type` enum('debit','credit') NOT NULL,
  `tr_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `resource_details` varchar(250) NOT NULL,
  `referral_to_id` int(11) NOT NULL,
  `referral_from_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'admin = 0 ',
  `order_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `notification` text CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT 'admin =1 and user = 2',
  `noti_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderassigned`
--

CREATE TABLE `orderassigned` (
  `oaid` int(11) NOT NULL,
  `deliveryboyid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `oadate` date NOT NULL,
  `deliverydate` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not Delivered\r\n1=delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `transaction_id` text CHARACTER SET utf8 NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` int(11) NOT NULL COMMENT '0 = pending 5= shipped  1 = cancle 2 = delivered 3 = pickup 4=incheckout',
  `sub_total` int(11) NOT NULL,
  `sub_price` int(11) NOT NULL,
  `delivery_charge` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL DEFAULT '0',
  `total_price` int(11) NOT NULL,
  `usd_sub_price` int(11) NOT NULL,
  `usd_delivery_charge` int(11) NOT NULL,
  `usd_cpn_amt` int(11) NOT NULL,
  `usd_total_price` int(11) NOT NULL,
  `pyment_method` int(11) NOT NULL DEFAULT '0' COMMENT '0 = not paid and 1 = net banking and 2 = credit card/debit card and 3 = wallate',
  `delivery_date` date NOT NULL,
  `address_id` int(11) NOT NULL,
  `oastatus` int(11) NOT NULL DEFAULT '0' COMMENT '0=not assigned 1=assigned',
  `oadeliverdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `userid`, `transaction_id`, `coupon_code`, `order_date`, `order_status`, `sub_total`, `sub_price`, `delivery_charge`, `coupon_discount`, `total_price`, `usd_sub_price`, `usd_delivery_charge`, `usd_cpn_amt`, `usd_total_price`, `pyment_method`, `delivery_date`, `address_id`, `oastatus`, `oadeliverdate`) VALUES
(1, 11, 'VGHWci', 'azad1', '2021-09-20', 4, 0, 12000, '300', 0, 12300, 171, 4, 0, 175, 0, '2021-09-23', 11, 0, ''),
(2, 11, '7qfPQ0', '', '2021-09-20', 4, 0, 12400, '300', 0, 12700, 177, 4, 0, 181, 0, '2021-09-23', 11, 0, ''),
(3, 11, 'K8PJgA', 'azad1', '2021-09-30', 4, 0, 12400, '250', 550, 12100, 177, 3, 7, 173, 0, '2021-10-03', 11, 0, ''),
(4, 11, 'ay4T5R', 'azad1', '2021-09-30', 4, 0, 400, '250', 0, 950, 6, 3, 0, 12, 0, '2021-10-03', 11, 0, ''),
(5, 11, 'RKlI6t', 'azad1', '2021-10-14', 4, 0, 4514, '250', 550, 914, 66, 3, 7, 20, 0, '2021-10-17', 11, 0, ''),
(6, 11, 'aWpn3k', 'azad1', '2021-10-14', 4, 0, 3890, '100', 550, 3440, 56, 1, 7, 50, 0, '2021-10-17', 11, 0, ''),
(7, 11, '8E4yxD', '', '2021-10-15', 4, 0, 140, '100', 0, 240, 2, 1, 0, 3, 0, '2021-10-18', 11, 0, ''),
(8, 11, '2PF1os', '', '2021-10-15', 4, 0, 140, '200', 0, 340, 2, 2, 0, 4, 0, '2021-10-18', 11, 0, ''),
(9, 11, 'pnUFrg', '', '2021-10-15', 4, 0, 140, '200', 0, 340, 2, 2, 0, 4, 0, '2021-10-18', 11, 0, ''),
(10, 11, 'IFBpiA', '', '2021-10-15', 4, 0, 140, '200', 0, 340, 2, 2, 0, 4, 0, '2021-10-18', 11, 0, ''),
(11, 11, 'NWMrXH', '', '2021-10-15', 4, 0, 140, '250', 0, 390, 2, 3, 0, 5, 0, '2021-10-18', 11, 0, ''),
(12, 15, 'RiW20B', 'azad1', '2021-10-15', 4, 0, 9970, '250', 550, 9670, 144, 3, 7, 140, 0, '2021-10-18', 12, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `page_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_slug`, `page_description`) VALUES
(1, 'About Us', 'about-us', '<p>Aauthenticity represents artisanal &amp; creative items with exceptional quality and unparalleled taste. Inspired by nature, Aauthenticity aims to bring the finest luxurious living to your doorstep with care and concern with, most of the products are of exceptional designs and make. We care about the nature and our traditional art &amp; craft and try to bring handcrafted products to trigger your fine senses. The uniqueness of the product will fascinate you. Aauthenticity is a destination to transpire ideas into creations, then the story begins....</p>\r\n\r\n<p>We are not selling items, we represent creations, dreams, inspirations. We create the item, you desire. Our passion for product development and your tasteful requirements intertwines with each other on the common platform of Aauthenticity.</p>\r\n\r\n<p>Aauthenticity is a young enthusiastic house which is committed towards its customers. We believe in long term relationships with our customers, you are our inspiration and motivation. We have reached this far because of you and will go further because of you. Customer satisfaction is our foremost priority which consistently helps us improve and grow.</p>\r\n\r\n<p>The only parameter of our success is customer satisfaction.</p>\r\n'),
(2, 'Privacy Policy', 'privacy-policy', '<p><strong>Thank you for choosing part to be of Authenticity family by doing business as aauthenticity(&ldquo;Authenticity&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo;,&rdquo;our&rdquo;). We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about this privacy notice or our practices with regards to your personal information, please contact us at care@aauthenticity.com By visiting this Website you agree to be bound by the terms and conditions of this<br />\r\nPrivacy Policy. If you do not agree, please do not use or access our Website. By mere use of the Website, you expressly consent to our use and disclosure of your personal information in accordance with this Privacy Policy. This Privacy<br />\r\nPolicy is incorporated into and subject to the Terms of Use.</strong></p>\r\n\r\n<p><strong>SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?<br />\r\nWhen you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address. When you browse our store, we also automatically receive your computer&#39;s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system. Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</strong></p>\r\n\r\n<p><br />\r\n<strong>SECTION 2 - CONSENT<br />\r\nHow do you get my consent?<br />\r\nWhen you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting that information and using it for that specific reason only. If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.<br />\r\nHow do I withdraw my consent?<br />\r\nIf after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at&nbsp;or mailing us at:<br />\r\ncare@aauthenticity.com</strong></p>\r\n\r\n<p><strong>&nbsp;<br />\r\nSECTION 3 - DISCLOSURE<br />\r\nWe may disclose your personal information if we are required by state law to do so or if you violate our Terms of Service.<br />\r\nPayment:<br />\r\nIf you choose a direct payment gateway to complete your purchase, then payumoney.com stores your credit card data. It is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted. All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover. PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers. For more insight, you may also want to read Aauthenticity&rsquo;s Terms of Service<br />\r\nhere or Privacy Statement here.</strong></p>\r\n\r\n<p><br />\r\n<strong>SECTION 5 - THIRD-PARTY SERVICES<br />\r\nIn general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us. However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions. For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers. In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located. As an example, if you are located in Canada and your transaction is processed by a payment gateway located in India, then your personal information used in completing that transaction may be subject to disclosure under India legislation</strong></p>\r\n\r\n<p><strong>&amp; legal Act.<br />\r\nOnce you leave our store&#39;s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website&#39;s Terms of Service.<br />\r\nLinks<br />\r\nWhen you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</strong></p>\r\n\r\n<p><br />\r\n<strong>SECTION 6 - SECURITY<br />\r\nTo protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow<br />\r\nall PCI-DSS requirements and implement additional generally accepted industry standards.</strong></p>\r\n\r\n<p><strong>SECTION 8 - AGE OF CONSENT<br />\r\nBy using this site, you represent that you are at least the age of majority in your state or shop_contact_province_state of residence, or that you are the age of majority in your state or shop_contact_province_state of residence and you<br />\r\nhave given us your consent to allow any of your minor dependents to use this site.</strong></p>\r\n\r\n<p><br />\r\n<strong>SECTION 9 - CHANGES TO THIS PRIVACY POLICY<br />\r\nWe reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it. If our store is acquired or merged with another company, your<br />\r\ninformation may be transferred to the new owners so that we may continue to sell products to you.</strong></p>\r\n\r\n<p><br />\r\n<strong>QUESTIONS AND CONTACT INFORMATION<br />\r\nIf you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at&nbsp;or by mail at: care@aauthenticity.com</strong></p>\r\n'),
(3, 'Terms & Conditions', 'terms-conditions', '<p>OVERVIEW<br />\r\nThis website is operated by Authenticity. Throughout the site, the terms &amp;quot;we&amp;quot;, &amp;quot;us&amp;quot; and &amp;quot;our&amp;quot; refer to www.aauthenticity.com offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here. By visiting our site and/ or purchasing something from us, you engage in our &amp;quot;Service&amp;quot; and agree to be bound by the following terms and conditions (&amp;quot;Terms of Service&amp;quot;, &amp;quot;Terms&amp;quot;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content. Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service. Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes. Our store is hosted on Aauthenticity. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>\r\n\r\n<p><br />\r\nSECTION 1 - ONLINE STORE TERMS<br />\r\nBy agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or shop_contact_province_state of residence, or that you are the age of majority in your state or shop_contact_province_state of<br />\r\nresidence and you have given us your consent to allow any of your minor dependents to use this site. You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws). You must not transmit any worms or viruses or any code of a destructive nature. A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>\r\n\r\n<p><br />\r\nSECTION 2 - GENERAL CONDITIONS<br />\r\nWe reserve the right to refuse service to anyone for any reason at any time. You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks;and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks. You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us. The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>\r\n\r\n<p><br />\r\nSECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION<br />\r\nWe are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>\r\n\r\n<p>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES<br />\r\nPrices for our products are subject to change without notice. We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time. We shall not be liable to you or to any third- party for any modification, price change, suspension or discontinuance of the Service.</p>\r\n\r\n<p><br />\r\nSECTION 5 - PRODUCTS OR SERVICES (if applicable)<br />\r\nCertain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy. We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor&amp;#39;s display of any color will be accurate. We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited. We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>\r\n\r\n<p><br />\r\nSECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION<br />\r\nWe reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors. You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed. For more detail, please review our Returns Policy.</p>\r\n\r\n<p><br />\r\nSECTION 7 - OPTIONAL TOOLS<br />\r\nWe may provide you with access to third-party tools over which we neither monitor nor have any control nor input. You acknowledge and agree that we provide access to such tools &amp;quot;as is&amp;quot; and &amp;quot;as available&amp;quot; without any warranties,<br />\r\nrepresentations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools. Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s). We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>\r\n\r\n<p><br />\r\nSECTION 8 - THIRD-PARTY LINKS<br />\r\nCertain content, products and services available via our Service may include materials from third-parties. Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties. We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third- party websites. Please review carefully the third-party&amp;#39;s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>\r\n\r\n<p><br />\r\nSECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS<br />\r\nIf, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, &amp;#39;comments&amp;#39;), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments. We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party&amp;#39;s intellectual property or these Terms of Service. You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>\r\n\r\n<p><br />\r\nSECTION 10 - PERSONAL INFORMATION<br />\r\nYour submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.</p>\r\n\r\n<p><br />\r\nSECTION 11 - ERRORS, INACCURACIES AND OMISSIONS<br />\r\nOccasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order). We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>\r\n\r\n<p><br />\r\nSECTION 12 - PROHIBITED USES<br />\r\nIn addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any<br />\r\nobscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website<br />\r\nfor violating any of the prohibited uses.</p>\r\n\r\n<p>SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY<br />\r\nWe do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free. We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable. You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you. You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided &amp;#39;as is&amp;#39; and &amp;#39;as available&amp;#39; for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose,</p>\r\n\r\n<p>durability, title, and non-infringement. In no case shall razekan biolabs pvt ltd, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>\r\n\r\n<p><br />\r\nSECTION 14 - INDEMNIFICATION<br />\r\nYou agree to indemnify, defend and hold harmless razekan biolabs pvt ltd &amp;amp;nsbp;and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys&amp;#39; fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>\r\n\r\n<p><br />\r\nSECTION 15 - SEVERABILITY<br />\r\nIn the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>\r\n\r\n<p>&nbsp;<br />\r\nSECTION 16 - TERMINATION<br />\r\nThe obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes. These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site. If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>\r\n\r\n<p><br />\r\nSECTION 17 - ENTIRE AGREEMENT<br />\r\nThe failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision. These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service). Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>\r\n\r\n<p><br />\r\nSECTION 18 - GOVERNING LAW<br />\r\nThese Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of , , &nbsp;&nbsp;.</p>\r\n\r\n<p><br />\r\nSECTION 19 - CHANGES TO TERMS OF SERVICE<br />\r\nYou can review the most current version of the Terms of Service at any time at this page. We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>\r\n\r\n<p><br />\r\nSECTION 20 - CONTACT INFORMATION<br />\r\nQuestions about the Terms of Service should be sent to us at:<br />\r\ncare@aauthenticity.com.</p>\r\n'),
(4, 'FAQ', 'FAQ', '<p>&nbsp;Aauthenticity is based at which place?<br />\r\nAauthenticity belongs to beautiful country India with its corporate office based at Noida(NCR Delhi) and regional office at Palampur, Himachal Pradesh.</p>\r\n\r\n<p>&nbsp;What technique is used to make products?<br />\r\nProducts are made majorly by hand, with the help of hand tools.</p>\r\n\r\n<p>Why two products are not exactly same?<br />\r\nSince products are handmade &amp;amp; made by various artisans, there may be slight variations in size, shade of color &amp;amp; finish.</p>\r\n\r\n<p>Why some spots on products?<br />\r\nOur artisan takes utmost care in providing smooth finish to your loved products, but some products may develop some spots due to technique used or characteristic of particular design/product.</p>\r\n\r\n<p>&nbsp;Who makes these products?<br />\r\nOur products are made by artisans based at various villages and towns of India. These artisans are specialist in craft-work by generations.</p>\r\n\r\n<p>Can products get damaged?<br />\r\nNo product is damage-proof, If product takes a fall or proper care is not given while handling.</p>\r\n\r\n<p>Are products scratchproof ?<br />\r\nEvery product needs special care and handling. If proper care is not given while handling, scratches may happen on items.</p>\r\n\r\n<p>Is it safe to eat food in dinnerware items.</p>\r\n\r\n<p>Yes, we follow international norms and guidelines while making products for you. They are food safe.</p>\r\n\r\n<p>Are Products Microwave friendly<br />\r\nOur ceramic stoneware/handmade products are microwave friendly for warming. You can serve steaming hot food in our ceramic products. Some wood products also can be put in microwave, but you have to abide by guidelines mentioned on a particular purchase.</p>\r\n'),
(5, 'Shipping Policy', 'Shipping-Policy', '<p>1. Most orders are delivered within 5-7 business days. Monday to Friday is considered as business days except for public holidays. Delays in delivery can occasionally occur around public holidays or at times because of unforeseen circumstances, but we do our best to provide timely deliveries to all our customers.</p>\r\n\r\n<p>2. We take great care in delivering your products to you, and we partner only with reputed couriers. Courier charges may vary for India and outside India.</p>\r\n\r\n<p>3. Each craftsman and artisan&#39;s process being unique, hence shipping times may vary. Look for shipping info on the product page for individual shipping times.</p>\r\n\r\n<p>4. Address change will be accepted only if order has not been shipped. Address change is only possible if new location is within the same state.</p>\r\n\r\n<p>5. As soon as your package ships, we will email your package tracking information to you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cancellation:</p>\r\n\r\n<p>Orders once shipped, cannot be cancelled. Cancellation requests may be accepted strictly within 12 hours of placing the order only, provided order is not shipped.</p>\r\n\r\n<p>Returns</p>\r\n\r\n<p>Here is our policy on returns:</p>\r\n\r\n<p>1. To maintain fairness to our artisans and craftsmen, as well as keep our prices fair, many items are for &quot;Discreet Sale or Seconds Sale&quot; We request you to consider &amp; evaluate that which products are eligible for returns before purchasing.&nbsp;<br />\r\n2. Eligible products return request can only be made within 24 hours after the delivery date. Consignment/item delivered to you is eligible for return or replacement only if it meets the following conditions:<br />\r\n- If an incorrect product was delivered to you, i.e. the product does not match the item description mentioned on the website or wrong product is delivered.<br />\r\n- If the product you receive has a genuine quality or manufacturing defect or damage.</p>\r\n\r\n<p><br />\r\nSince our items are handmade by expert artisans, proper care being given to make items identical, due to handmade process involved, a slight variation in color-tone, shape, size or spots may occur between products which is not regarded as a defect<br />\r\nand will not be eligible for return or replacement. Given the nature of our products, we reserve the sole discretion to provide resolution as we deem fit. There is no blanket policy vis return. Every return or exchange request is treated as an individual case. We are unable to offer refunds if we&rsquo;ve been given an incorrect or incomplete shipping address, or the recipient refuses the package.</p>\r\n\r\n<p>If your purchase meets our return criteria as stated above, Specify the reason for the return, and in case of defective or incorrect product, please send us:<br />\r\na) Two or more images of the item.<br />\r\nb) Order number<br />\r\nc) Order Date<br />\r\nd) Delivery address<br />\r\nPlease email us at email- return@aauthenticity within 24 hours of delivery with the above information Unfortunately, we will not be able to consider any emails or images sent after 24 hrs of the delivery. Once your return has been authorized, we&#39;d be happy to process your refund within 8-10 working days after the product is picked up from the given address.</p>\r\n\r\n<p>7. If you find that the package has been tampered with or feel the Item is broken in box, please do not accept the item and handover the package back to the delivery person before signing the POD(Proof of Delivery). All returns are subject to the sole discretion of Aauthenticity team.For any other questions or clarifications, please reach out to the Aauthenticity team at care@aauthenticity.com</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `payment_id` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `amount` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `maincatid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `proname_en` varchar(200) NOT NULL,
  `brand_name_en` varchar(100) NOT NULL,
  `brand_name_ar` varchar(255) NOT NULL,
  `proname_ar` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `usd_price` int(11) NOT NULL,
  `usd_discount_price` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `added_qty` int(11) NOT NULL,
  `product_weight` int(11) NOT NULL,
  `new_arr` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive',
  `offer_month` int(11) NOT NULL DEFAULT '0' COMMENT '1=>active,0=inactive',
  `promain_image` text NOT NULL,
  `description_en` text CHARACTER SET utf8 NOT NULL,
  `description_ar` text CHARACTER SET utf8 NOT NULL,
  `pro_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prostatus` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Active and 0\r\n = Deactive',
  `color_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `maincatid`, `catid`, `subcatid`, `proname_en`, `brand_name_en`, `brand_name_ar`, `proname_ar`, `price`, `discount_price`, `usd_price`, `usd_discount_price`, `discount`, `added_qty`, `product_weight`, `new_arr`, `offer_month`, `promain_image`, `description_en`, `description_ar`, `pro_create_date`, `updated`, `prostatus`, `color_id`) VALUES
(1, 2, 4, 7, 'BLUE LINES DRIP BOWL', 'Aauthenticity', '', '', 320, 225, 5, 3, '30', 4, 0, 1, 0, '378-Blue_Lines_Drip_Bowl_3_.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"color:#0f1111\">:<span style=\"font-size:14px\"> This Item is available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong>&nbsp; &nbsp;<span style=\"font-size:18.0pt\"><span style=\"color:#0f1111\">About this item:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-10 inch ; Height-2.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"color:#0f1111\">: <span style=\"font-size:14px\">&nbsp;This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(2, 2, 4, 7, 'Flower Bowl-Blue', 'Aauthenticity', '', '', 500, 350, 7, 5, '30', 4, 0, 1, 0, '774-DTES1534.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-size:14px\"><span style=\"color:#0f1111\">: This Item is available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong>&nbsp;&nbsp;<span style=\"font-size:18.0pt\"><span style=\"color:#0f1111\">About this item:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-10 inch ; Height-2.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"color:#0f1111\">: &nbsp;<span style=\"font-size:14px\">This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(3, 2, 4, 7, 'Handmade Ceramic Bowl For Large Serving', 'Aauthenticity', '', '', 450, 350, 6, 5, '22', 4, 0, 1, 0, '1010-Drip_Bowl-Green_4_.jpg', '<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">:<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"> This Item is available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp; &nbsp;</strong><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">About this item:</span></span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-8&nbsp;inch ; Height-3.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">Note</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">: &nbsp;<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></span></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(4, 2, 4, 7, 'Cup Shape Serving Bowl', 'Aauthenticity', '', '', 750, 450, 11, 6, '40', 4, 0, 1, 0, '915-DTES1775.jpg', '<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">: <span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">This Item is available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;</strong><strong><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">About this item:</span></span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-10 inch ; Height-2.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">Note</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Adobe Caslon Pro&quot;,serif\"><span style=\"color:#0f1111\">: &nbsp;<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></span></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(5, 2, 4, 7, 'Bright Blue Drip Bowl', 'Aauthenticity', '', '', 360, 260, 5, 4, '28', 6, 0, 1, 0, '933-IMG_6183.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"color:#0f1111\">: <span style=\"font-size:14px\">This Item is available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong>&nbsp;<span style=\"font-size:18.0pt\"><span style=\"color:#0f1111\">About this item:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-10 inch ; Height-2.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:11.0pt\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"color:#0f1111\">: &nbsp;<span style=\"font-size:14px\">This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(6, 4, 11, 26, 'Buddha Blessings', 'Aauthenticity', '', '', 17300, 13900, 247, 199, '20', 50, 0, 1, 0, '346-IMG_6337.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha is revered as enlightened</span></span><span style=\"color:black\"> one,</span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;who is believed to have transcended&nbsp;</span></span><span style=\"color:black\">karma</span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;and escaped the cycle of&nbsp;</span></span><span style=\"color:black\">birth &amp; rebirth.</span> <span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha was the founder&nbsp;of Buddhism and worshipped.</span></span></span></span></span></p>\r\n\r\n<div style=\"border-bottom:dotted #cccccc 1.0pt; margin-left:.25in; margin-right:0in; padding:0in 0in 19.0pt 0in\">\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is artwork of Indian artisans.</span></span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n</ul>\r\n</div>\r\n\r\n<div style=\"border-bottom:dotted #cccccc 1.0pt; margin-left:.25in; margin-right:0in; padding:0in 0in 19.0pt 0in\">\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#1f3763\"><strong><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></strong></span></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 16 INCHES </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;9.8 KG&nbsp; </span></span></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(7, 4, 11, 26, 'Buddha Blessing With Stone Work', 'Authenticity', '', '', 4000, 3000, 57, 43, '25', 50, 0, 1, 0, '781-IMG_6394.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha is revered as enlightened</span><span style=\"color:black\"> one,</span><span style=\"color:#202122\">&nbsp;who is believed to have transcended&nbsp;</span><span style=\"color:black\">karma</span><span style=\"color:#202122\">&nbsp;and escaped the cycle of&nbsp;</span><span style=\"color:black\">birth &amp; rebirth.</span></span> <span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha was the founder&nbsp;of Buddhism and worshipped.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 16 INCHES </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;9.8 KG&nbsp;</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(8, 4, 11, 26, 'Radha-Krishna Divine Love', 'Aauthenticity', '', '', 28200, 23900, 403, 341, '15', 50, 0, 0, 0, '445-IMG_20210410_165922_1_.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#222222\">Indian mythology has always provided the solution to every kind of question in our life. The love story of Radha Krishna is hymned with praise since ages. Their kind of togetherness and dedication is an inspiration for billions and billions of generations to come.</span></span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Product will be dispatched within 7 days of placing order. For bulk quantity time taken may be about 20 days.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp; &nbsp; &nbsp; &nbsp; 16 INCHES </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight:&nbsp; &nbsp; 9.8 KG&nbsp;</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(10, 2, 4, 7, 'Black Glaze Gold Line Bowl', 'Aauthenticity', '', '', 315, 220, 5, 3, '30', 6, 0, 1, 0, '400-1.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"color:#0f1111\">About this item:</span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-5&nbsp;inch ;</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(11, 2, 4, 7, 'Black Matt Bowl', 'Aauthenticity', '', '', 218, 185, 3, 3, '15', 6, 0, 1, 0, '1062-IMG_6167.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"color:#0f1111\">About this item:</span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-5 Inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(12, 4, 12, 27, 'Diya ', 'Aauthenticity.com', '', '', 1152, 960, 16, 14, '17', 10, 0, 1, 0, '383-IMG_6556.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Deeya is an embellishment of any house. It brings serenity and spirituality to any&nbsp;place whether it is your office or&nbsp;house. It Adds up to the serenity and tranquility of your dwelling. It lights up the statue to be worshipped besides helping you to concentrate and meditate . A flame is the most pious&nbsp; thing&nbsp; of the entire universe as it can not be adulterated hence ideal to offer to the supreme being.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Product will be dispatched within 10 days of placing order. For bulk quantity time taken may be about 20 days.</span></span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>PRODUCT SPECIFICATIONS:</strong></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Material: BRASS</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Size:&nbsp; &nbsp; &nbsp; Height 4&nbsp;INCHES</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Length&nbsp;1&nbsp;INCHES</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Weight: 600 GM</span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>Special Note</strong>:&nbsp;Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><img alt=\"\" src=\"https://aauthenticity.com/assets/website_assets/%20images/checkout-cards.png\" /></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(13, 2, 4, 7, 'Cartoon Hand Painted Bowl', 'Aauthenticity', '', '', 400, 200, 6, 3, '50', 3, 0, 1, 1, '94-1.jpg', '<p><span style=\"font-size:16px\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Note</strong>: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><strong>Special Note</strong>: Dispatched in a maximum of 7&nbsp;business days. This item is in seconds sale. This item is not eligible for return.&nbsp;</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; About this item:</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\">Handmade in India By Artisans</span></li>\r\n	<li><span style=\"font-size:16px\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></li>\r\n	<li><span style=\"font-size:16px\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests.</span></li>\r\n	<li><span style=\"font-size:16px\">You can Pair it with other our collections to make attractive presentation .</span></li>\r\n	<li><span style=\"font-size:16px\">SIZE: Dia-6&nbsp;inch, Height-2.5 inch</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><strong>Note</strong>:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(14, 4, 12, 27, 'Diya With Decorated Holder ', 'aauthenticity', '', '', 576, 480, 8, 7, '17', 10, 0, 1, 0, '203-IMG_6547-removebg-preview.png', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Deeya is an embellishment of any house. It brings serenity and spirituality to any&nbsp;place whether it is your office or&nbsp;house. It Adds up to the serenity and tranquility of your dwelling. It lights up the statue to be worshipped besides helping you to concentrate and meditate . A flame is the most pious&nbsp; thing&nbsp; of the entire universe as it can not be adulterated hence ideal to offer to the supreme being.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Product will be dispatched within 10 days of placing order. For bulk quantity time taken may be about 20 days.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Material: BRASS</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Size:&nbsp; &nbsp; &nbsp; Height 4&nbsp;INCHES </span></span></span></span></span></li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LENGTH 4.5 INCHES</li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Weight: 300 GM</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(15, 4, 12, 27, 'Vaishno Mata ', 'authenticity.com', '', '', 26496, 22080, 379, 315, '17', 10, 0, 1, 0, '7-IMG_6561-removebg-preview__2_-removebg-preview.png', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Ma Vaishno Devi/Bhagwati is the divine powerful Goddess in Hindu mythology. She has many reincarnations as&nbsp;Bhagwati ma as the core form. She is a powerful goddess who is capable of removing the evils and blessing the worshipper with anything that s/he sets her heart on. All the desires are fulfilled with her blessing. The lion as the carrier of the goddess is a symbol of containing the powerful, her hands in a blessing <em>mudra&nbsp;</em>depict the ever so giving Ma Bhagwati. &nbsp;This will bring peace and prosperity to your home.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material: &nbsp;Brass</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 18 Inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 10.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 13.8 Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(16, 4, 12, 27, 'Ganesha on Chariot ', 'aauthenticity.com', '', '', 1500, 1200, 21, 17, '20', 15, 0, 1, 0, '1065-IMG_20210410_161453.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#202124\">GANESHA</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#4d5156\">Lord Ganesha is widely revered, more specifically, as the remover of obstacles, the patron of arts and sciences, and the lord&nbsp;of intellect and wisdom. Known to have written Rigveda, he was lord of mathematics too. Considered&nbsp;the&nbsp;first level of God, he is known to attract positivity wherever he is placed.&nbsp;&nbsp;</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#4d5156\">Product details&nbsp;</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#4d5156\">Height : 4.5 inches&nbsp;</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#4d5156\">Width :7.5 inches&nbsp;</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#4d5156\">Depth : 2 inches</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#4d5156\">Weight : 750 gms .&nbsp;</span></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(17, 4, 12, 27, 'Lord Ganesha', 'Aauthenticity', '', '', 5200, 4160, 74, 59, '20', 10, 0, 1, 0, '238-z.jpg', '<ul>\r\n	<li>\r\n	<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#202124\">GANESHA</span></span></span></span></span></p>\r\n\r\n	<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#4d5156\">Lord Ganesha is widely revered, more specifically, as the remover of obstacles, the patron of arts and sciences, and the deva of intellect and wisdom. Remover of all obstacles, lord ganesha&nbsp;is the first level of God, and is known to have written the Rigveda. He is the most intelligent of all Gods and is worshipped in different forms.&nbsp;</span></span></span></span></span></p>\r\n	</li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might be a&nbsp;slight variation in the color/finish of the product&nbsp;from the one &nbsp;shown in pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within 8 days of placing the order. For bulk quantity time taken maybe about 20 days</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height:&nbsp; &nbsp;8&nbsp;Inche</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">width&nbsp; :&nbsp;</span></span><span style=\"color:#000000\">5 Inches&nbsp;</span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#000000\">Depth: 4.5</span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight:&nbsp;2.6&nbsp;KG&nbsp;</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0);
INSERT INTO `product` (`product_id`, `maincatid`, `catid`, `subcatid`, `proname_en`, `brand_name_en`, `brand_name_ar`, `proname_ar`, `price`, `discount_price`, `usd_price`, `usd_discount_price`, `discount`, `added_qty`, `product_weight`, `new_arr`, `offer_month`, `promain_image`, `description_en`, `description_ar`, `pro_create_date`, `updated`, `prostatus`, `color_id`) VALUES
(18, 4, 12, 27, 'Laxmi ma sitting ', 'Aauthenticity', '', '', 5000, 4000, 71, 57, '20', 10, 0, 1, 0, '1056-IMG_6527.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Ma laxmi is the Goddess of luxury, wealth, riches and happiness. She is known to have emerged form the churning of the ocean and brought multiple precious stones with her. She is known to bring positivity and considered auspicioious when worshipped alongside lord Ganesha. She is worshipped in business places especially in shops, workplaces offices and all such places which create economic activity.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Product specifications&nbsp;</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Height:&nbsp; 8 inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Width:&nbsp; &nbsp;5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">weight:&nbsp;&nbsp;2.5 gms</span></span></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(19, 4, 12, 27, 'Dwar Sundari ', 'Authenticity', '', '', 3400, 2720, 49, 39, '20', 10, 0, 1, 0, '528-IMG_6334.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">DWAR SUNDARI</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">A feminine figure holding a lamp for the passerby is straight from the Royal ancient times when they were employed to cater to the fine taste of royalty. They were beautifully dressed girls who used to assist the queens and showed her the way by holding up the lit lamps. </span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Product Specifications&nbsp;</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Material:</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Height: 10 inches</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>diameter:&nbsp; 3 inches</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>weight: 1.750 kg.</strong></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(20, 4, 12, 27, 'A pair of women holding lamp', 'Aauthenticity', '', '', 1200, 960, 17, 14, '20', 10, 0, 1, 0, '438-IMG_6446.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">A pair of Dwar Sundari </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Two feminine figures holding a lamp on each side of the passage&nbsp;for the passerby is straight from the Royal ancient times when they were employed to cater to the fine taste of royalty. They were beautifully dressed girls who used to assist the queens and kings&nbsp;and showed them&nbsp;the way by holding up the lighted&nbsp;diyas or lamps. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 4.5&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 1.5&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 1.5&nbsp;inches</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Weight : 300gms each</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(21, 4, 12, 29, 'Dwar sundari ', 'Aauthenticity', '', '', 3500, 2800, 50, 40, '20', 10, 0, 1, 0, '215-IMG_6334.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Dwar Sundari </span></span></span></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">A feminine figure holding lamp for the passerby is straight from the Royal ancient times when they were employed to cater to fine taste of royalty. They were beautifully dressed girls who used to assist the queens and showed them the way by holding up the lit diyas</span></span></span></span></p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(22, 4, 12, 29, 'Bullock cart ', 'Aauthenticity ', '', '', 1300, 1040, 19, 15, '20', 10, 0, 1, 0, '826-Being-Nawab-Exquisite-Brass-Metal-SDL986380074-1-3ccb4.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 3&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 3.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">length : 6.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 650 grams&nbsp;</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(23, 4, 12, 29, 'Taramati statue ', 'Aautheticity', '', '', 8400, 6720, 120, 96, '20', 10, 0, 1, 0, '1090-IMG_20210410_162939.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 15&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Width&nbsp; : 6.5&nbsp; Inches&nbsp;</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Depth 6 Inches&nbsp;</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: 4.2&nbsp;Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(24, 2, 4, 7, 'Black Matt Small Bowl', 'Aauthenticity', '', '', 127, 95, 2, 1, '25', 6, 0, 1, 0, '937-1.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-3.5 Inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(25, 4, 12, 29, 'Krishna dancing on snake demon Kalia ', 'Aauthenticity', '', '', 1900, 1520, 27, 22, '20', 10, 0, 1, 0, '72-slazzer-edit-image_6_.png', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 9&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 2.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 2.5&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 950 gms</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(26, 2, 4, 7, 'Dirty Yellow Bowl Small', 'Aauthenticity', '', '', 127, 95, 2, 1, '25', 6, 0, 1, 0, '973-IMG_6137.JPG', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-3.5 Inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(27, 2, 4, 7, 'Dirty Yellow Bowl Medium', 'Aauthenticity', '', '', 230, 185, 3, 3, '20', 6, 0, 1, 0, '739-IMG_6146.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-5 Inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(28, 4, 12, 29, 'Krishna  Playing flute ', 'Aauthenticity', '', '', 5700, 4526, 81, 65, '21', 10, 0, 1, 0, '388-IMG_20210410_164012.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 14.5&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 5.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 2.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 2.850&nbsp;Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(29, 2, 4, 7, 'BD Green Bowl Small', 'Aauthenticity', '', '', 127, 95, 2, 1, '25', 6, 0, 1, 0, '899-zIMG_6094_1_.JPG', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-3.5 Inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(30, 4, 12, 29, 'Natraj form of Shiva', 'Aauthenticity', '', '', 1800, 1440, 26, 21, '20', 10, 0, 1, 0, '438-IMG_20210410_164223.jpg', '<ul>\r\n	<li><span style=\"font-size:18px\"><strong>Nataraja</strong>&nbsp;is a popular figure in Hindu mythology. It is the depiction of Lord Shiva in a dancing pose.&nbsp;</span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">&nbsp;PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 8 Inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 3.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 2&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 900 gms</span></span></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier to &amp; fro charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0);
INSERT INTO `product` (`product_id`, `maincatid`, `catid`, `subcatid`, `proname_en`, `brand_name_en`, `brand_name_ar`, `proname_ar`, `price`, `discount_price`, `usd_price`, `usd_discount_price`, `discount`, `added_qty`, `product_weight`, `new_arr`, `offer_month`, `promain_image`, `description_en`, `description_ar`, `pro_create_date`, `updated`, `prostatus`, `color_id`) VALUES
(31, 4, 12, 29, 'Buddha Chest ', 'Aauthenticity', '', '', 3200, 2560, 46, 37, '20', 10, 0, 1, 0, '541-IMG_20210410_164430.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#202122\">Buddha Chest </span></span></span></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha is revered as an enlightened</span><span style=\"color:black\"> one</span></span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;who is believed to have transcended&nbsp;</span></span><span style=\"background-color:white\"><span style=\"color:black\">karma</span></span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;and escaped the cycle of&nbsp;</span></span><span style=\"background-color:white\"><span style=\"color:black\">birth &amp; rebirth.</span></span> <span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha was the founder&nbsp;of Buddhism and worshipped.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 7&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 6.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 3&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 1.6&nbsp;Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(32, 2, 4, 7, 'IRR Green Bowl Small', 'Aauthenticity', '', '', 140, 105, 2, 2, '25', 6, 0, 1, 0, '762-zIMG_6025_2_.JPG', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-5 inch&nbsp;</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(33, 2, 4, 7, 'Orange Striped Handle Bowl', 'Aauthenticity', '', '', 440, 395, 6, 6, '10', 3, 0, 1, 0, '728-DTES1807a.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Lenght-9&nbsp;inch ; Height-5&nbsp;inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(34, 4, 12, 29, 'Buddha Face ', 'Aauthenticity', '', '', 2000, 1600, 29, 23, '20', 10, 0, 1, 0, '1012-IMG_20210410_164618.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha is revered as an enlightened</span><span style=\"color:black\"> one</span></span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;who is believed to have transcended&nbsp;</span></span><span style=\"background-color:white\"><span style=\"color:black\">karma</span></span><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;and escaped the cycle of&nbsp;</span></span><span style=\"background-color:white\"><span style=\"color:black\">birth &amp; rebirth.</span></span> <span style=\"background-color:white\"><span style=\"color:#202122\">Lord Buddha was the founder&nbsp;of Buddhism and worshipped.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within 8 days of placing the order. For bulk quantity time taken maybe about 20 days.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">height:5.5&nbsp;INCHES </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 2.5 Inches</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth: 2.5 Inches&nbsp;</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: 1&nbsp;Kg&nbsp;</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(35, 2, 4, 7, 'Flower Wavy Bowl Medium', 'Aauthenticity', '', '', 187, 150, 3, 2, '20', 4, 0, 1, 0, '392-DTES1546.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-6&nbsp;inch ; Height-3&nbsp;inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(36, 4, 12, 29, '20', 'Aauthenticity', '', '', 16900, 13520, 241, 193, '20', 10, 0, 1, 0, '693-IMG_20210410_164012.jpg', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">The only complete man that has ever visited earth. Lord Krishna is known for his various kalas ( art forms ) as well as various roles that he played in his course of life. T<span style=\"color:#202122\">he most revered role was when he used to play the&nbsp;flute while taking his herd of cows for grazing. This form of Krishna is known to bring positivity wherever it is placed. Ideal for gifting&nbsp;</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within eight days of placing the order. In case you need bulk quantity, it may take about 20 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 18 Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 10.5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 13.8 Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(37, 2, 4, 7, 'Flower Way Bowl Small', 'Aauthenticity', '', '', 150, 120, 2, 2, '20', 4, 0, 1, 0, '853-DTES1534.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Bowl is Perfect to serve piping hot preparations and soups, sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Bowl is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving hot soups, curry, vegetables etc. To Your Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-5&nbsp;inch ; Height-2.25 inch</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(38, 4, 12, 29, 'Radha Waiting For Krishna', 'Aauthenticity ', '', '', 15700, 12560, 224, 179, '20', 10, 0, 1, 0, '586-IMG_20210410_165706.jpg', '<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">20&#39;Radha statue&nbsp;</span></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#222222\">Indian mythology has always provided the solution to every kind of question in our life. The love story of Radha Krishna is hymned with praise for ages. Their kind of togetherness and dedication is an inspiration for billions and billions of generations to come.</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 20&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 6.5&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Depth : 5 inches </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 7.850&nbsp;Kg</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(39, 2, 4, 30, 'Ceramic Cake Stand', 'Aauthenticity', '', '', 750, 600, 11, 9, '20', 4, 0, 1, 0, '824-CAKE_STAND_4_.jpeg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">Cake Stand&nbsp;is Perfect way to showcase your cake preperations.. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 30&nbsp;days against advance payment.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"color:#0f1111\">About this item:</span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Handmade in India By Artisans</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The Ceramic Cake Stand&nbsp;is food safe (lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">You can Pair it with other our collections to make attractive presentation .</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:black\">SIZE: Dia-11&nbsp;inch ; Height-3.5 inch</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(40, 4, 12, 29, 'Four musicians ', 'Aauthenticity', '', '', 3500, 2800, 50, 40, '20', 10, 0, 1, 0, '690-IMG_20210410_171150.jpg', '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Three Musicians&nbsp;</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">These tiny 3&nbsp;inches musicians are the centre of attraction of any living room,&nbsp;</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">The product will be dispatched within ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS</span></span></strong><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Height: 3&nbsp;Inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Width : 14&nbsp;inches </span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight : 1750 gms</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(41, 2, 4, 8, 'Ceramic Chip n Dip Platter', 'Aauthenticity', '', '', 622, 500, 9, 7, '20', 4, 0, 1, 0, '640-CREATIVE_6_.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Ceramic Platter is Perfect to serve piping hot preparations &amp; sits well on your table. Pair it with other pieces from the collection to complete the set.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0.5in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer (even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade In India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Platter Is food safe(lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving Appetizers And Snacks To Your Guests. Can Also Be Used For Serving Breads, Fruits, Salads, Etc.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Package Content: 1 Platter</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-12&nbsp;inch ; Height-2.5 inch</span></span></span></span></span></span></li>\r\n	<li>&nbsp;</li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0);
INSERT INTO `product` (`product_id`, `maincatid`, `catid`, `subcatid`, `proname_en`, `brand_name_en`, `brand_name_ar`, `proname_ar`, `price`, `discount_price`, `usd_price`, `usd_discount_price`, `discount`, `added_qty`, `product_weight`, `new_arr`, `offer_month`, `promain_image`, `description_en`, `description_ar`, `pro_create_date`, `updated`, `prostatus`, `color_id`) VALUES
(42, 4, 12, 29, 'Eagle ', 'Aauthenticity', '', '', 4200, 3360, 60, 48, '20', 10, 0, 1, 0, '11-IMG_20210410_170824.jpg', '<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Indian mythology has always provided the solution to every kind of question in our life. The love story of Radha Krishna is hymned with praise for ages. Their kind of togetherness and dedication is an inspiration for billions and billions of generations to come.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">The product will be dispatched within Ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more. </span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:18px\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><strong><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">&nbsp;PRODUCT SPECIFICATIONS:</span></span></strong></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Material:&nbsp; Brass</span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Height: 9.5&nbsp;Inches </span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Width : 7.5 inches </span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Depth : 5.5 inches </span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Weight : 2.100 Kg</span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(43, 2, 4, 6, 'Black Glaze Gold Line 10\"', 'Aauthenticity', '', '', 435, 349, 6, 5, '20', 6, 0, 1, 0, '307-BLACK_PLATE_GOLD_LINE.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">About this item</span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Handmade In India By Artisans</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">The Ceramic Plate Is food safe(lead free), Microwave &amp; Dishwasher Safe.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Ideal For Serving delicious preperations To Your Family or Guests. </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">SIZE: Dia-10 inch ; Height-2.5 inch</span></span></span></span></span></span></li>\r\n	<li>&nbsp;</li>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">:This Is Handmade Stoneware Pottery: Handpainted/handmade stoneware item: There Might Be A Slight Variation In The Glazing/Color/Finish On each Product, Which Is Natural And Hence Makes The Product Unique.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(48, 4, 12, 29, 'Eagle Ready ', 'Aauthenticity', '', '', 3725, 2980, 53, 43, '20', 10, 0, 1, 0, '668-IMG_20210410_172650.jpg', '<ul>\r\n	<li><span style=\"font-size:18px\">Indian mythology has always provided the solution to every kind of question in our life. The love story of Radha Krishna is hymned with praise for ages. Their kind of togetherness and dedication is an inspiration for billions and billions of generations to come.</span></li>\r\n	<li><span style=\"font-size:18px\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></li>\r\n	<li><span style=\"font-size:18px\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></li>\r\n	<li><span style=\"font-size:18px\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></li>\r\n	<li><span style=\"font-size:18px\">The product will be dispatched within Ten&nbsp;days of placing the order. In case you need bulk quantity, it may take about 30 days or more.</span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-size:18px\"><strong>&nbsp;PRODUCT SPECIFICATIONS:</strong></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\">Material:&nbsp; Brass</span></li>\r\n	<li><span style=\"font-size:18px\">Height: 7.5&nbsp;Inches</span></li>\r\n	<li><span style=\"font-size:18px\">Width : 3.5 inches</span></li>\r\n	<li><span style=\"font-size:18px\">Depth : 3.45 inches</span></li>\r\n	<li><span style=\"font-size:18px\">Weight :1.75&nbsp;&nbsp;Kg</span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(49, 4, 12, 27, 'LORD BALA JI', 'Aauthenticity', '', '', 3000, 2700, 43, 39, '10', 10, 0, 1, 0, '154-IMG_20210410_163722.jpg', '<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#222222\">Indian mythology has always provided the solution to every kind of question in our life. Lord Bala Ji or </span><span style=\"color:#202122\">Venkateshwara, also known by various other names,</span></span><sup><span style=\"background-color:white\"><span style=\"color:#202122\"><a href=\"https://en.wikipedia.org/wiki/Venkateswara#cite_note-namegovinda-1\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#0645ad\">[1]</span></a></span></span></sup><span style=\"background-color:white\"><span style=\"color:#202122\">&nbsp;is a form of the Hindu god&nbsp;</span></span><span style=\"color:black\"><a href=\"https://en.wikipedia.org/wiki/Vishnu\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Vishnu\"><span style=\"background-color:white\"><span style=\"color:black\">Vishnu</span></span></a></span><span style=\"background-color:white\"><span style=\"color:#202122\">. Venkateswara is the presiding deity of&nbsp;</span></span><span style=\"color:black\"><a href=\"https://en.wikipedia.org/wiki/Tirumala_Venkateswara_Temple\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Tirumala Venkateswara Temple\"><span style=\"background-color:white\"><span style=\"color:black\">Tirumala Venkateswara Temple</span></span></a>.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Product will be dispatched within 7 days of placing order. For bulk quantity time taken may be about 20 days.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Height: 9 inches</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Width:&nbsp; &nbsp; &nbsp; &nbsp; 5 inches</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Depth:&nbsp; &nbsp; &nbsp; &nbsp; 2.5 inches</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight:&nbsp; &nbsp;1.6&nbsp;KG&nbsp;</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(50, 4, 12, 29, 'Antique Finish Brass Boat With 2 Men', 'Aauthenticity', '', '', 3000, 2400, 43, 34, '20', 10, 0, 1, 0, '529-IMG_20210410_165013.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#505050\">Make attractive the decor of your beautiful home or office with this beautiful piece of craft This Antique Finish Brass Boat With 2 Men, a Decorative Showpiece&quot; has been handcrafted by artisans and feature detailed work on its body. The beautiful piece of art will make a stylish statement wherever you will place it. Gift this beautiful item to impress your contacts.</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Product will be dispatched within 10 days of placing order. For bulk quantity time taken may be about 20 days.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Material: BRASS</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span></span>\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Length: 12.5 Inch</span></span></li>\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Height:&nbsp; 4.5 Inch</span></span></li>\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Depth:&nbsp;&nbsp; 2 Inch</span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Weight: &nbsp;&nbsp;1.5 Kg</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(51, 4, 12, 27, 'Diya Designer Parrot Stand', 'Aauthenticity', '', '', 1200, 960, 17, 14, '20', 10, 0, 1, 0, '60-IMG_6551-removebg-preview.jpg', '<p>Deeya is an embellishment of any house. It brings serenity and spirituality to any&nbsp;place whether it is your office or&nbsp;house. It Adds up to the serenity and tranquility of your dwelling. It lights up the statue to be worshipped besides helping you to concentrate and meditate . A flame is the most pious&nbsp; thing&nbsp; of the entire universe as it can not be adulterated hence ideal to offer to the supreme being.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Product will be dispatched within 10 days of placing order. For bulk quantity time taken may be about 20 days.</li>\r\n</ul>\r\n\r\n<h3><strong>PRODUCT SPECIFICATIONS:</strong></h3>\r\n\r\n<ul>\r\n	<li>Material: BRASS</li>\r\n	<li>Size:&nbsp; &nbsp; &nbsp; Height 4.2 INCHES</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Length 5&nbsp;&nbsp;INCHES</li>\r\n	<li>Weight: 600 GM</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Special Note</strong>:&nbsp;Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(52, 4, 12, 29, 'Elephant Playful With Ball', 'Aauthenticity', '', '', 2400, 1925, 34, 28, '20', 10, 0, 1, 0, '90-IMG_6570_1_.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:9.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#505050\">Make attractive the decor of your beautiful home or office with this beautiful piece of craft This Playful Elephant With Ball, a Decorative Showpiece&quot; has been handcrafted by artisans and feature detailed work on its body. The beautiful piece of art will make a stylish statement wherever you will place it. Gift this beautiful item to impress your contacts.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Material: BRASS</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span></span>\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Length: &nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Height:&nbsp; &nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Depth:&nbsp;&nbsp; &nbsp;Inch</span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Weight:&nbsp; &nbsp;1.2&nbsp;Kg</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Product will be dispatched within 10 days of placing order. For bulk quantity time taken may be about 30 days.</span></span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(53, 4, 12, 29, 'Mahatma Gandhi On Spinning Wheel', 'Aauthenticity', '', '', 4550, 3400, 65, 49, '25', 50, 0, 1, 0, '651-IMG_20210410_160955_1_.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#2a313b\">For Gandhiji, the charkha represented the common man and their sufferings and their fight against the colonial rule</span>.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#505050\">Make attractive the decor of your beautiful home or office with this beautiful piece of craft This Decorative Showpiece&quot; has been handcrafted by artisans and feature detailed work on its body. The beautiful piece of art will make a stylish statement wherever you will place it. Gift this beautiful item to impress your contacts.</span></span></span></span></p>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span>\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Length: 10&nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Breadth 13&nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Height:&nbsp; 4.5 Inch</span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;&nbsp;Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(54, 4, 12, 27, 'Ganesha Relishing Ladoo', 'Aauthenticity', '', '', 4500, 3600, 64, 51, '20', 50, 0, 1, 0, '592-IMG_6660-removebg-preview-removebg-preview.png', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"background-color:white\"><span style=\"color:#4d5156\">Lord Ganesha is widely revered, more specifically, as the remover of obstacles; the patron of arts and sciences; and the deva of intellect and wisdom.</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS &amp; STONES</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span>\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Length: 5&nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Height:&nbsp; 6&nbsp;Inch</span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;1.5 Kg</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(55, 4, 12, 27, 'Brass Ganesha-Vakratunda', 'Aauthenticity', '', '', 29000, 20400, 414, 291, '30', 50, 0, 1, 0, '1077-IMG_E6326-removebg-preview.png', '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Lord Ganesha is widely revered, more specifically, as the remover of obstacles; the patron of arts and sciences; and the deva of intellect and wisdom.</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>PRODUCT SPECIFICATIONS:</strong></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Material: BRASS &amp; STONES</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Size:&nbsp;&nbsp;&nbsp;</span></span>\r\n	<ul>\r\n		<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Height:&nbsp; 16&nbsp;Inch</span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Weight:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12.7&nbsp;Kg</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Special Note</strong>:&nbsp;Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(56, 4, 12, 29, 'Ganesha Designer-Antique Look', 'Aauthenticity', '', '', 5400, 4300, 77, 61, '20', 50, 0, 1, 0, '848-IMG_6623_1_.jpg', '<p>Lord Ganesha is widely revered, more specifically, as the remover of obstacles; the patron of arts and sciences; and the deva of intellect and wisdom.</p>\r\n\r\n<ul>\r\n	<li>You can use it to add grace to your prayer room or elevate any corner of your sweet home.</li>\r\n	<li>There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</li>\r\n</ul>\r\n\r\n<h3><strong>PRODUCT SPECIFICATIONS:</strong></h3>\r\n\r\n<ul>\r\n	<li>Material: BRASS&nbsp;</li>\r\n	<li>Size:&nbsp;&nbsp;&nbsp;\r\n	<ul>\r\n		<li>Height:&nbsp; 10&nbsp;Inch</li>\r\n	</ul>\r\n	</li>\r\n	<li>Weight:&nbsp; &nbsp;2.7&nbsp;&nbsp;Kg</li>\r\n	<li><strong>Special Note</strong>:&nbsp;Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(57, 4, 12, 29, 'Ganesha Designer-Brass + Stone', 'Aauthenticity', '', '', 5500, 4400, 79, 63, '20', 50, 0, 1, 0, '436-IMG_6656-removebg-preview.png', '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Lord Ganesha is widely revered, more specifically, as the remover of obstacles; the patron of arts and sciences; and the deva of intellect and wisdom.</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>PRODUCT SPECIFICATIONS:</strong></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Material: BRASS&nbsp;</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Size:&nbsp;&nbsp;&nbsp;</span></span>\r\n	<ul>\r\n		<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Height:&nbsp; &nbsp; 6&nbsp;Inch</span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">&nbsp; &nbsp; &nbsp; &nbsp; Weight:&nbsp; &nbsp;2.8&nbsp; Kg</span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Special Note</strong>:&nbsp;Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(58, 4, 12, 27, 'Oil Pourer Spoon Designed', 'Aauthenticity', '', '', 1150, 800, 16, 11, '30', 50, 0, 1, 0, '874-IMG_6464a.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#666666\">This is an intricately carved prayer spoon used for offering worship/aahutee during puja or havan . The spoon has a small bowl to fill holy water or oil with a decorative finial and an abstract design on the top and bottom of the spoon . </span><span style=\"color:#505050\">The beautiful piece of art will make a stylish statement wherever you will place it. Gift this beautiful item to impress your contacts.</span></span></span></p>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span>\r\n	<ul>\r\n		<li style=\"list-style-type:none\">\r\n		<ul>\r\n			<li style=\"list-style-type:none\">\r\n			<ul style=\"list-style-type:square\">\r\n				<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Length: 11&nbsp;Inch</span></span></li>\r\n				<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Height:&nbsp; 0.75&nbsp;Inch</span></span></li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;1.5 Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(59, 4, 12, 27, 'Lord Hanuman Blessing', 'Aauthenticity', '', '', 600, 450, 9, 6, '25', 50, 0, 1, 0, '653-IMG_6432a.jpg', '<p><em><strong>Lord Hanuman</strong></em>&nbsp;is a Hindu&nbsp;<em><strong>god</strong></em>&nbsp;and divine vanara companion of the&nbsp;<em><strong>God</strong></em>&nbsp;Rama.&nbsp;<em><strong>Hanuman</strong></em>&nbsp;is one of the central characters of the Hindu epic Ramayana. Lord Hanuman is widely revered, more specifically, as the provider of success in life.</p>\r\n\r\n<h3><strong>PRODUCT SPECIFICATIONS:</strong></h3>\r\n\r\n<ul>\r\n	<li>Material: BRASS</li>\r\n	<li>Size:&nbsp;&nbsp;&nbsp;\r\n	<ul>\r\n		<li>\r\n		<ul>\r\n			<li>\r\n			<ul>\r\n				<li>Length: 1.5&nbsp;Inch</li>\r\n				<li>Height:&nbsp; &nbsp;3.25 Inch</li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>Weight:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;300 GM</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Special Note</strong>: Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery sceme) and deducted from buyer account during final settlement.</li>\r\n</ul>\r\n\r\n<p>There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(60, 4, 12, 29, 'Incense Holder', 'Aauthenticity', '', '', 1600, 1280, 23, 18, '20', 50, 0, 1, 0, '348-IMG_6613.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#666666\">Purify your home or office with nice fragrance with the help of beautifully crafted Incense Holder.</span><span style=\"color:#505050\"> The beautiful piece of art will make a stylish statement wherever you will place it. Gift this beautiful item to impress your contacts.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong><span style=\"background-color:white\"><span style=\"color:#1b1b1b\">PRODUCT SPECIFICATIONS:</span></span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Material: BRASS</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Size:&nbsp;&nbsp;&nbsp;</span></span></span></span>\r\n	<ul>\r\n		<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Height:&nbsp; 6.25&nbsp;Inch</span></span></li>\r\n		<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Dia:&nbsp; &nbsp; &nbsp; &nbsp; 3.5 Inch</span></span></li>\r\n	</ul>\r\n	</li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:black\">Weight: &nbsp;&nbsp;1.5 Kg</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">There Might Be A Slight Variation in the Color/Finish of Product than as shown in pic.</span></span></span></span></li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(61, 4, 12, 29, 'Natraja Antique Look', 'Aauthenticity', '', '', 1580, 1100, 23, 16, '30', 50, 0, 1, 0, '400-IMG_6636-removebg-preview.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>Nataraja</strong>&nbsp;is a popular figure in Hindu mythology. It is the depiction of Lord Shiva in a dancing pose.&nbsp;</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>&nbsp;PRODUCT SPECIFICATIONS</strong><strong>:</strong></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Material:&nbsp; Brass</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Height: 6&nbsp;Inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Width : 5&nbsp;inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Depth : 2&nbsp;inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Weight : 650&nbsp;gms</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>Special Note</strong>: Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier to &amp; fro charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(62, 4, 12, 27, 'Ram Darbaar', 'Aauthenticity', '', '', 4450, 3350, 64, 48, '25', 10, 0, 1, 0, '1068-a.png', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:black\"><strong>Ram Darbar</strong>&nbsp;featuring Ram,Sita Lakshman and Hanuman.</span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"color:#1f3763\"><strong>&nbsp;</strong><strong><span style=\"color:black\">PRODUCT SPECIFICATIONS</span></strong><strong>:</strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Material:&nbsp; Brass</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Height: &nbsp;Inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Width : &nbsp;inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Depth : &nbsp;inches</span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">Weight :1.9 KG</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><strong>Special Note</strong>: Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier to &amp; fro charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0);
INSERT INTO `product` (`product_id`, `maincatid`, `catid`, `subcatid`, `proname_en`, `brand_name_en`, `brand_name_ar`, `proname_ar`, `price`, `discount_price`, `usd_price`, `usd_discount_price`, `discount`, `added_qty`, `product_weight`, `new_arr`, `offer_month`, `promain_image`, `description_en`, `description_ar`, `pro_create_date`, `updated`, `prostatus`, `color_id`) VALUES
(63, 4, 12, 27, 'Conch Decorative', 'Aauthenticity', '', '', 5100, 3800, 73, 54, '25', 10, 2, 1, 0, '815-IMG_6589.jpg', '<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">A&nbsp;</span></span></span></span>Conch or <strong>Shankha</strong>&nbsp;is of ritual and religious importance in&nbsp;<span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Hinduism\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Hinduism\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">Hinduism</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">. In&nbsp;</span></span></span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Hindu_mythology\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Hindu mythology\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">Hindu mythology</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">, the shankha is a sacred&nbsp;</span></span></span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Emblem\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Emblem\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">emblem</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">&nbsp;of The Hindu preserver god&nbsp;</span></span></span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Vishnu\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Vishnu\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">Vishnu</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">. It is still used as a&nbsp;</span></span></span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Trumpet\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Trumpet\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">trumpet</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">&nbsp;in Hindu ritual, and in the past was used as a war trumpet. The shankha is praised in Hindu scriptures as a giver of fame, longevity and prosperity, the cleanser of sin and the abode of goddess&nbsp;</span></span></span></span><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><a href=\"https://en.wikipedia.org/wiki/Lakshmi\" style=\"font-variant-ligatures:normal; font-variant-caps:normal; orphans:2; text-align:start; widows:2; -webkit-text-stroke-width:0px; word-spacing:0px; color:blue; text-decoration:underline\" title=\"Lakshmi\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"color:black\">Lakshmi</span></span></span></a></span><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">,</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Showcasing a beautiful item made with brass is an artwork of Indian artisans.</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">You can use it to add grace to your prayer room or elevate any corner of your sweet home.</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n\r\n<h3 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Calibri Light&quot;,sans-serif\"><span style=\"color:#1f3763\"><strong>&nbsp;</strong><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">PRODUCT SPECIFICATIONS</span></span></span></strong><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif\">:</span></strong></span></span></span></h3>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Material:&nbsp; Brass</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Height: 3.5&nbsp;Inches</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Length : 9&nbsp;inches</span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Weight : 2.2 KG</span></span></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">Special Note</span></span></strong><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">: Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier to &amp; fro charges for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(64, 2, 13, 31, 'Round Wood Tray With Decorative Handle', 'Aauthenticity', '', '', 1500, 1200, 21, 17, '20', 10, 0, 1, 0, '348-IMG_20210321_182411.jpg', '<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Note</span></strong><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></li>\r\n	<li><span style=\"font-size:20px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">ABOUT</span></strong></span></span></span><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\"> </span></strong><span style=\"color:#0f1111\">: Size(Inch):&nbsp; 16 X16&nbsp; &nbsp; &nbsp; &nbsp; Material : Mango Wood</span></span></span></span></li>\r\n	<li><span style=\"font-size:20px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">CONVENIENCE</span></strong></span></span></span><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></li>\r\n	<li><span style=\"font-size:20px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong></span></span></span><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges(To &amp; Fro) for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n	<li><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(65, 2, 13, 31, 'Round Wood Tray-Hand Made', 'Aauthenticity', '', '', 1000, 650, 14, 9, '35', 10, 0, 1, 0, '419-a.jpeg', '<p style=\"margin-left:0.5in; margin-right:0in\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Bulk Order</span></strong><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:20px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">ABOUT</span></strong></span></span><span style=\"font-size:18px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\"> </span></strong><span style=\"color:#0f1111\">: Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Material : </span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:20px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">CONVENIENCE</span></strong></span></span><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:20px\"><span style=\"background-color:white\"><strong><span style=\"color:#0f1111\">Special Note</span></strong></span></span><span style=\"font-size:18px\"><span style=\"background-color:white\"><span style=\"color:#0f1111\">: </span><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges<span style=\"background-color:white\"> (To &amp; Fro) </span>&nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></li>\r\n	<li><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:18px\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 0, 0),
(67, 2, 13, 31, 'Wood Handmade Lines Tray-Burn Look', 'Aauthenticity', '', '', 420, 295, 6, 4, '30', 10, 0, 1, 0, '552-IMG_20210321_172557.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch): 6&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Material : Mango Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(68, 2, 13, 31, 'Hammered - Burn Look Wood Tray-Square', 'Aauthenticity', '', '', 465, 325, 7, 5, '30', 10, 0, 1, 0, '915-IMG_20210321_180844.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch): 6&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Material : Acacia&nbsp;Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(69, 2, 4, 8, 'Hammered-Burn Look Wood Platter-Rectangle', 'Aauthenticity', '', '', 800, 600, 11, 9, '25', 10, 0, 1, 0, '973-a.jpeg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch):&nbsp;10&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Material : Acacia&nbsp;Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(70, 2, 4, 8, 'Hammered-Burn Look Wood Platter-Edged up', 'Aauthenticity', '', '', 800, 600, 11, 9, '25', 10, 0, 1, 0, '351-a.jpeg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch): 10&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Material : Acacia&nbsp;Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(71, 2, 4, 8, 'Wood Hammered Burn Look Platter-Side Design', 'Aauthenticity', '', '', 800, 600, 11, 9, '25', 10, 0, 1, 0, '756-a.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch):&nbsp;10&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Material : Acacia&nbsp;Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(72, 2, 4, 8, 'Wood Platter With Handle-Abstract Lines', 'Aauthenticity', '', '', 900, 720, 13, 10, '20', 10, 0, 1, 0, '706-IMG_20210321_174206.jpg', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Bulk Order</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: This Item is also available in ask to make category, in which item will be made available on demand within 25 days against advance payment.</span></span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">ABOUT</span></span></span></span></strong><strong> </strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Size(Inch):&nbsp;12&nbsp;X 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Material : Mango Wood</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">CONVENIENCE</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: Beautifully designed for everyday use. This item can be conveniently used as Tea/coffee tray snacks tray, drinks tray, etc.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Comfort &amp; Use: &nbsp;Handmade by Indian artisans from high quality wood with a natural finish. Artisans have taken every care for easy use.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">Special Note</span></span></span></span></strong><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#0f1111\">: </span></span></span></span><span style=\"font-size:13.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:black\">Dispatched in a maximum of 10 business days. This item is eligible for return. While making return it&rsquo;s the buyer responsibility that packing should be proper as received. Courier charges (To &amp; Fro) &nbsp;for return item will have to be born by buyer( even in free delivery scheme) and deducted from buyer account during final settlement.</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">There Might Be A Slight Variation in the Color/Finish of the Product than as shown in the pic.</span></span></span></span></li>\r\n</ul>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(73, 5, 2, 4, 'hello mugs', 'hello mugs', '', '', 12000, 1000, 171, 14, '92', 12, 0, 1, 1, '998-4.jpg', '<p>hell&nbsp;hello mugs</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 2),
(74, 5, 2, 4, 'hello mugs', 'hello mugs', '', '', 12000, 1000, 171, 14, '92', 12, 0, 1, 1, '956-4.jpg', '<p>hell&nbsp;hello mugs</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 2),
(75, 5, 2, 13, 'catid', 'catid', '', '', 15000, 12000, 214, 171, '20', 10, 1, 1, 1, '258-9.jpg', '<p>catid</p>\r\n\r\n<p>catid</p>\r\n\r\n<p>catid</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 2),
(76, 5, 2, 4, 'pro', 'asdfghjkl', '', '', 234, 124, 3, 2, '47', 20, 0, 1, 0, '907-3.jpg', '<p>sdfghjkl;&#39;</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 2),
(77, 5, 2, 13, 'cofffee mug', 'cofffee mug', '', '', 500, 450, 7, 6, '10', 0, 1, 1, 1, '512-in6.jpg', '<p>cofffee mug&nbsp;cofffee mug</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 1),
(78, 1, 5, 12, 'product', 'asdfghjk', '', '', 2000, 1500, 29, 14, '50', 0, 1, 1, 1, '79-2.jpg', '<p>asdfghjk</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0),
(79, 1, 1, 35, 'new pro', 'fdg', '', '', 1000, 500, 14, 7, '50', 0, 1, 1, 1, '994-2.jpg', '<p>fdgfdgfdgfdg</p>\r\n', '', '2021-10-18 08:54:20', '2021-10-18 08:54:20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `pro_cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `maincatid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`pro_cat_id`, `product_id`, `maincatid`, `catid`, `subcatid`) VALUES
(1, 75, 5, 2, 15),
(2, 75, 2, 8, 19),
(3, 65, 1, 1, 34),
(4, 65, 1, 5, 12),
(5, 76, 5, 2, 4),
(6, 77, 5, 2, 13),
(7, 78, 1, 5, 12),
(8, 79, 1, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `pro_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_image_name` varchar(50) NOT NULL,
  `pro_image_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`pro_image_id`, `product_id`, `pro_image_name`, `pro_image_status`) VALUES
(6, 13, 'mekea2535_01.jpg', 1),
(12, 0, 'Hand_made_flower_collection_(1).jpeg', 1),
(13, 0, 'Hand_made_flower_collection_1.jpeg', 1),
(18, 0, 'Hand_made_flower_collection_(1)1.jpeg', 1),
(19, 0, 'Hand_made_flower_collection_11.jpeg', 1),
(20, 0, 'Hand_made_flower_collection_(1)2.jpeg', 1),
(21, 0, 'Hand_made_flower_collection_12.jpeg', 1),
(22, 0, 'WhatsApp_Image_2021-03-21_at_9_12_19_PM.jpeg', 1),
(23, 0, 'WhatsApp_Image_2021-03-21_at_9_12_18_PM.jpeg', 1),
(24, 0, 'WhatsApp_Image_2021-03-21_at_9_12_17_PM_(2).jpeg', 1),
(25, 0, 'WhatsApp_Image_2021-03-21_at_9_12_17_PM_(1).jpeg', 1),
(26, 0, 'WhatsApp_Image_2021-03-21_at_9_12_17_PM.jpeg', 1),
(27, 0, 'Blue_Lines_Drip_Bowl_(1).jpg', 1),
(28, 0, 'in71.jpg', 1),
(29, 0, 'in8.jpg', 1),
(30, 0, 'in81.jpg', 1),
(35, 13, 'DTES11009.jpg', 1),
(69, 1, 'Blue_Lines_Drip_Bowl_(1)1.jpg', 1),
(70, 1, 'Blue_Lines_Drip_Bowl_(2)1.jpg', 1),
(71, 1, 'Blue_Lines_Drip_Bowl_(4).jpg', 1),
(72, 2, 'DTES1138_.jpg', 1),
(73, 2, 'DTES1138.jpg', 1),
(74, 2, 'DTES1142.jpg', 1),
(75, 3, 'Drip_Bowl-Green_(1).jpg', 1),
(76, 3, 'Drip_Bowl-Green_(2).jpg', 1),
(77, 3, 'Drip_Bowl-Green_(3).jpg', 1),
(78, 4, 'DTES1807.jpg', 1),
(79, 4, 'DTES1809_.jpg', 1),
(80, 4, 'DTES1809.jpg', 1),
(81, 5, 'IMG_6180.jpg', 1),
(82, 5, 'IMG_6181.jpg', 1),
(83, 5, 'IMG_6182.jpg', 1),
(87, 7, 'IMG_6397_(1).jpg', 1),
(88, 7, 'IMG_6398_(1).jpg', 1),
(89, 8, 'IMG_6383.jpg', 1),
(90, 8, 'IMG_6384_(1).jpg', 1),
(91, 8, 'IMG_6368.jpg', 1),
(92, 9, 'IMG_6569.jpg', 1),
(93, 9, 'IMG_6570_(1).jpg', 1),
(95, 10, 'WhatsApp_Image_2021-03-13_at_8_37_46_PM.jpeg', 1),
(96, 10, 'WhatsApp_Image_2021-03-13_at_8_37_47_PM_(2).jpeg', 1),
(100, 10, 'WhatsApp_Image_2021-03-13_at_8_37_47_PM_(2)1.jpeg', 1),
(101, 10, 'WhatsApp_Image_2021-03-13_at_8_37_48_PM_(1).jpeg', 1),
(102, 11, 'IMG_6169.jpg', 1),
(103, 11, 'IMG_6169a.jpg', 1),
(104, 11, 'IMG_6171.jpg', 1),
(107, 12, 'IMG_6557.jpg', 1),
(108, 12, 'IMG_6558.jpg', 1),
(110, 13, 'IMG_6019.JPG', 1),
(111, 13, 'IMG_6021.jpg', 1),
(112, 13, 'zcontainer_(8).jpg', 1),
(113, 14, 'IMG_6538.jpg', 1),
(115, 14, 'IMG_6540.jpg', 1),
(119, 16, 'IMG_20210410_161353.jpg', 1),
(120, 16, 'IMG_20210410_161402.jpg', 1),
(121, 16, 'IMG_20210410_161453.jpg', 1),
(122, 17, 'IMG_6523.jpg', 1),
(123, 17, 'IMG_6524-removebg-preview.png', 1),
(124, 17, 'IMG_6525.jpg', 1),
(125, 18, '2_5_KG.jpg', 1),
(126, 18, 'IMG_6527.jpg', 1),
(127, 18, 'IMG_6528-removebg-preview.png', 1),
(128, 19, 'IMG_6334.jpg', 1),
(129, 19, 'IMG_6335.jpg', 1),
(130, 19, 'IMG_6336-removebg-preview.png', 1),
(131, 20, 'IMG_6446.jpg', 1),
(132, 20, 'IMG_6448.jpg', 1),
(133, 20, 'IMG_6450.jpg', 1),
(135, 21, 'IMG_63351.jpg', 1),
(136, 21, 'IMG_6336-removebg-preview1.png', 1),
(138, 23, 'IMG_20210410_162932.jpg', 1),
(139, 23, 'IMG_20210410_162939.jpg', 1),
(140, 24, '2_(1).jpg', 1),
(141, 24, '2_(2).jpg', 1),
(142, 24, '2_(3).jpg', 1),
(143, 25, 'IMG_20210410_163523.jpg', 1),
(144, 25, 'IMG_20210410_163530.jpg', 1),
(145, 25, 'IMG_20210410_163545.jpg', 1),
(147, 26, 'IMG_6141.JPG', 1),
(148, 26, 'IMG_6145.jpg', 1),
(152, 27, 'IMG_61481.JPG', 1),
(153, 27, 'IMG_61491.jpg', 1),
(154, 27, 'IMG_61501.jpg', 1),
(155, 28, 'IMG_20210410_164012.jpg', 1),
(156, 28, 'IMG_20210410_164034.jpg', 1),
(157, 28, 'IMG_20210410_164046_(1).jpg', 1),
(158, 28, 'IMG_20210410_164106.jpg', 1),
(159, 29, 'zIMG_6094_(2).JPG', 1),
(160, 29, 'zIMG_6094_(3).JPG', 1),
(161, 29, 'zIMG_6094_(4).JPG', 1),
(162, 29, 'zIMG_6094_(5).JPG', 1),
(165, 30, 'IMG_20210410_164232.jpg', 1),
(167, 30, 'IMG_20210410_164300.jpg', 1),
(169, 31, 'IMG_20210410_164441.jpg', 1),
(170, 31, 'IMG_20210410_164501_(1).jpg', 1),
(171, 31, 'IMG_20210410_164512.jpg', 1),
(172, 32, 'zIMG_6025_(6).JPG', 1),
(173, 32, 'zIMG_6025_(7).JPG', 1),
(174, 32, 'zIMG_6033_(1).JPG', 1),
(175, 33, 'DTES18071.jpg', 1),
(176, 33, 'DTES1809_1.jpg', 1),
(177, 33, 'DTES18091.jpg', 1),
(179, 34, 'IMG_20210410_164624.jpg', 1),
(180, 34, 'IMG_20210410_164631.jpg', 1),
(181, 34, 'IMG_20210410_164641.jpg', 1),
(182, 35, 'DTES1138b.jpg', 1),
(183, 35, 'DTES1138c.jpg', 1),
(184, 35, 'DTES1138d.jpg', 1),
(185, 35, 'DTES1170.jpg', 1),
(187, 36, 'IMG_20210410_1640341.jpg', 1),
(188, 36, 'IMG_20210410_164046_(1)1.jpg', 1),
(189, 36, 'IMG_20210410_1641061.jpg', 1),
(190, 37, 'DTES1138d1.jpg', 1),
(191, 37, 'DTES11701.jpg', 1),
(192, 38, 'IMG_20210410_165706.jpg', 1),
(193, 38, 'IMG_20210410_165805.jpg', 1),
(194, 38, 'IMG_20210410_165816.jpg', 1),
(195, 38, 'IMG_20210410_165826.jpg', 1),
(197, 39, 'DTES1852.jpg', 1),
(198, 39, 'DTES1854.jpg', 1),
(199, 39, 'DTES11085.jpg', 1),
(200, 40, 'IMG_20210410_171150.jpg', 1),
(201, 40, 'IMG_20210410_171200.jpg', 1),
(202, 40, 'IMG_20210410_171217.jpg', 1),
(203, 40, 'IMG_20210410_171245.jpg', 1),
(204, 41, 'DTES1048.jpg', 1),
(205, 41, 'DTES1848.jpg', 1),
(206, 41, 'DTES1851.jpg', 1),
(208, 42, 'IMG_20210410_170834.jpg', 1),
(209, 42, 'IMG_20210410_170843.jpg', 1),
(210, 42, 'IMG_20210410_170855.jpg', 1),
(212, 43, 'a.jpg', 1),
(213, 43, 'b.jpeg', 1),
(214, 15, 'IMG_6563_(1).jpg', 1),
(215, 15, 'IMG_6564-removebg-preview.jpg', 1),
(216, 44, '22.jpg', 1),
(217, 45, '11.jpg', 1),
(219, 46, '61.jpg', 1),
(220, 46, '8.jpg', 1),
(221, 46, '10.jpg', 1),
(222, 46, '12.jpg', 1),
(223, 47, '19.jpg', 1),
(224, 47, '20.jpg', 1),
(225, 47, '211.jpg', 1),
(226, 48, 'IMG_20210410_172635.jpg', 1),
(227, 48, 'IMG_20210410_172641.jpg', 1),
(228, 48, 'IMG_20210410_172645.jpg', 1),
(229, 49, 'IMG_20210410_163730.jpg', 1),
(230, 49, 'IMG_20210410_163750.jpg', 1),
(231, 49, 'IMG_20210410_163800.jpg', 1),
(232, 15, 'IMG_6561-removebg-preview_(2).jpg', 1),
(237, 8, 'IMG_20210410_170002.jpg', 1),
(238, 8, 'IMG_20210410_170025_(1).jpg', 1),
(239, 8, 'slazzer-edit-image_(8).png', 1),
(240, 6, 'IMG_20210410_172006.jpg', 1),
(241, 6, 'IMG_20210410_172040.jpg', 1),
(242, 6, 'IMG_20210410_172058.jpg', 1),
(243, 6, 'IMG_20210410_172130.jpg', 1),
(244, 50, 'IMG_20210410_165020.jpg', 1),
(245, 50, 'IMG_20210410_165033.jpg', 1),
(246, 50, 'IMG_20210410_165044.jpg', 1),
(247, 51, 'IMG_6551-removebg-preview.png', 1),
(248, 51, 'IMG_6553.jpg', 1),
(249, 52, '1_2_KG.jpg', 1),
(250, 52, 'IMG_6568_(1).jpg', 1),
(251, 52, 'IMG_65691.jpg', 1),
(252, 53, 'IMG_20210410_160955.jpg', 1),
(253, 53, 'IMG_20210410_161040.jpg', 1),
(254, 53, 'slazzer-edit-image_(2).png', 1),
(255, 53, 'slazzer-edit-image_(5).png', 1),
(259, 54, 'IMG_6662-removebg-preview.jpg', 1),
(260, 54, 'IMG_6663-removebg-preview.jpg', 1),
(261, 54, 'IMG_6664-removebg-preview.jpg', 1),
(262, 55, 'IMG_E6328-removebg-preview.png', 1),
(263, 55, 'IMG_E6329-removebg-preview.png', 1),
(264, 55, 'IMG_E6328-removebg-preview1.png', 1),
(265, 55, 'IMG_E6329-removebg-preview1.png', 1),
(266, 56, 'IMG_6624-removebg-preview.png', 1),
(267, 56, 'IMG_6625.jpg', 1),
(268, 56, 'IMG_6626_(1).jpg', 1),
(269, 57, 'IMG_6657-removebg-preview.png', 1),
(270, 57, 'IMG_6658-removebg-preview.png', 1),
(271, 58, 'IMG_6465a.jpg', 1),
(272, 58, 'IMG_6466.jpg', 1),
(273, 59, 'IMG_6433-removebg-preview.png', 1),
(274, 59, 'IMG_6435.jpg', 1),
(275, 60, 'IMG_6612.jpg', 1),
(276, 39, 'DTES16871.jpg', 1),
(277, 61, 'IMG_6636-removebg-preview.png', 1),
(278, 61, 'IMG_6638.jpg', 1),
(279, 61, 'IMG_6639-removebg-preview.png', 1),
(280, 62, 'b_19_KG.png', 1),
(281, 62, 'IMG_6671-removebg-preview.png', 1),
(282, 62, 'IMG_6672-removebg-preview.png', 1),
(283, 62, 'b_19_KG1.png', 1),
(284, 62, 'IMG_6671-removebg-preview1.png', 1),
(285, 62, 'IMG_6672-removebg-preview1.png', 1),
(286, 63, 'a.png', 1),
(287, 63, 'b.jpg', 1),
(288, 63, 'c.jpg', 1),
(289, 64, '16_X_16_Rs_384.jpg', 1),
(290, 64, 'a1.png', 1),
(291, 64, 'b1.jpeg', 1),
(292, 65, 'IMG_20210321_181020.jpg', 1),
(293, 65, 'IMG_20210321_181029.jpg', 1),
(294, 65, 'IMG_20210321_181041.jpg', 1),
(295, 65, 'IMG_20210321_181101.jpg', 1),
(296, 65, 'IMG_20210321_181109.jpg', 1),
(297, 66, '6_X_6_Rs_120.jpg', 1),
(298, 66, 'IMG_20210321_172412.jpg', 1),
(303, 67, '6_X_6_Rs_1203.jpg', 1),
(304, 67, 'IMG_20210321_1724123.jpg', 1),
(305, 68, 'IMG_20210321_180900.jpg', 1),
(306, 68, 'IMG_20210321_180916.jpg', 1),
(307, 68, 'IMG_20210321_180955.jpg', 1),
(308, 69, 'BACK_-_Copy-removebg-preview.png', 1),
(309, 69, 'IMG_20210321_180508.jpg', 1),
(310, 69, 'IMG_20210321_180521.jpg', 1),
(315, 70, 'IMG_20210321_814191.jpg', 1),
(316, 70, 'IMG_20210321_1814111.jpg', 1),
(317, 70, 'IMG_20210321_1814181.jpg', 1),
(318, 70, 'IMG_20210321_1814261.jpg', 1),
(319, 71, 'IMG_20210321_180715.jpg', 1),
(320, 71, 'IMG_20210321_180734.jpg', 1),
(321, 71, 'IMG_20210321_180811_(1).jpg', 1),
(322, 72, 'IMG_20210321_174231.jpg', 1),
(323, 72, 'IMG_20210321_174235.jpg', 1),
(324, 72, 'IMG_20210321_174316.jpg', 1),
(325, 74, '15.jpg', 1),
(326, 74, '43.jpg', 1),
(327, 74, '91.jpg', 1),
(328, 75, '16.jpg', 1),
(329, 75, '32.jpg', 1),
(330, 75, '44.jpg', 1),
(331, 76, '62.jpg', 1),
(333, 77, 'in5.jpg', 1),
(334, 77, 'in61.jpg', 1),
(335, 78, '33.jpg', 1),
(336, 79, '34.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `po_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `attributes` varchar(255) NOT NULL,
  `po_qty` int(11) NOT NULL,
  `po_price` float NOT NULL,
  `discounttotal` float NOT NULL,
  `disct_price` float NOT NULL,
  `po_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`po_id`, `order_id`, `productid`, `product_name`, `variant_id`, `attributes`, `po_qty`, `po_price`, `discounttotal`, `disct_price`, `po_total_price`) VALUES
(1, 1, 75, 'catid', 0, ',', 1, 15000, 0, 12000, 12000),
(2, 2, 75, 'catid', 0, ',', 1, 15000, 0, 12000, 12000),
(3, 2, 63, 'Conch Decorative', 1, 'King,Red', 1, 500, 0, 400, 400),
(4, 3, 63, 'Conch Decorative', 1, 'King,Red', 1, 500, 0, 400, 400),
(5, 3, 75, 'catid', 0, ',', 1, 15000, 0, 12000, 12000),
(6, 4, 63, 'Conch Decorative', 1, 'King,Red', 1, 500, 0, 400, 400),
(7, 5, 78, 'product', 7, 'sdsd,sdfghj', 1, 1500, 0, 1000, 1000),
(8, 5, 79, 'new pro', 10, 'small,pink', 2, 500, 0, 250, 500),
(9, 5, 76, 'pro', 0, ',', 1, 234, 0, 124, 124),
(10, 5, 3, 'Handmade Ceramic Bowl For Large Serving', 0, ',', 1, 450, 0, 350, 350),
(11, 5, 61, 'Natraja Antique Look', 0, ',', 1, 1580, 0, 1100, 1100),
(12, 5, 30, 'Natraj form of Shiva', 0, ',', 1, 1800, 0, 1440, 1440),
(13, 6, 78, 'product', 7, 'sdsd,sdfghj', 1, 1500, 0, 1000, 1000),
(14, 6, 3, 'Handmade Ceramic Bowl For Large Serving', 0, ',', 1, 450, 0, 350, 350),
(15, 6, 61, 'Natraja Antique Look', 0, ',', 1, 1580, 0, 1100, 1100),
(16, 6, 30, 'Natraj form of Shiva', 0, ',', 1, 1800, 0, 1440, 1440),
(17, 7, 77, 'cofffee mug', 6, 'small,red', 1, 210, 0, 140, 140),
(18, 8, 77, 'cofffee mug', 6, 'small,red', 1, 210, 0, 140, 140),
(19, 9, 77, 'cofffee mug', 6, 'small,red', 1, 210, 0, 140, 140),
(20, 10, 77, 'cofffee mug', 6, 'small,red', 1, 210, 0, 140, 140),
(21, 11, 77, 'cofffee mug', 6, 'small,red', 1, 210, 0, 140, 140),
(22, 12, 20, 'A pair of women holding lamp', 0, ',', 1, 1200, 0, 960, 960),
(23, 12, 63, 'Conch Decorative', 1, 'King,Red', 1, 500, 0, 400, 400),
(24, 12, 62, 'Ram Darbaar', 0, ',', 1, 4450, 0, 3350, 3350),
(25, 12, 30, 'Natraj form of Shiva', 0, ',', 1, 1800, 0, 1440, 1440),
(26, 12, 61, 'Natraja Antique Look', 0, ',', 1, 1580, 0, 1100, 1100),
(27, 12, 19, 'Dwar Sundari ', 0, ',', 1, 3400, 0, 2720, 2720);

-- --------------------------------------------------------

--
-- Table structure for table `product_slider_image`
--

CREATE TABLE `product_slider_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_name` text NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_slider_image`
--

INSERT INTO `product_slider_image` (`id`, `product_id`, `product_image_name`, `create_date_time`, `update_date_time`) VALUES
(1, 1, 'portfolio-31.jpg', '2021-02-12 20:57:16', '2021-10-18 08:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_invoice` varchar(255) NOT NULL,
  `v_contact_no` bigint(20) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_address` text NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `purchased_date` bigint(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_invoice`, `v_contact_no`, `v_name`, `v_address`, `purchase_total`, `purchased_date`, `created`) VALUES
(1, '67LKZ5Q4X4', 7078058343, 'jitendra mehra', 'ranikhet\r\nalmora', 4090, 1633404600, '2021-10-05 00:00:00'),
(2, '36LKD5Q8X4', 7078058343, 'jitendra mehra', 'ranikhet\r\nalmora', 640, 1633491000, '2021-10-04 00:00:00'),
(3, '36LKZ5Q8W7', 7078058343, 'P.P.Dewan', 'ranikhet\r\nalmora', 1350, 1633491000, '2021-10-05 00:00:00'),
(4, '9HZSXBL1FQ', 1234567890, 'vikram mehra', '10 Basai road\r\ngurgaon', 420, 1633145400, '2021-10-02 00:00:00'),
(5, 'Z4RBOVLC27', 7078058343, 'jitendra mehra', '10 Basai road\r\ngurgaon', 600, 1634527800, '2021-10-02 00:00:00'),
(6, 'J9FSENPRXO', 8077605854, 'asdf', 'ranikhet\r\nalmora', 15900, 1635741000, '2021-10-11 00:00:00'),
(7, 'DYT4F9XL2C', 8077605854, 'asdf', 'ranikhet\r\nalmora', 19600, 1635219000, '2021-10-11 00:00:00'),
(8, 'N6078M5GSD', 7078058343, 'jitendra mehra', '10 Basai road\r\ngurgaon', 24, 1634614200, '2021-10-11 00:00:00'),
(9, 'B8PRFW5HNJ', 7078058343, 'jitendra mehra', '10 Basai road\r\ngurgaon', 24, 1634614200, '2021-10-11 00:00:00'),
(10, 'G8RLPJCO1Y', 8077605854, 'jeet', '10 Basai road\r\ngurgaon', 3530, 1634614200, '2021-10-12 00:00:00'),
(11, 'IC9FJTXU3D', 7078058343, 'jitendra mehra', 'ranikhet\r\nalmora', 1980, 1635651000, '2021-10-12 00:00:00'),
(12, 'PB24DZXCIW', 7078058343, 'asdf', 'ranikhet\r\nalmora', 210, 1635132600, '2021-10-12 00:00:00'),
(13, '5VFAKP23IO', 8077605854, 'P.P.Dewan', '10 Basai road\r\ngurgaon', 30, 1635741000, '2021-10-13 00:00:00'),
(14, '8YO5KTDHQ0', 8077605854, 'P.P.Dewan', '10 Basai road\r\ngurgaon', 700, 1633923000, '2021-10-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchased_variantid` int(11) NOT NULL,
  `purchased_price` int(11) NOT NULL,
  `purchased_qty` int(11) NOT NULL,
  `total_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchased_products`
--

INSERT INTO `purchased_products` (`id`, `purchase_id`, `product_id`, `purchased_variantid`, `purchased_price`, `purchased_qty`, `total_product_price`) VALUES
(1, 1, 20, 0, 1200, 1, 1200),
(2, 1, 1, 0, 320, 2, 640),
(3, 1, 4, 0, 750, 3, 2250),
(4, 2, 1, 0, 320, 2, 640),
(5, 3, 3, 0, 450, 3, 1350),
(6, 4, 77, 0, 140, 3, 420),
(7, 5, 77, 0, 150, 4, 600),
(8, 6, 78, 0, 990, 10, 9900),
(9, 6, 75, 0, 1200, 5, 6000),
(10, 7, 77, 0, 140, 5, 700),
(11, 7, 78, 0, 900, 21, 18900),
(12, 8, 77, 0, 12, 2, 24),
(13, 9, 77, 0, 12, 2, 24),
(14, 10, 75, 0, 140, 4, 560),
(15, 10, 77, 6, 990, 3, 2970),
(16, 11, 77, 6, 990, 2, 1980),
(17, 12, 75, 0, 150, 1, 150),
(18, 12, 77, 6, 30, 2, 60),
(19, 13, 38, 11, 30, 1, 30),
(20, 14, 38, 11, 140, 5, 700);

-- --------------------------------------------------------

--
-- Table structure for table `qty_logs`
--

CREATE TABLE `qty_logs` (
  `qty_logid` int(11) NOT NULL,
  `transection_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `type` varchar(125) NOT NULL COMMENT 'purchased,waste,order_complete',
  `quantity` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qty_logs`
--

INSERT INTO `qty_logs` (`qty_logid`, `transection_id`, `product_id`, `variant_id`, `type`, `quantity`, `created`) VALUES
(1, 9, 77, 0, 'purchased', 2, 1634614200),
(2, 4, 77, 0, 'waste', 1, 1635132600),
(3, 5, 75, 0, 'waste', 3, 1635741000),
(4, 6, 75, 0, 'waste', 3, 1634614200),
(5, 6, 77, 0, 'waste', 4, 1634614200),
(6, 6, 78, 0, 'waste', 7, 1634614200),
(7, 10, 75, 0, 'purchased', 4, 1634614200),
(8, 10, 77, 6, 'purchased', 3, 1634614200),
(9, 11, 77, 6, 'purchased', 2, 1635651000),
(10, 7, 77, 0, 'waste', 1, 1635046200),
(11, 9, 77, 6, 'waste', 1, 1635651000),
(12, 12, 75, 0, 'purchased', 1, 1635132600),
(13, 12, 77, 6, 'purchased', 2, 1635132600),
(14, 13, 38, 11, 'purchased', 1, 1635741000),
(15, 14, 38, 11, 'purchased', 5, 1633923000),
(16, 10, 38, 11, 'waste', 1, 1635132600),
(17, 7, 77, 6, 'order_complete', 1, 1634285713),
(18, 8, 77, 6, 'order_complete', 1, 1634285713),
(19, 9, 77, 6, 'order_complete', 1, 1634285713),
(20, 10, 77, 6, 'order_complete', 1, 1634285713),
(21, 11, 77, 6, 'order_complete', 1, 1634285713),
(22, 12, 20, 0, 'order_complete', 1, 1634310642),
(23, 12, 63, 1, 'order_complete', 1, 1634310643),
(24, 12, 62, 0, 'order_complete', 1, 1634310643),
(25, 12, 30, 0, 'order_complete', 1, 1634310643),
(26, 12, 61, 0, 'order_complete', 1, 1634310644),
(27, 12, 19, 0, 'order_complete', 1, 1634310644);

-- --------------------------------------------------------

--
-- Table structure for table `qty_stock`
--

CREATE TABLE `qty_stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qty_stock`
--

INSERT INTO `qty_stock` (`stock_id`, `product_id`, `variant_id`, `stock_qty`) VALUES
(1, 77, 0, 0),
(2, 77, 6, 2),
(3, 78, 0, 0),
(4, 78, 7, 1),
(5, 38, 0, 0),
(6, 38, 9, 2),
(7, 79, 0, 0),
(8, 79, 10, 1),
(9, 38, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `site_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`site_id`, `name`, `value`) VALUES
(309, 'site_name', 'aauthenticity'),
(310, 'delivery_charge', '100'),
(311, 'minimum_price', '2500'),
(312, 'referral_income_amount', '0'),
(313, 'signup_bonus', '0'),
(314, 'order_name', 'aauthenticity'),
(315, 'gst_no', '89728973'),
(316, 'smtp_protocol', ''),
(317, 'smtp_host', ''),
(318, 'smtp_port', ''),
(319, 'smtp_crypto', ''),
(320, 'smtp_user', ''),
(321, 'smtp_password', ''),
(322, 'smtp_sender_email', ''),
(323, 'sms_username', ''),
(324, 'sms_password', ''),
(325, 'sms_sender_name', ''),
(326, 'api_key', ''),
(327, 'usd_price', '72'),
(328, 'product_title', 'Offer Of The Month');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `maincat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`, `maincat_id`, `cat_id`, `sub_cat_id`) VALUES
(1, '9-bn1.jpg', 1, 1, 1),
(2, '334-bn2.jpg', 2, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE `society` (
  `society_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `society_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `zipcode` int(11) NOT NULL,
  `delivery_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `maincategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) NOT NULL,
  `subcategory_name_ar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subcategory_image` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subcatstatus` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1 and  Deactive = 0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `maincategory_id`, `category_id`, `subcategory_name_en`, `subcategory_name_ar`, `subcategory_image`, `create_date`, `updated`, `subcatstatus`) VALUES
(1, 1, 1, 'Baking', '', '', '2021-04-03 05:21:20', '2021-10-18 08:54:20', 1),
(4, 5, 2, 'Milk Mugs', '', '', '2021-04-03 05:30:57', '2021-10-18 08:54:20', 1),
(5, 1, 3, 'Bowls', '', '', '2021-04-03 05:40:30', '2021-10-18 08:54:20', 1),
(6, 2, 4, 'Dinner Plates', '', '', '2021-04-03 05:42:09', '2021-10-18 08:54:20', 1),
(7, 2, 4, 'Bowls', '', '', '2021-04-03 05:44:19', '2021-10-18 08:54:20', 1),
(8, 1, 4, 'Platters', '', '', '2021-04-03 05:44:45', '2021-10-18 08:54:20', 1),
(9, 1, 4, 'Pasta Plates', '', '', '2021-04-03 05:45:09', '2021-10-18 08:54:20', 1),
(10, 1, 4, 'Chip & Dip ', '', '', '2021-04-03 05:45:40', '2021-10-18 08:54:20', 1),
(11, 1, 5, 'Organiser', '', '', '2021-04-03 05:48:29', '2021-10-18 08:54:20', 1),
(12, 1, 5, 'CUT & CHOP', '', '', '2021-04-03 05:49:11', '2021-10-18 08:54:20', 1),
(13, 5, 2, 'Coffee Mugs', '', '', '2021-04-03 05:51:33', '2021-10-18 08:54:20', 1),
(15, 5, 2, 'Tea Mugs', '', '', '2021-04-03 05:54:29', '2021-10-18 08:54:20', 1),
(16, 2, 7, 'Wooden Table Coaster', '', '', '2021-04-03 05:56:43', '2021-10-18 08:54:20', 1),
(17, 2, 7, 'Ceramic Table Coaster', '', '', '2021-04-03 05:58:02', '2021-10-18 08:54:20', 1),
(19, 2, 8, 'Bottle Wraps ', '', '', '2021-04-03 06:00:19', '2021-10-18 08:54:20', 1),
(20, 2, 8, 'Napkin Wraps', '', '', '2021-04-03 06:00:49', '2021-10-18 08:54:20', 1),
(21, 2, 9, 'Wooden Lamp Base', '', '', '2021-04-03 06:02:21', '2021-10-18 08:54:20', 1),
(22, 2, 9, 'Ceramic Lamp Base', '', '', '2021-04-03 06:02:48', '2021-10-18 08:54:20', 1),
(23, 2, 9, 'Metal Lamp Base ', '', '', '2021-04-03 06:03:31', '2021-10-18 08:54:20', 1),
(24, 6, 10, 'Black set with gold-line', '', '', '2021-04-03 06:13:59', '2021-10-18 08:54:20', 1),
(25, 6, 10, 'Muted Green Dinner Set', '', '', '2021-04-03 06:15:39', '2021-10-18 08:54:20', 1),
(26, 4, 11, 'Statues', '', '', '2021-04-07 03:06:58', '2021-10-18 08:54:20', 1),
(27, 4, 12, 'Divine Statues & Prayer Items', '', '', '2021-04-10 01:34:12', '2021-10-18 08:54:20', 1),
(28, 4, 11, 'Brass show pieces ', '', '', '2021-04-11 07:38:22', '2021-10-18 08:54:20', 1),
(29, 4, 12, 'Decor & Gift Items ', '', '', '2021-04-11 08:07:51', '2021-10-18 08:54:20', 1),
(30, 2, 4, 'Cake Stand', '', '540-DTES1686.jpg', '2021-04-14 11:32:25', '2021-10-18 08:54:20', 1),
(31, 2, 13, 'Trays', '', '', '2021-04-18 08:43:19', '2021-10-18 08:54:20', 1),
(32, 2, 13, 'BOWLS', '', '', '2021-09-02 09:45:48', '2021-10-18 08:54:20', 1),
(33, 2, 7, 'Marble coasters ', '', '', '2021-09-02 09:53:39', '2021-10-18 08:54:20', 1),
(34, 1, 1, 'Tajind', '', '328-Tajind_2_.jpg', '2021-09-02 10:22:44', '2021-10-18 08:54:20', 1),
(35, 1, 1, 'asdf', '', '368-avatar-img.jpg', '2021-09-30 22:45:12', '2021-10-18 08:54:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subunit_types`
--

CREATE TABLE `subunit_types` (
  `subunit_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `subunit_option_en` varchar(50) NOT NULL,
  `subunit_option_ar` varchar(100) NOT NULL,
  `subunit_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 =active and 0=deactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id` int(11) NOT NULL,
  `site` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tr_id` varchar(50) NOT NULL,
  `tr_type` enum('debit','credit') NOT NULL,
  `tr_resource` varchar(100) NOT NULL,
  `tr_amount` decimal(20,0) NOT NULL,
  `status` enum('success','failed') NOT NULL,
  `created_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_types`
--

CREATE TABLE `unit_types` (
  `id` int(11) NOT NULL,
  `unit_option_en` varchar(200) NOT NULL,
  `unit_option_ar` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_types`
--

INSERT INTO `unit_types` (`id`, `unit_option_en`, `unit_option_ar`) VALUES
(1, 'Kg', 'कि0 ग्रा0'),
(2, 'Litre', 'लीटर'),
(3, 'Gm', 'ग्राम'),
(4, 'Dozen', 'दर्ज़न'),
(5, 'Piece', 'पीस'),
(6, 'Packet', 'पैकेट'),
(7, 'Bottle', 'बोतल'),
(8, 'Bag', ' बैग'),
(9, 'Bottles', ' बोतलें'),
(10, 'Box', ' डिब्बा'),
(11, 'Cup', ' कप'),
(12, 'Jar', 'जार'),
(13, 'Pack', ' पैक'),
(14, 'Packs', 'पैक्स'),
(15, 'Packet', ' पैकेट'),
(16, 'Packets', ' पैकेट'),
(17, 'Pouch', ' थैली'),
(18, 'Pouchs', ' थैली'),
(19, ' Tube', 'ट्यूब'),
(20, 'ML', 'मिली लीटर');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilePic` text NOT NULL,
  `device_token` text CHARACTER SET utf8 NOT NULL,
  `device_id` text CHARACTER SET utf8 NOT NULL,
  `device_type` int(11) NOT NULL COMMENT 'android = 0 and ios = 1  ',
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Active and 0 = Deactive',
  `social_id` text NOT NULL,
  `otp` varchar(100) NOT NULL,
  `is_otp_verify` int(11) DEFAULT '0',
  `referral_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `user_phone`, `username`, `password`, `profilePic`, `device_token`, `device_id`, `device_type`, `user_create_date`, `user_status`, `social_id`, `otp`, `is_otp_verify`, `referral_code`) VALUES
(3, 'jaat@gmail.com', 8978776765, 'prakash', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(5, 'pk@gmail.com', 9560387054, 'pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(9, 'jbkjbk@gmail.com', 9878765654, 'klnl', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(11, 'jeetmehra2323@gmail.com', 7078058343, 'jitendra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(12, 'jeetmehra2323@gmail.com', 1234567890, 'jitendra mehra', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(14, 'jeetmehra3@gmail.com', 1234567899, 'jitendra mehra', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, ''),
(15, 'mehra@gmail.com', 9811450533, 'jeeto', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 0, '2021-10-18 08:54:20', 1, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` text NOT NULL,
  `review_status` int(11) NOT NULL COMMENT '0=>inactive,1=>active',
  `submitted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `list_price` int(11) NOT NULL,
  `variant_price` int(11) NOT NULL,
  `usd_list_price` int(11) NOT NULL,
  `usd_variant_price` int(11) NOT NULL,
  `variant_qty` int(11) NOT NULL,
  `variant_weight` varchar(100) NOT NULL,
  `variant_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active and 0=deactive',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variant_id`, `product_id`, `size`, `color`, `list_price`, `variant_price`, `usd_list_price`, `usd_variant_price`, `variant_qty`, `variant_weight`, `variant_status`, `created_date`) VALUES
(1, 63, 'King', 'Red', 500, 400, 7, 6, 10, '1', 1, '2021-09-30 05:50:40'),
(2, 63, 'Small', 'Blue', 550, 250, 8, 4, 600, '2', 1, '2021-09-30 05:53:58'),
(3, 63, 'King', 'Blue', 700, 350, 10, 5, 5, '3', 1, '2021-09-20 13:46:08'),
(4, 63, 'Small', 'Pink', 450, 300, 6, 4, 3, '1', 1, '2021-09-20 13:58:30'),
(5, 63, 'Medium', 'Green', 1200, 1000, 17, 14, 10, '5', 1, '2021-09-30 17:10:03'),
(6, 77, 'small', 'red', 210, 140, 3, 2, 0, '1', 1, '2021-10-02 16:04:25'),
(7, 78, 'sdsd', 'sdfghj', 1500, 1000, 21, 14, 0, '1', 1, '2021-10-11 10:36:44'),
(9, 38, 'small', 'dark golden', 1600, 1300, 23, 19, 0, '1', 1, '2021-10-12 09:59:00'),
(10, 79, 'small', 'pink', 500, 250, 7, 4, 0, '1', 1, '2021-10-13 08:56:18'),
(11, 38, 'king', 'golden', 1200, 1100, 17, 16, 0, '1', 1, '2021-10-13 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `waste`
--

CREATE TABLE `waste` (
  `waste_id` int(11) NOT NULL,
  `waste_invoice` varchar(255) NOT NULL,
  `v_contact_no` bigint(20) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_address` text NOT NULL,
  `waste_total` int(11) NOT NULL,
  `waste_date` bigint(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waste`
--

INSERT INTO `waste` (`waste_id`, `waste_invoice`, `v_contact_no`, `v_name`, `v_address`, `waste_total`, `waste_date`, `created`) VALUES
(1, 'SJ3O8X2TF4', 7078058343, 'P.P.Dewan', 'ranikhet\r\nalmora', 420, 1634700600, '2021-10-11 00:00:00'),
(2, '3P8H52VKJ0', 8077605854, 'jitendra mehra', '10 Basai road\r\ngurgaon', 4950, 1635132600, '2021-10-11 00:00:00'),
(3, 'IMFZ9QYEKV', 9811450533, 'P.P.Dewan', 'cn-63 kaushik nagar , burari,delhi\r\ngali.no-16', 12, 1635132600, '2021-10-11 00:00:00'),
(4, 'I8AJMC6RU1', 9811450533, 'P.P.Dewan', 'cn-63 kaushik nagar , burari,delhi\r\ngali.no-16', 12, 1635132600, '2021-10-11 00:00:00'),
(5, 'GN23U1FJ4Z', 7078058343, 'P.P.D', 'ranikhet\r\nalmora', 360, 1635741000, '2021-10-11 00:00:00'),
(6, 'VWUMJ15Y9E', 8077605854, 'asdf', 'ranikhet\r\nalmora', 1446, 1634614200, '2021-10-11 00:00:00'),
(7, '6T9GRQD8NM', 8077605854, 'P.P.Dewan', '10 Basai road\r\ngurgaon', 990, 1635046200, '2021-10-12 00:00:00'),
(8, '2X7OWD3HZ5', 8077605854, 'jitendra mehra', '10 Basai road\r\ngurgaon', 990, 1635651000, '2021-10-12 00:00:00'),
(9, '68UEVS7MCX', 8077605854, 'jitendra mehra', '10 Basai road\r\ngurgaon', 990, 1635651000, '2021-10-12 00:00:00'),
(10, 'O9L51IUTKJ', 7078058343, 'P.P.Dewan', 'ranikhet\r\nalmora', 30, 1635132600, '2021-10-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `waste_products`
--

CREATE TABLE `waste_products` (
  `id` int(11) NOT NULL,
  `waste_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variantid` int(11) NOT NULL,
  `waste_price` int(11) NOT NULL,
  `waste_qty` int(11) NOT NULL,
  `total_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waste_products`
--

INSERT INTO `waste_products` (`id`, `waste_id`, `product_id`, `variantid`, `waste_price`, `waste_qty`, `total_product_price`) VALUES
(1, 1, 77, 0, 140, 3, 420),
(2, 2, 78, 0, 990, 5, 4950),
(3, 3, 77, 0, 12, 1, 12),
(4, 4, 77, 0, 12, 1, 12),
(5, 5, 75, 0, 120, 3, 360),
(6, 6, 75, 0, 12, 3, 36),
(7, 6, 77, 0, 300, 4, 1200),
(8, 6, 78, 0, 30, 7, 210),
(9, 7, 77, 0, 990, 1, 990),
(10, 9, 77, 6, 990, 1, 990),
(11, 10, 38, 11, 30, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `apply_coupon`
--
ALTER TABLE `apply_coupon`
  ADD PRIMARY KEY (`apply_coupon_id`);

--
-- Indexes for table `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`attr_id`);

--
-- Indexes for table `attr_optn`
--
ALTER TABLE `attr_optn`
  ADD PRIMARY KEY (`optn_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copied_subcategory`
--
ALTER TABLE `copied_subcategory`
  ADD PRIMARY KEY (`copied_subcatid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `country_weight`
--
ALTER TABLE `country_weight`
  ADD PRIMARY KEY (`c_weight_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`deliveryboy_id`);

--
-- Indexes for table `delivery_date`
--
ALTER TABLE `delivery_date`
  ADD PRIMARY KEY (`delivery_date_id`);

--
-- Indexes for table `delivery_time`
--
ALTER TABLE `delivery_time`
  ADD PRIMARY KEY (`delivery_time_id`);

--
-- Indexes for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  ADD PRIMARY KEY (`dtime_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`instagram_id`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`maincategory_id`);

--
-- Indexes for table `my_wallet`
--
ALTER TABLE `my_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orderassigned`
--
ALTER TABLE `orderassigned`
  ADD PRIMARY KEY (`oaid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`pro_cat_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`pro_image_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `product_slider_image`
--
ALTER TABLE `product_slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD UNIQUE KEY `purchase_invoice` (`purchase_invoice`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qty_logs`
--
ALTER TABLE `qty_logs`
  ADD PRIMARY KEY (`qty_logid`);

--
-- Indexes for table `qty_stock`
--
ALTER TABLE `qty_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`society_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `subunit_types`
--
ALTER TABLE `subunit_types`
  ADD PRIMARY KEY (`subunit_id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_types`
--
ALTER TABLE `unit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`size`,`color`) USING BTREE;

--
-- Indexes for table `waste`
--
ALTER TABLE `waste`
  ADD PRIMARY KEY (`waste_id`),
  ADD UNIQUE KEY `waste_invoice` (`waste_invoice`);

--
-- Indexes for table `waste_products`
--
ALTER TABLE `waste_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_coupon`
--
ALTER TABLE `apply_coupon`
  MODIFY `apply_coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attr`
--
ALTER TABLE `attr`
  MODIFY `attr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attr_optn`
--
ALTER TABLE `attr_optn`
  MODIFY `optn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `copied_subcategory`
--
ALTER TABLE `copied_subcategory`
  MODIFY `copied_subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country_weight`
--
ALTER TABLE `country_weight`
  MODIFY `c_weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `deliveryboy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_date`
--
ALTER TABLE `delivery_date`
  MODIFY `delivery_date_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_time`
--
ALTER TABLE `delivery_time`
  MODIFY `delivery_time_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  MODIFY `dtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instagram`
--
ALTER TABLE `instagram`
  MODIFY `instagram_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `maincategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_wallet`
--
ALTER TABLE `my_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderassigned`
--
ALTER TABLE `orderassigned`
  MODIFY `oaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `pro_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_slider_image`
--
ALTER TABLE `product_slider_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `qty_logs`
--
ALTER TABLE `qty_logs`
  MODIFY `qty_logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `qty_stock`
--
ALTER TABLE `qty_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `society`
--
ALTER TABLE `society`
  MODIFY `society_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subunit_types`
--
ALTER TABLE `subunit_types`
  MODIFY `subunit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_types`
--
ALTER TABLE `unit_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `waste`
--
ALTER TABLE `waste`
  MODIFY `waste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `waste_products`
--
ALTER TABLE `waste_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
