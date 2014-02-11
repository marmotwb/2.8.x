<?php
/**
 *
 * @category        admin
 * @package         addons
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'addons');

// Setup template object, parse vars to it, then parse it
// Create new template object
$template = new Template(dirname($admin->correct_theme_source('addons.htt')));
$template->set_file('page', 'addons.htt');
$template->set_block('page', 'main_block', 'main');
$oTrans = Translate::getInstance();
$oTrans->enableAddon('admin\\addons');
$template->set_var($oTrans->getLangArray());

// Insert values into the template object
$template->set_var(array(
		'ADMIN_URL' => ADMIN_URL,
		'THEME_URL' => THEME_URL,
		'WB_URL'    => WB_URL
	)
);

/**
 *	Setting up the blocks
 */
$template->set_block('main_block', "modules_block", "modules");
$template->set_block('main_block', "templates_block", "templates");
$template->set_block('main_block', "languages_block", "languages");
$template->set_block('main_block', "reload_block", "reload");

/**
 *	Insert permission values into the template object
 *	Obsolete as we are using blocks ... see "parsing the blocks" section
 */
$display_none = "style=\"display: none;\"";
if($admin->get_permission('modules') != true) {	$template->set_var('DISPLAY_MODULES', $display_none); }
if($admin->get_permission('templates') != true) { $template->set_var('DISPLAY_TEMPLATES', $display_none); }
if($admin->get_permission('languages') != true) { $template->set_var('DISPLAY_LANGUAGES', $display_none); }
if($admin->get_permission('modules_advanced') != true) { $template->set_var('DISPLAY_ADVANCED', $display_none); }

if(!isset($_GET['advanced']) || $admin->get_permission('modules_advanced') != true) {
	$template->set_var('DISPLAY_RELOAD', $display_none);
}
/**
 *	Insert section names and descriptions
 */
$template->set_var(array(
	'ADDONS_OVERVIEW'       => $oTrans->MENU_ADDONS,
	'FTAN'                  => $admin->getFTAN(),
	'MODULES'               => $oTrans->MENU_MODULES,
	'TEMPLATES'             => $oTrans->MENU_TEMPLATES,
	'LANGUAGES'             => $oTrans->MENU_LANGUAGES,
	'MODULES_OVERVIEW'      => $oTrans->OVERVIEW_MODULES,
	'TEMPLATES_OVERVIEW'    => $oTrans->OVERVIEW_TEMPLATES,
	'LANGUAGES_OVERVIEW'    => $oTrans->OVERVIEW_LANGUAGES,
	'TXT_ADMIN_SETTINGS'    => $oTrans->TEXT_ADMIN . ' ' . $oTrans->TEXT_SETTINGS,
	'MESSAGE_RELOAD_ADDONS' => $oTrans->MESSAGE_ADDON_RELOAD,
	'TEXT_RELOAD'           => $oTrans->TEXT_RELOAD,

	'RELOAD_URL'            => ADMIN_URL . '/addons/reload.php',
	'URL_ADVANCED'          => $admin->get_permission('modules_advanced')
                               ? '<a href="' . ADMIN_URL . '/addons/index.php?advanced">' . $oTrans->TEXT_ADVANCED . '</a>' : '',
	'ADVANCED_URL'          => $admin->get_permission('modules_advanced') ? ADMIN_URL . '/addons/index.php' : '',
    'TEXT_ADVANCED'         => $oTrans->TEXT_ADVANCED,
    'TEXT_EMPTY'            => '&nbsp;',
	)
);

/**
 *	Parsing the blocks ...
 */
if ( $admin->get_permission('modules') == true) { $template->parse('main_block', "modules_block", true); }
if ( $admin->get_permission('templates') == true) { $template->parse('main_block', "templates_block", true); }
if ( $admin->get_permission('languages') == true) { $template->parse('main_block', "languages_block", true); }
// start advanced block
if ( isset($_GET['advanced']) AND $admin->get_permission('modules_advanced') == true) {
	$template->set_var(array(
		'TXT_THEME_COPY_CURRENT'  => $oTrans->TEXT_THEME_COPY_CURRENT,
		'TXT_THEME_NEW_NAME'      => $oTrans->TEXT_THEME_NEW_NAME,
		'TXT_THEME_CURRENT'       => $oTrans->TEXT_THEME_CURRENT,
		'TXT_THEME_START_COPY'    => $oTrans->TEXT_THEME_START_COPY,
		'TXT_THEME_IMPORT_HTT'    => $oTrans->TEXT_THEME_IMPORT_HTT,
		'TXT_THEME_SELECT_HTT'    => $oTrans->TEXT_THEME_SELECT_HTT,
		'TXT_THEME_NOMORE_HTT'    => $oTrans->TEXT_THEME_NOMORE_HTT,
		'TXT_THEME_START_IMPORT'  => $oTrans->TEXT_THEME_START_IMPORT,
		)
	);
// start copy current theme
	$sql = 'SELECT `name` FROM `'.TABLE_PREFIX.'addons` '
		 . 'WHERE `directory`=\''.DEFAULT_THEME.'\' AND `function`=\'theme\'';
	$tmp = $database->get_one($sql);
	$template->set_var('THEME_DEFAULT_NAME', $tmp);
	$template->set_var('CURRENT_THEME', $tmp);
	$tmp = str_replace(str_replace('\\', '/', WB_PATH), '', str_replace('\\', '/', THEME_PATH));
	$template->set_var('THEME_PATH', $tmp);
// end copy current theme
// start template import
	include(dirname(__FILE__).'/CopyThemeHtt.php');
	$aTplList = CopyThemeHtt::getDivList(ADMIN_PATH.'/skel/themes/htt',
	                                     THEME_PATH.'/templates', 'htt');
	$sOptionList = '';
	if(sizeof($aTplList)) {
		foreach($aTplList as $key=>$val) {
			$sOptionList .= '<option value="'.$val.'">'.$key.'</option>'."\n";
		}
	}else {
		$sOptionList = '<option value="none">'.$oTrans->TEXT_THEME_NOMORE_HTT.'</option>'."\n";
	}
	$template->set_var('THEME_TEMPLATE_LIST', $sOptionList);
// end template import
	$template->parse('main_block', "reload_block", true);
}
// end advanced block

/**
 *	Parse template object
 */
$template->parse('main', 'main_block', false);
$template->pparse('output', 'page');

/**
 *	Print admin footer
 */
$admin->print_footer();
