-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 07:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rashid`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `current_user_id` int(11) NOT NULL,
  `your_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `current_user_id`, `your_id`, `message`, `time`) VALUES
(20, 16, 10, 'hi', '2023-05-23 01:04:41'),
(21, 10, 16, 'Hi', '2023-05-23 01:05:17'),
(22, 16, 10, 'hi', '2023-05-23 01:05:36'),
(23, 16, 10, 'hi', '2023-05-23 01:05:40'),
(24, 16, 10, 'hi', '2023-05-23 01:05:43'),
(25, 16, 10, 'hi', '2023-05-23 01:05:46'),
(26, 10, 16, 'hi', '2023-05-23 01:12:04'),
(27, 16, 10, 'hi', '2023-05-23 01:16:16'),
(28, 10, 16, 'hi', '2023-05-23 01:16:23'),
(29, 16, 10, 'hi', '2023-05-23 01:21:23'),
(30, 10, 16, 'hi', '2023-05-23 01:21:29'),
(31, 16, 10, 'hi', '2023-05-23 01:25:17'),
(32, 16, 10, 'hello', '2023-05-23 01:25:19'),
(33, 10, 16, 'hi', '2023-05-23 01:25:27'),
(34, 10, 16, 'hello', '2023-05-23 01:25:29'),
(35, 10, 13, 'hi', '2023-05-24 02:19:18'),
(36, 13, 10, 'hi', '2023-05-24 02:19:42'),
(37, 10, 13, 'hello', '2023-05-24 02:19:53'),
(38, 13, 10, 'hi', '2023-05-24 02:20:36'),
(39, 10, 13, 'hello', '2023-05-24 02:20:44'),
(40, 13, 10, 'hola', '2023-05-24 02:21:01'),
(41, 13, 10, 'hi', '2023-05-24 02:24:40'),
(42, 10, 13, 'hi', '2023-05-24 02:24:48'),
(43, 10, 13, 'hi', '2023-05-24 02:25:17'),
(44, 13, 10, 'hey', '2023-05-24 02:25:25'),
(45, 12, 10, 'hi', '2023-05-24 05:34:53'),
(46, 10, 12, 'hi', '2023-05-24 05:36:20'),
(47, 12, 10, 'hello', '2023-05-24 05:36:38'),
(48, 12, 10, 'hi', '2023-06-08 05:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `college_name`, `designation`, `mobile_number`, `email`, `username`, `password`) VALUES
(10, 'New LJIET', 'HOD', '9999999999', 'hod@newlj.com', 'hodNewLJ', 'hod'),
(11, 'New LJIET', 'Professor', '9999999999', 'professor@newlj.com', 'professorNewLJ', 'professor'),
(12, 'New LJIET', 'Student', '9999999999', 'student@newlj.com', 'studentNewLJ', 'student'),
(13, 'New LJIET', 'Admin', '9999999999', 'admin@newlj.com', 'adminNewLJ', 'admin'),
(16, 'New LJIET', 'Worker', '9999999999', 'worker@newlj.com', 'workerNewLJ', 'worker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
