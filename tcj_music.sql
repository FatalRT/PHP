/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : tcj_music

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-06-27 16:17:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `paw` char(32) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(32) CHARACTER SET gbk NOT NULL,
  `a_date` date NOT NULL,
  `a_singer` varchar(32) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('10', 'a', '0000-00-00', 'a');
INSERT INTO `album` VALUES ('11', 'aa', '0000-00-00', 'aa');
INSERT INTO `album` VALUES ('12', 'aaa', '0000-00-00', '哈哈哈');
INSERT INTO `album` VALUES ('13', 'aaaa', '0000-00-00', 'aaaa');
INSERT INTO `album` VALUES ('14', 'aaaaa', '0000-00-00', 'aaaaaa');
INSERT INTO `album` VALUES ('17', '自定义', '2018-06-02', '许嵩');
INSERT INTO `album` VALUES ('18', '天下', '2018-06-02', '张杰');

-- ----------------------------
-- Table structure for `favorite`
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `u_name` int(12) NOT NULL,
  `f_song` int(12) NOT NULL,
  `f_album` int(11) NOT NULL,
  `f_singer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `singer`
-- ----------------------------
DROP TABLE IF EXISTS `singer`;
CREATE TABLE `singer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(32) CHARACTER SET gbk NOT NULL,
  `s_sex` varchar(32) CHARACTER SET gbk NOT NULL,
  `s_address` varchar(50) CHARACTER SET gbk NOT NULL,
  `s_company` varchar(32) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of singer
-- ----------------------------
INSERT INTO `singer` VALUES ('4', '林俊杰', '男', '中国', 'xxx公司');
INSERT INTO `singer` VALUES ('8', '啊啊', '男', 'hhh', '阿萨啊');
INSERT INTO `singer` VALUES ('9', '对对对', '男', 'hhh', '阿萨啊');
INSERT INTO `singer` VALUES ('10', '张杰', '男', '中国', 'XXXXX公司');
INSERT INTO `singer` VALUES ('11', '许嵩', '男', '中国', 'XXXXX公司');

-- ----------------------------
-- Table structure for `song`
-- ----------------------------
DROP TABLE IF EXISTS `song`;
CREATE TABLE `song` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(32) CHARACTER SET gbk NOT NULL,
  `g_album` varchar(32) CHARACTER SET gbk NOT NULL,
  `g_style` varchar(32) CHARACTER SET gbk NOT NULL,
  `g_language` varchar(32) CHARACTER SET gbk NOT NULL,
  `g_num` int(12) NOT NULL,
  `g_singer` varchar(32) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of song
-- ----------------------------
INSERT INTO `song` VALUES ('18', 'aaaaa', 'aaaa', '哈哈哈', 'aaaa', '10', 'a');
INSERT INTO `song` VALUES ('19', 'a', 's', 'd', 'df', '10', 'asdfg');
INSERT INTO `song` VALUES ('23', '城府', '自定义', '流行', '中文', '0', '许嵩');
INSERT INTO `song` VALUES ('24', '天下', '天下', '流行', '中文', '0', '张杰');
INSERT INTO `song` VALUES ('25', '测试', '测试', '测试', '测试', '0', '测试');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(12) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(32) NOT NULL,
  `u_passw` char(32) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('9', 'b', 'b', '1');
INSERT INTO `user` VALUES ('10', 'c', 'c', '0');
INSERT INTO `user` VALUES ('11', 'e', 'e', '1');
INSERT INTO `user` VALUES ('12', 'test', 'test', '0');
