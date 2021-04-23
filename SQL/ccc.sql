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

 Date: 23/04/2021 17:57:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `device_id` int(5) NOT NULL,
  `event_date` date NOT NULL,
  `games_played` tinyint(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES (1, 1, 1, '2021-04-10', 2);
INSERT INTO `activity` VALUES (2, 1, 3, '2021-04-15', 5);
INSERT INTO `activity` VALUES (3, 3, 9, '2021-04-16', 3);
INSERT INTO `activity` VALUES (4, 3, 4, '2021-04-17', 2);
INSERT INTO `activity` VALUES (5, 2, 2, '2021-04-01', 3);
INSERT INTO `activity` VALUES (6, 2, 5, '2021-04-10', 5);
INSERT INTO `activity` VALUES (7, 1, 5, '2021-04-18', 3);

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `empid` int(11) NOT NULL,
  `bonus` decimal(20, 2) NOT NULL,
  PRIMARY KEY (`empid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bonus
-- ----------------------------
INSERT INTO `bonus` VALUES (2, 500.00);
INSERT INTO `bonus` VALUES (4, 3000.00);

-- ----------------------------
-- Table structure for c_tt
-- ----------------------------
DROP TABLE IF EXISTS `c_tt`;
CREATE TABLE `c_tt`  (
  `id` mediumint(20) NOT NULL AUTO_INCREMENT,
  `text` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of c_tt
-- ----------------------------
INSERT INTO `c_tt` VALUES (1, 'C', '200', 66);
INSERT INTO `c_tt` VALUES (2, 'Cddd', '2123dfd', 11);
INSERT INTO `c_tt` VALUES (3, '小六', 'kdfc', 11);
INSERT INTO `c_tt` VALUES (4, 'ffdsf', 'aaaaa', 11);
INSERT INTO `c_tt` VALUES (5, 'ffdsf2', 'xiexiaomao', 11);
INSERT INTO `c_tt` VALUES (6, 'ffdsf2', 'aaaaa', 77);
INSERT INTO `c_tt` VALUES (7, 'ffdsf2', 'aaaaa', 11);
INSERT INTO `c_tt` VALUES (8, 'ffdsf2', 'aaaaa', 11);
INSERT INTO `c_tt` VALUES (10, '王五', '烧饼', 11);
INSERT INTO `c_tt` VALUES (11, 'ff', 'ff', 77);

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
  `salary` decimal(10, 2) NOT NULL,
  `department_id` int(11) NOT NULL DEFAULT 1,
  `company` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`username`, `id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of c_user
-- ----------------------------
INSERT INTO `c_user` VALUES (1, 'yige142', '123123', '保密', '13123232131', '12312312312312312312', 8000.00, 1, 'A');
INSERT INTO `c_user` VALUES (2, '22', '123', '1', '1', '11', 7000.00, 1, 'A');
INSERT INTO `c_user` VALUES (3, 'yige143', '4297f44b13955235245b2497399d7a93', '男', '123123', '1583327548608', 6000.00, 2, 'A');
INSERT INTO `c_user` VALUES (4, 'yige144', '4297f44b13955235245b2497399d7a93', '男', '1312321231', '1583328505809', 5000.00, 1, 'B');
INSERT INTO `c_user` VALUES (5, 'yige12', '4297f44b13955235245b2497399d7a93', '男', '123123', '1583329597148', 5000.00, 3, 'B');
INSERT INTO `c_user` VALUES (6, 'sdf', '4297f44b13955235245b2497399d7a93', '男', '1312321231', '1583329849155', 9000.00, 1, 'C');
INSERT INTO `c_user` VALUES (7, 'ff', '', '保密', '1', NULL, 6000.00, 3, 'C');
INSERT INTO `c_user` VALUES (8, 'zxcf', '123', '保密', '12323', NULL, 5500.00, 1, 'G');
INSERT INTO `c_user` VALUES (9, 'gg', 'ff', '保密', '23', NULL, 11000.00, 1, 'A');
INSERT INTO `c_user` VALUES (10, '谢222', '', '保密', NULL, NULL, 5000.00, 1, 'D');

-- ----------------------------
-- Table structure for candidate
-- ----------------------------
DROP TABLE IF EXISTS `candidate`;
CREATE TABLE `candidate`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of candidate
-- ----------------------------
INSERT INTO `candidate` VALUES (1, 'A');
INSERT INTO `candidate` VALUES (2, 'B');
INSERT INTO `candidate` VALUES (3, 'C');
INSERT INTO `candidate` VALUES (4, 'D');
INSERT INTO `candidate` VALUES (5, 'E');

-- ----------------------------
-- Table structure for cc
-- ----------------------------
DROP TABLE IF EXISTS `cc`;
CREATE TABLE `cc`  (
  `dsf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cc
-- ----------------------------
INSERT INTO `cc` VALUES ('dsf23', 1);
INSERT INTO `cc` VALUES ('xcvxvcx', 2);
INSERT INTO `cc` VALUES ('sdf', 3);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'IT部门');
INSERT INTO `department` VALUES (2, '总经办');
INSERT INTO `department` VALUES (3, '行政部');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `salary` int(10) NULL DEFAULT NULL,
  `manageId` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES (1, 'joe', 7000, 3);
INSERT INTO `employee` VALUES (2, 'henry', 8000, 4);
INSERT INTO `employee` VALUES (3, 'tom', 6000, 0);
INSERT INTO `employee` VALUES (4, 'jem', 9000, 0);
INSERT INTO `employee` VALUES (5, 'tt', 22, 3);
INSERT INTO `employee` VALUES (6, 'ff', 2, 3);
INSERT INTO `employee` VALUES (7, 'gg', 2323, 3);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL DEFAULT 0,
  `orderid` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, 1, 'sdf11');
INSERT INTO `order` VALUES (2, 2, 'zxc22');

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

-- ----------------------------
-- Table structure for salry
-- ----------------------------
DROP TABLE IF EXISTS `salry`;
CREATE TABLE `salry`  (
  `id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `salary` decimal(10, 2) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of salry
-- ----------------------------
INSERT INTO `salry` VALUES (1, 1, 20.00);
INSERT INTO `salry` VALUES (2, 1, 20.00);
INSERT INTO `salry` VALUES (1, 2, 30.00);
INSERT INTO `salry` VALUES (2, 2, 30.00);
INSERT INTO `salry` VALUES (3, 2, 40.00);
INSERT INTO `salry` VALUES (1, 3, 40.00);
INSERT INTO `salry` VALUES (3, 3, 60.00);
INSERT INTO `salry` VALUES (1, 4, 60.00);
INSERT INTO `salry` VALUES (1, 4, 70.00);

-- ----------------------------
-- Table structure for vote
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CandidateId` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of vote
-- ----------------------------
INSERT INTO `vote` VALUES (1, 2);
INSERT INTO `vote` VALUES (2, 4);
INSERT INTO `vote` VALUES (3, 3);
INSERT INTO `vote` VALUES (4, 2);
INSERT INTO `vote` VALUES (5, 5);

SET FOREIGN_KEY_CHECKS = 1;
