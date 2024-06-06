-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 18.00
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist_pcc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(11) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL,
  `refres_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `refres_token`) VALUES
(4, 'Anmol Sharma', 'user1@gmail.com', '9876543210', '24c9e15e52afc47c225b757e7bee1f9d', ''),
(5, 'Aditya Sharma', 'user2@gmail.com', '9876501234', '7e58d63b60197ceb55a1c487989a3720', ''),
(6, 'Pritam Sharma', 'user3@gmail.com', '9871234560', '92877af70a45fd6a2ed7fe81e1236b78', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` enum('Home','Work','Education','Other') NOT NULL,
  `status` enum('Pending','Completed','Restored') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `name`, `email`, `title`, `description`, `category`, `status`) VALUES
(84, 'Anmol Sharma', 'user1@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', 'Education', 'Restored'),
(87, 'Aditya Sharma', 'user2@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas', 'Work', 'Pending'),
(88, 'Aditya Sharma', 'user2@gmail.com', 'Title 2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas anim nisi sed. Dignissimos, maxime voluptates!', 'Education', 'Pending'),
(89, 'Aditya Sharma', 'user2@gmail.com', 'Title 3', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', 'Work', 'Pending'),
(90, 'Pritam Sharma', 'user3@gmail.com', 'Title 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed. Dignissimos, maxime voluptates!', 'Work', 'Pending'),
(91, 'Pritam Sharma', 'user3@gmail.com', 'Title 2', 'Lorem, ipsum dolor sit amet....', 'Home', 'Pending'),
(92, 'Pritam Sharma', 'user3@gmail.com', 'Title 3', 'Voluptates voluptas animi blanditiis quia exercitationem obcaecati nisi sed.', 'Other', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
