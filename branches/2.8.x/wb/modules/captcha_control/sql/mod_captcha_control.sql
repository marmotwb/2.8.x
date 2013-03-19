-- phpMyAdmin SQL Dump
-- Erstellungszeit: 15. Mrz 2013 um 18:21
-- Server-Version: 5.5.27
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- --------------------------------------------------------
-- Database structure for WebsiteBaker core
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_captcha_control`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_captcha_control`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_captcha_control` (
  `enabled_captcha` int(11) NOT NULL DEFAULT '1',
  `enabled_asp` int(11) NOT NULL DEFAULT '1',
  `captcha_type` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT 'calc_text',
  `asp_session_min_age` int(11) NOT NULL DEFAULT '20',
  `asp_view_min_age` int(11) NOT NULL DEFAULT '10',
  `asp_input_min_age` int(11) NOT NULL DEFAULT '5',
  `ct_text` longtext{TABLE_COLLATION} NOT NULL
) {TABLE_ENGINE};
-- EndOfFile