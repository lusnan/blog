/*
Navicat MySQL Data Transfer

Source Server         : 本机文件
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : lublog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-24 20:14:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for joke
-- ----------------------------
DROP TABLE IF EXISTS `joke`;
CREATE TABLE `joke` (
  `joke_id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(50) NOT NULL,
  `textsrc` varchar(50) NOT NULL,
  `imgsrc` varchar(50) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  PRIMARY KEY (`joke_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of joke
-- ----------------------------
INSERT INTO `joke` VALUES ('32', 'ghJT', '/Application/Common/Common/2.HTML', '/Application/Common/Common/1.png', 'sfDFSDFSD', '2017-10-24 11:40:32');
INSERT INTO `joke` VALUES ('33', 'gdsgret', '/Application/Common/Common/Joke/ertet', '/Application/Common/Common/dfgf', 'gdfg', '2017-10-24 11:44:38');
INSERT INTO `joke` VALUES ('34', 'dfgdfg', '/Application/Common/Common/Joke/sfsdf', '/Application/Common/Common/Joke/cvxcvxcv', 'vfgdfgdfgdfgdfg', '2017-10-24 12:22:45');
INSERT INTO `joke` VALUES ('35', '这是合适的士大夫', '/Application/Common/Common/Joke/1.html', '/Application/Common/Common/Joke/1.png', '从前有一个人教会股份世纪东方航空积分有繁华都市繁华军事的负荷计算的扩大解放核算口径和封建士大夫 第三方客户甲方核实甲方', '2017-10-24 12:58:09');
INSERT INTO `joke` VALUES ('36', '受到核辐射', '/Application/Common/Common/Joke/士大夫是否', '/Application/Common/Common/Joke/士大夫士大夫', '是撒打发士大夫撒旦发射点发', '2017-10-24 13:18:33');
INSERT INTO `joke` VALUES ('37', 'f\'g\'h\'f\'d\'g\'h', '/Application/Common/Common/Joke/f\'g\'h\'f\'d\'g\'h\'s\'d\'', '/Application/Common/Common/Joke/f\'g\'h\'f\'d\'g\'h\'s\'d\'', 'fghfdghsdfgdfgsdfgd', '2017-10-24 13:18:45');
INSERT INTO `joke` VALUES ('38', 'f\'g\'d\'h\'d\'f', '/Application/Common/Common/Joke/fghfhfg', '/Application/Common/Common/Joke/dfghfd', 'hshdffgsdg', '2017-10-24 13:18:55');
INSERT INTO `joke` VALUES ('39', 'fdhgdfh', '/Application/Common/Common/Joke/nfgvjgh', '/Application/Common/Common/Joke/jdfhgsdfhg', 'sghdhgdfh', '2017-10-24 13:19:02');
INSERT INTO `joke` VALUES ('40', 'jhkghjkg', '/Application/Common/Common/Joke/kfvhjfgj', '/Application/Common/Common/Joke/bnmyjg', 'djhdhg', '2017-10-24 13:19:10');
INSERT INTO `joke` VALUES ('41', 'ghjfkhjk', '/Application/Common/Common/Joke/uyij', '/Application/Common/Common/Joke/gjhfg', 'jhgfjhfgjhfgj', '2017-10-24 13:19:19');
INSERT INTO `joke` VALUES ('42', 'fgjhgfj', '/Application/Common/Common/Joke/setfyhrth', '/Application/Common/Common/Joke/dfghdfghdfh', 'ghdhtdryw', '2017-10-24 13:19:27');
INSERT INTO `joke` VALUES ('43', 'hgdsfgh', '/Application/Common/Common/Joke/dfghghdf', '/Application/Common/Common/Joke/hdfncvb', 'hshfrth', '2017-10-24 13:19:34');
INSERT INTO `joke` VALUES ('44', 'dfhdfhdf', '/Application/Common/Common/Joke/hssfhsgh', '/Application/Common/Common/Joke/fhfghsfdh', 'ghnsghrth', '2017-10-24 13:19:45');
INSERT INTO `joke` VALUES ('45', '', '/Application/Common/Common/Joke/', '/Application/Common/Common/Joke/', '', '2017-10-24 18:42:07');
