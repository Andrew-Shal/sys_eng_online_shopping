-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 07:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_test_db_online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_status`
--

CREATE TABLE `tbl_account_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_status`
--

INSERT INTO `tbl_account_status` (`id`, `status`) VALUES
(1, 'NEW'),
(2, 'ACTIVE'),
(3, 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `cust_country` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_city` varchar(100) DEFAULT NULL,
  `cust_street` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` int(255) NOT NULL,
  `registered_timestamp` datetime NOT NULL,
  `activation_key` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email_address`, `cust_country`, `cust_state`, `cust_city`, `cust_street`, `phone_number`, `password`, `account_status`, `registered_timestamp`, `activation_key`, `role_id`) VALUES
(1, 'Andrew', 'Shal', 'shalandrew97@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'andrew', 2, '2019-03-17 22:54:06', '1234', 1),
(2, 'Anisha', 'Shal', 'shalanisha95@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'anisha', 2, '2019-03-17 22:54:06', '1234', 1),
(3, 'Edwin', 'Shal', 'shaledwin97@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'edwin', 2, '2019-03-17 22:54:06', '1234', 1),
(4, 'Ophelia', 'Shal', 'shalophelia74@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'ophelia', 2, '2019-03-17 22:54:06', '1234', 1),
(5, 'Julio', 'Shal', 'shaljulio72@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'julio', 2, '2019-03-17 22:54:06', '1234', 1),
(6, 'leon', 'Coleman', 'colemanleon17@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'leon', 2, '2019-03-17 22:54:06', '1234', 1),
(7, 'Leonel', 'Coleman', 'colemanleonel87@gmail.com', 'Belize', 'Cayo', 'Belmopan', 'Bethel St.', '6244690', 'leonel', 2, '2019-03-17 22:54:06', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'BUYER'),
(2, 'SELLER'),
(3, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'Alice'),
(2, 'Bob'),
(3, 'Charlie'),
(4, 'Damon'),
(5, 'Edie');

-- --------------------------------------------------------

--
-- Table structure for table `user_movies`
--

CREATE TABLE `user_movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_movies`
--

INSERT INTO `user_movies` (`id`, `user_id`, `movie_name`, `movie_rating`) VALUES
(1, 1, 'Rambo', '5.0'),
(2, 1, 'Rockey', '3.0'),
(3, 1, 'Garden State', '2.0'),
(7, 2, 'Rambo', '2.0'),
(8, 2, 'Rockey', '2.0'),
(9, 2, 'Garden State', '5.0'),
(10, 2, 'Before sunset', '2.0'),
(11, 3, 'Rambo', '2.0'),
(12, 3, 'Training Day', '4.0'),
(13, 3, 'Thor', '5.0'),
(14, 3, 'Before sunset', '4.0'),
(15, 4, 'Rambo', '2.0'),
(16, 4, 'Garden State', '3.0'),
(17, 4, 'Before sunset', '4.0'),
(18, 5, 'Rambo', '4.0'),
(19, 5, 'Rockey', '3.0'),
(20, 5, 'Garden State', '2.0'),
(21, 5, 'Before sunset', '4.0'),
(22, 5, 'Training Day', '3.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_status`
--
ALTER TABLE `tbl_account_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_movies`
--
ALTER TABLE `user_movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_status`
--
ALTER TABLE `tbl_account_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_movies`
--
ALTER TABLE `user_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
