-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 01:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youcode_library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_token` varchar(256) NOT NULL,
  `admin_name` varchar(256) DEFAULT NULL,
  `admin_email` varchar(256) DEFAULT NULL,
  `admin_password` varchar(256) DEFAULT NULL,
  `admin_birthday` date DEFAULT NULL,
  `admin_avatar` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_token`, `admin_name`, `admin_email`, `admin_password`, `admin_birthday`, `admin_avatar`) VALUES
('87a23b8a59c48bb9f1446d6169fb4d3a', ' Mohamed Amine El Aabdi', 'amineelaabdi@gmail.com', '$2y$10$rNdp16TY1TjEZ1/YTawAMeGf5jmJIHkfpa9G9evexccuP8OVXCtfm', '2004-01-14', NULL),
('ab8d69dc99e9dc277bb7a6b3a82feeb6', ' Mouad El Amraoui', 'mouadelamraoui@gmail.com', '$2y$10$cCEnoTr4aQBmrBWl4vSaZeJK2g1O.juxW2VhVzW/LGJHbYIsbMN0W', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(256) DEFAULT NULL,
  `book_quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_quantite`) VALUES
(4, 'EAST OF EDEN ', 20),
(6, 'VILE BODIES', 20),
(7, 'A SCANNER DARKLY', 20),
(8, 'MOAB IS MY WASHPOT', 20),
(9, 'NUMBER THE STARS', 20),
(10, 'NOLI ME TANGERE', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_student_token` varchar(256) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_student_token`, `order_date`, `order_book_id`) VALUES
(246, '3', '2022-11-20', 4),
(248, '5', '2022-11-20', 6),
(249, '1', '2022-11-20', 7),
(250, '2', '2022-11-25', 8),
(251, '4', '2022-11-22', 9),
(255, '4', '2022-11-28', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_token` varchar(256) NOT NULL,
  `student_name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_token`, `student_name`) VALUES
('1', 'Amine El Aabdi'),
('2', 'Mouad El Amraoui'),
('3', 'Yassine Qassimi'),
('4', 'Adil El Fadili'),
('5', 'Ahmad Khoutari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_token`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_order_book_id` (`order_book_id`),
  ADD KEY `FK_order_student_token` (`order_student_token`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_book_id` FOREIGN KEY (`order_book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_student_token` FOREIGN KEY (`order_student_token`) REFERENCES `students` (`student_token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
