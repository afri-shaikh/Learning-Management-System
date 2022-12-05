-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `a_id` int(10) NOT NULL,
  `about` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`a_id`, `about`) VALUES
(1, 'High tuition rates and a lack of customization in traditional education are driving many students to seek alternatives to obtaining a college education from traditional colleges and universities. In this article I will share 8 eLearning websites that offer students inspiring educational alternatives.\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_answer`
--

CREATE TABLE `assignment_answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(145) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_answer`
--

INSERT INTO `assignment_answer` (`answer_id`, `question_id`, `answer`, `con_id`) VALUES
(1, 26, 'structure language', 1),
(2, 27, 'no structure', 1),
(5, 28, 'not program language', 1),
(6, 35, 'not program language', 1),
(7, 30, 'c is irritaing language', 1),
(8, 31, 'structure language', 1),
(10, 34, 'structure language', 1),
(11, 29, 'not program language', 1),
(12, 32, 'no structure', 1),
(13, 33, 'not program language', 1),
(14, 23, 'no structure', 1),
(15, 24, 'no structure', 1),
(16, 25, 'not program language', 1),
(17, 36, 'c is irritaing language', 1),
(18, 37, 'structure language', 1),
(19, 38, 'no structure', 1),
(20, 39, 'not program language', 1),
(21, 40, 'c is irritaing language', 1),
(22, 23, 'no structure', 4),
(23, 24, 'no structure', 4),
(24, 25, 'structure language', 4),
(25, 36, 'no structure', 4),
(26, 37, 'no structure', 4),
(27, 38, 'no structure', 4),
(28, 39, 'no structure', 4),
(29, 40, 'no structure', 4),
(30, 26, 'not program language', 4),
(31, 27, 'not program language', 4),
(32, 28, 'c is irritaing language', 4),
(33, 29, 'not program language', 4),
(34, 32, 'structure language', 4),
(35, 33, 'no structure', 4),
(36, 34, 'c is irritaing language', 4),
(37, 35, 'structure language', 4);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_questions`
--

CREATE TABLE `assignment_questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(110) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `lecture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_questions`
--

INSERT INTO `assignment_questions` (`question_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `lecture_id`) VALUES
(23, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(24, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(25, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(26, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(27, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(28, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(29, '', 'structure language1', 'c is irritaing language', 'not program language', '', 'not program language', 6),
(30, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(31, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(32, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(33, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(34, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(35, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 6),
(36, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(37, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(38, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(39, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5),
(40, 'what is c features?', 'structure language', 'no structure', 'not program language', 'c is irritaing language', 'no structure', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `con_id`, `c_id`, `date`) VALUES
(8, 0, 4, '2020-07-08 07:33:44'),
(10, 0, 6, '2020-09-11 08:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_icon`) VALUES
(1, 'Development', '<i class=\"fas fa-code\"></i>'),
(2, 'desgin', '<i class=\"fas fa-crop\"></i>'),
(10, 'marketing', '<i class=\"fas fa-business-time\"></i>'),
(14, 'life style', '<i class=\"fas fa-bezier-curve\"></i>'),
(16, 'Cooking', '<i class=\"fas fa-concierge-bell\"></i>'),
(18, 'electronis12', '<i class=\"fas fa-crop\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `actkey` int(11) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `add2` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `gp` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `phn` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `about` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `email`, `actkey`, `add1`, `add2`, `yt`, `fb`, `gp`, `tw`, `link`, `phn`, `role`, `password`, `photo`, `username`, `about`) VALUES
(3, 'admin@gmail.com', 1, 'bangalore', 'jp nagar', '-', '-', '-', '-', '-', '999999999', 'admin', '123', 'avatar.jpg', 'admin', 'no one can use admin page'),
(6, 'rajeshreddyappi@gmail.com', 1, '#43,2nd cross ,rukmini Nagar ,nagasandra post ,bangalore', '', '', '', '', '', '', '07676336309', 'Student', '123', 'DSC_0246.jpg', 'Rajesh', 'just cal me raj '),
(7, 'smaya@gmail.com', 4428, 'Nagasandra', '', '', '', '', '', '', '07676336309', 'Teacher', '123', 'Angry-Birds-2018-movie-wallpaper.jpg', 'raj', 'teacher'),
(8, 'rajesh50reddyrnr@gmail.com', 1, '', '', '', '', '', '', '', '7676336309', 'Student', '123', 'DSC_0145.jpg', 'rajesh', ''),
(9, 'keerthisri20393@gmail.com', 1, '', '', '', '', '', '', '', '7676336309', 'Teacher', '123', 'avatar.jpg', 'keerthana', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_details` varchar(1000) NOT NULL,
  `c_learn` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `c_level` varchar(40) NOT NULL,
  `c_price` int(11) NOT NULL,
  `c_offer` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `c_photo` varchar(100) NOT NULL,
  `c_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name`, `c_details`, `c_learn`, `cat_id`, `sub_cat_id`, `lang_id`, `c_level`, `c_price`, `c_offer`, `con_id`, `start_date`, `end_date`, `c_photo`, `c_duration`) VALUES
(2, 'php developer using pdo and msql', 'php basicsdfsdfsdfsdA paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.', 'you can develop website after the course', 1, 2, 4, 'beginner', 3000, 10, 1, '2019-01-16', '0000-00-00', '2.png', 3),
(3, 'php developer using pdo and msql yes this one', 'php basicsdfsdfsdfsdA paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.', 'you can develop website after the course', 1, 2, 2, 'beginner', 3000, 10, 1, '2019-01-24', '0000-00-00', 'c-cpp-programing.jpg', 3),
(4, 'c sharpphp deve', 'dfsdfsdfsdA paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written beside\") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences.', 'A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written ', 1, 2, 2, 'beginner', 345, 10, 1, '2019-01-24', '0000-00-00', '1a666720-9507-4ea7-992e-8a956c83d775-a03a973121c5.small.png', 3),
(6, 'computer algorithm', 'this course contains heart of programming. it is used to analysis problem in specific way', 'A paragraph (from the Ancient Greek Ï€Î±ÏÎ¬Î³ÏÎ±Ï†Î¿Ï‚ paragraphos, \"to write beside\" or \"written ', 2, 2, 4, 'beginner', 444, 5, 2, '2019-02-03', '0000-00-00', 'images.jpg', 6),
(7, 'java', 'Java allows you to play online games, chat with people around the world, calculate your mortgage interest, and view images in 3D, just to name a few. Java software for your computer, or the Java Runtime Environment, is also referred to as the Java Runtime, Runtime Environment, Runtime, JRE, Java Virtual Machine, Virtual Machine, Java VM, JVM, VM, Java plug-in, Java plugin, Java add-on or Java download.', 'java temlets , programing skills', 1, 3, 4, 'moderate', 2500, 10, 7, '2020-09-09', '0000-00-00', '18gnjw6jdmvfcjpg.jpg', 3),
(8, 'advanced java ', 'Advanced Java is everything that goes beyond Core Java – most importantly the APIs defined in Java Enterprise Edition, includes Servlet programming, Web Services, the Persistence API, etc. It is a Web & Enterprise application development platform which basically follows client & server architecture. Advanced Java Tutorial: Need for Advance Java', 'java temlets , programing skills', 1, 3, 4, 'moderate', 1500, 5, 9, '2020-09-11', '0000-00-00', '18gnjw6jdmvfcjpg.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `q_id` int(11) NOT NULL,
  `qsn` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`q_id`, `qsn`, `ans`) VALUES
(1, 'what is recursion in c program?', 'fuction call itself multiple times.same function'),
(2, 'c feature?', 'most widely used in the world.....\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `group_number`
--

CREATE TABLE `group_number` (
  `group_number_id` int(11) NOT NULL,
  `buy_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_number`
--

INSERT INTO `group_number` (`group_number_id`, `buy_group`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `lang_id` int(10) NOT NULL,
  `lang_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`lang_id`, `lang_name`) VALUES
(1, 'kannada'),
(2, 'telugu'),
(3, 'uttar kannada'),
(4, 'English'),
(5, 'hindi');

-- --------------------------------------------------------

--
-- Table structure for table `last_submit`
--

CREATE TABLE `last_submit` (
  `submit_id` int(11) NOT NULL,
  `date_of_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lecture_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `l_details` varchar(1000) NOT NULL,
  `l_no` int(11) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `con_id`, `c_id`, `l_name`, `l_details`, `l_no`, `due_date`) VALUES
(2, 2, 2, 'Divide and Conquer and Greedy method', 'Divide and Conquer: General Method â€“ binary search â€“ finding maximum and minimum â€“ merge sort and quick\r\nsort â€“ Strassens Matrix multiplication. Greedy Method: General method â€“ knapsack problem â€“ minimum spanning\r\ntree algorithms â€“ single source shortest path algorithm â€“ scheduling, optimal storage on tapes, optimal merge\r\npatterns.', 1, '0000-00-00'),
(5, 2, 6, 'Divide and Conquer and Greedy method', 'intrduction of Divide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy methodDivide and Conquer and Greedy method', 1, '2019-03-18'),
(6, 2, 6, 'Divide and Conquer and Greedy method continue part 2', 'Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2Divide and Conquer and Greedy method continue part 2', 2, '2019-03-25'),
(8, 7, 0, 'raghu', '', 0, '0000-00-00'),
(9, 7, 7, 'raghu', 'Java software for your computer, or the Java Runtime Environment, is also referred to as the Java Runtime, Runtime Environment, Runtime, JRE, Java Virtual Machine', 2147483647, '0000-00-00'),
(10, 9, 8, 'keerthana', 'Advanced Java is everything that goes beyond Core Java – most importantly the APIs defined in Java Enterprise Edition, includes Servlet programming, Web Services, the Persistence API, etc. It is a Web & Enterprise application development platform which basically follows client & server architecture. Advanced Java Tutorial: Need for Advance Java', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `group_number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `admin_approve` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `c_id`, `con_id`, `date`, `group_number`, `status`, `admin_approve`) VALUES
(7, 2, 1, '2020-04-19', 5, '', ''),
(8, 6, 6, '2020-09-09', 6, 'send', 'approved'),
(9, 7, 8, '2020-09-11', 7, 'send', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(2, 'web designing', 1),
(3, 'app developer', 1),
(4, 'c++', 14),
(5, 'finance', 10),
(6, 'shopping', 14);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `t_id` int(10) NOT NULL,
  `term` varchar(100) NOT NULL,
  `for_whome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`t_id`, `term`, `for_whome`) VALUES
(8, 'be careful', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `ac_name` varchar(100) NOT NULL,
  `transac_id` varchar(100) NOT NULL,
  `pay_amount` float NOT NULL,
  `date_of_pay` date NOT NULL,
  `group_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `ac_name`, `transac_id`, `pay_amount`, `date_of_pay`, `group_number`, `user_id`) VALUES
(6, 'rajesh', 'xxxx123', 444, '2020-09-09', 6, 6),
(7, 'rajesh', 'xxxx123', 2500, '2020-09-11', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `upload_lec_matrial`
--

CREATE TABLE `upload_lec_matrial` (
  `up_lec_met_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `lec_video` varchar(400) NOT NULL,
  `lec_pdf` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_lec_matrial`
--

INSERT INTO `upload_lec_matrial` (`up_lec_met_id`, `lecture_id`, `lec_video`, `lec_pdf`) VALUES
(1, 2, 'add_textbox_dynamically_using_jquery.mp4', ''),
(2, 5, 'add_textbox_dynamically_using_jquery.mp4', 'gsm_tutorial.pdf'),
(3, 5, 'add_textbox_dynamically_using_jquery.mp4', 'gsm_tutorial.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assignment_answer`
--
ALTER TABLE `assignment_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment_questions`
--
ALTER TABLE `assignment_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `group_number`
--
ALTER TABLE `group_number`
  ADD PRIMARY KEY (`group_number_id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `last_submit`
--
ALTER TABLE `last_submit`
  ADD PRIMARY KEY (`submit_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `upload_lec_matrial`
--
ALTER TABLE `upload_lec_matrial`
  ADD PRIMARY KEY (`up_lec_met_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment_answer`
--
ALTER TABLE `assignment_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `assignment_questions`
--
ALTER TABLE `assignment_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_number`
--
ALTER TABLE `group_number`
  MODIFY `group_number_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `lang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `last_submit`
--
ALTER TABLE `last_submit`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upload_lec_matrial`
--
ALTER TABLE `upload_lec_matrial`
  MODIFY `up_lec_met_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
