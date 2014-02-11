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
$config_file = realpath('../../config.php');
if(file_exists($config_file) && !defined('WB_URL'))
{
	require_once($config_file);
}
$oReg = WbAdaptor::getInstance();
if(!class_exists('admin', false)){ include($oReg->AppPath.'framework/class.admin.php'); }
$admin = new admin('Addons', 'modules');
// Make news post access files dir
if(!function_exists('get_variable_content')) {require($oReg->AppPath.'framework/functions.php');}
$oReg->getWbConstants();
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\modules');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('modules.htt')),'keep');
// $template->debug = true;
$template->set_file('page', 'modules.htt');
$template->set_block('page', 'main_block', 'main');
$template->set_var($oTrans->getLangArray());
// Insert values into module list
$template->set_block('main_block', 'module_list_block', 'module_list');
$aAddonsList = array();
$sql = 'SELECT `directory`,`name` FROM  `'.$database->TablePrefix.'addons` '
     . 'WHERE `type` = \'module\' '
     . 'ORDER BY `name` ';
if($result = $database->query($sql)){

	while ($addon = $result->fetchRow(MYSQL_ASSOC))
	{
        $aAddonsList[$addon['directory']] = $addon['name'];
	}
    natcasesort ($aAddonsList);
    foreach ($aAddonsList as $sModule => $sModuleName)
    {
		if ($admin->get_permission($sModule,'module')==false) { continue;}
		$template->set_var('VALUE', $sModule);
		$template->set_var('NAME', $sModuleName);
		$template->parse('module_list', 'module_list_block', true);
    }

}
$aModuleList = array();
// Insert modules which includes a install.php file to install list
foreach (glob($oReg->AppPath.'modules/*', GLOB_MARK|GLOB_ONLYDIR) as $sTmp) {
    $sModulePath = str_replace('\\','/',$sTmp);
    $sModule = basename($sModulePath);
// list all module names not directories 
    $sModuleName = 'failed';
    if(function_exists('file_get_contents') && is_readable($sModulePath.'info.php')) {
    	$sData = file_get_contents($sModulePath.'info.php');
    	$sModuleName = get_variable_content('module_name', $sData, false, false);
    }
    $aModuleList[$sModule] = $sModuleName;
}
natcasesort ($aModuleList);
$template->set_block('main_block', 'install_list_block', 'install_list');
$template->set_block('main_block', 'upgrade_list_block', 'upgrade_list');
$template->set_block('main_block', 'uninstall_list_block', 'uninstall_list');
$template->set_var(array('INSTALL_VISIBLE' => 'hide', 'UPGRADE_VISIBLE' => 'hide', 'UNINSTALL_VISIBLE' => 'hide'));
$show_block = false;
foreach ($aModuleList as $sModule => $sModuleName)
{
	if ( $admin->get_permission($sModule,'module')==false ) { continue;}
	if (is_readable($oReg->AppPath.'modules/'.$sModule.'/install.php')) {
		$show_block = true;
		$template->set_var('INSTALL_VISIBLE', '');
		$template->set_var('VALUE', $sModule);
		$template->set_var('NAME', $sModuleName);
		$template->parse('install_list', 'install_list_block', true);
	}

	if (is_readable($oReg->AppPath.'modules/'.$sModule.'/upgrade.php')) {
		$show_block = true;
		$template->set_var('UPGRADE_VISIBLE', '');
		$template->set_var('VALUE', $sModule);
		$template->set_var('NAME', $sModuleName);
		$template->parse('upgrade_list', 'upgrade_list_block', true);
	}

	if (is_readable($oReg->AppPath.'modules/'.$sModule.'/uninstall.php')) {
		$show_block = true;
		$template->set_var('UNINSTALL_VISIBLE', '');
		$template->set_var('VALUE', $sModule);
		$template->set_var('NAME', $sModuleName);
		$template->parse('uninstall_list', 'uninstall_list_block', true);
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
if(!$show_block || count($aModuleList) == 0 || !isset($_GET['advanced']) || $admin->get_permission('settings_advanced') != true) {
	$template->set_var('DISPLAY_MANUAL_INSTALL', 'hide');
}

// insert urls
$template->set_var(array(
/** @todo the following 3 rtrims can be removed, after using of WB_PATH/s.o is changed in templates **/
					'ADMIN_URL' => rtrim($oReg->AcpUrl, '/'),
					'WB_URL' => rtrim($oReg->AppUrl, '/'),
					'THEME_URL' => rtrim($oReg->ThemeUrl, '/'),
					'FTAN' => $admin->getFTAN()
					)
				);
// Insert language text and messages
$template->set_var(array(
	'URL_TEMPLATES' => $admin->get_permission('templates')
	                   ? '<a href="'.$oReg->AcpUrl.'templates/index.php">'.$oTrans->MENU_TEMPLATES.'</a>'
	                   : '<b>'.$oTrans->MENU_TEMPLATES.'</b>',
	'URL_LANGUAGES' => $admin->get_permission('languages') 
	                   ? '<a href="'.$oReg->AcpUrl.'languages/index.php">'.$oTrans->MENU_LANGUAGES.'</a>'
	                   : '<b>'.$oTrans->MENU_LANGUAGES.'</b>',
	'URL_ADVANCED'  => $admin->get_permission('modules_advanced') 
	                   ? '<a href="' . $oReg->AcpUrl.'modules/index.php?advanced">'.$oTrans->TEXT_ADVANCED.'</a>'
	                   : '<b>'.$oTrans->TEXT_ADVANCED.'</b>', 'HEADING_CHANGE_TEMPLATE_NOTICE' => ''
	)
);

// Parse template object
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

// Print admin footer
$admin->print_footer();
