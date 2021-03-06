-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2018 at 07:56 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playlister`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sublist`
--

CREATE TABLE `tbl_sublist` (
  `sublist_id` int(10) UNSIGNED NOT NULL,
  `sublist_name` varchar(50) NOT NULL,
  `sublist_image` varchar(300) NOT NULL,
  `sublist_desc` varchar(500) NOT NULL,
  `sublist_numberOfTracks` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sublist_tracks`
--

CREATE TABLE `tbl_sublist_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `sublist_id` int(10) UNSIGNED NOT NULL,
  `tracks_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sublist_tracks`
--

INSERT INTO `tbl_sublist_tracks` (`id`, `sublist_id`, `tracks_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracks`
--

CREATE TABLE `tbl_tracks` (
  `tracks_id` int(10) UNSIGNED NOT NULL,
  `tracks_title` varchar(110) NOT NULL,
  `tracks_type` varchar(50) DEFAULT NULL,
  `tracks_content` varchar(50) NOT NULL,
  `tracks_artist` varchar(64) NOT NULL,
  `tracks_upvote` int(10) UNSIGNED NOT NULL,
  `tracks_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tracks`
--

INSERT INTO `tbl_tracks` (`tracks_id`, `tracks_title`, `tracks_type`, `tracks_content`, `tracks_artist`, `tracks_upvote`, `tracks_image`) VALUES
(1, 'Can a Laser Cut Hair?', 'youtube', '9E9TILf-b0w', 'William Osman', 0, 'https://i.ytimg.com/vi/9E9TILf-b0w/hqdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upvotes`
--

CREATE TABLE `tbl_upvotes` (
  `upvote_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_upvotes`
--

INSERT INTO `tbl_upvotes` (`upvote_id`, `users_id`, `tracks_id`) VALUES
(1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `users_uName` varchar(64) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_fullName` varchar(200) NOT NULL,
  `users_email` varchar(750) NOT NULL,
  `users_accLevel` varchar(100) NOT NULL,
  `users_creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_uName`, `users_password`, `users_fullName`, `users_email`, `users_accLevel`, `users_creationDate`) VALUES
(23, 'Gustave', '$2y$10$1CfE1pe9j5EXBVbFjmkeXebKK10yErQOyqeTOOgLwk9XjwnUEKhpq', 'Gustave H, of the Grand Budapest Hotel', 'gus_h@grandbudapest.com', 'regUser', '2018-05-07 04:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_tracks`
--

CREATE TABLE `tbl_users_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tracks_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_tracks`
--

INSERT INTO `tbl_users_tracks` (`id`, `users_id`, `tracks_id`) VALUES
(1, 23, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sublist`
--
ALTER TABLE `tbl_sublist`
  ADD PRIMARY KEY (`sublist_id`);

--
-- Indexes for table `tbl_sublist_tracks`
--
ALTER TABLE `tbl_sublist_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
  ADD PRIMARY KEY (`tracks_id`);

--
-- Indexes for table `tbl_upvotes`
--
ALTER TABLE `tbl_upvotes`
  ADD PRIMARY KEY (`upvote_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `tbl_users_tracks`
--
ALTER TABLE `tbl_users_tracks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sublist`
--
ALTER TABLE `tbl_sublist`
  MODIFY `sublist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sublist_tracks`
--
ALTER TABLE `tbl_sublist_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
  MODIFY `tracks_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_upvotes`
--
ALTER TABLE `tbl_upvotes`
  MODIFY `upvote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_users_tracks`
--
ALTER TABLE `tbl_users_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
