-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2020 at 04:07 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbu16186258`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbalbum`
--

CREATE TABLE `tbalbum` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbalbum`
--

INSERT INTO `tbalbum` (`album_id`, `user_id`) VALUES
(1, 3),
(2, 5),
(12, 5),
(13, 7),
(14, 8),
(15, 8);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbcomment`
--

CREATE TABLE `tbcomment` (
  `comment_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcomment`
--

INSERT INTO `tbcomment` (`comment_id`, `image_id`, `user_id`, `comment`) VALUES
(2, 6, 1, 'Thnks Gold'),
(3, 2, 1, 'Idris goals'),
(4, 1, 1, 'Bianca goals'),
(5, 6, 1, 'She is more than cut'),
(6, 6, 3, 'A cutie you got ther'),
(7, 5, 1, 'she looks happy'),
(8, 7, 4, 'get urself a Burke');

-- --------------------------------------------------------

--
-- Table structure for table `tbfollow`
--

CREATE TABLE `tbfollow` (
  `follow_id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbfollow`
--

INSERT INTO `tbfollow` (`follow_id`, `follower`, `following`) VALUES
(3, 3, 1),
(5, 1, 3),
(8, 8, 7);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbreasons`
--

CREATE TABLE `tbreasons` (
  `id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbreasons`
--

INSERT INTO `tbreasons` (`id`, `reason`) VALUES
(1, 'Sensitive images'),
(2, 'it is inappropriate '),
(3, 'it is a spam'),
(4, 'Pornographic content');

-- --------------------------------------------------------

--
-- Table structure for table `tbreport`
--

CREATE TABLE `tbreport` (
  `id` int(11) NOT NULL,
  `reporter_user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbreport`
--

INSERT INTO `tbreport` (`id`, `reporter_user_id`, `post_id`, `reason`) VALUES
(3, 1, 10, 'it is inappropriate '),
(4, 12, 2, 'it is a spam');

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
-- Indexes for table `tbalbum`
--
ALTER TABLE `tbalbum`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `tbalbumcontent`
--
ALTER TABLE `tbalbumcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcomment`
--
ALTER TABLE `tbcomment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbfollow`
--
ALTER TABLE `tbfollow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbreasons`
--
ALTER TABLE `tbreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbreport`
--
ALTER TABLE `tbreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbalbum`
--
ALTER TABLE `tbalbum`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbalbumcontent`
--
ALTER TABLE `tbalbumcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbcomment`
--
ALTER TABLE `tbcomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbfollow`
--
ALTER TABLE `tbfollow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbreasons`
--
ALTER TABLE `tbreasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbreport`
--
ALTER TABLE `tbreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
