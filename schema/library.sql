-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 03:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('0133943038', '8', 'Software Engineering ', 'Ian Sommerville', 50, 50, '2021-09-27'),
('978-1-60309-025-4', '8', 'Alec: The Years Have Pants', 'TBD', 50, 49, '2021-09-27'),
('978-1-891830-85-3', '8', 'American Elf (Book 2),', 'TBD', 50, 50, '2021-09-27');

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

--
-- Dumping data for table `borrowedby`
--

INSERT INTO `borrowedby` (`borrow_id`, `isbn_no`, `student_id`, `issue_date`, `due_date`, `return_date`) VALUES
(1, '978-1-60309-025-4', '16502001120', '2021-09-27', '2021-10-11', NULL);

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
('8', 'Sazzad Hossain', 'shopno', '$2y$10$aHSRW6AIBZD3jeA4VGIcoOHdMCpFR1mdJtz55SgH50nFyVXHLc2Te', 1),
('9', 'Ahadul Islam', 'ahadul@gmail.com', '$2y$10$XsTSBJd0Yq40qH4nr/ogmOL6j0dMTBBahUFcpwedVwrcLF7gFoR9K', 1);

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
('8', '16502001120', 'Sazzad Hossain', '17081', '2016-17', 'CSE', 0, '2021-09-27'),
('8', '16502001121', 'Ahadul Islam', '17099', '2016-17', 'CSE', 0, '2021-09-27'),
('8', '16502001122', 'Saidur Rahman Riad', '17090', '2016-17', 'CSE', 0, '2021-09-27'),
('8', '16502001123', 'Amin Uddin Abed', '17037', '2016-17', 'CSE', 0, '2021-09-27');

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
  MODIFY `borrow_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
