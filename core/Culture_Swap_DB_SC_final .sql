-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 08, 2023 at 10:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `culture_swap`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Id`, `post_id`, `user_id`, `content`, `date`) VALUES
(1, 1, 1, 'Great post, thanks for sharing!', '2023-05-02 14:00:00'),
(2, 2, 2, 'Great post, thanks for sharing!', '2023-05-02 14:00:00'),
(3, 2, 2, 'Great post, thanks for sharing!', '2023-05-02 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Rate_average` int(11) NOT NULL,
  `Traveller_num` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`Id`, `User_id`, `Status`, `Description`, `Rate_average`, `Traveller_num`, `Location`) VALUES
(1, 1, 'Active', 'Beautiful apartment with great view', 4, 10, 'New York'),
(2, 2, 'Inactive', 'Cozy cottage in the countryside', 5, 5, 'London'),
(3, 3, 'Active', 'Luxurious penthouse with ocean view', 5, 20, 'Los Angeles'),
(4, 4, 'Inactive', 'Cozy cottage in the countryside', 5, 5, 'London');

-- --------------------------------------------------------

--
-- Table structure for table `host_need`
--

CREATE TABLE `host_need` (
  `Host_id` int(11) NOT NULL,
  `Need_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `host_rate`
--

CREATE TABLE `host_rate` (
  `host_id` int(11) NOT NULL,
  `traveller_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `host_review`
--

CREATE TABLE `host_review` (
  `host_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `host_traveller`
--

CREATE TABLE `host_traveller` (
  `traveller_id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interaction`
--

CREATE TABLE `interaction` (
  `code` int(11) NOT NULL,
  `action_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interaction`
--

INSERT INTO `interaction` (`code`, `action_type`) VALUES
(1, 'Like'),
(2, 'Comment'),
(3, 'Share'),
(4, 'Follow'),
(5, 'Unfollow'),
(6, 'Block'),
(7, 'Report'),
(8, 'Flag');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `action` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Id`, `sender_id`, `reciever_id`, `content`, `status`, `action`, `action_id`) VALUES
(1, 1, 2, 'You have a new message!', 0, 1, 0),
(2, 3, 1, 'Your post has been liked!', 1, 2, 0),
(3, 2, 1, 'Your reservation request has been approved!', 0, 3, 0),
(4, 4, 1, 'You have a new follower!', 1, 4, 0),
(5, 1, 3, 'You have been invited to join a group!', 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `title` varchar(50) NOT NULL,
  `love_num` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `img` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Id`, `user_id`, `content`, `title`, `love_num`, `date`, `img`) VALUES
(1, 1, 'This is the content of my first post.', 'My First Post', 5, '2023-05-02 12:00:00', NULL),
(2, 2, 'This is the content of my first post.', 'My First Post', 0, '2023-05-02 12:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Id` int(11) NOT NULL,
  `traveller_id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Id`, `name`) VALUES
(1, 'Animals & Farming'),
(2, 'packpaker Hotels &hospitality'),
(3, 'Farming & Homesteads'),
(4, 'Building & Restoration'),
(5, 'Teaching & language'),
(6, 'intenships Abroad');

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_fav_hosts`
--

CREATE TABLE `traveller_fav_hosts` (
  `traveller_id` int(11) NOT NULL,
  `fav_host_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_friend`
--

CREATE TABLE `traveller_friend` (
  `traveller_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_service`
--

CREATE TABLE `traveller_service` (
  `traveller_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_vip`
--

CREATE TABLE `traveller_vip` (
  `traveller_id` int(11) NOT NULL,
  `payment_option` varchar(20) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `cvc_number` varchar(3) NOT NULL,
  `exp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_post_love`
--

CREATE TABLE `user_post_love` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_post_love`
--

INSERT INTO `user_post_love` (`user_id`, `post_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `Id` int(11) NOT NULL,
  `usertype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`Id`, `usertype`) VALUES
(1, 'host'),
(2, 'traveller');

-- --------------------------------------------------------

--
-- Table structure for table `_user`
--

CREATE TABLE `_user` (
  `Id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `profile_img` blob NOT NULL,
  `cover_img` blob NOT NULL,
  `country` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_user`
--

INSERT INTO `_user` (`Id`, `first_name`, `last_name`, `user_name`, `email`, `type`, `phone_num`, `profile_img`, `cover_img`, `country`, `password`) VALUES
(1, 'omar', 'osama', '', 'omar.osama@omar.osama', 1, '1234567890', 0x3c62696e6172792d646174613e, '', 'USA', ''),
(2, 'ali', 'alaa', '', 'ali.alaa@ali.alaa', 1, '1234567889', 0x3c62696e6172792d646174613e, '', 'Uk', ''),
(3, 'halem', 'ashraf', '', 'halem.ashraf@halem.ashraf', 1, '1245567890', 0x3c62696e6172792d646174613e, '', 'egypt', ''),
(4, 'salah', 'mohamed', '', 'salah.mohamed@salah.mohamed', 1, '12315767890', 0x3c62696e6172792d646174613e, '', 'sudia', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `host_need`
--
ALTER TABLE `host_need`
  ADD PRIMARY KEY (`Host_id`,`Need_id`),
  ADD KEY `Need_id` (`Need_id`);

--
-- Indexes for table `host_rate`
--
ALTER TABLE `host_rate`
  ADD PRIMARY KEY (`host_id`,`traveller_id`),
  ADD KEY `traveller_id` (`traveller_id`);

--
-- Indexes for table `host_review`
--
ALTER TABLE `host_review`
  ADD PRIMARY KEY (`host_id`,`reviewer_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `host_traveller`
--
ALTER TABLE `host_traveller`
  ADD PRIMARY KEY (`traveller_id`,`host_id`),
  ADD KEY `host_id` (`host_id`);

--
-- Indexes for table `interaction`
--
ALTER TABLE `interaction`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `action` (`action`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `traveller_id` (`traveller_id`),
  ADD KEY `host_id` (`host_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `traveller_fav_hosts`
--
ALTER TABLE `traveller_fav_hosts`
  ADD PRIMARY KEY (`traveller_id`,`fav_host_id`);

--
-- Indexes for table `traveller_friend`
--
ALTER TABLE `traveller_friend`
  ADD PRIMARY KEY (`traveller_id`,`friend_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `traveller_service`
--
ALTER TABLE `traveller_service`
  ADD PRIMARY KEY (`traveller_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `traveller_vip`
--
ALTER TABLE `traveller_vip`
  ADD PRIMARY KEY (`traveller_id`,`card_number`);

--
-- Indexes for table `user_post_love`
--
ALTER TABLE `user_post_love`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_num` (`phone_num`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interaction`
--
ALTER TABLE `interaction`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_user`
--
ALTER TABLE `_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `_user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `host`
--
ALTER TABLE `host`
  ADD CONSTRAINT `host_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `_user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `host_need`
--
ALTER TABLE `host_need`
  ADD CONSTRAINT `host_need_ibfk_1` FOREIGN KEY (`Host_id`) REFERENCES `host` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `host_need_ibfk_2` FOREIGN KEY (`Need_id`) REFERENCES `service` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `host_rate`
--
ALTER TABLE `host_rate`
  ADD CONSTRAINT `host_rate_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `host` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `host_rate_ibfk_2` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `host_review`
--
ALTER TABLE `host_review`
  ADD CONSTRAINT `host_review_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `host` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `host_review_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `host_traveller`
--
ALTER TABLE `host_traveller`
  ADD CONSTRAINT `host_traveller_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `host_traveller_ibfk_2` FOREIGN KEY (`host_id`) REFERENCES `host` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`action`) REFERENCES `interaction` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `_user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`host_id`) REFERENCES `host` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller`
--
ALTER TABLE `traveller`
  ADD CONSTRAINT `traveller_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `_user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller_fav_hosts`
--
ALTER TABLE `traveller_fav_hosts`
  ADD CONSTRAINT `traveller_fav_hosts_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller_friend`
--
ALTER TABLE `traveller_friend`
  ADD CONSTRAINT `traveller_friend_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traveller_friend_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller_service`
--
ALTER TABLE `traveller_service`
  ADD CONSTRAINT `traveller_service_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traveller_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller_vip`
--
ALTER TABLE `traveller_vip`
  ADD CONSTRAINT `traveller_vip_ibfk_1` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_post_love`
--
ALTER TABLE `user_post_love`
  ADD CONSTRAINT `user_post_love_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `_user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_post_love_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_user`
--
ALTER TABLE `_user`
  ADD CONSTRAINT `_user_ibfk_1` FOREIGN KEY (`type`) REFERENCES `user_type` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
