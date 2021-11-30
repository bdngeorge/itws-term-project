-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 12:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textbook_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `imgID` varchar(20) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `authors` varchar(1000) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `subjectCode` char(4) DEFAULT NULL,
  `condition` char(4) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `sellerEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `imgID`, `title`, `authors`, `isbn`, `subjectCode`, `condition`, `desc`, `price`, `sellerEmail`) VALUES
(1, 'csci-2844507230.jpg', 'Algorithms', 'Sanjoy Dasgupta, Christos Papadimitriou, Umesh Vazirani', '978-0073523408', 'csci', 'good', 'includes handwritings+highlightings', '15.00', 'admin@rpi.edu'),
(2, 'biol-8129677909.jpg', 'Essential Cell Biology', 'Bruce Alberts, Karen Hopkin, Alexander Johnson, David Morgan, Martin Raff, Keith Roberts, Peter Walter', '978-0393680379', 'biol', 'fair', 'includes handwritings+highlightings', '20.00', 'admin@rpi.edu'),
(3, 'csci-5109354294.jpg', 'Practical Programming', 'Paul Gries, Jennifer Campbell, Jason Montojo', '9781680502688', 'csci', 'new', 'csci1100, lightly used', '30.00', 'admin@rpi.edu'),
(5, 'econ-5345574294.jpg', 'Principles of Microeconomics', '\'N. Gregory Mankiw \', \'9384781502789\'', '9384781502789', 'econ', 'fair', 'used', '30.00', 'admin@rpi.edu'),
(6, 'calc-5234973584.jpg', 'Calculus Third Edition', 'William L Briggs, William Briggs, Lyle Cochran, Bernard Gillett, Eric L Schulz, Eric Schulz', '9234690702489', 'math', 'fair', 'used', '30.00', 'admin@rpi.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imgID` (`imgID`),
  ADD KEY `condition` (`condition`),
  ADD KEY `subjectCode` (`subjectCode`),
  ADD KEY `sellerEmail` (`sellerEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`condition`) REFERENCES `conditions` (`condition`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`subjectCode`) REFERENCES `subjects` (`subjectCode`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`sellerEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
