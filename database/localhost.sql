-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-05-18 09:37:42
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
(1, 123, 0, '3', '0.00', '1', 1),
(12, 2, 0, '32', '0.00', '1', 1),
(13, 1494767703, 0, '面，肉，鸡蛋', '21.00', '1', 1),
(14, 1494767764, 1494767764, '面，肉，鸡蛋', '21.00', '1', 1),
(15, 123, 0, '3', '0.00', '2', 1),
(16, 2, 0, '32', '0.00', '2', 1),
(17, 1494767703, 0, '面，肉，鸡蛋', '21.00', '2', 1),
(18, 1494767764, 1494767764, '面，肉，鸡蛋', '21.00', '1', 1),
(19, 123, 0, '3', '0.00', '2', 1),
(20, 2, 0, '32', '0.00', '12', 1),
(21, 1494767703, 0, '面，肉，鸡蛋', '21.00', '1', 1),
(22, 1494767764, 1494767764, '面，肉，鸡蛋', '21.00', '1', 1),
(23, 123, 0, '3', '0.00', '2', 1),
(24, 2, 0, '32', '0.00', '12', 1),
(25, 1494767703, 0, '面，肉，鸡蛋', '21.00', '1', 1),
(26, 1494767764, 1494767764, '面，肉，鸡蛋', '21.00', '1', 1),
(27, 1494913472, 1494913472, '', '0.00', '', 1),
(28, 1494914567, 1494914567, '', '0.00', '', 1);

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
  `gid` int(10) UNSIGNED NOT NULL COMMENT '组 ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='月结算表';

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '账单ID', AUTO_INCREMENT=29;
--
-- 使用表AUTO_INCREMENT `ac_group`
--
ALTER TABLE `ac_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '组 ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `ac_month`
--
ALTER TABLE `ac_month`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '结算 ID';
--
-- 使用表AUTO_INCREMENT `ac_month_more`
--
ALTER TABLE `ac_month_more`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '月表汇总 ID';
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
