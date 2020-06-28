-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 10:49 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ketoshred`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `token` varchar(500) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `target_weight` varchar(400) DEFAULT NULL,
  `activity` text,
  `proteins` text,
  `veggies` text,
  `dairy_products` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `token`, `email`, `gender`, `age`, `height`, `weight`, `target_weight`, `activity`, `proteins`, `veggies`, `dairy_products`, `date`, `status`) VALUES
(1, '1892c7e0af1d74c7a1f07e578708d31339fa2c68', 'juniorlecrae@gmail.com', 'male', 21, '5 ft, 66 inches : 168 cm', '123 lbs : 56 kgs', '99 lbs : 45 kgs', '0.55', 'Fish,Turkey', 'Brocolli,Avocado,Green Beans', 'Yoghurt,Beans,Agushie', '2020-05-23 13:56:02', 1),
(2, '7072c31ed58b3a21bbf880c206802aa5221eecfb', 'ka@gmail.com', 'female', 21, '5 ft, 66 inches : 168 cm', '65 lbs : 29.4 kgs', '45 lbs : 20.4 kgs', '0.725', 'Fish,Turkey', 'Cabbage,Green Beans', 'Yoghurt,Beans', '2020-05-23 15:43:47', 0),
(3, '8cfaa00738fbf2a50b7d0e556586fb61e97f74e2', 'juniorlecrae@gmail.com', 'male', 21, '5 ft, 66 inches : 168 cm', '123 lbs : 56 kgs', '99 lbs : 45 kgs', '0.9', 'Fish,Turkey', 'Brocolli,Avocado', 'Yoghurt,Beans', '2020-05-23 15:44:20', 0),
(4, '05b940fc5e924f1feb9a02f8b02f5554010e232b', 'junio@gmail.com', 'male', 21, '5 ft, 66 inches : 168 cm', '143 lbs : 65 kgs', '99 lbs : 45 kgs', '0.375', 'Fish,Turkey', 'Brocolli,Cabbage,Green Beans', 'Yoghurt,Beans', '2020-05-25 15:35:41', 0),
(5, 'e0a2473b7a9368e50eb826a71d6e9221b748f999', 'jun@gmail.com', 'male', 21, '6 ft, 72 inches : 183 cm', '172 lbs : 78 kgs', '198 lbs : 90 kgs', '0.375', 'Fish,Turkey', 'Brocolli,Avocado,Green Beans', 'Beans,Agushie', '2020-06-01 10:01:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
