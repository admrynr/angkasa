-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 16, 2017 at 03:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE IF NOT EXISTS `last_seen` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `time`) VALUES
(1, 21, 20, 'ol;', '0', '2017-07-16 00:38:40'),
(2, 21, 20, 'hjkjk', '0', '2017-07-16 00:38:48'),
(3, 21, 20, 'ujuyhkukk', '0', '2017-07-16 00:38:52'),
(4, 21, 19, 'jkjljll', '0', '2017-07-16 00:38:57'),
(5, 21, 17, 'fdgfhh', '0', '2017-07-16 00:45:13'),
(6, 21, 19, 'fff', '0', '2017-07-16 00:55:13'),
(7, 22, 17, 'juj', '0', '2017-07-16 01:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
`id` int(20) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `alamat`, `status`) VALUES
(3, '12345', 'test', 'makassar', 'Tidak Aktif'),
(7, '14.1401.027', 'tasrin adiputra', 'makassar', 'Aktif'),
(9, '14.1401.024', 'tasrin adiputra', 'makassar', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `foto`) VALUES
(19, 'tasrin', '$2y$09$92dOSAg8NEBxrriV3w5sGOJL7Z8Rhz7LbzfoMsmkQfXw78ZetAPWu', 'dosen', 'gambar_1499385839.png'),
(20, 'test', '098f6bcd4621d373cade4e832627b4f6', 'mahasiswa', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersfb`
--

CREATE TABLE IF NOT EXISTS `usersfb` (
`id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modified` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersfb`
--

INSERT INTO `usersfb` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`) VALUES
(2, 'facebook', '693963624124190', 'Tasrin', 'Adiputra', 'tasrinteknik@gmail.com', 'male', 'id_ID', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/16114892_612011485652738_3345778194463477140_n.jpg?oh=616cb7c7e366860e036f4c95f09edb01&oe=59C6A8C0', 'https://www.facebook.com/693963624124190', 'Kamis, 13 Juli 2017 19:07:19', 'Selasa, 18 Juli 2017 12:02:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `last_seen`
--
ALTER TABLE `last_seen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersfb`
--
ALTER TABLE `usersfb`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `last_seen`
--
ALTER TABLE `last_seen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `usersfb`
--
ALTER TABLE `usersfb`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
