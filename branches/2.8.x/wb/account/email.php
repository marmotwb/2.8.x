<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
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
if(!defined('WB_PATH')) {
	require_once(dirname(dirname(__FILE__)).'/framework/globalExceptionHandler.php');
	throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// Get entered values
	$password = $wb->StripCodeFromText($wb->get_post('current_password'));
	$email = strip_tags($wb->StripCodeFromText($wb->get_post('email')));
// validate password
	$sql  = "SELECT `user_id` FROM `".TABLE_PREFIX."users` ";
	$sql .= "WHERE `user_id` = ".(int)$wb->get_user_id()." AND `password` = '".md5($password)."'";
	$rowset = $database->query($sql);
// Validate values
	if($rowset->numRows() == 0) {
		$error[] = $MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'];
	} else {
        $sSessionEmail = $wb->get_session('EMAIL');
    	if($sSessionEmail != "") {
    		// Check if the email already exists
    		$sql  = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `email` = \''.$email.'\' ';
            $sql .= 'AND `email` != \''.$sSessionEmail. '\' ';
    		if($database->get_one($sql)){
    			$error[] = ($MESSAGE['USERS_EMAIL_TAKEN']);
    		} else {
    			if(!$wb->validate_email($email)){
    				$error[] = ($MESSAGE['USERS_INVALID_EMAIL']);
    			} else {
        			$email = mysql_escape_string($email);
                    // Update the database
        			$sql = "UPDATE `".TABLE_PREFIX."users` SET `email` = '".$email."' WHERE `user_id` = ".$wb->get_user_id();
        			$database->query($sql);
        			if($database->is_error()) {
        				$error[] = $database->get_error();
        			} else {
        				$success[] = $MESSAGE['PREFERENCES_EMAIL_UPDATED'];
        				$_SESSION['EMAIL'] = $email;
        			}
        		}

    		}
    	} else {
    		$error[] = ($MESSAGE['SIGNUP_NO_EMAIL']);
    	}

	}
