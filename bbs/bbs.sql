/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-12-02 16:07:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `address` varchar(220) DEFAULT '',
  `tel` char(18) DEFAULT NULL,
  `postal` char(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for `bind_roles`
-- ----------------------------
DROP TABLE IF EXISTS `bind_roles`;
CREATE TABLE `bind_roles` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `platform` char(25) NOT NULL COMMENT '平台名称',
  `system` char(25) NOT NULL,
  `server_name` char(20) NOT NULL,
  `roles_name` char(30) NOT NULL COMMENT '绑定角色名称',
  `invitation_code` varchar(120) DEFAULT '',
  `roles_email` varchar(100) DEFAULT '',
  `roles_register_time` int(11) DEFAULT '0' COMMENT '角色注册时间',
  `roles_level` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bind_roles
-- ----------------------------
INSERT INTO `bind_roles` VALUES ('1', '2', 'xx平台', 'xx系统', 'xx名', '捉妖达人', 'dfdf132', 'yige142@163.com', '1574413664', '16');

-- ----------------------------
-- Table structure for `invite_friends`
-- ----------------------------
DROP TABLE IF EXISTS `invite_friends`;
CREATE TABLE `invite_friends` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `friends_name` char(25) DEFAULT '' COMMENT '邀请的好友游戏名称',
  `freinds_img` varchar(125) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invite_friends
-- ----------------------------
INSERT INTO `invite_friends` VALUES ('1', '2', '捉妖大师', 'xx/fd.png');

-- ----------------------------
-- Table structure for `reward`
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
  `reward_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `day` tinyint(4) NOT NULL,
  `reward` char(4) NOT NULL,
  PRIMARY KEY (`reward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reward
-- ----------------------------
INSERT INTO `reward` VALUES ('1', '3', 'A');
INSERT INTO `reward` VALUES ('2', '5', 'B');
INSERT INTO `reward` VALUES ('3', '10', 'C');
INSERT INTO `reward` VALUES ('4', '20', 'D');
INSERT INTO `reward` VALUES ('5', '25', 'E');
INSERT INTO `reward` VALUES ('6', '30', 'F');

-- ----------------------------
-- Table structure for `reward_count`
-- ----------------------------
DROP TABLE IF EXISTS `reward_count`;
CREATE TABLE `reward_count` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `last_receive_time` int(11) DEFAULT NULL COMMENT '上次领取时间',
  `reward_num` tinyint(2) NOT NULL,
  `receive_reward` char(30) DEFAULT NULL COMMENT '已获得奖励记录',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reward_count
-- ----------------------------

-- ----------------------------
-- Table structure for `reward_list`
-- ----------------------------
DROP TABLE IF EXISTS `reward_list`;
CREATE TABLE `reward_list` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `reward_id` mediumint(20) NOT NULL,
  `props_id` mediumint(20) NOT NULL COMMENT '道具ID',
  `props_name` char(20) NOT NULL DEFAULT '' COMMENT '道具名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reward_list
-- ----------------------------

-- ----------------------------
-- Table structure for `reward_records`
-- ----------------------------
DROP TABLE IF EXISTS `reward_records`;
CREATE TABLE `reward_records` (
  `id` mediumint(11) NOT NULL,
  `user_id` mediumint(11) NOT NULL,
  `receive_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reward_records
-- ----------------------------

-- ----------------------------
-- Table structure for `task_list`
-- ----------------------------
DROP TABLE IF EXISTS `task_list`;
CREATE TABLE `task_list` (
  `id` mediumint(30) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(30) NOT NULL,
  `daily_attendance_id` mediumint(20) DEFAULT '0' COMMENT '每日打卡奖励名称的ID',
  `reward_three_day` tinyint(2) DEFAULT '0' COMMENT '三天奖 0,表示为领取;1表示已领取',
  `reward_seven_day` tinyint(2) DEFAULT '0' COMMENT '签到7天奖 0未领取;1已领取',
  `daily_attendance_num` tinyint(2) DEFAULT '0' COMMENT '累计打卡天数',
  `invite_friends_id` mediumint(20) DEFAULT '0' COMMENT '邀请好友奖励名称的ID',
  `invite_friends_status` tinyint(2) DEFAULT '0' COMMENT '0未领取，1已领取，根据invite_friends_num来判断',
  `invite_two` tinyint(2) DEFAULT '0' COMMENT '邀请2人奖 0未领取,1已领取',
  `invite_five` tinyint(2) DEFAULT '0' COMMENT '邀请5人奖 0未领取,1已领',
  `invite_ten` tinyint(2) DEFAULT '0' COMMENT '邀请10人奖,0未领,1已领',
  `invite_friends_num` tinyint(2) DEFAULT '0' COMMENT '邀请好友数',
  `creat_roles_id` mediumint(20) DEFAULT '0' COMMENT '创建角色奖励的ID',
  `creat_role` tinyint(2) DEFAULT '0' COMMENT '创建角色奖励 0为未领取，1为已领取',
  `role_level` tinyint(3) DEFAULT '0' COMMENT '角色等级,根据等级判断是否能领',
  `role_five` tinyint(2) DEFAULT '0' COMMENT '前端5级奖励 0未领,1已领',
  `role_ten` tinyint(2) DEFAULT '0' COMMENT '前端等级10级奖励0为未领取，1为已领取',
  `role_fifteen` tinyint(2) DEFAULT '0' COMMENT '前端15级奖励',
  `role_twenty` tinyint(2) DEFAULT '0' COMMENT '前端20级奖励 0未领取，1已领取',
  `luck_draw_id` mediumint(20) unsigned zerofill DEFAULT NULL,
  `luck_draw_status` tinyint(2) DEFAULT '0' COMMENT '0已抽完,1未抽完',
  `luck_draw_num` tinyint(2) DEFAULT '0' COMMENT '能抽奖的次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of task_list
-- ----------------------------
INSERT INTO `task_list` VALUES ('1', '2', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '5', '0', '16', '0', '0', '0', '0', null, '0', '0');

-- ----------------------------
-- Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `topic_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(5) NOT NULL,
  `nick_name` char(25) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `send_time` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic
-- ----------------------------
INSERT INTO `topic` VALUES ('1', '2', '123', 'sdfsdf', '1574068276');
INSERT INTO `topic` VALUES ('2', '2', '123', 'sdfsdf<?php echo 123; ?>dfsf', '1574068277');
INSERT INTO `topic` VALUES ('3', '2', '123', 'sdfsdf&lt;?php echo 123; ?&gt;dfsf', '1574068278');
INSERT INTO `topic` VALUES ('4', '2', '123', 'zxcxzcdfsf&lt;javascript&gt; &lt;/javascript&gt; alert33;', '1574068279');
INSERT INTO `topic` VALUES ('5', '13', '李亮', '今天天气不错', '1574134797');
INSERT INTO `topic` VALUES ('6', '13', '李亮', '士大夫首发式', '1574134811');
INSERT INTO `topic` VALUES ('7', '14', '花花', '小哥哥小哥哥', '1574134887');
INSERT INTO `topic` VALUES ('8', '14', '花花', '顶顶顶顶啧啧啧', '1574134910');
INSERT INTO `topic` VALUES ('9', '15', '光光', '小光子报道', '1574135248');
INSERT INTO `topic` VALUES ('10', '15', '光光', '小光子报666', '1574135255');
INSERT INTO `topic` VALUES ('11', '15', '光光', '小光子报7777', '1574135261');
INSERT INTO `topic` VALUES ('12', '15', '光光', '小光子报8888', '1574135269');
INSERT INTO `topic` VALUES ('13', '15', '光光', '小光子报9999', '1574135277');
INSERT INTO `topic` VALUES ('14', '15', '光光', '小光子报220000323', '1574135287');
INSERT INTO `topic` VALUES ('15', '17', '黄黄', '蛋糕丰富', '1574154414');
INSERT INTO `topic` VALUES ('16', '2', '123', 'dfsfd', '1574160518');
INSERT INTO `topic` VALUES ('17', '2', '123', '&lt;script&gt;alert(3);\'&quot;&quot;&lt;/script&gt;', '1574219295');
INSERT INTO `topic` VALUES ('18', '14', '花花', 'fdsfsfd', '1574245625');
INSERT INTO `topic` VALUES ('19', '14', '花花', 'fdsfsfd', '1574245649');
INSERT INTO `topic` VALUES ('20', '14', '花花', 'fdsfsfdfd', '1574245740');
INSERT INTO `topic` VALUES ('21', '14', '花花', 'zxcdfffdf', '1574247603');
INSERT INTO `topic` VALUES ('22', '14', '花花', 'zxc', '1574247647');
INSERT INTO `topic` VALUES ('23', '14', '花花', 'dfs', '1574247812');
INSERT INTO `topic` VALUES ('24', '14', '花花', 'sdfs', '1574247841');
INSERT INTO `topic` VALUES ('25', '14', '花花', 'dfsf', '1574247930');
INSERT INTO `topic` VALUES ('26', '14', '花花', 'zxc', '1574247955');
INSERT INTO `topic` VALUES ('27', '14', '花花', '好大一朵花', '1574248336');
INSERT INTO `topic` VALUES ('28', '14', '花花', 'dfd', '1574248403');
INSERT INTO `topic` VALUES ('29', '14', '花花', '想', '1574248439');
INSERT INTO `topic` VALUES ('30', '14', '花花', 'zxcdfdf', '1574248683');
INSERT INTO `topic` VALUES ('31', '14', '花花', '今天是个好天气&lt;scrpit&gt;alert(123)&lt;/script&gt;&lt;?php echo \'232132\'?&gt;ffdsfd\\\\fdsf', '1574248743');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `account` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nick_name` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `introduction` varchar(200) DEFAULT NULL COMMENT '简介',
  `last_login` int(11) NOT NULL COMMENT '最后登录时间',
  `err_num` tinyint(2) NOT NULL COMMENT '错误时间',
  `invite_code` char(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'yige142', '4297f44b13955235245b2497399d7a93', '谢小毛', '男', '1574332513', '0', null);
INSERT INTO `user` VALUES ('2', '123', '4297f44b13955235245b2497399d7a93', '123', 'ff', '1575013935', '0', null);
INSERT INTO `user` VALUES ('3', '1234', '4297f44b13955235245b2497399d7a93', '123', 'ff', '1574332513', '0', null);
INSERT INTO `user` VALUES ('4', '12345', '4297f44b13955235245b2497399d7a93', '123', 'ff', '0', '0', null);
INSERT INTO `user` VALUES ('5', '123z', '202cb962ac59075b964b07152d234b70', '123', '123', '0', '0', null);
INSERT INTO `user` VALUES ('6', '123x', '202cb962ac59075b964b07152d234b70', '123', '123', '0', '0', null);
INSERT INTO `user` VALUES ('7', '1236', '4297f44b13955235245b2497399d7a93', '123', 'ffdd', '0', '0', null);
INSERT INTO `user` VALUES ('8', 'zz', '4297f44b13955235245b2497399d7a93', 'z', 'ff', '1574014230', '0', null);
INSERT INTO `user` VALUES ('9', 'fff', '4297f44b13955235245b2497399d7a93', '123123', 'sd', '1574019660', '0', null);
INSERT INTO `user` VALUES ('10', 'zzz', '4297f44b13955235245b2497399d7a93', '123123', 'sd', '1574019704', '0', null);
INSERT INTO `user` VALUES ('11', 'zxc', '4297f44b13955235245b2497399d7a93', 'df', 'df', '1574019725', '0', null);
INSERT INTO `user` VALUES ('12', 'zdff', '4297f44b13955235245b2497399d7a93', '123123', 'ff', '1574063006', '0', null);
INSERT INTO `user` VALUES ('13', 'liliang', '4297f44b13955235245b2497399d7a93', '李亮', '小伙子', '1574134781', '0', null);
INSERT INTO `user` VALUES ('14', 'huahua', '4297f44b13955235245b2497399d7a93', '花花', '小女生', '1574248674', '0', null);
INSERT INTO `user` VALUES ('15', 'guang', '202cb962ac59075b964b07152d234b70', '光光', '小光子', '1574135233', '0', null);
INSERT INTO `user` VALUES ('16', 'xiexiaomao', 'bea43f5f7ad39e2d184cb16885043d42', '谢小毛', '疯疯癫癫', '1574154249', '3', null);
INSERT INTO `user` VALUES ('17', 'aaa', '4297f44b13955235245b2497399d7a93', '黄黄', '单独', '1574154389', '0', null);
INSERT INTO `user` VALUES ('18', 'ddd', '4297f44b13955235245b2497399d7a93', '渣渣辉', 'f', '1574155316', '0', null);
INSERT INTO `user` VALUES ('19', 'zx123', '4297f44b13955235245b2497399d7a93', '泡泡堂', 'df', '1574155581', '0', null);
INSERT INTO `user` VALUES ('20', 'aa', '4297f44b13955235245b2497399d7a93', '123123', 'ff', '1574160086', '0', null);
INSERT INTO `user` VALUES ('21', 'aad', '4297f44b13955235245b2497399d7a93', '123', 'ff', '1574160111', '0', null);
INSERT INTO `user` VALUES ('22', 'zbb', '4297f44b13955235245b2497399d7a93', '123f', 'dd', '1574160304', '6', null);
INSERT INTO `user` VALUES ('23', 'zbf', '4297f44b13955235245b2497399d7a93', '123123', 'dd', '1574160269', '0', null);
INSERT INTO `user` VALUES ('24', 'zxx', '202cb962ac59075b964b07152d234b70', '123', 'df', '1574235496', '0', null);
INSERT INTO `user` VALUES ('25', 'z', '4297f44b13955235245b2497399d7a93', '123123', 'dfsf', '1574237529', '0', null);
INSERT INTO `user` VALUES ('26', 'sdf', '4297f44b13955235245b2497399d7a93', '123123', 'dfsf\'dfsdf', '1574237581', '0', null);
INSERT INTO `user` VALUES ('27', 'ccc', '4297f44b13955235245b2497399d7a93', '123', 'zxcd', '1574237679', '0', null);
INSERT INTO `user` VALUES ('28', 'dfsd222', '4297f44b13955235245b2497399d7a93', '123', 'zxcd\'&lt;\\ fdf&gt;ff&quot;', '1574237753', '0', null);
INSERT INTO `user` VALUES ('29', 'xieyizhi', '4297f44b13955235245b2497399d7a93', '123', 'dd', '1574238227', '0', null);
INSERT INTO `user` VALUES ('30', 'zxc1', '202cb962ac59075b964b07152d234b70', '123', 'sdf', '1574238301', '0', null);
INSERT INTO `user` VALUES ('31', 'zxc2', '4297f44b13955235245b2497399d7a93', '123', 'sdf\'ffdf.&lt;fdfs', '1574238339', '0', null);
INSERT INTO `user` VALUES ('32', 'zxc3', '202cb962ac59075b964b07152d234b70', '123', 'dfsf', '1574238358', '0', null);
INSERT INTO `user` VALUES ('33', 'zxcw', '4297f44b13955235245b2497399d7a93', '123455', '123', '1574239723', '0', null);
INSERT INTO `user` VALUES ('34', 'zxcw1', '4297f44b13955235245b2497399d7a93', '123455', '123dfsf\'\'\'123', '1574239796', '0', null);

-- ----------------------------
-- Table structure for `zy_reward`
-- ----------------------------
DROP TABLE IF EXISTS `zy_reward`;
CREATE TABLE `zy_reward` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `reward_id` tinyint(5) NOT NULL,
  `reward_name` char(25) NOT NULL DEFAULT '' COMMENT '奖励名称',
  `reward_rule` tinyint(4) DEFAULT '0' COMMENT '规则限制',
  `props_id` mediumint(10) DEFAULT '0',
  `props_name` char(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zy_reward
-- ----------------------------
INSERT INTO `zy_reward` VALUES ('1', '1', '全民下载奖励', '0', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('2', '1', '全民下载奖励', '0', '100050', '封妖灵珠');
INSERT INTO `zy_reward` VALUES ('3', '1', '全民下载奖励', '0', '100005', '恢复胶囊');
INSERT INTO `zy_reward` VALUES ('4', '2', '邀请好友', '2', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('5', '2', '邀请好友', '2', '100050', '封妖灵珠');
INSERT INTO `zy_reward` VALUES ('6', '2', '邀请好友', '5', '100160', '翠玉莓');
INSERT INTO `zy_reward` VALUES ('7', '2', '邀请好友', '5', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('8', '2', '邀请好友', '10', '100051', '高级封妖灵珠');
INSERT INTO `zy_reward` VALUES ('9', '2', '邀请好友', '10', '100350', '聚妖铃铛');
INSERT INTO `zy_reward` VALUES ('10', '2', '邀请好友', '10', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('11', '3', '论坛专属奖励', '0', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('12', '4', '抽奖', '0', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('13', '4', '抽奖', '0', '1000002', '新手唤灵器');
INSERT INTO `zy_reward` VALUES ('14', '5', '成长助力', '5', '100001', '钻石');
INSERT INTO `zy_reward` VALUES ('15', '5', '成长助力', '10', '100050', '封妖灵珠');
INSERT INTO `zy_reward` VALUES ('16', '5', '成长助力', '15', '100005', '恢复胶囊');
INSERT INTO `zy_reward` VALUES ('17', '5', '成长助力', '20', '100160', '翠玉莓');
