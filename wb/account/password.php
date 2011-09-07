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

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }

// Get entered values
	$current_password = $wb->get_post('current_password');
	$new_password = $wb->get_post('new_password');
	$new_password2 = $wb->get_post('new_password2');
// Get existing password
	$sql = "SELECT `user_id` FROM `".TABLE_PREFIX."users` WHERE `user_id` = ".$wb->get_user_id()." AND `password` = '".md5($current_password)."'";
	$rowset = $database->query($sql);
// Validate values
	if($rowset->numRows() == 0) {
		$error[] = $MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'];
	}else {
		if(strlen($new_password) < 3) {
			$error[] = $MESSAGE['USERS']['PASSWORD_TOO_SHORT'];
		}else {
			if($new_password != $new_password2) {
				$error[] = $MESSAGE['USERS']['PASSWORD_MISMATCH'];
			}else {
// MD5 the password
				$md5_password = md5($new_password);
// Update the database
				$sql = "UPDATE `".TABLE_PREFIX."users` SET `password` = '".$md5_password."' WHERE `user_id` = ".$wb->get_user_id();
				$database->query($sql);
				if($database->is_error()) {
					$error[] = $database->get_error();
				} else {
					$success[] = $MESSAGE['PREFERENCES']['PASSWORD_CHANGED'];
				}
			}
		}
	}
