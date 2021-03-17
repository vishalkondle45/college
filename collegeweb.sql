-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 06:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegeweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `doj` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `username`, `password`, `email`, `mobile`, `address`, `city`, `pincode`, `logo`, `doj`, `status`) VALUES
(1, 'Vishal Shridhar Kondle', 'admin', 'admin', 'vishalkondle@gmail.com', '727671848', '1492 G Group, Vidi Gharkul, Hyderabad Road,', 'Solapur', 413005, '451c28c061e1256d6e7aae8b2c1c4558.png', '2021-02-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `commenter_type` varchar(10) NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `commenter_type`, `commenter_id`, `comment`, `time`) VALUES
(1, 1, 'users', 1, '', '2021-02-21 05:42:48'),
(2, 1, 'users', 1, 'Comment', '2021-02-21 05:45:49'),
(3, 1, 'users', 1, 'c', '2021-02-22 05:46:15'),
(4, 1, 'users', 1, 'Hey', '2021-02-22 05:54:09'),
(5, 1, 'users', 1, 'sdf', '2021-02-22 05:54:14'),
(6, 3, 'users', 1, 's', '2021-02-22 05:55:41'),
(7, 3, 'users', 1, 's', '2021-02-22 05:56:44'),
(8, 3, 'users', 1, 's', '2021-02-22 05:57:30'),
(9, 3, 'users', 1, 's', '2021-02-22 05:57:31'),
(10, 4, 'users', 1, 's', '2021-02-22 05:59:14'),
(11, 4, 'users', 1, 's', '2021-02-22 05:59:15'),
(12, 4, 'users', 1, 's', '2021-02-22 06:00:21'),
(13, 4, 'users', 1, 's', '2021-02-22 06:01:49'),
(14, 4, 'users', 1, 'fs', '2021-02-22 06:03:10'),
(15, 4, 'users', 1, '', '2021-02-22 06:03:14'),
(16, 4, 'users', 1, 's', '2021-02-22 06:03:39'),
(17, 5, 'users', 1, 'Visha', '2021-02-22 06:24:10'),
(18, 1, 'users', 1, 'Hey', '2021-02-22 06:38:38'),
(19, 5, 'users', 1, 'l', '2021-02-22 06:50:43'),
(20, 5, 'users', 1, 'a', '2021-02-22 08:03:07'),
(21, 6, 'users', 1, 'Vishal', '2021-02-25 13:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `college_id`, `department`) VALUES
(1, 1, 'Computer Science & Engineering'),
(2, 1, 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `education` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `college_id`, `education`) VALUES
(1, 1, 'M.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `follower`, `following`, `time`) VALUES
(1, 1, 1, '2021-03-07 16:21:01'),
(2, 1, 1, '2021-03-07 17:11:35'),
(3, 1, 1, '2021-03-07 17:11:44'),
(4, 1, 1, '2021-03-07 17:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `forum` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `college_id`, `forum`, `time`) VALUES
(1, 1, 1, 'Hey', '2021-02-25 13:42:39'),
(2, 1, 1, '1', '2021-02-25 13:43:27'),
(3, 1, 1, 'sad', '2021-02-25 13:44:11'),
(4, 1, 1, 'sad', '2021-02-25 13:45:41'),
(5, 1, 2, 'Hey', '2021-02-25 13:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE `forum_replies` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `replier_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`id`, `forum_id`, `replier_id`, `reply`, `time`) VALUES
(1, 1, 1, 'Reply 1', '2021-02-25 14:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liker_type` varchar(10) NOT NULL,
  `liker_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `liker_type`, `liker_id`, `time`) VALUES
(99, 1, 'users', 1, '2021-02-22 06:49:44'),
(100, 3, 'users', 1, '2021-02-22 06:49:48'),
(101, 3, 'users', 1, '2021-02-22 06:49:50'),
(102, 1, 'users', 1, '2021-02-22 07:07:56'),
(103, 1, 'users', 1, '2021-02-22 07:07:56'),
(104, 1, 'users', 1, '2021-02-22 07:07:56'),
(105, 1, 'users', 1, '2021-02-22 07:07:57'),
(106, 1, 'users', 1, '2021-02-22 07:07:57'),
(107, 1, 'users', 1, '2021-02-22 07:07:57'),
(108, 1, 'users', 1, '2021-02-22 07:07:57'),
(109, 1, 'users', 1, '2021-02-22 07:07:57'),
(110, 1, 'users', 1, '2021-02-22 07:07:58'),
(111, 5, 'users', 1, '2021-02-22 07:49:19'),
(112, 5, 'users', 1, '2021-02-22 08:03:03'),
(113, 6, 'users', 1, '2021-02-25 13:29:28'),
(114, 6, 'users', 1, '2021-02-25 13:29:28'),
(115, 6, 'users', 1, '2021-02-25 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `message`, `time`) VALUES
(1, 1, 3, 's', '0000-00-00 00:00:00'),
(2, 3, 1, 'a', '0000-00-00 00:00:00'),
(3, 1, 3, '1', '2021-02-24 04:50:13'),
(4, 1, 3, '1', '2021-02-24 05:15:58'),
(5, 0, 0, '1', '2021-02-24 05:16:00'),
(6, 1, 3, '2', '2021-02-24 05:16:13'),
(7, 1, 3, '1', '2021-02-24 05:16:20'),
(8, 1, 3, 'Vishal', '2021-02-24 05:16:42'),
(9, 1, 3, 'Ankita', '2021-02-24 05:17:08'),
(10, 1, 3, 'a', '2021-02-24 05:46:52'),
(11, 1, 3, 'a', '2021-02-24 05:50:26'),
(12, 1, 3, 'Vishal', '2021-02-24 05:50:30'),
(13, 3, 1, 'VishalKondle', '2021-02-25 05:50:30'),
(14, 3, 1, 'VishalKondle1', '2021-02-25 05:50:30'),
(15, 3, 1, 'VishalKondle123', '2021-02-25 05:50:30'),
(16, 3, 1, 'VishalKondle1234', '2021-02-25 05:50:30'),
(17, 3, 1, 'VishalKondle12345', '2021-02-25 05:50:30'),
(18, 3, 1, 'VishalKondle123456', '2021-02-25 05:50:30'),
(19, 3, 1, 'VishalKondle1234567', '2021-02-25 05:50:30'),
(20, 3, 1, 'VishalKondle12345678', '2021-02-25 05:50:30'),
(21, 3, 1, '1\r\n', '2021-02-25 05:50:30'),
(22, 3, 1, 'VishalKondle123456789', '2021-02-25 05:50:30'),
(23, 3, 1, 'VishalKondle12345678910', '2021-02-25 05:50:30'),
(24, 1, 3, '1', '2021-02-24 14:12:16'),
(25, 1, 3, '1adsfasd', '2021-02-24 14:12:16'),
(26, 1, 3, '1adsfasd11', '2021-02-24 14:12:16'),
(27, 1, 3, 'Vishal', '2021-02-24 14:12:16'),
(28, 3, 1, 'VishalKondle12345678910', '2021-02-25 05:50:30'),
(29, 3, 1, 'VishalKondle12345678910', '2021-02-25 05:50:30'),
(30, 3, 1, 'asdfasf', '0000-00-00 00:00:00'),
(31, 3, 1, 'Vishal', '0000-00-00 00:00:00'),
(32, 3, 1, 'VishalKondle1234567891011', '2021-02-25 05:50:30'),
(33, 3, 1, 'VishalKondle12111134567891011', '2021-02-25 05:50:30'),
(34, 1, 3, 's', '2021-02-24 14:22:11'),
(35, 3, 1, 'VishalKondleasdfasdf12111134567891011', '2021-02-25 05:50:30'),
(36, 3, 1, '1', '2021-02-25 05:50:30'),
(37, 3, 1, '1sadsfa', '2021-02-25 05:50:30'),
(38, 3, 1, '123', '2021-02-25 05:50:30'),
(39, 3, 1, '123asdf', '2021-02-25 05:50:30'),
(40, 3, 1, '1', '2021-02-25 05:50:30'),
(41, 3, 1, '1123123', '2021-02-25 05:50:30'),
(42, 1, 3, 'ssfsdaf', '2021-02-24 14:22:11'),
(43, 1, 3, 'dsf', '2021-02-24 14:46:36'),
(44, 1, 3, 'a', '2021-02-24 14:47:21'),
(45, 1, 3, 'a', '2021-02-24 14:47:25'),
(46, 1, 3, 'qwr', '2021-02-24 14:48:08'),
(47, 1, 3, 's', '2021-02-24 14:48:20'),
(48, 1, 3, '1', '2021-02-24 14:48:27'),
(49, 1, 3, 'vishal', '2021-02-24 14:48:30'),
(50, 1, 3, 'ssfsdafads', '2021-02-24 14:22:11'),
(51, 1, 3, 'kk', '2021-02-24 14:49:08'),
(52, 1, 3, 'v', '2021-02-24 14:49:10'),
(53, 1, 3, 'vishal', '2021-02-24 14:49:16'),
(54, 1, 3, 's', '2021-02-24 14:49:54'),
(55, 1, 3, 'a', '2021-02-24 14:49:56'),
(56, 1, 3, 's', '2021-02-24 14:50:30'),
(57, 1, 3, 'Vishal', '2021-02-24 14:50:33'),
(58, 1, 3, 'Hey', '2021-02-24 14:50:43'),
(59, 1, 3, 'Hey', '2021-02-24 14:50:50'),
(60, 1, 3, 'Hello', '2021-02-24 14:50:54'),
(61, 1, 3, 'Vishal', '2021-02-24 14:51:07'),
(62, 1, 3, 'a', '2021-02-24 14:51:34'),
(63, 1, 3, '0', '2021-02-24 14:51:46'),
(64, 1, 3, 'a', '2021-02-24 14:53:04'),
(65, 1, 3, 'Vishal', '2021-02-24 14:53:06'),
(66, 1, 3, 'Hello', '2021-02-24 15:00:10'),
(67, 1, 3, 's', '2021-02-24 15:06:07'),
(68, 1, 3, 'Hey', '2021-02-24 17:38:34'),
(69, 3, 1, 'faksdjfklaskjvkls s', '2021-02-24 17:38:34'),
(70, 3, 1, '04032021', '2021-02-24 17:38:34'),
(71, 3, 1, 'New Update', '2021-02-24 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `post` varchar(50) NOT NULL,
  `caption` text NOT NULL,
  `post_key` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `usertype`, `post`, `caption`, `post_key`, `time`) VALUES
(1, 1, 'users', 'f45a1a0225fe0dd46a376000519ffd89.png', 'Caption', '5250384c841e5cb57dc0bb7b68464a9f', '2021-02-21 17:26:53'),
(3, 1, 'users', 'a5786f3529a5aee528fec8949c28acca.png', 'ASL', 'fad07f4163eeb88a8ae54161da5e4278', '2021-02-21 17:34:35'),
(4, 1, 'users', 'c0a770dca9b02b50129df77585928eba.png', 'ASL', '016e18f522de213c576f4f858199f6e5', '2021-02-21 17:35:08'),
(5, 1, 'users', '342bdf8cd33b509bc1216cf4b01a9a09.png', 'ASL', 'c1975ee49cf05787548e374ccca90c5c', '2021-02-21 17:35:22'),
(6, 1, 'users', 'c4f929c19cefb4b5fbd0a505e3c52984.png', '', '840729642f5ff0d039edbe8fb90f8179', '2021-02-25 13:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`id`, `reply_id`, `user_id`, `time`) VALUES
(29, 1, 1, '2021-03-07 16:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `college_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doj` date NOT NULL DEFAULT current_timestamp(),
  `unique_key` varchar(50) NOT NULL,
  `education` varchar(20) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `fname`, `mname`, `lname`, `username`, `password`, `email`, `mobile`, `address`, `city`, `pincode`, `photo`, `college_id`, `status`, `doj`, `unique_key`, `education`, `department`) VALUES
(1, 'student', 'Vishal', 'Shridhar', 'Kondle', 'admin', 'admin', 'vishalkondle@gmail.com', '7276718848', '1492 G Group, Vidi Gharkul, Hyderabad Road,', 'Solapur', 413005, '090b9b6bb28ee515e10dc22177f6d54e.png', 1, 1, '2021-02-19', '208fd2bf06be899e60371489e58bd810', 'First Year', 'Computer Science & Engineering'),
(3, 'teacher', 'Vishal', 'Shridhar', 'Kondle', 'admin', 'admin', 'vishalkondle@gmail.com', '7276718848', '1492 G Group, Vidi Gharkul, Hyderabad Road,', 'Solapur', 413005, '4fd64468c7b8cdb1eeafce4076cef360.png', 1, 1, '2021-02-19', '208fd2bf06be899e60371489e45bd811', 'M. Tech', 'Computer Science & Engineering'),
(4, 'student', 'Ankita', 'Shridhar', 'Kondle', 'ankita', 'admin', 'vishalkondle@gmail.com', '7276718848', '1492 G Group, Vidi Gharkul, Hyderabad Road,', 'Solapur', 413005, '090b9b6bb28ee515e10dc22177f6d54e.png', 1, 1, '2021-02-19', '208fd2bf06be899e60371489e58bd810', 'First Year', 'Computer Science & Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `content_id` int(11) NOT NULL,
  `viewer_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `college_id`, `year`) VALUES
(1, 1, 'First Year'),
(2, 1, 'Second Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_replies`
--
ALTER TABLE `forum_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_replies`
--
ALTER TABLE `forum_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
