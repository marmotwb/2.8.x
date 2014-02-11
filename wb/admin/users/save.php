<?php
/**
 *
 * @category        admin
 * @package         users
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function save_user($admin, $aActionRequest)
	{
        // Create a javascript back link
//        $js_back = ADMIN_URL.'/users/index.php';
        unset($aActionRequest['save']);

        $aActionRequest['modify']= 'change';
		$oDb = WbDatabase::getInstance();
		$oTrans = Translate::getInstance();
        $oTrans->enableAddon('admin\\users');
        $bRetVal = 0;
    	$iMinPassLength = 6;

        if( !$admin->checkFTAN() )
        {
        	msgQueue::add($oTrans->MESSAGE_GENERIC_SECURITY_ACCESS);
            return $bRetVal;
        }

        // Check if user id is a valid number and doesnt equal 1
        if(!isset($aActionRequest['user_id']) OR !is_numeric($aActionRequest['user_id']) OR $aActionRequest['user_id'] == 1) {
        	msgQueue::add('::'.$oTrans->MESSAGE_GENERIC_NOT_UPGRADED);
            return $bRetVal;
        } else {
        	$user_id = intval($aActionRequest['user_id']);
        }

		if( ($user_id < 2 ) )
		{
			// if($admin_header) { $admin->print_header(); }
        	msgQueue::add($oTrans->MESSAGE_GENERIC_SECURITY_OFFENSE);
            return $bRetVal;
		}
		// Get existing values
        $sql = 'SELECT * FROM `'.$oDb->TablePrefix.'users` '
             . 'WHERE `user_id`='.$user_id.' '
             . 'AND `user_id` != 1';
        if(($oRes = $oDb->doQuery($sql))) {
            $olduser = $oRes->fetchRow(MYSQL_ASSOC);
        }

        // Gather details entered
        if($admin->is_group_match($admin->get_groups_id(), '1' )){
            $groups_id = (isset($aActionRequest['groups'])) ? implode(",", $admin->add_slashes($aActionRequest['groups'])) : '';
        } else {
            $groups_id = $olduser['group_id'];
        }
        // there will be an additional ',' when "Please Choose" was selected, too
        $groups_id = trim($groups_id, ',');
        $active = intval(strip_tags($admin->StripCodeFromText($aActionRequest['active'][0])));
        $username_fieldname = strip_tags($admin->StripCodeFromText($aActionRequest['username_fieldname']));
        $username = strtolower(strip_tags($admin->StripCodeFromText($aActionRequest[$username_fieldname])));
        $password = strip_tags($admin->StripCodeFromText($aActionRequest['password']));
        $password2 = strip_tags($admin->StripCodeFromText($aActionRequest['password2']));
        $display_name = strip_tags($admin->StripCodeFromText($aActionRequest['display_name']));
        $email = strip_tags($admin->StripCodeFromText($aActionRequest['email']));
        $home_folder = strip_tags($admin->StripCodeFromText($aActionRequest['home_folder']));

        // Check values
        if($groups_id == "") {
        	msgQueue::add($oTrans->MESSAGE_USERS_NO_GROUP);
        } else {
            $aGroups_id = explode(',', $groups_id);
            //if user is in administrator-group, get this group else just get the first one
            if($admin->is_group_match($groups_id,'1')) { $group_id = 1; } else { $group_id = intval($aGroups_id[0]); }
        }

//$admin->is_group_match($admin->get_groups_id(), '1' )
        if(!preg_match('/^[a-z]{1}[a-z0-9_-]{2,}$/i', $username))
        {
        	msgQueue::add( $oTrans->MESSAGE_USERS_NAME_INVALID_CHARS);
        }

        if($password != "") {
        	if(strlen($password) < $iMinPassLength ) {
        		msgQueue::add($oTrans->MESSAGE['USERS_PASSWORD_TOO_SHORT']);
        	}

			$pattern = '/[^'.$admin->password_chars.']/';
			if (preg_match($pattern, $password)) {
				msgQueue::add($oTrans->MESSAGE_PREFERENCES_INVALID_CHARS);
        	}

        	if(($password != $password2) ) {
        		msgQueue::add($oTrans->MESSAGE_USERS_PASSWORD_MISMATCH);
        	}
        }
// check that display_name is unique in whoole system (prevents from User-faking)
    	$sql  = 'SELECT COUNT(*) FROM `'.$oDb->TablePrefix.'users` ';
    	$sql .= 'WHERE `user_id` <> '.(int)$user_id.' AND `display_name` LIKE "'.$display_name.'"';
    	if( $oDb->getOne($sql) > 0 ){
            msgQueue::add($oTrans->MESSAGE_USERS_USERNAME_TAKEN.' ('.$oTrans->TEXT_DISPLAY_NAME.')');
            msgQueue::add($oTrans->MESSAGE_MEDIA_CANNOT_RENAME);
        }
//
		if( ($admin->get_user_id() != '1' ) )
		{
            if(findStringInFileList($display_name, dirname(__FILE__).'/disallowedNames')) {
                msgQueue::add( $oTrans->TEXT_ERROR.' '.$oTrans->TEXT_DISPLAY_NAME.' ('.$display_name.')' );
            }
		}

    	$display_name = ( $display_name == '' ? $olduser['display_name'] : $display_name );

        if($email != "")
        {
        	if($admin->validate_email($email) == false)
            {
                msgQueue::add($oTrans->MESSAGE_USERS_INVALID_EMAIL.' ('.$email.')');
        	}
        } else { // e-mail must be present
        	msgQueue::add($oTrans->MESSAGE_SIGNUP_NO_EMAIL);
        }

		$sql  = 'SELECT COUNT(*) FROM `'.$oDb->TablePrefix.'users` '.
                'WHERE `email` LIKE \''.$email.'\' '.
                  'AND `user_id` <> '.(int)$user_id;
        // Check if the email already exists
        if( ($iFoundUser = $oDb->getOne($sql)) != null ) {
            if($iFoundUser) {
            	if(isset($oTrans->MESSAGE_USERS_EMAIL_TAKEN))
                {
            		msgQueue::add($oTrans->MESSAGE_USERS_EMAIL_TAKEN.' ('.$email.')');
            	} else {
            		msgQueue::add($oTrans->MESSAGE_USERS_INVALID_EMAIL.' ('.$email.')');
            	}
            }
        }

        $bRetVal = $user_id;

// no error then save
        if( !msgQueue::getError() )
        {
            if($admin->is_group_match($groups_id,'1')) { $group_id = 1; $groups_id = '1'; }
          // Prevent from renaming user to "admin"
            if($username != 'admin') {
            	$username_code = ", username = '$username'";
            } else {
            	$username_code = '';
            }

            if(defined('HOME_FOLDERS') && HOME_FOLDERS) {

                // Include the WB functions file
                if(!function_exists('media_filename')) { require(WB_PATH.'/framework/functions.php'); }

                // Remove bad characters
                $sHomeFolder = WB_PATH.MEDIA_DIRECTORY.'/home/'.( media_filename($username) );
                if ( sizeof(createFolderProtectFile( $sHomeFolder )) )
                {
    //            	msgQueue::add($oTrans->MESSAGE_MEDIA_DIR_NOT_MADE);
                }
            }

			$sql  = 'UPDATE `'.$oDb->TablePrefix.'users` SET ';
            // Update the database
            if($password == "") {
                $sql .= '`group_id` = '.intval($group_id).', '.
                        '`groups_id` = \''.$oDb->escapeString($groups_id).'\', '.
                        '`username` = \''.$oDb->escapeString($username).'\', '.
                        '`active` = '.intval($active).', '.
                        '`display_name` = \''.$oDb->escapeString($display_name).'\', '.
                        '`home_folder` = \''.$oDb->escapeString($home_folder).'\', '.
                        '`email` = \''.$oDb->escapeString($email).'\' '.
                        'WHERE `user_id` = '.intval($user_id).'';

            } else {

                $sql .= '`group_id` = '.intval($group_id).', '.
                        '`groups_id` = \''.$oDb->escapeString($groups_id).'\', '.
                        '`username` = \''.$oDb->escapeString($username).'\', '.
                        '`password` = \''.md5($password).'\', '.
                        '`active` = '.intval($active).', '.
                        '`display_name` = \''.$oDb->escapeString($display_name).'\', '.
                        '`home_folder` = \''.$oDb->escapeString($home_folder).'\', '.
                        '`email` = \''.$oDb->escapeString($email).'\' '.
                        'WHERE `user_id` = '.intval($user_id).'';

            }
            if($oDb->doQuery($sql)) {
            	msgQueue::add($oTrans->MESSAGE_USERS_SAVED, true);
                $bRetVal = $user_id;
            }
            if($oDb->isError()) {
               msgQueue::add( implode('<br />',explode(';',$oDb->getError())) );
            }
       } else {
            	msgQueue::add($oTrans->MESSAGE_GENERIC_NOT_UPGRADED);
       }

//        return $admin->getIDKEY($user_id);
//if($admin_header) { $admin->print_header(); }
        return $bRetVal;
    }
