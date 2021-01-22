-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 02:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'BBAdmin', 'bbadmin@gmail.com', 'bbadmin');

-- --------------------------------------------------------

--
-- Table structure for table `bbproducts`
--

CREATE TABLE `bbproducts` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` float(10,2) NOT NULL,
  `p_color` varchar(100) NOT NULL,
  `p_file` varchar(255) NOT NULL,
  `p_publish` varchar(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bbproducts`
--

INSERT INTO `bbproducts` (`p_id`, `p_name`, `p_price`, `p_color`, `p_file`, `p_publish`, `u_id`, `created_at`, `updated_at`) VALUES
(1, 'SAMSUNG Mobile Phone', 16500.00, '#25da8c', 'mobile.jpg', 'on', 1, '2021-01-22 18:07:19', '2021-01-22 18:07:19'),
(2, 'REDMI Mobile Phone', 8000.00, '#000000', 'redmi.jpg', 'on', 1, '2021-01-22 18:09:29', '2021-01-22 18:09:38'),
(3, 'IPHONE', 50000.00, '#000000', 'iphone.jpg', 'on', 1, '2021-01-22 18:12:51', '2021-01-22 18:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `bbusers`
--

CREATE TABLE `bbusers` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bbusers`
--

INSERT INTO `bbusers` (`u_id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'Kowsalya', 'kowslayaece97vpm@gmail.com', '24670b674dc350939fcb03f466c10617');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbproducts`
--
ALTER TABLE `bbproducts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `bbusers`
--
ALTER TABLE `bbusers`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbproducts`
--
ALTER TABLE `bbproducts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bbusers`
--
ALTER TABLE `bbusers`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
