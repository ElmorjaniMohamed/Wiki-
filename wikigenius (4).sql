-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2024 at 12:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikigenius`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `create_date`, `update_date`) VALUES
(12, 'lll', '2024-01-13 12:33:59', '2024-01-13 12:33:59'),
(13, 'Caryn Nicholson', '2024-01-13 16:28:34', '2024-01-13 16:28:34'),
(14, 'Science', '2024-01-13 18:56:54', '2024-01-13 18:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `create_date`, `update_date`) VALUES
(8, 'kkkkkkklll', '2024-01-13 12:26:18', '2024-01-13 12:27:22'),
(9, 'fdghjk', '2024-01-13 12:41:26', '2024-01-13 12:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `tag_wikis`
--

CREATE TABLE `tag_wikis` (
  `tag_id` int DEFAULT NULL,
  `wiki_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag_wikis`
--

INSERT INTO `tag_wikis` (`tag_id`, `wiki_id`) VALUES
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(9, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `image`) VALUES
(14, 'vyhawo', 'ludelu@mailinator.com', '$2y$10$MBphUnwHns2Rg3mngSfhyu/ODDINDuDR39SkU3d/nDMerBS0Lw4CG', 2, 'assets/uploads/LINKEDIN.jpg'),
(15, 'zezem', 'soxujasim@mailinator.com', '$2y$10$eLU9I/q6AzJdH/hZXhuhAehyvFhhoCK3pWnkKkCkOafeklJ.OSGw2', 2, 'assets/uploads/LINKEDIN.jpg'),
(16, 'gopaxyxad', 'bytolawyb@mailinator.com', '$2y$10$nON11iyLN.dsrIza2uJ5kOHhre6pBag6iWqNloAQ/TiF9sI2rd9Wm', 2, 'assets/uploads/LINKEDIN.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wikis`
--

CREATE TABLE `wikis` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('pending','success','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  `user_id` int NOT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wikis`
--

INSERT INTO `wikis` (`id`, `title`, `content`, `image`, `status`, `user_id`, `category_id`) VALUES
(1, 'Tempore sed sed vel', 'Et voluptas animi e', NULL, 'pending', 16, 13),
(2, 'Distinctio Qui eos', 'Hic id qui velit ir', NULL, 'pending', 16, 14),
(3, 'Distinctio Qui eos', 'Hic id qui velit ir', NULL, 'pending', 16, 14),
(4, 'Vel fugiat commodi p', 'Sit non corporis la', NULL, 'pending', 16, 14),
(5, 'Vel fugiat commodi p', 'Sit non corporis la', NULL, 'pending', 16, 14),
(6, 'Nisi culpa ipsum sit', 'In dolore quis conse', NULL, 'pending', 16, 12),
(7, 'Optio rerum delenit', 'Irure exercitationem', NULL, 'pending', 16, 12),
(8, 'Fugiat adipisicing ', 'Qui id fugiat dolor', NULL, 'pending', 16, 13),
(9, 'Enim dicta facere ex', 'Eos officia aut elit', NULL, 'pending', 16, 13),
(10, 'In amet duis volupt', 'Excepteur mollit mol', NULL, 'pending', 16, 14),
(11, 'Voluptate nihil ex e', 'Optio est Nam et ac', 'about-3.jpg', 'pending', 16, 12),
(12, 'Ratione voluptates n', 'Aut magnam est sunt', '', 'pending', 16, 13),
(13, 'Sed consequatur qui', 'Est iusto aspernatur', '', 'pending', 16, 12),
(14, 'Duis voluptatum quid', 'Sed laudantium odit', '', 'pending', 16, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_wikis`
--
ALTER TABLE `tag_wikis`
  ADD KEY `fk_tag_wikis_tags` (`tag_id`),
  ADD KEY `fk_tag_wikis_wikis` (`wiki_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wiki_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tag_wikis`
--
ALTER TABLE `tag_wikis`
  ADD CONSTRAINT `fk_tag_wikis_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_wikis_wikis` FOREIGN KEY (`wiki_id`) REFERENCES `wikis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `fk_wiki_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
