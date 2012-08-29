<?php
/**
 *
 * @category        admin
 * @package         templates
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'templates');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('templates.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'templates.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var('FTAN', $admin->getFTAN());

// Insert values into template list
$template->set_block('main_block', 'template_list_block', 'template_list');
$sql = 'SELECT `directory`, `name`, `function` FROM `'.TABLE_PREFIX.'addons` '
     . 'WHERE `type`=\'template\' ORDER BY `name`';
if(($result = $database->query($sql))) {
	while($addon = $result->fetchRow(MYSQL_ASSOC))
	{
		if ($admin->get_permission($addon['directory'],'template')==false) { continue;}
		$template->set_var('VALUE', $addon['directory']);
		$template->set_var('NAME', (($addon['function'] == 'theme' ? '[Theme] ' : '').$addon['name']));
		$template->parse('template_list', 'template_list_block', true);
	}
}

// Insert permissions values
if($admin->get_permission('templates_install') != true) {
	$template->set_var('DISPLAY_INSTALL', 'hide');
}
if($admin->get_permission('templates_uninstall') != true) {
	$template->set_var('DISPLAY_UNINSTALL', 'hide');
}
if($admin->get_permission('templates_view') != true) {
	$template->set_var('DISPLAY_LIST', 'hide');
}

$mLang = ModLanguage::getInstance();
$mLang->setLanguage(ADMIN_PATH.'/addons/languages/', LANGUAGE, DEFAULT_LANGUAGE);

/*-- insert all needed vars from language files ----------------------------------------*/
$template->set_var($mLang->getLangArray());

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
	'URL_MODULES' => $admin->get_permission('modules') ?
		'<a href="' . ADMIN_URL . '/modules/index.php">' . $mLang->MENU_MODULES . '</a>' : '<b>'.$mLang->MENU_MODULES.'</b>',
	'URL_LANGUAGES' => $admin->get_permission('languages') ?
		'<a href="' . ADMIN_URL . '/languages/index.php">' . $mLang->MENU_LANGUAGES . '</a>' : '<b>'.$mLang->MENU_LANGUAGES.'</b>',
	'URL_ADVANCED' => $admin->get_permission('settings_advanced')
                ? '<a href="' . ADMIN_URL . '/addons/index.php?advanced">' . $mLang->TEXT_ADVANCED . '</a>' : '<b>'.$mLang->TEXT_ADVANCED.'</b>' ,
	)
);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
