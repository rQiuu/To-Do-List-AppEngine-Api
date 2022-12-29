-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 04:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `query_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `query` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(11) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(4, 'Anmol Sharma', 'user1@gmail.com', '9876543210', '24c9e15e52afc47c225b757e7bee1f9d'),
(5, 'Aditya Sharma', 'user2@gmail.com', '9876501234', '7e58d63b60197ceb55a1c487989a3720'),
(6, 'Pritam Sharma', 'user3@gmail.com', '9871234560', '92877af70a45fd6a2ed7fe81e1236b78');

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_added` varchar(50) NOT NULL,
  `deadline` datetime NOT NULL,
  `category` enum('Home','Work','Education','Other') NOT NULL,
  `status` enum('Pending','Completed','Restored') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `name`, `email`, `title`, `description`, `date_added`, `deadline`, `category`, `status`) VALUES
(84, 'Anmol Sharma', 'user1@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', '2022-11-29 11:5:48', '2022-12-31 17:00:00', 'Education', 'Restored'),
(87, 'Aditya Sharma', 'user2@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas', '2022-11-29 11:8:18', '2023-01-07 13:00:00', 'Work', 'Pending'),
(88, 'Aditya Sharma', 'user2@gmail.com', 'Title 2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas anim nisi sed. Dignissimos, maxime voluptates!', '2022-11-29 11:9:23', '2022-12-30 14:00:00', 'Education', 'Pending'),
(89, 'Aditya Sharma', 'user2@gmail.com', 'Title 3', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', '2022-11-29 11:10:55', '2022-12-31 17:00:00', 'Work', 'Pending'),
(90, 'Pritam Sharma', 'user3@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', '2022-11-29 11:13:30', '2023-01-02 19:00:00', 'Work', 'Pending'),
(91, 'Pritam Sharma', 'user3@gmail.com', 'Title 2', 'Lorem, ipsum dolor sit amet....', '2022-11-29 11:16:15', '2023-01-05 05:00:00', 'Home', 'Pending'),
(92, 'Pritam Sharma', 'user3@gmail.com', 'Title 3', 'Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed.', '2022-11-29 11:30:50', '2023-01-10 23:00:00', 'Other', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
