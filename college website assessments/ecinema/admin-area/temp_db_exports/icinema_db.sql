-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 09:17 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(5) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `first_name`, `last_name`, `password`) VALUES
(1, 'admin', 'Admin', 'User', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(5) NOT NULL,
  `carousel_image_one` text NOT NULL,
  `carousel_image_two` text NOT NULL,
  `carousel_image_three` text NOT NULL,
  `panel_one_section_one_image` text NOT NULL,
  `panel_one_section_one_title` varchar(250) NOT NULL,
  `panel_one_section_one_desc` text NOT NULL,
  `panel_one_section_two_image` text NOT NULL,
  `panel_one_section_two_title` varchar(250) NOT NULL,
  `panel_one_section_two_desc` text NOT NULL,
  `panel_one_section_three_image` text NOT NULL,
  `panel_one_section_three_title` varchar(250) NOT NULL,
  `panel_one_section_three_desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `carousel_image_one`, `carousel_image_two`, `carousel_image_three`, `panel_one_section_one_image`, `panel_one_section_one_title`, `panel_one_section_one_desc`, `panel_one_section_two_image`, `panel_one_section_two_title`, `panel_one_section_two_desc`, `panel_one_section_three_image`, `panel_one_section_three_title`, `panel_one_section_three_desc`) VALUES
(1, 'oblivion-movie.jpg', 'frozen-movie.jpg', 'man-of-steel-movie.jpg', 'oblivion-movie.jpg', 'Heading', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'frozen-movie.jpg', 'Heading', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'man-of-steel-movie.jpg', 'Heading', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `str` varchar(250) NOT NULL,
  `user_attempts` int(5) NOT NULL,
  `user_bloqued` varchar(5) NOT NULL,
  `user_deleted` varchar(5) NOT NULL,
  `user_erased` varchar(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `ip_address`, `str`, `user_attempts`, `user_bloqued`, `user_deleted`, `user_erased`) VALUES
(14, 'test', 'Test', 'User', 'test@hotmail.com', '$2a$10$WLTV.2QPHyPELPo9M2fROOJD5zBMspvhGLov9lJMgfevknJmOYLge', '::1', '$2a$10$WLTV.2QPHyPELPo9M2fROQ==', 0, 'no', 'no', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
