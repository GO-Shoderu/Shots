-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 04:43 AM
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
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `user_id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `surname` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`user_id`, `name`, `surname`, `email`, `password`, `birthday`) VALUES
(1, 'Gabriel', 'Shoderu', 'shodyvfs@gmail.com', 'Rotimi@1995', '1995-07-11'),
(3, 'Bhek', 'Student', 'bheki.student@gmail.com', 'Bheki@1999', '1999-06-28'),
(4, 'Chris', 'Burk', 'chris.burk@gmail.com', 'Christina@1964', '1964-06-27'),
(5, 'Addis', 'Shepherd', 'addison@gmail.com', 'Addison@2020', '2020-11-19'),
(6, 'Callie', 'Torres', 'callie@gmail.com', 'Callie@2020', '2020-11-19'),
(7, 'George', 'Omarley', 'george@gmail.com', 'Omarley@2020', '2020-11-04'),
(8, 'Issie', 'Stephens', 'issie@gmail.com', 'Issie@2020', '2020-11-10'),
(9, 'Lexie', 'Grey', 'lexie@gmail.com', 'Lexie@2020', '2020-11-21'),
(10, 'edith', 'Grey', 'grey@gmail.com', 'Grey@2020', '2020-11-23'),
(11, 'Prest', 'Burke', 'pres@gmail.com', 'Pres@2020', '2020-11-28'),
(12, 'Rich', 'Webber', 'rich@gmail.com', 'Rich@2020', '2020-11-01'),
(13, 'Alex', 'Karev', 'alex@gmail.com', 'Alex@2020', '2020-11-15'),
(590, 'admin', 'admin', 'admin@gmail.com', 'admin@2020', '2020-11-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
