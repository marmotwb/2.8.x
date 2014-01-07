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
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}mod_output_filter`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_output_filter`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_output_filter` (
  `opf` int(11) NOT NULL DEFAULT '0',
  `sys_rel` int(11) NOT NULL DEFAULT '0',
  `email_filter` int(11) NOT NULL DEFAULT '1',
  `mailto_filter` int(11) NOT NULL DEFAULT '1',
  `at_replacement` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '(at)',
  `dot_replacement` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '(dot)'
){TABLE_ENGINE};
-- EndOfFile