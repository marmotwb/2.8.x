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
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$new_password2 = $_POST['new_password2'];

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

if(strlen($new_password) < 3) {
	$wb->print_error($MESSAGE['USERS']['PASSWORD_TOO_SHORT'], $js_back, false);
}
if($new_password != $new_password2) {
	$wb->print_error($MESSAGE['USERS']['PASSWORD_MISMATCH'], $js_back, false);
}

// MD5 the password
$md5_password = md5($new_password);

// Update the database
// $database = new database();
$query = "UPDATE ".TABLE_PREFIX."users SET password = '$md5_password' WHERE user_id = '".$wb->get_user_id()."'";
$database->query($query);
if($database->is_error()) {
	$wb->print_error($database->get_error, $js_back, false);
} else {
	$wb->print_success($MESSAGE['PREFERENCES']['PASSWORD_CHANGED']);
}
