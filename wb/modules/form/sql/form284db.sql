-- phpMyAdmin SQL Dump
-- Erstellungszeit: 16. Sep 2012 um 03:20
-- Server Version: 5.5.16
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------
-- Database structure for module 'form'
--
-- Replacements: {TABLE_PREFIX}, {TABLE_ENGINE}, {TABLE_COLLATION}
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_form_fields`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_form_fields`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_form_fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `type` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `required` int(11) NOT NULL DEFAULT '0',
  `value` text{TABLE_COLLATION} NOT NULL,
  `extra` text{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`field_id`)
) {TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_form_settings`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_form_settings`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_form_settings` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `header` text{TABLE_COLLATION} NOT NULL,
  `field_loop` text NOT NULL,
  `footer` text{TABLE_COLLATION} NOT NULL,
  `email_to` text{TABLE_COLLATION} NOT NULL,
  `email_from` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `email_fromname` varchar(255){TABLE_COLLATION}) NOT NULL DEFAULT '',
  `email_subject` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `success_page` text{TABLE_COLLATION} NOT NULL,
  `success_email_to` text{TABLE_COLLATION} NOT NULL,
  `success_email_from` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `success_email_fromname` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `success_email_text` text{TABLE_COLLATION} NOT NULL,
  `success_email_subject` varchar(255){TABLE_COLLATION} NOT NULL DEFAULT '',
  `stored_submissions` int(11) NOT NULL DEFAULT '0',
  `max_submissions` int(11) NOT NULL DEFAULT '0',
  `perpage_submissions` int(11) NOT NULL DEFAULT '10',
  `use_captcha` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) {TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_form_submissions`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_form_submissions`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_form_submissions` (
  `submission_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `submitted_when` int(11) NOT NULL DEFAULT '0',
  `submitted_by` int(11) NOT NULL DEFAULT '0',
  `body` text{TABLE_COLLATION} NOT NULL,
  PRIMARY KEY (`submission_id`)
) {TABLE_ENGINE};
-- EndOfFile