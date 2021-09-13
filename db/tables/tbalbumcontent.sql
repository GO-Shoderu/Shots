-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 04:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbshots`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbalbumcontent`
--

CREATE TABLE `tbalbumcontent` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `albumName` varchar(100) NOT NULL,
  `albumDescription` varchar(100) NOT NULL,
  `albumHashtags` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbalbumcontent`
--

INSERT INTO `tbalbumcontent` (`id`, `album_id`, `user_id`, `image_id`, `albumName`, `albumDescription`, `albumHashtags`) VALUES
(1, 1, 3, 9, 'Social Life', 'Out with friends', '#webDevelopers'),
(2, 1, 3, 10, 'Social Life', 'Out with friends', '#webDevelopers'),
(3, 2, 5, 11, 'My Marraige', 'Just our days at work', '#coupleGoals'),
(7, 2, 5, 15, 'My Marraige', 'Just our days at work', '#coupleGoals'),
(9, 2, 5, 24, 'My Marraige', 'Just our days at work', '#coupleGoals'),
(11, 12, 5, 27, 'Moving On', 'Bigger things in mind', '#movingOn'),
(12, 13, 7, 28, 'Team Grey', 'we do it differently', '#winingTeam'),
(13, 13, 7, 29, 'Team Grey', 'we do it differently', '#winingTeam'),
(14, 14, 8, 30, 'Lovelife', 'Helpless Romantic', '#tears'),
(15, 15, 8, 31, 'Crash Landing', 'Me on sick bed', '#sick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbalbumcontent`
--
ALTER TABLE `tbalbumcontent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbalbumcontent`
--
ALTER TABLE `tbalbumcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
