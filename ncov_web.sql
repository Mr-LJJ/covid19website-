-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-05-19 08:31:36
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ncov_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `ncovdata`
--

CREATE TABLE `ncovdata` (
  `time` text NOT NULL,
  `id` int(11) NOT NULL,
  `totalConfirmed` int(11) DEFAULT NULL,
  `totalDoubtful` int(11) DEFAULT NULL,
  `nowconfirm` int(11) DEFAULT NULL,
  `totalDeath` int(11) DEFAULT NULL,
  `totalCured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ncovdata`
--

INSERT INTO `ncovdata` (`time`, `id`, `totalConfirmed`, `totalDoubtful`, `nowconfirm`, `totalDeath`, `totalCured`) VALUES
('2020-05-16', 1, 84478, 4, 166, 4644, 79668),
('2020-05-17', 2, 84487, 4, 143, 4645, 79699),
('2020-05-18 09:25:00', 3, 84494, 4, 148, 4645, 79701),
('2020-05-18 15:09:00', 4, 84494, 4, 145, 4645, 79704),
('2020-05-18 18:36:00', 5, 84494, 4, 144, 4645, 79705),
('2020-05-19 07:50:00', 6, 84497, 4, 147, 4645, 79705),
('2020-05-19 08:14:00', 7, 84500, 3, 147, 4645, 79708),
('2020-05-19 10:58:00', 8, 84503, 3, 150, 4645, 79708);

--
-- 转储表的索引
--

--
-- 表的索引 `ncovdata`
--
ALTER TABLE `ncovdata`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
