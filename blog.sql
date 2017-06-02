/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-05-27 17:52:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jk_menu`
-- ----------------------------
DROP TABLE IF EXISTS `jk_menu`;
CREATE TABLE `jk_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '菜单父id',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单名称',
  `mode` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '模块名称',
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL链接地址',
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '类名',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '菜单排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '菜单状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_menu
-- ----------------------------
INSERT INTO `jk_menu` VALUES ('1', '0', '系统', '0', '/admin', '', '100', '1', '2017-05-08 01:31:37', '2017-05-08 01:31:37');
INSERT INTO `jk_menu` VALUES ('2', '0', '微信管理', '0', '/admin', '', '100', '1', '2017-05-09 03:40:15', '2017-05-09 03:40:15');
INSERT INTO `jk_menu` VALUES ('3', '2', '微信设置', '0', '', '', '100', '1', '2017-05-09 07:27:38', '2017-05-09 07:27:38');
INSERT INTO `jk_menu` VALUES ('4', '2', '微信菜单', '0', '', '', '1', '1', '2017-05-09 07:28:25', '2017-05-09 07:28:25');
INSERT INTO `jk_menu` VALUES ('5', '4', '新增菜单', '0', '/admin/wx/menu/create', '', '100', '1', '2017-05-09 07:29:17', '2017-05-09 07:29:17');

-- ----------------------------
-- Table structure for `jk_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `jk_migrations`;
CREATE TABLE `jk_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_migrations
-- ----------------------------
INSERT INTO `jk_migrations` VALUES ('1', '2017_04_27_085222_create_menu_table', '1');
INSERT INTO `jk_migrations` VALUES ('2', '2017_05_10_094125_create_users_table', '1');
INSERT INTO `jk_migrations` VALUES ('3', '2017_05_11_071928_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for `jk_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `jk_permissions`;
CREATE TABLE `jk_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类名',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_permissions
-- ----------------------------
INSERT INTO `jk_permissions` VALUES ('1', '0', 'admin.permission.index', '权限管理', '', null, '0', '1', '2017-05-11 09:00:13', '2017-05-11 09:00:13');
INSERT INTO `jk_permissions` VALUES ('12', '1', 'admin.permission.list', '权限列表', null, '', '100', '1', '2017-05-12 08:35:45', '2017-05-16 06:54:28');
INSERT INTO `jk_permissions` VALUES ('13', '1', 'admin.permission.create', '创建', null, '', '100', '1', '2017-05-12 08:49:47', '2017-05-12 08:49:47');
INSERT INTO `jk_permissions` VALUES ('14', '1', 'admin.permission.edit', '编辑', null, '', '100', '1', '2017-05-12 08:50:42', '2017-05-12 08:50:42');
INSERT INTO `jk_permissions` VALUES ('15', '1', 'admin.permission.delete', '删除', null, '', '100', '1', '2017-05-12 08:54:24', '2017-05-12 08:54:24');

-- ----------------------------
-- Table structure for `jk_permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `jk_permission_role`;
CREATE TABLE `jk_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_permission_role
-- ----------------------------
INSERT INTO `jk_permission_role` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `jk_roles`
-- ----------------------------
DROP TABLE IF EXISTS `jk_roles`;
CREATE TABLE `jk_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_roles
-- ----------------------------
INSERT INTO `jk_roles` VALUES ('1', 'admin', '管理员', 'super admin role', '2017-05-11 09:00:13', '2017-05-11 09:00:13');
INSERT INTO `jk_roles` VALUES ('14', 'editor', '编辑', null, '2017-05-17 06:27:48', '2017-05-17 06:27:48');

-- ----------------------------
-- Table structure for `jk_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `jk_role_user`;
CREATE TABLE `jk_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jk_role_user
-- ----------------------------
INSERT INTO `jk_role_user` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `jk_user`
-- ----------------------------
DROP TABLE IF EXISTS `jk_user`;
CREATE TABLE `jk_user` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '登录密码',
  `password_salt` varchar(10) NOT NULL,
  `nickname` varchar(30) NOT NULL COMMENT '昵称',
  `email` varchar(80) NOT NULL DEFAULT '' COMMENT '邮箱(唯一性)',
  `email_bind` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否绑定邮箱',
  `mobile` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码(唯一性)',
  `mobile_bind` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否绑定手机号码',
  `role` int(11) unsigned NOT NULL COMMENT '角色ID',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '简单描述',
  `cover` int(11) unsigned NOT NULL COMMENT '头像',
  `score` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `login_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `signup_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '注册ip',
  `last_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否被锁定',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jk_user
-- ----------------------------
INSERT INTO `jk_user` VALUES ('1', 'admin', '207d572e90906770a71ce5bc7d0ba6c1', 'TqIoCuhRuk', 'jack胖子总会瘦下去', '964114968@qq.com', '1', '4294967295', '1', '1', '', '0', '0', '29', '0', '0', '127.0.0.1', '0', '1', '2017-05-27 07:05:59', null);
