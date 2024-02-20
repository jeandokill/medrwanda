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
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq_entries`
--

CREATE TABLE `faq_entries` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_entries`
--

INSERT INTO `faq_entries` (`id`, `question`, `answer`) VALUES
(1, 'why would i choose to work with you?', 'We are goals-based organization that is committed to bring in the hope for tomorrow to those individuals who has any kind of cancer, we are also delighted to make the awareness of cancer in this non-government. and if you still have doubt about us, you can visit about us page and learn more about us'),
(2, 'why do you use more methods of communication?', 'we use the different method of communication to bring the independence and freedom from chatting with us some people will tend to talk us to call, other will use direct chat, other will use sending email, other will use to visit us to our beraur and so on ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `image_path`) VALUES
(5, 'uploads/2.jpg'),
(6, 'uploads/3.jpg'),
(7, 'uploads/4.jpg'),
(8, 'uploads/5.jpg'),
(9, 'uploads/6.jpg'),
(10, 'uploads/7.jpg'),
(11, 'uploads/8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hero_section`
--

CREATE TABLE `hero_section` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_section`
--

INSERT INTO `hero_section` (`id`, `link`, `video_path`) VALUES
(21, 'https://chat.openai.com/c/21f5820b-a0c6-44f3-9729-bbcf63d11b42', 'uploads/y2mate.com - Cancer Treatment IMRT Radiation Therapy_1080p.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(10, 'admin', 'admin@gmail.com', '12345', 'admin'),
(11, 'BYIRINGIRO', 'new@kepler.com', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `image_path`) VALUES
(33, 'uploads/1.png'),
(34, 'uploads/2.png'),
(35, 'uploads/3.png'),
(36, 'uploads/4.png'),
(37, 'uploads/5.png'),
(38, 'uploads/6.png'),
(39, 'uploads/7.png'),
(46, 'uploads/8.png');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('pending','completed','overdue') NOT NULL DEFAULT 'pending',
  `image` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_count`
--

CREATE TABLE `task_count` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_counts`
--

CREATE TABLE `task_counts` (
  `id` int(11) NOT NULL,
  `status` enum('pending','completed','overdue') NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_counts`
--

INSERT INTO `task_counts` (`id`, `status`, `count`) VALUES
(105, 'completed', 0),
(106, 'overdue', 0),
(107, 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `role`, `image_path`, `twitter`, `facebook`, `linkedin`, `instagram`) VALUES
(6, 'mobiles', 'HR', 'uploads/4.jpg', 'https://chat.openai.com/c/599946cd-9a4f-4f60-82d7-e23ca68a1b9c', 'https://chat.openai.com/c/599946cd-9a4f-4f60-82d7-e23ca68a1b9c', 'https://chat.openai.com/c/599946cd-9a4f-4f60-82d7-e23ca68a1b9c', 'https://chat.openai.com/c/599946cd-9a4f-4f60-82d7-e23ca68a1b9c'),
(7, ' BYIRINGIRO DAMOUR', 'HR', 'uploads/1.jpg', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/'),
(8, 'darius', 'management', 'uploads/2.jpg', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/'),
(9, ' BYIRINGIRO DAMOUR', 'DM', 'uploads/4.jpg', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/'),
(10, 'BYIRINGIRO DAMOUR', 'CEO', 'uploads/3.jpg', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/'),
(14, 'mobiles', 'HR', 'uploads/5.jpg', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `team_section`
--

CREATE TABLE `team_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_section`
--

INSERT INTO `team_section` (`id`, `title`, `subtitle`) VALUES
(1, 'Meet The Team', 'Empowered team to address cancer everywhere'),
(7, 'Meet The Team', 'Empowered team to address cancer everywhere'),
(8, 'Meet The Team ', 'Empowered team to address cancer everywhere');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq_entries`
--
ALTER TABLE `faq_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_section`
--
ALTER TABLE `hero_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_count`
--
ALTER TABLE `task_count`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `task_counts`
--
ALTER TABLE `task_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_section`
--
ALTER TABLE `team_section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_entries`
--
ALTER TABLE `faq_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hero_section`
--
ALTER TABLE `hero_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `task_count`
--
ALTER TABLE `task_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_counts`
--
ALTER TABLE `task_counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team_section`
--
ALTER TABLE `team_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
