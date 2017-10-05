-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 12:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thelabel_hospodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mon` varchar(255) NOT NULL,
  `tue` varchar(255) NOT NULL,
  `wed` varchar(255) NOT NULL,
  `thu` varchar(255) NOT NULL,
  `fri` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `sun` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `user_id`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `created_at`, `updated_at`) VALUES
(2, 13, 'morning,noon,night', 'morning,noon', 'morning', 'noon', 'noon', 'noon', 'night', '2017-09-15 09:50:33', '2017-09-20 13:57:46'),
(3, 16, '', '', '', '', '', '', '', '2017-09-20 12:37:47', '2017-09-20 12:37:47'),
(4, 17, '', '', '', '', '', '', '', '2017-09-20 12:47:29', '2017-09-20 12:47:29'),
(5, 20, '', '', '', '', '', '', '', '2017-09-20 12:58:43', '2017-09-20 12:58:43'),
(6, 21, '', '', '', '', '', '', '', '2017-10-03 06:23:46', '2017-10-03 06:23:46'),
(7, 41, 'morning,noon', 'noon', 'morning,noon,night', 'noon,night', 'morning,night', 'morning,noon,night', 'morning,noon,night', '2017-10-03 07:55:56', '2017-10-03 08:01:34'),
(8, 42, 'morning,noon,night', 'morning,noon,night', 'morning,noon,night', 'morning,noon,night', 'morning,noon,night', 'morning,noon', 'morning,noon,night', '2017-10-03 07:58:24', '2017-10-03 08:01:13'),
(9, 43, 'morning,noon', 'noon', 'noon', 'morning', 'morning', 'morning', 'noon', '2017-10-03 09:49:20', '2017-10-03 09:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bar & Beverage Service', 0, '', '', 1, '2017-09-13 05:12:25', '0000-00-00 00:00:00'),
(2, 'Hotel Guest Services', 0, '', '', 1, '2017-09-13 05:12:59', '0000-00-00 00:00:00'),
(3, 'Waiter', 0, '', '', 1, '2017-09-13 05:13:09', '0000-00-00 00:00:00'),
(4, 'Barista', 0, '', '', 1, '2017-09-13 05:13:22', '0000-00-00 00:00:00'),
(5, 'Chef', 0, '', '', 1, '2017-09-13 05:13:33', '0000-00-00 00:00:00'),
(6, 'Kitchen Hand', 0, 'Kitchen Hand', '', 1, '2017-09-13 05:13:54', '2017-09-21 10:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'rakesh bisht', 'raks.bisht@gmail.com', 'this is just a ', '2017-09-17 22:29:49', '2017-09-17 22:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_categories`
--

CREATE TABLE `employee_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_categories`
--

INSERT INTO `employee_categories` (`id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 13, '2017-09-15 19:20:33', '0000-00-00 00:00:00'),
(8, 2, 13, '2017-09-15 19:20:33', '0000-00-00 00:00:00'),
(9, 3, 13, '2017-09-15 19:20:33', '0000-00-00 00:00:00'),
(10, 1, 14, '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(11, 1, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(12, 2, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(13, 3, 15, '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(14, 1, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(15, 2, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(16, 3, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(17, 4, 16, '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(18, 1, 17, '2017-09-20 22:17:28', '0000-00-00 00:00:00'),
(19, 2, 17, '2017-09-20 22:17:28', '0000-00-00 00:00:00'),
(20, 3, 17, '2017-09-20 22:17:28', '0000-00-00 00:00:00'),
(21, 4, 17, '2017-09-20 22:17:28', '0000-00-00 00:00:00'),
(22, 1, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(23, 2, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(24, 3, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(25, 4, 18, '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(26, 1, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(27, 2, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(28, 3, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(29, 4, 19, '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(30, 1, 20, '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(31, 2, 20, '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(32, 3, 20, '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(33, 4, 20, '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(34, 4, 13, '2017-09-20 23:27:33', '0000-00-00 00:00:00'),
(35, 1, 21, '2017-10-03 15:53:45', '0000-00-00 00:00:00'),
(36, 1, 22, '2017-10-03 16:00:20', '0000-00-00 00:00:00'),
(37, 1, 23, '2017-10-03 16:02:15', '0000-00-00 00:00:00'),
(38, 2, 23, '2017-10-03 16:02:15', '0000-00-00 00:00:00'),
(39, 1, 24, '2017-10-03 16:03:10', '0000-00-00 00:00:00'),
(40, 2, 24, '2017-10-03 16:03:10', '0000-00-00 00:00:00'),
(41, 1, 25, '2017-10-03 16:06:59', '0000-00-00 00:00:00'),
(42, 2, 25, '2017-10-03 16:06:59', '0000-00-00 00:00:00'),
(43, 1, 26, '2017-10-03 16:10:56', '0000-00-00 00:00:00'),
(44, 2, 26, '2017-10-03 16:10:56', '0000-00-00 00:00:00'),
(45, 1, 27, '2017-10-03 16:18:59', '0000-00-00 00:00:00'),
(46, 2, 27, '2017-10-03 16:18:59', '0000-00-00 00:00:00'),
(47, 1, 28, '2017-10-03 16:23:51', '0000-00-00 00:00:00'),
(48, 2, 28, '2017-10-03 16:23:51', '0000-00-00 00:00:00'),
(49, 1, 29, '2017-10-03 16:24:38', '0000-00-00 00:00:00'),
(50, 2, 29, '2017-10-03 16:24:38', '0000-00-00 00:00:00'),
(51, 1, 30, '2017-10-03 16:27:44', '0000-00-00 00:00:00'),
(52, 2, 30, '2017-10-03 16:27:44', '0000-00-00 00:00:00'),
(53, 1, 31, '2017-10-03 16:32:28', '0000-00-00 00:00:00'),
(54, 2, 31, '2017-10-03 16:32:28', '0000-00-00 00:00:00'),
(55, 1, 32, '2017-10-03 16:34:35', '0000-00-00 00:00:00'),
(56, 2, 32, '2017-10-03 16:34:35', '0000-00-00 00:00:00'),
(57, 1, 33, '2017-10-03 16:40:12', '0000-00-00 00:00:00'),
(58, 2, 33, '2017-10-03 16:40:12', '0000-00-00 00:00:00'),
(59, 1, 34, '2017-10-03 16:52:50', '0000-00-00 00:00:00'),
(60, 2, 34, '2017-10-03 16:52:50', '0000-00-00 00:00:00'),
(61, 1, 35, '2017-10-03 17:03:57', '0000-00-00 00:00:00'),
(62, 2, 35, '2017-10-03 17:03:57', '0000-00-00 00:00:00'),
(63, 1, 36, '2017-10-03 17:07:10', '0000-00-00 00:00:00'),
(64, 2, 36, '2017-10-03 17:07:10', '0000-00-00 00:00:00'),
(65, 1, 37, '2017-10-03 17:09:38', '0000-00-00 00:00:00'),
(66, 2, 37, '2017-10-03 17:09:38', '0000-00-00 00:00:00'),
(67, 1, 38, '2017-10-03 17:10:18', '0000-00-00 00:00:00'),
(68, 2, 38, '2017-10-03 17:10:18', '0000-00-00 00:00:00'),
(69, 1, 39, '2017-10-03 17:12:30', '0000-00-00 00:00:00'),
(70, 2, 39, '2017-10-03 17:12:30', '0000-00-00 00:00:00'),
(71, 4, 41, '2017-10-03 17:25:56', '0000-00-00 00:00:00'),
(72, 1, 42, '2017-10-03 17:28:24', '0000-00-00 00:00:00'),
(73, 2, 42, '2017-10-03 17:31:12', '0000-00-00 00:00:00'),
(74, 3, 42, '2017-10-03 17:31:12', '0000-00-00 00:00:00'),
(75, 1, 43, '2017-10-03 19:19:20', '0000-00-00 00:00:00'),
(76, 2, 43, '2017-10-03 19:19:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_license_transport`
--

CREATE TABLE `employee_license_transport` (
  `id` int(11) NOT NULL,
  `licence_transport_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 1, 21, '2017-10-03 15:53:46', '0000-00-00 00:00:00'),
(10, 2, 21, '2017-10-03 15:53:46', '0000-00-00 00:00:00'),
(11, 1, 22, '2017-10-03 16:00:21', '0000-00-00 00:00:00'),
(12, 2, 22, '2017-10-03 16:00:21', '0000-00-00 00:00:00'),
(13, 1, 23, '2017-10-03 16:02:15', '0000-00-00 00:00:00'),
(14, 2, 23, '2017-10-03 16:02:15', '0000-00-00 00:00:00'),
(15, 1, 24, '2017-10-03 16:03:10', '0000-00-00 00:00:00'),
(16, 2, 24, '2017-10-03 16:03:10', '0000-00-00 00:00:00'),
(17, 1, 25, '2017-10-03 16:06:59', '0000-00-00 00:00:00'),
(18, 2, 25, '2017-10-03 16:06:59', '0000-00-00 00:00:00'),
(19, 1, 26, '2017-10-03 16:10:56', '0000-00-00 00:00:00'),
(20, 2, 26, '2017-10-03 16:10:56', '0000-00-00 00:00:00'),
(21, 1, 27, '2017-10-03 16:18:59', '0000-00-00 00:00:00'),
(22, 2, 27, '2017-10-03 16:18:59', '0000-00-00 00:00:00'),
(23, 1, 28, '2017-10-03 16:23:51', '0000-00-00 00:00:00'),
(24, 2, 28, '2017-10-03 16:23:51', '0000-00-00 00:00:00'),
(25, 1, 29, '2017-10-03 16:24:38', '0000-00-00 00:00:00'),
(26, 2, 29, '2017-10-03 16:24:38', '0000-00-00 00:00:00'),
(27, 1, 30, '2017-10-03 16:27:44', '0000-00-00 00:00:00'),
(28, 2, 30, '2017-10-03 16:27:44', '0000-00-00 00:00:00'),
(29, 1, 31, '2017-10-03 16:32:28', '0000-00-00 00:00:00'),
(30, 2, 31, '2017-10-03 16:32:28', '0000-00-00 00:00:00'),
(31, 1, 32, '2017-10-03 16:34:35', '0000-00-00 00:00:00'),
(32, 2, 32, '2017-10-03 16:34:35', '0000-00-00 00:00:00'),
(33, 1, 33, '2017-10-03 16:40:12', '0000-00-00 00:00:00'),
(34, 2, 33, '2017-10-03 16:40:12', '0000-00-00 00:00:00'),
(35, 1, 34, '2017-10-03 16:52:50', '0000-00-00 00:00:00'),
(36, 1, 35, '2017-10-03 17:03:57', '0000-00-00 00:00:00'),
(37, 1, 36, '2017-10-03 17:07:10', '0000-00-00 00:00:00'),
(38, 1, 37, '2017-10-03 17:09:38', '0000-00-00 00:00:00'),
(39, 1, 38, '2017-10-03 17:10:18', '0000-00-00 00:00:00'),
(40, 1, 39, '2017-10-03 17:12:30', '0000-00-00 00:00:00'),
(41, 1, 41, '2017-10-03 17:25:56', '0000-00-00 00:00:00'),
(42, 2, 41, '2017-10-03 17:25:56', '0000-00-00 00:00:00'),
(44, 2, 42, '2017-10-03 17:29:12', '0000-00-00 00:00:00'),
(45, 1, 43, '2017-10-03 19:19:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `employer`, `location`, `job_title`, `job_description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 13, 'hafaka singh', 'punjab-new', 'Hafaka Singh', 'fafafafaemployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', '33/17', '12/93', '2017-09-15 19:20:33', '2017-09-20 13:57:46'),
(3, 13, 'hafaka singh', 'punjab-new', 'Hafaka Singh', 'fafafafaemployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', '33/17', '12/93', '2017-09-15 13:50:33', '2017-09-20 13:57:46'),
(4, 41, 'hafaka singh', 'punjab-new', 'Hafaka Singh', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', '33/17', '12/93', '2017-10-03 17:25:56', '2017-10-03 08:01:34'),
(5, 42, 'hafaka singh', 'punjab-new', 'Software Engineer', 'FsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdfFsdf', '33/17', '12/93', '2017-10-03 17:28:24', '2017-10-03 08:01:13'),
(6, 42, 'hafaka singh', 'punjab-new', 'afsdfsd', 'Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka Hafaka', '33/17', '12/93', '2017-10-03 17:28:24', '2017-10-03 08:01:13'),
(7, 42, 'sdfsd', 'fsdf', 'afafa', 'Hafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka SinghHafaka Singh', '33/17', '12/93', '2017-10-03 17:28:24', '2017-10-03 08:01:13'),
(8, 43, 'new employer', 'new delhi', 'Software Engineer', 'tthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo descc', '09/11', '12/22', '2017-10-03 19:19:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `name`, `designation`, `message`, `company`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Jane Smtih', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco\'s catina', NULL, '2017-09-12 19:00:22', '0000-00-00 00:00:00'),
(2, 'James', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco\'s catina', NULL, '2017-09-12 19:00:29', '0000-00-00 00:00:00'),
(3, 'Alex', 'HR Manager', 'I can’t believe nobody thought of this sooner! Hiring staff has always been such an expensive and time-consuming process. Hospo changes all that!', 'coco\'s catina', NULL, '2017-09-12 19:00:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `title` varchar(255) NOT NULL,
  `background_image_id` bigint(20) NOT NULL,
  `updatedon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`title`, `background_image_id`, `updatedon`) VALUES
('Say hello to Hospo.', 1, 1507059558);

-- --------------------------------------------------------

--
-- Table structure for table `license_transport`
--

CREATE TABLE `license_transport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license_transport`
--

INSERT INTO `license_transport` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'demoa', '2017-09-20 12:38:08', '2017-09-21 10:58:42'),
(2, 'demo', '2017-09-20 12:38:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `createdon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `createdon`) VALUES
(1, 'crew.jpg', 1504876072);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
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
('footer-col1', 'Service', 'Custom Link', 'Recruitment', '', 1, 'http://google.com', 0, '', 0),
('footer-col1', 'Service', 'Custom Link', 'Training', '', 1, 'http://google.com', 0, '', 1),
('footer-col1', 'Service', 'Custom Link', 'Shop', '', 1, 'http://google.com', 0, '', 2),
('footer-col1', 'Service', 'Custom Link', 'Plans & Pricing', '', 1, 'http://google.com', 0, '', 3),
('footer-col2', 'Company', 'Custom Link', 'About Us', '', 1, 'http://google.com', 0, '', 0),
('footer-col2', 'Company', 'Custom Link', 'Contact', '', 1, 'http://google.com', 0, '', 1),
('footer-col3', 'Legal', 'Custom Link', 'Privacy Policy', '', 1, 'http://google.com', 0, '', 0),
('footer-col3', 'Legal', 'Custom Link', 'Terms & Conditions', '', 1, 'http://google.com', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `type` enum('year','month') NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `template` varchar(255) NOT NULL,
  `createdon` bigint(20) NOT NULL,
  `updatedon` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `status`, `template`, `createdon`, `updatedon`) VALUES
(1, 'About Us', 'about-us', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.Â Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>', 1, '', 1504619268, 1505463328),
(2, 'Contact', 'contact', '<p>\r\n	Contact page description</p>', 1, '', 1504703858, 1504703858),
(3, 'Privacy Policy', 'privacy-policy', '<p>\r\n	Privacy Policy description</p>', 1, '', 1504703882, 1504703882),
(4, 'Terms & Conditions', 'terms-and-conditions', '<p>\r\n	Terms & Conditions text goes here.</p>', 1, '', 1504703899, 1504703899);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `shortlisted` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `by_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `is_interested` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlisted`
--

INSERT INTO `shortlisted` (`id`, `to_id`, `by_id`, `status`, `is_interested`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 42, 14, 1, 1, '2017-10-03 18:24:52', '2017-09-24 17:53:29', '2017-10-03 08:54:52'),
(2, 42, 15, 1, 1, '2017-10-03 19:14:10', '2017-09-24 18:54:52', '2017-10-03 09:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 13, 'cooking', '2017-09-15 19:20:33', '0000-00-00 00:00:00'),
(4, 13, 'cooking', '2017-09-15 19:20:33', '0000-00-00 00:00:00'),
(5, 14, 'aaf', '2017-09-20 21:50:09', '0000-00-00 00:00:00'),
(6, 15, 'aaa', '2017-09-20 21:56:55', '0000-00-00 00:00:00'),
(7, 16, 'afaf', '2017-09-20 22:07:46', '0000-00-00 00:00:00'),
(8, 17, 'afaf', '2017-09-20 22:17:28', '0000-00-00 00:00:00'),
(9, 18, 'afaf', '2017-09-20 22:20:09', '0000-00-00 00:00:00'),
(10, 19, 'afaf', '2017-09-20 22:26:08', '0000-00-00 00:00:00'),
(11, 20, 'afaf', '2017-09-20 22:28:43', '0000-00-00 00:00:00'),
(12, 21, 'hello', '2017-10-03 15:53:45', '0000-00-00 00:00:00'),
(13, 21, 'new', '2017-10-03 15:53:45', '0000-00-00 00:00:00'),
(14, 22, 'hello', '2017-10-03 16:00:21', '0000-00-00 00:00:00'),
(15, 22, 'new', '2017-10-03 16:00:21', '0000-00-00 00:00:00'),
(16, 23, 'cooking', '2017-10-03 16:02:15', '0000-00-00 00:00:00'),
(17, 24, 'cooking', '2017-10-03 16:03:10', '0000-00-00 00:00:00'),
(18, 25, 'cooking', '2017-10-03 16:06:59', '0000-00-00 00:00:00'),
(19, 26, 'cooking', '2017-10-03 16:10:56', '0000-00-00 00:00:00'),
(20, 27, 'cooking', '2017-10-03 16:18:59', '0000-00-00 00:00:00'),
(21, 28, 'cooking', '2017-10-03 16:23:51', '0000-00-00 00:00:00'),
(22, 29, 'cooking', '2017-10-03 16:24:38', '0000-00-00 00:00:00'),
(23, 30, 'cooking', '2017-10-03 16:27:44', '0000-00-00 00:00:00'),
(24, 31, 'cooking', '2017-10-03 16:32:28', '0000-00-00 00:00:00'),
(25, 32, 'cooking', '2017-10-03 16:34:35', '0000-00-00 00:00:00'),
(26, 33, 'cooking', '2017-10-03 16:40:12', '0000-00-00 00:00:00'),
(27, 34, 'cooking', '2017-10-03 16:52:50', '0000-00-00 00:00:00'),
(28, 35, 'cooking', '2017-10-03 17:03:57', '0000-00-00 00:00:00'),
(29, 36, 'cooking', '2017-10-03 17:07:10', '0000-00-00 00:00:00'),
(30, 37, 'cooking', '2017-10-03 17:09:38', '0000-00-00 00:00:00'),
(31, 38, 'cooking', '2017-10-03 17:10:18', '0000-00-00 00:00:00'),
(32, 39, 'cooking', '2017-10-03 17:12:30', '0000-00-00 00:00:00'),
(33, 41, 'cooking', '2017-10-03 17:25:56', '0000-00-00 00:00:00'),
(34, 42, 'cooking', '2017-10-03 17:28:24', '0000-00-00 00:00:00'),
(35, 43, 'cooking', '2017-10-03 19:19:20', '0000-00-00 00:00:00'),
(36, 43, 'dancing', '2017-10-03 19:19:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tab_details`
--

CREATE TABLE `tab_details` (
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
('Home Tab 1', 'Recruit', 'Hospitality recruitment made easy for Managers and Employees.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.', 'Launch Recruitment', 'http://www.google.com', 1, 1507059558, 1504790220),
('Home Tab 2', 'Recruit', 'Hospitality recruitment made easy for Managers and Employees.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.', 'Launch Recruitment', 'http://www.google.com', 1, 1507059558, 1504790220),
('Home Tab 3', 'Recruit', 'Hospitality recruitment made easy for Managers and Employees.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.', 'Launch Recruitment', 'http://www.google.com', 1, 1507059558, 1504790220),
('Home Tab 4', 'Manager', 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', '$ 280/yr', '', 'Register', 'http://www.google.com', 1, 1507059558, 1504790220),
('Home Tab 5', 'Employee1', 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', 'free !', '', 'Register', 'http://localhost/github/hospo/signup.php', 1, 1507059558, 1504790220),
('Home Tab 6', 'Super Employee', 'Free for employees. Sign up for free and create your profile so managers can search for people with your skills', '$ 15/mo', '', 'Register', 'http://www.google.com', 1, 1507059558, 1504790220);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
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
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `phone`, `role_id`, `phone_confirmed`, `email_confirmed`, `email_confirmation_code`, `password`, `salt`, `org_password`, `create_date`, `updated_at`, `status`, `type`) VALUES
(1, 'Super Admin', 'admin@stu.com', 'admin@hospo.com', '', 1, 0, 0, NULL, 'b009c778ea1bdbee44bef4a79daa843a8d0aa7c925a181d43a005ac063b481612c4374f0dcbf4fd38e51b6a0b8b32d7beb5a4b31f0dc2c3e996ae6b1cdc727e2', 'c790ecd0f9706cfce299e738745d42dd902c8f1cb6ad5e09612a5304834a28cf012e1734b6872fa8d494c6c81d25e2397835d458ccfa64372082e698c440ff01', 'Admin@123', '2014-09-24 19:00:00', '0000-00-00 00:00:00', 1, 'Superadmin'),
(13, NULL, NULL, 'bisht.raks@gmail.com', '9666666666', 3, 0, 1, '$2y$10$OuZiw9ZZpA.1HKBzz5RiAOxoQkY6WZRbZg7gEPUvaNG6k83TJlK.6', '$2y$10$xL8OQoTwEphFaG4L5aLFyeyI93P8DnupM4QLgR6eQzcqUO2YSgVp6', '', NULL, '2017-09-15 09:50:33', '2017-09-20 13:57:46', 1, NULL),
(14, NULL, NULL, 'a@rakesh.com', '4564564564564', 3, 0, 0, '$2y$10$XMhUSJQ.fR4y9s8ge0ux6u86claXyQrnsIp9.q0KM9S1MokvwApUm', '$2y$10$orW3db8V4JcZUawD1U4YZ.sp1Ou1PbaKDxQZG38A1ro73.b/Estji', '', NULL, '2017-09-20 12:20:09', '2017-09-20 12:20:09', 1, NULL),
(15, NULL, NULL, 'a@b.comaaaa', '34343434343', 3, 0, 0, '$2y$10$JRfphDjpQ8p/XXd6rI4Up.MJmd1MA/lIyFHA7hHZVY4PosfOA11ya', '$2y$10$MRTnfi1FjX902RTk60EVw.S7LWZOzfGKzPqBxQumPL7OEQ7JnXDe.', '', NULL, '2017-09-20 12:26:55', '2017-09-20 12:26:55', 1, NULL),
(16, NULL, NULL, 'aaaaaa@b.coma', '4646456', 3, 0, 0, '$2y$10$Yojbc/l2h.k154Ab1XFIAOJsZi9omI0Ob9w49q38.mRsSsILVpS7q', '$2y$10$g7PCSG8RPMg20lISbTs5rucCY1mYlaVczKlodnTfwgOQ./uHPtzs6', '', NULL, '2017-09-20 12:37:46', '2017-09-20 12:37:46', 1, NULL),
(17, NULL, NULL, 'afa@b.com', 'aaa', 3, 0, 0, '$2y$10$JV7cL4jhpfLHybSzrd8S0eI5JzQMxCn2KMRL65btCJlioPXeMUVPW', '$2y$10$ErMBpVVWiNZm9vRvsSrhI.c6nidif5LLyawoGaUbZa0Vd9a8RQO6e', '', NULL, '2017-09-20 12:47:28', '2017-09-20 12:47:28', 1, NULL),
(20, NULL, NULL, 'aaaaaa@b.com', '1111111111', 3, 0, 0, '$2y$10$Tca.VpawmY0HfXYtCJGbBO3kGXBuaVJopyB7ctJEPqLGBKquUrape', '$2y$10$EFeBCjrMf0kd7WMBgQugKuJrHn6tF87ys1x8AUietXO30HKvjy01G', '', NULL, '2017-09-20 12:58:43', '2017-09-20 12:58:43', 1, NULL),
(21, NULL, NULL, 'raks.bishtddd@gmail.com', '989989989', 3, 0, 0, '$2y$10$TSywJm9F2STP0QVtERY8feNTUeC2Ot.gZ3.AFxBTwfJ02SIE/dJKW', '$2y$10$EhmFSmyj1ICEC7m2fI4E3ObOrnLtge65Z7U/sbc023e9d.6POtj1.', '', NULL, '2017-10-03 06:23:45', '2017-10-03 06:23:45', 1, NULL),
(22, NULL, NULL, 'raks.bisht@gmail.com', '9650719414', 3, 0, 0, '$2y$10$skIfF.pWbtAgQyPPKn0d1uIVxhqEIEKE3UTRAPhu4xWGPHtY8D8hC', '$2y$10$g4QY7SNLz1RkCiFFjubAt.8zpnqT3gq6x7BqqUF7slvUYKlWVXRyO', '', NULL, '2017-10-03 06:30:20', '2017-10-03 06:30:20', 1, NULL),
(23, NULL, NULL, 'test@tesddter22.comaa', '965071944433', 3, 0, 0, '$2y$10$x.dLT35YfIHC3LLmfvEk5egITmy9f.BqVMIstvDMju2TmvnMj/GAG', '$2y$10$Csd09R.WuTgS5ZuRvFSh8uB7evI6.xpZH4h4zqU1S3i.csDEEKFf.', '', NULL, '2017-10-03 06:32:15', '2017-10-03 06:32:15', 1, NULL),
(24, NULL, NULL, 'test@tester22.comssss', '9650719444eeee', 3, 0, 0, '$2y$10$ncw0h/vNnOvrqrqEgrV.weKxC06ZpG/6iMNt7H.cLdFSozDb8k/GC', '$2y$10$NBazzQeIua85/wu0Mti/2.i/17s40WFWGJoMsL604jecdsIB77aQO', '', NULL, '2017-10-03 06:33:10', '2017-10-03 06:33:10', 1, NULL),
(25, NULL, NULL, 'test@tester22.comaaa', '9650719444333', 3, 0, 0, '$2y$10$JbrUuNWz3R5PkS.BADzKHeoCfGpeIWkhEcQmbzbMStMi0fPGz9S5i', '$2y$10$4w68fUHLRC7eY0s2TKWQA./s0FEXiLxG/QgHgUa8G5b3wPiIecH9.', '', NULL, '2017-10-03 06:36:59', '2017-10-03 06:36:59', 1, NULL),
(26, NULL, NULL, 'test@tester22.comaaa', '9650719444ddd', 3, 0, 0, '$2y$10$sN1c3U0Yylzsf.fomHW.Q.kqiHlD894Gy30judp6kFccpVa77L8Dq', '$2y$10$N/H7uh4yd61tnhAZ.WhvPep4KLRh1zHUOqyU50glswnggpBHn69Fu', '', NULL, '2017-10-03 06:40:56', '2017-10-03 06:40:56', 1, NULL),
(27, NULL, NULL, 'test@tester22.comss', 'sss', 3, 0, 0, '$2y$10$r.4yRtUxTDRMCOXU6ZG6oeHW7/O4xCLyT0.GWyeBKrhFK4i10tiAO', '$2y$10$wV5Isr4nhp4tA1ObAGTl0O3fan3J6HR8keadFyEKzXGFNJOGnzkP6', '', NULL, '2017-10-03 06:48:59', '2017-10-03 06:48:59', 1, NULL),
(28, NULL, NULL, 'test@tester22.comsss', '9650719444ss', 3, 0, 0, '$2y$10$TWFn5M1EUBrv7lRihxkOoOATdwI6QmNC/a/6/9ly5z8H6lxrQ2vq2', '$2y$10$6tFGkzoVTWnTtZloZL5cGOxO4LtYs5dD8eXD9SeHXXyvLNFliIW.G', '', NULL, '2017-10-03 06:53:51', '2017-10-03 06:53:51', 1, NULL),
(29, NULL, NULL, 'test@tester22.comdd', '9650719444dd', 3, 0, 0, '$2y$10$aYlo1RaKdy8aNwswUFmOSOXAeYNyoxbCDzj2skaiikoQoHOD.Fhm2', '$2y$10$gPkKm54S3N.S9kUcigfYceAYPIoSpzRCnR1Vm/6tc0VP6rmfKc5/O', '', NULL, '2017-10-03 06:54:38', '2017-10-03 06:54:38', 1, NULL),
(30, NULL, NULL, 'test@tester22.coma', '9650719444ss', 3, 0, 0, '$2y$10$sctS7VWbAushOFn5JMG4DuP9yPZJxbBypOnyQyH9oZdNHmOjGb4x6', '$2y$10$LJv2pKnVa9RAWMc/jAQkfOp8oP885Y6FJt1GsQ7vRIddPsa1Ck.pK', '', NULL, '2017-10-03 06:57:44', '2017-10-03 06:57:44', 1, NULL),
(31, NULL, NULL, 'test@tester22.coma', 's', 3, 0, 0, '$2y$10$00qxDHMtJQHyI1ZkF4ynUuShZI9leSdLX7WN0jo/Itej7eJx.Yab6', '$2y$10$cyPR98xEjNZGrwDOkHTZp.And/DTYsHMyy0iHFicTNAxjFutQyjlq', '', NULL, '2017-10-03 07:02:28', '2017-10-03 07:02:28', 1, NULL),
(32, NULL, NULL, 'test@tester22.coma', '9650719444d', 3, 0, 0, '$2y$10$pD/WWJm3pAvF426/oWW7Oeo/Ys7XL2eUfDo5aj11NSyPx5FaJp5Hy', '$2y$10$JwcH4H3.bmCurLPTZdneNu4KEmq9xkhAgPQv76vtERqdnvx2N0442', '', NULL, '2017-10-03 07:04:35', '2017-10-03 07:04:35', 1, NULL),
(33, NULL, NULL, 'test@tester22.coms', '9650719444ss', 3, 0, 0, '$2y$10$oVWFsUNvmnF.jqcguhY.i.Weq/r/X0Va7hUU2gZDSld7LMBf5PFD6', '$2y$10$sBLD3.fYkAFUq0fAmFmgrOfWX7rFaxazX7UM91gPobQdiYAQ4s0T2', '', NULL, '2017-10-03 07:10:12', '2017-10-03 07:10:12', 1, NULL),
(34, NULL, NULL, 'admin@hosssspo.coma', '999989999933aa', 3, 0, 0, '$2y$10$K96071usfvJWxWfbTzXQc.DXmffsd26vu0DSz06DcA5hvHzlkvqUS', '$2y$10$XqeWahOUYo1ofio4uSDEI.U.6SQ6fUrxpf35Gu3QvJ4hRaAFVOgvC', '', NULL, '2017-10-03 07:22:50', '2017-10-03 07:22:50', 1, NULL),
(35, NULL, NULL, 'admin@hosssspo.comaa', '999989999933a', 3, 0, 0, '$2y$10$qh9WAt.hTwN6zYJjOJykTelXjEvUGUSUoVrHHLEFEcK0jCL2VPFkq', '$2y$10$0vEvNsWo49Ekd3yWJhPoROS0dHMksQC4hongN.2yHpK0ah0LPKROW', '', NULL, '2017-10-03 07:33:57', '2017-10-03 07:33:57', 1, NULL),
(36, NULL, NULL, 'admin@hosssspo.coma', 'ddd', 3, 0, 0, '$2y$10$FqTtnVlcBcpR6ndth6J8me.d/82xveujOBscWdpywKpBLH2aXKN.a', '$2y$10$HRUTgnOVjbFJ7IMqebp8OOu6lqSnZ3x/w8VTtmd/GlCXeDk4brVMe', '', NULL, '2017-10-03 07:37:10', '2017-10-03 07:37:10', 1, NULL),
(37, NULL, NULL, 'admin@hosssspo.coma', 's', 3, 0, 0, '$2y$10$3kH.d5jlLXDoNKnyiYswSOaLazdMYnDSApk0CfrLldR1IfehTJzAe', '$2y$10$IxDdzKzyx88DYpRMt0nyBe2q7Cb1HmV4s192UDFXol4fwnT9.8koO', '', NULL, '2017-10-03 07:39:38', '2017-10-03 07:39:38', 1, NULL),
(39, NULL, NULL, 'admin@hosssspo.coma', 'sdf', 3, 0, 0, '$2y$10$OvE.fa1Cj1cd4LC2ytWhm.PQR7D7U6QKNYz87i.U/rQYUmTC7aOnC', '$2y$10$ZAvETqhH1dRkFqT.ZXXob.YGcdOZj10szBwlMWBtsaUV4yyMsQkW.', '', NULL, '2017-10-03 07:42:30', '2017-10-03 07:42:30', 1, NULL),
(41, NULL, NULL, 'test@tester22dd.com', '96507194143', 3, 0, 1, '$2y$10$HeWDS/q8MnUS3I9tJO38KurZLv52gsByKdfUirmvQhvFySxE//.De', '$2y$10$QQHBpbrgz4ehVi/D3C7Fi.Yx4BG4vCpFISbWRanJmhnxi.ccGUYdC', '', NULL, '2017-10-03 07:55:56', '2017-10-03 08:01:34', 1, NULL),
(42, NULL, NULL, 'ddddddddsssssssssddddd@hosssspo.com', '9933333933', 3, 0, 1, '$2y$10$mzGUHQhOmgLnZyY.C71Xx.0c5K7PhDwioxsvZdcyBDAZD4f03mjtu', '$2y$10$YvmSHhjl01y7MEZ0rgqfruoGxR4IZkwCQOp2TaLgjZ.AphUVyFRpO', '', NULL, '2017-10-03 07:58:24', '2017-10-03 08:01:12', 1, NULL),
(43, NULL, NULL, 'raks@demo.com', '9650719416', 3, 0, 0, '$2y$10$8KK/lqaF7vlm53cCR2Pj5.0B1nPw6VvpDpEYZyCituRN1AMzAVvmW', '$2y$10$Cqpen2JvQG3qRMxF3Yj8D.6arkBYS160Q.rkY3db.JgAT0a6241eu', '', NULL, '2017-10-03 09:49:20', '2017-10-03 09:49:20', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_login_attempts`
--

CREATE TABLE `users_login_attempts` (
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
(1, 1507045483);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `about` longtext,
  `current_status` enum('Employed','Unemployed','Studying') DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `prmo_code` varchar(255) DEFAULT NULL,
  `currently_looking_for_work` tinyint(1) NOT NULL DEFAULT '0',
  `part_or_full` enum('Part','Full') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `profile`, `about`, `current_status`, `location`, `prmo_code`, `currently_looking_for_work`, `part_or_full`, `created_at`, `updated_at`) VALUES
(7, 13, 'fsdf', 'sdf', '6de74c1e24bbb95fba84ade4eba87627.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'location1', '', 0, 'Part', '2017-09-15 09:50:33', '2017-09-20 13:57:46'),
(8, 14, 'a', 'a', '6ee5700d6628b599c76193cc699f10b8.png', 'hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello ', 'Employed', 'fafa', NULL, 1, 'Full', '2017-09-20 12:20:09', '2017-09-20 12:20:09'),
(9, 15, 'RAEKSH', 'FAFA', '41c695325fd18e1968d24ffc87366c76.png', 'Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?Any spcial skills?', 'Unemployed', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:26:55', '2017-09-20 12:26:55'),
(10, 16, 'aa', 'aa', '85ddcf54fe364b510de02f753d172df0.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:37:46', '2017-09-20 12:37:46'),
(11, 17, 'aa', 'aa', '2562546632ef873cc58fd0bdb37db06d.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:47:28', '2017-09-20 12:47:28'),
(12, 18, 'aa', 'aa', 'f07c455868db3cadb57a38cfd237f2de.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:50:09', '2017-09-20 12:50:09'),
(13, 19, 'aa', 'aa', 'dfd03bd124a8de9fe491811d65677fe4.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:56:08', '2017-09-20 12:56:08'),
(14, 20, 'aa', 'aa', '8180e97024c244de7842fa0e556b9af7.png', 'employeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployeremployer', 'Studying', 'mumbai', NULL, 1, 'Part', '2017-09-20 12:58:43', '2017-09-20 12:58:43'),
(15, 21, 'hello', 'hello', 'd948e9415c31de1c3b4339b9df9ef11d.jpg', 'SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55', 'Employed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 06:23:45', '2017-10-03 06:23:45'),
(16, 22, 'hello', 'hello', '5012eb6cc0500e969303afb3883a655c.jpg', 'SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55SimplyRaka$55', 'Employed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 06:30:20', '2017-10-03 06:30:20'),
(17, 23, 'test', 'afa', '9c8124b5f5f06077cef99118af5108b4.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:32:15', '2017-10-03 06:32:15'),
(18, 24, 'test', 'afa', 'ca8773a82e04e93e885e09b8025257c7.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:33:10', '2017-10-03 06:33:10'),
(19, 25, 'test', 'afa', '479566e3bac34fc64733f7b69c056044.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:36:59', '2017-10-03 06:36:59'),
(20, 26, 'test', 'afa', '4e48b21f80da6f701b98374c4a12478c.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:40:56', '2017-10-03 06:40:56'),
(21, 27, 'test', 'afa', '0451f334b5be914374e0e979a9bec705.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:48:59', '2017-10-03 06:48:59'),
(22, 28, 'test', 'afa', 'd3d3ab0dc0d43bf8ed29a4728c6cf9fe.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:53:51', '2017-10-03 06:53:51'),
(23, 29, 'test', 'afa', 'efc42a0602c01ecc417796bad3ceaa8c.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:54:38', '2017-10-03 06:54:38'),
(24, 30, 'test', 'afa', 'c259c28b8a356a66c96498fb0dd740d5.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 06:57:44', '2017-10-03 06:57:44'),
(25, 31, 'test', 'afa', 'd32070c7d94868f563961c3b90254aba.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 07:02:28', '2017-10-03 07:02:28'),
(26, 32, 'test', 'afa', '109169f8a1b12ae4813897a3e18e1426.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 07:04:35', '2017-10-03 07:04:35'),
(27, 33, 'test', 'afa', '33213c20a2dfdea4ac441a6e74fa4b4d.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 07:10:12', '2017-10-03 07:10:12'),
(28, 34, 'newemp1', 'test', '0cdfe9db9ab4596e670df2405e07683d.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:22:50', '2017-10-03 07:22:50'),
(29, 35, 'newemp1', 'test', '13796b37b37b45466f4ca1ac273f6351.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:33:57', '2017-10-03 07:33:57'),
(30, 36, 'newemp1', 'test', '485bdc087d83fc55fc2e9c9e28a0c2c6.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:37:10', '2017-10-03 07:37:10'),
(31, 37, 'newemp1', 'test', 'c820528996ec5d567b668e52ee6f1e7d.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:39:38', '2017-10-03 07:39:38'),
(32, 38, 'newemp1', 'test', '1895a93eeefb2e2d2489b1c98da10b5c.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:40:18', '2017-10-03 07:40:18'),
(33, 39, 'newemp1', 'test', '2bb8a77c3d1ae9f15aac4a8b1785f2a8.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', NULL, 1, 'Part', '2017-10-03 07:42:30', '2017-10-03 07:42:30'),
(34, 41, 'test', 'test', '18592d16dc6c254f8956831d4b8d5d00.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', '', 1, 'Part', '2017-10-03 07:55:56', '2017-10-03 08:01:34'),
(35, 42, 'test', 'test', '3f76617da59ef669e578639097b98295.jpg', 'SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5SimplyR@5', 'Unemployed', 'New Delhi', '', 0, 'Part', '2017-10-03 07:58:24', '2017-10-03 09:43:59'),
(36, 43, 'Rakesh', 'bisht', '2e8447e5fc27a67fff1c6ba1bf87ded9.jpg', 'this is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo desccthis is my demo descc', 'Employed', 'New Delhi', NULL, 1, 'Full', '2017-10-03 09:49:20', '2017-10-03 09:49:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_categories`
--
ALTER TABLE `employee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_license_transport`
--
ALTER TABLE `employee_license_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_transport`
--
ALTER TABLE `license_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlisted`
--
ALTER TABLE `shortlisted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_categories`
--
ALTER TABLE `employee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `employee_license_transport`
--
ALTER TABLE `employee_license_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `license_transport`
--
ALTER TABLE `license_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shortlisted`
--
ALTER TABLE `shortlisted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
