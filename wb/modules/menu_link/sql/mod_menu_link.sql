-- phpMyAdmin SQL Dump
-- version 3.5.7
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
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}mod_menu_link`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_menu_link`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_menu_link` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `target_page_id` int(11) NOT NULL DEFAULT '0',
  `redirect_type` int(11) NOT NULL DEFAULT '301',
  `anchor` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '0',
  `extern` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  PRIMARY KEY (`section_id`)
){TABLE_ENGINE};
-- EndOfFile