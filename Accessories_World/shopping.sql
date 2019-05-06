-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 02:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `imagep` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `productname`, `imagep`, `quantity`, `price`) VALUES
(1, 'Belt', '1.jpg', 10, 10),
(2, 'Bracelets', '2.jpg', 20, 20),
(3, 'Bags', '3.jpg', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `first_name`, `last_name`, `email_address`, `total_price`) VALUES
(4, 'SDKJFKSD', 'DFKJGHJFDK', 'JKSDFK@KJ.SFJKVK', 0),
(5, 'EFDE', 'HHH', 'HHH@HHH.HHG', 0),
(6, 'LAKHBIR', 'BANSAL', 'info@morningsideinn-ny.com', 0),
(7, 'LAKHBIR', 'BANSAL', 'info@morningsideinn-ny.com', 0),
(8, 'sccd', 'dcdd', 'ccdd@edfre.htht', 0),
(9, 'kjdfhs', 'kjdfhjk', 'eg@dkfj.fdkj', 0),
(10, 'LAKHBIR', 'BANSAL', 'info@morningsideinn-ny.com', 0),
(11, 'dsj', 'dwhgh', 'jsd@jhwdj.wdhg', 0),
(12, 'fddf', 'fddc', 'fd@tr.h', 0),
(13, 'gjdjd', 'dfjgdfj', 'dkjfgk@kjdf.dfj', 0),
(14, 'eskjf', 'kjsdfjksd', 'jksdf', 0),
(15, 'saffs', 'ffsdsdds', 'assa@sdf.sdfsdfsd', 100),
(16, 'DemoTet', 'shgh', 'husdf@hsef.sdh', 0),
(17, 'j', 'j', 'j@r.f', 190),
(18, 'hgfghfh', 'hgghhg', 'hgfhg@jhghj.hjg', 490),
(19, 'sdsdds', 'sdfsdffd', 'sdfsfsd', 350),
(20, 'dsfsdsfd', 'sdfsdfsdfsfs', 'assa@dfgsgd.sdfsd', 250),
(21, 'zcdssdfs', 'sdfsdffdssd', 'sdfsdf@dfssfd.sdfsdfsdf', 0),
(22, 'sdklflkdfs', 'kldfgklfd', 'lskdfskd@sdkfsd.ksdf', 0),
(23, 'sdkjfhsjd', 'kjsdfjsd', 'skjdfksdj@skjdfsjkd.sdkjfkjfsd', 0),
(24, 'sldkfsdlk', 'lkdsflkds', 'sldkfsdlk@fjlksd.dskf', 0),
(25, 'xclkdx', 'jskdfjsd', 'skjdf@jdf.djk', 0),
(26, 'dfdssjjdfs', 'jkdfjfds', 'skjdfk@kjsdfsd.dskjf', 0),
(27, 'fvfdfdk', 'kldsl', 'dfkl@klef.kfd', 0),
(28, 'dskjfsdjk', 'sdkjjsfd', 'skjdfjk@sfdjksjfk.kjdf', 10),
(29, 'SANDEEP', 'SANDEEPS', 'SDKFFSD@DFKLGKDLG.FDK', 1110),
(30, 'DDSDFS', 'SLKDFKLSD', 'SDLKFLKSDF', 110),
(31, 'XJKCVXJK', 'KJDFJKDFS', 'SKJDFS@KJSDFS.FDKFD', 110),
(32, 'sejkfsk`', 'kjsedfkjsfkj', 'skjkfs@skjfkf.dfskj', 110),
(33, 'LAKHBIR', 'KING', 'LK@LK.KH', 63590),
(34, 'rfjds', 'djfjdfjfd', 'dfkjdfkj@jdkfs.sdkjfjksd', 30),
(35, 'sdkjfsdk', 'kjsdfsdfk', 'sdjfksdkj@sdffsd.sdklksdf', 220),
(36, 'kgkdlfgdk', 'dlkfkfdklfdl', 'kldffdkldf', 110),
(37, 'sdfdkfdkdf', 'klskfklkl', 'kldskdfskl@kfdkldf.dffdkkfd', 110),
(38, 'skjasfdkj', 'jksdffksd', 'skjdfsk@dkjkgd.dfjkjkgd', 1330),
(39, 'skl', 'kldgkdfkd', 'sdfkfs@sfldlds.kflgffd', 310),
(40, 'SID', 'SID', 'SID@SID.SID', 11470),
(41, 'SIDGDGDSSSSSGDGD', 'SID', 'SID@SID.SID', 0),
(42, 'DFJD', 'JSDGKJS', 'SDKJFSK@KJFD.SDJKF', 0),
(43, 'sandbsda', 'jsdfbhsdfb', 'sjdfsddsf', 30),
(44, 'sandbsda', 'jsdfbhsdfb', 'sjdfsddsf', 30),
(45, 'sdsd', 'sdfsdf', 'sdf@fwe.fhfgf', 6160);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
