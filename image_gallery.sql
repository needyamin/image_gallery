-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2021 at 08:14 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-18+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `gallery_username` varchar(1000) NOT NULL,
  `gallery_head_name` text NOT NULL,
  `gallery_description` text NOT NULL,
  `gallery_img` text NOT NULL,
  `gallery_fb` text NOT NULL,
  `gallery_twitter` text NOT NULL,
  `gallery_instragram` text NOT NULL,
  `gallery_other` text NOT NULL,
  `gallery_ip` text NOT NULL,
  `gallery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `gallery_username`, `gallery_head_name`, `gallery_description`, `gallery_img`, `gallery_fb`, `gallery_twitter`, `gallery_instragram`, `gallery_other`, `gallery_ip`, `gallery_date`) VALUES
(70, 'test', 'Test', 'Test', 'yamm.jpg', 'needyamin', 'needyamin', 'needyamin', '@needyamin', '127.0.0.1', '2021-02-25'),
(71, 'test2', 'Test2', 'Test2', 'WhatsApp Image 2021-01-29 at 11.21.57 AM.jpeg', '', '', '', '', '127.0.0.1', '2021-02-25'),
(72, 'test3', 'test3', 'test3', '2019-08-10 18.20.26.jpeg', '', '', '', '', '127.0.0.1', '2021-02-25'),
(73, 'test4', 'test4', 'test4', '2014-12-21 12.02.27.jpg', '', '', '', '', '127.0.0.1', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `image_name`, `date`) VALUES
(92, 69, 'IMG_0886.jpg', '2021-01-05'),
(93, 69, 'IMG_0724.jpg', '2021-01-05'),
(94, 69, 'as.jpg', '2021-01-05'),
(95, 69, '97299ecd-379f-4b08-9db1-d0bdac694321.jpg', '2021-01-05'),
(96, 69, '8c5d8f51-505b-4fe5-a0f5-60321d0fb921.jpg', '2021-01-05'),
(97, 60, '94149143_149823836549428_8173728320869892096_n.jpg', '2021-01-05'),
(98, 60, '94143576_792581017937170_6060400456125906944_n.jpg', '2021-01-05'),
(99, 60, '93265172_3012166575471280_6321792599552163840_n.jpg', '2021-01-05'),
(100, 60, '92724576_125534742423544_1709137434639335424_o.jpg', '2021-01-05'),
(101, 60, '0190258_sleeveless-open-front-shrug-dm-408.jpeg', '2021-01-05'),
(102, 60, '0190256_sleeveless-open-front-shrug-dm-407.jpeg', '2021-01-05'),
(103, 60, '0190254_sleeveless-open-front-shrug-for-women-dm-406.jpeg', '2021-01-05'),
(104, 71, '94149143_149823836549428_8173728320869892096_n.jpg', '2021-01-05'),
(105, 71, '94143576_792581017937170_6060400456125906944_n.jpg', '2021-01-05'),
(106, 71, '93265172_3012166575471280_6321792599552163840_n.jpg', '2021-01-05'),
(107, 71, '92724576_125534742423544_1709137434639335424_o.jpg', '2021-01-05'),
(108, 71, '0190258_sleeveless-open-front-shrug-dm-408.jpeg', '2021-01-05'),
(109, 71, '0190256_sleeveless-open-front-shrug-dm-407.jpeg', '2021-01-05'),
(110, 71, '0190254_sleeveless-open-front-shrug-for-women-dm-406.jpeg', '2021-01-05'),
(111, 70, '2019-12-06 05.38.jpg', '2021-02-25'),
(112, 70, '2019-12-05 06.48.jpg', '2021-02-25'),
(113, 70, '2019-12-05 06.47(1).jpg', '2021-02-25'),
(114, 70, '2019-12-05 06.47.jpg', '2021-02-25'),
(115, 70, '2019-12-05 06.45.jpg', '2021-02-25'),
(116, 71, 'WhatsApp Image 2021-01-29 at 11.21.57 AM.jpeg', '2021-02-25'),
(117, 71, 'WhatsApp Image 2021-01-29 at 11.21.55 AM.jpeg', '2021-02-25'),
(118, 71, 'WhatsApp Image 2021-01-29 at 11.21.54 AM.jpeg', '2021-02-25'),
(119, 71, 'WhatsApp Image 2021-01-29 at 11.21.50 AM(1).jpeg', '2021-02-25'),
(120, 71, 'WhatsApp Image 2021-01-29 at 11.21.44 AM.jpeg', '2021-02-25'),
(121, 71, 'WhatsApp Image 2021-01-29 at 11.21.42 AM.jpeg', '2021-02-25'),
(122, 72, '2019-03-30 10.58.51.jpeg', '2021-02-25'),
(123, 72, '2019-08-10 18.20.26.jpeg', '2021-02-25'),
(124, 72, '2019-06-21 18.36.53.jpeg', '2021-02-25'),
(125, 72, '2020-12-31 17.21.35.jpeg', '2021-02-25'),
(126, 72, '2019-08-19 18.47.11.jpeg', '2021-02-25'),
(127, 73, '2020-12-31 20.48.32.jpeg', '2021-02-25'),
(128, 73, '2019-08-12 13.37.08.jpeg', '2021-02-25'),
(129, 73, '2020-12-31 19.57.12.jpg', '2021-02-25'),
(130, 73, '2019-09-25 19.32.58 (1).jpg', '2021-02-25'),
(131, 73, '2019-10-28 10.42.19 (1).jpg', '2021-02-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
