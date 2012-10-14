<?php
/**
 *
 * @category        admin
 * @package         modules
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
$admin = new admin('Addons', 'modules');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('modules.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'modules.htt');
$template->set_block('page', 'main_block', 'main');

// Insert values into module list
$template->set_block('main_block', 'module_list_block', 'module_list');
$result = $database->query("SELECT * FROM ".TABLE_PREFIX."addons WHERE type = 'module' order by name");
if($result->numRows() > 0) {
	while ($addon = $result->fetchRow())
	{
		if ($admin->get_permission($addon['directory'],'module')==false) { continue;}
//echo $addon['directory'].'<br />';
		$template->set_var('VALUE', $addon['directory']);
		$template->set_var('NAME', $addon['name']);
		$template->parse('module_list', 'module_list_block', true);
	}
}

// Insert modules which includes a install.php file to install list
$module_files = glob(WB_PATH . '/modules/*');
$template->set_block('main_block', 'install_list_block', 'install_list');
$template->set_block('main_block', 'upgrade_list_block', 'upgrade_list');
$template->set_block('main_block', 'uninstall_list_block', 'uninstall_list');
$template->set_var(array('INSTALL_VISIBLE' => 'hide', 'UPGRADE_VISIBLE' => 'hide', 'UNINSTALL_VISIBLE' => 'hide'));

$show_block = false;
foreach ($module_files as $index => $path)
{
	if ( $admin->get_permission(basename($path),'module')==false ) { continue;}
	if (is_dir($path)) {
//echo basename($path).'<br />';
		if (is_readable($path . '/install.php')) {
			$show_block = true;
			$template->set_var('INSTALL_VISIBLE', '');
			$template->set_var('VALUE', basename($path));
			$template->set_var('NAME', basename($path));
			$template->parse('install_list', 'install_list_block', true);
		}

		if (is_readable($path . '/upgrade.php')) {
			$show_block = true;
			$template->set_var('UPGRADE_VISIBLE', '');
			$template->set_var('VALUE', basename($path));
			$template->set_var('NAME', basename($path));
			$template->parse('upgrade_list', 'upgrade_list_block', true);
		}

		if (is_readable($path . '/uninstall.php')) {
			$show_block = true;
			$template->set_var('UNINSTALL_VISIBLE', '');
			$template->set_var('VALUE', basename($path));
			$template->set_var('NAME', basename($path));
			$template->parse('uninstall_list', 'uninstall_list_block', true);
		}

	} else {
		unset($module_files[$index]);
	}
}

// Insert permissions values
if($admin->get_permission('modules_install') != true) {
	$template->set_var('DISPLAY_INSTALL', 'hide');
}
if($admin->get_permission('modules_uninstall') != true) {
	$template->set_var('DISPLAY_UNINSTALL', 'hide');
}
if($admin->get_permission('modules_view') != true) {
	$template->set_var('DISPLAY_LIST', 'hide');
}
// only show block if there is something to show
if(!$show_block || count($module_files) == 0 || !isset($_GET['advanced']) || $admin->get_permission('settings_advanced') != true) {
	$template->set_var('DISPLAY_MANUAL_INSTALL', 'hide');
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
	'URL_TEMPLATES' => $admin->get_permission('templates') ?
		'<a href="' . ADMIN_URL . '/templates/index.php">' . $mLang->MENU_TEMPLATES . '</a>' : '<b>'.$mLang->MENU_TEMPLATES.'</b>',
	'URL_LANGUAGES' => $admin->get_permission('languages') ?
		'<a href="' . ADMIN_URL . '/languages/index.php">' . $mLang->MENU_LANGUAGES . '</a>' : '<b>'.$mLang->MENU_LANGUAGES.'</b>',
	'URL_ADVANCED' => $admin->get_permission('modules_advanced') ?
		'<a href="' . ADMIN_URL . '/modules/index.php?advanced">' . $mLang->TEXT_ADVANCED . '</a>' : '<b>'.$mLang->TEXT_ADVANCED.'</b>' ,
	'HEADING_CHANGE_TEMPLATE_NOTICE' => ''
	)
);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
