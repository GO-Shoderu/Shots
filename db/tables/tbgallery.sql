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
-- Table structure for table `tbgallery`
--

CREATE TABLE `tbgallery` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` char(50) NOT NULL,
  `description` char(30) NOT NULL,
  `hashtags` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbgallery`
--

INSERT INTO `tbgallery` (`image_id`, `user_id`, `filename`, `description`, `hashtags`) VALUES
(1, 1, 'gallery/bianca.jpg', 'Baby Bianca is born today', '#baby #bianca #cutie'),
(2, 1, 'gallery/idris.jpg', 'Idris the worlds Legend is bor', '#legend'),
(3, 1, 'gallery/mike.jpg', 'Mike is born today, I am so ha', '#iamagranny'),
(6, 1, 'gallery/gabrielle.jpg', 'I call her the noodle kid.', '#noodles #health #smiles'),
(7, 4, 'gallery/christina.jpg', 'Just another day at the office', '#doctors #burke #christina #interns'),
(9, 3, 'gallery/IMG-20201107-WA0010.jpg', 'Out with friends, outside codi', '#coder'),
(10, 3, 'gallery/Hangout-image.jpg', 'Hanging out with Friends', '#devHangout'),
(11, 5, 'gallery/chilling.jpg', 'My Partner in crime', '#partner #lover'),
(12, 5, 'gallery/dontCare.jpg', 'I dont care face', '#marraigeCrash'),
(15, 5, 'gallery/partInCrime.jpg', 'Memories', '#honeyMoonPhase'),
(24, 5, 'gallery/shrink.jpg', 'Moving on', '#movingOn'),
(27, 5, 'gallery/difficult.jpg', 'Bigger things in mind', '#movingOn'),
(28, 7, 'gallery/team.jpg', 'With the team', '#wining'),
(29, 7, 'gallery/team2.jpg', 'Just another happy day', '#savingLifes'),
(30, 8, 'gallery/tears.jpg', 'Helpless Romantic', '#itEndedInTears'),
(31, 8, 'gallery/sick.jpg', 'Treating my sickness', '#iDontDeserveIt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
