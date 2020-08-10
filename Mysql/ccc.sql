/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : ccc

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 10/08/2020 11:36:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for c_tt
-- ----------------------------
DROP TABLE IF EXISTS `c_tt`;
CREATE TABLE `c_tt`  (
  `id` mediumint(20) NOT NULL AUTO_INCREMENT,
  `text` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of c_tt
-- ----------------------------
INSERT INTO `c_tt` VALUES (1, 'C', '200');
INSERT INTO `c_tt` VALUES (2, 'Cddd', '2123dfd');
INSERT INTO `c_tt` VALUES (3, '小六', 'kdfc');
INSERT INTO `c_tt` VALUES (4, 'ffdsf', 'aaaaa');
INSERT INTO `c_tt` VALUES (5, 'ffdsf2', 'xiexiaomao');
INSERT INTO `c_tt` VALUES (6, 'ffdsf2', 'aaaaa');
INSERT INTO `c_tt` VALUES (7, 'ffdsf2', 'aaaaa');
INSERT INTO `c_tt` VALUES (8, 'ffdsf2', 'aaaaa');
INSERT INTO `c_tt` VALUES (10, '王五', '烧饼');

-- ----------------------------
-- Table structure for c_user
-- ----------------------------
DROP TABLE IF EXISTS `c_user`;
CREATE TABLE `c_user`  (
  `id` mediumint(20) NOT NULL AUTO_INCREMENT,
  `username` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sex` char(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '保密',
  `mobile` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `creatdate` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of c_user
-- ----------------------------
INSERT INTO `c_user` VALUES (1, 'yige142', '123123', '保密', '13123232131', '12312312312312312312');
INSERT INTO `c_user` VALUES (2, '22', '123', '1', '1', '11');
INSERT INTO `c_user` VALUES (3, 'yige143', '4297f44b13955235245b2497399d7a93', '男', '123123', '1583327548608');
INSERT INTO `c_user` VALUES (4, 'yige144', '4297f44b13955235245b2497399d7a93', '男', '1312321231', '1583328505809');
INSERT INTO `c_user` VALUES (5, 'yige12', '4297f44b13955235245b2497399d7a93', '男', '123123', '1583329597148');
INSERT INTO `c_user` VALUES (6, 'sdf', '4297f44b13955235245b2497399d7a93', '男', '1312321231', '1583329849155');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `salary` int(10) NULL DEFAULT NULL,
  `manageId` int(5) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('joe', 7000, 3, 1);
INSERT INTO `employee` VALUES ('henry', 8000, 4, 2);
INSERT INTO `employee` VALUES ('tom', 6000, 0, 3);
INSERT INTO `employee` VALUES ('jem', 9000, 0, 4);

-- ----------------------------
-- Table structure for repetition_arr
-- ----------------------------
DROP TABLE IF EXISTS `repetition_arr`;
CREATE TABLE `repetition_arr`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `age` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE,
  INDEX `age`(`age`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of repetition_arr
-- ----------------------------
INSERT INTO `repetition_arr` VALUES (1, 'yige142', 15);
INSERT INTO `repetition_arr` VALUES (2, 'yige142', 20);
INSERT INTO `repetition_arr` VALUES (3, 'ccc', 22);
INSERT INTO `repetition_arr` VALUES (4, 'zxc', 55);
INSERT INTO `repetition_arr` VALUES (5, 'ccc', 33);
INSERT INTO `repetition_arr` VALUES (6, 'ddd', 2);
INSERT INTO `repetition_arr` VALUES (7, 'ddd', 3);
INSERT INTO `repetition_arr` VALUES (8, 'ddd', 3);
INSERT INTO `repetition_arr` VALUES (9, 'ff', 3);

SET FOREIGN_KEY_CHECKS = 1;
