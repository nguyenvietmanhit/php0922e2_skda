/*
Navicat MySQL Data Transfer

Source Server         : localhost xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : a

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-11-22 09:58:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Tivi');
INSERT INTO `categories` VALUES ('2', 'Điện thoại');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'TV Samsung', '1000', 'Chi tiết tv sss', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('2', '1', 'TV Sony', '2000', 'Chi tiết tv sony', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('3', '1', 'TV Toshiba', '3000', 'Chi tiết tv toshiba', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('4', '1', 'TV LG', '1500', 'Chi tiết tv lg', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('5', '2', 'Iphone X', '1000', 'Chi tiết ipx', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('6', '2', 'Ss note', '2000', 'Chi tiết ss note', '2022-10-07 09:07:32');
INSERT INTO `products` VALUES ('7', null, 'Product no category id', '6000', 'Chi tiết product no category', '2022-11-22 09:58:17');
