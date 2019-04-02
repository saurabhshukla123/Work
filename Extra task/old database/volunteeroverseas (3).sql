-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2019 at 11:47 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunteeroverseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activites`
--

INSERT INTO `activites` (`id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Animal Welfare'),
(3, 'Childcare'),
(4, 'Disaster Relief'),
(5, 'Education'),
(6, 'Environment'),
(7, 'Health & Medicine'),
(8, 'Human Rights'),
(9, 'Orphans'),
(10, 'Wildlife');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `project_startdate` datetime DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `project_id`, `name`, `project_startdate`, `duration`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'sasdx', '2019-03-05 04:58:31', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-04 23:28:31', NULL),
(2, 1, 'sasdx', '2019-03-05 04:58:31', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-04 23:28:31', NULL),
(3, 1, 'sasdx', '2019-03-05 00:00:00', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-04 23:28:31', NULL),
(4, 1, 'sasdx', '2019-03-13 00:00:00', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:07:00', NULL),
(5, 1, 'saurabh', '2019-03-15 00:00:00', 4, 'shuklas865q@gmail.com', '+919429266091', '2019-03-05 00:07:55', NULL),
(6, 38, 'samsung', '2019-03-08 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:14:44', NULL),
(7, 38, 'samsung', '2019-03-08 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:15:08', NULL),
(8, 38, 'sasdx', '2019-03-20 00:00:00', 6, 'miral.italiya@internal.mail', '+919429266090', '2019-03-05 00:16:13', NULL),
(9, 38, 'asdasd', '2019-03-20 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:20:17', NULL),
(10, 38, 'asdasd', '2019-03-20 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:22:01', NULL),
(11, 38, 'asdasd', '2019-03-19 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:22:59', NULL),
(12, 38, 'asdasd', '2019-03-19 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:23:27', NULL),
(13, 38, 'asdasd', '2019-03-19 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:24:40', NULL),
(14, 38, 'asdasd', '2019-03-19 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:24:48', NULL),
(15, 38, 'asdasd', '2019-03-19 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:26:05', NULL),
(16, 38, 'asdasd', '2019-03-20 00:00:00', 6, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:28:39', NULL),
(17, 1, 'sdsdas', '2019-03-14 00:00:00', 4, 'shuklas865sds@gmail.com', '', '2019-03-05 00:33:16', NULL),
(18, 1, 'sasdx', '2019-03-15 00:00:00', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:35:00', NULL),
(19, 1, 'asdasd', '2019-03-18 00:00:00', 4, 'shuklas865@gmail.com', '', '2019-03-05 00:38:48', NULL),
(20, 1, 'sasdx', '2019-03-29 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:47:12', NULL),
(21, 1, 'sasdx', '2019-03-29 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:47:44', NULL),
(22, 1, 'sasdx', '2019-03-20 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:48:15', NULL),
(23, 1, 'sasdx', '2019-03-20 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:48:44', NULL),
(24, 1, 'sasdx', '2019-03-13 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:49:28', NULL),
(25, 1, 'sasdx', '2019-03-13 00:00:00', 4, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:49:50', NULL),
(26, 1, 'sasdx', '2019-03-13 00:00:00', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:50:37', NULL),
(27, 1, 'sasdx', '2019-03-13 00:00:00', 2, 'qw@gmail.com', '+919429266090', '2019-03-05 00:51:32', NULL),
(28, 1, 'sasdx', '2019-03-05 00:00:00', 2, 'miral.italiya@internal.mail', '+919429266090', '2019-03-05 00:52:40', NULL),
(29, 1, 'sasdx', '2019-03-05 00:00:00', 2, 'miral.italiya@internal.mail', '+919429266090', '2019-03-05 00:55:17', NULL),
(30, 1, 'asdasd', '2019-03-22 00:00:00', 2, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 00:59:39', NULL),
(31, 2, 'Resultana', '2019-03-13 00:00:00', 3, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 01:01:34', NULL),
(32, 11, 'new ', '2019-03-09 00:00:00', 5, 'shuklas865@gmail.com', '+919429266090', '2019-03-05 03:17:40', NULL),
(33, 1, 'prajesh', '2019-03-26 00:00:00', 4, 'prajesh.gohel@internal.mail', '', '2019-03-12 23:30:35', NULL),
(34, 1, 'prajesh2', '2019-03-20 00:00:00', 4, 'prajesh.gohel@internal.mail', '', '2019-03-12 23:31:06', NULL),
(35, 1, 'saurabh', '2019-03-30 00:00:00', 4, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 02:14:37', NULL),
(36, 1, 'saurabh', '2019-03-19 00:00:00', 4, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 02:15:56', NULL),
(37, 1, 'Shulka', '2019-03-05 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 02:55:22', NULL),
(38, 1, 'Shukla Saurabh', '2019-03-27 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 02:59:00', NULL),
(39, 1, 'Shukla Saurabh', '2019-03-11 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 03:06:45', NULL),
(40, 1, 'Saurabh', '2019-03-30 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 03:10:08', NULL),
(41, 1, 'Miral', '2019-03-08 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 03:11:32', NULL),
(42, 1, 'Saurabh', '2019-03-21 00:00:00', 4, 'miral.italiya@internal.mail', '+919429266090', '2019-03-13 03:14:46', NULL),
(43, 1, 'Miral', '2019-03-19 00:00:00', 4, 'miral.italiya@internal.mail', '', '2019-03-13 03:15:49', NULL),
(44, 1, 'Miral', '2019-03-13 00:00:00', 2, 'miral.italiya@internal.mail', '+919898729120', '2019-03-13 03:16:56', NULL),
(45, 1, 'Miral', '2019-03-05 00:00:00', 2, 'miral.italiya@internal.mail', '+919898729120', '2019-03-13 03:28:29', NULL),
(46, 1, 'Miral', '2019-03-05 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919898729120', '2019-03-13 03:41:44', NULL),
(47, 1, 'Miral', '2019-03-05 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919898729120', '2019-03-13 03:42:40', NULL),
(48, 11, 'Miral', '2019-03-04 00:00:00', 5, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 03:47:30', NULL),
(49, 11, 'Saurabh', '2019-03-11 00:00:00', 5, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-13 03:50:49', NULL),
(50, 115, 'SAURABH', '2019-03-13 00:00:00', 2, 'saurabh.shukla@internal.mail', '', '2019-03-27 06:58:03', NULL),
(51, 115, 'Saurabh', '2019-03-12 00:00:00', 2, 'saurabh.shukla@internal.mail', '', '2019-03-27 06:58:33', NULL),
(52, 115, 'Saurabh', '2019-03-13 00:00:00', 3, 'saurabh.shukla@internal.mail', '', '2019-03-27 07:01:41', NULL),
(53, 115, 'Saurabh', '2019-03-13 00:00:00', 3, 'saurabh.shukla@internal.mail', '', '2019-03-27 07:01:41', NULL),
(54, 115, 'Miral', '2019-03-06 00:00:00', 3, 'saurabh.shukla@internal.mail', '', '2019-03-27 07:04:59', NULL),
(55, 117, 'Saurabh', '2019-03-18 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-28 06:11:42', NULL),
(56, 117, 'Saurabh', '2019-03-19 00:00:00', 4, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-28 06:16:01', NULL),
(57, 117, 'Saurabh', '2019-03-20 00:00:00', 6, 'saurabh.shukla@internal.mail', '', '2019-03-28 23:51:57', NULL),
(58, 119, 'Saurabh', '2019-03-09 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-29 01:58:30', NULL),
(59, 120, 'Mahesh', '2019-03-04 00:00:00', 3, 'saurabh.shukla@internal.mail', '+919429266090', '2019-03-29 06:40:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Volunteer Abroad'),
(2, 'Teach Abroad'),
(3, 'Intern Abroad');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `country_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(0, 'Nakuru', 3),
(1, 'Ahmedabad', 2),
(2, 'Vadodara', 1),
(3, 'Hyderabad', 1),
(4, 'Hubali', 1),
(5, 'Kotdwara', 1),
(6, 'Cairo', 2),
(7, 'Kinshasa', 2),
(8, 'Luanda', 2),
(9, 'Nairobi', 3),
(11, 'Mombasa', 3),
(12, 'Pattaya', 4),
(13, 'Bangkok', 4),
(14, 'Ranong', 4),
(15, 'Durban', 5),
(16, 'Mahikeng', 5),
(17, 'Knysna', 5),
(18, 'Santa Cruz', 6),
(19, 'La Paz', 6),
(20, 'Montero', 6),
(21, 'Ashgabat', 7),
(22, 'Mary', 7),
(23, 'Abadan', 7),
(24, 'hello', 1),
(25, 'hello', 1),
(26, 'hello', 1),
(27, 'hello', 1),
(28, 'hello', 1),
(29, 'hello', 1),
(30, 'hello', 1),
(31, 'hello', 1),
(32, 'hello', 1),
(35, 'Surat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`) VALUES
(1, 'india', '1553503359banner3.jpg'),
(2, 'Africa', '1553573764banner2.jpg'),
(3, 'Kenya', 'banner-img.jpg'),
(5, 'South Africa', 'thumb15.jpg'),
(6, 'Bolivia', 'thumb16.jpg'),
(7, 'Turkmenistan', 'thumb17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `sequence_number` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `sequence_number`) VALUES
(31, 'ppLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida massa vel mauris rhoncus, id efficitur purus fringilla. Nulla feugiat libero orci, nec tincidunt turpis fermentum at', 'updated', 6),
(32, 'sdsdikhrt', 'ssssjkgj', 3),
(33, 'Hello test', 'answertest   ', 6),
(34, 'nbgvnh', 'FAq ', 2),
(42, 'How do I find my Windows product key?', 'Windows 8.1 and Windows 10\r\n\r\nThe product key is located inside the product packaging, on the receipt or confirmation page for a digital purchase or in a confirmation e-mail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.\r\n\r\nWindows 7\r\n\r\nThe product key is located inside the box that the Windows DVD came in, on the DVD, on the receipt or confirmation page for a digital purchase or in a confirmation e-mail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.', 1),
(43, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', 5);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text,
  `video` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `name`, `logo`, `email`, `description`, `video`, `website`, `contact_name`, `created_at`, `updated_at`) VALUES
(1, 8, 'Volunteer Forever1', '1552367725banner4.jpg', 'qss1sss@gmail.com', 'sasa', '1552388834banner3.jpg', 'https://www.Vestibulum.com', 'Testing', '2019-01-29 08:10:42', '2019-04-01 23:51:26'),
(2, 2, 'Medical', '1553849168banner-img.jpg', 'qss1@gmail.com', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio', '1552389627video.mp4', 'https://www.Vestibulum.com', 'hfghfgh', '2019-01-29 08:10:42', '2019-03-29 03:16:08'),
(3, 2, 'Volunteer Medical', '1554110898banner5.jpg', 'qss1kk@gmail.com', 'Hellsdd', '1552389544video.mp4', 'https://www.Vestibulum.com', 'cdscdsdsfdgds', '2019-01-29 08:10:42', '2019-04-01 03:58:27'),
(4, 6, 'Camps', '1550215467banner3.jpg', 'qss3@gmail.com', 'dscsddcds', '1550215449video.mp4', 'https://www.Vestibulum.com', 'cdscdsds', '2019-01-29 08:10:42', '2019-04-01 03:10:55'),
(5, 2, 'Medical Camps', '1553844710banner2.jpg', 'qss4@gmail.com', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versiodustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio', '1550210507video.mp4', 'https://www.Vestibulum.com ', 'Shukla Ji', '2019-01-29 08:10:42', '2019-03-29 02:02:10'),
(6, 2, 'Plan My Gap Year', '1553688743banner5.jpg', 'PlanMyGapYear@gmail.com', 'Donec quis nulla eu mauris molestie auctor. Praesent ultrices non augue id aliquet. Sed vestibulum risus nec vehicula aliquam. Pellentesque at diam ut metus rhoncus venenatis. Integer elementum eros arcu, id facilisis sem mattis a. Mauris ut tempus nulla. Donec ultrices tortor ac condimentum imperdiet.', 'video', '', 'Vestibulum a congue ', '2019-01-29 10:43:38', '2019-03-27 06:42:23'),
(7, 1, 'Pangea Educational Development', 'images/thumb06.jpg', 'pangea@gmail.com', 'Integer nisl eros, vehicula rutrum elementum at, viverra quis lorem. Aenean commodo, mi at mattis suscipit, orci massa bibendum sapien, eu vestibulum mauris sem eu sem. Nam facilisis, ipsum et lacinia porta, purus enim pulvinar metus, ut faucibus tortor tellus vitae mi.', 'video', 'www.mattis.com', 'mattis', '2019-01-29 10:45:31', NULL),
(8, 4, 'Gapforce', 'images/thumb07.jpg', 'Gapforce@gmail.com', ' mi nisl fringilla tortor, in rhoncus diam purus nec lectus. Donec arcu ante, imperdiet tincidunt massa non, congue ullamcorper nisl. Morbi placerat tellus posuere lorem luctus laoreet. Ut aliquet, felis et sagittis laoreet, lacus erat scelerisque mauris, a convallis sem libero eu massa', 'video', ' www.sagittislaoree.com', ' sagittis laoree', '2019-01-29 10:46:42', NULL),
(9, 2, 'orgnization2t', '1552389662banner2.jpg', 'org222@gmail.com', 'hello', '../uploadsvideo/1549878090video.mp4', 'https://www.xyz.com', '9429266090', '2019-02-04 18:30:00', '2019-03-12 05:51:12'),
(14, 2, 'org5', 'images/thumb09.jpg', 'org5@gmail.com', 'jsbcjhb df vbfv', '', 'https://www.Vestibulum.com ', 'org5', '2019-01-29 08:10:42', '2019-03-12 05:50:56'),
(15, 2, 'sdsds', 'images/thumb10.jpg', 'qss@gmail.com', 'fedfe', '', '', 'efe', '2019-01-29 08:10:42', NULL),
(16, 2, 'orgnization2', 'NULL', 'org2@gmail.com', 'hello', '../uploadsvideo/1549878064video.mp4', 'www.xyz.com', '9429266090', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(17, 2, 'asd', 'images/thumb12.jpg', 'org334@gmail.com', '', '', '', 'asdasd', '2019-01-29 08:10:42', NULL),
(23, 2, 'asd', 'images/thumb13.jpg', 'org3@gmail.com', '', '', '', 'asdasd', '2019-01-29 08:10:42', NULL),
(24, 2, 'wdew', 'NULL', 'qss6@gmail.com', 'dwqwd', '', 'sda', 'wqdqwd', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(25, 2, 'org56', 'images/thumb15.jpg', 'org51@gmail.com', 'dwqwdsadadsfsaf', '', '', 'aadxs', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(26, 2, 'dsfsdf', 'images/thumb16.jpg', 'org52@gmail.com', 'dwqwdsadadsfsaf', '', '', 'aadxs sasadsa', '2019-01-29 08:10:42', NULL),
(27, 2, 'dsfsdf', 'NULL', 'org53@gmail.com', 'dwqwdsadadsfsaf', '', 'https://www.Vestibulum.com ', 'aadxs sasadsa', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(33, 2, 'ewrwe1', '../uploadsimage/1550148341', 'qss7@gmail.com', 'dsfsdf', '../uploadsvideo/1550148341', '', '9429266090', '2019-01-29 08:10:42', '2019-02-14 07:15:41'),
(35, 2, 'ewrwe', 'images/thumb19.jpg', 'qss8@gmail.com', 'dsfsdf', '', '', '9429266090', '2019-01-29 08:10:42', NULL),
(36, 2, 'new org', 'images/thumb20.jpg', 'neworgg@gmail.com', 'dsfsdf', '', '', '9429266090', '2019-01-29 08:10:42', NULL),
(38, 6, 'sqs', 'images/thumb21.jpg', 'qss9@gmail.com', 'sddc', '', '', 'sdsad', '2019-01-29 08:10:42', NULL),
(39, 2, 'Org5', 'NULL', 'org54@gvczvmail.com', 'org', '', '', 'org_name5', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(40, 2, 'Org7', 'NULL', 'org7@gmail.com', 'sdsd', '', '', 'dssd', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(42, 7, 'organization812', '1553761406banner4.jpg', 'org7881@gmail.com', 'bvxbx', '1550210360video.mp4', 'https://www.Vestibulum.com ', 'org7', '2019-01-29 08:10:42', '2019-03-28 02:53:33'),
(44, 2, 'organization9', NULL, 'org81@gmail.com', '', '', 'sdsd', 'dwsds', '2019-01-29 08:10:42', NULL),
(45, 6, 'organization10', 'NULL', 'org18@gmail.com', '', '', '', 'dwsds', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(48, 2, 'organization18', '1554110876banner-img.jpg', 'org14@gmail.com', '', '', 'https://www.Vestibulum.com', 'org11', '2019-01-29 08:10:42', '2019-04-01 03:57:56'),
(49, 7, 'ORG2_15', '1550556841contact-banner.jpg', 'org141@gmail.com', 'sda', '1550208279video.mp4', 'https://www.Vestibulum.com ', 'asa', '2019-01-29 08:10:42', '2019-02-19 00:44:16'),
(50, 6, 'organization25', NULL, 'org241@gmail.com', 'sdaa', '', 'https://www.Vestibulum.com ', 'asas', '2019-01-29 08:10:42', NULL),
(51, 6, 'organization26', NULL, 'org89@gmail.com', 'DFSD', '', 'https://www.Vestibulum.com ', 'SDA', '2019-01-29 08:10:42', NULL),
(52, 2, 'organization317', 'NULL', 'org19@gmail.com', 'DFSD', '', 'https://www.Vestibulum.com ', 'SDA', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(53, 2, 'organization32', '', 'org131@gmail.com', 'axas', '', 'https://www.Vestibulum.com ', 'saxx', '2019-01-29 08:10:42', '2019-03-11 22:11:08'),
(54, 6, 'organization8', NULL, 'org1ssa9@gmail.com', 'asas', '', '', 'asas', '2019-01-29 08:10:42', NULL),
(55, 2, 'organization31fdsasx', 'NULL', 'org1dsfsadsa9@gmail.com', 'dsfdssadas', '', '', 'dfsfsad', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(57, 2, 'csadc', '../uploadsimage/', 'org1sdsasas9@gmail.com', 'dsds', '../uploadsvideo/', '', 'sdsds', '2019-01-29 08:10:42', NULL),
(58, 2, 'qsqasa', '../uploadsimage/gallery-thumb3.jpg', 'org1sasa9@gmail.com', 'asas', '../uploadsvideo/video.mp4', '', 'asas', '2019-01-29 08:10:42', NULL),
(59, 2, 'organization8dsd', '../uploadsimage/1549876764banner3.jpg', 'org1dsds9@gmail.com', 'sd', '../uploadsvideo/1549876764video.mp4', '', 'sdsd', '2019-01-29 08:10:42', NULL),
(61, 2, 'sxsxwed', '../uploadsimage/1549877118banner2.jpg', 'org19sdasd@gmail.com', 'sdsd', '../uploadsvideo/1549877118video.mp4', '', 'sdsd', '2019-01-29 08:10:42', NULL),
(62, 2, 'organization8G', '../uploadsimage/1549878278banner2.jpg', 'GForg19@gmail.com', 'DFG', '../uploadsvideo/1549878278video.mp4', 'FC', 'FDGD', '2019-01-29 08:10:42', NULL),
(63, 2, 'organization8', '1550229094banner4.jpg', 'org1sdsd9@gmail.com', 'sdsad', '../uploadsvideo/1549878564', '', 'aqsasd', '2019-01-29 08:10:42', '2019-02-15 05:41:34'),
(64, 6, 'TECHMax', '../uploadsimage/1550147966', 'orghnh1xx9@gmail.com', 'hvn', '../uploadsvideo/1550147966', 'https://www.Vestibulum.com ', 'vhnhv', '2019-01-29 08:10:42', '2019-02-15 01:28:58'),
(65, 7, 'organization31', '../uploadsimage/1550207276banner4.jpg', 'org1sd9@gmail.com', 'sdsd', '1550207276video.mp4', 'https://www.Vestibulum.com ', 'sdsd', '2019-02-14 23:34:53', '2019-02-15 01:27:18'),
(66, 2, 'asasasa', '1550225439banner4.jpg', 'qssasas1ssdsd@gmail.com', 'sdsd', '1550225439video.mp4', 'https://www.Vestibulum.com ', 'sdsd', '2019-02-15 04:40:39', NULL),
(67, 6, 'organization81', '1550230933', 'org1zxc9@gmail.com', 'hgh', '1550230933', '', 'gh', '2019-02-15 06:12:13', '2019-02-15 06:42:15'),
(68, 1, '3', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-18 10:57:22', NULL),
(69, 6, 'organization8', '1550741544banner3.jpg', 'org1943@gmail.com', 'dsvfds', '1550741544banner4.jpg', 'https://www.Vestibulum.com ', 'vsd', '2019-02-21 04:02:06', '2019-02-21 04:02:46'),
(71, 2, 'wdewdcdcd', '1550835093', 'orgdcd19@gmail.com', 'dcd', '1550835093', '', 'dcdc', '2019-02-22 06:01:33', NULL),
(72, 2, 'wdewdcdcdsds', '1550835120', 'sw@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida massa vel mauris rhoncus, id efficitur purus fringilla. Nulla feugiat libero orci, nec tincidunt turpis fermentum at. Vestibulum vel mollis neque. Sed aliquam massa massa, cursus pretium tortor tristique vel. Vivamus sed tincidunt mauris, sed mattis justo. Integer sed tellus sit amet ante gravida euismod. Praesent id lacus rutrum ante ultrices facilisis. Suspendisse efficitur varius feugiat. Donec facilisis enim odio, quis gravida quam viverra cursus. Curabitur orci nulla, interdum a vestibulum ut, tempor a nisl. Morbi pulvinar, mauris vel luctus cursus, nisl sapien gravida justo, eget semper augue libero eu justo.\r\n\r\nMauris convallis porta dictum. Phasellus ac egestas magna. Ut elementum tristique dolor at maximus. Etiam tempor tortor a mi consectetur hendrerit. Donec consequat nunc non elit tristique aliquam. Duis vitae elementum magna, sed porta quam. Nulla facilisi. Nunc eget nunc quam. Nulla laoreet vehicula urna, egestas imperdiet mauris ullamcorper a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut consequat est vel orci pulvinar malesuada.\r\n\r\nNullam feugiat ut ipsum a mollis. Etiam euismod quam turpis, non bibendum ipsum rhoncus eget. Praesent consectetur venenatis eleifend. Etiam tincidunt sed ante et vehicula. Curabitur sit amet felis elementum, egestas lorem non, vulputate tellus. Morbi nec risus aliquet sem vestibulum suscipit eu tincidunt nibh. Maecenas quis mauris quis ligula maximus dignissim tempor non lorem. In hac habitasse platea dictumst. Proin sodales molestie ex eu semper. Mauris efficitur varius lacus ac blandit. Maecenas eros metus, varius et turpis at, porttitor fermentum quam. Mauris vehicula, odio et commodo cursus, erat diam mollis purus, eget dictum ex nisi eu purus. Donec elit risus, tincidunt vitae egestas non, facilisis et diam. Proin quis mauris sit amet libero feugiat mattis.', '1550835120', '', 'dcdc', '2019-02-22 06:02:09', '2019-03-06 04:36:26'),
(73, 2, 'Testedxcx', '1551085729banner4.jpg', 'test@tsting.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida massa vel mauris rhoncus, id efficitur purus fringilla. Nulla feugiat libero orci, nec tincidunt turpis fermentum at. Vestibulum vel mollis neque. Sed aliquam massa massa, cursus pretium tortor tristique vel. Vivamus sed tincidunt mauris, sed mattis justo. Integer sed tellus sit amet ante gravida euismod. Praesent id lacus rutrum ante ultrices facilisis. Suspendisse efficitur varius feugiat. Donec facilisis enim odio, quis gravida quam viverra cursus. Curabitur orci nulla, interdum a vestibulum ut, tempor a nisl. Morbi pulvinar, mauris vel luctus cursus, nisl sapien gravida justo, eget semper augue libero eu justo.\r\n\r\nMauris convallis porta dictum. Phasellus ac egestas magna. Ut elementum tristique dolor at maximus. Etiam tempor tortor a mi consectetur hendrerit. Donec consequat nunc non elit tristique aliquam. Duis vitae elementum magna, sed porta quam. Nulla facilisi. Nunc eget nunc quam. Nulla laoreet vehicula urna, egestas imperdiet mauris ullamcorper a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut consequat est vel orci pulvinar malesuada.\r\n\r\nNullam feugiat ut ipsum a mollis. Etiam euismod quam turpis, non bibendum ipsum rhoncus eget. Praesent consectetur venenatis eleifend. Etiam tincidunt sed ante et vehicula. Curabitur sit amet felis elementum, egestas lorem non, vulputate tellus. Morbi nec risus aliquet sem vestibulum suscipit eu tincidunt nibh. Maecenas quis mauris quis ligula maximus dignissim tempor non lorem. In hac habitasse platea dictumst. Proin sodales molestie ex eu semper. Mauris efficitur varius lacus ac blandit. Maecenas eros metus, varius et turpis at, porttitor fermentum quam. Mauris vehicula, odio et commodo cursus, erat diam mollis purus, eget dictum ex nisi eu purus. Donec elit risus, tincidunt vitae egestas non, facilisis et diam. Proin quis mauris sit amet libero feugiat mattis.', '1551085729video.mp4', '', 'sdsddsfef', '2019-02-22 06:03:12', '2019-03-06 04:35:52'),
(75, 7, 'Hello', '1551071885banner3.jpg', 'org1tyhtyt9@gmail.com', '', '1551071885video.mp4', '', 'gfhfg', '2019-02-22 06:16:03', '2019-02-24 23:48:05'),
(77, 7, 'organization', '1551084642banner3.jpg', 'org19cc@gmail.com', 'xc', '1551084642video.mp4', 'https://www.Vestibulum.com ', 'sds', '2019-02-25 03:20:42', '2019-02-25 03:21:18'),
(78, 7, 'organization31', '1551089563', 'qssascxcas1@gmail.com', 'xcxc', '1551089563', '', 'hfghfgh', '2019-02-25 04:42:43', NULL),
(94, 7, 'organizationsa', '', 'org1qq9@gmail.com', 'qsqs', '', 'https://www.Vestibulum.com ', 'qsqs', '2019-03-11 23:17:15', '2019-03-11 23:19:16'),
(95, 6, 'organization8sc', '1552390228banner2.jpg', 'qssscd1@gmail.com', 'sds', '1552390203', 'https://www.Vestibulum.com ', 'sds', '2019-03-12 06:00:03', '2019-03-12 06:01:16'),
(99, 2, 'organization8', '1552455284', 'org1s9@gmail.com', 'sa', '1552455284', '', 'sasas', '2019-03-13 00:04:44', '2019-03-13 00:06:47'),
(100, 2, 'dsd', '1552457876banner2.jpg', 'qssasasdd1ds@gmail.com', 'sdsd', '1552457876video.mp4', 'https://www.Vestibulum.com ', 'sdsd', '2019-03-13 00:47:56', '2019-03-13 00:49:26'),
(102, 2, 'organization31', '1553851957banner3.jpg', 'org19i9909@gmail.com', '', '1553851957video.mp4', '', 'asdw', '2019-03-29 04:02:16', '2019-03-29 04:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) NOT NULL,
  `activity_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `min_age` tinyint(3) DEFAULT NULL,
  `max_age` tinyint(3) DEFAULT NULL,
  `overview_description` text,
  `accommodation_description` text,
  `impact_description` text,
  `project_video_url` varchar(255) DEFAULT NULL,
  `city_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `volunteer_house_address` varchar(255) DEFAULT NULL,
  `volunteer_house_description` varchar(255) DEFAULT NULL,
  `volunteer_work_address` varchar(255) DEFAULT NULL,
  `volunteer_work_description` varchar(255) DEFAULT NULL,
  `nearest_airport_address` varchar(255) DEFAULT NULL,
  `cost_description` varchar(255) DEFAULT NULL,
  `project_startdate_description` varchar(255) DEFAULT NULL,
  `is_affordable` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`),
  KEY `activity_id` (`activity_id`),
  KEY `category_id` (`category_id`),
  KEY `city_id` (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `organization_id`, `activity_id`, `category_id`, `title`, `image`, `min_age`, `max_age`, `overview_description`, `accommodation_description`, `impact_description`, `project_video_url`, `city_id`, `country_id`, `volunteer_house_address`, `volunteer_house_description`, `volunteer_work_address`, `volunteer_work_description`, `nearest_airport_address`, `cost_description`, `project_startdate_description`, `is_affordable`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Volunteer Overseas 111', 'thumb05.jpg', 16, 26, 'Description of overseas', 'Accomodation description', 'Impact description in volunteer overseas', '1550205224video.mp4', 2, 1, 'Oversease Address', 'vadodara', '', 'vadodara', 'surat', 'Cost Descption', 'Project started description', 'yes', 1, '2018-01-07 18:30:00', '2019-04-02 05:03:16'),
(2, 1, 1, 1, 'Result analysis', '1553754236banner2.jpg', 19, 30, '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1553754359video.mp4', 11, 3, 'tatvasoft sparsh', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ', 'Iscon India', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ', 'surat', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ', '   industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ', 'yes', 1, '2018-01-03 18:30:00', '2019-03-28 01:06:21'),
(5, 2, 2, 1, 'CRUD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-02 18:30:00', '2019-01-30 18:30:00'),
(6, 2, 5, 1, 'Talent Search', NULL, 20, 38, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2018-12-31 18:30:00', '2019-01-30 18:30:00'),
(8, 2, 3, 3, 'Data Integrity  ', 'thumb04.jpg', 20, 30, NULL, NULL, NULL, NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-31 18:30:00', '2019-01-01 18:30:00'),
(9, 2, 4, 2, 'Musical Conversion ', 'photo01.jpg', 18, 26, 'Software and Algorithms for problems in Radiation Therapy and Radio Surgery and Medical Applications\r\nBluetooth and J3ME Enabled Full Duplex Automation Based on Mobile\r\nDevelopment of an Application for Weekly Automatic College Timetable\r\nUsing Pythagoras and Trigonometry to. ', 'Software and Algorithms for problems in Radiation Therapy and Radio Surgery and Medical Applications\r\nBluetooth and J3ME Enabled Full Duplex Automation Based on Mobile\r\nDevelopment of an Application for Weekly Automatic College Timetable.\r\n', NULL, NULL, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-05 18:30:00', '2019-01-15 18:30:00'),
(10, 3, 9, 3, ' Bus Ticket Reservation ', 'thumb03.jpg', 20, 30, NULL, NULL, NULL, NULL, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2018-12-31 18:30:00', '2019-03-06 18:30:00'),
(11, 4, 6, 3, 'Fingerprint Verification', '1553756299contact-banner.jpg', 20, 30, '   ', '   ', '  ', '1553756299video.mp4', 6, 2, '', '  ', '', '  ', '', '  ', '  ', 'yes', 1, '2018-10-08 18:30:00', '2019-03-28 01:28:19'),
(12, 4, 6, 2, 'Mathematical ', 'thumb08.jpg', 15, 20, ' sxd', ' zx', NULL, NULL, 12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-17 18:30:00', '2019-02-15 03:02:52'),
(18, 1, 1, 1, 'PHP AUTO System', 'img', 20, 21, '    php', '    ', NULL, NULL, 17, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-31 18:30:00', '2019-11-07 18:30:00'),
(22, 6, 3, 1, 'DAtabase3', 'img', 12, 16, '     Database', '     Abroadf', NULL, '', 16, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-11-07 18:30:00'),
(23, 3, 4, 2, 'DATABASE41', 'img', 1, 123, '   was', '   sdsd', NULL, '', 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-02-15 05:21:00'),
(26, 6, 4, 3, 'intern abroad', 'imgpath', 0, 15, ' sxdas', ' asdc', NULL, '', 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(27, 48, 7, 1, 'new projectrs', 'imgpath', 10, 23, ' sds', ' sds', NULL, '', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(35, 2, 1, 2, 'Volunteer Overseas41', '1553756134banner2.jpg', 23, 33, '    wsda', '    sdas', NULL, '', 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-11 05:41:28', '2019-02-12 23:25:00'),
(38, 1, 1, 1, 'Samsung 1', 'banner4.jpg', 12, 111, ' t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', ' sda', ' t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', '', 1, 1, '', ' ', '', ' ', '', ' ', ' ', 'yes', 1, '2019-02-04 18:30:00', '2019-03-29 01:45:45'),
(39, 2, 1, 2, 'Project-1', 'img', 12, 122, '     zxZ', '     zxX', 'zXZX', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2019-02-05 18:30:00', '2019-02-14 07:11:26'),
(49, 9, 4, 2, 'Chinese Eye track proj', 'img', 1, 2, '     fdg', '     fgd', NULL, '', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-02-15 05:19:40'),
(50, 5, 2, 3, 'New proj', 'imgpath', 2, 44, ' erfd', ' dcd', NULL, '', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 03:50:59', NULL),
(51, 15, 5, 2, 'PHP AUTO Systemsxdsd', 'imgpath', 1, 7, ' dfgdf', ' dfdf', NULL, '', 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 03:52:35', NULL),
(52, 3, 1, 3, 'NEw Project', 'img', 1, 5, '     sds', '     dsds', NULL, '', 12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 05:12:14', '2019-02-15 05:18:44'),
(53, 14, 6, 1, 'Database31', 'imgpath', 1, 33, '              sdsdsd', '              sdsdsdsf', NULL, '', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 05:22:47', '2019-02-25 00:11:27'),
(54, 2, 2, 2, 'volumteer4', 'imgpath', 2, 3, '        xsx', '        sxs', NULL, NULL, 9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2019-02-18 10:39:29', '2019-03-08 04:05:15'),
(69, 4, 3, 2, 'sdsd', 'imgpath', 1, 3, '  sds', '  sd', '', '', 9, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-02-25 02:08:31', '2019-02-25 02:08:38'),
(71, 75, 5, 1, 'Volunteer', 'imgpath', 1, 12, '    sdd', '    sdsd', '', '', 9, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-02-25 03:42:58', '2019-03-25 22:05:18'),
(72, 4, 2, 1, 'Tech', 'imgpath', 1, 2, '    khbhj', '    kk\'l', '', '', 15, 5, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-02-28 21:52:46', '2019-03-11 01:49:55'),
(77, 3, 3, 1, 'asas', 'imgpath', 1, 2, ' sds', ' ddsd', '', '', 14, 4, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 00:55:04', '2019-03-12 01:35:45'),
(78, 2, 2, 1, 'Application', '1553756134banner2.jpg', 23, 32, ' sdsd', ' sds', '', '', 9, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 01:35:45', '2019-03-12 01:43:03'),
(79, 2, 3, 1, 'Mvc Project', '', 1, 3, ' ewew', ' ewe', '', '', 13, 4, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 01:36:37', NULL),
(80, 3, 3, 1, 'Volunteer Testing Mvc', '', 32, 33, ' sds', ' dsdsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 01:41:05', NULL),
(84, 2, 2, 2, 'School Management 1', '1553756134banner2.jpg', 21, 24, '    sdsdsd', '    sdsd', '', '', 20, 6, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 01:48:40', '2019-03-12 05:49:27'),
(86, 6, 2, 2, 'Intern Abroads', '1553756134banner2.jpg', 21, 23, '        sdsd', '        sds', '', '', 9, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-12 01:50:10', '2019-03-25 22:01:48'),
(92, 8, 3, 1, 'volumteer4', '', 1, 2, ' dsdsds', ' dsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:36:37', NULL),
(93, 8, 3, 1, 'volumteer4', '', 1, 2, ' dsdsds', ' dsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:37:43', NULL),
(94, 8, 3, 1, 'volumteer4', '', 1, 2, ' dsdsds', ' dsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:38:20', NULL),
(95, 8, 3, 1, 'volumteer4', '', 1, 2, ' dsdsds', ' dsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:40:36', NULL),
(96, 8, 3, 1, 'volumteer4', '', 1, 2, ' dsdsds', ' dsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:41:03', NULL),
(97, 5, 1, 3, 'Volunteer for Sea Turtles', '1553756134banner2.jpg', 22, 23, '                                    \r\nTravel on a sea turtle conservation project in beautiful Costa Rica! Support local biologists and researchers performing important conservation work at turtle nesting grounds on either the Pacific or Caribbean coasts. A few of your tasks can include taking part in nightly beach patrols, tagging turtles, relocating nests into hatcheries, counting eggs and turtles, and much more. You also will be able to take part in a community outreach program.\r\n\r\nYou must be at least 17 years old to sign up. This program is best for travelers who are flexible and willing to take on different tasks depending on the season and project needs, as well as those who are physically fit and ready to live and work in a remote area. You do not need to know Spanish to apply.', '                                    Volunteers have the option of living in a homestay with a local family. Homestays are typically middle class households. All homestays are equipped with electricity, hot water, and wifi. You may share a room with another volunteer of the same gender. Volunteers of different programs are sometimes accommodated in the same homestay.\r\n\r\nFamilies provide breakfast and dinner 7 days per week, and it is during these meal times when volunteers and families get to learn about one another. Lots of laughs are shared and cultural exchange is fostered.\r\n\r\nOther accommodation options include dorms, hotels, and private apartments. Meals are not included with these options', '', '', 11, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:48:47', '2019-03-26 04:32:21'),
(98, 65, 3, 2, 'Volunteer to Teach', '', 21, 33, ' world. Located close to one of Kathmandu\'s largest slum areas, near Bhaktapur, this volunteer program is based in a severely under resourced school that provides free education, text books, uniforms and shoes to more than 150 children who live in poverty within the confines of the slum, and whose parents would otherwise not have been able to send their children to school at all. Volunteers are desperately needed to work alongside local teachers (many of whom are also volunteers) to assist in teaching vital subjects that include English, mathematics, science, history, geography. Volunteer teachers have a huge impact on the studentâ€™s English language skills. An ability to speak English is hugely beneficial to youth, allowing them to pursue further education opportunities and to seek employment where English is an advantage, such as the tourism sector, which is a major market for Nepal. Volunteer teachers help many low income children learn a tool that is vital to their future success. Volunteering on this project will truly make a difference to the lives of children facing a bleak future.\r\n\r\n', ' world. Located close to one of Kathmandu\'s largest slum areas, near Bhaktapur, this volunteer program is based in a severely under resourced school that provides free education, text books, uniforms and shoes to more than 150 children who live in poverty within the confines of the slum, and whose parents would otherwise not have been able to send their children to school at all. Volunteers are desperately needed to work alongside local teachers (many of whom are also volunteers) to assist in teaching vital subjects that include English, mathematics, science, history, geography. Volunteer teachers have a huge impact on the studentâ€™s English language skills. An ability to speak English is hugely beneficial to youth, allowing them to pursue further education opportunities and to seek employment where English is an advantage, such as the tourism sector, which is a major market for Nepal. Volunteer teachers help many low income children learn a tool that is vital to their future success. Volunteering on this project will truly make a difference to the lives of children facing a bleak future.\r\n\r\n', '', '', 15, 5, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 03:58:43', NULL),
(99, 5, 2, 1, 'ssds', '', 1, 23, ' sds', ' dsd', '', '', 11, 3, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 05:51:04', NULL),
(100, 5, 5, 3, 'Intern Project', '', 23, 25, ' sa', ' ddsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 05:56:32', NULL),
(101, 5, 5, 2, 'Education Project', '', 21, 22, ' sa', ' ddsd', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 06:00:07', NULL),
(102, 5, 3, 2, 'Tech Abroad Project', '', 16, 23, ' asxxxc', ' sadcdc', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 06:14:12', NULL),
(103, 3, 1, 2, 'volumteer412', 'imgpath', 12, 32, '    sdsd', '    sds', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-26 06:27:57', '2019-03-26 23:11:50'),
(104, 3, 4, 2, 'Volunteer Animal', '1553756134banner2.jpg', 21, 25, '  \r\nThe Costa Rica Animal Rescue Center is dedicated to protect and help endangered Costa Rican wildlife indigenous to our beautiful country. First and foremost, our goal is to ensure the welfare of injured animals and help them recover from their physical and psychological wounds.\r\n\r\nWe staff a team of experienced veterinarians who work at our on-site hospital in addition to the thousands of volunteers from around the world who have helped us over the past 10+ years.\r\n\r\nWe rescue, rehabilitate and ultimately release the animals back to their natural habitat. We are a non-profit and receive no government help financially. The passion of the owners, dedication of our staff and generosity of our volunteers and donors makes everything possible.\r\n\r\nWe don\'t believe we can solve all of the world\'s problems but we do believe the work we do makes the world just a little bit better. We hope you feel the same way and if you do please click the links above and join our team as a donor, intern or volunteer. We lo', '           Your arrival airport in Costa Rica will be Juan SantamarÃ­a International Airport (SJO).\r\n\r\nOur in-country staff will be there to greet you at the airport. Theyâ€™ll be holding a Volunteer Now Costa Rica sign so you can spot them easily.\r\n\r\nFrom the airport, our staff will arrange your transport to your accommodation. If youâ€™re joining a project in Alajuela, a staff member will accompany you by taxi and make sure youâ€™re comfortable and settled in when they drop you with your host place. This drive should take around 20 minutes, depending on traffic.\r\n\r\nOn your first full working day in Costa Rica, youâ€™ll have your country induction. Your Projects Volunteer Now Costa Rica Coordinator will pick you up from you host family to show you around the surrounding areas. Your first stop will be the ProjectsVolunteer Now Costa Rica office. Here, youâ€™ll get to learn more about the different projects we run in Costa Rica.\r\n\r\nA staff member will also walk you through your project handbook. Youâ€™ll receive an induction pack containing important information that you can refer to throughout your trip. This includes things like a map of the town with important places highlighted and Projects Abroad staff contact information.\r\n\r\nYour coordinator will then show you around. Youâ€™ll visit important landmarks and amenities, like internet cafes, the post office, and exchange bureaus.', ' ', '1553756134video.mp4', 18, 6, '', ' ', '', ' ', '', ' ', ' ', 'yes', 1, '2019-03-26 22:57:32', '2019-03-28 01:25:34'),
(105, 8, 3, 1, 'Volunteer to Teach 1', '', 16, 21, ' \r\nUpon your arrival in Kathmandu you will be collected at the airport and delivered to your accommodation. Here you will receive an orientation to help you settle in, find out about your volunteering placement, the local surroundings and meet your fellow volunteers. A representative from the local team will fill you in on local and regional customs, traveling, rules and recommendations, and of course, what to expect from your volunteering experience. This is a great opportunity to get to know your hosts and ask any last questions you may have.\r\n\r\nProgram Arrival Day: Saturday\r\n\r\nProgram Departure Day: Saturday', ' \r\nUpon your arrival in Kathmandu you will be collected at the airport and delivered to your accommodation. Here you will receive an orientation to help you settle in, find out about your volunteering placement, the local surroundings and meet your fellow volunteers. A representative from the local team will fill you in on local and regional customs, traveling, rules and recommendations, and of course, what to expect from your volunteering experience. This is a great opportunity to get to know your hosts and ask any last questions you may have.\r\n\r\nProgram Arrival Day: Saturday\r\n\r\nProgram Departure Day: Saturday', '', '', 17, 5, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-27 00:53:57', NULL),
(106, 7, 2, 2, 'Teach Local', '', 1, 23, ' Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most vulnerable sections of society. Volunteer with a grass-roots charity established for over 30 years, which runs educational programs around Quetzaltenango and San Juan Ostuncalco. Many families in these communities live in poverty and cannot afford the costs of education. Children are forced to drop out of school to support their parents or enter early marriage, with indigenous girls among the most disadvantaged group. The next generation are left with low literacy rates and limited future opportunities, thereby continuing the cycle of poverty. Volunteers are desperately needed to work alongside a local charity which has a close understanding of community needs. Placements are tailored to your interests and skills, and where you can make the most difference. You could be teaching social and language skills to young children aged 0-5 years old. Alternatively you could be setting up maths clubs or sports activities for teenagers. There are also opportunities to help with educational activities for adults, including nutrition workshops for young mothers and pregnant women. Help to change a country\'s future by investing in the education of its people. 25 x pre-departure online Spanish lessons are included so that you can make the most out of your time abroad. Spanish lessons are given by an experienced tutor from our school and taken before you leave for Guatemala. Connect in an online classroom where you can see and speak to your tutor. Learn from any location convenient for you with flexible scheduling option', ' Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most vulnerable sections of society. Volunteer with a grass-roots charity established for over 30 years, which runs educational programs around Quetzaltenango and San Juan Ostuncalco. Many families in these communities live in poverty and cannot afford the costs of education. Children are forced to drop out of school to support their parents or enter early marriage, with indigenous girls among the most disadvantaged group. The next generation are left with low literacy rates and limited future opportunities, thereby continuing the cycle of poverty. Volunteers are desperately needed to work alongside a local charity which has a close understanding of community needs. Placements are tailored to your interests and skills, and where you can make the most difference. You could be teaching social and language skills to young children aged 0-5 years old. Alternatively you could be setting up maths clubs or sports activities for teenagers. There are also opportunities to help with educational activities for adults, including nutrition workshops for young mothers and pregnant women. Help to change a country\'s future by investing in the education of its people. 25 x pre-departure online Spanish lessons are included so that you can make the most out of your time abroad. Spanish lessons are given by an experienced tutor from our school and taken before you leave for Guatemala. Connect in an online classroom where you can see and speak to your tutor. Learn from any location convenient for you with flexible scheduling option', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-27 00:57:59', NULL),
(107, 5, 5, 1, 'Spanish Lessons 1', '1553756134banner2.jpg', 21, 30, '                 \r\nUpon arrival in Guatemala, volunteers will need to make their way to the city of Quetzaltenango. Airport transfers can be organised (not included in placement price, however it can organised for you at cost price with no added fees.) We will hold a welcome orientation day in Quetzaltenango where we will help you settle into your accommodation. Our friendly team will show you around your neighbourhood and give you advice on day to-day living. The next day we will introduce you to the charity and the team-members you will be working with', '                 \r\nUpon arrival in Guatemala, volunteers will need to make their way to the city of Quetzaltenango. Airport transfers can be organised (not included in placement price, however it can organised for you at cost price with no added fees.) We will hold a welcome orientation day in Quetzaltenango where we will help you settle into your accommodation. Our friendly team will show you around your neighbourhood and give you advice on day to-day living. The next day we will introduce you to the charity and the team-members you will be working with', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-27 01:00:18', '2019-03-27 01:36:51'),
(108, 2, 2, 1, 'Project Thailand Medical', 'imgpath', 12, 13, '      xzxz', '      xzx', '', '', 1, 1, '', '', NULL, NULL, '', '', '', 'yes', 1, '2019-03-27 01:38:19', '2019-03-27 03:11:27'),
(109, 2, 2, 3, 'asas', '1553681974banner4 - Copy.jpg', 12, 22, ' sdsd', ' sdsd', ' cvc', '1553681974video.mp4', 1, 1, 'asas', ' dfd', NULL, NULL, 'asas', ' cv', ' cv', 'no', 0, '2019-03-27 04:49:34', NULL),
(110, 4, 5, 1, 'zdswds', '1553683292banner3 - Copy - Copy.jpg', 1, 33, 'Overview Description', 'Accomodation Description', 'Impact Description', '1553683292video.mp4', 1, 1, 'Volunteer House Address', 'Volunteer House Description', 'Volunteer Work Address', 'Volunteer Work Description', 'Nearest Airport', ' Cost Description', '\r\nStartDate Description', 'yes', 0, '2019-03-27 05:11:23', NULL),
(111, 4, 5, 1, 'Projexr', '1553683565banner3 - Copy - Copy.jpg', 21, 32, 'Overview Description', 'Accomodation Description', 'Impact Description', '1553683565video.mp4', 1, 1, 'Volunteer House Address', 'Volunteer House Description', 'Volunteer Work Address', 'Volunteer Work Description', 'Nearest Airport', ' Cost Description', '\r\nStartDate Description', 'yes', 0, '2019-03-27 05:16:03', NULL),
(112, 5, 3, 2, 'asasassdsaf', '1553687578banner4 - Copy - Copy.jpg', 12, 22, '          dsdssdsd', '          dsdsdssdsd', '          dsdsdsds', '1553687578video.mp4', 9, 3, 'sasaasas', '          dsdssdsds', 'saaasasvbvbvbght', '          dsddsdsds', 'sasasasas', '          sdsddsdsd', '          sdssdsd', 'yes', 1, '2019-03-27 05:19:12', '2019-03-27 06:25:08'),
(113, 65, 3, 2, 'Tech project', '1553684366banner5.jpg', 21, 23, '             \r\nOverview Descriptionssdsdsdsds', '             \r\nAccomodation Description', '             Impact Description', '1553684366video.mp4', 18, 6, 'azsas', '           Volunteer House Descriptionsdsds', ' Volunteer Work Address', '             \r\nVolunteer Work Description', 'Nearest Airport', 'cost', '             \r\nStartDate Description', 'yes', 1, '2019-03-27 05:29:26', '2019-03-29 00:58:17'),
(114, 6, 4, 2, 'teCH Abroad project', '1553688402photo07.jpg', 12, 22, '      DSDSDS', '      SDSD', '      SDSDSDDSDSD', '1553688402video.mp4', 1, 1, 'ASAS', '      SDSD', 'ASAS', '      SDSD', 'ASASA', '      SD', '      SDSD', 'yes', 1, '2019-03-27 05:32:58', '2019-03-27 21:48:05'),
(115, 6, 4, 2, 'teCH fOREEVER 23', '1553689280banner5.jpg', 12, 22, '    Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most vulnerable sections of society. Volunteer with a grass-roots charity established for over 30 years, which runs educational programs around Quetzaltenango and San Juan Ostuncalco. Many families in these communities live in poverty and cannot afford the costs of education. Children are forced to drop out of school to support their parents or enter early marriage, with indigenous girls among the most disadvantaged group. The next generation are left with low literacy rates and limited future opportunities, thereby continuing the cycle of poverty. Volunteers are desperately needed to work alongside a local charity which has a close understanding of community needs. Placements are tailored to your interests and skills, and where you can make the most difference. You could be teaching social and language skills to young children aged 0-5 years old. Alternatively you could be setting up maths clubs or sports activities for teenagers. There are also opportunities to help with educational activities for adults, including nutrition workshops for young mothers and pregnant women. Help to change a country\'s future by investing in the education of its people. 25 x pre-departure online Spanish lessons are included so that you can make the most out of your time abroad. Spanish lessons are given by an experienced tutor from our school and taken before you leave for Guatemala. Connect in an online classroom where you can see and speak to your tutor. Learn from any location convenient for you with flexible scheduling options.', '    Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most vulnerable sections of society. Volunteer with a grass-roots charity established for over 30 years, which runs educational programs around Quetzaltenango and San Juan Ostuncalco. Many families in these communities live in poverty and cannot afford the costs of education. Children are forced to drop out of school to support their parents or enter early marriage, with indigenous girls among the most disadvantaged group. The next generation are left with low literacy rates and limited future opportunities, thereby continuing the cycle of poverty. Volunteers are desperately needed to work alongside a local charity which has a close understanding of community needs. Placements are tailored to your interests and skills, and where you can make the most difference. You could be teaching social and language skills to young children aged 0-5 years old. Alternatively you could be setting up maths clubs or sports activities for teenagers. There are also opportunities to help with educational activities for adults, including nutrition workshops for young mothers and pregnant women. Help to change a country\'s future by investing in the education of its people. 25 x pre-departure online Spanish lessons are included so that you can make the most out of your time abroad. Spanish lessons are given by an experienced tutor from our school and taken before you leave for Guatemala. Connect in an online classroom where you can see and speak to your tutor. Learn from any location convenient for you with flexible scheduling options.', '   Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most vulnerable sections of society. Volunteer with a grass-roots charity established for over 30 years, which runs educational programs around Quetzaltenango and San Juan Ostuncalco. Many families in these communities live in poverty and cannot afford the costs of education. Children are forced to drop out of school to support their parents or enter early marriage, with indigenous girls among the most disadvantaged group. The next generation are left with low literacy rates and limited future opportunities, thereby continuing the cycle of poverty. Volunteers are desperately needed to work alongside a local charity which has a close understanding of community needs. Placements are tailored to your interests and skills, and where you can make the most difference. You could be teaching social and language skills to young children aged 0-5 years old. Alternatively you could be setting up maths clubs or sports activities for teenagers. There are also opportunities to help with educational activities for adults, including nutrition workshops for young mothers and pregnant women. Help to change a country\'s future by investing in the education of its people. 25 x pre-departure online Spanish lessons are included so that you can make the most out of your time abroad. Spanish lessons are given by an experienced tutor from our school and taken before you leave for Guatemala. Connect in an online classroom where you can see and speak to your tutor. Learn from any location convenient for you with flexible scheduling options.', '1553688639video.mp4', 8, 2, 'ASAS', '  Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the mos', 'ASAS', '  Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the mos', 'ASASA', '  Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the most ', '  Set in the highlands of western Guatemala, this unique volunteering project will immerse you in local life whilst helping some of the mos', 'yes', 1, '2019-03-27 06:40:39', '2019-03-28 03:16:55'),
(116, 4, 2, 3, 'volumteer Management', '', 1, 2, '', '', '', '', 2, 1, '', '', '', '', '', '', '', 'yes', 1, '2019-03-27 07:27:40', '2019-04-01 23:26:29'),
(117, 6, 3, 1, 'Telecom', '1553773169banner-img.jpg', 23, 28, '                          INTRO\r\n\r\nHi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and guides all at one single resource. So, weâ€™ve recently put together everything you need to create a good Project Brief. Now all in one place. Enjoy!', '                          INTRO\r\n\r\nHi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and guides all at one single resource. So, weâ€™ve recently put together everything you need to create a good Project Brief. Now all in one place. Enjoy!', '                          INTRO\r\n\r\nHi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and guides all at one single resource. So, weâ€™ve recently put together everything you need to create a good Project Brief. Now all in one place. Enjoy!', '1553773169video.mp4', 7, 2, 'Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', '                          Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', 'Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', '                          Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', 'Daman', '                         Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', '                          Hi! Weâ€™ve created this toolkit to help you with the process of creating a project brief. We know how hard it is to find templates, examples and ', 'yes', 1, '2019-03-28 06:09:29', '2019-03-28 23:56:08'),
(118, 5, 1, 2, 'volumteer4', '1553841428banner3.jpg', 1, 22, 'zxzx', 'xz', 'zxzx', '1553841428video.mp4', 2, 1, 'zxzx', 'zx', 'zxz', 'zxz', 'xzx', 'zxz', 'xzx', 'yes', 0, '2019-03-29 01:07:08', '2019-04-01 23:11:02'),
(119, 5, 4, 1, 'Tech Mahindra', '1553844177banner2.jpg', 23, 32, 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio', '1553844177video.mp4', 16, 5, 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electro', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electr', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electro', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electr', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electro', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electr', 'dustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electr', 'yes', 1, '2019-03-29 01:52:57', '2019-04-01 04:01:08'),
(120, 49, 4, 1, 'Disaster Project', '1553861345banner2.jpg', 18, 23, 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the lik', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the lik', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the lik', '1553861345video.mp4', 16, 5, 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as thei', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as thei', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as thei', 'using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as thei', 'yes', 1, '2019-03-29 06:39:05', '2019-04-01 23:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `project_carousel_images`
--

DROP TABLE IF EXISTS `project_carousel_images`;
CREATE TABLE IF NOT EXISTS `project_carousel_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_carousel_images`
--

INSERT INTO `project_carousel_images` (`id`, `project_id`, `image`) VALUES
(1, 1, 'thumb05.jpg'),
(2, 1, 'thumb05.jpg'),
(3, 1, 'thumb06.jpg'),
(4, 1, 'thumb07.jpg'),
(9, 98, 'banner-img.jpg'),
(10, 98, 'contact-banner.jpg'),
(11, 98, 'faq-banner.jpg'),
(12, 98, 'banner5.jpg'),
(26, 97, 'banner5.jpg'),
(27, 97, 'banner3 - Copy.jpg'),
(28, 1, 'banner4 - Copy.jpg'),
(29, 1, 'banner4.jpg'),
(30, 1, 'banner5.jpg'),
(31, 1, 'banner2 - Copy.jpg'),
(32, 1, 'banner3 - Copy (2) - Copy.jpg'),
(33, 1, 'banner3 - Copy (2).jpg'),
(34, 1, 'banner3 - Copy.jpg'),
(35, 99, 'banner3 - Copy - Copy.jpg'),
(36, 99, 'banner3 - Copy (2) - Copy.jpg'),
(37, 99, 'banner3 - Copy.jpg'),
(38, 99, 'banner4 - Copy (2).jpg'),
(39, 99, 'banner4 - Copy.jpg'),
(40, 99, 'banner4.jpg'),
(41, 100, 'banner3 - Copy - Copy (2).jpg'),
(42, 100, 'banner3 - Copy - Copy.jpg'),
(43, 100, 'banner3 - Copy (2).jpg'),
(44, 100, 'banner3 - Copy.jpg'),
(45, 100, 'banner4 - Copy (2).jpg'),
(46, 100, 'banner4 - Copy.jpg'),
(47, 100, 'banner4.jpg'),
(48, 100, 'banner5.jpg'),
(49, 101, 'banner3 - Copy (2).jpg'),
(50, 101, 'banner3 - Copy.jpg'),
(51, 101, 'banner4 - Copy.jpg'),
(52, 101, 'banner4.jpg'),
(53, 101, 'banner5.jpg'),
(54, 102, 'banner-img.jpg'),
(55, 102, 'banner2 - Copy.jpg'),
(56, 102, 'banner3 - Copy (2).jpg'),
(57, 102, 'banner5.jpg'),
(58, 103, 'banner3 - Copy (2).jpg'),
(59, 103, 'banner3 - Copy.jpg'),
(60, 103, 'banner4 - Copy (2).jpg'),
(61, 103, 'banner4 - Copy.jpg'),
(62, 103, 'banner4.jpg'),
(63, 103, 'banner5.jpg'),
(64, 103, 'banner3 - Copy - Copy.jpg'),
(65, 103, 'banner3 - Copy (2) - Copy.jpg'),
(97, 104, 'banner2 - Copy.jpg'),
(98, 104, 'banner5.jpg'),
(99, 104, 'banner-img.jpg'),
(100, 105, 'faq-banner.jpg'),
(101, 105, 'banner2 - Copy.jpg'),
(102, 105, 'banner3.jpg'),
(103, 105, 'banner5.jpg'),
(104, 105, 'banner-img.jpg'),
(105, 106, 'banner2 - Copy.jpg'),
(106, 106, 'banner3 - Copy.jpg'),
(107, 106, 'banner4 - Copy - Copy.jpg'),
(108, 106, 'banner5.jpg'),
(109, 106, 'banner-img.jpg'),
(118, 107, 'banner2 - Copy.jpg'),
(119, 107, 'banner3 - Copy.jpg'),
(120, 107, 'banner5.jpg'),
(124, 108, 'banner3 - Copy.jpg'),
(125, 108, 'banner5.jpg'),
(126, 1, 'banner4.jpg'),
(127, 1, 'banner5.jpg'),
(128, 1, 'banner2 - Copy.jpg'),
(129, 1, 'banner3 - Copy (2).jpg'),
(130, 1, 'banner3 - Copy.jpg'),
(131, 1, 'banner2 - Copy.jpg'),
(132, 1, 'banner3 - Copy (2).jpg'),
(133, 1, 'banner3 - Copy.jpg'),
(134, 1, 'banner4.jpg'),
(135, 1, 'banner5.jpg'),
(136, 110, 'banner2 - Copy.jpg'),
(137, 110, 'banner3 - Copy (2).jpg'),
(138, 110, 'banner3 - Copy.jpg'),
(139, 110, 'banner4.jpg'),
(140, 110, 'banner5.jpg'),
(141, 111, 'banner2 - Copy.jpg'),
(142, 111, 'banner3 - Copy.jpg'),
(143, 111, 'banner4 - Copy - Copy.jpg'),
(144, 111, 'banner4 - Copy (2).jpg'),
(145, 111, 'banner4.jpg'),
(146, 111, 'banner5.jpg'),
(147, 112, 'banner2 - Copy.jpg'),
(148, 112, 'banner3 - Copy (2).jpg'),
(149, 112, 'banner3 - Copy.jpg'),
(150, 112, 'banner5.jpg'),
(151, 1, 'banner2 - Copy.jpg'),
(152, 1, 'banner3 - Copy (2).jpg'),
(153, 1, 'banner3 - Copy.jpg'),
(154, 1, 'banner4.jpg'),
(155, 1, 'banner2 - Copy.jpg'),
(156, 1, 'banner3 - Copy (2).jpg'),
(157, 1, 'banner3 - Copy.jpg'),
(158, 1, 'banner4.jpg'),
(159, 113, 'banner2 - Copy.jpg'),
(160, 113, 'banner3 - Copy (2).jpg'),
(161, 113, 'banner3 - Copy.jpg'),
(162, 113, 'banner4.jpg'),
(163, 114, 'banner2 - Copy.jpg'),
(164, 114, 'banner3 - Copy - Copy.jpg'),
(165, 114, 'banner3 - Copy (2) - Copy.jpg'),
(166, 114, 'banner3 - Copy.jpg'),
(167, 114, 'banner5.jpg'),
(168, 115, 'banner2 - Copy.jpg'),
(169, 115, 'banner3 - Copy (2) - Copy.jpg'),
(170, 115, 'banner3 - Copy (2).jpg'),
(171, 115, 'banner3 - Copy.jpg'),
(172, 115, 'banner5.jpg'),
(173, 116, 'banner3 - Copy.jpg'),
(174, 116, 'banner4.jpg'),
(175, 116, 'banner5.jpg'),
(176, 2, 'banner4.jpg'),
(177, 2, 'banner5.jpg'),
(178, 2, 'banner-img.jpg'),
(179, 2, 'banner2.jpg'),
(180, 2, 'banner3.jpg'),
(181, 11, 'banner2.jpg'),
(182, 11, 'banner-img.jpg'),
(183, 11, 'contact-banner.jpg'),
(184, 11, 'faq-banner.jpg'),
(185, 117, 'banner2.jpg'),
(186, 117, 'banner4.jpg'),
(187, 117, 'banner5.jpg'),
(188, 117, 'banner-img.jpg'),
(189, 117, 'contact-banner.jpg'),
(190, 119, 'banner2.jpg'),
(191, 119, 'banner3.jpg'),
(192, 119, 'banner4.jpg'),
(193, 119, 'banner5.jpg'),
(194, 119, 'banner-img.jpg'),
(195, 120, 'banner2.jpg'),
(196, 120, 'banner3.jpg'),
(197, 120, 'banner4.jpg'),
(198, 120, 'banner5.jpg'),
(199, 120, 'banner-img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_costs`
--

DROP TABLE IF EXISTS `project_costs`;
CREATE TABLE IF NOT EXISTS `project_costs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `number_of_weeks` int(10) DEFAULT NULL,
  `cost` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `number_of_weeks`, `cost`) VALUES
(3, 5, 1, 500.00),
(4, 5, 6, 299.00),
(6, 12, 5, 8000.00),
(8, 9, 4, 6000.00),
(9, 54, 5, 60000.00),
(10, 58, 5, 60000.00),
(11, 59, 5, 60000.00),
(12, 53, 5, 9000.55),
(13, 65, 6, 5000.00),
(14, 47, 6, 3200.00),
(15, 71, 6, 3520.00),
(16, 39, 5, 11100.00),
(19, 3, 2, 5000.00),
(61, 105, 1, 500.00),
(62, 105, 2, 600.00),
(63, 105, 3, 800.00),
(96, 107, 3, 6000.00),
(97, 107, 5, 10000.00),
(108, 108, 1, 800.00),
(109, 108, 7, 90000.00),
(110, 108, 5, 900.00),
(111, 1, 1, 200.00),
(112, 1, 2, 500.00),
(113, 1, 3, 900.00),
(114, 1, 1, 800.00),
(115, 1, 2, 600.00),
(116, 110, 1, 800.00),
(117, 111, 1, 800.00),
(118, 111, 2, 988.00),
(121, 1, 1, 822.00),
(122, 1, 2, 6000.00),
(123, 1, 1, 822.00),
(124, 1, 2, 3333.00),
(170, 112, 1, 500.00),
(171, 112, 2, 800.00),
(172, 112, 3, 343.00),
(173, 112, 4, 60000.00),
(174, 112, 6, 5455.00),
(215, 114, 2, 300.00),
(216, 114, 3, 800.00),
(226, 2, 1, 6000.00),
(227, 2, 2, 70000.00),
(228, 2, 3, 8000.00),
(230, 104, 1, 230.00),
(231, 104, 2, 250.00),
(232, 104, 3, 320.00),
(233, 104, 5, 3200.00),
(234, 104, 6, 8000.00),
(236, 11, 5, 900.00),
(237, 11, 1, 600.00),
(238, 78, 2, 6000.00),
(239, 115, 2, 300.00),
(240, 115, 3, 800.00),
(313, 117, 1, 200.00),
(314, 117, 2, 600.00),
(315, 117, 3, 800.00),
(316, 117, 6, 3600.00),
(343, 113, 1, 222.00),
(344, 38, 6, 50000.00),
(357, 72, 1, 800.00),
(358, 98, 3, 3000.00),
(378, 119, 1, 500.00),
(379, 119, 2, 800.00),
(387, 116, 1, 800.00),
(388, 120, 1, 600.00),
(389, 120, 3, 900.00),
(390, 120, 4, 800.00),
(391, 120, 6, 895.00),
(392, 1, 2, 2000.00),
(393, 1, 3, 3000.00),
(394, 1, 4, 4500.00),
(395, 1, 5, 9000.00),
(396, 122, 1, 800.00),
(397, 122, 2, 9000.00),
(398, 122, 3, 90000.00),
(399, 122, 1, 200.00),
(400, 122, 2, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `project_include_checks`
--

DROP TABLE IF EXISTS `project_include_checks`;
CREATE TABLE IF NOT EXISTS `project_include_checks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `description` text,
  `is_included` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_include_checks`
--

INSERT INTO `project_include_checks` (`id`, `project_id`, `description`, `is_included`) VALUES
(5, 106, '', 'yes'),
(6, 106, '', 'yes'),
(42, 107, 'sasas', 'no'),
(43, 107, 'asasasasasas', 'no'),
(44, 107, 'asas', 'yes'),
(45, 107, 'asas', 'no'),
(58, 108, 'Lunch', 'no'),
(59, 108, 'Air tickets', 'yes'),
(60, 108, 'Breakfast', 'no'),
(61, 0, 'Air tickets', 'yes'),
(62, 0, 'Lunch', 'yes'),
(63, 0, 'Dinner', 'yes'),
(64, 0, 'Trip', 'yes'),
(65, 0, 'Donation to local organization', 'no'),
(66, 0, 'Housing', 'yes'),
(67, 0, 'asas', 'yes'),
(68, 0, 'asas', 'yes'),
(69, 0, 'ascdcvd', 'no'),
(70, 110, 'asas', 'yes'),
(71, 111, 'asas', 'yes'),
(72, 111, 'fgcv m', 'no'),
(76, 0, 'Lunch', 'yes'),
(77, 0, 'Dinner', 'yes'),
(78, 0, 'Lunch', 'yes'),
(79, 0, 'Lunch', 'yes'),
(123, 112, 'asasas', 'yes'),
(124, 112, 'sdsdsdsdfdfdsf', 'yes'),
(125, 112, 'asasas', 'no'),
(126, 112, 'asas', 'no'),
(181, 114, 'lUNCH ', 'yes'),
(182, 114, 'bREAKFAST', 'yes'),
(183, 114, 'hOUSING', 'no'),
(196, 2, 'Tea', 'yes'),
(197, 2, 'Lunch', 'yes'),
(198, 2, 'BreakFast', 'no'),
(199, 2, 'Dinner', 'yes'),
(204, 104, 'Lunch', 'yes'),
(206, 11, 'Lunch', 'yes'),
(207, 115, 'lUNCH ', 'yes'),
(208, 115, 'bREAKFAST', 'yes'),
(292, 117, 'Lunch', 'yes'),
(293, 117, 'Air tickets', 'no'),
(294, 117, 'ssxds', 'yes'),
(295, 117, 'Housing', 'yes'),
(305, 0, '', 'yes'),
(306, 0, '', 'yes'),
(348, 119, 'Air port', 'yes'),
(349, 119, 'Meal', 'yes'),
(350, 119, 'Lunch', 'no'),
(364, 116, 'Lunch', 'yes'),
(365, 116, 'Air', 'yes'),
(366, 116, 'Breakfast', 'yes'),
(367, 120, 'Lunch', 'yes'),
(368, 120, 'Air tickets', 'yes'),
(369, 120, 'Housing', 'no'),
(370, 120, 'Trip', 'no'),
(371, 1, 'INCludes', 'yes'),
(372, 1, 'Noy oincluded', 'no'),
(373, 1, 'no', 'no'),
(374, 1, 'Air tickets', 'yes'),
(375, 121, 'Lunch', 'yes'),
(376, 121, 'Flight', 'yes'),
(377, 122, 'Lunch', 'yes'),
(378, 122, 'Dinner', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `project_start_dates`
--

DROP TABLE IF EXISTS `project_start_dates`;
CREATE TABLE IF NOT EXISTS `project_start_dates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `start_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=811 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_start_dates`
--

INSERT INTO `project_start_dates` (`id`, `project_id`, `start_date`) VALUES
(3, 3, '2019-01-26'),
(4, 4, '2019-03-26'),
(5, 5, '2019-05-07'),
(6, 6, '2019-03-30'),
(9, 57, '2019-03-05'),
(10, 58, '2019-03-05'),
(19, 101, '2019-12-31'),
(20, 101, '2019-12-31'),
(21, 102, '2019-03-14'),
(22, 102, '2019-03-18'),
(23, 102, '2019-03-23'),
(24, 102, '2019-03-16'),
(25, 102, '2019-03-29'),
(26, 102, '2019-03-21'),
(27, 102, '2019-03-27'),
(50, 103, '2019-03-08'),
(51, 103, '2019-03-13'),
(52, 103, '2019-03-23'),
(53, 103, '2019-03-20'),
(54, 103, '2019-04-26'),
(55, 103, '2019-04-17'),
(103, 105, '2019-03-15'),
(104, 105, '2019-03-20'),
(105, 105, '2019-03-18'),
(106, 105, '2019-03-17'),
(107, 105, '2019-03-26'),
(108, 106, '1970-01-01'),
(237, 107, '2019-03-23'),
(238, 107, '2019-03-13'),
(239, 107, '2019-03-17'),
(240, 107, '2019-03-25'),
(241, 107, '2019-03-28'),
(242, 107, '2019-03-29'),
(243, 107, '2019-03-30'),
(244, 107, '2019-03-20'),
(287, 108, '2014-03-03'),
(288, 108, '2011-03-03'),
(289, 108, '2029-03-03'),
(290, 108, '2023-03-03'),
(291, 108, '2019-03-03'),
(292, 108, '2020-03-03'),
(293, 108, '1920-04-10'),
(294, 108, '1920-04-15'),
(295, 108, '1920-04-14'),
(296, 0, '2019-03-09'),
(297, 0, '2019-03-13'),
(298, 0, '2019-03-17'),
(299, 0, '2019-03-21'),
(300, 0, '2019-03-30'),
(301, 0, '2019-03-20'),
(302, 0, '2019-03-16'),
(303, 0, '2019-03-15'),
(304, 0, '2019-03-13'),
(305, 110, '1970-01-01'),
(306, 111, '2019-03-05'),
(307, 111, '2019-03-28'),
(308, 111, '2019-03-25'),
(309, 111, '2019-03-07'),
(314, 0, '2019-03-22'),
(315, 0, '2019-03-15'),
(316, 0, '2019-03-11'),
(317, 0, '2019-03-28'),
(318, 0, '2019-02-24'),
(319, 0, '2019-02-14'),
(320, 0, '2019-02-08'),
(321, 0, '2019-02-22'),
(374, 112, '2019-03-14'),
(375, 112, '2019-03-21'),
(376, 112, '2019-03-23'),
(377, 112, '2019-03-26'),
(537, 114, '2019-03-08'),
(538, 114, '2019-03-22'),
(539, 114, '2019-04-19'),
(540, 114, '2019-04-17'),
(541, 114, '2019-05-18'),
(542, 114, '2019-05-24'),
(543, 114, '2019-06-20'),
(544, 114, '2019-06-18'),
(545, 114, '2019-07-26'),
(546, 114, '2019-07-24'),
(562, 2, '2065-06-17'),
(563, 2, '2065-06-18'),
(564, 2, '2065-07-18'),
(565, 2, '2065-07-23'),
(566, 2, '2065-07-25'),
(577, 104, '2019-03-01'),
(578, 104, '2019-03-08'),
(579, 104, '2019-04-26'),
(580, 104, '2019-04-17'),
(581, 104, '2019-05-10'),
(582, 104, '2019-05-23'),
(585, 11, '2019-01-23'),
(586, 11, '2019-01-03'),
(587, 115, '2019-03-08'),
(588, 115, '2019-03-22'),
(589, 115, '2019-04-19'),
(590, 115, '2019-04-17'),
(591, 115, '2019-05-18'),
(592, 115, '2019-05-24'),
(593, 115, '2019-06-20'),
(594, 115, '2019-06-18'),
(595, 115, '2019-07-26'),
(596, 115, '2019-07-24'),
(642, 117, '1970-01-01'),
(689, 113, '1970-01-01'),
(690, 0, '1970-01-01'),
(691, 0, '1970-01-01'),
(694, 0, '1970-01-01'),
(695, 38, '1970-01-01'),
(751, 119, '2019-03-13'),
(752, 119, '2019-03-15'),
(753, 119, '2019-03-29'),
(754, 119, '2019-03-27'),
(755, 119, '2019-03-19'),
(760, 118, '1970-01-01'),
(773, 116, '1969-12-26'),
(774, 116, '1969-12-27'),
(775, 116, '1969-12-19'),
(776, 116, '1969-12-20'),
(777, 120, '2019-03-29'),
(778, 120, '2019-03-20'),
(779, 120, '2019-03-19'),
(780, 120, '2019-03-15'),
(781, 1, '2019-01-05'),
(782, 1, '2019-01-05'),
(783, 1, '2019-01-13'),
(784, 1, '2019-01-17'),
(785, 1, '2019-02-17'),
(786, 1, '2019-02-15'),
(787, 1, '2019-02-16'),
(788, 1, '2019-03-16'),
(789, 1, '2019-03-18'),
(790, 1, '2019-04-27'),
(791, 1, '2019-04-30'),
(792, 1, '2019-03-05'),
(793, 1, '2019-05-24'),
(794, 1, '2019-05-16'),
(795, 1, '2019-02-28'),
(796, 121, '2019-04-03'),
(797, 121, '2019-04-19'),
(798, 121, '2019-04-22'),
(799, 121, '2019-04-13'),
(800, 121, '2019-05-09'),
(801, 121, '2019-05-21'),
(802, 121, '2019-05-25'),
(803, 121, '2019-05-13'),
(804, 121, '2019-05-07'),
(805, 122, '2019-04-17'),
(806, 122, '2019-04-18'),
(807, 122, '2019-04-11'),
(808, 122, '2019-04-22'),
(809, 122, '2019-04-25'),
(810, 122, '2019-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `project_view_history`
--

DROP TABLE IF EXISTS `project_view_history`;
CREATE TABLE IF NOT EXISTS `project_view_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_view_history`
--

INSERT INTO `project_view_history` (`id`, `project_id`, `view_date`, `user_ip`) VALUES
(1, 1, '2019-03-28 18:30:00', '192.168.2.1'),
(2, 1, '2019-03-29 18:30:00', '192.168.2.2'),
(3, 1, '2019-03-03 18:30:00', '192.168.2.12'),
(4, 1, '2018-12-10 18:30:00', '192.168.2.121'),
(5, 1, '2019-03-01 18:30:00', '192.168.2.124'),
(6, 1, '2019-03-02 18:30:00', '192.168.2.128'),
(7, 1, '2019-03-16 18:30:00', '192.168.2.122'),
(8, 1, '2019-03-04 18:30:00', '192.168.2.127'),
(9, 1, '2019-03-29 18:30:00', '192.168.2.129'),
(10, 1, '2018-12-24 18:30:00', '192.168.2.17'),
(11, 1, '2019-03-25 18:30:00', '192.168.2.128'),
(12, 2, '2018-12-31 18:30:00', '192.168.2.128'),
(13, 11, '2019-01-30 18:30:00', '192.168.2.12'),
(14, 11, '2018-11-12 18:30:00', '192.168.2.124'),
(15, 11, '2018-12-30 18:30:00', '192.168.2.124'),
(16, 11, '2019-03-24 18:30:00', '192.168.2.12'),
(17, 11, '2019-03-03 18:30:00', '192.168.2.122'),
(18, 11, '2018-12-30 18:30:00', '192.168.2.1'),
(19, 11, '2019-03-28 18:30:00', '192.168.3.2'),
(20, 11, '2019-03-03 18:30:00', '192.168.2.12'),
(21, 11, '2019-03-09 18:30:00', '192.168.2.128'),
(22, 11, '2019-02-28 18:30:00', '192.168.2.1'),
(23, 11, '2019-03-05 18:30:00', '192.168.2.128'),
(24, 11, '2019-03-12 18:30:00', '192.168.2.128'),
(28, 8, '2019-01-10 18:30:00', '192.168.2.124'),
(29, 8, '2019-01-03 18:30:00', NULL),
(30, 8, '2019-01-03 18:30:00', '192.168.2.1'),
(31, 8, '2019-01-01 18:30:00', '192.168.2.122'),
(32, 10, '2019-02-05 18:30:00', '192.168.6.3'),
(33, 12, '2019-02-19 18:30:00', '192.168.3.2'),
(34, 38, '2019-02-05 18:30:00', NULL),
(35, 38, '2019-02-05 18:30:00', NULL),
(36, 38, '2019-02-20 18:30:00', NULL),
(37, 38, '2019-02-20 18:30:00', NULL),
(38, 38, '2019-02-12 18:30:00', NULL),
(39, 38, '2019-02-26 18:30:00', NULL),
(40, 38, '2019-02-05 18:30:00', NULL),
(41, 38, '2019-02-26 18:30:00', NULL),
(42, 38, '2019-02-05 18:30:00', NULL),
(43, 38, '2019-02-26 18:30:00', NULL),
(44, 38, '2019-02-05 18:30:00', NULL),
(45, 38, '2019-02-26 18:30:00', NULL),
(46, 38, '2019-02-05 18:30:00', NULL),
(47, 38, '2019-02-26 18:30:00', NULL),
(48, 38, '2019-02-05 18:30:00', NULL),
(49, 38, '2019-02-26 18:30:00', NULL),
(50, 38, '2019-02-05 18:30:00', NULL),
(51, 38, '2019-02-26 18:30:00', NULL),
(52, 38, '2019-02-05 18:30:00', NULL),
(53, 38, '2019-02-26 18:30:00', NULL),
(54, 38, '2019-02-05 18:30:00', NULL),
(55, 38, '2019-02-26 18:30:00', NULL),
(56, 38, '2019-02-05 18:30:00', NULL),
(57, 143, '2019-03-27 23:52:50', '::1'),
(58, 143, '2019-03-27 23:53:22', '::1'),
(59, 1, '2019-03-28 00:01:38', '::1'),
(60, 1, '2019-03-28 00:01:59', '::1'),
(61, 2, '2019-03-28 00:04:15', '::3'),
(62, 2, '2019-03-28 00:04:15', '::8'),
(63, 1, '2019-03-28 00:09:26', '::1'),
(64, 1, '2019-03-28 00:09:44', '::1'),
(65, 1, '2019-03-28 00:19:55', '::1'),
(66, 8, '2019-03-28 00:24:56', '::1'),
(67, 1, '2019-03-28 00:25:53', '::1'),
(68, 5, '2019-03-28 00:26:01', '::1'),
(69, 5, '2019-03-28 00:26:02', '::1'),
(70, 5, '2019-03-28 00:26:27', '::1'),
(71, 4, '2019-03-28 00:28:53', '::1'),
(72, 38, '2019-03-28 00:30:22', '::1'),
(73, 3, '2019-03-28 00:31:18', '::1'),
(74, 39, '2019-03-28 00:33:16', NULL),
(75, 39, '2019-03-28 00:39:08', '::3'),
(76, 39, '2019-03-28 00:39:39', '::1'),
(77, 2, '2019-03-28 00:46:57', '::9'),
(78, 2, '2019-03-28 00:49:36', '::1'),
(79, 117, '2019-03-28 01:08:05', '::1'),
(80, 118, '2019-03-28 01:08:12', '::1'),
(81, 114, '2019-03-28 01:08:17', '::1'),
(82, 11, '2019-03-28 01:26:15', '::1'),
(83, 12, '2019-03-28 01:29:48', '::1'),
(84, 113, '2019-03-29 00:08:13', '::1'),
(85, 119, '2019-03-29 01:54:23', '::1'),
(86, 105, '2019-03-29 04:27:19', '::1'),
(87, 9, '2019-03-29 04:27:42', '::1'),
(88, 121, '2019-03-29 06:39:53', '::1'),
(89, 121, '2019-04-02 05:16:26', '::1'),
(90, 120, '2019-04-02 06:10:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','organization') NOT NULL DEFAULT 'organization',
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 1, '2019-02-04 18:30:00', '2019-02-06 18:30:00'),
(2, 'organization@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-03 18:30:00', '2019-02-06 18:30:00'),
(5, 'xyz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 0, '2019-01-31 18:30:00', '2019-02-01 18:30:00'),
(6, 'org2@yy.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-01-31 18:30:00', NULL),
(7, 'organization2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-13 18:30:00', NULL),
(8, 'tatvasoft@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-03-29 07:06:25', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_carousel_images`
--
ALTER TABLE `project_carousel_images`
  ADD CONSTRAINT `project_carousel_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
