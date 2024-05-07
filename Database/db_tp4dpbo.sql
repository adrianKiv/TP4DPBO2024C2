/*
Navicat MySQL Data Transfer

Source Server         : coba01
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_tp4dpbo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-07 09:57:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id_countries` int(11) NOT NULL AUTO_INCREMENT,
  `nama_countries` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_countries`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'indonesia');
INSERT INTO `countries` VALUES ('2', 'german');
INSERT INTO `countries` VALUES ('3', 'japan');
INSERT INTO `countries` VALUES ('4', 'america');
INSERT INTO `countries` VALUES ('5', 'united kingdom');
INSERT INTO `countries` VALUES ('9', 'chinese');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `id_countries` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  KEY `Countries_key` (`id_countries`),
  CONSTRAINT `Countries_key` FOREIGN KEY (`id_countries`) REFERENCES `countries` (`id_countries`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'jamile', 'mile@gmail.com', '08453711938', '2024-05-07', '1');
INSERT INTO `member` VALUES ('18', 'yan', 'bob@gmail.com', '08765432456', '2024-05-07', '5');
INSERT INTO `member` VALUES ('23', 'johan', 'johan@gmail.com', '08636734626', '2024-05-07', '3');
INSERT INTO `member` VALUES ('80', 'wawan maung', 'wawanmaulana@gmail.com', '08547352736', '2024-04-23', '4');
