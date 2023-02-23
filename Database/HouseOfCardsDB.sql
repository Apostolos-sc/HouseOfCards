-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HouseOfCardsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `content`, `entryID`, `UserID`) VALUES
(0, 'wow', 1, 3),
(1, 'so cool', 2, 4),
(2, 'changed my life', 5, 6),
(3, 'thumbs down', 4, 2),
(4, 'get a life', 8, 3),
(5, 'actually i agree with capital punishment', 9, 1),
(6, 'pog', 7, 5),
(7, 'pls send bob vagen', 6, 2),
(8, 'k.', 10, 3);


-- --------------------------------------------------------

--
-- Table structure for table `CommentReply`
--

CREATE TABLE `CommentReply` (
  `id` int(10) NOT NULL,
  `commentID` int(10) NOT NULL,
  `positionID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CommentReply`
--

INSERT INTO `CommentReply` (`id`, `content`, `commentID`, `UserID`) VALUES
(0, 'cry abt it', 0, 3),
(1, 'blah', 1, 4),
(2, 'Jasmeender', 2, 6),
(3, 'Siwon', 3, 2),
(4, 'George', 4, 3),
(5, 'Daniel', 5, 1),
(6, 'Troy', 6, 5),
(7, 'Barthalomew', 7, 2),
(8, 'Putin', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `id` int(10) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`id`, `entryID`, `userID`, `rating`) VALUES
(0, 7, 0, 2),
(1, 3, 1, 4),
(2, 1, 2, 5),
(3, 6, 3, 2),
(4, 5, 4, 3),
(5, 2, 5, 1),
(6, 3, 6, 5),
(7, 8, 7, 2),
(8, 2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wikiEntry`
--

CREATE TABLE `wikiEntry` (
  `id` int(10) NOT NULL,
  `gameName` varchar(200) NOT NULL,
  `requiredItems` varchar(200) NOT NULL,
  `objective` varchar(200) NOT NULL,
  `setUp` varchar(200) NOT NULL,
  `gamePlay` varchar(200) NOT NULL,
  `rules` varchar(200) NOT NULL,
  `lastEditedBy` int(10) NOT NULL,
  `lastEditedDate` date,
  `lastEditedTime` time(6) DEFAULT NULL
  `minPlayer` int(10) NOT NULL,
  `maxPlayer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikiEntry`
--

INSERT INTO `wikiEntry` (`id`, `GameName`, `Description`, `Rules`, `LastEdit`, `EditedBy`, `MinPlayer`, `MaxPlayer`) VALUES
(0, 'Slap Jack', 'slap the jack to win', '1. play', '09/17/01', 4, 2, 8),
(1, 'Speed', 'be quick', '1. play', '09/17/01', 5, 2, 6),
(2, 'War', 'may the odds be ever in your favour', '1. play', '09/17/01', 2, 2, 4),
(3, 'Egyptian Slap', 'it hurts', '1. play', '09/17/01', 5, 2, 6),
(4, 'Spoons', 'its pig but with spoons', '1. play', '09/17/01', 3, 2, 6),
(5, 'Go Fish', 'u r a child', '1. play', '09/17/01', 7, 2, 8),
(6, 'Solitaire', 'lonely.', '1. play', '09/17/01', 7, 1, 3),
(7, 'Crazy Eights', 'ever heard of uno?', '1. play', '09/17/01', 1, 1, 3),
(8, 'Red Dog', 'woof woof', '1. play', '09/17/01', 4, 1, 3),
(9, 'Cheat', 'its good to lie.', '1. play', '09/17/01', 3, 1, 3),
(10, 'Kings In The Corner', 'patience child','1. play', '09/17/01', 6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `accessLevel` int(10) NOT NULL,
  `userGroup` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`accessLevel`, `userGroup`) VALUES
(1, 'Unregistered'),
(2, 'Logged In'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userAccessLevel` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `userAccessLevel`, `fname`, `lname`, `password`, `dob`) VALUES
(1, 'adminsayma', 'sayma@gmail.com', '3', 'Sayma', 'Haque', 'adminpass', '09/17/01'),
(2, 'adminapostolos', 'apostolos@gmail.com', '3', 'Apostolos', 'Lname', 'adminpass', '09/17/01'),
(3, 'admincarter', 'carter@ucalgary.ca', '3', 'Carter', 'Lname', 'adminpass', '09/17/01'),
(4, 'adminethan', 'ethan@ucalgary.ca', '3', 'Ethan', 'Lname', 'adminpass', '09/17/01'),
(5, 'adminjamie', 'jamie@gmail.com', '3', 'Jamie', 'Lname', 'adminpass', '09/17/01'),
(6, 'adminnick', 'nick@gmail.com', '3', 'Nick', 'Lname', 'adminpass', '09/17/01'),
(7, 'adminalex', 'alex@gmail.com', '3', 'Alex', 'Lname', 'adminpass', '09/17/01'),
(8, 'normaluser', 'mrnormal@gmail.com', '2', 'Guy', 'Normal', 'password', '09/17/01');

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `userID` int(10) NOT NULL,
  `entryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`userID`, `entryID`) VALUES
(1, 3),
(2, 5),
(3, 2);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `CommentReply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wikiEntry`
--
ALTER TABLE `wikiEntry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`accessLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `CommentReply`
--
ALTER TABLE `CommentReply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `wikiEntry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
