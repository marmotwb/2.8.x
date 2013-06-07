-- phpMyAdmin SQL Dump
-- Erstellungszeit: 15. Mrz 2013 um 18:21
-- Server-Version: 5.5.27
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------
-- Database structure for WebsiteBaker core
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}mod_droplets`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_droplets`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_droplets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32){TABLE_COLLATION} NOT NULL DEFAULT '',
  `code` longtext{TABLE_COLLATION} NOT NULL DEFAULT '',
  `description` text{TABLE_COLLATION} NOT NULL DEFAULT '',
  `modified_when` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `admin_edit` int(11) NOT NULL DEFAULT '0',
  `admin_view` int(11) NOT NULL DEFAULT '0',
  `show_wysiwyg` int(11) NOT NULL DEFAULT '0',
  `comments` text{TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};
-- EndOfFile