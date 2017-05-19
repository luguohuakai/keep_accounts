-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-05-19 12:01:49
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac_account`
--
CREATE DATABASE IF NOT EXISTS `ac_account` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ac_account`;

-- --------------------------------------------------------

--
-- 表的结构 `ac_bill`
--

CREATE TABLE `ac_bill` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '账单ID',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间',
  `goods` char(20) NOT NULL COMMENT '商品名称',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `giver` char(5) NOT NULL COMMENT '消费者',
  `gid` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '组 ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账单表';

--
-- 转存表中的数据 `ac_bill`
--

INSERT INTO `ac_bill` (`id`, `create_time`, `update_time`, `goods`, `amount`, `giver`, `gid`) VALUES
(1, 1495098252, 1494407159, '辣椒', '5.00', '1', 1),
(2, 1491901559, 1495098310, '白菜', '4.00', '2', 1),
(3, 1492506359, 1495098334, '青菜', '6.00', '1', 1),
(4, 1495098359, 1495098359, '牛奶', '27.00', '1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_group`
--

CREATE TABLE `ac_group` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '组 ID',
  `group_name` char(20) NOT NULL COMMENT '组名',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='组表';

--
-- 转存表中的数据 `ac_group`
--

INSERT INTO `ac_group` (`id`, `group_name`, `create_time`) VALUES
(1, '301宿舍', 23445),
(2, '308宿舍', 2345);

-- --------------------------------------------------------

--
-- 表的结构 `ac_month`
--

CREATE TABLE `ac_month` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '结算 ID',
  `total_amount` decimal(10,2) NOT NULL COMMENT '总消费',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户 ID',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '结算时间',
  `gid` int(10) UNSIGNED NOT NULL COMMENT '组 ID',
  `year_month` char(10) NOT NULL COMMENT '汇总年月'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='月结算表';

--
-- 转存表中的数据 `ac_month`
--

INSERT INTO `ac_month` (`id`, `total_amount`, `uid`, `create_time`, `gid`, `year_month`) VALUES
(1, '6.00', 1, 1495185221, 1, '2017-04'),
(2, '4.00', 2, 1495185221, 1, '2017-04');

-- --------------------------------------------------------

--
-- 表的结构 `ac_month_more`
--

CREATE TABLE `ac_month_more` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '月表汇总 ID',
  `year_month` char(10) NOT NULL COMMENT '汇总年月',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `total_amount` decimal(10,2) NOT NULL COMMENT '总消费',
  `avg_amount` decimal(10,4) NOT NULL COMMENT '平均消费',
  `gid` int(11) UNSIGNED NOT NULL COMMENT '组 ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='月表汇总';

--
-- 转存表中的数据 `ac_month_more`
--

INSERT INTO `ac_month_more` (`id`, `year_month`, `create_time`, `total_amount`, `avg_amount`, `gid`) VALUES
(1, '2017-04', 1495185221, '10.00', '5.0000', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_users`
--

CREATE TABLE `ac_users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户 ID',
  `user_name` char(20) NOT NULL COMMENT '用户名',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ac_users`
--

INSERT INTO `ac_users` (`id`, `user_name`, `create_time`) VALUES
(1, 'maoge', 123),
(2, 'bobo', 144);

-- --------------------------------------------------------

--
-- 表的结构 `ac_users_group`
--

CREATE TABLE `ac_users_group` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'users_group ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户 ID',
  `gid` int(10) UNSIGNED NOT NULL COMMENT '组 ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户 组对应表';

--
-- 转存表中的数据 `ac_users_group`
--

INSERT INTO `ac_users_group` (`id`, `uid`, `gid`) VALUES
(1, 1, 1),
(2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_bill`
--
ALTER TABLE `ac_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_group`
--
ALTER TABLE `ac_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_month`
--
ALTER TABLE `ac_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_month_more`
--
ALTER TABLE `ac_month_more`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_users`
--
ALTER TABLE `ac_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_users_group`
--
ALTER TABLE `ac_users_group`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ac_bill`
--
ALTER TABLE `ac_bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '账单ID', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ac_group`
--
ALTER TABLE `ac_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '组 ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `ac_month`
--
ALTER TABLE `ac_month`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '结算 ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `ac_month_more`
--
ALTER TABLE `ac_month_more`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '月表汇总 ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ac_users`
--
ALTER TABLE `ac_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户 ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `ac_users_group`
--
ALTER TABLE `ac_users_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'users_group ID', AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
