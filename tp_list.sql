/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tp_list

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2016-12-22 03:55:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '分类ID如果不设置进入默认栏目',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `introduction` varchar(255) DEFAULT '' COMMENT '简介',
  `content` longtext COMMENT '内容',
  `author` varchar(20) DEFAULT '' COMMENT '作者',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 待审核  1 审核',
  `reading` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶  0 不置顶  1 置顶',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `publish_time` int(11) NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `alias` varchar(50) DEFAULT '' COMMENT '导航别名',
  `remark` longtext COMMENT '备注',
  `icon` varchar(20) DEFAULT '' COMMENT '分类图标',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '分类类型  1  列表  2 单页',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`,`type`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Table structure for tp_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_group`;
CREATE TABLE `tp_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '用户组名称',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `rules` varchar(255) DEFAULT NULL COMMENT '权限规则ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tp_rules
-- ----------------------------
DROP TABLE IF EXISTS `tp_rules`;
CREATE TABLE `tp_rules` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL COMMENT '权限名称',
  `pid` int(6) DEFAULT NULL,
  `controller` varchar(32) DEFAULT NULL COMMENT '控制器',
  `action` varchar(32) DEFAULT NULL COMMENT '操作方法',
  `path` varchar(30) DEFAULT NULL COMMENT '全路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tp_system
-- ----------------------------
DROP TABLE IF EXISTS `tp_system`;
CREATE TABLE `tp_system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '配置项名称',
  `value` text NOT NULL COMMENT '配置项值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) DEFAULT NULL COMMENT '用户组id',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机',
  `idcard` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `sex` varchar(6) DEFAULT NULL COMMENT '性别',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  0 禁止',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `last_login_time` int(11) DEFAULT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(50) DEFAULT '' COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Table structure for tp_user_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_group`;
CREATE TABLE `tp_user_group` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
