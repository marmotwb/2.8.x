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
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2>');
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
        $retval = $admin->get_email();
        if($admin->get_user_id()!='1') {
			$sql  = 'SELECT `email` FROM `'.TABLE_PREFIX.'users` ';
			$sql .= 'WHERE `user_id`=\'1\' ';
	        $retval = $database->get_one($sql);
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

//$_SESSION['username'] = '';
//$_SESSION['DISPLAY_NAME'] = '';
//$_SESSION['email'] = '';
//$_SESSION['display_form'] = true;

if(isset($_POST['action']) && $_POST['action']=='send')
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

	$_SESSION['username'] = strtolower(strip_tags($wb->get_post_escaped('login_name')));
	$_SESSION['DISPLAY_NAME'] = strip_tags($wb->get_post_escaped('display_name'));
	$_SESSION['email'] = $wb->get_post('email');
	$_SESSION['language'] = $wb->get_post('language');

//	$aErrorMsg = array();

	if($_SESSION['username'] != "")
	{
		// Check if username already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `username` = \''.$_SESSION['username'].'\'';
		if($database->get_one($sql)){
//			$aErrorMsg[] = $MESSAGE['USERS_USERNAME_TAKEN'];
			msgQueue::add($MESSAGE['USERS_USERNAME_TAKEN']);
			$_SESSION['username'] = '';
		} else {
			if(preg_match('/^[a-z]{1}[a-z0-9_-]{3,}$/i', $_SESSION['username'])==false) {
//				$aErrorMsg[] = $MESSAGE['USERS_NAME_INVALID_CHARS'];
				msgQueue::add($MESSAGE['USERS_NAME_INVALID_CHARS']);
				$_SESSION['username'] = '';
		 	}
		}
	} else {
//		$aErrorMsg[] = $MESSAGE['LOGIN_USERNAME_BLANK'];
		msgQueue::add($MESSAGE['LOGIN_USERNAME_BLANK']);
	}

	if($_SESSION['DISPLAY_NAME'] == "") {
//		$aErrorMsg[] = $MESSAGE['GENERIC_FILL_IN_ALL'];
		msgQueue::add($MESSAGE['GENERIC_FILL_IN_ALL']);
	}

	if($_SESSION['email'] != "") {
		// Check if the email already exists
		$sql = 'SELECT `user_id` FROM `'.TABLE_PREFIX.'users` WHERE `email` = \''.mysql_escape_string($_SESSION['email']).'\'';
		if($database->get_one($sql)){
//			$aErrorMsg[] = $MESSAGE['USERS_EMAIL_TAKEN'];
			msgQueue::add($MESSAGE['USERS_EMAIL_TAKEN']);
			$_SESSION['email'] = '';
		} else {
			if(!$wb->validate_email($_SESSION['email'])){
//				$aErrorMsg[] = $MESSAGE['USERS_INVALID_EMAIL'];
				msgQueue::add($MESSAGE['USERS_INVALID_EMAIL']);
				$_SESSION['email'] = '';
			}
		}
	} else {
//		$aErrorMsg[] = $MESSAGE['SIGNUP_NO_EMAIL'];
		msgQueue::add($MESSAGE['SIGNUP_NO_EMAIL']);
	}

	if(CONFIRMED_REGISTRATION) {
		$iMinPassLength = 6;
// receive password vars and calculate needed action
		$sNewPassword = $wb->get_post('new_password_1');
		$sNewPassword = (is_null($sNewPassword) ? '' : $sNewPassword);
		$sNewPasswordRetyped = $wb->get_post('new_password_2');
		$sNewPasswordRetyped= (is_null($sNewPasswordRetyped) ? '' : $sNewPasswordRetyped);
// validate new password
		$sPwHashNew = false;
		if($sNewPassword != '') {
			if(strlen($sNewPassword) < $iMinPassLength) {
//				$err_msg[] = $MESSAGE['USERS_PASSWORD_TOO_SHORT'];
				msgQueue::add($MESSAGE['USERS_PASSWORD_TOO_SHORT']);
			} else {
				if($sNewPassword != $sNewPasswordRetyped) {
//					$err_msg[] = $MESSAGE['USERS_PASSWORD_MISMATCH'];
					msgQueue::add($MESSAGE['USERS_PASSWORD_MISMATCH']);
				} else {
					$pattern = '/[^'.$admin->password_chars.']/';
					if (preg_match($pattern, $sNewPassword)) {
//						$err_msg[] = $MESSAGE['PREFERENCES_INVALID_CHARS'];
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
			if(isset($_POST['captcha']) AND $_POST['captcha'] != '')
			{
				// Check for a mismatch get email user_id
				if(!isset($_POST['captcha']) OR !isset($_SESSION['captcha']) OR $_POST['captcha'] != $_SESSION['captcha']) {
					$replace = array('SERVER_EMAIL' => emailAdmin() );
	//				$aErrorMsg[] = replace_vars($MESSAGE['MOD_FORM_INCORRECT_CAPTCHA'], $replace);
					msgQueue::add(replace_vars($MESSAGE['INCORRECT_CAPTCHA'], $replace));
				}
			} else {
				$replace = array('SERVER_EMAIL'=>emailAdmin() );
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
		$sLoginName = $_SESSION['username'];
//		$sDisplayName = $_SESSION['DISPLAY_NAME'];
		$sDisplayName = $wb->add_slashes($_SESSION['DISPLAY_NAME']);
		$groups_id = FRONTEND_SIGNUP;
		$email_to = $_SESSION['email'];

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
		$bSaveRegistration = true;

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
		$sql .= '`language` = \''.$_SESSION['language'].'\', ';
		$sql .= '`login_when` = \''.$get_ts.'\', ';
		$sql .= '`login_ip` = \''.$get_ip.'\' ';

		if(!$database->query($sql))
		{
// cancel and break script
			$bSaveRegistration = false;
			$_SESSION['display_form'] = false;
			unset($_SESSION['username']);
			unset($_SESSION['DISPLAY_NAME']);
			unset($_SESSION['email']);
			unset($_POST);
			if($database->set_error()){
				msgQueue::add($database->get_error());
			}
		} else {
			msgQueue::add($MESSAGE['SIGNUP_NEW_USER'],true);

			include(dirname(__FILE__).'/signup_mails.php');

			if($bSaveRegistration && $bSendRegistrationMailtoUser) {
			// send success message to screen, no signup form
				$_SESSION['display_form'] = false;
			}

		} // end success $bSaveRegistration
	}
} // end $_POST['action']
// if page_id lost
$page_id = isset($_SESSION['PAGE_ID']) ? $_SESSION['PAGE_ID'] : 0;
