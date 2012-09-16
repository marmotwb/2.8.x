-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Sep 2012 um 03:20
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8
-- $Id$

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: ``
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
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `required` int(11) NOT NULL DEFAULT '0',
  `value` text NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_form_settings`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_form_settings`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_form_settings` (
  `section_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `header` text NOT NULL,
  `field_loop` text NOT NULL,
  `footer` text NOT NULL,
  `email_to` text NOT NULL,
  `email_from` varchar(255) NOT NULL DEFAULT '',
  `email_fromname` varchar(255) NOT NULL DEFAULT '',
  `email_subject` varchar(255) NOT NULL DEFAULT '',
  `success_page` text NOT NULL,
  `success_email_to` text NOT NULL,
  `success_email_from` varchar(255) NOT NULL DEFAULT '',
  `success_email_fromname` varchar(255) NOT NULL DEFAULT '',
  `success_email_text` text NOT NULL,
  `success_email_subject` varchar(255) NOT NULL DEFAULT '',
  `stored_submissions` int(11) NOT NULL DEFAULT '0',
  `max_submissions` int(11) NOT NULL DEFAULT '0',
  `perpage_submissions` int(11) NOT NULL DEFAULT '10',
  `use_captcha` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

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
  `body` text NOT NULL,
  PRIMARY KEY (`submission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
