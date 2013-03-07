<?php
/**
 * @category        admin
 * @package         groups
 * @author          WebsiteBaker Project. Independend-Software-Team
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     all basic actions of this module, called by dispatcher only.
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

/*
print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.'frm_modify_group'.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
print_r( $_POST ); print '</pre>'; // flush ();sleep(10); die();
*/

/* *****************************************************************************
 * Show groupsmask to edit group
 * @access public
 * @param object $admin: admin-object
 * @param int $user_id: ID from group to modify or 0 for a new group
 * @return string: parsed HTML-content
 */
	function show_groupmask($admin, $group_id = 0)
	{
//		global $TEXT, $MESSAGE, $HEADING, $MENU;

		$database = WbDatabase::getInstance();
		$mLang = Translate::getInstance();
//		$mLang->setLanguage(dirname(__FILE__).'/languages/', LANGUAGE, DEFAULT_LANGUAGE);
		include_once('upgradePermissions.php');
		include_once(WB_PATH.'/framework/functions.php');
	// Create new template object for the modify/remove menu
		$tpl = new Template(dirname($admin->correct_theme_source('groups_form.htt')),'keep');
		$tpl->set_file('page', 'groups_form.htt');
		$tpl->debug = false; // false, true

		$tpl->set_block('page', 'main_block', 'main');
		$tpl->set_block('main_block', 'show_cmd_permission_block', 'show_cmd_permission');
		$tpl->set_var('FTAN', $admin->getFTAN());
		$rec_group = array();
// admin settings
//		$system_settings = getSystemDefaultPermissions();
//		$aSystemDefaultSettings = getSystemDefaultPermissions();
		if( $group_id > 1 ) // load groupdata from db
		{
			// only read the first time from db to set checkboxes
			if( $admin->get_post('frm_modify_group') == null )
			{
				$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'groups` ';
				$sql .= 'WHERE `group_id` = '.(int)$group_id;
				// $group_id = 0; // reset to 0 if error occures
				if( ($res_group = $database->query($sql)) != false )
				{
					if( ($rec_group = $res_group->fetchRow(MYSQL_ASSOC)) != false )
					{
						$group_id = $rec_group['group_id'];
		// Explode system permissions
						$system_permissions = $rec_group['system_permissions'];
		// Explode module permissions
		 				$module_permissions = explode(',', $rec_group['module_permissions']);
		// Explode template permissions
						$template_permissions = explode(',', $rec_group['template_permissions']);
					}
				}

			$tpl->set_var(array(
						'SUBMIT_TITLE' =>  ($admin->get_permission('groups_modify') == true) ? $mLang->TEXT_SAVE : $mLang->TEXT_BACK,
						'ACTION_HIDDEN' => ($admin->get_permission('groups_modify') == true) ? 'action_modify' : 'action_cancel',
						'ACTION_HANDLE' => ($admin->get_permission('groups_modify') == true) ? 'action_save' : 'action_cancel',
						'GROUP_ID' => $rec_group['group_id'],
						'GROUP_NAME' => $rec_group['name'],
						'FORM_NAME_GROUPMASK' => 'frm_modify_group',
						'GROUPNAME_DISABLED' => '',
					));
			} else {
				// set changed checkboxes and prepare db data
 				$module_permissions = set_module_permissions($admin);
 				$template_permissions = set_template_permissions($admin);
				$rec_group['group_id'] = $group_id;
				$rec_group['name'] = $admin->add_slashes($admin->get_post('name'));
				$rec_group['module_permissions']   = convertArrayToString($module_permissions);
				$rec_group['template_permissions'] = convertArrayToString($template_permissions);

				$tpl->set_var(array(
							'SUBMIT_TITLE' =>  ($admin->get_permission('groups_modify') == true) ? $mLang->TEXT_SAVE : $mLang->TEXT_BACK,
							'ACTION_HANDLE' => ($admin->get_permission('groups_modify') == true) ? 'action_save' : 'action_cancel',
							'ACTION_HIDDEN' => ($admin->get_permission('groups_modify') == true) ? 'action_modify' : 'action_cancel',
							'TEXT_GROUPS_NAME' => $mLang->TEXT_GROUP.': ',
							'FORM_NAME_GROUPMASK' => 'frm_modify_group',
	//						'GROUPNAME_DISABLED' => ' readonly="readonly"',
	//						'GROUPNAME_INPUT_DISABLED' => ' input_text_disabled no_input'
							'GROUP_NAME' => $rec_group['name'],
							'GROUPNAME_DISABLED' => '',
							'GROUPNAME_INPUT_DISABLED' => ''
							));
			}
		} else {
// set default no rights
			$system_permissions = array('preferences' => 1,'preferences_view' => 1);
//		$system_permissions = array();
//		$system_permissions = isset($_POST['system_permissions']) ? $_POST['system_permissions'] : $system_permissions;
			$module_permissions = array();
			$template_permissions = array();
	// create a empty group-record with permissions masks and advanced button handle
	// check for existing groupname and junp to start handling, do the same in save
	// set changed checkboxes and prepare db data
			$module_permissions = set_module_permissions($admin);
			$template_permissions = set_template_permissions($admin);
			$rec_group['group_id'] = intval($admin->get_post('group_id'));
			$rec_group['name'] = $admin->add_slashes($admin->get_post('name'));
			$rec_group['module_permissions'] = $module_permissions;
			$rec_group['template_permissions'] = $template_permissions;

			$tpl->set_var(array(
						'SUBMIT_TITLE' =>  ($admin->get_permission('groups_add') == true) ? $mLang->TEXT_ADD : $mLang->TEXT_BACK,
						'ACTION_HANDLE' => ($admin->get_permission('groups_add') == true) ? 'action_save' : 'action_cancel',
						'ACTION_HIDDEN' => ($admin->get_permission('groups_add') == true) ? 'action_modify' : 'action_cancel',
						'TEXT_GROUPS_NAME' => '',
						'GROUP_NAME' => $rec_group['name'],
						'FORM_NAME_GROUPMASK' => 'frm_addnew_group',
						'GROUPNAME_DISABLED' => '',
						'GROUPNAME_INPUT_DISABLED' => ''
						));
//			$group_id = $rec_group['group_id'];
		}
// set changed checkboxes and prepare db data
		if( isset($_POST['system_permissions']) )
		{
			$system_permissions = get_system_permissions($admin,$_POST['system_permissions'] );
			$rec_group['system_permissions']   = set_system_permissions($_POST['system_permissions']);
		} else {
			$system_permissions = get_system_permissions($admin,$system_permissions);
			$rec_group['system_permissions']   = set_system_permissions($system_permissions);
		}
//print '<pre style="text-align: left;"><strong>function '.__FUNCTION__.'( '.'frm_modify_group'.' );</strong>  basename: '.basename(__FILE__).'  line: '.__LINE__.' -> <br />';
//print_r( $rec_group['system_permissions']  ); print '</pre>';
		$tpl->set_var(array(
					'GROUP_ID' => $rec_group['group_id'],
					'GROUP_NAME' => $rec_group['name'],
					'DISPLAY_ADD' => '',
					));
		$tpl->parse('show_cmd_permission', 'show_cmd_permission_block', true);
		// if the requested group doesn't exist, or $group_id contains 0 so it
		// will be shown a empty mask to add a new group
		// otherwise the $rec_group object contains existing data from requested group
		// $tpl->set_var('GROUP_ID', $group_id != 0 ? $admin->getIDKEY($group_id) : 0);
		$tpl->set_var('GROUP_ACTION_URL', $_SERVER['SCRIPT_NAME']);
        $header_extra = $mLang->TEXT_FILESYSTEM_PERMISSIONS.' ';
		if( ($admin->get_permission('groups_view') == true) )
		{
			$tpl->set_var('GROUPS_HEADER', $header_extra.$mLang->HEADING_VIEW_GROUP );
			if( ($admin->get_permission('groups_modify') == true) )
			{
			$tpl->set_var('GROUPS_HEADER', ($group_id == 0 ? $header_extra.$mLang->HEADING_ADD_GROUP : $header_extra.$mLang->HEADING_MODIFY_GROUP) );
			}
		}

// Insert language text and messages
		$tpl->set_var('MODULE_FUNCTION', '');
		$tpl->set_var($mLang->getLangArray());

// ------------------------
// Tell the browser whether or not to show advanced options
		$tpl->set_block('show_cmd_permission', 'show_cmd_manage_permission_block', 'permission_block');
//		$tpl->set_block('show_cmd_manage_permission_block', 'show_cmd_hidden_permission_list_block', 'hidden_permission_list');
		$tpl->set_block('show_cmd_permission', 'show_cmd_advanced_permission_block', 'advanced_permission_block');
// first set the var {hidden_permission_list} to empty
//		$tpl->parse('hidden_permission_list', '');
// Check and set system permissions boxes in main_block

		if ( true == (isset( $_POST['advanced_action']) && (( $_POST['advanced_action'] == 'no') || strpos( $_POST['advanced_action'], ">>") > 0 ) ) )
		{
			$tpl->parse('hidden_permission_list', '');
			$tpl->set_block('show_cmd_advanced_permission_block', 'show_cmd_hidden_advanced_permission_list_block', 'hidden_advanced_permission_list');
			setSystemCheckboxes( $tpl, $admin, isset($_POST['system_permissions']) ? $_POST['system_permissions'] : $rec_group['system_permissions'] );
			$tpl->set_var('DISPLAY_ADVANCED', '');
			$tpl->set_var('DISPLAY_BASIC', 'display:none;');
			$tpl->set_var('ADVANCED', 'yes');
			$tpl->set_var('ADVANCED_ACTION', 'advance_action');
			$tpl->set_var('ADVANCED_BUTTON',  ($admin->get_permission('groups') == true) ? '<< '.$mLang->TEXT_HIDE_ADVANCED : '<< '.$mLang->TEXT_HIDE_ADVANCED);
			$tpl->set_var('FILESYSTEM_PERMISSIONS', $mLang->TEXT_FILESYSTEM_PERMISSIONS);

			$tpl->parse('advanced_permission_block', 'show_cmd_advanced_permission_block', true);
			$tpl->parse('permission_block', '');
		} else {
			$tpl->parse('hidden_advanced_permission_list', '');
			$tpl->set_block('show_cmd_manage_permission_block', 'show_cmd_hidden_permission_list_block', 'hidden_permission_list');
			setSystemCheckboxes( $tpl, $admin, isset($_POST['system_permissions']) ? $_POST['system_permissions'] : $rec_group['system_permissions'] );
			$tpl->set_var('DISPLAY_ADVANCED', '');
			$tpl->set_var('DISPLAY_BASIC', '');
			$tpl->set_var('ADVANCED', 'no');
			$tpl->set_var('ADVANCED_ACTION', 'advance_action');
			$tpl->set_var('ADVANCED_BUTTON',  ($admin->get_permission('groups_add') == true) ? $mLang->TEXT_SHOW_ADVANCED.' >>' : $mLang->TEXT_SHOW_ADVANCED.' >>');
			$tpl->set_var('FILESYSTEM_PERMISSIONS', $mLang->TEXT_FILESYSTEM_PERMISSIONS.' ');

			$tpl->parse('advanced_permission_block', '');
			$tpl->parse('permission_block', 'show_cmd_manage_permission_block', true);
		}

// ------------------------

		$tpl->set_var('HEADER_MODULE_FUNCTION', '<h6>'.$mLang->TEXT_MODULE_PERMISSIONS.'</h6>');
// Insert values into pages module list
		$tpl->set_block('show_cmd_permission', 'pages_module_list_block', 'module_list');
		$sql  = 'SELECT `directory`,`name`,`function` FROM `'.TABLE_PREFIX.'addons` ';
		$sql .= 'WHERE `type` = \'module\' AND `function` <> \'tool\' ';
		$sql .= '';
		$sql .= 'ORDER BY `function`, `name`';
		if(($res_pages = $database->query($sql)) && ($res_pages->numRows() > 0) )
		{
        	$tmp_header = '';
			while($addon = $res_pages->fetchRow(MYSQL_ASSOC))
			{
				if(file_exists(WB_PATH.'/modules/'.$addon['directory'].'/info.php'))
				{
                    if( $tmp_header != $addon['function'])
					{
						$tpl->set_var('MODULE_FUNCTION', '<h6>'.strtoupper($addon['function']).'</h6>');
					} else {
						$tpl->set_var('MODULE_FUNCTION', '');
					}

					$tpl->set_var('MOD_VALUE', $addon['directory']);
					$tpl->set_var('MOD_NAME', $addon['name']);
					if(!is_numeric(array_search($addon['directory'], $module_permissions)) )
					{
						$tpl->set_var('MOD_CHECKED', ' checked="checked"');
					} else {
	 					$tpl->set_var('MOD_CHECKED', '');
					}
					$tpl->parse('module_list', 'pages_module_list_block', true);
		        }
				$tmp_header = $addon['function'];
			}
		}

		$tpl->set_var('HEADER_MODULE_FUNCTION', '<h6>'.$mLang->TEXT_MODULE_PERMISSIONS.'</h6>');
		// Insert values into pages module list
		$tpl->set_block('show_cmd_permission', 'tools_module_list_block', 'tools_list');
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'addons` ';
		$sql .= 'WHERE `type` = \'module\' AND `function` = \'tool\' ';
		$sql .= 'ORDER BY `name`';
		if(($res_pages = $database->query($sql)) && ($res_pages->numRows() > 0) )
		{
        	$tmp_header = '';
			while($addon = $res_pages->fetchRow(MYSQL_ASSOC))
			{
				if(file_exists(WB_PATH.'/modules/'.$addon['directory'].'/info.php'))
				{
                    if( $tmp_header != $addon['function'])
					{
						$tpl->set_var('MODULE_FUNCTION', '<h6>'.strtoupper($addon['function']).'</h6>');
					} else {
						$tpl->set_var('MODULE_FUNCTION', '');
					}
					$tpl->set_var('ADM_VALUE', $addon['directory']);
					$tpl->set_var('ADM_NAME', $addon['name']);
					if(!is_numeric(array_search($addon['directory'], $module_permissions)) )
					{
						$tpl->set_var('ADM_CHECKED', ' checked="checked"');
					} else {
	 					$tpl->set_var('ADM_CHECKED', '');
					}

					$tpl->parse('tools_list', 'tools_module_list_block', true);
		        }
				$tmp_header = $addon['function'];
			}
		}
		$tpl->set_var('HEADER_TEMPLATE_FUNCTION', '<h6>'.$mLang->TEXT_TEMPLATE_PERMISSIONS.'</h6>');
		// Insert values into pages module list
		$tpl->set_block('show_cmd_permission', 'template_list_block', 'template_list');
		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'addons` ';
		$sql .= 'WHERE `type` = \'template\' ';
		$sql .= 'ORDER BY `function`,`name`';
		if(($res_pages = $database->query($sql)) && ($res_pages->numRows() > 0) )
		{
        	$tmp_header = '';
			while($addon = $res_pages->fetchRow(MYSQL_ASSOC))
			{
				if(file_exists(WB_PATH.'/templates/'.$addon['directory'].'/info.php'))
				{
                    if( $tmp_header != $addon['function'])
					{
						$tpl->set_var('TEMPLATE_FUNCTION', '<h6>'.strtoupper($addon['function']).'</h6>');
					} else {
						$tpl->set_var('TEMPLATE_FUNCTION', '');
					}
					$tpl->set_var('TMP_VALUE', $addon['directory']);
					$tpl->set_var('TMP_NAME', $addon['name']);
					if(!is_numeric(array_search($addon['directory'], $template_permissions)) )
					{
						$tpl->set_var('TMP_CHECKED', ' checked="checked"');
					} else {
	 					$tpl->set_var('TMP_CHECKED', '');
					}

					$tpl->parse('template_list', 'template_list_block', true);
		        }
				$tmp_header = $addon['function'];
			}
		}

// ------------------------
	// Parse template object
		$tpl->parse('main', 'main_block', false);
		$output = $tpl->finish($tpl->parse('output', 'page'));
		unset($tpl);
		return $output;
	}
