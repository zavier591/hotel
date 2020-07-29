/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-03-25 02:34:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `ftype` varchar(255) DEFAULT NULL,
  `fprice` int(11) DEFAULT NULL,
  `fimg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', '标准房间1号', '标准房', '80', 'images/f1.jpg');
INSERT INTO `hotel` VALUES ('2', '双人房1号', '标准房', '100', 'images/f2.jpg');
INSERT INTO `hotel` VALUES ('3', '大床房1号', '大床房', '120', 'images/f3.jpg');
INSERT INTO `hotel` VALUES ('4', '大床房2号', '大床房', '150', 'images/f4.jpg');
INSERT INTO `hotel` VALUES ('5', '套房1号', '套房', '200', 'images/f5.jpg');
 