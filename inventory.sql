-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- โฮสต์: 127.0.0.1
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.14
-- รุ่นของ PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `inventory`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0481b9f16ede072226480ac8ea0085bc', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401518448, 'a:7:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1401095064";s:8:"is_admin";b:1;}'),
('85a02660f0205e44b6756a0b1b5eb44f', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401099931, 'a:7:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1401073041";s:8:"is_admin";b:1;}'),
('a3a282f2e26bc2e4e46d68b6983b4d52', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401863835, 'a:7:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1401516932";s:8:"is_admin";b:1;}');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Users', 'General User'),
(3, 'Manager', 'For manager');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '100e1e621911f0c4392d6a2dcd856f0f8778a4cc', '9462e8eee0', 'admin@admin.com', NULL, NULL, NULL, '2059f56c64e4cc51b1ddb6bde72288cb7f89b58a', 1268889823, 1401863839, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '172.168.0.184', 'Tanawat', 'd812d4f06c290ad150ab25285250497361070ecf', NULL, 'tanardroid@gmail.com', NULL, '563d1b4585b49efe0769dec9a6dc6550e37fa91f', 1391397410, NULL, 1390877678, 1390877678, 1, 'ธนวัช', 'ไร่ทิม', 'wswp', '66868932964'),
(3, '172.168.0.184', 'kapor lib', 'ff7dbf5e7ebbf7d778b49291630f1e2c6c5c220a', NULL, 'kaporlib@gmail.com', NULL, NULL, NULL, NULL, 1391591524, 1391591524, 1, 'Kapor', 'Lib', 'WSWP', '0868932964'),
(4, '172.168.0.184', 'fdsf fdsfds', '45af7308e9143c46256779bc0d311ca97a125b9f', NULL, 'bigivt@hotmail.co.th', '3beb358cfbe28140d5638babc11a264afc1de800', NULL, NULL, NULL, 1391595979, 1391595979, 0, 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', '0868932964'),
(5, '172.168.0.184', 'ae ae', '0d282e2caade48cf4e17cb6cece5ac8fcd8b6663', NULL, 'ae@mail.wswp.co.th', NULL, NULL, NULL, NULL, 1393583671, 1395913387, 1, 'Ae', 'Ae', 'wswp', '025867553'),
(6, '172.168.0.184', 'test test', 'c8175c60bf6b4c245873566913af95f201e5458c', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1396403841, 1396933081, 1, 'Test', 'Test', 'WSWP', '1234');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- dump ตาราง `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 1, 1),
(16, 1, 2),
(17, 1, 3),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(9, 4, 2),
(10, 4, 3),
(14, 5, 2),
(18, 6, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
