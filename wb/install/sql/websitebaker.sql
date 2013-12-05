-- phpMyAdmin SQL Dump
-- Date of creation: 2012-11-17 12:37am
-- Server Version: 5.1.41
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------
-- Database structure for WebsiteBaker core
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Structure of table  '{TABLE_PREFIX}addons'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}addons`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}addons` (
  `addon_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `directory` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `name` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `description` text{TABLE_COLLATION} NOT NULL,
  `function` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `version` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `platform` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `author` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `license` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (addon_id)
){TABLE_ENGINE};
--
-- Structure of table  '{TABLE_PREFIX}groups'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}groups`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `system_permissions` text{TABLE_COLLATION} NOT NULL,
  `module_permissions` text{TABLE_COLLATION} NOT NULL,
  `template_permissions` text{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`group_id`)
){TABLE_ENGINE};
--
-- Structure of table  '{TABLE_PREFIX}pages'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}pages`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `root_parent` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255){TABLE_COLLATION} NOT NULL,
  `target` varchar(7){TABLE_COLLATION} NOT NULL DEFAULT '',
  `page_title` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `page_icon` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '',
  `menu_title` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `menu_icon_0` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '',
  `menu_icon_1` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '',
  `tooltip` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '',
  `description` text{TABLE_COLLATION} NOT NULL,
  `keywords` text{TABLE_COLLATION} NOT NULL,
  `page_trail` varchar(255){TABLE_COLLATION} NOT NULL,
  `template` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `visibility` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `position` int(11) NOT NULL DEFAULT '0',
  `menu` int(11) NOT NULL DEFAULT '1',
  `language` varchar(5){TABLE_COLLATION} NOT NULL DEFAULT '',
  `page_code` int(11) NOT NULL DEFAULT '0',
  `searching` int(11) NOT NULL DEFAULT '0',
  `admin_groups` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '1',
  `admin_users` varchar(512){TABLE_COLLATION} NOT NULL,
  `viewing_groups` varchar(512){TABLE_COLLATION} NOT NULL DEFAULT '1',
  `viewing_users` varchar(512){TABLE_COLLATION} NOT NULL,
  `modified_when` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `custom01` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `custom02` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (`page_id`)
) {TABLE_ENGINE};
--
-- Structure of table  '{TABLE_PREFIX}sections'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}sections`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `module` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `block` int(11) NOT NULL DEFAULT '1',
  `publ_start` int(11) NOT NULL DEFAULT '0',
  `publ_end` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) {TABLE_ENGINE};
--
-- Structure of table  '{TABLE_PREFIX}users'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}users`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT 'this field is set deprecated and never used in WB',
  `groups_id` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `password` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `confirm_code` varchar(32){TABLE_COLLATION} NOT NULL DEFAULT '',
  `confirm_timeout` int(11) NOT NULL DEFAULT '0',
  `remember_key` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `last_reset` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `email` text{TABLE_COLLATION} NOT NULL,
  `timezone` int(11) NOT NULL DEFAULT '0',
  `date_format` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `time_format` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `language` varchar(5){TABLE_COLLATION} NOT NULL DEFAULT 'EN',
  `home_folder` text{TABLE_COLLATION} NOT NULL,
  `login_when` int(11) NOT NULL DEFAULT '0',
  `login_ip` varchar(15){TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
){TABLE_ENGINE};
--
-- Structure of table  '{TABLE_PREFIX}settings'
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}settings`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `value` text{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`setting_id`)
){TABLE_ENGINE};
--
-- Structure of table `{TABLE_PREFIX}search`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}search`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}search` (
  `search_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `value` text{TABLE_COLLATION} NOT NULL,
  `extra` text{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`search_id`)
){TABLE_ENGINE};
-- EndOfFile