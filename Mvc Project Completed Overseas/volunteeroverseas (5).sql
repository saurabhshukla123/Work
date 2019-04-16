-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2019 at 03:25 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `project_id`, `name`, `project_startdate`, `duration`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(60, 123, 'Saurabh', '2019-04-08 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-02 06:46:24', NULL),
(61, 125, 'Saurabh', '2019-04-16 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-02 07:02:10', NULL),
(62, 125, 'Anurag', '2019-04-09 00:00:00', 3, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-03 04:21:06', NULL),
(63, 125, 'Saurabh', '2019-04-09 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-03 04:43:09', NULL),
(64, 133, 'Ramesh', '2019-04-17 00:00:00', 3, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-05 01:00:11', NULL),
(65, 125, 'Mitesh', '2019-04-12 00:00:00', 2, 'saurabh.shukla@internal.mail', '+919429266090', '2019-04-05 01:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Volunteer Abroad 1'),
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
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
(24, 'Nakuru', 3),
(27, 'hello', 1),
(28, 'hello', 1),
(29, 'hello', 1),
(30, 'hello', 1),
(35, 'Surat', 1),
(45, 'pakistan', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`) VALUES
(1, 'india', '1553503359banner3.jpg'),
(2, 'Africa', '1553573764banner2.jpg'),
(3, 'Kenya', 'banner-img.jpg'),
(4, 'Thailand', '1554444292banner-img.jpg'),
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `sequence_number`) VALUES
(31, 'How can we help you?', 'You can also browse the topics below to find what you are looking for.\r\nGeneralAccount and Profile', 6),
(32, 'Where can I get some?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', 3),
(33, 'How to update WhatsApp', 'ou can easily update WhatsApp from your phone\'s application store. Please note if you received a message that isn\'t supported by your version of WhatsApp, you\'ll need to update WhatsApp.\r\n\r\nTo update WhatsApp:\r\nAndroid: Go to Play Store, then tap Menu  > My apps & games. Tap UPDATE next to WhatsApp Messenger.\r\nAlternatively, go to Play Store and search for WhatsApp. Tap UPDATE under WhatsApp Messenger.\r\niPhone: Go to App Store, then tap Updates. Tap UPDATE next to WhatsApp Messenger.\r\nAlternatively, go to App Store and search for WhatsApp. Tap UPDATE next to WhatsApp Messenger.\r\nWindows Phone 8.1: Go to Store, then tap Menu  > my apps > WhatsApp > update.\r\nAlternatively, go to Store and search for WhatsApp. Tap WhatsApp > update.\r\nWindows Phone 10: Go to Microsoft Store, then tap Menu  > My Library. Tap Update next to WhatsApp.\r\nAlternatively, go to Microsoft Store and search for WhatsApp. Tap WhatsApp > Update.\r\nKaiOS: Press JioStore or Store on the apps menu. Scroll to the side to select Social, then select WhatsApp. Press OK or SELECT > UPDATE.\r\nWe encourage you to always use the latest version of WhatsApp. Latest versions contain the newest features and bug fixes.\r\n\r\nWas this article helpful', 6),
(34, 'What is Lorem Ipsum?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', 2),
(42, 'How do I find my Windows product key?', 'Windows 8.1 and Windows 10\r\n\r\nThe product key is located inside the product packaging, on the receipt or confirmation page for a digital purchase or in a confirmation e-mail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.\r\n\r\nWindows 7\r\n\r\nThe product key is located inside the box that the Windows DVD came in, on the DVD, on the receipt or confirmation page for a digital purchase or in a confirmation e-mail that shows you purchased Windows. If you purchased a digital copy from Microsoft Store, you can locate your product key in your Account under Digital Content.', 1),
(43, 'Where does it come from?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', 5),
(44, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', 4),
(46, 'Additional option available in supported countries?', 'If you\'re using an Android phone, you might have the option to change WhatsApp\'s language from within the app. To do so:\r\n\r\nOpen WhatsApp.\r\nTap More options  > Settings > Chats  > App Language.\r\nIn the popup that appears, select the language you want.\r\nNote: If you don\'t see this option, it might not be supported in your country.\r\n\r\nWas this article helpful?', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `name`, `logo`, `email`, `description`, `video`, `website`, `contact_name`, `created_at`, `updated_at`) VALUES
(1, 8, 'Volunteer Forever', '1552367725banner4.jpg', 'qss1sss@gmail.com', 'sasaj', '1552388834banner3.jpg', 'https://www.Vestibulum.com', 'Testing', '2019-01-29 08:10:42', '2019-04-05 06:20:55'),
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
(102, 2, 'organization31', '1553851957banner3.jpg', 'org19i9909@gmail.com', '', '1553851957video.mp4', '', 'asdw', '2019-03-29 04:02:16', '2019-03-29 04:02:37'),
(103, 7, 'organization81', '1554439847banner4.jpg', 'dsdsd@gmail.com', '', '1554439847video.mp4', 'https://www.Vestibulum.com', 'sds', '2019-04-04 23:20:47', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `organization_id`, `activity_id`, `category_id`, `title`, `image`, `min_age`, `max_age`, `overview_description`, `accommodation_description`, `impact_description`, `project_video_url`, `city_id`, `country_id`, `volunteer_house_address`, `volunteer_house_description`, `volunteer_work_address`, `volunteer_work_description`, `nearest_airport_address`, `cost_description`, `project_startdate_description`, `is_affordable`, `status`, `created_at`, `updated_at`) VALUES
(123, 2, 1, 1, 'Chinese Eye track 1', '1554207284banner2.jpg', 16, 21, 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area). For this reason, dummy text usually consists of a more or less random series of words or syllables. This prevents repetitive patterns from impairing the overall visual impression and facilitates the comparison of different typefaces. Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area). For this reason, dummy text usually consists of a more or less random series of words or syllables. This prevents repetitive patterns from impairing the overall visual impression and facilitates the comparison of different typefaces. Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and \'words\' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area). For this reason, dummy text usually consists of a more or less random series of words or syllables. This prevents repetitive patterns from impairing the overall visual impression and facilitates the comparison of different typefaces. Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised', '1554207284video.mp4', 16, 5, 'Negiya South Africa', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human pe', 'Nuj haong South Africa', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human pe', 'Kung Fu Airport', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human pe', 'Dummy text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical. Due to its widespread use as filler text for layouts, non-readability is of great importance: human pe', 'yes', 1, '2019-04-02 06:44:44', '2019-04-05 01:05:53'),
(125, 49, 7, 2, 'Dental Health', '1554208292banner4.jpg', 21, 23, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', '1554208292video.mp4', 21, 7, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'Ashgabat', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'yes', 1, '2019-04-02 07:00:53', '2019-04-03 04:24:03'),
(126, 4, 3, 3, 'Mummas ChildCare', '1554208594banner-img.jpg', 15, 20, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', '1554208594video.mp4', 2, 1, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'Sardar patel International Airport', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'yes', 1, '2019-04-02 07:06:34', NULL),
(127, 3, 10, 2, 'Wild Safe', '1554208788banner2.jpg', 13, 16, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.', '1554208788video.mp4', 7, 2, 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill t', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'Kinshasa', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill', 'yes', 1, '2019-04-02 07:09:48', NULL),
(128, 6, 8, 2, 'Samsung Projects 1', '1554287146contact-banner-mobile.jpg', 23, 31, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '1554287146video.mp4', 11, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked u', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up', 'Mombasa', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked u', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked u', 'yes', 1, '2019-04-03 04:55:46', '2019-04-05 00:03:22'),
(131, 1, 3, 1, 'HTC', '1554442532banner4.jpg', 21, 23, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1554442532video.mp4', 8, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It', 'Thailand', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It', 'yes', 1, '2019-04-05 00:05:32', '2019-04-05 06:32:12'),
(133, 7, 5, 3, 'Learn India', '1554445717contact-banner.jpg', 21, 25, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '1554445717video.mp4', 4, 1, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia v', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia v', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia', 'Hubali', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia', 'yes', 1, '2019-04-05 00:58:37', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_carousel_images`
--

INSERT INTO `project_carousel_images` (`id`, `project_id`, `image`) VALUES
(208, 123, 'banner2.jpg'),
(209, 123, 'banner3.jpg'),
(210, 123, 'banner4.jpg'),
(211, 123, 'banner5.jpg'),
(212, 123, 'banner-img.jpg'),
(218, 125, 'banner3.jpg'),
(219, 125, 'banner4.jpg'),
(220, 125, 'banner5.jpg'),
(221, 126, 'banner5.jpg'),
(222, 126, 'contact-banner.jpg'),
(223, 126, 'contact-banner-mobile.jpg'),
(224, 126, 'faq-banner.jpg'),
(225, 126, 'banner3.jpg'),
(226, 126, 'banner4.jpg'),
(227, 127, 'banner2.jpg'),
(228, 127, 'banner3.jpg'),
(229, 127, 'banner4.jpg'),
(230, 127, 'banner5.jpg'),
(231, 128, 'banner3.jpg'),
(232, 128, 'banner4.jpg'),
(233, 128, 'banner5.jpg'),
(234, 128, 'banner-img.jpg'),
(235, 131, 'banner2.jpg'),
(236, 131, 'banner3.jpg'),
(237, 131, 'banner4.jpg'),
(238, 131, 'banner5.jpg'),
(239, 131, 'banner-img.jpg'),
(240, 133, 'banner2.jpg'),
(241, 133, 'banner3.jpg'),
(242, 133, 'banner4.jpg'),
(243, 133, 'banner5.jpg'),
(244, 133, 'banner-img.jpg'),
(245, 133, 'contact-banner.jpg'),
(246, 133, 'contact-banner-mobile.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=464 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `number_of_weeks`, `cost`) VALUES
(422, 126, 1, 600.00),
(423, 126, 2, 800.00),
(424, 126, 3, 900.00),
(425, 127, 1, 225.00),
(426, 127, 2, 400.00),
(427, 127, 3, 500.00),
(431, 125, 1, 800.00),
(432, 125, 2, 900.00),
(433, 125, 3, 1200.00),
(444, 128, 1, 800.00),
(445, 128, 2, 900.00),
(455, 133, 1, 150.00),
(456, 133, 2, 600.00),
(457, 133, 3, 800.00),
(458, 123, 1, 200.00),
(459, 123, 2, 400.00),
(460, 123, 3, 600.00),
(461, 131, 1, 500.00),
(462, 131, 2, 2111.00),
(463, 131, 3, 4222.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=455 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_include_checks`
--

INSERT INTO `project_include_checks` (`id`, `project_id`, `description`, `is_included`) VALUES
(403, 126, 'Lunch', 'yes'),
(404, 126, 'Air tickets', 'yes'),
(405, 126, 'Meal', 'no'),
(406, 127, 'Lunch', 'yes'),
(407, 127, 'Meal', 'no'),
(408, 127, 'Air tickets', 'no'),
(412, 125, 'Lunch', 'yes'),
(413, 125, 'Meal', 'no'),
(414, 125, 'Air tickets', 'yes'),
(431, 128, 'Lunch', 'yes'),
(432, 128, 'Dinner', 'yes'),
(433, 128, 'Flights', 'no'),
(444, 133, 'Lunch', 'yes'),
(445, 133, 'Meal', 'no'),
(446, 123, 'Lunch', 'yes'),
(447, 123, 'Dinner', 'yes'),
(448, 123, 'Housing', 'yes'),
(449, 123, 'Air tickets', 'no'),
(450, 131, 'Lunch', 'no'),
(451, 131, 'Dinner', 'yes'),
(452, 131, 'Air tickets', 'yes'),
(453, 131, 'Meal', 'yes');

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
) ENGINE=InnoDB AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_start_dates`
--

INSERT INTO `project_start_dates` (`id`, `project_id`, `start_date`) VALUES
(900, 126, '2019-04-23'),
(901, 126, '2019-04-19'),
(902, 126, '2019-04-06'),
(903, 126, '2019-05-17'),
(904, 126, '2019-05-13'),
(905, 126, '2019-03-11'),
(906, 126, '2019-03-14'),
(907, 126, '2019-02-18'),
(908, 126, '2019-02-12'),
(909, 126, '2019-02-07'),
(910, 126, '2019-01-14'),
(911, 126, '2018-12-18'),
(912, 126, '2018-12-16'),
(913, 127, '2019-04-17'),
(914, 127, '2019-04-14'),
(915, 127, '2019-04-12'),
(916, 127, '2019-05-17'),
(917, 127, '2019-05-12'),
(929, 125, '2019-04-09'),
(930, 125, '2019-04-12'),
(931, 125, '2019-04-24'),
(932, 125, '2019-04-15'),
(933, 125, '2019-04-18'),
(934, 125, '2019-05-14'),
(935, 125, '2019-05-22'),
(936, 125, '2019-06-21'),
(937, 125, '2019-06-12'),
(938, 125, '2019-07-26'),
(939, 125, '2019-08-14'),
(940, 125, '2019-02-12'),
(941, 125, '2019-02-13'),
(979, 128, '2019-04-18'),
(980, 128, '2019-04-05'),
(981, 128, '2019-04-08'),
(982, 128, '2019-05-08'),
(983, 128, '2019-05-21'),
(984, 128, '2019-03-25'),
(985, 128, '2019-02-19'),
(999, 133, '2019-04-17'),
(1000, 133, '2019-04-13'),
(1001, 133, '2019-04-07'),
(1002, 133, '2019-05-22'),
(1003, 133, '2019-05-24'),
(1004, 133, '2019-05-03'),
(1005, 123, '2019-04-17'),
(1006, 123, '2019-04-14'),
(1007, 123, '2019-04-04'),
(1008, 123, '2019-05-17'),
(1009, 123, '2019-05-15'),
(1010, 123, '2019-05-13'),
(1011, 123, '2019-05-28'),
(1012, 123, '2019-05-23'),
(1013, 123, '2019-06-20'),
(1014, 123, '2019-06-24'),
(1015, 123, '2019-08-17'),
(1016, 123, '2019-08-21'),
(1017, 123, '2019-08-07'),
(1020, 131, '2019-04-27'),
(1021, 131, '2019-04-17'),
(1022, 131, '2019-05-16'),
(1023, 131, '2019-05-14');

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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_view_history`
--

INSERT INTO `project_view_history` (`id`, `project_id`, `view_date`, `user_ip`) VALUES
(91, 123, '2019-04-02 06:45:55', '::1'),
(93, 125, '2019-04-02 07:01:47', '::1'),
(94, 128, '2019-04-03 04:56:58', '::1'),
(95, 127, '2019-04-03 05:11:57', '::1'),
(96, 126, '2019-04-03 05:12:25', '::1'),
(98, 133, '2019-04-05 00:59:30', '::1');

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
  `tokenNumber` varchar(100) DEFAULT NULL,
  `tokenDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`, `tokenNumber`, `tokenDate`) VALUES
(1, 'superadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 1, '2019-02-04 18:30:00', '2019-02-06 18:30:00', 'GD07AK6ONTYJWIPEC95SV4R8QL', '2019-04-03 18:30:00'),
(2, 'organization@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-03 18:30:00', '2019-02-06 18:30:00', NULL, NULL),
(5, 'xyz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin', 0, '2019-01-31 18:30:00', '2019-02-01 18:30:00', NULL, NULL),
(6, 'org2@yy.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-01-31 18:30:00', NULL, NULL, NULL),
(7, 'organization2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-02-13 18:30:00', NULL, NULL, NULL),
(8, 'tatvasoft@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'organization', 1, '2019-03-29 07:06:25', NULL, 'CN0F9IATE8MS3VD1YGWRB45PUJ', '2019-04-05 10:24:17'),
(9, 'saurabh.shukla@internal.mail', '2d02e669731cbade6a64b58d602cf2a4', 'superadmin', 1, '2019-04-04 07:01:14', NULL, 'XXXXXXXXX', '2009-12-31 18:30:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_carousel_images`
--
ALTER TABLE `project_carousel_images`
  ADD CONSTRAINT `project_carousel_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD CONSTRAINT `project_costs_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_include_checks`
--
ALTER TABLE `project_include_checks`
  ADD CONSTRAINT `project_include_checks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_start_dates`
--
ALTER TABLE `project_start_dates`
  ADD CONSTRAINT `project_start_dates_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_view_history`
--
ALTER TABLE `project_view_history`
  ADD CONSTRAINT `project_view_history_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
