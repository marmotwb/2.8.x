<?php

/**
 *
 * @category        admin
 * @package         pages
 * @author          Ryan Djurovich (2004-2009), WebsiteBaker Project
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function show_usermask($admin, &$aActionRequest)
	{
		global $TEXT, $MESSAGE, $HEADING, $MENU;
		$database = WbDatabase::getInstance();

    	$user_id = intval($aActionRequest['user_id']);
        $user = array(
            'user_id' => 0,
            'username'=> '',
            'display_name'=> '',
            'email'=> '',
        );

		// Get existing values
        $sql  = 'SELECT * FROM `'.TABLE_PREFIX.'users` ' ;
        $sql .= 'WHERE user_id = '.$user_id.' ';
        $sql .=   'AND user_id != 1 ';

        if($oRes = $database->query($sql)){
            $user = $oRes->fetchRow(MYSQL_ASSOC);
        }

        $sNoRightsToChangeGroups = (($admin->get_user_id()==1)) ? 'hide' : '';
        $sNoRightsToChangeGroups = (($user['group_id']==1)) ? $sNoRightsToChangeGroups : 'hide';
		// Setup template object, parse vars to it, then parse it
		// Create new template object
		$oTpl = new Template(dirname($admin->correct_theme_source('users_form.htt')),'keep');
//		$oTpl->debug = true;
		$oTpl->set_file('page', 'users_form.htt');
		$oTpl->set_block('page', 'main_block', 'main');
		$oTpl->set_block('main_block', 'show_modify_loginname_block', 'show_modify_loginname');
		$oTpl->set_block('main_block', 'show_add_loginname_block', 'show_add_loginname');
		$oTpl->set_block('main_block', 'show_change_group_list_block', 'show_change_group_list');

		if( ( !$admin->ami_group_member('1') ) )
		{
            $oTpl->set_var('CHANGING_GROUPS', 'You are not allowed to change the groups');
    		$oTpl->parse('show_change_group_list', 'show_change_group_list_block');
		} else {
    		$oTpl->parse('show_change_group_list', '');
		}

		$oTpl->set_var(	array(
    			   'ACTION_URL'   => ADMIN_URL.'/users/index.php',
    			   'SUB_ACTION'   => 'save',
                   'BACK_LINK'    => (isset($aActionRequest['BackLink'])) ? $aActionRequest['BackLink'] : '',
                   'CANCEL_URL'   => $aActionRequest['cancel_url'],
    			   'SUBMIT_TITLE' => $TEXT['SAVE'],
                   'USER_ID' => $user['user_id'],
//    			   'NO_RIGHTS' => 'hide',
//    			   'CHANGING_GROUPS' => '',
    			   'DISPLAY_EXTRA' => '',
    			   'DISPLAY_HOME_FOLDERS' => '',
    			   'USERNAME' => $user['username'],
    			   'DISPLAY_NAME' => $user['display_name'],
    			   'EMAIL' => $user['email'],
    			   'ADMIN_URL' => ADMIN_URL,
    			   'WB_URL' => WB_URL,
    			   'THEME_URL' => THEME_URL
    			   )
			);

		$oTpl->set_var('FTAN', $admin->getFTAN());
		if($user['active'] == 1) {
            $oTpl->set_var('DISABLED_CHECKED', '');
			$oTpl->set_var('ACTIVE_CHECKED', ' checked="checked"');
		} else {
            $oTpl->set_var('ACTIVE_CHECKED', '');
			$oTpl->set_var('DISABLED_CHECKED', ' checked="checked"');
		}
//		$results = $database->query("SELECT group_id, name FROM ".TABLE_PREFIX."groups WHERE group_id != '1' ORDER BY name");
		// Add groups to list
		$oTpl->set_block('main_block', 'group_list_block', 'group_list');
    	$sql  = 'SELECT `group_id`,`name` FROM `'.TABLE_PREFIX.'groups` ';
    	$sql .= 'WHERE `group_id` != 1 ORDER BY `name`';
		if($oRes = $database->query($sql)) {
			$oTpl->set_var('ID', '');
			$oTpl->set_var('NAME', $TEXT['PLEASE_SELECT'].'...');
			$oTpl->set_var('SELECTED', '');
			$oTpl->parse('group_list', 'group_list_block', true);
			while($group = $oRes->fetchRow(MYSQL_ASSOC)) {
				$oTpl->set_var('ID', $group['group_id']);
				$oTpl->set_var('NAME', $group['name']);
				if(in_array($group['group_id'], explode(",",$user['groups_id']))) {
					$oTpl->set_var('SELECTED', ' selected="selected"');
				} else {
					$oTpl->set_var('SELECTED', '');
				}
				$oTpl->parse('group_list', 'group_list_block', true);
			}
		}

//		$in_group = false;
//  || ($admin->ami_group_member('1'))
// Only allow the user to add a user to the Administrators group if they belong to it
		if( ($admin->is_group_match($user['groups_id'], '1') ) || ($admin->ami_group_member('1')) )
	    {
            if( ($in_group = ($admin->ami_group_member('1'))) == false ) {
            	$sql  = 'SELECT `name` FROM `'.TABLE_PREFIX.'groups` ';
            	$sql .= 'WHERE `group_id` = 1 ORDER BY `name`';
                if( ($sGroupName = $database->get_one($sql)) != null ) {
            		$in_group = true;
        			$oTpl->set_var('ID', '1');
        			$oTpl->set_var('NAME', $sGroupName);
                }
            } else {
                if( $in_group = ($admin->is_group_match($admin->get_groups_id(), '1')) ) {
        			$sGroupName = $admin->get_groups_name();
        			$oTpl->set_var('ID', '1');
        			$oTpl->set_var('NAME', $sGroupName[1]);
                    $in_group = $user['group_id'] == 1;
                }
            }

			if($in_group) {
				$oTpl->set_var('SELECTED', ' selected="selected"');
			} else {
				$oTpl->set_var('SELECTED', '');
			}
			$oTpl->parse('group_list', 'group_list_block', true);
		} else {
			if($oRes->numRows() == 0) {
				$oTpl->set_var('ID', '');
				$oTpl->set_var('NAME', $TEXT['NONE_FOUND']);
				$oTpl->set_var('SELECTED', ' selected="selected"');
				$oTpl->parse('group_list', 'group_list_block', true);
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
			$oTpl->set_var('DISPLAY_HOME_FOLDERS', 'display:none;');
		}

		// Include the WB functions file
        if(!function_exists('directory_list')) { require(WB_PATH.'/framework/functions.php'); }

		// Add media folders to home folder list
		$oTpl->set_block('main_block', 'folder_list_block', 'folder_list');
		foreach(directory_list(WB_PATH.MEDIA_DIRECTORY) AS $name)
	    {
			$oTpl->set_var('NAME', str_replace(WB_PATH, '', $name));
			$oTpl->set_var('FOLDER', str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name));
			if($user['home_folder'] == str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name)) {
				$oTpl->set_var('SELECTED', ' selected="selected"');
			} else {
				$oTpl->set_var('SELECTED', ' ');
			}
			$oTpl->parse('folder_list', 'folder_list_block', true);
		}

		// Insert language text and messages
		$oTpl->set_var(array(
                    'TEXT_RESET' => $TEXT['RESET'],
                    'TEXT_CANCEL' => $TEXT['CANCEL'],
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
                    'TEXT_SAVE_BACK' => $TEXT['SAVE'].' &amp; '.$TEXT['BACK'],
                    'USERNAME_FIELDNAME' => $username_fieldname,
                    'CHANGING_PASSWORD' => $MESSAGE['USERS_CHANGING_PASSWORD'],
                    'HEADING_MODIFY_USER' => $HEADING['MODIFY_USER']
                    )
                );

		// Parse template object
		$oTpl->parse('show_modify_loginname', 'show_modify_loginname_block', true);
		$oTpl->parse('show_add_loginname', '', true);
		$oTpl->parse('main', 'main_block', false);
//			$oTpl->pparse('output', 'page');
		$output = $oTpl->finish($oTpl->parse('output', 'page'));

        return $output;
    }
