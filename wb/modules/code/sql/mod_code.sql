-- phpMyAdmin SQL Dump
-- Erstellungszeit: 15. Mrz 2013 um 18:21
-- Server-Version: 5.5.27
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- --------------------------------------------------------
-- Database structure for WebsiteBaker core
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}mod_code`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_code`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_code` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `content` text{TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (`section_id`)
){TABLE_ENGINE};
-- EndOfFile