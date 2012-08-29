<?php
/**
 *
 * @category        admin
 * @package         languages
 * @author          Ryan Djurovich, WebsiteBaker Project
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 *
 */

// Setup admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'languages_uninstall', false);
if( !$admin->checkFTAN() )
{
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
// After check print the header
$admin->print_header();

// Get language name
if(!isset($_POST['code']) OR $_POST['code'] == "") {
	$code = '';
	$file = '';
} else {
	$code = $_POST['code'];
	$file = $_POST['code'].'.php';
}
// fix secunia 2010-93-2
if (!preg_match('/^([A-Z]{2}.php)/', $file)) {
	$admin->print_error($MESSAGE['GENERIC_FORGOT_OPTIONS']);
}

// Check if the template exists
if(!is_file(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC_NOT_INSTALLED']);
}

// Check if the template exists
if(!is_readable(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES']);
}

/*
// Check if user selected language
if(!isset($_POST['code']) OR $_POST['code'] == "") {
	header("Location: index.php");
	exit(0);
}

// Extra protection
if(trim($_POST['code']) == '') {
	header("Location: index.php");
	exit(0);
}

// Check if the language exists
if(!file_exists(WB_PATH.'/languages/'.$_POST['code'].'.php')) {
	$admin->print_error($MESSAGE['GENERIC_NOT_INSTALLED']);
}
*/
// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check if the language is in use
if($code == DEFAULT_LANGUAGE OR $code == LANGUAGE) {
	$admin->print_error($MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE']);
} else {
	$query_users = $database->query("SELECT user_id FROM ".TABLE_PREFIX."users WHERE language = '".$admin->add_slashes($code)."' LIMIT 1");
	if($query_users->numRows() > 0) {
		$admin->print_error($MESSAGE['GENERIC_CANNOT_UNINSTALL_IN_USE']);
	}
}

// Try to delete the language code
if(!unlink(WB_PATH.'/languages/'.$file)) {
	$admin->print_error($MESSAGE['GENERIC_CANNOT_UNINSTALL']);
} else {
	// Remove entry from DB
	$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE directory = \'".$code."\' AND type = 'language'");
}

// Print success message
$admin->print_success($MESSAGE['GENERIC_UNINSTALLED']);

// Print admin footer
$admin->print_footer();
