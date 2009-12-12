<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// Include config file and admin class file
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');

// Create new database object
$database = new database();

if(!isset($_POST['action']) OR ($_POST['action'] != "modify" AND $_POST['action'] != "delete")) {
	header("Location: index.php");
	exit(0);
}

// Set parameter 'action' as alternative to javascript mechanism
if(isset($_POST['modify']))
	$_POST['action'] = "modify";
if(isset($_POST['delete']))
	$_POST['action'] = "delete";

// Check if user id is a valid number and doesnt equal 1
if(!isset($_POST['user_id']) OR !is_numeric($_POST['user_id']) OR $_POST['user_id'] == 1) {
	header("Location: index.php");
	exit(0);
}

if($_POST['action'] == 'modify') {
	// Print header
	$admin = new admin('Access', 'users_modify');
	// Get existing values
	$results = $database->query("SELECT * FROM ".TABLE_PREFIX."users WHERE user_id = '".$_POST['user_id']."'");
	$user = $results->fetchRow();
	
	// Setup template object
	$template = new Template(THEME_PATH.'/templates');
	$template->set_file('page', 'users_form.htt');
	$template->set_block('page', 'main_block', 'main');
	$template->set_var(	array(
										'ACTION_URL' => ADMIN_URL.'/users/save.php',
										'SUBMIT_TITLE' => $TEXT['SAVE'],
										'USER_ID' => $user['user_id'],
										'USERNAME' => $user['username'],
										'DISPLAY_NAME' => $user['display_name'],
										'EMAIL' => $user['email'],
										'ADMIN_URL' => ADMIN_URL,
										'WB_URL' => WB_URL,
										'WB_PATH' => WB_PATH,
										'THEME_URL' => THEME_URL
										)
								);
	if($user['active'] == 1) {
		$template->set_var('ACTIVE_CHECKED', ' checked="checked"');
	} else {
		$template->set_var('DISABLED_CHECKED', ' checked="checked"');
	}
	// Add groups to list
	$template->set_block('main_block', 'group_list_block', 'group_list');
	$results = $database->query("SELECT group_id, name FROM ".TABLE_PREFIX."groups WHERE group_id != '1'");
	if($results->numRows() > 0) {
		$template->set_var('ID', '');
		$template->set_var('NAME', $TEXT['PLEASE_SELECT'].'...');
		$template->set_var('SELECTED', '');
		$template->parse('group_list', 'group_list_block', true);
		while($group = $results->fetchRow()) {
			$template->set_var('ID', $group['group_id']);
			$template->set_var('NAME', $group['name']);
			if(in_array($group['group_id'], explode(",",$user['groups_id']))) {
				$template->set_var('SELECTED', ' selected="selected"');
			} else {
				$template->set_var('SELECTED', '');
			}
			$template->parse('group_list', 'group_list_block', true);
		}
	}
	// Only allow the user to add a user to the Administrators group if they belong to it
	if(in_array(1, $admin->get_groups_id())) {
		$template->set_var('ID', '1');
		$users_groups = $admin->get_groups_name();
		$template->set_var('NAME', $users_groups[1]);
		
		$in_group = FALSE;
		foreach($admin->get_groups_id() as $cur_gid){
		    if (in_array($cur_gid, explode(",", $user['groups_id']))) {
		        $in_group = TRUE;
		    }
		}

		if($in_group) {
			$template->set_var('SELECTED', ' selected="selected"');
		} else {
			$template->set_var('SELECTED', '');
		}
		$template->parse('group_list', 'group_list_block', true);
	} else {
		if($results->numRows() == 0) {
			$template->set_var('ID', '');
			$template->set_var('NAME', $TEXT['NONE_FOUND']);
			$template->set_var('SELECTED', ' selected="selected"');
			$template->parse('group_list', 'group_list_block', true);
		}
	}
	
	// Generate username field name
	$username_fieldname = 'username_';
	$salt = "abchefghjkmnpqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	$i = 0;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($salt, $num, 1);
		$username_fieldname = $username_fieldname . $tmp;
		$i++;
	}
	
	// Work-out if home folder should be shown
	if(!HOME_FOLDERS) {
		$template->set_var('DISPLAY_HOME_FOLDERS', 'none');
	}
	
	// Include the WB functions file
	require_once(WB_PATH.'/framework/functions.php');
	
	// Add media folders to home folder list
	$template->set_block('main_block', 'folder_list_block', 'folder_list');
	foreach(directory_list(WB_PATH.MEDIA_DIRECTORY) AS $name) {
		$template->set_var('NAME', str_replace(WB_PATH, '', $name));
		$template->set_var('FOLDER', str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name));
		if($user['home_folder'] == str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name)) {
			$template->set_var('SELECTED', ' selected="selected"');
		} else {
			$template->set_var('SELECTED', ' ');
		}
		$template->parse('folder_list', 'folder_list_block', true);
	}
	
	// Insert language text and messages
	$template->set_var(array(
									'TEXT_RESET' => $TEXT['RESET'],
									'TEXT_ACTIVE' => $TEXT['ACTIVE'],
									'TEXT_DISABLED' => $TEXT['DISABLED'],
									'TEXT_PLEASE_SELECT' => $TEXT['PLEASE_SELECT'],
									'TEXT_USERNAME' => $TEXT['USERNAME'],
									'TEXT_PASSWORD' => $TEXT['PASSWORD'],
									'TEXT_RETYPE_PASSWORD' => $TEXT['RETYPE_PASSWORD'],
									'TEXT_DISPLAY_NAME' => $TEXT['DISPLAY_NAME'],
									'TEXT_EMAIL' => $TEXT['EMAIL'],
									'TEXT_GROUP' => $TEXT['GROUP'],
									'TEXT_NONE' => $TEXT['NONE'],
									'TEXT_HOME_FOLDER' => $TEXT['HOME_FOLDER'],
									'USERNAME_FIELDNAME' => $username_fieldname,
									'CHANGING_PASSWORD' => $MESSAGE['USERS']['CHANGING_PASSWORD'],
									'HEADING_MODIFY_USER' => $HEADING['MODIFY_USER']
									)
							);
	
	// Parse template object
	$template->parse('main', 'main_block', false);
	$template->pparse('output', 'page');
} elseif($_POST['action'] == 'delete') {
	// Print header
	$admin = new admin('Access', 'users_delete');
	// Delete the user
	$database->query("DELETE FROM ".TABLE_PREFIX."users WHERE user_id = '".$_POST['user_id']."' LIMIT 1");
	if($database->is_error()) {
		$admin->print_error($database->get_error());
	} else {
		$admin->print_success($MESSAGE['USERS']['DELETED']);
	}
}

// Print admin footer
$admin->print_footer();

?>