/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-08 22:23:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `diary`
-- ----------------------------
DROP TABLE IF EXISTS `diary`;
CREATE TABLE `diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `memory` longtext NOT NULL,
  `classify` text NOT NULL,
  `sendtime` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of diary
-- ----------------------------
INSERT INTO `diary` VALUES ('1', '标题1', '内容1', '个人日记', '2015.03.03.06:27:56pm');
INSERT INTO `diary` VALUES ('2', '标题2', '内容2', '个人日记', '2015.03.03.06:28:42pm');
INSERT INTO `diary` VALUES ('3', '标题3', '内容3', '个人日记', '2015.03.03.06:28:53pm');
INSERT INTO `diary` VALUES ('4', '标题4', '内容4', '个人日记', '2015.03.03.06:29:11pm');
INSERT INTO `diary` VALUES ('5', '标题5', '内容5', '个人日记', '2015.03.03.06:29:24pm');
INSERT INTO `diary` VALUES ('6', '标题6', '内容6', '个人日记', '2015.03.03.06:29:36pm');
INSERT INTO `diary` VALUES ('7', '标题7', '内容7', '个人日记', '2015.03.03.06:29:53pm');
INSERT INTO `diary` VALUES ('8', '标题xxx', '内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容x内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容x内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容x内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容x内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容x内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx内容xxx', '个人日记', '2015.03.03.06:30:16pm');
INSERT INTO `diary` VALUES ('9', 'fa ', 'afsadsada dsad a', '个人日记', '2015.03.28.04:29:14pm');
INSERT INTO `diary` VALUES ('10', 'dsafs', '', '', null);
INSERT INTO `diary` VALUES ('11', 'sad', '', '', null);
INSERT INTO `diary` VALUES ('12', 'sad', '', '', null);
INSERT INTO `diary` VALUES ('13', 'sad', '', '', null);

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `userpassword` text NOT NULL,
  `firsttime` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('68', 'caicaibi', '123456', '2015.03.03.05:29:01pm');
INSERT INTO `login` VALUES ('69', 'dsa', 'fsa', '');
INSERT INTO `login` VALUES ('72', 'caicaibi1', '96c5d88d5086d283ab1bedcf7248bf12', '2015.06.07.02:27:39am');

-- ----------------------------
-- Table structure for `messageboard`
-- ----------------------------
DROP TABLE IF EXISTS `messageboard`;
CREATE TABLE `messageboard` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `people` text NOT NULL,
  `message` longtext NOT NULL,
  `reply` text NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messageboard
-- ----------------------------
INSERT INTO `messageboard` VALUES ('1', '', '123456', '', '2015.02.17.09:06:46pm');
INSERT INTO `messageboard` VALUES ('3', '', '123456789', '', '2015.02.17.09:37:15pm');
INSERT INTO `messageboard` VALUES ('5', '', '12', '', '2015.02.17.10:12:44pm');
INSERT INTO `messageboard` VALUES ('6', '', '123456', '', '2015.02.17.10:12:50pm');
INSERT INTO `messageboard` VALUES ('7', '', '九曲黄河完美里沙，浪涛风波至天涯', '', '2015.02.22.12:16:33pm');
INSERT INTO `messageboard` VALUES ('8', '', '万里长城万里长', '', '2015.03.03.05:25:02pm');
INSERT INTO `messageboard` VALUES ('9', '', 'xuexixuexi', '', '2015.03.03.06:18:17pm');
INSERT INTO `messageboard` VALUES ('10', '', '123456789', '', '2015.03.03.06:31:22pm');

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `sex` text NOT NULL,
  `bloodtype` text NOT NULL,
  `birthday` text NOT NULL,
  `constellation` text NOT NULL,
  `work` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', '踩踩', '男', 'B', '456', '金牛座', '学生');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of test
-- ----------------------------
