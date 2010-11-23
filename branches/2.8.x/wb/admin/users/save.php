<?php
/**
 *
 * @category        admin
 * @package         users
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.4.9 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Print admin header
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Access', 'users_modify');

// Create new database object
$database = new database();

// Check if user id is a valid number and doesnt equal 1
if(!isset($_POST['user_id']) OR !is_numeric($_POST['user_id']) OR $_POST['user_id'] == 1) {
	header("Location: index.php");
	exit(0);
} else {
	$user_id = $_POST['user_id'];
}

// Gather details entered
$groups_id = (isset($_POST['groups'])) ? implode(",", $admin->add_slashes($_POST['groups'])) : '';
$active = $admin->add_slashes($_POST['active'][0]);
$username_fieldname = $admin->get_post_escaped('username_fieldname');
$username = strtolower($admin->get_post_escaped($username_fieldname));
$password = $admin->get_post('password');
$password2 = $admin->get_post('password2');
$display_name = $admin->get_post_escaped('display_name');
$email = $admin->get_post_escaped('email');
$home_folder = $admin->get_post_escaped('home_folder');

// Create a javascript back link
$js_back = "javascript: history.go(-1);";

// Check values
if($groups_id == "") {
	$admin->print_error($MESSAGE['USERS']['NO_GROUP'], $js_back);
}
if(strlen($username) < 2) {
	$admin->print_error($MESSAGE['USERS']['USERNAME_TOO_SHORT'], $js_back);
}
if($password != "") {
	if(strlen($password) < 2) {
		$admin->print_error($MESSAGE['USERS']['PASSWORD_TOO_SHORT'], $js_back);
	}
	if($password != $password2) {
		$admin->print_error($MESSAGE['USERS']['PASSWORD_MISMATCH'], $js_back);
	}
}

if($email != "")
{
	if($admin->validate_email($email) == false)
    {
        $admin->print_error($MESSAGE['USERS']['INVALID_EMAIL'], $js_back);
	}
} else { // e-mail must be present
	$admin->print_error($MESSAGE['SIGNUP']['NO_EMAIL'], $js_back);
}

// Check if the email already exists
$results = $database->query("SELECT user_id FROM ".TABLE_PREFIX."users WHERE email = '".$admin->add_slashes($_POST['email'])."' AND user_id <> '".$user_id."' ");
if($results->numRows() > 0)
{
	if(isset($MESSAGE['USERS']['EMAIL_TAKEN']))
    {
		$admin->print_error($MESSAGE['USERS']['EMAIL_TAKEN'], $js_back);
	} else {
		$admin->print_error($MESSAGE['USERS']['INVALID_EMAIL'], $js_back);
	}
}

// Prevent from renaming user to "admin"
if($username != 'admin') {
	$username_code = ", username = '$username'";
} else {
	$username_code = '';
}

// Update the database
if($password == "") {
	$query = "UPDATE ".TABLE_PREFIX."users SET groups_id = '$groups_id', active = '$active'$username_code, display_name = '$display_name', home_folder = '$home_folder', email = '$email' WHERE user_id = '$user_id'";
} else {
	// MD5 supplied password
	$md5_password = md5($password);
	$query = "UPDATE ".TABLE_PREFIX."users SET groups_id = '$groups_id', active = '$active'$username_code, display_name = '$display_name', home_folder = '$home_folder', email = '$email', password = '$md5_password' WHERE user_id = '$user_id'";
}
$database->query($query);
if($database->is_error()) {
	$admin->print_error($database->get_error());
} else {
	$admin->print_success($MESSAGE['USERS']['SAVED']);
}

// Print admin footer
$admin->print_footer();

?>