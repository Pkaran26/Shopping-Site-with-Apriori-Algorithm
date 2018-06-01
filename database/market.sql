-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 11:36 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(5) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userpass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin_name`, `username`, `userpass`) VALUES
(1, 'Prateek Kaushik', 'Pkaran26', '123');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `noti_id` int(5) NOT NULL,
  `notify` varchar(100) NOT NULL,
  `ndate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `product_price` varchar(5) NOT NULL,
  `descount` varchar(2) NOT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `full_spe` varchar(255) DEFAULT NULL,
  `add_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_price`, `descount`, `descr`, `product_img`, `full_spe`, `add_date`) VALUES
(1, 'Mouse', 'Computer Parts', '250', '2', 'very nice', 'img/dell2..jpg', NULL, '2017-10-05 17:59:34'),
(3, 'Keyboard', 'Computer Parts', '350', '4', 'very nice', 'img/dell2..jpg', NULL, '2017-10-05 17:59:34'),
(5, 'HP Printer', 'Printers', '5600', '8', 'very nice', 'img/dell2..jpg', NULL, '2017-10-05 17:59:34'),
(7, 'Light Pen', 'Computer Parts', '1200', '5', 'very nice', 'img/dell2..jpg', NULL, '2017-10-05 17:59:34'),
(9, 'HP Bettary', 'Computer Parts', '1350', '6', 'very nice', 'img/dell2..jpg', NULL, '2017-10-05 17:59:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tr_view`
-- (See below for the actual view)
--
CREATE TABLE `tr_view` (
`pr_id` int(5)
,`user_id` int(5)
,`pid` int(5)
,`final_price` int(5)
,`tr_id` int(5)
,`total_price` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `dob`, `pass`, `email`, `addr`) VALUES
(1, 'Karan', '26-04-1993', '123', 'kaushikprateek11@gmail.com', 'Bilaspur');

-- --------------------------------------------------------

--
-- Table structure for table `user_bought_product`
--

CREATE TABLE `user_bought_product` (
  `pr_id` int(5) NOT NULL,
  `TRANSACTION_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `final_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bought_product`
--

INSERT INTO `user_bought_product` (`pr_id`, `TRANSACTION_id`, `user_id`, `pid`, `final_price`) VALUES
(85, 43, 1, 5, 5152),
(86, 43, 1, 1, 245),
(87, 44, 1, 9, 1140),
(88, 44, 1, 5, 5152),
(89, 44, 1, 3, 336),
(90, 44, 1, 1, 245),
(91, 45, 1, 3, 336),
(92, 45, 1, 1, 245),
(93, 46, 1, 5, 1140),
(94, 46, 1, 9, 5152),
(95, 47, 1, 9, 1140),
(96, 47, 1, 5, 5152),
(97, 48, 1, 9, 1140),
(98, 48, 1, 3, 336),
(99, 49, 1, 3, 336),
(100, 50, 1, 5, 5152),
(101, 51, 1, 7, 1140),
(102, 52, 1, 7, 1140),
(103, 53, 1, 7, 1140),
(104, 54, 1, 7, 1140),
(105, 55, 1, 5, 5152),
(106, 56, 1, 3, 336),
(107, 57, 1, 3, 336),
(108, 58, 1, 5, 5152),
(109, 59, 1, 5, 5152),
(110, 60, 1, 3, 336),
(111, 61, 1, 3, 336),
(112, 62, 1, 7, 1140),
(113, 62, 1, 3, 336),
(114, 63, 1, 3, 5152),
(115, 63, 1, 1, 336),
(116, 63, 1, 5, 245),
(117, 64, 1, 3, 336),
(118, 65, 1, 3, 336),
(119, 66, 1, 5, 5152),
(120, 67, 1, 5, 1269),
(121, 67, 1, 9, 5152),
(122, 68, 1, 7, 1140),
(123, 69, 1, 3, 336),
(124, 70, 1, 5, 5152),
(125, 70, 1, 3, 336),
(126, 71, 1, 3, 1269);

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction`
--

CREATE TABLE `user_transaction` (
  `tr_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `total_price` int(5) NOT NULL,
  `tr_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_transaction`
--

INSERT INTO `user_transaction` (`tr_id`, `user_id`, `total_price`, `tr_date`) VALUES
(43, 1, 5397, '2017-10-05 18:00:50'),
(44, 1, 6873, '2017-10-05 18:00:50'),
(45, 1, 581, '2017-10-05 18:00:50'),
(46, 1, 6292, '2017-10-05 18:00:50'),
(47, 1, 6292, '2017-10-05 18:00:50'),
(48, 1, 1476, '2017-10-05 18:00:50'),
(49, 1, 336, '2017-10-05 18:00:50'),
(50, 1, 5152, '2017-10-05 18:00:50'),
(51, 1, 1140, '2017-10-05 18:00:50'),
(52, 1, 1140, '2017-10-05 18:00:50'),
(53, 1, 1140, '2017-10-05 18:00:50'),
(54, 1, 1140, '2017-10-05 18:00:50'),
(55, 1, 5152, '2017-10-05 18:00:50'),
(56, 1, 336, '2017-10-05 18:00:50'),
(57, 1, 336, '2017-10-05 18:00:50'),
(58, 1, 5152, '2017-10-05 18:00:50'),
(59, 1, 5152, '2017-10-05 18:00:50'),
(60, 1, 336, '2017-10-05 18:00:50'),
(61, 1, 336, '2017-10-05 18:00:50'),
(62, 1, 1476, '2017-10-05 18:00:50'),
(63, 1, 5733, '2017-10-05 18:00:50'),
(64, 1, 336, '2017-10-05 18:00:50'),
(65, 1, 336, '2017-10-05 18:00:50'),
(66, 1, 5152, '2017-10-05 18:00:50'),
(67, 1, 6421, '2017-10-05 18:00:50'),
(68, 1, 1140, '2017-10-05 18:00:50'),
(69, 1, 336, '2017-10-06 09:11:14'),
(70, 1, 5488, '2017-10-06 09:12:23');

-- --------------------------------------------------------

--
-- Structure for view `tr_view`
--
DROP TABLE IF EXISTS `tr_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tr_view`  AS  select `user_bought_product`.`pr_id` AS `pr_id`,`user_bought_product`.`user_id` AS `user_id`,`user_bought_product`.`pid` AS `pid`,`user_bought_product`.`final_price` AS `final_price`,`user_transaction`.`tr_id` AS `tr_id`,`user_transaction`.`total_price` AS `total_price` from (`user_bought_product` join `user_transaction`) where (`user_transaction`.`tr_id` = `user_bought_product`.`TRANSACTION_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_bought_product`
--
ALTER TABLE `user_bought_product`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `noti_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_bought_product`
--
ALTER TABLE `user_bought_product`
  MODIFY `pr_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `user_transaction`
--
ALTER TABLE `user_transaction`
  MODIFY `tr_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
