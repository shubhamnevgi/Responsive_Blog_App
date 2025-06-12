-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 02:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Tech Trends', 'Explore the latest breakthroughs, gadgets, and innovations in technology&mdash;everything from AI tools to cybersecurity tips.'),
(2, 'Lifestyle &amp; Wellness', 'Articles on mental health, productivity hacks, fitness routines, and mindful living to inspire a balanced life.'),
(3, 'Creative Corner', 'Dive into art, photography, music, and personal expression. This space celebrates imagination and craft.'),
(4, 'Travel Tales', 'From hidden gems to travel tips, these stories span cities, cultures, and unforgettable journeys.'),
(5, 'Startup &amp; Business', 'Insights and strategies for entrepreneurs, freelancers, and small businesses navigating the digital world.'),
(6, 'Food &amp; Recipes', 'From street food to gourmet delights, savor culinary stories and kitchen experiments that bring people together.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `posts`:
--   `author_id`
--       `users` -> `id`
--   `category_id`
--       `categories` -> `id`
--

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'Chasing Monsoons: A Journey Through India&rsquo;s Rain-Kissed Destinations', 'As the monsoon clouds roll in, India transforms into a painter&#039;s canvas&mdash;lush, vibrant, and dramatically beautiful. From the misty hills of Munnar to the thundering waterfalls of Cherrapunji, the rains bring new life and adventure to the land. \r\n\r\nIn this post, we travel across five breathtaking monsoon-friendly spots that awaken the wanderlust in every soul. You&#039;ll discover secret forest trails in Coorg, the magic of train rides through the Western Ghats, and even rainy-day street food gems in Mumbai.\r\n\r\nAlongside travel tips, you&#039;ll find stories from locals, myths tied to the rain, and stunning visuals that capture the season&rsquo;s drama. Whether you&#039;re a nature lover or a cozy cafe chaser, this journey promises to leave you soaked in wonder.', '1749727340blog42.jpg', '2025-06-12 11:22:20', 4, 1, 1),
(2, 'Windswept Evenings in Pondicherry', 'The charm of Pondicherry lies in its quiet streets and mustard-colored colonial homes. Walking by the sea after sunset felt like time itself had slowed down. Here&rsquo;s why I think this coastal town deserves more love during monsoon season.', '1749727785blog7.jpg', '2025-06-12 11:29:45', 4, 2, 0),
(3, 'Top 5 VS Code Extensions You&rsquo;re Not Using But Should', 'These under-the-radar extensions can save you hours&mdash;literally. From AI-assisted debugging to seamless Git control, here&rsquo;s my handpicked list of VS Code supertools.', '1749727903blog16.jpg', '2025-06-12 11:31:43', 1, 3, 0),
(4, 'How I Turned Paper Scraps into Wall Art', 'A pile of discarded paper, scissors, glue, and one rainy weekend&mdash;that&rsquo;s all it took. Sharing my DIY collage art journey with you, step by step.', '1749728003blog70.jpg', '2025-06-12 11:33:23', 3, 4, 0),
(5, 'Into the Heart of Spiti Valley', 'Barren, cold, and breathtaking&mdash;that&rsquo;s Spiti. This post captures my ride through mountain passes, silent monasteries, and the conversations that stayed with me.', '1749728105blog8.jpg', '2025-06-12 11:35:05', 4, 5, 0),
(6, 'Sunday Brunch at Home: My Favorite 3-Recipe Combo', 'You don&rsquo;t need a fancy kitchen to whip up magic. This trio&mdash;avocado toast, masala eggs, and iced coffee&mdash;has become my Sunday ritual. Easy, cozy, and satisfying.\r\n', '1749728214blog101.jpg', '2025-06-12 11:36:54', 6, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `admin`) VALUES
(1, 'Shubham', 'Nevgi', 'Shubh27', 'shubhamnevgi27.sn@gmail.com', '$2y$10$yPeWrP/WLxM6Al6IOOcmDeuRwPDOrJ7g9QinwYd6MnkDJhpaRiRvG', '1749725418avatar8.jpg', 1),
(2, 'Meera', 'Nair', 'meera.tales', 'meera.nair@example.com', '$2y$10$7WpD4U9NwZdDpQZtCv4NEORcDcLlFQykFGK.xMmt.GhDNcTc5vzXy', '1749726615avatar5.jpg', 0),
(3, 'Zaid', 'Khan', 'zaid.tech', 'zaid.khan@example.com', '$2y$10$dSBkup/e5fxQI2QFgWuwO.Z0SITAbGBa7enzyT2FBbo4Gybhw5A8G', '1749726713avatar11.jpg', 0),
(4, 'Ishita', 'Verma', 'ishita.crafts', 'ishita.verma@example.com', '$2y$10$QpqYqCPPShdyBsQonj1uLuQg71E3ISeQnJtmz.8bde6fZ6YEGqxb6', '1749726772avatar17.jpg', 0),
(5, 'Arjun', 'Kulkarni', 'arjun.world', 'arjun.kulkarni@example.com', '$2y$10$cxMwEBsH14kRMAMaEiChbO..Z29hG/3PMTm10qsnhAAoUB4qTuzh.', '1749726839avatar2.jpg', 0),
(6, 'Fatima', 'Ansari', 'fatima.foodie', 'fatima.ansari@example.com', '$2y$10$zTTrb9OV91syKEi.37Rf9u3USnju8Wh4MWU3YcnpJw6Sx2p9rEShy', '1749726901avatar9.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
