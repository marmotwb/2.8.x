<?php
/**
 * @category        admin
 * @package         groups
 * @author          WebsiteBaker Project, Independend-Software-Team
 * @copyright       2009-2013, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description     all basic actions of this module, called by dispatcher only.
 */

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

/* *****************************************************************************
 * Show groupslist with delete-/ modify-button
 * @access public
 * @param object $admin: admin-object
 * @return string: parsed HTML-content
 */
	function show_grouplist($admin)
	{
		$oDb = WbDatabase::getInstance();
		$oLang = Translate::getInstance();
		$oLang->enableAddon('admin\\groups');
// Create new template object for the modify/remove section
		$tpl = new Template(dirname($admin->correct_theme_source('groups_list.htt')),'keep');
		$tpl->set_file('page', 'groups_list.htt');
		$tpl->set_block('page', 'main_block', 'main');

        $tpl->set_var($oLang->getLangArray());
		$tpl->set_var('ACTION_URL', $_SERVER['SCRIPT_NAME']);
		$tpl->set_var('FTAN', $admin->getFTAN());

// -- if permission then activate link 'manage users'
		$tpl->set_block('main_block', 'show_cmd_manage_users_block', 'show_cmd_manage_users');
		if($admin->get_permission('users') == true)
		{
			$tpl->set_var('TEXT_MANAGE_USERS', $oLang->TEXT_MANAGE_USERS);
			$tpl->set_var('LINK_MANAGE_USERS', ADMIN_URL.'/users/index'.PAGE_EXTENSION);
			$tpl->parse('show_cmd_manage_users', 'show_cmd_manage_users_block', true);
		}else { // switch off cmd_manage_groups_block
			$tpl->parse('show_cmd_manage_users', '');
		}

		$tpl->set_block('main_block', 'show_cmd_group_list_block', 'show_cmd_group_list');
		if( $admin->get_permission('groups_view') == true )
		{
			$tpl->set_var('CONTENT_HEADER', $oLang->HEADING_VIEW_GROUPS);
			if( ($admin->get_permission('groups_modify') == true) )
			{
			$tpl->set_var('CONTENT_HEADER', $oLang->HEADING_MODIFY_DELETE_GROUP);
			}
		}

		$tpl->set_var('FORM_NAME_GROUPLIST', 'frm_group_list');

// -- build grouplist from database
		$tpl->set_block('show_cmd_group_list_block', 'grouplist_block', 'grouplist');
		// Insert first value to say please select
		// $tpl->set_var('GROUP_ID',   $admin->getIDKEY(0));
		$tpl->set_var('GROUP_ID', 0);
		$tpl->set_var('GROUP_NAME', '');
		$tpl->set_var('GROUP_DISPLAY_NAME', $oLang->TEXT_PLEASE_SELECT.'...');
		$tpl->set_var('CSS_GROUP_DELETED', '');

		$tpl->parse('grouplist', 'grouplist_block', true);
		$sql  = 'SELECT `group_id`, `name` ';
		$sql .= 'FROM `'.$oDb->TablePrefix.'groups` ';
		$sql .= 'WHERE `group_id` > 1 ORDER BY `name` ';
		if( ($res_groups = $oDb->doQuery($sql)) != false )
		{
			while($rec_group = $res_groups->fetchRow(MYSQL_ASSOC))
			{
                if( in_array($rec_group['group_id'], explode( ',', $admin->get_session('GROUPS_ID') ) ) ) { continue; }
				// $tpl->set_var('GROUP_ID', $admin->getIDKEY($rec_group['group_id']));
				$tpl->set_var('GROUP_ID', $rec_group['group_id']);
				$tpl->set_var('GROUP_NAME', $rec_group['name']);
				$tpl->set_var('GROUP_DISPLAY_NAME', $rec_group['name']);
				$tpl->parse('grouplist', 'grouplist_block', true);
			}
		}

		$sPermission = 'none';
		$sPermission = $admin->get_permission('groups_view') ? 'permView' : $sPermission;
		$sPermission = $admin->get_permission('groups_add') ? 'permAdd' : $sPermission;
		$sPermission = $admin->get_permission('groups_modify') ? 'permModify' : $sPermission;

// 		if( ($admin->get_permission('groups_modify') == false) && ($admin->get_permission('groups_delete') == false) )
		if( ($admin->get_permission('groups') == false) )
		{
			$tpl->parse('show_cmd_group_list', '');
        } else {
			$tpl->parse('show_cmd_group_list', 'show_cmd_group_list_block', true);
	// -- if permission then activate button 'modify groups'
			$tpl->set_block('show_cmd_group_list', 'show_cmd_modify_group_block', 'show_cmd_modify_group');
			if( $admin->get_permission('groups') == true )
			{
				$tpl->parse('show_cmd_modify_group', 'show_cmd_modify_group_block', true);
			}else {
				$tpl->parse('show_cmd_modify_group', '');
			}
	// -- if permission then activate button 'delete groups'
			$tpl->set_block('show_cmd_group_list', 'show_cmd_delete_group_block', 'show_cmd_delete_group');
			if($admin->get_permission('groups_delete') == true)
			{
				$tpl->parse('show_cmd_delete_group', 'show_cmd_delete_group_block', true);
			}else {
				$tpl->parse('show_cmd_delete_group', '');
			}

        }

		$tpl->set_block('main_block', 'show_cmd_add_input_block', 'show_cmd_add_input');
		if($admin->get_permission('groups_add') )
		{
			$tpl->set_var('DISPLAY_ADD', '');
			$tpl->set_var('GROUP_ACTION_URL', $_SERVER['SCRIPT_NAME']);
			$tpl->set_var('GROUPS_HEADER', $oLang->HEADING_ADD_GROUP );
			$tpl->set_var('SUBMIT_TITLE', $oLang->TEXT_ADD);
			$tpl->set_var('ACTION_HANDLE', 'action_modify');
			$tpl->set_var('ACTION_HIDDEN', 'action_add');
			$tpl->set_var('FORM_NAME_GROUPMASK', 'frm_addnew_group');
			$tpl->parse('show_cmd_add_input', 'show_cmd_add_input_block', false);
		} else {
			$tpl->parse('show_cmd_add_input', '');
		}

	// insert urls
		$tpl->set_var(array(
				'ADMIN_URL' => ADMIN_URL,
				'WB_URL'    => WB_URL,
				'THEME_URL' => THEME_URL
				)
		);
	// Insert language text and messages
		$tpl->set_var(array(
				'TEXT_MODIFY'    => ($admin->get_permission('groups_modify') == true) ? $oLang->TEXT_MODIFY : $oLang->TEXT_VIEW,
				'TEXT_DELETE'    => $oLang->TEXT_DELETE,
				'CONFIRM_DELETE' => $oLang->MESSAGE_GROUPS_CONFIRM_DELETE
				));

	// Parse template object
		$tpl->parse('main', 'main_block', false);
		$output = $tpl->finish($tpl->parse('output', 'page'));
		unset($tpl);
		return $output;
	}
