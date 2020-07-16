-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 09:32 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(32) NOT NULL,
  `ques` varchar(222) NOT NULL,
  `ans1` varchar(222) NOT NULL,
  `ans2` varchar(222) NOT NULL,
  `ans3` varchar(222) NOT NULL,
  `ans4` varchar(222) NOT NULL,
  `correct_ans` varchar(222) NOT NULL,
  `explanation` varchar(222) NOT NULL,
  `category` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `ques`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`, `explanation`, `category`) VALUES
(1, 'Where do you live ?', 'Dhaka ', 'Khulna', 'Chittagong', 'Barishal', '3', 'I live in CHittagong since 2011', 'Intro'),
(2, 'What is your hobby?', 'Playing Football', 'cycling', 'Computer Gamining', 'Singing ', '1', 'I am ok', 'Hobby'),
(3, 'Which class are you studing?', 'SSC', 'HSC', 'Honours', 'Degree', '3', 'I am not interested sorry broo', 'Study'),
(4, 'Whats make you happy?', 'Singing', 'Dancing ', 'Playing', 'Travelling', '4', 'No need', 'Interest'),
(5, 'How often you go outside?', 'I dont know', 'Several times', '3 times a weak', 'None of these', '1', 'I dont know really ', 'Hangout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
