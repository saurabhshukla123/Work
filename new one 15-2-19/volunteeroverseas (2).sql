-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2019 at 11:04 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `phone` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(0, 'Nakuru', 3),
(1, 'Ahmedabad', 1),
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
(23, 'Abadan', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`) VALUES
(1, 'India', 'images/thumb10.jpg'),
(2, 'Africa', 'images/thumb11.jpg'),
(3, 'Kenya', 'images/thumb12.jpg'),
(4, 'Thailand', 'images/thumb13.jpg'),
(5, 'South Africa', 'images/thumb15.jpg'),
(6, 'Bolivia', 'images/thumb16.jpg'),
(7, 'Turkmenistan', 'images/thumb17.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `sequence_number`) VALUES
(17, 'Hello test', 'answertest11', 5),
(18, 'Hello test2w2', 'xzsxz', 4),
(19, 'Hello test2w2', 'sxdnbscn sadmnf', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `name`, `logo`, `email`, `description`, `video`, `website`, `contact_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Volunteer Forever 1445', '../uploadsimage/1550205224banner4.jpg', 'qssasas1@gmail.com', 'ghgh', '../uploadsvideo/1550205224video.mp4', 'https://www.Vestibulum.com ', 'hfghfgh', '2019-01-29 08:10:42', '2019-02-15 01:59:26'),
(2, 2, 'sds', '../uploadsimage/1550205621banner4.jpg', 'qss1@gmail.com', 'ghgh', '../uploadsvideo/1550205621video.mp4', '', 'hfghfgh', '2019-01-29 08:10:42', '2019-02-14 23:10:21'),
(3, 2, 'Volunteer Medical', '../uploadsimage/1550206244banner2.jpg', 'qss11@gmail.com', 'dscsddcds', '../uploadsvideo/1550206244video.mp4', '', 'cdscdsds', '2019-01-29 08:10:42', '2019-02-14 23:20:44'),
(4, 6, 'cdsdccdc', '1550215467banner3.jpg', 'qss3@gmail.com', 'dscsddcds', '1550215449video.mp4', 'https://www.Vestibulum.com ', 'cdscdsds', '2019-01-29 08:10:42', '2019-02-15 01:54:27'),
(5, 2, 'czxvcvdfs', '1550210485gallery-thumb3.jpg', 'qss4@gmail.com', 'dscsd', '1550210507video.mp4', '', 'cdscds', '2019-01-29 08:10:42', '2019-02-15 00:31:47'),
(6, 1, 'Plan My Gap Year', 'images/thumb06.jpg', 'PlanMyGapYear@gmail.com', 'Donec quis nulla eu mauris molestie auctor. Praesent ultrices non augue id aliquet. Sed vestibulum risus nec vehicula aliquam. Pellentesque at diam ut metus rhoncus venenatis. Integer elementum eros arcu, id facilisis sem mattis a. Mauris ut tempus nulla. Donec ultrices tortor ac condimentum imperdiet.', 'video', 'www.Vestibulum.com ', 'Vestibulum a congue ', '2019-01-29 10:43:38', NULL),
(7, 1, 'Pangea Educational Development', 'images/thumb06.jpg', 'pangea@gmail.com', 'Integer nisl eros, vehicula rutrum elementum at, viverra quis lorem. Aenean commodo, mi at mattis suscipit, orci massa bibendum sapien, eu vestibulum mauris sem eu sem. Nam facilisis, ipsum et lacinia porta, purus enim pulvinar metus, ut faucibus tortor tellus vitae mi.', 'video', 'www.mattis.com', 'mattis', '2019-01-29 10:45:31', NULL),
(8, 4, 'Gapforce', 'images/thumb07.jpg', 'Gapforce@gmail.com', ' mi nisl fringilla tortor, in rhoncus diam purus nec lectus. Donec arcu ante, imperdiet tincidunt massa non, congue ullamcorper nisl. Morbi placerat tellus posuere lorem luctus laoreet. Ut aliquet, felis et sagittis laoreet, lacus erat scelerisque mauris, a convallis sem libero eu massa', 'video', ' www.sagittislaoree.com', ' sagittis laoree', '2019-01-29 10:46:42', NULL),
(9, 2, 'orgnization2t', 'NULL', 'org222@gmail.com', 'hello', '../uploadsvideo/1549878090video.mp4', 'https://www.xyz.com', '9429266090', '2019-02-04 18:30:00', '2019-01-29 08:10:42'),
(14, 2, 'org5', 'images/thumb09.jpg', 'org5@gmail.com', 'jsbcjhb df vbfv', '', '', 'org5', '2019-01-29 08:10:42', NULL),
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
(42, 7, 'organization81', '1550210333banner2.jpg', 'org71@gmail.com', 'bvxbx', '1550210360video.mp4', 'https://www.Vestibulum.com ', 'org7', '2019-01-29 08:10:42', '2019-02-15 00:29:20'),
(44, 2, 'organization9', NULL, 'org81@gmail.com', '', '', 'sdsd', 'dwsds', '2019-01-29 08:10:42', NULL),
(45, 6, 'organization10', 'NULL', 'org18@gmail.com', '', '', '', 'dwsds', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(48, 2, 'organization18', 'NULL', 'org14@gmail.com', '', '', 'https://www.Vestibulum.com ', 'org11', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(49, 7, 'ORG2_15', '1550208279banner4.jpg', 'org141@gmail.com', 'sda', '1550208279video.mp4', 'https://www.Vestibulum.com ', 'asa', '2019-01-29 08:10:42', '2019-02-14 23:54:39'),
(50, 6, 'organization25', NULL, 'org241@gmail.com', 'sdaa', '', 'https://www.Vestibulum.com ', 'asas', '2019-01-29 08:10:42', NULL),
(51, 6, 'organization26', NULL, 'org89@gmail.com', 'DFSD', '', 'https://www.Vestibulum.com ', 'SDA', '2019-01-29 08:10:42', NULL),
(52, 2, 'organization317', 'NULL', 'org19@gmail.com', 'DFSD', '', 'https://www.Vestibulum.com ', 'SDA', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(53, 2, 'organization32', 'NULL', 'org151@gmail.com', 'axas', '', 'https://www.Vestibulum.com ', 'saxx', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(54, 6, 'organization8', NULL, 'org1ssa9@gmail.com', 'asas', '', '', 'asas', '2019-01-29 08:10:42', NULL),
(55, 2, 'organization31fdsasx', 'NULL', 'org1dsfsadsa9@gmail.com', 'dsfdssadas', '', '', 'dfsfsad', '2019-01-29 08:10:42', '2019-01-29 08:10:42'),
(57, 2, 'csadc', '../uploadsimage/', 'org1sdsasas9@gmail.com', 'dsds', '../uploadsvideo/', '', 'sdsds', '2019-01-29 08:10:42', NULL),
(58, 2, 'qsqasa', '../uploadsimage/gallery-thumb3.jpg', 'org1sasa9@gmail.com', 'asas', '../uploadsvideo/video.mp4', '', 'asas', '2019-01-29 08:10:42', NULL),
(59, 2, 'organization8dsd', '../uploadsimage/1549876764banner3.jpg', 'org1dsds9@gmail.com', 'sd', '../uploadsvideo/1549876764video.mp4', '', 'sdsd', '2019-01-29 08:10:42', NULL),
(61, 2, 'sxsxwed', '../uploadsimage/1549877118banner2.jpg', 'org19sdasd@gmail.com', 'sdsd', '../uploadsvideo/1549877118video.mp4', '', 'sdsd', '2019-01-29 08:10:42', NULL),
(62, 2, 'organization8G', '../uploadsimage/1549878278banner2.jpg', 'GForg19@gmail.com', 'DFG', '../uploadsvideo/1549878278video.mp4', 'FC', 'FDGD', '2019-01-29 08:10:42', NULL),
(63, 2, 'organization8asd', '../uploadsimage/1549878564', 'org1sdsd9@gmail.com', 'sdsad', '../uploadsvideo/1549878564', 'sda', 'aqsasd', '2019-01-29 08:10:42', NULL),
(64, 6, 'TECHMax', '../uploadsimage/1550147966', 'orghnh1xx9@gmail.com', 'hvn', '../uploadsvideo/1550147966', 'https://www.Vestibulum.com ', 'vhnhv', '2019-01-29 08:10:42', '2019-02-15 01:28:58'),
(65, 7, 'organization31', '../uploadsimage/1550207276banner4.jpg', 'org1sd9@gmail.com', 'sdsd', '1550207276video.mp4', 'https://www.Vestibulum.com ', 'sdsd', '2019-02-14 23:34:53', '2019-02-15 01:27:18'),
(66, 2, 'asasasa', '1550225439banner4.jpg', 'qssasas1ssdsd@gmail.com', 'sdsd', '1550225439video.mp4', 'https://www.Vestibulum.com ', 'sdsd', '2019-02-15 04:40:39', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `organization_id`, `activity_id`, `category_id`, `title`, `image`, `min_age`, `max_age`, `overview_description`, `accommodation_description`, `impact_description`, `project_video_url`, `city_id`, `country_id`, `volunteer_house_address`, `volunteer_house_description`, `volunteer_work_address`, `volunteer_work_description`, `nearest_airport_address`, `cost_description`, `project_startdate_description`, `is_affordable`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Volunteer Overseas 111', 'images/thumb05.jpg', 21, 26, '    Description of overseas', '    Accomodation description', 'Impact description in volunteer overseas', 'overseas.mp4', 1, 1, 'Oversease Address', 'vadodara', NULL, NULL, 'surat', 'Cost Descption', 'Project started description', 'yes', 1, '2018-01-07 18:30:00', '2019-02-15 02:46:49'),
(2, 1, 1, 1, 'Result analysis', 'images/thumb06.jpg', 19, 30, ' result analysis is best website for result display', ' Accomodation description for result analysis', 'Impact description on resultanalysis', 'resultanalysis.mp4', 11, 3, 'resultanalysis Address', 'someshwar society surat', NULL, NULL, 'surat', 'cost maximum', 'Project started on result analysis', 'yes', 1, '2018-01-03 18:30:00', '2019-02-15 04:10:50'),
(4, 1, 3, 3, 'project', 'images/thumb07.jpg', 20, 35, ' project is best website for project', ' Accomodation description for project', 'Impact description on project', 'project.mp4', 6, 2, 'project  Address', 'ahmedabad adalaj', NULL, NULL, 'ahmedabad', 'cost maximum', 'Project started on project', 'yes', 1, '2018-01-05 18:30:00', '2019-02-14 07:01:56'),
(5, 2, 2, 1, 'CRUD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-02 18:30:00', '2019-01-30 18:30:00'),
(6, 2, 5, 1, 'Talent Search', NULL, 20, 38, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2018-12-31 18:30:00', '2019-01-30 18:30:00'),
(7, 2, 8, 1, 'i found', NULL, 23, 30, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-12 18:30:00', '2019-01-27 18:30:00'),
(8, 2, 3, 3, 'Data Integrity  ', 'images/thumb04.jpg', 20, 30, NULL, NULL, NULL, NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-31 18:30:00', '2019-01-01 18:30:00'),
(9, 2, 4, 2, 'Musical Conversion ', 'images/photo01.jpg', 18, 26, 'Software and Algorithms for problems in Radiation Therapy and Radio Surgery and Medical Applications\r\nBluetooth and J3ME Enabled Full Duplex Automation Based on Mobile\r\nDevelopment of an Application for Weekly Automatic College Timetable\r\nUsing Pythagoras and Trigonometry to. ', 'Software and Algorithms for problems in Radiation Therapy and Radio Surgery and Medical Applications\r\nBluetooth and J3ME Enabled Full Duplex Automation Based on Mobile\r\nDevelopment of an Application for Weekly Automatic College Timetable.\r\n', NULL, NULL, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-05 18:30:00', '2019-01-15 18:30:00'),
(10, 3, 9, 3, ' Bus Ticket Reservation ', 'images/thumb03.jpg', 20, 30, NULL, NULL, NULL, NULL, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2018-12-31 18:30:00', '2019-03-06 18:30:00'),
(11, 4, 6, 3, 'Fingerprint Verification', 'images/thumb03.jpg', 20, 30, ' ', ' ', NULL, NULL, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-10-08 18:30:00', '2019-02-15 03:01:00'),
(12, 4, 6, 2, 'Mathematical ', 'images/thumb08.jpg', 15, 20, ' sxd', ' zx', NULL, NULL, 12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-17 18:30:00', '2019-02-15 03:02:52'),
(14, 2, 7, 3, 'Smart Card Security and Static Analysis Perspective from a Java', NULL, 20, 25, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-31 18:30:00', '2019-01-01 18:30:00'),
(18, 1, 1, 1, 'PHP AUTO System', 'img', 20, 21, '    php', '    ', NULL, NULL, 17, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2018-12-31 18:30:00', '2019-11-07 18:30:00'),
(22, 6, 3, 1, 'DAtabase3', 'img', 12, 16, '     Database', '     Abroadf', NULL, '', 16, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-11-07 18:30:00'),
(23, 3, 4, 2, 'DATABASE41', 'img', 1, 123, '   was', '   sdsd', NULL, '', 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-02-15 05:21:00'),
(25, 7, 2, 2, 'Animal Project', 'imgpath', 15, 30, ' nice', ' great', NULL, '', 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(26, 6, 4, 3, 'intern abroad', 'imgpath', 0, 15, ' sxdas', ' asdc', NULL, '', 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(27, 48, 7, 1, 'new projectrs', 'imgpath', 10, 23, ' sds', ' sds', NULL, '', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(29, 48, 2, 3, 'fdgbfd', 'img', 1, 22, '  edf', '  fs', NULL, '', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-11-07 18:30:00'),
(33, 2, 1, 1, 'dwdwq', 'imgpath', 2, 32, ' wsda', ' sdas', NULL, '', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-11 05:37:03', NULL),
(35, 2, 1, 2, 'Volunteer Overseas41', 'img', 23, 33, '    wsda', '    sdas', NULL, '', 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-11 05:41:28', '2019-02-12 23:25:00'),
(38, 1, 1, 1, 'Samsung', 'images/banner4.jpg\r\n', 12, 111, 'asasdsa', 'sda', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-04 18:30:00', NULL),
(39, 2, 2, 2, 'Project-1', 'img', 12, 122, '     zxZ', '     zxX', 'zXZX', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 1, '2019-02-05 18:30:00', '2019-02-14 07:11:26'),
(47, 2, 4, 1, 'sds', 'imgpath', 1, 3, ' sdsad', ' sdsd', NULL, '', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', NULL),
(48, 42, 3, 3, 'sxxds', 'img', 1, 3, '  sd', '  sd', NULL, '', 9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-02-15 05:16:03'),
(49, 9, 4, 2, 'Chinese Eye track proj', 'img', 1, 2, '     fdg', '     fgd', NULL, '', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-01-07 18:30:00', '2019-02-15 05:19:40'),
(50, 5, 2, 3, 'New proj', 'imgpath', 2, 44, ' erfd', ' dcd', NULL, '', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 03:50:59', NULL),
(51, 15, 5, 2, 'PHP AUTO Systemsxdsd', 'imgpath', 1, 7, ' dfgdf', ' dfdf', NULL, '', 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 03:52:35', NULL),
(52, 3, 1, 3, 'NEw Project', 'img', 1, 5, '     sds', '     dsds', NULL, '', 12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 05:12:14', '2019-02-15 05:18:44'),
(53, 14, 5, 2, 'Database31', 'img', 1, 33, '  sdsdsd', '  sdsd', NULL, '', 23, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 1, '2019-02-15 05:22:47', '2019-02-15 05:23:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `number_of_weeks`, `cost`) VALUES
(1, 1, 4, 1100.00),
(2, 2, 3, 720.00),
(3, 3, 1, 500.00),
(4, 4, 6, 299.00),
(5, 11, 5, 900.00),
(6, 12, 5, 8000.00),
(7, 38, 6, 50000.00),
(8, 9, 4, 6000.00);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_start_dates`
--

INSERT INTO `project_start_dates` (`id`, `project_id`, `start_date`) VALUES
(1, 1, '2019-01-05'),
(2, 2, '2019-01-01'),
(3, 3, '2019-01-26'),
(4, 4, '2019-03-26'),
(5, 5, '2019-05-07'),
(6, 6, '2019-03-30'),
(7, 11, '2019-01-23'),
(8, 11, '2019-01-03');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

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
(33, 12, '2019-02-19 18:30:00', '192.168.3.2');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 1, '2019-02-04 18:30:00', '2019-02-06 18:30:00'),
(2, 'organization@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-03 18:30:00', '2019-02-06 18:30:00'),
(5, 'xyz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 0, '2019-01-31 18:30:00', '2019-02-01 18:30:00'),
(6, 'org2@yy.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-01-31 18:30:00', NULL),
(7, 'organization2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-13 18:30:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
