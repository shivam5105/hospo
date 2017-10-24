-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 11:29 PM
-- Server version: 5.6.32-78.1-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thelabel_hospodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE IF NOT EXISTS `availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mon` varchar(255) NOT NULL,
  `tue` varchar(255) NOT NULL,
  `wed` varchar(255) NOT NULL,
  `thu` varchar(255) NOT NULL,
  `fri` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `sun` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `user_id`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `created_at`, `updated_at`) VALUES
(3, 16, '', '', '', '', '', '', '', '2017-09-20 12:37:47', '2017-09-20 12:37:47'),
(19, 37, 'morning', 'morning', 'morning', 'morning', 'morning', 'morning', 'morning', '2017-10-18 01:03:29', '2017-10-18 05:38:39'),
(20, 38, 'morning', 'morning', 'morning', 'morning', 'morning', 'morning', 'morning', '2017-10-18 05:37:30', '2017-10-18 05:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bar & Beverage Service', 0, '', '', 1, '2017-09-13 05:12:25', '0000-00-00 00:00:00'),
(2, 'Hotel Guest Services', 0, '', '', 1, '2017-09-13 05:12:59', '0000-00-00 00:00:00'),
(3, 'Waiter', 0, '', '', 1, '2017-09-13 05:13:09', '0000-00-00 00:00:00'),
(4, 'Barista', 0, '', '', 1, '2017-09-13 05:13:22', '0000-00-00 00:00:00'),
(5, 'Chef', 0, '', '', 1, '2017-09-13 05:13:33', '0000-00-00 00:00:00'),
(6, 'Kitchen Hand', 0, '', '', 1, '2017-09-13 05:13:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'rakesh bisht', 'raks.bisht@gmail.com', 'this is just a ', '2017-09-17 22:29:49', '2017-09-17 22:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_categories`
--

CREATE TABLE IF NOT EXISTS `employee_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `employee_categories`
--

INSERT INTO `employee_categories` (`id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 1, 14, '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(11, 1, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(12, 2, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(13, 3, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(14, 1, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(15, 2, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(16, 3, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(17, 4, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(22, 1, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(23, 2, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(24, 3, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(25, 4, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(26, 1, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(27, 2, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(28, 3, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(29, 4, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(57, 3, 37, '2017-10-17 23:03:29', '0000-00-00 00:00:00'),
(58, 4, 37, '2017-10-17 23:03:29', '0000-00-00 00:00:00'),
(59, 1, 38, '2017-10-18 03:37:30', '0000-00-00 00:00:00'),
(60, 1, 40, '2017-10-18 07:43:51', '0000-00-00 00:00:00'),
(61, 2, 40, '2017-10-18 07:43:51', '0000-00-00 00:00:00'),
(62, 1, 41, '2017-10-18 07:51:09', '0000-00-00 00:00:00'),
(63, 5, 52, '2017-10-18 22:25:55', '0000-00-00 00:00:00'),
(64, 3, 53, '2017-10-23 21:12:53', '0000-00-00 00:00:00'),
(65, 4, 53, '2017-10-23 21:12:53', '0000-00-00 00:00:00'),
(66, 5, 53, '2017-10-23 21:12:53', '0000-00-00 00:00:00'),
(67, 6, 53, '2017-10-23 21:12:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_license_transport`
--

CREATE TABLE IF NOT EXISTS `employee_license_transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licence_transport_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `employee_license_transport`
--

INSERT INTO `employee_license_transport` (`id`, `licence_transport_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(2, 2, 13, '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(3, 2, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(4, 2, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(5, 2, 17, '2017-09-20 22:17:29', '0000-00-00 00:00:00'),
(6, 2, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(7, 2, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(8, 2, 20, '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(9, 2, 21, '2017-10-03 16:47:03', '0000-00-00 00:00:00'),
(10, 1, 22, '2017-10-04 02:24:31', '0000-00-00 00:00:00'),
(15, 2, 27, '2017-10-08 22:31:51', '0000-00-00 00:00:00'),
(16, 2, 25, '2017-10-08 22:57:18', '0000-00-00 00:00:00'),
(17, 5, 24, '2017-10-08 23:15:08', '0000-00-00 00:00:00'),
(18, 5, 28, '2017-10-08 23:48:36', '0000-00-00 00:00:00'),
(19, 5, 29, '2017-10-09 21:08:38', '0000-00-00 00:00:00'),
(21, 5, 23, '2017-10-11 09:17:02', '0000-00-00 00:00:00'),
(22, 5, 32, '2017-10-11 22:37:41', '0000-00-00 00:00:00'),
(23, 2, 33, '2017-10-11 22:44:36', '0000-00-00 00:00:00'),
(24, 5, 34, '2017-10-11 23:23:48', '0000-00-00 00:00:00'),
(25, 5, 35, '2017-10-11 23:26:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `employer`, `location`, `job_title`, `job_description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(19, 37, 'Columbus', 'Auckland', 'Barista', 'kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF', '09/15', '09/17', '2017-10-17 23:03:29', '2017-10-18 05:38:39'),
(20, 38, 'Studio', 'Auckland', 'Barista', 'jkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhf', '09/17', '09/17', '2017-10-18 03:37:30', '2017-10-18 05:40:42'),
(21, 40, 'HCL', 'noida', 'Software Engineer', 'I think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\n', '09/11', '09/15', '2017-10-18 07:43:51', '0000-00-00 00:00:00'),
(22, 41, 'Test', 'Auckland', 'Test', 'askfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;we', '09/17', '09/17', '2017-10-18 07:51:09', '2017-10-18 09:51:30'),
(23, 52, 'Mexico', 'Auckland', 'Chef', 'Welcome to a platform for hospo people, created by hospo people. Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people. Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.', '09/17', '09/17', '2017-10-18 22:25:55', '2017-10-19 00:26:33'),
(24, 52, 'Mexico', 'Auckland', 'Chef', 'Welcome to a platform for hospo people, created by hospo people. Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.', '09/17', '09/17', '2017-10-18 22:25:55', '2017-10-19 00:26:33'),
(25, 53, 'Test', 'Auckland', 'Barista', 'jbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jka', '09/17', '09/17', '2017-10-23 21:12:53', '2017-10-23 23:13:21'),
(26, 53, 'Test Two', 'Auckland', 'Barista', 'jbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jka', '09/17', '09/17', '2017-10-23 21:12:53', '2017-10-23 23:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `name`, `designation`, `message`, `company`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Jane Smtih', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco''s catina', NULL, '2017-09-12 19:00:22', '0000-00-00 00:00:00'),
(2, 'James', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco''s catina', NULL, '2017-09-12 19:00:29', '0000-00-00 00:00:00'),
(3, 'Alex', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco''s catina', NULL, '2017-09-12 19:00:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE IF NOT EXISTS `home_page` (
  `title` varchar(255) NOT NULL,
  `background_image_id` bigint(20) NOT NULL,
  `updatedon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`title`, `background_image_id`, `updatedon`) VALUES
('Say hello to Hospo.', 7, 1508365094);

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE IF NOT EXISTS `job_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(10, 'Northland (All)', 0, '2017-10-18 01:16:00', '2017-10-18 01:24:07'),
(11, 'Dargaville', 10, '2017-10-18 01:16:41', '2017-10-18 01:16:41'),
(12, 'Kaikohe', 10, '2017-10-18 01:17:00', '2017-10-18 01:17:00'),
(13, 'Kaitaia', 10, '2017-10-18 01:17:10', '2017-10-18 01:17:10'),
(15, 'Kawakawa', 10, '2017-10-18 01:22:31', '2017-10-18 01:22:31'),
(16, 'Kerikeri', 10, '2017-10-18 01:22:43', '2017-10-18 01:22:43'),
(17, 'Maungaturoto', 10, '2017-10-18 01:23:11', '2017-10-18 01:23:11'),
(18, 'Paihia', 10, '2017-10-18 01:23:31', '2017-10-18 01:23:31'),
(19, 'Whangarei', 10, '2017-10-18 01:23:43', '2017-10-18 01:23:43'),
(20, 'Auckland (All)', 0, '2017-10-18 01:24:50', '2017-10-18 01:24:50'),
(21, 'Auckland City', 20, '2017-10-18 01:25:05', '2017-10-18 01:25:05'),
(22, 'Franklin', 20, '2017-10-18 01:35:09', '2017-10-18 01:35:09'),
(23, 'Great Barrier Island', 20, '2017-10-18 01:36:05', '2017-10-18 01:36:05'),
(24, 'Helensville', 20, '2017-10-18 01:37:10', '2017-10-18 01:37:10'),
(25, 'Hibiscus Coast', 20, '2017-10-18 01:37:28', '2017-10-18 01:37:28'),
(26, 'Manukau City', 20, '2017-10-18 01:37:53', '2017-10-18 01:37:53'),
(27, 'North Shore', 20, '2017-10-18 01:38:07', '2017-10-18 01:38:07'),
(28, 'Papakura City', 20, '2017-10-18 01:38:26', '2017-10-18 01:38:26'),
(29, 'Waiheke Island', 20, '2017-10-18 01:50:31', '2017-10-18 01:50:31'),
(30, 'Waitakere City', 20, '2017-10-18 01:50:45', '2017-10-18 01:50:45'),
(31, 'Warkworth', 20, '2017-10-18 01:51:00', '2017-10-18 01:51:00'),
(32, 'Wellsford', 20, '2017-10-18 01:51:12', '2017-10-18 01:51:12'),
(33, 'Waikato (All)', 0, '2017-10-18 01:51:48', '2017-10-18 01:56:36'),
(34, 'Cambridge', 33, '2017-10-18 01:52:00', '2017-10-18 01:52:00'),
(35, 'Coromandel', 33, '2017-10-18 01:52:24', '2017-10-18 01:52:24'),
(36, 'Hamilton', 33, '2017-10-18 01:52:36', '2017-10-18 01:52:36'),
(37, 'Huntly', 33, '2017-10-18 01:52:49', '2017-10-18 01:52:49'),
(38, 'Matamata', 33, '2017-10-18 01:53:01', '2017-10-18 01:53:01'),
(39, 'Morrinsville', 33, '2017-10-18 01:53:12', '2017-10-18 01:53:12'),
(40, 'Otorohanga', 33, '2017-10-18 01:53:24', '2017-10-18 01:53:24'),
(41, 'Paeroa', 33, '2017-10-18 01:53:37', '2017-10-18 01:53:37'),
(42, 'Raglan', 33, '2017-10-18 01:53:47', '2017-10-18 01:53:47'),
(43, 'Taumarunui', 33, '2017-10-18 01:53:58', '2017-10-18 01:53:58'),
(44, 'Te Awamutu', 33, '2017-10-18 01:54:22', '2017-10-18 01:54:22'),
(45, 'Te Kuiti', 33, '2017-10-18 01:54:36', '2017-10-18 01:54:36'),
(46, 'Thames', 33, '2017-10-18 01:54:47', '2017-10-18 01:54:47'),
(47, 'Tokoroa/Putaruru', 33, '2017-10-18 01:55:01', '2017-10-18 01:55:01'),
(48, 'Waihi', 33, '2017-10-18 01:55:11', '2017-10-18 01:55:11'),
(49, 'Waihi Beach', 33, '2017-10-18 01:55:25', '2017-10-18 01:55:25'),
(50, 'Whangamata', 33, '2017-10-18 01:55:35', '2017-10-18 01:55:35'),
(51, 'Whitianga', 33, '2017-10-18 01:55:47', '2017-10-18 01:55:47'),
(52, 'Bay Of Plenty (All)', 0, '2017-10-18 01:56:54', '2017-10-23 10:38:23'),
(53, 'Katikati', 52, '2017-10-18 01:57:12', '2017-10-18 01:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `license_transport`
--

CREATE TABLE IF NOT EXISTS `license_transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `license_transport`
--

INSERT INTO `license_transport` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'NZ Driver''s License', '2017-09-20 12:38:13', '2017-10-09 00:33:51'),
(4, 'No NZ Driver''s License', '2017-10-09 00:32:57', '2017-10-09 00:34:30'),
(5, 'License & Own Vehicle', '2017-10-09 00:33:16', '2017-10-09 00:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `createdon` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `createdon`) VALUES
(1, 'crew.jpg', 1504876072),
(2, 'Photo15-06-17110420AM1.jpg', 1507495172),
(3, 'Photo15-06-17110420AM1.jpg', 1507506018),
(4, 'Photo15-06-17110420AM1.jpg', 1507506054),
(5, 'Photo15-06-17110420AM1.jpg', 1507506070),
(6, 'Photo15-06-17110420AM1.jpg', 1507506079),
(7, 'hospo-homepage.jpg', 1507506123);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `menu_location` varchar(255) NOT NULL,
  `menu_heading` varchar(255) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_classes` varchar(255) NOT NULL,
  `menu_target` int(1) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_page_id` bigint(20) NOT NULL,
  `menu_table_name` varchar(255) NOT NULL,
  `order_by` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_location`, `menu_heading`, `menu_type`, `menu_name`, `menu_classes`, `menu_target`, `menu_url`, `menu_page_id`, `menu_table_name`, `order_by`) VALUES
('footer-col1', 'Service', 'Custom Link', 'Training', '', 1, 'http://google.com', 0, '', 1),
('footer-col1', 'Service', 'Custom Link', 'Tool Box', '', 0, 'http://google.com', 0, '', 2),
('footer-col1', 'Service', 'Custom Link', 'Recruitment', '', 1, 'http://google.com', 0, '', 0),
('footer-col2', 'Company', 'Custom Link', 'Contact', '', 1, 'http://thelabelmakers.org/hospo/contact.html', 0, '', 1),
('footer-col2', 'Company', 'Custom Link', 'About Us', '', 1, 'http://google.com', 0, '', 0),
('footer-col3', 'Legal', 'Custom Link', 'Privacy Policy', '', 1, 'http://google.com', 0, '', 0),
('footer-col3', 'Legal', 'Custom Link', 'Terms & Conditions', '', 1, 'http://google.com', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('year','month','free') NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `price`, `duration`, `description`, `type`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'Manager', 250.00, NULL, 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', 'year', 2, '2017-10-08 19:21:10', '2017-10-12 23:36:30'),
(2, 'Employee', 'Employee', 0.00, NULL, 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', 'free', 3, '2017-10-08 19:21:57', '2017-10-12 19:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `template` varchar(255) NOT NULL,
  `createdon` bigint(20) NOT NULL,
  `updatedon` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `status`, `template`, `createdon`, `updatedon`) VALUES
(1, 'About Us', 'about-us', '<p>\r\n	<span id="docs-internal-guid-3641db08-4732-be5d-7cc4-8cae0a3c6b67"><span style="font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline; white-space: pre-wrap;">The idea for the Hospo platform was conceived out of my own experience working in New Zealandâ€™s bustling hospitality industry, and owning hospitality Businesses. This industry gives people the opportunities to learn new skills, work with like-minded people, have fun, and express creativity â€“ all while making an honest Living. Yet there are massive challenges facing this industry, too. Being a part of it all has provided the realisation of the huge amount of hard work it takes to make these businesses financially viable, alongside the massive demands to make sure everything we do is legally compliant. As director of The Learning Place - an NZQA training provider that developed the Online LCQ, Iâ€™m proud of the team working to help make this industry more accessible for everyone. We are supported by a group of hospitality professionals who have cooked, served, trained and love the hospitality world. We have talked extensively with people in the industry to develop a solutions-based package that provides the core essentials to operating your business successfully. I look forward to having you on board with the platform, and would love to hear your success stories, feedback and suggestions.</span></span></p>', 1, '', 1504619268, 1508728327),
(2, 'Contact', 'contact', '<p>\r\n	Contact page description</p>', 1, '', 1504703858, 1504703858),
(3, 'Privacy Policy', 'privacy-policy', '<p>\r\n	Privacy Policy description</p>', 1, '', 1504703882, 1504703882),
(4, 'Terms & Conditions', 'terms-and-conditions', '<p>\r\n	Terms & Conditions text goes here.</p>', 1, '', 1504703899, 1504703899);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2017-09-13 06:54:01', '0000-00-00 00:00:00'),
(2, 'Manager', 'manager', '2017-09-13 06:54:01', '0000-00-00 00:00:00'),
(3, 'Employee', 'employee', '2017-09-13 06:54:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shortlisted`
--

CREATE TABLE IF NOT EXISTS `shortlisted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `by_id` int(11) NOT NULL,
  `is_interested` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `shortlisted`
--

INSERT INTO `shortlisted` (`id`, `to_id`, `by_id`, `is_interested`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 37, 26, 1, 1, '2017-10-17 23:09:49', '2017-10-18 01:07:37', '2017-10-18 01:09:49'),
(22, 38, 26, 1, 1, '2017-10-18 22:59:03', '2017-10-18 05:43:30', '2017-10-19 00:59:03'),
(23, 52, 26, 1, 1, '2017-10-18 22:27:55', '2017-10-19 00:27:10', '2017-10-19 00:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `special_skill_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `special_skill_id`, `created_at`, `updated_at`) VALUES
(5, 14, 0, '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(6, 15, 0, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(7, 16, 0, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(9, 18, 0, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(10, 19, 0, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(38, 37, 9, '2017-10-17 23:03:29', '0000-00-00 00:00:00'),
(39, 38, 9, '2017-10-18 03:37:30', '0000-00-00 00:00:00'),
(40, 40, 7, '2017-10-18 07:43:51', '0000-00-00 00:00:00'),
(41, 40, 9, '2017-10-18 07:43:51', '0000-00-00 00:00:00'),
(42, 41, 9, '2017-10-18 07:51:09', '0000-00-00 00:00:00'),
(43, 52, 9, '2017-10-18 22:25:55', '0000-00-00 00:00:00'),
(44, 53, 7, '2017-10-23 21:12:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `special_skills`
--

CREATE TABLE IF NOT EXISTS `special_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `special_skills`
--

INSERT INTO `special_skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Licensed Duty Manager / GMC', '2017-10-13 10:25:35', '2017-10-15 22:55:58'),
(8, 'Liquor Control Qualification', '2017-10-15 22:56:19', '2017-10-15 22:56:19'),
(9, 'Management Experience', '2017-10-15 22:56:40', '2017-10-15 22:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_on_card` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `card_expiry_month` int(11) DEFAULT NULL,
  `card_expiry_year` int(11) DEFAULT NULL,
  `status` enum('Pending','Paid','Expired') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `package_id`, `txn_id`, `user_id`, `name_on_card`, `card_number`, `cvv`, `card_expiry_month`, `card_expiry_year`, `status`, `created_at`, `payment_date`, `updated_at`) VALUES
(1, 1, '5T701065W7335911E', 48, NULL, NULL, NULL, NULL, NULL, 'Paid', '2017-10-18 11:02:57', '2017-10-18 11:02:57', '2017-10-18 11:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `tab_details`
--

CREATE TABLE IF NOT EXISTS `tab_details` (
  `content_type` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `button_target` int(1) NOT NULL,
  `updatedon` bigint(20) NOT NULL,
  `createdon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_details`
--

INSERT INTO `tab_details` (`content_type`, `heading`, `sub_heading`, `price`, `description`, `button_text`, `button_link`, `button_target`, `updatedon`, `createdon`) VALUES
('Home Tab 1', 'Recruitment', 'Hospitality recruitment made easy for Managers and Employees.', '', 'Filter staff by experience, location, and availability.\r\nShortlist candidates youâ€™re interested in, and weâ€™ll\r\ntake care of the introductions.', 'Launch Recruitment', 'http://69.89.31.223/~thelabel/hospo/jobseekers.html', 1, 1508365094, 1504790220),
('Home Tab 2', 'Training', 'Compliance training isnâ€™t going away. But it doesnâ€™t have to be an uphill battle.', '', 'A training platform for your staff to make sure they''re  fully compliant with Fire Evacuation, Food Safety, Health and Safety & Customer Service guidelines.', 'Launch Training', 'https://tlp.learncoach.co.nz', 1, 1508365094, 1504790220),
('Home Tab 3', 'Tool Box', 'Tool box of Templates takes the head ache out of paperwork.', '', 'Keep your paperwork in check - health & safety plans, job contracts and much more. Save time, money and helps maintain your legal obligations.', 'View Templates', 'http://www.google.com', 1, 1508365094, 1504790220),
('Home Tab 4', 'Manager', 'Is all it costs to recruit, train, comply and change the way you do business. A platform for hospo people created by hospo people.', '$250/yr', '', 'Register', 'http://thelabelmakers.org/hospo/signup.php', 1, 1508365094, 1504790220),
('Home Tab 5', 'Employee', 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', 'Free', '', 'Register', 'http://thelabelmakers.org/hospo/signup.php', 1, 1508365094, 1504790220),
('Home Tab 6', 'Super Employee', 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', '$50/yr', '', 'Register', 'http://thelabelmakers.org/hospo/signup.php', 1, 1508365094, 1504790220);

-- --------------------------------------------------------

--
-- Table structure for table `total_experience`
--

CREATE TABLE IF NOT EXISTS `total_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` enum('years','months') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `total_experience`
--

INSERT INTO `total_experience` (`id`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, 'No experience', '', '2017-10-15 16:22:45', '2017-10-15 07:05:52'),
(2, '0-6', 'months', '2017-10-15 07:10:45', '2017-10-15 07:10:45'),
(3, '6-12', 'months', '2017-10-15 07:10:59', '2017-10-15 07:10:59'),
(4, '1-2', 'years', '2017-10-15 07:11:18', '2017-10-15 07:11:18'),
(5, '2-3', 'years', '2017-10-15 07:11:27', '2017-10-15 07:11:27'),
(6, '3-4', 'years', '2017-10-15 07:11:38', '2017-10-15 07:11:38'),
(7, '4-5', 'years', '2017-10-15 07:11:54', '2017-10-15 07:11:54'),
(8, '5 +', 'years', '2017-10-15 07:12:04', '2017-10-15 07:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone_confirmed` tinyint(4) DEFAULT '0',
  `email_confirmed` tinyint(4) DEFAULT '0',
  `email_confirmation_code` varchar(255) DEFAULT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `org_password` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '0',
  `membership_status` enum('Active','Inactive','Expired') DEFAULT 'Inactive',
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `phone`, `role_id`, `phone_confirmed`, `email_confirmed`, `email_confirmation_code`, `password`, `salt`, `org_password`, `create_date`, `updated_at`, `status`, `membership_status`, `type`) VALUES
(1, 'Super Admin', 'admin@stu.com', 'admin@hospo.com', '', 1, 0, 0, NULL, 'b009c778ea1bdbee44bef4a79daa843a8d0aa7c925a181d43a005ac063b481612c4374f0dcbf4fd38e51b6a0b8b32d7beb5a4b31f0dc2c3e996ae6b1cdc727e2', 'c790ecd0f9706cfce299e738745d42dd902c8f1cb6ad5e09612a5304834a28cf012e1734b6872fa8d494c6c81d25e2397835d458ccfa64372082e698c440ff01', 'Admin@123', '2014-09-24 19:00:00', '0000-00-00 00:00:00', 1, NULL, 'Superadmin'),
(50, NULL, NULL, 'vii@gmail.com', '29101309104', 2, 0, 0, '$2y$10$TQzNBSjfRKaH4IeBCRTNdOdwP2gDn50ZTukIvlKlHKe.wysa61eN6', '$2y$10$bVOVGQXmFsRk6ZP8uZhZTOXeiVWlMp8.YVfMVS36CgEJgSo5MjdZe', '', NULL, '2017-10-18 12:41:13', '2017-10-18 12:41:13', 1, 'Inactive', NULL),
(14, NULL, NULL, 'a@rakesh.com', '4564564564564', 3, 0, 0, '$2y$10$XMhUSJQ.fR4y9s8ge0ux6u86claXyQrnsIp9.q0KM9S1MokvwApUm', '$2y$10$orW3db8V4JcZUawD1U4YZ.sp1Ou1PbaKDxQZG38A1ro73.b/Estji', '', NULL, '2017-09-20 12:20:09', '2017-09-20 12:20:09', 1, NULL, NULL),
(15, NULL, NULL, 'a@b.comaaaa', '34343434343', 3, 0, 0, '$2y$10$JRfphDjpQ8p/XXd6rI4Up.MJmd1MA/lIyFHA7hHZVY4PosfOA11ya', '$2y$10$MRTnfi1FjX902RTk60EVw.S7LWZOzfGKzPqBxQumPL7OEQ7JnXDe.', '', NULL, '2017-09-20 12:26:55', '2017-09-20 12:26:55', 1, NULL, NULL),
(16, NULL, NULL, 'aaaaaa@b.coma', '4646456', 3, 0, 0, '$2y$10$Yojbc/l2h.k154Ab1XFIAOJsZi9omI0Ob9w49q38.mRsSsILVpS7q', '$2y$10$g7PCSG8RPMg20lISbTs5rucCY1mYlaVczKlodnTfwgOQ./uHPtzs6', '', NULL, '2017-09-20 12:37:46', '2017-09-20 12:37:46', 1, NULL, NULL),
(40, NULL, NULL, 'demome@hospo.com', '8998998999', 3, 0, 0, '$2y$10$sq4LPCuUC/vpv7tbJh5cmekf0YlvDr7EQi.fjwCylGb3RHyAQ5D4S', '$2y$10$Kt0fUzIJoqBPlhrSh/DZFeuoxsDrO8FzeWCF6tTkREX0MPqCpr08S', '', NULL, '2017-10-18 09:43:51', '2017-10-18 09:43:51', 1, 'Inactive', NULL),
(41, NULL, NULL, 'david@hospo.co.nz', '092837492', 3, 0, 1, '$2y$10$wU.KnM7qp9iObK5yDeZXcO0ce8xPYnw4jzgvJr./gp/9TVRyHu0S6', '$2y$10$uA5nxHbY7uqMoc4NJD0w1uNiRedZuSj7lXEvtuZcOiT6/AilcXQvi', '', NULL, '2017-10-18 09:51:09', '2017-10-18 09:51:30', 1, 'Inactive', NULL),
(42, NULL, NULL, 'testingnewdemo@hospo.com', '9650715414', 2, 0, 0, '$2y$10$GzVZm.QBLvyBX3IW7rHsoukrDFeJxZXDbz4Ere/1LrLLGS/fNH7ju', '$2y$10$66rJb9Q72icPnJxGzbAoxOc07dHxjp4INU1HhXbcfhwWXgGS7J7Z2', '', NULL, '2017-10-18 09:52:19', '2017-10-18 09:52:19', 1, 'Inactive', NULL),
(43, NULL, NULL, 'tttt@hospo.com', '96503339414', 2, 0, 0, '$2y$10$IVArGwUGzOOlxXt7Nc.ml.J3fau2.eqNChWQHNSTRT4MEFvr6zGI2', '$2y$10$njidXQtFWhK7/ySVAYE4QeMw8akx5GqZn3TJv1RKYArBnFpzTA.1a', '', NULL, '2017-10-18 10:09:43', '2017-10-18 10:09:43', 1, 'Inactive', NULL),
(44, NULL, NULL, 'raks.bisht@hospo.com', '86899879889', 2, 0, 0, '$2y$10$OX2NJy9tPf82HxY0OaknH.QThgkiwAgcTU1yM0VNfvz1RGVyKed5y', '$2y$10$YJGewAYE4eF9QPE3MRknyePBhE/Flqs.ARtQt6KijfKHiQF5iauX6', '', NULL, '2017-10-18 10:13:22', '2017-10-18 10:13:22', 1, 'Inactive', NULL),
(45, NULL, NULL, 'admiffffff@hospo.com', '5675675675', 2, 0, 0, '$2y$10$pn3ZGyxUJRA3DogETnQYEu0XEmfN4XqBmr9ZANbXVNeT46ezx.4A6', '$2y$10$nTJq33SDMo86I7TJcq1NSOcyZXMavQwtgEKf2jvnKSLbzbWEteXFe', '', NULL, '2017-10-18 10:36:40', '2017-10-18 10:36:40', 1, 'Inactive', NULL),
(46, NULL, NULL, 'demome123@gmail.com', '534534534', 2, 0, 0, '$2y$10$A2hG7rtHvAQQJl5EAr5b6OhQd2K3czQfj4byMXmWeO0ICAnaq6/KG', '$2y$10$fqg1Jwfes/iuZzsntu8g0en18adh/sQiIVviJqJmhdqeuPjkMVVT2', '', NULL, '2017-10-18 10:47:13', '2017-10-18 10:47:13', 1, 'Inactive', NULL),
(26, NULL, NULL, 'manager@hospo.com', '965222222', 2, 1, 1, NULL, '$2y$10$hLLCpM237xdnVXxY9ovIk.sJAipE2OUOCDbsmQVMYT5hRrcUZqSRq', '', NULL, '2017-10-05 21:22:29', '2017-10-11 22:36:39', 1, 'Active', NULL),
(51, NULL, NULL, 'vinesh@vineshk.com', '0210536638', 2, 0, 1, '$2y$10$oHEzL.jbMCoqSMIE4GTABeNOxTFPoDSre/HI0i4p/Pwx8G8Qyhzcy', '$2y$10$VGMJZ3jxWApqZk4F29iQBuJS996y6SGzGNnCBsRBpYv3csLj8SBdK', '', NULL, '2017-10-18 22:19:51', '2017-10-23 03:18:26', 1, 'Inactive', NULL),
(49, NULL, NULL, 'jenjkenwkn@yahoo.com', '42242242342', 2, 0, 0, '$2y$10$8ZP9b63iktyrzovX2/xBw.tljoGJoMs6sk.uuxsrenJh.k3NfhoqC', '$2y$10$vB5yLhwmTOfAIQLjTSz3oOBribBpAlO.Vljfpe91hk4gH5ur/zcQW', '', NULL, '2017-10-18 12:17:16', '2017-10-18 12:17:16', 1, 'Inactive', NULL),
(30, NULL, NULL, 'raj@hospo.com', '9876666666', 2, 0, 1, '$2y$10$7QsV3qMjQeHJG54b5bykRO.WRH2m/W/a7eN4THMtSg0EgvatTx4vK', '$2y$10$JN0MRSmFzwLwT.bU6Eb.L.z1kX8ZkJSysE/TZ96ZWUu02COT6/zoS', '', NULL, '2017-10-11 22:09:54', '2017-10-16 08:20:09', 1, NULL, NULL),
(31, NULL, NULL, 'vinesh@gmail.com', '0210987654', 2, 0, 1, '$2y$10$Ji0kYrfpyISI.3xdSr3GsudTCQdaCVGaNNkfbpUJVwRy6yJcqxM5u', '$2y$10$vdka3nY7oVNmDfKBhWeK6u8tU4SiVskV8Saub8BOw5WDvDzyp2Che', '', NULL, '2017-10-11 22:28:27', '2017-10-11 22:28:51', 1, NULL, NULL),
(48, NULL, NULL, 'menewuser@hospo.com', '7897897989987', 2, 0, 0, '$2y$10$VQLuwBnzSdn5e7CtTaMW/uEcnBfQagKolQhbCJn9CYgs8INL9ND6q', '$2y$10$D.p5QS2cSLXGkysexlQABeisebLILf2c8vgjIXAMI7djmlrRiPq3O', '', NULL, '2017-10-18 11:01:27', '2017-10-18 11:02:57', 1, 'Active', NULL),
(47, NULL, NULL, 'rajeshbisht@hospo.com', '7878787878', 2, 0, 0, '$2y$10$sabaZRG0eT8pL1/djwx4TOkBCJP6lx73GXDLslIBGQkEMom0Dpvu2', '$2y$10$s.hSRSijd9p73zpCr5gJkOl2xVdVtru5Ipw6gq5wiDx.F2BEPDn06', '', NULL, '2017-10-18 10:50:30', '2017-10-18 10:50:30', 1, 'Inactive', NULL),
(39, NULL, NULL, 'shivam5105@gmail.com', '3217788171', 2, 0, 1, '$2y$10$vORWYiVNFmgFuJUrb6kW.uTd9XI6ow0eKzZT3BMVrpCB8nLA0tuxO', '$2y$10$yhnTqEuJpqNeI1qDza/Dl.8SVKtESIjc8l8YS4SfcDR1fwsyhkW5a', '', NULL, '2017-10-18 07:20:49', '2017-10-18 07:21:36', 1, NULL, NULL),
(38, NULL, NULL, 'vin@hospo.co.nz', '021034566', 3, 0, 1, '$2y$10$HtceNLbi0udwfT.bPNTUmeIdPVA8C1Rgt8Z/Cm6y5Quuqr4XYj/Oi', '$2y$10$zSE7IrDGYPnXjkeRUnm2uuU8eWZarxStqdl6rQj2zPrOLZYXE/wnS', '', NULL, '2017-10-18 05:37:30', '2017-10-18 05:40:42', 1, NULL, NULL),
(37, NULL, NULL, 'jones@hospo.co.nz', '123456789', 3, 0, 1, '$2y$10$AfVXVEmefIHhZWuQAYkkyut9KkyntvC0V/4YtTB1Z33ScI46JWoPO', '$2y$10$6A3T3rkKsO7YVJeUvrC7LumrE.h6Y7XgGevw4cjfEKNkOmuZkA.x.', '', NULL, '2017-10-18 01:03:29', '2017-10-18 05:38:39', 1, NULL, NULL),
(52, NULL, NULL, 'shea@hospo.co.nz', '0293874830', 3, 0, 1, '$2y$10$P5bSQpogFaz5Bqox9.F.yucwlSKXRW6ezxmjYMMAW.WLM2nTMszr.', '$2y$10$05k7azoHWNofXQU2cuFh5.7BEyzSreNSLrooyNkJICpRCz3meUG16', '', NULL, '2017-10-19 00:25:55', '2017-10-19 00:26:33', 1, 'Inactive', NULL),
(53, NULL, NULL, 'ryan@hospo.co.nz', '0293847493', 3, 0, 1, '$2y$10$AtUHNzJ0FIiG97lpgOCWP.48b.5NXOiaLetsExnun3hD.qGZHV49a', '$2y$10$medIbW5FXXJYTmVgztnLo.Rz5e3jC4Blrmfc7A/eP4rlgcJqgRhPm', '', NULL, '2017-10-23 23:12:53', '2017-10-23 23:13:21', 1, 'Inactive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_login_attempts`
--

CREATE TABLE IF NOT EXISTS `users_login_attempts` (
  `user_id` bigint(20) NOT NULL,
  `createdon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_login_attempts`
--

INSERT INTO `users_login_attempts` (`user_id`, `createdon`) VALUES
(1, 1504846202),
(1, 1505824483),
(1, 1505824510),
(1, 1505824625),
(12, 1505824688),
(12, 1505824708),
(24, 1507208597),
(24, 1507208602),
(25, 1507208609),
(26, 1507257186),
(26, 1507257201),
(1, 1507257469),
(26, 1507494853),
(1, 1507498429),
(25, 1507511931),
(24, 1507511949),
(1, 1507670069),
(1, 1507672788),
(26, 1507709258),
(27, 1507711720),
(27, 1507711730),
(21, 1507713203),
(21, 1507713234),
(21, 1507713267),
(28, 1507713362),
(23, 1507714431),
(23, 1507714713),
(23, 1507714811),
(31, 1507753754),
(31, 1507753762),
(31, 1507753780),
(1, 1508185098),
(26, 1508278307),
(39, 1508365290),
(52, 1508367606),
(39, 1508721438),
(26, 1508721565),
(26, 1508721742),
(26, 1508721752),
(39, 1508743389);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE IF NOT EXISTS `users_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `about` longtext,
  `current_status` enum('Employed','Unemployed','Studying') DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `prmo_code` varchar(255) DEFAULT NULL,
  `currently_looking_for_work` tinyint(1) NOT NULL DEFAULT '0',
  `part_or_full` enum('Part','Full') DEFAULT NULL,
  `licence_transport_id` int(11) DEFAULT NULL,
  `total_experience_id` int(11) DEFAULT NULL,
  `availability` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `profile`, `about`, `current_status`, `location`, `prmo_code`, `currently_looking_for_work`, `part_or_full`, `licence_transport_id`, `total_experience_id`, `availability`, `created_at`, `updated_at`) VALUES
(8, 14, 'a', 'a', '6ee5700d6628b599c76193cc699f10b8.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', 'Employed', 0, NULL, 1, 'Full', NULL, NULL, '', '2017-09-20 12:20:09', '2017-09-20 12:20:09'),
(9, 15, 'RAEKSH', 'FAFA', '41c695325fd18e1968d24ffc87366c76.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', 'Unemployed', 0, NULL, 1, 'Part', NULL, NULL, '', '2017-09-20 12:26:55', '2017-09-20 12:26:55'),
(10, 16, 'aa', 'aa', '85ddcf54fe364b510de02f753d172df0.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', 'Studying', 0, NULL, 1, 'Part', NULL, NULL, '', '2017-09-20 12:37:46', '2017-09-20 12:37:46'),
(12, 18, 'aa', 'aa', 'f07c455868db3cadb57a38cfd237f2de.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', 'Studying', 0, NULL, 1, 'Part', NULL, NULL, '', '2017-09-20 12:50:09', '2017-09-20 12:50:09'),
(13, 19, 'aa', 'aa', 'dfd03bd124a8de9fe491811d65677fe4.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', 'Studying', 0, NULL, 1, 'Part', NULL, NULL, '', '2017-09-20 12:56:08', '2017-09-20 12:56:08'),
(23, 26, 'Studio', 'Six', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-11 20:07:31', '2017-10-11 22:36:39'),
(24, 30, 'Raj', 'Sharma', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-11 22:09:54', '2017-10-16 08:20:09'),
(25, 31, 'Vinesh', 'Kumar', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-11 22:28:27', '2017-10-11 22:28:51'),
(31, 37, 'john', 'Jones', '8d13066a2976f32971ba8fdfb48546fc.jpg', 'hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF hsjk uak u ka aoahw kihg IUHWF Iwfhneihw kuahw kliah kiahsg kuha kihG Kefg kuheif IHF', 'Unemployed', 21, '', 1, 'Full', 5, 6, '', '2017-10-18 01:03:29', '2017-10-18 05:38:39'),
(32, 38, 'Vinesh', 'Kumar', 'b99a620703e1033289b04baa6eb930ba.jpg', 'jkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhfjkfe keffefk iuhf', 'Studying', 36, '', 1, 'Full', 4, 4, '', '2017-10-18 05:37:30', '2017-10-18 05:40:42'),
(33, 39, 'aad', 'adsa', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 07:20:49', '2017-10-18 07:21:36'),
(34, 40, 'demouser', 'demouser', '42c0a9895214124106ef8542e9206df6.jpg', 'I think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\nI think it will not be multi selected ,please confirm\r\n', 'Employed', 20, NULL, 1, 'Full', 4, 4, 'Anytime,Weekdays', '2017-10-18 09:43:51', '2017-10-18 09:43:51'),
(35, 41, 'dave', 'Davis', '2ce701aa9451a68bc99185d8c3fdb35c.jpg', 'askfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;weaskfg kfh kwf kwf wkwuhFkw wkfbw k;wF;we', 'Unemployed', 35, '', 1, 'Full', 2, 8, 'Anytime', '2017-10-18 09:51:09', '2017-10-18 09:51:30'),
(36, 42, 'testing', 'Testing', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 09:52:19', '2017-10-18 09:52:19'),
(37, 43, 'newemp1', 'test', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 10:09:43', '2017-10-18 10:09:43'),
(38, 44, 'new', 'new', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 10:13:22', '2017-10-18 10:13:22'),
(39, 45, 'sdf', 'sdfsd', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 10:36:40', '2017-10-18 10:36:40'),
(40, 46, 'demo', 'demo', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 10:47:13', '2017-10-18 10:47:13'),
(41, 47, 'rajesh', 'bisht', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 10:50:30', '2017-10-18 10:50:30'),
(42, 48, 'registerdemo', 'demo', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 11:01:27', '2017-10-18 11:01:27'),
(43, 49, 'kejwdnkwe', 'nkjnwjdnwe', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 12:17:16', '2017-10-18 12:17:16'),
(44, 50, 'VIi', 'iii', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 12:41:13', '2017-10-18 12:41:13'),
(45, 51, 'Vinesh', 'Kumar', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '2017-10-18 22:19:51', '2017-10-23 03:18:26'),
(46, 52, 'Shea', 'Morris', 'a7081d66517b9ccdb5ee8332c0efe867.jpg', 'Welcome to a platform for hospo people, created by hospo people. Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.Welcome to a platform for hospo people, created by hospo people.', 'Unemployed', 19, '', 1, 'Full', 5, 4, 'Anytime', '2017-10-19 00:25:55', '2017-10-19 00:26:33'),
(47, 53, 'Ryan', 'Ryan', '0ab0eba07f38a7cc724b6776175f2da7.png', 'jbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jkajbasbfjwfkbawf ajkwbf akwjbf awkjf jka', 'Unemployed', 26, '', 1, 'Full', 4, 4, 'Weeknights,Weekends', '2017-10-23 23:12:53', '2017-10-23 23:13:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
