-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:01 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `author_social_twitter` varchar(255) DEFAULT NULL,
  `author_social_facebook` varchar(255) DEFAULT NULL,
  `author_social_instagram` varchar(255) DEFAULT NULL,
  `author_bio` text DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `blockquote` text DEFAULT NULL,
  `content1_subtitle` varchar(255) DEFAULT NULL,
  `content1_content` text DEFAULT NULL,
  `content2_subtitle` varchar(255) DEFAULT NULL,
  `content2_content` text DEFAULT NULL,
  `content3_subtitle` varchar(255) DEFAULT NULL,
  `content3_content` text DEFAULT NULL,
  `content_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `author_name`, `author_image`, `author_social_twitter`, `author_social_facebook`, `author_social_instagram`, `author_bio`, `publish_date`, `paragraph`, `blockquote`, `content1_subtitle`, `content1_content`, `content2_subtitle`, `content2_content`, `content3_subtitle`, `content3_content`, `content_image`) VALUES
(62, 'uploads/blog-1.jpg', 'this is the time in knew you ', 'kamana Darius', 'uploads/blog-recent-1.jpg', '', '', '', 'tmakfdd fdfkdf dfkd kf fkfdk fdkfkd fk fkfk kf', '2024-01-27', 'looeffldddkdkdkdkdkdk', 'ths sit eir eoai afodfdodmos', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'never let it of isddoossosoosososos', ' rasdfoiaj divjsodisdoizji', 'nenver let it idos od osooososoossosoos', ' sorgjdoisdzj', 'this is itei it o sdodoosoodo', ''),
(63, 'uploads/blog-1.jpg', 'this is how it must b', 'my ava ovdaos fiaofd', 'uploads/blog-author.jpg', '', '', '', 'this is', '0000-00-00', 'killler', 'this is t', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'i can lie ', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation\'s workforce and productivity', 'this is the time for that', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'wazalendu', 'uploads/blog-inside-post.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_posts`
--

CREATE TABLE `recent_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `blockquote` text DEFAULT NULL,
  `content1_subtitle` varchar(255) DEFAULT NULL,
  `content1_content` text DEFAULT NULL,
  `content2_subtitle` varchar(255) DEFAULT NULL,
  `content2_content` text DEFAULT NULL,
  `content3_subtitle` varchar(255) DEFAULT NULL,
  `content3_content` text DEFAULT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  `author_bio` text DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `author_social_twitter` varchar(255) DEFAULT NULL,
  `author_social_facebook` varchar(255) DEFAULT NULL,
  `author_social_instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_posts`
--

INSERT INTO `recent_posts` (`id`, `title`, `author_name`, `publish_date`, `image`, `paragraph`, `blockquote`, `content1_subtitle`, `content1_content`, `content2_subtitle`, `content2_content`, `content3_subtitle`, `content3_content`, `content_image`, `author_bio`, `author_image`, `author_social_twitter`, `author_social_facebook`, `author_social_instagram`) VALUES
(3, 'fuck you ', 'my ava ovdao', '2024-01-26', 'uploads/comments-2.jpg', 'tkhoaosdofosdfsdofsofofosfofodosdo', 'thankdofd od ', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'thi is isfd sod fsdo do', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation', 'this is it sodfs o', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'this is towae odfsdfod ofs', '', 'killlllllllllllllllllllllll', 'uploads/comments-3.jpg', 'eeeeeeeeeeeeeee', 'damdnd', 'ma faodidso'),
(4, 'this is     not time to takl ', 'my ava ovdaos fiaofd', '2024-01-26', 'uploads/blog-author.jpg', 'tkhoaosdofosdfsdofsofofosfofodosdo', 'thankdofd od ', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'thi is isfd sod fsdo do', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation\'s workforce and productivity', 'this is it sodfs o', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'this is towae odfsdfod ofs', 'uploads/blog-1.jpg', 'killlllllllllllllllllllllll', 'uploads/blog-author.jpg', 'eeeeeeeeeeeeeee', 'damdnd', 'ma faodidso'),
(5, 'this is     not time to takl ', 'my ava ovdaos fiaofd', '2024-01-26', 'uploads/blog-author.jpg', 'tkhoaosdofosdfsdofsofofosfofodosdo', 'thankdofd od ', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'thi is isfd sod fsdo do', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation\'s workforce and productivity', 'this is it sodfs o', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'this is towae odfsdfod ofs', 'uploads/blog-1.jpg', 'killlllllllllllllllllllllll', 'uploads/blog-author.jpg', 'eeeeeeeeeeeeeee', 'damdnd', 'ma faodidso'),
(6, 'this is     not time to takl ', 'my ava ovdaos fiaofd', '2024-01-26', 'uploads/blog-author.jpg', 'tkhoaosdofosdfsdofsofofosfofodosdo', 'thankdofd od ', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'thi is isfd sod fsdo do', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation\'s workforce and productivity', 'this is it sodfs o', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'this is towae odfsdfod ofs', 'uploads/blog-1.jpg', 'killlllllllllllllllllllllll', 'uploads/blog-author.jpg', 'eeeeeeeeeeeeeee', 'damdnd', 'ma faodidso'),
(7, 'this is     not time to takl ', 'my ava ovdaos fiaofd', '2024-01-26', 'uploads/blog-author.jpg', 'tkhoaosdofosdfsdofsofofosfofodosdo', 'thankdofd od ', 'One of the foremost economic repercussions of cancer lies in the substantial financial burden it imposes on both individuals and the healthcare system.', 'thi is isfd sod fsdo do', 'Beyond the direct financial impact, cancer can also have indirect consequences on a nation\'s workforce and productivity', 'this is it sodfs o', 'The long-term economic consequences of cancer extend to the broader implications for innovation and human capital.', 'this is towae odfsdfod ofs', 'uploads/blog-1.jpg', 'killlllllllllllllllllllllll', 'uploads/blog-author.jpg', 'eeeeeeeeeeeeeee', 'damdnd', 'ma faodidso');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_id` (`blog_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `recent_posts`
--
ALTER TABLE `recent_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_posts`
--
ALTER TABLE `recent_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `login_email_verification`.`tbl_user` (`tbl_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
