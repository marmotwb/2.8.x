<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
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
$bDebugSignup = false;
if (!function_exists('ObfuscateIp')) {
	function ObfuscateIp() {
	    $sClientIp = (isset($_SERVER['REMOTE_ADDR']))
	                         ? $_SERVER['REMOTE_ADDR'] : '000.000.000.000';
//	    $iClientIp = ip2long($sClientIp);
//	    $sClientIp = long2ip(($iClientIp & ~65535));
	    return $sClientIp;
	}
}

if (!function_exists('emailAdmin')) {
	function emailAdmin() {
		global $database,$admin;
        $retval = false;
		$sql  = 'SELECT `email` FROM `'.TABLE_PREFIX.'users` ';
		$sql .= 'WHERE `user_id`=\'1\' ';
        if(!($retval = $database->get_one($sql))){
            $retval = false;
        }
		return $retval;
	}
}

if (!function_exists('deleteOutdatedConfirmations')) {
	function deleteOutdatedConfirmations() {
		$sql = 'DELETE FROM `'.TABLE_PREFIX.'users` WHERE `confirm_timeout` BETWEEN 1 AND '.time();
		WbDatabase::getInstance()->query($sql);
	}
}

if (!function_exists('checkPassWordConfirmCode')) {
	function checkPassWordConfirmCode( $sPassword, $sConfirmCode ) {
		if( preg_match('/[0-9a-f]{32}/i', $sConfirmCode) ) {
			$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` '
			     . 'WHERE `password`=\''.md5($sPassword).'\' '
			     .       'AND `confirm_code`=\''.$sConfirmCode.'\'';
			if( WbDatabase::getInstance()->get_one($sql)) {
				return true;
			}
		}
		return false;
	}
}

//if(isset($_POST['action']) && $_POST['action']=='send')
if($wb->StripCodeFromText($wb->get_post('action'))=='send')
{
	$database = WbDatabase::getInstance();

// add new fields in users
	$table_name = TABLE_PREFIX.'users';
	$field_name = 'confirm_code';
	$description = "VARCHAR( 32 ) NOT NULL DEFAULT '' AFTER `password`";
	if(!$database->field_exists($table_name,$field_name)) {
		$database->field_add($table_name, $field_name, $description);
	}
	if($database->set_error()){
		msgQueue::add($database->get_error());
	}

	$field_name = 'confirm_timeout';
	$description = "INT NOT NULL DEFAULT '0' AFTER `confirm_code`";
	if(!$database->field_exists($table_name,$field_name)) {
		$database->field_add($table_name, $field_name, $description);
	}
	if($database->set_error()){
		msgQueue::add($database->get_error());
	}

	$_SESSION['USERNAME'] = strtolower($wb->StripCodeFromText($wb->get_post('login_name')));
	$_SESSION['DISPLAY_NAME'] = strip_tags($wb->StripCodeFromText($wb->get_post('display_name')));
	$_SESSION['EMAIL'] = strip_tags($wb->StripCodeFromText($wb->get_post('email')));
	$_SESSION['LANGUAGE'] = strip_tags($wb->StripCodeFromText($wb->get_post('language')));
//	$aErrorMsg = array();

	if($wb->get_session('USERNAME') != "") {
		// Check if username already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `username` = \''.$_SESSION['USERNAME'].'\'';
		if($database->get_one($sql)){
//			$aErrorMsg[] = $MESSAGE['USERS_USERNAME_TAKEN'];
			msgQueue::add($MESSAGE['USERS_USERNAME_TAKEN']);
			$_SESSION['USERNAME'] = '';
		} else {
			if(preg_match('/^[a-z]{1}[a-z0-9_-]{3,}$/i', $_SESSION['USERNAME'])==false) {
//				$aErrorMsg[] = $MESSAGE['USERS_NAME_INVALID_CHARS'];
				msgQueue::add($MESSAGE['USERS_NAME_INVALID_CHARS']);
				$_SESSION['USERNAME'] = '';
		 	}
		}
	} else {
//		$aErrorMsg[] = $MESSAGE['LOGIN_USERNAME_BLANK'];
		msgQueue::add($MESSAGE['LOGIN_USERNAME_BLANK']);
	}

	if($wb->get_session('EMAIL') != "") {
		// Check if the email already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `email` = \''.$_SESSION['EMAIL'].'\'';
		if($database->get_one($sql)){
			msgQueue::add($MESSAGE['USERS_EMAIL_TAKEN']);
			$_SESSION['EMAIL'] = '';
		} else {
			if(!$wb->validate_email($_SESSION['EMAIL'])){
				msgQueue::add($MESSAGE['USERS_INVALID_EMAIL']);
				$_SESSION['EMAIL'] = '';
			}
		}
	} else {
		msgQueue::add($MESSAGE['SIGNUP_NO_EMAIL']);
	}

	if($wb->get_session('DISPLAY_NAME') == "") {
//		$aErrorMsg[] = $MESSAGE['GENERIC_FILL_IN_ALL'];
		msgQueue::add($MESSAGE['GENERIC_FILL_IN_ALL'].' ('.$TEXT['DISPLAY_NAME'].')');
	}

	if(CONFIRMED_REGISTRATION) {
		$iMinPassLength = 6;
// receive password vars and calculate needed action
//		$sNewPassword = $wb->get_post('new_password_1');
    	$sNewPassword = ($wb->StripCodeFromText($wb->get_post('new_password_1')));
		$sNewPassword = (is_null($sNewPassword) ? '' : $sNewPassword);
//		$sNewPasswordRetyped = $wb->get_post('new_password_2');
    	$sNewPasswordRetyped = ($wb->StripCodeFromText($wb->get_post('new_password_2')));
		$sNewPasswordRetyped= (is_null($sNewPasswordRetyped) ? '' : $sNewPasswordRetyped);
// validate new password
		$sPwHashNew = false;
		if($sNewPassword != '') {
			if(strlen($sNewPassword) < $iMinPassLength) {
				msgQueue::add($MESSAGE['USERS_PASSWORD_TOO_SHORT']);
			} else {
				if($sNewPassword != $sNewPasswordRetyped) {
					msgQueue::add($MESSAGE['USERS_PASSWORD_MISMATCH']);
				} else {
					$pattern = '/[^'.$wb->password_chars.']/';
					if (preg_match($pattern, $sNewPassword)) {
						msgQueue::add($MESSAGE['PREFERENCES_INVALID_CHARS']);
					}else {
						$sPwHashNew = md5($sNewPassword);
					}
				}
			}
		} else {
			msgQueue::add($MESSAGE['LOGIN_PASSWORD_BLANK']);
		}

	} else {
		// Captcha
		if(ENABLED_CAPTCHA) {
//			if(isset($_POST['captcha']) AND $_POST['captcha'] != '')
			if($wb->StripCodeFromText($wb->get_post('captcha')) != '')
			{
				// Check for a mismatch get email user_id
				if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
					$replace = array('webmaster_email' => emailAdmin() );
	//				$aErrorMsg[] = replace_vars($MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'], $replace);
					msgQueue::add(replace_vars($MESSAGE['INCORRECT_CAPTCHA'], $replace));
				}
			} else {
				$replace = array('webmaster_email'=> emailAdmin() );
	//			$aErrorMsg[] = replace_vars($MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'],$replace );
				msgQueue::add(replace_vars($MESSAGE['INCORRECT_CAPTCHA'],$replace ));
			}
		}
		if(isset($_SESSION['captcha'])) { unset($_SESSION['captcha']); }

		$sNewPassword = '';
		$salt = "abchefghjkmnpqrstuvwxyz0123456789";
		srand((double)microtime()*1000000);
		$i = 0;
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($salt, $num, 1);
			$sNewPassword = $sNewPassword . $tmp;
			$i++;
		}
		$sPwHashNew = md5($sNewPassword);
	}

	if( ($msg = msgQueue::getError()) != '') {
// back to signup_form to show errors, otherwise save user and send mail
	} else {
		$get_ip = ObfuscateIp();
		$get_ts = time();
		$sLoginName = $_SESSION['USERNAME'];
//		$sDisplayName = $_SESSION['DISPLAY_NAME'];
		$sDisplayName = $wb->add_slashes($_SESSION['DISPLAY_NAME']);
		$groups_id = FRONTEND_SIGNUP;
		$email_to = $_SESSION['EMAIL'];

// Delete outdated confirmation IDs
		deleteOutdatedConfirmations();

// Create confirmation ID and Timestamp
		$sTimeOut = 0; // now + 24hours
		$sConfirmationId = '';

		if(CONFIRMED_REGISTRATION) {
			$sTimeOut = (string)(time() + 86400); // now + 24hours
			$sConfirmationId = md5(md5($sLoginName.$sTimeOut).$sTimeOut);
			$sConfirmedLink = WB_URL.'/account/confirm.php?id='.$sConfirmationId;
            $sConfirmedLink = '<a href="'.$sConfirmedLink.'">'.$sConfirmedLink.'</a>';
		}

// Save new user

		$sql  = 'INSERT INTO `'.TABLE_PREFIX.'users` SET ';
		$sql .= '`group_id` = \''.$groups_id.'\', ';
		$sql .= '`groups_id` = \''.$groups_id.'\', ';
		$sql .= '`active` = \''.(CONFIRMED_REGISTRATION ? '0' : '1').'\', ';
		$sql .= '`username` = \''.$sLoginName.'\', ';
		$sql .= '`password` = \''.$sPwHashNew.'\', ';
		$sql .= '`confirm_code` = \''.$sConfirmationId.'\', ';
		$sql .= '`confirm_timeout` = \''.$sTimeOut.'\', ';
		$sql .= '`display_name` = \''.$sDisplayName.'\', ';
		$sql .= '`email` = \''.$email_to.'\', ';
		$sql .= '`language` = \''.$_SESSION['LANGUAGE'].'\', ';
		$sql .= '`login_when` = \''.$get_ts.'\', ';
		$sql .= '`login_ip` = \''.$get_ip.'\' ';

		if(!$database->query($sql))
		{
// cancel and break script
			$bSaveRegistration = false;
			$_SESSION['display_form'] = false;
			unset($_SESSION['USERNAME']);
			unset($_SESSION['DISPLAY_NAME']);
			unset($_SESSION['EMAIL']);
			unset($_SESSION['TIMEZONE']);
			unset($_SESSION['LANGUAGE']);
			unset($_POST);
			if($database->set_error()){
				msgQueue::add($database->get_error());
			}
		} else {
    		$bSaveRegistration = true;
			msgQueue::add($MESSAGE['SIGNUP_NEW_USER'],true);

			include(dirname(__FILE__).'/signup_mails.php');

			if($bSaveRegistration && $bSendRegistrationMailtoUser) {
			// send success message to screen, no signup form
				$_SESSION['display_form'] = false;
			}

		} // end success $bSaveRegistration
	}
} // end $_POST['action']
