-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 02:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`user_id_1`, `user_id_2`) VALUES
(2, 1),
(2, 3),
(4, 2),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `library_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`library_id`, `user_id`, `title`) VALUES
(2, 1, 'Book I\'ve finshed'),
(3, 2, 'Spooky books'),
(4, 2, 'Children\'s books'),
(11, 5, 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `library_shelf`
--

CREATE TABLE `library_shelf` (
  `library_id` int(11) NOT NULL,
  `book_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_shelf`
--

INSERT INTO `library_shelf` (`library_id`, `book_id`) VALUES
(2, '6Q5l8h-jt40C'),
(2, 'MCPjwAEACAAJ'),
(2, 'UIsCAAAACAAJ'),
(3, '2KhanicnM5EC'),
(3, '4NHyoAEACAAJ'),
(3, 'Asl0VCoBDu0C'),
(4, '5R8MzgEACAAJ'),
(4, 'kpdzBQAAQBAJ'),
(11, '2KhanicnM5EC');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` varchar(14) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `book_id`, `title`, `description`) VALUES
(1, 1, '6Q5l8h-jt40C', 'What a fun mystery!', 'Nancy is such a great protagonist! And the mystery is intriguing too!'),
(2, 1, 'JHEkAQAAMAAJ', 'A children\'s classic', 'Harry is an endearing main character for children of all ages'),
(3, 2, 'Asl0VCoBDu0C', 'What a spooooooky book', ''),
(4, 2, '2KhanicnM5EC', 'An incredible feat in cinema, and just as great as', 'Though it was hyped as a horror movie it\'s really an adventure drama as 3 very different characters come together to hunt a great white shark that\'s terrorizing a fictional New England resort island of amity.'),
(7, 2, '4B8wEAAAQBAJ', 'A children\\\'s classic', 'fchgjhkn,m'),
(8, 2, '9_UtzwEACAAJ', 'What a spooooooky book', ''),
(9, 2, '6Q5l8h-jt40C', 'Still a classic', ''),
(10, 3, '5R8MzgEACAAJ', 'A cute rom-com', 'Good for filling your time, like when waiting for a flight. 7/10'),
(11, 1, '3tvInwtsoCcC', 'Still as gripping as it was so many years ago', 'This is a graphic adaptation of the bestselling novel. When Coraline moves to a new house she is fascinated by the fact that their house is in fact only half a house.'),
(12, 1, '9_UtzwEACAAJ', 'Very fun!', 'Is eating hummus good for you? Hummus is a popular Middle Eastern dip and spread that is packed with vitamins and minerals. '),
(13, 1, '-eHPuQEACAAJ', 'Not as fun as the other ones', 'AAAAA BBBBB CCCCC DDDDD EEEEE\r\n'),
(15, 3, '9_UtzwEACAAJ', 'Very fun and campy!', 'Miss reading books like these in the 80\'s'),
(16, 3, '6Q5l8h-jt40C', 'Mind-numbingly boring...', ''),
(17, 3, '4B8wEAAAQBAJ', 'Not as fun as the other ones', ''),
(18, 3, 'Gtlz5_Xij5IC', 'Very fun!', ''),
(21, 3, 'ESEXEAAAQBAJ', 'Mind-numbingly boring...', ''),
(22, 3, '2KhanicnM5EC', 'Still a classic', ''),
(25, 2, 'HksgDQAAQBAJ', 'A children\'s classic', 'fgjkhlk fujgkk.'),
(26, 2, 'kpdzBQAAQBAJ', 'RTERG REBRSVD', ' TGE3WE RTHG3QWEQWWRB4W YRHTEGR'),
(27, 2, '5R8MzgEACAAJ', 'HERGACS', 'TERWVEACS'),
(29, 5, 'DaUqAQAAIAAJ', 'A thoroughly enjoyable book', 'btesvdcAS GERGSEFC GNRWYJYRN '),
(31, 5, 'DSizH9hgNLAC', 'WOW', ''),
(33, 2, 'j9ZLDwAAQBAJ', 'Good book, good first season', ''),
(34, 5, 'kpdzBQAAQBAJ', 'tyndrstberv  ter', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `password`, `user_type`) VALUES
(1, 'Ayesha', 'Khan', 'ayesha@email.com', '$2y$10$wzznY2sqpjssDrI1W7ya3evmySUT4GQbwgPxrQJjDKyQ.s.ZhQeFW', 'admin'),
(2, 'SAM', 'X', 'sam@email.com', '$2y$10$kFVPlWKGDtf8oEVqc6vclOBMHZKUGMaeL3C0vrVP7uHy/I66WnkSq', 'user'),
(3, 'Emily', 'Austen', 'emily@email.com', '$2y$10$3KqQHvxzifxgypQBGAita.Jf84.12podwKaR.RTowBbsfGaJwFfWK', 'user'),
(4, 'Josh', 'J', 'josh@email.com', '$2y$10$Pa7HG/zirAUJq6rqNI91belJwJJyJSLVNCM2UJ4NN643HITBGwl7O', 'user'),
(5, 'Tiffany', 'Young', 'tiff@email.com', '$2y$10$QynXZI5BlNoMsp7HIh5JZu364In5m4JcGcQ3w1F433YufGDHQoJRy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`user_id_1`,`user_id_2`),
  ADD KEY `user_id_2` (`user_id_2`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`library_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD PRIMARY KEY (`library_id`,`book_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `library_shelf`
--
ALTER TABLE `library_shelf`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`user_id_1`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`user_id_2`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD CONSTRAINT `library_shelf_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `library` (`library_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
