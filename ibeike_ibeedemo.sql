/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : ibeike_ibeedemo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-10 09:43:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ibee_article_info
-- ----------------------------
DROP TABLE IF EXISTS `ibee_article_info`;
CREATE TABLE `ibee_article_info` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `view_num` int(11) NOT NULL,
  `collection_num` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `bg_picture` varchar(255) NOT NULL,
  `like` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `tag` tinyint(3) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`articleid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_article_info
-- ----------------------------
INSERT INTO `ibee_article_info` VALUES ('2', '1', 'Victor Wong', '11486550310article_test.json', '123', '105', 'just a test', 'just a test2', '104', '3', '20', '10', '1485399899', '1485399899');
INSERT INTO `ibee_article_info` VALUES ('3', '1', 'Victor Wong', '11486550310article_test.json', '0', '0', 'just a test', 'just a draft', '0', '0', '30', '20', '1485399999', '1485399999');
INSERT INTO `ibee_article_info` VALUES ('1', '1', 'Victor Wong', '11486550310article_test.json', '121', '111', 'just a test', 'just a test1', '112', '2', '10', '10', '1485399504', '1485399504');
INSERT INTO `ibee_article_info` VALUES ('4', '1', 'Victor Wong', '11486550310article_test.json', '67', '89', 'just a test', 'just a test3', '223', '4', '20', '10', '1485405990', '1485405990');
INSERT INTO `ibee_article_info` VALUES ('5', '1', 'Victor Wong', '11486550310article_test.json', '88', '90', 'just a test', 'just a test4', '245', '7', '10', '10', '1485405990', '1485405990');
INSERT INTO `ibee_article_info` VALUES ('6', '1', 'Victor Wong', '11486550310article_test.json', '673', '34', 'just a test', 'just a test4', '578', '77', '15', '10', '1485405990', '1486620891');
INSERT INTO `ibee_article_info` VALUES ('7', '1', 'Victor Wong', '11486550310article_test.json', '3', '2', 'just one', 'just a test5', '12', '1', '30', '10', '1486546398', '1486546398');
INSERT INTO `ibee_article_info` VALUES ('8', '1', 'Victor Wong', '11486548546article_test.txt', '0', '0', 'just two tests', 'just a test6', '0', '0', '10', '10', '1486548546', '1486548546');
INSERT INTO `ibee_article_info` VALUES ('9', '1', 'Victor Wong', '11486549324article_test.json', '0', '0', 'just two tests', 'just a test6', '1', '0', '10', '10', '1486549324', '1486620397');
INSERT INTO `ibee_article_info` VALUES ('10', '1', 'Victor Wong', '11486550310article_test.json', '0', '0', 'just two tests', 'just a test6', '1', '0', '10', '10', '1486550310', '1486620293');
INSERT INTO `ibee_article_info` VALUES ('11', '1', 'Victor Wong', '11486551137article_test.json', '0', '0', 'just two tests', 'just a test6', '6', '0', '10', '10', '1486551137', '1486620166');
INSERT INTO `ibee_article_info` VALUES ('12', '1', 'Victor Wong', '11486613116article_test.json', '0', '0', '这是一个用来测试字数多少', 'just a test12', '10', '0', '10', '10', '1486613116', '1486618964');
INSERT INTO `ibee_article_info` VALUES ('13', '1', 'Victor Wong', '11486636515draft.json', '0', '0', 'a draft', 'a draft picture', '0', '0', '10', '30', '1486636515', '1486636515');
INSERT INTO `ibee_article_info` VALUES ('14', '1', 'Victor Wong', '11486636673draft.json', '0', '0', 'a draft', 'a draft picture', '0', '0', '10', '30', '1486636673', '1486636673');
INSERT INTO `ibee_article_info` VALUES ('15', '1', 'Victor Wong', '11486637350article.json', '0', '0', 'just three tests', 'just a test12', '1', '0', '10', '10', '1486637350', '1486637378');
INSERT INTO `ibee_article_info` VALUES ('16', '1', 'Victor Wong', '11486637459article.json', '0', '0', 'just three tests', 'just a test12', '0', '0', '10', '10', '1486637459', '1486637459');
INSERT INTO `ibee_article_info` VALUES ('17', '1', 'Victor Wong', '11486637511article.json', '0', '0', 'just three tests', 'just a test12', '0', '0', '10', '10', '1486637511', '1486637511');
INSERT INTO `ibee_article_info` VALUES ('18', '1', 'Victor Wong', '11486637999draft.json', '0', '0', 'just three tests', 'just a test12', '1', '0', '10', '30', '1486637999', '1486638014');

-- ----------------------------
-- Table structure for ibee_comment
-- ----------------------------
DROP TABLE IF EXISTS `ibee_comment`;
CREATE TABLE `ibee_comment` (
  `commentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`commentid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_comment
-- ----------------------------
INSERT INTO `ibee_comment` VALUES ('1', '2', 'a test comment', '1485399511', '0');
INSERT INTO `ibee_comment` VALUES ('2', '3', 'another test comment', '1485399701', '0');

-- ----------------------------
-- Table structure for ibee_user_attention
-- ----------------------------
DROP TABLE IF EXISTS `ibee_user_attention`;
CREATE TABLE `ibee_user_attention` (
  `userid` int(11) NOT NULL,
  `attention_userid` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `attention_userid` (`attention_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_user_attention
-- ----------------------------
INSERT INTO `ibee_user_attention` VALUES ('1', '2', '0', '0');

-- ----------------------------
-- Table structure for ibee_user_collection
-- ----------------------------
DROP TABLE IF EXISTS `ibee_user_collection`;
CREATE TABLE `ibee_user_collection` (
  `userid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `articleid` (`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_user_collection
-- ----------------------------
INSERT INTO `ibee_user_collection` VALUES ('2', '1', '0', '0');

-- ----------------------------
-- Table structure for ibee_user_info
-- ----------------------------
DROP TABLE IF EXISTS `ibee_user_info`;
CREATE TABLE `ibee_user_info` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `sex` tinyint(3) NOT NULL,
  `birthday` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `post_num` int(11) NOT NULL,
  `fan_num` int(11) NOT NULL,
  `follow_num` int(11) NOT NULL,
  `intro` varchar(255) DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_user_info
-- ----------------------------
INSERT INTO `ibee_user_info` VALUES ('1', 'Victor Wong', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'watson_wangxiao@163.com', '0', '10', '0', null, '0', '15', '0', '1', '', '1485350476', '1486637511');
INSERT INTO `ibee_user_info` VALUES ('2', 'Victor Wang1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'jason_wangxiao@163.com', '0', '10', '0', null, '0', '0', '1', '0', '', '1485350566', '1485350566');
INSERT INTO `ibee_user_info` VALUES ('3', 'Victor Wang2', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'jason_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485350606', '1485350606');
INSERT INTO `ibee_user_info` VALUES ('4', 'Victor Wang3', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'jason_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485350742', '1485350742');
INSERT INTO `ibee_user_info` VALUES ('5', 'Victor Wang4', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'j_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485351071', '1485351071');
INSERT INTO `ibee_user_info` VALUES ('6', 'Victor Wang', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'a_watson@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485351896', '1485351896');
INSERT INTO `ibee_user_info` VALUES ('7', 'VictorWong', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'watson_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485399145', '1485399145');
INSERT INTO `ibee_user_info` VALUES ('8', 'Victor Wong', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'watson_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485399358', '1485399358');
INSERT INTO `ibee_user_info` VALUES ('9', 'Victor Wong', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'watson_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485399394', '1485399394');
INSERT INTO `ibee_user_info` VALUES ('10', 'Victor Wong', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'default', 'watson_wangxiao@163.com', '0', '10', '0', null, '0', '0', '0', '0', '', '1485399511', '1485399511');

-- ----------------------------
-- Table structure for ibee_user_like
-- ----------------------------
DROP TABLE IF EXISTS `ibee_user_like`;
CREATE TABLE `ibee_user_like` (
  `userid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ibee_user_like
-- ----------------------------
INSERT INTO `ibee_user_like` VALUES ('1', '12', '1486618964', '1486618964');
INSERT INTO `ibee_user_like` VALUES ('1', '11', '1486620166', '1486620166');
INSERT INTO `ibee_user_like` VALUES ('1', '10', '1486620293', '1486620293');
INSERT INTO `ibee_user_like` VALUES ('1', '9', '1486620397', '1486620397');
INSERT INTO `ibee_user_like` VALUES ('1', '6', '1486620891', '1486620891');
INSERT INTO `ibee_user_like` VALUES ('1', '15', '1486637378', '1486637378');
INSERT INTO `ibee_user_like` VALUES ('1', '18', '1486638014', '1486638014');
SET FOREIGN_KEY_CHECKS=1;
