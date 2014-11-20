-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Nov 2012 um 12:37
-- Server Version: 5.5.32
-- PHP-Version: 5.4.19
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
--
-- Daten für Tabelle `groups`
--
INSERT INTO `{TABLE_PREFIX}groups` (`group_id`, `name`, `system_permissions`, `module_permissions`, `template_permissions`) VALUES
(1, 'Administrators', 'pages,pages_view,pages_add,pages_add_l0,pages_settings,pages_modify,pages_intro,pages_delete,media,media_view,media_upload,media_rename,media_delete,media_create,addons,modules,modules_view,modules_install,modules_uninstall,templates,templates_view,templates_install,templates_uninstall,languages,languages_view,languages_install,languages_uninstall,settings,settings_basic,settings_advanced,access,users,users_view,users_add,users_modify,users_delete,groups,groups_view,groups_add,groups_modify,groups_delete,admintools', '', '');
--
-- Daten für Tabelle `search`
--
INSERT INTO `{TABLE_PREFIX}search` (`name`, `value`, `extra`) VALUES
('header', '<h1>[TEXT_SEARCH]</h1>\n<form name="searchpage" action="[WB_URL]/search/index.php" method="get">\n<table cellpadding="3" cellspacing="0" border="0" style="width:100%; max-width:500px">\n<tr>\n<td>\n<input type="hidden" name="search_path" value="[SEARCH_PATH]" />\n<input type="hidden" name="referrer" value="[REFERRER_ID]" />\n<input type="text" name="string" value="[SEARCH_STRING]" style="width: 100%;" />\n</td>\n<td width="100">\n<input type="submit" value="[TEXT_SEARCH]" style="width: 100%;" />\n</td>\n</tr>\n<tr>\n<td colspan="2">\n<input type="radio" name="match" id="match_all" value="all"[ALL_CHECKED] />\n<label for="match_all">[TEXT_ALL_WORDS]</label>\n<input type="radio" name="match" id="match_any" value="any"[ANY_CHECKED] />\n<label for="match_any">[TEXT_ANY_WORDS]</label>\n<input type="radio" name="match" id="match_exact" value="exact"[EXACT_CHECKED] />\n<label for="match_exact">[TEXT_EXACT_MATCH]</label>\n</td>\n</tr>\n</table>\n</form>\n<hr />', ''),
('footer', '', ''),
('results_header', '<p>[TEXT_RESULTS_FOR] <strong>[SEARCH_STRING]</strong>:</p>\n<div class="searchresults">', ''),
('results_loop', '<h3 style="margin:10px 0 3px 0;"><a href="[LINK]">[TITLE]</a></h3>\n<div style="font-size:0.8em;">[TEXT_LAST_UPDATED_BY] [DISPLAY_NAME] [TEXT_ON] [DATE]</div>\n<p style="padding: 0 0 5px 0; margin: 2px 0 10px 0; border-bottom: 1px solid #777;">[DESCRIPTION].. [EXCERPT]</p>', ''),
('results_footer', '</div>', ''),
('no_results', '<p>[TEXT_NO_RESULTS]</p>', ''),
('module_order', 'wysiwyg', ''),
('max_excerpt', '15', ''),
('time_limit', '0', ''),
('cfg_enable_old_search', 'true', ''),
('cfg_search_keywords', 'true', ''),
('cfg_search_description', 'true', ''),
('cfg_show_description', 'true', ''),
('cfg_enable_flush', 'false', ''),
('template', '', '');
--
-- Daten für Tabelle `settings`
--
INSERT INTO `{TABLE_PREFIX}settings` (`name`, `value`) VALUES
('website_description', ''),
('website_keywords', ''),
('website_header', ''),
('website_footer', ''),
('wysiwyg_style', 'font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;'),
('er_level', ''),
('sec_anchor', 'wb_'),
('default_date_format', 'M d Y'),
('default_time_format', 'g:i A'),
('redirect_timer', '1500'),
('home_folders', 'true'),
('warn_page_leave', '1'),
('default_template', 'round'),
('default_theme', 'wb_theme'),
('default_charset', 'utf-8'),
('multiple_menus', 'true'),
('page_level_limit', '4'),
('intro_page', 'false'),
('page_trash', 'inline'),
('homepage_redirection', 'false'),
('page_languages', 'true'),
('wysiwyg_editor', 'fckeditor'),
('manage_sections', 'true'),
('section_blocks', 'true'),
('smart_login', 'true'),
('frontend_login', 'false'),
('frontend_signup', 'false'),
('search', 'public'),
('page_extension', '.php'),
('page_spacer', '-'),
('pages_directory', '/pages'),
('rename_files_on_upload', 'ph.*?,cgi,pl,pm,exe,com,bat,pif,cmd,src,asp,aspx,js'),
('media_directory', '/media'),
('wbmailer_routine', 'phpmail'),
('wbmailer_default_sendername', 'WB Mailer'),
('wbmailer_smtp_host', ''),
('wbmailer_smtp_auth', ''),
('wbmailer_smtp_username', ''),
('wbmailer_smtp_password', ''),
('fingerprint_with_ip_octets', '2'),
('secure_form_module', ''),
('mediasettings', ''),
('page_icon_dir', '/templates/*/title_images'),
('dev_infos', 'false'),
('wbmail_signature', ''),
('confirmed_registration', '1'),
('page_extendet', 'true'),
('system_locked', '0'),
('password_crypt_loops', '12'),
('password_hash_type', 'false'),
('password_length', '10'),
('password_use_types', '65535');
-- End of file