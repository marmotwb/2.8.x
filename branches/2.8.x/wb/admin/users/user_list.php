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

	function show_userlist($admin, &$aActionRequest)
	{
		$database = WbDatabase::getInstance();
		$mLang = Translate::getInstance();
        $iUserStatus = 1;
        $iUserStatus = ( ( $admin->get_get('status')==1 ) ? 0 : $iUserStatus );
        unset($_GET);

        // Setup template object, parse vars to it, then parse it
        // Create new template object
        $oTpl = new Template(dirname($admin->correct_theme_source('users.htt')),'keep');
        // $oTpl->debug = true;

        $oTpl->set_file('page', 'users.htt');
        $oTpl->set_block('page', 'main_block', 'main');
        $oTpl->set_block("main_block", "manage_groups_block", "groups");

        $oTpl->set_var('ADMIN_URL', ADMIN_URL);
        $oTpl->set_var('FTAN', $admin->getFTAN());
        $oTpl->set_var('USER_STATUS', $iUserStatus );
        $oTpl->set_var('groups', '');
        $oTpl->set_var('DISPLAY_ADD', '');
        $oTpl->set_var('DISPLAY_MODIFY', '');
        $oTpl->set_var('DISABLED_CHECKED', '');
        $oTpl->set_var('HEADING_MODIFY_USER', '');
        $oTpl->set_var('DISPLAY_HOME_FOLDERS', '');

        $UserStatusActive = 'url('.THEME_URL.'/images/user.png)';
        $UserStatusInactive = 'url('.THEME_URL.'/images/user_red.png)';

        $sUserTitle = ($iUserStatus == 0) ? $mLang->MENU_USERS.' '.strtolower($mLang->TEXT_ACTIVE) : $mLang->MENU_USERS.' '.strtolower($mLang->TEXT_DELETED) ;

        $oTpl->set_var('TEXT_USERS', $sUserTitle.' '.$mLang->TEXT_SHOW );
        $oTpl->set_var('STATUS_ICON', ( ($iUserStatus==0) ? $UserStatusActive : $UserStatusInactive) );

        // Get existing value from database
        $sql  = 'SELECT `user_id`, `username`, `display_name`, `active` FROM `'.TABLE_PREFIX.'users` ' ;
        $sql .= 'WHERE user_id != 1 ';
        $sql .=     'AND `active` = '.$iUserStatus.' ';
        $sql .=     'AND `confirm_code` = \'\' ';
        $sql .= 'ORDER BY `display_name`,`username`';

//        $query = "SELECT user_id, username, display_name, active FROM ".TABLE_PREFIX."users WHERE user_id != '1' ORDER BY display_name,username";
        $oRes = $database->query($sql);
        if($database->is_error()) {
        	$admin->print_error($database->get_error(), 'index.php');
        }

        $sUserList  = $mLang->TEXT_LIST_OPTIONS.' ';
        $sUserList .= ($iUserStatus == 1) ? $mLang->MENU_USERS.' '.strtolower($mLang->TEXT_ACTIVE) : $mLang->MENU_USERS.' '.strtolower($mLang->TEXT_DELETED) ;
        // Insert values into the modify/remove menu
        $oTpl->set_block('main_block', 'list_block', 'list');
        if($oRes->numRows() > 0) {
        	// Insert first value to say please select
        	$oTpl->set_var('VALUE', '');
        	$oTpl->set_var('NAME', $sUserList);
        	$oTpl->set_var('STATUS', 'class="user-active"' );
        	$oTpl->parse('list', 'list_block', true);
        	// Loop through users
        	while($user = $oRes->fetchRow(MYSQL_ASSOC)) {
        		$oTpl->set_var('VALUE',$admin->getIDKEY($user['user_id']));
        		$oTpl->set_var('STATUS', ($user['active']==false ? 'class="user-inactive"' : 'class="user-active"') );
        		$oTpl->set_var('NAME', $user['display_name'].' ('.$user['username'].')');
        		$oTpl->parse('list', 'list_block', true);
        	}
        } else {
        	// Insert single value to say no users were found
        	$oTpl->set_var('NAME', $mLang->TEXT_NONE_FOUND);
        	$oTpl->parse('list', 'list_block', true);
        }

        // Insert permissions values
        if($admin->get_permission('users_add') != true) {
        	$oTpl->set_var('DISPLAY_ADD', 'hide');
        }
        if($admin->get_permission('users_modify') != true) {
        	$oTpl->set_var('DISPLAY_MODIFY', 'hide');
        }
        if($admin->get_permission('users_delete') != true) {
        	$oTpl->set_var('DISPLAY_DELETE', 'hide');
        }
        $HeaderTitle  = (($iUserStatus == 1) ? $mLang->HEADING_MODIFY_ACTIVE_USER : $mLang->HEADING_MODIFY_DELETE_USER ).' ';
        $HeaderTitle .= (($iUserStatus == 1) ? strtolower($mLang->TEXT_ACTIVE) : strtolower($mLang->TEXT_INACTIVE));
        // Insert language headings
        $oTpl->set_var(array(
        		'HEADING_MODIFY_DELETE_USER' => $HeaderTitle,
        		'HEADING_ADD_USER' => $mLang->HEADING_ADD_USER
        		)
        );
        // insert urls
        $oTpl->set_var(array(
                'ADMIN_URL' => ADMIN_URL,
                'WB_URL' => WB_URL,
                'THEME_URL' => THEME_URL
        		)
        );
        // Insert language text and messages
        $oTpl->set_var(array(
        		'DISPLAY_WAITING_ACTIVATION' => '',
        		'TEXT_MODIFY' => $mLang->TEXT_MODIFY,
        		'TEXT_DELETE' => $mLang->TEXT_DELETE,
        		'TEXT_USER_DELETE' => (($iUserStatus == 1) ? $mLang->TEXT_DEACTIVE : $mLang->TEXT_DELETE),
        		'TEXT_MANAGE_GROUPS' => ( $admin->get_permission('groups') == true ) ? $mLang->TEXT_MANAGE_GROUPS : "**",
        		'CONFIRM_DELETE' => (($iUserStatus == 1) ? $mLang->TEXT_ARE_YOU_SURE : $mLang->MESSAGE_USERS_CONFIRM_DELETE)
        		)
        );

        $oTpl->set_block('main_block', 'show_confirmed_activation_block', 'show_confirmed_activation');
        if($admin->ami_group_member('1')) {
                $oTpl->set_block('show_confirmed_activation_block', 'list_confirmed_activation_block', 'list_confirmed_activation');
            	$oTpl->set_var('DISPLAY_WAITING_ACTIVATION', $mLang->MESSAGE_USERS_WAITING_ACTIVATION);
        		$sql  = 'SELECT * FROM `'.TABLE_PREFIX.'users` ';
        		$sql .= 'WHERE `confirm_timeout` != 0 ';
                $sql .=   'AND `active` = 0 ';
                $sql .=   'AND `user_id` != 1 ';
                if( ($oRes = $database->query($sql)) ) {
                	$oTpl->set_var('DISPLAY_DELETE', '');
        //        	$oTpl->set_var('NAME', 'User waiting for activation');
        //        	$oTpl->set_var('STATUS', '' );
                	// Loop through users
                    if($nNumRows = $oRes->numRows()) {
                    	while($aUser = $oRes->fetchRow(MYSQL_ASSOC)) {
                    		$oTpl->set_var('CVALUE',$admin->getIDKEY($aUser['user_id']));
                       		$oTpl->set_var('CSTATUS', '') ;
                    		$oTpl->set_var('CNAME', $aUser['display_name'].' ('.$aUser['username'].')'.' ['.$aUser['email'].']');
                    		$oTpl->parse('list_confirmed_activation', 'list_confirmed_activation_block', true);
                    	}
                    	$oTpl->parse('show_confirmed_activation', 'show_confirmed_activation_block',true);
                    }
                } else { $nNumRows = 0; }

        } else {
            $nNumRows = 0;
        }

        if ( $nNumRows == 0){
        	$oTpl->parse('show_confirmed_activation', '');
        }

        if ( $admin->get_permission('groups') == true ) $oTpl->parse("groups", "manage_groups_block", true);
        // Parse template object
        $oTpl->parse('main', 'main_block', false);

		$output = $oTpl->finish($oTpl->parse('output', 'page'));
        // Setup template object, parse vars to it, then parse it
        // Create new template object
        $oTpl = new Template(dirname($admin->correct_theme_source('users_form.htt')),'keep');
        // $oTpl->debug = true;
        $oTpl->set_file('page', 'users_form.htt');
        $oTpl->set_block('page', 'main_block', 'main');
        $oTpl->set_block('main_block', 'show_modify_loginname_block', 'show_modify_loginname');

        $oTpl->set_block('main_block', 'show_add_loginname_block', 'show_add_loginname');
		$oTpl->set_block('main_block', 'show_change_group_list_block', 'show_change_group_list');

		$oTpl->parse('show_change_group_list', '');
//		$oTpl->parse('show_change_group_list', 'show_change_group_list_block', true);

		$oTpl->set_var(	array(
    			   'ACTION_URL'   => ADMIN_URL.'/users/index.php',
    			   'FTAN'   => $admin->getFTAN(),
    			   'DISPLAY_EXTRA'   => 'display:none;',
    			   'ACTIVE_CHECKED'   => ' checked="checked"',
    			   'DISABLED_CHECKED'   => '',
    			   'NO_RIGHTS' => 'hide',
    			   'CHANGING_GROUPS' => '',
    			   'DISPLAY_ADD' => '',
    			   'DISPLAY_MODIFY' => '',
    			   'HEADING_MODIFY_USER' => '',
    			   'DISPLAY_HOME_FOLDERS' => '',
    			   'SUBMIT_TITLE' => $mLang->TEXT_ADD,
                   'HIDE_SAVE_BACK' => 'hide',
    			   )
			);


        // insert urls
        $oTpl->set_var(array(
        		'USER_ID' => '',
        		'USERNAME' => '',
        		'DISPLAY_NAME' => '',
        		'EMAIL' => '',
        		'ADMIN_URL' => ADMIN_URL,
        		'WB_URL' => WB_URL,
                'SUB_ACTION' => 'add',
                'CANCEL_URL' => $aActionRequest['cancel_url'],
        		'THEME_URL' => THEME_URL
        		)
        );

        // Add groups to list
        $oTpl->set_block('main_block', 'group_list_block', 'group_list');
        $results = $database->query("SELECT group_id, name FROM ".TABLE_PREFIX."groups WHERE group_id != '1'");
        if($results->numRows() > 0) {
        	$oTpl->set_var('ID', '');
        	$oTpl->set_var('NAME', $mLang->TEXT_PLEASE_SELECT.'...');
        	$oTpl->set_var('SELECTED', ' selected="selected"');
        	$oTpl->parse('group_list', 'group_list_block', true);
        	while($group = $results->fetchRow()) {
        		$oTpl->set_var('ID', $group['group_id']);
        		$oTpl->set_var('NAME', $group['name']);
        		$oTpl->set_var('SELECTED', '');
        		$oTpl->parse('group_list', 'group_list_block', true);
        	}
        }
        // Only allow the user to add a user to the Administrators group if they belong to it
        if(in_array(1, $admin->get_groups_id())) {
        	$users_groups = $admin->get_groups_name();
        	$oTpl->set_var('ID', '1');
        	$oTpl->set_var('NAME', $users_groups[1]);
        	$oTpl->set_var('SELECTED', '');
        	$oTpl->parse('group_list', 'group_list_block', true);
        } else {
        	if($results->numRows() == 0) {
        		$oTpl->set_var('ID', '');
        		$oTpl->set_var('NAME', $mLang->TEXT_NONE_FOUND);
        		$oTpl->parse('group_list', 'group_list_block', true);
        	}
        }

        // Insert permissions values
        if($admin->get_permission('users_add') != true) {
        	$oTpl->set_var('DISPLAY_ADD', 'hide');
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
        foreach(directory_list(WB_PATH.MEDIA_DIRECTORY) AS $name) {
        	$oTpl->set_var('NAME', str_replace(WB_PATH, '', $name));
        	$oTpl->set_var('FOLDER', str_replace(WB_PATH.MEDIA_DIRECTORY, '', $name));
        	$oTpl->set_var('SELECTED', ' ');
        	$oTpl->parse('folder_list', 'folder_list_block', true);
        }

        // Insert language text and messages
        $oTpl->set_var(array(
        			'TEXT_CANCEL' => $mLang->TEXT_CANCEL,
        			'TEXT_RESET' => $mLang->TEXT_RESET,
        			'TEXT_ACTIVE' => $mLang->TEXT_ACTIVE,
        			'TEXT_DISABLED' => $mLang->TEXT_DISABLED,
        			'TEXT_PLEASE_SELECT' => $mLang->TEXT_PLEASE_SELECT,
        			'TEXT_USERNAME' => $mLang->TEXT_USERNAME,
        			'TEXT_PASSWORD' => $mLang->TEXT_PASSWORD,
        			'TEXT_RETYPE_PASSWORD' => $mLang->TEXT_RETYPE_PASSWORD,
        			'TEXT_DISPLAY_NAME' => $mLang->TEXT_DISPLAY_NAME,
        			'TEXT_EMAIL' => $mLang->TEXT_EMAIL,
        			'TEXT_GROUP' => $mLang->TEXT_GROUP,
        			'TEXT_NONE' => $mLang->TEXT_NONE,
        			'TEXT_HOME_FOLDER' => $mLang->TEXT_HOME_FOLDER,
        			'USERNAME_FIELDNAME' => $username_fieldname,
        			'CHANGING_PASSWORD' => $mLang->MESSAGE_USERS_CHANGING_PASSWORD
        			)
        	);

        // Parse template for add user form
        $oTpl->parse('show_modify_loginname', '', true);
        $oTpl->parse('show_add_loginname', 'show_add_loginname_block', true);
        $oTpl->parse('main', 'main_block', false);
		$output .= $oTpl->finish($oTpl->parse('output', 'page'));

        return $output;

    }
