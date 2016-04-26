-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2016 at 06:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `author_info`
--

CREATE TABLE `author_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author_info`
--

INSERT INTO `author_info` (`id`, `firstname`, `lastname`) VALUES
(1, 'Jason', 'West'),
(2, 'English', 'Out');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_info_id` int(11) DEFAULT NULL,
  `rentable_days` int(11) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_authors_info`
--

CREATE TABLE `book_authors_info` (
  `book_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_authors_info`
--

INSERT INTO `book_authors_info` (`book_id`, `author_id`) VALUES
(1, 1),
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `category_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`category_id`, `book_id`) VALUES
(1, 1),
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `publisher` varchar(225) NOT NULL,
  `isbn` varchar(225) NOT NULL,
  `Edition` int(225) NOT NULL,
  `pages` int(225) NOT NULL,
  `image_url` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `title`, `publisher`, `isbn`, `Edition`, `pages`, `image_url`) VALUES
(1, 'I Still Can’t Speak English', 'book boon', '978-0-9561589-4-9', 1, 71, 'images/i-still-cant-speak-english.jpg'),
(2, 'English for English Speakers - Beginner: Level 1', 'book boon', '', 1, 49, 'images/english-out-there-ss1-beginner-level-1-english.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_name`) VALUES
(1, 'Language');

-- --------------------------------------------------------

--
-- Table structure for table `searchdata`
--

CREATE TABLE `searchdata` (
  `term` varchar(225) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `searchdata`
--

INSERT INTO `searchdata` (`term`, `book_id`, `date`) VALUES
('I', 1, '0000-00-00'),
('I Still', 1, '0000-00-00'),
('I Still Can’t', 1, '0000-00-00'),
('I Still Can’t Speak', 1, '0000-00-00'),
('I Still Can’t Speak English', 1, '0000-00-00'),
('Still', 1, '0000-00-00'),
('Still Can’t', 1, '0000-00-00'),
('Still Can’t Speak', 1, '0000-00-00'),
('Still Can’t Speak English', 1, '0000-00-00'),
('Can’t', 1, '0000-00-00'),
('Can’t Speak', 1, '0000-00-00'),
('Can’t Speak English', 1, '0000-00-00'),
('Speak', 1, '0000-00-00'),
('Speak English', 1, '0000-00-00'),
('English', 1, '0000-00-00'),
('book', 1, '0000-00-00'),
('book boon', 1, '0000-00-00'),
('boon', 1, '0000-00-00'),
('Jason', 1, '0000-00-00'),
('Jason West', 1, '0000-00-00'),
('West', 1, '0000-00-00'),
('English', 2, '0000-00-00'),
('English for', 2, '0000-00-00'),
('English for English', 2, '0000-00-00'),
('English for English Speakers', 2, '0000-00-00'),
('English for English Speakers -', 2, '0000-00-00'),
('English for English Speakers - Beginner:', 2, '0000-00-00'),
('English for English Speakers - Beginner: Level', 2, '0000-00-00'),
('English for English Speakers - Beginner: Level 1', 2, '0000-00-00'),
('for', 2, '0000-00-00'),
('for English', 2, '0000-00-00'),
('for English Speakers', 2, '0000-00-00'),
('for English Speakers -', 2, '0000-00-00'),
('for English Speakers - Beginner:', 2, '0000-00-00'),
('for English Speakers - Beginner: Level', 2, '0000-00-00'),
('for English Speakers - Beginner: Level 1', 2, '0000-00-00'),
('English', 2, '0000-00-00'),
('English Speakers', 2, '0000-00-00'),
('English Speakers -', 2, '0000-00-00'),
('English Speakers - Beginner:', 2, '0000-00-00'),
('English Speakers - Beginner: Level', 2, '0000-00-00'),
('English Speakers - Beginner: Level 1', 2, '0000-00-00'),
('Speakers', 2, '0000-00-00'),
('Speakers -', 2, '0000-00-00'),
('Speakers - Beginner:', 2, '0000-00-00'),
('Speakers - Beginner: Level', 2, '0000-00-00'),
('Speakers - Beginner: Level 1', 2, '0000-00-00'),
('-', 2, '0000-00-00'),
('- Beginner:', 2, '0000-00-00'),
('- Beginner: Level', 2, '0000-00-00'),
('- Beginner: Level 1', 2, '0000-00-00'),
('Beginner:', 2, '0000-00-00'),
('Beginner: Level', 2, '0000-00-00'),
('Beginner: Level 1', 2, '0000-00-00'),
('Level', 2, '0000-00-00'),
('Level 1', 2, '0000-00-00'),
('1', 2, '0000-00-00'),
('book', 2, '0000-00-00'),
('book boon', 2, '0000-00-00'),
('boon', 2, '0000-00-00'),
('English', 2, '0000-00-00'),
('English Out', 2, '0000-00-00'),
('English Out There', 2, '0000-00-00'),
('Out', 2, '0000-00-00'),
('Out There', 2, '0000-00-00'),
('There', 2, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_info`
--
ALTER TABLE `author_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_info_id` (`book_info_id`);

--
-- Indexes for table `book_authors_info`
--
ALTER TABLE `book_authors_info`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `searchdata`
--
ALTER TABLE `searchdata`
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_info`
--
ALTER TABLE `author_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_info_id`) REFERENCES `book_info` (`id`);

--
-- Constraints for table `book_authors_info`
--
ALTER TABLE `book_authors_info`
  ADD CONSTRAINT `book_authors_info_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_info` (`id`),
  ADD CONSTRAINT `book_authors_info_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author_info` (`id`);

--
-- Constraints for table `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_info` (`id`),
  ADD CONSTRAINT `book_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `searchdata`
--
ALTER TABLE `searchdata`
  ADD CONSTRAINT `searchdata_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_info` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
