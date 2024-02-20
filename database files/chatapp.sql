-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(19, 651336848, 1421527895, 'hello tan'),
(20, 1421527895, 651336848, 'hi MR'),
(21, 651336848, 1421527895, 'what do you want us to help you?😉');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 373983980, 'Jean', 'D\'amour', 'byiringirodamour2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1706609560aa.jpg', 'Active now'),
(2, 1241049883, 'king', 'mr', 'jeandamour.byiringiro@kepler.com', '5531a5834816222280f20d1ef9e95f69', '1706610099aaa.jpeg', 'Offline now'),
(3, 982107945, 'tete', 'tana', 'kinglsey.johnson@gmail.com', '07811dc6c422334ce36a09ff5cd6fe71', '1706610257Capture-removebg-preview.jpg', 'Offline now'),
(4, 1487564221, 'jado', 'kagaba', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1706711807testimonials-1.jpg', 'Offline now'),
(5, 1510018629, 'mimi', 'kaly', 'byiringirodamour22@gmail.com', '202cb962ac59075b964b07152d234b70', '1706711857team-4.jpg', 'Offline now'),
(6, 1421527895, 'Jean', 'BYIRINGIRO', 'jeandamour.byiringiro2023@kepler.org', '81dc9bdb52d04dc20036dbd8313ed055', '1706788445testimonials-1.jpg', 'Offline now'),
(7, 651336848, 'kilng', 'tan', 'new@kepler.com', '81dc9bdb52d04dc20036dbd8313ed055', '1706788495blog-author.jpg', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
