<?php
/**
 *
 * @category        admin
 * @package         users
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

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_URL')) {
	require_once(dirname(dirname(dirname(__FILE__))).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

	function add_user($admin, &$aActionRequest)
	{
		global $MESSAGE,$TEXT, $HEADING;
		$database = WbDatabase::getInstance();
        $bRetVal = false;
        $iMinPassLength = 6;

        if( !$admin->checkFTAN() )
        {
//        	$admin->print_header();
        	msgQueue::add($MESSAGE['GENERIC_SECURITY_ACCESS']);
            return $bRetVal;
        }

        // Get details entered
        $groups_id = (isset($aActionRequest['groups'])) ? implode(",", $admin->add_slashes($aActionRequest['groups'])) : '';
        $groups_id = trim($groups_id, ','); // there will be an additional ',' when "Please Choose" was selected, too
        $active = intval(strip_tags($admin->StripCodeFromText($aActionRequest['active'][0])));
        $username_fieldname = strip_tags($admin->StripCodeFromText($aActionRequest['username_fieldname']));
        $username = strtolower(strip_tags($admin->StripCodeFromText($aActionRequest[$username_fieldname])));
        $password = strip_tags($admin->StripCodeFromText($aActionRequest['password']));
        $password2 = strip_tags($admin->StripCodeFromText($aActionRequest['password2']));
        $display_name = strip_tags($admin->StripCodeFromText($aActionRequest['display_name']));
        $email = strip_tags($admin->StripCodeFromText($aActionRequest['email']));
        $home_folder = strip_tags($admin->StripCodeFromText($aActionRequest['home_folder']));

        $language = DEFAULT_LANGUAGE;
        $timezone = -72000;
        $date_format = DEFAULT_DATE_FORMAT;
        $time_format = DEFAULT_TIME_FORMAT;
        $confirm_code = '';
        $confirm_timeout = 0;
        $remember_key = '';
        $login_ip = '';
        $last_reset = 0;
        $login_when = 0;

        // Check values
        // Check values
        if($groups_id == "") {
        	msgQueue::add($MESSAGE['USERS_NO_GROUP']);
        } else {
            $aGroups_id = explode(',', $groups_id);
            //if user is in administrator-group, get this group else just get the first one
            if($admin->is_group_match($groups_id,'1')) { $group_id = 1; } else { $group_id = intval($aGroups_id[0]); }
        }

        if(!preg_match('/^[a-z]{1}[a-z0-9_-]{2,}$/i', $username)) {
        	msgQueue::add( $MESSAGE['USERS_NAME_INVALID_CHARS']);
        }

		$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` '.
                'WHERE `username` LIKE \''.$username.'\' ';
        // Check if username already exists
        if( ($iFoundUser = $database->get_one($sql)) != null ) {
            if($iFoundUser) {
            	msgQueue::add($MESSAGE['USERS_USERNAME_TAKEN']);
            }
        }

    	if(strlen($password) < $iMinPassLength ) {
    		msgQueue::add($MESSAGE['USERS_PASSWORD_TOO_SHORT']);
    	}

		$pattern = '/[^'.$admin->password_chars.']/';
		if (preg_match($pattern, $password)) {
			msgQueue::add($MESSAGE['PREFERENCES_INVALID_CHARS']);
    	}

    	if(($password != $password2) ) {
    		msgQueue::add($MESSAGE['USERS_PASSWORD_MISMATCH']);
    	}

//
// check that display_name is unique in whoole system (prevents from User-faking)
    	$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` ';
    	$sql .= 'WHERE `user_id` <> '.(int)$admin->get_user_id().' AND `display_name` LIKE "'.$display_name.'"';
    	if( ($iFoundUser = intval($database->get_one($sql))) > 0 ){
    	   msgQueue::add($MESSAGE['USERS_USERNAME_TAKEN'].' ('.$TEXT['DISPLAY_NAME'].')');
        } else {
            if($display_name == '') {
        	   msgQueue::add($MESSAGE['GENERIC_FILL_IN_ALL'].' ('.$TEXT['DISPLAY_NAME'].')');
            }
       }

        if(findStringInFileList($display_name, dirname(__FILE__).'/disallowedNames')) {
            msgQueue::add( $TEXT['ERROR'].' '.$TEXT['DISPLAY_NAME'].' ('.$display_name.')' );
        }

        if($email != "")
        {
        	if($admin->validate_email($email) == false)
            {
                msgQueue::add($MESSAGE['USERS_INVALID_EMAIL'].' ('.$email.')');
        	}
        } else { // e-mail must be present
        	msgQueue::add($MESSAGE['SIGNUP_NO_EMAIL']);
        }

		$sql  = 'SELECT COUNT(*) FROM `'.TABLE_PREFIX.'users` '.
                'WHERE `email` LIKE \''.$email.'\' ';

        // Check if the email already exists
        if( ($iFoundUser = $database->get_one($sql)) != null ) {
            if($iFoundUser) {
            	if(isset($MESSAGE['USERS_EMAIL_TAKEN']))
                {
            		msgQueue::add($MESSAGE['USERS_EMAIL_TAKEN'].' ('.$email.')');
            	} else {
            		msgQueue::add($MESSAGE['USERS_INVALID_EMAIL'].' ('.$email.')');
            	}
            }
        }

		if( ($msg = msgQueue::getError()) == '')
		{
            //if user is in administrator-group, get this group else just get the first one
            if($admin->is_group_match($groups_id,'1')) { $group_id = 1; $groups_id = '1'; }

            if(defined('HOME_FOLDERS') && HOME_FOLDERS) {
                // Include the WB functions file
                if(!function_exists('media_filename')) { require(WB_PATH.'/framework/functions.php'); }

                // Remove bad characters
                $sHomeFolder = WB_PATH.MEDIA_DIRECTORY.'/home/'.( media_filename($username) );
                if ( sizeof(createFolderProtectFile( $sHomeFolder )) )
                {
                	msgQueue::add($MESSAGE['MEDIA_DIR_NOT_MADE'].' ('.basename($sHomeFolder).') ' );
                }
            }
            // Inser the user into the database
			$sql  = 'INSERT INTO `'.TABLE_PREFIX.'users` SET '.
                    '`group_id`     = '.intval($group_id).', '.
                    '`groups_id`    = \''.$database->escapeString($groups_id).'\', '.
                    '`active`       = '.intval($active).', '.
                    '`username`     = \''.$database->escapeString($username).'\', '.
                    '`password`     = \''.md5($password).'\', '.
                    '`confirm_code` = \''.$database->escapeString($confirm_code).'\', '.
                    '`confirm_timeout` = '.intval($confirm_timeout).', '.
                    '`remember_key` = \''.$database->escapeString($remember_key).'\', '.
                    '`last_reset`   = '.intval($last_reset).', '.
                    '`display_name` = \''.$database->escapeString($display_name).'\', '.
                    '`email`        = \''.$database->escapeString($email).'\', '.
                    '`timezone`     = '.intval($timezone).', '.
                    '`date_format`  = \''.$database->escapeString($date_format).'\', '.
                    '`time_format`  = \''.$database->escapeString($time_format).'\', '.
                    '`language`     = \''.$database->escapeString($language).'\', '.
                    '`home_folder`  = \''.$database->escapeString($home_folder).'\', '.
                    '`login_when`   = '.intval($login_when).', '.
                    '`login_ip`     = \''.$database->escapeString($login_ip).'\' '.
                    '';
            if($database->query($sql)) {
            	msgQueue::add($MESSAGE['USERS_ADDED'], true);
		        $bRetVal = true;
            }
            if($database->is_error()) {
                msgQueue::add( implode('<br />',explode(';',$database->get_error())) );
            }
        } else {
        	msgQueue::add($HEADING['ADD_USER'].' '.$MESSAGE['GENERIC_NOT_COMPARE']);

		}
		return $bRetVal;
   }
