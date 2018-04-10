-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 05:55 PM
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
-- Database: `projectnba`
--
CREATE DATABASE `myNBAproject`;
-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `userID` int(10) UNSIGNED NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `username` char(60) NOT NULL,
  `email` char(100) NOT NULL,
  `favTeam` char(100) NOT NULL,
  `dateCreated` date NOT NULL,
  `password` char(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`userID`, `firstName`, `lastName`, `username`, `email`, `favTeam`, `dateCreated`, `password`) VALUES
(5, 'Soy', 'Sauce', 'emptycan', 'ec@sfu.ca', 'ATL', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Yummy', 'Face', 'yumface', 'yum@sfu.ca', 'GSW', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Dave', 'England', 'betamax', 'beta@sfu.ca', 'Dallas Mavericks', '2018-03-26', 'ecbdb882ae865a07d87611437fda0772'),
(8, 'please', 'work', 'work', 'work@sfu.ca', 'Atlanta Hawkes', '2018-03-26', 'a53108f7543b75adbb34afc035d4cdf6'),
(9, 'what', 'apple', 'apple', 'apple@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '46c48bec0d282018b9d167eef7711b2c'),
(10, 'ham', 'cheese', 'cheese', 'cheese@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'test', 'user', 'test2', 'test2@sfu.ca', 'Atlanta Hawkes', '2018-03-26', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
-- ALTER TABLE `members`
--   ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- Add post and comments table for forum
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`(
  `post_id` INT(8) NOT NULL AUTO_INCREMENT,
  `post_subject` VARCHAR(255) NOT NULL,
  `post_content` TEXT NOT NULL,
  `post_cat` INT(8) NOT NULL,
  `post_date` DATETIME NOT NULL,
  `post_by` INT(8) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB;


-- DROP TABLE IF EXISTS `categories`;
-- CREATE TABLE `categories`(
--   `cat_id` INT(8) NOT NULL AUTO_INCREMENT,
--   `cat_name` VARCHAR(255) NOT NULL,
--   `cat_description` VARCHAR(255) NOT NULL,
--   UNIQUE INDEX `cat_name_unique` (`cat_name`),
--   PRIMARY KEY (`cat_id`)
-- ) ENGINE=InnoDB;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`(
  `comment_id` INT(8) NOT NULL AUTO_INCREMENT,
  `comment_content` TEXT NOT NULL,
  `comment_topic` INT(8) NOT NULL,
  `comment_date` DATETIME NOT NULL,
  `comment_by` INT(8) NOT NULL,
  PRIMARY KEY (`comment_id`)
  ) ENGINE=InnoDB; 




