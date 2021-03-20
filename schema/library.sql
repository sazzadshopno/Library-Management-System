-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 10:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn_no` varchar(255) NOT NULL,
  `librarian_id` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `stock_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn_no`, `librarian_id`, `book_title`, `book_author`, `stock`, `available`, `stock_date`) VALUES
('1001', '6', 'Software Fundamentals', 'Williamson', 10, 9, '2021-01-21'),
('1002', '6', 'Complier Design', 'Ullman', 20, 20, '2021-01-20'),
('1555', '6', 'sazzzz', 'zzzz', 5, 5, '2021-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `borrowedby`
--

CREATE TABLE `borrowedby` (
  `borrow_id` int(15) NOT NULL,
  `isbn_no` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `librarian_id` varchar(255) NOT NULL,
  `librarian_name` varchar(255) NOT NULL,
  `librarian_username` varchar(255) NOT NULL,
  `librarian_password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`librarian_id`, `librarian_name`, `librarian_username`, `librarian_password`, `is_active`) VALUES
('5', 'Sazzad Shopno', 'sazzadshopno', '$2y$10$AuXWhqaUmHW3U3aw9Gq.i.ozW.3VmzTdJBcWO2JINXtc6WxNrtq4W', 1),
('6', 'Saidur Rahman', '1234', '$2y$10$RiifluKaoMZI2Mva9OL25etbhWy1nvBbxNXxy.HtUKHJnQYX00VQq', 1),
('7', 'Ahadul Islam', 'ahadul_islam', '$2y$10$fufRgY5Q59SxPLCS0jymQOCDUJntcWRttsIBQxyhDh/10nVA33AKe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `librarian_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `student_session` varchar(255) NOT NULL,
  `student_department` varchar(255) NOT NULL,
  `student_fine` int(11) NOT NULL,
  `std_reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`librarian_id`, `student_id`, `student_name`, `student_roll`, `student_session`, `student_department`, `student_fine`, `std_reg_date`) VALUES
('6', '16502001121', 'Sazzad', '254154', '2020-21', 'CSE', 0, '2021-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn_no`),
  ADD KEY `book_ibfk_1` (`librarian_id`);

--
-- Indexes for table `borrowedby`
--
ALTER TABLE `borrowedby`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowedby_ibfk_1` (`isbn_no`),
  ADD KEY `borrowedby_ibfk_2` (`student_id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarian_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowedby`
--
ALTER TABLE `borrowedby`
  MODIFY `borrow_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`librarian_id`) REFERENCES `librarian` (`librarian_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowedby`
--
ALTER TABLE `borrowedby`
  ADD CONSTRAINT `borrowedby_ibfk_1` FOREIGN KEY (`isbn_no`) REFERENCES `book` (`isbn_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowedby_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`librarian_id`) REFERENCES `librarian` (`librarian_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
