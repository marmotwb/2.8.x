-- phpMyAdmin SQL Dump
-- Server version 5.5.7
-- Erstellungszeit: 15. Mrz 2013 um 18:21
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------
-- Database structure for WebsiteBaker core
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_wrapper`
--
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_wrapper` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `url` text{TABLE_COLLATION} NOT NULL DEFAULT '',
  `height` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
){TABLE_ENGINE};
--
-- EndOfFile