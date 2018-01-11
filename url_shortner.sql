-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 07:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `url_shortner`
--

CREATE TABLE `url_shortner` (
  `url_id` varchar(5) NOT NULL,
  `long_url` varchar(255) NOT NULL,
  `short_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_shortner`
--

INSERT INTO `url_shortner` (`url_id`, `long_url`, `short_url`) VALUES
('hi', 'http://lipsindiaphpstudent.in/sarang/Sarang_Tutorials_Site/', 'http://localhost/us/hi'),
('wwc', 'https://www.w3schools.com/', 'http://localhost/us/wwc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_shortner`
--
ALTER TABLE `url_shortner`
  ADD PRIMARY KEY (`url_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
