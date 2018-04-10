-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2018 at 12:51 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myNBAproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `cat_title` varchar(150) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'projectNBA First category', 'This is for tesing #1', '2018-03-04 23:44:12', 'jason1234'),
(2, 'Some random NBA stuff', 'nba is fun #2', '2018-03-04 21:50:52', '0');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_topic` int(8) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `username` char(60) NOT NULL,
  `email` char(100) NOT NULL,
  `favTeam` char(100) NOT NULL,
  `dateCreated` date NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstName`, `lastName`, `username`, `email`, `favTeam`, `dateCreated`, `password`) VALUES
(5, 'Soy', 'Sauce', 'emptycan', 'ec@sfu.ca', 'ATL', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Yummy', 'Face', 'yumface', 'yum@sfu.ca', 'GSW', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Dave', 'England', 'betamax', 'beta@sfu.ca', 'Dallas Mavericks', '2018-03-26', 'ecbdb882ae865a07d87611437fda0772'),
(8, 'please', 'work', 'work', 'work@sfu.ca', 'Atlanta Hawkes', '2018-03-26', 'a53108f7543b75adbb34afc035d4cdf6'),
(9, 'what', 'apple', 'apple', 'apple@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '46c48bec0d282018b9d167eef7711b2c'),
(10, 'ham', 'cheese', 'cheese', 'cheese@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'test', 'user', 'test2', 'test2@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'jason', 'yang', 'jerry123', 'some@email.com', 'Atlanta Hawks', '2018-03-04', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'jason', 'yang', 'jason1234', 'some@email.com', 'Charlotte Hornets', '2018-03-04', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'peter', 'yang', 'peter@sfu.ca', 'peter@sfu.ca', 'Minnesota Timberwolves', '2018-03-04', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(60) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(17, 1, 9, 'jason1234', 'thats sick', '2018-03-04 23:12:17'),
(18, 1, 9, 'jason1234', 'i know right', '2018-03-04 23:13:18'),
(19, 1, 0, 'jason1234', 'james harden is overrated, lebron should be the MVP this year', '2018-03-04 23:41:09'),
(20, 1, 0, 'jason1234', 'lebron is definitely the mvp this year', '2018-03-04 23:42:06'),
(21, 1, 12, 'jason1234', 'lebron is the mvp this year', '2018-03-04 23:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` char(60) NOT NULL,
  `topic_last_user` varchar(60) DEFAULT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `cat_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(9, 1, 'peter is testing', 'peter@sfu.ca', 'jason1234', '2018-03-04 21:18:40', '2018-03-04 23:13:18', 24),
(10, 2, 'Jason is testing ', 'jason1234', NULL, '2018-03-04 21:50:52', '2018-03-04 21:50:52', 9),
(11, 1, 'James Harden is overrated', 'jason1234', NULL, '2018-03-04 23:41:09', '2018-03-04 23:41:09', 2),
(12, 1, 'Lebron for MVP!!!', 'jason1234', 'jason1234', '2018-03-04 23:42:06', '2018-03-04 23:44:12', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_title`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
