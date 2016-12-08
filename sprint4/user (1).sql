-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 07:09 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebookdb_scv`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pk_int_user_id` int(11) NOT NULL,
  `vchr_user_fname` varchar(20) DEFAULT NULL,
  `vchr_user_lname` varchar(20) DEFAULT NULL,
  `vchr_user_email` varchar(20) DEFAULT NULL,
  `vchr_user_password` varchar(20) DEFAULT NULL,
  `vchr_user_profilepicture` varchar(20) DEFAULT NULL,
  `vchr_user_birthday` varchar(20) DEFAULT NULL,
  `vchr_user_gender` varchar(20) DEFAULT NULL,
  `int_user_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pk_int_user_id`, `vchr_user_fname`, `vchr_user_lname`, `vchr_user_email`, `vchr_user_password`, `vchr_user_profilepicture`, `vchr_user_birthday`, `vchr_user_gender`, `int_user_active`) VALUES
(1, 'jishnu', 'vv', 'jishnuvv@gmail.com', 'srdbZ@123', '2CAddicWW9_1.jpg', '1985-4-7', 'male', 1),
(2, 'syama', 'cv', 'syamacv96@gmail.com', 'srdbC@12', '2CAddicWW1_1.jpg', '1991-4-27', 'female', 1),
(3, 'jyothish', 's', '9846984698', 'srdbF@12', 'VL_372685.jpg', '1991-5-12', 'male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk_int_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pk_int_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
