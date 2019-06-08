-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 06:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywallpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(11000) NOT NULL,
  `Email` varchar(11000) NOT NULL,
  `Password` varchar(11000) NOT NULL,
  `type` varchar(11000) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`, `type`, `Status`) VALUES
(1, 'Admin', 'admin@mywallpaperapp.com', 'Admin1234', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(11000) NOT NULL,
  `image` varchar(11000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`) VALUES
(1, 'Cato1', 'http://localhost/mywallpapaer/category/img1.png', 1),
(2, 'Cato2', 'http://localhost/mywallpapaer/category/img2.png', 1),
(13, 'hello', 'http://localhost/mywallpapaer/category/1.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `service_provider` varchar(1100) NOT NULL,
  `appid` varchar(1200) NOT NULL,
  `banner1` varchar(1100) NOT NULL,
  `banne2` varchar(1100) NOT NULL,
  `banner3` varchar(1100) NOT NULL,
  `interstitial1` varchar(1100) NOT NULL,
  `interstitial2` varchar(1100) NOT NULL,
  `interstitial3` varchar(1100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `service_provider`, `appid`, `banner1`, `banne2`, `banner3`, `interstitial1`, `interstitial2`, `interstitial3`, `active`) VALUES
(1, 'Facebook', 'App Id', 'banner1', 'banner2', 'banner3', 'inst1', 'inst2', 'inst3', 1),
(2, 'Admob', 'App Id', '12345', 'banner2', '12345', '12345', '12345', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallpapers`
--

CREATE TABLE `wallpapers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author_name` varchar(255) DEFAULT NULL,
  `wallpaper` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallpapers`
--

INSERT INTO `wallpapers` (`id`, `name`, `category`, `upload_date`, `author_name`, `wallpaper`) VALUES
(1, 'RedLava', 1, '2019-05-30 11:57:16', 'Admin', 'http://onestatus.xyz/api/Wallpaerpe/1.jpg'),
(2, 'moon', 1, '2019-05-30 11:57:21', 'Admin', 'http://onestatus.xyz/api/Wallpaerpe/2.jpg'),
(3, 'Sky', 2, '2019-05-30 11:57:31', 'Admin', 'http://onestatus.xyz/api/Wallpaerpe/3.jpg'),
(4, 'Snow', 2, '2019-05-30 11:57:36', 'Admin', 'http://onestatus.xyz/api/Wallpaerpe/4.jpg'),
(5, 'p6-removebg.png', 1, '0000-00-00 00:00:00', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/p6-removebg.png'),
(6, 'IMG-20181214-WA0014.1559220070.jpg', 1, '0000-00-00 00:00:00', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/IMG-20181214-WA0014.1559220070.jpg'),
(19, 'p3-removebg.', 1, '2019-05-29 21:40:51', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/p3-removebg.1559221851.png'),
(20, 'p3-removebg.1559221890.', 1, '2019-05-29 21:41:30', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/p3-removebg.1559221890.png'),
(14, 'IMG-20190213-WA0006.1559220658.jpg', 2, '2019-05-30 12:57:12', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/IMG-20190213-WA0006.1559220658.jpg'),
(16, 'Enjoy Best Tournaments.1559220796.png', 1, '2019-05-29 21:23:16', 'Admin', 'http://localhost/mywallpapaer/wallpaper/Cato1/Enjoy Best Tournaments.1559220796.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallpapers`
--
ALTER TABLE `wallpapers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallpapers`
--
ALTER TABLE `wallpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
