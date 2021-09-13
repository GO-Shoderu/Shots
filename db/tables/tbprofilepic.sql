-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 04:42 AM
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
-- Table structure for table `tbprofilepic`
--

CREATE TABLE `tbprofilepic` (
  `user_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbprofilepic`
--

INSERT INTO `tbprofilepic` (`user_id`, `filename`) VALUES
(1, 'profilePic/profile.jpg'),
(4, 'profilePic/christina.jpg'),
(13, 'profilePic/alexKarev.jpg'),
(12, 'profilePic/richard.jpg'),
(11, 'profilePic/prestonBurke.jpg'),
(10, 'profilePic/meredith.jpg'),
(9, 'profilePic/lexieGrey.jpg'),
(8, 'profilePic/issie.jpg'),
(7, 'profilePic/GeorgeOmerlly.jpg'),
(6, 'profilePic/callieTorres.jpg'),
(5, 'profilePic/addison.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
