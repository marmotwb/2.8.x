<?php
/**
 *
 * @category        frontend
 * @package         account
 * @author          WebsiteBaker Project
 * @copyright       2009-2012, Website Baker Org. e.V.
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
	$iMinPassLength = 6;
	$sCurrentPassword = $wb->get_post('current_password');
	$sCurrentPassword = (is_null($sCurrentPassword) ? '' : $sCurrentPassword);
	$sNewPassword = $wb->get_post('new_password');
	$sNewPassword = is_null($sNewPassword) ? '' : $sNewPassword;
	$sNewPasswordRetyped = $wb->get_post('new_password2');
	$sNewPasswordRetyped= is_null($sNewPasswordRetyped) ? '' : $sNewPasswordRetyped;
// Check existing password
	$sql  = 'SELECT `password` ';
	$sql .= 'FROM `'.TABLE_PREFIX.'users` ';
	$sql .= 'WHERE `user_id` = '.$wb->get_user_id();
// Validate values
	if (md5($sCurrentPassword) != $database->get_one($sql)) {
		$error[] = $MESSAGE['PREFERENCES_CURRENT_PASSWORD_INCORRECT'];
	}else {
		if(strlen($sNewPassword) < $iMinPassLength) {
			$error[] = $MESSAGE['USERS_PASSWORD_TOO_SHORT'];
		}else {
			if($sNewPassword != $sNewPasswordRetyped) {
				$error[] = $MESSAGE['USERS_PASSWORD_MISMATCH'];
			}else {
				$pattern = '/[^'.$wb->password_chars.']/';
				if (preg_match($pattern, $sNewPassword)) {
					$error[] = $MESSAGE['PREFERENCES_INVALID_CHARS'];
				}else {
// generate new password hash
					$sPwHashNew = md5($sNewPassword);
// Update the database
					$sql  = 'UPDATE `'.TABLE_PREFIX.'users` ';
					$sql .= 'SET `password`=\''.$sPwHashNew.'\' ';
					$sql .= 'WHERE `user_id`='.$wb->get_user_id();
					if ($database->query($sql)) {
						$success[] = $MESSAGE['PREFERENCES_PASSWORD_CHANGED'];
					}else {
						$error[] = $database->get_error();
					}
				}
			}
		}
	}
