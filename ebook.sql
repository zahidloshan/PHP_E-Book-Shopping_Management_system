-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountbalance`
--

CREATE TABLE `accountbalance` (
  `sellerid` varchar(100) NOT NULL,
  `currentbalance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountbalance`
--

INSERT INTO `accountbalance` (`sellerid`, `currentbalance`) VALUES
('badhon@gmail.com', '7000'),
('zahid@gmail.com', '9980');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookname` varchar(100) NOT NULL,
  `bid` varchar(40) NOT NULL,
  `bauthor` varchar(100) NOT NULL,
  `bpublisher` varchar(100) NOT NULL,
  `bedition` varchar(100) NOT NULL,
  `bprice` varchar(100) NOT NULL,
  `bquantity` varchar(100) NOT NULL,
  `sellerid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookname`, `bid`, `bauthor`, `bpublisher`, `bedition`, `bprice`, `bquantity`, `sellerid`) VALUES
('Java', '100', 'Cay S Horstmann', 'Prentice', '11th', '300', '2', 'zahid@gmail.com'),
('English', '101', ' Bert Bates', ' Kathy Sierra', '2nd', '360', '10', 'zahid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookhistory`
--

CREATE TABLE `bookhistory` (
  `bookname` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `bprice` varchar(100) NOT NULL,
  `bquantity` varchar(100) NOT NULL,
  `sellerid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookhistory`
--

INSERT INTO `bookhistory` (`bookname`, `bid`, `bprice`, `bquantity`, `sellerid`) VALUES
('Compiler', '200', '702', '4', 'badhon@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('badhon@gmail.com', '12345'),
('zahid@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sellername` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `streetaddress` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `tradelicense` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sellername`, `email`, `gender`, `phone`, `streetaddress`, `area`, `city`, `zipcode`, `tradelicense`) VALUES
('Badhon', 'badhon@gmail.com', 'Male', '01233669992', 'dhaka 1212', 'badda', 'dhaka', 1212, 789855),
('zahid', 'zahid@gmail.com', 'Male', '01977838489', 'shahjadpur', 'badda', 'dhaka', 1212, 789631);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawhistory`
--

CREATE TABLE `withdrawhistory` (
  `sellerid` varchar(100) NOT NULL,
  `currentbalance` varchar(100) NOT NULL,
  `afterwithdrawbal` varchar(100) NOT NULL,
  `withdrawtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawhistory`
--

INSERT INTO `withdrawhistory` (`sellerid`, `currentbalance`, `afterwithdrawbal`, `withdrawtime`) VALUES
('zahid@gmail.com', '10480', '10000', '2021-04-10 12:13:37am'),
('zahid@gmail.com', '10000', '9980', '2021-04-10 12:14:04am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
