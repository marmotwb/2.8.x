<?php

/** 
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * calling file to create ACP-Pagetree
 *
 * @category     WbACP
 * @package      WbACP_Pages
 * @author       Werner v.d. Decken <wkl@isteam.de>
 * @copyright    Werner v.d. Decken <wkl@isteam.de>
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.0
 * @revision     $Revision$
 * @link         $HeadURL$
 * @lastmodified $Date$
 * @since        file added on 2012-12-21
 * @todo         rebuild this file to go into coding standards (sideeffects!!!)
 */

// --- start helper functions ------------------------------------------------------------
/**
 * create a list of groups
 * @param type $sPermission which permission the groups should have
 * @return array 
 */
	function admin_pages_makeGroupList($sPermission)
	{
		$aNewGroups = array();
		$sql = 'SELECT `group_id` ID, `name` NAME, \'\' CHECKED, \'\' DISABLED '
			 . 'FROM `'.TABLE_PREFIX.'groups` '
			 . 'WHERE FIND_IN_SET(\'pages_'.$sPermission.'\', `system_permissions`) '
			 . 'ORDER BY `NAME` ASC'
		;
		if(($oGroups = WbDatabase::getInstance()->query($sql))) {
			while($aGroup = $oGroups->fetchRow(MYSQL_ASSOC)) {
				if($aGroup['ID'] == 1) {
					$aGroup['CHECKED'] = ' checked="checked"';
					$aGroup['DISABLED'] = ' disabled="disabled"';
					// move it to topmost position of list
					array_unshift($aNewGroups, $aGroup);
				}else {
					if(in_array($aGroup['ID'], $GLOBALS['admin']->get_groups_id())) {
						$aGroup['CHECKED'] = ' checked="checked"';
					}
					// move it at the end of list
					$aNewGroups[] = $aGroup;
				}
			}
		}
		return $aNewGroups;
	} // end of admin_pages_makeGroupList()
// --- end helper functions --------------------------------------------------------------
// #######################################################################################
// --- start script ----------------------------------------------------------------------

// read configuration and initialize the system
	if(!defined('WB_URL')) {
		$sCfgFile = realpath(dirname(__FILE__).'/../../config.php');
		if(is_readable($sCfgFile)) {
			include($sCfgFile);
		}else {
			throw new RuntimeException('unable to read configuration file!!!');
		}
	}
// import languange translations
 	global $TEXT, $MESSAGE, $HEADING;
// define additional constants
	if(!defined('ADMIN_REL')) { define('ADMIN_REL', WB_REL.'/'.ADMIN_DIRECTORY); }
	if(!defined('THEME_REL')) {
		$sTmp = preg_replace('/^'.preg_quote(WB_URL, '/').'/siU', '', THEME_URL);
		define('THEME_REL', WB_REL.$sTmp);
	}
// create the needed admin object
	$database = WbDatabase::getInstance();
	if(!class_exists('admin', false)) { include(WB_PATH.'/framework/class.admin.php'); }
	$admin = new admin('Pages', 'pages');
	$admin->clearIDKEY();
// include the WB functions file
	if(!function_exists('get_page_title')) { include(WB_PATH.'/framework/functions.php'); }
// add module depending Javascript (eggsurplus: add child pages for a specific page)
	$sOutput = '<script type="text/javascript" src="'.ADMIN_REL.'/pages/eggsurplus.js" '
	         . 'charset="utf-8"></script>'.PHP_EOL
	         . '<script type="text/javascript" charset="utf-8">'.PHP_EOL
	         . "\t".'var pages_delete_confirm =\''.$MESSAGE['PAGES_DELETE_CONFIRM'].'\';'.PHP_EOL
	         . "\t".'var THEME_URL = \''.THEME_REL.'\';'.PHP_EOL
	         . "\t".'var WB_URL = \''.WB_REL.'\';'.PHP_EOL
	         . '</script>'.PHP_EOL;
	echo $sOutput;
// create page tree and display it -------------------------------------------------------
	$oPageTree = new a_pages_PageTree();
	$oPageTree->displayTree();
	
// Setup template object, parse vars to it, then parse it --------------------------------
	$oTpl = new Template(dirname($admin->correct_theme_source('pages.htt')),'keep');
	// $oTpl->debug = true;
	$oTpl->set_file('page', 'pages.htt');
	$oTpl->set_block('page', 'main_block', 'main');
	// Insert values into the add page form
	$oTpl->set_var('FTAN', $admin->getFTAN());
	
// --- admin groups list -----------------------------------------------------------------
	$aAdminGroups = admin_pages_makeGroupList('modify');
	// write block into template
	$oTpl->set_block('main_block', 'admingroups_list_block', 'admingroups_list');
	foreach($aAdminGroups as $aValue) {
		$oTpl->set_var($aValue);
		$oTpl->parse('admingroups_list', 'admingroups_list_block', true);
	}
	unset($aAdminGroups);
	
// --- viewer groups list ----------------------------------------------------------------
	$aViewerGroups = admin_pages_makeGroupList('view');
	// write block into template
	$oTpl->set_block('main_block', 'viewergroups_list_block', 'viewergroups_list');
	foreach($aViewerGroups as $aValue) {
		$oTpl->set_var($aValue);
		$oTpl->parse('viewergroups_list', 'viewergroups_list_block', true);
	}
	unset($aViewerGroups);
	
// --- build parent pages list -----------------------------------------------------------
	$aParents = $oPageTree->getParentList();
	$aNewEntry = array();
	$aNewEntry['page_id']        = 0;
	$aNewEntry['menu_title']     = $TEXT['NONE'];
	$aNewEntry['disabled']       = 0;
	$aNewEntry['parent']         = 99;
	$aNewEntry['flag_root_icon'] = '';
	$aNewEntry['level']          = 0;
	$aNewEntry['language']       = '';
	array_unshift($aParents, $aNewEntry);
	reset($aParents);
	$oTpl->set_block('main_block', 'parents_list_block', 'parents_list');
	// walk through all items
	while (list(, $aItem) = each($aParents)) {
		if($admin->get_permission('pages_add')) {
			$aNewEntry = array();
			$aNewEntry['ID']             = $aItem['page_id'];
			$aNewEntry['PARENT']         = $aItem['parent'];
			$aNewEntry['LEVEL']          = $aItem['level'];
			$aNewEntry['LANGUAGE']       = $aItem['language'];
			$aNewEntry['FLAG_ROOT_ICON'] = '';
			// modify item
			$aNewEntry['DISABLED'] = ($aItem['disabled'] ? ' disabled="disabled" class="disabled"' : '');
			if(!$aItem['parent']) {
				$aNewEntry['FLAG_ROOT_ICON'] = ' style="background-image: url('.THEME_REL.'/images/flags/'
										 . strtolower($aItem['language']).'.png);"';
			}
			$aNewEntry['TITLE'] = str_repeat('- ', $aItem['level']).$aItem['menu_title'];
			// write block into template
			$oTpl->set_var($aNewEntry);
			$oTpl->parse('parents_list', 'parents_list_block', true);
		}
	}
	unset($aParents);
// --- build modules list ----------------------------------------------------------------
	$bMatch = false;
	$aModulePermissions = '\''.implode(',', $_SESSION['MODULE_PERMISSIONS']).'\'';
	$sql = 'SELECT `directory` DIRECTORY, `name` NAME, \'\' SELECTED FROM `'.TABLE_PREFIX.'addons` '
	     . 'WHERE `type`=\'module\' AND `function`=\'page\' ';
	if($admin->get_user_id() != 1) {
		$sql .= 'AND NOT FIND_IN_SET(`DIRECTORY`, '.$aModulePermissions.') ';
	}
	$sql .= 'ORDER BY `name` ASC';
	if(($oModules = $database->query($sql))) {
		$oTpl->set_block('main_block', 'module_list_block', 'module_list');
		while ($aModule = $oModules->fetchRow(MYSQL_ASSOC)) {
			$bMatch = true;
			// Check if user is allowed to use this module
			$aModule['SELECTED'] = ($aModule['DIRECTORY'] == 'wysiwyg' ? ' selected="selected"' : '');
			$oTpl->set_var($aModule);
			$oTpl->parse('module_list', 'module_list_block', true);
		}
	}
	if(!$bMatch) {
		$aModule = array('DIRECTORY' => '',
		                 'NAME'      => $TEXT['NONE'],
		                 'SELECTED'  => ''
		                );
		$oTpl->set_var($aModule);
		$oTpl->parse('module_list', 'module_list_block', true);
	}

// --- Insert global replacements --------------------------------------------------------	
// Insert urls
	$oTpl->set_var(array(
		'WB_URL'    => WB_REL,
		'ADMIN_URL' => ADMIN_REL,
		'THEME_URL' => THEME_REL,
		'WB_REL'    => WB_REL,
		'ADMIN_REL' => ADMIN_REL,
		'THEME_REL' => THEME_REL
		)
	);
// Insert language text and messages
	$oTpl->set_var(array(
		'HEADING_ADD_PAGE'          => $HEADING['ADD_PAGE'],
		'HEADING_MODIFY_INTRO_PAGE' => $HEADING['MODIFY_INTRO_PAGE'],
		'TEXT_TITLE'                => $TEXT['TITLE'],
		'TEXT_TYPE'                 => $TEXT['TYPE'],
		'TEXT_PARENT'               => $TEXT['PARENT'],
		'TEXT_VISIBILITY'           => $TEXT['VISIBILITY'],
		'TEXT_PUBLIC'               => $TEXT['PUBLIC'],
		'TEXT_PRIVATE'              => $TEXT['PRIVATE'],
		'TEXT_REGISTERED'           => $TEXT['REGISTERED'],
		'TEXT_HIDDEN'               => $TEXT['HIDDEN'],
		'TEXT_NONE'                 => $TEXT['NONE'],
		'TEXT_NONE_FOUND'           => $TEXT['NONE_FOUND'],
		'TEXT_ADD'                  => $TEXT['ADD'],
		'TEXT_RESET'                => $TEXT['RESET'],
		'TEXT_ADMINISTRATORS'       => $TEXT['ADMINISTRATORS'],
		'TEXT_PRIVATE_VIEWERS'      => $TEXT['PRIVATE_VIEWERS'],
		'TEXT_REGISTERED_VIEWERS'   => $TEXT['REGISTERED_VIEWERS'],
		'INTRO_LINK'                => $MESSAGE['PAGES_INTRO_LINK'],
		)
	);
// Insert permissions values
	if($admin->get_permission('pages_add') != true) {
		$oTpl->set_var('DISPLAY_ADD', 'hide');
	} elseif($admin->get_permission('pages_add_l0') != true && !$oPageTree->getWriteablePages()) {
		$oTpl->set_var('DISPLAY_ADD', 'hide');
	}
	if($admin->get_permission('pages_intro') != true || INTRO_PAGE != 'enabled') {
		$oTpl->set_var('DISPLAY_INTRO', 'hide');
	}
// Parse template object
	$oTpl->parse('main', 'main_block', false);
	$oTpl->pparse('output', 'page');
	// include the required file for Javascript admin
	if(file_exists(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php')) {
		include(WB_PATH.'/modules/jsadmin/jsadmin_backend_include.php');
	}
	// Print admin
	$admin->print_footer();
	