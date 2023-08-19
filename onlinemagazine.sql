-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2023 at 02:13 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemagazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sport'),
(2, 'Muzika'),
(3, 'Zabava'),
(4, 'Umjetnost'),
(5, 'Ishrana'),
(6, 'Putovanja'),
(7, 'Zdravlje'),
(8, 'Biznis'),
(9, 'Kultura'),
(10, 'Tehnologija'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` longtext CHARACTER SET utf8NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_ibfk_1` (`user_id`),
  KEY `comments_ibfk_2` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created_at`, `status`) VALUES
(4, '', 11, 1, '2023-08-16 15:58:15', 1),
(6, 'Neki komentar', 11, 1, '2023-08-16 20:07:11', 1),
(9, 'Neki komentar', 12, 2, '2023-08-16 21:15:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post` longtext NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tags` longtext,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_ibfk_1` (`category_id`),
  KEY `posts_ibfk_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `category_id`, `user_id`, `tags`, `created_at`) VALUES
(11, 'SP u fudbalu francuska 1998', 1, 2, 'mundijal,sport,fudbal', '2023-08-17 16:20:38'),
(12, 'Neki post', 4, 3, 'zdravlje', '2023-08-16 21:15:10'),
(14, 'Pracenje mundijala u kosarci 2023', 8, 2, '', '2023-08-17 16:32:16'),
(15, 'Ucenje programiranja', 10, 1, 'php,laravel,programiranje', '2023-08-17 16:48:39'),
(16, 'Ucenje laravela', 10, 1, 'php,laravel,blade', '2023-08-18 09:32:32'),
(18, 'Sesti post', 1, 4, '', '2023-08-19 13:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `userName`, `email`, `password`) VALUES
(1, 'Sinisa', 'Kuzmanovic', 'kuzmanovic112', '112kuzmanovic@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'Leonardo', 'Femerling', 'leo112', 'leo@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(3, 'Ivica', 'Kralj', 'kralj', 'kralj@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(4, 'Patrick', 'Femerling', 'patrik112', 'patrick@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
