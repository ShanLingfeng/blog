/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-12-29 17:55:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(50) DEFAULT '' COMMENT '//文章标题',
  `art_editor` varchar(30) DEFAULT NULL COMMENT '//作者',
  `art_thumb` varchar(100) DEFAULT NULL COMMENT '//缩略图',
  `art_tag` varchar(100) DEFAULT NULL COMMENT '//关键字',
  `art_description` varchar(255) DEFAULT NULL COMMENT '//描述',
  `art_content` text,
  `art_time` varchar(15) DEFAULT NULL COMMENT '//上传时间',
  `art_view` int(5) DEFAULT '0' COMMENT '//浏览量',
  `cate_id` int(11) NOT NULL COMMENT '//分类id',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '前端基础', '单凌峰', 'upload/20181218/1545103470.jpeg', 'html   css  js  ', '前端三个部分组成 ', '<p>结构层：由html或XHTML的标记语言负责创建。标签，就是那些出现在尖括号里的单词，对网页内容的语义含义</p><p>做出了描述，但这些标签不包含任何关于如何显示有关内容的信息。例如，p标签表达了这样一种语义：“这是</p><p>一个文本段”。&nbsp;<br/></p><p>表示层：由CSS负责创建。CSS对“如何显示有关内容”的问题做出了回答。&nbsp;</p><p>行为层：负责回答“内容应该如何对事件做出反应”这一问题。这是JavaScript语言和DOM主宰的领域。</p>', null, '0', '1');
INSERT INTO `blog_article` VALUES ('13', '111', '单凌峰', '', '', '', '<p><img src=\"/ueditor/php/upload/image/20181227/1545899293137486.jpg\" title=\"1545899293137486.jpg\" alt=\"html1.jpg\" width=\"348\" height=\"313\" style=\"width: 348px; height: 313px;\"/></p><p><img src=\"/ueditor/php/upload/image/20181228/1545961886561177.jpg\" title=\"1545961886561177.jpg\" alt=\"js.jpg\"/></p>', '1545874876', '0', '4');
INSERT INTO `blog_article` VALUES ('4', '111', 'mysqkl', '', '1', '111', '<p style=\"text-align: center;\"><span style=\"font-size: 18px;\"><strong>45sdfgsqweqweqweadsfadfasdfadf</strong></span></p>', '1545112034', '0', '1');
INSERT INTO `blog_article` VALUES ('5', '前端基础', '单凌峰', 'upload/20181218/1545112105.jpeg', '11', '等待对方德赛电池', '<p>打火机等各环节的回过头低功耗</p>', '1545112120', '0', '1');
INSERT INTO `blog_article` VALUES ('6', '前端基础', '单凌峰', 'upload/20181218/1545112173.jpeg', '11', '对方感受到法国', '<p>市分公司是的很舒服个</p>', '1545112183', '0', '5');
INSERT INTO `blog_article` VALUES ('8', '前端基础', '单凌峰', 'upload/20181218/1545112243.jpeg', '123123', '电风扇嘎达是', '<p>暗室逢灯噶水电费啊</p>', '1545112253', '0', '9');
INSERT INTO `blog_article` VALUES ('9', '俺的沙发大', '阿达', 'upload/20181218/1545112267.jpeg', '爱的发的', '阿达发达', '<p>共和国和地方噶地方企鹅</p>', '1545112274', '0', '9');
INSERT INTO `blog_article` VALUES ('10', '发的发', '大个人发', 'upload/20181218/1545112291.jpeg', '阿嘎哒', '打个分安多福 ', '<p>安多福个发</p>', '1545112299', '0', '6');
INSERT INTO `blog_article` VALUES ('11', '人感受到反腐', '挨个发发', 'upload/20181218/1545112315.jpeg', '光和热好几趟', '过去二号', '<p>你是发生过任何即使是</p>', '1545112324', '0', '4');
INSERT INTO `blog_article` VALUES ('12', '供货商符合公司分公司', '闪闪发光', 'upload/20181218/1545116404.jpeg', '很舒服果然是公司', ' 是否会让公司', '<p>很舒服说过话虽然</p>', '1545112357', '0', '9');

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) DEFAULT NULL COMMENT '//分类名称',
  `cate_title` varchar(100) DEFAULT NULL COMMENT '//分类标题',
  `cate_keywords` varchar(100) DEFAULT NULL COMMENT '//分类关键字',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '//分类描述',
  `cate_view` varchar(8) DEFAULT '0' COMMENT '//浏览数',
  `cate_order` varchar(8) DEFAULT '0' COMMENT '//分类排序',
  `cate_pid` int(11) DEFAULT '0' COMMENT '//父级id',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', 'PHP', 'PHP是世界上最好的编程语言！', null, null, '0', '1', '0');
INSERT INTO `blog_category` VALUES ('2', 'MySQL', '一种关系数据库管理系统', null, null, '0', '3', '0');
INSERT INTO `blog_category` VALUES ('4', 'PHP基础部分', 'PHP基础部分', null, null, '0', '1', '1');
INSERT INTO `blog_category` VALUES ('5', 'PHP高级部分', 'PHP高级部分', null, null, '0', '2', '1');
INSERT INTO `blog_category` VALUES ('6', 'MySQL基本使用', 'MySQL基本使用', null, null, '0', '1', '2');
INSERT INTO `blog_category` VALUES ('8', 'Linux常用命令', 'Linux常用命令', null, null, '0', '1', '3');
INSERT INTO `blog_category` VALUES ('9', 'phpexe类', '为了让电子表格成为纸质表格的强大类', '导出', '为了让电子表格成为纸质表格的强大类', '0', '4', '1');

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT '' COMMENT '//标题',
  `conf_name` varchar(50) DEFAULT '' COMMENT '//变量名',
  `conf_content` text COMMENT '//变量值',
  `conf_order` int(11) DEFAULT '0' COMMENT '//排序',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '//描述',
  `field_type` varchar(50) DEFAULT '' COMMENT '//字段类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '//类型值',
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_config
-- ----------------------------
INSERT INTO `blog_config` VALUES ('1', '网站标题', 'web_title', '后盾Blog系统', '1', '网站大众化标题', 'input', '');
INSERT INTO `blog_config` VALUES ('2', '统计代码', 'web_count', '百度统计', '3', '网站访问情况统计', 'textarea', '');
INSERT INTO `blog_config` VALUES ('3', '网站状态', 'web_status', '0', '2', '网站开启状态', 'radio', '1|开启,0|关闭');
INSERT INTO `blog_config` VALUES ('5', '辅助标题', 'seo_title', '后盾网 人人做后盾', '4', '对网站名称的补充', 'input', '');
INSERT INTO `blog_config` VALUES ('6', '关键词', 'keywords', '北京php培训,php视频教程,php培训,php基础视频,php实例视频,lamp视频教程', '5', '', 'input', '');
INSERT INTO `blog_config` VALUES ('7', '描述', 'description', '后盾网顶尖PHP培训，最专业的网站开发php培训，小班化授课，全程实战！业内顶级北京php培训讲师亲自授课，千余课时php独家视频教程免费下载，数百G原创视频资源，实力不容造假！抢座热线：400-682-3231', '6', '', 'textarea', '');
INSERT INTO `blog_config` VALUES ('8', '版权信息', 'copyright', 'Design by 后盾网 <a href=\"http://www.houdunwang.com\" target=\"_blank\">http://www.houdunwang.com</a>', '7', '', 'textarea', '');

-- ----------------------------
-- Table structure for blog_link
-- ----------------------------
DROP TABLE IF EXISTS `blog_link`;
CREATE TABLE `blog_link` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//名称',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//url地址',
  `link_discription` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//描述',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_link
-- ----------------------------
INSERT INTO `blog_link` VALUES ('1', '百度', 'https://www.baidu.com', '不懂的问题，百度一下！', '3');
INSERT INTO `blog_link` VALUES ('2', '淘宝', 'https://www.taobao.com', '又想买的东西，淘一下吧！', '4');
INSERT INTO `blog_link` VALUES ('4', '腾讯课堂', 'https://ke.qq.com', '学习实现梦想！', '0');

-- ----------------------------
-- Table structure for blog_migrations
-- ----------------------------
DROP TABLE IF EXISTS `blog_migrations`;
CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_migrations
-- ----------------------------
INSERT INTO `blog_migrations` VALUES ('2018_12_20_134526_create_link_table', '1');

-- ----------------------------
-- Table structure for blog_navs
-- ----------------------------
DROP TABLE IF EXISTS `blog_navs`;
CREATE TABLE `blog_navs` (
  `navs_id` int(11) NOT NULL AUTO_INCREMENT,
  `navs_name` varchar(30) DEFAULT '' COMMENT '//自定义导航名字',
  `navs_english` varchar(50) DEFAULT '' COMMENT '//英语',
  `navs_url` varchar(100) DEFAULT '' COMMENT '//链接',
  `navs_order` int(11) NOT NULL DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`navs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_navs
-- ----------------------------
INSERT INTO `blog_navs` VALUES ('1', '慢生活', 'Slow Life', 'http://www.t520.top', '2');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL COMMENT '//用户名',
  `user_pass` varchar(255) NOT NULL COMMENT '//密码',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin', 'eyJpdiI6IkRjUDlUMXdjbU00bExlTFVwc0lJRGc9PSIsInZhbHVlIjoiUWRlcHdtMG9FOGg4d1hweVFQcE5CQT09IiwibWFjIjoiMmIwMTA5NjRkNzIxNGNkMTBmMTU1ZGI3MGI5MTY5YWZlYzBiNzQ0N2QxMGFiNjgxMTk2OGQ4ZjkxZDQ5ZjkzOCJ9');
INSERT INTO `blog_user` VALUES ('2', '天狼', 'eyJpdiI6ImwyZFVHVk1UUFdvVUR3ZzJLK29cL29nPT0iLCJ2YWx1ZSI6Ijl5T1FnRWxsSWlHb0QweWdSQWdoN1E9PSIsIm1hYyI6ImU1ZDMwMWQ4YjRmNmJhZWUwODkxMDJjM2E2ODUzODUzNzdmN2U3NjU5MGU0ZmFiOWQyODRmMzJlZmRiMDFmNjIifQ==');
