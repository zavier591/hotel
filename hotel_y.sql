/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2019-12-11 02:34:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hotel_y
-- ----------------------------
DROP TABLE IF EXISTS `hotel_y`;
CREATE TABLE `hotel_y` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_phone` varchar(255) DEFAULT NULL,
  `reservation_name` varchar(255) DEFAULT NULL,
  `reservation_time` datetime DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `rzdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel_y
-- ----------------------------
INSERT INTO `hotel_y` VALUES ('3', '18276864205', 'wjg', '2018-03-25 01:30:02', '标准房间1号', '2018-3-27');
INSERT INTO `hotel_y` VALUES ('2', '18276864205', 'wjg', '2018-03-25 01:30:02', '标准房间1号', '2018-3-26');
INSERT INTO `hotel_y` VALUES ('4', '18276864205', 'wjg', '2018-03-25 01:30:02', '标准房间1号', '2018-3-28');
