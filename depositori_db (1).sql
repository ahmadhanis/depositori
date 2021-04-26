-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 11:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depositori_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `q_id` int(6) NOT NULL,
  `form` varchar(6) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `question` varchar(500) NOT NULL,
  `ans_a` varchar(200) NOT NULL,
  `ans_b` varchar(200) NOT NULL,
  `ans_c` varchar(200) NOT NULL,
  `ans_d` varchar(200) NOT NULL,
  `ans` varchar(1) NOT NULL,
  `date_created` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`q_id`, `form`, `subject_name`, `user_email`, `question`, `ans_a`, `ans_b`, `ans_c`, `ans_d`, `ans`, `date_created`) VALUES
(1, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 6+5', '11', '5', '3', '8', 'A', '2021-04-22 17:21:16.182263'),
(2, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 6+6', '54', '4', '12', '33', 'C', '2021-04-22 17:22:23.454132'),
(3, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 6-5', '11', '5', '3', '1', 'D', '2021-04-23 06:43:55.981516'),
(4, 'Form 1', 'English', 'slumberjer@gmail.com', 'Identify whether the sentence is correct or not. My best friend in the whole world is coming over to my house to visit me this afternoon.', 'Correct', 'Incorrect, lacks a subject', ' Incorrect, lacks a verb', ' Incorrect, extra subject', 'A', '2021-04-23 06:57:27.692496'),
(5, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 5 x 10', '40', '50', '33', '77', 'B', '2021-04-23 21:16:51.679095'),
(6, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 3 + 44', '43', '44', '55', '47', 'D', '2021-04-24 06:36:01.851766'),
(7, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'what is 4 + 12', '13', '16', '16', '19', 'B', '2021-04-24 06:39:49.884679'),
(8, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'what is 4 * 12', '42', '44', '32', '12', 'A', '2021-04-24 06:40:42.815527'),
(9, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 50 + 55', '100', '105', '110', '102', 'B', '2021-04-24 07:30:37.250312'),
(10, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'What is 6 / 2', '6', '3', '2', '17', 'B', '2021-04-24 07:44:31.047691'),
(12, 'Form 1', 'English', 'slumberjer@gmail.com', 'The word expand means', 'become bigger', 'become tiny', 'become smaller', 'become shrink', 'A', '2021-04-26 13:41:24.945274'),
(13, 'Form 1', 'English', 'slumberjer@gmail.com', 'When there is no more oxygen, the flame', 'blows up', 'goes up', 'goes off', 'blows out', 'C', '2021-04-26 14:00:10.238580'),
(14, 'Form 1', 'English', 'slumberjer@gmail.com', 'The graph shows that the number of rabbits sold is', 'decreasing', 'not changing', 'accending', 'descending', 'D', '2021-04-26 14:09:27.177030'),
(15, 'Form 1', 'English', 'slumberjer@gmail.com', 'Which function should Harun use if he want\'s to play a game.', 'at noon', 'before 7 am', 'till 2 pm', 'before 10 am', 'A', '2021-04-26 14:10:27.717531');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `school` varchar(150) NOT NULL,
  `password` varchar(40) NOT NULL,
  `otp` varchar(4) NOT NULL,
  `date_reg` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`email`, `phone`, `name`, `school`, `password`, `otp`, `date_reg`) VALUES
('slumberjer@gmail.com', '0194702493', 'Ahmad Hanis Mohd Shabli', 'SK Batu Hampar', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '1', '2021-04-15 13:46:01.016075');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `q_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
