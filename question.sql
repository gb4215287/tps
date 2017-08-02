/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : question

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-21 17:38:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_question`
-- ----------------------------
DROP TABLE IF EXISTS `tb_question`;
CREATE TABLE `tb_question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '题目',
  `score` int(11) DEFAULT '0' COMMENT '分值',
  `category` tinyint(4) DEFAULT '1' COMMENT '题目类型 1单选 2多选',
  `answer` varchar(255) DEFAULT '' COMMENT '标准答案',
  `state` tinyint(4) DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问题表';

-- ----------------------------
-- Records of tb_question
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_questionnaire`
-- ----------------------------
DROP TABLE IF EXISTS `tb_questionnaire`;
CREATE TABLE `tb_questionnaire` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '问卷名称',
  `describe` varchar(255) DEFAULT '' COMMENT '问卷描述',
  `total_score` int(11) DEFAULT '0' COMMENT '问卷总分',
  `total_question` int(11) DEFAULT '0' COMMENT '题目总数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问卷表';

-- ----------------------------
-- Records of tb_questionnaire
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_questionnaire_question`
-- ----------------------------
DROP TABLE IF EXISTS `tb_questionnaire_question`;
CREATE TABLE `tb_questionnaire_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) DEFAULT '0' COMMENT '问卷ID',
  `question_id` int(11) DEFAULT '0' COMMENT '问题ID',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问卷问题关联表';

-- ----------------------------
-- Records of tb_questionnaire_question
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_question_option`
-- ----------------------------
DROP TABLE IF EXISTS `tb_question_option`;
CREATE TABLE `tb_question_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT '0' COMMENT '问题ID',
  `title` varchar(100) DEFAULT '' COMMENT '选项名称',
  `describe` varchar(255) DEFAULT '' COMMENT '选项描述',
  `sort` tinyint(4) DEFAULT '0' COMMENT '排序',
  `relation` int(11) DEFAULT '0' COMMENT '关联的题目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问题选项表';

-- ----------------------------
-- Records of tb_question_option
-- ----------------------------
