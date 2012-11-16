--
-- Tabellenstruktur für Tabelle '{TABLE_PREFIX}addons'
--

DROP TABLE IF EXISTS {TABLE_PREFIX}addons;
CREATE TABLE IF NOT EXISTS {TABLE_PREFIX}addons (
  addon_id int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  description text NOT NULL,
  `function` varchar(255) NOT NULL DEFAULT '',
  version varchar(255) NOT NULL DEFAULT '',
  platform varchar(255) NOT NULL DEFAULT '',
  author varchar(255) NOT NULL DEFAULT '',
  license varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (addon_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}groups`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}groups`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `system_permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `module_permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `template_permissions` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `{TABLE_PREFIX}groups`
--

INSERT INTO `{TABLE_PREFIX}groups` VALUES(1, 'Administrators', 'access,addons,admintools,admintools_view,groups,groups_add,groups_delete,groups_modify,groups_view,languages,languages_install,languages_uninstall,languages_view,media,media_create,media_delete,media_rename,media_upload,media_view,modules,modules_advanced,modules_install,modules_uninstall,modules_view,pages,pages_add,pages_add_l0,pages_delete,pages_intro,pages_modify,pages_settings,pages_view,preferences,preferences_view,settings,settings_advanced,settings_basic,settings_view,templates,templates_install,templates_uninstall,templates_view,users,users_add,users_delete,users_modify,users_view', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}pages`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}pages`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `root_parent` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_icon` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu_icon_0` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu_icon_1` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tooltip` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `page_trail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `visibility` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `position` int(11) NOT NULL DEFAULT '0',
  `menu` int(11) NOT NULL DEFAULT '1',
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_code` int(11) NOT NULL DEFAULT '0',
  `searching` int(11) NOT NULL DEFAULT '0',
  `admin_groups` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `admin_users` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `viewing_groups` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `viewing_users` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `modified_when` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `custom01` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `custom02` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}sections`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}sections`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `block` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `publ_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `publ_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}users`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}users`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `groups_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `confirm_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `confirm_timeout` int(11) NOT NULL DEFAULT '0',
  `remember_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_reset` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `timezone` int(11) NOT NULL DEFAULT '0',
  `date_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `home_folder` text COLLATE utf8_unicode_ci NOT NULL,
  `login_when` int(11) NOT NULL DEFAULT '0',
  `login_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tabellenstruktur für Tabelle `{TABLE_PREFIX}settings`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}settings`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

