/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : symfony

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-05-06 10:36:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `user_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户类型 0普通用户 1管理员',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '电子邮件',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别 0保密 1男 2女',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `qq` varchar(30) NOT NULL COMMENT 'QQ',
  `register_time` int(11) NOT NULL DEFAULT '0' COMMENT '插入时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `is_effect` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效 1代表有效 0无效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '4291945711@qq.com', '0', '13122905536', '4291945716', '1462439739', '1462500336', '1');
INSERT INTO `admin_user` VALUES ('2', 'csm', 'e10adc3949ba59abbe56e057f20f883e', '1', '429194571@qq.com', '0', '13122556633', '429194571', '1462499624', '1462500466', '1');
INSERT INTO `admin_user` VALUES ('3', 'csmcsmcsm', 'e10adc3949ba59abbe56e057f20f883e', '0', '429194571@qq.com', '0', '15079814799', '1245', '1462500136', '1462500688', '1');
