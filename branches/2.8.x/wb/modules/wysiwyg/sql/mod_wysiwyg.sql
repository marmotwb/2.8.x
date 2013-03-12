-- phpMyAdmin SQL Dump
-- Erstellungszeit: 15. Sep 2012 um 21:37
-- Server Version: 5.5.16
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------
-- Database structure for module 'wysiwyg'
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_wysiwyg`

DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_wysiwyg`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_wysiwyg` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `content` longtext{TABLE_COLLATION} NOT NULL,
  `text` longtext{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`section_id`)
) {TABLE_ENGINE};
-- EndOfFile