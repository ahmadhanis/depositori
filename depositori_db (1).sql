-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 08:41 AM
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
(12, 'Form 1', 'English', 'slumberjer@gmail.com', 'The word expand means', 'become bigger', 'become tiny', 'become smaller', 'become shrink', 'A', '2021-04-26 13:41:24.945274'),
(13, 'Form 1', 'English', 'slumberjer@gmail.com', 'When there is no more oxygen, the flame', 'blows up', 'goes up', 'goes off', 'blows out', 'C', '2021-04-26 14:00:10.238580'),
(14, 'Form 1', 'English', 'slumberjer@gmail.com', 'The graph shows that the number of rabbits sold is', 'decreasing', 'not changing', 'accending', 'descending', 'D', '2021-04-26 14:09:27.177030'),
(15, 'Form 1', 'English', 'slumberjer@gmail.com', 'Which function should Harun use if he want\'s to play a game.', 'at noon', 'before 7 am', 'till 2 pm', 'before 10 am', 'A', '2021-04-26 14:10:27.717531'),
(16, 'Form 1', 'English', 'slumberjer@gmail.com', 'The rules are normally to be followed by', 'the school prefects on duty only', 'the librarians on duty only', 'any students', 'any trespassers', 'B', '2021-04-29 12:52:41.469131'),
(17, 'Form 1', 'English', 'slumberjer@gmail.com', 'If I want to go to supermarket, I should wear', 'a mask', 'wear glove', 'wear jeans', 'spread rumors', 'A', '2021-05-03 06:15:25.772343'),
(18, 'Form 1', 'English', 'slumberjer@gmail.com', 'The fair is about', 'business', 'studies', 'carrier', 'fun', 'D', '2021-05-03 06:16:07.903651'),
(19, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'There were many ways to calm your nerves and relieve stress in your life', 'is', 'are', 'were', 'or', 'B', '2021-05-03 06:22:33.264020'),
(20, 'Form 1', 'English', 'slumberjer@gmail.com', 'Andy ____ the family car', 'wash', 'washes', 'washs', 'washed', 'B', '2021-05-03 06:26:22.754082'),
(21, 'Form 1', 'English', 'slumberjer@gmail.com', 'Mr jack _____ an email every evening', 'writes', 'write', 'writs', 'written', 'A', '2021-05-03 06:26:55.773716'),
(22, 'Form 1', 'English', 'slumberjer@gmail.com', 'The girls ___ the shopping', 'do', 'does', 'done', 'did', 'B', '2021-05-03 06:27:36.132734'),
(23, 'Form 1', 'English', 'slumberjer@gmail.com', 'Every morning my mother ___ at 6.00 am', 'get up', 'gets up', 'get ups', 'got up', 'B', '2021-05-03 06:28:12.849212'),
(24, 'Form 1', 'English', 'slumberjer@gmail.com', 'From the news above we know that', 'a happy occasion turned into a sad one for Wan.', 'heart conditions will affect the first born', 'a young couple were unhappy ', 'Wan was very sad of his heart condition', 'D', '2021-05-03 06:31:14.540610'),
(25, 'Form 1', 'English', 'slumberjer@gmail.com', 'The advertisement says the following EXCEPT', 'the children in the home need donated item', 'the garage sale needs more volunteers', 'the raised fund will be given to Bakhti Children Home', 'all item sold to the public', 'D', '2021-05-03 06:32:50.381693'),
(26, 'Form 1', 'English', 'slumberjer@gmail.com', 'The gardening class will', 'provide seeds for free', 'provide refreshment', 'provide free tools', 'lasted 4 hours', 'B', '2021-05-03 06:33:44.755789'),
(27, 'Form 1', 'English', 'slumberjer@gmail.com', 'My pencil is blunt. May I borrow your _____?', 'sharpener', 'scissors', 'eraser', 'ruler', 'B', '2021-05-03 06:34:57.847274'),
(28, 'Form 1', 'English', 'slumberjer@gmail.com', 'The little boy is wearing his ', 'shirt', 'pyjamas', 'pinafore', 'shorts', 'B', '2021-05-03 06:35:30.081470'),
(29, 'Form 1', 'English', 'slumberjer@gmail.com', 'The young of deer is called a ', 'owlet', 'grub', 'fawn', 'foal', 'D', '2021-05-03 06:36:13.964190'),
(30, 'Form 1', 'English', 'slumberjer@gmail.com', 'What is a hypothesis', 'A theory', 'A suggested solution', 'An explanation', 'A random event', 'A', '2021-05-03 06:37:55.345128'),
(31, 'Form 1', 'English', 'slumberjer@gmail.com', 'What is the prefix that has value of 10 power of 6', 'Mega', 'Mili', 'Centi', 'Micro', 'B', '2021-05-03 06:38:23.908076'),
(32, 'Form 1', 'English', 'slumberjer@gmail.com', 'I ___ going to a concert', 'am', 'are ', 'is', 'were', 'A', '2021-05-03 06:46:07.493547'),
(33, 'Form 1', 'English', 'slumberjer@gmail.com', 'I moved to ____ USA when I was 15', 'a', 'the ', 'an ', 'no article', 'A', '2021-05-03 06:47:18.036340'),
(34, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'Round off 6 977 722 to the nearest ten', '6 977 730', '6 977 833', '6 977 710', '6 977 750', 'C', '2021-05-03 06:48:44.401210'),
(36, 'Form 1', 'Mathematic', 'slumberjer@gmail.com', 'The product of 8 508 x 79', '646 608', '663 624', '672 134', '663 443', 'C', '2021-05-03 06:51:17.786599'),
(46, 'Form 1', 'Science', 'slumberjer@gmail.com', 'Which of these units can be used to measure volume?', 'Balance', 'Graph Paper', 'Weighting', 'Water Displacement', 'D', '2021-05-03 11:20:13.925681');

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
  MODIFY `q_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
