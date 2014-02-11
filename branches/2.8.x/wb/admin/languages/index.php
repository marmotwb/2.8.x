<?php
/**
 *
 * @category        admin
 * @package         languages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 *
 */

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'languages');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('languages.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'languages.htt');
$template->set_block('page', 'main_block', 'main');
$oLang = Translate::getInstance();
$oLang->enableAddon('admin\\languages');

// Insert values into language list
$template->set_block('main_block', 'language_list_block', 'language_list');
/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($oLang->getLangArray());
$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'language' order by directory");
if($result->numRows() > 0) {
	while($addon = $result->fetchRow()) {
		$template->set_var('VALUE', $addon['directory']);
		$template->set_var('NAME', $addon['name'].' ('.$addon['directory'].')');
		$template->parse('language_list', 'language_list_block', true);
	}
}

// Insert permissions values
if($admin->get_permission('languages_install') != true) {
	$template->set_var('DISPLAY_INSTALL', 'hide');
}
if($admin->get_permission('languages_uninstall') != true) {
	$template->set_var('DISPLAY_UNINSTALL', 'hide');
}
if($admin->get_permission('languages_view') != true) {
	$template->set_var('DISPLAY_LIST', 'hide');
}

// insert urls
$template->set_var(array(
				'ADMIN_URL' => ADMIN_URL,
				'WB_URL' => WB_URL,
				'THEME_URL' => THEME_URL,
				'FTAN' => $admin->getFTAN()
			)
		);
// Insert language text and messages
$template->set_var(array(
	'URL_ADVANCED' => '<b>'.$oLang->TEXT_ADVANCED.'</b>' ,
	'URL_MODULES' => $admin->get_permission('modules') ?
		'<a href="' . ADMIN_URL . '/modules/index.php">' . $oLang->MENU_MODULES . '</a>' : '<b>'.$oLang->MENU_MODULES.'</b>',
	'URL_TEMPLATES' => $admin->get_permission('templates') ?
		'<a href="' . ADMIN_URL . '/templates/index.php">' . $oLang->MENU_TEMPLATES . '</a>' : '<b>'.$oLang->MENU_TEMPLATES.'</b>',
	'HEADING_CHANGE_TEMPLATE_NOTICE' => ''
	)
);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');
$oLang->disableAddon();
// Print admin footer
$admin->print_footer();
