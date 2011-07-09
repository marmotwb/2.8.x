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

// Get the values entered
$current_password = $wb->get_post('current_password');
$email = $wb->get_post('email');

// Create a javascript back link
$js_back = WB_URL.'/account/preferences.php';
/*
if (!$wb->checkFTAN())
{
	$wb->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], $js_back, false);
	exit();
}
*/
// Get existing password
// $database = new database();
$query = "SELECT user_id FROM ".TABLE_PREFIX."users WHERE user_id = '".$wb->get_user_id()."' AND password = '".md5($current_password)."'";
$results = $database->query($query);

// Validate values
if($results->numRows() == 0) {
	$wb->print_error($MESSAGE['PREFERENCES']['CURRENT_PASSWORD_INCORRECT'], $js_back, false);
}
// Validate values
if(!$wb->validate_email($email)) {
	$wb->print_error($MESSAGE['USERS']['INVALID_EMAIL'], $js_back, false);
}

$email = $wb->add_slashes($email);

// Update the database
// $database = new database();
$query = "UPDATE ".TABLE_PREFIX."users SET email = '$email' WHERE user_id = '".$wb->get_user_id()."' AND password = '".md5($current_password)."'";
$database->query($query);
if($database->is_error()) {
	$wb->print_error($database->get_error,$js_back, false);
} else {
	$wb->print_success($MESSAGE['PREFERENCES']['EMAIL_UPDATED']);
	$_SESSION['EMAIL'] = $email;
}
