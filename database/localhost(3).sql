-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-06-02 11:48:06
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
  `buy_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '购买时间',
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

INSERT INTO `ac_bill` (`id`, `buy_time`, `create_time`, `update_time`, `goods`, `amount`, `giver`, `gid`) VALUES
(1, 0, 1495098252, 1494407159, '辣椒', '5.00', '1', 1),
(2, 0, 1491901559, 1495098310, '白菜', '4.00', '2', 1),
(3, 0, 1492506359, 1495098334, '青菜', '6.00', '1', 1),
(4, 0, 1495098359, 1495098359, '牛奶', '27.00', '1', 1),
(5, 1495438581, 1495438596, 1495438596, '白菜', '27.00', '1', 1),
(6, 1494229009, 1495438622, 1495438622, '辣椒', '6.00', '2', 1),
(7, 1494315477, 1495438687, 1495438687, '牛奶', '4.00', '1', 1),
(8, 1494488289, 1495438703, 1495438703, '青菜', '6.00', '1', 1),
(9, 1494574706, 1495438718, 1495438718, '青菜', '27.00', '1', 1),
(10, 1494661120, 1495438734, 1495438734, '辣椒', '4.00', '1', 1),
(11, 1495352385, 1495438795, 1495438795, '青菜', '22.00', '1', 1),
(12, 1495265998, 1495438807, 1495438807, '辣椒', '11.00', '1', 1),
(13, 1495179610, 1495438825, 1495438825, '方法', '44.00', '1', 1),
(14, 1495093227, 1495438838, 1495438838, '牛奶', '34.00', '1', 1),
(15, 1494920463, 1495438871, 1495438871, '牛奶', '12.00', '1', 1),
(16, 1494747673, 1495438885, 1495438885, '对方', '23.00', '1', 1),
(17, 1495342939, 1495861354, 1495861354, '电风扇', '325.00', '1', 1),
(18, 1495342985, 1495861399, 1495861399, '第三方', '45.00', '2', 1),
(19, 1495866653, 1495866666, 1495866666, '类似看法点击链接发', '45.00', '2', 1),
(20, 1495866738, 1495866813, 1495866813, '山沟沟方反倒是', '343.00', '1', 1),
(21, 1495866895, 1495868110, 1495868110, 'fs', '0.00', '1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ac_group`
--

CREATE TABLE `ac_group` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '组 ID',
  `group_name` char(20) NOT NULL COMMENT '组名',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `year_month` char(10) NOT NULL COMMENT '汇总年月'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='组表';

--
-- 转存表中的数据 `ac_group`
--

INSERT INTO `ac_group` (`id`, `group_name`, `create_time`, `year_month`) VALUES
(1, '301宿舍', 23445, ''),
(2, '308宿舍', 2345, '');

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

-- --------------------------------------------------------

--
-- 表的结构 `sys_admin`
--

CREATE TABLE `sys_admin` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `name` char(20) NOT NULL COMMENT '管理员名',
  `password` char(60) NOT NULL COMMENT '密码',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `avatar` varchar(100) NOT NULL DEFAULT '' COMMENT '头像',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 (1正常 2已删除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

--
-- 转存表中的数据 `sys_admin`
--

INSERT INTO `sys_admin` (`id`, `name`, `password`, `create_time`, `update_time`, `avatar`, `status`) VALUES
(1, 'admin1123', '$2y$10$Ki0NEDF7I19qDMg1xGPpauw6kfIC41h/WagYQ4M1UD9inPmD1nP3e', 123456, 1496078776, '32', 1),
(2, '', '$2y$10$Zx76uPHILHDn5UYLE43twOvsTabWxEreJNO65rD4SUea5Lzd78PSi', 0, 1496233068, '', 2),
(3, 'maogeed', '$2y$10$543Qy8B93JzUNo/U2RNZvuwjSFtXIFpsO8Ez9M72cVZi7KmKCJ6iq', 1496078807, 1496083775, '223w', 1),
(4, '123', '$2y$10$mZu7lTeIryMrvdow.2GKd./IieWIbNwAq60lrgpmXWByc7l3cMwT6', 1496119116, 1496119116, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sys_admin_role`
--

CREATE TABLE `sys_admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL COMMENT '管理员ID',
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员角色关联表';

--
-- 转存表中的数据 `sys_admin_role`
--

INSERT INTO `sys_admin_role` (`admin_id`, `role_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `sys_auth`
--

CREATE TABLE `sys_auth` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `name` char(20) NOT NULL COMMENT '权限名称',
  `rule` varchar(100) NOT NULL COMMENT '路由规则',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 (1正常 2已删除)',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '权限组ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='权限表';

--
-- 转存表中的数据 `sys_auth`
--

INSERT INTO `sys_auth` (`id`, `name`, `rule`, `create_time`, `update_time`, `status`, `group_id`) VALUES
(1, '添加一笔消费', 'account/index/add_handle', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sys_group`
--

CREATE TABLE `sys_group` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '权限组ID',
  `name` char(20) NOT NULL COMMENT '组名',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1正常 2删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='权限组表';

-- --------------------------------------------------------

--
-- 表的结构 `sys_role`
--

CREATE TABLE `sys_role` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `name` char(20) NOT NULL COMMENT '角色名',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 (1正常 2已删除)',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='角色表';

--
-- 转存表中的数据 `sys_role`
--

INSERT INTO `sys_role` (`id`, `name`, `status`, `create_time`, `update_time`) VALUES
(1, '出纳', 2, 1496148096, 1496281741),
(2, '财务', 2, 1496148137, 1496281719),
(3, '文章管理员', 1, 1496149424, 1496281707);

-- --------------------------------------------------------

--
-- 表的结构 `sys_role_auth`
--

CREATE TABLE `sys_role_auth` (
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID',
  `auth_id` int(10) UNSIGNED NOT NULL COMMENT '权限ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限关联表';

--
-- 转存表中的数据 `sys_role_auth`
--

INSERT INTO `sys_role_auth` (`role_id`, `auth_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_action_log`
--

CREATE TABLE `tp_action_log` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `log` longtext NOT NULL COMMENT '日志备注',
  `log_url` varchar(255) NOT NULL COMMENT '执行的URL',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  `username` varchar(255) NOT NULL COMMENT '执行者',
  `title` varchar(255) NOT NULL COMMENT '标题'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为日志表' ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_access`
--

CREATE TABLE `tp_auth_access` (
  `role_id` mediumint(8) UNSIGNED NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  `menu_id` int(11) DEFAULT NULL COMMENT '后台菜单ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限授权表';

--
-- 转存表中的数据 `tp_auth_access`
--

INSERT INTO `tp_auth_access` (`role_id`, `rule_name`, `type`, `menu_id`) VALUES
(2, 'index/auth/default', 'admin_url', 1),
(2, 'index/auth/default', 'admin_url', 8),
(2, 'index/auth/menu', 'admin_url', 9),
(2, 'index/auth/menuadd', 'admin_url', 10),
(2, 'index/auth/menuedit', 'admin_url', 11),
(2, 'index/auth/menudelete', 'admin_url', 12),
(2, 'index/auth/menuorder', 'admin_url', 13);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_role`
--

CREATE TABLE `tp_auth_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `pid` smallint(6) DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) UNSIGNED DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `tp_auth_role`
--

INSERT INTO `tp_auth_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0),
(2, '文章管理', 0, 1, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_role_user`
--

CREATE TABLE `tp_auth_role_user` (
  `role_id` int(11) UNSIGNED DEFAULT '0' COMMENT '角色 id',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

--
-- 转存表中的数据 `tp_auth_role_user`
--

INSERT INTO `tp_auth_role_user` (`role_id`, `user_id`) VALUES
(2, 16);

-- --------------------------------------------------------

--
-- 表的结构 `tp_menu`
--

CREATE TABLE `tp_menu` (
  `id` smallint(6) UNSIGNED NOT NULL COMMENT '自增ID',
  `parent_id` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级ID',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `url_param` char(50) NOT NULL COMMENT 'url参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) NOT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `list_order` smallint(6) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序ID',
  `rule_param` varchar(255) NOT NULL COMMENT '验证规则',
  `nav_id` int(11) DEFAULT '0' COMMENT 'nav ID ',
  `request` varchar(255) NOT NULL COMMENT '请求方式（日志生成）',
  `log_rule` varchar(255) NOT NULL COMMENT '日志规则'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

--
-- 转存表中的数据 `tp_menu`
--

INSERT INTO `tp_menu` (`id`, `parent_id`, `app`, `model`, `action`, `url_param`, `type`, `status`, `name`, `icon`, `remark`, `list_order`, `rule_param`, `nav_id`, `request`, `log_rule`) VALUES
(1, 0, 'index', 'auth', 'default', '', 0, 1, '系统管理', '', '', 10, '', 0, '', ''),
(2, 1, 'index', 'auth', 'default', '', 0, 1, '权限管理', '', '', 0, '', 0, '', ''),
(3, 2, 'index', 'auth', 'role', '', 1, 1, '角色管理', '', '', 0, '', 0, '', ''),
(4, 3, 'index', 'auth', 'roleAdd', '', 1, 0, '角色增加', '', '', 0, '', 0, '', ''),
(5, 3, 'index', 'auth', 'roleEdit', '', 1, 0, '角色编辑', '', '', 0, '', 0, '', ''),
(6, 3, 'index', 'auth', 'roleDelete', '', 1, 0, '角色删除', '', '', 0, '', 0, '', ''),
(7, 3, 'index', 'auth', 'authorize', '', 1, 0, '角色授权', '', '', 0, '', 0, '', ''),
(8, 1, 'index', 'auth', 'default', '', 0, 1, '菜单管理', '', '', 0, '', 0, '', ''),
(9, 8, 'index', 'auth', 'menu', '', 1, 1, '菜单列表', '', '', 0, '', 0, '', ''),
(10, 9, 'index', 'auth', 'menuAdd', '', 1, 0, '菜单增加', '', '', 0, '', 0, '', ''),
(11, 9, 'index', 'auth', 'menuEdit', '', 1, 0, '菜单修改', '', '', 0, '', 0, '', ''),
(12, 9, 'index', 'auth', 'menuDelete', '', 1, 0, '菜单删除', '', '', 0, '', 0, '', ''),
(13, 9, 'index', 'auth', 'menuOrder', '', 1, 0, '菜单排序', '', '', 0, '', 0, '', ''),
(14, 2, 'index', 'admin', 'index', '', 1, 1, '用户管理', '', '', 0, '', 0, '', '');

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
-- Indexes for table `sys_admin`
--
ALTER TABLE `sys_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_auth`
--
ALTER TABLE `sys_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_group`
--
ALTER TABLE `sys_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_role`
--
ALTER TABLE `sys_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_action_log`
--
ALTER TABLE `tp_action_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `tp_auth_access`
--
ALTER TABLE `tp_auth_access`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `rule_name` (`rule_name`) USING BTREE;

--
-- Indexes for table `tp_auth_role`
--
ALTER TABLE `tp_auth_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`pid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tp_auth_role_user`
--
ALTER TABLE `tp_auth_role_user`
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tp_menu`
--
ALTER TABLE `tp_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `model` (`model`),
  ADD KEY `parent_id` (`parent_id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ac_bill`
--
ALTER TABLE `ac_bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '账单ID', AUTO_INCREMENT=22;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'users_group ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `sys_admin`
--
ALTER TABLE `sys_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `sys_auth`
--
ALTER TABLE `sys_auth`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sys_group`
--
ALTER TABLE `sys_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '权限组ID';
--
-- 使用表AUTO_INCREMENT `sys_role`
--
ALTER TABLE `sys_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tp_action_log`
--
ALTER TABLE `tp_action_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- 使用表AUTO_INCREMENT `tp_auth_role`
--
ALTER TABLE `tp_auth_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_menu`
--
ALTER TABLE `tp_menu`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID', AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
