-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 10:43 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messageboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(8) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `to_id`, `from_id`, `content`, `created`, `modified`) VALUES
(58, 12, 61, 64, 'sample body', '2019-01-10 16:28:51', '2019-01-10 16:28:51'),
(59, 12, 61, 64, 'sample body', '2019-01-10 16:38:21', '2019-01-10 16:38:21'),
(60, 13, 64, 64, 'test lang', '2019-01-10 16:42:36', '2019-01-10 16:42:36'),
(61, 14, 64, 61, 'reply', '2019-01-10 16:50:47', '2019-01-10 16:50:47'),
(62, 12, 64, 61, 'reply', '2019-01-10 16:50:58', '2019-01-10 16:50:58'),
(63, 12, 64, 61, 'reply by test', '2019-01-10 17:08:32', '2019-01-10 17:08:32'),
(64, 12, 64, 61, 'reply', '2019-01-10 17:11:02', '2019-01-10 17:11:02'),
(65, 12, 61, 64, 'hello', '2019-01-10 17:16:33', '2019-01-10 17:16:33'),
(66, 12, 61, 64, 'sample body', '2019-01-10 17:20:29', '2019-01-10 17:20:29'),
(67, 12, 61, 64, 'reply by test3@gmail.com', '2019-01-10 17:36:53', '2019-01-10 17:36:53'),
(68, 14, 64, 61, 'to test3@gmail.com', '2019-01-10 17:39:48', '2019-01-10 17:39:48'),
(69, 14, 61, 64, 'to test@gmail.com', '2019-01-10 17:40:01', '2019-01-10 17:40:01'),
(70, 12, 61, 64, 'sample body', '2019-01-11 10:13:38', '2019-01-11 10:13:38'),
(71, 12, 61, 64, 'reply to test', '2019-01-11 10:26:09', '2019-01-11 10:26:09'),
(72, 12, 64, 61, 'reply to test 3', '2019-01-11 10:27:03', '2019-01-11 10:27:03'),
(73, 15, 64, 64, 'asdasdasd', '2019-01-11 10:31:05', '2019-01-11 10:31:05'),
(74, 16, 61, 64, 'test', '2019-01-11 10:31:19', '2019-01-11 10:31:19'),
(75, 17, 61, 64, 'sample body', '2019-01-11 10:31:44', '2019-01-11 10:31:44'),
(76, 18, 64, 61, 'saman', '2019-01-11 10:33:26', '2019-01-11 10:33:26'),
(77, 19, 64, 61, 'test lang', '2019-01-11 10:33:34', '2019-01-11 10:33:34'),
(78, 18, 61, 64, 'asa ka?', '2019-01-11 10:33:52', '2019-01-11 10:33:52'),
(79, 20, 64, 61, 'sample lang sa', '2019-01-11 10:37:49', '2019-01-11 10:37:49'),
(80, 21, 64, 61, 'sample again', '2019-01-11 10:38:08', '2019-01-11 10:38:08'),
(81, 21, 61, 64, 'sample body', '2019-01-11 10:43:15', '2019-01-11 10:43:15'),
(82, 21, 64, 61, 'sdasdasdad', '2019-01-11 10:43:29', '2019-01-11 10:43:29'),
(83, 21, 61, 64, 'adasdasdasd', '2019-01-11 10:43:35', '2019-01-11 10:43:35'),
(84, 12, 64, 61, 'sample reply', '2019-01-11 13:32:30', '2019-01-11 13:32:30'),
(85, 22, 61, 61, 'asdasdasdasdasd', '2019-01-11 14:57:41', '2019-01-11 14:57:41'),
(86, 23, 61, 61, 'asdasdasdasdasd', '2019-01-11 14:59:52', '2019-01-11 14:59:52'),
(87, 24, 61, 61, 'asdasdasdasd', '2019-01-11 15:00:06', '2019-01-11 15:00:06'),
(88, 16, 64, 61, 'unsa man?', '2019-01-11 15:06:45', '2019-01-11 15:06:45'),
(89, 25, 61, 64, 'asdasd', '2019-01-11 15:49:23', '2019-01-11 15:49:23'),
(90, 26, 64, 64, 'asdasdasdasdasdasd', '2019-01-11 15:49:39', '2019-01-11 15:49:39'),
(91, 27, 61, 64, 'asdasdasdasdasdasdasdasd', '2019-01-11 15:50:25', '2019-01-11 15:50:25'),
(92, 12, 64, 61, 'sample body', '2019-01-11 16:09:31', '2019-01-11 16:09:31'),
(93, 12, 64, 61, 'sample body', '2019-01-11 16:09:55', '2019-01-11 16:09:55'),
(94, 12, 64, 61, 'asdasdasdasd', '2019-01-11 16:11:08', '2019-01-11 16:11:08'),
(95, 12, 64, 61, 'asdasdasdasd', '2019-01-11 16:12:10', '2019-01-11 16:12:10'),
(96, 12, 64, 61, 'asdasdas', '2019-01-11 16:32:18', '2019-01-11 16:32:18'),
(97, 12, 64, 61, 'asdasdasdasd', '2019-01-11 16:32:32', '2019-01-11 16:32:32'),
(98, 12, 64, 61, 'asdasdasd', '2019-01-11 16:32:48', '2019-01-11 16:32:48'),
(99, 12, 64, 61, 'asdasdasdasd', '2019-01-11 16:32:51', '2019-01-11 16:32:51'),
(100, 12, 64, 61, 'asdasdasd', '2019-01-11 16:33:49', '2019-01-11 16:33:49'),
(101, 12, 64, 61, 'asdasdasdasd', '2019-01-11 16:33:54', '2019-01-11 16:33:54'),
(102, 12, 64, 61, 'asdasdas', '2019-01-11 16:57:26', '2019-01-11 16:57:26'),
(103, 12, 61, 64, 'asdasdasd', '2019-01-11 17:41:15', '2019-01-11 17:41:15'),
(104, 12, 61, 64, 'asdadasdasdasd', '2019-01-11 17:41:32', '2019-01-11 17:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL COMMENT '1 for male, 2 for female',
  `birthdate` date DEFAULT NULL,
  `hubby` text,
  `last_login_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_ip` varchar(20) NOT NULL,
  `modified_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(61, 'test', 'test@gmail.com', '131f975849720a9c5e2a02dc83dd54a63107ac8f', '20190445.jpg', '1', '2019-01-07', '', '2019-01-11 16:58:34', '2019-01-10 16:44:07', '2019-01-11 16:58:34', '::1', '::1'),
(63, 'test', 'test2@gmail.com', '996b12ad942ac81941d13c8656474d28189527a5', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2019-01-10 08:59:27', '2019-01-10 08:59:27', '::1', '::1'),
(64, 'test3', 'test3@gmail.com', '131f975849720a9c5e2a02dc83dd54a63107ac8f', '20190426.jpg', '2', '2019-01-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-11 14:30:03', '2019-01-10 16:16:31', '2019-01-11 14:44:12', '::1', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
