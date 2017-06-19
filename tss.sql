-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 06:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tss`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `reminder_ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `reminder_Title` varchar(100) NOT NULL,
  `reminder_Description` varchar(300) NOT NULL,
  `reminder_Date` date NOT NULL,
  `reminder_Time` time NOT NULL,
  `reminder_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`reminder_ID`, `user_name`, `reminder_Title`, `reminder_Description`, `reminder_Date`, `reminder_Time`, `reminder_Status`) VALUES
(1, 'lijia95tong', 'TOC Quiz', '', '2017-01-30', '13:00:00', 'Overdue'),
(4, 'lijia95tong', 'Web App Lab Test', 'Chapter 1 to 8', '2017-02-11', '18:00:00', 'Processing'),
(5, 'lijia95tong', 'Web App Lab Test 2', 'chapter 9 - 12', '2017-01-28', '12:10:00', 'Processing'),
(6, 'Eunice', 'FYP meeting', 'AR1005 prepare for fyp', '2017-02-16', '11:00:00', 'Overdue'),
(7, 'Eunice', 'Lunch with Dad', 'Restaurat Cyberjaya', '2017-02-23', '12:00:00', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `timetable_Day` varchar(20) NOT NULL,
  `timetable_Time` time NOT NULL,
  `timetable_Class` varchar(100) NOT NULL,
  `timetable_Venue` varchar(100) NOT NULL,
  `timetable_Session` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_ID`, `user_name`, `timetable_Day`, `timetable_Time`, `timetable_Class`, `timetable_Venue`, `timetable_Session`) VALUES
(4, 'lijia95tong', 'wednesday', '16:00:00', '3D Game Programming', 'AR1007', 'TC01'),
(5, 'lijia95tong', 'monday', '11:00:00', 'Game Physics', 'AR2004', 'TC01'),
(6, 'Eunice', 'monday', '08:00:00', 'Web App Tut', 'cr1001', 'TC01'),
(7, 'Eunice', 'tuesday', '11:00:00', 'SEM Lecture', 'xr001', 'tc02'),
(8, 'Eunice', 'wednesday', '14:00:00', 'DSS', 'ar1003', 'TC01'),
(9, 'Eunice', 'thursday', '15:00:00', 'web lecture', 'cr2006', 'TC01'),
(10, 'Eunice', 'friday', '10:00:00', 'DSS tut ', 'ar1007', 'tc02'),
(11, 'student95', 'tuesday', '11:00:00', 'Programming Fundamental', 'XR001', 'TC01'),
(12, 'lijia95tong', 'tuesday', '10:00:00', 'FYP', 'AR4004', 'TC01');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `todo_ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `todo_Title` varchar(100) NOT NULL,
  `todo_Description` varchar(300) DEFAULT NULL,
  `todo_Date` date NOT NULL,
  `todo_Time` time NOT NULL,
  `todo_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`todo_ID`, `user_name`, `todo_Title`, `todo_Description`, `todo_Date`, `todo_Time`, `todo_Status`) VALUES
(19, 'lijia95tong', 'Web App Assignment', 'Submission Due Date', '2017-01-13', '17:00:00', 'Overdue'),
(22, 'lijia95tong', 'Software Design Assignment', 'Submission Due Date', '2017-01-10', '15:00:00', 'Processing'),
(23, 'lijia95tong', 'FYP submission', 'Submission Due Date', '2017-02-06', '10:00:00', 'Processing'),
(26, 'Eunice', 'Web app asg', 'Presentation in wekk14, 3ppl in group\r\n', '2017-01-13', '08:00:00', 'Overdue'),
(27, 'Eunice', 'Web app lab test', 'tut 1 -8', '2017-02-04', '08:00:00', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `decrypt_username` varchar(50) NOT NULL,
  `decrypt_userpassword` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_group` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_gender` varchar(20) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_college` varchar(100) DEFAULT NULL,
  `user_state` varchar(100) DEFAULT NULL,
  `user_country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `user_password`, `decrypt_username`, `decrypt_userpassword`, `user_email`, `user_fullname`, `user_group`, `user_status`, `user_gender`, `user_phone`, `user_college`, `user_state`, `user_country`) VALUES
('åšüû4ÈÑ', 'åšüû4ÈÑ', 'john', 'john', 'john95@hotmail.com', 'john', 'student', 'Active', NULL, NULL, NULL, NULL, NULL),
('È9Í‘n‹Ì81\n-qã¾', 'È9Í‘n‹Ì81\n-qã¾', 'lijia95tong', 'lijia95tong', 'tongkhlee@gmail.com', 'Lee Kah Tong', 'student', 'Active', 'Male', '011-2325392', 'MMU', 'Selangor', 'Malaysia'),
('È9Í‘n‹Ì‹\n‹cŽUâ', 'È9Í‘n‹Ì‹\n‹cŽUâ', 'lijia95tongadmin', 'lijia95tongadmin', 'lijia95tongadmin@gmail.com', 'lijia95tongadmin', 'admin', 'Active', NULL, NULL, NULL, NULL, NULL),
('ÑÜnS[~ûÿM¡Ž:Æ­A', 'ÑÜnS[~ûÿM¡Ž:Æ­A', 'student95', 'student95', 'student95@gmail.com', NULL, 'student', 'Active', NULL, NULL, NULL, NULL, NULL),
('¢ûÂÀ‡S', '¢ûÂÀ‡S', 'Eunice', 'Eunice', 'Eunice@hotmail.com', 'Eunice', 'student', 'Active', NULL, NULL, NULL, NULL, NULL),
('±õžü^1c', '±õžü^1cgnñÇacÀ', 'angelina', 'angelinamock', 'angel1995212009@hotmail.com', NULL, 'student', 'Active', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`reminder_ID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_ID`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todo_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `decrypt_username` (`decrypt_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `reminder_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
