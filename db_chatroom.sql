-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2017 at 07:23 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

DROP TABLE IF EXISTS `chatrooms`;
CREATE TABLE IF NOT EXISTS `chatrooms` (
  `chatroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `users` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chatroom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`chatroom_id`, `name`, `users`, `date_created`) VALUES
(1, 'one', '[null]', '2017-10-06 18:16:10'),
(2, 'two', '[null]', '2017-10-06 18:16:54'),
(3, 'three', '[null]', '2017-10-06 18:17:07'),
(4, 'asd', '[null]', '2017-10-06 18:17:24'),
(5, 'adfas', '[null]', '2017-10-06 18:18:41'),
(6, 'fasdfa', '[null]', '2017-10-06 18:19:08'),
(7, 'fasdfas', '[null]', '2017-10-06 18:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `global_variables`
--

DROP TABLE IF EXISTS `global_variables`;
CREATE TABLE IF NOT EXISTS `global_variables` (
  `chatrooms_number` int(11) NOT NULL,
  `users_number` int(11) NOT NULL,
  `currentChatId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` int(11) NOT NULL,
  `message_type` varchar(20) NOT NULL,
  `message_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sender_id` int(11) NOT NULL,
  `chatroom_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender_id` (`sender_id`),
  KEY `chatroom_fk` (`chatroom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@coolchatroom.com.cy', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e'),
(2, 'ruser1', 'ruser1@coolchatroom.com.cy', '153fa238cec90e5a24b85a79109f91ebe68ca481'),
(3, 'ruser2', 'ruser2@coolchatroom.com.cy', 'f425bc344e62260a72da9e6968a1a93a0bef062a'),
(4, 'ruser3', 'ruser3@coolchatroom.com.cy', '3a21e89b6c88216c4d775fba1c01e1fa1d365334'),
(5, 'ruser4', 'ruser4@coolchatroom.com.cy', '8a603edae1b76e8e98b55a20d3abb6f9ce79cdfe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
