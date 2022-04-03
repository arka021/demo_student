-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 09:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `Short_Name` varchar(200) NOT NULL,
  `Full_Name` varchar(200) NOT NULL,
  `Cretion_Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `Short_Name`, `Full_Name`, `Cretion_Date`) VALUES
(14, 'arka', 'ghosh', '8965'),
(16, 'math123', 'putputi', '45965'),
(17, 'physics', 'dada', '456954'),
(18, 'bangla', 'hjkhkj', '45665'),
(21, 'arka ghosh', 'dodo', '464466'),
(23, 'jgjhghj', 'gkgkgj', '789446'),
(25, 'arka ghosh', 'dodo156fhfhgfghf', '54564654'),
(27, 'arka ghosh', 'utryuu', '789446'),
(30, 'arka ghosh', 'dodo156', '464466'),
(31, 'ghddfgdd', 'gghdhgd', 'gdghddh');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `course` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `graduation` varchar(300) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `city` varchar(300) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `course`, `subject`, `first_name`, `last_name`, `graduation`, `mobile_number`, `email_id`, `country`, `state`, `password`, `city`, `address`) VALUES
(1, 'ghosh', 'bangla', 'arka', 'yruyryryr', 'HFJHFHJFJHF', 2147483647, 'abc@gmail.com', 'ggghdhd', 'fhfjhfhf', '12345', 'ghfhgfhgfh', 'hfhfhf');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `s_short_name` varchar(300) NOT NULL,
  `s_full_name` varchar(300) NOT NULL,
  `Subject_1` varchar(300) NOT NULL,
  `Subject_2` varchar(300) NOT NULL,
  `Subject_3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `s_short_name`, `s_full_name`, `Subject_1`, `Subject_2`, `Subject_3`) VALUES
(1, 'physics12345', 'putputi', 'bangla', 'english12345', 'hindi'),
(2, 'bangla12345', 'ghosh', 'jhj', 'gfh', 'fgfhg'),
(3, 'math123', 'dada', 'bg', 'tr', 'lg'),
(4, 'arka', 'ghosh', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
